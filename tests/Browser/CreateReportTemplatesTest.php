<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class CreateReportTemplatesTest extends DuskTestCase
{
    public function testCreateReportTemplate(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('https://app-staging.tick.com.au/login')
                    ->type('email', 'singhgurjeet966+admin@gmail.com')
                    ->type('password', 'fb@$$AC$ign@TURE')
                    ->press('LOG IN')
                    ->pause(2000)
                    ->assertPathIs('/dashboard')
                    ->assertSee('Profile')

                    ->visit('https://app-staging.tick.com.au/report_templates')
                    ->pause(2000)
                    ->assertSee('All Templates')

                    ->press('Create new report templates')
                    ->pause(2000)
                    ->assertPathIs('/report_templates/create')
                    ->assertSee('Create Report Template')

                    ->type('title', 'Test Template')
                    ->type('description', 'This template was created using for Test.')
                    ->type('view_name', 'Standard View')
                    ->pause(2000)

                    ->press('Create new report template')
                    ->pause(2000)

                    ->assertPathIs('/report_templates')
                    ->assertSee('All Templates');

        });
    }
}
