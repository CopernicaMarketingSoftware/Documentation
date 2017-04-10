# Personalization functions: counter

The *counter* tag can be used to print counts and increments itself 
every time it is called. You are allowed to initialize as many counters 
as you want, which you can distinguish between by naming them.

## Variables

| Variable name | Description                  |
|---------------|------------------------------|
| name          | Name of counter              |
| start         | Initial number               |
| skip          | Counting interval            |
| direction     | Count up/down                |
| print         | Print/don't print value      |
| assign        | Variable to assign output to |

In the default case where no information is specified, the count will 
start at 1 and increment by 1 and the value will be printed.

## Example of default case

In the custom case where we do not specify information the code looks 
like this:

    {counter}<br />
    {counter}<br />
    {counter.default}<br />
    
and the output is:

    1<br />
    2<br />
    3<br />
    
## Custom case

Now let's look at a more complicated example where the code looks like this:

    {counter name="the final countdown" start=6, skip=2 direction="down"}<br />
    {counter name="the final countdown"}<br />
    {counter name="the final countdown"}<br />
    {counter name="some less awesome counter" start="1" skip="2"}<br />
    {counter name="some less awesome counter"}<br />
    {counter name="the final countdown"}<br />
    
Here we use a counter that counts down as well as a counter that counts up. 
The output would look like this:

    6<br />
    4<br />
    2<br />
    1<br />
    3<br />
    0<br />

## More information

* [Personalization](./personalization)
* [Personalization functions](./personalization-functions)
