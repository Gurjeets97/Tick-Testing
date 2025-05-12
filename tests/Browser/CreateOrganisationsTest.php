<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class CreateOrganisationsTest extends DuskTestCase
{
    public function testCreateOrganisations(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(config('dusk_urls.login'))
                    ->type('email', env('ADMIN_EMAIL'))
                    ->type('password', env('ADMIN_PASSWORD'))
                    ->press('LOG IN')
                    ->assertPathIs('/dashboard')
                    ->assertSee('Profile')

                    ->visit(config('dusk_urls.organisations'))
                    ->pause(2000)
                    ->assertPathIs('/organisations')
                    ->assertSee('All Organisations')
                    ->pause(2000) 
                    ->clickLink('Create new Organisation')
                    ->pause(2000)
                    ->assertPathIs('/organisations/create')
                    ->assertSee('Create Organisation')


                    ->type('name', 'Test Org ') 
                    ->pause(2000)
                    
                    ->type('cobranded_wording', 'Test Wording') 
                    ->check('active_organisation') 
                    ->select('parent_organisation', '2')
                    ->press('Create new Organisation') 
                    ->assertPathIs('/organisations')
                     ->assertSee('Test Org')
                     ->pause(4000)
                     ->type('[type="search"]', 'Test Org')
                     ->keys('[type="search"]', '{enter}') 
                     ->pause(3000)

                     ->assertSeeIn('table tbody', 'Test Org');
        });
    }
}
