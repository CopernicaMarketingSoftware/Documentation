# Feedback loops aanmaken

*Feedback loops* kunnen worden aangemaakt via het SMTPeter dashboard.
De interface is gemakkelijk te begrijpen: 'je voert een feedback URL in,
bijvoorbeeld:

```text
"https://www.yourwebsite.com/path/to/your/script.php"
```
en het type van de feedback loop dat je aan wilt maken (*clicks*, *bounces* etc.).
En dat is alles.


## URL validatie


Voordat SMTPeter begint met het maken van calls naar je URL, moet het
webadres eerst gevalideerd worden. SMTPeter doet dit om te voorkomen dat 
gebruikers ons per ongeluk instrueren om vertrouwelijke informatie naar
de foute server te sturen. Gedurende het validatieproces word je gevraagd
om een een klein stukje tekst te kopiëren naar je webserver. Op die manier
kunnen we zien dat de server daadwerkelijk van jou is.

De naam en inoud van de tekst bestanden zijn steeds weer uniek voor elke
nieuwe feedback loop. Je moet deze kopiëren naar een van deze locaties:
de hoofdmap va je webserver of naar dezelfde locatie waar je *feedback script*
is opgeslagen. Dus als je:

```text
"https://domain.com/dir/script.php"
```
hebt aangemaakt als je feedback script, moet je "smtpeter-xxxxx.txt" kopiëren naar de webserver,
zodat het beschikbaar komt via:

```text
"https://domain.com/dir/smtpeter-xxxxx.txt"
```

of 

```text
"https://domain.com/smtpeter-xxxxx.txt"
```

Je kunt het tekstbestand verwijderen als het adres is gevalideerd.


## Test de feedback loop

Het SMTPeter dashboard komt met een handige tool om je feedback loops te
testen. Je kunt de POST data invoeren die je stuurt naar de feedback loop. 
SMTPeter stuurt het dan meteen door naar jouw script. Op die manier weet je 
dat de feedback loop klaar voor gebruik is!