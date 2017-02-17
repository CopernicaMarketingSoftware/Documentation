# Bounce management met Copernica

Hoe gaat u op correcte wijze met uw bounces om met behulp van Copernica?

Selectie op basis van bounces
-----------------------------

Binnen Copernica is het mogelijk selecties aan te maken op basis van
foutmeldingen ontvangen na de eerste e-mailing. Dit doet u binnen de
applicatie door onder 'Profielen' een selectie aan te maken die kijkt
naar de resultaten van een verzonden e-mailcampagne. Stel daarbij in dat
er een foutmelding moet zijn geregistreerd. Hierbij kunt u selecteren of
u de selectie instelt op een specifieke foutmelding of op een
foutmelding die opnieuw zal optreden bij het verzenden van een volgende
mailing.  Bijvoorbeeld: ![Selectie aan op basis van foutmelding
aanmaken](../images/hardbounce.png)

-   Als gevolg van de e-mailing is de volgende fout geregistreerd: *Fout
    die waarschijnlijk opnieuw zal optreden bij het verzenden van een
    ander bericht*

Door vervolgens uw nieuwsbriefselectie de opdracht te geven data uit de
aangemaakte 'bounceselectie' niet op te nemen, worden e-mailadressen die
een bounce registreerden bij de eerste mailing niet meegenomen in uw
volgende mailing. Zo voorkomt u nieuwe foutmeldingen en dat uw
e-mailreputatie schade oploopt. Bovenstaande selectie zou u kunnen
definiëren als een selectie op hard bounces. U kunt ook rekening houden
met 'soft' bounces door een extra selectie aan te maken met dezelfde
selectievoorwaarden als het bovenstaande voorbeeld. Alleen duidt u bij
deze selectie wel een specifieke foutmelding aan. Bijvoorbeeld:

-   Als gevolg van de e-mailing zijn de volgende fout(en)
    geregistreerd: *5.7.1: Delivery not authorized, message refused*

Daarbij stelt u dan als extra voorwaarde in dat de mailing reeds 2 tot 3
keer is verzonden vooraleer het betreffende profiel tot deze selectie
gaat behoren. Vervolgens voegt u aan uw nieuwsbriefselectie de
voorwaarde toe dat adressen uit bovenstaande selectie niet geselecteerd
worden (net als bij de eerste bounceselectie).

Controleer uw instellingen
--------------------------

