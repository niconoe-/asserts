<?php
declare(strict_types=1);

namespace Nicodev\Tests\Asserts\Categories\TraitArray;

use Exception;
use Nicodev\Asserts\AssertTrait;
use Nicodev\Tests\Resources\ErrorBuilderTrait;
use PHPUnit\Framework\TestCase;

/**
 * Final class InArrayTest
 */
final class InArrayTest extends TestCase
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
             * @return true
             */
            public function runOk(): true
            {
                $provider = ['en_US' => 1, 'fr_FR' => 2, 'de_DE' => 3];
                return self::assertInArray($provider, 3, $this->error);
            }

            /**
             * Run the assertion is KO for test.
             * @return true
             */
            public function runKo(): true
            {
                $provider = ['en_US' => 1, 'fr_FR' => 2, 'de_DE' => 3];
                return self::assertInArray($provider, '3', $this->error);
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
