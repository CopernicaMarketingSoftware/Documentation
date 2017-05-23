# Zender reputatie

Jouw zender reputatie bepaalt hoe betrouwbaar jij overkomt op het internet. 
Het bepaalt ook hoe emailclienten jouw IP adres zien, wat invloed heeft 
op de beslissing om jouw email wel of niet te accepteren. Er zijn verschillende 
factoren die invloed hebben op je reputatie, waardoor het belangrijk is 
dat je database schoon is en je mails goede en relevante inhoud hebben. 
We zullen nu een aantal factoren bespreken en tips geven om je zender 
reputatie te verbeteren.

## Influencing factors

### Identification

It is important to always identify yourself when sending your emails. 
There are a lot of people out there who have malicious intentions and 
might try to scam people by pretending they are someone they are not. 
Several safety mechanisms have been developed over the years to protect 
the internet from these malicious intentions, but this also means that 
you have to put some extra work into proving you are really the one 
sending email. SMTPeter's [sender domains](./sender-domains) are a great 
way of setting up complicated things like [SPF](spf-validation), 
[DKIM](dkim-signing) and [DMARC](dmarc-deployment). After you set up a 
sender domain you can focus on your business, while we take care 
of your messages.

### Database

Je database bevat waarschijnlijk veel informatie. Je profieldata komt vaak 
van de profielen zelf, maar niet alle gebruikers geven correcte en relevante 
informatie. Als een email niet aankomt of als spam gemarkeerd wordt is dit 
slecht voor je reputatie. Het is daarom belangrijk om je database schoon te 
houden.

Gebruikers moeten zich altijd uit kunnen schrijven. Niet alleen is dit 
wettelijk verplicht, maar gefrustreerde ontvangers kunnen ook je mail markeren 
als spam, wat weer slecht is voor je reputatie. Het is dus beter aan elke mail 
een duidelijke uitschrijflink toe te voegen, waardoor je ook weer zelf 
kunt bepalen wat je doet met een uitschrijfmelding.

Bounces afhandelen is ook erg belangrijk. Als er verkeerd gespelde of 
niet-bestaande adressen in je database staan zorgen deze voor bounces, die 
slecht zijn voor je reputatie. Zorg er dus voor dat emailadressen verwijderd 
worden uit je database als deze meerdere malen zorgen voor errors en bounces.

Een dubbele opt-in is een effectieve manier om je ervan te verzekeren dat 
je gebruikers je email willen ontvangen en een valide adres hebben ingevuld. 
Bij een dubbele opt-in stuur je een bevestigingslink naar je gebruikers. 
Zo lang ze hier niet op hebben geklikt ontvangen zij nog geen andere email van 
jou.

### Email inhoud

Elke email ontvangt een spam score, die belangrijk is voor je reputatie, 
maar die ook makkelijk omhoog te krikken is. Het is bijvoorbeeld verstanding 
om een tekstversie toe te voegen aan je email, voor mensen die de HTML niet 
kunnen bekijken. Vermijd daarnaast spamwoorden en hou je HTML schoon en vrij 
van errors. Emailclienten kijken daarnaast ook naar de ratio tussen tekst en 
afbeeldingen (dus balanceer veel afbeeldingen met stukken tekst). Als je 
hyperlinks niet naar de URL gaan die je in de mail afbeeldt is dit ook 
verdacht, dus vervang deze liever door tekst.

Daarnaast wil je, om te voorkomen dat je mail als spam gemarkeerd wordt, 
ervoor zorgen dat je mails interessant en relevant zijn. Zo blijven 
je gebruikers geïnteresseerd.

## Meer informatie

* [Zender domeinen](./sender-domains)
* [SPF validatie](./spf-validation)
* [DKIM ondertekenen](./dkim-signing)
* [DMARC deployment](./dmarc-deployment)

