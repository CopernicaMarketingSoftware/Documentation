#Yothalot::Output


Yothalot\Output is a utility class that helps you to create files in the same 
[format](copernica-docs:Yothalot/internalfiles "Internal Files") as Yothalot 
uses internally. In general you do not need to create a file like this since
Yothalot can handle all types of files (with a little bit of your help). However, the 
Yothalot format has the cool property of being compressed while still being
splittable. Therefore you may want to use this format for your own files as well.

The public interface of this class looks like:
```cpp
class Output
{
public:
    Output(std:string filename);
    void add(int64_t identifier, Yothalot::Tuple fields);
    std::string name();
    size_t size();
    void flush();
}

```
## Constructor
The constructor takes one std::string argument, the file name. A file with this 
file name will be created if it does not exist. Otherwise the file will 
be opened. 

```cpp
/**
 * Create or open an output file
 */
Yothalot::Output output("/path/to/file.log");
```
where `"/path/to/file.log"` is the path to the file you want to write to.

## Member add()
add() is a member that adds a record to the output file. A record exists
of an identifier and fields. The identifier has to be a type that fits in
a int64_t. The fields are of type [Yothalot::Tuple](copernica-docs:Yothalot/cpp-classes "Internal Files")

```cpp
/**
 * Add a record with key and value to output file
 */
output.add(Yothalot::Record(0).add(1).add(2).add(3));
```
where: `0` is in this case the identifier and the `1`, `2`, and `3` are
the fields.


## Member name()
name() returns the full name of the output file as a std::string
```cpp
/**
 * Get the name of the output file
 */
std::cout << "The name of the output file is " << output.name() << std::endl;

```

##Member size()
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

##Member flush()
flushes the object to the file. In general you do not need this, only if 
your code can crash you may use it to be sure that your data is stored.
Although it is better to fix the code.
```cpp
/**
 * flush the data to the output file
 */
output.flush();
```
