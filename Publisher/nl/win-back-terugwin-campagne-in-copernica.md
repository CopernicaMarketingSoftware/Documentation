We schreven het al eens
[eerder](https://www.copernica.com/nl/blog/5-conversion-boosting-e-mail-campaigns),
gemiddeld verliezen bedrijven per 5 jaar ongeveer de helft van hun
klanten. Daarnaast is het terugwinnen van een oude klant meestal
eenvoudiger dan het binnenhalen van een nieuwe. Alle reden om een
win-back campagne in te richten voor je Copernica account.

Wat is er allemaal nodig om zo'n campagne op te starten? Nou, dat valt
eigenlijk enorm mee. In dit artikel vind je een kort stappenplan om de
win-back campagne in te zetten. We gaan er hierbij van uit dat we
profielen willen benaderen die een jaar geleden voor het laatst een
product hebben gekocht. De gekochte producten staan in collectie
'orders'.

Het stappenplan:

1.  Maak een miniselectie aan op collectie 'orders'. Deze miniselectie
    noemen we 'orderLastYear' en zal alle orders van het profiel
    bevatten die het afgelopen jaar zijn geplaatst. De conditie die we
    aanmaken is van het type 'check op datum' en vergelijkt de datum van
    de order met de een variabele 'na-datum', die we op een jaar geleden
    zetten (dag, maand en jaar moeten gelijk zijn) en een flexibele
    'voor-datum' op 1 dag in de toekomst (wederom moet alles gelijk
    zijn).
2.  We maken een selectie om alle profielen verkrijgen die 0
    subprofielen hebben in miniselectie 'orderLastYear'. Dat zijn de
    mensen die we willen benaderen om ze weer te engageren met onze naam
    en de selectie heet dan ook 'winBackProspects'. De type conditie is
    'check op inhoud van miniselectie' en deze wordt op miniselectie
    'orderLastYear' afgestemd. Het minimum en maximum aantal
    subprofielen dat een profiel in deze miniselectie mag hebben is 0.
3.  Nu hebben we een selectie met profielen die het afgelopen jaar niets
    hebben gekocht. Het is verstandig om uitschrijvers nog uit te
    sluiten van deze selectie. Hiervoor maak je een extra 'en'-conditie
    aan in de zojuist aangemaakte selectie. Houd ook rekening met andere
    lopende campagnes!
4.  Een win-back campagne is natuurlijk niet bedoeld voor personen die
    nog nooit iets hebben aangeschaft. Om te voorkomen dat die mensen de
    mailing krijgen, kun je een miniselectie maken op collectie 'orders'
    waarin alle orders vallen (een conditie kan zijn: id\>0). Vervolgens
    voeg je een conditie toe aan selectie 'winBackProspects' dat de
    profielen minstens 1 (en maximaal 99999) profielen in die
    minisleectie moeten hebben.
5.  Nu is het tijd om een goede mailing op te bouwen. Hierin kun je de
    verloren klant persoonlijk benaderen. Het is helemaal mooi als je op
    basis van eerder aangeschafte producten een aanbieding kunt doen met
    relevante artikelen of diensten. Denk hierbij aan de gemiddelde
    afschrijftijd van gekochte producten!
    [Hier](https://www.betaout.com/learn/win-back-emails-3/) vind je een
    paar leuke voorbeelden van win-back campagnes.
6.  Als de verzendlijst klaar is, dan kunnen we de mailing periodiek in
    plannen. Let er wel op dat een klant die naar aanleiding van deze
    campagne niets koopt, de volgende keer wederom in de selectie zal
    staan. Het is dan ook aan te raden om bij te houden wie de mailing
    al heeft gehad. Hiervoor zijn twee opties:
    -   Je kunt een numeriek databaseveld aanmaken genaamd
        'winBackCampaignSend', welke standaard op 0 staat. Een
        opvolgactie op de te sturen mailing kan dit veld op 1 zetten.
        Door de selectie die wordt gemaild een extra 'en'-conditie te
        geven die checkt of het veld op 0 staat, zul je nooit iemand
        ongewenst tweemaal deze mailing zenden.
    -   Je kunt een selectie genaamd 'winbackCampaignSend' maken
        gebaseerd op e-mailcampagne, waarbij het profiel de win-back
        template moet hebben ontvangen, maar de resultaten (kliks of
        impressies) niet uitmaken. Deze selectie sluit je uit van de
        volgende verzending door 'check op inhoud selectie'-conditie toe
        te voegen aan selectie 'winBackProspects'.


