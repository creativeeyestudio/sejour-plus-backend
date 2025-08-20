<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250820184853 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE tourism (id INT AUTO_INCREMENT NOT NULL, tourism_category_id INT DEFAULT NULL, tourism_name VARCHAR(255) NOT NULL, tourism_content LONGTEXT NOT NULL, tourism_reserve VARCHAR(255) DEFAULT NULL, INDEX IDX_FCFA561E4E752A47 (tourism_category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE tourism ADD CONSTRAINT FK_FCFA561E4E752A47 FOREIGN KEY (tourism_category_id) REFERENCES category (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE tourism DROP FOREIGN KEY FK_FCFA561E4E752A47');
        $this->addSql('DROP TABLE tourism');
    }
}
