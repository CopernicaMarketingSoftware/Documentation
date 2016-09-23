Share-buttons kunnen je helpen de content van je nieuwbrief onder een
groter publiek op social media als Facebook, Google+, LinkedIn en
Twitter te verspreiden. In veel gevallen maken deze buttons echter
gebruik van javascript, wat ze ongeschikt maakt voor e-mails. Maar geen
nood, er is ook een manier om share-buttons in te zetten door alleen
gebruik te maken van html (en een beetje Smarty).

![](../images/share.png "../images/share.png")

Webpagina’s delen vanuit je nieuwsbrief
---------------------------------------

Ontvangers van jouw e-mailings kunnen de content waar je in je
e-mailings naartoe linkt, al delen vanuit de e-mail zelf. Zonder dus
eerst door te hoeven klikken naar de desbetreffende webpagina.

Neem daarvoor in de html van je e-mailing de volgende codes op:

**Facebook**\

`<a href="http://www.facebook.com/sharer/sharer.php?u=http://www.voorbeeldurl.com">Deel op Facebook</a>`\
\
 **Twitter**\

`<a href="http://twitter.com/home?status=Vul+hier+een+titel+in+http://www.voorbeeldurl.com">Deel op Twitter</a>`\
\
 **LinkedIn**\

`<a href="http://www.linkedin.com/shareArticle?mini=true&url=http://www.voorbeeldurl.com">Deel op LinkedIn</a>`\
\
 **Google+**\

`<a href="https://plus.google.com/share?url=http://www.voorbeeldurl.com">Deel op Google+</a>`\
\

Webversie van je e-mailing delen
--------------------------------

De webversie van je e-mailing delen op social media is iets
ingewikkelder. Het gaat hier immers om een url die, als je
gepersonaliseerde content aanbiedt, niet voor iedereen hetzelfde is.

Vervang daarom de voorbeeld-url uit de eerdergenoemde voorbeelden met
een Smarty-code:

**Facebook**\

`<a href="http://www.facebook.com/sharer/sharer.php?u={webversion}">Deel op Facebook</a>`\
\
 **Twitter**\

`<a href="http://twitter.com/home?status=Vul+hier+een+titel+in+{webversion}">Deel op Twitter</a>`\
\
 **LinkedIn**\

`<a href="http://www.linkedin.com/shareArticle?mini=true&url={webversion}">Deel op LinkedIn</a>`\
\
 **Google+**\

`<a href="https://plus.google.com/share?url={webversion}">Deel op Google+</a>`

> **Tip:** Uiteraard kun je ‘Deel op…’ in alle bovenstaande gevallen ook
> vervangen met een afbeelding van het betreffende social media kanaal.

Meta-description en title-tag bij delen van een webpagina
---------------------------------------------------------

Facebook, LinkedIn en Google+ genereren bij het delen van een url altijd
een preview van de desbetreffende pagina aan de hand van de
meta-description en de title tag. Zorg er daarom altijd voor dat deze
voor elke pagina staan ingesteld.

Gebruik daarvoor de volgende html-codes:

`<title>Vul hier de titel in</title> <meta name="description" content="Vul hier de meta-description in.">`

Plaats deze code tussen je \<head\>-tags. Denk er tot slot aan dat een
goede meta-description uit maximaal uit 160 tekens bestaat.

**Update:** Voor TodoTipo maakte Parcye een [uitgebreidere
versie](http://www.parcye.com/blog/content-uit-e-mailings-delen-op-facebook-met-eigen-parameters)
van de Facebook-shareknop.
