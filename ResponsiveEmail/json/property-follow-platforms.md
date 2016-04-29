# Property `platforms`

The property `platforms` is a JSON object, which contains the names of all
platforms we should be displaying in the `follow` block and their corresponding
values. This values are the urls to follow. In case of facebook, twitter,
linkedin and googleplus you can also provide a username instead of url, and
we will create a url from it.
 
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
                "reddit"   :  "https://reddit.com/user/reddit"
            },
        } ]
    }
}
```

### Supported platform names:

* addthis
* amazon
* android
* aol
* apple
* appstore
* ask
* badoo
* bebo
* behance
* bing
* blogger
* chrome
* delicious
* deviantart
* digg
* diigo
* dribbble
* drive
* dropbox
* drupal
* envato
* etsy
* evernote
* facebook
* fav
* feed
* feedburner
* fiverr
* flickr
* formspring
* forrst
* friendfeed
* getpocket
* github2
* google
* google2
* googleplus
* hi5
* html5
* icq
* imdb
* instagram
* lastfm
* linkedin
* livejournal
* mail
* messenger
* metacafe
* msn
* myspace1
* myspace2
* newsvine
* overflow
* paypal
* photobucket
* picasa
* pinterest
* quora
* reddit
* share
* skype
* snapchat
* soundcloud
* squidoo
* steam
* store
* stumbleupon
* techcrunch
* technorati
* tripadvisor
* tumblr
* twitter
* twitter2
* viber
* vimeo
* whatsapp
* wikipedia
* windows
* windows8
* wordpress
* xbox
* xing
* yahoo
* yelp
* youtube
* youtube2
* zoosk
* zootool
* zynga

For more information and more examples, please check the documentation of the
`follow` block.
