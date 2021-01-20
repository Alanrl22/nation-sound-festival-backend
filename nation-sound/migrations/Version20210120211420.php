<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210120211420 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE music_style (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE artist ADD music_style_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE artist ADD CONSTRAINT FK_15996877DDE3C52 FOREIGN KEY (music_style_id) REFERENCES music_style (id)');
        $this->addSql('CREATE INDEX IDX_15996877DDE3C52 ON artist (music_style_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE artist DROP FOREIGN KEY FK_15996877DDE3C52');
        $this->addSql('DROP TABLE music_style');
        $this->addSql('DROP INDEX IDX_15996877DDE3C52 ON artist');
        $this->addSql('ALTER TABLE artist DROP music_style_id');
    }
}
