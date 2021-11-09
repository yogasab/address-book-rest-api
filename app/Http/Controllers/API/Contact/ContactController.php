<?php

namespace App\Http\Controllers\API\Contact;

use App\Contact;
use App\Http\Controllers\Controller;
use App\Http\Requests\Contact\ContactRequest;
use App\Http\Requests\Contact\UpdateContactRequest;
use App\Http\Resources\Contact\ContactResource;
use App\Http\Resources\Label\LabelResource;
use App\Label;
use Illuminate\Http\Request;

class ContactController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    return ContactResource::collection(Contact::latest()->get());
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(ContactRequest $request)
  {
    $validatedData = $request->all();
    $contact = Contact::create($validatedData);
    return response()->json([
      'success' => true,
      'contact' => new ContactResource($contact),
      'message' => 'Contact created successfully'
    ]);
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Contact  $contact
   * @return \Illuminate\Http\Response
   */
  public function show(Contact $contact)
  {
    return new ContactResource($contact);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Contact  $contact
   * @return \Illuminate\Http\Response
   */
  public function update(UpdateContactRequest $request, Contact $contact)
  {
    $validatedData = $request->all();
    $contact->update($validatedData);
    return new ContactResource($contact);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Contact  $contact
   * @return \Illuminate\Http\Response
   */
  public function destroy(Contact $contact)
  {
    $contact->delete();
    return response()->json([
      'message' => 'Contact deleted successfully'
    ]);
  }

  public function query(Request $request)
  {
    $query = Contact::query();
    $queryLabel = Label::query();
    if ($q = $request->input('q')) {
      $query->whereRaw("name LIKE '%" . $q . "%'")
        ->orWhereRaw("email LIKE '%" . $q . "%'")
        ->orWhereRaw("phone LIKE '%" . $q . "%'")
        ->orWhereRaw("notes LIKE '%" . $q . "%'");
    }
    if ($label = $request->input('label')) {
      $queryLabel->whereRaw("slug LIKE '%" . $label . "%'");
    }
    return [
      'labels' => LabelResource::collection($queryLabel->latest()->get()),
      'contacts' => ContactResource::collection($query->latest()->get())
    ];
  }
}
