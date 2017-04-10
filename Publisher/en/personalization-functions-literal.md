# Personalization functions: literal

The *literal* function is used to take a block of code literally. It is 
particularly useful when you want to include a block that contains many 
curly braces Smarty would otherwise try to interpret. Javascript code contains 
many curly braces for example and individually escaping curly braces might 
be very tedious if you want to send a longer snippet of code.

In a simpler case of escaping only two curly brackets it might not be 
necessary to use the literal block. In this case you could use the 
[ldelim](./personalization-functions-ldelim) and [rdelim](./personalization-functions-rdelim) 
functions to output the brackets instead. In [Smarty 3](smarty-2-vs-smarty-3) it is also possible to 
just place spaces around a bracket to output it as a symbol.

## Example

To use the *literal* function, simply place what you want to be taken 
literally between the begin tag (`{literal}`) and end tag (`{\literal}`).
 
    <script>
       // These braces would be automatically escaped in Smarty 3
       // because of the whitespace
       function myFoo {
         alert('Foo!');
       }
       // This is a good place to use the literal block
       // to escape while keeping the function readable.
       {literal}
         function myBar {alert('Bar!');}
       {/literal}
    </script>
    
This example was taken from the [Smarty documentation](http://www.smarty.net/docs/en/).

## More information

* [Personalization](./personalization)
* [Personalization functions](./personalization-functions)
* [Left delimiter](./personalization-functions-ldelim)
* [Right delimiter](./personalization-functions-rdelim)
