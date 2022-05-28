<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220528140738 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql("INSERT INTO channel (type_id, identifier, opening_hours) VALUES('9', 'Ch0001', 'Mo-Fr 08:00-14:00')");
        $this->addSql("INSERT INTO channel (type_id, identifier, opening_hours) VALUES('10', 'Ch0002', 'Mo-Fr 08:00-14:00')");


    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
