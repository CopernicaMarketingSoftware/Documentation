# Dubbele opt-in Campagne
Commerciële e-mailverzenders mogen alleen verzenden naar adressen die daartoe
expliciet toestemming hebben gegeven: dit noemen we een opt-in. Dit houdt in
dat je niet zomaar een lijst met e-mailadressen mag kopen of *scrapen* van het
web. Wanneer een persoon zijn e-mailadres aan jou doorgeeft, bijvoorbeeld
door zich aan te melden voor nieuwsbrieven en aanbiedingen op jouw website,
geldt dat als een enkele opt-in.

Het is echter nog beter voor je sender reputation als je altijd een dubbele
opt-in gebruikt. Een dubbele opt-in bevestigt dat een gebruiker jouw e-mail
wilt ontvangen door te vragen om een confirmatie van hun inschrijving, meestal
door op een link te klikken die ze per email ontvangen.

## Aanmaken in Marketing Suite
1. Er is een [databaseveld](./database-fields) nodig die de dubbele optin
bewaart. Ga naar **Database & Profielen**, klik op het tandwiel en ga
vervolgens naar **Structuur bewerken**. Voeg een DoubleOptin veld toe met type
[meerkeuzeveld](./database-fields) met waardes "Ja"/"Nee" en standaardwaarde
"Nee".

2. Nu dient er een [opvolgactie](./follow-up-manager-ms) aangemaakt te worden,
die een mailing verstuurd wanneer er een nieuw profiel wordt aangemaakt.
Klik weer op het tandwiel en klik vervolgens op **Opvolgacties**.
Kies voor een nieuwe opvolgactie door op **Create followup** te klikken. De
reden waarom deze opvolgactie start is **Profile created**, selecteer deze
optie en klik op proceed. Klik aan de linkerkant op **Send email** en verbindt
dit blok aan **FollowUp start**. Klik op **edit** in het **send email**-blok
om de welkomstmail te selecteren. Als dit gedaan is, sluit je de opvolgactie en
sla je deze op.

3. Als laatste stap gaan we een opvolgactie aan de mail koppelen. Klik op
**Email designer** en ga klik de welkomstmail aan. Selecteer de button die het
emailadres gaat bevestigen, klik rechts op **Follow-up** en klik vervolgens op
aanpassen. Klik aan de linkerkant op **Update destination** en verbindt dit
blok aan **Klik op een knop**. Klik op **edit** in het update destination blok
en zet het veld DoubleOptin naar nieuwe waarde "Ja".

**Let op:** zet deze actie **alleen** in de Marketing Suite. Zet hem niet ook
nog in de Publisher, dan krijgen klanten 2 mails.

## Aanmaken in Publisher
1. Er is een [databaseveld](./database-fields) nodig die de dubbele optin
bewaart. Ga naar **Profielen** en klik op
**Databasebeer > Databasevelden wijzigen**. Voeg een DoubleOptin veld toe met
type [meerkeuzeveld](./database-fields) met waardes "Ja"/"Nee" en
standaardwaarde "Nee".

2. Nu dient er een [opvolgactie](./follow-up-manager-ms) aangemaakt te worden,
die een mailing verstuurd bij een nieuw profiel. Klik
**Databasebeheer > Database opvolgacties** en klik op
**Nieuwe opvolgactie aanmaken**. De aanleiding is
**er is een profiel aangemaakt**, de actie is
**Verstuur een opgemaakt document per e-mail** en er is geen wachttijd.
Klik op volgende en selecteer de welkomstmail.

3. Als laatste stap gaan we een opvolgactie aan de mail koppelen. Ga naar
**E-mailings** en selecteer het document die je als welkomstmail wilt
gebruiken. Klik bovenin op **Document naam > Opvolgacties** en klik op
**Nieuwe opvolgactie aanmaken**. De aanleiding is
**het registeren van een klik**, vul de juiste link in, de actie is
**Wijzig gegevens van het (sub)profiel** en er is geen wachttijd. Klik op
volgende, stel in dat veld 1 **DoubleOptin** is en dat waarde 1 **Ja** is.

**Let op:** zet deze actie **alleen** in de Publisher. Zet hem niet ook in de
Marketing Suite, dan krijgen klanten 2 mails.
