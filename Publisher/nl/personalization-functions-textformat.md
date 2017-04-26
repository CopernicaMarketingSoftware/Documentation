# Personalizatie functies: textformat

*Textformat* is een functie die toegepast kan worden op blokken tekst om 
deze te formatteren. Het verwijdert vooral spaties, speciale karakters en 
formatteert paragrafen door te wrappen en indentatie toe te voegen.

## Parameters

Het is mogelijk om een preset stijl te gebruiken (op het moment is alleen "email" 
beschikbaar), maar je kunt met de parameters ook zelf een stijl configureren.

| Variabele naam | Omschrijving                                     |
|----------------|--------------------------------------------------|
| style          | Preset stijl                                     |
| indent         | Aantal karakters voor indentatie                 |
| indent_first   | Aantal karakters voor indentatie eerste regel    |
| indent_char    | Character/string voor indentatie                 |
| wrap           | Aantal karakters om regel naar te wrappen        |
| wrap_char      | Karakter om een regel mee af te sluiten          |
| wrap_cut       | Wrap wel/niet op exact character ipv woord einde |
| assign         | Variabele om output aan toe te kennen            |

In het standaard geval wordt er geen indentatie gebruikt, maar een enkele 
spatie is wel de standaard voor *indent_char*. Elke regel wordt naar 80 
karakters gewrapt en op de grens van het woord gewrapt. Elke regel wordt 
afgesloten met een line break "/n".

## Voorbeeld

Er volgt nu een simpel voorbeeld uit de [Smarty documentation](http://www.smarty.net/docs/en/):

{textformat wrap=40}

   This is foo.
   This is foo.
   This is foo.
   This is foo.

   This is bar.

   bar foo bar foo     foo.
   bar foo bar foo     foo.

   {/textformat}

Van deze code krijgen we de volgende output:
    
    This is foo. This is foo. This is foo.
    This is foo.

    This is bar.

    bar foo bar foo foo. bar foo bar foo
    foo.
    
Maar dit bericht kan er ook heel anders uitzien:

    {textformat wrap=20 indent=5 indent_char="*" wrap_cut=TRUE}

    This is foo.
    This is foo.
    This is foo.
    This is foo.

    This is bar.

    bar foo bar foo     foo.
    bar foo bar foo     foo.

    {/textformat}
    
De output van deze code is het volgende:

    *****This is foo. Th
    *****is is foo. This 
    *****is foo. This is 
    *****foo.
    
    *****This is bar.
    
    *****bar foo bar foo
    *****foo. bar foo ba
    *****r foo foo.
    
Hoewel dit niet de mooiste manier is om te formatteren geeft het wel een 
indruk van hoeveel er mogelijk is in het formatteren van je tekst met 
deze functie.

## Meer informatie

* [Personalizatie](./personalization)
* [Personalizatie functies](./personalization-functions)
