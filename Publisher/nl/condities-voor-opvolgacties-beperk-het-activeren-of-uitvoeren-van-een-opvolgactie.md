Het is mogelijk om een opvolgactie wel / niet in te roosteren en/of uit
te voeren op basis van gegevens uit het profiel of subprofiel aan wie de
opvolgactie is gericht. Voor het instellen van deze condities kan je
gebruik maken van de *eenvoudige script editor*, of van de *geavanceerde
script editor*voor vrije invoer van JavaScript.

De condities kunnen worden ingesteld voor zowel het inroosteren en het
uitvoeren van de opvolgacties.

We onderscheiden hierbinnen twee soorten condities:

1.  Activeringsconditie (A)
2.  Uitvoeringsconditie (B)

![](../images/followupsconditions.png)

A. Activatie conditie
---------------------

Conditie op de activatie van de opvolgactie

**De opvolgactie wordt alleen geactiveerd als het profiel (op het moment
van activatie) voldoet aan de gestelde conditie(s).**

De condities worden geevalueerd wanneer de opvolgactie wordt
aangeroepen, bijvoorbeeld: het profiel heeft op een link geklikt. De
opvolgactie wordt direct geactiveerd wanneer het profiel voldoet aan de
activatieconditie. Anders wordt de opvolgactie **niet** geactiveerd voor
dit profiel.

Voorbeeld: je wilt een opvolgmail over Viagra sturen. Met behulp van de
activatieconditie kan je voorkomen dat deze opvolgactie geactiveerd voor
personen die op het moment van activatie jonger zijn dan 65. Je maakt
dan de conditie: *[Leeftijd is ouder dan 65]*

Deze conditie wordt NIET geevalueerd wanneer de opvolgactie zou worden
uitgevoerd, wat maanden later kan zijn. Hiervoor gebruik je de
uitvoeringsconditie.

B. Uitvoeringsconditie
----------------------

Conditie op het uitvoeren van de opvolgactie

De conditie wordt geevalueerd wanneer de opvolgactie moet worden
uitgevoerd. De opvolgactie wordt dus alleen daadwerkelijk uitgevoerd als
het profiel of subprofiel op dat moment aan de gestelde eisen voldoet.

Voorbeeld: je hebt een opvolgactie gekoppeld aan een mailing, waardoor
een maand later automatisch een vervolgmail wordt gestuurd aan deze
persoon. Echter, in deze maand heeft de persoon te kennen gegeven geen
e-mails meer te willen ontvangen van jou.

Met behulp van een uitvoeringsconditie kan je voorkomen dat de
opvolgactie wordt uitgevoerd voor deze persoon. Bijvoorbeeld door te
controleren of het veld *Nieuwbrief* nog steeds op 'ja' staat in het
profiel.
