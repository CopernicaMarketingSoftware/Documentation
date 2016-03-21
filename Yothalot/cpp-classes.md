# Yothalot Classes

You have to use some Yothalot specific classes to implement your mapreduce
class. These classes are `Yothalot::Reducer`, `Yothalot::Writer`, `Yothalot::Key`,
`Yothalot::Value`, and `Yothalot::Values`. A description of these types is given below.

## The Yothalot::Reducer class
The `Yothalot::Reducer` class is used to emit a key value pair from the mapper step
to the reducer step. The class has one member function, `emit()`, that takes
two arguments, the first argument is the key of type `Yothalot::Key` and the second argument 
is the value of type `Yothalot::Value`. Its usage is:
```cpp
/**
 * emit a key, value pair to the reducer step
 */
reducer.emit(key, value);
```
where `reducer` is an instance of the `Yothalot::Reducer` class, `key` has type 
`Yothalot::Key` and `value` has type `Yothalot::Value`.

## The Yothalot::Writer class
The `Yothalot::Writer` class is used to emit a value from the reducer step to the writer
step. The class has one member function, `emit()`, that takes one argument
of type `Yothalot::Value`. Its usage is:
```cpp
/**
 *  emit a value to the writer step
 */
writer.emit(value);
```
where `writer` is an instance of the `Yothalot::Writer` class and `value` 
has type `Yothalot::Value`.

## The Yothalot::Key and Yothalot::Value classes

The `Yothalot::Key` and `Yothalot::Value` type definitions of 
[Yothalot::Tuple](copernica-docs:Yothalot/cpp-tuple). These tuples can hold
fields of type [Yothalot::Scalar](copernica-docs:Yothalot/cpp-scalar).


## The Values class

Values is a input iterator over a container that holds value types. This type
is passed to the reducer step as a second argument. You can use it to 
iterate over all the values or you can pass it to algorithms
that use constant forward iterators. The public interface looks like:

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
/**
 *  copy the fields of the values in a std::vector
 *  using the input iterator constructor of std::vector
 */
std::vector<Value> myVec(values.begin(), values.end());
```

### Member &operator++()
With prefix `++` you can increment the iterator. You can use it like:
```cpp
/** 
 *  you can use ++ to create an old stile for loop
 */
for(auto idx = values.begin(); idx != values.end(); ++idx)
    // do something that uses idx

/**
 *  yet you can also use the new type of loops
 */
for(auto a :values)
    // do something with a
```

### Member &operator*()
With `*` you dereference where the iterator is pointing to, so in this case
a value (i.e. a Tuple). You can use it like:
```cpp
/**
 *  set an iterator to the begin of values
 */
auto firstValIt = values.begin();

/**
 * dereference this iterator so you get the first value in values
 */
auto firsValRef = *firstValIt;
```

### Member *operator->()
With `->` you directly can access the member functions from value via the
iterator. You can use it like:
```cpp
/**
 *  get an iterator to the begin of values
 */
auto firstValIt = values.begin();

/**
 *  you can access the member functions of value now via ->
 */
std::cout << "the size of the first value is " firstValIt->bytes() << " bytes\n";
```

### Member operator==()
With `==` you can compare two `Yothalot::Values` to see if they are equal. You can use
it like:
```cpp
/**
 *  create two iterators that point to values.begin()
 */
auto a = values.begin();
auto b = values.begin();

/**
 *  check if they are equal
 */
if (a == b)
    std::cout << "yes they are the same\n";
```


### Member operator!=()
With != you can check if two Values are unequal. You have seen this already 
in the for loop where we tested that the `idx` iterator was not equal to the
`values.end()` iterator.


### Member operator bool()
Converses Values to a boolean. This boolean will be true if the iterator is
valid and false if it is not valid. You can use it like:
```cpp
/**
 *  Loop over all the elements 
 */
while(a)
{
    // do something with a
    
    // updata a
    ++a;
}
```

### Member operator!()
`!` will negate the value that member operator bool() would have returned
if it had been called.
