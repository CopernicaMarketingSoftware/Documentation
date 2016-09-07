Dynamic content is content that varies within your marketing campaigns
based on information from a database like specific client data.

Copernica offers you several ways to use dynamic content within your
marketing campaigns. For example, you can use [Smarty tags](./smarty.md) to adjust
conditional content blocks within your emailings.

Set conditional content blocks
------------------------------

Thanks to the use of Smarty tags you can also use contact data as
conditions when displaying certain content. This can be done with the
help of the 'if-then'-statements: {if} and {else}. You always use { }
and \$, completed with some extra code.

*For example:*\
 {if \$fieldname==”thisvalue”}show this text{else}if not, show this
text{/if}\
 This states: IF field X contains the value Y, THEN, show this text,
ELSE, show this text, END of the command.

Use content feeds as dynamic content
------------------------------------

Create dynamic content for your emailings or web pages by using [content
feeds](http://www.copernica.com/en/features/web-pages/rss-or-atom-feed).
Within Copernica you have the possibility of creating and composing your
own feeds but you can also use external content feeds as an addition to
your marketing campaigns.
