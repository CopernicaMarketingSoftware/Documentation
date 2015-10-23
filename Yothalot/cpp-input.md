# Yothalot::Input and Yothalot::Inputs

Yothalot::Input is a utility class that helps you to read files that have
the internal Yothalot [format](copernica-docs:Yothalot/internalfiles "Internal Files").
In general you do not need this class. However, it is useful if you want
to read files in this format, which has the cool property of being compressed
but still splittable. The `Yothalot::Input` class can be used to construct
a [Yothalot::Record](copernica-docs:Yothalot/cpp-record "record").
If you have multiple input files, you can group them in a single `Yothalot::Inputs`
object a [Yothalot::Record](copernica-docs:Yothalot/cpp-record "record") can
also be constructed on these.

## Yothalot::Input

The public interface of `Yothalot::Input` looks like:
```cpp
class Input
{
public:
    Input(std::string filename);
    std::string name();
    size_t size();
    InputIterator getIterator();
}
```
## Constructor
The constructor takes one parameter, the name of the input file.
```cpp
/**
 * Create an input object to read a file that has the Yothalot format
 */
Yothalot::Input input("/path/to/inputFile.log");
```
Where `"/path/to/inputFile.log"` is the input file you want to read from.

## Method name()
The member name() returns the full name of the input file as a std::string.
```cpp
/**
 * Retrieve the full name of the input file
 */
std::string name = input.name();
```

## Method size()
Method size() returns the size (in bytes) of the input file.
This information may be useful to decide if the file should be splitted
into smaller blocks.
```cpp
/**
 * Get the size of the input file.
 */
size_t filesize = input.size();
```


## Yothalot::Inputs

With `Yothalot::Inputs` Object you can combine multiple input files. The public 
interface of `Yothalot::Inputs` looks like:
```cpp
namespace Yothalot {
class Inputs
{
public:
    Inputs(const std::function<bool(const Record&, const Record&)> &callback)
    Inputs()
    virtual ~Inputs() {}
    size_t files() const
    operator bool () const { return !_readers.empty(); }
    bool operator! () const { return _readers.empty(); }
    bool add(const char *filename, size_t seek = 0, size_t size = 0)
    bool swap(Record &record)
    bool next()
 
};
}
```
## Constructor

There are two constructors, a default constructor that uses the standard
compare function `operator<()` of `Yothalot::Record` and a constructor that
takes as argument a const std::function(bool(const Record&, const Record&) &
with which you can pass your own compare function that compares two `Yothalot::Record`s.
You can use it like:

```cpp
/**
 *  Create a Yothalot::Inputs object to store multiple inputs
 */
Yothalot::Inputs myInpunts;
```

## Destructor

The destructor of `Yothalot::Inputs` is virtual, so if you want to inherit
form it and use manual memory management you can safely do so.

## Member add()

With member `add()` you can add files to the `Yothalot::Input` object.
It uses three arguments but argument two and three are optional. With the
first argument you set the filename, the second argument sets at what position
in the file the records should be included. The last argument set the number
of bytes to read.
You can use it like:
```cpp
/**
 *  Create a Yothalot::Inputs object to store multiple inputs
 */
Yothalot::Inputs myInputs;
/**
 *  Add a file
 */
myInputs.add("myFile.log");
```

## Member files()

With `files()` you can obtain the number of files that are added to the object
You can use it like:
```cpp
/**
 *  Create a Yothalot::Inputs object to store multiple inputs
 */
Yothalot::Inputs myInputs;

/**
 *  Add two files
 */
myInputs.add("myFile1.log");
myInputs.add("myFile2.log");

/**
 *  Get the number of files in myInputs
 */
std::cout << "The number of files in myInputs is: " << myInputs.files << std::endl;
```

## Member operator bool()
With this member you can check if the member is still in a valid state, i.e.
if there are still records available.

## Member operator! ()
This member is the negation of `operator bool()`. It will check if the object
is empty. You can use it like:
```cpp
/**
 *  Create a Yothalot::Inputs object to store multiple inputs
 */
Yothalot::Inputs myInputs;

/**
 *  We don't add any data and check if it is empty
 */
if(!myInputs)
    std::cout << "Yes it is empty!\n";
```

## Member swap()
With this member you can swap to records, provided that there still is a
record available. You can use it like:
```cpp
/**
 *  Create a Yothalot::Record
 */
Yothalot::Record myRecord(1);

/**
 *  Create a Yothalot::Inputs object to store multiple inputs
 */
Yothalot::Inputs myInputs;

/**
 *  Add a file
 */
myInputs.add("file.log";

/**
 *  Swap first record with myRecord
 */
if (myInputs.swap(myRecord))
    std::cout << "the swap was successful.\n";
```

## Member next()
With `next()` you can go to the next record. It will
return a boolean to give you information if there is a next record or that
all records are consumed. You can use it like:
```cpp
/**
 * Create an Yothalot::Inputs object
 */
Yothalot::Inputs myInputs;
/**
 *  Add some files
 */
myInputs.add("file1.log");
myInputs.add("file2.log");

// process the files
// Use
do
{
    //process the files
}
while (myInputs.next())
 ```
