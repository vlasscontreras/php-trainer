# PHP Training Classes

[![Test](https://github.com/vlasscontreras/training-php/actions/workflows/test.yml/badge.svg)](https://github.com/vlasscontreras/training-php/actions/workflows/test.yml)

These are the training classes I followed to prepare myself for the Zend certification. I hope you find them as useful as they were (and still are) for me 😃.

## Installation

Dump autoloader:

```bash
composer dump-autoload
```

## Usage

Subjects can be executed through the `trainer` PHP command. Below, each exercise will indicate its signature within the bash command example (if available).

```bash
php trainer {exercise-signature}
```

## Subjects

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

It returns the value of `$a` if it's defined, otherwise, it will return the fallback.

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

### Features

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

These are expressions that assign the proper value to `$matched` if the given `$value` matches, in a function + array-like syntax. Pretty much like a clean replacement for `switch`.

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

This feature cleans up the constructor repetition by assigning the property visibility onto the constructor parameter. Notice that this still behaves like normal properties when it comes to primitive vs. non-primitive initializations, hence, you can only auto-initialize a property with primitives, not expressions.

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

A function or class method with parameters can be invoked with those parameters in any order (hence, not the order they were in the function definition) as long as they include the name. Notice that this approach couples the function calls to the actual parameter names in the function definition.

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

A map (or dictionary) that accepts objects as keys. Unlike SplObjectStorage, an object in a key of WeakMap does not contribute toward the object's reference count. That is, if at any point the only remaining reference to an object is the key of a WeakMap, the object will be garbage collected and removed from the WeakMap.

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

When a function/method can handle multiple (but specific) types of arguments, we can type-hint those in the function definition. Notice that this kind of existed in PHP 7 with the `?` before the type token, but it was just a union between the given type and `null`.

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

In terms of consistency, if you just like to type-hint everything, you can use the `mixed` keyword which its behavior is the same as not putting it. It indicates that the value for the parameter can be of any type.

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

### Object-Oriented Principles

In Object-Oriented Programming (or OOP) we make use of classes to represent concepts that exist in an application. These classes might be interpreted as blueprints or templates that define the structure and behavior of these concepts.

To create a class, we first find the noun of what it represents. For example a comment, a person, a course, a video, achievement badge, etc. Those are represented like this (using the achievement badge as an example):

```php
class AchievementBadge {
}
```

The pieces of data that make an achievement badge are properties of that concept, and are also called **class properties** in the OOP context.

```php
class AchievementBadge {
    public $title;
    public $description;
    public $points;
}
```

At this point, we may say we have set the structure/blueprint of our concept. Now every time this class is instantiated (or in other words, creating objects of this class), each of those instances will have its own title, description, and points.

In addition, a class can have behavior. Let's say that our achievement badge can be awarded to a person; we can represent that through a class method:

```php
class AchievementBadge {
    ...

    public function awardTo($person)
    {
        echo "$person has achieved $this->title";
    }
}
```

#### Ecapsulation

In these examples, properties and methods are prepended with the `public` keyword, this is the **visibility**, and `public` is the default (yet it is recommended to define it explicitly like in these examples). This is how you determine encapsulation.

Encapsulation allows a class to provide signals to the outside world that certain internals are private and shouldn't be accessed. So at it's core, encapsulation is about communication.

But what it means?

- `public`: Makes the property or method publicly available to anyone accessing them, inside the same class, outside the class, or derived classes (classes that [`extend`](#inheritance) it).
- `protected`: Makes the property or method accessible only within the same class or its derived classes.
- `private`: Makes the property or method accessible only within the same class.

#### Inheritance

It allows an object to aquire (or inherit) the traits and behaviors or another object.

```php
class CoffeeMaker
{
    public function brew()
    {
        echo 'Brewing coffee.';
    }
}

class SpecialtyCoffeeMake extends CoffeeMaker
{
    public function brewLatte()
    {
        echo 'Brewing latte';
    }
}

(new SpecialtyCoffeeMake())->brewLatte();
(new SpecialtyCoffeeMake())->brew(); // Inherits the ability to brew coffee.
```

**Full example:** `src/OOP/Inheritance/Inheritance.php`.

▶️ Run exercise:

```bash
php trainer oop:inheritance
```

#### Abstract Classes

Abstract classes provide templates or base for any subclasses. A class is abstract when the `abstract` keyword is added before the `class` keyword on the class definition. Unlike [interfaces](#interfaces), abstract classes can define properties and behavior.

Adding `abstract` to a class:

- Removes the ability to instantiate the class directly
- It can define abstract methods, which cannot be implemented directly as it needs specifics of the subclass, therefore the subclass must define its behavior

```php
abstract class AchievementType
{
    public string $emoji = '🏆';

    public function getName(): string
    {
        return static::class;
    }

    public function getIconFilename(): string
    {
        return $this->getName() . '.png';
    }

    abstract public function setQualifier(string $user): string;
}
```

**Full example:** `src/OOP/AbstractClasses/AbstractClasses.php`.

▶️ Run exercise:

```bash
php trainer oop:abstract-classes
```

#### Interfaces

Interfaces are classes without behavior, they only have method signatures. They describe the terms for a particular contract, and any class that signs this contract, must adhere to those terms. In other words, interfaces don't care about the specifics of the behavior, just that the subclasses define that behavior.

This reduces the chances of errors due to duck typing and handshakes (accepting any type as dependency _hoping_ that it has a certain method).

```php
interface NewsletterProvider
{
    public function subscribe(string $email): bool;
}

class SendGridNewsletterProvider implements NewsletterProvider
{
    public function subscribe(string $email): bool
    {
        // SendGrid logic.
    }
}

class CampaignMonitorNewsletterProvider implements NewsletterProvider
{
    public function subscribe(string $email): bool
    {
        // Campaign Monitor logic.
    }
}

class NewsletterController
{
    public function store(NewsletterProvider $provider, string $email) // We can use any class implementing NewsletterProvider
    {
        $provider->subscribe($email); // We know by contract it has this method.
    }
}
```

**Full example:** `src/OOP/Interfaces/Interfaces.php`.

▶️ Run exercise:

```bash
php trainer oop:interfaces
```

#### Exceptions

These objects are thrown to indicate exceptional behavior. For example, when a business logic happens to fail or reach a sad path and a simple `false` return is not specific enough. Also, when an action can fail in multiple ways, and each way needs to be handled differently.

The objective is to have a clean and consistent way of handling failed actions. Exceptions bubble to parents (just like JavaScript events) until one of those parents **handles** it.

```php
function add($a, $b) {
    if (! (is_numeric($a) || is_numeric($b))) {
        throw new InvalidArgumentException('The given values must be numeric.');
    }

    return $a + $b;
}

try {
    add(12, []);
} catch (InvalidArgumentException $e) {
    // Handle exceptional behavior.
}
```

**Full example:** `src/OOP/Exceptions/Exceptions.php`

▶️ Run exercise:

```bash
php trainer oop:exceptions
```

### SOLID Principles

These are good practices that help the developer write code that is more scalable and maintainable.

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

#### Liskov Substitution Principle

The **L** in **SOLID**. This principle dictates that derived classes (implementation of an abstraction or interface) must be substitutable for their base class (anywhere where the abstraction is accepted). Essentially, any LSP-compliant class should have the same contract including return types.

```php
$fileReporitory = new FileLessonRepository();
$databaseRepository = new DatabaseLessonRepository();

/**
 * We should be able to use either of them since both follow
 * the same contract with the same return types, and all.
 */
echo showLessons($fileReporitory) . PHP_EOL;
echo showLessons($databaseRepository) . PHP_EOL;
```

**Full example:** `src/Principles/LiskovSubstitution/LiskovSubstitution.php`

▶️ Run exercise:

```bash
php trainer principle:liskov-substitution
```

#### Interface Segregation

The **I** in **SOLID**. This principle dictates clients should not be forced to implement an interface they don't use. This can be interpreted and implemented thinking on the knowledge each class needs from each other.

If a class `TypeA` only needs a little portion of data or behavior of a given object, that's when this principle suggests to segregate the implementation and only ask for an abstraction or interface `InterfaceA`, so any class implementing it can be used by `TypeA` since what the `InterfaceA` contract introduces is all that we need.

```php
$captain = new Captain();

// Androids work.
$captain->manage(new AndroidWorker());

// Humans work, but also sleep.
$captain->manage(new HumanWorker());
```

**Full example:** `src/Principles/InterfaceSegregation/InterfaceSegregation.php`

▶️ Run exercise:

```bash
php trainer principle:interface-segregation
```

#### Dependency Inversion

The **D** in **SOLID**. This principle dictates that high-level (isn't concerned about details and specifics) modules should not depend on low-level (it is more concerned about details and specifics) modules. Instead, they should depend on abstractions, not concretions. The low-level module should also depend on abstractions.

```php
$databaseConnection = new DatabaseConnection(); // Conforms to ConnectionInterface.

/**
 * The password reminder expects a ConnectionInterface, not the
 * DataBaseConnection concretion hence depends on an abstraction as
 * well, not a concretion.
 */
$passwordReminder = new PasswordReminder($databaseConnection);
```

**Full example:** `src/Principles/DependencyInversion/DependencyInversion.php`

▶️ Run exercise:

```bash
php trainer principle:dependency-inversion
```

### Design Patterns

#### Decorator

When a class needs to interact with another class without breaking the OCP, we make use of decorators.

Decorators are classes in which constructors wrap another object who are instances of the same interface and add behavior to have this wrapped object into account.

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

This pattern is essentially what it sounds like. When an object is not compatible with an implementation but is in the same context, we can use adapters.

Adapters are classes that wrap an object of an incompatible type and translate the equivalent methods to the implemented class.

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

This pattern is used to connect objects that can either handle or stop the execution of a request. This is done by storing a successor on each object, so in case one of the items in the chain did not result in a stopped execution, can instruct the next item to run its logic.

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

This pattern is used to observe the execution of actions in a class (subject), but this subject class doesn't need to be aware of anything of those observers. A list of observers subscribes (or observes) to a subject, and the subject notifies all of them once the triggering action occurs.

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
