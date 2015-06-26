# Property `params`

When you are sending commercial emails, you might want to add tracking variables to your links,
or include custom query strings, for instance to prefill a webform on your landing page with subscriber
details. The API allows you to add any of these, on every level, using the link property `params`. This 
property accepts another object, containing the names and values of the URL parameters to be added.


````javascript
    {
        "subject" : "link example",
        "from" : "info@example.com",
        "content" : {
            "blocks" : [ {
                "type" : "button",
                "label" : "Click me!",
                "link" : {
                    "url" : "http://www.example.com",
                    "params" : {
                        "utm_source"    : "responsiveemail.com",
                        "utm_medium"    : "email",
                        "utm_term"      : "shoes+cars+ducks",
                        "utm_content"   : "textlink",
                        "utm_campaign"  : "winter-campaign"
                    }
                }
            } ]
        }
    }
````


The responsive email API ensures that all the supplied parameters are
encoded and appended to the URL, split by `&` ampersands.

