With the /condition/\$conditionType/\$conditionID method you can edit an
existing condition.

PUT request
-----------

You can update a condition with a PUT request. The URL for this request
is different from the one for GET and POST requests. For selecting a
condition, you'll need to specify the type of condition (you can find
them [here]()) and the ID. Take a look at the example below, were
condition 4 of type 'field' gets updated:

~~~~ {.language-javascript}
https://api.copernica.com/condition/field/4?access_token=ff9696....
~~~~

We send the following payload to this URL:

~~~~ {.language-javascript}
{"comparison":"more"}
~~~~

Condition 4 used to check if the value of a field was equal to a fixed
value. Now it checks if the value is higher than the fixed value.
