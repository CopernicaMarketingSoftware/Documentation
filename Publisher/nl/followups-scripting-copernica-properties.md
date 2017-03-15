# Followups: Copernica eigenschappen

Het **properties** in het Copernica object bevat verschillende functies om 
informatie over het account op te vragen. Deze vind je in de lijst hieronder.
In veel van deze functies kun je een filter meegeven om een collectie van objecten terug te krijgen. 
Door "null" als filter mee te geven krijg je alle bestaande objecten voor het account terug.

* **name()**: vraag account naam op
* **setName($newName)**: stel account naam in
* **hasTrackingDomain(PxtHostname $hostname)**: checkt of de hostname als picserver gebruikt kan worden
* **trusted()**: checkt of de account vertrouwd is en dus emails mag sturen
* **application()**: geeft het applicatie object met instellingen terug
* **setApplication(PxCDMApplication $application)**: verander applicatie object naar gegeven object
* **environment()**: vraag linked responsive environment voor de account op
* **setEnvironment(PxCDMResponsiveEnvironment $environment)**: stel linked responsive environment in
* **apiAccessTokens(PxCDMApiAccessTokenFilter $filter)**: applicatie waartoe de account toegang heeft
* **limiter()**: limiter om gebruikslimiet in te stellen
* **main()**: check of dit de primaire account voor de klant is
* **setMain()**: stel in als primaire account van de klant
* **beginDate()**: tijdstip van aanmaken account
* **removed()**: tijdstip van verwijderen account
* **active()**: check of de account actief is
* **customer()**: huidige klant voor het account
* **setCustomer(PxCDMCompany $company, PxCDMOldLicense $license, PxtDateTime $startDate)**: stel klant voor dit account in
* **customers**: alle klant relaties die hebben bestaan voor het account
* **pomName()**: POM naam van het account
* **individualPrivileges()**: check of individuele privileges gebruikt worden.
* **setIndividualPrivileges($value)**: stel in of individuele privileges gebruikt worden
* **role(PxCDMUser $user)**: vraag gebruiker rol op in account
* **roles(PxCDMRoleFilter $filter)**: vraag alle rollen op die toegang geven tot dit account
* **createRole(PxCDMUser $user, PxCDMUser $creator)**: geef een gebruiker toegang tot dit account
* **users(PxCDMUserFilter $filter)**: vraag alle/gefilterede gebruikers op voor dit account
* **pomAccount()**: vraag oude POM account op
* **fromAddresses()**: vraag valide zender adressen op
* **fromAddress($identifier)**: vraag valide zender adres op met ID
* **createFromAddress($name, PxtEmailAddress $email)**: maak valide zender adres aan
* **replicationActive()**: check of de replicatie server gebruikt wordt
* **setReplicationActive($value = true)**: stel database connecties met replicatie servers in
* **article($identifier)**: vraag article op per ID
* **articles(PxCDMArticleFilter $filter)**: vraag alle/gefilterde artikelen op
* **createArticle(PxtLanguage $language, $title)**: maak een artikel aan
* **articleCategory($identifier)**: vraag artikel categorie op per ID
* **articleCategories(PxCDMArticleCategoryFilter $filter): vraag alle/gefilterde artikel categorieen op
* **createArticleCategory(PxtLanguage $language, $name)**: maak artikel categorie aan
* **articleUrl($identifier)**: vraag artikel URL op per ID
* **articleUrls(PxCDMArticleUrlFilter $filter)**: vraag alle/gefilterde artikel URLs op
* **pipe($id)**: vraag pipe op per ID
* **pipes(PxCDMPipeFilter $filter)**: vraag alle/gefilterde pipes op
* **createPipe($name)**: maak nieuwe pipe aan
* **consumption(PxtMonth $month)**: vraag consumptie statistieken op
* **consumptionReport(PxtDateTimeRange $range)**: vraag consumptie rapport over gegeven periode op
* **propertyType($identifier)**: vraag specifiek property type op per ID
* **propertyTypes(PxCDMPropertyTypeFilter $filter)**: vraag alle/gefilterde property types op
* **picturesUrl()**: vraag de op pictures gebaseerde URL op
* **setPicturesUrl(PxCDMPicturesUrl $url**: stel op pictures gebaseerde URL in
* **ipRangeRestriction()**: vraag IP reeks restrictie op voor dit account
* **removeIpRangeRestriction(array $ipRanges)**: verwijder bestaande IP reeks restricties
* **setIpRangeRestriction(array $ipRanges)**: stel IP reeks restricties in
* **allowAccessFrom(PxtIpAddress $ip)**: check of gegeven IP adres toegang heeft tot het account
* **ipRemovalPeriod()**: vraag verwijder interval voor IPs op
* **setIpRemovalPeriod(PxtDateInterval $duration): stel verwijder interval voor IPs in
* **keepHistory()**: vraag geschiedenis verwijder periode op
* **setKeepHistory(PxtDateInterval $duration)**: stel periode in voor verwijderen geschiedenis
* **releaseVersion()**: vraag release versie voor account op
* **setReleaseVersion($version)**: stel release versie voor het account in
* **envelopeDomain()**: vraag envelope domain for mail op
* **setEnvelopeDomain(PxtHostname $hostname**: stel nieuw envelope domain voor mail in
* **senderIps(PxCDMSenderIpFilter $filter)**: vraag alle/gefilterde toegestane zender IPs op
* **designatedSenderIp()**: vraag zender IP op uit toegestande zender IPs
* **mailQueueProperties()**: vraag mail wachtlijst instellingen op
* **articleComments(PxCDMArticleCommentFilter $filter)**: vraag alle/gefilterde artikel commentaren op
* **database($database)**: vraag database op met naam of identifier
* **createDatabase($name)**: maak database met gegeven naam aan
* **databases(PxCDMDatabaseFilter $filter**: vraag alle/gefilterde databases op
* **profile($id)**: vraag profiel met ID op
* **historicProfile($id)**: vraag historisch profiel met ID op
* **description()**: vraag account omschrijving op
* **setDescription($desc)**: stel account omschrijving in
* **createdBy()**: vraag gebruiker die account aan heeft gemaakt op
* **emailing($id)**: vraag emailing op per ID
* **createEmailing($target, PxCDMEmailingTemplate $template, PxCDMUser $user, PxtDateTime $timestamp)**: maak emailing aan
* **emailings(PxCDMEmailingFilter $filter)**: vraag alle/gefilterde emailings op
* **scheduledEmailing($id)**: vraag geplande mailing op per ID
* **createScheduledEmailing($target, PxCDMEmailingTemplate $template, array $options, PxCDMUser $user)**: maak geplande mailing aan
* **scheduledEmailings(PxCDMScheduledEmailingFilter $filter)**: vraag alle/gefilterde mailings op
* **emailingDestination($id)**: vraag emailing ontvanger op per ID
* **emailingDestinationImpression($id)**: vraag emailing impressie op per ID
* **emailingDestinationImpressions(PxCDMEmailingDestinationImpressionFilter $filter)**: vraag alle/gefilterde mailing impressies op
* **emailingDestinationClick($id)**: vraag emailing click op per ID
* **emailingDestinationClicks(PxCDMEmailingDestinationClickFilter $filter)**: vraag alle/gefilterde emailing clicks op
* **emailingDestinationAbuse($id)**: vraag emailing misbruik op per ID
* **emailingDestinationAbuses(PxCDMEmailingDestinationAbuseFilter $filter**: vraag alle/gefilterde emailing misbruiken op
* **emailingDestinationError($id)**: vraag emailing errors op per ID
* **emailingDestinationErrors(PxCDMEmailingDestinationErrorFilter $filter)**: vraag alle/gefilterde emailing errors op
* **emailingDestinationRetry($id)**: vraag emailing herzendingen op per ID
* **emailingDestinationRetries(PxCDMEmailingDestinationRetryFilter $filter)**: vraag alle/gefilterde emailing herzendingen op
* **emailingDestinationDelivery($id)**: vraag emailing ontvangst op per ID
* **emailingDestinationDeliveries(PxCDMEmailingDestinationDeliveryFilter $filter)**: vraag alle/gefilterde emailing ontvangsten op
* **smsMailing($id)**: vraag SMS mailing op per ID
* **createSmsMailing(PxCDMSMSMailingSettings $settings, $target, $document)**: maak SMS mailing aan
* **smsMailings(PxCDMMailingFilter $filter)**: vraag alle/gefilterde SMS mailings op
* **smsMailingDestination($id)**: vraag SMS mailing op per ID
* **faxMailing($id)**: vraag fax mailing op per ID
* **createFaxMailing(PxCDMFaxMailingSettings $settings, $target, $document)**: maak fax mailing aan
* **faxMailings(PxCDMMailingFilter $filter)**: vraag alle/gefilterde fax mailings op
* **faxMailingDestination($id)**: vraag fax mailing bestemming op per ID
* **createEmailingTemplate($name, $properties)**: maak nieuwe emailing template aan
* **emailingTemplates(PxCDMEmailingTemplateFilter $filter)**: vraag alle/gefilterde emailing templates op
* **emailingTemplate($id)**: vraag emailing template op per ID
* **emailingTemplateSnapshot($id)**: vraag snapshot van emailing template op
* **emailingTemplateSnapshots(PxCDMEmailingTemplateSnapshotFilter $filter**: vraag alle/gefilterde emailing template snapshots op
* **emailingTemplateSnapshotLinkTag**: vraag emailing snapshot link tag op per ID
* **emailingTemplateSnapshotLinkTags(PxCDMEmailingTemplateSnapshotLinkTagFilter $filter)**: vraag alle/gefilterde emailing snapshot link tags op
* **maxDeliveryRate()**: vraag max afleverings snelheid op
* **setMaxDeliveryRate($limit)**: stel max afleverings snelheid in voor het account
* **magento()**: vraag Magento facade voor dit account op
* **createEmailingTemplateCheckpoint(PxCDMUser $user, $properties, PxCDMEmailingTemplateJSON $template)**: maak nieuw checkpoint aan voor emailing template
* **emailingTemplatesCheckpoints(PxCDMCrashedEmailingTemplateJSONFilter $filter)**: vraag alle/gefilterde emailing template checkpoints op
* **emailingTemplateCheckpoint($id)**: vraag emailing template checkpoint op per ID
* **statistics()**: vraag statistieken voor de account op
* **mailingTags(PxCDMMailingTagFilter $filter)**: vraag alle/gefilterde mailing tags voor het account op
* **systemNotifications(PxCDMSystemNotificationFilter $filter)**: vraag alle/gefilterde systeem notificaties op voor dit account
* **senderDomain($domain)**: vraag domein op per naam of ID
* **createSenderDomain(PxtHostname $domain)**: maak nieuw zender domein aan
* **senderDomains(PxCDMSenderDomainFilter $filter)**: vraag alle/gefilterde zender domeinen op voor het account
* **trackingDomains()**: vraag cache van meest geschikte tracking domeinen op
* **dkimKey($id)**: vraag dkim key op per ID
* **dkimKeys(PxCDMDKIMFilter $filter)**: vraag alle/gefilterde dkim keys op
* **createDKIMKey($selector, PxtHostname $hostname, PxtSslPrivateKey $privateKey = null)**: maak dkim key aan
* **branch()**: vraag branch van account op
* **setBranch(PxCDMBranch $branch)**: stel branch van account in
* **emailStats(PxtDateTimeZone $timezone)**: vraag email statistieken voor dit account op
* **dmarcStatistics()**: vraag dmarc statistieken voor dit account op
* **tracking($forced)**: vraag voorkeurs tracking systeem op
* **setTracking($forced, $value)**: stel force in op tracking parameter

## Meer informatie
[Het data-script object](./followups-scripting)
[De copernica variable](./followups-scripting-copernica)

