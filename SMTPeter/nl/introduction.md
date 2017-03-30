*We zijn druk bezig om de documentatie ook in het Nederlands beschikbaar te maken. De Engelse documentatie is [hier](https://www.smtpeter.com/en/documentation/introduction) te vinden.*

# Beginnen met SMTPeter

SMTPeter is een e-mail gateway op cloud-basis waarmee je al je e-mail kunt versturen vanaf al je devices, of het nou bulkmailings, transactieberichten of persoonlijke berichten zijn. Wij zorgen ervoor zorgt ervoor dat al je berichten perfect zijn: ze worden automatisch geprepareerd, gearchiveerd en ondertekend voordat ze aankomen bij de ontvanger.

Het is niet moeilijk om SMTPeter te verbinden aan jouw applicatie. Je hoeft eigenlijk maar twee dingen te doen om e-mails te kunnen versturen met SMTPeter (naast natuurlijk het registreren): je moet een sender domain aanmaken en verbinden met een van de twee API’s die SMTPeter ondersteunt. Hieronder leggen we uit hoe je dat kunt doen.

## Een Sender Domain instellen

SMTPeter gebruikt de zogeheten Sender Domains om het authenticeren van e-mails aanzienlijk te vergemakkelijken. Het is een vrij simpel concept: jij stelt in jouw DNS wat omleidingen in naar de servers van SMTPeter, en wij zorgen dat al je instellingen altijd up-to-date zijn. Zo hoef je nooit meer na te denken over moeilijke zaken zoals SPF, DKIM en DMARC, of je trackingdomeinen. [Dit artikel over Sender Domains](sender-domains) legt je haarfijn uit hoe alles in elkaar steekt, maar voor nu willen we je vooral vertellen hoe je je Sender Domain instelt.

Sender Domains vind je in de SMTPeter interface onder het tabblad ‘Account configuration’. De interface wijst zichzelf: klik op ‘Setup sender domain’ en dan op ‘Add sender domain’ en volg de stappen. Maak je geen zorgen om je klik- en afbeeldingdomeinen en DMARC deployment, deze kun je later allemaal aanpassen in het configuratiescherm.

Als je de door SMTPeter gegenereerde instellingen in je DNS hebt geplaatst, kan je domein geverifieerd worden. Dit gebeurt als volgt: wanneer je je sender domain hebt aangemaakt, verschijnt er in de interface een waarschuwingsbericht over de verificatie met daarin een code die alleen SMTPeter kan ontcijferen. In je DNS moet je vervolgens een TXT-bestand neerzetten met daarin die code. Pas als dit gebeurd is, gelooft SMTPeter dat jij echt de eigenaar bent van het domein en is je sender domain klaar voor gebruik.

## De REST API

Als je gebruik gaat maken van de REST API om emails te verzenden hoef je alleen een toegangscode te genereren. Ook dit is zo gepiept: ga naar het configuratiescherm en klik op ‘REST API’ onder het ‘APIs’-blokje. Hier vind je jouw access token en kun je een nieuwe aanmaken wanneer je dat nodig hebt. 

Wij raden aan om de REST API te gebruiken: naast het injecteren van e-mail ondersteunt de API nog veel meer dingen die de SMTP API niet ondersteunt zoals het opvragen van statistieken of e-mails aanleveren in JSON-formaat. 

Als je je toegangscode eenmaal hebt, kun je de API bereiken via onderstaande url, waarbij METHOD moet worden vervangen door de methode die je gaat gebruiken en YOUR_ACCESS_TOKEN door je toegangscode.

`https://www.smtpeter.com/v1/METHOD?access_token=YOUR_API_TOKEN`

## De SMTP API

Je kunt er ook voor kiezen om in plaats van de REST API de klassieke SMTP API te gebruiken. Met deze API kun je SMTPeter makkelijk integreren in traditionele e-mailclients als Outlook en Thunderbird of mobiele clients. Daarnaast kun je met de SMTP API in de interface gemakkelijk bepalen welke accounts welke opties hebben. 

Om de SMTP API te kunnen gebruiken, heb je een valide gebruikersnaam en wachtwoord nodig. Deze maak je aan onder het knopje ‘SMTP API’. Onthoud ze goed, want je krijgt je inloggegevens maar een keer te zien!

Wanneer je deze twee stappen hebt doorlopen, is alles klaar voor gebruik en kun je gaan ontdekken wat SMTPeter nog meer te bieden heeft! 


Meer informatie
- [Sender Domains](sender-domains)
- [SMTP API](smtp-api)
- [REST API](rest-api)



