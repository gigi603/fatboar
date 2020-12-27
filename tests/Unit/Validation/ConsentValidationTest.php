<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ConsentValidationTest extends TestCase
{
    use RefreshDatabase;
    /** @test */
    public function consent_validates_age()
    {
        $this->actingAs(factory(User::class)->create());
        $this->post('auth/social/consent', ['majeur' => ''])->assertSessionHasErrors('majeur');
    }
    /** @test */
    public function consent_validates_conditions()
    {
        $this->actingAs(factory(User::class)->create());
        $this->post('auth/social/consent', ['cgu' => ''])->assertSessionHasErrors('cgu');
    }
    /** @test */
    public function consent_validates_newsletter()
    {
        $this->actingAs(factory(User::class)->create());
        $this->post('auth/social/consent', ['newsletter' => ''])->assertSessionHasErrors('newsletter');
    }
}
