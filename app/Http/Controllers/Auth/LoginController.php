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
        if(!empty($request->error_code)){
            return redirect('login-customer');
        }
        $random = mt_rand(1000000000, 9999999999);
        try {
            $user = Socialite::driver($provider)->stateless()->user();
            dd( $user);
            $input['customer_id']=  $random ;
            $input['name'] = $user->getName();
            $input['email'] = $user->getEmail();
            $input['provider'] = $provider;
            $input['provider_id']=  $user->getId();
            $input['avatar']=  $user->getAvatar();

            
            $authUser = $this->findOrCreate($input,$provider,$user->getId(),$random );
            Session::put('username',$user->getName()); 
            Session::put('currency','THB');
            $this->getIP( Session::get('customer_id'),$request->getClientIp());
            if(!empty(Session::get('paynow')) || !empty(Session::get('paystore')) || !empty(Session::get('booknow')) ){
                return redirect('appointment/'.Session::get('id_store').'');
            }else if(!empty(Session::get('flashsale'))){
                return redirect('payment_method/'.Session::get('flashsale')['booking_id']);
            }else{
                
                if(!empty(Session::get('pagepre')) ){
                    return redirect(''.Session::get('pagepre').'');

                }else{
                    return redirect('/');

                }
            }

        } catch (Exception $e) {
            return redirect('login/'.$provider);
        }
    }
    /////////find or create 
    public function findOrCreate($input,$provider,$provider_id,$id){
    	$checkIfExist = Customer::where('provider',$provider)
                           ->where('provider_id',$provider_id)					   	 
                           ->first();
        if(!empty($checkIfExist)){
            Session::put('customer_id',$checkIfExist->customer_id);

            return $checkIfExist;
        }else{
            // dd($input);
            Session::put('customer_id',$id);
            Customer::insert($input);
            Session::forget('guest_ip');
            $customer = Customer::where('customer_id',$id)->first();
            // $data  = array(
            //     'customer' => $customer,
            // );

            $data = array(
                'first' => $customer->name,
                'last' => $customer->lastname,
                'pass' => '-',
                'hot' => \App\HotService::where('date_start','>=',date('Y-m-d'))->where('date_finish','>=',date('Y-m-d'))->limit(4)->get(),
            ); 

            if($provider!='line' && !empty($customer->email)){

                Mail::send('email.register',$data,function($message) use($customer){
                    $message->to($customer->email)
                        ->subject('ขอบคุณสำหรับการสมัครสมาชิกจากเว็บ Beauty To Book')
                        ->from('info@beautytobook.com');
                });
            }
                
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
