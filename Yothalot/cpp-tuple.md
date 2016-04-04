# The Yothalot::Tuple class

The `Yothalot::Tuple` class is the actual type of `Yothalot::Key` and `Yothalot::Value`.
It is a container that can hold fields of type [Yothalot::Scalar](Yothalot/cpp-scalar).
Its public interface looks like:
```cpp
namespace Yothalot {
class Tuple
{
public:
    Tuple();
    Tuple(const std::initializer_list<Scalar> &elements);
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
    bool isDouble(size_t index) const;
    
    int32_t int32(size_t index) const;
    int64_t int64(size_t index) const;
    int64_t number(size_t index) const;
    double doubleValue(size_t index) const;
    
    std::string string(size_t index) const;
    
    void swap(Tuple &tuple);
    
    std::size_t hash() const;
    
    bool operator==(const Tuple &that) const;
    bool operator!=(const Tuple &that) const;
    bool operator<(const Tuple &that) const;
    bool operator>(const Tuple &that) const;
    
    void write(Record &record) const;
    
    size_t fields() const;
    size_t bytes() const;
};
}
```
## Constructor

The class has four constructors, a default constructor that constructs an
empty object, a constructor to which you can pas a std::initializer_list
with fields of type int32_t, int64_t and strings, a constructor that takes
an iterator pair and a constructor that reads [Yothalot::Records](Yothalot/cpp-record). 
You can use it like:
```cpp
/**
 *  Create an empty tuple with the default constructor
 */
Yothalot::Tuple myTuple1();

/**
 *  Create a tuple that holds 1, 2, and 12 with the 
 *  constructor that takes a initializer list
 */
Yothalot::Tuple myTuple2 = {1, 2, 12};

/**
 *  Create a std::vector with some values
 */
std::vector<int> myVec = {1,2,3,4,5};

/**
 *  Create a Tuple with the values in myVec
 *  using the constructor with the iterator pair
 */
Yothalot::Tuple myTuple3(myVec.begin(), myVec.end());

// Create record
Yothalot::Record myRecord(1);

/**
 *  Create a tuple from a record using the
 *  constructor that takes a record.
 */
Yothalot::Tuple myTuple4(myRecord);
```

## Member add()

With `add()` you can add extra fields to the tuple. You can add fields
of type in32_t, int64_t, std::string, char \*, and char \* with a length.
The add also accepts nullptr_t. You can use it like:
```cpp
/**
 *  create an empty tuple
 */
Yothalot::Tuple myTuple;

/**
 *  add a string to the tuple
 */
myTuple.add("hello");

/**
 *  add a number to the tuple
 */
myTuple.add(12);

// the tuple now holds "hello" and 12
```

## Member isXxx()

With members `isNumber()`, `isString()`, `isInt32()`, `isInt64()`, `isDouble()` and 
`isNull()` you can check if a field is a number, a string, an int32_t,
an int64_t, a double or a nullptr respectively. The fields are indexed from zero.
You can use it like:
```cpp
/**
 *  create a tuple that hold a string in the first field
 */
Yothalot::Tuple myTuple = {"hello"};

/**
 *  Check if the first field is indeed a string
 */
if(myTuple.isString(0))
    std::cout << "yes it's a string\n";
```

## Members int32() and int64()
With members `int32()` and `int64()` you can retrieve fields of type int32_t
and int64_t from the tuple. The field are indexed from zero. You can
use it like
```cpp
/**
 *  create a tuple that holds two int32_t values
 */
Yothalot::Tuple myTuple = {12, 23}

/**
 *  get the first field from the tuple
 */
int32_t a = myTuple.int32(0);
// a is 12
```

## Member doubleValue()
With member `doubleValue()` you can retrieve fields of type double
from the tuple. The field are indexed from zero. You can
use it like
```cpp
/**
 *  create a tuple that holds two int32_t values
 */
Yothalot::Tuple myTuple = {12.14, 23.008};

/**
 *  get the first field from the tuple
 */
double a = myTuple.doubleValue(0);
// a is 12.14
```


