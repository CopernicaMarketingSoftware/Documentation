# REST API: overzicht van methodes

We hebben de documentatie van de REST API opgesplitst in verschillende
methodes. 

| Methode   | Adres                                                                                     | Omschrijving                  |
| --------- | ----------------------------------------------------------------------------------------- | ----------------------------- |
| GET       | [api.copernica.com/databases](./rest-get-databases)                                       | Opvragen databases            |
| POST      | [api.copernica.com/databases](./rest-post-databases)                                      | Aanmaken nieuwe database      |
| GET       | [api.copernica.com/database/$id](./rest-get-database)                                     | Opvragen databasegegevens     |
| PUT       | [api.copernica.com/database/$id](./rest-put-database)                                     | Bijwerken databasegegevens    |
| DELETE    | [api.copernica.com/database/$id](./rest-delete-database)                                  | Verwijderen database          |
| GET       | [api.copernica.com/database/$id/fields](./rest-get-database-fields)                       | Opvragen databasevelden       |
| POST      | [api.copernica.com/database/$id/fields](./rest-post-database-fields)                      | Aanmaken databaseveld         |
| GET       | [api.copernica.com/database/$id/interests](./rest-get-database-interests)                 | Opvragen interesses           |
| POST      | [api.copernica.com/database/$id/interests](./rest-post-database-interests)                | Aanmaken interesse            |
| GET       | [api.copernica.com/database/$id/collections](./rest-get-database-collections)             | Opvragen collecties           |
| POST      | [api.copernica.com/database/$id/collections](./rest-post-database-collections)            | Aanmaken collectie            |
| GET       | [api.copernica.com/database/$id/profiles](./rest-get-database-profiles)                   | Opvragen profielen            |
| POST      | [api.copernica.com/database/$id/profiles](./rest-post-database-profiles)                  | Aanmaken nieuw profiel        |


**Let op**: bovenstaande lijst is nog lang niet compleet. De REST API kent veel meer methodes die gaandeweg worden gedocumenteerd.



<!--

| [/database/$databaseID/unsubscribe](./database-unsubscribe-behaviour.md) | GET, POST |
| [/database/$databaseID/callbacks](./database-callbacks.md) | GET, POST |

-->
