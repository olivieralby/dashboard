<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210314085019 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE days ADD activite_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE days ADD CONSTRAINT FK_EBE4FC669B0F88B1 FOREIGN KEY (activite_id) REFERENCES activite (id)');
        $this->addSql('CREATE INDEX IDX_EBE4FC669B0F88B1 ON days (activite_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE days DROP FOREIGN KEY FK_EBE4FC669B0F88B1');
        $this->addSql('DROP INDEX IDX_EBE4FC669B0F88B1 ON days');
        $this->addSql('ALTER TABLE days DROP activite_id');
    }
}
