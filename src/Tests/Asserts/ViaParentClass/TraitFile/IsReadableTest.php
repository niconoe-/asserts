<?php
declare(strict_types=1);

namespace Nicodev\Tests\Asserts\ViaParentClass\TraitFile;

use Exception;
use Nicodev\Tests\Resources\ParentClass;
use PHPUnit\Framework\TestCase;
use function chmod;

/**
 * Final class IsReadableTest
 */
final class IsReadableTest extends TestCase
{
    private /*readonly*/ object $testClass;

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
                $path = __DIR__ . '/data/directory/readable';
                chmod($path, 0444);
                return self::assertIsReadable($path, fn(): Exception => new Exception('This assertion fails.'));
            }

            /**
             * Run the assertion is KO for test.
             * @return string
             */
            public function runKo(): string
            {
                $path = __DIR__ . '/data/directory/executable';
                chmod($path, 0111);
                return self::assertIsReadable($path, fn(): Exception => new Exception('This assertion fails.'));
            }
        };
    }

    protected function tearDown(): void
    {
        chmod(__DIR__ . '/data/directory/readable', 0755);
        chmod(__DIR__ . '/data/directory/executable', 0755);
    }

    public function testMakeAssertionOK(): void
    {
        self::assertSame(__DIR__ . '/data/directory/readable', $this->testClass->runOk());
    }

    public function testMakeAssertionKO(): void
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('This assertion fails.');
        $this->testClass->runKo();
    }
}
