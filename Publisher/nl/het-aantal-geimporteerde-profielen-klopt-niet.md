Veronderstel: een importbestand heeft 600 regels, echter na het
importeren zijn er slechts 400 profielen toegevoegd in de database. Dit
kan diverse oorzaken hebben. In dit artikel worden deze oorzaken
uitgelicht en wordt een oplossing geboden.

### De waarde van het sleutelveld is niet uniek

Het veld dat je hebt gebruikt als sleutelveld, bevat niet voor alle
regels een unieke waarde. Er zijn bijvoorbeeld twee importregels met
hetzelfde emailadres (fam.jansen@zonnet.nl).

Resultaat, de regels worden tijdens de import samengevoegd.

**Oplossing**: gebruik meerdere velden als sleutelveld, zodat de
combinatie van die velden altijd een unieke sleutel vormen.

### Het importbestand is niet UTF-8 gecodeerd

Copernica ondersteunt alleen UTF-8 tekencodering. Mogelijk heeft jouw
importbestand een andere tekencodering (bijvoorbeeld ANSII of Chinees)
waardoor het bestand niet goed kan worden geimporteerd.

Raadpleeg de documentatie van de software waarmee je het importbestand
hebt gemaakt om erachter te komen hoe je het bestand kan omzetten naar
UTF-8 codering.

UTF-8 is het meestgebruikte coderingssysteem.

### Het bestand bevat extra tabs/komma's/puntkomma's

De importeerfunctionaliteit gebruikt een door jou aangewezen
scheidingsteken om onderscheid te kunnen maken tussen velden. Dit kan
een tab, een komma of een puntkomma zijn. Welk scheidingsteken jij
gebruikt, geef je zelf aan, direct na het uploaden van het bestand.

Het kan gebeuren dat in het importbestand een scheidingsteken voorkomt,
dat niet als dusdanig bedoeld is. Dit kan het importbestand behoorlijk
in de war schoppen.

-   Genereer een nieuw bestand dat gebruik maakt van een ander
    scheidingsteken en probeer het bestand opnieuw te importeren.
-   Mocht dit nog steeds niet helpen, controleer dan of het bestand
    wellicht vanuit je spreadsheet software geëxporteerd kan worden met
    dubbele quotes rondom elk veld.
-   Je kan ook handmatig zoeken naar de fout, maar dit kan een
    tijdrovende klus zijn. Controleer je geïmporteerde database in
    Copernica op onregelmatigheden. Wellicht dat dit nieuwe inzichten
    oplevert.

### De kolomnamen ontbreken in het importbestand

In een importbestand gebruik je de eerste regel altijd voor de
kolomnamen. Bijvoorbeeld *email* voor de kolom met alle e-mailadressen.

Tijdens het importeren wordt de eerste regel altijd gebruikt als
referentie, dus als dit gegevens bevat over een relatie, zal deze
relatie niet worden geimporteerd. Kortom, de bovenste regel wordt nooit
geimporteerd.