Binnen Copernica zijn uw verzendinstellingen configurabel en controleert
u gemakkelijk of uw authenticatiegegevens op orde zijn zoals
uw [SPF](http://www.copernica.com/nl/over-ons/nieuws/spam-verminderen-met-behulp-van-spf "SPF"), [SenderID](http://www.copernica.com/nl/over-ons/nieuws/sender-id-hoe-werkt-het-precies "SenderID") en [DKIM](http://www.copernica.com/nl/over-ons/nieuws/dkim-domainkey-identified-mail "DKIM").
Zorg er te allen tijde voor dat deze gegevens kloppen.
Authenticatiegegevens die niet goed zijn ingesteld resulteren in meer
foutmeldingen en ook een slechte deliverability. De verzendinstellingen
van uw e-mailing zijn configurabel. Dat betekent dat u bijvoorbeeld
instelt hoeveel berichten per verbinding verstuurd worden of wat de
verzendlimiet per specifiek domein (Hotmail, Gmail) is. Hierdoor kan het
verzenden van uw e-mailings minder vertraging oplopen.

Door deze instellingen aan te passen kunt u overbelasting van de
ontvangende server voorkomen. Dat vermindert het risico om als spam
gekenmerkt te worden en dus ook de kans op foutmeldingen/bounces.
Copernica doet er alles aan om ervoor te zorgen dat u beschikt over een
goede deliverability beschikt. Vandaar dat wij altijd de aanbevolen
instellingen hanteren voor optimale verzending. Indien u e-mailings
verzendt, kan het gebeuren dat een ontvangende mailserver (bv. Hotmail)
vindt dat u te veel berichten verzendt. Dit geeft deze server dan door
aan de [mailsender
(MSA)](http://www.copernica.com/nl/over-ons/nieuws/behind-the-software-mailsender-msa "Mailsender").
In dit geval zal de MSA automatisch uw verzendlimiet verlagen opdat uw
berichten wel worden doorgelaten. Na 1 uur herstelt de MSA automatisch
de verzendlimiet naar de oorspronkelijke stand.

Gebruik maken van feedbackloopprogramma's
-----------------------------------------

Het is mogelijk om abusemeldingen die binnenkomen over uw verzonden
e-mail binnen Copernica automatisch te verwerken. Daarvoor moet u zich
aanmelden bij 'Feedbackloopprogramma's'. ISP's (internet service
providers) zoals Yahoo, Hotmail of AOL bieden dit aan als dienst voor
partijen die bulkmailings versturen. Via deze programma's is het
mogelijk om te achterhalen wie de e-mailings als 'spam' markeren zodat u
hier direct op kan reageren. Of u stelt Copernica zodanig in dat de
software hier automatisch voor u op reageert. Door in te stellen dat de
ontvanger wordt afgemeld of zijn profiel wordt verwijderd uit de
database zodra er een abusemelding binnenkomt. Indien u gebruik maakt
van Copernica wordt u standaard ingeschreven voor de
feedbackloopprogramma's van Hotmail. Hieronder een aantal ISP's die
feedbackloopprogramma's aanbieden. Het aanmelden kan middels formulieren
op de websites.

-   [Yahoo Feedback
    Loop](http://feedbackloop.yahoo.net/ "Yahoo Feedback Loop")
-   [AOL Feedback
    Loop](http://www.postmaster.aol.com/Postmaster.FeedbackLoop.php "AOL Feedback Loop")
-   [OpenSRS/ Tucows](http://fbl.hostedemail.com/ "OpenSRS/ Tucows")
-   [Comcast](http://feedback.comcast.net/ "Comcast")
-   [United
    Online](http://www.unitedonline.net/postmaster/whitelisted.html "United Online")

Gmail: biedt helaas geen feedbacklooppprogramma aan partijen die
bulkmailings versturen. Zij maken gebruik van ingewikkelde
filtertechnieken om zelf te bepalen wat spam is en wat niet. Wel bieden
zij de mogelijkheid aan de gebruikers van Gmail om zich af te melden van
onnodige e-mailings als er gebruik wordt gemaakt van een 
[list-unsubscribe
header](http://www.copernica.com/nl/over-ons/nieuws/list-unsubscribe-header-een-reputatieverbeterende-e-mailheader "List-unsubscribe header")
 door de verzender. Copernica stuurt automatisch de list-unsubscribe
header mee met e-mails opgemaakt in de applicatie, tenzij u als
gebruiker deze functie uitschakelt.

Hou altijd uw statistieken bij
------------------------------

Copernica houdt voor u de foutmeldingen van e-mailings bij. Hou deze
goed in te gaten om bij mogelijke uitschieters meteen in te grijpen.
Binnen Copernica worden onder andere in volgende gevallen fouten
geregistreerd:

-   *Samenstelling van mailing* Er is een fout opgetreden nog voor
    verzending binnen Copernica Marketing Software. Dit kan voorkomen
    door een fout in uw personalisatie of een feed die niet goed
    ingeladen wordt.
-   *Domeinnaam omzetten naar IP adres* Het domein van de geadresseerde
    (@xxx.xx) is niet (goed) gekoppeld aan het IP adres, waardoor het
    niet verstuurd kan worden.
-   *Verbinding maken met ontvangende mailserver* Er kon geen verbinding
    worden gemaakt tussen de mailserver van Copernica en de ontvangende
    mailserver. Mogelijk is de ontvangende server verkeerd
    geconfigureerd.
-   *Communicatie met ontvangende mailserver* In het 'gesprek' tussen de
    verzendende en ontvangende mailservers is iets misgegaan. Dit wil
    niet persé zeggen dat uw mail niet is afgeleverd. Alleen is het
    proces niet verlopen zoals het hoort.
-   *Geweigerd door ontvangende mailserver* De ontvangende mailserver
    heeft uw mailing afgewezen. Bijvoorbeeld vanwege spamfilters of
    greylisting (onbekende afzender).
-   *Later ontvangen foutmeldingen per e-mail* De mailing leek goed te
    verlopen, maar de ontvangende server heeft later nog een
    foutrapportage doorgegeven. Het is niet zeker of de mail nog is
    aangekomen bij de ontvanger.
-   *Overige ontvangen terugmeldingen per e-mail* Er is een antwoord
    ontvangen van de geadresseerde of de ontvangende mailserver, maar
    deze bevatte geen foutcode. Dit zijn bijvoorbeeld out of office
    replies.
-   *Niet gerubriceerde fouten* Copernica Marketing Software heeft de
    fout niet herkend.
