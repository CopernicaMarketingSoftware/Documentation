# Property `container` 

All blocks, whether they are text blocks, image blocks or blocks of any of the other supported types,
are wrapped by the responsive API in table `<td>` elements. In normal circumstances,
you do not have to make any changes to such a `<td>` element, but if you 
insist, the responsive API allows you to access this element via the `container`
property.

The `container` property is an advanced nested property inside each block, and can be
used to change the styling or even the attributes of the `<td>`. The `container` 
property accepts a JSON object with optional nested
[`css`](/support/json/property-css) and [`attributes`](/support/json/property-attributes)
sub properties. The `css` and `attributes` in turn also accept JSON blocks containing the 
CSS properties or element attributes you want to add to the container. 

| Container properties |
| --- |
| Property | Value | Description |
| [css](/support/json/property-css) | _object_ | Add custom css to the container element |
| [attributes](/support/json/property-attributes) | _object_ | Add custom HTML attributes to the container element |

## Example

Every property that you set in the container `css` property will be
appended to the inline `style` attribute of the ```<td>``` tag. And every `attributes`
property will be set as attribute of the ```<td>``` tag. Consider the following JSON 
example of a button block:


````json
    {
        "from" : "info@example.com",
        "subject" : "Example container modification",
        "content" : {
            "blocks" : [ {
                "type" : "button",
                "label" : "Responsive",
                "link" : {
                    "url" : "https://responsiveemail.com",
                    "title" : "Go to website"
                },
                "container" : {
                    "css" : {
                        "padding" : "20em",
                        "margin" : "2px"
                    },
                    "attributes" {
                        "summary" : "This summary is applied to the parent"
                    }
                }
            } ]
        }
    }
````

**This would result in the following pseudo HTML**

(for the sake of readability, we omitted the default button styling in this example)


````html
    <td style="padding: 20em; margin: 2px" summary="This summary is applied to the parent">
        <table>
            <tr>
                <td>
                    Responsive
                </td>
            </tr>
        </table>
    </td>
````


## Why are table cells used, and not just divs?

The `container` property allows you to specify custom CSS and attributes for 
the parent element, which always is a ```<td>``` tag. Of course, we've all learned
to use tables for displaying tabular data, and use ```<div>``` tags to build the lay-out of 
an HTML design. Not so true with emails! 

When building an email lay-out, you have to deal with all sorts of primitive and broken
email clients that are not so good at displaying HTML and CSS,
and with email clients that strip out stylesheets before the email
is rendered. Worst of them all: Gmail (true fact!). One of the many downsides of this 
whole thing is that having your HTML designs built using divs and floats will make it 
look like a scrambled egg in almost every email client. Especially in Gmail. 

To overcome such problems, email layouts use nested oldschool
HTML ```<table>``` tags, just like websites did in the 90's. Blocks are not
implemented as ```<div>``` elements, as you would expect, but
```<td>``` tags. An image block, for example, creates
an ```<img>``` tag, and puts that inside a ```<td>``` cell. And this is what the 
`container` property inside the JSON block input gives you access to. It allows you 
to access and modify the `<td>` tag.

## Why you should avoid using these properties

We discourage the use of the `container` property. We wrote
the responsive email API to put an end to all the internal difficulties of building responsive
emails. In our opinion, users of the API do not have to deal with specific CSS settings,
or with the fact that HTML tables are used. With the responsive email
API you can be sure of the fact that any input JSON is turned into a
valid responsive email.

The `container` property completely bypasses this fundamental design
principle: the properties are blindly copied from the JSON
into the responsive email without any validation. If done wrongly, this
could harm your email.