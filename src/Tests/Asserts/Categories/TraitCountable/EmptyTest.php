<?php
declare(strict_types=1);

namespace Nicodev\Tests\Asserts\Categories\TraitCountable;

use Exception;
use Nicodev\Asserts\AssertTrait;
use Nicodev\Tests\Resources\ErrorBuilderTrait;
use PHPUnit\Framework\TestCase;

/**
 * Final class EmptyTest
 */
final class EmptyTest extends TestCase
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
             * @return array{}
             */
            public function runOk(): array
            {
                return self::assertEmpty([], $this->error);
            }

            /**
             * Run the assertion is KO for test.
             * @return array{}
             */
            public function runKo(): array
            {
                return self::assertEmpty(['Not empty :('], $this->error);
            }
        };
    }

    public function testMakeAssertionOK(): void
    {
        self::assertSame([], $this->testClass->runOk());
    }

    public function testMakeAssertionKO(): void
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('This assertion fails.');
        $this->testClass->runKo();
    }
}
