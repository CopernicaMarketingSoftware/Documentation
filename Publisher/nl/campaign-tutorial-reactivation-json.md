# Campagne Tutorial: Re-activation

Deze pagina bevat alle JSON code voor de follow-ups besproken in de 
[Re-activation tutorial](./campaign-tutorial-reactivation). 

Zie het [artikel over importeren](./followups-importing-exporting) voor meer informatie.

## Voorbeeld

Dit voorbeeld van een follow-up wordt toegepast op een collectie. 
Het voorbeeld kopieert de waarde van een subprofiel naar een profiel, in dit geval 
de waarde "order_datum" van het subprofiel naar "order_datum_laatst" in het profiel.
Je kunt deze code niet gebruiken zonder de juiste velden in je eigen database/collectie.

```
{
    "name": "Laatste aankoop updater",
    "description": "Deze follow-up update het \"order_datum_laatst\"  veld in het profiel.",
    "target": {
        "database": "7656",
        "collection": 20985
    },
    "boxes": [
        {
            "id": "2606b5e1-ac4d-4777-bfa6-d8ccea637970",
            "title": "Followup start",
            "position": {
                "x": -32,
                "y": -160
            },
            "description": "",
            "data": [],
            "type": "link-click",
            "subtype": null,
            "disabled": false
        },
        {
            "id": "f771bae6-79cc-4015-8563-44e340d97002",
            "title": "Javascript execution",
            "position": {
                "x": -32,
                "y": -48
            },
            "description": "Script defined",
            "data": {
                "script": "profile.fields.order_datum = subprofile.fields.order_datum_laatst;"
            },
            "type": "execute",
            "subtype": null,
            "disabled": false
        }
    ],
    "links": [
        {
            "label": "",
            "from": "2606b5e1-ac4d-4777-bfa6-d8ccea637970",
            "to": "f771bae6-79cc-4015-8563-44e340d97002",
            "comparison": "=="
        }
    ],
    "events": [],
    "comments": [
        {
            "position": {
                "x": -288,
                "y": -160
            },
            "description": "Aankoop is gedaan."
        },
        {
            "position": {
                "x": -288,
                "y": -48
            },
            "description": "Datum van laatste aankoop wordt geupdate."
        }
    ]
}
```

[Terug naar de tutorial](./campaign-tutorial-reactivation)
