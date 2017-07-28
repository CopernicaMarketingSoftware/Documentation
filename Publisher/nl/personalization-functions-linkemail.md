# Personalizatie functies: linkemail

Soms als een email aankomt kan deze niet goed weergegeven worden in de 
email client. Copernica heeft hier een mooie oplossing voor: De webversie. 
Deze hoef je niet zelf aan te maken, want dit gebeurt wanneer de *linkemail* 
of *webversion* functie wordt aangeroepen. Je kunt met deze functie ook 
een link creëren naar de webversie van een andere mail.

## De functie gebruiken

Om de functie te gebruiken hoef je alleen een tag toe te voegen aan je 
document: `{webversion}`. Je kunt in de volgende voorbeelden ook `{linkemail}` 
gebruiken in plaats hiervan.

Zo simpel is het! De tag voegt alleen een URL in en de pagina wordt automatisch 
aangemaakt. Je kunt alleen nog niet op deze link klikken en er zijn ook geen 
woorden om op te klikken. Dit is snel op te lossen met wat HTML.

    <a href="{webversion}" title="Klik hier voor de webversie">Bekijk deze email in je favoriete browser</a>

## Opties

### **showheader**

De *showheader* option kan gebruikt worden om de standaard header met 
verzender en document informatie uit te schakelen.

`{webversion showheader=false}`

### **document**

De *document* optie kan gebruikt worden om een ander document te laten 
zien in de browser dan de mail waaruit de link zichtbaar is.

`{webversion document='newsletter april 2017'}`

### **template**

De *template* optie kan gebruikt worden om een andere template weer te 
geven dan degene die voor de mail gebruikt wordt in de mail client. In 
dit geval moet je ook het document meegeven in de *document* optie.

`{webversion template='Spring2017' document='newsletter april 2017'}`

### **domain**

De *domain* optie kan gebruikt worden om het standaard picserver domein 
te vervangen.

`{webversion domain='newsletter.yourdomain.com'}`

Als je je eigen domein wilt gebruiken moet deze een CNAME referentie hebben naar 
pic.vicinity.nl.

## Meer informatie

* [Personalizatie(./personalization)
* [Personalizatie functies](./personalization-functions)
