<?php
declare(strict_types=1);

namespace Nicodev\Tests\Asserts\Categories\TraitJson;

use Exception;
use Nicodev\Asserts\AssertTrait;
use Nicodev\Tests\Resources\ErrorBuilderTrait;
use PHPUnit\Framework\TestCase;

/**
 * Final class JsonValidateTest
 */
final class JsonValidateTest extends TestCase
{
    private readonly object $testClass;

    protected function setUp(): void
    {
        $this->testClass = new class()
        {
            use AssertTrait;
            use ErrorBuilderTrait;

            /**
             * Run the assertion is ok for test, but expects no return.
             * @return null
             */
            public function runOkNoReturn(): null
            {
                return self::assertJsonValidate('{"foo": "bar"}', $this->error);
            }

            /**
             * Run the assertion is ok for test, but expects associative array.
             * @return array<mixed>
             */
            public function runOkAssoc(): array
            {
                return self::assertJsonValidate('{"foo": "bar"}', $this->error, self::ASSERT_JSON_RETURN_ARRAY);
            }

            /**
             * Run the assertion is ok for test, but expects object.
             * @return object
             */
            public function runOkObject(): object
            {
                return self::assertJsonValidate('{"foo": "bar"}', $this->error, self::ASSERT_JSON_RETURN_OBJECT);
            }

            /**
             * Run the assertion is KO for test.
             * @return null
             */
            public function runKo(): null
            {
                return self::assertJsonValidate('{"', $this->error);
            }
        };
    }

    public function testMakeAssertionOKNoReturn(): void
    {
        self::assertNull($this->testClass->runOkNoReturn());
    }

    public function testMakeAssertionOKAssoc(): void
    {
        self::assertSame(['foo' => 'bar'], $this->testClass->runOkAssoc());
    }

    public function testMakeAssertionOKObject(): void
    {
        self::assertEquals((object)['foo' => 'bar'], $this->testClass->runOkObject());
    }

    public function testMakeAssertionKO(): void
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('This assertion fails.');
        $this->testClass->runKo();
    }
}
