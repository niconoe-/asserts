<?php
declare(strict_types=1);

namespace Nicodev\Tests\Asserts\Categories\TraitCountable;

use Exception;
use Nicodev\Asserts\AssertTrait;
use Nicodev\Tests\Resources\ErrorBuilderTrait;
use PHPUnit\Framework\TestCase;

/**
 * Final class NotEmptyTest
 */
final class NotEmptyTest extends TestCase
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
             * @return array<mixed>
             */
            public function runOk(): array
            {
                return self::assertNotEmpty(['Not empty :)'], $this->error);
            }

            /**
             * Run the assertion is KO for test.
             * @return array<mixed>
             */
            public function runKo(): array
            {
                return self::assertNotEmpty([], $this->error);
            }
        };
    }

    public function testMakeAssertionOK(): void
    {
        self::assertSame(['Not empty :)'], $this->testClass->runOk());
    }

    public function testMakeAssertionKO(): void
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('This assertion fails.');
        $this->testClass->runKo();
    }
}
