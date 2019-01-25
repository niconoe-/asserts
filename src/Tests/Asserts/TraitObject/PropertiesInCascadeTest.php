<?php
declare(strict_types = 1);

namespace Nicodev\Tests\Asserts\TraitObject;

use Exception;
use Nicodev\Asserts\AssertTrait;
use PHPUnit\Framework\TestCase;

/**
 * Final class PropertiesInCascadeTest
 *
 * @category Tests
 * @package Nicodev\Tests\Asserts
 * @subpackage TraitObject
 *
 * @author Nicolas Giraud <nicolas.giraud.dev@gmail.com>
 * @copyright (c) 2019 Nicolas Giraud
 * @license MIT
 */
final class PropertiesInCascadeTest extends TestCase
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
             * @return mixed
             */
            public function runOk()
            {
                $a = (object)['b' => (object)['c' => (object)['d' => 'bar']]];
                return static::assertPropertiesInCascade($a, new Exception('This assertion fails.'), 'b', 'c', 'd');
            }

            /**
             * Run the assertion is KO for test.
             * @return mixed
             */
            public function runKo()
            {
                $a = (object)['b' => (object)['c' => (object)['d' => 'baz']]];
                return static::assertPropertiesInCascade($a, new Exception('This assertion fails.'), 'b', 'x', 'z');
            }
        };
    }

    public function testMakeAssertionOK(): void
    {
        static::assertSame('bar', $this->testClass->runOk());
    }

    public function testMakeAssertionKO(): void
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('This assertion fails.');
        $this->testClass->runKo();
    }
}
