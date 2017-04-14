# Personalisatie

SMTPeter biedt vele mogelijkheden om e-mails te personaliseren. Personalisatie
is belangrijk om een goede indruk te maken en de aandacht van de lezer vast 
te houden. Hieronder wordt de syntax uitgelegd aan de hand van een aantal 
voorbeelden, zodat je direct een beeld hebt bij de mogelijkheden van deze 
toepassing.

De volgende onderwerpen komen aan bod:
* [Variabelen](personalization#variabelen)
* [Inhoud van variabelen veranderen](personalization#verander-inhoud-van-variabelen)
* [Simpele berekeningen](personalization#simpele-berekeningen)
* [Conditionele statements](personalization#conditionele-statements)
* [Data uit arrays opvragen en gebruiken](personalization#foreach)
* [Toekennen van variabelen](personalization#toekennen-van-variabelen)
* [Gebruik van accolades](personalization#gebruik-van-accolades)
* [Layout](personalization#denk-om-de-layout)

## Variabelen 

Laten we starten met het uitleggen van de variabelen. Een variabele ziet er 
als volgt uit: `{$` *naam van de variabele* `}`.
Er zijn een aantal variabelen die we veelvuldig voorbij zien komen, 
bijvoorbeeld `{$firstname}`, `{$age}` en `{$city}`.
In het algemeen moet een variabele aan de volgende criteria voldoen:

* is omringd met accolades,
* beginnen met een $ teken,
* kan alphanumerieke karakters bevatten. Mag niet met een cijfer beginnen,
* kan een verbindingsstreepje (-) en/of lage streepje (_) bevatten,
* kan niet beginnen met verbindingsstreepje of lagestreepje,
* is hoofdlettergevoelig, wat betekent dat {$NAME} anders is dan {$name}.

De volgende tabel weergeeft alle variabelen:

| Syntax     | Betekenis                                               |  
| ---------- | ------------------------------------------------------- |
| {$foo}     | Laat een simpele variabele zien (geen array/object).    |
| {$foo[4]}  | Laat het 5de element van een 'zero-indexed array' zien. |
| {$foo.bar} | Laat de "bar" value van een object zien.                |

Met deze notaties kun je combinaties maken. Voorbeelden van combinaties 
zijn:

| Syntax            | Betekenis                                                                                |
| ----------------- | ---------------------------------------------------------------------------------------- |
| {$foo.bar.baz}    | Laat de value zien van de "baz" key binnen de array "bar" wat behoort tot $foo.          |
| {$foo[4].baz}     | Laat de value zien van de "baz" key binnen het 5de element van $foo.                     |
| {$foo.bar.baz[4]} | Laat het 5de element van "baz" zien, die in "bar" zit en onderdeel is van $foo.          |

Het is mogelijk om met een index nummer toegang te krijgen tot elementen in 
een array, als een variabele een object is. Let erop dat je ook hier start 
vanaf 0.


## Verander inhoud van variabelen

Je kunt de inhoud van je variabelen veranderen door *modifiers* toe te voegen.
Zo is het bijvoorbeeld mogelijk om alle content in hoofdletters te weergeven of
om de lengte te berekenen van een string of een *hash* som. Een volledige lijst
van alle mogelijke bewerkingen en corresponderende functionaliteit is [hier](personalization-modifiers)
te vinden. In het volgende voorbeeld zie je hoe modifiers worden gebruikt
om de lengte van de naam variabele weer te geven:

```text
Hello {$name|escape},

Your name {$name|escape} is {$name|strlen} characters long.

Bye!
```


## Simpele berekeningen 

Variabelen met een numerieke waarde, worden gebruikt om simpele
berekeningen te doen. Net zoals de 'normale variabelen', moeten alle berekeningen
binnen de accolades worden uitgevoerd. Bijvoorbeeld:

```text
{$var + 10}
```

Naast de accolades gelden de vanzelfsprekende mathematische regels. 
De standaard mathematische *operators* (`+`, `-`, `*`, `/`) en de modulus 
operator (`%`) zijn dus beschikbaar. Onthoud dat als een waarde niet bestaat
of geen numerieke inhoud bevat, de waarde 0 wordt toegekend.


## Conditionele statements

Een van de hoekstenen van elke programmeertaal zijn conditionele *statements*.
Een conditioneel *block* begint altijd met het `{if}` keyword (altijd met accolades),
gevolgd door een statement dat wordt getest/uitgevoerd. Een conditioneel blok 
eindigt altijd met de if *closing tag* `{/if}`. Een conditioneel blok wordt alleen
uitgevoerd als het *statement* binnen het `{if}` gedeelte evalueert als true.

In het volgende voorbeeld wordt de text "Hello John" alleen weergegeven als 
de waarde van de variabele `$name` gelijk is aan "John".

```text
{if $name == "John"}Hello John{/if}
```

Maar wat als er ook een "Sarah" in je mailinglist zit? Je wilt niet dat zij
niets ontvangt. Dit is een situatie waar de {elseif} om de hoek komt kijken.

```text
{if $name == "John"}Hello John{elseif $name == "Sarah"}Hello Sarah{/if}
```

Het kan ook voor komen dat we in een bepaalde situatie niets aan "John"
en "Sarah" willen laten weten. In dat geval gebruiken we het `{else}`
keywoord. Het stukje code na het `{else}` keywoord wordt uitgevoerd als
geen van de voorgaande statements evualeren tot true.

```text
{if $name == "John"}
    Hello John
{elseif $name == "Sarah"}
    Hello Sarah
{else}
    Hello anybody else
{/if}
```

Dit is natuurlijk een zeer slecht voorbeeld van hoe je een gepersonaliseerde
aanhef schrijft. Je conditionele blok moet in dit geval namelijk zo groot zijn
als de lijst met alle namen van de wereld.

Een beter voorbeeld is uiteraard:

```text
{if $name == ''}
    Dear subscriber,
{else} 
    Dear {$name},
{/if}
```

Afhankelijk van de inhoud van de variabele wordt bekeken welk blok moet worden 
uitgevoerd. Stel dat de `$name` variabele geen waarde heeft, dan wordt dat blok `{if}`
uitgevoerd. De conditie evualeert immers tot true. Als de eerste conditie evalueert 
tot false wordt het *else* blok uitgevoerd. 

In het bovenstaande voorbeeld is de operator `==` gebruikt. Dit betekent 'is gelijk aan'.
De conditie evalueert tot true als de linkerkant gelijk is aan de rechterkant. De
operator `==` is een van de vele operators die je kunt gebruiken om de condities voor
de statements op te bouwen. Hier is de complete lijst:

| Syntax voorbeeld  | Betekenis                                             |
| ----------------- | ----------------------------------------------------- |
| $a == $b          | $a en $b zijn gelijk                                  |
| $a != $b          | $a en $b zijn niet gelijk                             |
| $a > $b           | $a is groter dan $b                                   |
| $a >= $b          | $a is groter of gelijk aan $b                         |
| $a < $b           | $a is kleiner dan $b                                  |
| $a <= $b          | $a is kleiner of gelijk aan $b                        |
| $a AND $b         | $a en $b zijn true                                    |
| $a OR $b          | $a of $b (of beide) zijn true                         |
| not $a            | Tegengestelde, niet gelijk aan $a evalueert tot true  |


Met de eerste zes operators (== tot aan <=) vergelijk je $a en $b met elkaar.
De uitkomst van de conditie evalueert tot true als de twee geteste waardes 
gelijk zijn aan elkaar. De uitkomst van de conditie evalueert tot false als
de twee geteste waardes niet gelijk zijn aan elkaar. Met de volgende operators
in de bovenstaande tabel (*AND* en *OR*) kun je statements combineren.
Het komt vaak voor dat conditionele blokken te groot of te complex worden.
Je kunt lange of complexe blokken inkorten door meerdere statements binnen
een `{if}` blok op te nemen. Gebruik hiervoor dan de AND en/of OR operators.
De AND en/of OR operators combineren de waardes van $a en $b en evalueert
de uitkomst tot true of false. De volgende tabel laat zien hoe dat in z'n 
werk gaat.

Voor AND geldt:

| $a    | $b    | resultaat |
| ----- | ----- | --------- |
| true  | true  | true      |
| true  | false | false     |
| false | true  | false     |
| false | false | false     |

Voor OR geldt:

| $a    | $b    | resultaat |
| ----- | ----- | --------- |
| true  | true  | true      |
| true  | false | true      |
| false | true  | true      |
| false | false | false     |

Je kunt AND bijvoorbeeld op deze manier gebruiken:

```text
{if $a >= $b AND $b <= $c}true{else}false{/if}
```

In het bovenstaande stukje script wordt eerst `$a >= $b` getest. Alleen als de uitkomst
evalueert tot true wordt `$b <= $c` getest. Als blijkt dat ook deze uitkomst evalueert 
tot true, wordt daadwerkelijk `true` geprint. Anders (else) wordt `false` uitgeprint.
Dan is er ook nog de `not` operator. Deze operator keert de waarde om die wordt
getest. Dus true wordt false en false word true. Tot slot, het is goed om te weten 
dat binnen een `{if}` statement een variabele wordt omgezet tot een boolean.
De variabele kan een lege string bevatten of de waarde 0. In dat geval evalueert 
de uitkomst tot false. Omgekeerd evalueert de uitkomst tot true.


## Foreach

Het komt vaak voor dat je een collectie van data (een array) tot je beschikking hebt.
Met deze data wil je graag dingen doen, zoals het opzoeken van een bepaald item.
Je moet dan door alle items *loopen*. Aan de hand van een voorbeeld laten we alle 
leden van een voetbalteam zien. Deze leden staan in een `$soccerTeam` array opgeslagen. 
Alle leden van het team kunnen worden opgevraagd door middel van een `foreach` statement. 
De syntax is recht toe, recht aan:

```text
{foreach $player in $soccerTeam}
    {$player.name}
{/foreach}
```

Deze loop itereert over de items (team leden) van `$soccerTeam` en kent vervolgens
elk teamlid toe aan de variabele `$player`. Binnen in het foreach blok kan je van alles 
doen met de *output*. Je kunt bijvoorbeeld een HTML lijst genereren de voetballers
van dat team. Dit is waar het iets complexer wordt..

Natuurlijk ondersteunen we ook het loopen over arrays die niet gestandaardiseerde
keys bevatten.

```text
{foreach $list as $key => $value}
    Key {$key} contains {$value}.
{/foreach}
```

Er wordt hier gebruik gemaakt van de mogelijkheid om de `$key` en `$value` waardes op 
te geven en hier de waardes in op te slaan. De daadwerkelijke waardes worden 
opgeslagen door middel van elke iteratie. Tot slot, soms wil je dat code wordt
uitgevoerd terwijl er misschien helemaal geen data is. Dit kan worden gedaan met
behulp van een `{foreachelse}` statement.

```text
{foreach $item in $list}
    {$item.name}
{foreachelse}
    No items in list.
{/foreach}
```

Dit `foreachelse` statment wordt alleen uitgevoerd als er geen data is. Dit blok 
wordt dan ook volkomen genegereerd als er wel data is.


## Toekennen van variabelen

Het is mogelijk om waardes toe te voegen tijdens *runtime*. Dit kun je bijvoorbeeld
gebruiken om de totale prijs te berekenen van een samenstelling aan gekochte items.
Of om een bepaald item te herinneren binnen in een foreach statemement. Je kunt
variabelen op de volgende manier toekennen:

```text
{assign $item to $topitem}
```

Na dit statement is de variabele `$topitem` beschikbaar en neemt het over wat `$item`
bevatte wanneer de mail werd samengesteld en verzonden naar de ontvanger.
Dit stelt je in staat om bijvoorbeeld dit soort regels te schrijven:

```text
{foreach $item in $list}
    {assign $total + $item.price to $total}
    {if $item.price > $topitem.price}
        {assign $item to $topitem}
    {/if}
{/foreach}
```

Dit zorgt ervoor dat uiteindelijk de meest dure items in de `$topitem` variabele 
worden ondergebracht. De totale prijs wordt ondergebracht in `$total`.


## Gebruik van accolades 

De syntax is sterk gebasseerd op accolades `{}`. De accolades kunnen/mogen niet 
voorkomen in de tekst, zonder naar een valide syntax te verwijzen. Het kan voorkomen
dat je toch accolades moet gebruiken in de tekst. In dat geval kun je het beste
`{ldelim}` gebruiken om een `{` toe te voegen in je tekst. Voor een `}` kun je 
`{rdelim}` gebruiken. Op deze manier wordt de tekst niet als syntax aangemerkt
en dus niet verwerkt.


##  Denk om de layout

De hierboven getoonde scripts zijn op een bepaalde manier geformateerd. Door middel
van nieuwe regels, indentatie etc. zijn de scripts beter te lezen. Deze manier 
van werken valt aan te raden, omdat de foutendetectie veelal gemakkelijker is.
Echter, het kan zijn dat de uitkomst van alle opmaak niet gewenst is. In dat geval
kunnen een paar kleine veranderingen een groot effect hebben. Hieronder wordt
aan de hand van voorbeelden uitgelegd hoe je met de opmaak kunt omgaan.

```text
{foreach $player in $soccerTeam}
    {$player.name}
{/foreach}

Voetbalteam array: `["Ronaldo", "Messi", "Ibrahimovic"]`;
Evalueert tot:

    Ronaldo

    Messi

    Ibrahimovic   
```

Dit is waarschijnlijk niet het gewenste resultaat dat je voor ogen had.
Maar dit is precies wat je krijgt, omdat er een nieuwe regel in combinatie
met indentatie rondom de variabele wordt gebruikt. Om een lijst van de namen
te generen, zonder extra spaties kan je het beste deze foreach loop opzetten:

```text
{foreach $player in $soccerTeam}
    {$player}
{/foreach}
```

Minder leesbaar, maar precies wat je voor ogen had.

```text
Ronaldo
Messi
Ibrahimovic
```
