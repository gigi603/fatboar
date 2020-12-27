<?php

namespace Tests\Unit\Validation;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CodeValidationTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    /*public function testExample()
    {
        $this->assertTrue(true);
    }*/
    /** @test */
    public function code_validates_ticket_number()
    {
        $this->actingAs(factory(User::class)->create());
        $this->post('gagner', ['numero_ticket' => ''])->assertSessionHasErrors('numero_ticket');
        // $this->post('/gagner', ['numero_ticket' => ''])->assertStatus(302);
        // $this->post('/gagner', ['numero_ticket' => ''])
    }
    /** @test */
    public function code_validates_min_length()
    {
        $this->actingAs(factory(User::class)->create());
        $this->post('gagner', ['numero_ticket' => 'x23456gh'])->assertSessionHasErrors('numero_ticket');
        // $this->post('/gagner', ['numero_ticket' => ''])->assertStatus(302);
        // $this->post('/gagner', ['numero_ticket' => ''])
    }
    /** @test */
    public function code_validates_max_length()
    {
        $this->actingAs(factory(User::class)->create());
        $this->post('gagner', ['numero_ticket' => 'x23456ghx23456gh'])->assertSessionHasErrors('numero_ticket');
        // $this->post('/gagner', ['numero_ticket' => ''])->assertStatus(302);
        // $this->post('/gagner', ['numero_ticket' => ''])
    }
    /** @test */
    public function code_validates_regex()
    {
        $this->actingAs(factory(User::class)->create());
        $this->post('gagner', ['numero_ticket' => '12345qsd]='])->assertSessionHasErrors('numero_ticket');
        // $this->post('/gagner', ['numero_ticket' => ''])->assertStatus(302);
        // $this->post('/gagner', ['numero_ticket' => ''])
    }
}
