# Personalizatie functies: strip

De *strip* functie verwijdert ruimte uit de template, die anders de HTML 
output zou kunnen veranderen. Het is nuttig als je graag je code uitschrijft 
met whitespace om het meer leesbaar te maken en voorkomt de vreemde bijwerkingen 
die dit kan hebben.

## Voorbeeld

Het volgende voorbeed laat zien hoe je de functie gebruikt. Dit voorbeeld 
komt uit de [Smarty documentatie](http://www.smarty.net/docs/en/).

    {strip}
    <table border='0'>
     <tr>
      <td>
       <a href="{$url}">
        <font color="red">This is a test</font>
       </a>
      </td>
     </tr>
    </table>
    {/strip}
    
Dit verandert alle HTML tags in een lange regel in je daadwerkelijke mail. 
Let wel op dat je geen normale tekst aan het begin of einde van een regel 
hebt staan, dit kan het resultaat onverwacht veranderen.

## Meer informatie

* [Personalizatie](./personalization)
* [Personalizatie functies](./personalization-functions)
