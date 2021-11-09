<?php

namespace Tests\Feature;

use App\Label;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LabelTest extends TestCase
{
  use RefreshDatabase;
  /**
   * A basic feature test example.
   *
   * @return void
   */
  public function testUserCanAccessLabels()
  {
    $response = $this->get('/api/labels');
    $response->assertStatus(200);
  }

  public function testUserCanAddLabel()
  {
    $this->withoutExceptionHandling();
    $response = $this->post('/api/labels', $this->data());
    $this->assertCount(1, Label::all());
    $response->assertStatus(201);
  }

  public function testUserCanShowSingleContact()
  {
    $this->withoutExceptionHandling();
    $response = $this->post('/api/labels', $this->data());
    $this->assertCount(1, Label::all());
    $labels = Label::first();
    $this->get('/api/labels/' . $labels->slug);
    $response->assertStatus(201);
  }

  public function testUserCanUpdateSingleLabels()
  {
    $this->withoutExceptionHandling();
    $response = $this->post('/api/labels', $this->data());
    $this->assertCount(1, Label::all());
    $labels = Label::first();
    $this->patch('/api/labels/' . $labels->slug, array_merge($this->data(), ['name' => 'Teman Kantor', 'slug' => 'teman-kantor']));
    $response->assertStatus(201);
  }

  public function testUserCanDeleteSingleLabels()
  {
    $this->withoutExceptionHandling();
    $response = $this->post('/api/labels', $this->data());
    $this->assertCount(1, Label::all());
    $labels = Label::first();
    $this->delete('/api/labels/' . $labels->slug, $this->data());
    $response->assertStatus(201);
  }

  public function data()
  {
    return [
      'name' => 'Teman SMA',
      'slug' => 'teman-sma'
    ];
  }
}
