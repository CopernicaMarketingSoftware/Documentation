# Automatisering met opvolgacties
In Copernica gebruik je opvolgacties om campagnes te automatiseren. Een opvolgactie is een vooraf ingestelde reactie op een gebeurtenis, bijvoorbeeld een klik of een profielwijziging. Zodra de gebeurtenis plaatsvindt, wordt Copernica aangespoord om een actie uit te voeren, die je zelf instelt. Je kunt ervoor kiezen om deze actie direct uit te voeren, maar je kunt ook een vertraging instellen. Je kunt zo veel opvolgacties instellen en aan elkaar koppelen als je zelf wilt. De MarketingSuite ondersteunt op dit moment nog geen opvolgacties. In de publisher beheer je opvolgacties met de zogeheten *Follow-up manager*. Je vindt hem onder het tabblad *Follow-ups*, of in het *Document*-menu als je in een document zit. Door te klikken op de elementen in de boom van opvolgacties kun je ze bewerken of nieuwe aanmaken.


![](../images/follow-up-tab.png)
*Database met meerdere collecties en follow-ups*

## Opbouw van een opvolgactie
Een opvolgactie bestaat uit drie componenten: een aanleiding, een wachttijd en een actie, die je allemaal in hetzelfde menu kunt aangeven. Je kunt opvolgacties maken voor mailings, databases/collecties, webformulieren en enquêtes. De specifiek beschikbare acties verschillen per medium, maar de essentie blijft hetzelfde.

![](../images/webform-followup.png)

Bij opvolgacties op databases of collecties en webformulieren bestaat de optie om een extra controle uit te voeren, waarmee je kunt controleren of de veldwaarden van het ingevulde formulier overeenkomen met veldwaarden die je opgeeft in de opvolgactie. De actie wordt dan alleen uitgevoerd wanneer de veldwaarden overeenkomen.

## Condities voor opvolgacties
Je kunt een opvolgactie wel of niet laten uitvoeren afhankelijk van gegevens uit het (sub)profiel aan wie de actie is gericht. Dit kun je doen door bij het overzicht van de follow-up in kwestie te klikken op *conditie bewerken*. Hierbij kun je kiezen uit de eenvoudige editor waarbij je door middel van de interface condities instelt, of in de geavanceerde editor, waarbij je vrij bent om je eigen JavaScript te schrijven.

We onderscheiden twee soorten condities: een activatieconditie en een uitvoerconditie. Bij een activatieconditie wordt de voorwaarde gesteld dat het (sub)profiel moet voldoen aan de conditie voordat de opvolgactie wordt aangestuurd, maar wordt tussen de aansturing van de actie en het daadwerkelijk uitvoeren (dus tijdens de wachttijd) niet meer gecheckt of het profiel nog voldoet aan de voorwaarden van de activatieconditie. Dit gebeurt wel bij de uitvoerconditie: hierbij wordt het (sub)profiel geëvalueerd voordat de actie daadwerkelijk wordt uitgevoerd. Is dit niet het geval, dan wordt de actie niet uitgevoerd. 

* Voorbeeld van een activatieconditie: je wil een opvolgmailing sturen over damesschoenen. Hierbij kun je de conditie stellen dat het veld 'geslacht' 'vrouw' moet zijn, zodat de heren in je database geen mailings krijgen over damesschoenen.

* Voorbeeld van een uitvoerconditie: je hebt een opvolgactie staan voor de nieuwsbriefselectie, maar met een wachttijd van een week. Je kunt dan door middel van een uitvoerconditie checken of het veld 'nieuwsbrief' na die week nog op 'ja' staat. Zo kun je voorkomen dat mensen die zich in de tussentijd hebben afgemeld voor je nieuwsbrief alsnog de mailing ontvangen.

## Personalisatie in opvolgacties
Bij opvolgacties (en e-mails naar aanleiding van deze opvolgacties) op webformulieren en enquêtes kun je tevens gebruik maken van Smarty-personalisatie. In een webform zijn, naast de profiel- en subprofielgegevens ook alle ingevulde gegevens op te vragen via de variabele 'webform.fields.*' Zo staat in de variabele 'webform.fields.veldnaam' de waarde van een het ingevulde veld 'voornaam'. Het is hierbij belangrijk om te melden dat de variabele gebruik maakt van de naam van het veld in de database, en niet het label dat wordt voorzien ter presentatie aan de gebruiker ("Uw voornaam:").  Als er ook collectievelden in het formulier zaten, dan kunnen deze worden uitgelezen via de variabele 'webform.fields.collectienaam.veldnaam'. Interesses kunnen worden uitgelezen als 'webform.interests.interessenaam'. In een opvolgactie of mailing kunnen ze worden uitgelezen via `{\$webform.fields.veldnaam}`.

In een enquête kun je verschillende variabelen gebruiken: survey.html, survey.xml en survey.questions. Survey.html en survey.xml bevatten respectievelijk een html- en een xml-representatie van de ingevulde enquête. Survey.questions bestaat uit een array van de ingevulde vragen. Iedere vraag bestaat uit zijn beurt uit de variabelen 'question', de originele vraag, 'type' met het type vraag ('open' voor open vragen, 'multi' voor meerkeuzevragen en 'grid' voor gridvragen) en 'answer' waarin het gegeven antwoord staat. Voor meerkeuzevragen is 'answer' een array met aangevinkte antwoorden en voor gridvragen is dit een associatief array met als index het label van de geselecteerde rij en als waarde het label van de geselecteerde kolom.

Bijvoorbeeld:

* Als je wilt controleren of vraag twee beantwoord is met een tekst die 'ja' bevat, kun je `survey.questions[2].answer.match(/ja/);` gebruiken. 

* Als bij meerkeuzevraag 7 minstens drie antwoorden moeten zijn ingevuld kun je dit zo doen: `survey.questions[7].answer.length >= 3`.
 
Je kunt wederom variabelen opvragen met Smarty: `{\$survey.questions.2.answer.1|escape}`

Een toepassing hiervan is bijvoorbeeld [de ingevulde antwoorden van een enquête opsturen](how-to-receive-the-answers-given-in-a-survey-by-email).

## Opvolgacties stoppen
Het kan gebeuren dat een opvolgactie niet zo werkt als gepland, bijvoorbeeld als je ze per ongeluk zo instelt dat ze oneindig door elkaar aangeroepen worden. In zo'n situatie kun je alle opvolgacties stoppen om uit te zoeken waar het misgaat, als een soort noodrem. Je vindt deze noodrem onder het *Mailings*-menu. Dit is alleen mogelijk bij opvolgacties voor mailings. 

Je kunt opvolgacties natuurlijk ook stoppen door ze te verwijderen. Ingeroosterde opvolgacties zullen dan ook niet meer uitgevoerd worden.



