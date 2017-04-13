# Personalizatie modifier: *md5*

De *md5* modifier berekent de md5 hash van een string. Deze 
modifier is gebaseerd op de [md5 function](http://php.net/manual/en/function.md5.php) van PHP.

## Voorbeeld

Het `$word` "apple" kan geencodeerd worden naar md5 met de volgende code:

    {$word}
    {$word|md5}
    
De output ziet er als volgt uit:

    apple
    1f3870be274f6c49b3e31a0c6728957f

## Meer informatie

* [Personalizatie](./personalization)
* [Personalizatie modifiers](./personalization-modifiers)
* [base64_encode modifier](./personalization-modifiers-base64_encode)
* [sha1 modifier](./personalization-modifiers-sha1)
