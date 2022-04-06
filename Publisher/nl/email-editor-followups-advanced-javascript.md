# Geavanceerde JavaScript condities (Marketing Suite)

In de Follow-up-Manager van Marketing Suite is het, net als in Publisher ([zie documentatie](./advanced-javascript-conditions)), mogelijk om geavanceerde JavaScript condities te gebruiken. 

Je kunt JavaScript-blokken toevoegen door onderin de Follow-up-Manager te klikken op 'Geavanceerde modus'. Hier stel je controles in die plaatsvinden zodra opvolgacties worden geëvalueerd of uitgevoerd.

Als je wilt dat je opvolgactie wordt uitgevoerd moet je ervoor zorgen dat je JavaScript `true` teruggeeft. Bij `false` wordt de opvolgactie niet uitgevoerd.

## Mogelijkheden

| Functie                             | Output                                                                                                              |
|-------------------------------------|---------------------------------------------------------------------------------------------------------------------|
| profile.id                          | Het ID van het profiel                                                                                              |
| profile.created                     | Het tijdstip van aanmaken van het profiel                                                                           |
| profile.modified                    | Het tijdstip van de laatste wijziging aan het profiel                                                               |
| profile.fields.[veldnaam]           | Een specifiek veld van het profiel                                                                                  |
| profile.interests.[interessenaam]   | Een specifiek interesse van het  profiel                                                                                  |
| profile.subProfiles(collectienaam]  | Alle subprofielen die in de collectie zitten binnen het profiel  
| profile.collections.[collectienaam] | Alle subprofielen die in de collectie zitten binnen de database waar het profiel in zit                             |                                                |
| subprofile.id                       | Het ID van het subprofiel                                                                                           |
| subprofile.created                  | Het tijdstip van aanmaken van het subprofiel                                                                        |
| subprofile.modified                 | Het tijdstip van de laatste wijziging aan het subprofiel                                                            |
| subprofile.fields.[veldnaam]        | Een specifiek veld van het subprofiel                                                                               |


## Voorbeeld
Bij een gewijzigd subprofiel wil je dat de opvolgactie enkel wordt uitgevoerd als het veld 'createdDate' van dit subprofiel na de 'createdDate' van de overige subprofielen van dit profiel is.
```
function shouldSend() {

    // Haal de gehele collectie 'orders' op van de database
    // die hoort bij het profiel van het subprofiel waar de opvolgactie op wordt uitgevoerd  
    // en sla deze op in een constant
    const coll = profile.collections.orders;

    // loop door alle subprofielen die vallen binnen de collectie 'orders' onder dit profiel
    for (const i in profile.subProfiles(coll))
    {
        // Plaats de 'createDate' uit het subprofiel waar je doorheen loopt in een variabele
        var d1 = Date.parse(profile.subProfiles()[i].fields.createDate);
        
        // Plaats de 'createdDate' van het oorspronkelijke subprofiel in een variabele
        var d2 = Date.parse(subprofile.fields.createdDate);

        // Vergelijk beide velden met elkaar. Als de datum in d2 ouder is dan d1 wordt de opvolgactie niet uitgevoerd
        if (d2 < d1 ) {
            return false;
        }
    }

    // Als de datum in d2 nieuwer is dan alle overige subprofielen wordt de opvolgactie wel uitgevoerd
    return true;
}

shouldSend();
```
