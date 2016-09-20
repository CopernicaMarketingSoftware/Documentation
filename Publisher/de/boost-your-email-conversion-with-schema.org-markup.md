Wäre es nicht toll, wenn Ihre Empfänger auf Ihre Call-to-Action-Elemente
reagieren könnten, ohne Ihre E-Mails erst öffnen zu müssen? Wie würde
sich das auf Ihre Konversionsraten auswirken? Finden Sie es selber
heraus, indem Sie Microdata und Schema.org einsetzen!

![](Copernica_cases/conversion-copernica.jpg "More conversion with Schema.org markup for emails")

Was ist Schema.org?
-------------------

Schema.org ist ein
[Gemeinschaftsprojekt](http://googlewebmastercentral.blogspot.nl/2011/06/introducing-schemaorg-search-engines.html)
von Google, Yahoo!, Bing und der russischen Suchmaschine Yandex. Das
Projekt gibt Webmastern die Möglichkeit, ihre HTML-Tags mit Microdata
anzureichern, um inhaltliche Zuordnungen vorzunehmen.

Nehmen wir an, Sie haben etwas über den Film "Avatar" geschrieben. Für
Ihre Leser wird es auf den ersten Blick klar sein, worum es in Ihrem
Text geht. Für Suchmaschinen ist das weniger offensichtlich. Für sie
könnte es beim Begriff "Avatar" genauso gut um die kleinen
[Profilbilder](http://en.wikipedia.org/wiki/Avatar_(computing)) in Blogs
oder Foren gehen.

Um solche Missverständnisse zu vermeiden, können Sie als Betreiber einer
Website z.B. folgenden HTML-Code einsetzen:

``{style="font-size: 11px;"}

    <div itemscope itemtype ="http://schema.org/Movie">
      <h1 itemprop="name">Avatar</h1>
      <div itemprop="director" itemscope itemtype="http://schema.org/Person">
      Director: <span itemprop="name">James Cameron</span> (born <span itemprop="birthDate">August 16, 1954</span>)
      </div>
      <span itemprop="genre">Science fiction</span>
      <a href="../movies/avatar-theatrical-trailer.html" itemprop="trailer">Trailer</a>
    </div>

Wie Sie sehen, haben wir in diesem Code-Beispiel nicht nur klar gemacht,
dass es in diesem Text um den Film "Avatar" geht, sondern wir haben auch
Informationen zu den folgenden Punkten mit aufgenommen:

-   Filmgenre
-   Regisseur
-   Geburtsdatum des Regisseurs
-   Link zum Filmtrailer

E-Mail-Marketing
----------------

Auf den ersten Blick mag es den Anschein haben, als wären Microdata und
Schema.org für das E-Mail-Marketing uninteressant. Die semantische
Auszeichnung sieht wie eine SEO-Taktik aus, und SEO und E-Mail-Marketing
haben ja nichts miteinander zu tun, stimmt's?

Stimmt nicht! Zuerst einmal verschwimmen die Grenzen zwischen
[E-Mail-Marketing und
SEO](https://www.copernica.com/de/blog/six-email-deliverability-lessons-that-you-can-learn-from-seo)
längst, seitdem Google testweise bereits [Google Mail-Inboxen in
Suchergebnisse
miteinbezieht](https://www.copernica.com/de/blog/how-to-optimize-your-emails-for-search).

Doch es gibt für E-Mail-Marketer noch viel wichtigere Gründe, sich mit
Schema.org und Microdata zu befassen, denn die Vorteile gehen über bloße
Suchmaschinen-Sichtbarkeit weit hinaus.

Conversion schon vor dem Öffnen
-------------------------------

Durch den Einbau von Microdata in Ihren HTML-Code können Sie einem
E-Mail-Client mitteilen, welche Art von Inhalt sich in Ihrer Mail
verbirgt. Wenn Sie beispielsweise eine Event-Einladung verschicken,
können Sie den dazugehörigen Call-to-Action direkt in die Betreffzeile
integrieren:

![](Copernica_cases/schema-org-microdata.png "Steigern Sie ihre E-Mail-Conversion mit dem Schema.org-Markup ")

Dasselbe können Sie tun, wenn Sie...

-   Feedback oder Bewertungen für Ihren Online-Shop abfragen,
-   einen Bestätigungslink versenden,
-   Reiseinformationen anzeigen,
-   einen Check-in-Link versenden
-   und vieles mehr...

So haben Ihre Empfänger die Möglichkeit, auf Ihren Call-to-Action zu
reagieren, ohne dass sie Ihre E-Mail erst öffnen müssen.

Google Mail
-----------

Derzeit ist Google Mail der einzige Mailprovider, der das
Schema.org-Markup unterstützt. Wenn man allerdings bedenkt, dass
Schema.org gemeinsam mit Yahoo! und Microsoft entwickelt wurde, ist es
vermutlich nur noch eine Frage der Zeit, bis Yahoo! Mail und Outlook
ebenfalls eine Unterstützung von Microdata einführen.

Wie kann ich Schema.org-Markup einsetzen?
-----------------------------------------

Um einem E-Mail-Client mitzuteilen, was hinter Ihrem Call-to-Action
steckt, müssen Sie zunächst definieren, zu welcher Kategorie er gehört.
Auf Schema.org finden Sie eine Übersicht über alle möglichen Kategorien,
sog. [Itemtypes](http://schema.org/docs/full.html).

Wenn Sie also etwa eine Event-Einladung verschicken, können Sie dies
durch Bezugnahme auf [http://schema.org/Event](http://schema.org/Event)
und [http://schema.org/RsvpAction](http://schema.org/RsvpAction) in
Ihrem HTML-Code deutlich machen. Auf diesen Seiten sind verschiedene
Eigenschaften (item properties) aufgelistet, die einer Kategorie (item
type) zugeordnet werden können.

Für das oben genannte Beispiel würden Sie also den folgenden Code
verwenden:

``{style="font-size: 11px;"}

    <div itemscope itemtype="http://schema.org/Event">
      <meta itemprop="name" content="Taco Night"/>
      <meta itemprop="startDate" content="2015-04-18T15:30:00Z"/>
      <meta itemprop="endDate" content="2015-04-18T16:30:00Z"/>
      <div itemprop="location" itemscope itemtype="http://schema.org/Place">
        <div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
          <meta itemprop="name" content="Google"/>
          <meta itemprop="streetAddress" content="24 Willie Mays Plaza"/>
          <meta itemprop="addressLocality" content="San Francisco"/>
          <meta itemprop="addressRegion" content="CA"/>
          <meta itemprop="postalCode" content="94107"/>
          <meta itemprop="addressCountry" content="USA"/>
        </div>
      </div>
      <div itemprop="action" itemscope itemtype="http://schema.org/RsvpAction">
        <div itemprop="handler" itemscope itemtype="http://schema.org/HttpActionHandler">
          <link itemprop="url" href="http://mysite.com/rsvp?eventId=123&value=yes"/>
        </div>
        <link itemprop="attendance" href="http://schema.org/RsvpAttendance/Yes"/>
      </div>
      <div itemprop="action" itemscope itemtype="http://schema.org/RsvpAction">
        <div itemprop="handler" itemscope itemtype="http://schema.org/HttpActionHandler">
          <link itemprop="url" href="http://mysite.com/rsvp?eventId=123&value=no"/>
        </div>
        <link itemprop="attendance" href="http://schema.org/RsvpAttendance/No"/>
      </div>
      <div itemprop="action" itemscope itemtype="http://schema.org/RsvpAction">
        <div itemprop="handler" itemscope itemtype="http://schema.org/HttpActionHandler">
          <link itemprop="url" href="http://mysite.com/rsvp?eventId=123&value=maybe"/>
        </div>
        <link itemprop="attendance" href="http://schema.org/RsvpAttendance/Maybe"/>
      </div>
    </div>

Wenn Sie dagegen, um ein anderes Beispiel zu wählen, Kunden bitten
möchten, Ihren Online-Shop zu bewerten, setzen Sie einen Bezug zu
[http://schema.org/Rating](http://schema.org/Rating) ein:
``{style="font-size: 11px;"}

    <div itemscope itemtype="http://schema.org/EmailMessage">
      <meta itemprop="description" content="We hope you enjoyed your meal at Joe's Diner. Please rate your experience."/>
      <div itemprop="action" itemscope itemtype="http://schema.org/ReviewAction">
        <div itemprop="review" itemscope itemtype="http://schema.org/Review">
          <div itemprop="itemReviewed" itemscope itemtype="http://schema.org/FoodEstablishment">
            <meta itemprop="name" content="Joe's Diner"/>
          </div>
          <div itemprop="reviewRating" itemscope itemtype="http://schema.org/Rating">
            <meta itemprop="bestRating" content="5"/>
            <meta itemprop="worstRating" content="1"/>
          </div>
        </div>
        <div itemprop="handler" itemscope itemtype="http://schema.org/HttpActionHandler">
          <link itemprop="url" href="http://reviews.com/review?id=123"/>
          <div itemprop="requiredProperty" itemscope itemtype="http://schema.org/Property">
            <meta itemprop="name" content="review.reviewRating.ratingValue"/>
          </div>
          <link itemprop="method" href="http://schema.org/HttpRequestMethod/POST"/>
        </div>
      </div>
    </div>

Auf den [Google
Developers](https://developers.google.com/gmail/actions/)-Seiten finden
Sie weitere Beispielcodes für die Auszeichnung Ihrer E-Mails mit
Microdata.

**Bitte beachten Sie:** Google zeigt in den Informationen für Entwickler
verschiedene Möglichkeiten auf, Schema.org-Markup in E-Mails zu
verwenden. Ich möchte Ihnen dringend raten, nicht die Skript-Variante zu
wählen, da diese bei anderen E-Mail-Providern zu Problemen in Sachen
[Zustellbarkeit](https://www.copernica.com/de/blog/e-mailings-bessere-zustellbarkeit-mit-copernica "Zustellbarkeit ")
führen kann. Nutzen Sie grundsätzlich immer Microdata.

Brauchen Sie Hilfe?
-------------------

Brauchen Sie Hilfe beim Implementieren von Microdata in Ihren E-Mails?
Nutzen Sie Googles [Markup
Helper](https://www.google.com/webmasters/markup-helper/). Kopieren Sie
dort einfach den HTML-Quellcode Ihrer E-Mail hinein und folgen Sie den
Anweisungen.

Testing
-------

Mit Googles [Rich Snippets Testing
Tool](http://www.google.com/webmasters/tools/richsnippets) können Sie
sicherstellen, dass Sie Schema.org korrekt in Ihren E-Mails
implementiert haben.

Last but not least sollte wohl erwähnt werden, dass Google aktuell keine
Garantie darauf gibt, dass korrekte Schema.org-Auszeichnungen immer zur
Anzeige von Call-to-Actions in den Betreffzeilen führen.
