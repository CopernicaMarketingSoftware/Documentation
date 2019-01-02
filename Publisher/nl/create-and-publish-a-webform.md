# Tutorial: Webformulier aanmaken en op een website plaatsen

In deze tutorial gaan we een webformulier aanmaken en op een website plaatsen.

*Deze tutorial is geschreven voor de Publisher*

## Webformulier aanmaken
We beginnen met het aanmaken van een webformulier onder **Content**. Dit is mogelijk onder het submenu *Webformulier*.
Na het aanmaken van het webformulier kun je beginnen met het toevoegen van velden. Je hebt hierbij de keuze uit een vijftal types:
* Veld
* Interesse
* Tekstblok
* Bestand uploaden
* Captcha

**Werking van het webformulier**

De werking van het webformulier is in te stellen onder *Webformulier [naam] -> Instellingen -> Profielen bewerken*.
Een webformulier heeft twee primaire opties waarmee je kunt werken:

1.  Op basis van een sleutelveld
Hierbij geef je bij één of meerdere veld(en) aan dat deze gebruikt moeten worden als sleutelveld. Het systeem zoekt op basis van deze sleutelvelden in de database of het profiel al bestaat.
*Let op: (sub)profiel gegevens kunnen hierbij niet vooraf ingevuld worden bij het bezoeken van het formulier*

2.  Op basis van het profiel van de ingelogde gebruiker
Bij deze werking geef je geen sleutelvelden aan bij velden in het formulier. De gegevens van het profiel worden opgehaald op basis van de URL van je webpagina in combinatie met extra parameters:
`http://subdomein.jouwdomein.nl/websitename?profile={$profile.id}&code={$profile.code}`

## Webtemplate aanmaken

Om het webformulier op een pagina te kunnen plaatsen dien je eerst een webtemplate aan te maken. Deze kun je aanmaken onder **Websites** *-> Template -> Nieuwe template*. Zodra het template is aangemaakt kun je de *Broncode template* vullen met HTML / CSS.

## Website aanmaken

Nadat de webtemplate is aangemaakt kun je ook een website aanmaken. Onder een website kunnen verschillende webpagina's vallen met verschillende webtemplates. 

## Webpagina aanmaken en formulier inladen

Vervolgens kun je binnen de website een webpagina aanmaken waar je formulier op komt te staan. 
Het formulier inladen op je webpagina is op twee manieren mogelijk:
1. Binnen een text blok maak je gebruik van de 'feed' optie
2. In de broncode of het text blok gebruik je de [{webform}](./personalization-functions-webform)-tag.

## Domein koppelen

Als laatste stap dien je een eigen (sub)domein te koppelen aan je website. Je kunt dit doen in het submenu *Website [naam] -> Domeinen*.
Nadat je het domein hebt toegevoegd zal je twee DNS wijzigingen moeten doorvoeren:
1. Een TXT record zodat wij het domein kunnen goedkeuren
2. Een CNAME record naar 'publisher.copernica.com' om de webpagina's weer te geven op de ingegeven URL.

## Meer informatie
* [Webformulieren](./webforms)
* [Websites](./websites)
