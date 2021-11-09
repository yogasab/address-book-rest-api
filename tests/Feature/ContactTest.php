<?php

namespace Tests\Feature;

use App\Contact;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ContactTest extends TestCase
{
  use RefreshDatabase;
  /**
   * A basic feature test example.
   *
   * @return void
   */
  public function testUserCanAccessContacts()
  {
    $response = $this->get('/api/contacts');
    $response->assertStatus(200);
  }

  public function testUserCanAddContacts()
  {
    $this->withoutExceptionHandling();
    $response = $this->post('/api/contacts', $this->data());
    $response->assertOk();
  }

  public function testUserCanShowSingleContacts()
  {
    $this->withoutExceptionHandling();
    $response = $this->post('/api/contacts', $this->data());
    $this->assertCount(1, Contact::all());
    $contact = Contact::first();
    $this->get('/api/contacts/' . $contact->id);
    $response->assertOk();
  }

  public function testUserCanUpdateSingleContacts()
  {
    $this->withoutExceptionHandling();
    $response = $this->post('/api/contacts', $this->data());
    $this->assertCount(1, Contact::all());
    $contact = Contact::first();
    $this->patch('/api/contacts/' . $contact->id, array_merge($this->data(), ['name' => 'Javi Martinez', 'email' => 'javimartinez@gmail.com']));
    $response->assertOk();
  }

  public function testUserCanDeleteSingleContacts()
  {
    $this->withoutExceptionHandling();
    $response = $this->post('/api/contacts', $this->data());
    $this->assertCount(1, Contact::all());
    $contact = Contact::first();
    $this->delete('/api/contacts/' . $contact->id);
    $response->assertOk();
  }

  public function data()
  {
    return [
      'name' => 'Javi',
      'email' => 'jave@email.com',
      'phone' => '021-123123',
      'notes' => 'Collegues'
    ];
  }
}
