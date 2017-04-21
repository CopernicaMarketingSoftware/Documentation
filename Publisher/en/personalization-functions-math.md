# Personalization functions: math

The *math* function makes it possible to do math equations in the template. 
Please note that this is an expensive function and math in PHP is much 
faster. We advise against using this in loops.

## Variables

The following variables are supported:

| Variable name | Description                      |
|---------------|----------------------------------|
| equation      | Equation to execute              |
| format        | Format of result                 |
| var           | Equation variable value          |
| assign        | Variable to store result in      |
| \[var ...\]   | Values for variables in equation |

Where the last variable denotes all variables that you use in your equation. 
In the formula `$a * $b` you have variables $a and $b for example, which 
should be defined before using an equation. 

## Supported operators

The supported math operators are +, -, /, *, abs, ceil, cos, exp, floor, 
log, log10, max, min, pi, pow, rand, round, sin, sqrt, srans and tan.

## Examples

A simple equation:

    {assign "height" 2}
    {assign "width" 3}
    {math equation="x * y" x=$height y=$width}
    
Will produce the result of x * y, which is 6 in this case. This is a simple 
equation, but you can make these as complicated as you want. Please also 
note that we used the [assign function](./personalization-functions-assign) (in shorthand) here.

If we want to calculate a fraction, however, we might need a float. In this 
case we ask for 2 decimals in the format attribute. We also save it for later use, 
so we get the result "1.33" when we use `{$frac}`.

    {assign "height" 1}
    {assign "width" 3}
    {math equation="1 + x / y" assign="frac" format="%.2f" x=$height y=$width}
    
## More information

* [Personalization](./personalization)
* [Personalization functions](./personalization-functions)
