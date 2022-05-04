# Copernica-training: personalisatie

## Personalisatie

In Copernica kun je e-mails personaliseren. Je doet dit door middel van een speciaal stukje code. 
Deze code wordt, voordat de e-mail is verstuurd, vervangen door de correcte gepersonaliseerde data. 
De personalisatie is geschreven in Smarty.

Personaliseren kan op verschillende manieren: een persoonlijke aanhef met de voor- 
en achternaam van de relatie, bepaalde content tonen op basis van een interesse, 
bepaalde producten niet tonen in een aanbieding als deze recent zijn aangeschaft, enzovoorts.
Deze code kan ook gebruikt worden om externe content in te laden, 
denk hierbij aan een productfeed of producten uit een verlaten winkelwagen.


Je kunt personalisatie in Copernica herkennen aan de accolades { }. 
Bijvoorbeeld **{$profile.Voornaam}** toont bij het verzenden van het document
de voornaam van het profiel als de naam van het veld in de database gelijk is aan Voornaam. 
In dit [artikel](https://www.copernica.com/nl/documentation/smarty) kun je meer lezen over de mogelijkheden van personalisatie. 

### Opdracht

Maak een e-mail op met een header, content en een footer. 
Experimenteer met de verschillende blokken om een mooie mail op te maken.

![trainingvoorbeeld](https://user-images.githubusercontent.com/94605656/166654884-34bca167-d171-482e-9a18-e79477af624c.png)

_Personalisatie_
```
Beste {if $profile.Voornaam != ""}{$profile.Voornaam}{else}relatie{/if}

Je ontvangt deze e-mail omdat je bent aangemeld met het volgende e-mailadres:
{$profile.Email}.
```

In dit geval verwijst {**$profile.Voornaam**} naar de waarde van het veld ​'Voornaam'​ in de
database waarnaar de mailing wordt verstuurd. Mocht het voornaamveld in een andere
database aangeduid worden als 'Firstname', dan zou je voor die database de code
**{$profile.Firstname}​** moeten gebruiken.

In bovenstaand voorbeeld wordt er een if/else-statement gebruikt om ervoor te zorgen dat, 
indien het voornaam veld van een profiel niet ingevuld is, de aanhef Beste relatie wordt. 
Je kunt dit kopiëren en plakken in je template, let er alleen op dat je het plakt 
zonder opmaak -> CTRL+SHIFT+V (of op iOS CMD+SHIFT+V).

**Opdracht**
Voeg personalisatie toe in de mail en klik op voorvertoning om te zien of de personalisatie werkt. 

![voorvertoning](https://user-images.githubusercontent.com/94605656/166655981-d5eb8660-4489-43a3-bd15-a1766596c3b8.png)

**Webversie en uitschrijflink**

Nu je de template volledig hebt gemaakt kun je een link naar de webversie en een uitschrijflink toevoegen. 
Binnen de editor kun je hier standaard tags voor gebruiken. Selecteer een tekst waarachter je een webversie- 
of uitschrijflink wilt plaatsen en klik bovenin op het link icoon. 
Vervolgens kun je links in het menu een link selecteren. 
Hier kun je de standaard webversie of standaard uitschrijflink toevoegen.

![webversie](https://user-images.githubusercontent.com/94605656/166656381-ad29ab2c-838e-40f1-bdfc-e9953828e44f.png)


Standaard leidt de uitschrijflink naar een witte pagina met de tekst ‘U bent uitgeschreven’. 
Let op: de webversie en uitschrijflink werken niet in testmailings. 
```
Verwijzen naar een eigen URL kan ook: 
{unsubscribe redirect="http://www.eendomein.nl/eigenlandingspagina.html”}
```
