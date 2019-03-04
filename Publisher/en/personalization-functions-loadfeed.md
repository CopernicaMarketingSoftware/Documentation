# Personalization functions: loadfeed

With the loadfeed function you can simply load feeds in your emails
or webdocument. It's possible to load in a feed you've made in the
content section or just a feed that's curated and hosted somewhere else.

## Syntax and use


You can load a feed in from the *content* section, just like this:
`{loadfeed feed='id of the feed'}`

Replace the *id of the feed* with the actual feed ID. To find this ID, 
navigate the the Content section within Copernica and hover with your mouse
on top of the feed that you want to use. You will see for example *Feed #123*.
In this example 123 would be the ID to use. 

## Load in external feeds


Of course it's also possible to publish external RSS and atom feeds
in your documents: 

`{loadfeed feed='http://www.example.com/feed/feed.xml'}`

Substitute *loadfeed feed='http://www.example.com/feed/feed.xml*
with the address (URL) that has been publicized somewhere else.

![](../images/loadfeed1.png)

*Image: Load feed tag in the text block rich text editor*


## Extra options


The loadfeed has additional properties, like xlst for example.
You can use *xlst=* to get yourself an own XLST (and use it for 
your feed). The default option relies on the standardized XSLT, 
which comes with the software.

`{loadfeed feed='name' xlst='name of xlst'}`

Substitute *name of xlst* with the name of the Style component in 
the MarketingSuite.

`{loadfeed feed='address' xlst='address from xlst'}`

Substitute *address from xlst* with the actual location of the XLST,
for example: 'http://example.com/feed.xsl'


## Selecting a feed in a text block


On top of all previous mentioned options, you can also publish a 
feed without having to remember the tag or name of the feed. In 
every text block there is a possibility to incorporate special
content such as: webforms, RSS and Atom feeds. When in a specific 
text block, specify the type of publication and select in the list
the preferred item. Optionally you could also choose a XLST. Note
that the publication substitutes the content that is already in
the text block.


![](../images/loadfeedfunction.png)


## Personalization in feeds

Feeds can also be personalized for the recipient using special personalization tags. However, in order for these tags to be parsed, you have to add some additional lines of code. Below, two ways of doing so are described.


## Personalization in hyperlinks

If you're only looking to personalize `<a href='this part'>...</a>` of anchor tags, all you have to do is set the personalizable parameter to 'true':

`{loadfeed feed=".." xslt=".." personalizable=true}`


## Further personalization

If you want to use the full power of personalization, you'll need another bit of code to parse everything:

```text
{capture assign="my_feed_content"}
    {loadfeed feed=".." xslt=".."}
{/capture}
{eval var=$my_feed_content}
```

Besides this, you only have to make sure your feed and XSLT are correct to make the personalization work.

With personalization in feeds, it is important to note the order in which tasks are completed by Copernica: first, the XSLT is parsed. The personalization tags are parsed after that. The `eval` function makes sure all personalization actually happens. This means that you cannot create a condition using `<xsl:if>` and a value from your database, simply because the XSLT does not know the value of the field at that point.

The possibilities are endless when it comes to personalization in  feeds, you just have to make sure your feed and XSLT are in order before parsing.

## More information

* [Personalization](./personalization)
* [Personalization functions](./personalization-functions)
