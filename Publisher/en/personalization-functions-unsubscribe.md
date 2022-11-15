# Personalization functions: Unsubscribe

It is required by law to add an unsubscribe link that works and 
is visible to every commercial mail. Copernica offers different options 
for adding such an unsubscribe link, of which the **{unsubscribe}** is 
the easiest.

Note: When using this function you should have set the [unsubscribe behaviour](./database-unsubscribe-behavior) 
already.

## Adding the unsubscribe link

Use the following code to add the unsubscribe link to the HTML source 
code of the template or text block in the document.

    <a  href="http://www.example.com" data-script="profile.unsubscribe();">Unsubscribe</a>

### Example

    <a href="https://www.copernica.com/en/unsubscribe/{$profile.id}/{$profile.code}/">
        Do not send me emails anymore
    </a>

## Extra options

After unsubscribing the profile is sent to a default unsubscribe page. 
However, it is also possible to redirect the user to one of your own pages.

`{unsubscribe redirect='http://www.eendomein.nl/eigenlandingspagina.html'}`

The standard domain of Copernica is pix.copernica.com, but when the user 
hovers over the link they see this. Therefore it looks more professional 
to refer to your own domain with the *domain* option.

`{unsubscribe domain='nieuwsbrief.yourdomain.com'}`

Please note that the unsubscribe domain should have a CNAME reference to 
our server (http://vicinity.picsrv.net/) in order to make the link work, 
because otherwise the unsubscribe action does not reach us.

## More information

* [Personalization functions](./personalization-functions)
