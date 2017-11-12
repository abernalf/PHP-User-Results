<?php   // tests/Entity/ResultTest.php

namespace MiW\Results\Tests\Entity;

use MiW\Results\Entity\Result;
use MiW\Results\Entity\User;

/**
 * Class ResultTest
 *
 * @package MiW\Results\Tests\Entity
 */
class ResultTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var User $user
     */
    protected $user;

    /**
     * @var Result $result
     */
    protected $result;

    const USERNAME = 'uSeR ñ¿?Ñ';
    const POINTS = 2017;
    /**
     * @var \DateTime $_time
     */
    private $_time;


    /**
     * Sets up the fixture.
     * This method is called before a test is executed.
     *
     * @return void
     */
    protected function setUp()
    {
        $this->user = new User();
        $this->user->setUsername(self::USERNAME);
        $this->_time = new \DateTime('now');
        $this->result = new Result(
            self::POINTS,
            $this->user,
            $this->_time
        );
    }

    /**
     * Implement testConstructor
     *
     * @covers \MiW\Results\Entity\Result::__construct()
     * @covers \MiW\Results\Entity\Result::getId()
     * @covers \MiW\Results\Entity\Result::getResult()
     * @covers \MiW\Results\Entity\Result::getUser()
     * @covers \MiW\Results\Entity\Result::getTime()
     *
     * @return void
     */
    public function testConstructor()
    {
        self::markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    /**
     * Implement testGet_Id().
     *
     * @covers \MiW\Results\Entity\Result::getId()
     * @return void
     */
    public function testGet_Id()
    {
        self::markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    /**
     * Implement testUsername().
     *
     * @covers \MiW\Results\Entity\Result::setResult
     * @covers \MiW\Results\Entity\Result::getResult
     * @return void
     */
    public function testResult()
    {
        self::markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    /**
     * Implement testUser().
     *
     * @covers \MiW\Results\Entity\Result::setUser()
     * @covers \MiW\Results\Entity\Result::getUser()
     * @return void
     */
    public function testUser()
    {
        self::markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    /**
     * Implement testTime().
     *
     * @covers \MiW\Results\Entity\Result::setTime
     * @covers \MiW\Results\Entity\Result::getTime
     * @return void
     */
    public function testTime()
    {
        self::markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    /**
     * Implement testTo_String().
     *
     * @covers \MiW\Results\Entity\Result::__toString
     * @return void
     */
    public function testTo_String()
    {
        self::markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    /**
     * Implement testJson_Serialize().
     *
     * @covers \MiW\Results\Entity\Result::jsonSerialize
     * @return void
     */
    public function testJson_Serialize()
    {
        self::markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }
}
