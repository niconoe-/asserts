<?php
declare(strict_types=1);

namespace Nicodev\Asserts\Categories;

use Throwable;

use function is_dir;
use function is_executable;
use function is_file;
use function is_link;
use function is_readable;
use function is_writable;

/**
 * Trait AssertFileTrait
 *
 * List of assertions associated to file or directory management.
 */
trait AssertFileTrait
{
    /**
     * Asserts that the given path is a directory path.
     *
     * @param string $path The path to check that must be a directory.
     * @param callable(): Throwable $exception The exception to throw if the assertion fails.
     * @return string The directory path if the assertion does not fail.
     */
    protected static function assertIsDir(string $path, callable $exception): string
    {
        self::makeAssertion(is_dir($path), $exception);
        return $path;
    }

    /**
     * Asserts that the given path is a file path.
     *
     * @param string $path The path to check that must be a file.
     * @param callable(): Throwable $exception The exception to throw if the assertion fails.
     * @return string The file path if the assertion does not fail.
     */
    protected static function assertIsFile(string $path, callable $exception): string
    {
        self::makeAssertion(is_file($path), $exception);
        return $path;
    }

    /**
     * Asserts that the given path is a link path.
     *
     * @param string $path The path to check that must be a link.
     * @param callable(): Throwable $exception The exception to throw if the assertion fails.
     * @return string The link path if the assertion does not fail.
     */
    protected static function assertIsLink(string $path, callable $exception): string
    {
        self::makeAssertion(is_link($path), $exception);
        return $path;
    }

    /**
     * Asserts that the given path is readable.
     *
     * @param string $path The path to check that must be readable.
     * @param callable(): Throwable $exception The exception to throw if the assertion fails.
     * @return string The path if the assertion does not fail.
     */
    protected static function assertIsReadable(string $path, callable $exception): string
    {
        self::makeAssertion(is_readable($path), $exception);
        return $path;
    }

    /**
     * Asserts that the given path is writable.
     *
     * @param string $path The path to check that must be writable.
     * @param callable(): Throwable $exception The exception to throw if the assertion fails.
     * @return string The path if the assertion does not fail.
     */
    protected static function assertIsWritable(string $path, callable $exception): string
    {
        self::makeAssertion(is_writable($path), $exception);
        return $path;
    }

    /**
     * Asserts that the given path is executable.
     *
     * @param string $path The path to check that must be executable.
     * @param callable(): Throwable $exception The exception to throw if the assertion fails.
     * @return string The path if the assertion does not fail.
     */
    protected static function assertIsExecutable(string $path, callable $exception): string
    {
        self::makeAssertion(is_executable($path), $exception);
        return $path;
    }
}
