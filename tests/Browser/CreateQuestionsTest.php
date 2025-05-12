<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class CreateQuestionsTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testCreateQuestions(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(config('dusk_urls.login'))
                    ->type('email', env('ADMIN_EMAIL'))
                    ->type('password', env('ADMIN_PASSWORD'))
                    ->press('LOG IN')
                    ->pause(2000)
                    ->assertPathIs('/dashboard')
                    ->assertSee('Profile')

                    ->visit(config('dusk_urls.questions'))

                    ->assertSee('All Questions')
                    ->pause(2000)  
                    ->press('Create new question')
                    ->pause(1000)
                    ->assertSee('Create Question')

                    ->type('title', 'Test Questions') 
                    ->pause(2000)
                    ->type('description', 'Test' )
                    ->pause(2000);
        });
    }
}
