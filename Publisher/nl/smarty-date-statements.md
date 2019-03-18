# Smarty: Toepassingen met datum variabelen

Hieronder vind je enkele Smarty voorbeelden op basis van een datumveld.

*Deze tutorial is geschreven voor de Publisher*

## Verhogen/verlagen van de huidige datum
      {"+1 day"|date_format:'%d-%m-%Y'}

Bovenstaand voorbeeld telt 1 dag bij de huidige datum op. 
Enkele andere mogelijkheden zijn *minute, month, year, week*.

## Datumveld verhogen/verlagen
      {"$VELDNAAM +1 day"|date_format:'%d-%m-%Y'}

Bovenstaand voorbeeld telt 1 dag bij het datumveld van de bestemming op. 
Enkele andere mogelijkheden zijn *minute, month, year, week*.



[Smarty documentatie](https://www.smarty.net/docsv2/en/language.modifier.date.format.tpl)
