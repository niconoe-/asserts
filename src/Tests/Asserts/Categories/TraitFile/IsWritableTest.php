<?php
declare(strict_types=1);

namespace Nicodev\Tests\Asserts\Categories\TraitFile;

use Exception;
use Nicodev\Asserts\AssertTrait;
use Nicodev\Tests\Resources\ErrorBuilderTrait;
use PHPUnit\Framework\TestCase;

use function chmod;

/**
 * Final class IsWritableTest
 */
final class IsWritableTest extends TestCase
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
                $path = __DIR__ . '/data/directory/writable';
                chmod($path, 0222);
                return self::assertIsWritable($path, $this->error);
            }

            /**
             * Run the assertion is KO for test.
             * @return string
             */
            public function runKo(): string
            {
                $path = __DIR__ . '/data/directory/readable';
                chmod($path, 0444);
                return self::assertIsWritable($path, $this->error);
            }
        };
    }

    protected function tearDown(): void
    {
        chmod(__DIR__ . '/data/directory/writable', 0755);
        chmod(__DIR__ . '/data/directory/readable', 0755);
    }

    public function testMakeAssertionOK(): void
    {
        self::assertSame(__DIR__ . '/data/directory/writable', $this->testClass->runOk());
    }

    public function testMakeAssertionKO(): void
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('This assertion fails.');
        $this->testClass->runKo();
    }
}
