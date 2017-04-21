# Personalization functions: linkfile

This function allows you to link a file from the files section under 
profiles in your template or document.

Note: This function can not be used in a Content web form text block.

## Example

The linkfile function can be used to link a file that has been uploaded 
under profiles in a webpage or email document.

`{linkfile file='path/somepicture.jpg' fallback='defaultimage.jpg'}`

If the file can not be linked only the filename will be displayed to the 
user. Therefore it is a good idea to always provide a *fallback* file to 
inform the user the correct file could not be retrieved or provide an 
alternative.

## Supported file types

* ZIP file: *.zip
* Plain text
* HTML text
* PDF file: *.pdf
* DOC/DOCX word files: *.doc/*.docx
* GIF/PNG/JPEG/JPG/JPE images: *.gif/*.png/*.jpeg/*.jpg/*.jpe

## More information

* [Personalization](./personalization)
* [Personalization functions](./personalization-functions)
* [Personalization function loadfile](./personalization-functions-loadfile)
