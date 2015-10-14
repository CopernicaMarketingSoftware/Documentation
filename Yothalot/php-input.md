#Yothalot\Input

Yothalot\Input is a utility class that helps you to read files that have
the internal Yothalot [format](copernica-docs:Yothalot/internalfiles "Internal Files").
In general you do not need this class. However, it is useful if you want
to read files in this format, which has the cool property of being compressed
but still splittable. 

There are only two methods available:
```php
class Yothalot\Input
{
    public function __construct($filename);
    public function name();
    public function size();
}
```
Moreover, the class allows you to iterate over the records stored in the input file.

## Constructor
The constructor takes one parameter, the name of the input file.
```php
/**
 * Create an input object to read a file that has the Yothalot format
 */
$input = new Yothalot\Input("/path/to/inputFile.log");
```
Where `"/path/to/inputFile.log"` is the input file you want to read from.

## Method name()
The member name() returns the full name of the input file.
```php
/**
 * Retrieve the full name of the input file
 */
$name = $input->name();
```

## Method size()
method size() returns the size (in bytes) of the input file.
This information may be useful to decide if the file should be splitted
into smaller blocks.
```php
/**
 * Get the size of the input file.
 */
$filesize = $input->size();
```

Iterating over the [records](copernica-docs:Yothalot/record) stored in
the file works as follows:
```php
$input = new Yothalot\input("/path/to/file.log");
foreach ($input as $record){
    echo("record id": ".$record->identifier()."\n");
}
```

The documentation on [records](copernica-docs:Yothalot/record) gives
more information on the methods that can be applied to a record.

