<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class AssignCodesAdminTest extends DuskTestCase
{
    public function testAssignCodesAdmin(): void
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
                    ->assertSee('All Organisations')
                    ->visit('https://app-staging.tick.com.au/organisations/9')
                    ->pause(2000)
                    ->assertPathIs('/organisations/9')
                    ->assertSee('je')

                    ->clickLink('Assign Code')
                    ->pause(2000)
                    ->assertPathBeginsWith('/code/1/organisation/9')
                    ->assertSee('Assign Codes')

                    ->type('name', 'Gurjeet Singh')
                    ->type('email', 'singhgurjeet966@gmail.com')
                    ->pause(2000)
                    ->press('Assign code')
                    ->pause(2000)
                    ->assertSee('Assigned codes');              
                
        });
    }
}
