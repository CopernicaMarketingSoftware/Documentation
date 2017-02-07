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

* **[{assign}](./personalization-function-assign)**: assign a value to a variable
* **[{capture}](./personalization-function-capture)**: capture text and store it in a variable
* **[{condition}](./personalization-function-condition)**: conditional block based on a javascript expression
* **[{counter}](./personalization-function-counter)**: incrementing counter
* **[{cycle}](./personalization-function-cycle)**: cycle between two values
* **[{feed}](./personalization-function-feed)**: load an external RSS feed
* **[{fetch}](./personalization-function-fetch)**: import externally hosted content
* **[{foreach}](./personalization-function-foreach)**: iterate over an array
* **[{if}](./personalization-function-if)**: conditional block
* **[{in_miniselection}](./personalization-function-in_miniselection)**: mark text that is only rendered if subprofile belongs to a miniselection
* **[{in_selection}](./personalization-function-in_selection)**: mark text that is only rendered if profile belongs to a selection
* **[{ldelim}](./personalization-function-ldelim)**: left curly bracket
* **[{literal}](./personalization-function-literal)**: mark literal block in which curly brackets are permitted
* **[{linkemail}](./personalization-function-linkemail)**: link to web version of a different email
* **[{linkfile}](./personalization-function-linkfile)**: link to a file
* **[{linkpdf}](./personalization-function-linkpdf)**: link to a PDF document
* **[{loadfeed}](./personalization-function-loadfeed)**: load external RSS feed
* **[{loadfile}](./personalization-function-loadfile)**: load file into mailing
* **[{mailonly}](./personalization-function-mailonly)**: mark text that is only rendered in the mail (not on the web)
* **[{math}](./personalization-function-math)**: calculations and mathematical equations
* **[{rawcapture}](./personalization-function-rawcapture)**: like {capture}, but without html escaping
* **[{strip}](./personalization-function-strip)**: remove whitespace
* **[{survey}](./personalization-function-survey)**: display a survey
* **[{rdelim}](./personalization-function-rdelim)**: right curly bracket
* **[{textformat}](./personalization-function-textform)**: text formatting
* **[{unsubscribe}](./personalization-function-unsubscribe)**: unsubscribe link
* **[{webform}](./personalization-function-webform)**: render a webform
* **[{webonly}](./personalization-function-webonly)**: mark text that is only rendered on the web (not in an email)

