# Yothalot Classes

You have to use some Yothalot specific classes to implement your mapreduce
class. These classes are `Reducer`, `Writer`, `Key`, `Value`,  `Values'.
A description of these types is given below.

## The Reducer class
The reducer class is used to emit a key, value pair from the mapper step
to the reducer step. The class has one member function, `emit()`, that takes
two arguments, the first argument is the key and the second argument 
is the value. Its usage is:
```cpp
reducer.emit(key, value);
```
where reducer is an instance of the Reducer class, key has type Key and
value has type Value.

## The Writer class
The writer class is used to emit a value from the reducer step to the writer
step. The class has one member function, `emit()`, that takes one argument
of type Value. Its usage is:
```cpp
writer.emit(value);
```
where writer is an instance of the writer class and value has type Value.

## The Key and Value classes
The Key and Value classes are both tuple types. They can store elements of
int32_t, int64_t, and strings. Its public interface is:

```cpp
class Tuple
{
public:
    Tuple();
    Tuple(const std::initializer_list<Element> &elements);
    /**
     *  @todo this will not work if header is separated from implementation
     *  Constructor, templated iterator
     */
    template<typename Iterator>
    Tuple(Iterator begin, Iterator end);
    Tuple(const Record &record, size_t start = 0, size_t size = std::numeric_limits<size_t>::max());

    virtual ~Tuple() {}

    void add(int32_t number);
    void add(int64_t number);
    void add(const std::string &value);
    void add(const char *value);
    void add(const char *value, size_t size);
    void add(std::nullptr_t);
    
    bool isNumber(size_t index) const;
    bool isString(size_t index) const;
    bool isInt32(size_t index) const;
    bool isInt64(size_t index) const;
    bool isNull(size_t index) const;
    
    int32_t int32(size_t index) const;
    int64_t int64(size_t index) const;
    int64_t number(size_t index) const;
    
    std::string string(size_t index) const;
    
    void swap(Tuple &tuple);
    
    std::size_t hash() const;
    
    bool operator==(const Tuple &that) const;
    bool operator!=(const Tuple &that) const;
    bool operator<(const Tuple &that) const;
    
    void write(Record &record) const;
    
    size_t fields() const;
    size_t byteSize() const;
};
```
### Constructor

The class has four constructors, a default constructor that constructs an
empty object, a constructor to which you can pas a std::initializer_list
with elements of type int32_t, int64_t and strings, a constructor that takes
an iterator pair and a constructor that reads records. 
You can use it like:
```cpp
// create an empty tuple
Tuple myTuple1();

// create a tuple that holds 1, 2, and 12
Tuple myTuple2 = {1, 2, 12};

// Fill a Tuple from a vector
std::Vector<int> myVec = {1,2,3,4,5}
Tuple myTuple3(myVec.begin(), myVec.end());

@todo create record
// Read the entire record into the tuple
Tuple myTuple4(record);
```

### Member add()

With `add()` you can add extra elements to the tuple. You can add elements
of type in32_t, int64_t, std::string, char *, and char * with a length.
The add also accepts nullptr_t. You can use it like:
```cpp
// create an empty tuple
Tuple myTuple();

// add a string to the tuple
myTuple.add("hello");

// add a number to the tuple
myTuple.add(12);

// the tuple now holds "hello" and 12
```

### Member isXxx()

With members `isNumber()`, `isString()`, `isInt32()`, `isInt64()`, and 
`isNull()` you can check if an element is a number, a string, an int32_t,
an int64_t or a nullptr respectively. The elements are indexed from zero.
You can use it like:
```cpp
Tuple myTuple = "hello";
if(myTuple.isString(0))
    std::cout << "yes it's a string\n";
```

### Members int32() and int64()
With members `int32()` and `int64()` you can retrieve elements of type int32_t
and int64_t from the tuple. The elements are indexed from zero. You can
use it like
```cpp
Tuple myTuple = {12, 23}
int_32 a = myTuple.int32(0);
```
### Member number()
With member `number()` you can retrieve a numeric value from the tuple 
without caring about its size. The number returned is of type int64_t.
The elements are indexed from zero. You can use it like:
```cpp
Tuple myTuple = {1, 2, 3};
int64_t is3 = myTuple(2);

