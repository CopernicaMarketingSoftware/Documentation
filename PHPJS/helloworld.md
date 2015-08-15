# Hello World!

The PHP-JS extension is centered around the JS\Context class. This class 
represents a completely isolated instance of the V8 Javascript engine - similar 
to for example the _window_ object in a page of a webbrowser. Variables and 
functions declared in one context are not visible to any other context instance.

## Creating a context

The JS\Context constructor does not take any parameters, and can thus be 
constructed like this:

```php
&lt;?php
// create a new Javascript context
$context = new JS\Context();
?&gt;
```

## Evaluating a piece of javascript code

After construction, the context can be used to evaluate javascripts, using the 
evaluate() method. This method returns the value of the last executed statement.

The evaluate method takes exactly one parameter, a string, with javascript code 
to execute.

```php
&lt;?php
// create a new context
$context = new JS\Context;

// execute a statement concatenating into a very well-known greeting
$result = $context->evaluate("'Hello world!'");

// result now contains the string "Hello world!"
var_dump($result);
?&gt;
```

## The return value

The return value of the evaluate() method is the value of the _last_ evaluated
expression in the Javascript. If the script contains multiple statements, the value
of the last statement is returned.

```php
&lt;?php
// create a new context
$context = new JS\Context;

// execute a statement concatenating into a very well-known greeting
$result = $context->evaluate("var x = 3; var y = 4; var z = x + y; ++z;");

// result now contains the integer 8
var_dump($result);
?&gt;
```

## Assigning data

Things start to become powerful once you start assigning PHP variables to the 
Javascript engine. It then suddenly makes sense to write scripts:

```php
&lt;?php
// create a new context
$context = new JS\Context;

// assign data to the javascript engine
$context->assign('language', 'dutch');
$context->assign('name', 'Emiel');

// execute a statement concatenating into a very well-known greeting
$result = $context->evaluate("var x = language == 'dutch' ? ('Hallo ' + name + '!') : ('Hello ' + name + '!');");

// result now contains the string "Hallo Emiel!" (because the language was set to dutch)
var_dump($result);
?&gt;
```
