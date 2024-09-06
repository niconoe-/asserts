<?php
declare(strict_types=1);

namespace Nicodev\Tests\Asserts\Categories\TraitArray;

use Exception;
use Nicodev\Asserts\AssertTrait;
use Nicodev\Tests\Resources\ErrorBuilderTrait;
use PHPUnit\Framework\TestCase;

/**
 * Final class FirstExistsTest
 */
final class FirstExistsTest extends TestCase
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
             * @return string
             */
            public function runOk(): string
            {
                return self::assertFirstExists(['first', 'last'], $this->error);
            }

            /**
             * Run the assertion is KO for test.
             * @return null
             */
            public function runKo(): null
            {
                return self::assertFirstExists([], $this->error);
            }
        };
    }

    public function testMakeAssertionOK(): void
    {
        self::assertSame('first', $this->testClass->runOk());
    }

    public function testMakeAssertionKO(): void
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('This assertion fails.');
        $this->testClass->runKo();
    }
}
