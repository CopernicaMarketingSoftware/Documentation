# Personalization functions: fetch

Fetch can be used to retrieve files from a local system, http or ftp. 
You can then display these contents.

* **http**: URLs starting with "http://" will cause the website to be 
fetched and displayed.
* **ftp**: URLs starting with "ftp://" will cause the file to be downloaded 
from the server and displayed.
* **local**: Full system file path or path relative to the PHP script will 
be fetched and displayed.

The function itself has a **name** variable which is required and an **assign** 
you can use to store a website in a variable instead of displaying it.

## Examples

Using the following code you can add information from a website, for example 
the weather:

    {fetch file='http://www.myweather.com/today/'}
    
Or you can put them in a variable to apply your own divs.

    {fetch file='http://www.theweather.com/today/' assign='weather'}
    {if $weather ne ''}
      <div id="weather">{$weather}</div>
    {/if}

Please note that this example also uses the [if function](./personalize-functions-if).    
You can also download from an FTP server. This example also nicely demonstrates 
how to use variables in the link.

    {fetch file="ftp://`$user`:`$password`@`$server`/`$path`"}

## More information

* [Personalization](./personalization)
* [Personalization functions](./personalization-functions)
* [if function](./personalize-functions-if)
