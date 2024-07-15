<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\add_user;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = add_user::all(['id', 'user_name','expiry_date','employee_id','status']);
        // return view('role',compact('roles'));
        return view('user_mg.user', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $employees= Employee::all();
        // dd($employees);
        return view('user_mg.add.addUser', ['employees'=> $employees]);
        // return view('user_mg.add.addUsers');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $hashedPassword = Hash::make($request->userpassword);

        $user = DB::table('add_users')
            ->insert([
                // 'user_id' => $request->userid,
                'password' => $hashedPassword,
                'user_name' => $request->username,
                'employee_id' => $request->employee_id,
                'expiry_date' => $request->expiry_date,
                'status' => $request->status ?? 'active',

            ]);
        if ($user) {
            // return redirect('user_mg.user');
            return redirect()->route('show.User');
            // return view('user_mg.user');
            //   echo"<h2>Data Added Successfully.</h2>";
        } else {
            echo "<h2>Data Not Added.</h2>";
        }
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
            $user = add_user::find($id);
            return view('user_mg.view.userView',compact('user'));
            
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = add_user::find($id);
        return view('user_mg.edit.userEdit', ['user' => $user]);
        
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
