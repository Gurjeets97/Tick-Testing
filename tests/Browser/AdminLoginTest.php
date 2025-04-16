<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class AdminLoginTest extends DuskTestCase
{
    public function testAdminLogin(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('https://app-staging.tick.com.au/login')
                ->type('email', 'singhgurjeet966+admin@gmail.com')
                ->type('password', 'fb@$$AC$ign@TURE')
                ->press('LOG IN')
                ->assertPathIs('/dashboard');
        });;
    }
}
