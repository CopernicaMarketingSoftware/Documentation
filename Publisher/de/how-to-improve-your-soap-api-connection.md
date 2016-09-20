In einem neuen Artikel von Copernica geben wir Ihnen gerne eine
Übersicht über alle Verbesserungen, die Sie bei der Verwendung der SOAP
API in Verbindung mit Copernica Marketing Software nutzen können. Mit
Hilfe dieser Erweiterungen ist es möglich die getätigten Aufrufe zu
reduzieren, so dass der Austausch von Informationen schneller erfolgen
kann. Die Verbesserungen basieren auf den häufigsten Fehlern, die
Entwickler machen. Dies hilft Ihnen bei der optimalen Nutzung Ihrer
API-Verbindung.

Caching
-------

Caching dient als Zwischenspeicher von Kopien von jeweiligen
Originaldateien. Somit wird der Zugriff auf diese Dateien beschleunigt.
Demnach sollten Sie sicherstellen, dass Ihr Cache so viele Daten wie
möglich beinhaltet. Dies gilt insbesondere für die WSDL-Datei, weil
diese relativ groß ist.\
Wenn Sie PHP als Skriptsprache und die erstellte [SOAP
Client](http://php.net/manual/en/soapclient.soapclient.php "SOAP Client")
Klasse anwenden, sollten Sie in den Constructor den Parameter
`WSDL_CACHE_BOTH` eingeben. Damit können Sie das Objekt die WSDL-Datei
in den Cache aufnehmen.

Aktualisieren von (Unter) Profilen
----------------------------------

Bei der Aktualisierung von (Unter) Profilen ist es nicht erforderlich
zunächst nach dem ersten (Unter) Profil zu suchen. Wenn Sie
Anforderungsparameter unter 'updateProfiles' oder 'updateSubprofiles'
Aufrufe hinzufügen, gilt dies auch für einen gesuchten Aufruf. Die
(Unter) Profile, die den Anforderungen entsprechen, werden aktualisiert.
Ebenfalls ist es auch möglich ein neues (Unter) Profil zu erstellen,
wenn für bestimmte Anforderungen keine Überstimmungen zu finden sind.
Fügen Sie einfach die 'create' Parameter mit einem non-zero value und
ein neues (Unter) Profil wird erstellt.

Database\_searchProfiles
------------------------

Bei der Suche nach einem Profil in einer Datenbank kennen Sie
normalerweise den Inhalt dieses Profils. Wir sehen oft einen Aufruf zu
'Database\_searchProfiles', um die Profile zu finden. Dieser wird
gefolgt durch einen Aufruf von 'Profile\_fields ', um die Daten des
Profils zu erhalten. Doch der Aufruf 'Database\_searchProfiles' besitzt
den Parameter 'allproperties'. Wenn dieser Parameter angegeben wird und
auf einen non-zero value gesetzt wird, werden alle Eigenschaften der
gefundenen Profile zurückgesetzt anstatt des Profils ID's. Dies betrifft
auch den Aufruf 'Collection\_searchSubProfiles'.

'allproperties' parameter
-------------------------

Alle Anträge, die in die Sammlung zurückkehren, haben auch in der
Anfrage den Parameter 'allproperties'. Wenn dieser Parameter den Wert
'true' besitzt, ist die Reaktion mit dem Inhalt der Sammlung erfüllt und
nicht nur die ID der Elemente in dem Array. Das kann eine große Anzahl
von Aufrufen speichern, um die Daten der Elemente in der Sammlung zu
bekommen. Verwenden Sie nur diesen Parameter, wenn die die Datenbank
benötigen, da ansonsten Aufrufe auf dem Server vor Ort durch diesen
Parameter verzögert werden.

Store session cookies
---------------------

Es ist sehr zeitintensiv, wenn man sich bei jedem Login anmeldet.
Deshalb sollten Sie die Session-Cookies bei jeder Anmeldung für jede
Anfrage vermeiden. Der neue PHP-SOAP-Client-Beispiel-Code macht das
automatisch für Sie.

Komprimierung
-------------

In der Copernica Marketing Software Version 2.12 wird es möglich sein,
die SOAP-Antwort in
[gzip-Codierung](http://www.w3.org/Protocols/rfc2616/rfc2616-sec3.html#sec3.5 "gzip-Codierung")
zu beantragen. Dies reduziert die Größe der Antwort vom Server an den
Client. Um dieses Feature anzuwenden, müssen Sie die
`Accept-Encoding: gzip` in der http-header versenden. Dies können Sie
bereits in Ihrem Client einbauen. Bei Freigabe der Version 2.12, besteht
keine Auswirkungen auf die aktuelle Version der API, sondern wird
automatisch verwendet.

Asynchrone Aufrufe
------------------

Oft ist es nicht notwendig auf die Reaktion einer Anfrage an den Server
abzuwarten. Sie können mit einer der Beispiel-Clients für PHP, einen
asynchronen Aufruf an den SOAP-Server machen. Wenn Sie zum Beispiel
mehrere Unterprofile zu einem Profil hinzufügen, können Sie alle
Anfragen zur gleichen Zeit starten. Wenn Sie nicht an dem Ergebnis
interessiert sind, können Sie ohne zu warten den Antrag weiter
vervollständigen. Ansonsten hätten Sie selbst die Auswahl, auf welche
Zugriffe zu warten sind.

Indizes auf Datenbanken und Sammlungen
--------------------------------------

Bei der Suche nach (Unter) Profile ist es wichtig, dass Sie die
korrekten Indizes in den Feldern setzen. Wenn der Index nicht gesetzt
wurde, kann die Suche einige Minuten dauern. Bei der Suche der korrekt
indizierten Datenbanken/Sammlungen dauert es nur einen Bruchteil einer
Sekunde. Deshalb sollten Sie alle Felder sicherstellen, dass diese mit
Ihren Indizes ausgestattet sind.

Kundenbeispiele
---------------

Wir haben die [SOAP
API](http://www.copernica.com/de/support/soap-api-dokumentation "SOAP API")
Beispiel-Clients aktualisiert, um diese Ãnderungen vorzunehmen.
