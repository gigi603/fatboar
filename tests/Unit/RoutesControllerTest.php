<?php

namespace Tests\Unit;

use Tests\TestCase;

class RoutesControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    /*public function testWelcomeRoute()
    {
        $response = $this->call('GET', '/')->assertStatus(200);

        $response->assertSuccessful();
        $response->assertViewIs('welcome');
    }*/


    public function testContactRoute()
    {
        $response = $this->call('GET', '/contact')->assertStatus(200);

        $response->assertSuccessful();
        $response->assertViewIs('contact');
    }

    public function testCguRoute()
    {
        $response = $this->call('GET', '/cgu')->assertStatus(200);

        $response->assertSuccessful();
        $response->assertViewIs('cgu');
    }

    public function testPolitiqueRoute()
    {
        $response = $this->call('GET', '/politique')->assertStatus(200);

        $response->assertSuccessful();
        $response->assertViewIs('politique');
    }

    public function testFaqRoute()
    {
        $response = $this->call('GET', '/faq')->assertStatus(200);
        $response->assertSuccessful();
        $response->assertViewIs('faq');
    }
}
