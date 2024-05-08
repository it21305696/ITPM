<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */

     public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
    

    /**
     * Handle an authenticated user.
     *
     * @param \Illuminate\Http\Request $request
     * @param mixed $user
     * @return \Illuminate\Http\Response
     */
    protected function authenticated(Request $request, $user)
    {
        if ($user->isRole('admin')) {
            return redirect()->route('admin_home');
        } elseif ($user->isRole('project member')) {
            return redirect()->route('memberhome');
        } elseif ($user->isRole('examiner')) {
            return redirect()->route('examiner.home');
        } elseif ($user->isRole('supervisor')) {
            return redirect()->route('suphome');
        } elseif ($user->isRole('student')) {
            return redirect()->route('student.home');
        }

        // Default redirect if no role matches
        return redirect('/home');
    }

    /**
     * Get the needed authorization credentials from the request.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    protected function credentials(Request $request)
    {
        // Customizing the login field to use 'email' and 'password'
        return $request->only('email', 'password');
    }
}
