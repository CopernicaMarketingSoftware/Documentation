# Property version

For compatibility with future versions of the responsive API, we advise
you to include a version number in your JSON document. If we change the
API in the future, we might make changes to how input
JSON is turned into responsive emails. If you want to make sure that the ResponsiveEmail.com
API always converts your input JSON into the same responsive email, you can enforce this by setting the version number.
If you omit the version number, the API will assume that your JSON
input is formatted according to the latest version of the API.

Currently, the API runs on version ***17***.

## Example input

The following JSON input demonstrates how to set the name, description
and version number, and a simple textual content.
````json
    {
        "name" : "my-template",
        "description" : "Description of my-template",
        "version" : 17,
        "content" : {
            "blocks" : [{
                "type" : "text",
                "content" : "This is example text"
            }]
        }
    }
````
The ResponsiveEmail.com API will turn the above JSON into a responsive email.
But imagine the unlikely situation that in a future version of the API
the property "source" is no longer supported for text blocks. Your email
would then become empty from one day to the other, just because the server
side end point would ignore the then obsolete "source" property.

You can prevent this by including a version number in the
input JSON. By setting this version number, you enforce that the input
JSON is always converted into the same output email, and that changes
to the API do not affect the way how your email is created.


## Difference with API version number in the URL

Besides the version number in the JSON input, the URL via which the
API is accessible also has a version number in it (https://www.responsiveemail.com/v1/...).
There is a difference between <a href="/support/api/versions">this version
number</a>, and the number in the JSON.

The version number in the JSON describes the format of the JSON that is
used, while the version number in the URL is used for the version of the
API end point. If we decide to change the name of an API method, or the
way how parameters should be passed to the API, we change the version number
in the URL. If the way how input JSON is processed changes, the version
number in the JSON is used.
