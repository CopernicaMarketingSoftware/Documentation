# Verzendreputatie

Als e-mailverzender bouw je bij verschillende mailboxproviders een verzendreputatie op. 
Op basis van die reputatie plaatst een mailboxprovider jouw e-mails in de inbox of spamfolder.

Wanneer je verzendreputatie slecht is kan het zijn dat verstuurde e-mails niet worden aangenomen. 
Door je verzendreputatie te verbeteren verhoog je de kans dat e-mails succesvol de inbox bereiken.

De factoren die je verzendreputatie bepalen worden steeds dynamischer. Mailboxproviders kijken 
niet langer alleen naar blacklists of spamklachten, maar ook naar interactie met de ontvanger. 
In dit artikel bespreken we de factoren die invloed hebben op je verzendreputatie zodat jouw
e-mailcampagnes het gewenste bereik hebben.

## Hoe wordt verzendreputatie bepaald?

Hoe verzendreputatie exact wordt berekend is niet bekend. Mailboxproviders houden dit geheim 
zodat hun algoritmes niet eenvoudig omzeild kunnen worden. Daarnaast hanteert iedere mailboxprovider
een eigen methode. Je verzendreputatie verschilt dus per mailboxprovider.

De factoren waarop de algoritmes zich baseren zijn deels bekend. Verzendreputatie is gekoppeld
aan de verzendende IP-adressen, het afzenderdomein en de combinatie daartussen. Ook wordt er 
rekening gehouden met de mate waarin e-mailcontent overeenkomt met eerdere e-mails die als 
spam gemarkeerd zijn (‘fingerprinting’).

Welke factoren door welke mailboxproviders gehanteerd worden (en welke drempelwaardes ze daarbij 
aanhouden) is onduidelijk. Een laag interactiegehalte wordt bij de ene mailboxprovider dus 
zwaarder aangerekend dan bij de andere.

## Basisbegrippen

De onderstaande punten vormen de basis van een goede verzendreputatie:

* __[Lijstmanagement](https://www.copernica.com/nl/blog/post/deliverability-101-deel-1-de-invloed-van-lijstmanagement-op-deliverability)__: Het is belangrijk om je verzendlijst up-to-date te houden. Dat doe je door de gebouncete-, klagende-, uitgeschreven- en inactieve profielen uit je verzendlijst te filteren.

* __Relevantie__: Relevantie is voor mailboxproviders de belangrijkste factor bij het bepalen of jouw e-mail gewenst is. Het versturen van relevante content helpt je om zo veel mogelijk interactie van ontvangers uit te lokken. Ook kun je KPIs opstellen met betrekking tot het aantal opens, [openratio’s](./definitions) en [CTO-ratio’s](./definitions). Relevantie is belangrijker dan verzendvolume.

* __Monitoring__: Het loont om de open-, bounce-, uitschrijf-, klachten- en CTO-ratio goed in de gaten te houden. Wanneer deze bepaalde drempelwaardes overschrijden is er actie nodig. Denk bijvoorbeeld aan het terugdringen van het e-mailvolume dat verstuurd wordt naar inactieve profielen.

## Wat draagt bij aan een goede verzendreputatie?

### Consistentie in e-mailverkeer

Een consistente e-mailflow helpt je verzendreputatie te verbeteren. Het is daarom nuttig om e-mails met een vaste regelmaat te versturen, bijvoorbeeld op een dagelijkse- of wekelijkse basis. We raden aan om daarbij rekening te houden met het e-mailvolume.

Door duidelijke patronen te vertonen schep je verwachtingen bij spamfilters. Het omgekeerde is ook waar: wanneer je (sterk) van het patroon afwijkt of er geen patroon herkenbaar is heeft dat een negatief effect op je verzendreputatie.

Wanneer je begint met mailen moeten de juiste patronen nog worden vastgesteld. Het is daarom belangrijk om met lage volumes te beginnen en deze vervolgens langzaam op te schalen. Zo warm je je verzendreputatie op. Dit is ook van belang wanneer je van ESP wisselt: de combinatie tussen domein en IP-adressen verandert daarbij.

### Interactie met e-mails

Als verzender heb je het aantal opens en kliks niet volledig in de hand. Wel kun je deze maximaliseren door de juiste personen van relevante content te voorzien.

Het versturen van mailings aan ontvangers die de e-mails niet openen is voor mailboxproviders een signaal dat jouw e-mails niet interessant zijn. Dat kan er uiteindelijk toe leiden dat een mailboxprovider jouw e-mails als ongewenst beschouwt. 

Het idee hierachter is simpel: hoe relevanter de content is, hoe meer opens de mailing zal genereren. De onderwerpregel en timing van het bericht spelen daarin een rol. Berichten van verzenders die lage openratio’s scoren zijn doorgaans minder relevant en hebben daardoor een grotere kans om in de spamfolder te belanden. Op deze manier waarborgen mailboxproviders de gebruikerservaring van hun ‘klanten’: de mailboxhouders.

De gevolgen van een lage open-ratio worden groter zodra het aantal ongeopende berichten een bepaalde grens overschrijdt. In dat geval wordt de inboxplaatsing van e-mails ook bemoeilijkt bij ontvangers die je e-mails wel openen. Het is daarom belangrijk om inactieve profielen uit te sluiten van je verzendselectie.

### Whitelisting

Wanneer een ontvanger jou toevoegt aan het adresboek heeft dat een positief effect op je verzendreputatie. In tegenstelling tot de impliciete terugkoppeling van een non-open geeft een ontvanger hiermee actief aan jouw e-mails te willen ontvangen. Het kan dus voordelig zijn om ontvangers te verzoeken jou toe te voegen aan het adresboek. Een [welkomstcampagne](https://www.copernica.com/nl/blog/post/campagne-uitgelicht-editie-5-welkomstcampagnes) biedt hier de ideale gelegenheid voor.

Het is als verzender niet mogelijk om te meten hoeveel ontvangers jou hebben toegevoegd aan het adresboek. Datzelfde geldt voor gevallen waarbij ontvangers op ‘dit is geen spam’ klikken.
