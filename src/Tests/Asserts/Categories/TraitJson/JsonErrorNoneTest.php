<?php
declare(strict_types=1);

namespace Nicodev\Tests\Asserts\Categories\TraitJson;

use Exception;
use Nicodev\Asserts\AssertTrait;
use Nicodev\Tests\Resources\ErrorBuilderTrait;
use PHPUnit\Framework\TestCase;
use function json_decode;

/**
 * Final class JsonErrorNoneTest
 */
final class JsonErrorNoneTest extends TestCase
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
                /** @noinspection JsonEncodingApiUsageInspection Aim is to get the errors via json_last_error(). */
                json_decode('{}', false);
                return self::assertJsonErrorNone($this->error);
            }

            /**
             * Run the assertion is KO for test.
             * @return bool
             */
            public function runKo(): bool
            {
                /** @noinspection JsonEncodingApiUsageInspection Aim is to get the errors via json_last_error(). */
                json_decode('{"', false);
                return self::assertJsonErrorNone($this->error);
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
