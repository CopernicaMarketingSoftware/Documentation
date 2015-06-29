# Columns block

One of the most powerful block types that the ResponsiveEmail API offers,
is the block of type `columns`. This block type allows you to split
your mailing up into two to twelve different columns, and fill these columns
with content.

A `columns` block is a regular type of block, just like a [text block](copernica-docs:ResponsiveEmail/json/block-text), 
[image block](copernica-docs:ResponsiveEmail/json/block-image) 
or [button block](copernica-docs:ResponsiveEmail/json/block-button), 
and can therefore be used in the same places as these other blocks can be used, 
and it also supports the same sort of properties as these other blocks do 
(for example the [`background`](copernica-docs:ResponsiveEmail/json/property-background) 
and [`container`](copernica-docs:ResponsiveEmail/json/property-container) properties). 
There is however a difference; a `columns` block itself is also a content 
container, and you can add additional blocks *inside* it, for example the `text` 
and `image`.

```javascript
{
    "from" : "info@example.com",
    "subject" : "Mail with two columns",
    "content" : {
        "blocks" : [ {
            "type" : "text",
            "source" : "Leading text that spans all columns"
        }, {
            "type" : "columns",
            "background" : {
                "color" : "yellow"
            },
            "columns" : [ {
            
                // your left column data 
            
            }, {
            
                // your right column data 
            
            } ]
        } ]
    }
}
```

The above example shows a simple email, with a normal [`content`](copernica-docs:ResponsiveEmail/json/property-content) 
property that holds the 580px wide center content. Inside this centered content 
section, an array of blocks is placed. The first block is a regular [text block](copernica-docs:ResponsiveEmail/json/block-text), 
but the second block is a block of type `columns`. The `columns` block is a 
regular block and that it supports the same sort of properties as any other block, 
for example the `background` property. The most important property of the `columns` 
block is the [`columns`](copernica-docs:ResponsiveEmail/json/property-columns) property, 
which holds an array of objects that are contained in the columns. See our 
[documentation of the columns property](copernica-docs:ResponsiveEmail/json/property-columns) 
for a description of the properties that can be set for each column.

## Up to twelve different columns

The [`columns`](copernica-docs:ResponsiveEmail/json/property-columns) property 
may hold up to twelve entries. Internally, a twelve cells wide fluid grid is used 
to render the email. By default, the Responsive Email API gives every column the 
same width. This can overridden by setting the [`size`](copernica-docs:ResponsiveEmail/json/property-size) 
property for each column. For an example, see the documentation of the nested 
[`columns`](copernica-docs:ResponsiveEmail/json/property-columns) property. It 
is permitted to use multiple `columns` block inside a mail. The following example 
shows an email whose top part is split in two columns holding two images, 
followed by some text that takes up the entire width of the mail, followed by 
three columns each holding a button.

```javascript
{
    "from" : "info@example.com",
    "subject" : "Mail with multiple columns columns",
    "content" : {
        "blocks" : [ {
            "type" : "columns",
            "columns" : [ {
                "blocks" : [ {
                    "type" : "image",
                    "src" : "http://www.example.com/image1.gif"
                } ]
            }, {
                "blocks" : [ {
                    "type" : "image",
                    "src" : "http://www.example.com/image2.gif"
                } ]
            } ]
        }, {
            "type" : "text",
            "source" : "text that spans all columns"
        }, {
            "type" : "columns",
            "columns" : [ {
                "blocks" : [ {
                    "type" : "button",
                    "label" : "Left button"
                } ]
            }, {
                "blocks" : [ {
                    "type" : "button",
                    "label" : "Center button"
                } ]
            }, {
                "blocks" : [ {
                    "type" : "button",
                    "label" : "Right button"
                } ]
            } ]
        } ]
    }
}
```

## Responsive behavior

When an email is displayed on a large screen, the columns are displayed as you 
would expect: next to each other. On smaller screens, like mobile devices, 
the contents of columns could be displayed on top of each other. To see this 
in action, go to our [online json editor](/support/json-editor) that is already 
preloaded with a template containing two columns. You can switch this editor to 
mobile-mode to make the columns appear on top of each other. 

*One final warning*: although a `columns` block is a regular block and has the 
same behavior as the other blocks, it is not possible to place blocks of type 
`columns` inside other `columns` blocks. A `columns` block can only be placed 
inside the [main content section](/support/property-content).

## Supported properties

As we explained above, the `columns` block is a regular block, and
supports many of the properties that other blocks also support.

### Columns block top level properties

| Property | Value | Desc. |
| --- |
| type | "columns" | Property to identify block as a `columns` block. |
| [columns](copernica-docs:ResponsiveEmail/json/property-columns) | _JSON array_ | A JSON array containing JSON objects. These objects should contain another JSON array names `blocks`. |
| [background](copernica-docs:ResponsiveEmail/json/property-background) | _object_ | The background of all the columns. |
