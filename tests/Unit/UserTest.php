<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\User;

class UserTest extends TestCase
{
    use WithFaker;
    use RefreshDatabase;
    
    public function setUp(): void {
        parent::setUp();
        $this->data = ['name' => $this->faker->name, 'email' => $this->faker->email, 'password' => $this->faker->password];
    }
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $this->assertTrue(true);
    }

    public function testHelloWorld() {
        $this->assertTrue(true);
        $this->assertFalse(false);
        $this->assertNotEmpty(['hello']);
        $this->assertEquals(true, true);
    }
    
    public function testSaveData()
    {
        $user = factory(User::class)->create($this->data);
        $this->assertNotEmpty($user);
        return $user;
    }

   
    public function testGetUserByEmail()
    {
        $data = User::create($this->data);
        $object = new User();
        $data = $object->getUserByEmail($data['email']);
//        print_r($data);exit;
        $this->assertNotEmpty($data);
    }

}
