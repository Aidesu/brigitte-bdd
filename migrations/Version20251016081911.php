<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20251016081911 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE staffs_cage DROP FOREIGN KEY FK_60853C05A70E5B7');
        $this->addSql('ALTER TABLE staffs DROP FOREIGN KEY FK_54D5390D60322AC');
        $this->addSql('CREATE TABLE cages (id INT AUTO_INCREMENT NOT NULL, aisle_id INT NOT NULL, number VARCHAR(255) NOT NULL, surface VARCHAR(255) NOT NULL, capacity VARCHAR(255) NOT NULL, INDEX IDX_734082723C1884A (aisle_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE roles (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE cages ADD CONSTRAINT FK_734082723C1884A FOREIGN KEY (aisle_id) REFERENCES aisle (id)');
        $this->addSql('ALTER TABLE cage DROP FOREIGN KEY FK_56A64E5123C1884A');
        $this->addSql('DROP TABLE cage');
        $this->addSql('DROP TABLE role');
        $this->addSql('ALTER TABLE staffs DROP FOREIGN KEY FK_54D5390D60322AC');
        $this->addSql('ALTER TABLE staffs ADD CONSTRAINT FK_54D5390D60322AC FOREIGN KEY (role_id) REFERENCES roles (id)');
        $this->addSql('ALTER TABLE staffs_cage DROP FOREIGN KEY FK_60853C05A70E5B7');
        $this->addSql('ALTER TABLE staffs_cage ADD CONSTRAINT FK_60853C05A70E5B7 FOREIGN KEY (cage_id) REFERENCES cages (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE staffs_cage DROP FOREIGN KEY FK_60853C05A70E5B7');
        $this->addSql('ALTER TABLE staffs DROP FOREIGN KEY FK_54D5390D60322AC');
        $this->addSql('CREATE TABLE cage (id INT AUTO_INCREMENT NOT NULL, aisle_id INT NOT NULL, number VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, surface VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, capacity VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, INDEX IDX_56A64E5123C1884A (aisle_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE role (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE cage ADD CONSTRAINT FK_56A64E5123C1884A FOREIGN KEY (aisle_id) REFERENCES aisle (id)');
        $this->addSql('ALTER TABLE cages DROP FOREIGN KEY FK_734082723C1884A');
        $this->addSql('DROP TABLE cages');
        $this->addSql('DROP TABLE roles');
        $this->addSql('ALTER TABLE staffs_cage DROP FOREIGN KEY FK_60853C05A70E5B7');
        $this->addSql('ALTER TABLE staffs_cage ADD CONSTRAINT FK_60853C05A70E5B7 FOREIGN KEY (cage_id) REFERENCES cage (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE staffs DROP FOREIGN KEY FK_54D5390D60322AC');
        $this->addSql('ALTER TABLE staffs ADD CONSTRAINT FK_54D5390D60322AC FOREIGN KEY (role_id) REFERENCES role (id)');
    }
}
