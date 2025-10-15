<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20251015122056 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE menu (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(255) NOT NULL, meat_quantity INT NOT NULL, vegetables_quantity INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE researcher_star DROP FOREIGN KEY FK_E068A642C3B70D7');
        $this->addSql('ALTER TABLE researcher_star DROP FOREIGN KEY FK_E068A64C7533BDE');
        $this->addSql('ALTER TABLE telescope_star DROP FOREIGN KEY FK_AAA9951A2C3B70D7');
        $this->addSql('ALTER TABLE telescope_star DROP FOREIGN KEY FK_AAA9951AAD3CE0D3');
        $this->addSql('ALTER TABLE star DROP FOREIGN KEY FK_C9DB5A14AD3CE0D3');
        $this->addSql('ALTER TABLE star_researcher DROP FOREIGN KEY FK_5516FC962C3B70D7');
        $this->addSql('ALTER TABLE star_researcher DROP FOREIGN KEY FK_5516FC96C7533BDE');
        $this->addSql('DROP TABLE telescope');
        $this->addSql('DROP TABLE researcher_star');
        $this->addSql('DROP TABLE researcher');
        $this->addSql('DROP TABLE telescope_star');
        $this->addSql('DROP TABLE star');
        $this->addSql('DROP TABLE star_researcher');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE telescope (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, location VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, launch_year INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE researcher_star (researcher_id INT NOT NULL, star_id INT NOT NULL, INDEX IDX_E068A64C7533BDE (researcher_id), INDEX IDX_E068A642C3B70D7 (star_id), PRIMARY KEY(researcher_id, star_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE researcher (id INT AUTO_INCREMENT NOT NULL, first_name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, last_name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, speciality VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE telescope_star (telescope_id INT NOT NULL, star_id INT NOT NULL, INDEX IDX_AAA9951A2C3B70D7 (star_id), INDEX IDX_AAA9951AAD3CE0D3 (telescope_id), PRIMARY KEY(telescope_id, star_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE star (id INT AUTO_INCREMENT NOT NULL, telescope_id INT NOT NULL, name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, type VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, distance DOUBLE PRECISION NOT NULL, discovered_at DATETIME NOT NULL, INDEX IDX_C9DB5A14AD3CE0D3 (telescope_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE star_researcher (star_id INT NOT NULL, researcher_id INT NOT NULL, INDEX IDX_5516FC96C7533BDE (researcher_id), INDEX IDX_5516FC962C3B70D7 (star_id), PRIMARY KEY(star_id, researcher_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE researcher_star ADD CONSTRAINT FK_E068A642C3B70D7 FOREIGN KEY (star_id) REFERENCES star (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE researcher_star ADD CONSTRAINT FK_E068A64C7533BDE FOREIGN KEY (researcher_id) REFERENCES researcher (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE telescope_star ADD CONSTRAINT FK_AAA9951A2C3B70D7 FOREIGN KEY (star_id) REFERENCES star (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE telescope_star ADD CONSTRAINT FK_AAA9951AAD3CE0D3 FOREIGN KEY (telescope_id) REFERENCES telescope (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE star ADD CONSTRAINT FK_C9DB5A14AD3CE0D3 FOREIGN KEY (telescope_id) REFERENCES telescope (id)');
        $this->addSql('ALTER TABLE star_researcher ADD CONSTRAINT FK_5516FC962C3B70D7 FOREIGN KEY (star_id) REFERENCES star (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE star_researcher ADD CONSTRAINT FK_5516FC96C7533BDE FOREIGN KEY (researcher_id) REFERENCES researcher (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE menu');
    }
}
