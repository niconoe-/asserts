<?php
declare(strict_types=1);

namespace Nicodev\Tests\Asserts\ViaParentClass\TraitObject;

use Exception;
use Nicodev\Tests\Resources\ParentClass;
use PHPUnit\Framework\TestCase;

/**
 * Final class PropertiesInCascadeTest
 */
final class PropertiesInCascadeTest extends TestCase
{
    private /*readonly*/ object $testClass;

    protected function setUp(): void
    {
        $this->testClass = new class() extends ParentClass 
        {
            /**
             * Run the assertion is ok for test.
             * @return mixed
             */
            public function runOk(): mixed
            {
                $a = (object)['b' => (object)['c' => (object)['d' => 'bar']]];
                return self::assertPropertiesInCascade($a, fn(): Exception => new Exception('This assertion fails.'), 'b', 'c', 'd');
            }

            /**
             * Run the assertion is KO for test.
             * @return mixed
             */
            public function runKo(): mixed
            {
                $a = (object)['b' => (object)['c' => (object)['d' => 'baz']]];
                return self::assertPropertiesInCascade($a, fn(): Exception => new Exception('This assertion fails.'), 'b', 'x', 'z');
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
