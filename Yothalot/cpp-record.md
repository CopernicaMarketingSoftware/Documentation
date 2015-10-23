#Record

Internally the Yothalot framework uses records to store mapped and/or 
reduced information in temporary files. You can access these files yourself
with [input](copernica-docs:Yothalot/cpp-input). Note that for working 
with Yothalot you do not need this functionality. This functionality is
only necessary if you want to store information in the Yothalot format
yourself. The public interface of record looks like:

```cpp
namespace Yothalot {
class Record
{
public:
    Record(uint32_t identifier);
    Record(Input &input);
    Record(Inputs &inputs);
    Record(const Record &that);
    Record(Record &&that);
    virtual ~Record();
    typedef std::vector<Scalar>::iterator iterator;
    typedef std::vector<Scalar>::const_iterator const_iterator;
    iterator begin();
    const_iterator begin() const;
    iterator end();
    const_iterator end() const;
    void swap(Record &record);
    Record &add(Scalar scalar);
    Record &operator<<(Scalar value);
    uint32_t identifier() const;
    size_t size() const;
    size_t bytes() constl
    bool operator==(const Record &record) const;
    bool operator!=(const Record &record) const;
    bool operator<(const Record &record) const;
    bool isNull(size_t field) const;
    bool isNumber(size_t field) const;
    bool isString(size_t field) const;
    bool isInt32(size_t field) const;
    bool isInt64(size_t field) const;
    int64_t number(size_t field) const;
    int32_t int32(size_t field) const;
    int64_t int64(size_t field) const;
    std::string string(size_t field) const;
    friend std::ostream &operator<<(std::ostream &stream, const Record &record);
};
}

```
## Constructors

A Record can be constructed in several ways. The first way to construct a
Record is to create one based on an identifier, which has type uint32_t.
This identifier can be used to recognize the record, e.g. you can identify
whether it is an old or a new record.
```cpp
Yothalot::Record myRecord(1);
```
Another way to construct a Record is to create it via an 
[Yothalot::Input object](copernica-docs:Yothalot/cpp-input "Input"). The
constructor will read the data from the given input log and parse the
stored fields back into a proper Record. This process can of cours fail,
in which case it will throw a std::runtime_error.
Note that the record ins consumed from the input so if you want to reuse
the data again it should be copied to another file.
```cpp
Yothalot::Record myRecord(input);
```
Moreover you can construct a record from a set of inputs
where the smallest record is used first.
```cpp
Yothalot::Record myRecord(inputs); /
```
Finally there is a copy and move constructor to create records.


## Destructor
The destructor is virtual so you can write your own extended record class
and inherit from this one without worries about proper destruction of your
own created class.

## Type definitions
typedef std::vector<Scalar>::iterator iterator and 
typedef std::vector<Scalar>::const_iterator const_iterator
are type definitions that may save you some typing.

## Member begin()
Members `begin()` provide you a random access iterator or constant iterator
to the first field of the record.

## Member end()
Members `end()` provide you a random access iterator or constant iterator
to the end of all fields in the record. Together with member `begin()` you
can create a iterator pair that can be passed to every algorithm that can
handle a random access iterator pair.

## Member swap()
With `swap()` you can swap two records. You can use it like
```cpp
/**
 *  record1 will be record2 and vice versa
 */
record1.swap(record2);
```

## Member add()
With the add member it is possible to add a [Yothalot::Scalar](copernica-docs:Yothalot/cpp-scalar) to
the record. The object itself is returned, so chaining is possible.
You can use it like:
```cpp
/**
 *  add some data to the record
 */
myRecord.add(1).add("hello");
```
## Member operator<<()
You can use `<<` to add data to a record as well, just like you do with
streams. You also can chain it. You can use it like:
```cpp
/**
 *  create a record with identifier 1
 */
Yothalot::Record myRecord(1);
/**
 *  add some data to this record
 */
myRecord << "some data" << "and more data";
```

## Member identifier()
With `identifier()` you can obtain the numeric identifier of the Record.
Its usage is like:
```cpp
/**
 *  create a Record
 */
Yothalot::Record myRecord(12);
/**
 *  get the ID
 */
std::cout << "The Id of the record is: " << myRecord.identifier() << std::endl;
```

## Member fields()
With `field()` you can obtain the number of fields that are stored in the
record. You can use it like:
```cpp
/**
 *  get the number of fields
 */
std::cout << "The number of fields are: " << myRecord.fields() << std::endl;
```

## Member bytes()
With `bytes()` you get the size of the record in bytes. You can use it like:
```cpp
/**
 *  Print the size of the record
 */
std::cout << "The size of the record is: " << myRecord.bytes() << " bytes\n";
```

## Member operator==()
With `==` you can test if the identifier and all fields of two records are
equal. You can use it like:
```cpp
/**
 *  Create two records
 */
Yothalot::Record myRec1(1);
Yothalot::Record myRec2(1);
/**
 *  add data
 */
myRec1.add(1);
myRec2.add(1);
/**
 *  compare
 */
if (myRec1 == myRec2)
    std::cout << "Yes they are equal\n";
```
## Member operator!=()
With `!=` you can test inequality. It is the negation of `operator==()`.

## Member operator<()
This member first checks if the identifiers are not equal. If they are different
than `<` returns true if the object is indeed smaller than the object to which it
is compared to, otherwise it returns false.
If the identifiers are equal, the member tests if the number of fields of the 
object is smaller than the number of field of the object to which it is compared
to. If this is the case true is returned otherwise a false is returned.
If the identifiers are equal and the number of fields are equal, there is
a field by field comparison between the two objects. If two field between the two
objects are not identical the member will return true if the one field is
indeed smaller and a false otherwise. A false is returned if the two objects
are identical.

## Member isXxx()
With members `isInt32()` and `isInt64()` you can check if a field (zero indexed) is of type
uint32_t or uint64_t respectively. If you are just interested if the type is
numeric you can use `isNumber()`. If you want to test if the type is a string
you can use `isString()`. Member `isNull()` tests if the field is of value
std::nullptr_t. You can use it like:
```cpp
/**
 *  Create an record
 */
Yothalot::Record myRecord(1);

/**
 * check if the first field is numeric
 */
if (myRecord.isNumber(0))
    std::cout << "Yes the value has a numeric type\n";
```

## member int32()
This member returns a to int32_t converted value from the field (zero
indexed). If the field does not exists a zero will be returned.

## member int64()
This member returns a to int64_t converted value from the field (zero
indexed). If the field does not exists a zero will be returned.

## member number()
This member returns a to int64_t converted value from the field (zero
indexed). If the field does not exists a zero will be returned.

## member string()
This member returns a to string converted value of the field (zero indexed).
If the fields does not exists a string constructed with an empty initializer
list is returned.


## Member operator<<()
The friend member operator<<() that use std::ostream can be used to print the
record in a human readable format. You can use it like:
```cpp
/**
 *  Create an record
 */
Yothalot::Record myRecord(1);
/**
 *  Add some data
 */
myRecord.add(1).add("some text data");
/**
 *  Print the object
 */
std::cout << myRecord << std::endl;
```
@todo implement an iterator to iterate over the record.
