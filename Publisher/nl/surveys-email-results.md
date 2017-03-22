# Enquêtes: Stuur enquête antwoorden per email

Het is mogelijk om de gegeven antwoorden toegestuurd te krijgen, zodra 
een enquête is ingevuld. Dit doe je door een opvolgactie te koppelen aan 
de enquête.

Om een email te sturen voor elke voltooiing van de enquête moet je een 
opvolgactie aanmaken onder het **Enquête** menu. Bij **Aanleiding** 
selecteer je "De enquête is ingevuld" en verzonden en bij **Actie** 
"Verstuur een tekstueel e-mailbericht. Je kunt nu een verzender en 
verzendadres toevoegen. Onder het **bericht** tabje kun je de volgende 
code toevoegen om de resulten toe te voegen.

    {foreach from=\$survey.questions key=number item=question}\
      {\$question.question}\
      {\$question.type}\
      {if \$question.type == "open"}\
       {\$question.answer}\
      {else}\
       {foreach from=\$question.answer item=answer}{\$answer}{/foreach}\
      {/if}\
     {/foreach}

## Meer informatie

* [Enquêtes](./surveys)
* [Enquête resultaten bekijken](./surveys-view-results)
* [Enquêtes resultaten exporteren](./surveys-export-results)
* [Enquêtes opvolgacties](./surveys-followup)
