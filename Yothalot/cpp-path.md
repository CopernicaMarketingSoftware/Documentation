#Yothalot::Path

The *Path* class is a utility class that helps with dealing with relative
and absolute paths on the Yothalot cluster. The public interface of this
class looks like follows:
```cpp
class Path
{
    Path(std::string path);
    std::string absolute();
    std::string relative();
}

## Constructor. 
The constructor takes one argument, a string that holds the relative or absolute path to
a file.
```cpp
/**
 * Create a path class to manipulate absolute and relative paths.
 */
Yothalot::Path path("/path/to/file");
```
In this case the string passed to the constructor is an absolute path.
You can also use:

```cpp
/**
 * Create a path class to manipulate absolute and relative paths.
 * @var Yothalot\Path
 */
Yothalot::Path path("relative/path/to/glusterfs/file");
```

##Member absolute()
In order to retrieve the absolute path from the path given to the constructor you can
use `absolute()`
```cpp
/**
 * Obtain the absolute class
 */
std::cout << "Absolute path to file is " << path.absolute() << std::endl;
```
##Member relative()
To obtain a relative path based on the path provided to the constructor you can use
`relative()`

```php
/**
 * Obtain the relative paht
 */
std::cout << "Relative path to file is " << path.relative() << std::endl;
```
