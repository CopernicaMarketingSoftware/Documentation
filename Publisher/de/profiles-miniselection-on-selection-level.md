In diesem Copernica-Tutorial zeigen wir Ihnen, wie Sie Miniauswahlen auf
Profil-Ebene nutzen können.

-   [Zurück zu den Videos](./video-tutorials.md "Video's")

<iframe width="560" height="315" src="https://www.youtube.com/embed/XHBx3-qCzJw?list=PLgCg-YR2FABYzqpQwqF3eQjlfCtyBikTA" frameborder="0" allowfullscreen="allowfullscreen"></iframe>

-   **Weiter:** [Miniauswahl](./profiles-creating-a-miniselection.md "Miniauswahl")

In diesem Copernica-Tutorial zeigen wir Ihnen, wie Sie Miniauswahlen auf
Profil-Ebene nutzen können.

Zu diesem Zweck legen wir eine Auswahl mit einer Bedingung an, die den
Inhalt einer Miniauswahl überprüft.

Nachdem Sie innerhalb einer Sammlung eine Miniauswahl angelegt haben,
werden Sie die Ergebnisse dieser Miniauswahl häufig nutzen wollen, um
eine Auswahl über alle Profile hinweg vorzunehmen.

Dies können Sie tun, indem Sie eine Auswahl anlegen, die auf die
Ergebnisse einer Miniauswahl zugreift.

Zum Beispiel eine Auswahl alle Profile die zu M indest eine Bestellung
von Copernica haben.

In diesem Fall werden wir eine Auswahl aller Profile anlegen, die eines
oder mehrere Unterprofile mit dem Wert "Copernica" im Feld
"Produktbeschreibung" enthalten.

Wir benennen diese Auswahl "Copernica". Danach wähle ich die Bedingung
aus, die den Inhalt einer bestehenden Miniauswahl überprüft.

Als nächstes kann ich angeben, welche Miniauswahl überprüft werden soll.

In diesem Fall ist dies die zuvor erstellte Miniauswahl "Copernica" in
der Sammlung "Bestellungen".

Da es möglich ist, dass die Sammlung mehrere mit dem Profil verbundene
Unterprofile enthält, können Sie nun die Mindest- und Maximalanzahl der
Unterprofile angeben, die diese Miniauswahl enthalten darf.

In diesem Fall sollte mindestens ein Unterprofil enthalten sein. Ich
könnte das Maximum z.B. auf 5 Unterprofile oder jede andere Zahl setzen,
in diesem Fall aber ist es sinnvoll, eine unbegrenzte Anzahl von
Unterprofilen zuzulassen, die "Copernica" in ihrer Produktbeschreibung
enthalten.

Also fülle ich 99999 ein.

Ich habe nun eine Auswahl aller Profile angelegt, in der ich die Anzahl
der Unterprofile überprüfe, die die Bedingungen der Miniauswahl
"Copernica" erfüllen und akzeptiere eine Anzahl zwischen 1 und 99999
Unterprofilen.

Die Auswahl wurde zur Datenbankstruktur hinzugefügt.

Jetzt wissen Sie, wie man unter "Profile" eine Auswahl von Profilen
anlegt, die auf die Daten aus einer Miniauswahl zurückgreift.
