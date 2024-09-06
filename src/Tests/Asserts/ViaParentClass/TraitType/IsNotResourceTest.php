<?php
declare(strict_types=1);

namespace Nicodev\Tests\Asserts\ViaParentClass\TraitType;

use Exception;
use Nicodev\Tests\Resources\ParentClass;
use PHPUnit\Framework\TestCase;

use function fclose;
use function fopen;

/**
 * Final class IsNotResourceTest
 */
final class IsNotResourceTest extends TestCase
{
    private readonly object $testClass;

    protected function setUp(): void
    {
        $this->testClass = new class() extends ParentClass 
        {
            /** @var resource Use for tests. */
            private $resource;

            /**
             * Init the curl resource for tests.
             */
            public function __construct()
            {
                $this->resource = fopen('php://memory', 'rb');
                parent::__construct();
            }

            /**
             * Close the curl resource for tests.
             */
            public function __destruct()
            {
                fclose($this->resource);
            }

            /**
             * Run the assertion is ok for test.
             * @return true
             */
            public function runOk(): true
            {
                return self::assertIsNotResource(true, $this->error);
            }

            /**
             * Run the assertion is KO for test.
             * @return true
             */
            public function runKo(): true
            {
                return self::assertIsNotResource($this->resource, $this->error);
            }
        };
    }

    public function testMakeAssertionOK(): void
    {
        self::assertTrue($this->testClass->runOk());
    }

    public function testMakeAssertionKO(): void
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('This assertion fails.');
        $this->testClass->runKo();
    }
}
