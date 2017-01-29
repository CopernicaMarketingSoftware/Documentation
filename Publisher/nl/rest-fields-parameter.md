# REST API: de fields parameter

Er is een aantal API methodes waarbij je een *fields* parameter aan de URL
kunt (of moet) meegeven om profielen of subprofielen te selecteren. Met deze parameter 
kun je bijvoorbeeld aangeven dat de desbetreffende API methode alleen betrekking 
heeft op (sub)profielen waarvan het veld "land" op "nederland" staat, en/of dat het 
veld "leeftijd" tussen 18 en 65 moet staan.

De *fields* parameter is een array-parameter. Dit wil zeggen dat je blokhaken
achter de naam van de variabele moet zetten en (heel handig) dat de variabele 
meerdere keren in de URL mag worden gebruikt. In onderstaande URL zie je 
bijvoorbeeld hoe de variabele *fields[]* inderdaad meerdere keren (namelijk 
twee keer) in een URL voorkomt:

`https://api.copernica.com/database/$id/profiles?fields[]=land%3D%3Dnederland&fields[]=leeftijd%3E16&access_token=xxxx`


## Ondersteunde waardes

De waarde van een *fields* parameter heeft altijd de vorm "veld operator waarde", 
zoals "land==nederland" of "leeftijd>18". De meeste operators spreken (zeker
voor programmeurs) nogal voor zich:

* **==**: gelijk aan
* **!=** en **&lt;&gt;**: ongelijk aan
* **&lt;**, **&gt;**, **&lt;=**, **&gt;=**: kleiner/groter en kleiner-of-gelijk/groter-of-gelijk
* **=~** en **!~**: de *like* en *not like* operator

De laatstgenoemde *like* en *not like* operators kun je gebruiken om profielen te 
matchen. Als je een like-operator gebruikt dan kun je gebruik maken van de % en \_ wildcards.
Het teken % matcht met een willekeurige reeks tekens, en _ met precies één teken.
Als je bijvoorbeeld alle profielen wilt opvragen waarvan de voornaam begint met de
letter 'M', dan kun je in de *fields* parameter de waarde "voornaam=~M%" plaatsen.


## Escapen van variabelen

Zoals gezegd kunnen *fields* parameters worden toevoegd aan de URL. Maar de waarde 
van dergelijke variabelen mag natuurlijk niet
conflicteren met andere elementen van de URL. Hoewel dit evenzeer geldt voor
andere parameters (zoals de *access_token* parameter) is dit met name voor de 
*fields* parameter een punt van aandacht. In de waardes die je aan deze parameters 
geeft gebruik je namelijk altijd karakters die niet zonder meer in een URL
mogen worden geplaatst (zoals "naam=~m%", "leeftijd>=18"). Daarom moet je deze
variabelen altijd netjes *escapen*.

In het in dit artikel eerder gegeven voorbeeld hebben we dat ook gedaan. Die URL bevat
twee fields parameters: "land==nederland" en "leeftijd>16". In de URL zijn ze
echter vervangen door "land%3D%3Dnederland" en "leeftijd%3E16" zodat het
is-gelijk-teken en het groter-dan-teken niet conflicteren met andere tekens
in de URL.

Als je API calls doet met behulp van onze [voorbeeld PHP code](rest-php), dan
hoef je je hier overigens niet al te druk over te maken. Het escapen gebeurt
dan automatisch.


## Toepasselijke methodes

De *fields* parameter kun je gebruiken bij de volgende API methodes:

* [Opvragen van profielen uit een database](rest-get-database-profiles)
* [Meerdere profielen bewerken in een database](rest-put-database-profiles)

