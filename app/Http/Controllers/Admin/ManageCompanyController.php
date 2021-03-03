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
            'logo'  => 'image|mimes:jpeg,jpg,png',
            'url'   => 'required|string'
        ];

        $this->validate($request, $rule);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'url' => $request->url,
        ];

        if ($request->hasFile('logo') && $request->file('logo')->isValid()){
            $data['logo'] = $request->logo->store('public/logo');
        }

        $company = Company::create($data);
        
        if($company) return redirect()->back()->with('success', 'Company added successfully.'); 

        return redirect()->back()->with('failure', 'An error occurred. Please try again');

    }

    public function view()
    {   
        $companies = Company::orderBy('id', 'DESC')->paginate(5);
        return view('admin.company', compact('companies'));
    }

    public function update(Request $request)
    {

        if ($request->hasFile('logo') && $request->file('logo')->isValid()){
            $data['logo'] = $request->logo->store('public/logo');
        }

        $data = [
            'name'  => $request->name,
            'email' => $request->email,
            'url'   => $request->url,
        ];

        $employee = Company::where('id', $request->id)->update($data);

        if($employee) return redirect()->back()->with('success', 'Company data updated successfully.');

        return redirect()->back()->with('failure', 'An error occurred. Please try again');
    }

    public function delete(Request $request)
    {
        $company = Company::where('id', $request->id)->delete();
        if($company) return redirect()->back()->with('success', 'Company data deleted successfully.');
        return redirect()->back()->with('failure', 'An error occurred. Please try again');
    }
    
}