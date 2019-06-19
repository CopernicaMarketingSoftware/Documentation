# Webhooks aanmaken

*Webhooks* kunnen worden aangemaakt via het SMTPeter dashboard.
Allereerst voer je een feedback URL in:

```text
"https://www.example.com/path/to/your/script.php"
```
En bijgaand het type van de Webhook dat je aan wilt maken (*clicks*, *bounces* etc.).
Dat is alles.

## URL validatie

Voordat SMTPeter begint met het maken van calls naar je URL, moet het
webadres eerst gevalideerd worden. SMTPeter doet dit om te voorkomen dat 
gebruikers ons per ongeluk instrueren om vertrouwelijke informatie naar
de foute server te sturen. Gedurende het validatieproces word je gevraagd
om een een klein stukje tekst te kopiëren naar je webserver. Op die manier
kunnen we zien dat de server daadwerkelijk van jou is.

De naam en inoud van de tekst bestanden zijn steeds weer uniek voor elke
nieuwe Webhook. Je moet deze kopiëren naar een van deze locaties:
de hoofdmap va je webserver of naar dezelfde locatie waar je *Webhook script*
is opgeslagen. Dus als je:

```text
"https://example.com/dir/script.php"
```
hebt aangemaakt als je Webhook script, moet je "smtpeter-xxxxx.txt" kopiëren naar de webserver,
zodat het beschikbaar komt via:

```text
"https://example.com/dir/smtpeter-xxxxx.txt"
```

of 

```text
"https://example.com/smtpeter-xxxxx.txt"
```

Je kunt het tekstbestand verwijderen als het adres is gevalideerd.

## Webhook testen

Het SMTPeter dashboard komt met een handige tool om je Webhooks te
testen. Je kunt de POST data invoeren die je stuurt naar de Webhook. 
SMTPeter stuurt het dan meteen door naar jouw script. Op die manier weet je 
dat de Webhook klaar voor gebruik is!

## Meer informatie

* [Webhooks](./webhooks)
