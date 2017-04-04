# JSON vs POST data

Met de REST API kan je HTTP POST 'requests' gebruiken om data te versturen
naar SMTPeter. De data kan of in JSON formaat of in 'url-encoded'
formaat worden verstuurd. Versturen in JSON formaat geeft je meer mogelijkheden 
dan de traditionele POST data, omdat je met JSON data kan 'nesten'.  

SMTPeter stuurt je over het algemeen data in JSON formaat terug, tenzij het
logischer is om een ander formaat te hanteren. Bijvoorbeeld als je de REST API
gebruikt om een JPEG afbeelding te downloaden of een 'html string'. De 'content-type'
moet worden geinspecteerd om na te gaan welke data is teruggegeven. 


## Voorbeeld API 'call' door middel van POST data

Het hieropvolgende stuk 'code' laat een voorbeeld zien van communicatie tussen de
applicatie van de gebuiker en SMTPeter. In dit voorbeeld hebben we ook een stuk 
van de data meegegeven wat daadwerkelijk wordt verstuurd. 

```text
POST /v1/send?access_token=YOUR_API_TOKEN HTTP/1.0
Host: www.smtpeter.com
Content-Type: application/x-www-form-urlencoded
Content-Length: 1484

envelope=info%40example.com&recipient=....
```

## Voorbeeld API 'call' door middel van JSON data

Je kan ook op een andere manier data  verzenden naar de REST API. In dit geval versturen
we data door de input te 'JSON-encoden'. Dit werkt min of meer volgens hetzelfde principe
als het versturen van traditionele form data. Echter, je moet natuurlijk wel de 'content-type' 
omzetten naar 'application/json':

```text
POST /v1/send?access_token={YOUR_API_TOKEN} HTTP/1.0
Host: www.smtpeter.com
Content-Type: application/json
Content-Length: 246

{
    "envelope":     "info@example.com",
    "recipient":    "john@doe.com",
    "subject":      "This is the subject",
    "html":         "This is example content",
    "from":         "info@example.com",
    "to":           "john@doe.com"
}
```
