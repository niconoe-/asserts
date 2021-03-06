<?php
declare(strict_types = 1);

namespace Nicodev\Tests\Asserts\TraitType;

use Exception;
use Nicodev\Asserts\AssertTrait;
use PHPUnit\Framework\TestCase;

/**
 * Final class IsTypeOfTest
 *
 * @category Tests
 * @package Nicodev\Tests\Asserts
 * @subpackage TraitType
 *
 * @author Nicolas Giraud <nicolas.giraud.dev@gmail.com>
 * @copyright (c) 2019 Nicolas Giraud
 * @license MIT
 */
final class IsTypeOfTest extends TestCase
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
             * @return bool
             */
            public function runOk(): bool
            {
                $typesAllowed = ['array', 'object', 'integer', 'float'];
                return static::assertIsTypeOf($typesAllowed, 5, new Exception('This assertion fails.'));
            }

            /**
             * Run the assertion is KO for test.
             * @return bool
             */
            public function runKo(): bool
            {
                $typesAllowed = ['array', 'object', 'integer', 'float'];
                return static::assertIsTypeOf($typesAllowed, 'No string', new Exception('This assertion fails.'));
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
