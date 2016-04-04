#Yothalot\Path

The *Path* class is a utility class that helps to deal with relative
and absolute paths on the Yothalot cluster (see
[Files and paths](copernica-docs:Yothalot/files "Files and paths") for some background).

Its member functions are:
- __construct() (constructor)
- absolute() (absolute path)
- relative() (relative path)

## Constructor. 
The constructor takes a string that holds the relative or absolute path to
a file.

```php
/**
 * Create a path class to manipulate absolute and relative paths.
 * @var Yothalot\Path
 */
$path = new Yothalot\Path("/absolute/path/to/glusterfs/file");
```
In this case the string passed to the constructor is an absolute path.
You can also use:

```php
/**
 * Create a path class to manipulate absolute and relative paths.
 * @var Yothalot\Path
 */
path = new Yothalot\Path("relative/path/to/glusterfs/file");
```
Here the string holds a relative path.


##Member absolute()
In order to retrieve the absolute path from the path given to the constructor you can
use `absolute()`
```php
/**
 * Obtain the absolute class
 */
echo("Absolute: ".$path->absolute()."\n");
```
##Member relative()
To obtain a relative path based on the path provided to the constructor you can use
`relative()`

```php
/**
 * Obtain the relative paht
 */
echo("Relative: ".$path->relative()."\n");
```

