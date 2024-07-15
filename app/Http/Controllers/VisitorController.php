<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visitor;
use App\Models\VisitDetail;
use App\Models\Employee;
use DB;

class VisitorController extends Controller
{
    public function showForm()
    {
        $employees = Employee::all();
        return view('visitor.form', ['employees' => $employees]);
    }

    public function handleForm(Request $request)
    {
        $request->validate([
            'phone' => 'required|numeric|digits:10',
        ]);

        $phone = $request->input('phone');
        $visitor = Visitor::where('phone', $phone)->first();
        $employees = Employee::all();

        // dd($employees);

        if ($visitor) {
            return view('visitor.existing', ['visitor' => $visitor, 'employees' => $employees]);
        } else {
            return view('visitor.new', ['phone' => $phone, 'employees' => $employees]);
        }
    }

    public function update(Request $request)
    {
        $request->validate([
            'phone' => 'required|numeric|digits:10',
            'visited_at' => 'required|date',
            'visiting' => 'required|exists:employees,id',
        ]);
        
        DB::beginTransaction();

        try {
            $visitor = Visitor::where('phone', $request->input('phone'))->first();

            $visitDetail = new VisitDetail();
            $visitDetail->visitor_id = $visitor->id;
            $visitDetail->visited_at = $request->input('visited_at');
            $visitDetail->visiting = $request->input('visiting');
            $visitDetail->save();

            DB::commit();

            return redirect()->route('visitor.showForm')->with('success', 'Visitor details updated.');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('visitor.showForm')->with('error', 'Failed to update visitor details.');
        }
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|numeric|digits:10',
            'email' => 'nullable|email|max:255',
            'company' => 'nullable|string|max:255',
            'visited_at' => 'required|date',
            'visiting' => 'required|exists:employees,id',
        ]);
        DB::beginTransaction();

        try {
            $visitor = new Visitor();
            $visitor->name = $request->input('name');
            $visitor->phone = $request->input('phone');
            $visitor->email = $request->input('email');
            $visitor->company = $request->input('company');
            $visitor->save();

            $visitDetail = new VisitDetail();
            $visitDetail->visitor_id = $visitor->id;
            $visitDetail->visited_at = $request->input('visited_at');
            $visitDetail->visiting = $request->input('visiting');
            $visitDetail->save();

            DB::commit();

            return redirect()->route('visitor.showForm')->with('success', 'New visitor created.');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('visitor.showForm')->with('error', 'Failed to create new visitor.');
        }
    }
}
