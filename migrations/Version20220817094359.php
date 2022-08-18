<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220817094359 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE convention (id INT AUTO_INCREMENT NOT NULL, id_province_id INT NOT NULL, num_convention VARCHAR(255) NOT NULL, sujet_convention VARCHAR(255) NOT NULL, date_convention DATE NOT NULL, montant_global DOUBLE PRECISION NOT NULL, situation_convention VARCHAR(255) NOT NULL, date_signature DATE NOT NULL, montant_emis DOUBLE PRECISION NOT NULL, montant_restant DOUBLE PRECISION NOT NULL, date_visa DATE NOT NULL, image_convention VARCHAR(255) NOT NULL, etat_avancement VARCHAR(255) NOT NULL, pourcentage DOUBLE PRECISION NOT NULL, date_approbation DATE NOT NULL, contribution_region DOUBLE PRECISION NOT NULL, saison VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8556657EF154DCBD (id_province_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE convention_secteur (convention_id INT NOT NULL, secteur_id INT NOT NULL, INDEX IDX_3788F08AA2ACEBCC (convention_id), INDEX IDX_3788F08A9F7E4405 (secteur_id), PRIMARY KEY(convention_id, secteur_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE observation (id INT AUTO_INCREMENT NOT NULL, convention_id INT NOT NULL, libelle VARCHAR(255) NOT NULL, date_observation DATE NOT NULL, INDEX IDX_C576DBE0A2ACEBCC (convention_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE partenaire (id INT AUTO_INCREMENT NOT NULL, convention_id INT NOT NULL, libellep VARCHAR(255) NOT NULL, contributionp DOUBLE PRECISION NOT NULL, INDEX IDX_32FFA373A2ACEBCC (convention_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE province (id INT AUTO_INCREMENT NOT NULL, libellep VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE secteur (id INT AUTO_INCREMENT NOT NULL, libelles VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE convention ADD CONSTRAINT FK_8556657EF154DCBD FOREIGN KEY (id_province_id) REFERENCES province (id)');
        $this->addSql('ALTER TABLE convention_secteur ADD CONSTRAINT FK_3788F08AA2ACEBCC FOREIGN KEY (convention_id) REFERENCES convention (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE convention_secteur ADD CONSTRAINT FK_3788F08A9F7E4405 FOREIGN KEY (secteur_id) REFERENCES secteur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE observation ADD CONSTRAINT FK_C576DBE0A2ACEBCC FOREIGN KEY (convention_id) REFERENCES convention (id)');
        $this->addSql('ALTER TABLE partenaire ADD CONSTRAINT FK_32FFA373A2ACEBCC FOREIGN KEY (convention_id) REFERENCES convention (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE convention DROP FOREIGN KEY FK_8556657EF154DCBD');
        $this->addSql('ALTER TABLE convention_secteur DROP FOREIGN KEY FK_3788F08AA2ACEBCC');
        $this->addSql('ALTER TABLE convention_secteur DROP FOREIGN KEY FK_3788F08A9F7E4405');
        $this->addSql('ALTER TABLE observation DROP FOREIGN KEY FK_C576DBE0A2ACEBCC');
        $this->addSql('ALTER TABLE partenaire DROP FOREIGN KEY FK_32FFA373A2ACEBCC');
        $this->addSql('DROP TABLE convention');
        $this->addSql('DROP TABLE convention_secteur');
        $this->addSql('DROP TABLE observation');
        $this->addSql('DROP TABLE partenaire');
        $this->addSql('DROP TABLE province');
        $this->addSql('DROP TABLE secteur');
    }
}
