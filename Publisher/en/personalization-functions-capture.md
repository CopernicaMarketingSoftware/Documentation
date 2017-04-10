# Personalization functions: capture

Capture is used to capture the content between the beginning and end 
tag into a variable. It works similar to [assign](./personalization-functions-assign), 
but can be used on much larger parts of code and also to make arrays. 
It captures a piece of code while processing the template and can be used 
later in the template. 

The [rawcapture](./personalization-functions-rawcapture) 
function is extremely similar, but does not use HTML escaping. If you don't 
want to escape HTML please replace *capture* by *rawcapture* in the following 
examples.

Capture has many different functionalities. It can simply store information, 
store it in a variable or append to an existing variable. We will now proceed 
with some examples to make you more familiar with the use of this function.

## Assigning without variable name

The following example shows how you can use a capture without 
assigning the content to a variable.

    {capture name="someText"}
        This is some text that I would like to use later in the template.
    {/capture}
    
The shorthand version looks like this:

    {capture "someText"}
        This is some text that I would like to use later in the template.
    {/capture}
    
To use the captured content you can use the following code:

    {$smarty.capture.someText}
    
## Assigning with variable name

In the previous example we retrieve the content of the capture with 
`{$smarty.capture.someText}`, but we can also assign a shorter variable 
name.

    {capture name="someText" assign="myText"}
        This is some text that I would like to use later in the template.
    {/capture}
    
The shorthand version looks like this:
    
    {capture "someText" assign="myText"}
        This is some text that I would like to use later in the template.
    {/capture}
    
To use the captured content you can use the following code:
    {$myText}
    
In this example the text is so short the same could have been accomplished 
with [assign](./personalization-functions-assign), but you can place any 
part of the template you want into these variables (except HTML, which 
is only supported by [rawcapture](./personalization-functions-rawcapture)).

## Using capture with arrays

If you want to use a more advanced technique it is possible to use an 
array in capture as well, which can be printed with [foreach]. This is 
particularly useful if you want to concatenate information from different 
places.

Storing information can be done similarly to the code below:

    {capture append="information"}{assign "name" "Bob"}{$age}, {\capture}
    {capture append="information"}{assign "age" "25"}{$age}, {\capture}
    {capture append="information"}{assign "location" "the Netherlands"}{$age}{\capture}
    
While this is a lot of code, it only assigns three variables and combines them 
into another variable named *information*. This example also demonstrates 
how you can nest and combine functions.

Now let's use this variable in our template.

    {foreach $information as $text}{$text}{/foreach}
    
What happens here is that we cycle through everything in *information* and 
print it after converting it to text. The final output looks like this:

    Bob, 25, the Netherlands
    
## Variables

| Variable name | Description                      |
|---------------|----------------------------------|
| name          | Name of the captured block       |
| assign        | Variable to store the block in   |
| append        | (Existing) variable to append to |

## More information

* [Personalization](./personalization)
* [Personalization functions](./personalization-functions)
* [Assign function](./personalization-functions-assign)
* [Foreach function](./personalization-functions-foreach)
