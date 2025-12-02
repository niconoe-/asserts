<?php
declare(strict_types=1);

namespace Nicodev\Tests\Asserts\Categories\TraitCountable;

use Exception;
use Nicodev\Asserts\AssertTrait;
use Nicodev\Tests\Resources\ErrorBuilderTrait;
use PHPUnit\Framework\TestCase;

/**
 * Final class CountTest
 */
final class CountTest extends TestCase
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
                $provider = [1, 2, 3, 4, 5];
                return self::assertCount($provider, 5, $this->error);
            }

            /**
             * Run the assertion is KO for test.
             * @return mixed
             */
            public function runKo(): mixed
            {
                $provider = [1, 2, 3, 4, 5];
                return self::assertCount($provider, 1, $this->error);
            }
        };
    }

    public function testMakeAssertionOK(): void
    {
        self::assertSame([1, 2, 3, 4, 5], $this->testClass->runOk());
    }

    public function testMakeAssertionKO(): void
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('This assertion fails.');
        $this->testClass->runKo();
    }
}
