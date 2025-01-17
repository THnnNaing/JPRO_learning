<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index(): View
    {
        return view('auth.login');
    }
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function registration(): View
    {
        return view('auth.registration');
    }
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function postLogin(Request $request): RedirectResponse
    {

        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $credentials = $request->only('email', 'password');
        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->intended('dashboard')
                ->withSuccess('You have Successfully loggedin');
        }
        return redirect("login")->withError('Oppes! You have entered invalid credentials');
    }
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function postRegistration(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:admins',
            'password' => 'required|min:6',
        ]);
        $data = $request->all();
        $user = $this->create($data);
        Auth::login($user);
        return redirect("login")->withSuccess('Great! You have Successfully loggedin');
    }
    /**
     * Write code on Method
     *
     * @return response()
     */
    // public function dashboard()
    // {
    //     if (Auth::check()) {
    //         return view('dashboard');
    //     }
    //     return redirect("login")->withSuccess('Opps! You do not have access');
    // }
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function create(array $data)
    {
        return Admin::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);
    }
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function logout(): RedirectResponse
    {
        Session::flush();
        Auth::logout();
        return Redirect('login');
    }
}
