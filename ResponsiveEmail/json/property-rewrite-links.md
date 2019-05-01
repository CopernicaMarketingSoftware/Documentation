# Property `links`

Inside the [`rewrite`](../json/property-rewrite)
property, you can set the nested `links` property to tell the
Responsive Email API how you would like to rewrite hyperlinks
that appear in the mail.

The `links` property is a JSON array, filled with JSON objects. Each object in
this array is a rewrite rule. These rules contain the parameters they should add
and the rules they should match before doing so.

Inside a rewrite rule you can specify a component of the URL that you want to apply
your matching rule to. This component is a JSON object. Matching rules are defined 
inside these objects. Supported URL components are `domain`, `path` and `url`. 
Matching rules that are specified inside the domain component means that these rules will
only be applied to the domain of the URL. The path component means that the rule will 
only be  applied to the path of the URL. Finally, using the url component means 
that the rule will be applied to the full URL. 

The matching rules you can specify inside a component are `equals`, `contains`, `match` and `regex`. 
The equals rule will look for an exact match of the query string and the specified url component.
The contains rule means the component should contain the specified string. The match rule will
do a wildcard match on the component. And regex will try to match the regular expression
on the component. In case you specified multiple of these matching rules it'll have
to match all of them before it'll apply the actual rules. No matching rules means
that it will always match.

Then we have two special properties, the `last` and the `unique` property. Responsive
Email API will process all the rules in the order that they were supplied and it will
process all of them. Unless the user specified the `last` property, in case this property
is set to true and the rule matches then that was the last rule to be processed.
The `unique` property however is only applied if previously no rules have matched.

```javascript
{
    "name": "template13",
    "subject": "This email has links",
    "rewrite": {
        "links": [
            {
                "domain" : {
                    "contains" : "apple"
                },
                "params" : {
                    "utm_medium" : "apple"
                },
                "protocol" : "https"
            },
            {
                "path" : {
                    "match" : "*property-rewrite-links",
                },
                "params": {
                    "utm_medium" : "rewrite"
                }
            },
            {
                "domain" : {
                    "equals" : "www.example.com"
                },
                "params" : {
                    "utm_medium" : "example"
                },
                "last" : true
            },
            {
                "url" : {
                    "regex": "^https://www.responsiveemail.com.",
                }
                "params": {
                    "utm_medium" : "responsive-email"
                },
                "unique" : true
            },
            {
                "params" : {
                    "test" : "default"
                }
            }
        ]
    }
}
```

As you can see the first rule states that all links where the domain contains `apple` should
be affected and will get the parameter `utm_medium=apple` and the protocol `https`.
The second rule only applies if the path ends with `property-rewrite-links` and it will
get `utm_medium=rewrite`. Third, we check if we have an exact match with `www.example.com` but 
after this rule has matched no other rules will be applied. The fourth rule will try 
to do a regex match over the full URL and it'll get `utm_medium=responsive-email`,
but only if no previous rules were matched. And finally, if we manage to reach this point
we're just adding `test=default`.

## The rewrite object

In the above example, we only give an example on how to add parameters
to the hyperlinks. There are more properties to be set:

### Rewrite rule properties

| Property | Value | Desc.                                                                                  |
|:---------|-------|----------------------------------------------------------------------------------------|
| params | _object_ | Parameters to be added to matching urls                                               |
| protocol | _string_ | Protocol to change                                                                  |
| component | _object_ | The url component we apply a matching rule to                                      |
| equals | _string_ | A string we use to do a basic string compare with the specified url component         |
| match | _string_ | A wildcard string we have to match with the url component                              |
| contains| _string_ | The url component should contain this string                                         |
| regex | _string_ | Match the url component with this regular expression                                   |
| last | _boolean_ | Stop processing any other rules after this rule matched                                |
| unique | _boolean_ | Only apply this rule if no previous rules matched                                    |
