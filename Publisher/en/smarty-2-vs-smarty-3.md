# Smarty 2 vs. Smarty 3

Copernica uses the externally developed Smarty template engine, which is 
based on PHP but a lot easier, so personalization is accessible to everyone. 
It is not developed by Copernica, but it is well documented by a large 
army of enthusiasts. See their own documentation [here](http://www.smarty.net/docs/en/).

In 2011 we upgraded the template engine from version 2 to version 3. The
syntax of personalization code used created in smarty 3 is slightly
different.

-   Personalization used in existing templates based on Smarty 2 will
    remain valid after the release (backwards compatible).
-   When creating a new template, you can still choose to use Smarty
    version 2, but we advise against this. We will explain the advantages 
    of Smarty 3 in another section of this article.
-   Smarty 3 has a slightly different syntax in some places. You may run
    into personalization errors when copying a Smarty 2 template to a
    Smarty 3 template (most of them are easily fixed).
-   Personalization used in web forms and personalization in follow up
    actions will still use the Smarty 2 engine, even if they are
    affiliated with a Smarty 3 document or template.
-   If you are not sure about the smarty version used in your template
    or document, you can find out by (temporarily) placing the code
    {\$smarty.version} in your document. This will output the smarty
    version used.

## Advantages of smarty 3

### Auto escaping curly braces {}

Smarty insignia, such as {} surrounded by trailing spaces are no longer
recognized as Smarty tags. For instance { abc } will be ignored and
treated like a normal accolade, as opposed to {abc} which will still be
treated as a Smarty variable. In templates rendered with Smarty 3, it is
no longer necessary to use {ldelim} and {rdelim} to escape the curly
braces.

### Creating variables is done quicker and easier

Using Smarty 2 you can [capture](./personalization-function-capture.md) something in a variable as follows:

`{capture assign="namevar"}This is a var{/capture}`

In smarty 3 the same is accomplished with less spending of digital ink

`{$namevar="This is a var"}`

Both methods will output the same value: "This is a var".

### Functions

Not new in Smarty 3, but since the upgrade made available in the
software are functions. Functions are particularly useful when the same
code is used and executed within the template several times. Writing a
function allows you write a procedure and use it multiple times, instead 
of having to copy it to the appropriate locations. Using functions makes 
your template more manageable.

You can find more about these functions in the [Smarty Documentation](http://www.smarty.net/docs/en/) 
or in our article on [personalization functions](./personalization-functions.md)

### The syntax is more strict

Adding multiple parameters to a smarty 3 function requires you to
surround the parameter with quotes, especially when spaces or colons are
used in the pararmeter. Example:

`[text name="paragraph 1"]`

or

`{in_miniselection miniselection="database:myCollection:myMiniSelection"}`

## More information

* [Smarty documentation](http://www.smarty.net/docs/en/)
* [Personalization general(./personalization)
* [Personalization functions](./personalization-functions)
