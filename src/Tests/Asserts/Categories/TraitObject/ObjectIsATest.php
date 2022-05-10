<?php
declare(strict_types=1);

namespace Nicodev\Tests\Asserts\Categories\TraitObject;

use Exception;
use Nicodev\Asserts\AssertTrait;
use Nicodev\Tests\Resources\ErrorBuilderTrait;
use PHPUnit\Framework\TestCase;
use stdClass;

/**
 * Final class ObjectIsATest
 */
final class ObjectIsATest extends TestCase
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
             * @return mixed
             */
            public function runOk(): mixed
            {
                return self::assertObjectIsA(new stdClass(), stdClass::class, $this->error);
            }

            /**
             * Run the assertion is KO for test.
             * @return mixed
             */
            public function runKo(): mixed
            {
                return self::assertObjectIsA($this, stdClass::class, $this->error);
            }
        };
    }

    public function testMakeAssertionOK(): void
    {
        self::assertInstanceOf(stdClass::class, $this->testClass->runOk());
    }

    public function testMakeAssertionKO(): void
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('This assertion fails.');
        $this->testClass->runKo();
    }
}
