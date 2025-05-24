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
}





