<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{

    public function index(Request $request)
    {

        $contacts = Contact::when($request->search , function($query) use($request){

            return $query->where('name' , 'like' , '%' .$request->search . '%')
            ->orWhere('email' , 'like' , '%' .$request->search. '%');

        })->latest()->paginate(PAGINATION_COUNT);        

        return view('dashboard.contact.index' ,compact('contacts'));  

    }


    public function create()
    {
          
    }

    public function store(Request $request)
    {
        //
    }

    public function show(contact $contact)
    {
        //
    }

    public function edit(contact $contacts ,$id)
    {

        try {

            $contact = $contacts->where('id' , $id)->get()[0];

            if (isset($contact) && $contact->count() != 0) {
   
               return view('dashboard.contact.edit',compact('contact'));
   
            } else {
   
               $noty = getMessage(__('هنالك خطأ ما برجاي المحاوله لاحقا') ,'warning');
               return redirect()->route('contact.index')->with($noty);
            }
        } catch (\Throwable $th) {

            $noty = getMessage(__('هنالك خطأ ما برجاي المحاوله لاحقا') ,'warning');
            return redirect()->route('contact.index')->with($noty);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(contact $contact)
    {
        //
    }
}
