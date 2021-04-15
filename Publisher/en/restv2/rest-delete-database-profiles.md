# REST API: DELETE database profiles
This method can be used if you want to remove multiple profiles from a
database. Be extra careful though, the number of profiles you can remove
is not limited. By sending a DELETE request to the following URL, you can
remove multiple profiles at once:
`https://api.copernica.com/v2/database/$id/profiles?access_token=xxxx`
In this, **$id** should be replaced by the numerical identifier, the ID, of 
the database you want to remove the profiles from.
## Body data
Besides the parameters that you append to the URL, you must also include 
a request body in this DELETE request. The body must contain the **profiles**
component, consisting of an array of profile IDs. The input must be structured 
as:
```
{
	"profiles" : 
	[
		123,
		124,
		125,
		126
	]
}
```
If the call was successful, the profiles with IDs 123,124,125 and 126 are
no longer in the corresponding database.
## More information
* [Overview of all API calls](./rest-api.md)
