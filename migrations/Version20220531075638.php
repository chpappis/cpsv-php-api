<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220531075638 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql("INSERT INTO business_event (identifier, name, description) VALUES('Be0001', 'Δήλωση εταιρίας', 'Σε αυτή την κατηγορία συγκεντρώνονται δημόσιες υπηρεσίες που σχετίζονται με υποχρεωτικές ενέργειες πριν την έναρξη μιας επιχείρησης. Για παράδειγμα εγγραφή στο επαγγελματικό επιμελητήριο, δήλωση επαγγελματικού ΑΦΜ, δήλωση επαγγελματικής διεύθυνσης.')");
        $this->addSql("INSERT INTO business_event (identifier, name, description) VALUES('Be0002', 'Έναρξη νέας δραστηριότητας', 'Σε αυτή την κατηγορία συγκεντρώνονται δημόσιες υπηρεσίες που σχετίζονται με την έναρξη νέας δραστηριότητας μιας επιχείρησης και που πρέπει να ολοκληρωθούν πριν την έναρξη της νέας δραστηριότητας.')");
        $this->addSql("INSERT INTO business_event (identifier, name, description) VALUES('Be0003', 'Πρόσληψη υπαλλήλου', 'Σε αυτή την κατηγορία συγκεντρώνονται δημόσιες υπηρεσίες που σχετίζονται με τη στρατολόγηση και εγγραφή νέων υπαλλήλων, με την αίτηση για  άδεια εργασίας και με τις αλλαγές τύπου απασχόλησης.')");


    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
