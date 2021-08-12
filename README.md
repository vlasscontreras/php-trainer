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

### Superglobals

Superglobals are variables that are available automatically to the script, with no need for `global` keyword usage. Superglobals are available in every scope.

| Suberglobal | Content |
| ----------- | ------- |
| `$GLOBALS`  | An array of variables that exist in the global scope. |
| `$_SERVER`  | An array of information about paths, headers, and other information relevant to the server environment. |
| `$_GET`     | Variables sent in a GET request. |
| `$_POST`    | Variables sent in a POST request. |
| `$_FILES`   | An associative array of files that were uploaded as part of a POST request. |
| `$_COOKIE`  | An associative array of variables passed to the current script via HTTP cookies. |
| `$_SESSION` | An associative array containing session variables available to the current script. |
| `$_REQUEST` | POST, GET, and COOKIE request variables. |
| `$_ENV`     | An associative array of variables passed to the current script via the environment method. |

The `$_SERVER` superglobal contains a lot of keys, and it is important to get familiar with its values.

▶️ Run exercise:

```bash
php trainer superglobals
```

**Note:** Unlike the [HTML form methods like `POST` and `GET`](https://www.w3.org/TR/html52/sec-forms.html#configuring-a-form-to-communicate-with-a-server), other non-HTML form methods such as `PATCH`, `PUT`, `DELETE`, etc. don't have their superglobal. To access them, you need to use the [`php://input` stream](https://www.php.net/manual/en/wrappers.php.php).

### Constants

Constants are similar to variables but are **immutable**. They have the same naming rules as variables, but by convention will have uppercase names.

```php
define(name: 'PI', value: 3.142, case_insensitive: false);
defined('PI'); // true
echo PI; // 3.142
```

**Note:** Constants can only contain arrays or scalar values and not resources or objects.

Only the `const` keyword can be used to create a namespaced constant.

```php
// Math.php
namespace Math;
const PI = 3.142;
define('EPSILON', 0.001);
```

```php
// Test.php
namespace Test;
echo \Math\PI; // 3.142
echo \Math\EPSILON; // Fatal error!
echo EPSILON; // 0.001
```

**Note:** Assume `Math.php` is loaded when `Test.php` is executed.

▶️ Run exercise:

```bash
php trainer constants:namespaced
```

#### Magic Constants

Nine constants change depending on where they are used, these are called magic constants. For example, the value of `__LINE__` depends on the line that it's used in the script. All these "magical" constants are resolved at compile-time, unlike regular constants, which are resolved at runtime. These special constants are case-insensitive and are as follows:

| Constant | Content |
| -------- | ------- |
| `__LINE__`      | The line number of the PHP executed script |
| `__DIR__`       | The directory of the file. If used inside an include, the directory of the included file is returned. This is equivalent to `dirname(__FILE__)`. This directory name does not have a trailing slash unless it is the root directory |
| `__FILE__`      | The fully resolved (including symlinks) name and path of the file being executed |
| `__CLASS__`     | The name of the class being executed |
| `__METHOD__`    | The name of the class method being executed |
| `__FUNCTION__`  | The name of the function being executed |
| `__TRAIT__`     | The namespace and name of the trait that the code is running in |
| `__NAMESPACE__` | The current namespace |

▶️ Run exercise:

```bash
php trainer constants:magic-constants
```

#### Predefined Constants

These constants are defined by the PHP core. This includes PHP, the Zend engine, and SAPI modules.

| Constant | Type | Content |
| -------- | ---- | ------- |
| `PHP_VERSION`              | `string` | The current PHP version as a string in "major.minor.release[extra]" notation. |
| `PHP_MAJOR_VERSION`        | `int`    | The current PHP "major" version as an integer (e.g., `int(8)` from version `8.0.7-extra`). |
| `PHP_MINOR_VERSION`        | `int`    | The current PHP "minor" version as an integer (e.g., `int(0)` from version `8.0.7-extra`). |
| `PHP_RELEASE_VERSION`      | `int`    | The current PHP "release" version as an integer (e.g., `int(7)` from version `8.0.7-extra`). |
| `PHP_VERSION_ID`           | `int`    | The current PHP version as an integer, useful for version comparisons (e.g., `int(80007)` from version `8.0.7-extra`).
| `PHP_EXTRA_VERSION`        | `string` | The current PHP "extra" version as a string (e.g., '-extra' from version `8.0.7-extra`). Often used by distribution vendors to indicate a package version. |
| `PHP_ZTS`                  | `int`    | N/A |
| `PHP_DEBUG`                | `int`    | N/A |
| `PHP_MAXPATHLEN`           | `int`    | The maximum length of filenames (including path) supported by this build of PHP. |
| `PHP_OS`                   | `string` | The operating system PHP was built for. |
| `PHP_OS_FAMILY`            | `string` | The operating system family PHP was built for. One of `Windows`, `BSD`, `Darwin`, `Solaris`, `Linux` or `Unknown`. |
| `PHP_SAPI`                 | `string` | The Server API for this build of PHP. See also `php_sapi_name()`. |
| `PHP_EOL`                  | `string` | The correct 'End Of Line' symbol for this platform. |
| `PHP_INT_MAX`              | `int`    | The largest integer supported in this build of PHP. Usually `int(2147483647)` in 32 bit systems and `int(9223372036854775807)` in 64 bit systems. |
| `PHP_INT_MIN`              | `int`    | The smallest integer supported in this build of PHP. Usually `int(-2147483648)` in 32 bit systems and `int(-9223372036854775808)` in 64 bit systems. Usually, `PHP_INT_MIN === ~PHP_INT_MAX`. |
| `PHP_INT_SIZE`             | `int`    | The size of an integer in bytes in this build of PHP. |
| `PHP_FLOAT_DIG`            | `int`    | Number of decimal digits that can be rounded into a float and back without precision loss. |
| `PHP_FLOAT_EPSILON`        | `float`  | Smallest representable positive number `x`, so that `x + 1.0` != `1.0`. |
| `PHP_FLOAT_MIN`            | `float`  | Smallest representable positive floating point number. If you need the smallest representable negative floating point number, use `PHP_FLOAT_MAX`. |
| `PHP_FLOAT_MAX`            | `float`  | Largest representable floating point number. |
| `DEFAULT_INCLUDE_PATH`     | `string` | N/A |
| `PEAR_INSTALL_DIR`         | `string` | N/A |
| `PEAR_EXTENSION_DIR`       | `string` | N/A |
| `PHP_EXTENSION_DIR`        | `string` | The default directory where to look for dynamically loadable extensions (unless overridden by `extension_dir`). Defaults to `PHP_PREFIX` (or `PHP_PREFIX . "\\ext"` on Windows). |
| `PHP_PREFIX`               | `string` | The value `--prefix` was set to at configure. On Windows, it is the value `--with-prefix` was set to at configure. |
| `PHP_BINDIR`               | `string` | The value `--bindir` was set to at configure. On Windows, it is the value `--with-prefix` was set to at configure. |
| `PHP_BINARY`               | `string` | Specifies the PHP binary path during script execution. |
| `PHP_MANDIR`               | `string` | Specifies where the manpages were installed into. |
| `PHP_LIBDIR`               | `string` | N/A |
| `PHP_DATADIR`              | `string` | N/A |
| `PHP_SYSCONFDIR`           | `string` | N/A |
| `PHP_LOCALSTATEDIR`        | `string` | N/A |
| `PHP_CONFIG_FILE_PATH`     | `string` | N/A |
| `PHP_CONFIG_FILE_SCAN_DIR` | `string` | N/A |
| `PHP_SHLIB_SUFFIX`         | `string` | The build-platform's shared library suffix, such as "so" (most Unixes) or "dll" (Windows). |
| `PHP_FD_SETSIZE`           | `string` | The maximum number of file descriptors for select system calls. |

#### Error Reporting Constants

| Constant | Type | Description | Value |
| -------- | ---- | ----------- | ----- |
| `E_ERROR`             | `int` | Fatal run-time errors. These indicate errors that can not be recovered from, such as a memory allocation problem. The execution of the script is halted. | `1`     |
| `E_WARNING`           | `int` | Run-time warnings (non-fatal errors). Execution of the script is not halted. | `2`     |
| `E_PARSE`             | `int` | Compile-time parse errors. Parse errors should only be generated by the parser. | `4`     |
| `E_NOTICE`            | `int` | Run-time notices. Indicate that the script encountered something that could indicate an error, but could also happen in the normal course of running a script. | `8`     |
| `E_CORE_ERROR`        | `int` | Fatal errors that occur during PHP's initial startup. This is like an E_ERROR, except it is generated by the core of PHP. | `16`    |
| `E_CORE_WARNING`      | `int` | Warnings (non-fatal errors) that occur during PHP's initial startup. This is like an E_WARNING, except it is generated by the core of PHP. | `32`    |
| `E_COMPILE_ERROR`     | `int` | Fatal compile-time errors. This is like an E_ERROR, except it is generated by the Zend Scripting Engine. | `64`    |
| `E_COMPILE_WARNING`   | `int` | Compile-time warnings (non-fatal errors). This is like an E_WARNING, except it is generated by the Zend Scripting Engine. | `128`   |
| `E_USER_ERROR`        | `int` | User-generated error message. This is like an E_ERROR, except it is generated in PHP code by using the PHP function `trigger_error()`. | `256`   |
| `E_USER_WARNING`      | `int` | User-generated warning message. This is like an E_WARNING, except it is generated in PHP code by using the PHP function `trigger_error()`. | `512`   |
| `E_USER_NOTICE`       | `int` | User-generated notice message. This is like an E_NOTICE, except it is generated in PHP code by using the PHP function `trigger_error()`. | `1024`  |
| `E_STRICT`            | `int` | Enable to have PHP suggest changes to your code which will ensure the best interoperability and forward compatibility of your code. | `2048`  |
| `E_RECOVERABLE_ERROR` | `int` | Catchable fatal error. It indicates that a probably dangerous error occurred, but did not leave the Engine in an unstable state. If the error is not caught by a user-defined handle (see also `set_error_handler()`), the application aborts as it was an `E_ERROR`. | `4096`  |
| `E_DEPRECATED`        | `int` | Run-time notices. Enable this to receive warnings about code that will not work in future versions. | `8192`  |
| `E_USER_DEPRECATED`   | `int` | User-generated warning message. This is like an E_DEPRECATED, except it is generated in PHP code by using the PHP function `trigger_error()`. | `16384` |
| `E_ALL`               | `int` | All errors and warnings, as supported. | `32767` |

The above values (either numerical or symbolic) are used to build up a bitmask that specifies which errors to report. You can use the bitwise operators to combine these values or mask out certain types of errors. Note that only `|`, `~`, `!`, `^` and `&` will be understood within `php.ini`. See also [`error-reporting()`](https://www.php.net/manual/en/function.error-reporting.php).

### Operators

#### Logic Operators

PHP uses both symbol-based and word-based logic operators. The symbol-based operators are C-based.

| Operator | Example     | True When |
| -------- | -----------  | --------- |
| `and`    | `$a and $b`  | Both `$a` and `$b` evaluate `true`  |
| `and`    | `$a && $b`   | Both `$a` and `$b` evaluate `true`  |
| `or`     | `$a or $b`   | Either `$a` or `$b` evaluate `true` |
| `or`     | `$a \|\| $b` | Either `$a` or `$b` evaluate `true` |
| `xor`    | `$a xor $b`  | One of (but not both) `$a` or `$b` is `true` |
| `xor`    | `$a ^ $b`    | One of (but not both) `$a` or `$b` is `true` |
| `not`    | `!$a`        | `$a` is not `true` (`false`) |

It is better (a good practice actually) not to mix both forms (symbol/word-based) in the same comparison. Even though both serve the same purpose, they have different [precedence](https://www.php.net/manual/en/language.operators.precedence.php). For that reason is safer to **use the symbol-based form only**.

```php
$a = true;
$b = false;
$word = $a and $b; // $word = true
$symbol = $a && $b; // $symbol = false
assert($word === $symbol);
```

The above is due to `and` and `or` have lower precedence than `=`, so the comparison happens after the assignment. You can visualize like this:

```php
($word = $a) and $b;
```

At this point `$word` has the value `true` because it is assigned, and the `and $b` part happens next but is practically being ignored because the result of the comparison is never stored in a variable.

Ouch 🤕.

▶️ Run exercise:

```bash
php trainer operator:logic-precedence
```

#### Bitwise Operators

Bitwise operators work on the bits of integers represented in binary form. Every integer has its representation in binary, for example:

| Decimal | Binary  |
| ------- | ------- |
| `0`     | `0`     |
| `1`     | `1`     |
| `2`     | `10`    |
| `4`     | `100`   |
| `8`     | `1000`  |
| `16`    | `10000` |
| `17`    | `10001` |

In PHP you'd represent binaries by prepending `0b` to the binary number, for example `16` would be `0b10000`.

There are three standard logical bitwise operators.

**Note:** In the following examples, when we say "a bit set" it means "there is a `1` at that position". Oppositely, when we say "a bit is not set" it means "there is a `0` at that position".

##### `&` (AND)

The result will have a bit set if both of the bits of the operands were set.

It's easier to see how these operators behave in a table. Let's use `25` and `50` with the `&` (AND) operator:

<table>
    <thead>
        <tr>
            <th>Value/Operator</th>
            <th colspan="7">Bits in Each Position</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><code>50</code></td>
            <td><code>1</code></td>
            <td><code>1</code></td>
            <td><code>0</code></td>
            <td><code>0</code></td>
            <td><code>1</code></td>
            <td><code>0</code></td>
        </tr>
        <tr>
            <td><code>25</code></td>
            <td><code>0</code></td>
            <td><code>1</code></td>
            <td><code>1</code></td>
            <td><code>0</code></td>
            <td><code>0</code></td>
            <td><code>1</code></td>
        </tr>
        <tr>
            <td><strong>Operation</strong></td>
            <td><code>1 & 0</code></td>
            <td><code>1 & 1</code></td>
            <td><code>0 & 1</code></td>
            <td><code>0 & 0</code></td>
            <td><code>1 & 0</code></td>
            <td><code>0 & 1</code></td>
        </tr>
        <tr>
            <td><strong>Result</strong></td>
            <td><code>0</code></td>
            <td><code>1</code></td>
            <td><code>0</code></td>
            <td><code>0</code></td>
            <td><code>0</code></td>
            <td><code>0</code></td>
        </tr>
    </tbody>
</table>

The result is `010000` (or `10000`) which is `16` in decimal, therefore `50 & 25` is `16`.

##### `|` (OR)

If one or both of the operands have a bit set then the result will have that bit set.

<table>
    <thead>
        <tr>
            <th>Value/Operator</th>
            <th colspan="7">Bits in Each Position</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><code>50</code></td>
            <td><code>1</code></td>
            <td><code>1</code></td>
            <td><code>0</code></td>
            <td><code>0</code></td>
            <td><code>1</code></td>
            <td><code>0</code></td>
        </tr>
        <tr>
            <td><code>25</code></td>
            <td><code>0</code></td>
            <td><code>1</code></td>
            <td><code>1</code></td>
            <td><code>0</code></td>
            <td><code>0</code></td>
            <td><code>1</code></td>
        </tr>
        <tr>
            <td><strong>Operation</strong></td>
            <td><code>1 | 0</code></td>
            <td><code>1 | 1</code></td>
            <td><code>0 | 1</code></td>
            <td><code>0 | 0</code></td>
            <td><code>1 | 0</code></td>
            <td><code>0 | 1</code></td>
        </tr>
        <tr>
            <td><strong>Result</strong></td>
            <td><code>1</code></td>
            <td><code>1</code></td>
            <td><code>1</code></td>
            <td><code>0</code></td>
            <td><code>1</code></td>
            <td><code>1</code></td>
        </tr>
    </tbody>
</table>

The result is `111011` which is `59` in decimal, therefore `50 | 25` is `59`.

##### `^` (XOR)

If one and only one of the operands (not both) has the bit set then the result will have the bit set.

<table>
    <thead>
        <tr>
            <th>Value/Operator</th>
            <th colspan="7">Bits in Each Position</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><code>50</code></td>
            <td><code>1</code></td>
            <td><code>1</code></td>
            <td><code>0</code></td>
            <td><code>0</code></td>
            <td><code>1</code></td>
            <td><code>0</code></td>
        </tr>
        <tr>
            <td><code>25</code></td>
            <td><code>0</code></td>
            <td><code>1</code></td>
            <td><code>1</code></td>
            <td><code>0</code></td>
            <td><code>0</code></td>
            <td><code>1</code></td>
        </tr>
        <tr>
            <td><strong>Operation</strong></td>
            <td><code>1 ^ 0</code></td>
            <td><code>1 ^ 1</code></td>
            <td><code>0 ^ 1</code></td>
            <td><code>0 ^ 0</code></td>
            <td><code>1 ^ 0</code></td>
            <td><code>0 ^ 1</code></td>
        </tr>
        <tr>
            <td><strong>Result</strong></td>
            <td><code>1</code></td>
            <td><code>0</code></td>
            <td><code>1</code></td>
            <td><code>0</code></td>
            <td><code>1</code></td>
            <td><code>1</code></td>
        </tr>
    </tbody>
</table>

The result is `101011` which is `43` in decimal, therefore `50 ^ 25` is `43`.

Using any of these operators on a different variable type will cause PHP to cast the variable to integer before operating on it. Therefore, using them on non-numeric strings will cause comparisons to `0` (the reason why `'not a number' == 0` results in true, by the way).

##### `~` (NOT)

The effect of this operator is to flip the bits in a value—if a bit is set it becomes unset, and if it were not set it becomes set.

<table>
    <thead>
        <tr>
            <th>Value/Operator</th>
            <th colspan="6">Bits in Each Position</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><code>50</code></td>
            <td><code>1</code></td>
            <td><code>1</code></td>
            <td><code>0</code></td>
            <td><code>0</code></td>
            <td><code>1</code></td>
            <td><code>0</code></td>
        </tr>
        <tr>
            <td><code>~50</code></td>
            <td><code>0</code></td>
            <td><code>0</code></td>
            <td><code>1</code></td>
            <td><code>1</code></td>
            <td><code>0</code></td>
            <td><code>1</code></td>
        </tr>
    </tbody>
</table>

##### Bit Shifting

PHP also has operators to shift bits left and right. The effect of these operators is to shift the bit pattern of the value either left or right while inserting bits set to 0 in the newly created empty spaces.

Let's shift `50`:

<table>
    <thead>
        <tr>
            <th>Value/Operator</th>
            <th>Operation</th>
            <th>Result</th>
            <th>Result (Decimal)</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><code>50</code></td>
            <td>None</td>
            <td><code>0 1 1 0 0 1 0</code></td>
            <td><code>50</code></td>
        </tr>
        <tr>
            <td><code>50 >> 1</code></td>
            <td>Shift right by 1</td>
            <td><code>0 0 1 1 0 0 1</code></td>
            <td><code>25</code></td>
        </tr>
        <tr>
            <td><code>50 << 1</code></td>
            <td>Shift left by 1</td>
            <td><code>1 1 0 0 1 0 0</code></td>
            <td><code>100</code></td>
        </tr>
    </tbody>
</table>

So, you're moving `110010` left and right.

When shifting left by `n`, you add `n` zeros to the right and don't remove any digits on the left (in the example below we add `[]` and leading zeros to the initial value to make it easier to see the movement), effectively multiplying the decimal value <code>×2<sup>n</sup></code> (or `×2` `n` times):

| Bit Shift | Binary | Exponential | Multiplication | Result |
| --------- | ------ | ----------- | -------------- | ------ |
| `50 << 0` | `000[110010]` | <code>50 × 2<sup>0</sup></code> | `50 × (1)` | `50` |
| `50 << 1` | `00[110010]0` | <code>50 × 2<sup>1</sup></code> | `50 × (2)` | `100` |
| `50 << 2` | `0[110010]00` | <code>50 × 2<sup>2</sup></code> | `50 × (2 × 2)` | `200` |
| `50 << 3` | `[110010]000` | <code>50 × 2<sup>3</sup></code> | `50 × (2 × 2 × 2)` | `400` |

When shifting right by `n`, you remove `n` digits on the right (in the example below we add `[]` and leading zeros to the values to make it easier to see the movement), effectively dividing the decimal value by <code>2<sup>n</sup></code> (or by `2` `n` times) while losing precision.

| Bit Shift | Binary | Exponential | Multiplication | Result |
| --------- | ------ | ----------- | -------------- | ------ |
| `50 >> 0` | `[110010]` | <code>50 ÷ 2<sup>0</sup></code> | `50 ÷ (1)` | `50` |
| `50 >> 1` | `0[11001`  | <code>50 ÷ 2<sup>1</sup></code> | `50 ÷ (2)` | `25` |
| `50 >> 2` | `00[1100`  | <code>50 ÷ 2<sup>2</sup></code> | `50 ÷ (2 × 2)` | `12` |
| `50 >> 3` | `000[110`  | <code>50 ÷ 2<sup>3</sup></code> | `50 ÷ (2 × 2 × 2)` | `6` |

**Tip:** The [`base_convert()`](https://www.php.net/manual/en/function.base-convert.php) and [`decbin()`](https://www.php.net/manual/en/function.decbin.php) functions are extremely useful. For example, to output the binary representation of the decimal number `50`, you can use `base_convert(50, 10, 2)` or `decbin(50)`.

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

### Casting Types

#### Boolean

PHP casts values to boolean `false` if they are:

- Integers (`int`) (also `float`) of value `0` (zero)
    - Which means negative values cast to `true`
- Strings (`string`) with empty value `''` or with value `'0'` (zero)
- Arrays (`array`) with no elements
- Null (`null`) variables

#### String to Numbers

When casting strings to numeric types (such as `int` or `float`), PHP will default to `0` (zero) if the string does not start with a numeric value. If it does start with a numeric value, but then has a non-numeric value and later another (set of) numeric value(s), these will be ignored.

```php
echo (int) '12 o clock'; // 12
echo (int) 'Half past 12'; // 0
echo (int) '12.30'; // 12
echo (int) '7.2e2 minutes after midnight'; // 720
```

#### Floats to Integers

Casting floating point values to integers truncates the value; no calculation occurs:

```php
echo (int) 1234.99; // 1234
echo (int) -1234.99; // -1234
```

#### Floats to Integers in Array Keys

When using floats in array keys, PHP will do the same conversion logic [as seen previously](#floats-to-integers), replacing any previous value with the same result.

```php
$array = [
    0   => 'zero',
    0.5 => 'half',
    1   => 'one',
    1.5 => 'one and a half'
];

[
    0 => 'half', // 0.5 casted to integer as 0, replaces 0.
    1 => 'one and a half', // 1.5 casted to integer as 1, replaces 1.
]
```

### Cheat Sheets

#### Case Sensitiveness

PHP follows different rules across entities/members in terms of case sensitiveness. Here's a list of the most important ones:

##### Case Sensitive

- Constants
- Variables
- Array keys

```php
define('PI', 3.1416);
const VERSION = 7;
$name = 'Harry PHPotter';
$complex = ['a' => 'HermioneJS'];

echo pi; // Use of undefined constant pi, assumes 'pi' as string.
echo version; // Use of undefined constant pi, assumes 'version' as string.
echo $Name; // Undefined variable: Name.
echo $complex['A']; // Undefined index: A.
```

##### Case Insensitive

- Namespaces
- Classes
- Methods
- Functions

```php
namespace App\Middleware;

class Localize {
    public static function getLocale() {
        echo 'en_US';
    }
}

// In another file.
App\MiddleWare\Localize::GetLocale(); // en_US.
```

#### Strings

In functions that search in strings, the `$haystack` goes before the `$needle`. For example: `strpos()`, `strstr()`, `strchr()`.

##### Embedding Strings

PHP can embed strings stored in variables by using the `"` (double quotes) and depending on the value access complexity, `{}` to separate it from the rest of the string.

```php
$name = 'Vladimir';
$complex = ['alias' => 'Vlass'];

// My name is Vladimir, but you can call me Vlass.
echo "My name is $name, but you can call me {$complex['alias']}.";
```

If you were using single quotes `'`, then you wouldn't be embedding the variables, just showing them literally:

```php
$name = 'Vladimir';
$complex = ['alias' => 'Vlass'];

// My name is $name, but you can call me {$complex["alias"]}.
echo 'My name is $name, but you can call me {$complex["alias"]}.';
```

In addition, HEREDOC is another way of embedding strings:

```php
$name = 'Vladimir';
$complex = ['alias' => 'Vlass'];

// My name is Vladimir, but you can call me Vlass.
echo <<<HEREDOC
My name is $name, but you can call me {$complex['alias']}.
HEREDOC;
```

NOWDOC has the same effect as using single quotes:

```php
$name = 'Vladimir';
$complex = ['alias' => 'Vlass'];

// My name is $name, but you can call me {$complex['alias']}.
echo <<<'NOWDOC'
My name is $name, but you can call me {$complex['alias']}.
NOWDOC;
```

#### Arrays

In functions that search in arrays, the `$needle` goes before the `$haystack`. For example: `in_array()`, `array_search()`.

##### Array Functions

###### `array_combine()`

```php
array_combine(array $keys, array $values): array
```

It creates an associative array using the elements of `$keys` as keys, and the elements of `$values` as values. Both parameters **must have the same number of elements**.

```php
array_combine(['a', 'b'], [1, 2])

// Output.
[
    'a' => 1,
    'b' => 2,
]
```

###### `array_merge()`

```php
array_merge(...array $arrays): array
```

It will **append and/or replace** any values from the previous array going from left to right. In other words, `((($array1, $array2), $array3), $array4)...`.

```php
array_merge(
    [
        'a' => 1,
        'b' => 2,
        7   => 'good'
    ],
    [
        'b' => 3,
        'c' => 4,
        'd' => 5,
        7   => 'luck'
    ]
)

// Output
[
    'a' => 1,
    'b' => 3,      // Overridden, took right side.
    0   => 'good', // Renumbered
    'c' => 4,      // Appended
    'd' => 5,      // Appended
    1   => 'luck', // Renumbered + appended
]
```

The difference between `array_merge()` and the `+` operator is that the second will ignore values on the right hand if the key exists in the left hand, and unlike `array_merge()` it also includes numeric keys, and will not renumber them.

```php
[
    'a' => 1,
    'b' => 2,
    7   => 'good'
] + [
    'b' => 3,
    'c' => 4,
    'd' => 5,
    7   => 'luck'
]

// Output
[
    'a' => 1,
    'b' => 2,      // Kept left side, right side ignored.
    7   => 'good', // Kept left side, right side ignored.
    'c' => 4,      // Appended
    'd' => 5,      // Appended
]
```

###### `array_shift()`

```php
array_shift(array &$array): mixed
```

It will return the first element of the array and will remove it from the array. Numeric keys will be renumbered accordingly.

```php
$array = [
    'one'   => '1st',
    2       => '2nd',
    'three' => '3rd'
];
$first = array_shift($array);

// $first
'1st'

// Array
[
    0       => '2nd',
    'three' => '3rd'
]
```

###### `array_unshift()`

```php
array_unshift(array &$array, array ...$values): int
```

It will prepend the given `$values` at the beginning of the `$array`. The opposite of [`array_shift()`](#array_shift). It also renumbers the numeric indexes.

The return value is the new number of elements in the `$array`.

```php
$array = [
    2       => '2nd',
    'three' => '3rd'
];

array_unshift($array, '4th');

// $array
[
    0       => '4th', // The value we just inserted.
    1       => '2nd', // Renumbered.
    'three' => '3rd', // Nothing exciting here.
]
```

###### `array_pop()`

```php
array_pop(array &$array): mixed
```

It will return the last element of the array and will remove it from the array. Numeric keys will be preserved.

```php
$array = [
    'one'   => '1st',
    2       => '2nd',
    'three' => '3rd'
];
$last = array_pop($array);

// $last
'3rd'

// Array
[
    'one'   => '1st',
    2       => '2nd',
]
```

###### `array_push()`

```php
array_push(array &$array, array ...$values): int
```

It will append the given `$values` at the end of the `$array`. The opposite of [`array_pop()`](#array_pop). It also preserves the numeric indexes.

The return value is the new number of elements in the `$array`.

```php
$array = [
    'one'   => '1st',
    2       => '2nd',
];

array_push($array, '3rd');

// $array
[
    'one' => '1sr',
    2     => '2nd',
    3     => '3rd', // Last numeric index + 1.
]
```

###### `array_slice()`

```php
array_slice(
    array $array,
    int $offset,
    int|null $length = null,
    bool $preserve_keys = false
): array
```

It returns the `$length` items starting from `$offset` from `$array` leaving it untouched 😌.

```php
$array = ['a' => 1, 'b' => 2, 42 => 'answer', 'c' => 3];
$slices = array_slice($array, 1, 2)

// $slices
[
    'b' => 2,
    0   => 'answer',
]
```

**Note:** The `$preserve_keys` applies for numeric keys only, as you can see we lost the `42`, but we set it to true, we would preserve the `42`.

###### `array_splice()`

```php
array_splice(
    array $array,
    int $offset,
    int|null $length = null,
    mixed $replacement = []
): array
```

The return value of this function is the same as in [`array_slice()`](#array_slice), but this one **removes the slice from the `$array`** and gives you the chance to replace it with `$replacement`.

Numeric keys will be renumbered nonetheless.

```php
$array = ['a' => 1, 'b' => 2, 42 => 'answer', 'c' => 3];
$slices = array_splice($array, 1, 1);

// $slices
[
    'b' => 2,
]

// $array
[
    'a' => 1,
    // If we added a $replacement, that would be added here.
    0   => 'answer',
    'c' => 3,
]
```

Imagine it's like extracting a slice of 🍕.

#### Objects

##### Serialization

When serializing objects, the `serialize()` function will try to find the `__serialize()` and `__sleep()` methods.

```php
public function __sleep(): array
{
    return [
        'name',
        'email',
        'phone',
    ];
}
```

This method must return an array containing the property names that should be included in the serialization.

```php
public function __serialize(): array
{
    return [
        'name'  => $this->name,
        'email' => $this->email,
        'phone' => $this->phone,
    ];
}
```

This method must return an associative array containing the property names with their respective values that represent the serialized form of the object.

As you can see, `__serialize()` overrides the behavior of `__sleep()` because you can include as many keys as you want. Therefore, if both `__serialize()` and `__sleep()` are defined, only `__serialize()` will be called.

##### Trait Method Conflict

When multiple traits implement methods with the same name, you should pick which one to implement using the `insteadof` keyword or all of them with aliases using the `as` keyword:

```php
trait CommandTrait
{
    public function run()
    {
        //
    }
}

trait PersonTrait
{
    public function run()
    {
        //
    }
}

class Person
{
    use CommandTrait;
    use PersonTrait {
        PersonTrait::run insteadof CommandTrait;
        CommandTrait::run as runCommand;
    }
}

(new Person())->run(); // PersonTrait::run()
(new Person())->runCommand(); // CommandTrait::run()
```

### SPL (Standard PHP Library)

The Standard PHP Library (SPL) is a collection of interfaces and classes that are meant to solve common problems. It provides a set of standard data structures, iterators to traverse over objects, interfaces, standard Exceptions, a number of classes to work with files and autoloading functions.

#### ArrayObject

This class allows objects to work as arrays.

```php
$fruits = [
    'P' => 'Android 9',
    'Q' => 'Android 10',
    'R' => 'Android 11',
    'S' => 'Android 12'
];

$fruitArrayObject = new ArrayObject($fruits, ArrayObject::ARRAY_AS_PROPS);
$fruitArrayObject->ksort();

foreach ($fruitArrayObject as $key => $val) {
    echo "The codeletter of $val is $key\n";
}

// This works because of ArrayObject::ARRAY_AS_PROPS, can also be set with ArrayObject::setFlags()
echo $fruitArrayObject->S; // Android 12
```

#### Generators

The purpose of generators is to mitigate the memory and time problems when accessing/manipulating big iterables. Instead of putting everything in memory at once, we delegate the control individually, per iteration.

```php
$values = range(1, 1000000000);

foreach ($values as $value) {
    echo $value . PHP_EOL;
}
```

The above most likely will cause a memory exhausted error. Generators come to the rescue!

```php
function generate(int $start, int $end) {
    for ($i = $start; $i <= $end; $i++) {
        yield $i;
    }
}

$values = generate(1, 1000000000);

foreach ($values as $value) {
    echo $value . PHP_EOL;
}
```

The script will run from `1` to `1,000,000,000`, no memory exhausted!

### Features

#### Grouped Imports (PHP ^7.0)

Instead of defining the entire classpath, we can group imports of a namespace into one curly brace group.

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

This feature cleans up the constructor repetition by assigning the property visibility on the constructor parameter. Notice that this still behaves like normal properties when it comes to primitive vs. non-primitive initializations, hence, you can only auto-initialize a property with primitives, not expressions.

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

A map (or dictionary) that accepts objects as keys. Unlike `SplObjectStorage`, an object in a key of WeakMap does not contribute toward the object's reference count. That is, if at any point the only remaining reference to an object is the key of a WeakMap, the object will be garbage collected and removed from the WeakMap.

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

When a function/method can handle multiple (but specific) types of arguments, we can type-hint those in the function definition. Notice that this kind of type hinting existed in PHP 7 with the `?` before the type token, but it was just a union between the given type and `null`.

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

Encapsulation allows a class to provide signals to the outside world that certain internals are private and shouldn't be accessed. So at its core, encapsulation is about communication.

But what it means?

- `public`: Makes the property or method publicly available to anyone accessing them, inside the same class, outside the class, or derived classes (classes that [`extend`](#inheritance) it).
- `protected`: Makes the property or method accessible only within the same class or its derived classes.
- `private`: Makes the property or method accessible only within the same class.

#### Inheritance

It allows an object to acquire (or inherit) the traits and behaviors of another object.

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

Abstract classes provide templates or a base for any subclasses. A class is abstract when the `abstract` keyword is added before the `class` keyword on the class definition. Unlike [interfaces](#interfaces), abstract classes can define properties and behavior.

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

Interfaces are classes without behavior, they only have method signatures. They describe the terms for a particular contract, and any class that signs this contract must adhere to those terms. In other words, interfaces don't care about the specifics of the behavior, just that the subclasses define that behavior.

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

**Important:** In the controller class of the full example, we implement a concept called **Object Composition**. Make sure you take a look at the constructor of that class to get more details 😉.

▶️ Run exercise:

```bash
php trainer oop:interfaces
```

#### Value Objects and Mutability

A value object is an object whose equality is determined by its data (or value) rather than any particular identity.

To illustrate this, imagine three five-dollar bills resting on a table. Does one bill have a unique identity compared to the other two? From our perspective, no. Five dollars is five dollars regardless of which bill you choose. However, compare this with two human beings who have the same first and last name. Are they identical, or does each person have a unique identity? Of course, in this case, the latter is the correct answer.

```php
class Person
{
    protected string $firstName;
    protected string $lastName;

    public function __construct(string $firstName, string $lastName)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
    }
}

$personOne = new Person('John', 'Doe');
$personTwo = new Person('John', 'Doe');
```

The name attributes are often shared across a system because you might instantiate different `Person` objects and they have the same properties and might even have the same values, but are different objects.

Mutability (ability to change the internal state of an object) often opens the possibility to bypass any processes at the moment of setting the attribute of an object (like validation, events, etc.).

**Mutable:**

```php
class Age
{
    public int $value;

    public function __construct(int $value)
    {
        if ($value < 0 || $value > 120) {
            throw new InvalidArgumentException('Invalid age');
        }

        $this->value = $value;
    }
}

$age = new Age(300); // Exception: Invalid age.
$age = new Age(43); // Valid age.
$age->value = 300; // Invalid age, yet the object has it assigned, validation bypassed.
```

**Immutable:**

```php
class Age
{
    protected int $value;

    public function __construct(int $value)
    {
        if ($value < 0 || $value > 120) {
            throw new InvalidArgumentException('Invalid age');
        }

        $this->value = $value;
    }
}

$age = new Age(300); // Exception: Invalid age.
$age = new Age(43); // Valid age.
$age->value = 300; // Fatal error, access to protected property, unable to change the internal state.
```

**Benefits:**

- Avoids primitive obsession
- Helps with readability
- Helps with consistency (validations, formatting, etc.)
- By avoiding setters, we provide mutability (which tends to reduce bugs due to internal state changes)

**Note:** Be careful, do not map every primitive to a value object since it might unnecessary and increase complexity on maintainability.

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

The **L** in **SOLID**. This principle dictates that derived classes (implementation of an abstract class or interface) must be substitutable for their base class (anywhere where the abstraction is accepted). Essentially, any LSP-compliant class should have the same contract including return types.

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

The **I** in **SOLID**. This principle dictates clients should not be forced to implement an interface they don't use. This can be interpreted and implemented thinking on the knowledge each class needs from others.

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

### Databases and SQL

PHP interacts with databases via drivers. It includes the MySQL driver called `mysqli` (the `i` at the end standing for _improved_), which is the replacement for `mysql` and introduces features such as prepared statements.

You can create your own driver by using PHP's PDO (PHP Data Objects) abstraction layer.

#### Data Types

Just like PHP variables, SQL has several data types.

##### Numeric Types

These are MySQL integer types. Other databases might handle them differently.

<table>
    <thead>
        <tr>
            <th>Type</th>
            <th>Bytes</th>
            <th>Range (Signed)</th>
            <th>Range (Unsigned)</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><code>TINYINT</code></td>
            <td><code>1</code></td>
            <td><code>-128</code> to <code>127</code></td>
            <td><code>255</code></td>
        </tr>
        <tr>
            <td><code>SMALLINT</code></td>
            <td><code>2</code></td>
            <td><code>-32768</code> to <code>32768</code></td>
            <td><code>65535</code></td>
        </tr>
        <tr>
            <td><code>MEDIUMINT</code></td>
            <td><code>3</code></td>
            <td><code>-8388608</code> to <code>8388607</code></td>
            <td><code>16777215</code></td>
        </tr>
        <tr>
            <td><code>INTEGER</code></td>
            <td><code>4</code></td>
            <td><code>-2147483648</code> to <code>2147483647</code></td>
            <td><code>4294967295</code></td>
        </tr>
        <tr>
            <td><code>BIGINT</code></td>
            <td><code>8</code></td>
            <td><code>-9223372036854775808</code> to <code>9223372036854775807</code></td>
            <td><code>18446744073709551615</code></td>
        </tr>
    </tbody>
</table>

If you're wondering from where those range values come from, here's an exercise.

**`TINYINT` (`1` byte/`8` bits)**

<table>
    <tr>
        <td>1</td>
        <td>1</td>
        <td>1</td>
        <td>1</td>
        <td>1</td>
        <td>1</td>
        <td>1</td>
        <td>1</td>
    </tr>
    <tr>
        <td>2<sup>7</sup></td>
        <td>2<sup>6</sup></td>
        <td>2<sup>5</sup></td>
        <td>2<sup>4</sup></td>
        <td>2<sup>3</sup></td>
        <td>2<sup>2</sup></td>
        <td>2<sup>1</sup></td>
        <td>2<sup>0</sup></td>
    </tr>
    <tr>
        <td>128</td>
        <td>64</td>
        <td>32</td>
        <td>16</td>
        <td>8</td>
        <td>4</td>
        <td>2</td>
        <td>1</td>
    </tr>
    <tr>
        <td colspan="7"><b>Total</b></td>
        <td colspan="1">255</td>
    </tr>
</table>

When the value is `unsigned`, the range goes from `0` to `255` (a total of 256 possible values, and `0` is one of them). If the value is signed, the range is divided in half (`128`), but we need a slot for `0` since the total possible values is still just `256`. If we said `-128` to `128`, counting zero, we would need `257` possible values (because we're not talking about the digit value, but what it needs to be in memory, so `128` negative numbers + `128` positive numbers + `1` for `0`), causing an overflow.

So we consider the `0` a non-negative value, making the range from `0` to `127` a total of `128` possible positive values, therefore, the range for negative values goes from `-128` to `-1` making up another `128` values, using the total `256` values available.

#### Joins

Joins are used to connect tables based on supplied criteria. This lets you retrieve information from related tables. For the following examples, we're going to use these tables:

**The `customers` table (left):**

| u_id | u_name    | city_id |
| ---- | --------- | ------- |
| 1    | John Doe  | 1       |
| 2    | Mary Doe  | 2       |
| 3    | Kevin Doe | 1       |
| 4    | Kelly Doe | `NULL`  |

**The `cities` table (right):**

| c_id | c_name       |
| ---- | ------------ |
| 1    | San Salvador |
| 2    | San Vicente  |
| 3    | Soyapango    |
| 4    | Apaneca      |

There are multiple types of joins.

##### Inner Join

This is the default type of join in MySQL (hence, the `INNER` in `INNER JOIN` is effectively optional). This type will _join_ the records that match in both tables and exclude anything that does not match.

When we say _match_, we're referring to the indicated column value from the left table (`customers`) that have the same value on the indicated column value from the right table (`cities`).

```sql
SELECT * FROM customers INNER JOIN cities ON customers.city_id = cities.c_id
```

Like we said earlier, the `INNER` keyword is optional since, at least in MySQL, it is default behavior:

```sql
SELECT * FROM customers JOIN cities ON customers.city_id = cities.c_id
```

The result will be:

| u_id | u_name    | city_id | c_id    | c_name       |
| ---- | --------- | ------- | ------- | ------------ |
| 1    | John Doe  | 1       | 1       | San Salvador |
| 2    | Mary Doe  | 2       | 2       | San Vicente  |
| 3    | Kevin Doe | 1       | 1       | San Salvador |

We only got records where both tables match the given column value. In other words, where the city ID of a record in customers matches a record in `city`. Effectively, we didn't get `Kelly Doe` because there's no city with ID `NULL`.

##### Left Outer Join

This type of join retrieves all the records of the left table (`customers`) even if they don't match any record on the right table (`cities`). But still, it will retrieve **only** the matched records of the right table.

The `OUTER` keyword, just like `INNER`, is optional when using `LEFT JOIN` since it's the default behavior.

```sql
SELECT * FROM customers LEFT OUTER JOIN cities ON customers.city_id = cities.c_id
```

Or:

```sql
SELECT * FROM customers LEFT JOIN cities ON customers.city_id = cities.c_id
```

The result will be:

| u_id | u_name    | city_id | c_id    | c_name       |
| ---- | --------- | ------- | ------- | ------------ |
| 1    | John Doe  | 1       | 1       | San Salvador |
| 2    | Mary Doe  | 2       | 2       | San Vicente  |
| 3    | Kevin Doe | 1       | 1       | San Salvador |
| 4    | Kelly Doe | `NULL`  | `NULL`  | `NULL`       |

We got `Kelly Doe` included in the result set, even though no city matches the query, therefore all the columns related to `cities` are `NULL`.

Essentially, we're saying "get the records that match in customers and cities, nonetheless, get everything from customers".

##### Right Outer Join

The opposite to the right join, this one retrieves all the records of the right table (`cities`) even if they don't match any record on the left table (`customers`). But still, it will retrieve **only** the matched records of the left table.

The `OUTER` keyword, just like `INNER`, is optional when using `RIGHT JOIN` since it's the default behavior.

```sql
SELECT * FROM customers RIGHT OUTER JOIN cities ON customers.city_id = cities.c_id
```

Or:

```sql
SELECT * FROM customers RIGHT JOIN cities ON customers.city_id = cities.c_id
```

The result will be:

| u_id   | u_name    | city_id | c_id    | c_name       |
| ------ | --------- | ------- | ------- | ------------ |
| 1      | John Doe  | 1       | 1       | San Salvador |
| 3      | Kevin Doe | 1       | 1       | San Salvador |
| 2      | Mary Doe  | 2       | 2       | San Vicente  |
| `NULL` | `NULL`    | `NULL`  | 3       | Soyapango    |
| `NULL` | `NULL`    | `NULL`  | 4       | Apaneca      |

We got `Soyapango` and `Apaneca` added to the result set, even though no customer is referencing those cities, therefore, the customer-related fields are `NULL`. Also, we didn't get `Kelly Doe` this time, because there's no city where the ID is `NULL`, so that's not a match.

Essentially, we're saying "get the records that match in customers and cities, nonetheless, get everything from cities".

##### Full Outer Join

This type of join is the mix of the [left](#left-outer-join) and [right](#right-outer-join) joins. It will retrieve all the records, either match or not, from the left table and the right table.

```sql
SELECT * FROM customers FULL OUTER JOIN cities ON customers.city_id = cities.c_id
```

Or:

```sql
SELECT * FROM customers FULL JOIN cities ON customers.city_id = cities.c_id
```

The result will be:

| u_id   | u_name    | city_id | c_id    | c_name       |
| ------ | --------- | ------- | ------- | ------------ |
| 1      | John Doe  | 1       | 1       | San Salvador |
| 2      | Mary Doe  | 2       | 2       | San Vicente  |
| 3      | Kevin Doe | 1       | 1       | San Salvador |
| 4      | Kelly Doe | `NULL`  | `NULL`  | `NULL`       |
| `NULL` | `NULL`    | `NULL`  | 3       | Soyapango    |
| `NULL` | `NULL`    | `NULL`  | 4       | Apaneca      |

It contains all the records from both tables, either they match or not, but those who match will be related in the result set as seen above.

###### Full Outer Join for MySQL

`FULL OUTER JOIN` does not exist in MySQL 😨 but they can be emulated 😌. Using the previous example, we can MySQL-it as follows:

```sql
(
    SELECT *
    FROM customers
    LEFT JOIN cities ON customers.city_id = cities.c_id
)
UNION ALL
(
    SELECT *
    FROM customers
    RIGHT JOIN cities ON customers.city_id = cities.c_id
)
```

We apply `UNION ALL` (so duplicates are not removed, just like `FULL JOIN`) to the result of the `LEFT JOIN` and `RIGHT JOIN`.

#### Keys

Keys impose constraints on columns. There are multiple types of keys, but to mention a few of the most used:

- `UNIQUE`: Ensures that all values in the column are different. You can have many `UNIQUE` constraints in one table.
- `PRIMARY`: Can be defined on either a single or multiple columns. It guarantees that each row in the database will have a unique value combination for the columns in the key, hence automatically using `UNIQUE`. However, you can have only one `PRIMARY KEY` constraint. A row may not have a null value for its primary key.
- `FOREIGN`: It references a primary key of another table.

#### Indexes

Indexes are data structures optimized for lookups and help the database find results faster. MySQL requires every key also to be indexed, therefore, at least in MySQL, [keys and indexes are synonyms](https://dev.mysql.com/doc/refman/8.0/en/create-table.html#:~:text=KEY%20%7C%20INDEX). This requirement is to improve performance.

**Note:** Although the above implies that you cannot have keys without indexes, it is possible to index columns that are not keyed.

The way indexes work is by creating an "alternative database" (not called like that, but it's easier to visualize it this way) using the [B-tree](https://en.wikipedia.org/wiki/B-tree) (for `PRIMARY KEY`, `UNIQUE`, `INDEX`, and `FULLTEXT`) data structure with the indexed columns data.

This way, when you query data, the [query plan](https://dev.mysql.com/doc/refman/8.0/en/execution-plan-information.html) will determine the best way to query the data. If the query contains any of the indexed columns, the engine will prioritize the index, therefore it does not need to go through all the rows and columns. Of course, the above depends on the query, but in a nutshell, that's how it works.

Think of indexes as a table of contents. You don't go through an entire GitHub README file to read about MySQL indexes; instead, you click the burger and search through the titles of the README 😄

The syntax for creating indexes is:

```sql
CREATE INDEX index_name
ON table_name (column_name, ...);
```

Let's create an index for the `c_name` column of the `customers` table we were using earlier:

```sql
CREATE INDEX customers_name_idx
ON customers (c_name); -- There can be multiple columns inside the parentheses.
```

Now if we create a query like this:

```sql
SELECT COUNT(*)
FROM customers
WHERE c_name = 'John Doe'
```

The engine will use the index to find the record.

```sql
SELECT COUNT(*)
FROM customers
WHERE c_name = 'John Doe'
    AND city_id = 1
```

The engine will still use the index because the query plan is very smart 🤓 and will notice that we're querying an indexed column, and the result set will contain only records that match the condition, so, it will reduce the query scope to only those records instead of the whole database. Pretty neat, huh? 😃

**Note:** Indexes need to be updated when data is changed, this adds overhead to writing. So use indexes wisely 🧐

### XML

XML (or eXtensible Markup Language) is a markup language that defines a set of rules for encoding documents in a format that is both human-readable and machine-readable. It is a subset of the Standardized General Markup Language (SGML).

PHP has 2 type of XML parsers:

- **Tree Parsers:** These attempt to parse the entire document at once and transform it into a tree structure.
    - DOMDocument
    - SimpleXML
- **Event-based Parsers:** These work by reading the XML document node by node and providing you the opportunity to hook into events associated with this reading process.
    - XMLReader
    - XML Expat parser

#### Building XML

##### DOMDocument

```php
$domDocument = new \DomDocument();
$tasks = $domDocument->createElement('Tasks');

$task = $domDocument->createElement('Task', 'Add the SimpleXML version of this example.');
$task->setAttribute('required', 'true');

$tasks->appendChild($task);
$domDocument->appendChild($tasks);

echo $domDocument->saveXML();
```

**Full example:** `src/XML/DOMDocument/Build.php`

▶️ Run exercise:

```bash
php trainer xml:dom:build
```

##### SimpleXML

```php
$tasks = new \SimpleXMLElement('<Tasks></Tasks>');

$task = $tasks->addChild('Task', 'Notify the reader to check the full example');
$task->addAttribute('required', 'true');
```

Note that `SimpleXML` is designed after its name, to be simple. It has limitations for which you can rely on the `DOMDocument` class. Check the full example for more information.

**Full example:** `src/XML/SimpleXML/Build.php`

▶️ Run exercise:

```bash
php trainer xml:simple:build
```

#### XPath

XPath is a major element in the XSLT (eXtensible Stylesheet Language Tranformations) standard. It can be used to navigate through elements and attributes in an XML document.

You can use XPath expressions directly in `DOMDocument` and `SimpleXML`.

##### DOMDocument

```php
$domDocument = new \DomDocument();
$domDocument->load('library.xml');

$xpath = new \DomXpath($domDocument);
$results = $xpath->query("//CD/YEAR");

foreach ($domNodeList as $element) {
    echo '[' . $element->nodeName . '] ';

    foreach ($element->childNodes as $node) {
        echo $node->nodeValue . PHP_EOL;
    }
}
```

**Full example:** `src/XML/DOMDocument/XPath.php`

▶️ Run exercise:

```bash
php trainer xml:dom:xpath
```

##### SimpleXML

```php
$xml = simplexml_load_file('library.xml');
$results = $xml->xpath("//CD/YEAR");

foreach ($results as $element) {
    echo '[' . $element->getName() . '] ';

    echo $element . PHP_EOL;
}
```

**Full example:** `src/XML/SimpleXML/XPath.php`

▶️ Run exercise:

```bash
php trainer xml:simple:xpath
```

### SOAP

PHP ships a SOAP client and a SOAP server with it. You can make calls to web services and map them to object members (properties and methods).

```php
$client = new \SoapClient('https://www.dataaccess.com/webservicesserver/NumberConversion.wso?WSDL');

$request = ['ubiNum' => 15665];
$response = $client->NumberToWords($request);

echo $response->NumberToWordsResult;
```

**Full example:** `src/SOAP/Client.php`

▶️ Run exercise:

```bash
php trainer soap:client
php trainer soap:client 42
```
