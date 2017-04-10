# Functions and blocks

Besides variables you can also use functions. A function looks exactly like
a variable, but without the dollar sign. The following code is for example
the function to create a link to the web version of en email:

    {webversion}

Some functions have an open and a close tag. These block functions are used
to modify or mark the text that is encapsulated inside the tags:

    {mailonly}
        Click <a href="{webversion}">here</a> to view this mail in your browser
    {/mailonly}

The {mailonly} block is used to mark a piece of code to only be visible in 
the mail version of the message. Would this template be displayed via the
web (because someone clicks on the web version link), the code inside the 
tags will not be rendered. In the above example we cleverly use the {mailonly}
block to hide the web version link if the user already views the mail in his
or her browser.
    
## Available functions

The list of available functions is long. There are a lot of functions that 
are built-in Smarty functions, and a number of Copernica-only functions:

* **[{assign}](./personalization-functions-assign)**: assign a value to a variable
* **[{capture}](./personalization-functions-capture)**: capture text and store it in a variable
* **[{condition}](./personalization-functions-condition)**: conditional block based on a javascript expression
* **[{counter}](./personalization-functions-counter)**: incrementing counter
* **[{cycle}](./personalization-functions-cycle)**: cycle between two values
* **[{feed}](./personalization-functions-feed)**: load an external RSS feed
* **[{fetch}](./personalization-functions-fetch)**: import externally hosted content
* **[{foreach}](./personalization-functions-foreach)**: iterate over an array
* **[{if}](./personalization-functions-if)**: conditional block
* **[{in_miniselection}](./personalization-functions-in_miniselection)**: mark text that is only rendered if subprofile belongs to a miniselection
* **[{in_selection}](./personalization-functions-in_selection)**: mark text that is only rendered if profile belongs to a selection
* **[{ldelim}](./personalization-functions-ldelim)**: left curly bracket
* **[{literal}](./personalization-functions-literal)**: mark literal block in which curly brackets are permitted
* **[{linkemail}](./personalization-functions-linkemail)**: link to web version of a different email
* **[{linkfile}](./personalization-functions-linkfile)**: link to a file
* **[{linkpdf}](./personalization-functions-linkpdf)**: link to a PDF document
* **[{loadfeed}](./personalization-functions-loadfeed)**: load external RSS feed
* **[{loadfile}](./personalization-functions-loadfile)**: load file into mailing
* **[{mailonly}](./personalization-functions-mailonly)**: mark text that is only rendered in the mail (not on the web)
* **[{math}](./personalization-functions-math)**: calculations and mathematical equations
* **[{rawcapture}](./personalization-functions-rawcapture)**: like {capture}, but without html escaping
* **[{strip}](./personalization-functions-strip)**: remove whitespace
* **[{survey}](./personalization-functions-survey)**: display a survey
* **[{rdelim}](./personalization-functions-rdelim)**: right curly bracket
* **[{textformat}](./personalization-functions-textform)**: text formatting
* **[{unsubscribe}](./personalization-functions-unsubscribe)**: unsubscribe link
* **[{webform}](./personalization-functions-webform)**: render a webform
* **[{webonly}](./personalization-functions-webonly)**: mark text that is only rendered on the web (not in an email)

[Back to personalization](./personalization)
