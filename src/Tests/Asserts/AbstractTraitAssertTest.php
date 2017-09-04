<?php
declare(strict_types = 1);

namespace Nicodev\Tests\Asserts;

use Exception;
use Nicodev\Asserts\AbstractTraitAssert;
use PHPUnit\Framework\TestCase;

/**
 * Final class AbstractTraitAssertTest
 *
 * @category Tests
 * @package Nicodev\Tests\Asserts
 *
 * @requires PHP 7.0
 *
 * @author Nicolas Giraud <nicolas.giraud.dev@gmail.com>
 * @copyright (c) 2017 Nicolas Giraud
 * @license MIT
 */
final class AbstractTraitAssertTest extends TestCase
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
            use AbstractTraitAssert;

            /**
             * Run the assertion is ok for test.
             */
            public function runOk(): void
            {
                static::makeAssertion(true, new Exception('This assertion fails.'));
            }

            /**
             * Run the assertion is KO for test.
             */
            public function runKo(): void
            {
                static::makeAssertion(false, new Exception('This assertion fails.'));
            }
        };
    }

    public function testMakeAssertionOK()
    {
        $this->testClass->runOk();
        static::assertTrue(true);
    }

    public function testMakeAssertionKO()
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('This assertion fails.');
        $this->testClass->runKo();
    }
}
