<?php

namespace Nicodev\Tests\Resources;

use Closure;
use Exception;

trait ErrorBuilderTrait
{
    private readonly Closure $error;

    public function __construct()
    {
        $this->error = static fn(): Exception => new Exception('This assertion fails.');
    }
}
