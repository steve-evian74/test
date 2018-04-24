<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180424090628 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE meteo ADD fk_meteo_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE meteo ADD CONSTRAINT FK_3D076077FE4E0602 FOREIGN KEY (fk_meteo_id) REFERENCES ville (id)');
        $this->addSql('CREATE INDEX IDX_3D076077FE4E0602 ON meteo (fk_meteo_id)');
        $this->addSql('ALTER TABLE ville ADD fk_depart_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE ville ADD CONSTRAINT FK_43C3D9C3CF5B29DB FOREIGN KEY (fk_depart_id) REFERENCES departement (id)');
        $this->addSql('CREATE INDEX IDX_43C3D9C3CF5B29DB ON ville (fk_depart_id)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE meteo DROP FOREIGN KEY FK_3D076077FE4E0602');
        $this->addSql('DROP INDEX IDX_3D076077FE4E0602 ON meteo');
        $this->addSql('ALTER TABLE meteo DROP fk_meteo_id');
        $this->addSql('ALTER TABLE ville DROP FOREIGN KEY FK_43C3D9C3CF5B29DB');
        $this->addSql('DROP INDEX IDX_43C3D9C3CF5B29DB ON ville');
        $this->addSql('ALTER TABLE ville DROP fk_depart_id');
    }
}
