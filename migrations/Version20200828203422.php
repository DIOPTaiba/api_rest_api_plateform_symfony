<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200828203422 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE comptes_etats DROP FOREIGN KEY FK_E05BE3CB41D08BD0');
        $this->addSql('ALTER TABLE comptes_etats DROP FOREIGN KEY FK_E05BE3CBDCED588B');
        $this->addSql('ALTER TABLE comptes_etats ADD CONSTRAINT FK_E05BE3CB41D08BD0 FOREIGN KEY (etatcompte_id) REFERENCES etat_compte (id)');
        $this->addSql('ALTER TABLE comptes_etats ADD CONSTRAINT FK_E05BE3CBDCED588B FOREIGN KEY (comptes_id) REFERENCES comptes (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE comptes_etats DROP FOREIGN KEY FK_E05BE3CBDCED588B');
        $this->addSql('ALTER TABLE comptes_etats DROP FOREIGN KEY FK_E05BE3CB41D08BD0');
        $this->addSql('ALTER TABLE comptes_etats ADD CONSTRAINT FK_E05BE3CBDCED588B FOREIGN KEY (comptes_id) REFERENCES comptes (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE comptes_etats ADD CONSTRAINT FK_E05BE3CB41D08BD0 FOREIGN KEY (etatcompte_id) REFERENCES etat_compte (id) ON DELETE CASCADE');
    }
}
