To publish a web form created under Content on a web page, you use the
tag {webform}.

Web forms made in Content are published using a special tag. In the tag
you refer to the name of the web form.

`{webform name='nameofwebform'}`

### Web form and XSLT

The webform function has an extra option to use a different XSLT:
**xslt=**\

By omitting this option, the system will automatically fallback on the
default XSLT provided in the marketing software.

**{webform name='name' xslt='namexslt'}**

where **namexslt** is the name of the XSLT created under Style in the
marketing software.

**{webform name='name' xslt='addressxslt'}**

where **addressxslt** refers to the online location of the XSLT.
