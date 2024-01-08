<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240108020038 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE bloc_type_graphique (bloc_id INT NOT NULL, type_graphique_id INT NOT NULL, INDEX IDX_E7D21C965582E9C0 (bloc_id), INDEX IDX_E7D21C96B100A6B4 (type_graphique_id), PRIMARY KEY(bloc_id, type_graphique_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE bloc_type_graphique ADD CONSTRAINT FK_E7D21C965582E9C0 FOREIGN KEY (bloc_id) REFERENCES bloc (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE bloc_type_graphique ADD CONSTRAINT FK_E7D21C96B100A6B4 FOREIGN KEY (type_graphique_id) REFERENCES type_graphique (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bloc_type_graphique DROP FOREIGN KEY FK_E7D21C965582E9C0');
        $this->addSql('ALTER TABLE bloc_type_graphique DROP FOREIGN KEY FK_E7D21C96B100A6B4');
        $this->addSql('DROP TABLE bloc_type_graphique');
    }
}
