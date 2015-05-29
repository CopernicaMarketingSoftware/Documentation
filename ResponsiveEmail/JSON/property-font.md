# Property `font`

The stype property `font` allows you to set font related properties, 
such as the font-size, color and font-family. The property value should
be a nested JSON object. The following table lists all 
sub-properties that can be used inside this nested font block.

<table class="info">
    <thead>
        <tr>
            <td colspan="3">Font properties</td>
        </tr>
    </thead>
    <tbody>
        <tr class="thead">
            <td>Property</td>
            <td>Value</td>
            <td>Description</td>
        </tr>
        <tr>
            <td><a href="/support/json/property-font#family">family</a></td>
            <td><em>string</em></td>
            <td>Equivalent to the CSS font-family property</td>
        </tr>
        <tr>
            <td><a href="/support/json/property-font#size">size</a></td>
            <td><em>string</em></td>
            <td>Equivalent to the CSS font-size property</td>
        </tr>
        <tr>
            <td><a href="/support/json/property-font#lineheight">lineHeight</a></td>
            <td><em>string</em></td>
            <td>Equivalent to the CSS line-height property</td>
        </tr>
        <tr>
            <td><a href="/support/json/property-font#color">color</a></td>
            <td><em>string</em></td>
            <td>Equivalent to the CSS color property</td>
        </tr>
        <tr>
            <td><a href="/support/json/property-font#color">weight</a></td>
            <td><em>mixed</em></td>
            <td>Equivalent to the CSS font-weight property</td>
        </tr>
    </tbody>
</table>

## Where to use?

The `font` property can be set in many different places inside the input
JSON object. If you set it at the root of your JSON document, it will be
used as the default font for all texts in your email. However, you can also
use it inside a block when you want to use an alternative font for a
specific piece of text.

## Example

Consider the following input JSON:
````javascript
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
````
The example above shows a template with a top-level font setting that 
specifies the default font for all the texts in the template, and three
text blocks. The second of the three blocks also has a `font` property,
and will be displayed with a different font.

<a name="family"></a>
### Nested property `family`

The font family is a comma seperated list of font names. It is best to
use websafe fonts, because your mail will be delivered to many 
different devices that may not have the exotic font installed that
you would like to use.
````javascript
    {
        "font" {
            "family" : "Arial, 'Helvetica Neue', Helvetica, sans-serif"
        }
    }
````
<a name="size"></a>
### Nested property `size`

The `size` property can be used to set the size of the font. If you leave
it out, the system default will be used instead. The `size` property accepts 
a string. This means that you can use any type of unit (px, em, %, rem, pt, etcetera). 

<a name="lineheight"></a>
### Property `lineHeight`

The space between two lines of text, which will set a CSS `line-height` property 
on the element. The `lineHeight` property accepts a string. This means that you 
can use any type of unit (px, em, %, rem, pt, etcetera). 

<a name="color"></a>
### Property `color`

The color of the text, equivalent to the CSS color property. Colors may be 
specified as an RGB triplet or in hexadecimal format. They may also be specified 
according to their common English names (e.g., 'red', 'PaleGoldenrod').

## See also

The `font` property can be set as a <a href="/support/json/top-level-properties">top 
level property</a>, but can also be used in various content blocks, like
<a href="/support/json/block-text">text blocks</a>, 
<a href="/support/json/block-link">link blocks</a> and
<a href="/support/json/block-button">button blocks</a>. Other style
related properties are for example the 
<a href="/support/json/property-background">property `background`</a> and
the <a href="/support/json/property-css">`css` property</a>.

