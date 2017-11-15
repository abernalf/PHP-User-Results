<?php
/**
 * Created by PhpStorm.
 * User: chinegua
 * Date: 14/11/17
 * Time: 12:15
 */


use PHPUnit\Framework\TestCase;
include __DIR__."/../../src/Entity/Users.php";


class UsersTest extends TestCase
{
    public function testConstructor()
    {
        $user = new Users("Pepe","123","123");

        $this->assertEquals("Pepe",$user->getUsername());
    }

    public function testGetters(){

        $user = new Users("Pepe","123","123");
        $user->setToken("123");
        $user->setEnabled("1");
        $this->assertEquals("123",$user->getEmail());
        $this->assertEquals("123",$user->getPassword());
        $this->assertEquals("123",$user->getToken());
        $this->assertEquals("1",$user->isEnabled());
        $this->assertEquals( ['id' => null,'name' => 'Pepe','mail' => '123','token' => '123','lastLogin' => null,'password' => '123'],$user->jsonSerialize());

    }

}
