<?php
declare(strict_types = 1);

namespace Nicodev\Tests\Asserts\TraitComparison;

use Exception;
use Nicodev\Asserts\TraitAssertComparison;
use PHPUnit\Framework\TestCase;

/**
 * Final class StrictNotEqualsTest
 *
 * @category Tests
 * @package Nicodev\Tests\Asserts
 * @subpackage TraitComparison
 *
 * @requires PHP 7.0
 *
 * @author Nicolas Giraud <nicolas.giraud.dev@gmail.com>
 * @copyright (c) 2017 Nicolas Giraud
 * @license MIT
 */
final class StrictNotEqualsTest extends TestCase
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
            use TraitAssertComparison;

            /**
             * Run the assertion is ok for test.
             * @return mixed
             */
            public function runOk()
            {
                return static::assertStrictNotEquals('1', 1, new Exception('This assertion fails.'));
            }

            /**
             * Run the assertion is KO for test.
             * @return mixed
             */
            public function runKo()
            {
                return static::assertStrictNotEquals('1', '1', new Exception('This assertion fails.'));
            }
        };
    }

    public function testMakeAssertionOK()
    {
        static::assertSame('1', $this->testClass->runOk());
    }

    public function testMakeAssertionKO()
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('This assertion fails.');
        $this->testClass->runKo();
    }
}
