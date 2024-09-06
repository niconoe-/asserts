<?php
declare(strict_types=1);

namespace Nicodev\Tests\Asserts\Categories\TraitBoolean;

use Exception;
use Nicodev\Asserts\AssertTrait;
use Nicodev\Tests\Resources\ErrorBuilderTrait;
use PHPUnit\Framework\TestCase;

/**
 * Final class FalseTest
 */
final class FalseTest extends TestCase
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
             * @return false
             */
            public function runOk(): false
            {
                return self::assertFalse(false, $this->error);
            }

            /**
             * Run the assertion is KO for test.
             * @return false
             */
            public function runKo(): false
            {
                return self::assertFalse(0, $this->error);
            }
        };
    }

    public function testMakeAssertionOK(): void
    {
        self::assertFalse($this->testClass->runOk());
    }

    public function testMakeAssertionKO(): void
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('This assertion fails.');
        $this->testClass->runKo();
    }
}
