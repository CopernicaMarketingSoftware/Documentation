Sender ID is een methode van authenticatie die door grote e-mail clients
wordt gebruikt om te controleren of de daadwerkelijke verzender (in dit
geval Copernica) toestemming heeft om e-mails te versturen met jouw
domein als zichtbare afzenderadres.

Dus als het afzenderadres van jouw mailing info@jouwdomein.nl is, stel
je de Sender ID in op het domein *jouwdomein.nl*. De Sender ID regel
laat weten dat Copernica gerechtigd is met dit afzenderadres te
versturen.

Waarom is Sender ID voor u belangrijk?
--------------------------------------

Steeds meer ontvangende mail servers (o.a. Windows Live en Yahoo Mail)
maken gebruik van Sender ID. Het verhoogt de verzendreputatie, en
verkleint de kans dat je mails in de spambox van je ontvangers terecht
komt.

Hoe stel ik een Sender ID in?
-----------------------------

Voor het instellen van een Sender ID heb je toegang nodig tot de
DNS-instellingen van het website domein. Neem contact op met jouw
netwerkbeheerder of hostingpartij wanneer je geen toegang hebt.

Het instellen van een Sender ID is betrekkelijk eenvoudig.

Je voegt simpelweg de volgende regel aan het TXT-record van uw
websitedomein.

***"v=spf1 include:\_senderspf.copernica.com a mx \~all"***

**Let op:** afhankelijk van de DNS-software die door jouw hostingpartij
wordt gebruikt, voeg je wel of geen dubbele quotes toe aan het begin en
het einde van de bovenstaande Sender ID regel.

We adviseren altijd gebruik te maken van de softfail optie (**\~all**)
voor de beste afleverresultaten. 

Als je meer wil weten over de SPF syntax, raadpleeg dan de website
van [OpenSPF](http://www.openspf.org/SPF_Record_Syntax) of het zeer
uitgebreide (Engelstalige) lemma
op [Wikipedia](http://en.wikipedia.org/wiki/Sender_Policy_Framework)

Hoe controleer ik of mijn Sender ID goed is ingesteld?
------------------------------------------------------

Als een Sender ID niet goed is ingesteld, wordt er in de onderste
menubalk een waarschuwing getoond wanneer je een e-mailing bewerkt in de
applicatie. Deze controle wordt in de achtergrond uitgevoerd. Ook wordt
vlak voor het versturen gecontroleerd op een eventueel incorrect
ingestelde Sender ID.

Sender ID combineren
--------------------

Wanneer je meerdere SPF records wilt gebruiken, dan kan je deze het
beste combineren in één TXT-record, in plaats van onder te brengen in
verschillende TXT records. In het onderstaande voorbeeld worden twee
verschillende SPF records geïnclude. 

"v=spf1*** include:\_selector.domeinnaam.nl ****include:\_senderspf.copernica.com
a mx \~all"*
