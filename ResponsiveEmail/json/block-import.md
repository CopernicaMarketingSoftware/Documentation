# Import blocks

Import blocks provide the possibility to import a piece of json from an external
source and use this json as input for other new blocks, essentially allowing you
to dynamically generate blocks.

```javascript
{
    "from" : "info@example.com",
    "subject" : "Email with an import block",
    "content" : {
        "blocks" : [ {
            "type" : "import",
            "url" : "https://www.responsiveemail.com//headers/heading1.json"
        } ]
    }
}
```

The only - obviously - required option for this block is of course the `url`
property. This property must point to the URI of a valid JSON object.

The following properties are supported:

## Import block properties

| Property | Value | Description                                                                                  |
|:---------|-------|----------------------------------------------------------------------------------------------|
| type | "import" | Identifies the block as a import block.                                                       |
| [url](ResponsiveEmail/json/property-url) | _string_ | The source URI of the JSON to import       |
