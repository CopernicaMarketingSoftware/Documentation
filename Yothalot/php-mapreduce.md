# Yothalot\MapReduce

**Yothalot\MapReduce** is an interface for a serializable class, which
means that it can be serialized by the Yothalot framework, and be
transferred to other nodes in the Yothalot cluster.

The interface requires you to implement the methods `includes()`, `map()`, `reduce()`, 
and `write()`and . 

Although Yothalot is implemented in C++ and is using [PHP-CPP](copernica-docs:php-cpp)
to create the API, the definition of the interface could look like this:
```php
interface Yothalot\MapReduce
{
    /**
     *  Implement a function that returns an array with the include files
     */
    public function includes();

    /**
     *  Implement a mapper function:
     *  The mapper algorithm starts by calling the map() function in your class
     *  for every input value that you send to your mapper.
     *
     *  @param  mixed       Value that is being mapped
     *  @param  Reducer     Reducer object to which we may emit key/value pairs
     */
    public function map($value, Yothalot\Reducer $reducer);
        
    /**
     *  Implement a reduce function:
     *  When the mapper algorithm emits identical keys, the Yothalot framework
     *  will start making calls to the reduce() method to reduce the values 
     *  linked to these keys. This reduced value should be passed to the writer.
     *
     *  It is very well possible that the reduce() method gets called more than
     *  once for the same key (for example if so many keys were found that 
     *  multiple reducers were started). The value that you emit might therefore
     *  be an intermediate value that is going to be reduced for a second or
     *  third time before it is finally written.
     *
     *  @param  mixed       The key for which values should be reduced
     *  @param  Values      Traversable object with values linked to the key
     *  @param  Writer      Object to which the reduced value can be sent
     */
    public function reduce($key, Yothalot\Values $values, Yothalot\Writer $writer);
        
    /**
     *  Implement a write function:
     *  The final step in the reducer process calls the write() method once for 
     *  every found key, and for each reduced value.
     *
     *  @param  mixed       The key for which the result comes in
     *  @param  mixed       Fully reduced value
     */
    public function write($key, $value);
}
```
