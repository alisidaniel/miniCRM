<?php

namespace App\Http\Controllers\Company;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class CompanyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:company');
    }
    
    public function dashboard()
    {
        $company = auth()->guard('company')->user()->id;
        $employees = User::where('company_id', $company)->paginate(5); 
        return view('company.dashboard', compact('employees'));
    }
}
