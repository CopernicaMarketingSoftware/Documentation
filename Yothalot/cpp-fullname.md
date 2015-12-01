#Yothalot::Fullname

The *Fullname* class is a utility class that helps with dealing with relative
and absolute paths on the Yothalot cluster (see [Files and paths](copernica-docs:Yothalot/files "Files and paths")
for some background). The public interface of this class looks as follows:
```cpp
class Fullname
{
public:
    Fullname(const Base &base, const char *filename, size_t size);
    Fullname(const Base &base, const char *filename);
    Fullname(const Base &base, const std::string &filename);
    Fullname(const Fullname &that);
    Fullname(const Fullname &&that);
    virtual ~Fullname()
    operator bool () const;
    bool operator! () const;
    const std::string &path() const;
    const char *full() const;
    const char *absolute() const;
    operator const std::string& () const;
    operator const char * () const;
    const char *relative() const;
};
```

### Constructors.

There are five constructors, three general, a copy and a move constructor.
The general constructors take two or three arguments. The first argument is of type
Base (discussed below). The second argument is used to pass a std::string
or character array to the constructor that holds the filename. The third argument can be used to pass
the length of the character array to the constructor if the final element
is not zero. The string that you pass can contain just the filename or
the entire absolute path to the file.
You can use it like:
```cpp
/**
 * Create a path class to manipulate absolute and relative paths.
 */
Yothalot::Fullname filename(Yothalot::Base(), "/path/to/file");
```
In this case the string passed to the constructor as an absolute path to
a file. Using relative paths is almost identical:
 
```cpp
Yothalot::Fullname filename(Yothalot::Base(), "relative/path/to/glusterfs/file");
```


### Destructor

The destructor is virtual so you can inherit from this class and use your
own destructor.


### Member operator bool

You can check if the filename is valid, i.e. if you have provided a full
path, whether the base name is indeed identical to base directory on GlusterFS.
Its usage is like:

```cpp
/**
 * Create a path class to manipulate absolute and relative paths.
 */
Yothalot::Fullname filename(Yothalot::Base(), "/path/to/file");

/**
 * Check if it is correct
 */
if (filename)
    std::cout << "yes it is correct\n";
```

### Member operator !

This is the negation of member operator bool and its usage is similar.
```cpp
/**
 * Create a path class to manipulate absolute and relative paths.
 */
Yothalot::Fullname filename(Yothalot::Base(), "/path/to/file");

/**
 * Check if it is incorrect
 */
if(!filename)
    std::cout << "no it is not correct\n";
```

### Member path()

With this member you can retrieve the full path name. It is provided as 
a constant string reference.
```cpp
/**
 *  Create a path class to manipulate absolute and relative paths.
 */
Yothalot::Fullname filename(Yothalot::Base(), "/path/to/file");

/**
 *  display the absolute path
 */
std::cout << "path(): " << filename.path() << std::endl;
```

### Member full()

With this member you can also retrieve the full path name, just like with
member path(), yet, the returned value is a constant char pointer.
```cpp
/**
 *  Create a path class to manipulate absolute and relative paths.
 */
Yothalot::Fullname filename(Yothalot::Base(), "/path/to/file");

/**
 *  display the full path
 */
std::cout << "full(): " << filename.full() << std::endl;
```


### Member absolute()

This is an alias for member full() and also gives you the full path name
returned as a constant char pointer.
```cpp
/**
 *  Create a path class to manipulate absolute and relative paths.
 */
Yothalot::Fullname filename(Yothalot::Base(), "/path/to/file");

/**
 *  display the full path
 */
std::cout << "absolute(): " << filename.absolute() << std::endl;
```

### Member operator const std::string&

Via this member you can get the full absolute path name by providing the
object when a string is required.
```cpp
/**
 *  Create a path class to manipulate absolute and relative paths.
 */
Yothalot::Fullname filename(Yothalot::Base(), "/path/to/file");

/**
 *  use automatic conversion to std::string
 */
std::string name = filename;
```

### Member operator const char *

Via this member you can get the full absolute path name by providing the
object when a constant char pointer is required.
```cpp
/**
 *  Create a path class to manipulate absolute and relative paths.
 */
Yothalot::Fullname filename(Yothalot::Base(), "/path/to/file");

/**
 *  get automatic conversion to cons char *
 */
const char *name2 = filename;
```

### member relative()

Via this member you can get the relative path as a constant char pointer.
```cpp
/**
 *  Create a path class to manipulate absolute and relative paths.
 */
Yothalot::Filename fullname(Yothalot::Base(), "/path/to/file");

/**
 *  get the relative path
 */
std::cout << "relative(): " << filename.relative() << std::endl;
```

## Yothalot::Base

The Yothalot::Base clase is used for constructing the Yothalot::Fullname
class. Yothalot::Base publicly inherits from std::string (so string members apply.
Its purpose is to find the GlusterFS mountpoint on your system. However,
you can overwrite this if you need (e.g. if you use Yothalot locally).
The public interface of this class looks as follows:

```cpp
class Base : public std::string
{
public:
    Base();
    Base(std::string base);
};
```


### Constructors

Yothalot::Base has two constructors, a constructor that does not take any
arguments, and one that takes a string as it argument. If you construct
Yothalot::Base without any arguments, it tries to find the mountpoint of
GlusterFS on your system. If it can not find a GlusterFS mountpoint it will
throw a std::runtime_error. If you construct Yothalot::Base with a string,
it will use that string as the GlusterFS mountpoint. It will not check if
it really is a mountpoint. This is useful if you want to use Yothalot
locally. There is one exception to this rule. If the string that you are
passing in happens to be empty, Base will fall back to the default constructor
and tries to find the GlusterFS mountpoint by itself.


### Other member functions

Yothalot::Base does not define other member functions. Yet, since it publicly
inherits from std::string, you can use these.

