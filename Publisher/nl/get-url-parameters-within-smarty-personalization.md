Het is mogelijk om de query string uit een URL te gebruiken in smarty
personalisatie. Hiervoor gebruik je de {\$smarty.get.\<query name\>}.

**Voorbeeld:** voeg de query *name=Sjon* toe aan de link URL van je
webpagina

http://mywebsite.example.com*?name=Sjon*

Voeg vervolgens de volgende smarty code toe aan jouw
webpagina**{\$smarty.get.name}**

Toon de pagina gepersonaliseerd. De naam *Sjon* wordt weergegeven in je
document.
