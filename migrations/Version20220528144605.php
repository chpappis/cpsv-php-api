<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220528144605 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql("INSERT INTO legal_resource (identifier, name, description) VALUES('Lr0001', 'Ν.3103/2003 (ΦΕΚ 23/29-1-2003)', 'Ν.3103/2003 (Φ.Ε.Κ. 23/29-1-2003) - Έκδοση διαβατηρίων από την Ελληνική Αστυνομία και άλλες διατάξεις. Με το άρθρο 1 του Ν.3103/2003 ρυθμίζονται θέματα αρμοδιοτήτων σχετικά με την έκδοση διαβατηρίων.')");
        $this->addSql("INSERT INTO legal_resource (identifier, name, description) VALUES('Lr0002', 'Π.Δ.126/2005 (ΦΕΚ 181/21-7-2005)', 'Π.Δ.126/2005 (Φ.Ε.Κ. 181/21-7-2005)  - Ίδρυση Διεύθυνσης Διαβατηρίων και άλλες διατάξεις» το οποίο κατήργησε το Π.Δ. 37/2004 (Φ.Ε.Κ. 33, τ.Α`).')");


    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
