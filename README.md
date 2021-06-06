# PHP Training Classes

[![Test](https://github.com/vlasscontreras/training-php/actions/workflows/test.yml/badge.svg)](https://github.com/vlasscontreras/training-php/actions/workflows/test.yml)

These are the trainig classes I followed prior to my Zend certification.

## Installation

Dump autoloader:

```bash
composer dump-autoload
```

## Usage

There are multiple classes and exercises that can be executed.

### General

#### Grouped Imports

Instead of defining the entire class path, we can group imports of a namespace into one curly brace group.

```bash
php trainer grouped-imports
```

#### Anonymous Classes

These classes are not files, but code blocks that define a nameless class just like anonymous functions. Use with caution! Suitable for cases where you want to change things on the fly, tests with mockery, debugging, etc.

```bash
php trainer anonymous-classes
```

### Design Patterns

#### Decorator

When a class needs to interact with another class without breaking the OCP, we make use of decorators.

Decorators are classes which constructors wrap another objects who are intances of the same interface, and add behavior to have this wrapped object into accuount.

```bash
php trainer pattern:decorator
```

#### Adapter

This pattern is essentially what it sounds like. When an object is not compatible with an implementation but are in the same context, we can use adapters.

Adapters are classes that wrap an object of an incompatible type, and translate the equivalent methods to the implemented class.

```bash
php trainer pattern:adapter
```

#### Template Method

This pattern is used to illustrate the steps of an algorithm in class methods, but implementations might differ in some steps.

```bash
php trainer pattern:template-method
```

#### Strategy

This pattern is used to define a family of algorithms and make them interchangeable.

```bash
php trainer pattern:strategy
```

#### Chain of Responsibility

This pattern is used to connect objects that can either handle or stop the execution of a request. This is done by storing a successor on each object, so in case one of the items in the chain did not result in a stopped exection, can instruct the next item to run its logic.

```bash
php trainer pattern:responsibility-chain
```

#### Observer

This pattern is used to observe execution of actions in a class (subject), but this subject class doesn't need to be aware of anything of those observers. A list observers subscribes (or observes) a subject, and the subject notifies all of them once the triggering action occurs.

Pretty much like: Event happens -> Notify listeners.

```bash
php trainer pattern:observer
```

### Operators

#### Spaceship Operator

It returns `-1`, `0` or `1` when `$a` is respectively less than, equal to, or greater than `$b`. Comparisons are performed according to PHP's usual type [comparison rules](https://www.php.net/manual/en/types.comparisons.php).

```bash
php trainer operator:spaceship
```

#### Null Coalesce Operator

It returns the value of `$a` if it's defined, otherwise it will return the fallback.

```bash
php trainer operator:null-coalesce
```

#### Nullsafe Operator

It runs a check if the value is defined in a chain-like syntax making the code cleaner for when a value in a chain might not be defined.

```bash
php trainer operator:nullsafe
```
