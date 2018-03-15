# Campagne Tutorial: Herhalingsaankopen JSON

Deze pagina bevat alle JSON code voor de follow-ups besproken in de 
[Herhalingsaankopen campagne tutorial](./campaign-tutorial-repeat-purchase). 

Zie het [artikel over importeren](./followups-importing-exporting) voor meer informatie.

## Voorbeelden

### Met emailadressen in collectie

In dit geval heb je alleen twee [miniselecties](./selections-introduction) nodig.

### Zonder emailadressen in collectie

Dit voorbeeld wordt toegepast op een collectie. Het update de waarde van een 
subprofiel naar een profiel, afhankelijk van de categorie veld uit het 
subprofiel.

```json
{
    "name": "Laatste telefoon aankoop updater",
    "description": "",
    "target": {
        "database": "7656",
        "collection": 20985
    },
    "boxes": [
        {
            "id": "ef563386-2a64-4334-ba4a-83c1431151e7",
            "title": "Followup start",
            "position": {
                "x": 48,
                "y": 64
            },
            "description": "",
            "data": {},
            "type": "link-click",
            "subtype": null,
            "disabled": false
        },
        {
            "id": "c3162089-c309-4b42-88ad-b7003963cf64",
            "title": "Javascript execution",
            "position": {
                "x": 48,
                "y": 176
            },
            "description": "Script defined",
            "data": {
                "script": "if (subprofile.fields.category == \"telefoons A\") profile.fields.laatste_telefoon_a = subprofile.fields.order_datum;\nelse if (subprofile.fields.category == \"telefoons B\") profile.fields.laatste_telefoon_b = subprofile.fields.order_datum;"
            },
            "type": "execute",
            "subtype": null,
            "disabled": false
        }
    ],
    "links": [
        {
            "label": "",
            "from": "ef563386-2a64-4334-ba4a-83c1431151e7",
            "to": "c3162089-c309-4b42-88ad-b7003963cf64",
            "comparison": "=="
        }
    ],
    "events": [],
    "comments": [
        {
            "position": {
                "x": -240,
                "y": 176
            },
            "description": "Voeg aankoopdatum toe aan het juiste veld."
        },
        {
            "position": {
                "x": -240,
                "y": 64
            },
            "description": "Aankoop is gedaan."
        }
    ]
}
```

[Terug naar de tutorial](./campaign-tutorial-repeat-purchase)
