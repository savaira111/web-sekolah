<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ExtracurricularRegistration;

class ExtracurricularRegistrationController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'class' => 'required|string|max:255',
            'extracurricular' => 'required|string|max:255',
            'motivation' => 'required|string',
        ]);

        $validated['status'] = 'pending';

        ExtracurricularRegistration::create($validated);

        return redirect()->route('extracurriculars.registration.success')->with('success', 'Pendaftaran berhasil dikirim!');
    }

    public function index()
    {
        $registrations = ExtracurricularRegistration::latest()->get();
        return view('superadmin.extracurricular_registrations.index', compact('registrations'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,approved,rejected'
        ]);

        $registration = ExtracurricularRegistration::findOrFail($id);
        $registration->update(['status' => $request->status]);

        return redirect()->route('superadmin.extracurricular-registrations.index')->with('success', 'Status pendaftaran berhasil diperbarui!');
    }
}
