# Loop tags

The most complicated tag you can use in templates is the [loop] tag. 
The advantage is that this tag is also very powerful. Using the [loop] 
tag you can mark code to repeat on document level, for example to repeat 
an article. In this case you could make a newsletter with ten articles 
just as easily as a newsletter with one article. It's also possible to 
nest these tags. A simple example looks like this:

```html
[loop name="example"]
    Code to repeat
[/loop]
```

This example is not really useful yet. The real usefulness of the [loop] 
tag shows best if you add more tags within the loop, for example to make 
several paragraphs with a text box and an image each:

```html
[loop name="myloop"]
    <div>
        <table>
            <tr>
                <td>[text name="mytext"]</td>
                <td>[image name="myimage"]</td>
            </tr>
        </table>
    </div>
[/loop]
```

The document makers are able to choose how many iterations of the loop 
should be placed in that specific document. Zero is of course a valid 
value, as you might not always need to add this content, and doesn't show 
anything in the template when used. This way you can add conditional content. 

Copernica recommends naming all tags you use in a document with a *name* 
attribute. This will ensure that your documents remain intact when you 
change the order of the tags or decide to add a new one to add more content. 
In the case of the [loop] block this name can even be used for scripting 
and *if* statements, which we will discuss later.

## Minimum and maximum values

The user is usually free to determine the amount of iterations, but it 
is possible to add a minimum or maximum amount of iterations in the 
template as well. This can be achieved by using the *min* and *max* attributes, 
as shown below:

```html
[loop name="example" min="1" max="5"]
    ...
[/loop]
```

Both attributes are completely optional.

## Start and end code

Using the *begin* and *end* code it is possible to add code to the start 
and end of the loop respectively. This code is only used when there 
is at least one iteration, making it invisible when the block is not used.

```html
[loop name="example" begin="<table>" end="</table>"]
    <tr>
        <td>[text]</td>
    </tr>
[/loop]
```

The following simple example contains a table with a variable amount of 
rows, but you can add any HTML code, such as a class to handle layuout.

## Template variables

Template variables can be used to make even more powerful loops. They 
are similar to [personalization](./personalization) variables, but only 
contain information about the state of the loop. The following variables 
are available:

* [$loop.naamvanloop.index] - total iterations
* [$loop.naamvanloop.iteration] - current iteration
* [$loop.naamvanloop.first] - boolean waarde to indicate first iteration
* [$loop.naamvanloop.last] - boolean waarde to indicate last iteration

You can use these loops to add some more detail to the loop, for example 
to improve the layout:

```html
[loop name="myloop"]
    <p>
        [text name="mytext"]
    </p>
    [if !$loop.myloop.last]
        <hr/>
    [/if]
[/loop]
```

In the exmaple above you see a loop of paragraphs. The amount of paragraphs 
that will be used can be determined at the document level. After each 
paragraph a horizontal line is drawn to separate it from the paragraph 
below. However, the *if* loop specifies that this is not done for the last 
iteration, such that there is no line under the last paragraph.

Template variables are also available in nested loops, but require the 
name of the first loop, like this:

    [$loop.firstloop.innerloop.index]

Inside the template maker Copernica uses the Smarty engine of PHP for 
reading the templates. Instead of the standard Smarty curly braces we use 
square brackets, although all of these are regular Smarty functions. This 
means that you can use all tricks and possibilities Smart offers as long 
as you use the square brackets instead. More information about Smarty is 
available [here](http://www.smarty.net).

## More information

* [Templates](./templates)
* [Publisher templates](./publisher-templates)
* [Text tag](./text-tag)
* [Image tag](./image-tag)
