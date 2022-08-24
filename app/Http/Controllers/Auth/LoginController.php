<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use DB;
use Session;
use Socialite;
use App\Models\User;


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


    //BEGIN SOCIALITE
    ///// Customer is model which insert user login 
    public function redirectToProvider($provider)
    {

        // dd('facebook');
       return Socialite::driver($provider)->redirect();
    }
    public function handleProviderCallback($provider,Request $request)
    {      
        // dd('callback');
        if(!empty($request->error_code)){
            return redirect('user/login');
        }
        $random = mt_rand(1000000000, 9999999999);
        try {
            $user = Socialite::driver($provider)->stateless()->user();
            // dd( $user);
            // $input['customer_id']=  $random ;
            $input['customer_username'] = $user->getName();
            $input['customer_name'] = $user->getName();
            $input['customer_email'] = $user->getEmail();
            $input['provider'] = $provider;
            $input['provider_id']=  $user->getId();
            $input['customer_img']=  $user->getAvatar();

            
            $authUser = $this->findOrCreate($input,$provider,$user->getId());
            Session::put('recent',[]);
            
           
            return redirect('/index');

           
        } catch (Exception $e) {
            return redirect('user/login');
        }
    }
    /////////find or create 
    public function findOrCreate($input,$provider,$provider_id){

    	$checkIfExist = User::where('provider',$provider)
                           ->where('provider_id',$provider_id)					   	 
                           ->first();

        if(!empty($checkIfExist)){
            Session::put('cid',$checkIfExist->customer_id);

            return $checkIfExist;
        }else{
            // dd($input);
            User::insert($input);
    
            $customer = User::where('provider',$provider)->where('provider_id',$provider_id)->first();

            Session::put('cid',$customer->customer_id);
           
          
            return '0';
        }
	}

    //END SOCIALITE



    public function checklogin(Request $request)
    {
        // dd($request->all());
        // dd(Auth::guard('web')->user()->id());
        
        $user = DB::table('tb_customers')->where('customer_username', $request->username)->orWhere('customer_phone', $request->username)->first();
        // dd($user);
        if ( Auth::guard('web')->attempt(['customer_username' => $request->username , 'customer_password' => $request->password])
            || Auth::guard('web')->attempt(['customer_phone' => $request->username , 'customer_password' => $request->password])) {
            Session::put('cid',$user->customer_id);
            Session::put('recent',[]);
            
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
