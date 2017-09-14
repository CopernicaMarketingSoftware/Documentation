# Follow-up Manager Marketing Suite

De Follow-up Manager is een gebruiksvriendelijke tool om geavanceerde campagnes te maken. 
Doordat deze tool geïntegreerd is met de template editor kunnen er binnen 
de editor geavanceerde en persoonlijke opvolgacties worden ontworpen. 
De Follow-up Manager kun je gebruiken als iemand op een element klikt. 
Bijvoorbeeld op een link, afbeelding, video of een andere call-to-action.

Je navigeert naar de Follow-up Manager door in de template editor een 
CTA te selecteren waarvoor je een opvolgactie wilt gaan maken. Een 
follow-up actie kan je op twee manieren maken, met de flowchart editor 
en met de script editor.


## Flowchart Editor

Binnen de flowchart editor kun je, door verschillende boxen met elkaar 
te combineren, geavanceerde marketingcampagnes maken. 
Sommige boxen staan het toe om met JavaScript extra functionaliteiten toe te voegen. 
De beschikbare objecten kun je [hier](./followups-scripting) vinden. 

### Lead Scoring met de Flowchart Editor

Om een score met een punt te verhogen, is een Advanced Javascript Execute Box nodig. Je wilt namelijk niet alleen een score in een veld stoppen, maar ook de bestaande score behouden.


```Javascript
// update de score met 1
if (profile.fields.leadscore) profile.fields.leadscore += 1;

// als er nog geen waarde is opgeslagen 
else profile.fields.leadscrore = 1;
```


## Script editor

De script editor is voor de ervaren gebruiker. Hier kun je namelijk zelf aan de slag
met JavaScript om zo geavanceerde campagnes op te zetten. Deze scripts worden, 
net als in de flowchart editor, uitgevoerd op de servers van Copernica als er op een 
link wordt geklikt. De beschikbare objecten vind je [hier](./followups-scripting).
