<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    protected $fillable = [
        'registration_number',
        'full_name',
        'major',
        'nisn',
        'birth_place',
        'birth_date',
        'gender',
        'religion',
        'citizenship',
        'address',
        'father_name',
        'father_job',
        'father_phone',
        'mother_name',
        'mother_job',
        'mother_phone',
        'parent_income',
        'school_origin',
        'graduation_year',
        'average_grade',
        'status',
        'profile_image',
        'doc_kk',
        'doc_akta',
        'doc_ijazah',
        'doc_raport',
        'doc_pernyataan',
        'doc_shun',
        'doc_ijazah_sd',
        'doc_domisili',
        'doc_ktp_ortu',
        'doc_sehat_badan',
        'doc_sehat_mata',
        'doc_prestasi',
        'doc_form',
        'doc_skl',
        'doc_kip_pkh'
    ];
}
