<?php

namespace App\Models\Students;

use Illuminate\Database\Eloquent\Model;

class StudentsRegistration extends Model
{
    protected $table = 'students_registration';
    protected $fillable = [
        'massar_cne', 'cnie', 'passport', 'first_name', 'last_name',
        'gender', 'date_of_birth', 'city', 'nationality', 'field_code', 
        'type_filier', 'level_of_study', 'student_status', 'diploma_access',
        'baccalaureate_series', 'baccalaureate_year', 'diploma_speciality', 
        'diploma_mention', 'diploma_location', 'first_registration_year',
        'handicap', 'resident', 'civil_servant', 'scholarship_percentage', 
        'mobility_student', 'documents_submitted','niveaux','cin','diplome_bac','relv_note','att_rs'
    ];
}