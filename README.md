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

#### Grouped Imports (PHP ^7.0)

Instead of defining the entire class path, we can group imports of a namespace into one curly brace group.

```php
use Trainer\General\GroupedImports\Types\{
    Person,
    Animal,
    Environment\Water,
};
```

**Full example:** `src/General/GroupedImports/GroupedImports.php`.

▶️ Run exercise:

```bash
php trainer grouped-imports
```

#### Anonymous Classes (PHP ^7.0)

These classes are not files, but code blocks that define a nameless class just like anonymous functions. Use with caution! Suitable for cases where you want to change things on the fly, tests with mockery, debugging, etc.

```php
someFunction(new class extends SomeClass implements SomeInterface  {
    public function someMethod(): void
    {
        //
    }
});
```

**Full example:** `src/General/AnonymousClasses/AnonymousClasses.php`.

▶️ Run exercise:

```bash
php trainer anonymous-classes
```

#### Matched Expressions (PHP ^8.0)

These are expressions that assign the proper value to `$matched` if the given `$value` matches, in an function + array-like syntax. Pretty much like a clean replacement for `switch`.

```php
$matched = match ($value) {
    'Conversation'        => 'Started to conversation',
    'Comment'             => 'Added a new comment',
    'Reply', 'Subcomment' => 'Replied to conversation',
    'Attack'              => helperFunction(),
    default               => 'No action needed',
};
```

**Full example:** `src/General/MatchedExpressions/MatchedExpressions.php`.

▶️ Run exercise:

```bash
php trainer anonymous-classes
```

#### Constructor Property Promotion (PHP ^8.0)

This feature cleans up the constructor repetition by assigning the proprty visibility onto the constructor parameter. Notice that this still behaves like normal properties when it comes to primitive vs. non-primitive initializations, hence, you can only auto-initialize a property with primitives, not expressions.

```php
class Person
{
    public function __construct(protected string $name)
    {
    }
}
```

**Full example:** `src/General/ConstructorPropertyPromotion/ConstructorPropertyPromotion.php`.

▶️ Run exercise:

```bash
php trainer constructor-property-promotion
```

#### Dynamic Class Access (PHP ^8.0)

The `::class` value of a class is also available in objects on a variable. Functionally equivalent to `get_class()`.

```php
$object = new SomeClass();
echo $object::class;

$object::class === get_class($object);
```

**Full example:** `src/General/DynamicClassAccess/DynamicClassAccess.php`.

▶️ Run exercise:

```bash
php trainer dynamic-class-access
```

#### Named Parameters (PHP ^8.0)

A function or class method with parameters, can be invoked with those paramteres in any order (hence, not the order they were in the function definition) as long as they include the name. Notice that this approach couples the function calls to the actual parameter names in the function definition.

```php
$invoice = new Invoice(
    description: 'Web Development Services',
    chargeDate: new DateTime(),
    amount: 1000,
    paid: true
);
```

**Full example:** `src/General/NamedParameters/NamedParameters.php`.

▶️ Run exercise:

```bash
php trainer named-parameters
```

#### String Helpers (PHP ^8.0)

To determine if a string starts or ends with another string, or if a string contains another string.

```php
$id = 'ch_1IzO7K2eZvKYlo2CIGjQqdcy';
str_starts_with($id, 'ch_'); // true.
str_ends_with($id, 'dcy'); // true.
str_contains($id, 'o4Fs'); // false.
```

**Full example:** `src/General/StringHelpers/StringHelpers.php`.

▶️ Run exercise:

```bash
php trainer string-helpers
```

#### Weak Maps (PHP ^8.0)

Is map (or dictionary) that accepts objects as keys. Unlike SplObjectStorage, an object in a key of WeakMap does not contribute toward the object's reference count. That is, if at any point the only remaining reference to an object is the key of a WeakMap, the object will be garbage collected and removed from the WeakMap.

```php
$object = new stdClass();
$store = new WeakMap();

$store[$object] = 'Anything'; // Now the object is in the map.

unset($object); // It's also removed from the map.
```

**Full example:** `src/General/WeakMaps/WeakMaps.php`.

▶️ Run exercise:

```bash
php trainer weak-maps
```

#### Union Types (PHP ^8.0)

When a function/method can handle multiple (but specific) types of arguments, we can type-hint those in the function definition. Notice that this kind of existed in PHP 7 with the `?` before the type token, but it was just an union between the given type and `null`.

```php
function cancel(string | DateTime $when)
{
    print_r($when);
}

// It works.
cancel('next week');
cancel(new DateTime());

// It won't.
cancel(new stdClass());
```

**Full example:** `src/General/UnionTypes/UnionTypes.php`.

▶️ Run exercise:

```bash
php trainer union-types
```

#### Mixed Pseudo Type (PHP ^8.0)

In terms of consistency, if you just like to type-hint everything, you can use the `mixed` keyword which its behavior is exactly the same as not putting it. It indicates that the value for the parameter can be of any type.

```php
function cancel(mixed $when) // function cancel($when) {}
{
    print_r($when);
}

// It works.
cancel('next week');
cancel(new DateTime());
cancel(new stdClass());
cancel(12);
```

### SOLID Principles

These are good practices that help the developer write code that is more scalable and maintanble.

#### Single Responsibility Principle

The **S** in **SOLID**. This principle dictates that each class should do just one thing.

```php
$salesReport = new SalesReporter();

$formatter = new HtmlOutput();
echo $salesReport->between(new DateTime(), new DateTime(), $formatter);

$formatter = new PlainOutput();
echo $salesReport->between(new DateTime(), new DateTime(), $formatter);
```

