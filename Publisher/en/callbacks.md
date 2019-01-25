# Callbacks
a webhook is a way to be kept informed by means of an HTTP POST request. In Publisher, webhooks are called Callbacks. Callbacks can be triggered when you create, update or delete a (sub) profile.

Before you set up Callback, check whether your server can handle the incoming data stream. In particular, the webhooks that are activated when importing a database or collection. If you are not sure whether your server can handle all these notifications, or if you do not need real-time feedback, it is recommended to use the general statistics.

## Set up callbacks
Under the heading Database management, on the Profiles page, you can manage the callbacks per database or collection. The following options will appear when creating or updating a callback.
* URL: The url to which the Callback refers to.
* Method: Format of the data that is sent.
* Action Type: The action triggering the callback.
* Trigger: What can trigger this callback.

For the "Action Type" you can choose the following options:
* [create](./callbacks-variables): When creating a (sub) profile.
* [update](./callbacks-variables): When updating a (sub) profile.
* [delete](./callbacks-variables): When deleting a (sub) profile.
* all: All the above.

### Triggers
A webhook can be triggered in many ways, a profile can for instance be modified by a API call, this is not always the desired behaivior. To disable these calls you can unselect the rest trigger and the webhook will no longer be called when a (sub) profile is modified by the API. The following triggers are specified:
*  publisher:    Manual change in publisher
*  rest:         Incoming rest API call
*  soap:         Incoming soap API call
*  click:        Click-handler running on a tracking-server
*  open:         Open-handler running on a tracking-server
*  failure:      When a failed delivery is reported
*  bounce:       When an incoming bounce is reported
*  import:       When doing a mass database import
*  copy:         When copieng a database

## Callback conditions
Conditions are also supported by the Callbacks. For example, conditions can be used to only trigger the callbacks containing the name "Mike". Click [here](./selections-conditions-partcondition) to read more about making conditions.

## Webhook security
All our HTTP requests contain a signature, messages can be validated through this signature. An signature contains the following fields:
* (request-target): The url which this request refers to (eg /path/to/your/script.php).
* Host: The host name.
* Date: The date this request was made.
* X-Copernica ID: Your Copernica account id.
* Digest: The message summary.

Click [Callback security](./callbacks-security)for further reading about the security of webhooks.

# More Information
* [Callback security](./callbacks-security)
