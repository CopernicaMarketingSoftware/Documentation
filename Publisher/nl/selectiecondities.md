# Selectiecondities
Zoals eerder vermeld, filteren selecties de profielen in een database op basis van selectieregels. Een regel kan uit meerdere condities bestaan. Je kunt kiezen tussen EN-, OF- en OF NIET-condities, waarbij profielen respectievelijk aan alle of een deel van de condities moeten voldoen. Je kunt meerdere regels opstellen, die in verhouding staan door een OF- of een OF NIET-relatie. Je kunt je selectie dus zo inrichten dat profielen OF aan alle EN-condities van regel 1 voldoen, OF (niet) die van regel 2, enzovoorts. Hieronder beschrijven we alle soorten condities door middel van een voorbeeld.

## EN-conditie

Stel, je hebt een database met bedrijven. Hierin wil je een selectie maken op bedrijven in Haarlem uit de bedrijfstak industrie. Hiervoor maak je 1 selectieregel aan met 2 condities.

Selectieregel 1:
* Conditie 1 - neem alleen profielen op waarvan het veld 'Plaatsnaam' de tekst 'Haarlem' bevat.
    EN
* Conditie 2 - neem alleen profielen op waarvan het veld 'Branche' de tekst 'industrie' bevat.
Je selectie toont nu alle profielen van bedrijven die in Haarlem gevestigd zijn EN in de bedrijfstak 'industrie' opereren.

## OF-condities
Wanneer je profielen wilt inzien die aan een bepaalde conditie voldoende òf aan een andere conditie, dan maakt je een zogeheten OF-selectie. Dat wil zeggen dat je iedere conditie in een eigen regel plaatst. Profielen vallen binnen de selectie als ze aan een van de selectieregels voldoen.

Stel, je hebt een database met bedrijven. Je wilt hierin een selectie maken van de bedrijven uit Haarlem of Amsterdam.

Je maakt twee selectieregels aan:

* Selectieregel 1: Conditie - neem alleen profielen op waarbij in het veld 'Plaatsnaam' de tekst 'Haarlem' voorkomt.
    OF

* Selectieregel 2: Conditie - neem alleen profielen op waarbij in het veld 'Plaatsnaam' de tekst 'Amsterdam' voorkomt.
De selectie toont nu alle profielen uit Haarlem OF Amsterdam.

## OF NIET-selectie
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


