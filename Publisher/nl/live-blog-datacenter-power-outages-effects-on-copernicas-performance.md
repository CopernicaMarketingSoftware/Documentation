Als ontwikkelaar van webbased software is het hét doemscenario: niet
bereikbaar zijn. Omdat je servers offline zijn, vanwege een bug in een
release of vanwege overbelasting. Bij Copernica Marketing Software doen
we er daarom alles aan om te voorkomen dat dit gebeurt. Vannacht ging
het echter toch nog mis door een stroomstoring bij ons datacentrum
Leaseweb.

Voordat we updates aan de software doorvoeren, testen we die uitvoerig.
We releasen vervolgens - je kan maar nooit voorzichtig genoeg zijn -
altijd buiten de piekuren om. Mocht er dan onverhoopt toch iets stuk
gaan, dan kan het onmiddellijk weer worden teruggedraaid zonder dat
gebruikers er iets van merken.

Daarnaast hebben we een indrukwekkend park van backupservers. Om extra
druk op te vangen en overbelasting te voorkomen. En dus ook om de
applicatie te laten draaien als de andere servers er om wat voor reden
dan ook mee ophouden.

Zwakste schakel
---------------

Een ketting is echter zo sterk als zijn zwakste schakel. Alle
voorzorgsmaatregelen ten spijt, in sommige gevallen ben je nog steeds
afhankelijk van de zorgvuldigheid van anderen. Dat werd gisteravond nog
maar eens extra duidelijk toen het bij ons datacentrum Leaseweb misging.

Een technische storing bij dat bedrijf zorgde ervoor dat de
stroomtoevoer naar onze servers wegviel. Onze hoofd- als backupservers
werkten hierdoor geen van alle meer.

Wat betekent deze fout voor Copernica en zijn gebruikers? Een live
reconstructie.

30 OKTOBER
----------

**23.45 uur –**Vanuit het niets is onze applicatie onbereikbaar. Ook de
website is offline. Een medewerker die monitoringdienst heeft wordt door
een automatisch alarmsysteem wakker gebeld.

31 OKTOBER
----------

**0.00 uur –**De oorzaak is bekend. Geen van de honderden servers die
Copernica heeft zijn bereikbaar. Andere collega’s worden wakker gebeld
en vertrekken naar het datacentrum van Leaseweb in Haarlem, waar onze
servers staan opgeslagen.

**0.30 uur -** Aankomst in datacentrum. Navraag leert dat een medewerker
van Leaseweb per ongeluk alle stroomtoevoer naar onze servers heeft
uitgezet.

**0.45 uur –**Alle servers zijn weer ingeschakeld. De schade repareren
gaat echter veel tijd kosten. Als je een database uitzet, betekent dit
namelijk dat alle processen in zijn geheugen wegvallen en hij ‘out of
sync’ loopt. Dit moet hersteld worden voordat de database weer normaal
kan functioneren.

**3.45 uur –**Het technisch team is nog steeds bezig met
herstelwerkzaamheden. Er moeten enorme hoeveelheden data worden
doorlopen voordat de servers weer operationeel zijn.

**8.00 uur –**Alle databases zijn weer operationeel. De applicatie en
website van Copernica Marketing Software zijn bereikbaar.

**8.30 uur –**Taken worden weer uitgevoerd. E-mailings worden verstuurd,
zij het in de meeste gevallen met vertraging. Herstelwerkzaamheden zijn
nog steeds in volle gang.

**8.35 uur –**Mailings die stonden ingeroosterd om in de afgelopen nacht
te versturen, worden handmatig door het technisch team gecontroleerd.
Door te kijken naar de selecties waarnaar de mailings verstuurd hadden
moeten worden, maken zij een beslissing of een mail alsnog verstuurd
moet worden.

Als een selectie op een database bijvoorbeeld naar alle contactpersonen
in Rotterdam moet worden verstuurd, is het redelijk veilig te
veronderstellen dat die selectie sinds het verzendtijdstip niet meer is
veranderd en de mailing gewoon verzonden kan worden.

Maar bij andere selecties, zoals bijvoorbeeld ‘iedereen die twee uur
geleden op een link klikte’ is het een ander verhaal. Hier kan het gaan
om e-mailings die nu niet meer relevant zijn. Gebruikers die dit soort
mailings inroosterden, worden telefonisch door Copernica benaderd om te
vragen of de e-mailing alsnog moet worden verzonden, of dat hij moet
worden geannuleerd.

