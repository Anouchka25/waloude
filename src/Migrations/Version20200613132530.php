<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200613132530 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE beneficiaire (id INT AUTO_INCREMENT NOT NULL, souscripteur_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, date_naissance DATE DEFAULT NULL, pays_naissance VARCHAR(255) DEFAULT NULL, telephone VARCHAR(255) NOT NULL, tel_domicile VARCHAR(255) DEFAULT NULL, email VARCHAR(255) NOT NULL, INDEX IDX_B140D802A0B466D6 (souscripteur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE class_souscripteur (id INT AUTO_INCREMENT NOT NULL, nombre_beneficiaire VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE conjoint (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) DEFAULT NULL, prenom VARCHAR(255) DEFAULT NULL, date_naissance DATE DEFAULT NULL, pays_naissance VARCHAR(255) DEFAULT NULL, telephone VARCHAR(255) DEFAULT NULL, tel_domicile VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contact (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, message LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE enfant (id INT AUTO_INCREMENT NOT NULL, souscripteur_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, date_naissance DATE DEFAULT NULL, INDEX IDX_34B70CA2A0B466D6 (souscripteur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE faq (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pages (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE souscripteur (id INT AUTO_INCREMENT NOT NULL, conjoint_id INT DEFAULT NULL, civilite VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, nom_jeune_fille VARCHAR(255) NOT NULL, date_naissance DATE NOT NULL, pays_naissance VARCHAR(255) NOT NULL, pays_residence VARCHAR(255) NOT NULL, ville_residence VARCHAR(255) NOT NULL, profession VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, code_postal VARCHAR(255) NOT NULL, ville VARCHAR(255) NOT NULL, telephone VARCHAR(255) NOT NULL, tel_domicile VARCHAR(255) DEFAULT NULL, situation_familiale VARCHAR(255) NOT NULL, nombre_enfants INT NOT NULL, cart_recto1 VARCHAR(255) NOT NULL, cart_verso1 VARCHAR(255) NOT NULL, cart_recto2 VARCHAR(255) DEFAULT NULL, cart_verso2 VARCHAR(255) DEFAULT NULL, compo_menage VARCHAR(255) NOT NULL, autre_doc VARCHAR(255) DEFAULT NULL, reference VARCHAR(255) NOT NULL, nombre_beneficiaires VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_87DB3DFD5E8D7836 (conjoint_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE team (id INT AUTO_INCREMENT NOT NULL, pays VARCHAR(255) NOT NULL, region VARCHAR(255) NOT NULL, ville VARCHAR(255) NOT NULL, code_postal VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, telephone VARCHAR(255) NOT NULL, photo VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, roles JSON NOT NULL, reset_token VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE beneficiaire ADD CONSTRAINT FK_B140D802A0B466D6 FOREIGN KEY (souscripteur_id) REFERENCES souscripteur (id)');
        $this->addSql('ALTER TABLE enfant ADD CONSTRAINT FK_34B70CA2A0B466D6 FOREIGN KEY (souscripteur_id) REFERENCES souscripteur (id)');
        $this->addSql('ALTER TABLE souscripteur ADD CONSTRAINT FK_87DB3DFD5E8D7836 FOREIGN KEY (conjoint_id) REFERENCES conjoint (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE souscripteur DROP FOREIGN KEY FK_87DB3DFD5E8D7836');
        $this->addSql('ALTER TABLE beneficiaire DROP FOREIGN KEY FK_B140D802A0B466D6');
        $this->addSql('ALTER TABLE enfant DROP FOREIGN KEY FK_34B70CA2A0B466D6');
        $this->addSql('DROP TABLE beneficiaire');
        $this->addSql('DROP TABLE class_souscripteur');
        $this->addSql('DROP TABLE conjoint');
        $this->addSql('DROP TABLE contact');
        $this->addSql('DROP TABLE enfant');
        $this->addSql('DROP TABLE faq');
        $this->addSql('DROP TABLE pages');
        $this->addSql('DROP TABLE souscripteur');
        $this->addSql('DROP TABLE team');
        $this->addSql('DROP TABLE user');
    }
}
