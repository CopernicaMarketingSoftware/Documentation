# Selecties Tutorial: De nieuwsbrief selectie

Volgens zowel de wet als netiquette, moeten jouw ontvangers zich uit 
kunnen schrijven van jouw mailing lijst. Deze tutorial laat zien hoe je 
deze uitschrijvers automatisch buiten jouw lijst van ontvangers kan laten 
bij het versturen van een mail.

Je creëert een mailinglist in drie stappen:

1.  Voeg een "nieuwsbrief" veld toe aan je database.
2.  Stel je [uitschrijf gedrag](./database-unsubscribe-behavior) in en voeg uitschrijf links toe.
3.  Maak een nieuwe mailing list aan voor nieuwsbrief ontvangers.

## Voeg een "nieuwsbrief" veld toe aan je database.

Als iemand geen mail meer wil ontvangen moet deze zich uit kunnen schrijven. 
Je kunt ervoor kiezen mensen volledig uit je database te verwijderen, 
of de informatie te behouden en deze mensen niet meer actief te mailen. 
De meeste van onze klanten kiezen de laatste optie.

Om het verschil aan te merken voegen we een veld toe dat aangeeft of 
iemand wel of niet je nieuwsbrief wil ontvangen. Selecteer je database 
en voeg een veld toe.

* Geef je veld een duidelijk omschrijvende naam, zoals *nieuwsbrief*.
* Maak het veld multiple choice met waardes <empty\>, "Ja" en "Nee".
* Klik '*Show field on overview pages*' (om het veld bij het profiel 
zichtbaar te maken) en ‘*The field is indexed*’ (om de selectie sneller te maken) aan.
* Sla het veld op.

Je hebt nu een veld aangemaakt. Nu moet je alle gebruikers in je database 
op "Ja" zetten. Dit kan het makkelijkst in Publisher, waar meerdere profielen 
tegelijk bewerkt kunnen worden onder de huidige selectie als je database 
geselecteerd is. Je kunt ook [meerdere profielen bewerken](./rest-put-database-profiles) 
met de REST API.

### Uitschrijven

Als een gebruiker zich uit wil schrijven kan deze dat doen met een 
unsubscribe link in de mail. Je kunt deze toevoegen met de 
[unsubscribe functie](./personalization-functions-unsubscribe) in de 
template editor. Dit werkt alleen als je het 
[uitschrijfgedrag](./database-unsubscribe-behavior) hebt ingesteld.

### Selectie zonder uitschrijvers opstellen

Om uitschrijvers niet opnieuw te mailen gaan we een selectie aanmaken. 
Je moet hier voortaan je nieuwsbrieven naartoe sturen. Alle contacten 
die zich uit hebben geschreven worden automatisch weggelaten uit de 
selectie.

-   Maak een nieuwe selectie aan.
-   Geef deze een beschrijvende naam.
-   Sla de selectie op.
-   Maak een nieuwe conditie "Check op veldwaarde" aan.
-   Selecteer je nieuwsbrief veld uit de eerste stap.
-   Selecteer *is gelijk aan* en vul bij de waarde *Ja* in.
-   Sla de conditie op.

De selectie wordt nu vanzelf bijgewerkt en verzend mail alleen naar degenen 
die deze willen ontvangen.

## Meer informatie

* [Selecties](./database-selections-introduction)
* [Unsubscribe functie](./personalization-functions-unsubscribe)
* [Uitschrijfgedrag](./database-unsubscribe-behavior)
* [Tutorial: Dubbele opt-in voor nieuwe gebruikers](./create-a-double-optin-for-new-subscribers)
* [Tutorial: Verjaardagsselectie](./how-to-create-a-birthday-selection)
* [Tutorial: Email bounces afhandelen](./tutorial-automatically-process-bounces)
