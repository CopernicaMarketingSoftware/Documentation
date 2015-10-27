# Property `platforms`

The property `platforms` accepts a JSON array, with a comma seperated list with 
JSON objects, containing the actual `platforms` inside the `follow` block.
Each platform json block inside the `platforms` can have the following sub-properties:


## Platform json block sub-properties

| Property | Value | Description                                                                                                                                       |
|:---------|-------|---------------------------------------------------------------------------------------------------------------------------------------------------|
| name | _string_ | The name of the platform.  |
| [link](copernica-docs:ResponsiveEmail/json/property-link) | _object_ | Contains the `url` to follow for this platform.                                            |

| Platforms |         |         |         |         |         |         |         |         |
|:---------|---------|---------|---------|---------|---------|---------|---------|---------|
| addthis | bing | drupal | formspring | icq | myspace1 | share | tripadvisor | wordpress |
| amazon | blogger | envato | forrst | imdb | myspace2 | skype | tumblr | xbox |
| android | chrome | etsy | friendfeed | instagram | newsvine | snapchat | twitter | xing |
| aol | delicious | evernote | getpocket | lastfm | overflow | soundcloud | twitter2 | yahoo |
| apple | deviantart | facebook | github2 | linkedin | paypal | squidoo | viber | yelp |
| appstore | digg | fav | googleplus | livejournal | photobucket | steam | vimeo | youtube |
| ask | diigo | feed | google | mail | picasa | store | whatsapp | youtube2 |
| badoo | dribbble | feedburner | google2 | messenger | pinterest | stumbleupon | wikipedia | zoosk |
| bebo | drive | fiverr | hi5 | metacafe | quora | techcrunch | windows | zootool |
| behance | dropbox | flickr | html5 | msn | reddit | technorati | windows8 | zynga |

## Example usage

The following input JSON shows how to set platforms in a follow block. This is
the basic usage, showing a set of follow buttons.

```javascript
{
    "from" : "info@example.com",
    "subject" : "Email with a follow block",
    "content" : {
        "blocks" : [ {
            "type"      : "follow",
            "label"     : "Follow us!",
            "align"     : "left",
            "icon"      : {
                "type"      : "rounded",
                "size"      : 32
            },
            "platforms" : [ {
                "name"  :   "facebook",
                "link"      : {
                    "url"       : "https://facebook.com/copernica"
                },
            },
            {
                "name"  :   "twitter",
                "link"      : {
                    "url"       : "https://twitter.com/copernica"
                },
            } ]
        } ]
    }
}
```
