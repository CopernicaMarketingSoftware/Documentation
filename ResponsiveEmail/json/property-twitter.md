# Property `twitter`

The `twitter` property is optional and is created only if twitter is selected as platform in the share block
and a `hashtags` or `via` value is added to twitter. The property value should be a nested JSON object. The following table lists all its sub-properties:

## Twitter sub-properties

| Property | Value | Description                                     |
|:---------|-------|-------------------------------------------------|
| hashtags | _array_ | An optional comma-separated list of hashtag values (without the preceding # character), which allows easy discovery of Tweets by topic.  |
| via | _string_ | An optional Twitter username to associate with the Tweet, such as your site's Twitter account. The provided username will be appended to the end of the Tweet with the text "via @username".    |
 
## Example

The following input JSON shows a twitter basic usage in a share block:

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
            "platforms" : ["twitter"],
            "twitter"  : {
                "hashtags"     :   ["responsive", "email", "copernica"],
                "via"          :   "ResponsiveEmail",
            }
        } ]
    }
}
```

For more information and more examples, please check the documentation of the `share` block.
