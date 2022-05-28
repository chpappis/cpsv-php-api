<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220528152915 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql("INSERT INTO event (identifier, name, description) VALUES('Le0001', 'Ταξίδι στο εξωτερικό', 'Ταξίδι στο εξωτερικό')");
        $this->addSql("INSERT INTO criterion_requirement (identifier, name) VALUES('Cr0001', 'ΥΠΗΚΟΟΤΗΤΑ')");
        $this->addSql("INSERT INTO evidence (identifier, name, description) VALUES('EV0001', 'Αίτηση-Υπεύθυνη δήλωση έκδοσης διαβατηρίου ενηλίκων', 'Αίτηση-Υπεύθυνη δήλωση έκδοσης διαβατηρίου ενηλίκων')");
        $this->addSql("INSERT INTO rule (identifier, name, description) VALUES('Ru0001', 'ABOUT PASSPORT', 'Διαβατήριο είναι το έγγραφο που εκδίδεται από τη Διεύθυνση Κρατικής Ασφάλειας του Αρχηγείου Ελληνικής Αστυνομίας, με το οποίο ο κάτοχος μπορεί νόμιμα να εξέρχεται και να εισέρχεται στη Χώρα')");


    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
