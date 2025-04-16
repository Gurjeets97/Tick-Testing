<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class CreateCodesTypeAdminTest extends DuskTestCase
{
    public function testCreateCodesTypeAdmin(): void
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
                    ->pause(2000)
                    ->assertSee('All Code Types')

                    ->press('Create new code types')
                    ->pause(2000)
                    ->assertPathIs('/code_types/create')
                    ->assertSee('Create Code Type')
                    
                    ->type('name', 'Test Code Type')
                    ->type('description', 'This Code Type was created for Testing.')
                    ->pause(2000)
                    ->select('questionnaire_id', 'Job Fit')
                    ->select('report_template_id', 'Job Fit')
                    
                    ->pause(2000)

                    ->press('Create new code type')
                    ->pause(2000);

        });
    }
}
