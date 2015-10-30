# The Yothalot::Scalar Class

The Yothalot::Scalar class is used as a building block for the 
[Yothalot::Tuple](copernica-docs:Yothalot/cpp-tuple) class. The
Yothalot::Scalar class acts as a type that can hold types of, int32_t, int64_t, char *, std::nullptr_t and doubles.
Its public interface looks like:

```cpp
class Scalar
{
public:
    Scalar(int64_t value) : _type(type_i64);
    Scalar(int32_t value) : _type(type_i32);
    Scalar(const char *value, size_t size);
    Scalar(const char *value); 
    Scalar(const std::string &value);
    Scalar(double value);
    Scalar(std::nullptr_t);
    Scalar(const Scalar &that);
    Scalar(Scalar &&that);
    virtual ~Scalar();
    bool operator==(const Scalar &that) const;
    bool operator!=(const Scalar &that) const;
    bool operator<(const Scalar &that) const;
    std::size_t hash() const;
    size_t bytes() const;
    uint8_t type() const;
    size_t write(char *buf);
    bool isString() const;
    bool isInt32()  const;
    bool isInt64()  const;
    bool isNull()   const;
    bool isDouble() const;
    int64_t number() const;
    operator int64_t() const;
    std::string string() const;
    operator std::string() const;
    friend std::ostream &operator<<(std::ostream &stream, const Scalar &scalar);
};
}
```

## Constructors
The Yothalot::Scalar class has numerous constructors that take as an argument a type
that is supported by the Scalar class, i.e. you can construct from int32_t, int64_t,
char *, and doubles. Besides these constructors there a couple of others
that are noteworthy. Besides having the possibility to construct from char * you
can construct from a buffer by adding a second argument -the bufer size-, and
you can construct from std::string. Moreover, you can also construct from a nullptr.
Finally there are a copy and move constructor.

## Destructor
The destructor is virtual, so, if you want to derive from Yothalot::Scalar
and use some manual memory management this can safely be done.


## Member operator==()
With `==` you can test for equality between two Scalars. Note that the Scalars
should also have the same type in order to be equal. So, int32_t(1) is not
equal to a int64_t(1). You can use it like:
```cpp
/**
 *  Create two scalars
 */
Yothalot::Scalar scal1(1);
Yothalot::Scalar scal2(1);
/**
 *  Compare the two scalars
 */
if (scal1 == scal2)
    std::cout << "Yes they are equal\n";
```

## Member operator!=()
With `!=` you can test for inequality. Note that it is the negation of
`operator==()`.

## Member operator<()
Using `<` first checks if the types of the two Scalars that are compared
are the same. If they are different the inequality of the types is checked.
Note that types are ordered from small to larger by: int32_t, int64_t,
char *, std::nullptr_t, double. If the types are equal the values are compared.
The char* are compared via memcmp and a true is returned if memcmp is smaller
than one or if memcmp is zero and the size of the string of the first scalar
is smaller than the size of the string of the second scalar. You can use it like:
```cpp
/**
 *  Create two scalars
 */
Yothalot::Scalar scal1(1);
Yothalot::Scalar scal2(2);
/**
 *  Compare the two scalars
 */
if (scal1 < scal2)
    std::cout << "Yes scal1 is smaller than scal2\n";
```

## Member hash()
With `hash()` you can calculate the hash of the value of the Scalar. You can use
it like
```cpp
/**
 *  Create a scalar
 */
Yothalot::Scalar myScalar(21);
/**
 *  Calculate the hash
 */
size_t hashOf21 = myScalar.hash();
```

## Member bytes()
With this member you can obtain the number of bytes that the type that is
used in the Scalar uses. You can use it like
```cpp
/**
 *  Create a Scalar
 */
Yothalot::Scalar myScalar(21435542);
/**
 *  print the size of the type
 */
std::cout << "the size of the type used is: " << myScalar.bytes() << " bytes\n";
```

## Member type()
With `type()` you get the type identifier used. These identifiers are:
int32_t             : 0
int64_t             : 1
char*               : 2
std::nullptr_t      : 3
double              : 4

## Member write()
With `write()` you can write the scalar value into the passed buffer in network byte
order. The member returns the number of bytes the are written. You can use
it like:
```cpp
/**
 *  Create a Scalar
 */
Yothalot::Scalar myScalar(1);
/**
 *  Create a buffer
 */
size_t size = myScalar.bytes();
char *buffer = new char[size];

/**
 *  Write to the buffer.
 */
myScalar.write(buffer);

/**
 *  Free the buffer when you're done
 */ 
```

## Member isXxx()
With members `isString()`, `isInt32()`, `isInt64()`, `isNull()`, and `isDouble()`
you can check if the value has type string, int32_t, int64_t, std::nullptr_t,
or double respectively. You can use it like:
```cpp
/**
 *  Create scalar
 */
Yothalot::Scalar myScalar(1.0);
/**
 *  Check type
 */
if (myScalar.isDouble())
    std::cout << "yes it is a double\n";
```

## Member number()
Returns the numeric value of type int64_t stored in the scalar. If the value
in the scalar is of type char* this will be converted to a number using
`std::atoi()`. If the value is of type double it will be truncated. You
can use it like:
```cpp
/**
 *  Create scalar
 */
Yothalot::Scalar myScalar(32);
/**
 *  get the numeric value
 */
int64_t value = myScalar.number();
```

## Member operator int64_t()
This member is the cast operator to type int64_t. It will use member `number()`
to do the conversion.

## Member string()
This member converts the value into a std::string. Numeric values will be converted
to a std::string using `std::to_string()`.

## Member operator std::string()
This member is the cast operator to type std::string. It will use member
`string()` to do the conversion to a std::string.

## Member operator<<()
Using `<<` you can insert the value in a stream. The output has the format:
`Type => Value`. Its usage is:
```cpp
/**
 *  Create scalar
 */
Yothalot::Scalar myScalar(32);
/**
 *  print the scalar
 */
std::cout << myScalar << std::endl;
```
