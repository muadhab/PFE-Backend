<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220520210720 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE attachedfile (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, ip VARCHAR(255) NOT NULL, zone VARCHAR(255) NOT NULL, oracle_home_path VARCHAR(255) NOT NULL, oracle_base_path VARCHAR(255) NOT NULL, oracle_sid VARCHAR(255) NOT NULL, sga VARCHAR(255) NOT NULL, pga VARCHAR(255) NOT NULL, oracle_version TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE departement (id INT AUTO_INCREMENT NOT NULL, id_user_id INT NOT NULL, id_dept INT NOT NULL, service VARCHAR(255) NOT NULL, INDEX IDX_C1765B6379F37AE5 (id_user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE departement_departement (departement_source INT NOT NULL, departement_target INT NOT NULL, INDEX IDX_CF73EFD1C2CDAAB0 (departement_source), INDEX IDX_CF73EFD1DB28FA3F (departement_target), PRIMARY KEY(departement_source, departement_target)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, uuid VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, is_verified TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_8D93D649D17F50A6 (uuid), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE departement ADD CONSTRAINT FK_C1765B6379F37AE5 FOREIGN KEY (id_user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE departement_departement ADD CONSTRAINT FK_CF73EFD1C2CDAAB0 FOREIGN KEY (departement_source) REFERENCES departement (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE departement_departement ADD CONSTRAINT FK_CF73EFD1DB28FA3F FOREIGN KEY (departement_target) REFERENCES departement (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE departement_departement DROP FOREIGN KEY FK_CF73EFD1C2CDAAB0');
        $this->addSql('ALTER TABLE departement_departement DROP FOREIGN KEY FK_CF73EFD1DB28FA3F');
        $this->addSql('ALTER TABLE departement DROP FOREIGN KEY FK_C1765B6379F37AE5');
        $this->addSql('DROP TABLE attachedfile');
        $this->addSql('DROP TABLE departement');
        $this->addSql('DROP TABLE departement_departement');
        $this->addSql('DROP TABLE user');
    }
}
