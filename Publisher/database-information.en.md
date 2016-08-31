Using this method you can request information about the database
associated with **\$databaseID**. You can retrieve up to 10000 database
fields, interests and collections. The request returns a message
containing the database identifier, name and description. It also
returns whether the database is archived and when it was created. The
fields, interests and collections fields each contain a
`start/limit/total/data`, along with their respective values.

Request urlMethodsParameters /database/\$databaseID GET none Example output
---------------------------------------------------------------------------

    HTTP / 1.1 200 OK
    Date: Mon,
    10 Feb 2014 12: 25: 37 GMT
    Server: Apache / 2.2.22(Ubuntu)
    X - Powered - By: PHP / 5.3.10 - 1ubuntu3.9
    Content - Length: 2059
    Content - Type: application / json

    {
        "ID": "1",
        "name": "B2B_Demo_Relations",
        "description": "",
        "archived": false,
        "created": "2014-02-10 10:33:27",
        "fields": {
            "start": 0,
            "limit": 9,
            "total": 9,
            "data": [{
                "ID": "1",
                "name": "Company",
                "type": "text",
                "value": "",
                "displayed": true,
                "ordered": true,
                "length": "255",
                "textlines": "0",
                "hidden": false,
                "index": false
            }, ...]
        },
        "interests": {
            "start": 0,
            "limit": 0,
            "total": 0,
            "data": []
        },
        "collections": {
            "start": 0,
            "limit": 1,
            "total": 1,
            "data": [{
                "ID": "10",
                "name": "Employees",
                "database": "1",
                "fields": {
                    "start": 0,
                    "limit": 8,
                    "total": 8,
                    "data": [{
                            "ID": "1",
                            "name": "FirstName",
                            "type": "text"
                        },
                        ...
                    ]
                }
            }]
        }
    }

Example script PHP with cURL
----------------------------
