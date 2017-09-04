<?php
declare(strict_types = 1);

namespace Nicodev\Tests\Asserts\TraitCountable;

use Exception;
use Nicodev\Asserts\TraitAssertCountable;
use PHPUnit\Framework\TestCase;

/**
 * Final class EmptyTest
 *
 * @category Tests
 * @package Nicodev\Tests\Asserts
 * @subpackage TraitCountable
 *
 * @requires PHP 7.0
 *
 * @author Nicolas Giraud <nicolas.giraud.dev@gmail.com>
 * @copyright (c) 2017 Nicolas Giraud
 * @license MIT
 */
final class EmptyTest extends TestCase
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
            use TraitAssertCountable;

            /**
             * Run the assertion is ok for test.
             * @return bool
             */
            public function runOk(): bool
            {
                return static::assertEmpty([], new Exception('This assertion fails.'));
            }

            /**
             * Run the assertion is KO for test.
             * @return bool
             */
            public function runKo(): bool
            {
                return static::assertEmpty(['Not empty :('], new Exception('This assertion fails.'));
            }
        };
    }

    public function testMakeAssertionOK()
    {
        static::assertTrue($this->testClass->runOk());
    }

    public function testMakeAssertionKO()
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('This assertion fails.');
        $this->testClass->runKo();
    }
}
