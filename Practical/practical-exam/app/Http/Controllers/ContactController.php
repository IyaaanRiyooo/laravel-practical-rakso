<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\ContactImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Contact;

class ContactController extends Controller
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function index()
    {
        $contacts = Contact::get();
  
        return view('contacts', compact('contacts'));
    }
        
    /**
    * @return \Illuminate\Support\Collection
    */
       
    /**
    * @return \Illuminate\Support\Collection
    */
    public function import() 
    {
        Excel::import(new ContactImport,request()->file('file'));
        return back();
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'mobile_number' => 'required|string|unique:contacts,mobile_number,'.$id,
            'company_name' => 'required|string|max:255',
        ]);

        $contact = Contact::find($id);
        $contact->title = $request->input('title');
        $contact->first_name = $request->input('first_name');
        $contact->last_name = $request->input('last_name');
        $contact->mobile_number = $request->input('mobile_number');
        $contact->company_name = $request->input('company_name');
        $contact->save();

        return redirect()->back()->with('success', 'contact details updated successfully');
    }
}