<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20251015221208 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE animals (id INT AUTO_INCREMENT NOT NULL, family_id_id INT DEFAULT NULL, genus_id INT DEFAULT NULL, species_id INT DEFAULT NULL, orders_id INT DEFAULT NULL, parent_id INT DEFAULT NULL, medical_booklet_id INT DEFAULT NULL, menu_id INT DEFAULT NULL, name VARCHAR(100) NOT NULL, gender VARCHAR(100) NOT NULL, origin VARCHAR(255) NOT NULL, birth_date DATE DEFAULT NULL COMMENT \'(DC2Type:date_immutable)\', arriving_date DATE DEFAULT NULL COMMENT \'(DC2Type:date_immutable)\', comment VARCHAR(500) NOT NULL, INDEX IDX_966C69DD43330D24 (family_id_id), INDEX IDX_966C69DD85C4074C (genus_id), INDEX IDX_966C69DDB2A1D860 (species_id), INDEX IDX_966C69DDCFFE9AD6 (orders_id), INDEX IDX_966C69DD727ACA70 (parent_id), UNIQUE INDEX UNIQ_966C69DD4DC06D7F (medical_booklet_id), INDEX IDX_966C69DDCCD7E912 (menu_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE animals ADD CONSTRAINT FK_966C69DD43330D24 FOREIGN KEY (family_id_id) REFERENCES familiy (id)');
        $this->addSql('ALTER TABLE animals ADD CONSTRAINT FK_966C69DD85C4074C FOREIGN KEY (genus_id) REFERENCES genus (id)');
        $this->addSql('ALTER TABLE animals ADD CONSTRAINT FK_966C69DDB2A1D860 FOREIGN KEY (species_id) REFERENCES species (id)');
        $this->addSql('ALTER TABLE animals ADD CONSTRAINT FK_966C69DDCFFE9AD6 FOREIGN KEY (orders_id) REFERENCES orders (id)');
        $this->addSql('ALTER TABLE animals ADD CONSTRAINT FK_966C69DD727ACA70 FOREIGN KEY (parent_id) REFERENCES animals (id)');
        $this->addSql('ALTER TABLE animals ADD CONSTRAINT FK_966C69DD4DC06D7F FOREIGN KEY (medical_booklet_id) REFERENCES medical_booklet (id)');
        $this->addSql('ALTER TABLE animals ADD CONSTRAINT FK_966C69DDCCD7E912 FOREIGN KEY (menu_id) REFERENCES menu (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE animals DROP FOREIGN KEY FK_966C69DD43330D24');
        $this->addSql('ALTER TABLE animals DROP FOREIGN KEY FK_966C69DD85C4074C');
        $this->addSql('ALTER TABLE animals DROP FOREIGN KEY FK_966C69DDB2A1D860');
        $this->addSql('ALTER TABLE animals DROP FOREIGN KEY FK_966C69DDCFFE9AD6');
        $this->addSql('ALTER TABLE animals DROP FOREIGN KEY FK_966C69DD727ACA70');
        $this->addSql('ALTER TABLE animals DROP FOREIGN KEY FK_966C69DD4DC06D7F');
        $this->addSql('ALTER TABLE animals DROP FOREIGN KEY FK_966C69DDCCD7E912');
        $this->addSql('DROP TABLE animals');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
