<?php

namespace App\Http\Controllers\Company;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class CompanyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:company');
    }
    

    public function dashboard()
    {
        return view('company.dashboard');
    }
}
