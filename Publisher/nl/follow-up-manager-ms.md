# Follow-up Manager Marketing Suite
De Follow-up Manager is een gebruiksvriendelijke tool om geavanceerde campagnes te maken. Doordat deze tool geïntegreerd is met de template editor en database applicatie kun je op deze plaatsen geavanceerde en persoonlijke opvolgacties worden ontworpen. 
Binnen de follow-up manager kun je, door verschillende boxen met elkaar te combineren, geavanceerde marketingcampagnes maken. Geavanceerde boxen staan het toe om met JavaScript extra functionaliteiten toe te voegen. De beschikbare objecten kun je [hier](./followups-scripting) vinden.
 
## Database applicatie
Met de follow-up manager kun je in de database applicatie eenvoudig beginnen met automatiseren. De followups starten altijd met een trigger. Deze trigger is bijvoorbeeld een nieuw of gewijzigd profiel in een database. Hieromheen kun je met de follow-up manager campagnes automatiseren. Je kunt opvolgacties aanmaken op zowel een database als op een collectie.
Binnen de database app kun je de followups vinden binnen de database instellingen.

## Template editor
Zowel binnen de HTML template editor en de drag-n-drop template editor kun je op elke link een automatische opvolgactie maken. 
Je navigeert naar de Follow-up Manager door in de drag-n-drop template editor een CTA of link te selecteren waarvoor je een opvolgactie wilt gaan maken. Een follow-up actie kan je op twee manieren maken, met de eenvoudige flowchart editor en met de script editor.
Binnen de HTML template editor navigeer je binnen het menu Tools naar de link click follow-ups.

## Script editor
De script editor is net als de advanced boxes, voor een ervaren gebruiker. Hier kun je namelijk zelf aan de slag met JavaScript om zo geavanceerde campagnes op te zetten. Deze scripts worden, net als in de flowchart editor, uitgevoerd op de servers van Copernica als er op een link wordt geklikt. De beschikbare objecten vind je [hier](./followups-scripting).
 
## Lead scoring met de flowchart editor
Om een score met een punt te verhogen, is een Advanced Javascript Execute Box nodig. Je wilt namelijk niet alleen een score in een veld stoppen, maar ook de bestaande score behouden.

```Javascript
// update de score met 1
if (profile.fields.leadscore) profile.fields.leadscore += 1;

// als er nog geen waarde is opgeslagen 
else profile.fields.leadscore = 1;
```
