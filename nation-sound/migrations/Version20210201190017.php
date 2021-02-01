<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210201190017 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE artist (id INT AUTO_INCREMENT NOT NULL, meeting_id INT DEFAULT NULL, music_style_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL, big_artist TINYINT(1) NOT NULL, INDEX IDX_159968767433D9C (meeting_id), INDEX IDX_15996877DDE3C52 (music_style_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE artist_festival (artist_id INT NOT NULL, festival_id INT NOT NULL, INDEX IDX_BD761DD8B7970CF8 (artist_id), INDEX IDX_BD761DD88AEBAF57 (festival_id), PRIMARY KEY(artist_id, festival_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE bar (id INT AUTO_INCREMENT NOT NULL, festival_id INT DEFAULT NULL, category_id INT NOT NULL, title VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, coordinates VARCHAR(255) NOT NULL, company VARCHAR(255) NOT NULL, INDEX IDX_76FF8CAA8AEBAF57 (festival_id), INDEX IDX_76FF8CAA12469DE2 (category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE concert (id INT AUTO_INCREMENT NOT NULL, artist_id INT DEFAULT NULL, stage_id INT DEFAULT NULL, start_date DATE NOT NULL, end_date DATE NOT NULL, active TINYINT(1) NOT NULL, INDEX IDX_D57C02D2B7970CF8 (artist_id), INDEX IDX_D57C02D22298D193 (stage_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contact (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, picture VARCHAR(255) NOT NULL, job VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contact_festival (contact_id INT NOT NULL, festival_id INT NOT NULL, INDEX IDX_9F596B1EE7A1254A (contact_id), INDEX IDX_9F596B1E8AEBAF57 (festival_id), PRIMARY KEY(contact_id, festival_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE faq (id INT AUTO_INCREMENT NOT NULL, question VARCHAR(255) NOT NULL, answer VARCHAR(255) NOT NULL, active TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE faq_festival (faq_id INT NOT NULL, festival_id INT NOT NULL, INDEX IDX_F9DE0E9E81BEC8C2 (faq_id), INDEX IDX_F9DE0E9E8AEBAF57 (festival_id), PRIMARY KEY(faq_id, festival_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE festival (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, start_date DATE NOT NULL, coordinates VARCHAR(255) NOT NULL, address VARCHAR(255) NOT NULL, city VARCHAR(255) NOT NULL, post_code INT NOT NULL, global_informations VARCHAR(255) NOT NULL, pratical_informations VARCHAR(255) NOT NULL, contact_mail VARCHAR(255) NOT NULL, end_date DATE DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE meeting (id INT AUTO_INCREMENT NOT NULL, description VARCHAR(255) NOT NULL, coordinates VARCHAR(255) NOT NULL, hour INT NOT NULL, day DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE music_style (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE notifications (id INT AUTO_INCREMENT NOT NULL, festival_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, start_date DATE NOT NULL, end_date DATE NOT NULL, INDEX IDX_6000B0D38AEBAF57 (festival_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE partners (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, logo VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE partners_festival (partners_id INT NOT NULL, festival_id INT NOT NULL, INDEX IDX_550ACAA3BDE7F1C6 (partners_id), INDEX IDX_550ACAA38AEBAF57 (festival_id), PRIMARY KEY(partners_id, festival_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE poi_category (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE restauration (id INT AUTO_INCREMENT NOT NULL, festival_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, category VARCHAR(255) NOT NULL, coordinates VARCHAR(255) NOT NULL, company VARCHAR(255) NOT NULL, INDEX IDX_898B1EF18AEBAF57 (festival_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stage (id INT AUTO_INCREMENT NOT NULL, festival_id INT DEFAULT NULL, category_id INT NOT NULL, title VARCHAR(255) NOT NULL, coordinates VARCHAR(255) NOT NULL, INDEX IDX_C27C93698AEBAF57 (festival_id), INDEX IDX_C27C936912469DE2 (category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE wc (id INT AUTO_INCREMENT NOT NULL, festival_id INT DEFAULT NULL, category_id INT NOT NULL, title VARCHAR(255) NOT NULL, number INT DEFAULT NULL, coordinates VARCHAR(255) NOT NULL, gender VARCHAR(255) DEFAULT NULL, company VARCHAR(255) DEFAULT NULL, INDEX IDX_F51CCD2C8AEBAF57 (festival_id), INDEX IDX_F51CCD2C12469DE2 (category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE artist ADD CONSTRAINT FK_159968767433D9C FOREIGN KEY (meeting_id) REFERENCES meeting (id)');
        $this->addSql('ALTER TABLE artist ADD CONSTRAINT FK_15996877DDE3C52 FOREIGN KEY (music_style_id) REFERENCES music_style (id)');
        $this->addSql('ALTER TABLE artist_festival ADD CONSTRAINT FK_BD761DD8B7970CF8 FOREIGN KEY (artist_id) REFERENCES artist (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE artist_festival ADD CONSTRAINT FK_BD761DD88AEBAF57 FOREIGN KEY (festival_id) REFERENCES festival (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE bar ADD CONSTRAINT FK_76FF8CAA8AEBAF57 FOREIGN KEY (festival_id) REFERENCES festival (id)');
        $this->addSql('ALTER TABLE bar ADD CONSTRAINT FK_76FF8CAA12469DE2 FOREIGN KEY (category_id) REFERENCES poi_category (id)');
        $this->addSql('ALTER TABLE concert ADD CONSTRAINT FK_D57C02D2B7970CF8 FOREIGN KEY (artist_id) REFERENCES artist (id)');
        $this->addSql('ALTER TABLE concert ADD CONSTRAINT FK_D57C02D22298D193 FOREIGN KEY (stage_id) REFERENCES stage (id)');
        $this->addSql('ALTER TABLE contact_festival ADD CONSTRAINT FK_9F596B1EE7A1254A FOREIGN KEY (contact_id) REFERENCES contact (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE contact_festival ADD CONSTRAINT FK_9F596B1E8AEBAF57 FOREIGN KEY (festival_id) REFERENCES festival (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE faq_festival ADD CONSTRAINT FK_F9DE0E9E81BEC8C2 FOREIGN KEY (faq_id) REFERENCES faq (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE faq_festival ADD CONSTRAINT FK_F9DE0E9E8AEBAF57 FOREIGN KEY (festival_id) REFERENCES festival (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE notifications ADD CONSTRAINT FK_6000B0D38AEBAF57 FOREIGN KEY (festival_id) REFERENCES festival (id)');
        $this->addSql('ALTER TABLE partners_festival ADD CONSTRAINT FK_550ACAA3BDE7F1C6 FOREIGN KEY (partners_id) REFERENCES partners (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE partners_festival ADD CONSTRAINT FK_550ACAA38AEBAF57 FOREIGN KEY (festival_id) REFERENCES festival (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE restauration ADD CONSTRAINT FK_898B1EF18AEBAF57 FOREIGN KEY (festival_id) REFERENCES festival (id)');
        $this->addSql('ALTER TABLE stage ADD CONSTRAINT FK_C27C93698AEBAF57 FOREIGN KEY (festival_id) REFERENCES festival (id)');
        $this->addSql('ALTER TABLE stage ADD CONSTRAINT FK_C27C936912469DE2 FOREIGN KEY (category_id) REFERENCES poi_category (id)');
        $this->addSql('ALTER TABLE wc ADD CONSTRAINT FK_F51CCD2C8AEBAF57 FOREIGN KEY (festival_id) REFERENCES festival (id)');
        $this->addSql('ALTER TABLE wc ADD CONSTRAINT FK_F51CCD2C12469DE2 FOREIGN KEY (category_id) REFERENCES poi_category (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE artist_festival DROP FOREIGN KEY FK_BD761DD8B7970CF8');
        $this->addSql('ALTER TABLE concert DROP FOREIGN KEY FK_D57C02D2B7970CF8');
        $this->addSql('ALTER TABLE contact_festival DROP FOREIGN KEY FK_9F596B1EE7A1254A');
        $this->addSql('ALTER TABLE faq_festival DROP FOREIGN KEY FK_F9DE0E9E81BEC8C2');
        $this->addSql('ALTER TABLE artist_festival DROP FOREIGN KEY FK_BD761DD88AEBAF57');
        $this->addSql('ALTER TABLE bar DROP FOREIGN KEY FK_76FF8CAA8AEBAF57');
        $this->addSql('ALTER TABLE contact_festival DROP FOREIGN KEY FK_9F596B1E8AEBAF57');
        $this->addSql('ALTER TABLE faq_festival DROP FOREIGN KEY FK_F9DE0E9E8AEBAF57');
        $this->addSql('ALTER TABLE notifications DROP FOREIGN KEY FK_6000B0D38AEBAF57');
        $this->addSql('ALTER TABLE partners_festival DROP FOREIGN KEY FK_550ACAA38AEBAF57');
        $this->addSql('ALTER TABLE restauration DROP FOREIGN KEY FK_898B1EF18AEBAF57');
        $this->addSql('ALTER TABLE stage DROP FOREIGN KEY FK_C27C93698AEBAF57');
        $this->addSql('ALTER TABLE wc DROP FOREIGN KEY FK_F51CCD2C8AEBAF57');
        $this->addSql('ALTER TABLE artist DROP FOREIGN KEY FK_159968767433D9C');
        $this->addSql('ALTER TABLE artist DROP FOREIGN KEY FK_15996877DDE3C52');
        $this->addSql('ALTER TABLE partners_festival DROP FOREIGN KEY FK_550ACAA3BDE7F1C6');
        $this->addSql('ALTER TABLE bar DROP FOREIGN KEY FK_76FF8CAA12469DE2');
        $this->addSql('ALTER TABLE stage DROP FOREIGN KEY FK_C27C936912469DE2');
        $this->addSql('ALTER TABLE wc DROP FOREIGN KEY FK_F51CCD2C12469DE2');
        $this->addSql('ALTER TABLE concert DROP FOREIGN KEY FK_D57C02D22298D193');
        $this->addSql('DROP TABLE artist');
        $this->addSql('DROP TABLE artist_festival');
        $this->addSql('DROP TABLE bar');
        $this->addSql('DROP TABLE concert');
        $this->addSql('DROP TABLE contact');
        $this->addSql('DROP TABLE contact_festival');
        $this->addSql('DROP TABLE faq');
        $this->addSql('DROP TABLE faq_festival');
        $this->addSql('DROP TABLE festival');
        $this->addSql('DROP TABLE meeting');
        $this->addSql('DROP TABLE music_style');
        $this->addSql('DROP TABLE notifications');
        $this->addSql('DROP TABLE partners');
        $this->addSql('DROP TABLE partners_festival');
        $this->addSql('DROP TABLE poi_category');
        $this->addSql('DROP TABLE restauration');
        $this->addSql('DROP TABLE stage');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE wc');
    }
}
