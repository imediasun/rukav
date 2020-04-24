<?php

namespace Tests\Feature\Auth;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class LoginTest extends TestCase
{

    //use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
   /* public function testExample()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }*/


    public function test_user_can_view_an_admin_login_form()
    {
        $response = $this->get('/admin/login');
        $response->assertSuccessful();
        $response->assertViewIs('auth.admin-login');
    }

    public function test_user_cannot_view_an_admin_login_form_when_authenticated()
    {

        $this->withoutMiddleware();
        $user = \App\User::where('email','imediasun@gmail.com')->first();
        $response = $this->from(route('admin.login'))->post(route('admin.login.submit'), [
            'email'    => $user->email,
            'password' => 'sunimedia',
        ]);
        $this->assertCredentials(array ('email'    => 'imediasun@gmail.com',
            'password' => 'sunimedia',), $guard = 'admin');
        $this->assertAuthenticatedAs($user, $guard = 'admin');
        $response->assertRedirect(route('admin.dashboard'));

    }

    public function test_user_cannot_login_with_incorrect_password()
    {
        $user = factory(\App\User::class)->create([
            'password' => bcrypt('i-love-laravel'),
            'active'=>1
        ]);

        $response = $this->from(route('admin.login'))->post(route('admin.login.submit'), [
            'email' => $user->email,
            'password' => 'invalid-password',
        ]);

        $response->assertRedirect('/admin/login');
        //$response->assertSessionHasErrors('password');
        $this->assertTrue(session()->hasOldInput('email'));
        $this->assertFalse(session()->hasOldInput('password'));
        $this->assertGuest();
    }


    public function test_remember_me_functionality()
    {
        $this->withoutMiddleware();
        $user = \App\User::where('email','imediasun@gmail.com')->first();

        $response = $this->post(route('admin.login.submit'), [
            'email' => $user->email,
            'password' => 'sunimedia',
            'remember'=>'on'
        ]);
        $this->assertCredentials(array ('email'    => 'imediasun@gmail.com',
            'password' => 'sunimedia',), $guard = 'admin');
        $this->assertAuthenticatedAs($user, $guard = 'admin');
        $response->assertRedirect(route('admin.dashboard'));
        // cookie assertion goes here
        $this->assertAuthenticatedAs($user,$guard = 'admin');
        $response->assertCookie(\Auth::guard()->getRecallerName(), vsprintf('%s|%s|%s', [
            $user->id,
            $user->getRememberToken(),
            $user->password,
        ]));
    }
}
