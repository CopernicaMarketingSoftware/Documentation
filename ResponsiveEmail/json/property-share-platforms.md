# Property `platforms`

The property `platforms` accepts a JSON array, with a comma seperated list with 
JSON objects, containing the actual `platforms` inside the `share` block.
Each platform json block inside the `platforms` can have different sub-properties.
Below are listed the specific ones for each social media: 

## Facebook

| Property | Value | Description                                                                                                                                       |
|:---------|-------|---------------------------------------------------------------------------------------------------------------------------------------------------|                                          |
| name | "facebook" | The name of the social media.                                             |
| appid | _string_ | The appid of the social platform. If not set - get the value of the Copernica Marketing Software appid (optional).           |
| title | _string_ | The post title (optional).                       |
| description | _string_ | The post description (optional).                       |
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
            "platforms" : [ {
                "platform"    : "facebook",
                "name"        : "facebook",
                "appid"       : "facebook",
                "title"       : "facebook",
                "description" : "facebook",
                "picture"     : "facebook"
            },
            {
                "platform"  :   "twitter",
                "link"      : {
                    "url"       : "https://twitter.com/copernica"
                },
                "img": {
                    "src": "http://www.images.com/twitter.png",
                    "alt": "twitter"
                }
            } ]
        } ]
    }
}
```
