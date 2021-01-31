<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210131201112 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bar ADD category_id INT NOT NULL, DROP category');
        $this->addSql('ALTER TABLE bar ADD CONSTRAINT FK_76FF8CAA12469DE2 FOREIGN KEY (category_id) REFERENCES poi_category (id)');
        $this->addSql('CREATE INDEX IDX_76FF8CAA12469DE2 ON bar (category_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bar DROP FOREIGN KEY FK_76FF8CAA12469DE2');
        $this->addSql('DROP INDEX IDX_76FF8CAA12469DE2 ON bar');
        $this->addSql('ALTER TABLE bar ADD category VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, DROP category_id');
    }
}
