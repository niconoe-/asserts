<?php
declare(strict_types = 1);

namespace Nicodev\Tests\Asserts\TraitFile;

use Exception;
use Nicodev\Asserts\TraitAssertFile;
use PHPUnit\Framework\TestCase;

/**
 * Final class IsDirTest
 *
 * @category Tests
 * @package Nicodev\Tests\Asserts
 * @subpackage TraitFile
 *
 * @requires PHP 7.0
 *
 * @author Nicolas Giraud <nicolas.giraud.dev@gmail.com>
 * @copyright (c) 2017 Nicolas Giraud
 * @license MIT
 */
final class IsDirTest extends TestCase
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
            use TraitAssertFile;

            /**
             * Run the assertion is ok for test.
             * @return string
             */
            public function runOk(): string
            {
                return static::assertIsDir(__DIR__ . '/data/directory', new Exception('This assertion fails.'));
            }

            /**
             * Run the assertion is KO for test.
             * @return string
             */
            public function runKo(): string
            {
                return static::assertIsDir(__DIR__ . '/data/directory/file', new Exception('This assertion fails.'));
            }
        };
    }

    public function testMakeAssertionOK()
    {
        static::assertSame(__DIR__ . '/data/directory', $this->testClass->runOk());
    }

    public function testMakeAssertionKO()
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('This assertion fails.');
        $this->testClass->runKo();
    }
}
