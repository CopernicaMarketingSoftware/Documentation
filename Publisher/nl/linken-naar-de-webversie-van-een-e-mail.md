Soms kan een e-mail niet goed worden weergegeven in het e-mailprogramma
van de ontvanger. Geen nood, want het meesturen van een webversie van je
email is een fluitje van een cent.

### Wat is de webversie?

De webversie gebruik je om vanuit de email te linken naar een versie van
het e-maildocument die door de ontvanger kan worden bekeken in zijn of
haar internetbrowser. Deze versie wordt automatisch door de software
aangemaakt wanneer deze via deze functie wordt opgevraagd. De webversie
wordt altijd **gepersonaliseerd** weergegeven.

### Link email functie

De *linkemail* functie doet feitelijk hetzelfde als *webversion*
functie, echter, middels deze functie *linkemail* kan je ook vanuit een
website naar een e-maildocument linken. In de *linkemail* tag vermeld je
daarom altijd de template en het document van het te linken
e-maildocument.

De tag en het maken van de link
-------------------------------

Om de webversie mee te sturen in je emails, gebruik je onderstaande tag:

`{webversion}`

That's it. In de email wordt de tag omgezet naar het (voor iedere
ontvanger unieke) webadres (URL) van de webversie. Deze is nog niet
klikbaar. Hiervoor gebruik je nog een beetje HTML:

`<a href="{webversion}" title="Klik hier voor de webversie">Bekijk deze email in je favoriete browser</a>`

### Extra opties

Beide functies hebben dezelfde opties, tenzij anders aangegeven

**showheader=false**

De header (met hierin afzender- en documentinformatie) die standaard
wordt getoond bovenaan een webversie kan je verwijderen
door *showheader=false* aan de tag toe te voegen.

Voorbeeld: `{webversion showheader=false}`

**document='naamdocument'**

Het gespecificeerde document wordt getoond, in plaats van het document
dat daadwerkelijk is verzonden.

Voorbeeld: `{webversion document='newsletter june 2011'}`

**template='naamtemplate'**

Het gespecificeerde template wordt getoond, in plaats van het template
dat daadwerkelijk is verzonden. Wanneer je naar een ander template
linkt, vermeld je ook het onderliggende document erbij.

Example: {webversion template='newsletter' document='newsletter june
2011'}

**domain='nieuwsbrief.uweigendomein.nl'**

Hiermee vervang je het standaard picserverdomein. In dit voorbeeld:

`{webversion template=MyNewsletter document=March2010 domain='nieuwsbrief.eigendomein.nl'}`

zal de link **http://nieuwsbrief.eigendomein.nl/w/....** worden, in
plaats van **http://pic.vicinity.nl/w/....**

Indien je gebruik wilt maken van een eigen domein, dan moet dit domein
een **CNAME** verwijzing hebben naar **pic.vicinity.nl**

**Voorbeeld: **`{linkemail domain='nieuwsbrief.uweigendomein.nl'}`

*nieuwsbrief.uweigendomein.nl* moet dan voorzien zijn van een *CNAME*die
verwijst naar *pic.vicinity.nl*
