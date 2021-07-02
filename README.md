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

Superglobals are variables that are available automatically to the script, with no need of `global` keyword usage. Superglobals are available in every scope.

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

**Note:** Assume `Math.php` is loaded when `Lang.php` is executed.

▶️ Run exercise:

```bash
php trainer constants:namespaced
```

#### Magic Constants

There are nine magical constants that change depending on where they are used. For example, the value of `__LINE__` depends on the line that it's used on in the script. All these "magical" constants are resolved at compile time, unlike regular constants, which are resolved at runtime. These special constants are case-insensitive and are as follows:

| Constant | Content |
| -------- | ------- |
| `__LINE__`      | The current line number of the PHP script being executed |
| `__DIR__`       | The directory of the file. If used inside an include, the directory of the included file is returned. This is equivalent to dirname(__FILE__). This directory name does not have a trailing slash unless it is the root directory |
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
| `PHP_OS_FAMILY`            | `string` | The operating system family PHP was built for. One of `Windows`, `BSD`, `Darwin`, `Solaris`, `Linux` or `Unknown`. Available `. |
| `PHP_SAPI`                 | `string` | The Server API for this build of PHP. See also `php_sapi_name()`. |
| `PHP_EOL`                  | `string` | The correct 'End Of Line' symbol for this platform. |
| `PHP_INT_MAX`              | `int`    | The largest integer supported in this build of PHP. Usually `int(2147483647)` in 32 bit systems and `int(9223372036854775807)` in 64 bit systems. |
| `PHP_INT_MIN`              | `int`    | The smallest integer supported in this build of PHP. Usually `int(-2147483648)` in 32 bit systems and `int(-9223372036854775808)` in 64 bit systems. Usually, PHP_INT_MIN === ~PHP_INT_MAX. |
| `PHP_INT_SIZE`             | `int`    | The size of an integer in bytes in this build of PHP. |
| `PHP_FLOAT_DIG`            | `int`    | Number of decimal digits that can be rounded into a float and back without precision loss. Available `. |
| `PHP_FLOAT_EPSILON`        | `float`  | Smallest representable positive number `x`, so that `x + 1.0` != `1.0`. Available `. |
| `PHP_FLOAT_MIN`            | `float`  | Smallest representable positive floating point number. If you need the smallest representable negative floating point number, use `PHP_FLOAT_MAX`. Available `.
| `PHP_FLOAT_MAX`            | `float`  | Largest representable floating point number. Available `. |
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
| `PHP_FD_SETSIZE`           | `string` | The maximum number of file descriptors for select system calls. Available `. |

#### Error Reporting Constants

| Constant | Type | Description | Value |
| -------- | ---- | ----------- | ----- |
| `E_ERROR`             | `int` | Fatal run-time errors. These indicate errors that can not be recovered from, such as a memory allocation problem. Execution of the script is halted. | `1`     |
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
| `E_RECOVERABLE_ERROR` | `int` | Catchable fatal error. It indicates that a probably dangerous error occurred, but did not leave the Engine in an unstable state. If the error is not caught by a user defined handle (see also `set_error_handler()`), the application aborts as it was an `E_ERROR`.	| `4096`  |
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
$word = $a and $b; // true
$symbol = $a && $b; // false
assert($word === $symbol);
```

The above is due to `and` and `or` have lower precedence than `=`. Ouch 🤕.

▶️ Run exercise:

```bash
php trainer operator:logic-precedence
```

#### Bitwise Operators

Bitwise operators work on the bits of integers represented in binary form. Every integer has its representation in binary, for example:

| Decimal | Binary   |
| ------- | -------- |
| `0`     | `0`      |
| `1`     | `1`      |
| `2`     | `10`     |
| `4`     | `100`    |
| `8`     | `1000`   |
| `16`     | `10000` |
| `17`     | `10001` |

In PHP you'd represent binaries by prepending `0b` to the binary number, for example `16` would be `0b10000`.

There are three standard logical bitwise operators.

##### `&` (AND)

The result will have a bit set if both of the operands bits were set.

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

So, basically you're moving `110010` left and right.

When shifting left by `n`, you add `n` zeros to the right and don't remove any digits on the left (in the example below we add `[]` and leading zeros to the initial value to make it easier to see the movement), effectively multiplying the decimal value <code>×2<sup>n</sup></code> (or `×2` `n` times):

| Bit Shift | Binary | Exponential | Multiplication | Result |
| --------- | ------ | ----------- | -------------- | ------ |
| `50 << 0` | `000[110010]` | <code>50 × 2<sup>0</sup></code> | `50 × (1)` | `50` |
| `50 << 1` | `00[110010]0` | <code>50 × 2<sup>1</sup></code> | `50 × (2)` | `100` |
| `50 << 2` | `0[110010]00` | <code>50 × 2<sup>2</sup></code> | `50 × (2 × 2)` | `200` |
| `50 << 3` | `[110010]000` | <code>50 × 2<sup>3</sup></code> | `50 × (2 × 2 × 2)` | `400` |

When shifting right by `n`, you remove `n` digits on the right (in the example below we add `[]` and leading zeros to the values to make it easier to see the movement), efectively dividing the decimal value by <code>2<sup>n</sup></code> (or by `2` `n` times) while loosing precision.

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
echo (int) '12.30'; // 12.3
echo (int) '7.2e2 minutes after midnight'; // 720
```

#### Floats to Integers

Casting floating point values to integers truncates the value; no calculation occurs:

```php
echo (int) 1234.99; // 1234
echo (int) -1234.99; // -1234
```

### Cheat Sheets

PHP has several functions that create (or are related to) arrays and strings. Sometimes we might get confused by the fact that the order of the parameters is not the same, but here's a trick:

- In functions that search in strings, the `$haystack` goes before the `$needle`. For example: `strpos()`, `strstr()`, `strchr()`
- In functions that search in arrays, the `$needle` goes before the `$haystack`. For example: `in_array()`, `array_search()`

#### Array Functions

##### `array_combine()`

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

##### `array_merge()`

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

The difference between `array_merge()` and the `+` operator is that the second will ignore values on the right hand if the key exist in the left hand, and unlike `array_merge()` it also includes numeric keys, and will not renumber them.

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

##### `array_slice()`

```php
array_slice(
    array $array,
    int $offset,
    int|null $length = null,
    bool $preserve_keys = false
): array
```

It returns the `$length` items starting from `$offset`. Remember getting a **slice** of 🍕.

```php
array_slice(['a' => 1, 'b' => 2, 42 => 'answer', 'c' => 3], 1, 2)

// Output
[
    'b' => 2,
    0   => 'answer',
]
```

**Note:** The `$preserve_keys` applies for numeric keys only, as you can see we lost the `42`, but we set it to true, we would preserve the `42`.

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

**Important:** In the controller class of the full example, we implement a concept called **Object Composition**. Make sure you take a look to the constructor of that class to get more details 😉.

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
