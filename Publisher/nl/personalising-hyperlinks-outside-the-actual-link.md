In een [recente
blogpost](https://www.copernica.com/nl/blog/nieuwe-tracking-links) heb
je kunnen lezen dat hyperlinks in e-mails niet langer worden vervangen
met het *pic.vicinity* domein, en voortaan veel sterker lijken op het
originele webadres.

Dit maakt de link voor de ontvanger van de e-mail natuurlijk een stuk
betrouwbaarder. Maar de wijziging in ons systeem heeft *nog* een zeer
gunstig bij-effect: het personaliseren van hyperlinks is niet meer zo
omslachtig als dat het was.

### Een kort voorbeeld

In de onderstaande twee regels template code wordt eerst een
profielwaarde toegekend aan de variable `profileURL`. Vervolgens wordt
deze variable uitgelezen in de `<a>`-tag.

    {capture assign="profileURL"}{$profile.customurl}{/capture}
    <a href="{$profileURL}">Klik om je prijs te claimen</a>

Het lijkt valide code, en dat is het ook. Echter, in de oude situatie
kregen ontvangers van een e-mail toch een lege link te zien. Dit kwam
door de verschillende momenten in tijd waarop de twee regels code werden
uitgelezen en uitgevoerd.

De enige workaround was om de VOLLEDIGE code, dus inclusief *iteraties*
en *if-statements* op te nemen in de hyperlink. Dit leverde natuurlijk
rommelige en moeilijk onderhoudbare templates op.

Door de recente grote wijziging in ons systeem behoort dit tot het
verleden en is onderstaande code eindelijk mogelijk:

    // store reference to new arrivals product collection in newArrivals
    {loadsubprofile source="productsdatabase:newarrivals" profile=1337 assign=newArrivals}

    // loop through the products in newArrivals
    {foreach $newArrivals as $arrival} 

        // find product for male subscribers with an interest in betonmortelspecieroerstokjes 
        {if $profile.gender == 'male' && $arrival.type == 'betonmortelspecieroerstokjes'}

            // use the product ID to link to the corresponding product page
            <li>{$arrival.productName} <a href="http://winkeltjeomtewinkelen.com/products?ID={$arrival.productID}">Bestel nu</a></li>
        {/if}
    {/foreach}
