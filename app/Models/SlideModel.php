<?php

namespace App\Models;

use CodeIgniter\Model;

class SlideModel extends Model
{
    protected $table      = 'slides';   // Name of the table
    protected $primaryKey = 'id';       // Primary key of the table

    // Define the allowed fields in the slide table (adjusted for the use case)
    protected $allowedFields = ['subject_id', 'topic', 'file_name'];

    // Automatically set created_at and updated_at fields
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // Validation rules
    protected $validationRules = [
        'subject_id' => 'required|integer',   // subject_id is required and should be an integer
        'topic'      => 'required|string|min_length[3]|max_length[255]', // topic should be a string between 3 and 255 characters
    ];

    // Custom error messages (optional)
    protected $validationMessages = [
        'subject_id' => [
            'required' => 'The Subject ID is required.',
            'integer'  => 'The Subject ID must be a valid integer.',
        ],
        'topic' => [
            'required'     => 'The Topic is required.',
            'string'       => 'The Topic must be a valid string.',
            'min_length'   => 'The Topic must be at least 3 characters long.',
            'max_length'   => 'The Topic can be no longer than 255 characters.',
        ],
    ];

    // Insert a new slide
    public function insert_slide($data, $fileName)
    {
        // Set the file name as the file path
        $data['file_name'] = $fileName;

        // Validate the data first
        if (!$this->validate($data)) {
            return ['error' => $this->errors()];
        }

        // Insert data into the database
        if ($this->insert($data)) {
            return ['success' => true, 'insertID' => $this->insertID()];
        } else {
            return ['error' => 'Failed to insert slide data.'];
        }
    }

    // Get all slides by subject_id
    public function get_slides_by_subject($subject_id)
    {
        return $this->where('subject_id', $subject_id)->findAll();
    }

    // Get a single slide by ID
    public function get_slide_by_id($id)
    {
        return $this->find($id);
    }

    // Update slide data by ID
    public function update_slide($id, $data)
    {
        if (!$this->validate($data)) {
            return ['error' => $this->errors()];
        }

        if ($this->update($id, $data)) {
            return ['success' => true];
        } else {
            return ['error' => 'Failed to update slide data.'];
        }
    }

    // Delete slide by ID
    public function delete_slide($id)
    {
        return $this->delete($id);
    }
}
