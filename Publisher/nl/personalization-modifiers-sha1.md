# Personalizatie modifier: *sha1*

De *sha1* modifier berekent de sha1 hash van een string. De modifier is 
gebaseerd op de [sha1 functie](http://php.net/manual/en/function.sha1.php) 
van PHP.

## Voorbeeld

Het `$word` "apple" kan geencodeerd worden naar sha1 met de volgende code:

    {$word}
    {$word|sha1}
    
De output ziet er als volgt uit:

    apple
    d0be2dc421be4fcd0172e5afceea3970e2f3d940

## Meer informatie

* [Personalizatie](./personalization)
* [Personalizatie modifiers](./personalization-modifiers)
* [base64_encode modifier](./personalization-modifiers-base64_encode)
* [md5 modifier](./personalization-modifiers-sha1)

