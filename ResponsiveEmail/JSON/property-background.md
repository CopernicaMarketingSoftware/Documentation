# Property `background`

The property `background` lets you set background related properties, and
can be used at many different levels inside the input JSON to set, for example, 
the background for a single block of content, for an column full of content
or for the entire template.

## Sub properties

The `background` property accepts a nested JSON object as value. Inside
this block you can use sub properties to set more specific properties.
At this specific moment however, only the sub property `color`
can be used.

<table class="info">
    <thead>
        <tr>
            <td colspan="3">Background properties</td>
        </tr>
    </thead>
    <tbody>
        <tr class="thead">
            <td>Property</td>
            <td>Value</td>
            <td>Description</td>
        </tr>
        <tr>
            <td>color</td>
            <td><em>string</em></td>
            <td>The background color</td>
        </tr>
    </tbody>
</table>

Colors may be specified as an RGB triplet or in hexadecimal format. They 
may also be specified according to their common English names (e.g., 'red', 
'PaleGoldenrod').

## Where to use?

The `background` property can be used at almost every level in the input
JSON. If you use it as a <a href="/support/json/top-level-properties">top
level property</a>, its value will be used as the background for the entire template.
Inside the <a href="/support/json/property-content">content section</a> it
holds the background of the centered content, and inside a block
you can use it to set the background color for just a single block.

## Example

Here is an example with the background property used in many different
places.
````json
    {
        "from" : "info@example.com",
        "subject" : "Email with many different background colors",
        "background" : {
            "color" : "gray"
        },
        "content" : {
            "background" : {
                "color" : "yellow"
            },
            "blocks" : [ {
                "type" : "text",
                "content" : "This is a the opening paragraph of text"
            }, {
                "type" : "button",
                "label" : "Click me!",
                "background" : {
                    "color" : "white"
                }
            }, {
                "type" : "text",
                "content" : "This is the closing paragraph of text"
            } ]
        }
    }
````
The above input JSON will result in an email with a gray background. Inside
that email, there is a centered content section with a yellow background.
Inside that content section a button is displayed with a piece of text
above it, and a piece of text below it. The button will be displayed on
a white background, while no specific background is set for both the texts, 
which implies that the texts are shown on the same yellow background used for 
the entire content section.

