<?php
declare(strict_types=1);

namespace Nicodev\Tests\Asserts\Categories\TraitType;

use Exception;
use Nicodev\Asserts\AssertTrait;
use Nicodev\Tests\Resources\ErrorBuilderTrait;
use PHPUnit\Framework\TestCase;

/**
 * Final class IsCallableTest
 */
final class IsCallableTest extends TestCase
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
             * @return callable
             */
            public function runOk(): callable
            {
                $callback = static fn(): true => true;
                return self::assertIsCallable($callback, $this->error);
            }

            /**
             * Run the assertion is KO for test.
             * @return true
             */
            public function runKo(): true
            {
                return self::assertIsCallable(false, $this->error);
            }
        };
    }

    public function testMakeAssertionOK(): void
    {
        $callable = $this->testClass->runOk();
        self::assertIsCallable($callable);
        self::assertTrue($callable());
    }

    public function testMakeAssertionKO(): void
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('This assertion fails.');
        $this->testClass->runKo();
    }
}