**Full example:** `src/Principles/SingleResponsibility/SingleResponsibility.php`

▶️ Run exercise:

```bash
php trainer principle:single-responsibility
```

#### Open-Closed Principle

The **O** in **SOLID**. This principle dictates that classes must be closed for modification but open for extension.

```php
$receipt = new Receipt(1000);
$checkout = new Checkout();

// Can accept any implementation of the appropriate interface.
$stripe = new StripePaymentGateway();
$checkout->pay($receipt, $stripe);

// This one works too!
$paypal = new PayPalPaymentGateway();
$checkout->pay($receipt, $paypal);
```

**Full example:** `src/Principles/OpenClosed/OpenClosed.php`

▶️ Run exercise:

```bash
php trainer principle:open-closed
```

### Design Patterns

#### Decorator

When a class needs to interact with another class without breaking the OCP, we make use of decorators.

Decorators are classes which constructors wrap another objects who are intances of the same interface, and add behavior to have this wrapped object into account.

```php
$oilChange = new OilChangeDecorator(new BasicInspection());
$oilChange->getCost();
```

**Full example:** `src/DesignPatterns/Decorator/Decorator.php`

▶️ Run exercise:

```bash
php trainer pattern:decorator
```

#### Adapter

This pattern is essentially what it sounds like. When an object is not compatible with an implementation but are in the same context, we can use adapters.

Adapters are classes that wrap an object of an incompatible type, and translate the equivalent methods to the implemented class.

```php
$person = new Person(); // Can read books.
$book = new Book();
$eBook = new Kindle();

$person->read($book);
$person->read(new EReaderAdapter($eBook)); // Adapt eBook to Book.
```

**Full example:** `src/DesignPatterns/Adapter/Adapter.php`

▶️ Run exercise:

```bash
php trainer pattern:adapter
```

#### Template Method

This pattern is used to illustrate the steps of an algorithm in class methods, but implementations might differ in some steps.

```php
abstract class Sub
{
    public function make()
    {
        return $this
            ->layBread()
            ->addLettuce()
            ->addPrimaryToppings()
            ->addSauces();
    }
}
```

**Full example:** `src/DesignPatterns/TemplateMethod/TemplateMethod.php`

▶️ Run exercise:

```bash
php trainer pattern:template-method
```

#### Strategy

This pattern is used to define a family of algorithms and make them interchangeable.

```php
$logger = new Logger();

$logger->logMessage('I am a message', new FileLogger());
$logger->logMessage('I am a message', new DatabaseLogger());
$logger->logMessage('I am a message', new WebServiceLogger());
```

**Full example:** `src/DesignPatterns/Strategy/Strategy.php`

▶️ Run exercise:

```bash
php trainer pattern:strategy
```

#### Chain of Responsibility

This pattern is used to connect objects that can either handle or stop the execution of a request. This is done by storing a successor on each object, so in case one of the items in the chain did not result in a stopped exection, can instruct the next item to run its logic.

```php
$lightsChecker = new LightsChecker();
$lockChecker = new LockChecker();
$alarmChecker = new AlarmChecker();

// Connect the chain.
$lightsChecker->setSuccessor($lockChecker);
$lockChecker->setSuccessor($alarmChecker);

// Now let's make the check "request".
$homeStatus = new HomeStatus(
    false, // lights
    true, // locked
    false // alarm
);

$lightsChecker->check($homeStatus);
```

**Full example:** `src/DesignPatterns/ResponsibilityChain/ResponsibilityChain.php`

▶️ Run exercise:

```bash
php trainer pattern:responsibility-chain
```

#### Observer

This pattern is used to observe execution of actions in a class (subject), but this subject class doesn't need to be aware of anything of those observers. A list observers subscribes (or observes) a subject, and the subject notifies all of them once the triggering action occurs.

Pretty much like: Event happens -> Notify listeners.

```php
// Auth is a subject.
$auth = new Auth();

// We attach observers to that subject.
$auth->attach([
    new LogObserver(),
    new EmailObserver(),
    new TraceObserver(),
]);

// And then we execute the action that notifies the obsevers.
$auth->notify();
```

**Full example:** `src/DesignPatterns/Observer/Observer.php`

▶️ Run exercise:

```bash
php trainer pattern:observer
```

### Operators

#### Spaceship Operator (PHP ^7.0)

It returns `-1`, `0` or `1` when `$a` is respectively less than, equal to, or greater than `$b`. Comparisons are performed according to PHP's usual type [comparison rules](https://www.php.net/manual/en/types.comparisons.php).

```php
$a <=> $b;
```

**Full example:** `src/Operators/Spaceship.php`

▶️ Run exercise:

```bash
php trainer operator:spaceship
```

#### Null Coalesce Operator (PHP ^7.0)

It returns the value of `$a` if it's defined, otherwise it will return the fallback.

```php
echo $a ?? '❌ Variable not defined.';
```

**Full example:** `src/Operators/NullCoalesce.php`

▶️ Run exercise:

```bash
php trainer operator:null-coalesce
```

#### Nullsafe Operator (PHP ^8.0)

It runs a check if the value is defined in a chain-like syntax making the code cleaner for when a value in a chain might not be defined.

```php
$personTwo->profile?->title;
```

**Full example:** `src/Operators/Nullsafe.php`

▶️ Run exercise:

```bash
php trainer operator:nullsafe
```
