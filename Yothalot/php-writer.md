# Yothalot\Writer

The Yothalot\Writer class is used to emit values from the reducer step.
Therefore, the [Yothalot\MapReduce](php-mapreduce)
interface requires that the reduce function takes the Yothalot\Writer class
as its third argument. This is the only place where you need the Yothalot\Writer
class.

The public interface of the Yothalot\Writer class looks as follows:
```php
class Yothalot\Writer
{
    public function emit($value);
}
```

As you can see the public interface does not have a constructor. Since
you only use the class in the reduce function of your implementation of
the [Yothalot\MapReduce](php-mapreduce) interface,
where it is passed as an argument, you do not need one. The only member
function of Yothalot\Writer is emit.


## Member emit()

With member emit you can emit a value from the reducer stage. Emit takes
therefore only one argument. This argument can contain a numeric or string
value or an array of string and numeric values. Note that if you are using
an array, the keys in the array are ignored.
