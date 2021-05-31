# Headers

Headers worden gebruikt om informatie mee te geven aan een e-mail. Binnen templates en documenten zijn er drie soorten headers, namelijk:
- Essentiële headers
- Geavanceerde headers
- Aangepaste headers

## Essentiële headers
Hier vind je de headers die nodig zijn om een mailing te versturen:
- Een onderwerp
- Een afzendernaam
- Een afzenderadres

Het is mogelijk om deze waardes te personaliseren met [Smarty](./smarty). 

**Voorbeeld**  
Je wilt een mailing versturen vanuit het e-mailadres van de accountmanager van een profiel. In de database staat een veld _accountmanager_ waarin wordt bijgehouden per profiel wie de accountmanager is. Het kan ook voorkomen dat dit veld niet gevuld is bij het profiel. In de optie _afzenderadres_ gebruik je de volgende code:

```
{if $profile.accountmanager == "Frank Bakker"}frank.bakker{else}info{/if}
```

In bovenstaand voorbeeld wordt de e-mail verzonden vanuit _frank.bakker@domeinnaam.nl_ als het veld _accountmanager_ overeenkomt met de waarde _Frank Bakker_. Mocht dit niet het geval zijn of de waarde is leeg, wordt de mail verzonden vanuit _info@domeinnaam.nl_.

## Geavanceerde headers
Naast de essentiële headers kun je geavanceerde headers toevoegen aan je mailing.  

### Antwoordadres
Dit is een e-mailadres dat gebruikt wordt wanneer een ontvanger wil antwoorden op je e-mail. Standaard wordt het afzenderadres gebruikt, als je een ander adres wilt gebruiken kun je dat hier instellen.

### BCC-adres
Deze header maakt het mogelijk de e-mail naar een extra ontvanger te sturen. Dit e-mailadres is niet zichtbaar bij de hoofdontvanger.

### Uitschrijfheader
Een aantal e-mailclients plaatsen automatisch een afmeldknop bovenin de e-mail zodra er ergens in de e-mail een afmeldlink voorkomt. Voor de ontvanger is het een gemakkelijke manier om af te melden en voor verzenders is er minder kans dat de ontvanger het bericht als spam markeert.  

Er zijn twee opties die e-mailclients gebruiken om een afmelding te registreren. Afhankelijk van wat het systeem ondersteunt stuurt de e-mailclient een e-mail naar Copernica met het verzoek om af te melden of klopt deze aan bij een link. In beide gevallen verwerken wij de afmelding automatisch volgens het [uitschrijfgedrag](./database-unsubscribe-behavior) op de database.  

Wij raden bij het instellen aan om gebruik te maken van de **Volledige uitschrijfheader**. Hierbij worden beide opties meegenomen.

## Aangepaste headers
Hier kun je x-headers toevoegen aan je mailing. De "X" in X-header staat voor eXperimenteel of eXtensie. Je kunt hier je eigen waarden voor gebruiken om extra informatie mee te geven aan je e-mail. Je kunt dus helemaal zelf bepalen welke X-headers je gebruikt of wat je meegeeft. Je kan bijvoorbeeld de naam van je selectie of campagne meegeven voor je eigen statistieken.

Het is mogelijk om in deze waardes personalisatie te gebruiken. 
