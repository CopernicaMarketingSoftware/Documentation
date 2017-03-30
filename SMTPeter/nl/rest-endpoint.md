# REST API Eindpunt

Om gebruik te maken van de REST API heb je een 'access token' nodig. 
Deze kan je aanmaken in het 'dashboard' van SMTPeter. Deze 'token' 
wordt gebruikt om je 'calls' te authentiseren in SMTPeter. Deze 
'access token' moet je prive houden om te voorkomen dat andere
mensen zomaar emails kunnen versturen vanuit jouw naam. Met je 
'access token' kan je in ieder geval de SMTPeter API bereiken via 
de volgende URL:
 
```
https://www.smtpeter.com/v1/METHOD?access_token=YOUR_API_TOKEN
```
Je kan alleen gebruik maken van HTTPS connecties. Onveilige HTTP
'calls' worden niet geacepteerd en geven dan ook een '400 Bad Resquest'
status code terug. Het 'v1' element in de URL geeft onze ontwikkelaars
de mogelijkheid om de compatibiliteit te verleggen/verbreken in 
toekomstige versies van de API.


## HTTP methodes

SMTPeter stelt je in staat om 'requests' te doen via HTTP POST, HTTP GET
en HTTP DELETE. POST 'requests' worden gebuikt om data te versturen en 
GET 'requests' worden gebruikt om data op te vragen. DELETE 'requests' 
verwijderen data voorgoed. Als deze 'requests' worden uitgevoerd over de 
bijveiligde HTTPS verbinding. 
