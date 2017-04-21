# Personalizatie functies: condition

Een *condition* lijkt qua werking veel op de [if functie](./personalization-functions-if) 
maar evalueert Javascript expressies. De enige parameter is de expressie 
in Javascript die geëvalueerd moet worden.

## Voorbeeld

    {condition expression="Math.random<0.5"}
        {Display some content}
    {/condition}
    
Deze inhoud wordt maar in 50% van de gevallen getoond op willekeurige wijze, 
maar je kunt de expressies zo ingewikkeld maken als je wil.

## Meer informatie

* [Personalizatie](./personalization)
* [Personalizatie functies](./personalization-functions)
