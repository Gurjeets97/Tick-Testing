<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class SaveOrganizationDataAdminTest extends DuskTestCase
{
    public function testSaveOrganizationDataAdmin(): void
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
                    ->pause(500)
                    ->press('Copy')
                    ->pause(2000)
                    ->press('CSV')
                    ->pause(1000)
                    ->press('Excel')
                    ->pause(1000)
                    ->press('PDF')
                    ->pause(2000)
                    ->assertSee('All Organisations');
        });
    }
}
