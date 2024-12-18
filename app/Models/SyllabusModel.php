<?php

namespace App\Models;

use CodeIgniter\Model;

class SyllabusModel extends Model
{
    protected $table = 'syllabus';
    protected $primaryKey = 'syllabus_id';
    protected $allowedFields = ['syllabus_name', 'syllabus_name'];

    
}