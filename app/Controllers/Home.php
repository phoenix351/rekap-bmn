<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data= [
            'parent_page' => 'Dashboard',
            'page' => 'dashboard'
        ];
        return view('Pages/dashboard',$data);
    }
   
}
