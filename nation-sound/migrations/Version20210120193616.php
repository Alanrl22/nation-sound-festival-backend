<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210120193616 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE musical_style (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE artist ADD meeting_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE artist ADD CONSTRAINT FK_159968767433D9C FOREIGN KEY (meeting_id) REFERENCES meeting (id)');
        $this->addSql('CREATE INDEX IDX_159968767433D9C ON artist (meeting_id)');
        $this->addSql('ALTER TABLE concert ADD artist_id INT DEFAULT NULL, ADD stage_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE concert ADD CONSTRAINT FK_D57C02D2B7970CF8 FOREIGN KEY (artist_id) REFERENCES artist (id)');
        $this->addSql('ALTER TABLE concert ADD CONSTRAINT FK_D57C02D22298D193 FOREIGN KEY (stage_id) REFERENCES stage (id)');
        $this->addSql('CREATE INDEX IDX_D57C02D2B7970CF8 ON concert (artist_id)');
        $this->addSql('CREATE INDEX IDX_D57C02D22298D193 ON concert (stage_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE musical_style');
        $this->addSql('ALTER TABLE artist DROP FOREIGN KEY FK_159968767433D9C');
        $this->addSql('DROP INDEX IDX_159968767433D9C ON artist');
        $this->addSql('ALTER TABLE artist DROP meeting_id');
        $this->addSql('ALTER TABLE concert DROP FOREIGN KEY FK_D57C02D2B7970CF8');
        $this->addSql('ALTER TABLE concert DROP FOREIGN KEY FK_D57C02D22298D193');
        $this->addSql('DROP INDEX IDX_D57C02D2B7970CF8 ON concert');
        $this->addSql('DROP INDEX IDX_D57C02D22298D193 ON concert');
        $this->addSql('ALTER TABLE concert DROP artist_id, DROP stage_id');
    }
}
