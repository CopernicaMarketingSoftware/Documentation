# API method DELETE /v1/template/{ID}

This method allows you to delete a certain template from the ResponsiveEmail.com
servers.

## Example request


````txt
    DELETE /v1/template/3/?access_token=yourtoken
    Host: www.responsiveemail.com

    HTTP/1.1 200 OK
    Date: Thu, 18 Dec 2014 14:16:54 GMT
    X-Deleted: template 3
````


## Related information

Once a template has been deleted it cannot be retrieved. If you are not 100% sure you
want to delete a template make sure to save it somewhere else before deleting.
