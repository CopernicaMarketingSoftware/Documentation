# Personalizatie modifier: *html_entity_decode*

De *html_entity_decode* modifier is het tegenovergestelde van de [escape modifier](./personalization-modifiers-escape).
Het gebruikt PHP's [html_entity_decode functie](http://php.net/manual/en/function.html-entity-decode.php).

## Voorbeeld

Laten we zeggen dat we een zin hebben die ge-escaped was, waar we de tags 
in terug willen brengen. We definiëren `$sentence` als "I'll &quot;walk&quot; the &lt;b&gt;dog&lt;/b&gt; now".
Met de volgende code roepen we de modifier aan:

    {$sentence}
    {$sentence|html_entity_decode}

De output ziet eruit als volgt:

    I'll &quot;walk&quot; the &lt;b&gt;dog&lt;/b&gt; now
    I'll "walk" the <b>dog</b> now

## Meer informatie

* [Personalizatie](./personalization)
* [Personalizatie modifiers](./personalization-modifiers)
