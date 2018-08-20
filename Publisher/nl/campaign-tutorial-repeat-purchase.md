# Campagne Tutorial: Herhalingsaankopen

Aankopen bieden de mogelijkheid tot meer aankopen! Als je de levensduur 
van je producten weet kun je deze makkelijk gebruiken om herhaalde aankopen aan 
te moedigen. In deze tutorial laten we je een campagne zien waarmee je 
herhalingsaankopen stimuleert.

## Mogelijkheden identificeren

Om mogelijkheden te identificeren zullen we kijken naar de aankoopgeschiedenis. 
Met [collecties](./database-fields-and-collections) kun je makkelijk 
de aankopen van je klanten opslaan in je database. Wij raden je aan een 
[integratie](https://www.copernica.com/nl/integrations) met je webshop te maken 
om dit proces volledig te automatiseren. Je moet ook de data van de aankopen 
opslaan in de collectie om de tutorial te kunnen volgen. Als je een e-mailadres 
hebt voor elke order maakt dat de vervolgstappen gemakkelijker, maar dit is 
niet vereist. 

Laten we zeggen dat we twee telefoonmerken verkopen: A en B. Een telefoon 
van A gaat meestal 2 jaar mee, terwijl B maar 1,5 jaar mee gaat. We weten 
ook dat de klanten van de merken erg loyaal zijn en niet snel zullen switchen.

### Met e-mailadressen in collectie

Eerst maken we twee lijsten; Mensen die een telefoon A nodig hebben en mensen 
die een nieuwe telefoon B nodig hebben:

* Maak een nieuwe miniselectie "NieuweTelefoonA".
* Maak een nieuwe "AND" condition en zet deze op "Check on date or period".
* Selecteer het veld met de aankoopdatum.
* Zet de "before" en "after" data op 24 maanden geleden.
* Sla de miniselectie op en test deze.
* Doe hetzelfde voor een nieuwe miniselectie "NieuweTelefoonB", maar met 
18 maanden in de regel. Door twee miniselecties aan te maken promoten we 
de juiste telefoon voor de klant op het moment dat zij deze nodig hebben.

### Zonder e-mailadressen in collectie

Zonder een e-mailadres in de collectie moeten we data opslaan in het 
profiel zodat we deze kunnen e-mailen. We kopiëren data naar het profiel 
zodat we deze kunnen mailen:

* Maak twee velden "laatste_telefoon_a" en "laatste_telefoon_b" aan in je database.
* Selecteer de collectie met je orders en open de follow-up manager.
* Maak een follow-up met de trigger "Subprofile created" aan. 
* Voeg een Javascript execution box toe uit de advanced editor en voer de volgende code in:
```Javascript
if (subprofile.fields.category == "phones A") profile.fields.last_phone_a = subprofile.fields.purchase_date;
else if (subprofile.fields.category == "phones B") profile.fields.last_phone_b = subprofile.fields.purchase_date;
```
* Sla de follow-up op.

Elke keer dat er een subprofiel aan wordt gemaakt kijken we naar de categorie. 
Als de categorie een telefoon van A of B is wordt de aankoopdatum opgeslagen in 
het profiel. We kunnen nu twee [selecties](./database-selections-introduction) aanmaken 
om de klanten te mailen wanneer zij een nieuwe telefoon nodig hebben:

* Open de database en maak een nieuwe selectie aan. Geef het een duidelijke 
naam als "NieuweTelefoonA".
* Voeg een nieuwe "AND" condition toe aan de regel en selecteer "Check on date or 
period"
* Selecteer het veld met de laatste aankoopdatum voor een A telefoon.
* Zet de "before" en "after" data naar "24 months ago".
* Sla de selectie op en test deze.
* Maak dezelfde selectie voor "NieuweTelefoonB" met 18 maanden in plaats van 
24 maanden.

## Aanmoedigen tot herhalingsaankoop

Je kunt nu simpelweg een template aanmaken voor beide telefoons en een 
dagelijkse mailing inroosteren voor beide. Je klanten zullen de mail alleen 
ontvangen als de levensduur precies verlopen is en daarna niet meer.

## Meer informatie

Wil je meer informatie over follow-ups of selecties? Wil je meer informatie 
over personalisatie om je re-activatie campagnes nog interessanter te maken?
De onderstaande links helpen je op weg.

* [Follow-ups in Marketing Suite](./follow-up-manager-ms)
* [Selecties](./database-selections-introduction.md)
* [Campagne Tutorial: Profiel verrijking](./campaign-tutorial-profile-enrichment)
