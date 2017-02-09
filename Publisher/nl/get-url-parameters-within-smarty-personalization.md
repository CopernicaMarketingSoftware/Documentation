# Parameters van URL opvragen

Als je een webpagina personaliseert, dan is het mogelijk om de query string 
uit een URL te gebruiken in smarty personalisatie. Hiervoor gebruik je de 
{$smarty.get.*variabele*}. Als een webpagina bijvoorbeeld
wordt bezocht via de url http://mywebsite.example.com*?name=Sjon*, dan kun
je de variabele *name* gebruiken in de personalisatie:

    Hallo {$smarty.get.name|escape}!

De naam *Sjon* wordt weergegeven op de webpagina.
