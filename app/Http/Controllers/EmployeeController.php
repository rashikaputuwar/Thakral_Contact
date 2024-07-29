<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Designation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Employee;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::all();
        return view('employeeDetails', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $designations = Designation::all();
        $departments = Department ::all();
        return view('add.addEmployee', ['designations' => $designations],['departments' => $departments]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'emp_code' => 'required|string|max:255', 
            'first_name' => 'required|string|max:255',
            'personal_contact' => 'required|numeric|digits:10',
            'office_contact' => 'nullable|string|max:255',
           'email' => [
                'nullable',
                'email',
                'max:255',
                function ($attribute, $value, $fail) {
                    if (strpos($value, '@') === false || strpos($value, '.') === false) {
                        $fail('The ' . $attribute . ' must contain both "@" and "." characters.');
                    }
                }
            ],
            'last_name' => 'required|string|max:255',
            'gender' => 'required|string|in:Female,Male,Others',
            'department' => 'required|exists:departments,id',
            'designation' => 'required|exists:designations,id',
            'dob' => 'required|date',
            'joining_date' => 'required|date',
            // 'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle the file upload and blob creation
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $photoBlob = $file->store('employee_photos', 'public'); // Store the file and get the paths
        }

        // Create the employee record
        $employees = Employee::create([
            'emp_code' => $request->emp_code,
            'fname' => $request->first_name,
            'lname' => $request->last_name,
            'email'=> $request->email,
            'gender' => $request->gender,
            'personal_contact'=> $request->personal_contact,
            'office_contact'=> $request->office_contact,
            // 'extention_contact'=> $request->extention_contact,
            'dept_id' => $request->department,
            'desig_id' => $request->designation,
            'dob' => $request->dob,
            'temp_address' => $request->temp_address,
            'perm_address' => $request->perm_address,
            'join_date' => $request->joining_date,
            'photo_blob' => $photoBlob ?? null, // Store the file path or blob data here
        ]);

        if ($employees) {
            return redirect()->route('employee.index'); // Assuming you have a route named 'employee.index' for listing employees
        } else {
            return back()->withInput()->with('error', 'Failed to add employee');
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $employee = Employee::find($id);
        return view('viewPages.viewEmployee',compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $employee = Employee::find($id);
        // dd($user->status);
        return view('update.updateEmployee', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
        $employees = DB::table('employees')
        ->where('id',$id)
        ->update([
            'emp_code'=>$request->emp_code,
            'fname'=>$request->first_name,
            'lname'=>$request->last_name,
            'email'=>$request->email,
            'gender'=>$request->gender,
            'personal_contact'=>$request->personal_contact,
            'office_contact'=>$request->office_contact,
            'temp_address'=>$request->temp_address,
            'perm_address'=>$request->perm_address,
            'dept_id'=>$request->department,
            'desig_id'=>$request->designation,
            'dob'=>$request->dob,
            'join_date'=>$request->joining_date,
            
            ]);
        if ($employees) {
            return redirect()->route('employee.show',$id);
            } 
        else{
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
}
