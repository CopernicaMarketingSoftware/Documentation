# Data-scripts

Voordat we beginnen met het uitleggen van data-scripts, is het goed om te weten
dat je data-scripts alleen kunt gebruiken met het **nieuwe link tracking system**.
De Marketing Suite maakt sinds de ontwikkeling al gebruik van dit nieuwe systeem 
en daarom hoef je hier dus geen speciale stappen voor te ondernemen. In de 
Publisher is het nieuwe link tracking systeem niet automatisch geactiveerd. 
Als je gebruik wilt maken van dit systeem, kun je dat handmatig activeren.

Met data-scripts kun je allerlei opvolgacties aan hyperlinks koppelen.
Deze scripts worden door Copernica uitgevoerd, zodra iemand op
zo'n hyperlink klikt. Dit werkt ongeveer hetzelfde als de scripts die je 
in een "onclick" van een hyperlink plaatst, met een belangrijk 
verschil: de scripts worden niet door de browser uitgevoerd, maar op de 
servers van Copernica. In de Marketing Suite hoef je alleen maar data-scripts
toe te voegen op een van de volgende manieren:

* Je kunt ze in het "data-script" plaatsen van een &lt;a&gt; tag;
* Je kunt ze met de "drag-and-drop" editor invoeren.


## Beschikbare objecten

In het script kun je gebruik maken van verschillende voorgedefinieerde variabelen 
en objecten waarmee je gegevens uit je account kunt ophalen en gegevens kunt
bijwerken. Hiervoor zijn de volgende globale variabelen beschikbaar:

| Variabele                                          | Omschrijving                         |
|----------------------------------------------------|--------------------------------------|
| [copernica](./followups-scripting-copernica)       | Copernica account                    |
| [mailing](./followups-scripting-mailing)           | Mailing van dit bericht              |
| [template](./followups-scripting-template)         | Huidige template                     |
| [message](./followups-scripting-message)           | Huidige template, gepersonaliseerd   |
| [destination](./followups-scripting-destination)   | Ontvanger (profiel of subprofiel)    |
| [profile](./followups-scripting-profile)           | Huidige profiel                      |

Daarnaast is het nog mogelijk dat er een globale [subprofile](./followups-scripting-subprofile) 
variabele aanwezig is met het subprofiel, mits deze mail naar een collectie 
of mini-selectie is verzonden.

Al deze objecten hebben een eigen [data object](./followups-scripting-data) 
dat je kunt gebruiken om zelf informatie op te slaan. Zie de link voor meer 
informatie en voorbeelden.


## Een eenvoudig voorbeeld

Je kunt heel makkelijk een profiel aanpassen als iemand op een link klikt:

```html
<a href="http://www.example.com" data-script="profile.fields.newsletter = 'no';">Klik hier om af te melden</a>
```

Het script in het "data-script" wordt uitgevoerd, als iemand op de link klikt.
In bovenstaand voorbeeld wordt het veld "newsletter" dus op "no" gezet bij een klik. 
Het voorbeeld is eenvoudig, maar als je wilt kun je ook heel complexe scripts uitvoeren.

Overigens, als je de broncode van een door Copernica verstuurd bericht inspecteert, 
tref je nooit een data-script aan. Het data-script wordt namelijk 
uit de e-mail gefilterd voordat het bericht wordt verstuurd, zodat dit niet zichtbaar 
is voor de ontvanger. Maar Copernica slaat het script wel op en voert het uit als op 
de link wordt geklikt.


## Meer informatie

* [Follow-up Manager](./follow-up-manager)
* [Database data-script](./followups-scripting-database)
* [Collection data-script](./followups-scripting-collection)
