# Block level style and content properties

The API allows you to further style the looks of your emails. At each block 
a number of style and content properties are available, for instance to change 
the background color of the block. This article addresses all content and style 
properties available on block level.  

## Block level content and style properties

| Property | Value | Description                                                          |
|:----------------------------------------------------------------------------------------|
| font | _object_ | Font and text settings for this block                                 |
| background | _object_ | Background settings for this block                              |
| margin | _mixed_ | Whitespace around the block                                          |
| padding | _mixed_ | Whitespace around the block, this whitespace will have a background |
| css | _object_ | Custom CSS settings to be applied on the block                         |
| attributes | _object_ | Custom attributes to be applied on the block                    |
| container | _object_ | Custom attributes to be applied on the block                     |

### Property font

At the [top level](/support/json) of the input JSON you can set the font that is 
used for the mailing. This is a template wide setting, that is used for all texts, 
unless overridden for a specific text. 

You can overwrite the template wide font settings by using the property `font` 
inside any block that may contain textual content. The `font` property is available 
in text blocks, buttons blocks, link blocks and column blocks. 

The following example would result in an email that has a text about _apples_ written in _Comic Sans_
and a text about _banana's_ written in Arial. 

```javascript
{
    "templateName" : "Vet gave template man!",
    "font" : {
        "family" : "Arial"
    },
    "content" : {
        "blocks": [
            {
                "type" : "text",
                "content" : "Text about apples",
                "font" : {
                    "family" : "Comic Sans"
                }
            },
            {
                "type" : "text",
                "content" : "Text about banana's"
            }
        ]
    }
} 
```

[Read more about font properties](copernica-docs:ResponsiveEmail/json/property-font)

### Property background

The property `background` lets you specify background related properties. 
The property exists as a [toplevel property](/support/json), inside the property 
`content` and as a property inside a block.

 * When specified on toplevel, the rules will be applied on the outer wrapper 
   table of the responsive email. 
 * When specified on `content` level, the background properties will be applied 
   to the 580px wrapper around the email content.
 * When specified on block level, it will only be applied to that block. 

The `background` property accepts another JSON object that contains the actual 
background properties. Currently, the only supported background property is 
`color`. Here is an example with the background property on toplevel and inside 
a content block. 

A rastafari colored email template could be constructed as follows. 

```javascript
    {
        "background": {
            "color": "green"
        },
        "content": {
            "background": {
                "color": "yellow"
            },
            "blocks": [
                {
                    "background": {
                        "color": "red"
                    },
                    "type": "text",
                    "content": "This is just an example test."
                }
            ]
        }
    }
```

### Property margin

You may change the amount of whitespace that is reserved around a block. 
The margin property can be used for that. The margin can either be a numeric value, 
if you want to use the same margin for all four sides around the block, 
or an object if you want to set the top, left, right and bottom margins seperately.

```json
    {
        "type": "button",
        "margin": {
            "left": 10,
            "right": 20,
            "top": 0,
            "bottom": 5
        }
    }
```

### Property css

The API allows you to specify custom CSS properties and element attributes. 
The CSS rules will be directly applied as inline CSS to the HTML element. For 
instance, in an image block, the css specified within `css` will be directy 
applied to the html `<img>` tag. 

When using your own custom CSS, you must be aware that it might break the email 
lay-out or responsiveness in some clients.


```json
    {
        "type" : "image",
        "css" : {
            "margin-right" : "10px",
            "border" : "2px dashed pink"
        }
    }
```

### Property attributes

The API allows you to specify, add or overwrite HTML element attributes using 
the property `attributes`. The property `attributes` is also available in each 
block within the content section of your document. The attributes you set in 
this property will be directly applied to the element customary for this type 
of block. For instance, in an image block, the CSS specified within `css` will 
be directy applied to the HTML `<img>` tag. 

```javascript
{
    "type" : "image",
    "attributes" : {
        "border" : 1
    }
}
```

### Property container

Any block type is normally wrapped inside a table ```<td>``` element. For this 
container element  you can specify additional (or overwrite existing) CSS and 
element attributes using the `container` property. 

The `container` property accepts a JSON object with a `css` and/or `attributes` 
property. Both `css` and `attributes` accept a JSON block containing the CSS 
properties or element attributes you would like to add to the container element.

```javascript
{
    "type" : "image",
    "container" : {
        "css" : {
            "border" : "2px dotted blue"
        },
        "attributes" : {
            "summary" : "This table cell contains an image"
        }
    }
}
```

[Read more about the container property](copernica-docs:ResponsiveEmail/json/property-container)
