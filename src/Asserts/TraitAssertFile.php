<?php
declare(strict_types = 1);

namespace Nicodev\Asserts;

/**
 * Trait TraitAssertFile
 *
 * @package Nicodev\Asserts
 *
 * @author Nicolas Giraud <nicolas.giraud.dev@gmail.com>
 * @copyright (c) 2018 Nicolas Giraud
 * @license MIT
 */
trait TraitAssertFile
{
    use AbstractTraitAssert;

    /**
     * Asserts that the given path is a directory path.
     *
     * @param string $path The path to check that must be a directory.
     * @param mixed $exception The exception to throw if the assertion fails.
     * @return string The directory path if the assertion does not fail.
     */
    public static function assertIsDir(string $path, $exception): string
    {
        static::makeAssertion(\is_dir($path), $exception);
        return $path;
    }

    /**
     * Asserts that the given path is a file path.
     *
     * @param string $path The path to check that must be a file.
     * @param mixed $exception The exception to throw if the assertion fails.
     * @return string The file path if the assertion does not fail.
     */
    public static function assertIsFile(string $path, $exception): string
    {
        static::makeAssertion(\is_file($path), $exception);
        return $path;
    }

    /**
     * Asserts that the given path is a link path.
     *
     * @param string $path The path to check that must be a link.
     * @param mixed $exception The exception to throw if the assertion fails.
     * @return string The link path if the assertion does not fail.
     */
    public static function assertIsLink(string $path, $exception): string
    {
        static::makeAssertion(\is_link($path), $exception);
        return $path;
    }

    /**
     * Asserts that the given path is readable.
     *
     * @param string $path The path to check that must be readable.
     * @param mixed $exception The exception to throw if the assertion fails.
     * @return string The path if the assertion does not fail.
     */
    public static function assertIsReadable(string $path, $exception): string
    {
        static::makeAssertion(\is_readable($path), $exception);
        return $path;
    }

    /**
     * Asserts that the given path is writable.
     *
     * @param string $path The path to check that must be writable.
     * @param mixed $exception The exception to throw if the assertion fails.
     * @return string The path if the assertion does not fail.
     */
    public static function assertIsWritable(string $path, $exception): string
    {
        static::makeAssertion(\is_writable($path), $exception);
        return $path;
    }

    /**
     * Asserts that the given path is executable.
     *
     * @param string $path The path to check that must be executable.
     * @param mixed $exception The exception to throw if the assertion fails.
     * @return string The path if the assertion does not fail.
     */
    public static function assertIsExecutable(string $path, $exception): string
    {
        static::makeAssertion(\is_executable($path), $exception);
        return $path;
    }
}
