<?php
/**
 * Created by PhpStorm.
 * User: chinegua
 * Date: 15/11/17
 * Time: 12:47
 */


include __DIR__."/../../src/Entity/Results.php";
include __DIR__."/../../src/Entity/Users.php";

use PHPUnit\Framework\TestCase;

class ResultsTest extends TestCase
{

    public function testConstructor()
    {
        $user = new Users("Pepe","123","123");

        $result = new Results("288",$user);

        $this->assertEquals("288",$result->getResult());
        $this->assertEquals("Pepe",$result->getUsers()->getUsername());
    }



}
