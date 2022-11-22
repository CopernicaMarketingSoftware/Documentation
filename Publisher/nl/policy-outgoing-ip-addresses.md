# Beleid uitgaande IP-adressen

Copernica gebruikt diverse IP-adressen voor uitgaande HTTP-requests die nodig
zijn voor (onder meer) webhooks en het downloaden van content en feeds voor mailings. 
Deze IP-adressen staan niet vast, en kunnen veranderen. Dit gebeurt bijvoorbeeld 
wanneer we onze verzend- of webhookcapaciteit op- of afschalen. We raden daarom af 
om onze IP-adressen te blacklisten of te whitelisten, of anderszins om checks te 
doen enkel op basis van onze IP-adressen.

Onze webhooks zijn beveiligd door middel van een digitale handtekening. Dit is
een extra header die aan elke uitgaand HTTP-request wordt toegevoegd. Hiermee kun
je controleren of een call daadwerkelijk van Copernica afkomstig is. Dit is een 
betrouwbaarder systeem dan controle op basis van IP-adres, en het stelt Copernica 
in staat om dynamisch met IP-adressen om te gaan. Voor meer informatie over
deze technologie, zie: [webhook-security](./webhook-security)

Imports en exports kun je beveiligen via SFTP in combinatie met een private key. 
Downloads van content, zoals nodig is voor het inladen van feeds in mailings, worden
op dit moment nog niet beveiligd. Het is daarom aan te raden om
deze calls van elk IP-adres te accepteren.
