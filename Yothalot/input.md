#Yothalot\Input

**Input** is a utility class that helps you to read files that have the Yothalot internal format. In general you do not need this class. However, it may be useful if for you if you want to store files in the same format as Yothalot uses. 
Its member functions are:
- Input (constructor)
- name  (retunrs full name of the file)
- size  (returns the size)

Moreover, the class allows you to iterate over the records stored in the input file.

**Input()** is the constructor of the class. Its usage is:
```php
$input = new Yothalot\Input("/path/to/inputFile.log");
```
Where `"/paht/to/inpuFile.log"` is the input file you want to read from.

**name()** returns the full name of the input file. Its usage is:
```php
$name = $input->name();
```

**size()** returns the size of the input file. Its usage is:
```php
size();
```

Iterating over the [records](copernica-docs:Mailerq/record) stored in the file works as follows:
```php
$input = new Yothalot\input("/path/to/file.log");
foreach ($input as $record){
    echo("record id": ".$record->identifier()."\n");
}
```

The documentation on [records](copernica-docs:Yothalot/record) gives more information on the methods that can be applied to a record.

