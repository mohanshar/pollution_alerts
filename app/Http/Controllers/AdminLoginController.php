<?php

namespace App\Http\Controllers;

use App\Models\admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AdminLoginController extends Controller
{
    public function adminDashboard()
    {
        if (!(Auth::guard('admin')->check())) {
            return redirect()->route('admin.login');
        }
        return view('backend.adminDash');
    }

    public function adminLogin()
    {
        if (!(Auth::guard('admin')->check())) {
            return view('backend.login');
        }
    }

    public function submit(Request $request)
    {
        // dd($request->all());

        request()->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (!$request->get('email') || !$request->get('password')) {
            return redirect()->back();
        }

        try {

            $admin = admin::where('email', $request->email)->first();

            if ($admin) {

                if (Hash::check($request->password, $admin->password)) {
                    Auth::guard('admin')->login($admin);
                    return redirect('/admin')->with('success', 'Hello! You have Successfully Logged in as Admin.');
                }

                return redirect()->back();
            } else {
                return redirect()->back();
            }
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function adminLogout(Request $request)
    {
        if (Auth::guard('admin')->check()) // this means that the admin was logged in.
        {
            Auth::guard('admin')->logout();
            return redirect()->route('admin.login');
        }

        Auth::guard('admin')->logout();
        $request->session()->invalidate();

        return Auth::guard('admin')->logout($request) ?: redirect('admin');
    }
}
