# Opvolgacties instellen

Als op een link in een mailing wordt geklikt, of als een andersoortige 
gebeurtenis plaatsvindt, kan Copernica automatisch nieuwe acties uitvoeren 
of inroosteren. Hiervoor gebruikt Copernica verschillende systemen:

* Het [oude opvolgsysteem van Copernica Publisher](./followups-publisher.md)
* Het [data-script attribuut](./followups-data-script.md) om zelf te programmeren


## Gelaagde architectuur

We werken thans aan een compleet nieuw, en veel krachtiger, systeem voor opvolgacties.
Het [*data-script* attribuut](./followups-data-script.md) is hier de eerste 
zichtbare exponent van. Aan elke hyperlink in een mail kan een script worden gekoppeld 
dat wordt uitgevoerd als op de link wordt geklikt. Dit is een heel krachtige manier
om opvolgacties in te stellen, omdat je zelf kunt programmeren hoe met inkomende
kliks wordt omgegaan.

Maar programmeren is natuurlijk niet ieders specialiteit. Daarom bouwen we ook 
*wizards* en gebruiksvriendelijke tools voor veelgebruikte opvolgacties. Gebruikers
die een standaard campagne willen inrichten kunnen deze tools gebruiken, terwijl
geavanceerde gebruikers en programmeurs de scripting functionaliteit kunnen 
inzetten voor geavanceerde opvolgacties. Deze tools komen later.


## Opvolgacties met de oude Publisher

In de oude Publisher omgeving kun je ook opvolgacties invoeren. Dit 
[oude systeem](./followups-publisher.md) heeft geen scripting API en is dus niet 
zo krachtig als het nieuwe systeem. Maar omdat het al heel wat jaren meegaat, en 
er door de jaren heen veel verbeteringen aan zijn aangebracht, is het toch een 
heel krachtige toolkit, waarbij er voor bijna alle  

