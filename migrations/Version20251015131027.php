<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20251015131027 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE medical_booklet_vaccines (medical_booklet_id INT NOT NULL, vaccines_id INT NOT NULL, INDEX IDX_56ABC0504DC06D7F (medical_booklet_id), INDEX IDX_56ABC050E537D05A (vaccines_id), PRIMARY KEY(medical_booklet_id, vaccines_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE medical_booklet_vaccines ADD CONSTRAINT FK_56ABC0504DC06D7F FOREIGN KEY (medical_booklet_id) REFERENCES medical_booklet (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE medical_booklet_vaccines ADD CONSTRAINT FK_56ABC050E537D05A FOREIGN KEY (vaccines_id) REFERENCES vaccines (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE medical_booklet_vaccines DROP FOREIGN KEY FK_56ABC0504DC06D7F');
        $this->addSql('ALTER TABLE medical_booklet_vaccines DROP FOREIGN KEY FK_56ABC050E537D05A');
        $this->addSql('DROP TABLE medical_booklet_vaccines');
    }
}
