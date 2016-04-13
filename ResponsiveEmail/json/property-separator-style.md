# Property `style`

The `style` property is a simple property inside [separator blocks](../json/block-separator)
used to set the style of the separator. You can for example create dashed, 
dotted, or solid separators. The default is "solid".

![](separator-style-options.png)

## Example

An example with a dashed separator.

```javascript
{
    "from" : "info@example.com",
    "subject" : "Email with a dashed separator",
    "content" : {
        "blocks" : [ 
            {
                "type" : "text",
                "content" : "First paragraph"
            }, 
            {
                "type" : "separator",
                "style" : "dashed"
            }, 
            {
                "type" : "text",
                "content" : "Second paragraph"
            } 
        ]
    }
}
```
