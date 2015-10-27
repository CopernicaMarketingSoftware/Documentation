# Property `platforms`

The property `platforms` accepts a JSON array, with a comma seperated list with 
JSON objects, containing the actual `platforms` inside the `share` block.
All supported platforms are described below: 

## Facebook

| Property | Value | Description                                                                                                                                       |
|:---------|-------|---------------------------------------------------------------------------------------------------------------------------------------------------|                                          |
| name | "facebook" | The name of the social media.                                             |
| appid | _string_ | The appid of the social platform. If not specified, this field automatically gets the value of the Copernica Marketing Software appid (optional).           |
| title | _string_ | The caption of the link (appears beneath the link name). If not specified, this field is automatically populated with the URL of the link. (optional).                       |
| description | _string_ | The post description. If not specified, this field is automatically populated by information scraped from the link, typically the title of the page (optional).                       |
| picture | _string_ | The URL of a picture attached to this post. The picture must be at least 200px by 200px (optional).                       |

## LinkedIn

| Property | Value | Description                                                                                                                                       |
|:---------|-------|---------------------------------------------------------------------------------------------------------------------------------------------------|                                          |
| name | "linkedin" | The name of the social media.                                             |
| title | _string_ | The title of the content being shared. Max length : 200 chars.                       |
| description | _string_ | The description of the content being shared. Max length : 256 chars.                       |

## Twitter

| Property | Value | Description                                                                                                                                       |
|:---------|-------|---------------------------------------------------------------------------------------------------------------------------------------------------|                                          |
| name | "twitter" | The name of the social media.                                             |
| description | _string_ | Pre-populated UTF-8 and URL-encoded Tweet text. Max length : 140 chars  (optional).                       |
| hashtags | _array_ | Allow easy discovery of Tweets by topic by including a comma-separated list of hashtag values without the preceding # character (optional).                       |
| via | _string_ | A Twitter username to associate with the Tweet, such as your site's Twitter account. The provided username will be appended to the end of the Tweet with the text "via @username" (optional).                       |

## GooglePlus

| Property | Value | Description                                                                                                                                       |
|:---------|-------|---------------------------------------------------------------------------------------------------------------------------------------------------|                                          |
| name | "googleplus" | The name of the social media.                                             |

## WindowsLive

| Property | Value | Description                                                                                                                                       |
|:---------|-------|---------------------------------------------------------------------------------------------------------------------------------------------------|                                          |
| name | "windows" | The name of the social media.                                             |
| title | _string_ | The post title.                       |
| description | _string_ | The post description.                       |

## Tumblr

| Property | Value | Description                                                                                                                                       |
|:---------|-------|---------------------------------------------------------------------------------------------------------------------------------------------------|                                          |
| name | "tumblr" | The name of the social media.                                             |
| title | _string_ | The post title.                       |
| description | _string_ | The post description.                       |

## Delicious

| Property | Value | Description                                                                                                                                       |
|:---------|-------|---------------------------------------------------------------------------------------------------------------------------------------------------|                                          |
| name | "delicious" | The name of the social media.                                             |
| title | _string_ | The post title.                       |
| provider | _string_ | The provider/source of the post (optional).                       |

## Reddit

| Property | Value | Description                                                                                                                                       |
|:---------|-------|---------------------------------------------------------------------------------------------------------------------------------------------------|                                          |
| name | "reddit" | The name of the social media.                                             |
| title | _string_ | The post title.                       |


## Example usage

The following input JSON shows how to set platforms in a share block. This is
the basic usage, showing a set of share buttons.

```javascript
{
    "from" : "info@example.com",
    "subject" : "Email with a share block",
    "content" : {
        "blocks" : [ {
            "type"      : "share",
            "label"     : "Share with friends!",
            "align"     : "left",
            "icon"      : {
                "type"      : "rounded",
                "size"      : 32
            },
            "link"      : {
                "url"       : "https://copernica.com/"
            },
            "platforms" : [ {
                "name"         :   "facebook",
                "appid"        :   "1234",
                "title"        :   "Post title",
                "description"  :   "Post description",
                "picture"      :   "http://www.copernica.com/images/somecustomimage.png"
            },
            {
                "name"         :   "linkedin",
                "title"        :   "Post title",
                "description"  :   "Post description",
            },
            {
                "name"         :   "twitter",
                "description"  :   "Optional prefilled text to tweet",
                "hashtags"     :   ["responsive","email","copernica"],
                "via"          :   "ResponsiveEmail",
            },
            {
                "name"         :   "googleplus",
            },
            {
                "name"         :   "windows",
                "title"        :   "Post title",
                "description"  :   "Post description",
            },
            {
                "name"         :   "tumblr",
                "title"        :   "Post title",
                "description"  :   "Post description",
            },
            {
                "name"         :   "delicious",
                "title"        :   "Post title",
                "provider"     :   "Optional, company name",
            },
            {
                "name"         :   "reddit",
                "title"        :   "Post title",
            },]
        } ]
    }
}
```
