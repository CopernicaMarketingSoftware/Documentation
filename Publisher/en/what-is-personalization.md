## Personalization: A Smarty introduction

Personalization is adapting a mailing to the individual subscriber.
Inserting their name in an e-mail for example, or by displaying
different content to different target groups or different images based
on interests.

**Personalization is based on profile and/or subprofile information.**

## How personalization works with Smarty

Mailings, web pages, text messages and PDF files are personalized with
special coding from a tool known as Smarty. This is an external software
tool incorporated in the application. When the document is sent, the
coding is replaced by information from your database profiles. Creating
unique mailings for each recipient.

## Writing personalization code with variables

Writing personalization code is done by adding { and } and \$ to
variables. A variable can hold different values and is directly linked
to a database field or created within the document using smarty code.

## Personalizing with database field names

By placing text between left and right braces (curly brackets) the
application recognizes it as smarty text to be replaced with data. The
dollar sign is added before each variable to point to your database.

Example: {\$name} refers to the database field *name*. In a personalized
document this will output the value from this field in the document. 

-   Use only the real symbols { and } (ascii 123 and 125), not the
    html-escaped characters.
-   To use these symbols as plain text, use special coding {ldelim}
    (left) and {rdelim} (right) for accolades.
-   Braces which are part of JavaScript or stylesheets (within script or
    style tags) will not be recognized as personalization. Though, if
    you get a conflict, just wrap your html or javascript code in
    \*literal \*statements:

    `{literal}...wrap your javascript and css code in literal tags if you're having conflicts with smarty...{/literal}`

You may also create your own variables in the document:

`{capture  assign=something}Howdy folks!{/capture}`

{\$something} will then output “*Howdy folks!*” when the document is
displayed personalized. You can capture anything, including other smarty
code.

## Personalizing with interest fields

Interest fields are database fields that can hold only 2 values: yes and
no. They are particularly useful to store preferences. Personalizing
based on these interest fields requires slightly different coding from
regular database fields. Instead of a field name or group name, the
variable itself is used.

For example **football** would be used as {\$profile.football}

## Where can I use personalization?

You can use smarty personalization code anywhere in the software.

-   Email subject lines
-   Email content
-   Email headers (such as CC, BCC, X-Mailer)
-   Personalized website content
-   Web forms (default field values, labels, et cetera)
-   Hyperlinks and mailto: links
-   Et cetera...

## Custom tags

Additional to Smarty, we have incorporated lots of custom tags that can
be used within your online campaigns. Amongst them the {unsubscribe} and
{webversion} tag. To distinct between these functionalities and regular
smarty coding, the **custom functions have no dollar signs**.

-   [View all Copernica tags and
    functions](https://www.copernica.com/en/support/special-functions-and-tags)

## Further reading:

-   Full smarty documentation:
    [http://www.smarty.net/docs/en/](http://www.smarty.net/docs/en/)

