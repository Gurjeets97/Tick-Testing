<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class CreateNewGroupsTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testCreateNewGroups(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(config('dusk_urls.login'))
                    ->type('email', env('ADMIN_EMAIL'))
                    ->type('password', env('ADMIN_PASSWORD'))
                    ->press('LOG IN')
                    ->pause(2000)
                    ->assertPathIs('/dashboard')
                    ->assertSee('Profile')
    
                    ->visit(config('dusk_urls.groups'))
                    ->pause(2000) 
                    ->assertSee('All Groups')
                    ->press('Create new group')
                    ->pause(2000)
    
                    ->assertPathIs('/groups/create')
                    ->assertSee('Create new group')
    
                        // ->type('Groups name', 'Test Org ') 
                        // ->pause(2000)
                        // ->type('Pricebook', 'nothingggg' )
                        // ->pause(2000)
                        ->assertSee('Pricebook')
                        ->assertSee('Group Permisions');
                        // ->check('input[value="admin"]')
                        // ->check('input[value="licensed"]')
                        // ->check('input[value="user"]')
                        // ->press('Create new group')
    
                        // ->assertPathIs('/groups');

        });
    }
}
