<?php

namespace App\Models;

use CodeIgniter\Model;

class ProjectModel extends Model
{
    protected $table = 'projects';
    protected $primaryKey = 'id';
    
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    
    protected $allowedFields = [
        'title', 
        'description', 
        'image_path', 
        'url', 
        'team_members',
        'class_section'
    ];
    
    // Validation rules
    protected $validationRules = [
        'title' => 'required|min_length[3]|max_length[255]',
        'description' => 'required|min_length[10]',
        'image_path' => 'required',
        'url' => 'required|valid_url',
    ];
    
    protected $validationMessages = [
        'title' => [
            'required' => 'Project title is required',
            'min_length' => 'Project title must be at least 3 characters long',
            'max_length' => 'Project title cannot exceed 255 characters'
        ],
        'description' => [
            'required' => 'Project description is required',
            'min_length' => 'Project description must be at least 10 characters long'
        ],
        'image_path' => [
            'required' => 'Project thumbnail image is required'
        ],
        'url' => [
            'required' => 'Project URL is required',
            'valid_url' => 'Please enter a valid URL'
        ]
    ];
    
    // Dates
    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
}

