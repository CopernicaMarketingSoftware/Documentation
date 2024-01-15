# Productupdate - Verbeteringen afmeldverzoeken en instellen verwijdergedrag.

## Verbeteringen afmeldverzoeken
Vanaf februari 2024 hanteert Google [nieuwe verplichtingen](https://blog.google/products/gmail/gmail-security-authentication-spam-protection/) voor bulkverzenders. Een vereiste is dat ontvangers zich met één klik kunnen afmelden en dat afmeldingsverzoeken binnen twee dagen worden verwerkt. In de [e-mail-editor](https://ms.copernica.com/#/design) kun je onder 'Headers -> Geavanceerde headers' een uitschrijfheader toevoegen. Deze header zorgt ervoor dat naast je eigen uitschrijflink, er ook een optie in de client van de ontvanger komt om zich eenvoudig af te melden. Na het toevoegen van een uitschrijfheader aan je template of document wordt automatisch een list-unsubscribe header aan de headers van je verzonden bericht toegevoegd.

Om aan de nieuwe Google-voorwaarden te voldoen, hebben we automatisch de list-unsubscribe-post `List-Unsubscribe=One Click` toegevoegd aan berichten met een uitschrijfheader. Hierdoor kunnen we duidelijk identificeren wanneer de ontvanger zich via de client afmeldt, en kunnen we dit (sub)profiel direct uitschrijven.

Meer informatie over de one click list unsubscribe vind je [hier](https://support.google.com/mail/answer/81126#subscriptions&zippy=%2Crequirements-for-sending-or-more-messages-per-day).

## Instellen verwijdergedrag 
In een database of collectie kun je nu verwijdergedrag instellen. Hiermee geef je aan wat er moet gebeuren zodra een (sub)profiel wordt verwijderd. Standaard staat de instelling op 'verwijder het (sub)profiel', zoals het tot nu toe altijd heeft gewerkt.

Je hebt nu echter ook de mogelijkheid om te kiezen voor 'Doe niets' en 'Schrijf het profiel uit'. Hiermee voorkom je dat profielen per ongeluk uit je database worden verwijderd. Het verwijderen van een (sub)profiel betekent namelijk ook het verlies van de historie. In de meeste gevallen is uitschrijven voldoende. De optie om het profiel uit te schrijven maakt gebruik van het ingestelde[uitschrijfgedrag](./database-unsubscribe-behavior) van de database of collectie. Als het (sub)profiel in de toekomst toch besluit de nieuwsbrief te willen ontvangen, zijn de historische gegevens nog beschikbaar.

Je stelt het verwijdergedrag in onder 'Configuratie' in het [profielen](https://ms.copernica.com/#/profiles/)-gedeelte.

## Velden vastzetten via REST API
In de REST API is het nu mogelijk om aan te geven dat bepaalde velden uitsluitend via de API mogen worden aangepast of verwijderd. Hiervoor maak je gebruik van de `lock` parameter in de API-methodes voor het [toevoegen](./restv4/rest-post-database-fields) of [bewerken](./restv4/rest-put-database-fields) van velden. 

Deze optie is met name relevant wanneer je een integratie hebt met Copernica die door anderen wordt gebruikt. Op deze manier voorkom je dat de koppeling niet meer functioneert als een eindklant per ongeluk een veld heeft verwijderd via de gebruikersinterface.

## Verbeteringen marketing suite
Bij het toevoegen van een vertaling aan een template in de [e-mail-editor](https://ms.copernica.com/#/design) is het nu mogelijk om direct de opvolgacties mee te kopiëren naar de nieuwe vertaling.

Bovendien worden er geen wijzigingen meer gedaan aan de styling van je template na het toevoegen van een nieuwe vertaling.

Daarnaast zijn er extra waarschuwingen toegevoegd aan de gezondheidscheck van je template. Je ontvangt nu een waarschuwing als de tekstversie ontbreekt of het uitschrijfgedrag niet is ingesteld. Ook krijg je een waarschuwing als de gezondheidscheck niet goed kan worden geladen vanwege het ontbreken van een standaardbestemming.
