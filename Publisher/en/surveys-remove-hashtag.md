# Surveys: Removing leading number sign

By default, at each survey question a number sign (\#) is displayed. You
can remove this sign by modifying its default [XSLT](./css-and-xslt) 
(which determines the style of the survey) a little:

Go to the **Style** menu and open a new XSLT or an existing XSLT. Find the 
following line:

`<div class="number">#<xsl:value-of select="number"/></div>`

Remove the \# (or replace it with something else):

`<div class="number"><xsl:value-of select="number"/></div>`

Store the XSLT, and make sure you refer to the XSLT.

## More information

* [Surveys](./surveys)
* [Stylesheets](./stylesheets.md)
* [CSS and XSLT](./css-and-xslt)
