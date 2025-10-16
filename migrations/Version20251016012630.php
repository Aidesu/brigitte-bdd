<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20251016012630 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cage DROP FOREIGN KEY FK_56A64E51715BD423');
        $this->addSql('DROP INDEX IDX_56A64E51715BD423 ON cage');
        $this->addSql('ALTER TABLE cage CHANGE aisles_id aisle_id INT NOT NULL');
        $this->addSql('ALTER TABLE cage ADD CONSTRAINT FK_56A64E5123C1884A FOREIGN KEY (aisle_id) REFERENCES aisle (id)');
        $this->addSql('CREATE INDEX IDX_56A64E5123C1884A ON cage (aisle_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cage DROP FOREIGN KEY FK_56A64E5123C1884A');
        $this->addSql('DROP INDEX IDX_56A64E5123C1884A ON cage');
        $this->addSql('ALTER TABLE cage CHANGE aisle_id aisles_id INT NOT NULL');
        $this->addSql('ALTER TABLE cage ADD CONSTRAINT FK_56A64E51715BD423 FOREIGN KEY (aisles_id) REFERENCES aisle (id)');
        $this->addSql('CREATE INDEX IDX_56A64E51715BD423 ON cage (aisles_id)');
    }
}
