<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20251015142926 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE diseases (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE familiy (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE genus (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE medical_booklet (id INT AUTO_INCREMENT NOT NULL, vaccine_date DATE NOT NULL, vaccine_next_day DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE medical_booklet_diseases (medical_booklet_id INT NOT NULL, diseases_id INT NOT NULL, INDEX IDX_60657964DC06D7F (medical_booklet_id), INDEX IDX_6065796E672F970 (diseases_id), PRIMARY KEY(medical_booklet_id, diseases_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE medical_booklet_vaccines (medical_booklet_id INT NOT NULL, vaccines_id INT NOT NULL, INDEX IDX_56ABC0504DC06D7F (medical_booklet_id), INDEX IDX_56ABC050E537D05A (vaccines_id), PRIMARY KEY(medical_booklet_id, vaccines_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE menu (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(255) NOT NULL, meat_quantity INT NOT NULL, vegetables_quantity INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE orders (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE species (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) NOT NULL, adoptable VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vaccines (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE medical_booklet_diseases ADD CONSTRAINT FK_60657964DC06D7F FOREIGN KEY (medical_booklet_id) REFERENCES medical_booklet (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE medical_booklet_diseases ADD CONSTRAINT FK_6065796E672F970 FOREIGN KEY (diseases_id) REFERENCES diseases (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE medical_booklet_vaccines ADD CONSTRAINT FK_56ABC0504DC06D7F FOREIGN KEY (medical_booklet_id) REFERENCES medical_booklet (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE medical_booklet_vaccines ADD CONSTRAINT FK_56ABC050E537D05A FOREIGN KEY (vaccines_id) REFERENCES vaccines (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE medical_booklet_diseases DROP FOREIGN KEY FK_60657964DC06D7F');
        $this->addSql('ALTER TABLE medical_booklet_diseases DROP FOREIGN KEY FK_6065796E672F970');
        $this->addSql('ALTER TABLE medical_booklet_vaccines DROP FOREIGN KEY FK_56ABC0504DC06D7F');
        $this->addSql('ALTER TABLE medical_booklet_vaccines DROP FOREIGN KEY FK_56ABC050E537D05A');
        $this->addSql('DROP TABLE diseases');
        $this->addSql('DROP TABLE familiy');
        $this->addSql('DROP TABLE genus');
        $this->addSql('DROP TABLE medical_booklet');
        $this->addSql('DROP TABLE medical_booklet_diseases');
        $this->addSql('DROP TABLE medical_booklet_vaccines');
        $this->addSql('DROP TABLE menu');
        $this->addSql('DROP TABLE orders');
        $this->addSql('DROP TABLE species');
        $this->addSql('DROP TABLE vaccines');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
