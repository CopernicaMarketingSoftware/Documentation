Do you want to display the current date or month in your email document
or template? Or do you want to show different content to adult
recipients?

To display a date in your publications, you use the **smarty.now**
function. This function calculates the number of seconds that have
passed since 1-1-1970. The **date\_format** modifier is then used to
convert these seconds to a human readable value.

Here are some common examples:

| code | result |
| ---- | --- |
| {\$smarty.now|date\_format} | Dec 4, 2014 |
| {\$smarty.now|date\_format:"%D"} | 12/04/14 |
| {\$smarty.now|date\_format:“%d-%m-%Y”} | 04-12-2014 |
| {\$smarty.now|date\_format:"%A, %e %B %Y"} | Tuesday, 4 december 2014 |
| {\$smarty.now|date\_format:“%A"} | Tuesday |
| {\$smarty.now|date\_format:"%c"} | Tu 04 dec 2014 15:20:28 CET |

Even more date\_format conversion specifiers can be found here:
[http://www.smarty.net/docsv2/en/language.modifier.date.format](http://www.smarty.net/docsv2/en/language.modifier.date.format)

### Date in different language or timezone

To output the date in a different language or timezone, you can use the
[personalization
settings](./document-and-template-personalization-settings.en.md)
of the document or template. This setting is found in the toolbar below
the template / document you are editing.

### Comparing dates

Dates can be compared in the template or document by timestamps with:

`{if $order_date < $invoice_date} ...do something.. {/if}`
