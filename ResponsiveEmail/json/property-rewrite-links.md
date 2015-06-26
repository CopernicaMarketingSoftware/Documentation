# Property `links`

Inside the [`rewrite`](/copernica-docs:ResponsiveEmail/json/property-rewrite)
property, you can set the nested `links` property to tell the 
Responsive Email API how you would like to rewrite hyperlinks
that appear in the mail.

The `links` property is a JSON object, with regular expressions as its 
keys, and rewritten urls as its value. Say, you want to include an URL parameter 
to all your links in the email, except links with the hostname
`example.org`. You can of course do this when you create the JSON, but
you can also ask the Responsive Email API to do this for you.

The example below shows how you append each link in your document with `?utm_medium=apple`, 
except for links with hostname `example.org`, just by including a `links` block (so the API 
knows that the rules should be applied to hyperlinks only), followed by a new JSON object 
holding the rewrite rule.


````json
    {
        "name" : "template13",
        "subject" : "This email has links",
        "rewrite": {
            "links": {
                ".*" : {
                    "params": {
                        "utm_medium" : "apple"
                    }
                },
                "^example.org" : {
                    "params" : {
                        "utm_medium" : "apple"
                    }
                }
            }
        }
    }
````


As you can see the first rule states that all links should be affected (`*.`
is the regular expression that matches everything). The second rule `^example.org` states 
that all links with hostname `example.org` should be left alone.  

## The rewrite object

In the above example, we only give an example on how to add parameters
to the hyperlinks. There are more properties to be set:

| Rewrite rule properties |
| --- |
| Property | Value | Desc. |
| params | _object_ | Parameters to be added to matching urls |
| protocol | _string_ | Protocol to change |


