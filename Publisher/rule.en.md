With the /rule/\$ruleID method it is possible to edit an existing rule.

PUT request
-----------

If you want to edit a rule, you can use a PUT request:

~~~~ {.language-javascript}
https://api.copernica.com/rule/5?access_token=ff969...
~~~~

If you want to inverse the rule, you can send the following payload:

~~~~ {.language-javascript}
{"inversed":"true"}
~~~~
