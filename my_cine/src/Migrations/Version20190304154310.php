<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190304154310 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE salle ADD film_id INT NOT NULL');
        $this->addSql('ALTER TABLE salle ADD CONSTRAINT FK_4E977E5C567F5183 FOREIGN KEY (film_id) REFERENCES film (id)');
        $this->addSql('CREATE INDEX IDX_4E977E5C567F5183 ON salle (film_id)');
        $this->addSql('ALTER TABLE historique_membre ADD membre_id INT NOT NULL, ADD film_id INT NOT NULL');
        $this->addSql('ALTER TABLE historique_membre ADD CONSTRAINT FK_3FF65B756A99F74A FOREIGN KEY (membre_id) REFERENCES membre (id)');
        $this->addSql('ALTER TABLE historique_membre ADD CONSTRAINT FK_3FF65B75567F5183 FOREIGN KEY (film_id) REFERENCES film (id)');
        $this->addSql('CREATE INDEX IDX_3FF65B756A99F74A ON historique_membre (membre_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_3FF65B75567F5183 ON historique_membre (film_id)');
        $this->addSql('ALTER TABLE membre ADD abo_id INT NOT NULL');
        $this->addSql('ALTER TABLE membre ADD CONSTRAINT FK_F6B4FB296BDDA206 FOREIGN KEY (abo_id) REFERENCES abonnement (id)');
        $this->addSql('CREATE INDEX IDX_F6B4FB296BDDA206 ON membre (abo_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE historique_membre DROP FOREIGN KEY FK_3FF65B756A99F74A');
        $this->addSql('ALTER TABLE historique_membre DROP FOREIGN KEY FK_3FF65B75567F5183');
        $this->addSql('DROP INDEX IDX_3FF65B756A99F74A ON historique_membre');
        $this->addSql('DROP INDEX UNIQ_3FF65B75567F5183 ON historique_membre');
        $this->addSql('ALTER TABLE historique_membre DROP membre_id, DROP film_id');
        $this->addSql('ALTER TABLE membre DROP FOREIGN KEY FK_F6B4FB296BDDA206');
        $this->addSql('DROP INDEX IDX_F6B4FB296BDDA206 ON membre');
        $this->addSql('ALTER TABLE membre DROP abo_id');
        $this->addSql('ALTER TABLE salle DROP FOREIGN KEY FK_4E977E5C567F5183');
        $this->addSql('DROP INDEX IDX_4E977E5C567F5183 ON salle');
        $this->addSql('ALTER TABLE salle DROP film_id');
    }
}
