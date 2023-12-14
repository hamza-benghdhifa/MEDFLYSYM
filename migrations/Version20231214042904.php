<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231214042904 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE Reservation (id INT AUTO_INCREMENT NOT NULL, DateRdv DATETIME NOT NULL, commentaire LONGTEXT DEFAULT NULL, medecinId INT NOT NULL, PatientId INT NOT NULL, INDEX IDX_C454C682457F28AE (medecinId), INDEX IDX_C454C682D71B6DB (PatientId), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE avisetcommentaires (Id_Avis INT AUTO_INCREMENT NOT NULL, Nom_Service VARCHAR(255) NOT NULL, Id_Patient INT NOT NULL, Note INT NOT NULL, Commentaire VARCHAR(255) NOT NULL, Date_Avis VARCHAR(255) NOT NULL, PRIMARY KEY(Id_Avis)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE facture (num_passport INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, destination VARCHAR(255) NOT NULL, nom_hotel VARCHAR(255) NOT NULL, nom_compagnie VARCHAR(255) NOT NULL, montant DOUBLE PRECISION NOT NULL, PRIMARY KEY(num_passport)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE gestion_categories (id INT AUTO_INCREMENT NOT NULL, NomCategorie VARCHAR(255) NOT NULL, Description VARCHAR(255) NOT NULL, Tarification INT NOT NULL, Ref_Services VARCHAR(255) NOT NULL, Disponibilite VARCHAR(255) NOT NULL, Date VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE hotels (id_hotel INT AUTO_INCREMENT NOT NULL, nb_etoile VARCHAR(255) NOT NULL, pays VARCHAR(255) NOT NULL, nb_chambre INT NOT NULL, prix_nuit DOUBLE PRECISION NOT NULL, nom_hotel VARCHAR(255) DEFAULT NULL, INDEX FK_nom_hotel (nom_hotel), PRIMARY KEY(id_hotel)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE invitations (idinvi INT AUTO_INCREMENT NOT NULL, EmailDestinataireinv VARCHAR(255) NOT NULL, Emailinv VARCHAR(255) NOT NULL, Status VARCHAR(255) NOT NULL, PRIMARY KEY(idinvi)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE medecin (Id INT AUTO_INCREMENT NOT NULL, Nom VARCHAR(255) NOT NULL, Prenom VARCHAR(255) NOT NULL, Specialite VARCHAR(255) NOT NULL, Pays VARCHAR(255) NOT NULL, DateGrad DATE NOT NULL, NumberGrad INT NOT NULL, Email VARCHAR(255) NOT NULL, MotDePasse VARCHAR(255) NOT NULL, PRIMARY KEY(Id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE medecinm (id INT AUTO_INCREMENT NOT NULL, Nom VARCHAR(255) NOT NULL, Prenom VARCHAR(255) NOT NULL, Specialite VARCHAR(255) NOT NULL, Pays VARCHAR(255) NOT NULL, DateGrad DATETIME NOT NULL, NumberGrad INT NOT NULL, Email VARCHAR(255) NOT NULL, Image VARCHAR(255) NOT NULL, MotDePasse VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messages (Id INT AUTO_INCREMENT NOT NULL, ObjetMessage VARCHAR(255) NOT NULL, ContenuMessage VARCHAR(255) NOT NULL, DateEnvoi DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, EmailDestinataire VARCHAR(255) NOT NULL, Email VARCHAR(255) NOT NULL, PRIMARY KEY(Id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E016BA31DB (delivered_at), INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE patient (Id INT AUTO_INCREMENT NOT NULL, Nom VARCHAR(255) NOT NULL, Prenom VARCHAR(255) NOT NULL, DateNai DATE NOT NULL, NumAssu INT NOT NULL, Maladie VARCHAR(255) NOT NULL, EmailP VARCHAR(255) NOT NULL, Password VARCHAR(255) NOT NULL, PRIMARY KEY(Id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE patientm (Id INT AUTO_INCREMENT NOT NULL, Nom VARCHAR(255) NOT NULL, Prenom VARCHAR(255) NOT NULL, DateNai DATE NOT NULL, NumAssu INT NOT NULL, Maladie VARCHAR(255) NOT NULL, PRIMARY KEY(Id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reclamation (id_rec INT AUTO_INCREMENT NOT NULL, id_utilisateur_id INT DEFAULT NULL, sujet VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, etat VARCHAR(255) NOT NULL, date DATE DEFAULT \'current_timestamp()\' NOT NULL, INDEX fk7 (id_utilisateur_id), PRIMARY KEY(id_rec)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reponse_reclamation (id_reponse INT AUTO_INCREMENT NOT NULL, id_reclamation INT DEFAULT NULL, sujet VARCHAR(255) NOT NULL, etat VARCHAR(255) NOT NULL, date DATE DEFAULT \'current_timestamp()\' NOT NULL, INDEX fk9 (id_reclamation), PRIMARY KEY(id_reponse)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE userhotel (numpassport INT AUTO_INCREMENT NOT NULL, user_nom VARCHAR(255) NOT NULL, user_prenom VARCHAR(255) NOT NULL, nom_hotel VARCHAR(255) DEFAULT NULL, pays VARCHAR(255) NOT NULL, chambre_reservee INT NOT NULL, facture_hotel DOUBLE PRECISION NOT NULL, UNIQUE INDEX uc_userhotel (nom_hotel), PRIMARY KEY(numpassport)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE uservol (num_passport INT AUTO_INCREMENT NOT NULL, nom_compagnie VARCHAR(255) DEFAULT NULL, usernom VARCHAR(255) NOT NULL, userprenom VARCHAR(255) NOT NULL, billet_reservee INT NOT NULL, destination VARCHAR(255) NOT NULL, date_depart VARCHAR(255) NOT NULL, facture_vol DOUBLE PRECISION NOT NULL, INDEX idx_nom_compagnie (nom_compagnie), PRIMARY KEY(num_passport)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE utilisateur (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, role VARCHAR(255) DEFAULT \'USER\', age DATE NOT NULL, username VARCHAR(255) NOT NULL, photo VARCHAR(255) NOT NULL, bloquer INT NOT NULL, code INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vols (id_vol INT AUTO_INCREMENT NOT NULL, nom_airways VARCHAR(255) DEFAULT NULL, nb_billet INT NOT NULL, prix_billet DOUBLE PRECISION NOT NULL, date_depart VARCHAR(255) NOT NULL, destination VARCHAR(255) NOT NULL, INDEX nom_airways (nom_airways), PRIMARY KEY(id_vol)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE Reservation ADD CONSTRAINT FK_C454C682457F28AE FOREIGN KEY (medecinId) REFERENCES medecinm (id)');
        $this->addSql('ALTER TABLE Reservation ADD CONSTRAINT FK_C454C682D71B6DB FOREIGN KEY (PatientId) REFERENCES medecinm (id)');
        $this->addSql('ALTER TABLE reclamation ADD CONSTRAINT FK_CE606404C6EE5C49 FOREIGN KEY (id_utilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE reponse_reclamation ADD CONSTRAINT FK_C7CB5101D672A9F3 FOREIGN KEY (id_reclamation) REFERENCES reclamation (id_rec)');
        $this->addSql('ALTER TABLE uservol ADD CONSTRAINT FK_C873814E36937829 FOREIGN KEY (nom_compagnie) REFERENCES vols (nom_airways)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE Reservation DROP FOREIGN KEY FK_C454C682457F28AE');
        $this->addSql('ALTER TABLE Reservation DROP FOREIGN KEY FK_C454C682D71B6DB');
        $this->addSql('ALTER TABLE reclamation DROP FOREIGN KEY FK_CE606404C6EE5C49');
        $this->addSql('ALTER TABLE reponse_reclamation DROP FOREIGN KEY FK_C7CB5101D672A9F3');
        $this->addSql('ALTER TABLE uservol DROP FOREIGN KEY FK_C873814E36937829');
        $this->addSql('DROP TABLE Reservation');
        $this->addSql('DROP TABLE avisetcommentaires');
        $this->addSql('DROP TABLE facture');
        $this->addSql('DROP TABLE gestion_categories');
        $this->addSql('DROP TABLE hotels');
        $this->addSql('DROP TABLE invitations');
        $this->addSql('DROP TABLE medecin');
        $this->addSql('DROP TABLE medecinm');
        $this->addSql('DROP TABLE messages');
        $this->addSql('DROP TABLE messenger_messages');
        $this->addSql('DROP TABLE patient');
        $this->addSql('DROP TABLE patientm');
        $this->addSql('DROP TABLE reclamation');
        $this->addSql('DROP TABLE reponse_reclamation');
        $this->addSql('DROP TABLE userhotel');
        $this->addSql('DROP TABLE uservol');
        $this->addSql('DROP TABLE utilisateur');
        $this->addSql('DROP TABLE vols');
    }
}
