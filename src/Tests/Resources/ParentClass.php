<?php

namespace Nicodev\Tests\Resources;

use Closure;
use Exception;
use Nicodev\Asserts\AssertTrait;

abstract class ParentClass
{
    use AssertTrait;

    protected readonly Closure $error;

    public function __construct()
    {
        $this->error = static fn(): Exception => new Exception('This assertion fails.');
    }
}
