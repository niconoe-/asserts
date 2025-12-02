<?php
declare(strict_types=1);

namespace Nicodev\Tests\Asserts\ViaParentClass\TraitType;

use Exception;
use Nicodev\Tests\Resources\ParentClass;
use PHPUnit\Framework\TestCase;

/**
 * Final class IsNotNullOrScalarTest
 */
final class IsNotNullOrScalarTest extends TestCase
{
    private readonly object $testClass;

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
                return self::assertIsNotNullOrScalar(['I am not scalar'], $this->error);
            }

            /**
             * Run the assertion is KO for test.
             * @return mixed
             */
            public function runKo(): mixed
            {
                return self::assertIsNotNullOrScalar('I am not scalar', $this->error);
            }

            /**
             * Run the assertion is KO for test.
             * @return mixed
             */
            public function runKoNull(): mixed
            {
                return self::assertIsNotNullOrScalar(null, $this->error);
            }
        };
    }

    public function testMakeAssertionOK(): void
    {
        self::assertSame(['I am not scalar'], $this->testClass->runOk());
    }

    public function testMakeAssertionKO(): void
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('This assertion fails.');
        $this->testClass->runKo();
    }

    public function testMakeAssertionKONull(): void
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('This assertion fails.');
        $this->testClass->runKoNull();
    }
}