## Member number()
With member `number()` you can retrieve a numeric value from the tuple 
without caring about its size. The number returned is of type int64_t.
If the field holds a string the string is converted to a number.
The fields are indexed from zero. You can use it like:
```cpp
/**
 *  creat a tuple that holds values 1, 2, and 3
 */
Yothalot::Tuple myTuple = {1, 2, 3};

/**
 *  get the third field of the tuple
 */
int64_t is3 = myTuple.number(2);
```

## Member string()
With member `string()` you can retrieve a string from the tuple. It does
not matter if the value you have passed into the tuple was a string or not. If it was
a numeric value, it will be converted to a string. The fields are indexed
from zero. You can use it like:
```cpp
/**
 *  Create a tuple that holds some numbers and a string
 */
Yothalot::Tuple myTuple = {0, "hi", 4};

/**
 *  get the string that was stored the second field
 */
std::string a = myTuple.string(1);
```

## Member swap()
With member `swap()` you can swap two tuples. You can use it like:
```
/**
 *  Create a tuple that holds one numeric field
 */
Yothalot::Tuple tup1 = {1};

/**
 *  Create a tuple that holds two string fields
 */
Yothalot::Tuple tup2 = {"hello", "world"};

/**
 *  swap the two tuples
 */
tup1.swap(tup2);
// tup1 holds now "hello" and "world"
// tup2 holds now 1
```

## Member hash()
Member `hash()` will return the hash code of the tuple. The hash code is
of type size_t. You can use it like:
```cpp
/**
 *  create a tuple with some data
 */
Yothalot::Tuple myTuple = {1,2,3,4,5,6,7};

/**
 *  get the hash of this tuple
 */
size_t hashOfMyTuple = myTuple.hash();
```

## Member operator==
With `==` you test if two tuples have the same fields. You can use it
like:
```cpp
/**
 *  create two identical tuples
 */
Yothalot::Tuple tup1 = {1};
Yothalot::Tuple tup2 = {1};

/**
 *  check if they are the same
 */
if (tup1 == tup2)
    std::cout << "Yes, they are the same\n";
```
## Member operator!=
With `!=` you test if two tuples are not equal to each other. You can use
it like:
```cpp
/**
 *  create two different tuples
 */
Yothalot::Tuple tup1 = {1};
Yothalot::Tuple tup2 = {2};

/**
 *  check if the are different
 */
if (tup1 != tup2)
    std::cout << "Yes, they are different\n";
```
## Member operator<
With `<` you test if the fields in one tuple all are smaller than the
fields in the other tuple. You can use it like
```cpp
/**
 *  create a tuple with fields running from 0 up to 5
 *  and a tuple with fields from 1 up to 6
 */
Yothalot::Tuple tup1 = {0,1,2,3,4,5};
Yothalot::Tuple tup2 = {1,2,3,4,5,6};

/**
 *  Check if the fields of tup1 are indeed smaller than
 *  the fields of tup2.
 */
if (tup1 < tup2)
    std::cout << "yes all fields in tup1 are smaller than fields in tup2\n";
```

## Member write()

With `write()` you can write the tuple to a [Yothalot::Record](Yothalot/cpp-record).
You can use it like:
```cpp
/**
 *  create a tuple
 */
Yothalot::Tuple myTuple = {1, "hoi"};
/**
 *  construct a record
 */
Yothalot::Record myRecord(1);

/**
 *  write the tuple to the record
 */
myTuple.write(myRecord);
```

## Member fields()
With `fields()` you can obtain the number of fields that are stored in the
tuple. You can use it like
```cpp
/**
 *  Create a tuple with four fields
 */
Yothalot::Tuple myTuple = {1,2,3,4};

/**
 * yes indeed 4 fields
 */
std::cout << "the tuple has " << myTuple.fields() << " fields.\n";
```

## Member bytes()
With `bytes()` you obtain the size of the tuple in bytes. You can use it
like:
```cpp
/**
 *  Create a tuple
 */
Yothalot::Tuple myTuple = {1,2,3,4};

/**
 *  and see how large the tuple is in bytes
 */
std::cout << "the tuple is " << myTuple.bytes() << " bytes large.\n";
```
