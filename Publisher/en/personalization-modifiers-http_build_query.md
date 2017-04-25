# http_build_query

With this modifier you can generate a URL-encoded query string from an associative
array. You can specify by which tag the properties and values should be devided. 
For example, you could use a `&amp` tag or a `'myvar_'` tag.
Usage:

```text
{$arr1|@http_build_query:"_var1"}
```