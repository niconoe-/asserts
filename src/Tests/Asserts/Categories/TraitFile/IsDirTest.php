<?php
declare(strict_types=1);

namespace Nicodev\Tests\Asserts\Categories\TraitFile;

use Exception;
use Nicodev\Asserts\AssertTrait;
use Nicodev\Tests\Resources\ErrorBuilderTrait;
use PHPUnit\Framework\TestCase;

/**
 * Final class IsDirTest
 */
final class IsDirTest extends TestCase
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
                return self::assertIsDir(__DIR__ . '/data/directory', $this->error);
            }

            /**
             * Run the assertion is KO for test.
             * @return string
             */
            public function runKo(): string
            {
                return self::assertIsDir(__DIR__ . '/data/directory/file', $this->error);
            }
        };
    }

    public function testMakeAssertionOK(): void
    {
        self::assertSame(__DIR__ . '/data/directory', $this->testClass->runOk());
    }

    public function testMakeAssertionKO(): void
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('This assertion fails.');
        $this->testClass->runKo();
    }
}
