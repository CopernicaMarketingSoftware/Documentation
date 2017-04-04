# REST API: the fields parameter

There are several API methods that are able to use the *fields* parameter 
in the URL to select profiles and subprofiles. You could use this, for example, 
to only select profiles where "country" is "the netherlands", or profiles 
aged between 18 en 65.

The *fields* parameter is an array, which means square brackets should be 
added after the name of the variable in the URL. The variable may even be 
used multiple times. The following URL demonstrates how the variable *fields[]* 
can occur twice:

`https://api.copernica.com/v1/database/$id/profiles?fields[]=land%3D%3Dnetherlands&fields[]=age%3E16&access_token=xxxx`

## Supported values

The value of a fields parameter always has the format of "field operator value" 
like "country==netherlands" or "age>18". The following operators are available:

* **==**: equal to
* **!=** en **&lt;&gt;**: not equal to
* **&lt;**, **&gt;**: smaller than, greater than
* **&lt;=**, **&gt;=**: smaller or equal to, greater or equal to
* **=~** en **!~**: *like*, *not like*

The *like* and *not like* operators can be used to match profiles. If you use 
such an operator you can use the % and \_ wildcards. The \_ replaces exactly 
one token, regardless of what that token is. The % matches a series of tokens 
of any length. You could specifically fetch all profiles with a first name 
starting with an 'M' by adding "firstname=~M%" to the fields parameter, for 
example.

## Special fields

The fields you use to make comparisons with are always fields from the database.
If you make comparisons like "hometown==amsterdam" of "gender==male",
these fields should exist in your database.

However, there are three special fields that you do not have to enter to 
use. These special fields are:

* **id**: the numerical ID of the (sub)profile
* **code**: the secret code of the (sub)profile
* **modified**: timestamp of last modification of (sub)profile in YYYY-MM-DD hh:mm:ss format.

This means you can also make comparisons like "id>1000" or "modified<2017-01-01".

## Escaping variables

When you add the *fields* parameters to the URL you need to escape variables 
to keep the URL valid. The same goes for other parameters, like the 
*access_token* parameter, but this especially important for the *fields* 
parameter. This is because you always use characters that can not occur 
without interfering with the URL (for example name~=m%). 

The example earlier also escapes characters. The URL includes two field 
parameters: 'country==netherlands' and 'age>16' In the URL they have been 
replace by "country%3D%3Dnetherlands" and "age%3E16" such that the equality 
and greater than operators do not conflict with other tokens in the URL.

When using our [example PHP code](rest-php) you don't have to do this 
as escaping characters is done automatically.

## More information

The *fields* parameter can be used within the following API methods:

* [Fetching profiles from a database](rest-get-database-profiles)
* [Fetching profiles from a selection](rest-get-view-profiles)
* [Fetching subprofiles from a collection](rest-get-collection-subprofiles)
* [Fetching subprofiles from a mini selection](rest-get-miniview-subprofiles)
* [Editing multiple profiles in a database](rest-put-database-profiles)
