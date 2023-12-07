<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231207021424 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reclamation CHANGE id_utilisateur_id id_utilisateur_id INT DEFAULT NULL, CHANGE date date DATE DEFAULT \'current_timestamp()\' NOT NULL');
        $this->addSql('ALTER TABLE reponse_reclamation CHANGE id_reclamation id_reclamation INT DEFAULT NULL');
        $this->addSql('ALTER TABLE uservol DROP FOREIGN KEY uservol_ibfk_1');
        $this->addSql('ALTER TABLE uservol CHANGE num_passport num_passport INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE uservol ADD CONSTRAINT FK_C873814E36937829 FOREIGN KEY (nom_compagnie) REFERENCES vols (nom_airways)');
        $this->addSql('ALTER TABLE utilisateur CHANGE bloquer bloquer INT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reclamation CHANGE id_utilisateur_id id_utilisateur_id INT NOT NULL, CHANGE date date DATE DEFAULT \'CURRENT_TIMESTAMP\' NOT NULL');
        $this->addSql('ALTER TABLE reponse_reclamation CHANGE id_reclamation id_reclamation INT NOT NULL');
        $this->addSql('ALTER TABLE uservol DROP FOREIGN KEY FK_C873814E36937829');
        $this->addSql('ALTER TABLE uservol CHANGE num_passport num_passport INT NOT NULL');
        $this->addSql('ALTER TABLE uservol ADD CONSTRAINT uservol_ibfk_1 FOREIGN KEY (nom_compagnie) REFERENCES vols (nom_airways) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE utilisateur CHANGE bloquer bloquer INT DEFAULT 0 NOT NULL');
    }
}
