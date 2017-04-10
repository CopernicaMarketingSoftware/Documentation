# Personalization functions: webonly

The {webonly} block is used to mark a piece of code to only be visible 
in the webversion of the message. Would this template be displayed via 
the mail (because someone clicks on the link), the code inside 
the tags will not be rendered.

## Example

    {webonly}
        Click <a href="{somepage}">here</a> to go to the homepage
    {/webonly}
    
In the example we use the {webonly} block to hide the link to the homepage 
if the user is in their mail.
    
## More information

* [Personalization](./personalization)
* [Personalization functions](./personalization-functions)
* [Mailonly function](./personalization-functions-mailonly)

