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
stap](www.copernica.com/nl/blog/beginnen-met-copernica-stappenplan-stap-3)

Stap 4: Aanmaken emailtemplate en emaildocument
-----------------------------------------------

Nu je je databse hebt ingericht kunnen we beginnen met het opstellen van
de eerste mailing. Ga bovenin naast **Profielen** naar **E-mailings**.
Emails maken doen we op basis van twee niveau's, het tempate niveau en
het document niveau. Het verschil tussen deze twee niveau's wordt het
beste duidelijk met het volgende voorbeeld. Stel, je verstuurt elke week
een nieuwsbrief, dan is de header, footer en stijling elke keer
hetzelfde. Dat gebeurt op template niveau. De inhoud van je nieuwsbrief
is elke week anders, je hebt andere artikelen en andere afbeeldingen bij
je artikelen. Dat gebeurt op document niveau.

#### Stap 4.1: Template aanmaken

Als eerste heb je een template nodig. Kies in het **Template** menu
**Nieuwe template...**. Vul in dit menu de naam in van de template
(bijvoorbeeld 'Nieuwsbrief') en klik op **opslaan**. De template wordt
aangemaakt en toegevoegd aan het linker overzicht onder **Templates en
documenten**. Je ziet nu een lege emailtemplate. Bij **Broncode
template** kan je de HTML-code die je voor je nieuwsbrief wilt gebruiken
zetten. Je kan hierbij gebruik maken van zogeheten content-blokken.
Content blokken kan je in je template zetten zodat je later op document
niveau makkelijk de tekst en de afbeeldingen in je nieuwsbrief kan
zetten. Er zijn drie soorten content-blokken:

-   [Tekst-blokken](https://www.copernica.com/nl/blog/template-blokken-het-tekstblok)
    In tekstblokken zet je straks de stukken tekst die je in je
    nieuwsbrief wilt hebben, dus de artikeltekst, titels, subtitels en
    dergelijken.
-   [Afbeelding-blokken](https://www.copernica.com/nl/blog/template-blokken-de-afbeelding-tag)
    In een afbeeldingsblok zet je de afbeeldingen die je in je
    nieuwsbrief wilt hebben, zoals de plaatjes naast artikelen en
    logo's.
-   [Loop-blokken](https://www.copernica.com/nl/blog/template-blokken-de-loop-tag)
    Een loopblok gebruik je om een bepaald stuk HTML te herhalen. Op
    document niveau kan je instellen hoe vaak. Zo kan je dus een artikel
    uit je nieuwsbrief, bijvoorbeeld een afbeelding en een stuk tekst,
    in een loopblok zetten zodat je eenvoudig het aantal artikelen kan
    aanpassen op documentniveau. Je kan ook een loopblok nul keer
    herhalen om zo een stuk weg te laten.

Voor meer informatie, klik op de links van elk soort blok. Met deze drie
soorten blokken kan je een template zo maken dat je daarna geen HTML
meer hoeft aan te passen of te schrijven bij het opstellen van je
nieuwsbrief elke week.

#### Stap 4.2: Een emaildocument aanmaken

Nu we een template hebben gaan we het eerste document onder deze
template aanmaken. Kies in het **Document** menu **Nieuw document...**.
Vul hier de naam in (bijvoorbeel 'Eerste nieuwsbrief') en klik op
**opslaan**. Je ziet nu je template met alle content-blokken leeg
gelaten. Als je onderaan op **Bewerkmodus** klikt en dan op een van
beide bewerkmodussen (Het maakt voor nu even niet uit welke.) zie je de
kaders van je content-blokken verschijnen. Als je nu op een content-blok
klikt kan je instellen wat de inhoud ervan wordt. De bepaalde blokken
kan je op de volgende manier vullen:

-   Tekst-blokken: Bij een tekstblok verschijnt er een eenvoudige tekst
    editor waar je je desgewenste tekst kan invoeren. Hier kan je ook
    lettertype en andere tekstopmaak instellen.
-   Afbeelding-blokken: Onderaan bij **Afbeelding uploaden** kan je de
    afbeelding die je in de nieuwsbrief wil uploaden of je kan bij
    **Afbeelding kiezen** een afbeelding die je al eerder hebt geüpload
    selecteren. Bij **Hyperlink** kan je eventueel een link instellen
    als mensen op de afbeelding klikken.

Vergeet niet om na het invullen van een content-blok op **opslaan** te
klikken. Als je deze stappen hebt gevolgd heb je een emaildocument
waarvan alle content-blokken zijn ingevuld.

#### Stap 4.3: Je document personaliseren

Behalve om selecties te maken kan je de data in je database ook
gebruiken om je emails te personaliseren. Het personaliseren van een
email doen we met Smarty tags . Met Smarty kan je heel eenvoudig data
uit je database in je nieuwsbrief plaatsen. Een Smarty tag maak je met
accolades en een dollarteken. Wil je bijvoorbeeld de data uit het veld
*Voornaam* in een tekstblok plaatsen hoef je alleen {\$Voornaam} in je
tekstblok te zetten. Zo kan je eenvoudig je nieuwsbrief beginnen met een
persoonlijke aanhef. Om een voorbeeld hier van te zien in het overzicht
moet je een standaardbestemming instellen. De standaardbestemming die je
instelt wordt straks ook gebruikt om een testmailing naar te sturen.
Kies in het **Welkom** menu **Standaardbestemming...**. Kies
Standaardbestemming wijzigen en vervolgens de database *Contacten*. Zoek
daarna op basis van een veld (bijvoorbeeld *Email*) in de database het
profiel dat je als standaardbestemming in wilt stellen. Sluit af door op
**opslaan** te klikken. Als je nu een Smarty tag in je tekstblok plaatst
en onderaan **Bewerkmodus** op **Bewerkmodus, gepersonaliseerd** zet,
zal je de personalisatie zien.

Na deze stap heb je een emailtemplate en een emaildocument gemaakt en
gepersonaliseerd, en is de inhoud van je email af.

[Ga door naar de volgende
stap](www.copernica.com/nl/blog/beginnen-met-copernica-stappenplan-stap-5)
