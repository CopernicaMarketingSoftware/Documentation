# Property `headers`

The ResponsiveEmail API supports many predefined properties to set MIME headers. These include properties like [`subject`](/copernica-docs:ResponsiveEmail/json/property-subject), [`to`](/copernica-docs:ResponsiveEmail/json/property-to) and [`reply-to`](/copernica-docs:ResponsiveEmail/json/property-reply-to). But if you want to set other headers in the header too, maybe even unofficial headers, you can do so by using the `headers` property.

## Example

To add a single '`x-my-header`' to the MIME of your responsive email, you
may include a `headers` property in the input JSON.


````javascript
    {
        "from"    : "info@example.com",
        "subject" : "This is the subject line",
        "headers" : {
            "x-my-header" : "my-value"
        }
    }
````


All the headers are directly copied from the input JSON into the responsive
email, without any validation.

## Warning!

If you use your own headers, we strongly advise to prefix
your headers with `x-`, as we have shown in the example above.
Prefixing with
`x-` is the official way to prevent that your custom headers conflict
with current or future official email headers.

## Related information

The `headers` property should be used for setting custom headers. For
the normal headers, better use one of the predefined properties, like
[`subject`](/copernica-docs:ResponsiveEmail/json/property-subject), [`from`](/copernica-docs:ResponsiveEmail/json/property-from), [`replyTo`](/copernica-docs:ResponsiveEmail/json/property-reply-to), [`to`](/copernica-docs:ResponsiveEmail/json/property-to), [`cc`](/copernica-docs:ResponsiveEmail/json/property-cc) and [`bcc`](/copernica-docs:ResponsiveEmail/json/property-bcc).