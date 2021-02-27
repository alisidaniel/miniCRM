<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Company;

class ManageCompanyController extends Controller 
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function store(Request $request)
    {
        $rule = [
            'name'  => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'logo'  => 'required',
            'url'   => 'required'
        ];

        $this->validate($request, $rule);

        $company = new Company();
        $company = $company->create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'logo' => $request['logo']
        ]);
        
        if($company) return redirect()->back()->with('success', 'Company added successfully.'); 
        
        return redirect()->back()->with('failure', 'An error occurred. Please try again');

    }

    public function view()
    {   
        $companies = Company::orderBy('created_at', 'desc')->paginate(5);
        return view('admin.company', compact('companies'));
    }

    public function update(Request $request)
    {
        $employee = Company::where('id', $request->id)
        ->update([
            'name'  => $request->name,
            'email' => $request->email,
            'logo'  => $request->logo,
            'url'   => $request->url,
        ]);
        if($employee) return redirect()->back()->with('success', 'Company data updated successfully.');

        return redirect()->back()->with('failure', 'An error occurred. Please try again');
    }

    public function delete(Request $request)
    {
        $employee = Company::where('id', $request->id)->delete();
        if($employee) return redirect()->back()->with('success', 'Company data deleted successfully.');

        return redirect()->back()->with('failure', 'An error occurred. Please try again');
    }
    
}