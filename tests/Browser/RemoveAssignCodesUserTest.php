<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class RemoveAssignCodesUserTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testRemoveAssignCodesUser(): void
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

                    ->clickLink('Manage Codes') 
                    ->pause(2000)
                    ->assertPathIs('/organisations/9')
                    ->assertSee('je')

                    ->type('input[name="codetype_1"]', '1') 
                    ->pause(1000)

                    ->clickLink('Assign Code')
                    ->pause(2000)
                    ->assertPathBeginsWith('/code/1/organisation/9')
                    ->assertSee('Assign Codes')

                    ->pause(2000)
 
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
