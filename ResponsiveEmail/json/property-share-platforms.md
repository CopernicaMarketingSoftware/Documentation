# Property `platforms`

The property `platforms` accepts a JSON array, with a comma seperated list with 
JSON objects, containing the actual `platforms` inside the `share` block.
Each platform json block inside the `platforms` can have different sub-properties.
Below are listed the specific ones for each social media: 

## Facebook

| Property | Value | Description                                                                                                                                       |
|:---------|-------|---------------------------------------------------------------------------------------------------------------------------------------------------|                                          |
| name | "facebook" | The name of the social media.                                             |
| appid | _string_ | The appid of the social platform. If not specified, this field is automatically gets the value of the Copernica Marketing Software appid (optional).           |
| caption | _string_ | The caption of the link (appears beneath the link name). If not specified, this field is automatically populated with the URL of the link. (optional).                       |
| description | _string_ | The post description (optional). If not specified, this field is automatically populated by information scraped from the link, typically the title of the page.                       |
| picture | _string_ | The post image.                       |

## LinkedIn

| Property | Value | Description                                                                                                                                       |
|:---------|-------|---------------------------------------------------------------------------------------------------------------------------------------------------|                                          |
| name | "linkedin" | The name of the social media.                                             |
| title | _string_ | The post title.                       |
| description | _string_ | The post description.                       |

## Twitter

| Property | Value | Description                                                                                                                                       |
|:---------|-------|---------------------------------------------------------------------------------------------------------------------------------------------------|                                          |
| name | "twitter" | The name of the social media.                                             |
| description | _string_ | The prefilled text to tweet (optional).                       |
| hashtags | _array_ | The hashtags which apply to the tweet.                       |
| via | _string_ | The provider/source of the post.                       |

## GooglePlus

| Property | Value | Description                                                                                                                                       |
|:---------|-------|---------------------------------------------------------------------------------------------------------------------------------------------------|                                          |
| name | "googleplus" | The name of the social media.                                             |

## WindowsLive

| Property | Value | Description                                                                                                                                       |
|:---------|-------|---------------------------------------------------------------------------------------------------------------------------------------------------|                                          |
| name | "windowslive" | The name of the social media.                                             |
| title | _string_ | The post title.                       |
| description | _string_ | The post description.                       |

## Tumblr

| Property | Value | Description                                                                                                                                       |
|:---------|-------|---------------------------------------------------------------------------------------------------------------------------------------------------|                                          |
| name | "tumbler" | The name of the social media.                                             |
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
                "platform"     :   "facebook",
                "name"         :   "facebook",
                "appid"        :   "1234",
                "caption"      :   "Post title",
                "description"  :   "Post description",
                "picture"      :   "http://www.copernica.com/images/somecustomimage.png"
            },
            {
                "platform"     :   "linkedin",
                "name"         :   "linkedin",
                "title"        :   "Post title",
                "description"  :   "Post description",
            },
            {
                "platform"     :   "twitter",
                "name"         :   "twitter",
                "description"  :   "Optional prefilled text to tweet",
                "hashtags"     :   ["responsive","email","copernica"],
                "via"          :   "ResponsiveEmail",
            },
            {
                "platform"     :   "googleplus",
                "name"         :   "googleplus",
            },
            {
                "platform"     :   "windows",
                "name"         :   "windowslive",
                "title"        :   "Post title",
                "description"  :   "Post description",
            },
            {
                "platform"     :   "tumblr",
                "name"         :   "tumbler",
                "title"        :   "Post title",
                "description"  :   "Post description",
            },
            {
                "platform"     :   "delicious",
                "name"         :   "delicious",
                "title"        :   "Post title",
                "provider"     :   "Optional, company name",
            },
            {
                "platform"     :   "reddit",
                "name"         :   "reddit",
                "title"        :   "Post title",
            },]
        } ]
    }
}
```
