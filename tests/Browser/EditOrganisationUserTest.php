<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class EditOrganisationUserTest extends DuskTestCase
{
    
    public function testEditOrganisationUser(): void
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
                    
                    ->press('Manage')
                    ->pause(2000)
                    ->assertPathIs('/organisations')
                    ->assertSee('Your Organisations')
                    ->pause(2000)
                    
                    ->clickLink('je') 
                    ->pause(2000)
                    ->assertPathIs('/organisations/9')
                    ->assertSee('je')

                    ->clickLink('Edit this Organisation') 
                    ->pause(2000)
                    ->assertSee('Edit je')
                    ->assertPathBeginsWith('/organisations/9/edit')

                    ->press('Save Organisation')
                    ->pause(2000)
                    ->assertPathIs('/organisations')
                    ->assertSee('Your Organisations');
        });
    }
}
