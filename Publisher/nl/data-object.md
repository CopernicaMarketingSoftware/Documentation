# Data-scripts
Met data-scripts kun je allerlei opvolgacties aan diverse triggers
koppelen. Deze scripts worden door Copernica uitgevoerd, zodra
zo'n trigger wordt geactiveerd. Dit werkt ongeveer hetzelfde
als de scripts die je in een "onclick" van een hyperlink
plaatst, met een belangrijk verschil: de scripts worden niet
door de browser uitgevoerd, maar op de servers van Copernica.
In de Marketing Suite kun je data-scripts toevoegen op een van de volgende
manieren:

* Je kunt ze in het "data-script" plaatsen van een &lt;a&gt; tag;
* Je kunt ze met de "drag-and-drop" editor invoeren.

Let op: Voor data-scripts heb je het nieuwe link tracking systeem nodig.
Als je Marketing Suite gebruikt hoef je geen extra stappen te ondernemen en
in Publisher kun je dit handmatig activeren in de instellingen van je account.

## Beschikbare data-scripts
Er zijn verschillende soorten objecten die je in je
data-scripts kunt gebruiken. Met deze objecten kun
je gegevens uit je account ophalen en bewerken.
Hiervoor zijn de volgende objecten beschikbaar:

* [copernica](./data-object-copernica);
* [mailing](./data-object-mailing);
* [template](./data-object-template);
* [document](./data-object-document);
* [message](./data-object-message);
* [destination](./data-object-destination);
* [profile](./data-object-profile).

Deze objecten hebben een ding gemeen. Ze bezitten namelijk
allen het [data data-script](./data-object-data)
dat je kunt gebruiken om informatie in op te slaan.

## Voorbeeld
Je kunt gemakkelijk een profiel aanpassen als iemand op een
link klikt:

```html
<a href="http://www.example.com"
   data-script="profile.fields.newsletter = 'no';">
  Klik hier om af te melden
</a>
```

Het data-script wordt uitgevoerd als iemand op de link klikt.
In bovenstaand voorbeeld wordt het veld "newsletter" dus op "no"
gezet bij een klik. Het voorbeeld is eenvoudig, maar als je wilt
kun je ook hele complexe scripts uitvoeren. Je treft nooit een
data-script aan als je de broncode van een verstuurd bericht
inspecteert. Het data-script wordt, vlak voor het versturen, uit
de e-mail gefilterd en is dus niet zichtbaar voor de ontvanger.

## Meer informatie
* [Follow-ups](./followups)
