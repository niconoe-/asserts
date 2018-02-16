<?php
declare(strict_types = 1);

namespace Nicodev\Tests\Asserts\TraitFile;

use Exception;
use Nicodev\Asserts\TraitAssertFile;
use PHPUnit\Framework\TestCase;

/**
 * Final class IsReadableTest
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
final class IsReadableTest extends TestCase
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
                $path = __DIR__ . '/data/directory/readable';
                return static::assertIsReadable($path, new Exception('This assertion fails.'));
            }

            /**
             * Run the assertion is KO for test.
             * @return string
             */
            public function runKo(): string
            {
                $path = __DIR__ . '/data/directory/executable';
                return static::assertIsReadable($path, new Exception('This assertion fails.'));
            }
        };
    }

    public function testMakeAssertionOK()
    {
        static::assertSame(__DIR__ . '/data/directory/readable', $this->testClass->runOk());
    }

    public function testMakeAssertionKO()
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('This assertion fails.');
        $this->testClass->runKo();
    }
}
