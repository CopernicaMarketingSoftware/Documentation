# Personalization functions: cycle

The *cycle* function can be used to alternate between a set of values. 
You can use it to switch between two colors in a table or cycle through 
an array of colors or any other array of values.

## Variables

| Variable name  | Description                             |
|----------------|-----------------------------------------|
| name           | Name of the cycle                       |
| values         | Values in cycle (array/delimited)       |
| print          | Whether or not to print the value       |
| advance        | Whether or not to advance to next value |
| delimiter      | Delimiter for array                     |
| assign         | Variable to assign cycle to             |
| reset          | Reset to first value                    |

The only required variable here is the *values*. If no information is 
entered the name is "default" and everything is automatically printed and 
advanced. The default delimiter is the comma.

## Examples

The following example assigns the colors of the rainbow as the product 
colors.

    {foreach from $products item=product}
        {cycle values="red;orange;yellow;green;blue;indigo;purple, name=$product.color, delimiter=";"}
    {\foreach}
    
Because we did not set print to false we get the following output.

    redorangeyellowgreenblueindigopurple
    
Of course this example requires an array of products first. After running the 
code the products now all have been assigned a color that can be used later 
in the template. The example also uses the [foreach function](./personalization-functions-foreach.md).
    
## More information

* [Personalization](./personalization)
* [Personalization functions](./personalization-functions)
* [foreach function](./personalization-functions-foreach.md)
