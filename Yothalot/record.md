#Record

Internally the Yothalot framework uses records to store mapped and/or reduced information in temporary files. You can access these files yourself with [input](copernica-docs:Yothalot/input). It is not possible to instantiate an object yourself. However, input returns one if you iterate over the file. Note that for working with Yothalot you do not need this functionality. This functionality is only necessary if you want to store information in the Yothalot format yourself. Functions that allow you to access data from the record are:

- identifier (returns the identifier)
- size (returns the size)
- count (returns the number of fields)

Moreover, you can iterate of the data stored in a record.

**identifier()**
returns the identifier of the record. Its usage is:
```php
identifier();
```

**size()**
returns the size of the record. Its usage is:
```php
size()
```

**count()**
returns the number of fields stored in the record. Its usage is:
```php
count()
```
or
```php
count($record);
```
if you want to use it like a free function.

Iterating over the fields stored in the record works as follows:
```php
foreach($record as $field => $value)
{
    echo("$field: $value\n");
}
```
You can also acces the fields by index:
```php
for ($i = 0; $i < count($record); $i++)
{
    echo("Index $i: ".$record[$i]."\n");
}
```
