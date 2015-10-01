# Hyperlinks

Most emails have hyperlinks. This article addresses all the ins and outs of 
hyperlinks in your emails processed by the Responsive Email API.

## Link properties

The are various block types that have the `link` property, such as the `button` 
and `link` block. The `link` property accepts a JSON object, containing 
the properties of the links. See table below.

### Link

| Property | Value | Desc.                                        |
|:---------|-------|----------------------------------------------|
| link | _object_ | Object with link properties. See table below. |

### Link properties

| Property | Value | Desc.                                                              |
|:---------|-------|--------------------------------------------------------------------|
| url | _string_ | The online location where user is redirected to.                     |
| title | _string_ | The link title / description.                                      |
| params | _object_ | Add or overwrite URL query strings, presented as a key-value pair |

### Absolute and relative links

Emails can contain absolute links and relative links. Absolute links in an email 
start with an internet protocol (e.g. http://) and refer to an external location, 
for instance to somewhere on your server. Relative links in emails usually are 
internal anchors (to create a table of contents) or `mailto:` links.

Relative links in your JSON document are ignored by the JSON parser, because 
tracking of those links is impossible. This doesn't mean of course that you 
cannot use them.

### Links pointing to files

You may sometimes find yourself in the situation that you have the uncontrollable 
urge to directly link to -for instance- a PDF file. The API totally accepts these 
kind of links and will treat them like normal absolute links. For your own 
deliverabilities sake, make sure to link to 'save' files only, as email clients 
may block links pointing to executables and other files that could carry 
~~ebola~~ a virus.

When directly linking to a file, it is good practice to mention this fact, and 
the size of the file, e.g., `Download PDF (300kb)`

### Link text

If a link text looks like a link, but the link itself points to a different 
address, email clients may block your email or obscure the link. Don't do the 
following:

```txt
<a href="http://www.google.nl">http://altavista.com</a>
```

## Link tracking and URL parameters

When you are sending commercial emails, you might want to add tracking variables 
to your links, or include custom query strings, for instance to prefill a webform 
on your landing page with subscriber details. The API allows you to add any of 
these, on every level.

### Add link parameters on toplevel

Link parameters can be specified on toplevel, meaning that the parameters will 
be added as a query string to every link in the document. Of course it is also 
possible to add these params to specific links only or to overwrite these 
parameters on block level. But more on this later.

`params` are set inside a _rewrite rule_,, the `links` property and then `rewrite` 
property. Take a look at this example:

```json
{
    "name" : "some template", 
    "rewrite" : {
        "links" : {
            "*.json.com" : {
                "params" : {
                    "apple" : "banananana"
                }
            }
        }
    }
}
```

The above JSON will return all links with hostname `json.com` appended with 
`&apple=bananana`

As illustrated in the example below, you can make use of truncation or even 
regular expressions for your rewrite rules to target links in more detail.

Example of link parameters added on toplevel in the JSON document:

```json
{
    "name" : "template13",
    "subject" : "This email has links",
    "rewrite": {
        "links": {
            ".*" : {
                "params": {
                    "fruit" : "apple"
                }
            },
            "*.altavista" : {
                "params" : {
                    "city" :  "Haarlem"
                }
            },
            "^example.org" : {
                "params" : {
                    "toilet seat" : "red",
                    "fruit" : "apple"
                }
            }
        }
    }
}
```

The JSON above will result in the following links:

```txt
http://www.google.com?fruit=apple

http://www.altavista.com?fruit=apple&city=Haarlem
    
http://www.example.org
```


### Specify URL parameters on block level

URL parameters can also be specified at the block that contains the link, simply 
by adding the property `param` to the `link` property. This property `param` 
holds another JSON block that allows you to specify the parameters for this link 
specific.

When the same URL parameter already exists on top-level, the top-level version 
will be overwritten by the one that was specified at the link.

**Example custom query strings on block level:**

A short example will again show its working:

```json
{
    "type" : "button",
    "label" : "Buy large teapot",
    "link" : {
        "url" : "http://thegiantteapot.com?a=b",
        "title" : "Proof that it doesn't exist",
        "params" : {
            "type" : "nonbelieber"
        }
    }
}
```

The output of the example below would look as follows:

```txt
http://thegiantteapot.com?a=b&type=nonbelieber
```

As you can see from the example, the API is totally cool with you including URL 
parameters in both the `url` property and in the property `params`. The API will 
not get angry and just do what you requested.

### URL parameters in text blocks

Because a text block may of course contain multiple hyperlinks, the property 
`params` is also available in text blocks, as shown in the example below:

```json
{
    "type" : "text",
    "rewrite" : {
        "links" : {
            "*.json.com" : {
                "params" : {
                    "apple" : "banananana"
                }
            }
        }
    }
}
```

### Google link tracking

It is possible to add Google tracking code to each link in your email document. 
Because Google uses normal URL parameters, it works exactly the same as including 
normal URL parameters.

Example:

```javascript
{
    "name" : "myFirstTemplate",
    "subject" : "hope you don't bother this email",
    "rewrite" : {
        "links" : {
            "*.json.com" : {
                "params" : {
                    "utm_source"    : "responsiveemail.com",
                    "utm_medium"    : "email",
                    "utm_term"      : "shoes+cars+ducks",
                    "utm_content"   : "textlink",
                    "utm_campaign"  : "winter-campaign"
                }
            }
        }
    }
}
```

### Google tracking on specific links

Some of the Google variables are normally added to each link in an email, while 
others can differ per link in the same email.

Example, in a commercial email, the tracking variable `utm_medium` would obviously 
be `email` for all links in your email. The variable `content` on the other hand, 
may differ per link, as this variable is often included to find out how the same 
link scores in different versions of an email (for instance in an A/B test or split run).

You can use the same methods of defining specific values for different links 
using the methods described for normal (custom) URL parameters.

Example of specific Google link tracking in a button block:

```json
{
    "type" : "button",
    "label" : "Buy large teapot",
    "link" : {
        "url" : "http://thegiantteapot.com",
        "title" : "Proof that it doesn't exist",
        "params" : {
            "utm_content" : "CTA-A"
        }
    }
}
```
