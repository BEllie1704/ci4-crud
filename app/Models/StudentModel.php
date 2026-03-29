<?php

namespace App\Models;

use CodeIgniter\Model;

class StudentModel extends Model
{
    protected $table      = 'students';
    protected $primaryKey = 'id';

    // Step 5: Basic CRUD
    protected $allowedFields = ['name', 'email', 'course'];

    // Step 9: Soft Deletes
    protected $useSoftDeletes = true;       // Enable the feature
    protected $dateFormat     = 'datetime'; // Use standard Y-m-d H:i:s
    protected $deletedField   = 'deleted_at'; // The column name in DB
}