<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220528163044 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql("INSERT INTO public_service_concept_sector (public_service_id, concept_id)  VALUES('1','854')");

        $this->addSql("INSERT INTO public_service_event (public_service_id, event_id)  VALUES('1','1')");

        $this->addSql("INSERT INTO public_service_criterion_requirement (public_service_id, criterion_requirement_id)  VALUES('1','1')");

        $this->addSql("INSERT INTO public_service_evidence (public_service_id, evidence_id)  VALUES('1','1')");

        $this->addSql("INSERT INTO public_service_legal_resource (public_service_id, legal_resource_id)  VALUES('1','1')");

        $this->addSql("INSERT INTO public_service_output (public_service_id, output_id)  VALUES('1','1')");
        $this->addSql("INSERT INTO public_service_output (public_service_id, output_id)  VALUES('1','2')");
        $this->addSql("INSERT INTO public_service_output (public_service_id, output_id)  VALUES('1','3')");
        $this->addSql("INSERT INTO public_service_output (public_service_id, output_id)  VALUES('1','4')");
        $this->addSql("INSERT INTO public_service_output (public_service_id, output_id)  VALUES('1','5')");
        $this->addSql("INSERT INTO public_service_output (public_service_id, output_id)  VALUES('1','6')");

        $this->addSql("INSERT INTO public_service_rule (public_service_id, rule_id)  VALUES('1','1')");

        $this->addSql("INSERT INTO public_service_location (public_service_id, location_id)  VALUES('1','105')");

        $this->addSql("INSERT INTO public_service_channel (public_service_id, channel_id)  VALUES('1','1')");
        $this->addSql("INSERT INTO public_service_channel (public_service_id, channel_id)  VALUES('1','2')");

        $this->addSql("INSERT INTO public_service_cost (public_service_id, cost_id)  VALUES('1','1')");
        $this->addSql("INSERT INTO public_service_cost (public_service_id, cost_id)  VALUES('1','2')");
        $this->addSql("INSERT INTO public_service_cost (public_service_id, cost_id)  VALUES('1','3')");
        $this->addSql("INSERT INTO public_service_cost (public_service_id, cost_id)  VALUES('1','4')");
        $this->addSql("INSERT INTO public_service_cost (public_service_id, cost_id)  VALUES('1','5')");
        $this->addSql("INSERT INTO public_service_cost (public_service_id, cost_id)  VALUES('1','6')");
        

    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
