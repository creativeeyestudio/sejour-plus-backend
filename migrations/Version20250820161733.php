<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250820161733 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE hotel_data (id INT AUTO_INCREMENT NOT NULL, hotel_name VARCHAR(255) NOT NULL, hotel_phone BIGINT NOT NULL, hotel_email VARCHAR(255) NOT NULL, hotel_map VARCHAR(255) NOT NULL, hotel_website VARCHAR(255) DEFAULT NULL, hotel_check_in TIME NOT NULL, hotel_check_out TIME NOT NULL, hotel_wifi_name VARCHAR(255) DEFAULT NULL, hotel_wifi_password VARCHAR(255) DEFAULT NULL, hotel_parking VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE hotel_data');
    }
}
