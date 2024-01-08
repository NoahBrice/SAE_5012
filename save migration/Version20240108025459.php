<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240108025459 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE data_set ADD id_site_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE data_set ADD CONSTRAINT FK_A298C4692820BF36 FOREIGN KEY (id_site_id) REFERENCES site (id)');
        $this->addSql('CREATE INDEX IDX_A298C4692820BF36 ON data_set (id_site_id)');
        $this->addSql('ALTER TABLE mail ADD id_site_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE mail ADD CONSTRAINT FK_5126AC482820BF36 FOREIGN KEY (id_site_id) REFERENCES site (id)');
        $this->addSql('CREATE INDEX IDX_5126AC482820BF36 ON mail (id_site_id)');
        $this->addSql('ALTER TABLE page ADD id_site_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE page ADD CONSTRAINT FK_140AB6202820BF36 FOREIGN KEY (id_site_id) REFERENCES site (id)');
        $this->addSql('CREATE INDEX IDX_140AB6202820BF36 ON page (id_site_id)');
        $this->addSql('ALTER TABLE statistique ADD id_site_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE statistique ADD CONSTRAINT FK_73A038AD2820BF36 FOREIGN KEY (id_site_id) REFERENCES site (id)');
        $this->addSql('CREATE INDEX IDX_73A038AD2820BF36 ON statistique (id_site_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE data_set DROP FOREIGN KEY FK_A298C4692820BF36');
        $this->addSql('DROP INDEX IDX_A298C4692820BF36 ON data_set');
        $this->addSql('ALTER TABLE data_set DROP id_site_id');
        $this->addSql('ALTER TABLE mail DROP FOREIGN KEY FK_5126AC482820BF36');
        $this->addSql('DROP INDEX IDX_5126AC482820BF36 ON mail');
        $this->addSql('ALTER TABLE mail DROP id_site_id');
        $this->addSql('ALTER TABLE page DROP FOREIGN KEY FK_140AB6202820BF36');
        $this->addSql('DROP INDEX IDX_140AB6202820BF36 ON page');
        $this->addSql('ALTER TABLE page DROP id_site_id');
        $this->addSql('ALTER TABLE statistique DROP FOREIGN KEY FK_73A038AD2820BF36');
        $this->addSql('DROP INDEX IDX_73A038AD2820BF36 ON statistique');
        $this->addSql('ALTER TABLE statistique DROP id_site_id');
    }
}
