# json_decode

With `json_decode` you can turn JSON data into variable. This format is useablr later on
in your code and then you can work with Smarty tags. To access data from a JSON file, you need to create 
an array/object. The following example shows you, how you can incorporate `json_decode` in you Smarty code.

```text
{foreach from=$items item=entry}
    {* create array from JSON string*}
    {assign var=person value=$entry->nb_persons|json_decode:1}
    <pre>
        {$person.company}
    </pre>
{/foreach}
```
