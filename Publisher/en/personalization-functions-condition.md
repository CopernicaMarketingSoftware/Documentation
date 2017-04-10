# Personalization functions: condition

A condition is very similar to the [if function](./personalization-functions-if) 
but evaluates Javascript expressions. The only parameter is the expression 
itself, written in Javascript and its required.

## Example

    {condition expression="Math.random<0.5"}
        {Display some content}
    {/condition}
    
This content is only displayed in 50% of the cases and random, but 
you could write any expression instead of this.

## More information

* [Personalization](./personalization)
* [Personalization functions](./personalization-functions)
