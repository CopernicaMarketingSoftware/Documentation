Het is mogelijk om de gegeven antwoorden toegestuurd te krijgen, zodra
een enquête is ingevuld.

Dit doe je door een opvolgactie te koppelen aan de enquête.

Ga naar *Enquête menu* \> **Opvolgacties** en kies de volgende
instellingen

-   **oorzaak**, De enquête is ingevuld en verzonden
-   **actie**: Verstuur een tekstueel e-mailbericht
-   Vul het e-mailadres in waar de resultaten naartoe moeten worden
    verstuurd
-   Plak de volgende code in het bericht

`{foreach from=$survey.questions key=number item=question}    {$question.question}    {$question.type}    {if $question.type == "open"}     {$question.answer}    {else}     {foreach from=$question.answer item=answer}{$answer}{/foreach}    {/if}   {/foreach}`

Deze code doorloopt de gegeven antwoorden en plaatst ze in het
e-mailbericht. De e-mail wordt direct verstuurd nadat de enquête is
ingevuld.
