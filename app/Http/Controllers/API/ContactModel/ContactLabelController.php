<?php

namespace App\Http\Controllers\API\ContactModel;

use App\Contact;
use App\ContactLabel;
use App\Http\Controllers\Controller;
use App\Label;
use Illuminate\Http\Request;

class ContactLabelController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    return ContactLabel::all();
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request, Contact $contact, Label $label)
  {
    return "OK";
  }

  public function storeContactLabel(Contact $contact, Label $label)
  {
    $contactLabel = new ContactLabel();
    $contactLabel->contact_id = $contact->id;
    $contactLabel->label_id = $label->id;
    $contactLabel->save();
    return $contactLabel;
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\ContactLabel  $contactLabel
   * @return \Illuminate\Http\Response
   */
  public function show(ContactLabel $contactLabel)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\ContactLabel  $contactLabel
   * @return \Illuminate\Http\Response
   */
  public function edit(ContactLabel $contactLabel)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\ContactLabel  $contactLabel
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, ContactLabel $contactLabel)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\ContactLabel  $contactLabel
   * @return \Illuminate\Http\Response
   */
  public function destroy(ContactLabel $contactLabel)
  {
    //
  }
}
