<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class UserProfileTest extends DuskTestCase
{
    
    public function testUserProfile(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('https://app-staging.tick.com.au/login')
                    ->type('email', 'singhgurjeet966+user@gmail.com')
                    ->type('password', 'fb@$$AC$ign@TURE')
                    ->press('LOG IN')
                    ->waitForLocation('/dashboard')
                    ->visit('https://app-staging.tick.com.au/dashboard')
                    ->waitForText('Profile')

                    ->assertSee('Profile')
                    ->assertSee('Gurjeet')
                    ->assertSee('Singh')
                    ->assertSee('singhgurjeet966+user@gmail.com')
                    ->assertSee('04000000')
                    ->assertSee('281 Churchill Rd Prospect, Adelaide, SA,');
        });
    }
}
