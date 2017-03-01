# Personalization settings

For every document and template you can configure the personalization settings.
With these settings you contol the language that is used for displaying 
[dates](./using-the-smarty-date-function.md). You can find the personalization
settings on the left of your screen under every opened template or document.

![](../images/personalisatieinstellingen.png)

The personalization settings can be set for both templates and documents. If 
you do not explicitly choose a setting for a document, Copernica will fall back
to the template settings. The following four things can be set:

* language: the language that is used for displaying dates
* timezone: the timezone that is needed to format times
* character set: the character set to use for "strange" characters
* html filter: should personalization data automatically be quoted?

## Language and timezone

In the article about [displaying dates and times](./using-the-smarty-date-function.md)
this is being discussed too: you can use the special |date_format modifier for
showing dates or times. This modifier converts a timestamp in computer notation
into a format understandable for humans. The language that is used for 
converting the dates (because every language uses its own month and weekday names),
and displaying the times (because *now* is a different time in Moscow than in
San Francisco) can be set with the personalization settings.


## Character set

Short summary: always choose UTF-8. Then you're always safe. The UTF-8 character
set supports basically all characters in the world.

But what is this exactly? Traditionally, you could only use traditional ASCII
characters in email: the latin alphabet, digits and a couple of special characters. 
Only the characters that you find on an American keyboard. Exotic characters,
but also characters that are used in Europe (like ë, ï of é) were not supported.
If you did want to send out an email with such characters, you had to explicitly
specify the used character set in the email header: west-european, east-european,
russian, chinese, et cetera.

The UTF-8 character set was developed later, en contains almost all characters
used in the world. Thus, if you choose UTF-8, you're always good.


## HTML filtering

We [mentioned it before](./personalization.md): it is very important
to escape personalization variables. Personalization variables often come
from registration forms that were entered by anonymous users, and you therefore 
never can be sure that they hold valid data. It is very well possible
that someone entered a malicious piece of javascript which would end up
in your website or mail if you personalize with "Dear {$name}". This could
ruin your layout, or worse: makes your application vulnerable for all sorts
of hacks.

That's why we always advise to **escape all your variables**. The Smarty |escape
modifier should be used to disarm potentional harmful variables. So, use 
"Dear {$name|escape}" to prevent disasters. Alternatively, you can also
use the personalization settings to do this automatically. If you enable the
HTML filtering option, all personalization variables are automatically 
repaired, and you do not have to explicitly |escape them.


## Edit mode

When you're working on a document, you'll find a edit mode button right next
to the personaization settings. This is a useful button when you're
[testing personalization code](./personalization-testing.md).

