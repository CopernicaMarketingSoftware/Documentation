# The Yothalot\Reducer class

The Yothalot\Reducer class is used to emit key value pairs from the mapper
step. Therefore, the [Yothalot\MapReduce](Yothalot/php-mapreduce)
interface requires that the map function takes the Yothalot\Reducer class
as its second argument. This is the only place where you need the Yothalot\Reducer
class.

The public interface of the Yothalot\Reducer class looks as follows:

```php
class Yothalot\Reducer
{
    public function emit($key, $value);
}
```
As you can see the public interface does not have a constructor. Since you only use the class in
the map function of your implementation of the [Yothalot\MapReduce](Yothalot/php-mapreduce) interface,
where it is passed as an argument, you do not need one. The only member function
of Yothalot\Reducer is emit.

## Member emit()

With member emit you can emit key value pairs from the mapper stage. Emit
takes two arguments. The first argument should contain the key value and
the second argument the value value. The key and the value can contain a
numeric or string value or an array of string and numeric values. Note that
if you are using arrays, the keys in the arrays are ignored.
