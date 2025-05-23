<?php

namespace App\Controllers;

use App\Models\ProjectModel;

class Home extends BaseController
{
    public function index()
    {
        $projectModel = new ProjectModel();
        $projects = $projectModel->findAll();
        
        // Change from 'students' to 'landing_page'
        return view('landing_page', ['projects' => $projects]);
    }
    
    public function landing()
    {
        $projectModel = new ProjectModel();
        $projects = $projectModel->findAll();
        
        return view('landing_page', ['projects' => $projects]);
    }
}





