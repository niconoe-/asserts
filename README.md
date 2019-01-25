# Asserts
Define a list of traits that make assertions and throw Exception if assertion fails.

[![SensioLabsInsight](https://insight.sensiolabs.com/projects/70a39705-b8b4-4569-b5e4-5db5fcfa56e5/mini.png)](https://insight.sensiolabs.com/projects/70a39705-b8b4-4569-b5e4-5db5fcfa56e5)

## Installation

*Under construction*

## How to use?

*Under construction*

## API Documentation

### Changelog 2.0.0

    All changes are BC breaks. Please be careful when upgrading to version 2.

* Architecture reviewed to only import a single trait that automatically imports all traits. 
This to avoid compilation issues when using several specific traits without asking for a specific shared method.
* It is now **strongly advised** to only import the `AssertTrait` trait and use any assertion method available in all
sub traits.
* Traits names have changed to follow the same naming convention as PSRs defined by PHP-FIG: "*Trait*" word is now 
suffixed while previously prefixed.
* Added methods:
  * `AssertBooleanTrait::assertNotTrue()`
  * `AssertBooleanTrait::assertNotFalse()`
  * `AssertCountableTrait::assertNotCount()`
  * `AssertCountableTrait::assertNotCountRecursive()`
  * `AssertTypeTrait::assertIsNull()`
  * `AssertTypeTrait::assertIsNotNull()`
* Exceptions to throw are now all Throwable interface objects.
* Changed some default behaviors on `AssertTypeTrait`:
  * Previous method `::assertInArray()` is now `::assertLooselyInArray()` in order to prefer using strict comparision as default behavior.
  * Previous method `::assertInArrayStrict()` is now `::assertInArray()` in order to prefer using strict comparision as default behavior.
* Changed some default behaviors on `AssertBooleanTrait`:
  * Previous method `::assertFalse()` is now `::assertLooselyFalse()` in order to prefer using strict comparision as default behavior.
  * Previous method `::assertTrue()` is now `::assertLooselyTrue()` in order to prefer using strict comparision as default behavior.
  * Previous method `::assertStritclyFalse()` is now `::assertFalse()` in order to prefer using strict comparision as default behavior.
  * Previous method `::assertStritclyTrue()` is now `::assertTrue()` in order to prefer using strict comparision as default behavior.
* Changed some default behaviors on `AssertComparisonTrait`:
  * Previous method `::assertEquals()` is now `::assertLooselyEquals()` in order to prefer using strict comparision as default behavior.
  * Previous method `::assertStrictEquals()` is now `::assertEquals()` in order to prefer using strict comparision as default behavior.
  * Previous method `::assertNotEquals()` is now `::assertLooselyNotEquals()` in order to prefer using strict comparision as default behavior.
  * Previous method `::assertStrictNotEquals()` is now `::assertNotEquals()` in order to prefer using strict comparision as default behavior.
  * Previous method `::assertGreaterThan()` is now `::assertGreaterThanOrEquals()` in order to prefer using strict comparision as default behavior.
  * Previous method `::assertStrictGreaterThan()` is now `::assertGreaterThan()` in order to prefer using strict comparision as default behavior.
  * Previous method `::assertLessThan()` is now `::assertLessThanOrEquals()` in order to prefer using strict comparision as default behavior.
  * Previous method `::assertStrictLessThan()` is now `::assertLessThan()` in order to prefer using strict comparision as default behavior.
* Removed `::assertObjectNotFalse()` from `AssertObjectTrait` replaced by `::assertNotFalse()` into `AssertBooleanTrait`
* Removed `::assertObjectNotNull()` from `AssertObjectTrait` replaced by `::assertIsNotNull()` into `AssertTypeTrait`
