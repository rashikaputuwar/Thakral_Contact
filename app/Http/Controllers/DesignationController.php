<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Designation;
use Illuminate\Support\Facades\DB;

class DesignationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $designations = Designation::all(); 
        return view("designation", compact("designations"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("add.addDesignation");
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $designations = DB:: table('designations')
        ->insert([
            'desig_name' => $request->desig_name,
        ]);

        if ($designations) {
            return redirect()->route('designation.index');
        } else {
            echo "<h2>Data Not Added.</h2>";
        }
    }

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
