# Asserts
Define a list of traits that make assertions and throw Exception if assertion fails.

[![SensioLabsInsight](https://insight.sensiolabs.com/projects/70a39705-b8b4-4569-b5e4-5db5fcfa56e5/mini.png)](https://insight.sensiolabs.com/projects/70a39705-b8b4-4569-b5e4-5db5fcfa56e5)

## Installation

```shell
> composer require nicodev/assert:^2.1.0
```

## API Documentation

### Changelog 2.1.0

* The assertion can now receive callables so any treatment to prepare the exception is actually executed only when the assertion fails.
* The Throwable object to be used directly is deprecated and this treatment will no longer be available for the version 3.

### Incoming

The next version 3 will drop support of PHP 7.1, PHP 7.2 and PHP 7.3 and will be PHP 7.4, PHP 8.0 and PHP 8.1 compliant.
