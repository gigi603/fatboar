<?php

namespace Tests\Feature;

namespace Tests\Feature\Auth;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App;
use App\Models\User;

class RegisterControllerTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_user_can_view_a_register_form()
    {
        $response = $this->get('/register');
        $response->assertStatus(200);
        $response->assertSuccessful();
        $response->assertViewIs('auth.register');
    }

    public function register_creates_and_authenticates_a_user()
    {
        $nom = $this->faker->nom;
        $prenom = $this->faker->prenom;
        $email = $this->faker->safeEmail;
        $password = $this->faker->password(8);
        $date_naissance = $this->faker->date_naissance;
        $telephone = $this->faker->telephone;

        $response = $this->post('register', [
            'nom' => $nom,
            'prenom' => $prenom,
            'email' => $email,
            'date_naissance' => $date_naissance,
            'telephone' => $telephone,
            'password' => $password,
            'password_confirmation' => $password,
        ]);

        $response->assertRedirect(route('home'));

        $user = User::where('email', $email)->where('name', $name)->first();
        $this->assertNotNull($user);

        $this->assertAuthenticatedAs($user);
        $response->assertStatus(200);
    }
}
