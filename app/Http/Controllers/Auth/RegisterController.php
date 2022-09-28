<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Session;
use DB;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
           
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(Request $request)
    {

        // dd($request->all());
  
        $request->validate([
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string',  'max:255'],
            'password' => ['required', 'string', 'min:8'],
        ]);
    

        
        $p = new User();
        $p->customer_name = $request->firstname;
        $p->customer_lname = $request->lastname;
        $p->customer_username = $request->username;
        // $p->customer_phone = $request->mn;
        $p->customer_password = Hash::make($request['password']);
        $p->save();

        Session::put('cid',$p->id);
        // dd($p);
        return redirect()->to('otp');
    }

    public function checkusername(Request $request)
    {
        $chk = DB::table('tb_customers')->where('customer_username',$request->name)->first();
        if($chk != null){
            return 1;
        }
    }

    public function checkmn(Request $request)
    {
        $chk = DB::table('tb_customers')->where('customer_phone',$request->mn)->first();
        if($chk != null){
            return 1;
        }
    }

    public function tag()
    {
        return view('mobile.member.register.tag');
    }

    public function selecttag(Request $request)
    {
        // dd(json_encode($request->checkbox, JSON_UNESCAPED_UNICODE));
        DB::table('tb_customers')->where('customer_id',Session::get('cid'))->update(['tag'=> json_encode($request->checkbox, JSON_UNESCAPED_UNICODE)]);


        return redirect('index');
    }
}
