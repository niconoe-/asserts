# Asserts
Define a list of traits that make assertions and throw Exception if assertion fails.

## Installation

```shell
> composer require nicodev/assert:^3.0.0
```

## API Documentation

### Changelog 3.0.0

* The assertion must receive callables that returns a Throwable object.
* Remove loose comparison assertion
* Improve QA with PHPStan, Psalm, PHP Infection and so on
* Clean files by removing useless docs
* Remove compatibility for PHP 7
* Add test cases to ensure the visibility of assertion method must remain protected.
