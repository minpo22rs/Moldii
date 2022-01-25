<?php

namespace App\Http\Controllers\mobile\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{


    






    public function create(Request $request)
    {

        $request->validate([
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string',  'max:255'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        User::create([
            'name' => $request['firstname'],
            'lastname' => $request['lastname'],
            'email' => $request['username'],
            'password' => Hash::make($request['password']),
            'is_admin' => '0',
        ]);

        return redirect('user/login');
    }
}
