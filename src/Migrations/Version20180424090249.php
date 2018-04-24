<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180424090249 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE departement DROP FOREIGN KEY FK_C1765B63A73F0036');
        $this->addSql('DROP INDEX IDX_C1765B63A73F0036 ON departement');
        $this->addSql('ALTER TABLE departement DROP ville_id');
        $this->addSql('ALTER TABLE meteo CHANGE nom temps VARCHAR(25) DEFAULT NULL');
        $this->addSql('ALTER TABLE ville DROP FOREIGN KEY FK_43C3D9C3CC6645DC');
        $this->addSql('DROP INDEX IDX_43C3D9C3CC6645DC ON ville');
        $this->addSql('ALTER TABLE ville DROP meteo_id');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE departement ADD ville_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE departement ADD CONSTRAINT FK_C1765B63A73F0036 FOREIGN KEY (ville_id) REFERENCES ville (id)');
        $this->addSql('CREATE INDEX IDX_C1765B63A73F0036 ON departement (ville_id)');
        $this->addSql('ALTER TABLE meteo CHANGE temps nom VARCHAR(25) DEFAULT NULL COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE ville ADD meteo_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE ville ADD CONSTRAINT FK_43C3D9C3CC6645DC FOREIGN KEY (meteo_id) REFERENCES meteo (id)');
        $this->addSql('CREATE INDEX IDX_43C3D9C3CC6645DC ON ville (meteo_id)');
    }
}
