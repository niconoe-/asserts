<?php
declare(strict_types=1);

namespace Nicodev\Tests\Asserts\ViaParentClass\TraitEnum;

use BackedEnum;
use Exception;
use Generator;
use Nicodev\Asserts\AssertTrait;
use Nicodev\Tests\Resources\IntBackedEnum;
use Nicodev\Tests\Resources\ParentClass;
use Nicodev\Tests\Resources\StringBackedEnum;
use PHPUnit\Framework\TestCase;

/**
 * Final class EnumHasTest
 */
final class EnumHasTest extends TestCase
{
    /**
     * @return Generator
     */
    private function provideEnum(): Generator
    {
        // Int Backed Enum.
        $testClass = new class() extends ParentClass
        {
            /**
             * Run the assertion is ok for test.
             * @return BackedEnum
             */
            public function runOk(): BackedEnum
            {
                $enumClass = IntBackedEnum::class;
                return self::assertEnumHas($enumClass, 1, fn(): Exception => new Exception('This assertion fails.'));
            }

            /**
             * Run the assertion is KO for test.
             * @return BackedEnum
             */
            public function runKo(): BackedEnum
            {
                $enumClass = IntBackedEnum::class;
                return self::assertEnumHas($enumClass, 999, fn(): Exception => new Exception('This assertion fails.'));
            }
        };
        yield 'IntEnum' => [$testClass, IntBackedEnum::A];

        // String Backed Enum.
        $testClass = new class() extends ParentClass
        {
            /**
             * Run the assertion is ok for test.
             * @return BackedEnum
             */
            public function runOk(): BackedEnum
            {
                $enumClass = StringBackedEnum::class;
                return self::assertEnumHas($enumClass, 'A', fn(): Exception => new Exception('This assertion fails.'));
            }

            /**
             * Run the assertion is KO for test.
             * @return BackedEnum
             */
            public function runKo(): BackedEnum
            {
                $enumClass = StringBackedEnum::class;
                return self::assertEnumHas($enumClass, 'Z', fn(): Exception => new Exception('This assertion fails.'));
            }
        };
        yield 'StringEnum' => [$testClass, StringBackedEnum::A];
    }

    /**
     * @dataProvider provideEnum
     * @param object $testClass
     * @param BackedEnum $expectedEnum
     * @return void
     */
    public function testMakeAssertionOK(object $testClass, BackedEnum $expectedEnum): void
    {
        $enum = $testClass->runOk();
        self::assertSame($enum, $expectedEnum);
    }

    /**
     * @dataProvider provideEnum
     * @param object $testClass
     * @return void
     */
    public function testMakeAssertionKO(object $testClass): void
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('This assertion fails.');
        $testClass->runKo();
    }
}
