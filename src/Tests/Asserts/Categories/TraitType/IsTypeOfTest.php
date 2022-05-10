<?php
declare(strict_types=1);

namespace Nicodev\Tests\Asserts\Categories\TraitType;

use Exception;
use Nicodev\Asserts\AssertTrait;
use Nicodev\Tests\Resources\ErrorBuilderTrait;
use PHPUnit\Framework\TestCase;

/**
 * Final class IsTypeOfTest
 */
final class IsTypeOfTest extends TestCase
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
             * @return bool
             */
            public function runOk(): bool
            {
                $typesAllowed = ['array', 'object', 'integer', 'float'];
                return self::assertIsTypeOf($typesAllowed, 5, $this->error);
            }

            /**
             * Run the assertion is KO for test.
             * @return bool
             */
            public function runKo(): bool
            {
                $typesAllowed = ['array', 'object', 'integer', 'float'];
                return self::assertIsTypeOf($typesAllowed, 'No string', $this->error);
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
