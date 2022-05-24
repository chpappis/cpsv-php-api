<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220524180005 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Insert Data';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql("INSERT INTO public_organisation (preferred_label)  VALUES('Passport Issuer')");
        $this->addSql("INSERT INTO public_organisation_location (public_organisation_id, location_id)  VALUES('1','105')");

        $this->addSql("INSERT INTO cost (identifier, value, description, currency_id, if_accessed_through_id)  VALUES('Co0001','8440', 'Αφορά διαβατήριο ενηλίκων και ανηλίκων άνω των 14 ετών (πενταετούς διάρκειας)', '44', '')");
        $this->addSql("INSERT INTO cost (identifier, value, description, currency_id, if_accessed_through_id)  VALUES('Co0002','7360', 'Αφορά διαβατήριο ανηλίκων έως 14 ετών (τριετούς διάρκειας)', '44', '')");
        $this->addSql("INSERT INTO cost (identifier, value, description, currency_id, if_accessed_through_id)  VALUES('Co0003','6880', 'Αφορά διαβατήρια που εκδίδονται κατ εξαίρεση, σε πολίτη που εμπίπτει στις διατάξεις απαγόρευση έκδοσης διαβατηρίου, όταν αυτή αίρεται  με δικαστική απόφαση ή εισαγγελική διάταξη ή εφόσον είναι αναγκαία η μετάβαση του στην αλλοδαπή για λόγους νοσηλείας, θανάτου ή σοβαρής ασθένειας  (διάρκειας 13 μηνών)', '44', '')");
        $this->addSql("INSERT INTO cost (identifier, value, description, currency_id, if_accessed_through_id)  VALUES('Co0004','6340', 'Αφορά διαβατήρια σε περιπτώσεις που η λήψη δακτυλικών αποτυπωμάτων είναι προσωρινά αδύνατη (διάρκειας 8 μηνών)', '44', '')");
        $this->addSql("INSERT INTO cost (identifier, value, description, currency_id, if_accessed_through_id)  VALUES('Co0005','6340', 'Αφορά διαβατήρια περιπτώσεων μεταγωγής κρατουμένου από σωφρονιστικό κατάστημα της αλλοδαπής στην ημεδαπή και αντιστρόφως (διάρκειας 3 μηνών)', '44', '')");
        $this->addSql("INSERT INTO cost (identifier, value, description, currency_id, if_accessed_through_id)  VALUES('Co0006','5800', 'Αφορά περιπτώσεις αντικατάστασης διαβατηρίου (με διάρκεια ίδια με αυτού που αντικαθίσταται)', '44', '')");

        $this->addSql("INSERT INTO cost_public_organisation (cost_id, public_organisation_id)  VALUES('1','1')");
        $this->addSql("INSERT INTO cost_public_organisation (cost_id, public_organisation_id)  VALUES('2','1')");
        $this->addSql("INSERT INTO cost_public_organisation (cost_id, public_organisation_id)  VALUES('3','1')");
        $this->addSql("INSERT INTO cost_public_organisation (cost_id, public_organisation_id)  VALUES('4','1')");
        $this->addSql("INSERT INTO cost_public_organisation (cost_id, public_organisation_id)  VALUES('5','1')");
        $this->addSql("INSERT INTO cost_public_organisation (cost_id, public_organisation_id)  VALUES('6','1')");

    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
