<?php
declare(strict_types = 1);

namespace Nicodev\Tests\Asserts\TraitObject;

use Exception;
use Nicodev\Asserts\TraitAssertObject;
use PHPUnit\Framework\TestCase;
use stdClass;

/**
 * Final class ObjectNotNullTest
 *
 * @category Tests
 * @package Nicodev\Tests\Asserts
 * @subpackage TraitObject
 *
 * @requires PHP 7.0
 *
 * @author Nicolas Giraud <nicolas.giraud.dev@gmail.com>
 * @copyright (c) 2017 Nicolas Giraud
 * @license MIT
 */
final class ObjectNotNullTest extends TestCase
{
    /**
     * @var object anonymous class
     * @method runOk
     * @method runKo
     */
    private $testClass;

    public function setUp()
    {
        $this->testClass = new class()
        {
            use TraitAssertObject;

            /**
             * Run the assertion is ok for test.
             * @return mixed
             */
            public function runOk()
            {
                return static::assertObjectNotNull(new stdClass(), new Exception('This assertion fails.'));
            }

            /**
             * Run the assertion is KO for test.
             * @return mixed
             */
            public function runKo()
            {
                return static::assertObjectNotNull(null, new Exception('This assertion fails.'));
            }
        };
    }

    public function testMakeAssertionOK()
    {
        static::assertInstanceOf(stdClass::class, $this->testClass->runOk());
    }

    public function testMakeAssertionKO()
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('This assertion fails.');
        $this->testClass->runKo();
    }
}
