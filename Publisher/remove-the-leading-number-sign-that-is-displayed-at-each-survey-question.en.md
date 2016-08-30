Remove the leading number sign that is displayed at each survey question

By default, at each survey question a number sign (\#) is displayed. You
can remove this sign by modifying its default XSLT a little:

-   Navigate to the **Style** section
-   Create a new XSLT for surveys (or edit an existing one).
-   Open the XSLT, and find the following code

`<div class="number">#<xsl:value-of select="number"/></div>`

Remove the \# (or replace it with something else):

`<div class="number"><xsl:value-of select="number"/></div>`

-   Store the XSLT, and make sure you refer to the XSLT in the survey
    tag:

`{survey name="name survey" xslt="name of the xslt"}`
