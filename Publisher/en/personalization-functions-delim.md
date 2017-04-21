# Personalization functions: rdelim

As you may have seen in the examples the curly brackets belong to the 
Smarty syntax. The smarty code to use a name for example is `{$name}`. 
However, this means you can't use curly brackets in your text without a second 
thought. There are three ways to escape the brackets: Placing spaces 
around the brackets ([Smarty](./smarty-2-vs-smarty-3) 3 only), *ldelim* and 
*rdelim* and [literal](./personalization-functions-literal).

To output a right curly bracket '}' you can 
use the code `{rdelim}` which is short for right delimiter.
To output a left curly bracket '{' you can use the code `{ldelim}` which 
is short for left delimiter.

If you want to do something similar in a large block of text you might 
want to use [literal](./personalization-functions-literal).

## More information

* [Personalization](./personalization)
* [Personalization functions](./personalization-functions)
