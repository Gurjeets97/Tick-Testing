<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class EditReportTemplatesTest extends DuskTestCase
{    
    public function testEditReportTemplates(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('https://app-staging.tick.com.au/login')
                    ->type('email', 'singhgurjeet966+admin@gmail.com')
                    ->type('password', 'fb@$$AC$ign@TURE')
                    ->press('LOG IN')
                    ->pause(2000)
                    ->assertPathIs('/dashboard')

                    ->visit('https://app-staging.tick.com.au/report_templates')
                    ->pause(2000)
                    ->assertSee('All Templates')

                    ->visit('https://app-staging.tick.com.au/report_templates/21/edit')
                    ->pause(2000)
                    ->assertPathContains('/report_templates/21/edit') 
                    ->assertSee('Edit Report Template')
                    ->assertInputValue('title', 'Test Template')

                    ->type('description', 'This template was created for Test.')
                    ->pause(1000)

                    ->press('Save report template')
                    ->pause(2000)

                    ->assertPathIs('/report_templates')
                    ->assertSee('Test Template');
        });
    }
}
