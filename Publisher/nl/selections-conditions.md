# Selectieregels
Zoals je misschien al weet bepaalt Copernica welke profielen er in een selectie komen op basis van bepaalde eigenschappen. Alle relatiegegevens die je opslaat in Copernica zijn te gebruiken als regels voor je selecties. Er zijn een hoop verschillende opties om te filteren, namelijk:

* **Veldwaarde**. Voorbeeld: Stel een selectie op die kijkt of het veld ‘Woonplaats’ overeenkomt met Amsterdam. Alle relaties die in Amsterdam wonen, staan dan in je selectie.
* **Interesse**. Voorbeeld: Je maakt een selectie van alle relaties die een voorkeur voor producten van ‘Apple’ hebben. Iedereen met een productvoorkeur van Apple komt dan in deze selectie terecht.
* **Datum**. Voorbeeld: Stel een selectie samen van alle relaties voor wie een garantie afloopt. De selectie controleert dan bijvoorbeeld of de datum van vandaag x-aantal maanden na de aankoopdatum ligt.
* **Campagneresultaat**. Er zijn verschillende opties om te controleren op e-mailcampagnes, sms-campagnes, faxcampagnes en enquetes. Voorbeeld: Maak een selectie van alle relaties die wel hebben geklikt op een hyperlink in je laatste e-mailing. Zo stuur je deze relaties makkelijk een opvolgactie.
* **Contactgeschiedenis**. Voorbeeld: Selecteer alle relaties waarmee je geen contact hebt gehad tussen datum x en datum y.
* **Inhoud van een andere (mini)selectie**. Voorbeeld: Stel een selectie op die gebruik maakt van de inhoud van een eerdere selectie die je hebt aangemaakt. Dit is een handige functie bij het combineren van selecties. Maak bijvoorbeeld een selectie van relaties die de afgelopen 6 maanden geen contact met je hebben gehad. En stel als extra regel in dat de relaties in de selectie met productvoorkeur “Apple” moeten voorkomen. Zo kan je deze relaties een speciale aanbodmail sturen met een korting op Apple-producten.
* **Veldwijziging** Er zijn een hoop verschillende opties voor wijzigingen van profielen. Voorbeeld: Als je checkt op verandering van het  veld 'Woonplaats', kun je een selectie maken van mensen die onlangs verhuisd zijn.
* **Eerdere exports**. Gebruik dit selectietype om profielen te selecteren die zijn geëxporteerd gedurende een bepaalde periode. 

Je kunt selecties ook gebruiken om een opgegeven aantal profielen alfanumeriek te sorteren. Lees [hier](sorting-and-selecting-profiles-in-a-database-or-collection) hoe.

## Regels en condities
Het filteren van profielen gebeurt door middel van selectieregels en selectiecondities. Hiermee geef je aan waar een profiel aan moet voldoen om bij een selectie te zitten. Belangrijk om te vermelden is dat een conditie in dit geval niet hetzelfde betekent als een regel. Een conditie is onderdeel van een regel; er kunnen er meerdere in een regel zitten. Een regel kan bijvoorbeeld zijn: een profiel moet vrouw zijn EN onder de 30. Vrouwen van over de 30 of mannen onder de 30 mogen er dan dus niet in. 

Je kunt er ook voor kiezen om een OF-regel te maken. Een regel kan alleen uit EN-condities bestaan, dus hierbij moet je meerdere regels opstellen. Een profiel moet dan aan een van de regels voldoen. Als je een selectie wil van alle vrouwen en alle mensen onder de 30, dan kun je dus zeggen dat iemand vrouw moet zijn OF onder de 30.

De laatste soort regel is een OF NIET-conditie. Deze doet eigenlijk hetzelfde als een OF-conditie, behalve dat hij alle geselecteerde profielen excludeert van de selectie in plaats van dat hij ze erin zet. 

Je zult zien dat je, ook als je een enkele regel instelt, je altijd OF of OF NIET moet selecteren. Dit kan verwarrend zijn: je hebt toch maar een regel? De gedachte hierachter is dat je bij OF de profielen die **wel** aan de regel voldoen in de selectie stopt en bij OF NIET alle profielen **behalve** die profielen.

Even samenvattend:
* Als je wil dat alle profielen in een selectie voldoen een of meerdere voorwaarden, gebruik je een OF-regel met EN-conditie(s).
* Als je wil dat alle profielen juist niet voldoen aan een of meerdere voorwaarden, gebruik je een OF NIET-regel met EN-conditie(s)
* Als je meerdere regels (dus 'OF' en niet 'EN') gebruikt, zijn de regels waar wel aan voldaan moet worden OF-regels en die waar juist niet aan voldaan moet worden OF NIET-regels.

