<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200828204025 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE operations ADD id_compte_source_id INT NOT NULL, ADD id_compte_destinataire_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE operations ADD CONSTRAINT FK_28145348B5387782 FOREIGN KEY (id_compte_source_id) REFERENCES comptes (id)');
        $this->addSql('ALTER TABLE operations ADD CONSTRAINT FK_281453486DE5B1A9 FOREIGN KEY (id_compte_destinataire_id) REFERENCES comptes (id)');
        $this->addSql('CREATE INDEX IDX_28145348B5387782 ON operations (id_compte_source_id)');
        $this->addSql('CREATE INDEX IDX_281453486DE5B1A9 ON operations (id_compte_destinataire_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE operations DROP FOREIGN KEY FK_28145348B5387782');
        $this->addSql('ALTER TABLE operations DROP FOREIGN KEY FK_281453486DE5B1A9');
        $this->addSql('DROP INDEX IDX_28145348B5387782 ON operations');
        $this->addSql('DROP INDEX IDX_281453486DE5B1A9 ON operations');
        $this->addSql('ALTER TABLE operations DROP id_compte_source_id, DROP id_compte_destinataire_id');
    }
}
