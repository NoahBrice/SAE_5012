<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240108024807 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE site DROP FOREIGN KEY FK_694309E459027487');
        $this->addSql('DROP INDEX IDX_694309E459027487 ON site');
        $this->addSql('ALTER TABLE site DROP theme_id');
        $this->addSql('ALTER TABLE theme ADD id_sites_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE theme ADD CONSTRAINT FK_9775E70828E30803 FOREIGN KEY (id_sites_id) REFERENCES site (id)');
        $this->addSql('CREATE INDEX IDX_9775E70828E30803 ON theme (id_sites_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE site ADD theme_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE site ADD CONSTRAINT FK_694309E459027487 FOREIGN KEY (theme_id) REFERENCES theme (id)');
        $this->addSql('CREATE INDEX IDX_694309E459027487 ON site (theme_id)');
        $this->addSql('ALTER TABLE theme DROP FOREIGN KEY FK_9775E70828E30803');
        $this->addSql('DROP INDEX IDX_9775E70828E30803 ON theme');
        $this->addSql('ALTER TABLE theme DROP id_sites_id');
    }
}
