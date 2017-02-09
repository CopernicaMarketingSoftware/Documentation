# Using times and dates with Smarty

Besides all the profile variables that you can use for personalizing, you also
have access to the variable {$smarty.now}. This variable holds the current 
time, and can be used to do things like automatically adding a copyright
message under your email that always shows the current year. But other things 
are possible too:

* Show the current week number and month above your newsletter
* Include the current time in a webform
* Close a survey after a certain date

## {$smart.now} and {$timestamp}

The {$smarty.now} variable has a downside. It always contains the current
timestamp, and is constantly and automatically updated, even after the mailing 
is sent. If you used the {$smarty.now} variable in your mailing to add the
newsletter date, like "monday 12 september", you might have a problem if someone
opens the webversion of the mail one or more days later. He or she will then 
see a text like "wednesday 14 september" instead.

To overcome this, we also have a {$timestamp} variable. This variable normally
holds the same value as {$smarty.now}, but it does not get updated. So if you
use this variable instead of {$smarty.now}, you know for sure that the times
and dates displayed in the webversion are the same as in the original mail.


## Smarty modifiers

The {$smarty.now} and {$timestamp} variables hold the current timestamp in a
format that is very convenient for computers, but that is not so easy to
understand for human beings: the time is stored as number of seconds
since 1 january 1970 UTC. If you would use this variable directly in a
mailing, you see a very large number instead of a recognizable date.

Computers and human beings handle times and dates in a different manner. Computers
work with numbers, while humans use concepts like years, months, days and weeks.
If you want to use the timestamp from {$smarty.now} or {$timestamp} in a mailing
you therefore have to convert the time from this numeric representation, into
a representation that is understood by humans. You can do this with a 
[Smarty modifier](./personalization-modifier.md): |date_format.

The |date_format modifier transforms a timestamp in number-of-seconds notation
(as used by computers) into a different format. Look at some examples:

    {$smarty.now|date_format:"%Y-%m-%d"}        // 2014-12-04
    {$smarty.now|date_format}                   // Dec 4, 2014
    {$smarty.now|date_format:"%D"}              // 12/04/14
    {$smarty.now|date_format:"%d-%m-%Y"}        // 04-12-2014
    {$smarty.now|date_format:"%A, %e %B %Y"}    // Tuesday, 4 december 2014
    {$smarty.now|date_format:"%A"}              // Tuesday
    {$smarty.now|date_format:"%c"}              // Tu 04 dec 2014 15:20:28 CET

A full list of all the options can be found in the 
[official Smarty documentation](http://www.smarty.net/docsv2/en/language.modifier.date.format.tpl).


## Language and timezone

The |date_format modifier converts a timestamp to a for humans usable format.
The formatting string that you pass to the modifier decides the output of this
conversion. The variable "%A" can be used in the formatting string to show the
current day's name, and "%b" for the name of the month, et cetera. But every
language uses different words for month and day names. How does Copernica know
in which language the name should be displayed?

For every template you can change the [personalization settings](./personalization-settings.md).
In the old Publisher this this setting can be found near the bottom of the
screen when a template is being edited. The |date_modifier checks exactly this 
settings to decide whether the %A variable is converted to "monday", "lundi" or "Montag".

The personalization setting should also be used to set the timezone. If you want
to display the current time in a mailing, Copernica needs to know whether that is 
the current time according to the clock in Amsterdam, Tokyo or New York. The 
date_format modifier checks the personalization settings to find out the timezone.


## Yesterday and tomorrow

The |date_format modifier is clever. You can use this modifier to convert timestamps
to human readable dates and times, but also to convert other types of input strings.
If an action runs for a single day only.

    This action expires on {"tomorrow"|date_format:"%A, %B %e, %Y"}

Or for two days:

    This action expires on {"+2 days"|date_format:"%A, %B %e, %Y"}

Et cetera...


## Comparing dates

You can use *if* statements to compare dates in the datebase. If you store dates
and times in the database in a usable format, you can use the normal comparison
operators:

    {if $order_date < $invoice_date}
    
    {/if}

If you built a survey and publish it on a website, you can use personalization
to automatically withdraw a survey

    {* The survey should not be displayed after 25 march 2017 *}

    {capture assign="currentDate"}{$smarty.now|date_format:"%Y-%m-%d"}{/capture}
    {capture assign="endDate"}2017-03-25{/capture}
    {if $currentDate < $endDate}
       {survey name="your survey"}
    {else}
        Our apologies, it no longer is possible to submit the survey
    {/if}
