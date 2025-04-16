<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class EditOrganisationTest extends DuskTestCase
{
    
    public function testEditOrganisationFromAdminDashboard()
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


                    ->visit('https://app-staging.tick.com.au/organisations')
                    ->pause(2000)
                    ->assertPathIs('/organisations')
                    ->assertSee('All Organisations')
                    ->pause(2000)

                    ->clickLink('Test O')
                    ->pause(2000)
                    ->assertPathIs('/organisations/2')
                    ->assertSee('Test O')

                    ->clickLink('Edit this Organisation')
                    ->pause(2000)
                    ->assertSee('Edit Test O')
                    ->assertPathBeginsWith('/organisations/2/edit')

                    ->press('Save Organisation')
                    ->pause(2000)
                    ->assertPathIs('/organisations')
                    ->assertSee('All Organisations');
        });
    }
}
