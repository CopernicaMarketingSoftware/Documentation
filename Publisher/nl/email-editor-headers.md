# Headers

Headers worden gebruikt om informatie mee te geven aan een e-mail. Binnen templates en documenten zijn er drie soorten headers, namelijk:
- Essentiële headers
- Geavanceerde headers
- Aangepaste headers

## Essentiële headers
Hier vind je de headers die nodig zijn om een e-mailing te versturen:
- Een onderwerp
- Een afzendernaam
- Een afzenderadres

Het is mogelijk om deze waardes te personaliseren met [Smarty](./smarty). 

**Voorbeeld**  
Je wilt een mailing versturen vanuit het e-mailadres van de accountmanager van een profiel. In de database staat een veld _accountmanager_ waarin wordt bijgehouden per profiel wie de accountmanager is. Het kan echter ook voorkomen dat dit veld niet gevuld is. Hiervoor gebruik je:
```
{if $profile.accountmanager == "Frank Bakker"}frank.bakker{else}info{/if}
```

In bovenstaand voorbeeld wordt de e-mail verzonden vanuit _frank.bakker@domeinnaam.nl_ als de accountmanager _Frank Bakker_ is. Mocht dit niet het geval zijn of de waarde is leeg, wordt de mail verzonden vanuit _info@domeinnaam.nl_.

## Geavanceerde headers
