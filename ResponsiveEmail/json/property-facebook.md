# Property `facebook`

The property `facebook` allows you to set the required facebook app's properties `appid` and `redirect_uri`. 
The property value should be a nested JSON object. 
The following table lists all its sub-properties:

## Facebook properties

| Property | Value | Description                                     |
|:---------|-------|-------------------------------------------------|
| appid | _string_ | The required ID of an application registered in Facebook.  |
| redirect_uri | _string_ | The URL to redirect to after a person clicks a button on the dialog. Required when using URL redirection.    |
 
## Example

The following input JSON shows a facebook basic usage in a share block:

```javascript
{
    "from" : "info@example.com",
    "subject" : "Email with share blocks",
    "content" : {
        "blocks" : [ {
            "type"      : "share",
            "label"     : "Tell your friends about us!",
            "align"     : "left",
            "icon"      : {
                "type"      : "rounded",
                "size"      : 32
            },
            "link"      : {
                "url"       : "https://responsiveemail.com/",
                "title"     : "Post title"
            },
            "description"   : "Optional prefilled text to share",
            "platforms" : ["facebook"],
            "facebook"  : {
                "appid"        :   "123456789101112",
                "redirect_uri" :   "https://www.copernica.com"
            }
        } ]
    }
}
```

For more information and more examples, please check the documentation of the `share` block.
