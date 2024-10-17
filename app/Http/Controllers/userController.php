<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Car;
use App\Models\Plan;
use App\Models\Password_reset;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;
class userController extends Controller
{
    public function register(Request $request){
        $data = $request->validate([
            'first_name' => 'required',
            'last_name'  => 'required',
            'email'      => 'required|email|unique:users,email',
            'password'   => 'required|confirmed',

        ]);
        
        $user = DB::table('users')->insert([
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
            'email'      => $request->email,
            'password'   => bcrypt($request->password),
            'created_at' => now(),  
            'updated_at' => now()  
        ]);
        if($user){
            return redirect()->route('login_form');
        }
    }

    public function login(Request $request){
        $credentials = $request->validate([
            
            'email'      => 'required|email',
            'password'   => 'required',

        ]);
        // Check if the email exists in the database
    $user = User::where('email', $credentials['email'])->first();

    if (!$user) {
        // Email does not exist, redirect to signup with a message
        return redirect()->route('signup_form')->withErrors(['email' => 'Account does not exist. Please sign up.']);
    }
        if(Auth::attempt($credentials)){
            return redirect()->route('welcome');
        }else {
            // Invalid credentials, redirect back to login with a message
            return redirect()->route('login_form')->withErrors(['password' => 'Invalid credentials. Please try again.']);
        }
    }

    public function dashboardPage(){
        if(Auth::check()){
            $totalUsers = User::count();
            $totalCars = Car::count();
            $totalPlans = Plan::count();
            return view('welcome',compact('totalUsers','totalCars','totalPlans'));
        }else{
            return redirect()->route('login_form');
        }

    }

    public function logout(){
        Auth::logout();
        return view('login_form');
    }

    public function addUser(Request $req){
        $data = $req->validate([
            'first_name' => 'required',
            'last_name'  => 'required',
            'email'      => 'required|email|unique:users,email', // Validate unique email
            'password'   => 'required|confirmed',
        ]);
        $user = DB::table('users')->insert([
            'first_name' => $req->first_name,
            'last_name'  => $req->last_name,
            'email'      => $req->email,
            'password'   => bcrypt($req->password),
            'created_at' => now(),  
            'updated_at' => now()  
        ]);
        return redirect()->route('show_users');
       
    }
    public function showUser(){
        $data_users = DB::table('users')->get();
        return view('users',compact('data_users'));
    }

    public function forgot_password(){
        return view('forget_password');
    }
    public function otp($email){
        return view('password_verify',['email' => $email]);
    }
    public function reset_password($email){
        return view('reset_password',['email' => $email]);
    }


    public function forget_password_send(Request $request)
    { 
        // Validate the email
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);
        
    
        // Generate a 4-digit OTP
        $otp = rand(1000, 9999);
    
        // Store the OTP in the password_resets table
        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $otp,
            'created_at' => now()
            
        ]);
    
        // Find the user by email
        $user = User::where('email', $request->email)->first();
        if (!$user) {
            // Email does not exist, redirect back with an error message
            return '<h1> Email does not exist </h1>';
        }
        // Send the OTP via email
        Mail::raw("Your OTP for password reset is: $otp", function ($message) use ($user) {
            $message->to($user->email)
                    ->subject('Your Password Reset OTP');
        });
    
        // Redirect to the password verification page with success message

        // return view('password_verify')->with('email', $request->email);
        return redirect('otp/'.$request->email);
      
    }


    public function verifyOTP(Request $request)
    {
        // Combine the OTP fields into a single string
        $otp = $request->otp1 . $request->otp2 . $request->otp3 . $request->otp4;
        // Validate the OTP input and email
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);
        
        // Check if the OTP matches the one stored in the password_resets table
        $record = DB::table('password_resets')->where('email', $request->email)->first();
        
        // dd($otp, $record->token);
        if ($record && $otp == $record->token) {
            return redirect('reset_password/'.$request->email);
        } else {
            return redirect()->back()->withErrors(['otp' => 'Invalid OTP. Please try again.']);
        }
    }
    
    
    public function updatePassword(Request $request)
{
    // Validate the new password
    $request->validate([
        'email' => 'required|email|exists:users,email',
        'password' => 'required|confirmed',
    ]);

    // Update the user's password
    $user = User::where('email', $request->email)->first();
    $user->update(['password' => bcrypt($request->password)]);

    // Optionally, delete the password reset record
    DB::table('password_resets')->where('email', $request->email)->delete();

    // Redirect to login with a success message
    return redirect()->route('login_form');
}

    
    

    
}








