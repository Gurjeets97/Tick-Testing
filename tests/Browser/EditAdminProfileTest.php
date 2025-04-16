<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class EditAdminProfileTest extends DuskTestCase
{
    public function testEditAdminProfile(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('https://app-staging.tick.com.au/login')
                    ->type('email', 'singhgurjeet966+admin@gmail.com')
                    ->type('password', 'fb@$$AC$ign@TURE')
                    ->press('LOG IN')
                    ->pause(2000)
                    ->assertPathIs('/dashboard')
                    ->assertSee('Profile')
                    ->pause(2000)

                    ->press('Edit Profile') 
                    ->pause(2000)
                
                    ->assertPathIs('/users/24/edit')
                    ->assertSee('Edit your profile')
                    ->pause(1000)

                    // Update editable fields
                    // ->type('First name', 'Gurjeet')
                    // ->pause(1000)
                    // ->type('Last name', 'Singh')
                    // ->pause(1000)
                    // ->type('Suburb', 'Adelaide')
                    // ->pause(1000)
                    // ->type('State', 'SA')
                    // ->type('Postcode', '5000')
                    // ->select('Country', 'Australia') 
                    // ->select('Organisations', 'user:monique.dingding@firstfocus.com.au') 

                    ->pause(1000)
                    
                    // ->scrollIntoView('Save profile')                  
                    ->press('Save profile') 
                    ->pause(2000)
                    ->assertPathIs('/users/24') 
                    ->assertSee('Profile');
        });
    }
}
