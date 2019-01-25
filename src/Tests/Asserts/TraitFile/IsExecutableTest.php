<?php
declare(strict_types = 1);

namespace Nicodev\Tests\Asserts\TraitFile;

use Exception;
use Nicodev\Asserts\AssertTrait;
use PHPUnit\Framework\TestCase;

/**
 * Final class IsExecutableTest
 *
 * @category Tests
 * @package Nicodev\Tests\Asserts
 * @subpackage TraitFile
 *
 * @author Nicolas Giraud <nicolas.giraud.dev@gmail.com>
 * @copyright (c) 2019 Nicolas Giraud
 * @license MIT
 */
final class IsExecutableTest extends TestCase
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
                $path = __DIR__ . '/data/directory/executable';
                \chmod($path, 0111);
                return static::assertIsExecutable($path, new Exception('This assertion fails.'));
            }

            /**
             * Run the assertion is KO for test.
             * @return string
             */
            public function runKo(): string
            {
                $path = __DIR__ . '/data/directory/writable';
                \chmod($path, 0222);
                return static::assertIsExecutable($path, new Exception('This assertion fails.'));
            }
        };
    }

    public function testMakeAssertionOK(): void
    {
        static::assertSame(__DIR__ . '/data/directory/executable', $this->testClass->runOk());
    }

    public function testMakeAssertionKO(): void
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('This assertion fails.');
        $this->testClass->runKo();
    }
}
