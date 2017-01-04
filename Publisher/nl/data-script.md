# Het data-script attribuut

Of je nu gebruik maakt van de drag-and-drop editor van Marketing Suite of
van de oude HTML gebasseerde templates van Publisher: je kunt altijd gebruik 
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

<pre>
<a href="http://www.example.com" data-script="profile.aantalkliks += 1;">klik hier</a>
</pre>

## 