# Personalization functions: mailonly

The {mailonly} block is used to mark a piece of code to only be visible 
in the mail version of the message. Would this template be displayed via 
the web (because someone clicks on the web version link), the code inside 
the tags will not be rendered. 

## Example

    {mailonly}
        Click <a href="{webversion}">here</a> to view this mail in your browser
    {/mailonly}

In this example we cleverly use the 
{mailonly} block to hide the web version link if the user already views 
the mail in his or her browser.

## More information

* [Personalization](./personalization)
* [Personalization functions](./personalization-functions)
* [Webonly function](./personalization-functions-webonly)
