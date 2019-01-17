<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class UserTest extends DuskTestCase
{

    /** @test */
    public function member_cant_assign_user()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                ->type('email','turcotte.evie@example.org')
                ->type('password','secret')
                ->press('Login')
                ->assertSee('You are logged in!')
                ->visit('/teams')
                ->clickLink('Team B')
                ->assertSee('Assign New User');
        });
    }


    /** @test */
    public function team_leader_can_assign_user()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                ->type('email','alex@example.com')
                ->type('password','secret')
                ->press('Login')
                ->assertSee('You are logged in!')
                ->visit('/teams')
                ->clickLink('Team B')
                ->assertDontSee('Assign New User');
        });
    }

}




