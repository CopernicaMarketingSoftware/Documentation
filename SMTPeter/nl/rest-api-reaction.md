# Terugkoppeling

Na het succesvol versturen van je request, stuurt SMTPeter een JSON object terug
met daarin een unieke identifier voor elke ontvanger waar de e-mail naar verstuurd
gaat worden.

```json
{
    "id1" : "recipient1@example.com",
    "id2" : "recipient2@example.com"
}
```

De geretourneerde id's kunnen worden gebruikt om informatie te verkrijgen middels 
andere methodes van de REST API. Omdat je e-mails kunt versturen naar meerdere ontvangers
met slechts een call, bevat de geretourneerde waarde wellicht meerdere id's 
en recipients.


## Afhandeling van fouten

De REST API heeft een heldere manier om fouten te communiceren. Namelijk, 
het teruggeven van de reguliere [HTTP error code](https://nl.wikipedia.org/wiki/Lijst_van_HTTP-statuscodes)
in kwestie. Het opgeven van verkeerde data of andere foutmeldingen maakt 
niet uit, omdat je ook altijd een textuele uitleg terugkrijgt over wat
precies fout is gegaan. Een succesvolle call geeft je altijd een status
code terug van `200` tot en met `202`.
