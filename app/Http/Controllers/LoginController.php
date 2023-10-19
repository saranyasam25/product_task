<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function login(Request $request) {

        $rules = $request->validate([
            'email'    => 'required',
            'password' => 'required',
        ]);

        $email    = $request->email;
        $password = $request->password;
        $formatedPassword = trim($password);
        // dd($formatedPassword);
        $user = User::where('email', $email)->first();
        if (!empty($user)) {
            if ($email == $user->email && $formatedPassword == $user->confirm_password) {
                Auth::login($user);
                return response()->json([
                    'status'  => 'Success',
                    'message' => 'Logged in Successfully',
                ], 200);
            } else {
                return response()->json([
                    'status'  => 'Error',
                    'message' => 'Invalid email or password.',
                ], 422);
            }
        } else {
            return response()->json([
                'status'  => 'Error',
                'message' => 'Invalid email address.',
            ], 422);
        }        
    }
    public function store(Request $request)
    {
        $rules = [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'role' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'confirm_password' => 'required|same:password',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }   

        try {
            $users = User::create([
                                    'first_name'        => $request->first_name,
                                    'last_name'         => $request->last_name,
                                    'role'              => $request->role,
                                    'email'             => $request->email,
                                    'password'          => $request->password,
                                    'confirm_password'  => $request->confirm_password,
                                ]);

            $role = $request->role;
            if($role == 'User') {
                $email    = $request->email;
                $password = $request->password;
                $user = User::where('email', $email)->first();
                if(!empty($user)) {
                    if((['email' => $email , 'password' => $password])) {
                        if($email == $user->email && $password == $user->password) {
                            Auth::login($user);
                            return response()->json([
                                'status'            => 'Success',
                                'message'           => 'User added successfully.',
                            ], 200);
                        }
                    }
                }
            } else {
                return response()->json([
                    'status'            => 'Success',
                    'message'           => 'User added successfully.',
                ], 200);
            }
        } catch(Exception $e) {
            Log::error($e->getMessage() . "\n" . __FILE__ . ' in ' . __LINE__);
            return response()->json([
                "timestamp" => Carbon::now('UTC')->toDateTimeString(),
                "error"     => "Database Error",
                "message"   => "Unable to unable to register",
            ], 500);
        }
    }

    public function forgotPassword(Request $request) {

        $rules = $request->validate([
            'email'            => 'required',
            'password'         => 'required',
            'confirm_password' => 'required|same:password'
        ]);

        $email = $request->email;
        $pass  = $request->password;
        $confirm = $request->confirm_password;

        $user = User::where('email', $email)->first();
        if($user){
            $users = User::where('email', $email)
                            ->update([
                                'password'          => $request->password,
                                'confirm_password'  => $request->confirm_password,
                            ]);
            return view('auth.login');
        }else{
            return Redirect::back()->withErrors(['email' => 'Invalid email address.']);
        }
    }


    public function logout() {
        Auth::logout(); 
        return redirect('/');
    }
}
