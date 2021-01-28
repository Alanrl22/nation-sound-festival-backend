<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210128132427 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE stage ADD category_id INT NOT NULL, CHANGE category poi_category VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE stage ADD CONSTRAINT FK_C27C936912469DE2 FOREIGN KEY (category_id) REFERENCES poi_category (id)');
        $this->addSql('CREATE INDEX IDX_C27C936912469DE2 ON stage (category_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE stage DROP FOREIGN KEY FK_C27C936912469DE2');
        $this->addSql('DROP INDEX IDX_C27C936912469DE2 ON stage');
        $this->addSql('ALTER TABLE stage DROP category_id, CHANGE poi_category category VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
