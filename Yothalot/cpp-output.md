#Yothalot::Output


Yothalot\Output is a utility class that helps you to create files in the same
[format](copernica-docs:Yothalot/internalfiles "Internal Files") as Yothalot
uses internally. In general you do not need to create a file like this since
Yothalot can handle all types of files (with a little bit of your help). However, the
Yothalot format has the cool property of being compressed while still being
splittable. Therefore you may want to use this format for your own files as well.

The public interface of this class looks like:
```cpp
namespace Yothalot {
class Output
{
public:
    class Options {
    public:
        Options();
        virtual ~Options();
        void checksum(bool checksum);
        void compress(bool compress);
    };

    Output(std::string filename, size_t splitsize = 10 * 1024 * 1024, bool truncate = false);
    Output(const char *filename, size_t splitsize = 10 * 1024 * 1024, bool truncate = false);
    Output(const Options &options, std::string filename, size_t splitsize = 10 * 1024 * 1024, bool truncate = false);
    virtual ~Output();
    Output &add(const Record &record);
    Output &operator<<(const Record &record);
    const char *name() const;
    size_t size() const;
    size_t splitsize() const;
    size_t splits() const;
    void flush(bool recompress = false);
};
}

```
## Constructor
Yothalot::Output has three constructors the first two take as a first argument
the file name of type  `std::string` and `const char *` that is used for
output. With the second argument you can set the size (in bytes) at which the file
can be split into smaller files (see  [Yothalot files](copernica-docs:Yothalot/internalfiles "Internal File Format"))
The size at which these splits can happen has the default of 10MB but you can
change this. With the last argument you can change the behavior when an
existing file is used as output. You can choose to append (default) or truncate the
existing file by passing false or true. The third constructor behaves
similar to the first two, yet it takes Yothalot::Output::Options as a first
argument. The options are discussed below.

```cpp
/**
 * Create or open an output file
 */
Yothalot::Output output("/path/to/file.log");
```
where `"/path/to/file.log"` is the path to the file you want to write to.


## Yothalot::Output::Options
With the Yothalot::Output::Options object you can set some options on how
the Yothalot::Output object should behave. You can set if a checksum should
be calculated (default) and if the output file should be compressed (default).
You can pass it as a first argument to the Yothalot::Output constructor
like:
```cpp
/**
 *  Create an options object
 */
Yothalot::Output::Options options;

/**
 *  The checksum should be calculated but the file should not be compressed
 */
options.checksum(true);
options.compress(false);

/**
 *  Pass it to the constructor
 */
Yothalot::Output output(options, "/home/aljar/file.log");

```

## Member add()
add() is a member that adds a record to the output file. A record exists
of an identifier and fields. The identifier has to be a type that fits in
a int64_t. The fields are of type [Yothalot::Tuple](copernica-docs:Yothalot/cpp-classes "Internal Files")

```cpp
/**
 * Create or open an output file
 */
Yothalot::Output output("/path/to/file.log");
/**
 * Add a record with key and value to output file
 */
output.add(Yothalot::Record(0).add(1).add(2).add(3));
```
where: `0` is in this case the identifier and the `1`, `2`, and `3` are
the fields.

## operator<<()
With `<<` you can add records to the output file just like with streams.
You can use it like:
```cpp
/**
 * Create or open an output file
 */
Yothalot::Output output("/path/to/file.log");

/**
 *  Create a record
 */
Yothalot::Record record(1);

/**
 *  pass a record to the output
 */
output << record;
```

## Member name()
name() returns the full name of the output file as a std::string
```cpp
/**
 * Get the name of the output file
 */
std::cout << "The name of the output file is " << output.name() << std::endl;

```

## Member size()
size() returns the size (in bytes) of the output file. You
may use it e.g. to determine if the file has become to large, so
you can close it and create a new output file. However, note that
the Yothalot formated files are splittable.
```cpp
/**
 * Retrieve the size of the output file
 */
std::cout << "the size of the output is " << output.size() << " bytes\n";
```

## Member splitsize()
With member `splitsize()` the size (in bytes) at which the file can be
split is returned. You can use it like:
```cpp
/**
 * Create or open an output file
 */
Yothalot::Output output("/path/to/file.log");

/**
 *  Get the size at which the file can be split
 */
std::cout << "The file can be split at: " << output.splitsize() << " bytes\n";
```

## Member splits()
Member `splits()` returns how many splits are possible with the current file
(starting from zero). You can use it like:
```cpp
/**
 * Create or open an output file
 */
Yothalot::Output output("/path/to/file.log");

// add data

/**
 *  Provide the number of of possible splits
 */
std::cout << "Number of splits possible is: " << output.splits() << std::endl;

```

##Member flush()

flushes the object to the file. In general you do not need this, only if
your code can crash you may use it to be sure that your data is stored.
Although it is better to fix the code.

This method accepts an optional (boolean) parameter, controlling whether
to completely recompress the data in the output file. This is only useful
in case you have done manual flushes earlier since many small flushes can
reduce the effectiveness of the compression (and even make the compressed
file bigger than the uncompressed version).

Recompressing the file is an intensive operation, both in terms of CPU as
in terms of I/O (the whole file is rewritten!). Use it sparingly!
```cpp
/**
 * flush the data to the output file
 */
output.flush(false);
```
