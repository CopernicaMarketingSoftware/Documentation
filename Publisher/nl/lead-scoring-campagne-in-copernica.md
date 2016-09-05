Als ondernemer wil je natuurlijk het liefst zoveel mogelijk
persoonsgegevens van je klanten vragen, om je campagnes steeds meer te
kunnen personaliseren. Relevante content in je nieuwsbrief zorgt
namelijk voor meer conversie. Verder is het belangrijk om te weten hoe
betrokken een klant is: is het een zogenaamde 'brand ambassador' of
heeft diegene 10 jaar geleden iets gekocht en heb je er vervolgens nooit
meer iets van gehoord? Het is een enorm karwei om dit voor alle klanten
bij te houden, maar door een lead scoring campagne in te richten kan
Copernica je hier mee helpen.

[Lead
scoring](<https://www.copernica.com/nl/blog/wat-is-lead-scoring-infographic>)
is het bijhouden van de betrokkenheid van een klant. Hierbij wordt het
complexe begrip betrokkenheid teruggebracht tot een cijfer, dat wordt
aangepast naar aanleiding van activiteiten van de klant. Zo wordt
getracht de betrokkenheid van de klant continu te monitoren, zodat
overige campagnes hierop kunnen worden aangepast.

Hieronder staat een stappenplan voor de implementatie van een eenvoudige
lead scoring campagne, waarbij we uitgaan van de volgende mutaties in de
betrokkenheid van een klant:

-   Mailing verzonden naar profiel: -1 punt
-   Impressie van een mail: +2 punten
-   Klik op een link in de mailing: +5 punten
-   Aankoop in de aan Copernica gekoppelde webshop: +20 punten

Een stappenplan om dit te realiseren:

1.  Maak nieuw numeriek veld ‘Leadscore’ aan met als standaardwaarde 0.
2.  Stel de volgende opvolgacties in op de documenten of templates die
    onderdeel uit gaan maken van je lead scoring campagne: 1.
    Aanleiding: verzenden van document, Actie: Wijzig gegevens van het
    profiel. De opvolgactie werkt op het veld 'Leadscore' van het
    profiel zelf. De waarde wordt {math equation="x-y" x=\$Leadscore
    y=1}: met deze formule geven we aan dat bij het verzenden van het
    document 1 punt moet worden afgetrokken van de veldwaarde
    \$Leadscore.
3.  Aanleiding: registreren van een impressie. Wijzig gegevens profiel
    met de volgende waarde: {math equation="x+y" x=\$Leadscore y=2}.
4.  Aanleiding: registreren van een klik. We laten de linkwaarde leeg,
    zodat het op alle links werkt. Wijzig de Leadscore van het profiel
    met de volgende waarde: {math equation="x+y" x=\$Leadscore y=2}. Een
    klik op een willekeurige link levert nu 2 punten op.
5.  Ga naar profielen, de juiste database en dan naar de opvolgacties.
    Voeg een nieuwe opvolgactie toe op de collectie orders met als
    aanleiding dat er een subprofiel is aangemaakt. Stel in dat de
    wachttijd 1 dag bedraagt, gezien ook orders die nog niet afgerond
    zijn naar Copernica worden gestuurd. We gaan er nu van uit dat de
    order na 24 uur wel is afgerond. De actie van de opvolgactie is het
    wijzigen van veld Leadscore van het profiel: {math equation="x+y"
    x=\$Leadscore y=20}. Sla de opvolgactie op
6.  Gezien we pas 20 punten willen toekennen als de order daadwerkelijk
    afgerond is, moeten we nog een conditie op het actie-deel van de
    opvolgactie instellen.. Klik op conditie bewerken onder ‘actie’ en
    geef aan dat de status onder de collectie orders gelijk moet zijn
    aan 'complete'. Er worden nu dus alleen punten toegekend op het
    moment dat de order daadwerkelijk is afgerond.

    Als je deze opvolgacties een tijdje laat lopen op de verschillende
    mailings die je verstuurd, zul je merken dat de scores van de
    profielen langzamerhand uiteen zullen lopen. Deze informatie kun je
    gebruiken om je database te segmenteren op basis van de
    betrokkenheid van je klanten. Nog een afsluitende tip: bij het
    kopiëren van documenten worden ook de opvolgacties wordt meegenomen,
    waardoor je bovenstaand stappenplan niet telkens opnieuw hoeft te
    doorlopen.


