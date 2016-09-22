Copernica stopt met de ondersteuning van de [verouderde RC4 SSL
cipher](https://nl.wikipedia.org/wiki/RC4_(encryptie)). Deze cipher
wordt al lange tijd niet meer ondersteund op onze websites. De cipher
werd nog ondersteund op de API servers van Copernica voor 'legacy'
doeleinden. Op 12 november stopt Copernica met de ondersteuning van RC4
op de API servers.

Na 12 november worden alleen nog moderne SSL ciphers ondersteund op onze
api.copernica.com en soap.copernica.com.

Voor API gebruikers die nog gebruik maken van de verouderde RC4 SSL
cipher is er tijdelijk de mogelijkheid om API requests via
insecurerest.copernica.com (REST) en insecuresoap@copernica.com (SOAP)
uit te voeren. Dit is een periode van 60 dagen, wat deze gebruikers de
mogelijkheid geeft om de overstap te maken naar moderne ciphers. **De
mogelijkheid verloopt op 2 januari 2016**.

Stuur voor vragen een bericht naar
[inf@copernica.com](mailto:info@copernica.com).
