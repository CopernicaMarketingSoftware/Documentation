In dit stappenplan wordt uitgelegd hoe je begint met het gebruiken van
Copernica. Vanaf de eerste stap, het aanmaken van een database, tot de
laatste stap, het versturen van je eerste nieuwsbrief, wordt alles
duidelijk uitgelegd. Om je zo snel mogelijk je eerste mailing te laten
versturen worden een aantal opties en instellingen in dit stappenplan
niet benoemd, die kan je voor nu op de standaard instellingen laten
staan. Later kan je hier natuurlijk altijd gebruik van maken. Mochten er
toch onduidelijkheden zijn kan je altijd contact opnemen met onze
support desk. (support@copernica.com) Dikgedrukte woorden zijn knoppen
en schuine woorden zijn namen die eerder in het stappenplan zijn
ingesteld.

[Ga terug naar de vorige
stap](www.copernica.com/nl/blog/beginnen-met-copernica-stappenplan-stap-4)

Stap 5: Email klaarmaken om te versturen
----------------------------------------

Nu we een template en een document hebben is de email zelf af maar
moeten we deze nog wel klaar maken om te versturen.

#### Stap 5.1: Unsubscribe en webversion link toevoegen

Eerder hebben we bij de database (stap 3.1) het uitschrijfgedrag
ingesteld. Dit uitschrijfgedrag kan onder andere geactiveerd worden
doordat de ontvanger op {ubsubscribe} klikt. Daarom moet een unsubscribe
link toegevoegd worden aan de header of de footer van de email. Dit
gebeurt op template niveau door de link {unsubscribe} toe te voegen aan
de broncode. Waar het in de nieuwsbrief staat mag je zelf weten, zolang
het er maar in staat. Het is ook fijn om een link naar de webversie van
je nieuwsbrief er in te hebben staan. Dit gaat op dezelfde wijze als de
unsubscribe link, met de link {webversion}. Aangezien het gek is om in
de webversie een link naar de webversie te hebben staan is het netjes om
deze link niet in de webversie te hebben. Dat doe je met de functie
{mailonly} {/mailonly}. Zet tussen deze tags de link naar de webversie.

Stap 5.2: Tekstversie toevoegen

Tegelijk met de HTML-versie kan er ook een tekstversie van de email
worden meegestuurd. Dit is bedoeld voor emailclients die geen HTML
ondersteunen. Bij veel emails wordt er geen tekstversie meegestuurd maar
het is erg belangrijk. Behalve dat sommige ontvangers je email niet
kunnen openen is de kans dat je email in een spambox terecht komt vele
malen hoger als je geen tekstversie hebt meegestuurd. Een tesktversie
van je email kan je eenvoudig maken door op het tabje **Tekstversie** te
klikken en daar de tekst uit je text-blokken te plakken. Daarna
uiteraard onderaan op **opslaan** klikken.

#### Stap 5.3: Authenticatie instellen

Om er voor te zorgen dat spamfilters je email goedkeuren is het
belangrijk om je emailauthenticatie in te stellen. Er zijn een aantal
zaken die je hiervoor moet instellen. Als eerste is er het Sender ID.
Dit kan je instellen met
[deze](https://www.copernica.com/nl/blog/sender-id-hoe-werkt-het-precies)
stappen. Hiervoor heb je toegang nodig tot de DNS-instellingen van je
domein. Mocht je dat niet hebben dan heeft de systemmbeheerder of
webmaster dat. Hij kan dan ook het beste het Sender ID instellen.\
 Als tweede is er de DKIM sleutel. Onder **E-mailings**, kies in het
**Extra** menu **DKIM-sleutels...** en dan **DKIM aanmaken**. Vul je
domein in en druk op **opslaan**. Volg daarna de stappen die staan
aangegeven. \
 Deze authenticatiestappen hoef je maar één keer te doen, ook als je
nieuwe documenten of templates maakt.

#### Stap 5.4: Afzender en Onderwerp instellen

De laatste dingen dat je nog moet instellen voordat je email klaar is om
verstuurd te worden zijn de afzender en het onderwerp. Klik links onder
**Templates en documenten** op je template en dan je document. Boven de
tabjes van je email kan je **Afzender:** en **Onderwerp:** instellen.
Vul bij **Afzender:** links een naam in (bijvoorbeeld 'Copernica') en
rechts het afzendadres (bijvoorbeeld 'test@copernica.com'). Vul bij
**Onderwerp:** het onderwerp in (bijvoorbeeld 'Eerste nieuwsbrief').

Na deze stap heb je alles voor je email ingesteld en is hij klaar om
verstuurd te worden. Je kan dit controleren door, als je je document
geselecteerd hebt, rechtsonder op de knop **Geen fouten** te klikken.
Het kan ook dat er wel een fout in zit of dat er een waarschuwing is.
Dan staat er **1**(of meer) **waarschuwingen**. Klik er op om te zien
wat er mis gaat en ga zo nodig terug naar die stap of neem contact op
met support (support@copernica.com). Als er bij **HTML-fouten** een paar
waarschuwingen staan is dat niet heel erg, zo lang er maar geen fouten
staan.

[Ga door naar de volgende
stap](www.copernica.com/nl/blog/beginnen-met-copernica-stappenplan-stap-6)
