# Data-script - data

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

* [Data-scripts](./followups-scripting)
* [Copernica data-script](./followups-scripting-copernica)
* [Database data-script](./followups-scripting-database)
* [Collectie data-script](./followups-scripting-collection)
* [Profiel data-script](./followups-scripting-profile)
* [Subprofiel data-script](./followups-scripting-subprofile)
* [Destination data-script](./followups-scripting-destination)
* [Mailing data-script](./followups-scripting-mailing)
* [Template data-script](./followups-scripting-template)
* [Bericht data-script](./followups-scripting-message)
