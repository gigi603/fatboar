<?php

namespace Tests\Feature;

namespace Tests\Feature\Auth;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App;
use App\Models\User;
use Carbon\Carbon;

class LoginControllerTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_user_can_view_a_login_form()
    {
        $response = $this->get('/login');

        $response->assertSuccessful();
        $response->assertViewIs('auth.login');
    }

    public function test_user_cannot_view_a_login_form_when_authenticated()
    {
        $user = factory(User::class)->make();

        $response = $this->actingAs($user)->get('/login');

        $response->assertRedirect('/');
    }

    public function test_user_can_login_with_correct_credentials()
    {
        $user = factory(User::class)->create([
            'password' => bcrypt($password = 'kronos603'),
            'date_naissance' => Carbon::now(),
            'role_id' => 1
        ]);

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => $password,
            'role_id' => 1
        ]);

        $response->assertRedirect('/participer');
        $this->assertAuthenticatedAs($user);
    }

    public function test_cashier_can_login_with_correct_credentials()
    {
        $user = factory(User::class)->create([
            'password' => bcrypt($password = 'kronos603'),
            'date_naissance' => Carbon::now(),
            'role_id' => 2
        ]);

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => $password,
            'role_id' => 2
        ]);

        $response->assertRedirect('/dashboard/caissiere');
        $this->assertAuthenticatedAs($user);
    }

    public function test_manager_can_login_with_correct_credentials()
    {
        $user = factory(User::class)->create([
            'password' => bcrypt($password = 'kronos603'),
            'date_naissance' => Carbon::now(),
            'role_id' => 3
        ]);

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => $password,
            'role_id' => 3
        ]);

        $response->assertRedirect('/dashboard/manager');
        $this->assertAuthenticatedAs($user);
    }

    public function test_admin_can_login_with_correct_credentials()
    {
        $user = factory(User::class)->create([
            'password' => bcrypt($password = 'kronos603'),
            'date_naissance' => Carbon::now(),
            'role_id' => 4
        ]);

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => $password,
            'role_id' => 4
        ]);

        $response->assertRedirect('/dashboard/admin');
        $this->assertAuthenticatedAs($user);
    }

    public function test_users_cannot_login_with_incorrect_password()
    {
        $user = factory(User::class)->create([
            'date_naissance' => Carbon::now(),
            'password' => bcrypt('kronos603'),
        ]);

        $response = $this->from('/login')->post('/login', [
            'email' => $user->email,
            'password' => 'invalid-password',
        ]);

        $response->assertRedirect('/login');
        $response->assertSessionHasErrors('email');
        $this->assertTrue(session()->hasOldInput('email'));
        $this->assertFalse(session()->hasOldInput('password'));
        $this->assertGuest();
    }
}
