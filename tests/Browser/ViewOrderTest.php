<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ViewOrderTest extends DuskTestCase
{
    
    public function testViewOrder(): void
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

                    ->visit('https://app-staging.tick.com.au/order')
                    ->assertSee('List of Orders')
                    ->pause(2000)
                    ->press('View')
                    ->pause(2000)
                    ->assertPathIs('/order/1')
                    ->assertSee('Thank you for your order');


        });
    }
}
