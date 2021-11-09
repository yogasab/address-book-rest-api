<?php

namespace Tests\Feature;

use App\Label;
use App\Contact;
use App\ContactLabel;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ContactLabelTest extends TestCase
{
  use RefreshDatabase;
  /**
   * A basic feature test example.
   *
   * @return void
   */
  public function testAddLabelToContacts()
  {
    $this->withoutExceptionHandling();
    $response = $this->post('/api/contacts', $this->dataContact());
    $this->assertCount(1, Contact::all());
    $contact = Contact::first();
    $response = $this->post('/api/labels', $this->dataLabel());
    $this->assertCount(1, Label::all());
    $label = Label::first();
    $response = $this->post("/api/contact-label/" . $contact->id . "/" . "$label->slug");
    $this->assertCount(1, ContactLabel::all());
  }

  public function dataContact()
  {
    return [
      'name' => 'Javi',
      'email' => 'jave@email.com',
      'phone' => '021-123123',
      'notes' => 'Collegues'
    ];
  }

  public function dataLabel()
  {
    return [
      'name' => 'Teman SMA',
      'slug' => 'teman-sma'
    ];
  }
}
