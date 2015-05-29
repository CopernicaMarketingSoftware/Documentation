# Property `rewrite`

The `rewrite` property is one of a special kind. It allows you to define 
specific rules to overwrite content set in the input JSON. When the
email is generated, the mail is scanned for certain matches, and the
replacement code is inserted instead.

Currently the API only allows you to specify rewrite rules for hyperlinks, but more options will 
be added as this API is under constant developement. 

<table class="info">
    <thead>
        <tr>
            <td colspan="3">Rewrite</td>
        </tr>
    </thead>
    <tbody>
        <tr class="thead">
            <td>Property</td>
            <td>Value</td>
            <td>Desc.</td>
        </tr>
        <tr>
            <td><a href="/support/json/property-rewrite-links">links</a></td>
            <td><em>object</em></td>
            <td>Specify links that should be rewritten. </td>
        </tr>
    </tbody>
</table>

## Where to use?

The `rewrite` property can be set as a <a href="/support/json/top-level-properties">top
level property</a>. If you use it in the root of the JSON document, the rewrite
rules will be applied to all content and all blocks in the mail.

You can also use the `rewrite` property inside specific blocks, for example
inside a <a href="/support/json/block-html">HTML block</a>, 
<a href="/support/json/block-link">link block</a> or a 
<a href="/support/json/block-button">button block</a>. In that case the 
rewrite rules will only be applied on the block it was used in.
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
