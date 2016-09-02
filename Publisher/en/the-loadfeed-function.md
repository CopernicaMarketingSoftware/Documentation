A feed is a summary of web content that is updated on a regular basis.
It allows you to keep your subscribers informed with the latest news
about your company, product or anything else. Copernica enables you to
create RSS and Atom feeds. The feeds you create are easily included in
your email document or web page when you use the special tag {loadfeed}.
The function allows you to include any feed made in Copernica and from
any online location.

### Syntax and usage

Publish a feed that is created under Content.

`{loadfeed feed='name'}`

Where '**name**' is the name of the feed created in the Content section
of the marketing software.

`{loadfeed feed='address'}`

Where address is the ([constructed](#)) address of the feed created
under content, or the address of a feed hosted on a different server.

![](../images/loadfeed1.png)

Load feed tag in the text block rich text editor

### Extra options

The loadfeed function has one optional parameter: **xslt=**

Without this parameter, the system will automatically fallback on the
[default XSLT](#) provided by the marketing software.

`{loadfeed feed='name' xslt='namexslt'}`

where '**namexslt**' is the name of the XSLT created under Style in the
marketing software.

`{loadfeed feed='address' xslt='addressxslt'}`

where '**addressxslt**' is the address of the XSLT hosted elsewhere.

### Load a feed in a text block without using the tag

The software allows you to load a feed (among other special content)
into a text block without needing to memorize the tag or the name of the
feed. In a text block, click on **Feed** in the lower special content
toolbar. Use the form to choose the feed and optionally a custom made
XSLT.

![](../images/loadfeedfunction.png)
