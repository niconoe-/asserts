<?php
declare(strict_types=1);

namespace Nicodev\Tests\Asserts\ViaParentClass\TraitCountable;

use Exception;
use Nicodev\Tests\Resources\ParentClass;
use PHPUnit\Framework\TestCase;

/**
 * Final class NotEmptyTest
 */
final class NotEmptyTest extends TestCase
{
    private readonly object $testClass;

    protected function setUp(): void
    {
        $this->testClass = new class() extends ParentClass 
        {
            /**
             * Run the assertion is ok for test.
             * @return bool
             */
            public function runOk(): bool
            {
                return self::assertNotEmpty(['Not empty :)'], $this->error);
            }

            /**
             * Run the assertion is KO for test.
             * @return bool
             */
            public function runKo(): bool
            {
                return self::assertNotEmpty([], $this->error);
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
