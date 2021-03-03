<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\Company;

class ManageEmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function store(Request $request)
    {
        $rule = [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
        ];
 
        $this->validate($request, $rule);
        $employee = new User();
    
        $data = [
            'company_id' => $request->company,
            'name' => $request->name,
            'email' => $request->email,
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ];
        
        $employee = User::create($data);

        if($employee) return redirect()->back()->with('success', 'Employee added successfully.'); 
        
        return redirect()->back()->with('failure', 'An error occurred. Please try again');
    }

    public function view($id)
    {   
        $employees = User::where('company_id', $id)->paginate(5);
        $companies = Company::all();
        return view('admin.employee', compact('employees', 'companies'));
    }

    public function update(Request $request)
    {
        $employee = User::where('id', $request->id)
        ->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);
        if($employee) return redirect()->back()->with('success', 'Employee data updated successfully.');

        return redirect()->back()->with('failure', 'An error occurred. Please try again');
    }

    public function delete(Request $request)
    {
        $employee = User::where('id', $request->id)->delete();
        if($employee) return redirect()->back()->with('success', 'Employee deleted successfully.');

        return redirect()->back()->with('failure', 'An error occurred. Please try again');
    }
    
}