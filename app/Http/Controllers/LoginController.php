<?php

namespace App\Http\Controllers;

use App\Models\add_user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('login');
    }

    /**
     * Show the form for creating a new resource.
     */
    // public function check(Request $request)
    // {
    //     // Validate the request data
    // $request->validate([
    //     'user_name' => 'required|string',
    //     'password' => 'required|string',
    // ]);
    
    // // Retrieve the user by username
    // $user = add_user::where('user_name', $request->user_name)->first();

    

    // // Check if user exists and the password is correct
    // if ($user && Hash::check($request->password, $user->password)) {
    //     // Authentication passed
    //     Auth::login($user);
    //     return redirect()->route('welcomePage');
    // } else {
    //     // Authentication failed
    //     return view('login')->withErrors('Invalid Username or password');
    // }
    // }

    public function loginUser(Request $request){
        $credentials = $request->validate([
            'user_name' => 'required|string',
            'password' => 'required|string',
        ]);

        if(Auth::attempt($credentials)){
            return redirect()->route('dashboard');
        }
    }


    public function dashboardPage(){
        return view('welcome');
        // if(Auth::check()){
        //     return view('welcome');
        // }
        // else{
        //     return redirect()->route('login.index');
        // }
    }

    public function logout(){

        Auth::logout();
        return redirect()->route('login.index');
    }
    // public function isLoggedIn()
    // {
    
    //     if (Auth::check()) {
    //         // The user is logged in
    //         $user = Auth::user(); // Correct method to get the authenticated user
    //         return response()->json(['message' => 'User is logged in', 'user' => $user], 200);
    //     } else {
    //         // The user is not logged in
    //         return response()->json(['message' => 'User is not logged in'], 401);
    //     }
    // }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
