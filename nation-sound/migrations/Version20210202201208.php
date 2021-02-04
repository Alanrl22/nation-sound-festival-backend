<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210202201208 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE poi_category (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE bar ADD category_id INT NOT NULL, ADD company VARCHAR(255) NOT NULL, DROP category, DROP companny');
        $this->addSql('ALTER TABLE bar ADD CONSTRAINT FK_76FF8CAA12469DE2 FOREIGN KEY (category_id) REFERENCES poi_category (id)');
        $this->addSql('CREATE INDEX IDX_76FF8CAA12469DE2 ON bar (category_id)');
        $this->addSql('ALTER TABLE meeting DROP name');
        $this->addSql('ALTER TABLE stage ADD category_id INT NOT NULL, ADD coordinates VARCHAR(255) NOT NULL, DROP coordinate, DROP category');
        $this->addSql('ALTER TABLE stage ADD CONSTRAINT FK_C27C936912469DE2 FOREIGN KEY (category_id) REFERENCES poi_category (id)');
        $this->addSql('CREATE INDEX IDX_C27C936912469DE2 ON stage (category_id)');
        $this->addSql('ALTER TABLE wc ADD category_id INT NOT NULL, DROP category, CHANGE number number INT DEFAULT NULL, CHANGE gender gender VARCHAR(255) DEFAULT NULL, CHANGE company company VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE wc ADD CONSTRAINT FK_F51CCD2C12469DE2 FOREIGN KEY (category_id) REFERENCES poi_category (id)');
        $this->addSql('CREATE INDEX IDX_F51CCD2C12469DE2 ON wc (category_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bar DROP FOREIGN KEY FK_76FF8CAA12469DE2');
        $this->addSql('ALTER TABLE stage DROP FOREIGN KEY FK_C27C936912469DE2');
        $this->addSql('ALTER TABLE wc DROP FOREIGN KEY FK_F51CCD2C12469DE2');
        $this->addSql('DROP TABLE poi_category');
        $this->addSql('DROP INDEX IDX_76FF8CAA12469DE2 ON bar');
        $this->addSql('ALTER TABLE bar ADD companny VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, DROP category_id, CHANGE company category VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE meeting ADD name VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('DROP INDEX IDX_C27C936912469DE2 ON stage');
        $this->addSql('ALTER TABLE stage ADD category VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, DROP category_id, CHANGE coordinates coordinate VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('DROP INDEX IDX_F51CCD2C12469DE2 ON wc');
        $this->addSql('ALTER TABLE wc ADD category VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, DROP category_id, CHANGE number number INT NOT NULL, CHANGE gender gender VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE company company VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
