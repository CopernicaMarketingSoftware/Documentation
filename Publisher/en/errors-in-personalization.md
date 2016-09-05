When editing the HTML content of a template or the content of a
document, you can be notified about a personalization error, even if you
do not make use of personalization at all.

In the software special tags can be used in templates and documents for
personalization, special content and variable content.

For instance, on template level, you can make use of loop, image and
text blocks. Smartycode can be used on both template and document level.

To recognize these functions, special symbols are used.

-   Square brackets are reserved for loop and content blocks.
-   For smarty code and functions like ‘webversion’ and ‘mailonly’ curly
    brackets are reserved.

Most of the times this is caused by usage of brackets for other purposes
than personalization.

You can still use these punctuation symbols by replacing then with
rdelim and ldelim

-   Replace a left bracket with ldelim, surrounded by two brackets.
-   Replace a right bracket with rdelim, surrounded by two brackets.
-   Replace a left curly bracket with ldelim, surrounded by two curly
    brackets.
-   Replace a right bracket with rdelim, surrounded by two curly
    brackets. 

![rdelimldelim.png](https://beta.copernica.com/index.php?pxc=113251&current=help&pxd=.p.help.image&article=personalize.personalizationerror&language=nl_NL&id=1338)
