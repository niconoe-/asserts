<?php
declare(strict_types=1);

namespace Nicodev\Tests\Asserts\Categories\TraitCountable;

use Exception;
use Nicodev\Asserts\AssertTrait;
use Nicodev\Tests\Resources\ErrorBuilderTrait;
use PHPUnit\Framework\TestCase;

/**
 * Final class NotCountRecursiveTest
 */
final class NotCountRecursiveTest extends TestCase
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
             * @return true
             */
            public function runOk(): true
            {
                $provider = [[1], [2], [3], [4], [5]];
                return self::assertNotCountRecursive($provider, 1, $this->error);
            }

            /**
             * Run the assertion is KO for test.
             * @return true
             */
            public function runKo(): true
            {
                $provider = [[1], [2], [3], [4], [5]];
                return self::assertNotCountRecursive($provider, 10, $this->error);
            }
        };
    }

    public function testMakeAssertionOK(): void
    {
        self::assertTrue($this->testClass->runOk());
    }

    public function testMakeAssertionKO(): void
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('This assertion fails.');
        $this->testClass->runKo();
    }
}
