# Data-scripts

Het is goed om te weten, voordat op de inhoud wordt ingegaan,
dat je data-scripts alleen kunt gebruiken met het **nieuwe 
link tracking system**. De Marketing Suite maakt sinds de 
ontwikkeling al gebruik van dit nieuwe systeem en daarom 
hoef je hier dus geen speciale stappen voor te ondernemen. 
In de Publisher is het nieuwe link tracking systeem niet 
automatisch geactiveerd. Als je gebruik wilt maken van dit 
systeem, kun je dat handmatig activeren.

Met data-scripts kun je allerlei opvolgacties aan hyperlinks 
koppelen. Deze scripts worden door Copernica uitgevoerd, zodra 
iemand op zo'n hyperlink klikt. Dit werkt ongeveer hetzelfde 
als de scripts die je in een "onclick" van een hyperlink 
plaatst, met een belangrijk verschil: de scripts worden niet 
door de browser uitgevoerd, maar op de servers van Copernica. 
In de Marketing Suite hoef je alleen maar data-scripts toe 
te voegen op een van de volgende manieren:

* Je kunt ze in het "data-script" plaatsen van een &lt;a&gt; tag;
* Je kunt ze met de "drag-and-drop" editor invoeren.


## Beschikbare data-scripts

Er zijn verschillende soorten objecten die je in je 
data-scripts kunt gebruiken. Met deze objecten kun 
je gegevens uit je account ophalen en bewerken. 
Hiervoor zijn de volgende objecten beschikbaar:
                                      
* [copernica](./followups-scripting-copernica);
* [mailing](./followups-scripting-mailing);      
* [template](./followups-scripting-template);  
* [message](./followups-scripting-message);     
* [destination](./followups-scripting-destination);
* [profile](./followups-scripting-profile).        


Deze objecten hebben een ding gemeen. Namelijk, ze bezitten 
allen het [data data-script](./followups-scripting-data) 
dat je kunt gebruiken om informatie in op te slaan. 


## Voorbeeld

Je kunt gemakkelijk een profile aanpassen als iemand op een
link klikt:

```html
<a href="http://www.example.com" data-script="profile.fields.newsletter = 'no';">Klik hier om af te melden</a>
```

Het data-script wordt uitgevoerd als iemand op de link klikt. 
In bovenstaand voorbeeld wordt het veld "newsletter" dus op "no"
gezet bij een klik. Het voorbeeld is eenvoudig, maar als je wilt
kun je ook hele complexe scripts uitvoeren. Je treft nooit een 
data-script aan als je de broncode van een verstuurd bericht 
inspecteert. Het data-script wordt, vlak voor het versturen, uit 
de e-mail gefilterd en is dus niet zichtbaar voor de ontvanger.