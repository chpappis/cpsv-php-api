<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220524181624 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql("INSERT INTO output (identifier, name, description) VALUES('Ou0001','Διαβατήριο με διάρκεια 5 έτη', 'Το διαβατήριο 5ετούς διάρκειας εκδίδεται για ενήλικους και για ανήλικους άνω των 14 ετών')");
        $this->addSql("INSERT INTO output (identifier, name, description) VALUES('Ou0002','Διαβατήριο με διάρκεια 3 έτη', 'Το διαβατήριο 3ετούς διάρκειας εκδίδεται για ανήλικους έως 14 ετών')");
        $this->addSql("INSERT INTO output (identifier, name, description) VALUES('Ou0003','Διαβατήριο με διάρκεια 13 μήνες', 'Το διαβατήριο με διάρκεια 13 μήνες χορηγείται, κατ εξαίρεση, σε πολίτη που εμπίπτει στις διατάξεις απαγόρευση έκδοσης διαβατηρίου, όταν αυτή αίρεται  με δικαστική απόφαση ή εισαγγελική διάταξη ή εφόσον είναι αναγκαία η μετάβαση του στην αλλοδαπή για λόγους νοσηλείας, θανάτου ή σοβαρής ασθένειας.')");
        $this->addSql("INSERT INTO output (identifier, name, description) VALUES('Ou0004','Διαβατήριο με διάρκεια 8 μήνες', 'Το διαβατήριο με διάρκεια 8 μήνες χορηγείται αποκλειστικά και μόνο για τις περιπτώσεις που η λήψη δακτυλικών αποτυπωμάτων είναι προσωρινά αδύνατη')");
        $this->addSql("INSERT INTO output (identifier, name, description) VALUES('Ou0005','Διαβατήριο με διάρκεια 3 μήνες', 'Το διαβατήριο με διάρκεια 3 μήνες χορηγείται στις περιπτώσεις μεταγωγή κρατουμένου από σωφρονιστικό κατάστημα της αλλοδαπής στην ημεδαπή και αντιστρόφως')");
        $this->addSql("INSERT INTO output (identifier, name, description) VALUES('Ou0006','Διαβατήριο με διάρκεια ίδια με αυτού που αντικαθίσταται', 'Το διαβατήριο με διάρκεια ίδια αυτού που αντικαθίσταται χορηγείται στις περιπτώσεις αντικατάστασης διαβατηρίου.')");


    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
