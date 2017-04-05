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
| [base64_encode](personalization-modifiers#base64_encode)                          | 'base64 encoder'                                                 |
| [base64_decode](personalization-modifiers#base64_decode)                          | 'base64 decoder'                                                 |
| [cat](personalization-modifiers#cat):"string"                                     | maakt van de variabele een string                             |
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
| [replace](personalization-modifiers#replace):"string1":"string2"                  | vervang het voorkomen van string1 met string2                    |
| [sha1](personalization-modifiers#sha1)                                            | voer sha1 hashing uit                                           |
| [sha256](personalization-modifiers#sha256)                                        | voer sha256 hashing uit                                       |
| [sha512](personalization-modifiers#sha512)                                        | 'sha512 hashing'                                             |
| [spacify](personalization-modifiers#spacify):separator = " "                      | plaats een verdeler tussen elk input teken                |
| [strlen](personalization-modifiers#strlen)                                        | tel het aantal tekens in een string                               |
| [strstr](personalization-modifiers#strstr):"substring":before = false             | geef de string terug, startend van de eerste eerste verschrijning van substring als before = false. Geef anders de string terug tot aan de eerste verschijning. |
| [substr](personalization-modifiers#substr):start position:length                  | geef de substring teurg vanafsw startpositie. Optioneel opgedeeld na een bepaalde lengte aan karakters    |
| [tolower](personalization-modifiers#tolower)                                      | zet alle tekens om naar kleine letters                           |
| [toupper](personalization-modifiers#toupper)                                      | zet alle tekens om naar grote letters                           |
| [trim](personalization-modifiers#trim)                                            | trim de spaties en 'endline' tekens aan beide kanten van het inputveld  |
| [truncate](personalization-modifiers#truncate):length = 80:etc = "...":break_words = false | deel de inputvelden op die niet langer dan lengte en toevoegen zijn aan het eind. break_words = true staat het opdelen van delen van woorden toe. |
| [ucfirst](personalization-modifiers#ucfirst)                                      | vervang eerste teken met een hoofdletter           |
| [urlencode](personalization-modifiers#urlencode)                                  | codeer input om te gebruiken in een url                            |
| [urldecode](personalization-modifiers#urldecode)                                  | decodeer input om te gebruiken in een url                            |


## base64_encode

Met deze 'modifier codeer je data naar base64. Dit werkt niet op arrays.
Gebruik:
```
The base64 encoding of {$name} is {$name|base64_encode}.
```

## base64_decode

Met deze 'modifier' kan je base64 decoderen.
Gebruik:
```
The decoded information is {$base64encoded|base64_decode}
```

## cat

Met deze 'modifier' kan je een string samenvoegen met je variabele. Als de variabele een array is, 
wordt de string gebruikt. 
Gebruik:
```
{$name|cat:"string"}
```

## count

Met deze 'modifier' kan je het aantal elementen tellen in een array.
Er wordt een 0 teruggegeven als de variabele geen array is.
Gebruik:
```
{$names|count}
```

## count_characters

Met deze 'modifier' kan je het aantal tekens in een tekst tellen.
Er wordt in dit geval een 0 teruggegeven als de variabele waarop
deze 'modifier' wordt aangeroepen een array bevat.
Gebruik:
```text
{$name|count_characters}
```

## count_paragraphs

Met deze 'modifier' kun je het aantal paragrafen tellen in een tekst.
Er wordt een 0 teruggegeven als de 'modifier' wordt aangeroepen
op een array.
Gebruik:
```
The following text has {$text|count_paragraphs} paragraph.
Text:
{$text}
```

## count_words

Met deze 'modifier' kun je het aantal woorden tellen in een stuk tekst.
Hier wordt een 0 teruggegeven als de 'modifier' wordt aangeroepen op een
array.
Gebruik:
```
"{$text}" has {$text|count_words} words.
```

## default

Met deze 'modifier' kan je de 'default' waarde aanroepen die wordt gebruikt
bij het ontbreken van een bepaalde waarde.
Gebruik:
```
This will always show {$name|default:"something"}
```

## empty

Met deze 'modifier' kun je checken of een bepaalde variabele is aangegeven.
Het resultaat evalueert tot true of false.
Gebruik:
```
{if $name|empty}
    Dear customer,
{else}
    Dear {$name},
{/if}
```

## escape

Met deze 'modifier' kan je 'escape' aanroepen op een variabele. Deze 'modifier' werkt 
niet op een arrray. 
Gebruik:
```
{$text|escape:"html"}
is gelijk aan:
{$text|escape}
```

## indent

Met deze 'modifier' kan je indentatie toevoegen aan je tekst. 
Je kunt zelfs specificere hoeveel indentatie er nodig is en welke
tekens indentatie moeten ontvangen. De syntax is indent:num:char en
de 'default' is 1 en spacing respectievelijk. De 'modifier' wordt 
genegereerd bij gebruik op een array. 
Gebruik:
```text
{$text|indent:4:" "}
```

## md5

Met deze 'modifier' kan je de MD5 checksum van je tekst calculeren. 
Bij gebruik van een array, wordt de hele array gecalculeerd.
Gebruik:
```text
{$text|md5}
```

## nl2br

Met deze 'modifier' vervang je 'newlines' met HTML br tags.
Dit stelt je in staat om gewone tekst te schrijven dat op wordt gedeeld
in HTML modus. Dit werkt bij gebruik van een array.
Gebruik:
```text
{$text|nl2br}
```


## range

Met deze 'modifier' kun je een array als het ware opknippen door zelf 
de grenzen aan te geven waartussen de range moet vallen. Deze 'modifier' 
werkt niet als de variabele geen array is.
Gebruik:
```text
{$array|range:2:5}
```

## regex_replace

Met deze 'modifier' kun je delen van je tekst vervangen met andere tekst,
gebasseerd op ['regular expressions'](@todo). Dit werkt niet als de 
variabele een array is.
Gebruik:
```
This will replace each number in the variable string with the string " a number "
{$text|regex_replace:"\d":" a number "}
```

## replace

Met deze 'modifier' kun je een deel van de tekst vervangen met
andere tekst. De syntax is als volgt: replace:"string1":"string2".
Dit zorgt ervoor dat overal waar "string1" voorkomt, deze wordt 
vervangen door "string2". Dit werkt niet als de variabele een array 
is.
Gebruik:
```
{$text|replace:"hi":"hello"}
```

## sha1

Met deze 'modifier' krijg je de 'SHA1 hash' van de text terug. Een array 
wordt in z'n geheel gecalculeerd, behalve de 'keys'.
Gebruik:
```
{$text|sha1}
```

## sha256

Met deze 'modifier' krijg je de 'SHA256 hash' van de text terug. Een array 
wordt in z'n geheel gecalculeerd, behalve de 'keys'.
Gebruik:
```
{$text|sha256}
```

## sha512

Met deze 'modifier' krijg je de 'SHA512 hash' van de text terug. Een array 
wordt in z'n geheel gecalculeerd, behalve de 'keys'.
Gebruik:
```
{$text|sha512}
```

## spacify

Met deze 'modifier' kan je een teken of tekens toevoegen tussen elk teken
in je variabele. De syntax is als volgt: spacify:separator, waar de 'default'
scheiding een spatie is. Dit werkt niet als de variabele een array is.
Gebruik:
```
{$text|spacify:"."}
```

## strlen

Met deze 'modifier' kan de lengte van de variabele worden achterhaald.
Bij toepassing op een array, wordt de waarde 0 teruggegeven.
Gebruik:
```
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
