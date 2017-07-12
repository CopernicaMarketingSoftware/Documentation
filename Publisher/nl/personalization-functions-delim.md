# Personalizatie functions: ldelim en rdelim

Zoals je misschien wel hebt gezien in de voorbeelden gebruikt Smarty 
syntax accolades. De Smarty code voor een naam is bijvoorbeeld `{$name}`.
Dit betekent echter dat de accolade wat lastiger te gebruiken is als symbool. 
Er zijn drie manieren om dit op te lossen: Spaties plaatsen rond de accolades 
(Alleen [Smarty](./smarty-2-vs-smarty-3) 3), *ldelim* en 
*rdelim* en [literal](./personalization-functions-literal).

Om een linkerhaak '{' te printen kun je de code `{ldelim}` wat staat voor 
left delimiter. Om de rechterhaak '}' te printen kun je de code `{rdelim}` 
gebruiken, wat staat voor right delimiter.

Als je echter een groot stuk letterlijk wil printen zonder alle haken 
te vervangen is het verstandiger [literal](./personalization-functions-literal) 
te gebruiken.

## More information

* [Personalizatie](./personalization)
* [Personalizatie functies](./personalization-functions)
