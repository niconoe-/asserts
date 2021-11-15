<?php
declare(strict_types=1);

namespace Nicodev\Tests\Asserts;

use Exception;
use Nicodev\Asserts\AssertTrait;
use Nicodev\Tests\Resources\ParentClass;
use PHPUnit\Framework\TestCase;

/**
 * Final class AssertTraitTest
 */
final class AssertTraitTest extends TestCase
{
    private /*readonly*/ object $testClass;
    private /*readonly*/ object $testParentClass;

    protected function setUp(): void
    {
        $this->testClass = new class()
        {
            use AssertTrait;

            /**
             * Run the assertion is ok for test.
             */
            public function runOk(): void
            {
                self::makeAssertion(true, fn(): Exception => new Exception('This assertion fails.'));
            }

            /**
             * Run the assertion is KO for test.
             */
            public function runKo(): void
            {
                self::makeAssertion(false, fn(): Exception => new Exception('This assertion fails.'));
            }
        };

        $this->testParentClass = new class() extends ParentClass
        {
            /**
             * Run the assertion is ok for test.
             */
            public function runOk(): void
            {
                self::makeAssertion(true, fn(): Exception => new Exception('This assertion fails.'));
            }

            /**
             * Run the assertion is KO for test.
             */
            public function runKo(): void
            {
                self::makeAssertion(false, fn(): Exception => new Exception('This assertion fails.'));
            }
        };
    }

    public function testMakeAssertionOK(): void
    {
        $this->testClass->runOk();
        self::assertTrue(true);
    }

    public function testMakeAssertionKO(): void
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('This assertion fails.');
        $this->testClass->runKo();
    }

    public function testMakeAssertionOKViaParentClass(): void
    {
        $this->testParentClass->runOk();
        self::assertTrue(true);
    }

    public function testMakeAssertionKOViaParentClass(): void
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('This assertion fails.');
        $this->testParentClass->runKo();
    }
}
