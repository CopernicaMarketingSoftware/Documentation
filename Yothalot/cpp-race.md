# Writing a C++ Racer Algorithm

If you want to process a lot of data simultaneously in a general way and
do not want to use a reduce and write step, you can create a program that
follows the Racer API so you can use the Yothalot framework to parallelize
the work for you.

To run your race algorithm on a Yothalot cluster you have to implement
the algorithm in a class that inherits form Yothalot::Racer. This class
should then be called from an [executable](copernica-docs:Yothalot/cpp-program "Create a Yothalot executable")


## The Racer Class

The class that you have to create for your race algorithm should inherit 
from the following base class.

```cpp
namespace Yothalot {

/**
 *  Class definition
 */
class Racer
{
public:
    /**
     *  Class definition for the result class
     */
    class Result
    {
    private:
        /**
         *  Contains all the data
         */
        std::map<std::string, Tuple> _data;

    public:
        /**
         *  Constructor
         */
        Result() {};

        /**
         *  Destructor
         */
        virtual ~Result() {}

        /**
         *  Fill in the data
         *  @param  key
         *  @param  value
         */
        template<typename ... T> void put(std::string key, T ... value) { _data.emplace(std::move(key), Scalar(std::forward<T>(value)...)); }

        /**
         *  Turn this result into a string
         *  @return std::string
         */
        std::string toString() const;
    };

    /**
     *  Function to map a log-record to a key/value pair
     *  @param  value       The value to map
     *  @param  size        Size of the value
     *  @return std::unique_ptr<Result>    In case you don't have a result please return nullptr
     */
    virtual std::unique_ptr<Result> process(const char *value, size_t size) = 0;
};

```
In your class that inherits from this pure virtual base class you have 
to implement `process()`.

## Processing
The part that needs to be implemented by you is the `process()` method.
In this method you implement your algorithm that processes the data. 
The data that needs to be processed is passed to `process()` via its first
argument of type `const char *` and the second argument that holds the length
of the data of type `size_t`. Note that each single piece of data that you
pass to your Yothalot program will result in a call to `process()`. So, although it is possible to call
process on each single piece of data, this will result in a lot of calls to `process()`,
each call having some overhead. Therefore, you want to provide `process()` with
enough data in that single argument to keep it busy for a while. E.g. you can
pass strings that contain the name of a file that contains some data that you want to 
process. If you pass some file names, processes can nicely run in parallel and the
overhead is not to large. Passing data can be done in multiple ways and is
described in the [using a Yothalot::Job](copernica-docs:Yothalot/cpp-job) 
and [starting up a job manually](copernica-docs:Yothalot/cpp-manual) articles.

The `process()` method returns a std::unique_ptr to Result. The std::uniqe_ptr
ensures that memory management is taken care of. As can be seen above, the Result
type is defined in the base class `Yothalot::Racer` and acts as a wrapper around
a std::map<std::string, Yothalot::Tuple>. So, in the Result class you can save
string keys and Yothalot::Tuple values. The [Yothalot::Tuple](copernica-docs:Yothalot/cpp-tuple "Tuple")
type is very useful as it can store multiple numeric and string values at
the same time. Saving a std::string Yothalot::Tuple key-value pair is easy, you call
the put method with the first argument a string that you want to add and 
in the rest of the arguments the rest of the values that you want to return.
These values can be numerical and strings. The returned Yothalot::Result is
finally returned as a JSON object that can be displayed in the terminal where your application is started
if you started the job [manually](copernica-docs:Yothalot/cpp-manual) and
provided the option --wait, or can be obtained when the job is started 
[programmatically](copernica-docs:Yothalot/cpp-job "Yothalot::Job"). If there
is nothing to return from the data that was passed to the process or, 
if you want to be sure that all data is processed, you can return a `nullptr`.
As long as a `nullptr` is returned, Yothalot will keep on processing data.
It only stops with processing when the return value is non-null. With this functionality 
it is not only easy to process a lot of data, but you can also use it for
searching to a lot of data. Once you have found an occurrence of the thing
you are looking for you simply pass the location and you are done. An example
of a racer algorithm is:

```cpp
class MyRace : public Yothalot::Racer
{
public:
    /**
     *  Implementation for a process function
     *  @param  std::string       Value that is being mapped
     *  @return Yothalot::Value   Your return value
     */
    virtual Yothalot::Value process(const char *value, size_t size) override
    {
        // @todo:   implement your process algorithm that use value and maybe size
        
        // if the result is zero the job will continue else the result 
        // will be returned by the job and the job will be stopped
        // We will process all data so we can just return a zero
        return  nullptr;
    }
}
```
Since instances of these classes run in isolation, you cannot use shared
state between them. However, the objects share resources and multiple calls
to `process()` may happen at the same time, therefore, you can have race
conditions if the objects try to access the same resource at the same time.

After having created your race algorithm in the above described way
you can call your algorithm from a little [executable](copernica-docs:Yothalot/cpp-program "Create a Yothalot program")
