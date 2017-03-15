# Followups: Copernica Properties

The **properties** in the Copernica object contains functions to retrieve 
information about the account, including:

* **name()**: get account name
* **setName($newName)**: set account name
* **hasTrackingDomain(PxtHostname $hostname)**: checks if a hostname can be used as picserver
* **trusted()**: checks if account is trusted to send emails
* **application()**: returns application object with settings and preferences
* **setApplication(PxCDMApplication $application)**: set application with settings and preferences
* **environment()**: retrieve linked responsive environment
* **setEnvironment(PxCDMResponsiveEnvironment $environment)**: set linked responsive environment
* **apiAccessTokens(PxCDMApiAccessTokenFilter $filter)**: the applications that have access
* **limiter()**: limiter to limit usage
* **main()**: check if main account for this customer
* **setMain()**: set this account as main account for customer
* **beginDate()**: timestamp of account creation
* **removed()**: timestamp of account deletion
* **active()**: check if account is active
* **customer()**: current customer for this account
* **setCustomer(PxCDMCompany $company, PxCDMOldLicense $license, PxtDateTime $startDate)**: set customer for this account
* **customers**: all customer relationships that have existed
* **pomName()**: POM name of account
* **individualPrivileges()**: check if individual privileges are in use
* **setIndividualPrivileges($value)**: set whether individual privileges should be in use
* **role(PxCDMUser $user)**: get user role in account
* **roles(PxCDMRoleFilter $filter)**: get all roles that give access to this account
* **createRole(PxCDMUser $user, PxCDMUser $creator)**: give a user access to this account
* **users(PxCDMUserFilter $filter)**: get all users for this account
* **pomAccount()**: get old POM account
* **fromAddresses()**: get valid from adresses for account
* **fromAddress($identifier)**: get valid adress for account by ID
* **createFromAddress($name, PxtEmailAddress $email)**: create from adress
* **replicationActive()**: check if replication server is now in use
* **setReplicationActive($value = true)**: set database connections to replication servers
* **article($identifier)**: get account article by ID
* **articles(PxCDMArticleFilter $filter)**: get all/filtered articles
* **createArticle(PxtLanguage $language, $title)**: create an article
* **articleCategory($identifier)**: get article category by ID
* **articleCategories(PxCDMArticleCategoryFilter $filter): get all/filtered article categories for account
* **createArticleCategory(PxtLanguage $language, $name)**: create article category
* **articleUrl($identifier)**: get article url by ID
* **articleUrls(PxCDMArticleUrlFilter $filter)**: get all/filtered article URLs for this account
* **pipe($id)**: retrieve a pipe by ID
* **pipes(PxCDMPipeFilter $filter)**: get all/filtered pipes by ID
* **createPipe($name)**: create a new pipe
* **consumption(PxtMonth $month)**: get consumption statistics
* **consumptionReport(PxtDateTimeRange $range)**: get consumption report over given period
* **propertyType($identifier)**: get access to specific property type
* **propertyTypes(PxCDMPropertyTypeFilter $filter)**: get all property types for this account
* **picturesUrl()**: retrieve the pictures based URL
* **setPicturesUrl(PxCDMPicturesUrl $url**: set pictures based URL
* **ipRangeRestriction()**: get IP range restriction for account
* **removeIpRangeRestriction(array $ipRanges)**: remove existing IP range restrictions
* **setIpRangeRestriction(array $ipRanges)**: set IP range restrictions
* **allowAccessFrom(PxtIpAddress $ip)**: check if IP address has access
* **ipRemovalPeriod()**: retrieve IP removal period
* **setIpRemovalPeriod(PxtDateInterval $duration): update IP removal period
* **keepHistory()**: get period for keeping history
* **setKeepHistory(PxtDateInterval $duration)**: set duration for keeping history
* **releaseVersion()**: get release version for account
* **setReleaseVersion($version)**: set release version for this account
* **envelopeDomain()**: get envelope domain for email
* **setEnvelopeDomain(PxtHostname $hostname**: set new envelope domain
* **senderIps(PxCDMSenderIpFilter $filter)**: get all/filtered allowed sender IPs for this account
* **designatedSenderIp()**: get sender IP from allowed sender IPs
* **mailQueueProperties()**: get mail queue properties
* **articleComments(PxCDMArticleCommentFilter $filter)**: get all/filtered article comments for this account
* **database($database)**: get a database by name or identifier
* **createDatabase($name)**: create database with given name
* **databases(PxCDMDatabaseFilter $filter**: get all/filtered databases
* **profile($id)**: get profile by ID
* **historicProfile($id)**: get historic profile by ID
* **description()**: get account description
* **setDescription($desc)**: set account description
* **createdBy()**: get user that created account
* **emailing($id)**: get emailing by identifier
* **createEmailing($target, PxCDMEmailingTemplate $template, PxCDMUser $user, PxtDateTime $timestamp)**: create emailing
* **emailings(PxCDMEmailingFilter $filter)**: get all/filtered mailings
* **scheduledEmailing($id)**: get scheduled mailing by identifier
* **createScheduledEmailing($target, PxCDMEmailingTemplate $template, array $options, PxCDMUser $user)**: create scheduled mailing
* **scheduledEmailings(PxCDMScheduledEmailingFilter $filter)**: get all/filtered scheduled mailings
* **emailingDestination($id)**: get emailing destination by ID
* **emailingDestinationImpression($id)**: get an emailing impression by ID
* **emailingDestinationImpressions(PxCDMEmailingDestinationImpressionFilter $filter)**: get all/filtered emailing impressions
* **emailingDestinationClick($id)**: get an emailing click by ID
* **emailingDestinationClicks(PxCDMEmailingDestinationClickFilter $filter)**: get all/filtered emailing clicks
* **emailingDestinationAbuse($id)**: get emailing abuse by ID
* **emailingDestinationAbuses(PxCDMEmailingDestinationAbuseFilter $filter**: get all/filtered emailing abuses
* **emailingDestinationError($id)**: get emailing error by ID
* **emailingDestinationErrors(PxCDMEmailingDestinationErrorFilter $filter)**: get all/filtered emailings errors
* **emailingDestinationRetry($id)**: get emailing retry by ID
* **emailingDestinationRetries(PxCDMEmailingDestinationRetryFilter $filter)**: get all/filtered emailing retries
* **emailingDestinationDelivery($id)**: get emailing delivery by ID
* **emailingDestinationDeliveries(PxCDMEmailingDestinationDeliveryFilter $filter)**: get all/filtered emailing deliveries
* **smsMailing($id)**: get SMS mailing by ID
* **createSmsMailing(PxCDMSMSMailingSettings $settings, $target, $document)**: create SMS mailing
* **smsMailings(PxCDMMailingFilter $filter)**: get all/filtered SMS mailings
* **smsMailingDestination($id)**: get SMS mailing destination by ID
* **faxMailing($id)**: get fax mailing by ID
* **createFaxMailing(PxCDMFaxMailingSettings $settings, $target, $document)**: create fax mailing
* **faxMailings(PxCDMMailingFilter $filter)**: get all/filtered fax mailings
* **faxMailingDestination($id)**: get fax mailing destination by ID
* **createEmailingTemplate($name, $properties)**: create new emailing template
* **emailingTemplates(PxCDMEmailingTemplateFilter $filter)**: get all/filtered emailing templates
* **emailingTemplate($id)**: get an emailing template by ID
* **emailingTemplateSnapshot($id)**: get snapshot of emailing template
* **emailingTemplateSnapshots(PxCDMEmailingTemplateSnapshotFilter $filter**: get all/filtered emailing template snapshots
* **emailingTemplateSnapshotLinkTag**: get an emailing snapshot link tag by ID
* **emailingTemplateSnapshotLinkTags(PxCDMEmailingTemplateSnapshotLinkTagFilter $filter)**: get all/filtered emailing snapshot link tags
* **maxDeliveryRate()**: get max delivery rate for this account
* **setMaxDeliveryRate($limit)**: set max delivery rate for this account
* **magento()**: get Magento facade for this account
* **createEmailingTemplateCheckpoint(PxCDMUser $user, $properties, PxCDMEmailingTemplateJSON $template)**: make new checkpoint for emailing template
* **emailingTemplatesCheckpoints(PxCDMCrashedEmailingTemplateJSONFilter $filter)**: get all/filtered emailing template checkpoints
* **emailingTemplateCheckpoint($id)**: get emailing template checkpoint by ID
* **statistics()**: get statistics for the account
* **mailingTags(PxCDMMailingTagFilter $filter)**: get all/filtered mailing tags for this account
* **systemNotifications(PxCDMSystemNotificationFilter $filter)**: get all/filtered system notifications for this account
* **senderDomain($domain)**: get domain by name or identifier
* **createSenderDomain(PxtHostname $domain)**: create new sender domain
* **senderDomains(PxCDMSenderDomainFilter $filter)**: get all/filtered sender domains for this account
* **trackingDomains()**: get cache of most appropriate tracking domains
* **dkimKey($id)**: get dkim key by ID
* **dkimKeys(PxCDMDKIMFilter $filter)**: get all/filtered dkim keys
* **createDKIMKey($selector, PxtHostname $hostname, PxtSslPrivateKey $privateKey = null)**: create dkim key
* **branch()**: get branch of account
* **setBranch(PxCDMBranch $branch)**: set branch of account
* **emailStats(PxtDateTimeZone $timezone)**: get email stats for this account
* **dmarcStatistics()**: get dmarc statistics for this account
* **tracking($forced)**: get preferred tracking system
* **setTracking($forced, $value)**: set force on tracking parameter

## More information
[The data-script object](./followups-scripting)
[The copernica variable](./followups-scripting-copernica)
