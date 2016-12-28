# Webversion

The webversion offers a solution for recipients who cannot read HTML emails
in their email client. You can include a link to a webversion in your email
document or template by using the `{$webversion}` tag.

The tag generates a unique URL for each recipient. To turn this URL into a
clickable link some HTML code is required:

```html
<a href="{webversion}">View the webversion</a>
```

For emails sent in JSON format, the `{$webversion}` tag can be included in a link block:

```json
{
    "type": "link",
    "label": "View the webversion",
    "link": {
        "title": "View the webversion",
        "url": "{$webversion}"
    }
}
```
