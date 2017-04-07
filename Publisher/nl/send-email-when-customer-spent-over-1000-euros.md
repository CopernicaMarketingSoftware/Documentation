# Tutorial: Verstuur een email wanneer een gebruiker meer dan 1000 euro besteedt.

Deze tutorial geeft een voorbeeld van hoe je campagnes kan automatiseren. 
In dit geval gaan we een email versturen als een gebruiker meer dan 1000 
euro in je webshop uitgeeft.

Voor deze tutorial heb je een database nodig met een collectie waarin je 
informatie opslaat over gekochte producten in het profiel. Er wordt vervolgens 
een mail gestuurd naar de klant wanneer de aankopen van deze meer dan 1000 euro 
zijn.

## Beginnen

Begin met het aanmaken van het email document dat je naar de klant wilt 
versturen. Schrijf bijvoorbeeld: "Bedankt voor de aankopen in onze webwinkel! 
Hierbij ontvangt u een unieke code om te gebruiken voor uw volgende aankoop."

Je hebt in de **product** collectie een veld genaamd *product_price*. Dit veld 
kun je gebruiken om de aanschafprijs van een product op te slaan.

In de database voeg je een nieuw veld toe, genaamd *Totaal*. Je kunt dit 
veld later gebruiken om het totaal uitgegeven bedrag op te slaan.

Voeg nu een [opvolgactie](./followups) toe aan de collectie waar de 
producten zijn opgeslagen.

- Kies bij **Aanleiding** voor "Er is een subprofiel aangemaakt".
- Kies bij **Actie** voor "Wijzig gegevens van het subprofiel".
- Kies bij **Veld 1** het vak *Totaal*.
- Voeg de volgende code in bij de waarde

`{capture assign="total"}0{/capture}{foreach from=$profile.products item=sp}{capture  assign="total"}{$sp.product_price+$total}{/capture}{/foreach}{$total}`

- Sla de opvolgactie op.

Om de opvolgactie te testen kun je een subprofiel (product) toevoegen aan 
de collectie van je test bestemming. Je kunt dan bevestigen of de prijs 
correct wordt toegevoegd in het veld *Totaal* in de database.

Dat werkt, toch?

## Verstuur de email

De email kan vervolgens verzonden worden als follow-up, of als een ingeroosterde 
mailing. Die laatste optie is de meest logische en wordt verder uitgelegd.

Maak een nieuwe selectie in je database en geef deze de volgende 
condities:

- Bekijk waarde van het veld *Total*. Dit moet groter zijn dan 1000.
- **AND**
- Bekijk email resultaten: Selecteer waar document X nog niet naar is verzonden.

Document X is hier je email document dat als reactie is verzonden over de 
gekochte producten.

De selectie zal nu profielen bevatten die meer dan 1000 euro in je webshop 
hebben uitgegeven, maar de mail nog niet hebben ontvangen.
Om dit te laten werken moet je de mailing wel periodiek laten verzenden, 
bijvoorbeeld dagelijks.

Zorg uiteraard, zoals altijd, dat je je campagne hebt getest voordat je 
je klanten emailt.

[Terug naar campagnes automatiseren](./automate-campaigns)
