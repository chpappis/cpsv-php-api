<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220417100026 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__location AS SELECT id FROM location');
        $this->addSql('DROP TABLE location');
        $this->addSql('CREATE TABLE location (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, public_organisation_id INTEGER DEFAULT NULL, CONSTRAINT FK_5E9E89CBB8D2DE84 FOREIGN KEY (public_organisation_id) REFERENCES public_organisation (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO location (id) SELECT id FROM __temp__location');
        $this->addSql('DROP TABLE __temp__location');
        $this->addSql('CREATE INDEX IDX_5E9E89CBB8D2DE84 ON location (public_organisation_id)');
        $this->addSql('ALTER TABLE public_organisation ADD COLUMN preferred_label VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX IDX_5E9E89CBB8D2DE84');
        $this->addSql('CREATE TEMPORARY TABLE __temp__location AS SELECT id FROM location');
        $this->addSql('DROP TABLE location');
        $this->addSql('CREATE TABLE location (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL)');
        $this->addSql('INSERT INTO location (id) SELECT id FROM __temp__location');
        $this->addSql('DROP TABLE __temp__location');
        $this->addSql('CREATE TEMPORARY TABLE __temp__public_organisation AS SELECT id FROM public_organisation');
        $this->addSql('DROP TABLE public_organisation');
        $this->addSql('CREATE TABLE public_organisation (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL)');
        $this->addSql('INSERT INTO public_organisation (id) SELECT id FROM __temp__public_organisation');
        $this->addSql('DROP TABLE __temp__public_organisation');
    }
}
