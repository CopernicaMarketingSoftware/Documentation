For template and document personalization, Copernica makes use of the
PHP based template engine Smarty.

In 2011 we upgraded the template engine from version 2 to version 3. The
syntax of personalization code used created in smarty 3 is slightly
different.

-   Personalization used in existing templates based on smarty 2 will
    remain valid after the release (backward compatible).
-   When creating a new template, you can still choose to use smarty
    version 2. Our advise is to use Smarty 3.
-   Smarty 3 has a slightly different syntax in some places. You may run
    into personalization errors when copying a smarty 2 template to a
    smarty 3 template (most of them are easily fixed).
-   Personalization used in web forms, personalization in follow up
    actions will still use the smarty 2 engine, even if they are
    affiliated with a smarty 3 document or template.
-   If you are not sure about the smarty version used in your template
    or document, you can find out by (temporarily) place the code
    {\$smarty.version} in your document. This will output the smarty
    version used.

Advantages of smarty 3
----------------------

### Auto escaping curly braces {}

Smarty insignia, such as {} surrounded by trailing spaces are no longer
recognized as Smarty tags. For instance { abc } will be ignored and
treated like a normal accolade, as opposed to {abc} which will still be
treated as a smarty variable. In templates rendered with smarty 3, it is
no longer necessary to use {ldelim} and {rdelim} to escape the curly
braces.

### Creating variables is done quicker and easier

Using Smarty 2 you can capture something in a variable as follows:

`{capture assign="namevar"}This is a var{/capture}`

In smarty 3 the same is accomplished with less spending of digital ink

`{$namevar="This is a var"}`

Both methods will output the same value: This is a var

### Functions

Not new in Smarty 3, but since the upgrade made available in the
software are functions. Functions are particularly useful when the same
code is used and execuded within the template several times. Writing a
funcion allows you to determine what should happen, and call this
function over and over again. Using functions makes your template better
manageable.

Learn more about [smarty template
functions](http://www.smarty.net/docs/en/language.function.function.tpl)

### The syntax is more strict

Adding multiple parameters to a smarty 3 function requires you to
surround the parameter with quotes, especially when spaces or colons are
used in the pararmeter. Example:

`[text name="paragraph 1"]`

or

`{in_miniselection miniselection="database:myCollection:myMiniSelection"}`

### Further reading

More information on the new smarty engine can be found on the smarty
website
[http://www.smarty.net/v3\_overview](http://www.smarty.net/v3_overview)

Extended documentation can be found on smarty.net as well\
 [http://www.smarty.net/docs/en/](http://www.smarty.net/docs/en/)
