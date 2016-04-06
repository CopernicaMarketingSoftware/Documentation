# Property `font`

The stype property `font` allows you to set font related properties, such as the 
font-size, color and font-family. The property value should be a nested JSON 
object. The following table lists all sub-properties that can be used inside this 
nested font block.

## Font properties

| Property | Value | Description                                     |
|:---------|-------|-------------------------------------------------|
| family | _string_ | Equivalent to the CSS font-family property     |
| size | _string_ | Equivalent to the CSS font-size property         |
| lineHeight | _string_ | Equivalent to the CSS line-height property |
| color | _string_ | Equivalent to the CSS color property            |
| weight | _mixed_ | Equivalent to the CSS font-weight property      |

## Where to use?

The `font` property can be set in many different places inside the input JSON 
object. If you set it at the root of your JSON document, it will be used as 
the default font for all texts in your email. However, you can also use it inside 
a block when you want to use an alternative font for a specific piece of text.

## Example

Consider the following input JSON:

```javascript
{
    "from" : "info@example.com",
    "subject" : "Email with a default font, and a different font for a specific text",
    "font" : {
        "family" : "verdana,arial,helvetica",
        "size" : "12px",
        "lineHeight" : "18px",
        "color" : "red"
    },
    "content" : {
        "blocks" : [{
            "type" : "text",
            "content" : "This paragraph uses the default font settings"
        }, {
            "type" : "text",
            "font" : {
                "family" : "courier new,courier",
                "size" : "10px",
                "lineHeight" : "14px",
                "color" : "black"
            },
            "content" : "This paragraph uses a custom font"
        }, {
            "type" : "text",
            "content" : "This paragraph also uses the default font"
        }]
    }
}
```

The example above shows a template with a top-level font setting that specifies 
the default font for all the texts in the template, and three text blocks. 
The second of the three blocks also has a `font` property, and will be displayed 
with a different font.

### Nested property family

The font family is a comma seperated list of font names. It is best to use 
web safe fonts, because your mail will be delivered to many different devices 
that may not have the exotic font installed that you would like to use.

```javascript
{
    "font": {
        "family": "Arial, 'Helvetica Neue', Helvetica, sans-serif"
    }
}
```

### Nested property size

The `size` property can be used to set the size of the font. If you leave it out, 
the system default will be used instead. The `size` property accepts a string. 
This means that you can use any type of unit (px, em, %, rem, pt, etcetera). 

### Property lineHeight

The space between two lines of text, which will set a CSS `line-height` property 
on the element. The `lineHeight` property accepts a string. This means that you 
can use any type of unit (px, em, %, rem, pt, etcetera). 

### Property color

The color of the text, equivalent to the CSS color property. Colors may be 
specified as an RGB triplet or in hexadecimal format. They may also be specified 
according to their common English names (e.g., 'red', 'PaleGoldenrod').

## See also

The `font` property can be set as a [top level property](json/top-level-properties), 
but can also be used in various content blocks, like [text blocks](json/block-text), 
[link blocks](json/block-link) and [button blocks](json/block-button). 
Other style related properties are for example the [property `background`](json/property-background) 
and the [`css` property](json/property-css).
