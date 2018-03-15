# Campagne Tutorial: Profiel verrijking JSON

Deze pagina bevat alle JSON code voor de follow-ups besproken in de 
[Profiel verrijking tutorial](./campaign-tutorial-profile-enrichment). 
De voorbeelden geven meer instructies waar nodig. Zorg ervoor dat je 
altijd dezelfde (hoofdlettergevoelige) namen gebruikt voor de velden of 
dat je de follow-up zelf aanpast om je eigen namen te gebruiken.

Zie het [artikel over importeren](./followups-importing-exporting) voor meer informatie.

## Informatie uit kliks

### Collectie

Deze follow-up wordt toegepast op een enkele link. Om de code te gebruiken 
moet je ook de "Create subprofile" box aanpassen en hier je eigen collectie 
selecteren. Voeg hier ook de URL en naam van je URL toe zodat deze correct 
in de collectie belanden.

```json
{
    "name": "",
    "description": "",
    "target": null,
    "boxes": [
        {
            "id": "74e88d7a-7601-4f5e-aeee-9d15e4ad3260",
            "title": "Click on a link",
            "position": {
                "x": -480,
                "y": -400
            },
            "description": "",
            "data": {},
            "type": "link-click",
            "subtype": null,
            "disabled": false
        },
        {
            "id": "649f5816-0c75-459b-b027-b724d8a4e8c2",
            "title": "Create subprofile",
            "position": {
                "x": -480,
                "y": -192
            },
            "description": "Edit this box to create a new subprofile.",
            "data": {
                "database": "7656",
                "collection": "21008",
                "fields": {
                    "name": "promotie1",
                    "url": "www.winkel.nl/promotie1"
                },
                "script": "if (!profile) return;var collection = copernica.collection(21008);var subprofile = profile.createSubProfile(collection);if (subprofile) { subprofile.fields.name = \"promotion1\";subprofile.fields.date_clicked = \"\";subprofile.fields.url = \"www.store.com/promotion1\"; }"
            },
            "type": "execute",
            "subtype": "create-subprofile",
            "disabled": false
        }
    ],
    "links": [
        {
            "label": "",
            "from": "74e88d7a-7601-4f5e-aeee-9d15e4ad3260",
            "to": {
                "x": -392.125,
                "y": -193.5625
            },
            "comparison": "=="
        }
    ],
    "events": [],
    "comments": [
        {
            "position": {
                "x": -768,
                "y": -400
            },
            "description": "Een link naar een promotie wordt aangeklikt."
        },
        {
            "position": {
                "x": -752,
                "y": -192
            },
            "description": "De klik wordt opgeslagen om later te gebruiken."
        }
    ]
}
```

### Profiel

Deze follow-up wordt toegepast op een enkele link.

```json
{
    "name": "",
    "description": "",
    "target": null,
    "boxes": [
        {
            "id": "74e88d7a-7601-4f5e-aeee-9d15e4ad3260",
            "title": "Click on a link",
            "position": {
                "x": -416,
                "y": -96
            },
            "description": "",
            "data": {},
            "type": "link-click",
            "subtype": null,
            "disabled": false
        },
        {
            "id": "cd5298e3-d4fd-4034-8c3e-5ddec589eafe",
            "title": "Update destination",
            "position": {
                "x": -416,
                "y": 96
            },
            "description": "Update destination subscribed with 'ja'",
            "data": {
                "value": "yes",
                "type": "fields",
                "property": "nieuwsbrief",
                "target": "destination",
                "script": "if(typeof(destination) != 'undefined' && !!destination) { destination.fields.nieuwsbrief = 'ja'; }else if(typeof(subprofile) != 'undefined' && !!subprofile) { subprofile.fields.nieuwsbrief = 'ja'; }else if(typeof(profile) != 'undefined' && !!profile) { profile.fields.nieuwsbrief = 'ja'; }"
            },
            "type": "execute",
            "subtype": "change-target",
            "disabled": false
        }
    ],
    "links": [
        {
            "label": "",
            "from": "74e88d7a-7601-4f5e-aeee-9d15e4ad3260",
            "to": "cd5298e3-d4fd-4034-8c3e-5ddec589eafe",
            "comparison": "=="
        }
    ],
    "events": [],
    "comments": [
        {
            "position": {
                "x": -736,
                "y": -96
            },
            "description": "De inschrijf link voor de nieuwsbrief wordt aangeklikt."
        },
        {
            "position": {
                "x": -736,
                "y": 96
            },
            "description": "Het \"nieuwsbrief\" veld van het (sub)profiel wordt naar \"ja\" veranderd."
        }
    ]
}
```

## Informatie uit orders

Deze follow-up wordt toegepast op een collectie.

```json
{
    "name": "",
    "description": "",
    "target": null,
    "boxes": [
        {
            "id": "5325c4ae-7f0e-46d2-a1ee-5b46d9241488",
            "title": "Followup start",
            "position": {
                "x": 0,
                "y": 48
            },
            "description": "",
            "data": [],
            "type": "link-click",
            "subtype": null,
            "disabled": false
        },
        {
            "id": "709d7b8c-ecc4-48b7-b4e5-a8cf33320680",
            "title": "Javascript execution",
            "position": {
                "x": 0,
                "y": 176
            },
            "description": "Script defined",
            "data": {
                "script": "profile.interests[subprofile.fields.category] = true;"
            },
            "type": "execute",
            "subtype": null,
            "disabled": false
        }
    ],
    "links": [
        {
            "label": "",
            "from": "5325c4ae-7f0e-46d2-a1ee-5b46d9241488",
            "to": "709d7b8c-ecc4-48b7-b4e5-a8cf33320680",
            "comparison": "=="
        }
    ],
    "events": [],
    "comments": [
        {
            "position": {
                "x": -256,
                "y": 48
            },
            "description": "Er is een order geplaatst en een nieuw subprofiel aangemaakt."
        },
        {
            "position": {
                "x": -256,
                "y": 176
            },
            "description": "De categorie van het artikel wordt geactiveerd als interesse van de klant."
        }
    ]
}
```

[Terug naar de tutorial](./campaign-tutorial-profile-enrichment)
