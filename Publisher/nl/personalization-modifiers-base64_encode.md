# Personalizatie modifier: *base64_encode*

De *base64_encode* modifier kan gebruikt worden om een variabele te encoderen 
in Base64. Base64 is een algemene term voor encoders die binaire date numeriek 
behandelen en omzetten in base 64 encoding. Het wordt veel gebruikt om binaire 
data te versturen over media die is ontworpen voor tekst, zodat de boodschap 
niet wordt aangepast.

## Voorbeeld

Stel dat we de binaire `$identifier` "01010101010011" hebben. We kunnen deze 
nu omzetten naar base 64.

    {$identifier}
    {$identifier|base64_encode}
    
Het resultaat ziet er als volgt uit:

        01010101010011
        MDEwMTAxMDEwMTAwMTE

## Meer informatie

* [Personalizatie](./personalization)
* [Personalizatie modifiers](./personalization-modifiers)
* [md5 modifier](./personalization-modifiers-md5)
* [sha1 modifier](./personalization-modifiers-sha1)
