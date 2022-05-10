<?php
declare(strict_types=1);

namespace Nicodev\Tests\Asserts\ViaParentClass\TraitFile;

use Exception;
use Nicodev\Tests\Resources\ParentClass;
use PHPUnit\Framework\TestCase;

/**
 * Final class IsFileTest
 */
final class IsFileTest extends TestCase
{
    private readonly object $testClass;

    protected function setUp(): void
    {
        $this->testClass = new class() extends ParentClass 
        {
            /**
             * Run the assertion is ok for test.
             * @return string
             */
            public function runOk(): string
            {
                return self::assertIsFile(__DIR__ . '/data/directory/file', $this->error);
            }

            /**
             * Run the assertion is KO for test.
             * @return string
             */
            public function runKo(): string
            {
                return self::assertIsFile(__DIR__ . '/data/directory', $this->error);
            }
        };
    }

    public function testMakeAssertionOK(): void
    {
        self::assertSame(__DIR__ . '/data/directory/file', $this->testClass->runOk());
    }

    public function testMakeAssertionKO(): void
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('This assertion fails.');
        $this->testClass->runKo();
    }
}
