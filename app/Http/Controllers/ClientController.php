<?php

namespace App\Http\Controllers;

use App\Exports\ExportClient;
use App\Exports\ExportContactPerson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Client;
use App\Models\ContactPerson;
use Maatwebsite\Excel\Facades\Excel;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $client = Client::all();
        $roleMenus = session('role_menus', collect([]));

            // Check permissions for export action
            $hasExportPermission = $roleMenus->contains(fn($item) => $item->menu_id == 2 && $item->permission_id == 6);
        return view('client',compact('client','hasExportPermission'));
    }

    public function indexContactPerson()
    {
         // Load the 'client' relationship
         $contactPersons = ContactPerson::all();

         $roleMenus = session('role_menus', collect([]));

            // Check permissions for export action
            $hasExportPermission = $roleMenus->contains(fn($item) => $item->menu_id == 2 && $item->permission_id == 6);
         // Pass the data to the view
         return view('contactPersonDetails', compact('contactPersons','hasExportPermission'));
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
        $request->validate([
            'company_name' => 'required|string|max:255', 
            'contact' => 'required|numeric|digits:10',
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
        ]);

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
        $request->validate([
            'contact' => 'required|numeric|digits:10',
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
        ]);

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
        $client = Client::find($id);
        return view('viewPages.viewClient',compact('client'));
    }

    public function showContactPerson(string $id)
    {
        $contactPerson = ContactPerson::find($id);
        return view('viewPages.viewContactPerson', compact('contactPerson'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $client = Client::find($id);
        // dd($user->status);
        return view('update.updateClient', compact('client'));
    }

    public function editContactPerson(string $id)
    {
        $contactPerson = DB::table('contact_persons')->where('id', $id)->first();
        $clients = Client::all(); // Ensure you have the list of clients if it's needed in the view
        return view('update.updateContactPerson', compact('contactPerson', 'clients'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'client_name' => 'required|string|max:255', 
            'contact_number' => 'required|numeric|digits:10',
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
        ]);

        $client = DB::table('client_tables')
            ->where('id', $id)
            ->update([
                'client_name' => $request->client_name,
                'contact_number' => $request->contact_number,
                'email' => $request->email,
                'address' => $request->address,
                'website' => $request->website,

            ]);
        if ($client) {
            return redirect()->route('client.show', $id);
        } else {
            echo "<h2>Data Not Updated.</h2>";
        }
    }

    public function updateContactPerson(Request $request, string $id)
    {
        $request->validate([
            
            'contact_number' => 'required|numeric|digits:10',
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
        ]);

        $contactPerson = DB::table('contact_persons')
            ->where('id', $id)
            ->update([
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'email' => $request->email,
                    'contact_number' => $request->contact_number,
                    'address' => $request->address,

                ]);
        if ($contactPerson) {
            return redirect()->route('contactPerson.show', $id);
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
        return Excel::download(new ExportClient,'client.xlsx');
    }
    public function person_export_excel(){
        return Excel::download(new ExportContactPerson,'contactPerson.xlsx');
    }
    
}
