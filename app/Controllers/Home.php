<?php

namespace App\Controllers;

use App\Models\ProjectModel;

class Home extends BaseController
{
    public function index()
    {
        $projectModel = new ProjectModel();
        
        // Set up pagination - 6 projects per page
        $projects = $projectModel->paginate(6, 'projects');
        $pager = $projectModel->pager;
        
        // Change from 'students' to 'landing_page'
        return view('landing_page', [
            'projects' => $projects,
            'pager' => $pager
        ]);
    }
    
    public function landing()
    {
        $projectModel = new ProjectModel();
        
        // Set up pagination - 6 projects per page
        $projects = $projectModel->paginate(6, 'projects');
        $pager = $projectModel->pager;
        
        return view('landing_page', [
            'projects' => $projects,
            'pager' => $pager
        ]);
    }
    
    public function search()
    {
        $searchTerm = $this->request->getGet('term');
        $filter = $this->request->getGet('filter') ?? 'all';
        
        $projectModel = new ProjectModel();
        
        // Apply search term to query if provided
        if (!empty($searchTerm)) {
            $projectModel->groupStart()
                ->like('title', $searchTerm)
                ->orLike('description', $searchTerm)
                ->orLike('class_section', $searchTerm)
                ->orLike('team_members', $searchTerm)
                ->groupEnd();
        }
        
        // Apply filter if not 'all'
        if ($filter !== 'all') {
            $projectModel->where('class_section', $filter);
        }
        
        // Get paginated results
        $projects = $projectModel->paginate(6, 'projects');
        
        // Return JSON response for AJAX requests without pagination links
        // We'll handle pagination on the client side
        return $this->response->setJSON([
            'projects' => $projects,
            'pager' => '' // Empty string instead of pagination links
        ]);
    }
}
