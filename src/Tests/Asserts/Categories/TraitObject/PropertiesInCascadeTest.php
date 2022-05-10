<?php
declare(strict_types=1);

namespace Nicodev\Tests\Asserts\Categories\TraitObject;

use Exception;
use Nicodev\Asserts\AssertTrait;
use Nicodev\Tests\Resources\ErrorBuilderTrait;
use PHPUnit\Framework\TestCase;

/**
 * Final class PropertiesInCascadeTest
 */
final class PropertiesInCascadeTest extends TestCase
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
                $a = (object)['b' => (object)['c' => (object)['d' => 'bar']]];
                return self::assertPropertiesInCascade($a, $this->error, 'b', 'c', 'd');
            }

            /**
             * Run the assertion is KO for test.
             * @return mixed
             */
            public function runKo(): mixed
            {
                $a = (object)['b' => (object)['c' => (object)['d' => 'baz']]];
                return self::assertPropertiesInCascade($a, $this->error, 'b', 'x', 'z');
            }
        };
    }

    public function testMakeAssertionOK(): void
    {
        self::assertSame('bar', $this->testClass->runOk());
    }

    public function testMakeAssertionKO(): void
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('This assertion fails.');
        $this->testClass->runKo();
    }
}
