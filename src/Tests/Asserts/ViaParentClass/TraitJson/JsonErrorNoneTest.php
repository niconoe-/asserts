<?php
declare(strict_types=1);

namespace Nicodev\Tests\Asserts\ViaParentClass\TraitJson;

use Exception;
use Nicodev\Tests\Resources\ParentClass;
use PHPUnit\Framework\TestCase;
use function json_decode;

/**
 * Final class JsonErrorNoneTest
 */
final class JsonErrorNoneTest extends TestCase
{
    private /*readonly*/ object $testClass;

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
                /** @noinspection JsonEncodingApiUsageInspection Aim is to get the errors via json_last_error(). */
                json_decode('{}', false);
                return self::assertJsonErrorNone(fn(): Exception => new Exception('This assertion fails.'));
            }

            /**
             * Run the assertion is KO for test.
             * @return bool
             */
            public function runKo(): bool
            {
                /** @noinspection JsonEncodingApiUsageInspection Aim is to get the errors via json_last_error(). */
                json_decode('{"', false);
                return self::assertJsonErrorNone(fn(): Exception => new Exception('This assertion fails.'));
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
