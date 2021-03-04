<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function dashboard()
    {
        $company = optional(User::find(Auth::id())->company);
        $user = User::find(Auth::id());
        return view('home', compact('company', 'user'));
    }

    public function update(Request $request)
    {   
        $rule = [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
        ];

        $this->validate($request, $rule);
        
        $employee = User::where('id', Auth::id())
        ->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        
        if($employee) return redirect()->back()->with('success', 'Profile successfuly changed.');

        return redirect()->back()->with('failure', 'An error occurred. Please try again');
    }
}
