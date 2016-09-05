Interessevelden zijn databasevelden waarin slechts twee waarden kunnen
worden opgeslagen: 'yes' en 'no'.

Ze zijn bij uitstek geschikt om voorkeuren van relaties op te slaan. Het
personaliseren van interesses werkt iets anders dan andere veldtypes uit
je database. Bij een interesse voer je namelijk niet de veldnaam of
groepsnaam in, maar de variabele zelf.

Bijvoorbeeld bij de interessegroep **'Muziek'** met als interesses
**'Grindcore'** en **'Barok'**:

-   *Grindcore* wordt in de code: {\$profile.Grindcore}
-   *Barok* wordt in de code: {\$profile.Barok}

### Condities maken met interessevelden

Een interesse wijkt hier vanaf in de formulering omdat een variabele
slechts 2 veldwaarden kent 'yes' en 'no':

`{if $profile.Grindcore=="yes"}U houdt wel van een potje grindcore{elseif $profile.Barok=="yes"}U luistert graag barok{else}U houdt niet van muziek{/if}`
