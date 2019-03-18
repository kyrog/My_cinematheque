<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190305122156 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE membre ADD ficheperso_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE membre ADD CONSTRAINT FK_F6B4FB297E685ABE FOREIGN KEY (ficheperso_id) REFERENCES fiche_perso (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_F6B4FB297E685ABE ON membre (ficheperso_id)');
        $this->addSql('ALTER TABLE fiche_perso DROP FOREIGN KEY FK_C7E2101E6A99F74A');
        $this->addSql('DROP INDEX IDX_C7E2101E6A99F74A ON fiche_perso');
        $this->addSql('ALTER TABLE fiche_perso DROP membre_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE fiche_perso ADD membre_id INT NOT NULL');
        $this->addSql('ALTER TABLE fiche_perso ADD CONSTRAINT FK_C7E2101E6A99F74A FOREIGN KEY (membre_id) REFERENCES membre (id)');
        $this->addSql('CREATE INDEX IDX_C7E2101E6A99F74A ON fiche_perso (membre_id)');
        $this->addSql('ALTER TABLE membre DROP FOREIGN KEY FK_F6B4FB297E685ABE');
        $this->addSql('DROP INDEX UNIQ_F6B4FB297E685ABE ON membre');
        $this->addSql('ALTER TABLE membre DROP ficheperso_id');
    }
}
