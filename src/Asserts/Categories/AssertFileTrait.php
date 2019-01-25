<?php
declare(strict_types = 1);

namespace Nicodev\Asserts\Categories;

use Throwable;

/**
 * Trait AssertFileTrait
 *
 * @package Nicodev\Asserts\Categories
 *
 * @author Nicolas Giraud <nicolas.giraud.dev@gmail.com>
 * @copyright (c) 2018 Nicolas Giraud
 * @license MIT
 */
trait AssertFileTrait
{
    /**
     * Asserts that the given path is a directory path.
     *
     * @param string $path The path to check that must be a directory.
     * @param Throwable $exception The exception to throw if the assertion fails.
     * @return string The directory path if the assertion does not fail.
     */
    public static function assertIsDir(string $path, Throwable $exception): string
    {
        static::makeAssertion(\is_dir($path), $exception);
        return $path;
    }

    /**
     * Asserts that the given path is a file path.
     *
     * @param string $path The path to check that must be a file.
     * @param Throwable $exception The exception to throw if the assertion fails.
     * @return string The file path if the assertion does not fail.
     */
    public static function assertIsFile(string $path, Throwable $exception): string
    {
        static::makeAssertion(\is_file($path), $exception);
        return $path;
    }

    /**
     * Asserts that the given path is a link path.
     *
     * @param string $path The path to check that must be a link.
     * @param Throwable $exception The exception to throw if the assertion fails.
     * @return string The link path if the assertion does not fail.
     */
    public static function assertIsLink(string $path, Throwable $exception): string
    {
        static::makeAssertion(\is_link($path), $exception);
        return $path;
    }

    /**
     * Asserts that the given path is readable.
     *
     * @param string $path The path to check that must be readable.
     * @param Throwable $exception The exception to throw if the assertion fails.
     * @return string The path if the assertion does not fail.
     */
    public static function assertIsReadable(string $path, Throwable $exception): string
    {
        static::makeAssertion(\is_readable($path), $exception);
        return $path;
    }

    /**
     * Asserts that the given path is writable.
     *
     * @param string $path The path to check that must be writable.
     * @param Throwable $exception The exception to throw if the assertion fails.
     * @return string The path if the assertion does not fail.
     */
    public static function assertIsWritable(string $path, Throwable $exception): string
    {
        static::makeAssertion(\is_writable($path), $exception);
        return $path;
    }

    /**
     * Asserts that the given path is executable.
     *
     * @param string $path The path to check that must be executable.
     * @param Throwable $exception The exception to throw if the assertion fails.
     * @return string The path if the assertion does not fail.
     */
    public static function assertIsExecutable(string $path, Throwable $exception): string
    {
        static::makeAssertion(\is_executable($path), $exception);
        return $path;
    }
}
