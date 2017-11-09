# Feedback loops

Als je al langer bezig bent met e-mailmarketing ken je misschien de term 
"Feedback Loops" al. Deze term wordt gebruikt voor de feedback die wij 
ontvangen van ESP's over bounces.

Copernica gebruikte echter ook de term "Feedback Loops" voor wat 
tegenwoordig [Webhooks](./webhooks) worden genoemd. WebHooks kunnen gebruikt 
worden om informatie naar je server te sturen in real-time, over onder andere 
kliks, opens en bounces. Je kunt hier meer over lezen in [dit artikel](./webhooks).

## Veranderingen met de nieuwe naam

Natuurlijk wil je weten wat er concreet voor jou verandert, naast de nieuwe 
naam. Je kunt WebHooks instellen met een API call of in de software. In 
de software verandert er niets. Al je huidige WebHooks zullen exact 
functioneren zoals je gewend bent. In de API zijn er twee calls gerelateerd 
aan de oude benaming "Feedback Loops": **feedbackloop** en **feedbackloops**.
Deze worden gebruikt om een webhook in te stellen of de instellingen op 
te vragen, respectievelijk. In nieuwere versies van de API zullen deze 
calls **webhook** en **webhooks** heten. Op het moment kun je beide 
gebruiken.