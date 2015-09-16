#Record

Internally the Yothalot framework uses records to store mapped and/or reduced information in temporary files. You can access these files yourself with [input](copernica-docs:Yothalot/php-input). It is not possible to instantiate an object yourself. However, input returns one if you iterate over the file. Note that for working with Yothalot you do not need this functionality. This functionality is only necessary if you want to store information in the Yothalot format yourself. Functions that allow you to access data from the record are:

- identifier (returns the identifier)
- size (returns the size)
- count (returns the number of fields)

Moreover, you can iterate of the data stored in a record.

##Member identifier()
The member `identifier()` returns the identifier of the record.
```php
/**
 * retrieve the identifier of an record
 */
$id = $record->identifier();
```

##Member size()
To obtain the size of a record you can use `size()`. 
```php
/**
 * Obtain the size of a record
 */
$recordSize = $record->size();
```

##Member count()
In order the get the number of fields in a record you can use `count()` 
```php
/**
 * Get the number of fields in the record
 */
$numberOfFields = $record->count();
```
You can also use:
```php
/**
 * Get the number of fields by calling count as if it is a function
 */
$numberOfFields = count($record);
```
if you want to use it like a free function.

##Iterating over fields
Iterating over the fields stored in the record works as follows:
```php
// Visit each field in a record...
foreach($record as $field => $value)
{
   // ... and echo its value.
   echo("$field: $value\n");
}
```
You can also access the fields by index:
```php
// Visit each field in the record...
for ($i = 0; $i < count($record); $i++)
{
   // ... and echo its value
   echo("Index $i: ".$record[$i]."\n");
}
```
