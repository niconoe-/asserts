<?php
declare(strict_types = 1);

namespace Nicodev\Tests\Asserts;

use Exception;
use Nicodev\Asserts\AssertTrait;
use PHPUnit\Framework\TestCase;

/**
 * Final class AssertTraitTest
 *
 * @category Tests
 * @package Nicodev\Tests\Asserts
 *
 * @author Nicolas Giraud <nicolas.giraud.dev@gmail.com>
 * @copyright (c) 2019 Nicolas Giraud
 * @license MIT
 */
final class AssertTraitTest extends TestCase
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
            use AssertTrait;

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

    public function testMakeAssertionOK(): void
    {
        $this->testClass->runOk();
        static::assertTrue(true);
    }

    public function testMakeAssertionKO(): void
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('This assertion fails.');
        $this->testClass->runKo();
    }
}
