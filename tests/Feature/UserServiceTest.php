<?php

namespace Tests\Feature;

use App\Services\UserService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserServiceTest extends TestCase
{
    private UserService $userService;

    protected function setUp(): void
    {
        parent::setUp();
        $this->userService = $this->app->make(UserService::class);
    }

    public function testLogin(): void
    {
        $this->assertTrue($this->userService->login('meisya', 'meisya123'));
    }

    public function testLoginFailed(): void
    {
        $this->assertFalse($this->userService->login('meisya', 'meisya1234'));
    }

    public function testLoginFailedWithEmptyUser(): void
    {
        $this->assertFalse($this->userService->login('', 'meisya123'));
    }

    public function testLoginNotFound(): void
    {
        $this->assertFalse($this->userService->login('admin', 'admin'));
    }

}
