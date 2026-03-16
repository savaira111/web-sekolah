<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Applicant;
use Barryvdh\DomPDF\Facade\Pdf;

class ApplicantController extends Controller
{
    public function index()
    {
        $applicants = Applicant::latest()->get();
        return view('superadmin.ppdb.index', compact('applicants'));
    }

    public function show($id)
    {
        $applicant = Applicant::findOrFail($id);
        return view('superadmin.ppdb.show', compact('applicant'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'major' => 'required|in:PPLG,DKV',
            'nisn' => 'required|string|unique:applicants,nisn',
            'birth_place' => 'required|string',
            'birth_date' => 'required|date',
            'gender' => 'required|in:Male,Female',
            'religion' => 'nullable|string',
            'citizenship' => 'required|string',
            'address' => 'required|string',
            'father_name' => 'required|string',
            'father_phone' => 'required|string',
            'mother_name' => 'required|string',
            'mother_phone' => 'required|string',
            'school_origin' => 'required|string',
            'graduation_year' => 'required|numeric|digits:4',
            'average_grade' => 'required|numeric|min:0|max:100',
            'father_job' => 'nullable|string',
            'mother_job' => 'nullable|string',
            'parent_income' => 'nullable|string',
            'doc_kk' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'doc_akta' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'doc_ijazah' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'doc_raport' => 'nullable|file|mimes:pdf|max:2048',
            'doc_shun' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'doc_pernyataan' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'doc_ijazah_sd' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'doc_domisili' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'doc_ktp_ortu' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'doc_sehat_badan' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'doc_sehat_mata' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'doc_prestasi' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'doc_form' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'doc_skl' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'doc_kip_pkh' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'profile_image' => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
        ], [
            'required' => ':attribute wajib diisi.',
            'string' => ':attribute harus berupa teks.',
            'max' => ':attribute tidak boleh lebih dari :max karakter.',
            'unique' => ':attribute sudah terdaftar.',
            'date' => ':attribute harus berupa tanggal yang valid.',
            'in' => ':attribute yang pilih tidak valid.',
            'numeric' => ':attribute harus berupa angka.',
            'digits' => ':attribute harus berjumlah :digits digit.',
            'min' => ':attribute minimal :min.',
            'mimes' => ':attribute harus berupa file dengan tipe: :values.',
            'file' => ':attribute harus berupa file.',
        ]);

        // Generate registration number: PPDB-2024-[random]
        $regNumber = 'PPDB-' . date('Y') . '-' . strtoupper(bin2hex(random_bytes(3)));

        // Handle file uploads
        $fileFields = ['doc_kk', 'doc_akta', 'doc_ijazah', 'doc_raport', 'doc_shun', 'doc_pernyataan', 'doc_ijazah_sd', 'doc_domisili', 'doc_ktp_ortu', 'doc_sehat_badan', 'doc_sehat_mata', 'doc_prestasi', 'doc_form', 'doc_skl', 'doc_kip_pkh', 'profile_image'];
        $filePaths = [];
        foreach ($fileFields as $field) {
            if ($request->hasFile($field)) {
                $filePaths[$field] = $request->file($field)->store('applicants/documents', 'public');
            }
        }

        $applicant = Applicant::create(array_merge($validated, $filePaths, [
            'registration_number' => $regNumber,
            'status' => 'Menunggu Review',
            'father_job' => $request->father_job ?? '-',
            'mother_job' => $request->mother_job ?? '-',
            'parent_income' => $request->parent_income ?? '-',
        ]));

        return redirect()->back()->with('success_registration', 'Pendaftaran berhasil! Terimakasih telah mendaftar di SMKS Mahaputra.');
    }

    public function updateStatus(Request $request, $id)
    {
        $applicant = Applicant::findOrFail($id);
        $applicant->update([
            'status' => $request->status
        ]);

        return redirect()->back()->with('success', 'Status pendaftar berhasil diperbarui!');
    }

    public function downloadPdf($id)
    {
        $applicant = Applicant::findOrFail($id);
        $pdf = Pdf::loadView('superadmin.ppdb.pdf', compact('applicant'));
        
        return $pdf->download('PPDB_' . str_replace(' ', '_', $applicant->full_name) . '.pdf');
    }
}
