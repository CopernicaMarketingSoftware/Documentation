Surveys created in Content can be easily published on your web page by
using a special tag.

To add a survey as content to a web page use:

> `{survey name='name'}`

### Survey with custom XSLT

Optionally you can use your own XSLT for the survey. To make the survey
work with the XSLT you use the extra option **xslt=**

XSLT is used to transform an XML document into another type of document
that is recognized by a browser, like HTML. Using your own XSLT, you
have total freedom to change the appearance of the survey. When the xslt
option is not provided, the the system will automatically fallback on
the default XSLT.

> `{survey name='name' xslt='namexslt'}`

where **namexslt**is the name of the XSLT created under **Style**in the
marketing software.

> `{survey name='name' xslt='addressxslt'}`

where **addressxslt**is the address of the XSLT hosted elsewhere.
