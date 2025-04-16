<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class SaveLoggeFileTest extends DuskTestCase
{
   
    public function testSaveLoggeFile(): void
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

                    ->visit('https://app-staging.tick.com.au/logger')
                    ->assertSee('System Logger')
                    ->press('CSV')
                    ->pause(1000)
                    ->press('Excel')
                    ->pause(1000)
                    ->press('PDF')
                    ->pause(3000)
                    ->assertSee('System Logger');
        });
    }
}
