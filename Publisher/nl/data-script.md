# Het data-script attribuut

Of je nu gebruik maakt van de Marketing Suite of van de Publisher: je kunt altijd gebruik 
maken van Copernica-specifieke "data-script" attributen. Met deze attributen 
kun je scripts koppelen aan hyperlinks. Deze scripts worden uitgevoerd zodra 
iemand op de hyperlink klikt. Hiermee kun je bijvoorbeeld opvolgacties maken
of het profiel automatisch updaten als een klik wordt geregistreerd.

De combinatie Javascript en e-mail klinkt misschien wat vreemd. Normaal 
gesproken raden we het gebruik van Javascript binnen e-mail namelijk af, omdat
de meeste mailclients uit veiligheidsoverwegingen Javascript niet ondersteunen.
Het "data-script" attribuut bevat echter niet een script dat door de 
mailclient wordt uitgevoerd (en dus meestal is uitgeschakeld), maar een script
dat wordt uitgevoerd op de server van Copernica. Als de ontvanger op een 
hyperlink klikt, wordt hij eerst doorgestuurd naar onze server, daar wordt
het script uitgevoerd, waarna de gebruiker razendsnel wordt doorgestuurd
naar de oorspronkelijke URL.

    <a href="http://www.example.com" data-script="profile.aantalkliks += 1;">klik hier</a>

Bovenstaand code demonstreert hoe je gebruik kunt maken van het data-script
attribuut. Als je een link in je mailing opneemt (zoals naar www.example.com
in het voorbeeld), dan kun je daar een script aan toevoegen om per profiel
bij te houden hoeveel kliks er in totaal zijn geweest (handing  voor lead 
scoring). Dit script wordt uitgevoerd zodra iemand daadwerkelijk op de 
hyperlink klikt.


## HTML editor vs drag-and-drop editor

Als je met een HTML editor werkt, kun je dus zelf naar hartelust data-script attributen toevoegen. Elke
&lt;a&gt; tag (elke hyperlink dus) kan worden voorzien van een data-script
attribuut met daarin het script dat je wilt uitvoeren als op de link wordt
geklikt.

Als met de drag-and-drop editor werkt, dan hoef je (meestal) niet zelf de HTML code te bewerken. 
Toch kun je ook hier gebruik maken van data-script attributen. We hebben 
namelijk in de editor een script editor en flowchart editor waarin je javascript kunt gebruiken. 
Deze editors zijn rechtstreeks gekoppeld met het onderliggende data-script 
attribuut dat in de mail zal worden opgenomen.

Voor beide systemen geldt: het attribuut werkt alleen als het script dat
je plaatst geen fouten bevat. Je kunt niet vrijblijvend wat tekst opnemen,
alleen geldige javascripts worden door onze server herkend en uitgevoerd.

