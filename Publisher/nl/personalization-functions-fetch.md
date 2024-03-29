# Personalisatie functies: fetch

Fetch kan gebruikt worden om bestanden van het locale systeem, HTTP of FTP 
op te vragen. Je kunt dan de inhoud van de bestanden tonen.

* **http**: URLs die beginnen met "http://" worden gebruikt om een website 
weer te geven.
* **ftp**: URLs die beginnen met "ftp://" zorgen dat het bestand wordt 
gedownload van de server en getoond in de template.

De functie heeft een **name** parameter die verplicht is en met **assign** 
kun je ook de opgevraagde inhoud in een variabele opslaan in plaats van deze 
te laten zien.

## Voorbeelden

Met de volgende code kun je informatie opvragen van een website, bijvoorbeeld 
het weer voor komende week:

    {fetch url="http://www.myweather.com/today/"}
    
Of je kunt deze in een variabele zetten en deze met je eigen HTML gebruiken.

    {fetch url="http://www.theweather.com/today/" assign='weather'}
    {if $weather ne ''}
      <div id="weather">{$weather}</div>
    {/if}

Dit voorbeeld gebruikt ook de [if functie](./personalization-functions-if).    
Je kunt ook downloaden van een FTP server. Het volgende voorbeeld laat 
daarnaast zien hoe je variabelen in een link kunt gebruiken.

    {fetch url="ftp://`$user`:`$password`@`$server`/`$path`"}

## Meer informatie 

* [if functie](./personalization-functions-if)
