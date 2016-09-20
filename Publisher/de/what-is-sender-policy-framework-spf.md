Ein Sender Policy Framework (./spf.md) arbeitet in den DNS-Daten einer
Domain. ./spf.md dient dazu, Spam zu reduzieren. Er überprüft den HALO-Befehl
und die MAIL FROM-Adresse des versendenden Servers (Client).

Im ./spf.md steht, welche IP-Adresse von der Domain E-Mails versendet werden
kann. Wenn also jemand eine E-Mail von ...@copernica.de versenden will,
muss im DNS-Protokoll von Copernica stehen, dass dies f&uuml;r die
IP-Adresse erlaubt ist. Der empfangende Server überprüft das ./spf.md, wenn
die E-Mail ankommt. Ist die IP-Adresse nicht im ./spf.md-Eintrag, wird der
Inhalt der Mail nicht zugestellt.

Mit Copernica überprüfen wir Ihre Einstellungen für jedes E-Mailing und
geben eine Warnung aus, wenn der ./spf.md-Eintrag nicht in Ordnung sein
sollte. Das heißt aber nicht, dass jeder Versender seine DNS-Einträge
verändern muss. Als Besitzer eines Domain Namens können Sie einen
./spf.md-Eintrag in Ihre DNS-Daten hinzufügen. Dies bewirkt, dass dass die
IP-Adresse einer anderen Partei X die Erlaubnis erhält, e-Mails in Ihren
Namen zu versenden.
