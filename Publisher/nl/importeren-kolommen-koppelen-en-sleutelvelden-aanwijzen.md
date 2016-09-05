Wanneer je gegevens importeert naar de applicatie word je na het
uploaden van het bestand gevraagd om de kolommen te controleren. Als een
kolomnaam overeenkomt met een reeds bestaande veldnaam in de database,
wordt deze direct gekoppeld. Je kan ze desgewenst weer loskoppelen door
op 'ontbind' te drukken. Niet-bestaande databasevelden kunnen direct
worden gecreëerd. 

De gegevens uit niet-gekoppelde kolommen worden niet geimporteerd. 

[Meer informatie over databasevelden](#)

![Link fields and set key fields. Adjust the properties of individual
database and collection fields](../images/importcontacts.png)

Sleutelvelden
-------------

Een import waarbij je bestaande gegevens overschrijft of nieuwe gegevens
toevoegt aan bestaande profielen, heeft sleutelvelden nodig. Middels
het sleutelveld wordt een koppeling gemaakt tussen het
bestaande profiel en de nieuwe informatie.

Het sleutelveld dient een unieke waarde te bevatten, zodat één
importregel gekoppeld kan worden aan één profiel. Dit kan ook een
combinatie van sleutels zijn die elke regel uniek maken. Geschikte
sleutelvelden zijn bijvoorbeeld het (sub)profiel ID en e-mailadres.

Je stelt zelf sleutelvelden in. De applicatie waarschuwt je wanneer deze
nog niet zijn ingesteld, of niet leiden tot een unieke koppeling van
gegevens.

**Bij een import van subprofielgegevens, moet altijd een sleutel
opgegeven worden op zowel profiel als subprofielniveau.**

Naast het aanwijzen van de sleutelvelden, dien je bij een
synschronisatie import altijd de instellingen te doorlopen in het
tabblad *Instellingen*
