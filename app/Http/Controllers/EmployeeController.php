<?php

namespace App\Http\Controllers;

use App\Exports\ExportEmployee;
use App\Models\{Department, Designation, Employee};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;


class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::paginate(2);
        $roleMenus = session('role_menus', collect([]));

            // Check permissions for export action
            $hasExportPermission = $roleMenus->contains(fn($item) => $item->menu_id == 2 && $item->permission_id == 6); // Adjust the permission_id as needed
        return view('employeeDetails', compact('employees', 'hasExportPermission'));
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
            // 'emp_code' => 'required|string|max:255', 
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
            'midname' =>'nullable|string|max:255',
            'last_name' => 'required|string|max:255',
            'gender' => 'required|string|in:Female,Male,Others',
            'department' => 'required|exists:departments,id',
            'designation' => 'required|exists:designations,id',
            // 'dob' => 'required|date',
            'dob' => ['required', 'date', 'before:'.now()->subYears(19)->toDateString()],
            'joining_date' => 'required|date',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Converting the uploaded file to binary data
        $photoBlob = null;
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $photoBlob = file_get_contents($file->getRealPath()); // Get file content as binary data
        }

        // Create the employee record
        $employees = Employee::create([
            // 'emp_code' => $request->emp_code,
            'fname' => $request->first_name,
            'midname' => $request->mid_name,
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
        $request->validate([
            // 'emp_code' => 'required|string|max:255', 
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
            'mid_name' =>'nullable|string|max:255',
            'last_name' => 'required|string|max:255',
            'gender' => 'required|string|in:Female,Male,Others',
            'department' => 'required|exists:departments,id',
            'designation' => 'required|exists:designations,id',
            // 'dob' => 'required|date',
            'dob' => ['required', 'date', 'before:'.now()->subYears(19)->toDateString()],
            'joining_date' => 'required|date',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

         // Convert the uploaded file to binary data
            $photoBlob = null;
            if ($request->hasFile('photo')) {
                $file = $request->file('photo');
                $photoBlob = file_get_contents($file->getRealPath()); // Get file content as binary data
            }
        $employees = DB::table('employees')
        ->where('id',$id)
        ->update([
            // 'emp_code'=>$request->emp_code,
            'fname'=>$request->first_name,
            'midname' => $request->midname,
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

    public function export_excel(){
        return Excel::download(new ExportEmployee,'Employee.xlsx');
    }
    
    public function search(Request $request)
{
    $request->validate([
        'search' => 'nullable|string|max:255',
    ]);

    $searchTerm = $request->input('search');

    $employees = Employee::where(function($query) use ($searchTerm) {
        $query->where('fname', 'LIKE', "%{$searchTerm}%")
              ->orWhere('midname', 'LIKE', "%{$searchTerm}%")
              ->orWhere('lname', 'LIKE', "%{$searchTerm}%")
              ->orWhere('personal_contact', 'LIKE', "%{$searchTerm}%")
              ->orWhere('email', 'LIKE', "%{$searchTerm}%");
    })
    ->with('departments', 'designations') // Eager load related models
    ->paginate(10); // Adjust pagination as needed

    $roleMenus = session('role_menus', collect([]));
    $hasExportPermission = $roleMenus->contains(fn($item) => $item->menu_id == 2 && $item->permission_id == 6); // Adjust the permission_id as needed

    return view('employeeDetails', compact('employees', 'hasExportPermission'));
}


}
