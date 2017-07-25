# Templates: Marketing Suite

Binnen de Marketing Suite zijn twee manieren om e-mailtemplates te maken, 
namelijk met de drag-and-drop editor en met de HTML editor. Met de 
drag-and-drop editor maak je in een handomdraai hoogwaardige kwaliteit 
e-mails. Met deze eenvoudige editor kun je elementen slepen en zo aangeveven
waar afbeeldingen, tekst en buttons moeten worden geplaatst. 
Naast de [Follow-up Manager](follow-up-manager-ms), heeft de 
Marketing Suite nog een aantal andere toepassingen die wellicht 
handig zijn bij het creëren van je e-mailtemplates.

## Extend hyperlinks

Binnen de template editor kun je gebruik maken van "extend hyperlinks".
Voeg de benodigde informatie (tags) toe om uit te vinden hoe klanten op 
bepaalde links en e-mails reageren. Je kunt ook kiezen voor de custom 
optie en op je eigen tags meegeven om data te verwerken. 

## CSS automatisch inline

De stijlopmaak, waarmee je e-mails vormgeeft in de template editor,
moet op het moment van verzenden "inline" (in de HTML) worden gezet.
Anders kan de e-mail niet correct worden weergegeven. De template 
editor zorgt voor een automatische omzetting van CSS, waardoor alle
stijlopmaak intact blijft en je klanten de e-mails exact zo ontvangen
als jij voor ogen had.

## Diff tool 

Het kan natuurlijk altijd voorkomen dat je per ongeluk je tabblad of 
scherm afsluit. In de meeste gevallen ben je dan je werk kwijt. In
de Marketing Suite wordt alles voor je opgeslagen en kun je nagaan
wat er is veranderd op het moment dat het scherm werd afgesloten.

## Responsive templates

Templates die worden aangemaakt (en gebruikt) met de drag-and-drop editor zijn
automatisch responsive. Onder de motorkap zijn de gecreëerde templates namelijk 
JSON bestanden. Door onze geavanceerde [Responsive Email](http://www.responsiveemail.com)
service, worden alle JSON templates automatisch responsive gemaakt. Dit betekent
dat de e-mails, ongeacht op welk type apparaat, altijd goed worden weergegeven.

## Spam check

Het is ook mogelijk om, voordat je de e-mails verstuurt, na te gaan of je e-mail
daadwerkelijk in de inbox van de ontvanger belandt. Je kunt dit doen door op
het `tools` knopje te drukken en vervolgens naar de `spam check` te navigeren.
Aan de hand van een aantal checks wordt nagegaan hoe spamgevoelig je e-mail is.
Hoewel e-mailclients binnenkomende e-mails verschillende waarderen van elkaar,
is het handig om wellicht toch de verbeteringen door te voeren.

## Headers

### BCC header

De BCC (Blind Carbon Copy) kan gebruikt worden om kopieën van emails te 
versturen naar een of meerdere adressen, zonder dat deze elkaars e-mailadres 
te zien krijgen. Zo is er minder kans dat de adressen bij spammers 
belanden, of dat er per ongeluk een lange ketting van "Allen beantwoorden" 
emails ontstaat. Ook kunnen de adressen niet gebruikt worden door virussen 
die zichzelf door adressen verspreiden.

### X-headers

X-headers zijn extra headers die toegevoegd worden naast de gebruikelijke 
headers als "From", "Subject" en dergelijke. De "X-" in X-header staat voor 
eXperimenteel of eXtensie. Je kunt hier je eigen waarden voor gebruiken 
om extra informatie mee te geven aan je email. Je kunt dus helemaal zelf 
bepalen welke X-headers je gebruikt of wat je meegeeft. Je kan bijvoorbeeld 
de naam van je selectie of campagne meegeven voor je eigen statistieken.

Met Copernica kun je hier ook Smarty [personalizatie](./personalization) 
gebruiken. Zo kun je bijvoorbeeld aan elke email een "X-PF-ID" meegeven, 
waar je de ID van een profiel meegeeft (bijvoorbeeld omdat deze anders 
is in je eigen database). Als de email vervolgens niet aankomt kun je 
dit profiel zo terug zoeken in je eigen database en contacteren om het 
probleem op te lossen.

### Unsubscribe

Je kunt ook altijd de *list unsubscribe* header toevoegen. Hiermee 
kunnen sommige emailclienten meteen een unsubscribe link bovenaan de 
email plaatsen. Wij raden je aan altijd minstens een uitschrijflink te 
plaatsen. Dit komt ten goede aan je [reputatie als verzender](./sender-reputation) 
en je kan het [uitschrijfgedrag](./database-unsubscribe-behavior) zelf 
instellen. 

## Meer informatie

* [Templates](./templates)
* [Templates in Publisher](./templates-publisher)
* [Personalizatie in de Marketing Suite](personalizing-your-newsletter-in-the-marketing-suite)
* [Followups](./followups)

### Template content

* [Text tag](text-tag)
* [Image tag](image-tag)
* [Loop tag](loop-tag)
