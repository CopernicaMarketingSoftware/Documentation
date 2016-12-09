Met behulp van smarty is het mogelijk om de afzender en het afzendadres
te personaliseren. Als elke klant automatisch een mailtje van zijn
accountmanager ontvangt (een bekende), dan komt dat erg professioneel
over.

In deze korte tutorial bespreken we een bedrijf met 3 accountmanagers.
Het bedrijf verstuurt een nieuwsbrief en wil graag de afzender en het
afzendadres als volgt personaliseren:

-   Klanten van accountmanager A.Arends zien als afzender 'A.Arends |
    Bedrijf' en als afzendadres arends@bedrijf.com
-   Klanten van accountmanager B.Boer zien als afzender 'B.Boer|Bedrijf'
    en als afzendadres boer@bedrijf.com
-   Klanten van accountmanager C.Clinton zien als afzender 'C.Clinton |
    Bedrijf' en als afzendadres clinton@bedrijf.com
-   Klanten zonder accountmanager zien als afzender 'Bedrijf' en als
    afzendadres nieuwsbrief@bedrijf.com

Het instellen van afzenders en afzendadressen gebeurt op
template-niveau. Per template kan een hele lijst hiervan worden
ingesteld, waarbij er bij elk document onder dat template een van de
lijst kan worden geselecteerd. Let op, het is belangrijk om dit eerst
goed in te stellen in de template om vervolgens een document aan te
maken. We gaan er in dit voorbeeld van uit dat de database van Bedrijf
een veld 'Accountmanager' bevat met daarin de achternaam van de
accountmanager behorende tot dat profiel (oftewel, die klant).

De volgende regels code gebruiken we voor het instellen van de
personalisatie. De bovenste is voor de afzender, de onderste voor het
afzendadres.

```
{if $Accountmanager =="Arends"}A.Arends | Bedrijf{elseif $Accountmanager=="Boer"}B.Boer | Bedrijf{elseif $Accountmanager=="Clinton"}C.Clinton | Bedrijf{else}Bedrijf{/if}

{if $Accountmanager =="Arends"}arends@bedrijf.com{elseif $Accountmanager=="Boer"}boer@bedrijf.com{elseif $Accountmanager=="Clinton"}clinton@bedrijf.com{else}nieuwsbrief@bedrijf.com{/if}
```

Als er nu een nieuw document onder deze template wordt aangemaakt, zal
deze optie in de keuzelijst verschijnen. De werking is direct te
controleren als de gepersonaliseerde weergave staat ingeschakeld.
