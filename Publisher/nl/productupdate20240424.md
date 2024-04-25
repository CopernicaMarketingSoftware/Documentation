# Productupdate - Nieuw: Krachtigere opvolgacties en webhooks voor uitschrijvingen

## Inzicht in uitvoeringen per pad van opvolgactie
In Marketing Suite-opvolgacties is het mogelijk gemaakt om inzicht te krijgen hoe vaak bepaalde acties zijn uitgevoerd. In de opvolgactie-editor is in de toolbar de optie 'Toon statistieken' toegevoegd. Zodra je deze optie activeert, worden extra labels zichtbaar in het stroomdiagram die laten zien hoe vaak een bepaald pad is afgelegd. Zo krijg je een beter beeld van de werkelijke uitvoering van campagnes en opvolgacties.

## Flows testen met 'willekeurig opsplitsen'-blok
De opvolgactie-editor van Marketing Suite heeft nu een extra tussenblok, waarmee je binnen je flow willekeurige splitsingen kunt maken. Hierdoor kun je testen welke flow het beste werkt door een percentage van de (sub)profielen de ene flow te laten ontvangen en een ander percentage de andere flow. Er is geen limiet aan het aantal splitsingen dat je kunt maken.

Om dit in te stellen, voeg je het nieuwe blok 'Willekeurig opsplitsen' toe in de opvolgactie-editor. Vervolgens kun je meerdere segmenten aanmaken en de weging van deze segmenten instellen. Bij het verbinden van dit blok met een nieuw blok, heb je de optie om het segment te selecteren waarvoor deze vertakking geldt.

## Aantal uitvoeringen limiteren van opvolgactie
Vanaf deze week is het mogelijk om het aantal uitvoeringen te limiteren binnen de opvolgactie-editor. Dit is handig wanneer je een bepaalde campagne slechts een aantal keren per periode wilt laten uitvoeren. Je kunt de uitvoeringen limiteren voor de hele campagne of per (sub)profiel. Op deze manier kun je bijvoorbeeld een opvolgactie alleen laten uitvoeren wanneer een profiel voor het eerst op een link klikt binnen een bepaalde periode, of de actie stoppen wanneer het maximale aantal uitvoeringen is bereikt.

Om dit in te stellen, voeg je het nieuwe blok 'Aantal uitvoeringen limiteren' toe aan je stroomdiagram. In dit blok kun je aangeven of de limiet geldt voor de gehele campagne of per (sub)profiel. Daarnaast kun je een tijdslimiet instellen om aan te geven gedurende welke periode de limieten van kracht zijn.

## Tijdelijk uitschakelen van templates
Het is nu mogelijk om templates tijdelijk uit te schakelen, zodat ze niet worden gebruikt in opvolgacties. Dit is vooral handig bij het werken met meertalige templates. Wanneer je een vertaling maakt van een template dat wordt gebruikt in een opvolgactie, wordt deze vertaling direct toegepast op de profielen waarvan de taal overeenkomt met die van de template. Door het template tijdelijk uit te schakelen, kun je de template rustig bewerken en vervolgens activeren zodra deze klaar is om te worden opgenomen in de workflow.

Je schakelt een template uit door binnen je template in de [e-mail-editor](https://ms.copernica.com/#/design) naar configuratie te gaan en te kiezen voor de optie 'Template uitschakelen'.

## Webhooks voor uitschrijvingen
Het is nu mogelijk om een [webhook](https://ms.copernica.com/#/admin/account/webhooks) te ontvangen wanneer een uitschrijving wordt geregistreerd. Webhooks zijn processen die direct een melding naar gebruikers sturen door middel van een HTTP POST-verzoek. Een webhook voor uitschrijvingen is vooral handig wanneer je de status van een profiel ook wilt bijwerken in externe systemen buiten Copernica.

Meer informatie over de webhook voor uitschrijvingen vind je in onze [documentatie](./webhook-unsubscribes).
