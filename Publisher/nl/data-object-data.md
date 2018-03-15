# Data object - data

Het data data-script kan worden gebruikt om data in op te slaan. Dit kan 
van alles zijn, maar over het algemeen kun je het beste data opslaan die 
gaat over events die in je e-mails plaatsvinden.

Stel dat je een e-mail hebt geschreven waar 10 aanbiedingen in
staan. Het data data-script komt hier nu van pas, omdat je kunt opslaan 
welke aanbiedingen worden aangeklikt. Je doet dit op de volgende manier:

```javascript
profile.data.klikopAanbieding1 = "ja";
```

Vervolgens kun je de informatie gebruiken in een ander script:

```javascript
if (profile.data.klikopAanbieding1 === "ja") {
    // Voeg hier een actie toe.
} else {
    // Voeg hier een andere actie toe.
}
```


## Meer informatie

* [Data-scripts](./data-object)
* [Copernica data-script](./data-object-copernica)
* [Database data-script](./data-object-database)
* [Collectie data-script](./data-object-collection)
* [Profiel data-script](./data-object-profile)
* [Subprofiel data-script](./data-object-subprofile)
* [Destination data-script](./data-object-destination)
* [Mailing data-script](./data-object-mailing)
* [Template data-script](./data-object-template)
* [Bericht data-script](./data-object-message)
