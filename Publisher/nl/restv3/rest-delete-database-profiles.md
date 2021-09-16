# REST API: DELETE database profiles
Deze methode kan gebruikt worden als je meerdere profielen wilt verwijderen uit een database. Wees hierbij voorzichtig aangezien het aantal profielen die je kunt verwijderen met deze call niet gelimiteerd is.
Je kunt dit doen met behulp van een HTTP DELETE request naar de volgende URL:
`https://api.copernica.com/v3/database/$id/profiles?access_token=xxxx`
De code $id moet je vervangen door de numerieke identifier van de database waar binnen je profielen wilt veranderen. 
## Beschikbare parameters
De volgende parameters moeten aan de URL als variabelen worden toegevoegd:
* **Profiles**: Array met profiel ID's die je wilt verwijderen.

### Voorbeeld:
```
{
	"profiles" : 
	[
		123,
		124,
		125,
		126
	]
}
```
Als deze methode met behulp van onze PHP hulpklasse succesvol is uitgevoerd zijn de profielen met ID's 123, 124, 125 en 126 niet meer zichtbaar in de database.

## Meer informatie
* [Overzicht van alle API calls](./rest-api.md)
