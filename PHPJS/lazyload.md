# Lazy loading

If you do not want to populare the JavaScript engine with all your
data before you execute a script, you can implement "lazy loading"
using [PHP dynamic properties](http://php.net/manual/en/language.oop5.overloading.php).

Lazy loading is useful if you do not know in advance what data is going 
to be used inside the executed JavaScript code. With lazy loading you
can load the data the moment it is needed.

The following example shows how you can use the magic __isset() and
__get() properties to implement lazy loading. The first time a certain
property is accessed, the PHP script will automatically query the
database to retrieve the requested property.

```php
<?php
// PHP class that represents a person
class Person
{
    // all person data
    private $data = null;
    
    // person id
    private $id = 0;

    // constructor
    public function __construct($id)
    {
        // store the id
        $this->id = $id;
    }
    
    // check if a certain property is set
    public function __isset($property)
    {
        // for this example we only support three properties
        return in_array($property, array('name','age','sex'));
    }
    
    // retrieve a property
    public function __get($name)
    {
        // is the data already loaded?
        if (is_array($this->data)) return $this->data[$name];
        
        // data was not yet loaded, load it now from a database
        $this->data = load_data_from_database($id);
        
        
        // return appropriate property
        return $this->data[$name];
    }
}
        
// create a new context
$context = new JS\Context;

// assign the personal information about a number of people to the
// javascript context, this is a cheap operation as no database
// queries are necessary
$context->assign('John',    new Person(1));
$context->assign('Simon',   new Person(2));
$context->assign('Peter',   new Person(3));
$context->assign('Alison',  new Person(4));
$context->assign('Julia',   new Person(5));

// store javascript code in the $script variable using heredoc syntax
$script = <<< 'EOD'

    // we can now use information from the different persons, this
    // will trigger database queries for John and Simon. Because the
    // user data for Peter, Alison and Julia is not used, no database
    // queries for them will be made
    if (John.age == Simon.age) {
    
        // @todo deal with this
    }

EOD;

// execute the script
$context->evaluate($script);
?>
```

## More lazy loading techniques

You can also implement SPL interfaces like Iterator or IteratorAggregate to 
implement lazy loading for JavaScript arrays. More and more data is loaded
while the array is being iterated over.

```php
<?php
// class to iterate over persons
class PersonIterator implements Iterator
{


}

// PHP class that represents multiple persons
class Persons implement IteratorAggregate
{
    // retrieve an iterator
    public function getIterator()
    {
        return new PersonIterator();
    }
}
        
// create a new context
$context = new JS\Context;

// assign all persons
$context->assign('persons', new Persons());

// store javascript code in the $script variable using heredoc syntax
$script = <<< 'EOD'

    // total age for all persons
    var totalage = 0;

    // iterate over all persons
    for (var x in persons) totalage += persons[x].age;
    
    // calculate age to let it be the last expression
    totalage;

EOD;

// execute a script
$totalage = $context->evaluate($script);
?>
```