### Member string()
With member `string()` you can retrieve a string from the tuple. It does
not matter if you passed in a char *, char * with length, or a string, you
will receive a std::string. The elements are indexed from zero. You can use
it like:
```cpp
Tuple myTuple = {0, "hi", 4};
std::string a = myTuple.string(1);
```

### Member swap()
With member swap you can swap two tuples. You can use it like
```
Tuple tup1 = {1};
Tuple tup2 = {"hello"};
tup1.swap(tup2);
// tup1 holds now hello
// tup2 holds now 1
```

### Member hash()
Member `hash()` will return the hash code of the tuple. The hash code is
of type size_t. You can use it like:
```cpp
Tuple myTuple = {1,2,3,4,5,6,7};
size_t hashOfMyTuple = myTuple.hash();
```

### Member operator==
With `==` you test if two tuples have the same elements. You can use it
like:
```cpp
Tuple tup1 = {1};
Tuple tup2 = {1};
if (tup1 == tup2)
    std::cout << "Yes, they are the same\n";
```
### Member operator!=
With `!=` you test if two tuples are not equal to each other. You can use
it like:
```cpp
Tuple tup1 = {1};
Tuple tup2 = {2};
if (tup1 != tup2)
    std::cout << "Yes, they are different\n";
```
### Member operator<
With `<` you test if the elements in one tuple all are smaller than the
elements in the other tuple. You can use it like
```cpp
Tuple tup1 = {0,1,2,3,4,5};
Tuple tup2 = {1,2,3,4,5,6};
if (tup1 < tup2)
    std::cout << "yes all elements in tup1 are smaller than elements in tup2\n";
```

### Member write()
With `write()` you can write the tuple to a record.
@todo describe Record for the C++ API
You can use it like:
```cpp
Tuple myTuple = {1, "hoi"};
@todo construct record
myTuple.write(myRecord);
```

### Member fields()
With `fields()` you can obtain the number of fields that are stored in the
tuple. You can use it like
```cpp
Tuple myTuple = {1,2,3,4};
std::cout << "the tuple has << myTuple.fields() << " fields.\n";
```

### Member bytes()
With `bytes()` you obtain the size of the tuple in bytes. You can use it
like:
```cpp
Tuple myTuple = {1,2,3,4};
std::cout << "the tuple is << myTuple.bytes() << " bytes large.\n";
```

## The Values class

Values is a input iterator over a container of type value. This type
is passed to the reducer step as a second argument. You can use it to 
iterate over all the values or you can pass it to algorithms
that use constant forward iterators. The interface with members that are
useful looks like:

```cpp
class Values :
{

public:

    Values begin() const;
    Values end() const;
    Values &operator++ ();

    const Value &operator*() const;
    const Value *operator->() const;

    bool operator==(const Values &values) const;
    bool operator!=(const Values &values) const;
    
    operator bool () const;
    bool operator! () const;
};
```
### Member begin() and end()
Members `begin()` and `end()` are iterators to the beginning and the end
of the container. You can use it like:
```cpp
// Create a std::vector from the values
std::vector<Value> myVec(values.begin(), values.end());
```

### Member &operator++()
With prefix `++` you can increment the iterator. You can use it like:
```cpp
for(auto idx = values.begin(); idx != values.end(); ++idx)
    // do something that uses idx
```

### Member &operator*()
With `*` you dereference where the iterator is pointing to, so in this case
a value (i.e. a Tuple). You can use it like:
```c++
auto firstValIt = values.begin();
auto firsValRef = *firstValIt;
// firstValRef is now a reference to the first value in values
```

### Member *operator->()
With `->` you directly can access the member functions from value via the
iterator. You can use it like:
```cpp
auto firstValIt = values.begin();
std::cout << "the size of the first value is " firstValIt->bytes() << " bytes\n";
```

### Member operator==()
With `==` you can compare two Values to see if they are equal. 

### Member operator!=()
With != you can check if two Values are unequal. You have seen this already 
in the for loop where we tested that the `idx` iterator was not equal to the
`values.end()` iterator.

### Member operator bool()
Converses Values to a boolean. This boolean will be true if the iterator is
valid and false if it is not valid.

### Member operator!()
`!` will negate the value that member operator bool() would have returned
if it had been called.

