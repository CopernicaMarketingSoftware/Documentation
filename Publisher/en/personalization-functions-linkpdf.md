# Personalization functions: linkpdf

The linkpdf tag can be used to construct a link to an existing pdf file. 
First a document or template matching the given template or document must 
be found. It is then converted to a link, which is automatically escaped, 
unless indicated otherwise.

## Example

    {linkpdf document="mypreviousmailing" escape="true"}
    
This only outputs the link, but of course you can put this in a nice HTML 
hyperlink or use it in any other way. 

## More information

* [Personalization](./personalization)
* [Personalization functions](./personalization-functions)
