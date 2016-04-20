#Yothalot\Input

Yothalot\Input is a utility class that helps you to read files that have
the internal Yothalot [format](copernica-docs:Yothalot/internalfiles "Internal Files").
In general you do not need this class. However, it is useful if you want
to read files in this format, which has the cool property of being compressed
but still splittable.

There are only a few methods available:
```php
class Yothalot\Input
{
    public function __construct($filename);
    public function name();
    public function size();
    public function valid();
    public function next();
    public function seek($count = PHP_INT_MAX);
}
```
Moreover, the class allows you to iterate over the records stored in the input file.

## Constructor
The constructor takes one parameter, the name of the input file.
```php
/**
 * Create an input object to read a file that has the Yothalot format
 */
$input = new Yothalot\Input("/path/to/inputFile.yot");
```
Where `"/path/to/inputFile.yot"` is the input file you want to read from.

## Method name()
The member name() returns the full name of the input file.
```php
/**
 * Retrieve the full name of the input file
 */
$name = $input->name();
```

## Method size()
Method size() returns the size (in bytes) of the input file.
This information may be useful to decide if the file should be split
into smaller blocks.
```php
/**
 * Get the size of the input file.
 */
$filesize = $input->size();
```

## Method valid()
Method valid() checks if the file is a valid input file and returns
a boolean.
```php
/**
 *  Is it a valid file?
 */
$valid = $input->valid();
```

## Method next()
With method next() you access the [records](copernica-docs:Yothalot/record)
in the input file. The first time you call method(), it will give you the
first record. Each next call gives you the next record. It gives you null
if there is no record available.
```php
/**
 *  Get a record from a file
 */
$record = $input->next();
```

## Method seek()
Using the seek() method you can skip records in the input file. If the parameter
`count` is given, at most `count` records will be skipped, if this is omitted,
all records are skipped until the end of the file has been reached.

The number of records skipped is returned.

```
/**
 *  Skip at most 100 records
 */
$skipped = $input->seek(100);
```

Besides using next(), you can iterate over the [records](copernica-docs:Yothalot/record)
stored in the file works using foreach.
```php
$input = new Yothalot\Input("/path/to/file.log");
foreach ($input as $record){
    echo("record id: ".$record->identifier()."\n");
}
```

The documentation on [records](copernica-docs:Yothalot/record) gives
more information on the methods that can be applied to a record.
