<?php
declare(strict_types=1);

namespace Nicodev\Tests\Asserts\ViaParentClass\TraitArray;

use Exception;
use Nicodev\Tests\Resources\ParentClass;
use PHPUnit\Framework\TestCase;

/**
 * Final class KeyExistsTest
 */
final class KeyExistsTest extends TestCase
{
    private readonly object $testClass;

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
                $provider = ['en_US' => '🇺🇸', 'fr_FR' => '🇫🇷', 'de_DE' => '🇩🇪'];
                return self::assertKeyExists($provider, 'fr_FR', $this->error);
            }

            /**
             * Run the assertion is KO for test.
             * @return string
             */
            public function runKo(): string
            {
                $provider = ['en_US' => '🇺🇸', 'fr_FR' => '🇫🇷', 'de_DE' => '🇩🇪'];
                return self::assertKeyExists($provider, 'en_UK', $this->error);
            }
        };
    }

    public function testMakeAssertionOK(): void
    {
        self::assertSame('🇫🇷', $this->testClass->runOk());
    }

    public function testMakeAssertionKO(): void
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('This assertion fails.');
        $this->testClass->runKo();
    }
}
