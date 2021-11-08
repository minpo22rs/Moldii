<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{

    protected $maxAttempts = 1; // Default is 5
    protected $decayMinutes = 1; // Default is 1
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:merchant')->except('logout');
    }

    public function login(Request $request)
    {
        if (Auth::guard('merchant')->attempt(['merchant_email' => $request->email , 'password' => $request->password])) {
            return redirect(url('merchant/index'));
        } elseif (Auth::guard('web')->attempt(['admin_email' => $request->email , 'password' => $request->password])) {
            return redirect(url('admin/index'));
        } else {
            return redirect()->route('login')->with('error','Email-Address And Password Are Wrong.');
        }
    }
}
