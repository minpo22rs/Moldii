<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use DB;
use Session;

class LoginController extends Controller
{
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
    }

    public function checklogin(Request $request)
    {
        // dd($request->all());
        // dd(Auth::guard('web')->user()->id());
        
        $user = DB::table('tb_customers')->where('customer_username', $request->username)->orWhere('customer_phone', $request->username)->first();
        // dd($user);
        if ( Auth::guard('web')->attempt(['customer_username' => $request->username , 'customer_password' => $request->password])
            || Auth::guard('web')->attempt(['customer_phone' => $request->username , 'customer_password' => $request->password])) {
            Session::put('cid',$user->customer_id);
            
            // dd(Session::all());
            return redirect('/index');
        } else {
            // dd('dddd');
            return redirect('user/login')->with('error','Username Or Password Are Wrong.');
        }
    }


    public function logout()
    {
        Session::flush();
        return redirect('user/login');
    }

}
