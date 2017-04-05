# Overzicht personalisatie bewerking

Je kunt de variabelen, waarmee je emails personaliseert, veranderen met behulp
van 'modifiers'. Je doet dit door een `|` toe te voegen na de variabele.
Je gebruikt bijvoorbeeld`tolower` om de variabele `{$name}` te
bewerken. Dit ziet er dan zo uit: `{$name|tolower}`.
Tot slot, je kunt ook een aantal 'modifiers' achter elkaar gebruiken. 
Je kunt bijvoorbeeld `{$name|tolower|ucfirst}` gebruiken om te zorgen dat alle
namen met een hoofdletter beginnen en de resterende letters altijd kleine 
letters zijn. 


De volgende tabel laat alle geldige 'modifiers' zien:

| 'Modifier'                                                        | Beschrijving                                                                    |
| ----------------------------------------------------------------- | ------------------------------------------------------------------------------ |
| [base64_encode](personalization-modifiers#base64_encode)                          | base64 encoder                                                 |
| [base64_decode](personalization-modifiers#base64_decode)                          | base64 decoder                                                 |
| [cat](personalization-modifiers#cat):"string"                                     | Maakt van de variabele een string                             |
| [count](personalization-modifiers#count)                                          | telt het aantal elementen in een  variable                |
| [count_characters](personalization-modifiers#count_characters)                    | telt het aantal tekens in een string                         |
| [count_paragraphs](personalization-modifiers#count_paragraphs)                    | telt het aantal paragrafen in een tekst (door 'newlines' te tellen)    |
| [count_words](personalization-modifiers#count_words)                              | telt het aantal woorden in een tekst                                |
| [default](personalization-modifiers#default):default value                        | gebruik 'default' waarde als variabele niet is aangegeven                       |
| [empty](personalization-modifiers#empty)                                          | check of een variabele leeg is                              |
| [escape](personalization-modifiers#escape):"string"                               | 'escape' html tekens (of andere tekens) binnen een string        |
| [indent](personalization-modifiers#indent):num = 1:char = " "                     | zet het aantal 'whitespaces' aan het begin van elke regel                     |
| [md5](personalization-modifiers#md5)                                              | voer md5 hashing uit                                        |
| [nl2br](personalization-modifiers#nl2br)                                          | vervang 'newlines' met html 'br tags'                             |
| [range](personalization-modifiers#range):start = 0:end                            | lijst opdelen om de items tussen de start en eindpositie te krijgen |
| [regex_replace](personalization-modifiers#regex_replace):regex:replace_text       | vervang 'substrings' door 'regular expressions' te gebruiken                  |
| [replace](personalization-modifiers#replace):"string1":"string2"                  | vervang gebeurtenissen van string1 met string2                    |
| [sha1](personalization-modifiers#sha1)                                            | voer sha1 hashing uit                                           |
| [sha256](personalization-modifiers#sha256)                                        | voer sha256 hashing uit                                       |
| [sha512](personalization-modifiers#sha512)                                        | sha512 hashing                                                 |
| [spacify](personalization-modifiers#spacify):separator = " "                      | plaats een verdeler tussen elk input teken                |
| [strlen](personalization-modifiers#strlen)                                        | tel het aantal tekens in een string                               |
| [strstr](personalization-modifiers#strstr):"substring":before = false             | geef de string terug, startend van de eerste gebeurtenis of substring als before = false. Geef anders de string terug tot aan de eerste gebeurtenis. |
| [substr](personalization-modifiers#substr):start position:length                  | geef de substring teurg vanafsw startpositie. Optioneel opgedeeld na een bepaalde lengte aan karakters    |
| [tolower](personalization-modifiers#tolower)                                      | zet alle tekens om naar kleine letters                           |
| [toupper](personalization-modifiers#toupper)                                      | zet alle tekens om naar grote letters                           |
| [trim](personalization-modifiers#trim)                                            | trim de spaties en 'endline' tekens aan beide kanten van het inputveld  |
| [truncate](personalization-modifiers#truncate):length = 80:etc = "...":break_words = false | truncate inputs that are longer than length and append etc at the end. break_words = true allows truncating parts of words |
| [ucfirst](personalization-modifiers#ucfirst)                                      | replace first character with an upper case character           |
| [urlencode](personalization-modifiers#urlencode)                                  | encode input for use in an url                                 |
| [urldecode](personalization-modifiers#urldecode)                                  | decode input for use in an url                                 |


## base64_encode

With this modifier you encode the data into base64. Note that this
modifier does not have an effect on arrays.
Usage:
```text
The base64 encoding of {$name} is {$name|base64_encode}.
```

## base64_decode

With this modifier you can decode base64 encoded information.
Usage:

```text
The decoded information is {$base64encoded|base64_decode}
```

## cat

With this modefier you can concatenate a string to your variable. If the
variable is an arrary, the string will be used.
Usage:

```
{$name|cat:"string"}
```

## count

With this modifier you can count the number of elements in an array. If
the variable is not an array a 0 will be returned.
Usage:
```text
{$names|count}
```

## count_characters

With this modifier you can count the number of characters in your text.
If this modifier is called on an variable that contains an array, 0 is
returned.
Usage:
```text
{$name|count_characters}
```

## count_paragraphs

With this modifier you can count the number of paragraphs in your text.
If this modifier is applied on an array a 0 is returned.
Usage:
```text
The following text has {$text|count_paragraphs} paragraph.
Text:
{$text}
```

## count_words

With this modifier you can count the number of words in your text. If this
modifier is applied on an array a 0 is returned.
Usage:

```text
"{$text}" has {$text|count_words} words.
```

## default

With this modifier you can set a default value that will be used if
the value does not exist.
Usage:

```text
This will always show {$name|default:"something"}
```

## empty

With this modifier you can check if the variable is set or not. It
will return true if the variable is set or false if it isn't.
Usage:
```text
{if $name|empty}
    Dear customer,
{else}
    Dear {$name},
{/if}
```

## escape

With this modifier you can escape, or encode, the variable. The form is:
escape:"value". The possible values are: "html", "url", and "base64". If
no value is specified "html" is used. On an array this modifier is ingored.
Usage:
```text
{$text|escape:"html"}
is equal to:
{$text|escape}
```

## indent

With this modifier you can add indentation to your text. You can specify
the amount of indentation and the character(s) that is used for indentation.
The syntax is indent:num:char, where "num" is the number of characters and
"char" the character. The default of these is 1 and space respectively.
On an array this modifier is ignored.
Usage

```text
{$text|indent:4:" "}
```

## md5

With this modifier you get the MD5 checksum of your text. If you use it
on an array, the MD checksum is calculated over the entire array excluding
the keys.
Usage:
```text
{$text|md5}
```


## nl2br

This modifier replaces your newlines with the equivalent HTML br tags.
This enables you to write plain text that will be truncated in html mode.
On an array this value is ignored.
Usage:
```text
{$text|nl2br}
```


## range

With this modifier you can take a range form your input if your input is
an array. The form is range:start:end, where start is the start position
and end is the exclusive end position. If the variable is not an array, the
value will be ignored.
Usage:
```text
{$array|range:2:5}
```

## regex_replace

With this modifier you can replace parts of your text, base on a [regular expression](@todo),
with other text. If the variable is an array this value will be ignored.
Usage
```text
This will replace each number in the variable string with the string " a number "
{$text|regex_replace:"\d":" a number "}
```

## replace

With modifier replace you can replace a part of your text with some
other text. The syntax is: replace:"string1":"string2", where all occurrences
of "string1" will be replaced by "string2". When the variable is an array,
this modifier does not have an effect.
Usage:
```text
{$text|replace:"hi":"hello"}
```

## sha1

With this modifier you get the SHA1 hash of your text. If the variable is
an array the SHA1 hash will be calculated over the entire array, excluding
the keys.
Usage:
```text
{$text|sha1}
```

## sha256

With this modifier you get the SHA256 hash of your text. If the variable is
an array the SHA256 hash will be calculated over the entire array, excluding
the keys.
Usage:
```text
{$text|sha256}
```

## sha512

With this modifier you get the SHA512 hash of your text. If the variable is
an array the SHA512 hash will be calculated over the entire array, excluding
the keys.
Usage:
```text
{$text|sha512}
```

## spacify

With this modifier you can add a character, or characters, between each
character in your variable. The syntax is spacify:separator, where the
default separator is space. If the variable is an array the modifier will
be ignored.
Usage:
```text
{$text|spacify:"."}
```

## strlen

With this modifier the length of the text in a variable can be obtained.
If the variable is an array a 0 will be returned.
Usage:
```text
{$text|strlen}
```

## strstr

With this modifier you can search for a string in you variable and get the
first occurrence plus the rest of your variable, or you can get everything
in the variable till the searched string. The syntax is: strstr:string:before,
where string is the searched string, and before is a boolean, default = false.
If the boolean is true, you get what is in the variable before the first
occurrence of string. If it is false you get what is in the variable from
the first occurrence of string onwards. If the variable is an array the
modifier is ignored.
Usage:
```text
If the variable holds "Hello world!", this will print Hello, {$variable|strstr:" ":true}
and this will print world!, {$variable|strstr:"w":false}, just like this
{$variable|strstr:"w"}
```

## substr

With this modifier you can obtain a substring from you variable. The syntax
is substr:start:length, where start is the starting position in the string
(zero indexed) and length is the length you want to obtain. The default
for length is the the length of the string minus the starting position.
Usage:
```text
If the variable is "0123456789" this will print 2 to 9
{$variable|substr:2}
and this will print 456
{$variable|substr:4:3}
```

## tolower

With this modifier you can change all character in your text to lowercase
characters.
Usage:
```text
{$text|tolower}
```

## toupper

With this modifier you can change all characters in your text to uppercase
characters.
Usage:
```text
The next part looks like it is shouted {$text|toupper}
```

## trim

With this modifier you can trim trailing white space and new line characters
from your text. The characters that are trimmed are: spaces, tabs, newlines,
carriage returns, vertical tabs, and end of strings.
Usage:
```text
{$text}
```

## truncate

With this modifier it is possible to truncate your text to a certain length.
If the text is truncated it is possible to add some characters to indicate
that the text is truncated. These extra characters are counted for the
truncation length as well. You can also specify whether it is allowed to
break words or not. The syntax is: truncate:length:etc:break_words,
where length has a default of 80, etc (the replacement), has a default of
... and break_words has as default false.

Usage:
```text
{$text|truncate:50:"....":true}
```

## ucfirst

With this modifier you replace the first character of your text with an
uppercase character.
Usage:
```text
{$name|ucfirst}
```

## urlencode

With this modifier you can url encode your text.
Usage:
```text
{$text|urlencode}
```

## urldecode

With this modifier you can url decode your text.
Usage:
```text
{$text|urldecode}
```
