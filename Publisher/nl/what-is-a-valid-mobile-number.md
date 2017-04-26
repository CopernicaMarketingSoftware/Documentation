# Toegestane sms-telefoonnummers

In een database sms-veld kunnen telefoonnummers op diverse wijzen worden
opgeslagen. Alleen sms-berichten aan telefoonnummers die op de
onderstaande wijze worden opgemaakt kunnen worden afgeleverd.

-   0031612345678 (internationaal, met landcode)
-   +31612345678 (internationaal, met plusteken en zonder nullen)
-   0031 6 1234 5678 or +31 6 1234 5678 (met spaties)
-   0612345678 (zonder landcode, alleen mogelijk met Nederlandse
    nummers)

Nummers die op een andere wijze zijn opgeslagen zullen waarschijnlijk
niet worden afgeleverd.

Niet-Nederlandse telefoonnummers moeten altijd voorzien zijn van een
landcode. Ook als je vanuit bijvoorbeeld Frankrijk naar Franse nummers
sms't.

## Mogelijke fouten

De software kan soms vermelden dat een sms-bericht succesvol is
afgeleverd. Echter, er is geen bericht daadwerkelijk aangekomen op dat
nummer.

Dit komt soms voor met Belgische nummers. De Belgische telecom provider
heeft moeite met sms-berichten die zijn verstuurd met een afzender
waarin alphabetische karakters voorkomen.

#### Wat kan je hieraan doen

Als SMS-berichten naar **Belgie** niet goed gaan, is het zaak dat als
*afzender* een internationaal telefoonnummer wordt gebruikt. Geen naam,
geen gewoon 06 nummer, maar met +31 ervoor.

Dus:**+31 6 123 456 78**

De afzender van een bericht stel je in via *Mobiel*\> *Document*menu \>
**Afzender**
