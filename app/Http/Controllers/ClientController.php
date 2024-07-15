<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Client;
use App\Models\ContactPerson;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $client = Client::all();
        return view('client',compact('client'));
    }

    public function indexContactPerson()
    {
         // Load the 'client' relationship
         $contactPersons = ContactPerson::all();

         // Pass the data to the view
         return view('contactPersonDetails', compact('contactPersons'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function createClient()
    {
        return view('add.addClient');
    }
    public function createContact()
    {
        $clients = Client::all();
        // dd($clients);
        return view('add.addContactPerson',compact('clients'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeClient(Request $request)
    {
        

        $client = DB::table('client_tables')
            ->insert([
                'client_name' => $request->company_name,
                'email' => $request->email,
                'contact_number' => $request->contact,
                'address' => $request->address,
                'website' => $request->website,
            ]);
        if ($client) {
            return redirect()->route('client.index');
        } else {
            echo "<h2>Data Not Added.</h2>";
        }
    }

    public function storeContactPerson(Request $request)
    {
        

        $contactPerson = DB::table('contact_persons')
            ->insert([
                'client_id' => $request->client_id,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'contact_number' => $request->contact,
                'address' => $request->address,
                
            ]);
        if ($contactPerson) {
            return redirect()->route('contactPerson.index');
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
