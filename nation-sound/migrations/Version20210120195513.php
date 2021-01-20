<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210120195513 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE artist_festival (artist_id INT NOT NULL, festival_id INT NOT NULL, INDEX IDX_BD761DD8B7970CF8 (artist_id), INDEX IDX_BD761DD88AEBAF57 (festival_id), PRIMARY KEY(artist_id, festival_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contact_festival (contact_id INT NOT NULL, festival_id INT NOT NULL, INDEX IDX_9F596B1EE7A1254A (contact_id), INDEX IDX_9F596B1E8AEBAF57 (festival_id), PRIMARY KEY(contact_id, festival_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE faq_festival (faq_id INT NOT NULL, festival_id INT NOT NULL, INDEX IDX_F9DE0E9E81BEC8C2 (faq_id), INDEX IDX_F9DE0E9E8AEBAF57 (festival_id), PRIMARY KEY(faq_id, festival_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE partners_festival (partners_id INT NOT NULL, festival_id INT NOT NULL, INDEX IDX_550ACAA3BDE7F1C6 (partners_id), INDEX IDX_550ACAA38AEBAF57 (festival_id), PRIMARY KEY(partners_id, festival_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE artist_festival ADD CONSTRAINT FK_BD761DD8B7970CF8 FOREIGN KEY (artist_id) REFERENCES artist (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE artist_festival ADD CONSTRAINT FK_BD761DD88AEBAF57 FOREIGN KEY (festival_id) REFERENCES festival (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE contact_festival ADD CONSTRAINT FK_9F596B1EE7A1254A FOREIGN KEY (contact_id) REFERENCES contact (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE contact_festival ADD CONSTRAINT FK_9F596B1E8AEBAF57 FOREIGN KEY (festival_id) REFERENCES festival (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE faq_festival ADD CONSTRAINT FK_F9DE0E9E81BEC8C2 FOREIGN KEY (faq_id) REFERENCES faq (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE faq_festival ADD CONSTRAINT FK_F9DE0E9E8AEBAF57 FOREIGN KEY (festival_id) REFERENCES festival (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE partners_festival ADD CONSTRAINT FK_550ACAA3BDE7F1C6 FOREIGN KEY (partners_id) REFERENCES partners (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE partners_festival ADD CONSTRAINT FK_550ACAA38AEBAF57 FOREIGN KEY (festival_id) REFERENCES festival (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE artist ADD meeting_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE artist ADD CONSTRAINT FK_159968767433D9C FOREIGN KEY (meeting_id) REFERENCES meeting (id)');
        $this->addSql('CREATE INDEX IDX_159968767433D9C ON artist (meeting_id)');
        $this->addSql('ALTER TABLE bar ADD festival_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE bar ADD CONSTRAINT FK_76FF8CAA8AEBAF57 FOREIGN KEY (festival_id) REFERENCES festival (id)');
        $this->addSql('CREATE INDEX IDX_76FF8CAA8AEBAF57 ON bar (festival_id)');
        $this->addSql('ALTER TABLE concert ADD artist_id INT DEFAULT NULL, ADD stage_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE concert ADD CONSTRAINT FK_D57C02D2B7970CF8 FOREIGN KEY (artist_id) REFERENCES artist (id)');
        $this->addSql('ALTER TABLE concert ADD CONSTRAINT FK_D57C02D22298D193 FOREIGN KEY (stage_id) REFERENCES stage (id)');
        $this->addSql('CREATE INDEX IDX_D57C02D2B7970CF8 ON concert (artist_id)');
        $this->addSql('CREATE INDEX IDX_D57C02D22298D193 ON concert (stage_id)');
        $this->addSql('ALTER TABLE notifications ADD festival_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE notifications ADD CONSTRAINT FK_6000B0D38AEBAF57 FOREIGN KEY (festival_id) REFERENCES festival (id)');
        $this->addSql('CREATE INDEX IDX_6000B0D38AEBAF57 ON notifications (festival_id)');
        $this->addSql('ALTER TABLE restauration ADD festival_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE restauration ADD CONSTRAINT FK_898B1EF18AEBAF57 FOREIGN KEY (festival_id) REFERENCES festival (id)');
        $this->addSql('CREATE INDEX IDX_898B1EF18AEBAF57 ON restauration (festival_id)');
        $this->addSql('ALTER TABLE stage ADD festival_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE stage ADD CONSTRAINT FK_C27C93698AEBAF57 FOREIGN KEY (festival_id) REFERENCES festival (id)');
        $this->addSql('CREATE INDEX IDX_C27C93698AEBAF57 ON stage (festival_id)');
        $this->addSql('ALTER TABLE wc ADD festival_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE wc ADD CONSTRAINT FK_F51CCD2C8AEBAF57 FOREIGN KEY (festival_id) REFERENCES festival (id)');
        $this->addSql('CREATE INDEX IDX_F51CCD2C8AEBAF57 ON wc (festival_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE artist_festival');
        $this->addSql('DROP TABLE contact_festival');
        $this->addSql('DROP TABLE faq_festival');
        $this->addSql('DROP TABLE partners_festival');
        $this->addSql('ALTER TABLE artist DROP FOREIGN KEY FK_159968767433D9C');
        $this->addSql('DROP INDEX IDX_159968767433D9C ON artist');
        $this->addSql('ALTER TABLE artist DROP meeting_id');
        $this->addSql('ALTER TABLE bar DROP FOREIGN KEY FK_76FF8CAA8AEBAF57');
        $this->addSql('DROP INDEX IDX_76FF8CAA8AEBAF57 ON bar');
        $this->addSql('ALTER TABLE bar DROP festival_id');
        $this->addSql('ALTER TABLE concert DROP FOREIGN KEY FK_D57C02D2B7970CF8');
        $this->addSql('ALTER TABLE concert DROP FOREIGN KEY FK_D57C02D22298D193');
        $this->addSql('DROP INDEX IDX_D57C02D2B7970CF8 ON concert');
        $this->addSql('DROP INDEX IDX_D57C02D22298D193 ON concert');
        $this->addSql('ALTER TABLE concert DROP artist_id, DROP stage_id');
        $this->addSql('ALTER TABLE notifications DROP FOREIGN KEY FK_6000B0D38AEBAF57');
        $this->addSql('DROP INDEX IDX_6000B0D38AEBAF57 ON notifications');
        $this->addSql('ALTER TABLE notifications DROP festival_id');
        $this->addSql('ALTER TABLE restauration DROP FOREIGN KEY FK_898B1EF18AEBAF57');
        $this->addSql('DROP INDEX IDX_898B1EF18AEBAF57 ON restauration');
        $this->addSql('ALTER TABLE restauration DROP festival_id');
        $this->addSql('ALTER TABLE stage DROP FOREIGN KEY FK_C27C93698AEBAF57');
        $this->addSql('DROP INDEX IDX_C27C93698AEBAF57 ON stage');
        $this->addSql('ALTER TABLE stage DROP festival_id');
        $this->addSql('ALTER TABLE wc DROP FOREIGN KEY FK_F51CCD2C8AEBAF57');
        $this->addSql('DROP INDEX IDX_F51CCD2C8AEBAF57 ON wc');
        $this->addSql('ALTER TABLE wc DROP festival_id');
    }
}
