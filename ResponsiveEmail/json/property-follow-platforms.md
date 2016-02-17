# Property `platforms`

The property `platforms` is used in the `follow` block and accepts a JSON object, which contains the platform name 
as key and the username/url to follow as value. Please note that you can provide username or url only for the 
facebook, twitter, linkedin and googleplus platforms. For all other platforms you can provide only a url.

### Supported platform names:

|          |         |         |         |         |         |         |         |         |
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
            "platforms" : {
                "facebook" :  "copernica",
                "twitter"  :  "https://twitter.com/copernica",
                "reddit"   :  "https://twitter.com/copernica"
            },
        } ]
    }
}
```

For more information and more examples, please check the documentation of the `follow` block.
