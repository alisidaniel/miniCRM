<?php
namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;

class ManageEmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:company');
    }

    public function store(Request $request)
    {
        $rule = [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
        ];

        $this->validate($request, $rule);

        $employee = new User();
        $employee = $employee->create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ]);
        
        if($employee) return redirect()->back()->with('success', 'Employee added successfully.'); 
        
        return redirect()->back()->with('failure', 'An error occurred. Please try again');

    }

    public function view()
    {
        $employees = User::where('company_id', Auth::user()->id)->paginate(5);   
        return view('company.employee', compact('employees'));
    }

    public function update(Request $request)
    {
        $rule = [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
        ];

        $this->validate($request, $rule);

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