# Campaign Tutorial: Profile enrichment JSON

This page contains all the JSON code for the follow-ups discussed in the 
[Profile enrichment tutorial](./campaign-tutorial-profile-enrichment). 
Each example provides additional instructions on using the code where needed. 
Make sure your fields always have the same (case-sensitive) name as the 
example, or adapt the follow-up yourself where necessary.

See the article on [importing](./followups-importing-exporting) for more 
information.

## Creating a custom subscribe link

This follow-up is applied to a single link.

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
            "description": "Update destination subscribed with 'yes'",
            "data": {
                "value": "yes",
                "type": "fields",
                "property": "subscribed",
                "target": "destination",
                "script": "if(typeof(destination) != 'undefined' && !!destination) { destination.fields.subscribed = 'yes'; }else if(typeof(subprofile) != 'undefined' && !!subprofile) { subprofile.fields.subscribed = 'yes'; }else if(typeof(profile) != 'undefined' && !!profile) { profile.fields.subscribed = 'yes'; }"
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
            "description": "The subscribe link is clicked."
        },
        {
            "position": {
                "x": -736,
                "y": 96
            },
            "description": "The \"subscribed\" field of the (sub)profile is set to \"yes\"."
        }
    ]
}
```

## Gathering interests from orders

This follow-up is applied to a collection.

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
            "description": "An order was placed."
        },
        {
            "position": {
                "x": -256,
                "y": 176
            },
            "description": "The article category is enabled as an interest of the customer."
        }
    ]
}
```

[Back to the tutorial](./campaign-tutorial-profile-enrichment)
