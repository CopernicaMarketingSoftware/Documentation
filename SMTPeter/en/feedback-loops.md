# Feedback loops

If you have been in e-mailmarketing for a while you might know the term 
"Feedback Loops". This term is used for the feedback we get from ESP's 
about bounces. 

However, Copernica has also previously used "Feedback Loops" 
for what are now called [Webhooks](./webhooks). WebHooks can be used 
to send information to your server in real-time about clicks, opens, bounces 
etc. You can read more about them in [this article](./webhooks).

## Changes with the new name

Of course you know what changes for you, besides the new name. You can 
configure WebHooks with an API call or within the software. In the software 
nothing will change and all of your previous WebHooks will work like you 
are used to. In the API there are two calls related to the name "Feedback 
loops": **feedbackloop** and **feedbackloops**. They configure a new 
webhook and request webhook settings respectively. In future versions of 
the API they will be replaced by **webhook** and **webhooks** respectively. 
Currently, you can use both names for your API calls.

## More information

Do you want to know more about WebHooks and how to use them? You can find 
the full article by clicking on the link below.

* [WebHooks](./webhooks)
