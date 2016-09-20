In dieser Session vom Copernica Whiteboard möchten wir Ihnen einige
nützliche Erkenntnisse des neuesten Upgrade von Smarty 3 anbieten.
Finden Sie heraus, welche Verbesserungen beim Schreiben von Funktionen
in den Vorlagen gemacht und wurden und was noch neu bei der Version
Smarty 3 ist.

  --
  --

Nachfolgend finden Sie die übersetzung des Videos:

**

Hallo alle zusammen!

Mein Name ist Martijn Otto und ich bin heute hier, um Ihnen ein wenig
über Smarty und unseren Upgrade-Prozess der Version Smarty 3 zu
erzählen. Ab der nächsten Version unserer veröffentlichten Software
können Sie mit Smarty 3 Vorlagen für Web -und E-Mail-Dokumente machen.
Smarty 3 bietet einige neue Funktionen, die Sie verwenden können.

Beispielsweise, wenn Sie derjenige sind, der bis eben Javascript in
Templates schreibt, mussten Sie jede geschweifte Klammer entgehen. Sie
mussten die Tags {ldelim} und {rdelim} schreiben, um beispielsweise
Funktionen, closures, etc. zu benutzen. Jetzt ist dies in Smarty 3 nicht
mehr notwendig. Wenn Sie eine gleiche Funktion von Smarty 2 in Smarty 3
schreiben wollen, können Sie es wie folgt tun:

`                         function abc () {                          //function                          }`

**

Es ist wichtig, dass nach der geöffneten Klammer ein Leerzeichen ist.
Dies führt dazu, dass Smarty 3 nicht als Smarty-Block erkennt. Aber
stattdessen sollte es eher wie eine wörtliche geschweifte Klammer
behandelt werden. Danach können Sie einfach Ihre Funktionscodes
schreiben und es wieder mit einer geschweiften Klammer schließen.
Nochmals ist es wichtig, dass zwischen diesem und dem letzten Buchstaben
der Funktion wieder einige Leerzeichen sind, damit Smarty erkennt das es
sich nicht um eine normale Smarty-Funktion handelt.

Weitere Möglichkeiten bestehen darin, dass man anstelle der Verwendung
von {capture assign=var} Daten {/capture}, Sie jetzt direkt zuweisen
können als wäre es eine PHP-Funktion. So kann man einfach schreiben:

`                         {$var="data"}                     `

**

Diese Syntax ist für Leute, die mit PHP vertraut sind und es auch einige
zusätzliche Funktionen erlaubt. Ähnlich wie das direkte Zuweisen von
Arrays an Template-Variablen. Zum Beispiel:

`                         {$var=[10,20,30]}                     `

**

Sie können den geöffneten wörtlichen Array nutzen, so dass Sie
wahrscheinlich von Javascript wissen das man einen Array mit zum
Beispiel drei Einträgen schreibt.

Nun eine wichtige neue Funktionalität in Smarty 3 ist die direkte
schriftlich Funktionen in Ihre Vorlage. (Stellen Sie sicher, dass Sie
auch einen Blick haben auf:
[http://www.smarty.net/docs/en/language.function.function.tpl](http://www.smarty.net/docs/en/language.function.function.tpl "http://www.smarty.net/docs/en/language.function.function.tpl"))
Das ist sehr einfach, beispielsweise wenn Sie einige verschachtelte
Menüs schreiben wollen. Normalerweise müssten Sie einen speziellen Code
für jede verschachtelte Ebene schreiben. Also für drei verschachtelte
Ebenen, müssten Sie drei separate Blöcke der Codes schreiben. Das ist
nicht mehr erforderlich. Sie können nämlich eine Funktion schreiben, die
eine verschachtelte Ebene des Menüs schreiben wird. Und Sie können die
Funktion selbst von der Funktion mit Hilfe von Rekursion aufrufen.

Eine weitere Möglichkeit wäre beispielsweise, wenn Sie Funktionen
aufrufen oder Ins einbauen wollen, können Sie Smarty-Variablen benutzen.
Aber auch Ausdrücke innerhalb der Parameter dieser Funktionen sind zu
benutzen.

Beispiel:

Angenommen man sendet ein Emailing an eine Datenbank mit dem Feld
'Geschlecht'. Man könnte eine andere Datei für männliche und weibliche
Beziehungen aufzunehmen. In Smarty 2, war es notwendig zuerst den
vollständigen Pfad zu einer Variablen zu zuordnen, bevor Sie eine
Linkdatei aufrufe. In Smarty 3 kann der der Ausdruck direkt in die
Parameter gesetzt werden.

Smarty 2:\
`                     {capture assign=image}{$profile.gender}.gif{/if}                     {linkfile file=$image}                     `

Smarty 3:\
`             {linkfile file="{$profile.gender}.gif"}             `

**

Das wäse also für heute. Diese neuen Funktionen werden in der nächsten
Version von Publisher zur Verfügung gestellt. Sie können auswählen, ob
Sie die Smarty Vorlagen in Version 2 oder in Version 3 definieren
möchten. Je nachdem, was bequemer für Sie wäre. Auch alte Vorlagen
werden standardmäßig in Smarty Version 2 verwendet. So brauchen Sie Ihre
bestehenden Vorlagen nicht aktualisieren.
