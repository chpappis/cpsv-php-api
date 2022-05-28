<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220528161112 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql("INSERT INTO public_service 
            (
            identifier, 
            name, 
            description, 
            processing_time,
            keyword,
            status_id,
            has_competent_authority_id
            ) 
            VALUES
            (
            'Ps0001', 
            'Έκδοση Διαβατηρίου',
            'Διαβατήριο είναι το έγγραφο που εκδίδεται από τη Διεύθυνση Κρατικής Ασφάλειας του Αρχηγείου Ελληνικής Αστυνομίας, με το οποίο ο κάτοχος μπορεί νόμιμα να εξέρχεται και να εισέρχεται στη Χώρα',
            'P3D',
            'Έκδοση, Διαβατήριο, Ελληνική Αστυνομία, Ταξίδι, εξωτερικό, τουρισμός',
            '196',
            '1'
            )");


    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
