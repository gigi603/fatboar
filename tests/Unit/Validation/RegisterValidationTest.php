<?php

namespace Tests\Unit\Request;

namespace Tests\Unit\Auth;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App;
use App\Models\User;
use App\Models\Ticket;

class RegisterValidationTest extends TestCase
{
    // Register form
    /** @test */
    public function register_validates_last_name()
    {
        $this->post('/register', ['nom' => ''])
            ->assertSessionHasErrors('nom');
    }
    /** @test */
    public function register_validates_first_name()
    {
        $this->post('/register', ['prenom' => ''])
            ->assertSessionHasErrors('prenom');
    }
    /** @test */
    public function register_validates_email()
    {
        $this->post('/register', ['email' => ''])
            ->assertSessionHasErrors('email');
    }
    /** @test */
    public function register_validates_password()
    {
        $this->post('/register', ['password' => ''])
            ->assertSessionHasErrors('password');
    }
    /** @test */
    public function register_validates_date_naissance()
    {
        $this->post('/register', ['date_naissance' => ''])
            ->assertSessionHasErrors('date_naissance');
    }

    // public function participer_view()
    // {
    //     $response = $this->action('GET', 'UsersController@particip');
    //     $this->assertResponseOk();
    // }

    // public function gagner_test()
    // {
    //     $this->visit('/gagn')
    //         ->type('vLDYui5Uxy', 'numero_ticket')
    //         ->seeInDatabase('tickets', [
    //             'numero' => 'vLDYui5Uxq'
    //         ]);
    // }
}
