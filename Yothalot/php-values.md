# The Yothalot\Values Class

The Yothalot\Values class is used to pass all values that share the same key
to the reducer step. The class is traversable, so you can easily iterate over
all your values by using foreach.

## Using the Yothalot\Values class

The Yothalot\Values class is only used as an argument in the `reduce()` member
of the Yothalot\MapReduce interface, and therefore you cannot cunstruct it
yourself. Using the Yothalot\Values class is easy, you just use foreach.

```php
// When values is of type Yothalot\Values 
// You can iterate over the values with foreach
foreach ($values as $value)
{
    // do something with the value
}
```
