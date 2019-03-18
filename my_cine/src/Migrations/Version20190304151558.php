<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190304151558 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE fiche_perso ADD membre_id INT NOT NULL');
        $this->addSql('ALTER TABLE fiche_perso ADD CONSTRAINT FK_C7E2101E6A99F74A FOREIGN KEY (membre_id) REFERENCES membre (id)');
        $this->addSql('CREATE INDEX IDX_C7E2101E6A99F74A ON fiche_perso (membre_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE fiche_perso DROP FOREIGN KEY FK_C7E2101E6A99F74A');
        $this->addSql('DROP INDEX IDX_C7E2101E6A99F74A ON fiche_perso');
        $this->addSql('ALTER TABLE fiche_perso DROP membre_id');
    }
}
