Hyperlinks in e-mailings kunnen worden aangevuld met gegevens uit een
profiel of subprofiel. Een voorbeeld hiervan zijn de unieke
inloggegevens (\$profile.id en \$profile.code) die je in de hyperlink
meestuurt, zodat relaties automatisch worden ingelogd als zij vanuit een
e-mail naar een webpagina klikken.

Voorbeeld van hyperlink die wordt gepersonaliseerd met de unieke
inloggegevens van de ontvanger:

    http://www.mijnbedrijf.nl/gegevens-wijzigen?profile={$profile.id}&code={$profile.code}

Het is ook mogelijk een volledige URL in een databaseveld op te slaan
bij het profiel of subprofiel.

    <a href="{$url}">Ga naar website</a>

Desgewenst aangevuld met inlogcode

    <a href="{$url}?profile={$profile.id}&code={$profile.code}">Ga naar website</a>

URL zit in subprofiel
---------------------

Als je een e-mailing richt aan een profiel, en je wilt de URL
personaliseren met gegevens uit een subprofiel onder dit profiel, dan
gebruik je hiervoor de loadsubprofile functie, bijvoorbeeld:

    <a href="{loadsubprofile source='databasenaam:collectienaam' assign=ls profile=$profile.id}{$ls.url}">Ga naar uw persoonlijke pagina</a>

Zoals je ziet, is alle code die nodig is voor de personalisatie van de
hyperlink binnen de *href* geplaatst. Dit is noodzakelijk omdat het
personaliseren van de hyperlink pas plaatsvindt op het moment dat de
relatie in de ontvangen e-mail op de hyperlink klikt.

Oei, link doet het niet!
------------------------

### Ontvanger gaat naar een blanco pagina wanneer hij klikt vanuit de e-mailing

Een e-mail wordt op twee verschillende momenten gepersonaliseerd:

1.  Het document wordt gepersonaliseerd bij het samenstellen van de
    mailing (vlak voordat deze naar de outbox wordt geplaatst)
2.  Smarty code binnen hyperlinks wordt door onze picserver verwerkt, en
    wordt pas uitgevoerd direct nadat de ontvanger op de hyperlink
    klikt.

De smarty code uit het document is op dat momemt dus al uitgevoerd, en
niet meer beschikbaar.

Onderstaand voorbeeld zal wel werken wanneer je deze in Copernica test,
maar in de verstuurde e-mail zal de ontvanger na het klikken op een
blanco pagina terecht komen, omdat de capture als is uitgevoerd.

    {capture assign="url"}http://www.google.nl{/capture}<a href="{$url}">Ga naar google.nl</a> 

Om de link te laten werken, moet de variabel dus ook in de link worden
aangemaakt.

    <a href="{capture assign="url"}http://www.google.nl{/capture}{$url}">Ga naar google.nl</a> 

### Wat kan je hier nog aan doen?

Als je om redenen niet in iedere hyperlink een hele berg code wilt
opnemen (bijvoorbeeld om de templatecode in zijn geheel overzichtelijk
te houden) dan kan je ervoor kiezen geen kliks te registreren bij de
e-mailing. Deze instelling vind je in het tabblad 'opties' in de tweede
stap in het dialoogvenster om een bulkmailing te versturen. De ontvanger
wordt bij het klikken op de link niet langer geredirect via onze
picserver en de link wordt tegelijkertijd met het document
gepersonaliseerd. Maar er worden geen kliks meer geregistreerd. Die
afweging zal je moeten maken.

Het in de link beschikbaar maken van personalisatie uit de template en
document, zou de redirect aanzienlijk trager maken.
