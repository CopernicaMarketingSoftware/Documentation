# Exporteren van profielgegevens
Naast importeren is het ook mogelijk om profielen en subprofielen te exporteren.
Je kunt een hele database in één keer exporteren, of in onderdelen
(bijvoorbeeld per collectie). Bij een export wordt een bestand in een formaat
naar keuze gegenereert, dat je kunt downloaden of laten e-mailen.

Als je graag in real-time de clicks, opens e.d. van profielen wilt ontvangen,
kun je ook een [webhook](./webhooks) instellen.

## Exportbestand voorbereiden
Klik op de database of collectie waarvan je een export wilt maken en klik vervolgens op **Exports** in de toolbar.
Geef je export een naam en kies de velden die je wilt exporteren. In de vervolgstappen kun je nog specifieke instellingen meegeven aan de export. Hierbij kun je denken aan het bestandsformaat, het scheidingsteken en de codering. Als er in je database profielen voorkomen die zelf een scheidingsteken in hun velden hebben staan (bijvoorbeeld een harde tab in een woonplaatsveld), kies dan bij *kolominstelling* voor de optie *"Kolommen met aanhalingstekens"*. De waardes worden dan
tussen quotes geplaatst zodat er geen conflicten met het scheidingsteken optreden.

## Naar (s)FTP exporteren
Exports kunnen ook via FTP of SFTP worden overgedragen aan een server. Onder
de optie '**Bestemming en interval**' kan worden gekozen voor FTP. Daarnaast bied het
ook de keuze om de authenticatie met wachtwoord tot stand te brengen of met
gebruik van public key authenticatie.

De URL naar de (S)FTP server moet er als volgt uitzien:

In het geval van FTP:
```text
ftp://ftp.example.com/~/
```

In het geval van FTP met een gebruikersnaam en wachtwoord:
```text
ftp://username:password@ftp.example.com/~/
```

In het geval van SFTP:
```text
sftp://ftp.example.com/~/
```

Wij vervangen de tilde die gebruikt wordt in de URL automatisch naar
`home/gebruikersnaam`. Als je gebruikt wilt maken van absolute paden dan kan
dat als volgt:
```text
sftp://ftp.example.com/mnt/storage/
```

Wij gebruiken de naam van de export als bestandsnaam van het bestand dat over
(S)FTP wordt geschreven. Het type bestand en de extensie hiervan kunnen worden
gespecificeerd in het tabje 'Bestand'. Een gebruikersnaam moet altijd worden
opgegeven. In het geval van authenticatie met gebruik van een wachtwoord moet
een wachtwoord worden opgegeven. Bij het gebruik van public key authenticatie
moet een private key worden gegeven. Wegens veiligheidsredenen coderen wij de
private key wanneer de export wordt aangemaakt, bij het uitvoeren van de export
decoderen wij de private key weer.

## Opmerkingen
Er zijn een aantal onderdelen van de export functionaliteit die verwarrend
kunnen zijn, daarvan noemen wij de belangrijkste in deze opsomming:
* De velden *ID*, *Toegangscode* en *Profiel aangemaakt* zijn velden
waarvan de waarde door het systeem is toegekend.
* Je kunt maximaal 1 collectie in een CSV-bestand opnemen. Als je meerdere
collecties tegelijk wilt exporteren, kies dan XML als bestandstype.
* UTF-8 is in de meeste gevallen de beste encoding voor outputbestanden
en wordt aangeraden
* Datumvelden worden geëxporteerd in het formaat dat je zelf opgeeft,
zodat je bestand kunt maken met bijvoorbeeld een alternatieve datumnotatie.
* Om bestanden klein te houden kun je compressie inschakelen.
Dit is zeker handig als je de exports per mail wilt versturen.
