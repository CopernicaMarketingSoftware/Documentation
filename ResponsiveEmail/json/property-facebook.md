# Property `facebook`

When facebook is selected as platform in the share block, the `facebook` property is automatically created and prefilled with the ResponsiveEmail `appid` and `redirect_uri`, so you don't need to configure it by yourself. If you still want to use your personal `appid` or `redirect_uri` in the share block for facebook, you can configure the JSON. The property value should be a nested JSON object. The following table lists all its sub-properties:

## Facebook sub-properties

| Property | Value | Description                                     |
|:---------|-------|-------------------------------------------------|
| [appid](https://developers.facebook.com/apps/) | _string_ | The required ID of a Facebook app. By default, this field automatically gets the value of the ResponsiveEmail appid.  |
| redirect_uri | _string_ | The required URL to redirect to after a person clicks the app link on the dialog. By default, this field automatically gets the value of the ResponsiveEmail website.   |
 
## Example

The following input JSON shows a facebook basic usage in a share block:

```javascript
{
    "from" : "info@example.com",
    "subject" : "Email with a share block",
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
                "appid"        :   "0123456789",
                "redirect_uri" :   "https://www.responsiveemail.com"
            }
        } ]
    }
}
```

For more information and more examples, please check the documentation of the `share` block.
