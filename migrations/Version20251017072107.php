<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20251017072107 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE adopters (id INT AUTO_INCREMENT NOT NULL, firth_name VARCHAR(100) NOT NULL, last_name VARCHAR(255) NOT NULL, address VARCHAR(255) NOT NULL, country VARCHAR(100) NOT NULL, city VARCHAR(255) NOT NULL, zip_code VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE aisle (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, floor VARCHAR(255) NOT NULL, block VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE animals (id INT AUTO_INCREMENT NOT NULL, family_id_id INT DEFAULT NULL, genus_id INT DEFAULT NULL, species_id INT DEFAULT NULL, orders_id INT DEFAULT NULL, parent_id INT DEFAULT NULL, medical_booklet_id INT DEFAULT NULL, menu_id INT DEFAULT NULL, adopters_id INT DEFAULT NULL, name VARCHAR(100) NOT NULL, gender VARCHAR(100) NOT NULL, origin VARCHAR(255) NOT NULL, birth_date DATE DEFAULT NULL COMMENT \'(DC2Type:date_immutable)\', arriving_date DATE DEFAULT NULL COMMENT \'(DC2Type:date_immutable)\', comment VARCHAR(500) NOT NULL, INDEX IDX_966C69DD43330D24 (family_id_id), INDEX IDX_966C69DD85C4074C (genus_id), INDEX IDX_966C69DDB2A1D860 (species_id), INDEX IDX_966C69DDCFFE9AD6 (orders_id), INDEX IDX_966C69DD727ACA70 (parent_id), UNIQUE INDEX UNIQ_966C69DD4DC06D7F (medical_booklet_id), INDEX IDX_966C69DDCCD7E912 (menu_id), INDEX IDX_966C69DD2EDD49D5 (adopters_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cage (id INT AUTO_INCREMENT NOT NULL, aisle_id INT NOT NULL, number VARCHAR(255) NOT NULL, surface VARCHAR(255) NOT NULL, capacity VARCHAR(255) NOT NULL, INDEX IDX_56A64E5123C1884A (aisle_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE diseases (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE familiy (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE genus (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE medical_booklet (id INT AUTO_INCREMENT NOT NULL, vaccine_date DATE NOT NULL, vaccine_next_day DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE medical_booklet_diseases (medical_booklet_id INT NOT NULL, diseases_id INT NOT NULL, INDEX IDX_60657964DC06D7F (medical_booklet_id), INDEX IDX_6065796E672F970 (diseases_id), PRIMARY KEY(medical_booklet_id, diseases_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE medical_booklet_vaccines (medical_booklet_id INT NOT NULL, vaccines_id INT NOT NULL, INDEX IDX_56ABC0504DC06D7F (medical_booklet_id), INDEX IDX_56ABC050E537D05A (vaccines_id), PRIMARY KEY(medical_booklet_id, vaccines_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE menu (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(255) NOT NULL, meat_quantity INT NOT NULL, vegetables_quantity INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE orders (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE role (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE species (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) NOT NULL, adoptable VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE staffs (id INT AUTO_INCREMENT NOT NULL, role_id INT NOT NULL, name VARCHAR(255) NOT NULL, birth_date VARCHAR(255) NOT NULL, gender VARCHAR(255) NOT NULL, city VARCHAR(255) NOT NULL, INDEX IDX_54D5390D60322AC (role_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE staffs_cage (staffs_id INT NOT NULL, cage_id INT NOT NULL, INDEX IDX_60853C02A94E7F (staffs_id), INDEX IDX_60853C05A70E5B7 (cage_id), PRIMARY KEY(staffs_id, cage_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE staffs_aisle (staffs_id INT NOT NULL, aisle_id INT NOT NULL, INDEX IDX_1217BD32A94E7F (staffs_id), INDEX IDX_1217BD323C1884A (aisle_id), PRIMARY KEY(staffs_id, aisle_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vaccines (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE animals ADD CONSTRAINT FK_966C69DD43330D24 FOREIGN KEY (family_id_id) REFERENCES familiy (id)');
        $this->addSql('ALTER TABLE animals ADD CONSTRAINT FK_966C69DD85C4074C FOREIGN KEY (genus_id) REFERENCES genus (id)');
        $this->addSql('ALTER TABLE animals ADD CONSTRAINT FK_966C69DDB2A1D860 FOREIGN KEY (species_id) REFERENCES species (id)');
        $this->addSql('ALTER TABLE animals ADD CONSTRAINT FK_966C69DDCFFE9AD6 FOREIGN KEY (orders_id) REFERENCES orders (id)');
        $this->addSql('ALTER TABLE animals ADD CONSTRAINT FK_966C69DD727ACA70 FOREIGN KEY (parent_id) REFERENCES animals (id)');
        $this->addSql('ALTER TABLE animals ADD CONSTRAINT FK_966C69DD4DC06D7F FOREIGN KEY (medical_booklet_id) REFERENCES medical_booklet (id)');
        $this->addSql('ALTER TABLE animals ADD CONSTRAINT FK_966C69DDCCD7E912 FOREIGN KEY (menu_id) REFERENCES menu (id)');
        $this->addSql('ALTER TABLE animals ADD CONSTRAINT FK_966C69DD2EDD49D5 FOREIGN KEY (adopters_id) REFERENCES adopters (id)');
        $this->addSql('ALTER TABLE cage ADD CONSTRAINT FK_56A64E5123C1884A FOREIGN KEY (aisle_id) REFERENCES aisle (id)');
        $this->addSql('ALTER TABLE medical_booklet_diseases ADD CONSTRAINT FK_60657964DC06D7F FOREIGN KEY (medical_booklet_id) REFERENCES medical_booklet (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE medical_booklet_diseases ADD CONSTRAINT FK_6065796E672F970 FOREIGN KEY (diseases_id) REFERENCES diseases (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE medical_booklet_vaccines ADD CONSTRAINT FK_56ABC0504DC06D7F FOREIGN KEY (medical_booklet_id) REFERENCES medical_booklet (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE medical_booklet_vaccines ADD CONSTRAINT FK_56ABC050E537D05A FOREIGN KEY (vaccines_id) REFERENCES vaccines (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE staffs ADD CONSTRAINT FK_54D5390D60322AC FOREIGN KEY (role_id) REFERENCES role (id)');
        $this->addSql('ALTER TABLE staffs_cage ADD CONSTRAINT FK_60853C02A94E7F FOREIGN KEY (staffs_id) REFERENCES staffs (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE staffs_cage ADD CONSTRAINT FK_60853C05A70E5B7 FOREIGN KEY (cage_id) REFERENCES cage (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE staffs_aisle ADD CONSTRAINT FK_1217BD32A94E7F FOREIGN KEY (staffs_id) REFERENCES staffs (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE staffs_aisle ADD CONSTRAINT FK_1217BD323C1884A FOREIGN KEY (aisle_id) REFERENCES aisle (id) ON DELETE CASCADE');
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
        $this->addSql('ALTER TABLE animals DROP FOREIGN KEY FK_966C69DD2EDD49D5');
        $this->addSql('ALTER TABLE cage DROP FOREIGN KEY FK_56A64E5123C1884A');
        $this->addSql('ALTER TABLE medical_booklet_diseases DROP FOREIGN KEY FK_60657964DC06D7F');
        $this->addSql('ALTER TABLE medical_booklet_diseases DROP FOREIGN KEY FK_6065796E672F970');
        $this->addSql('ALTER TABLE medical_booklet_vaccines DROP FOREIGN KEY FK_56ABC0504DC06D7F');
        $this->addSql('ALTER TABLE medical_booklet_vaccines DROP FOREIGN KEY FK_56ABC050E537D05A');
        $this->addSql('ALTER TABLE staffs DROP FOREIGN KEY FK_54D5390D60322AC');
        $this->addSql('ALTER TABLE staffs_cage DROP FOREIGN KEY FK_60853C02A94E7F');
        $this->addSql('ALTER TABLE staffs_cage DROP FOREIGN KEY FK_60853C05A70E5B7');
        $this->addSql('ALTER TABLE staffs_aisle DROP FOREIGN KEY FK_1217BD32A94E7F');
        $this->addSql('ALTER TABLE staffs_aisle DROP FOREIGN KEY FK_1217BD323C1884A');
        $this->addSql('DROP TABLE adopters');
        $this->addSql('DROP TABLE aisle');
        $this->addSql('DROP TABLE animals');
        $this->addSql('DROP TABLE cage');
        $this->addSql('DROP TABLE diseases');
        $this->addSql('DROP TABLE familiy');
        $this->addSql('DROP TABLE genus');
        $this->addSql('DROP TABLE medical_booklet');
        $this->addSql('DROP TABLE medical_booklet_diseases');
        $this->addSql('DROP TABLE medical_booklet_vaccines');
        $this->addSql('DROP TABLE menu');
        $this->addSql('DROP TABLE orders');
        $this->addSql('DROP TABLE role');
        $this->addSql('DROP TABLE species');
        $this->addSql('DROP TABLE staffs');
        $this->addSql('DROP TABLE staffs_cage');
        $this->addSql('DROP TABLE staffs_aisle');
        $this->addSql('DROP TABLE vaccines');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
