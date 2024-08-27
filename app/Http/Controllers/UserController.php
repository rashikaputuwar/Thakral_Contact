<?php

namespace App\Http\Controllers;

use App\Exports\ExportUser;
use App\Models\Employee;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\add_user;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

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
        // $employees= Employee::all();
        //to display only emp who dont have roles assigned
        $empWithOutRoles = Employee::whereDoesntHave('roles')
        ->get();
        $roles = Role::where('status', 'yes')->get();
        // dd($employees);
        // return view('user_mg.add.addUser', compact('employees','roles'));

        

    //    dd($empWithOutRoles);
        return view('user_mg.add.addUser', compact('empWithOutRoles','roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'username' => 'required|string|max:255',
            'userpassword' => 'required|string|min:8|confirmed',
            'userpassword_confirmation' => 'required|string|min:8',
            'expiry_date' => 'required|date',
            'status' => 'required|string|in:active,inactive,locked',
            'roles' => 'required|array',
            'roles.*' => 'exists:roles,id',
        ]);

        DB::beginTransaction();

        try{

            $hashedPassword = Hash::make($request->userpassword);

        $user = DB::table('add_users')
            ->insertGetId([
                // 'user_id' => $request->userid,
                'password' => $hashedPassword,
                'user_name' => $request->username,
                'employee_id' => $request->employee_id,
                'expiry_date' => $request->expiry_date,
                'status' => $request->status ?? 'active',

            ]);

            foreach ($request->roles as $roleId) {
                DB::table('userroles')->insert([
                    'employee_id' => $request->employee_id,
                    'role_id' => $roleId,
                ]);
            }

            DB::commit();
            return redirect()->route('show.User')->with('success', 'User created successfully with assigned roles!');
        }catch(\Exception $e){
            DB::rollback();
            return redirect()->back()->with('error', 'Error while creating user!');
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
        $data = add_user::find($id);
        // dd($user->status);
        return view('user_mg.edit.userEdit', compact('data'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // $user = DB::table('add_users')->where('id',$id)->get();
    //     $user = DB::table('add_users')->find($id);

    //   return view('user_mg.edit.userEdit',['data'=>$user]);
            $user = DB::table('add_users')
            ->where('id',$id)
            ->update([
                'user_name'=>$request->user_name,
                'expiry_date'=>$request->expiry_date,
                'status'=> $request->status,
                ]);
            if ($user) {
                return redirect()->route('show.User');
                } else {
                    echo "<h2>Data Not Updated.</h2>";
                    }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function export_excel(){
        return Excel::download(new ExportUser,'User.xlsx');
    }
}
