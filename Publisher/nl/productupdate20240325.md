# Productupdate - Nieuw: krachtigere opvolgacties, SMS en meer!

## Meerdere startpunten in opvolgacties
In Marketing Suite-opvolgacties is het mogelijk gemaakt om meerdere startpunten toe te voegen binnen dezelfde opvolgactie. Hierdoor is het bijvoorbeeld mogelijk om een flow uit te voeren wanneer een profiel wordt aangemaakt óf bewerkt. Voorheen had je hiervoor twee aparte opvolgacties nodig, waardoor je opvolgacties snel onoverzichtelijk werden.

Je kunt meerdere startpunten gebruiken in je opvolgacties door een extra 'Start van de opvolgactie'-blok toe te voegen.

Meer informatie over het instellen van opvolgactie lees je in onze [documentatie](https://www.copernica.com/nl/documentation/email-editor-followups).

## Personaliseren van het afzenderadres
In de Marketing Suite is het nu mogelijk om niet alleen de afzendernaam, maar ook het afzenderadres te personaliseren. Hierdoor hoef je niet langer meerdere templates te maken wanneer je e-mails wilt verzenden vanuit verschillende domeinen, bijvoorbeeld als je webshop in meerdere landen actief is. Je kunt het afzenderadres personaliseren door de optie 'Gebruik een gepersonaliseerd afzenderadres met Smarty code' in te schakelen bij de headers van je template.

In plaats van een dropdown-lijst met geldige [sender domains](https://ms.copernica.com/#/admin/account/senderdomains), zie je nu een vrij invulveld waarin je Smarty-statements kunt gebruiken. Stel dat je een taalveld in je database hebt dat is gevuld met de waarden NL of BE, dan kun je nu voor elke taal als volgt een apart afzenderadres instellen:

    {if $taal =="BE"}info@copernica.be{else}info@copernica.nl{/if}

Meer informatie over het personaliseren van de afzendernaam of het afzenderdomein vind je in onze [documentatie](https://www.copernica.com/nl/documentation/email-editor-headers#essentiele-headers).

## Opzetten van SMS-campagnes binnen Marketing Suite
We hebben de SMS-module toegevoegd aan Marketing Suite. Het versturen van SMS-campagnes was al mogelijk met Copernica, maar voorheen moest je hiervoor nog onze [verouderde Publisher-omgeving](https://www.copernica.com/nl/blog/post/stap-nu-over-van-publisher-naar-marketing-suite) gebruiken. De module is te vinden in het Marketing Suite-menu onder [SMS-editor](https://ms.copernica.com/#/mobile).

In [dit artikel](https://www.copernica.com/nl/blog/post/opzetten-van-sms-campagnes-binnen-marketing-suite) leggen we uit wat de voordelen van SMS-campagnes zijn naast je huidige e-mailmarketing activiteiten. Ook geven we enkel tips waar je op moet letten voordat je een SMS-campagne opzet.

## Verbeteringen Marketing Suite
Wanneer je een template kopieert die zich binnen een map bevindt, zal het nieuwe template automatisch in dezelfde map worden geplaatst zodra het is aangemaakt.

Ook is er binnen een selectieregel de optie 'kopiëren' toegevoegd. Hierdoor kun je eenvoudig een regel met meerdere condities nogmaals gebruiken binnen dezelfde selectie. Dit is vooral handig wanneer je meerdere regels wilt gebruiken waarbij enkele condities binnen elke regel verschillen. Op deze manier hoef je niet telkens alle andere overeenkomstige condities opnieuw in te stellen.

Bovendien is het zoeken in de [profielen](https://ms.copernica.com/#/profiles)-module niet meer hoofdlettergevoelig.

Daarnaast zijn de [personalisatievariabalen](https://www.copernica.com/nl/documentation/publisher-personalization-variables) {$profile.database.id} en {$profile.database.name} beschikbaar gemaakt. Hiermee kun je het ID of de naam van de database ophalen waarin het profiel zich bevindt. Dit kan bijvoorbeeld worden gebruikt om dynamisch data op te halen uit een andere database of collectie met behulp van de [load(sub)profile](https://www.copernica.com/nl/documentation/loadprofile-and-loadsubprofile)-tag.

Tot slot hebben we de talen Iers, Oostenrijks, Zwitsers-Duits en Zwitsers-Frans als vertaalopties toegevoegd aan de [vertaalmodule](https://www.copernica.com/nl/documentation/multi-language).
