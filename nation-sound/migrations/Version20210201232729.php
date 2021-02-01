<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210201232729 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE artist CHANGE image image VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE concert ADD day VARCHAR(255) DEFAULT NULL, ADD hour INT DEFAULT NULL, DROP start_date, DROP end_date');
        $this->addSql('ALTER TABLE meeting CHANGE hour hour INT DEFAULT NULL, CHANGE day day VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE artist CHANGE image image VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE concert ADD start_date DATE NOT NULL, ADD end_date DATE NOT NULL, DROP day, DROP hour');
        $this->addSql('ALTER TABLE meeting CHANGE hour hour INT NOT NULL, CHANGE day day DATE NOT NULL');
    }
}
