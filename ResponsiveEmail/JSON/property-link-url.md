# Property `url`

Inside a [`link`](/copernica-docs:ResponsiveEmail/json/property-link) property,
you can assign an url. The link property `url` contains the actual link 
address of the link. Thus, the internet address the user is redirected 
to after clicking the link. 


````javascript
    {
        "subject" : "link example",
        "from" : "info@example.com",
        "content" : {
            "blocks" : [ {
                "type" : "button",
                "label" : "Click me",
                "link" : {
                    "url" : "http://www.dustsckr2000.com/models/P2000"
                }
            } ]
        }
    }
````
