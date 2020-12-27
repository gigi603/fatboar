<?php

namespace Tests\Feature;

namespace Tests\Feature\Auth;

use App\Http\Requests\CodeRequest;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App;
use App\Models\User;
use App\Models\Ticket;
use App\Models\Recompense;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use Carbon\Carbon;

class UsersControllerTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_profile_user()
    {
        $user = factory(User::class)->create([
            'password' => bcrypt($password = 'kronos603'),
            'date_naissance' => Carbon::now(),
            'role_id' => 1
        ]);

        $response = $this->actingAs($user)->get('/profile/' . $user->id);

        $response->assertSuccessful();
        $response->assertViewIs('communs.profile');
        $response->assertStatus(200);
    }

    public function test_profile_caissiere()
    {
        $user = factory(User::class)->create([
            'password' => bcrypt($password = 'kronos603'),
            'date_naissance' => Carbon::now(),
            'role_id' => 2
        ]);

        $response = $this->actingAs($user)->get('/profile/' . $user->id);

        $response->assertSuccessful();
        $response->assertViewIs('communs.profile');
        $response->assertStatus(200);
    }

    public function test_profile_manager()
    {
        $user = factory(User::class)->create([
            'password' => bcrypt($password = 'kronos603'),
            'date_naissance' => Carbon::now(),
            'role_id' => 3
        ]);

        $response = $this->actingAs($user)->get('/profile/' . $user->id);

        $response->assertSuccessful();
        $response->assertViewIs('communs.profile');
        $response->assertStatus(200);
    }

    public function test_profile_admin()
    {
        $user = factory(User::class)->create([
            'password' => bcrypt($password = 'kronos603'),
            'date_naissance' => Carbon::now(),
            'role_id' => 4
        ]);

        $response = $this->actingAs($user)->get('/profile/' . $user->id);

        $response->assertSuccessful();
        $response->assertViewIs('communs.profile');
        $response->assertStatus(200);
    }

    public function test_user_can_view_a_participer_form()
    {
        $user = factory(User::class)->create([
            'password' => bcrypt($password = 'kronos603'),
            'date_naissance' => Carbon::now(),
            'role_id' => 1
        ]);
        $response = $this->actingAs($user)->get('/participer');

        $response->assertSuccessful();
        $response->assertViewIs('user.participer');
        $response->assertStatus(200);
    }

    public function test_tickets_user()
    {
        $user = factory(User::class)->create([
            'password' => bcrypt($password = 'kronos603'),
            'date_naissance' => Carbon::now(),
            'role_id' => 1
        ]);

        $response = $this->actingAs($user)->get('/gains');

        $response->assertSuccessful();
        $response->assertViewIs('user.gains');
        $response->assertStatus(200);
    }
}
