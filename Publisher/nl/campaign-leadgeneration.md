# Leadgeneratie
Als je je bedenkt dat we tegenwoordig tot wel 122 e-mails per dag uitwisselen, kun je je voorstellen dat niemand staat te popelen om daar nog een extra e-mail bovenop te hebben. 
Met een slimme leadgeneratiecampagne kan je ervoor zorgen dat mensen toch bereid zijn om hun e-mailadres te delen in ruil voor je nieuwsbrief. Maar hoe zet je dit vervolgens om in Copernica, dat wordt hieronder voor verschillende leadgeneratie campagnes uitgelegd. 

## Formulier maken
Leadgeneratie start met dat een klant de mogelijkheid heeft om zichzelf aan te melden voor een nieuwsbrief. 
Dit doen zij meestal door middel van een formulier. 
Dit formulier kan in de footer van de website staan of aangeboden worden door middel van een pop up. 
De vraag is alleen waar dient de data van dit formulier naartoe te gaan, gaat het eerst naar je eigen database/CRM dan heb je geen Copernica formulier nodig. 
Wil je data direct in Copernica inschieten dan kan dit met de onderstaande methodes:

#### Formulier genereren 
Voor een **aanmeld** of **wijzig formulier** ga je **Websites** in de **Publisher**.
- Ga naar **Webpagina [NAAM]** en klik in het menu op **Formulier genereren**
- Kies **Aanmeldformulier** of **Wijzig formulier** en kies de database waar de nieuwe profielen ingezet worden  
- Kies in het volgende venster welke velden ingevuld moeten worden. Je kan hier ook een sleutelveld aangeven, waardoor je geen dubbele profielen in je database krijgt.
- Het is mogelijk om na het invullen van het formulier direct een mail te sturen. Deze kan je in het volgende venster als opvolgactie instellen. Deze [mail](./campaign-profile-enrichment#vervolgmail) wordt later in dit artikel toegelicht. 
- Voeg in het volgende venster een bedankpagina, captcha, etc toe
- Het laatste venster toont het HTML formulier. Dit formulier kan je nu op je eigen website plaatsen. 

**Tip**: om data direct naar de database te sturen zonder deze te vragen kan je het input veld hidden maken en gelijk de juiste waarde geven. 

```
<td>SingleOptin</td>
<td><input type="hidden" value=”Ja” name="dbfield49"/></td>
```

#### Webformulier
Op de volgende [pagina](./create-and-publish-a-webform) wordt beschreven hoe je een webformulier aanmaakt in Copernica. Dit webformulier moet op een Copernica landingspagina staan. 
Deze pagina kan je inladen als iframe op je eigen website of hier naar toe linken vanuit een mailing. 


## Winactie
Naast een standaard formulier kan het ook leuk zijn om een winactie te gebruiken in een formulier. Er zijn meerdere acties mogelijk maar we focussen ons nu op een actie waarbij bijvoorbeeld 100 winnaars worden gekozen. Dit kan je doen door de volgende stappen op te zetten:
- Maak een selectie aan die iedereen selecteert die mee deed aan deze winactie. Dit kan je bijvoorbeeld doen door een veld mee te geven het formulier die verborgen is. Hierdoor hebben alle nieuwe klanten via dit formulier een kenmerk.
- Maak vervolgens een selectie aan onder de winactie selectie en kies de conditie **Sorteer en/of selecteer profielen**, hiermee kunnen we het gewenste aantal profielen selecteren.
- Selecteer in deze conditie **willekeurig sorteren** in plaats van **sorteren op velden** en geef het gewenste aantal, in ons geval is dit 100. 
- Stel een nieuwsbrief in die een mail verstuurd naar deze selectie zodat alle winnaars op de hoogte gesteld worden. 
Deze selectie bevat nu 100 willekeurig geselecteerde winnaars. Hou er wel rekening mee dat elke keer dat de selectie opnieuw opbouwt er andere profielen geselecteerd worden. 

## Referral campagne
Met een referral campagne vraag je of een klant een andere klant aandraagt, echter mag deze klant geen email van een andere klant achter laten omdat dit geen optin geeft. 
Om deze reden maak je een persoonlijke link die de klant kan delen met andere personen. 
Deze link stuurt iemand naar een formulier waarbij een nieuwe klant zijn/haar gegevens kan achterlaten. Dit formulier dient de data naar Copernica te sturen of eerst naar je eigen systeem en daarna naar Copernica. 
De tweede optie is gebruikelijker omdat je dan ook een unieke kortingscode bij kan sturen naar Copernica. De data dient als volgt naar Copernica te gaan:
- Maak een collectie aan die Referrals heet. Hierin komen alle referrals van een profiel. Het kan namelijk voorkomen dat 1 klant meerdere klanten aandraagt. 
- Het formulier of koppeling dient een subprofiel in te schieten bij het profiel dat de klant aandroeg. Hierdoor kan je zien wie en hoeveel profielen dit profiel heeft aangedragen. Daarnaast dient het formulier een profiel te maken voor de nieuwe klant.
- Stel als laatst 2 opvolgactie in om de bijbehorende mails te versturen
- De eerste opvolgactie is een op het aanmaken van een subprofiel in de collectie Referrals en deze verstuurd een mail naar de aandrager met een kortingscode
- De tweede mail is opvolgactie op het aanmaken van een profiel met als actie het versturen van de welkomstcampagne of een double optin.



