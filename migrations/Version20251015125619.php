<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20251015125619 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE medical_booklet (id INT AUTO_INCREMENT NOT NULL, vaccine_date DATE NOT NULL, vaccine_next_day DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE medical_booklet_diseases (medical_booklet_id INT NOT NULL, diseases_id INT NOT NULL, INDEX IDX_60657964DC06D7F (medical_booklet_id), INDEX IDX_6065796E672F970 (diseases_id), PRIMARY KEY(medical_booklet_id, diseases_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE medical_booklet_diseases ADD CONSTRAINT FK_60657964DC06D7F FOREIGN KEY (medical_booklet_id) REFERENCES medical_booklet (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE medical_booklet_diseases ADD CONSTRAINT FK_6065796E672F970 FOREIGN KEY (diseases_id) REFERENCES diseases (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE medical_booklet_diseases DROP FOREIGN KEY FK_60657964DC06D7F');
        $this->addSql('ALTER TABLE medical_booklet_diseases DROP FOREIGN KEY FK_6065796E672F970');
        $this->addSql('DROP TABLE medical_booklet');
        $this->addSql('DROP TABLE medical_booklet_diseases');
    }
}
