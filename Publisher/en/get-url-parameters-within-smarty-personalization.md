# Fetching URL parameters

If you personalize a web page, you can access the parameters from the page URL
and use them as variables in the personalization. This is achieved with the 
{$smarty.get.*parameter*} variable. If, for example, a page is retrieved with
the URL *http://mywebsite.example.com?name=John*, it is possible to extract
the name parameter and use it to personalize: 

    Hallo {$smarty.get.name|escape}!

The name "John" will be displayed on the website.