## Voorbeelden
Ter illustratie van het bovenstaande vind je hieronder wat concrete voorbeelden van selectieregels.

### EN-conditie

Stel, je hebt een database met bedrijven. Hierin wil je een selectie maken op bedrijven in Haarlem uit de bedrijfstak industrie. Hiervoor maak je 1 selectieregel aan met 2 condities.

Selectieregel 1:

* Conditie 1 - neem alleen profielen op waarvan het veld 'Plaatsnaam' de tekst 'Haarlem' bevat.

    EN
    
* Conditie 2 - neem alleen profielen op waarvan het veld 'Branche' de tekst 'industrie' bevat.

Je selectie toont nu alle profielen van bedrijven die in Haarlem gevestigd zijn EN in de bedrijfstak 'industrie' opereren.

### OF-regels
je profielen wilt inzien die aan een bepaalde conditie voldoende òf aan een andere conditie, dan maakt je een zogeheten OF-selectie. Dat wil zeggen dat je iedere conditie in een eigen regel plaatst. Profielen vallen binnen de selectie als ze aan een van de selectieregels voldoen.

Stel, je hebt een database met bedrijven. Je wilt hierin een selectie maken van de bedrijven uit Haarlem of Amsterdam.

Je maakt twee selectieregels aan:

* Selectieregel 1: Conditie - neem alleen profielen op waarbij in het veld 'Plaatsnaam' de tekst 'Haarlem' voorkomt.
   
   OF

* Selectieregel 2: Conditie - neem alleen profielen op waarbij in het veld 'Plaatsnaam' de tekst 'Amsterdam' voorkomt.

De selectie toont nu alle profielen uit Haarlem OF Amsterdam.

### OF NIET-regels
Het is ook mogelijk een selectieregel op te stellen en te kiezen voor 'of niet'. Met OF NIET stel je een conditie op waaraan een profiel moet voldoen, maar zegt dan 'die wil ik juist niet in de selectie zien'. Bijvoorbeeld een selectieregel voor de plaats 'Haarlem', maar dan juist niet. Het gevolg is dat in de selectie alle profielen BEHALVE de uit Haarlem worden opgenomen.

In de meeste gevallen is dit niet nodig en kan je een reguliere en/of selectie maken. Er zijn uitzonderingen waarbij de reguliere regels niet volstaan en een OF NIET selectie uitkomst biedt. Bijvoorbeeld voor een selectie op relaties die nog NIET hebben meegewerkt aan uw enquete. Hiervoor maak je een selectie op de relaties die wel hebben meegewerkt, maar kies je voor de vorm 'OF NIET' zodat zij juist niet getoond worden en alle anderen wel.

Zoals gezegd zijn de mogelijkheden met selectieregels ontelbaar. Hieronder zie je een iets complexer voorbeeld.

## Voorbeeld 'OF' en 'EN' selectie gecombineerd

Je beschikt over een database met bedrijven. Je wil een mailing sturen aan bedrijven uit Haarlem OF Amsterdam, en alleen uit de branche Industrie.

De selectieregels zien er als volgt uit:

Selectieregel 1:

* Conditie 1 - neem alleen profielen op waarbij in het veld 'Plaatsnaam' de tekst 'Haarlem' voorkomt.
* Conditie 2 - neem alleen profielen op waarvan het veld 'Branche' de tekst 'industrie' bevat.

OF

Selectieregel 2:

* Conditie 1 - neem alleen profielen op waarbij in het veld 'Plaatsnaam' de tekst 'Amsterdam' voorkomt.
* Conditie 2 - neem alleen profielen op waarvan het veld 'Branche' de tekst 'industrie' bevat.

De selectie toont nu alle profielen waarvan het bedrijf in Haarlem OF Amsterdam is gevestigd, EN die allemaal in de branche industrie opereren.

## Veelgebruikte selecties
De mogelijkheden voor selecties zijn nagenoeg oneindig. Je kunt ze dus precies zo opzetten zoals ze het beste werken voor jouw databases. Om je wat inspiratie te geven hebben we wat tutorials gemaakt van veelgebruikte selecties:

* [Verjaardagsselectie](how-to-create-a-birthday-selection)
* [Nieuwsbriefselectie](create-a-mailing-list)
* [Automatisch verwerken van e-mailbounces](automatically-process-bounces)


