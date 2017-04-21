# Personalization functions: loadfile

This function allows you to load a file from the files section under 
profiles in your template or document.

Note: This function can not be used in a Content web form text block.

## Example

The *loadfile* function can be used to load a file that has been uploaded 
under profiles in a webpage or email document.

`{loadfile file='path/somepicture.jpg' fallback='defaultimage.jpg'}`

If the file can not be loaded only the filename will be displayed to the 
user. Therefore it is a good idea to always provide a *fallback* file to 
inform the user the correct file could not be retrieved or provide an 
alternative.

## Supported file types

* HTML files: *.html
* TXT files: *.txt

## More information

* [Personalization](./personalization)
* [Personalization functions](./personalization-functions)
* [Personalization function linkfile](./personalization-functions-linkfile)
