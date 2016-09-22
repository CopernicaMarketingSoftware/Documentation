Leuk nieuws over de tracking links in mailings: ze worden vanaf volgende
week maandag (25 juli 2016) mooier, sneller en makkelijker te
personaliseren.

Wat gaat er precies veranderen? Zoals je waarschijnlijk weet, worden
alle hyperlinks in mailings vervangen door links die lopen via de
servers van Copernica. Een link in een email naar, bijvoorbeeld,
“www.bedrijf.nl/aanbiedingvandeweek” wordt vervangen door een link naar
een anoniem tracking domein. De link komt er dan bijvoorbeeld uit te
zien als “pic.vicinity.nl/4180/fc7a52c28efc486362520df20d0da12e/210”.
Hierdoor kunnen we precies registreren wie op de link klikt.

Er zit echter een nadeel aan dit systeem: de tracking link ziet er vaak
wat minder betrouwbaar uit dan de oorspronkelijke link. Als een
gebruiker met zijn muis over de link zweeft ziet hij een voor hem of
haar meestal onbekende domeinnaam, gevolgd door een ingewikkelde
combinatie van cijfers en letters. Er is niks dat er op wijst dat de
link verwijst naar de aanbieding van de week. En dat gaan we veranderen.

Vanaf volgende week gaan we langzaam overstappen op tracking links die
veel sterker lijken op de oorspronkelijke hyperlinks. De tracking link
komt er dan uit te zien als
“tracking.bedrijf.nl/aanbiedingvandeweek?cctv=trackingcode”. De
domeinnaam in de link wordt een subdomein van de oorspronkelijke
domeinnaam, en ook het pad in de url blijft behouden. Er wordt alleen
een kleine tracking code toegevoegd. Een gebruiker die de link
inspecteert, ziet nog steeds dat deze afkomstig is van “bedrijf.nl”, en
ook dat wordt verwezen naar de weekaanbieding.

Sender Domains
--------------

Om optimaal gebruik te kunnen maken van deze nieuwe tracking links,
raden we aan om [“Sender
Domains”](https://www.copernica.com/nl/blog/nieuwe-feature-sender-domains)
te configureren. Voor elke hyperlink wordt namelijk gezocht naar een zo
bijpassend mogelijk Sender Domain. Als er links in de mail verwijzen
naar “www.example.com” en er is een “example.com” Sender Domain
beschikbaar, dan worden die links vervangen door het tracking domain van
dat Sender Domain. Als er geen bijpassend overeenkomstig domein is, dan
wordt het Sender Domain gebruikt dat hoort bij het afzenderadres.

Je kunt zelf bepalen welk subdomein je als tracking domain inzet. Vaak
wordt “tracking.domein.nl” of “clicks.domein.nl” gebruikt. Maar het mag
van alles zijn, ook subdomeinen die wat minder technisch ogen, zoals
“www2.domein.nl”, “aanbieding.domein.nl” of “campagne.domain.nl”.

Personaliseren
--------------

Tot op heden was het lastig om links te personaliseren binnen Smarty
loops. Er waren allerlei trucs nodig om er voor te zorgen dat links
binnen een loop correct werden verwerkt. De nieuwe tracking links lossen
dit probleem ook meteen op. Omdat de tracking URL bijna gelijk is aan de
oorspronkelijke link, kan de gebruiker veel makkelijker en sneller
worden geredirect, ook als het een in een loop geneste gepersonaliseerde
link betreft.

Langzaam uitrollen
------------------

De nieuwe hyperlinks zijn vanaf maandag 25 juli actief. Maar om
veiligheidsredenen kiezen we voor een langzame uitrol. Dit betekent dat
niet direct alle mailings van alle gebruikers de nieuwe tracking links
bevatten, maar dat gedurende de komende weken accounts één voor één op
het nieuwe systeem worden aangesloten.
