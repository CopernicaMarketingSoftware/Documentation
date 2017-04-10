# Versturen op basis van een template

Er zijn een aantal [voorbeelden](rest-send-json) gegeven van hoe je data naar SMTPeter stuurt.
Hierbij is het nodig om telkens de hele e-mail te versturen naar SMTPeter. Of als een 
'MIME' string of als individuele tekst en html 'properties'. Het is ook mogelijk om 
gebruik te maken van vooraf-opgestelde 'templates'. Dit is handig, omdat je dan alleen
personalisatie velden mee hoeft te geven bij het versturen van data naar de REST API. 
Vanaf daar neemt SMTPeter het over, door de mail te construeren met de gepersonaliseerde 
data. 

In het SMTPeter 'dashboard' heb je toegang tot de uitgebreide 'drag-and-drop' editor.
Hier kun je 'responsive e-mail templates' maken, bewerken en beheren. Elke 'template'
krijgt een eigen 'id' die je kunt gebruiken om e-mail te versturen via de REST API.
Het is ook mogelijk om een gehele string of object in te voeren als 'e-mail template'. 


```json
{
    "recipient":    "john@doe.com",
    "template":     12 | **or string/object**,
    "data": {
        "firstname":    "John",
        "lastname":     "Doe"
    }
}
```
Je kunt dus '[personalization data](personalization)' meegeven aan de REST 'call', 
zodat de e-mail wordt gepersonaliseerd. Bovenstaand voorbeeld stuurt 'template' #12
naar john@doe.com, met de variabelen {$firstname} en {$lastname}. Dit wordt in de 
uiteindelijke e-mail weergegeven als 'John Doe'.
