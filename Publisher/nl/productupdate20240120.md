# Productupdate - Verbeteringen afmeldverzoeken en instellen verwijdergedrag.

## Verbeteringen afmeldverzoeken
Vanaf februari 2024 hanteert Google [nieuwe verplichtingen](https://blog.google/products/gmail/gmail-security-authentication-spam-protection/) voor bulkverzenders. Een vereiste is dat ontvangers zich met één klik kunnen afmelden en dat afmeldingsverzoeken binnen twee dagen worden verwerkt. Dit was een mooie aanleiding om nog eens te kijken hoe wij met uitschrijvingen omgaan.

### Uitschrijfheader toevoegen
Hoe zat het ook alweer? In de [e-mail-editor](https://ms.copernica.com/#/design) kun je onder 'Headers -> Geavanceerde headers' een uitschrijfheader toevoegen. Als je dit instelt, dan zorgt deze header ervoor dat naast de eigen uitschrijflink in de mailing, er ook een optie in de client van de ontvanger wordt getoond om je af te melden. Het wordt hierdoor makkelijker om je af te melden, omdat de afmeldoptie voor elke mailing, ongeacht van wie die afkomstig is, op dezelfde plek staat.

### Maar wat is er dan veranderd?
Op zich is er weinig nieuws in de zon, behalve dat Google dit nu verplicht stelt! Als je mailings verstuurt, ben je nu dus verplicht om deze uitschrijfheader mee te sturen, zodat je ontvangers zich makkelijker kunnen afmelden. Een mailing met alleen een afmeldlink - al dan niet ergens in een klein lettertype verstopt onderaan het bericht - is niet langer voldoende, je moet de header meesturen zodat de afmeldoptie ook op een prominente plek door de e-mailclient kan worden getoond. Niet zo leuk natuurlijk, want het liefst houd je zo veel mogelijk abonnees op je nieuwsbrief, maar vanuit de gebruiker begrijpen we het wel. Kortom, wel doen dus!

### Ook wat technische aanpassingen
In het verleden waren er wat technische uitdagingen met de afmeldheader. Het was lastig om onderscheid te maken tussen gebruikers die écht op de link klikten, en programma's die voor de zekerheid even keken of de afmeldoptie wel valide was (zoals sommige spam- en virusfilters wel deden). Dit voorkwamen we door de gebruiker door te sturen naar een pagina met een vraag zoals "weet je zeker dat je je wilt afmelden?". Maar ook dit mag niet meer van Google: de afmelding moet met één klik zijn geregeld, en een extra verificatiepagina is niet meer toegestaan.

Gelukkig is er een oplossing doordat er een uniforme standaard voor afmeldlinks is geïntroduceerd. Om aan de nieuwe Google-voorwaarden te voldoen, hebben we deze standaard geïmplementeerd. Hierdoor kunnen we duidelijk identificeren wanneer de ontvanger zich via de client afmeldt, en kunnen we dit (sub)profiel direct uitschrijven. Hier hoef je zelf niks voor te doen: als je de uitschrijfheader toevoegt aan de mailing, dan zorgen wij er voor dat deze voldoet aan de standaard.

Meer technische details over de one click list unsubscribe vind je [hier](https://support.google.com/mail/answer/81126#subscriptions&zippy=%2Crequirements-for-sending-or-more-messages-per-day).

## Instellen verwijdergedrag 
Sommige gebruikers hebben hun database zo ingericht dat ze hoofdzakelijk informatie toevoegen aan het systeem, en maar zelden informatie verwijderen. Als iemand zich uitschrijft voor de nieuwsbrief, dan wordt het profiel of subprofiel niet verwijderd, maar wordt het veld "nieuwsbrief" op "nee" gezet. Slim natuurlijk, want zo verlies je geen gegevens en als iemand zich later weer aanmeldt, heb je nog altijd het complete profiel.

Om te voorkomen dat iemand bij een dergelijke setup toch per ongeluk profielen verwijdert, kun je voortaan per database of collectie het verwijdergedrag instellen. Hiermee geef je aan wat er moet gebeuren zodra iets of iemand een (sub)profiel probeert te verwijderen. Standaard staat de instelling op 'verwijder het (sub)profiel', wat ook best logisch is, maar je hebt nu ook de mogelijkheid om te kiezen voor 'Doe niets' of 'Schrijf het profiel uit'.

De optie om het profiel uit te schrijven maakt gebruik van het ingestelde [uitschrijfgedrag](./database-unsubscribe-behavior) van de database of collectie. Als je als uitschrijfgedrag bijvoorbeeld instelt "verander het veld nieuwsbrief in nee", dan wordt dit voortaan ook gedaan als iemand het profiel probeert te verwijderen.

Je stelt het verwijdergedrag in onder 'Configuratie' in het [profielen](https://ms.copernica.com/#/profiles/)-gedeelte.

## Velden vastzetten via REST API
In de REST API is het nu mogelijk om aan te geven dat bepaalde velden uitsluitend via de API mogen worden aangepast of verwijderd. Hiervoor maak je gebruik van de `lock` parameter in de API-methodes voor het [toevoegen](./restv4/rest-post-database-fields) of [bewerken](./restv4/rest-put-database-fields) van velden. 

Deze optie is onder meer handig wanneer je collega's hebt die af en toe op eigen houtje velden uit de database verwijderen omdat ze veronderstellen dat ze niet meer in gebruik zijn, terwijl deze velden wel degelijk nodig zijn voor API-koppeling. Op deze manier voorkom je dat een koppeling niet meer functioneert omdat een gebruiker per ongeluk een veld verwijdert via de gebruikersinterface

## Verbeteringen marketing suite
Bij het toevoegen van een vertaling aan een template in de [e-mail-editor](https://ms.copernica.com/#/design) is het nu mogelijk om direct de opvolgacties mee te kopiëren naar de nieuwe vertaling.

Bovendien worden er geen wijzigingen meer gedaan aan de styling van je template na het toevoegen van een nieuwe vertaling.

Daarnaast zijn er extra waarschuwingen toegevoegd aan de gezondheidscheck van je template. Je ontvangt nu een waarschuwing als de tekstversie ontbreekt of het uitschrijfgedrag niet is ingesteld. Ook krijg je een waarschuwing als de gezondheidscheck niet goed kan worden geladen vanwege het ontbreken van een standaardbestemming.
