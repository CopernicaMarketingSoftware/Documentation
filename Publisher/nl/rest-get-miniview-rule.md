# REST API: opvragen van regel data van miniview

Selecties gebruiken regels om te bepalen welke profielen zij bevatten. Profielen die tenminste een selectie regel matchen worden geselecteerd. Om de eigenschappen en condities van een enkele regel op te vragen kun je een HTTP GET verzoek sturen naar de volgende URL:

'https://api.copernica.com/v1/miniview/$id/minirule/$id?access_token=xxxx'

De eerste $id moet vervangen worden met de numerieke identifier van de miniview waarvan je een regel wil opvragen. De tweede $id moet de ID van de regel zijn.

## De teruggegeven velden

Deze methode geeft een JSON minirule object terug. Deze bevat de volgende eigenschappen:

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

Het volgende PHP script demonstreert hoe de API method te gebruiken is.

    // vereiste scripts
    require_once('copernica_rest_api.php');
    
    // verander dit naar je access token
    $api = new CopernicaRestApi("your-access-token");

    // voer het verzoek uit en print het resultaat
    print_r($api->get("miniview/1234/minirule/12"));

Dit voorbeeld vereist de [CopernicaRestApi klasse](rest-php).

## Meer informatie

* [Overzicht van alle API methodes](rest-api)
* [Vraag alle selectie regels van een miniview op](./rest-get-miniview-rules.md)
* [Voeg selectie regel toe](./rest-post-miniview-rules.md)
* [Pas selectie regel aan](./rest-put-minirule.md)
* [Verwijder een selectie regel](./rest-delete-minirule.md)
* [Pas een conditie aan](./rest-post-minirule-condition.md)
