# Indexeren van databasevelden

Per databaseveld kan je aangeven of deze moet worden geïndexeerd of niet. Geïndexeerde velden zijn sneller doorzoekbaar, waardoor bijvoorbeeld selecties die hierop zijn gebaseerd sneller kunnen worden opgebouwd.

Het is echter niet aan te raden om alle velden in je database te indexeren. Dit zal de snelheid van het account juist negatief beïnvloeden. 

- Indexeer alleen velden die worden gebruikt binnen selectie-condities als 'Check op veldwaarde' en 'Profielen sorteren en/of selecteren'
- Een index werkt het beste op een numerieke veld
- Je kan maximaal 64 velden indexeren per database en per collectie
- Een veld van het type 'groot veld' kan niet worden geïndexeerd

## Een veld indexeren
- Ga naar je database of collectie en kies voor '**Velden & Interesses**'
- Klik op **bewerken** bij het veld dat je wilt indexeren
- Selecteer de optie '**Dit veld indexeren**' en klik op opslaan
