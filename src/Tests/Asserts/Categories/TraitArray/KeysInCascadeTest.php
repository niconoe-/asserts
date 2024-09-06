<?php
declare(strict_types=1);

namespace Nicodev\Tests\Asserts\Categories\TraitArray;

use Exception;
use Nicodev\Asserts\AssertTrait;
use Nicodev\Tests\Resources\ErrorBuilderTrait;
use PHPUnit\Framework\TestCase;

/**
 * Final class KeysInCascadeTest
 */
final class KeysInCascadeTest extends TestCase
{
    private readonly object $testClass;

    protected function setUp(): void
    {
        $this->testClass = new class()
        {
            use AssertTrait;
            use ErrorBuilderTrait;

            /**
             * Run the assertion is ok for test.
             * @return mixed
             */
            public function runOk(): mixed
            {
                $a = ['b' => ['c' => ['d' => 'bar']]];
                return self::assertKeysInCascade($a, $this->error, 'b', 'c', 'd');
            }

            /**
             * Run the assertion is KO for test.
             * @return mixed
             */
            public function runKo(): mixed
            {
                $a = ['b' => ['c' => ['d' => 'baz']]];
                return self::assertKeysInCascade($a, $this->error, 'b', 'x', 'z');
            }
        };
    }

    public function testMakeAssertionOK(): void
    {
        self::assertSame('bar', $this->testClass->runOk());
    }

    public function testMakeAssertionKO(): void
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('This assertion fails.');
        $this->testClass->runKo();
    }
}
