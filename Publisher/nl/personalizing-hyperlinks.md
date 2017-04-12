# Gepersonaliseerde hyperlinks

Hyperlinks in e-mailings kunnen worden gepersonaliseerd. Een voorbeeld hiervan zijn de unieke
inloggegevens ($profile.id en $profile.code) die je in de hyperlink
meestuurt, zodat relaties automatisch worden ingelogd als zij vanuit een
e-mail naar een webpagina klikken.

Voorbeeld van hyperlink die wordt gepersonaliseerd met de unieke
inloggegevens van de ontvanger:

    http://www.example.com/gegevens-wijzigen?profile={$profile.id}&code={$profile.code}

Het is dus ook mogelijk om op deze manier een link te personaliseren:
    
    // Sla de nieuwe producten op in de variabele newArrivals
    {loadsubprofile source="productsdatabase:newarrivals" profile=1337 assign=newArrivals}

    // loop door de producten in newArrivals
    {foreach $newArrivals as $arrival} 

        // Laat het product zien voor de manlijke subscribers die een intresse hebben in betonmortelspecieroerstokjes
        {if $profile.gender == 'male' && $arrival.type == 'betonmortelspecieroerstokjes'}

            // Gebruik het product ID om naar de productpagina te linken
            <li>{$arrival.productName} <a href="http://example.com/products?ID={$arrival.productID}">Bestel nu</a></li>
        {/if}
    {/foreach}

Let op! dit kan alleen met [het nieuwe link tracking systeem](https://www.copernica.com/nl/blog/post/nieuw-link-tracking-systeem).
