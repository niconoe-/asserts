<?php
declare(strict_types=1);

namespace Nicodev\Tests\Asserts\ViaParentClass\TraitArray;

use Exception;
use Nicodev\Tests\Resources\ParentClass;
use PHPUnit\Framework\TestCase;

/**
 * Final class NotKeyExistsTest
 */
final class NotKeyExistsTest extends TestCase
{
    private readonly object $testClass;

    protected function setUp(): void
    {
        $this->testClass = new class() extends ParentClass 
        {
            /**
             * Run the assertion is ok for this test.
             * @return array<string, string>
             */
            public function runOk(): array
            {
                $provider = ['en_US' => '🇺🇸', 'fr_FR' => '🇫🇷', 'de_DE' => '🇩🇪'];
                return self::assertNotKeyExists($provider, 'en_UK', $this->error);
            }

            /**
             * Run the assertion is KO for this test.
             * @return array<string, string>
             */
            public function runKo(): array
            {
                $provider = ['en_US' => '🇺🇸', 'fr_FR' => '🇫🇷', 'de_DE' => '🇩🇪'];
                return self::assertNotKeyExists($provider, 'fr_FR', $this->error);
            }
        };
    }

    public function testMakeAssertionOK(): void
    {
        self::assertSame(['en_US' => '🇺🇸', 'fr_FR' => '🇫🇷', 'de_DE' => '🇩🇪'], $this->testClass->runOk());
    }

    public function testMakeAssertionKO(): void
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('This assertion fails.');
        $this->testClass->runKo();
    }
}
