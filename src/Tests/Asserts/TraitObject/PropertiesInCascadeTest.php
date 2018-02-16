<?php
declare(strict_types = 1);

namespace Nicodev\Tests\Asserts\TraitObject;

use Exception;
use Nicodev\Asserts\TraitAssertObject;
use PHPUnit\Framework\TestCase;
use stdClass;

/**
 * Final class PropertiesInCascadeTest
 *
 * @category Tests
 * @package Nicodev\Tests\Asserts
 * @subpackage TraitObject
 *
 * @requires PHP 7.0
 *
 * @author Nicolas Giraud <nicolas.giraud.dev@gmail.com>
 * @copyright (c) 2018 Nicolas Giraud
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
            use TraitAssertObject;

            /**
             * Run the assertion is ok for test.
             * @return mixed
             */
            public function runOk()
            {
                $a = new stdClass();
                $a->b = new stdClass();
                $a->b->c = new stdClass();
                $a->b->c->d = 'bar';

                return static::assertPropertiesInCascade($a, new Exception('This assertion fails.'), 'b', 'c', 'd');
            }

            /**
             * Run the assertion is KO for test.
             * @return mixed
             */
            public function runKo()
            {
                $a = new stdClass();
                $a->b = new stdClass();
                $a->b->c = new stdClass();
                $a->b->c->d = 'baz';

                return static::assertPropertiesInCascade($a, new Exception('This assertion fails.'), 'b', 'x', 'z');
            }
        };
    }

    public function testMakeAssertionOK()
    {
        static::assertSame('bar', $this->testClass->runOk());
    }

    public function testMakeAssertionKO()
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('This assertion fails.');
        $this->testClass->runKo();
    }
}
