<?php
declare(strict_types = 1);

namespace Nicodev\Tests\Asserts\TraitType;

use Exception;
use Nicodev\Asserts\TraitAssertType;
use PHPUnit\Framework\TestCase;

/**
 * Final class IsResourceTest
 *
 * @category Tests
 * @package Nicodev\Tests\Asserts
 * @subpackage TraitType
 *
 * @requires PHP 7.0
 *
 * @author Nicolas Giraud <nicolas.giraud.dev@gmail.com>
 * @copyright (c) 2017 Nicolas Giraud
 * @license MIT
 */
final class IsResourceTest extends TestCase
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
            use TraitAssertType;

            /** @var resource Use for tests. */
            private $resource;

            /**
             * Init the curl resource for tests.
             */
            public function __construct()
            {
                $this->resource = \curl_init();
            }

            /**
             * Close the curl resource for tests.
             */
            public function __destruct()
            {
                \curl_close($this->resource);
            }

            /**
             * Run the assertion is ok for test.
             * @return bool
             */
            public function runOk(): bool
            {
                return static::assertIsResource($this->resource, new Exception('This assertion fails.'));
            }

            /**
             * Run the assertion is KO for test.
             * @return bool
             */
            public function runKo(): bool
            {
                return static::assertIsResource(false, new Exception('This assertion fails.'));
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
