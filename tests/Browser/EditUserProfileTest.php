<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class EditUserProfileTest extends DuskTestCase
{

    public function testEditUserProfile(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('https://app-staging.tick.com.au/login')
                    ->type('email', 'singhgurjeet966+user@gmail.com')
                    ->type('password', 'fb@$$AC$ign@TURE')
                    ->press('LOG IN')
                    ->pause(2000)
                    ->assertPathIs('/dashboard')
                    ->assertSee('Profile')
                    ->pause(2000)

                    ->press('Edit Profile') 
                    ->pause(2000)
                
                    ->assertPathIs('/users/23/edit')
                    ->assertSee('Edit your profile')
                    ->pause(1000)

                    ->press('Save profile') 
                    ->pause(2000)
                    ->assertPathIs('/dashboard') 
                    ->assertSee('Profile');
        });
    }
}
