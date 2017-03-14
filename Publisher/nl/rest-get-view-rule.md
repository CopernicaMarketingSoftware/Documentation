# REST API: regel data opvragen

Selecties gebruiken *regels* om te beslisses welke profielen worden gebruikt in de selectie en welke niet. Profielen die tenminste een regel matchen worden toegevoegd. Om de informatie van een enkele regel op te vragen kan er een HTTP GET verzoek worden verstuurd naar de volgende URL:

`https://api.copernica.com/v1/view/$id/rule/$id?access_token=xxxx`

De eerste `$id` code moet vervangen worden met de numerieke identifier van de selectie waar je een regel uit wilt opvragen. De tweede $id parameter moet de ID van de regel zijn.

## De geretourneerde informatie

Het resultaat van deze methode is een regel met bijhorende informatie:

- **ID**: numerieke identifier van de regel
- **name**: naam van de regel
- **view**: ID van de selectie waar de regel bij hoort
- **disabled**: waarde om aan te geven of de regel niet (1) /wel (0) geactiveerd is
- **inversed**: waarde die aangeeft of de regel een inverse is. Als deze variabele waar is worden profielen teruggegeven als ze de regel niet *matchen*
- **conditions**: array van voorwaarden voor de regel

Een regel heeft zijn eigen *voorwaarden* waaraan voldaan moet worden om met een profiel te matchen. De *voorwaarden* eigenschap die wordt teruggeven heeft een array van voorwaarde objecten, die elk de volgende eigenschappen bezitten:

- **ID**: numerieke identifier van de voorwaarde
- **type**: type van de voorwaarde
- **rule**: numerieke identifier van de regel waar de voorwaarde bij hoort

De precieze eigenschappen hangen af van het type van de voorwaarde. Voor een overzicht van de ondersteunde voorwaarden en de eigenschappen die zij bezitten kunt u de volgende specifiekere artikels bekijken:

- [Veranderings voorwaarden](./rest-condition-type-change.md)
- [Datum voorwaarden](./rest-condition-type-date.md)
- [DoubleField voorwaarden](./rest-condition-type-doublefield.md)
- [Email voorwaarden](./rest-condition-type-email.md)
- [Fax voorwaarden](./rest-condition-type-fax.md)
- [Veld voorwaarden](./rest-condition-type-field.md)
- [Interesse voorwaarden](./rest-condition-type-interest.md)
- [LastContact voorwaarden](./rest-condition-type-lastcontact.md)
- [Miniview voorwaarden](./rest-condition-type-miniview.md)
- [SMS voorwaarden](./rest-condition-type-sms.md)
- [Todo voorwaarden](./rest-condition-type-todo.md)
- [Survey voorwaarden](./rest-condition-type-survey.md)
- [Part voorwaarden](./rest-condition-type-part.md)
- [ReferView voorwaarden](./rest-condition-type-referview.md)

## Voorbeeld in PHP

Het volgende script kan gebruikt worden om de eigenschappen van regel 12 binnen selectie 1234 op te vragen:

    // vereiste scripts
    require_once('copernica_rest_api.php');
    
    // verander dit naar je access token
    $api = new CopernicaRestApi("your-access-token");

    // voer de methode uit en print het resultaat
    print_r($api->get("view/1234/rule/12"));

Voor dit voorbeeld heb je de [CopernicaRestApi klasse](./rest-php.md) nodig.

## Meer informatie

* [Overzicht van alle API calls](./rest-api.md)
* [Vraag alle selectie regels op](./rest-get-view-rules.md)
* [Voeg selectie regel toe](./rest-post-view-rules.md)
* [Pas selectie regel aan](./rest-put-rule.md)
* [Verwijder selectie regel](./rest-delete-rule.md)
* [Pas een conditie aan](./rest-put-condition.md)
* [Verwijder een conditie](./rest-delete-condition.md)

