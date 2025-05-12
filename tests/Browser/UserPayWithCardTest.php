<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class UserPayWithCardTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(config('dusk_urls.login'))
                    ->type('email', env('USER_EMAIL'))
                    ->type('password', env('USER_PASSWORD'))
                    ->press('LOG IN')
                    ->assertPathIs('/dashboard')
                    ->assertSee('Profile')

                    ->clickLink('Purchase More Codes')
                    ->pause(2000)

                    ->assertSee('Shop - Online Questionnaires')
                    ->pause(1000)

                    ->clickLink('Add to Cart') 
                    ->pause(1000)

                    ->assertPathIs('/shopping/cart')
                    ->assertSee('Your Shopping Cart')

                    ->clickLink('Checkout')
                    ->pause(2000)
    
                    ->assertSee('Checkout')
    
                    ->press('Pay with Card')
                    ->pause(3000);
        });
    }
}
