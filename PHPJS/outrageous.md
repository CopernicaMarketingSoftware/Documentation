# An outrageous example

The normal use case for PHP-JS (the reason why we made this extension) was 
to execute simple JavaScript snippets created by end-users. In these
snippets you normally do not want to expose the full PHP runtime environment,
because that would allow users to send in JavaScripts that can be
used to hack into your servers.

However, if you insist, and if you know what you are doing, nothing forbids
you from assigning core PHP classes to the JavaScript engine. The following 
example for example exposes a database object that is connected to a MySQL
database:

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

Of course, in a production environment you probably don't want to do expose
a database object to the javascript engine, especially not if the to-be-executed 
script comes from an external source.

