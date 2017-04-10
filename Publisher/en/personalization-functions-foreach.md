# Personalization functions: foreach

The *foreach* function can be used to loop over arrays of data. These 
can be nested as well. The array it loops over determines the amount 
of iterations, but you can also pass an integer for arbitrary loops.

The only variable it has is **nocache** which prevents caching of the 
*foreach* loop.

## Properties

Each iterator has several properties.

* **index**: Current array index
* **iteration**: Current loop iteration, always starts at one
* **first**: Boolean, only TRUE on first iteration
* **last**: Boolean, only TRUE on last iteration
* **show**: Boolean, TRUE if data was displayed
* **total**: Total iterations that will be executed in the loop

## Example

If we have an array of items, in this case **information** we can loop 
over it and perform all kinds of operations. In this case however, we 
keep it simple and print the contents as text. The array is made 
with the [capture function](./personalization-functions-capture).

    {capture append="information"}{assign "name" "Bob"}{$age}, {\capture}
    {capture append="information"}{assign "age" "25"}{$age}, {\capture}
    {capture append="information"}{assign "location" "the Netherlands"}{$age}{\capture}

    {foreach $information as $text}{$text}{/foreach}
    
The output is:

    Bob, 25, the Netherlands
    
We can also use the other properties of the iteration for this loop.

    {foreach $information as $text}
        {if $text@index eq 3}
            End of the list,
        {\if}
        {$text@index}, 
    {/foreach}
    
In this case we print the index of every item and a message before we 
print index 3. The output looks like this:

    1, 2, End of the list, 3,
    
## More information

* [Personalization](./personalization)
* [Personalization functions](./personalization-functions)
* [Capture function](./personalization-functions-capture).
