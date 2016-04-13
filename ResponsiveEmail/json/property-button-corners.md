# Property `corners`   

The `corners` property is a property inside [button blocks](../json/block-button) 
that adds rounded corners to a button. Currently you can choose from 3 values.

## Property values

| Value | Description                                                |
|:------|------------------------------------------------------------|
| default | Default button without rounded corners                   |
| radius | Adds subtle rounded corners                               |
| round | Adds obvious rounded corners for a 'pill-like' button look |

## Example
Add rounded corners to a button

```javascript
    {
        "from" : "info@example.com",
        "subject" : "Email with a single button",
        "content" : {
            "blocks" : [ {
                "type" : "button",
                "label" : "Button",
                "corners" : "radius",
                "link" : "http://www.example.com"
            } ]
        }
    }
```

## Output

![](example-output-button.png)
