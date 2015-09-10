#Yothalot\Output

**Output** is a utility class that helps you to create files in the same format as Yothalot uses internally.
Its member functions are:
- Output (constructor)
- add    (add identifier and field to output file)
- name   (returns full name of the file)
- flush  (flushes the object to the file)
- size   (returns the size)

**Output()** is the constructor of the class. Its usage is:
```php
$output = new Yothalot\Output("/path/to/file.log");
```
where `"/paht/to/file.log"` is the path to the file you want to write to.

**add()** adds an identifier and fields to the output file. The identifier has to be numeric. The field can be an array ob basic types. Its usage is:
```php
add(1, array('1', '2', '3'));
```

**name()** returns the full name of the output file. Its usage is:
```php
name();
```

**flush()** flushes the object to the file. Its usage is:
```php
flush();
```

**size()** returns the size of the output file. Its usage is:
```php
size();
```

