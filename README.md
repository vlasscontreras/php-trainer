# PHP Training Classes

These are the trainig classes I followed prior to my Zend certification.

## Installation

Dump autoloader:

```bash
composer dump-autoload
```

## Usage

There are multiple classes and exercises that can be executed.

### Design Patterns

#### Decorator

When a class needs to interact with another class without breaking the OCP, we make use of decorators.

Decorators are classes which constructors wrap another objects who are intances of the same interface, and add behavior to have this wrapped object into accuount.

```bash
php trainer decorator
```

#### Adapter

This pattern is essentially what it sounds like. When an object is not compatible with an implementation but are in the same context, we can use adapters.

Adapters are classes that wrap an object of an incompatible type, and translate the equivalent methods to the implemented class.

```bash
php trainer adapter
```

#### Template Method

This pattern is used to illustrate the steps of an algorythm in class methods, but implementations might differ in some steps.

```bash
php trainer template-method
```