**8.45 uur –**De eerste meldingen van gebruikers die niet weten wat er
aan de hand is komen binnen op de support-afdeling. Niet iedereen heeft
de
[notificatie](http://www.copernica.com/nl/blog/vertraagde-taken-door-fout-leaseweb)
van de stroomstoring gezien. Onze sales- en partnermanagement lichten
klanten die last hebben van de storing telefonisch in.

**11.45 uur –**Bij de supportafdeling komen nog steeds meldingen over
vertraagde mailings binnen. Het volledige technische team, zowel de
mensen van development als operations, is bezig met
herstelwerkzaamheden.

**14.00 uur –**De operationsmanager van Leaseweb stuurt een mail naar
Copernica, waarin het bedrijf een korte toelichting geeft naar
aanleiding van de stroomstoring:

> “On October 15 all (Leaseweb – red.) customers in scope were informed
> about the planned maintenance on October 30 2013.
>
> The planning and expectation of the maintenance was that no servers
> and services would be affected.
>
> Unfortunately due to a technical malfunction in an ATS device
> connected to the rack in scope, there was a power outage for a period
> of time.
>
> I regret the unfortunate power outage and will we do our at most best
> to prevent future outages.”

**14.30 uur –**De gevolgen van de stroomstoring zijn nog steeds
merkbaar. Taken worden vertraagd uitgevoerd. Nog niet alle databases
zijn gerepareerd. De verwachting is dat dit de rest van de dag nog het
geval is.  \
\
**17.30 uur - **Hoewel een aantal databaseservers inmiddels weer bij is,
heeft een groter aantal nog steeds te kampen met een achterstand. We
verwachten dat zij deze vanavond grotendeels kunnen inlopen en dat de
software morgen beter zal presteren dan vandaag. We voorzien echter nog
een slechtere werking van de applicatie dan gebruikelijk. 

**21.00 uur - **Na een lange dag waarin ons hele technische team hard
heeft gewerkt, lijkt de achterstand nu weggewerkt. De applicatie draait
weer als normaal. Wel zal ons operationsteam de software nauwkeurig in
de gaten houden om er zeker van te zijn dat alles naar behoren
functioneert.\
\
Mocht je niet zeker weten of je mailing is verstuurd, neem dan even
contact op met [support@copernica.com.\
](mailto:support@copernica.com)

1 NOVEMBER
----------

**9.30 uur - **Ingeroosterde mailings zijn vannacht op tijd verzonden.
Taken zijn [volgens
planning](http://www.copernica.com/nl/blog/gevolgen-stroomstoring-leaseweb-verholpen)
uitgevoerd.

**11.50 uur - **Wat ging er woensdagavond precies mis?

Servers die bij Leaseweb staan hebben twee bronnen van stroomtoevoer.
Mocht de ene toevoer om wat voor reden dan ook wegvallen, dan zorgt een
schakel ervoor dat de servers nog steeds stroom krijgen uit de tweede
bron.

Deze schakel, een zogenaamde ATS-device, werkte woensdagavond door een
technisch mankement echter niet. Toen de eerste stroomtoevoer werd
afgesneden voor onderhoud, kwamen onze servers daarom zonder
elektriciteit te zitten.

Om te voorkomen dat dit probleem zich in de toekomst weer voordoet,
worden onze servers nu rechtstreeks op beide elektriciteitsbronnen
aangesloten. Hierdoor hebben ze altijd stroom en is er geen tussenkomst
van een ATS-device meer nodig.

Overigens hebben we naast onze servers in Haarlem ook een aantal
backupservers in Amsterdam staan. Op deze reserve-servers staat een
replicatie van alle data die in onze databases en die van
Copernica-gebruikers staan opgeslagen.

Opgeslagen data is dus nooit in gevaar geweest. Zelfs in het zeer
onwaarschijnlijke geval dat er een natuurramp in Haarlem zou
plaatsvinden, is er een Amsterdam altijd nog een kopie van alle gegevens
beschikbaar.

2 NOVEMBER
----------

**11.00 uur -**Hoewel e-mailings sinds donderdagavond weer volgens
planning worden verstuurd, merkt een aantal gebruikers nog wel dat
sommige andere taken trager worden uitgevoerd. Zo duurt het langer tot
imports zijn afgerond, en worden selecties momenteel langzamer
opgebouwd. Ons technisch team werkt aan een oplossing hiervoor. De
verwachting is dat dit nog wel een aantal dagen kan duren.

3 NOVEMBER
----------

**15.00 uur –**Selecties en imports gaan nog steeds trager dan normaal.
Het technisch team verwacht dat deze taken morgen weer volgens planning
worden uitgevoerd.

4 NOVEMBER
----------

**01.00 uur –**Een aantal van de problemen die vorige week leken
opgelost, steken (zij het in veel mindere mate) weer de kop op. Naast de
vertraagde uitvoering van taken, worden een klein aantal mailings
langzamer verstuurd.

**9.00 uur –**Nog geen verandering. Een handvol gebruikers heeft last
van vertraagde e-mailings. Ons technisch team geeft wel aan dichtbij een
oplossing te zijn.

**11.00 uur –**Alle taken worden weer zoals gebruikelijk uitgevoerd.
Imports verlopen weer zoals gebruikelijk en ook het opbouwen van
selecties gebeurt weer op normale snelheid. Alle problemen met
vertraagde e-mailings zijn opgelost. 

6 NOVEMBER
----------

**12.00 uur -** Om problemen als deze in toekomst te voorkomen, worden
onze servers [aanstaande
zaterdag](http://www.copernica.com/nl/blog/gepland-onderhoud-aanstaande-zaterdagavond)
rechtstreeks op de stroomtoevoeren aangesloten. We adviseren die avond
tussen 18.00 en 0.00 uur geen e-mailings in te plannen.

7 NOVEMBER
----------

**13.30 uur** – Door een technische storing was Copernica vandaag rond
13.00 uur een aantal minuten niet bereikbaar. Dit werd niet veroorzaakt
door de stroomstoring in ons datacentrum van vorige week.

Door deze korte onderbreking van de service, heeft een aantal mails
vertraging opgelopen. Deze worden op dit moment verstuurd.

Copernica is inmiddels weer gewoon te bereiken. Tijdens deze korte
storing is geen data verloren gegaan. Gebruikers hoeven zelf geen
aanvullende handelingen te verrichten. 

10 NOVEMBER
-----------

**0.05 uur -**Het geplande onderhoud aan de stroomvoorziening van de
servers is voorspoedig verlopen. Alle onderhoudstaken zijn vrijwel
zonder downtime uitgevoerd, mailings en andere taken hebben geen
vertragingen opgelopen. Afgezien van twee korte perioden van
onbereikbaarheid, heeft het onderhoud voor gebruikers geen gevolgen
gehad.
