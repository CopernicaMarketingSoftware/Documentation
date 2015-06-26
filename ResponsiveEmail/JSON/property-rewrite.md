# Property `rewrite`

The `rewrite` property is one of a special kind. It allows you to define 
specific rules to overwrite content set in the input JSON. When the
email is generated, the mail is scanned for certain matches, and the
replacement code is inserted instead.

Currently the API only allows you to specify rewrite rules for hyperlinks, but more options will 
be added as this API is under constant developement. 

| Rewrite |
| --- |
| Property | Value | Desc. |
| [links](/support/json/property-rewrite-links) | _object_ | Specify links that should be rewritten. |


## Where to use?

The `rewrite` property can be set as a [top level property](/support/json/top-level-properties). If you use it in the root of the JSON document, the rewrite rules will be applied to all content and all blocks in the mail. You can also use the `rewrite` property inside specific blocks, for example inside a [HTML block](/support/json/block-html), [link block](/support/json/block-link) or a [button block](/support/json/block-button). In that case the rewrite rules will only be applied on the block it was used in.


````json
    {
        "name" : "template13",
        "subject" : "This email has links",
        "content" : {
            "blocks" : [ {
                "type" : "html",
                "content" : "Content with <a href="http://www.example.com">hyperlinks</a>"
            } ]
        },
        "rewrite": {
            "links": {
                ".*" : {
                    "params": {
                        "utm_medium" : "apple"
                    }
                }
            }
        }
    }
````
