<?php
declare(strict_types = 1);

namespace Nicodev\Tests\Asserts\TraitArray;

use Exception;
use Nicodev\Asserts\AssertTrait;
use PHPUnit\Framework\TestCase;

/**
 * Final class KeyExistsTest
 *
 * @category Tests
 * @package Nicodev\Tests\Asserts
 * @subpackage TraitArray
 *
 * @author Nicolas Giraud <nicolas.giraud.dev@gmail.com>
 * @copyright (c) 2019 Nicolas Giraud
 * @license MIT
 */
final class KeyExistsTest extends TestCase
{
    /**
     * @var object anonymous class
     * @method runOk
     * @method runKo
     */
    private $testClass;

    public function setUp()
    {
        $this->testClass = new class()
        {
            use AssertTrait;

            /**
             * Run the assertion is ok for test.
             * @return string
             */
            public function runOk(): string
            {
                $provider = ['en_US' => 'QWERTY', 'fr_FR' => 'AZERTY', 'de_DE' => 'QWERTZ'];
                return static::assertKeyExists($provider, 'fr_FR', new Exception('This assertion fails.'));
            }

            /**
             * Run the assertion is KO for test.
             * @return string
             */
            public function runKo(): string
            {
                $provider = ['en_US' => 'QWERTY', 'fr_FR' => 'AZERTY', 'de_DE' => 'QWERTZ'];
                return static::assertKeyExists($provider, 'en_UK', new Exception('This assertion fails.'));
            }
        };
    }

    public function testMakeAssertionOK(): void
    {
        static::assertSame('AZERTY', $this->testClass->runOk());
    }

    public function testMakeAssertionKO(): void
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('This assertion fails.');
        $this->testClass->runKo();
    }
}
