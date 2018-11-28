<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        /** @var $contacts Contact Grouped collection of contacts by first letter of last name */
        $contacts = json_encode(Contact::filter($request->all())->get()->sortBy('last_name')->groupBy(function ($item, $key) {
            return substr($item['last_name'], 0, 1);
        }));

        /** If the request is an ajax call, no view returned only contacts */
        if (request()->ajax()) {
            return $contacts;
        }

        return view('contacts.index', compact('contacts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ContactRequest|Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContactRequest $request)
    {
        $contact = Contact::create($request->validated());

        if (request()->ajax()) {
            $contacts = json_encode(Contact::filter($request->all())->get()->sortBy('last_name')->groupBy(function ($item, $key) {
                return substr($item['last_name'], 0, 1);
            }));

            return $contacts;
        }

        return redirect()->route('contacts.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ContactRequest|Request $request
     * @param Contact $contact
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function update(ContactRequest $request, Contact $contact)
    {
        $contact->update($request->validated());

        if (request()->ajax()) {
            $contacts = json_encode(Contact::filter($request->all())->get()->sortBy('last_name')->groupBy(function ($item, $key) {
                return substr($item['last_name'], 0, 1);
            }));

            return $contacts;
        }

        return redirect()->route('contacts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
