# Guest object

A guest is a Magento user that decided to finalize his basket without registration.
Any Magento user can do that by using anonymous checkout option. Prior to such
checkout, 'Allow guest checkouts' option has to be set inside Magento.

## Personalization properties

| Property name | Property type | Description                                               |
|---------------|---------------|-----------------------------------------------------------|
| ID            | _number_      | The guest ID from Magento.                                |
| firstname     | _string_      | The first name of the guest.                              |
| middlename    | _string_      | The middle name of the guest.                             |
| prefix        | _string_      | The prefix of the guest.                                  |
| lastname      | _string_      | The last name of the guest.                               |
| email         | _string_      | The email address.                                        |
| gender        | _string_      | Customer gender. Can be either: 'male', 'female' or null  |
