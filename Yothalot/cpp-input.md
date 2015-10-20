# Yothalot::Input

Yothalot::Input is a utility class that helps you to read files that have
the internal Yothalot [format](copernica-docs:Yothalot/internalfiles "Internal Files").
In general you do not need this class. However, it is useful if you want
to read files in this format, which has the cool property of being compressed
but still splittable. 

The public interface of Input looks like:
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

## Member getIterator()
The input files are organized around [records](copernica-docs:Yothalot/cpp-record).
You can get an input iterator to iterate over these records via the member
`getIterator`. @todo add more info on records.


