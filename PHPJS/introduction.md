# Introduction

This extension gives you the power to execute javascript
right from your PHP script. This javascript code is run
through the Google V8 engine - the same engine that powers
the Google Chrom(e/ium) browser and Node.js.

In addition to simply executing javascript code, this extension
also provides a tight integration between PHP and javascript.
It is, for example, possible to assign variables - whether they
are numbers, strings, functions or even complete objects - so
that they can be accessed and used from javascript.

The PHP-JS extension is centered around the JS\Context class.
This class represents a completely isolated instance of the
v8 javascript engine - similar to e.g. the window object in
every page of a webbrowser - meaning that variables and functions
declared in one context are not visible to any other context.

## Creating a context

The context does not take any parameters in its constructor,
and can thus be constructed like this.

```php
// create a new context
$context = new JS\Context;
```

## Evaluating a piece of javascript code

After construction, the context can be used to evaluate
javascript, using the evaluate method. This method returns
the value of the last statement executed.

The evaluate method takes exactly one parameter, a string,
with javascript code to execute.

```php
// create a new context
$context = new JS\Context;
// execute a statement concatenating into a very well-known greeting
$result = $context->evaluate("'Hello, ' + 'world!'");
// string(13) "Hello, world!"
var_dump($result);
```

In this example we concatenate two strings: 'Hello, ' and 'world!'.
Since this is the last statement in the script, this is the result
returned from the evaluate function.

## Sharing variables between javascript and PHP

Besides executing javascript code and retrieving the result,
it is also possible to make variables from your PHP script
accessible to the javascript code that you evaluate.

Assigning variables can be done using the assign method. This
method accepts as parameters the name of the variable, the actual
variable to assign and an optional third parameter with some
additional attributes.
    
```php
/**
 *  Assign a property to make it accessible to the javascript context
 *
 *  @param  string      name of the property to assign
 *  @param  mixed       the value to assign to javascript (anything except a resource)
 *  @param  unspecified one of JS\None, JS\ReadOnly, JS\DontDelete or JS\DontEnumerate
 */
void assign(string $name, mixed $value [, $attribute = JS\None ] );
```

The first two parameters seem obvious: the name of the property and
the actual value of the property to assign. The third property gives
you control over how the property will appear in javascript.

By default, an assigned variable can be enumerated, deleted and updated
by an evaluated piece of javascript code. Using JS\ReadOnly, any changes
(including deletion) to the variable will be silently ignored.
JS\DontDelete will allow the variable to be updated, but not deleted while
JS\DontEnumerate will prevent the variable from appearing in an enumeration:

```php
// iterate over all properties in an object
for (var name in ...)
{
    // this loop won't be entered for any variables assigned with JS\DontEnumerate
}
```
As you saw in the previous example, the result of javascript
statements is cast to the appropriate corresponding type in
PHP. This works both ways, as variables can be assigned to
the javascript context.

```php
// create a new context
$context = new JS\Context;

// assign the greeting to the context
$context->assign("greet", "Hello");

// execute a statement using the just-assigned variable
$result = $context->evaluate("greet + ', world!'");

// string(13) "Hello, world!"
var_dump($result);
```

All variables - with the exception of resources - can be assigned
to the context. Assigning a function will make that function callable
from the javascript context.

```php
// create a new context
$context = new JS\Context;

// create a function to greet something (or someone) and assign it to the context
$context->assign("greet", function($what) { echo "Hello, ", $what, "!\n"; }, JS\ReadOnly);

// execute a statement and call the assigned function
$context->evaluate("greet('world')");
```

If you assign an object, all public properties and methods
become available. There is one gotcha though: In PHP it is
possible to assign a property and a method with the same name.
This is not possible in javascript, as functions are also
properties and we cannot have two properties by the same
name (that would be ambiguous).

```php
// create a new context
$context = new JS\Context;

// create a function to print variables from javascript
$context->assign('print_r', function($variable) { print_r($variable); });

// context to an example database
$context->assign('database', new mysqli('example.com', 'user', 'password', 'database'));

// the script to execute
$script = <<<'EOD'

// retrieve data from our test table
var result = database.query("SELECT id FROM test ORDER BY id ASC");

// and process all rows
while (row = result.fetch_assoc())
{
    // each row gets dumped using our imported print_r function
    print_r(row);
}

EOD;

// execute the script now
$context->evaluate($script);
```
