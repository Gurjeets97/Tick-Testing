<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class RemoveAssignCodesAdminTest extends DuskTestCase
{
    
    public function testRemoveAssignCodesAdmin(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('https://app-staging.tick.com.au/login')
                    ->type('email', 'singhgurjeet966+admin@gmail.com')
                    ->type('password', 'fb@$$AC$ign@TURE')
                    ->press('LOG IN')
                    ->pause(2000)
                    ->assertPathIs('/dashboard')
                    ->assertSee('Profile')

                    ->visit('https://app-staging.tick.com.au/organisations')
                    ->pause(2000)
                    ->visit('https://app-staging.tick.com.au/organisations/9')
                    ->pause(2000)
                    ->assertPathIs('/organisations/9')
                    ->assertSee('je')

                    ->clickLink('Assign Code')
                    ->pause(2000)
                    ->assertPathBeginsWith('/code/1/organisation/9')
                    ->assertSee('Assign Codes')
                    ->clickLink('Revoke access')
                    ->pause(2000)

                    ->whenAvailable('body', function (Browser $popup) {
                        
                        $popup->pause('1000');
                        $popup->press('OK');
                    })
                    
                    ->assertSee('Assign Codes');
        });
    }
}
