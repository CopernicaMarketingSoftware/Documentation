# XSLT in Publisher

Webforms, surveys, and content feeds (RSS & Atom) are built with XML.
The XML source file contains and describes the data. XSLT, which
stands for Extensible Stylesheet Language Transformations, converts
the XML to HTML source code that internet browsers and e-mailclients can 
read.

XSLT has many applications, including changing the placement of text within 
tags (`<h1>` and `<p>` for titles or paragraphs respectively, for example), 
assigning CSS classes, structuring information etc.

Programming XSLT is, in contrast to [CSS](./css), a more complex task which
requires specific knowledge. XSLT, however, is a widely used 
technology and there are many resources available to teach you the 
language, some of which we included in the [more information](./xslt#more-information) 
section.

## XSLT in practice

As mentioned earlier, a webform starts with plain information in XML
format. The XML code below represents a web form, and contains
information about its fields, labels and the unique ID of the web
form.

```
    <webform>    
        <id>42</id>   
        <buttontext>Send</buttontext>   
        <field>     
            <id>2b3616f2a90c96c8193b932bded51985</id>     
            <label>Voornaam</label>     
            <required>yes</required>      
            <type>text</type>     
            <value/>    
        </field>  
    </webform>  
```

However, all of this information is useless to a browser or email client. 
The XSLT file makes this information useful by defining how to present 
the plain XML to the browser or email client. In this case we can use 
the XSLT code below to put the label from the XML in a *div* with
a CSS class. We also indicate that an asterisk should be placed after 
required fields (which should have the required CSS class).

```
    <!-- Add a label in front of the input field -->  
    <div class="label">     
        <xsl:value-of select="label" />     
        <div class="colon">:</div>     
        <xsl:if test="required = 'yes'">
        <div class="required">*</div>
        </xsl:if>
    </div>
```

## Creating XSLT

The software adds a default XSLT stylesheet to all content feeds, surveys 
and webforms. The stylesheet removes the need to write your own XSLT to 
publish any content. However, editing this file or creating your own XSLT 
allows you to give your content a custom feel.

You can create a new XSLT file by navigating to the **Style** component 
where the functions related to creating and managing XSLT files are 
in a separate menu. From here you can pick a type of content to create XSLT 
for and decide whether you want to use the default sheet or not.

## HTML comments in XSLT

You might want to leave some comments in the resulting HTML to clarify 
the code. However, the usual opening (`<!--`) and closing (`-->`) tags 
are identical to the XML comment syntax, resulting in these comments 
being stripped from the HTML source code.

To circumvent this problem comments for the HTML should be placed 
within special tags as shown below:

`
    <xsl:comment> This is a comment </xsl:comment>
`

Which will result in a comment in the HTML source code that looks like this:

`
    <!-- This is a comment -->
`

## Conditional code

Certain special HTML comments may also be recognized as special instructions 
instead of regular comments. The following code, for example, is an 
instruction to show a message only if the Internet Explorer is being used:

`
    <!--[if IE]> This line is only visible in Internet Explorer <![endif]-->
`

While most browsers and email clients will treat this like a regular comment. 
Certain browsers, however, will recognize this `[if]` statement.

This kind of conditional commenting can be used to apply specific styling 
for browsers and email clients, as some of them handle styling differently. 
The same technique can be used to use specific stylesheets for specific clients 
and browsers:

`
    <!--[if IE]> <link rel="stylesheet" type="text/css" href="ie.css" /> <![endif]-->
`

This possibility also exists in XSLT, although the syntax is tricky:

`
    <xsl:comment>[if IE]>
        &lt;link rel="stylesheet" type="text/css" href="ie.css" />
    &lt;![endif]</xsl:comment>
`

Please do note that the `<` characters inside the comment should be replaced with
`&lt;` to ensure correct parsing.

## Linking XSLT to content

To link the XSLT stylesheet to the content you can simply use the XSLT 
property in the tag that includes the feed, survey or webform.

`
    {feed name=my_feed xslt=myxslt}
    {survey name=my_survey xslt=myxslt}
    {webform name=my_webform xslt=myxslt}
`

## More information

* [Styling in Publisher](./emailing-publisher-styling)
* [CSS](./css)
