<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class EditCodesTypeAdminTest extends DuskTestCase
{
    
    public function testEditCodesTypeAdmin(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('https://app-staging.tick.com.au/login')
                    ->type('email', 'singhgurjeet966+admin@gmail.com')
                    ->type('password', 'fb@$$AC$ign@TURE')
                    ->press('LOG IN')
                    ->pause(2000)
                    ->assertPathIs('/dashboard')
                    ->assertSee('Profile')

                    
                    ->visit('https://app-staging.tick.com.au/code_types')                    
                    ->assertSee('All Code Types')
                    ->pause(2000)

                    
                    ->visit('http://app-staging.tick.com.au/code_types/3/edit')                
                    ->assertSee('Edit Code Type')
                                                  
                    ->pause(2000)

                    ->press('Save code tyep')
                    ->pause(2000);
        });
    }
}
