# Web version

The web version offers a solution for recipients who cannot read HTML emails
in their email client. You can include a link to a web version in your email
document or [template](./templates) by using the `{$webversion}` tag. This tag is
automatically replaced by SMTPeter with a unique URL for each recipient.

To turn the resulting URL into a clickable link some HTML code is required:

```html
<a href="{$webversion}">View the web version</a>
```

For emails sent in JSON format, the tag can be included in the `url` property
of any `link` object. For example, inside a link block:

```json
{
    "type": "link",
    "label": "View the web version",
    "link": {
        "title": "View the web version",
        "url": "{$webversion}"
    }
}
```

By default, the web version is identical to the HTML version.
Emails sent in JSON format, however, optimize the generated HTML data for web.
