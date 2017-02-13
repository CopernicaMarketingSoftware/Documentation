# Creating a personalized salutation

Using Smarty code, it’s possible to personalize your newsletter fairly easily. This article teaches how to start your newsletters with a personal salutation for every recipient.

Note: you should test your mailing thoroughly before finally sending it. Make a selection in your database with various test profiles that cover all situations that might occur in your database. This could involve male/female, upper and lower case, and so forth.

## A simple and informal greeting
If you have the first names of all your relations, it’s easy to personalize the e-mail to show the first name by calling to the field it is stored in. In this example, it’s called ‘Firstname’.

`Dear {$Firstname|escape},`

However, if you don’t have all first names, you still want all of your recipients to receive a proper greeting, and not “Dear ,”. To prevent that from happening, you could use the following piece of code:

`{if $Firstname != “”} Dear {$Firstname|escape}{else}Dear relation{/if},`

In human language, this says “If ‘Firstname’ has a value, use it. Otherwise, show ‘Dear relation’”. 

## Formal greeting
If you want to greet your recipients formally, you also need to know their gender:

- Dear Mr. Jones,
- Dear Mrs. Smith,
- Dear Ms. Wilde,

`Dear {if $Lastname == “”}relatie{else}{if $Gender==”male}Mr. {else}Ms. {/if}{$Achternaam|escape}{/if};`

However, this example only accounts for Mr. and Ms. If you wish to add Mrs. as well, you also need to check for marital status.

In all examples in this article, the [Smarty modifier](https://www.copernica.com/en/documentation/personalization-modifiers) *|escape* is used. This makes sure all special characters are escaped, so abuse of your database isn’t possible. There are other modifiers, such as *|lower* to turn characters into lowercase and *|ucfirst* to uppercase the first letter of a string.

## Catching initials
Of course, you want to personalize with ‘Dear <First name>’. However, it may happen that you have initials, such as ‘B.R.’,  in your database instead of a name. In that case, you could check for initials and intead show ‘Dear customer’:
`Dear {if Firstname|count_sentences <1}{$Firstname|escape}{else}customer{/if},`

*count_sentences* is another one of the Smarty modifiers. It counts the number of sencentes in a string based on the number of periods(.) The condition above checks whether count_sentences is lower than 1 (so, 0). If this is the case, the first name is shown. Otherwise, ‘customer’ is shown.
