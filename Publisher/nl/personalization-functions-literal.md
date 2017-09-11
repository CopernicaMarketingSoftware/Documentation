# Personalisatie functies: literal

De *literal* functie wordt gebruikt om een blok code letterlijk te nemen. 
Dit is vooral nuttig als je een blok code wil gebruiken waarin veel 
krulhaken staan, omdat deze normaal worden geïnterpreteerd als Smarty syntax, 
bijvoorbeeld Javascript.

In een simpel geval waarin bijvoorbeeld maar twee krulhaken gebruikt worden 
kan het handiger zijn om de [*ldelim* en *rdelim* functies](./personalization-functions-delim)
te gebruiken. Het is daarnaast in [Smarty 3](smarty-2-vs-smarty-3) ook 
mogelijk om simpelweg een spatie voor en achter elke haak te zetten.

## Voorbeeld

Om de *literal* functie te gebruiken hoef je alleen wat letterlijk genomen 
moet worden tussen de begin tag (`{literal}`) en end tag (`{\literal}`) 
te plaatsen.
 
    <script>
       // Deze haakjes zouden in Smarty 3 automatisch 
       // genegeerd worden door de whitespace
       function myFoo {
         alert('Foo!');
       }
       // Dit is een goede plek voor het literal blok,
       // omdat dat de code leesbaar houdt.
       {literal}
         function myBar {alert('Bar!');}
       {/literal}
    </script>
    
Dit voorbeeld komt uit de [Smarty documentatie](http://www.smarty.net/docs/en/).

## Meer informatie

* [Personalisatie](./personalization)
* [Personalisatie functies](./personalization-functions)
* [Linker en rechter delimiter](./personalization-functions-delim)
