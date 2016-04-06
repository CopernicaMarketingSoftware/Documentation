# Property `title`

The `title` property nested inside a [`link`](json/property-link)
object allows you to provide a description of the link. Usually the link title 
appears when the user hovers the link. 


```javascript
{
    "subject" : "link example",
    "from" : "info@example.com",
    "content" : {
        "blocks" : [ {
            "type" : "button",
            "label" : "Click me",
            "link" : {
                "url" : "http://www.dustsckr2000.com/models/P2000",
                "title": "Yes, you can click me"
            }
        } ]
    }
}
```
