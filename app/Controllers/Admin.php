<?php

namespace App\Controllers;

use App\Models\ProjectModel;
use CodeIgniter\API\ResponseTrait;

class Admin extends BaseController
{
    use ResponseTrait;
    
    protected $projectModel;
    protected $adminCode = 'admin@cc1115'; 
    
    public function __construct()
    {
        $this->projectModel = new ProjectModel();
    }
    
    public function verify()
    {
        $code = $this->request->getPost('code');
        
        if ($code === $this->adminCode) {
            return $this->response->setJSON([
                'success' => true
            ]);
        }
        
        return $this->response->setJSON([
            'success' => false
        ]);
    }
    
    public function addProject()
    {
        // Get the uploaded file
        $file = $this->request->getFile('projectThumbnail');
        
        // Check if file is valid
        if (!$file || !$file->isValid() || $file->hasMoved()) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Invalid file or file has already been moved'
            ]);
        }
        
        // Generate a random name for the file
        $newName = $file->getRandomName();
        
        // Make sure the uploads directory exists
        $uploadPath = FCPATH . 'uploads/thumbnails';
        if (!is_dir($uploadPath)) {
            mkdir($uploadPath, 0777, true);
        }
        
        // Move the file to the uploads directory
        try {
            $file->move($uploadPath, $newName);
        } catch (\Exception $e) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Error uploading file: ' . $e->getMessage()
            ]);
        }
        
        // Get other form data
        $title = $this->request->getPost('projectTitle');
        $description = $this->request->getPost('projectDescription');
        $url = $this->request->getPost('projectURL');
        $teamMembers = $this->request->getPost('teamMembers');
        $classSection = $this->request->getPost('classSection');

        // Save to database
        $data = [
            'title' => $title,
            'description' => $description,
            'image_path' => 'uploads/thumbnails/' . $newName,
            'url' => $url,
            'team_members' => $teamMembers,
            'class_section' => $classSection
        ];
        
        try {
            // Temporarily disable validation for debugging
            $this->projectModel->skipValidation(true);
            
            $projectId = $this->projectModel->insert($data);
            
            if (!$projectId) {
                // Get validation errors
                $errors = $this->projectModel->errors();
                
                // Delete the uploaded file since we couldn't save to database
                if (file_exists($uploadPath . '/' . $newName)) {
                    unlink($uploadPath . '/' . $newName);
                }
                
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Failed to save project to database',
                    'errors' => $errors,
                    'data' => $data
                ]);
            }
            
            // Return success response with project data
            return $this->response->setJSON([
                'success' => true,
                'project' => [
                    'id' => $projectId,
                    'title' => $title,
                    'description' => $description,
                    'imagePath' => base_url('uploads/thumbnails/' . $newName),
                    'url' => $url,
                    'teamMembers' => explode("\n", $teamMembers)
                ]
            ]);
        } catch (\Exception $e) {
            // Delete the uploaded file since we couldn't save to database
            if (file_exists($uploadPath . '/' . $newName)) {
                unlink($uploadPath . '/' . $newName);
            }
            
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Database error: ' . $e->getMessage(),
                'data' => $data
            ]);
        }
    }
    
    public function updateProject()
    {
        // Get project ID
        $projectId = $this->request->getPost('projectId');
        
        // Get the project from database
        $project = $this->projectModel->find($projectId);
        
        if (!$project) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Project not found'
            ]);
        }
        
        // Get other form data
        $title = $this->request->getPost('projectTitle');
        $description = $this->request->getPost('projectDescription');
        $url = $this->request->getPost('projectURL');
        $teamMembers = $this->request->getPost('teamMembers');
        $classSection = $this->request->getPost('classSection');

        // Prepare update data
        $data = [
            'title' => $title,
            'description' => $description,
            'url' => $url,
            'team_members' => $teamMembers,
            'class_section' => $classSection
        ];
        
        // Check if a new file was uploaded
        $file = $this->request->getFile('projectThumbnail');
        
        if ($file && $file->isValid() && !$file->hasMoved()) {
            // Generate a random name for the file
            $newName = $file->getRandomName();
            
            // Make sure the uploads directory exists
            $uploadPath = FCPATH . 'uploads/thumbnails';
            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0777, true);
            }
            
            // Move the file to the uploads directory
            try {
                $file->move($uploadPath, $newName);
                $data['image_path'] = 'uploads/thumbnails/' . $newName;
                
                // Delete the old image if it exists
                if (!empty($project['image_path'])) {
                    $oldImagePath = FCPATH . $project['image_path'];
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath);
                    }
                }
            } catch (\Exception $e) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Error uploading file: ' . $e->getMessage()
                ]);
            }
        }
        
        // Update the database
        try {
            // Temporarily disable validation for debugging
            $this->projectModel->skipValidation(true);
            
            if (!$this->projectModel->update($projectId, $data)) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Failed to update project',
                    'errors' => $this->projectModel->errors(),
                    'data' => $data
                ]);
            }
            
            // Return success response with updated project data
            return $this->response->setJSON([
                'success' => true,
                'project' => [
                    'id' => $projectId,
                    'title' => $title,
                    'description' => $description,
                    'imagePath' => base_url($data['image_path'] ?? $project['image_path']),
                    'url' => $url,
                    'teamMembers' => explode("\n", $teamMembers)
                ]
            ]);
        } catch (\Exception $e) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Database error: ' . $e->getMessage(),
                'data' => $data
            ]);
        }
    }
    
    public function deleteProject()
    {
        // Get project ID
        $projectId = $this->request->getPost('projectId');
        
        // Get the project from database
        $project = $this->projectModel->find($projectId);
        
        if (!$project) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Project not found'
            ]);
        }
        
        // Delete the image file if it exists
        if (!empty($project['image_path'])) {
            $imagePath = FCPATH . $project['image_path'];
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
        
        // Delete from database
        if (!$this->projectModel->delete($projectId)) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Failed to delete project'
            ]);
        }
        
        // Return success response
        return $this->response->setJSON([
            'success' => true
        ]);
    }
    
    public function getProjects()
    {
        $projects = $this->projectModel->findAll();
        
        // Format the projects for the frontend
        $formattedProjects = [];
        foreach ($projects as $project) {
            $formattedProjects[] = [
                'id' => $project['id'],
                'title' => $project['title'],
                'description' => $project['description'],
                'imagePath' => base_url($project['image_path']),
                'url' => $project['url'],
                'teamMembers' => explode("\n", $project['team_members'])
            ];
        }
        
        return $this->response->setJSON([
            'success' => true,
            'projects' => $formattedProjects
        ]);
    }
    
    public function getProject($id)
    {
        $project = $this->projectModel->find($id);
        
        if (!$project) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Project not found'
            ]);
        }
        
        return $this->response->setJSON([
            'success' => true,
            'project' => [
                'id' => $project['id'],
                'title' => $project['title'],
                'description' => $project['description'],
                'imagePath' => base_url($project['image_path']),
                'url' => $project['url'],
                'teamMembers' => explode("\n", $project['team_members'])
            ]
        ]);
    }
}



