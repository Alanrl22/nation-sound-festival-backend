<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210122130327 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE artist_festival (artist_id INT NOT NULL, festival_id INT NOT NULL, INDEX IDX_BD761DD8B7970CF8 (artist_id), INDEX IDX_BD761DD88AEBAF57 (festival_id), PRIMARY KEY(artist_id, festival_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE bar (id INT AUTO_INCREMENT NOT NULL, festival_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, category VARCHAR(255) NOT NULL, coordinates VARCHAR(255) NOT NULL, companny VARCHAR(255) NOT NULL, INDEX IDX_76FF8CAA8AEBAF57 (festival_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contact_festival (contact_id INT NOT NULL, festival_id INT NOT NULL, INDEX IDX_9F596B1EE7A1254A (contact_id), INDEX IDX_9F596B1E8AEBAF57 (festival_id), PRIMARY KEY(contact_id, festival_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE faq_festival (faq_id INT NOT NULL, festival_id INT NOT NULL, INDEX IDX_F9DE0E9E81BEC8C2 (faq_id), INDEX IDX_F9DE0E9E8AEBAF57 (festival_id), PRIMARY KEY(faq_id, festival_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE notifications (id INT AUTO_INCREMENT NOT NULL, festival_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, start_date DATE NOT NULL, end_date DATE NOT NULL, INDEX IDX_6000B0D38AEBAF57 (festival_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE partners_festival (partners_id INT NOT NULL, festival_id INT NOT NULL, INDEX IDX_550ACAA3BDE7F1C6 (partners_id), INDEX IDX_550ACAA38AEBAF57 (festival_id), PRIMARY KEY(partners_id, festival_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE restauration (id INT AUTO_INCREMENT NOT NULL, festival_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, category VARCHAR(255) NOT NULL, coordinates VARCHAR(255) NOT NULL, company VARCHAR(255) NOT NULL, INDEX IDX_898B1EF18AEBAF57 (festival_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE wc (id INT AUTO_INCREMENT NOT NULL, festival_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, number INT NOT NULL, coordinates VARCHAR(255) NOT NULL, gender VARCHAR(255) NOT NULL, company VARCHAR(255) NOT NULL, category VARCHAR(255) NOT NULL, INDEX IDX_F51CCD2C8AEBAF57 (festival_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE artist_festival ADD CONSTRAINT FK_BD761DD8B7970CF8 FOREIGN KEY (artist_id) REFERENCES artist (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE artist_festival ADD CONSTRAINT FK_BD761DD88AEBAF57 FOREIGN KEY (festival_id) REFERENCES festival (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE bar ADD CONSTRAINT FK_76FF8CAA8AEBAF57 FOREIGN KEY (festival_id) REFERENCES festival (id)');
        $this->addSql('ALTER TABLE contact_festival ADD CONSTRAINT FK_9F596B1EE7A1254A FOREIGN KEY (contact_id) REFERENCES contact (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE contact_festival ADD CONSTRAINT FK_9F596B1E8AEBAF57 FOREIGN KEY (festival_id) REFERENCES festival (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE faq_festival ADD CONSTRAINT FK_F9DE0E9E81BEC8C2 FOREIGN KEY (faq_id) REFERENCES faq (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE faq_festival ADD CONSTRAINT FK_F9DE0E9E8AEBAF57 FOREIGN KEY (festival_id) REFERENCES festival (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE notifications ADD CONSTRAINT FK_6000B0D38AEBAF57 FOREIGN KEY (festival_id) REFERENCES festival (id)');
        $this->addSql('ALTER TABLE partners_festival ADD CONSTRAINT FK_550ACAA3BDE7F1C6 FOREIGN KEY (partners_id) REFERENCES partners (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE partners_festival ADD CONSTRAINT FK_550ACAA38AEBAF57 FOREIGN KEY (festival_id) REFERENCES festival (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE restauration ADD CONSTRAINT FK_898B1EF18AEBAF57 FOREIGN KEY (festival_id) REFERENCES festival (id)');
        $this->addSql('ALTER TABLE wc ADD CONSTRAINT FK_F51CCD2C8AEBAF57 FOREIGN KEY (festival_id) REFERENCES festival (id)');
        $this->addSql('ALTER TABLE concert ADD artist_id INT DEFAULT NULL, ADD stage_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE concert ADD CONSTRAINT FK_D57C02D2B7970CF8 FOREIGN KEY (artist_id) REFERENCES artist (id)');
        $this->addSql('ALTER TABLE concert ADD CONSTRAINT FK_D57C02D22298D193 FOREIGN KEY (stage_id) REFERENCES stage (id)');
        $this->addSql('CREATE INDEX IDX_D57C02D2B7970CF8 ON concert (artist_id)');
        $this->addSql('CREATE INDEX IDX_D57C02D22298D193 ON concert (stage_id)');
        $this->addSql('ALTER TABLE stage ADD festival_id INT DEFAULT NULL, ADD category VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE stage ADD CONSTRAINT FK_C27C93698AEBAF57 FOREIGN KEY (festival_id) REFERENCES festival (id)');
        $this->addSql('CREATE INDEX IDX_C27C93698AEBAF57 ON stage (festival_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE artist_festival');
        $this->addSql('DROP TABLE bar');
        $this->addSql('DROP TABLE contact_festival');
        $this->addSql('DROP TABLE faq_festival');
        $this->addSql('DROP TABLE notifications');
        $this->addSql('DROP TABLE partners_festival');
        $this->addSql('DROP TABLE restauration');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE wc');
        $this->addSql('ALTER TABLE concert DROP FOREIGN KEY FK_D57C02D2B7970CF8');
        $this->addSql('ALTER TABLE concert DROP FOREIGN KEY FK_D57C02D22298D193');
        $this->addSql('DROP INDEX IDX_D57C02D2B7970CF8 ON concert');
        $this->addSql('DROP INDEX IDX_D57C02D22298D193 ON concert');
        $this->addSql('ALTER TABLE concert DROP artist_id, DROP stage_id');
        $this->addSql('ALTER TABLE stage DROP FOREIGN KEY FK_C27C93698AEBAF57');
        $this->addSql('DROP INDEX IDX_C27C93698AEBAF57 ON stage');
        $this->addSql('ALTER TABLE stage DROP festival_id, DROP category');
    }
}