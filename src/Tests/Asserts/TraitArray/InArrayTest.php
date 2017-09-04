<?php
declare(strict_types = 1);

namespace Nicodev\Tests\Asserts\TraitArray;

use Exception;
use Nicodev\Asserts\TraitAssertArray;
use PHPUnit\Framework\TestCase;

/**
 * Final class InArrayTest
 *
 * @category Tests
 * @package Nicodev\Tests\Asserts
 * @subpackage TraitArray
 *
 * @requires PHP 7.0
 *
 * @author Nicolas Giraud <nicolas.giraud.dev@gmail.com>
 * @copyright (c) 2017 Nicolas Giraud
 * @license MIT
 */
final class InArrayTest extends TestCase
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
            use TraitAssertArray;

            /**
             * Run the assertion is ok for test.
             * @return bool
             */
            public function runOk(): bool
            {
                $provider = ['en_US' => 1, 'fr_FR' => 2, 'de_DE' => 3];
                return static::assertInArray($provider, '1', new Exception('This assertion fails.'));
            }

            /**
             * Run the assertion is KO for test.
             * @return bool
             */
            public function runKo(): bool
            {
                $provider = ['en_US' => 1, 'fr_FR' => 2, 'de_DE' => 3];
                return static::assertInArray($provider, 0, new Exception('This assertion fails.'));
            }
        };
    }

    public function testMakeAssertionOK()
    {
        static::assertTrue($this->testClass->runOk());
    }

    public function testMakeAssertionKO()
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('This assertion fails.');
        $this->testClass->runKo();
    }
}
