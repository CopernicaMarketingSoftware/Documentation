# Property `align`

The `align` property is used inside <a href="/support/json/block-image">image blocks</a>,
<a href="/support/json/block-video">video blocks</a> and
<a href="/support/json/block-link">link blocks</a>. With this property you can align the
image, video or link to the left (this is the default), to the center or to the right.

<table class="info">
    <thead>
        <tr><td colspan="3">Property values</td></tr>
    </thead>
    <tbody>
        <tr>
            <td>Value</td>
            <td>Description</td>
        </tr>
        <tr>
            <td>left</td>
            <td>Align element to the left</td>
        </tr>
        <tr>
            <td>center</td>
            <td>Align element to the center</td>
        </tr>
        <tr>
            <td>right</td>
            <td>Align element to the right</td>
        </tr>
    </tbody>
</table>
<pre><code>
    {
        "from" : "info@example.com",
        "subject" : "Email with a single image",
        "content" : {
            "blocks" : [ {
                "type" : "image",
                "src" : "https://responsiveemail.com/example.png",
                "alt" : "Example image",
                "align" : "center"
            } ]
        }
    }
</code></pre>
