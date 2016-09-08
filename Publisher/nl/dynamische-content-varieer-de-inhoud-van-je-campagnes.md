Dynamische content is content die je laat varieren binnen je
marketingcampagnes op basis van gegevens uit een database zoals
specifieke klantinformatie. Gebruik van dergelijke content zorgt voor
variatie in je e-mails of websites. Je houdt de content zo relevant en
actueel.

Smarty tags ter ondersteuning van dynamische content
----------------------------------------------------

Met Smarty gebruik je de gegevens uit een centrale database als
voorwaarde om bepaalde stukken tekst of afbeeldingen wel of niet te
laten zien. Stel deze voorwaarden op door middel van 'als-dan'
statements.

Voorbeeld:\
 Afhankelijk van de woonplaats of eerdere aankopen krijgt een lezer voor
hem relevante aanbiedingen binnen een e-mailing te zien:

{if \$Aanhef=="Heer"}toon deze tekst{else}zo niet toon deze tekst{/if}

Hier staat: ALS het veld Aanhef waarde Heer heeft, DAN, toon deze tekst,
ANDERS, toon deze tekst, EINDE opdracht. Aanhef staat dan voor een
bepaalde veldwaarde uit je database. Zo kan je dus al verschillende
content tonen aan je mannelijke en vrouwelijke lezers.

Door gebruik te maken van Smarty tags kun je ook volledige
contentblokken in een e-mailing weglaten. Deze tags helpen je dynamische
content in te zetten voor zowel e-mailings, websites en sms-berichten.

RSS feeds als dynamische content
--------------------------------

RSS (of Atom) feeds bieden ook de mogelijkheid om binnen je
landingspagina of e-mailings actuele informatie te tonen. Maak gebruik
van een eigen contentfeed die je opstelt binnen je marketingsoftware of
laad een externe feed in van je favoriete blog.

Wil je dat bepaalde ontvangers van een e-mailing de feeds niet zien? Dan
kan je dat met behulp van de Smarty tags instellen.
