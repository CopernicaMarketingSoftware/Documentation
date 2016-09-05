Als je vanuit een e-maildocument verwijst naar een webpagina, dan kan de
webpagina gepersonaliseerd worden weergegeven. Hiertoe voeg je speciale
smarty variabelen toe aan de hyperlink: het ID van het profiel en de
beveiligingscode.

-   Het ID van het profiel is opgeslagen in de variabele {\$profile.id}
-   De beveiligingscode van het profiel is opgeslagen in de variabele
    {\$profile.code}

#### **Inlogcode voor profielen**

Als je linkt naar de pagina *http://www.company.nl/pagename*

`http://www.company.nl/pagename?profile={$profile.id}&code={$profile.code}`

#### **Inlogcode voor subprofielen**

Als je mailing is gericht aan subprofielen

`http://www.company.nl/pagename?profile={$subprofile.id}&code={$subprofile.code}`

### Deze code in een keer toevoegen voor alle links

De inlogcode kan ook automatisch worden toegevoegd (of weer verwijderd)
bij alle links in het document of webpagina. Je kan hierbij kiezen of de
links moeten worden gepersonaliseerd voor profielen of voor
subprofielen. Alle overeenkomende hyperlinks in het document worden
aangepast zodat een gebruiker automatisch wordt ingelogd.\
\
 Deze functie kan worden gevonden in de template, het document of
webpagina-menu, onder de noemer **Hyperlinks uitbreiden**...

![Add personalization code](../images/prepareurl.png)

### Inlogcode weer verwijderen

Selecteer hiertoe *verwijder de inlogcode*en vervolgens de hyperlinks
waar de personalisatiecode moet worden verwijderd.

#### Toevoegen aan template broncode

Selecteer **ook toepassen op de template broncode**om hyperlinks uit de
template broncode tevens te bewerken. Let op dat wijzigingen in de
template bron alle documenten die op basis van deze template zijn
gemaakt zullen beïnvloeden.
