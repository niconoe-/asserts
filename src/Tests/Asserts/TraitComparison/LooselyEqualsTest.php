<?php
declare(strict_types = 1);

namespace Nicodev\Tests\Asserts\TraitComparison;

use Exception;
use Nicodev\Asserts\AssertTrait;
use PHPUnit\Framework\TestCase;

/**
 * Final class LooselyEqualsTest
 *
 * @category Tests
 * @package Nicodev\Tests\Asserts
 * @subpackage TraitComparison
 *
 * @author Nicolas Giraud <nicolas.giraud.dev@gmail.com>
 * @copyright (c) 2019 Nicolas Giraud
 * @license MIT
 */
final class LooselyEqualsTest extends TestCase
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
             * @return mixed
             */
            public function runOk()
            {
                return static::assertLooselyEquals(true, 1, new Exception('This assertion fails.'));
            }

            /**
             * Run the assertion is KO for test.
             * @return mixed
             */
            public function runKo()
            {
                return static::assertLooselyEquals(1, 0, new Exception('This assertion fails.'));
            }
        };
    }

    public function testMakeAssertionOK(): void
    {
        static::assertTrue($this->testClass->runOk());
    }

    public function testMakeAssertionKO(): void
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('This assertion fails.');
        $this->testClass->runKo();
    }
}
