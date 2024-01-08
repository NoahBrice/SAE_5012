<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240108030302 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bloc ADD id_type_bloc_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE bloc ADD CONSTRAINT FK_C778955A5E62F347 FOREIGN KEY (id_type_bloc_id) REFERENCES type_bloc (id)');
        $this->addSql('CREATE INDEX IDX_C778955A5E62F347 ON bloc (id_type_bloc_id)');
        $this->addSql('ALTER TABLE commentaire ADD id_user_id INT DEFAULT NULL, ADD id_blocs_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BC79F37AE5 FOREIGN KEY (id_user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BC2C9B11E9 FOREIGN KEY (id_blocs_id) REFERENCES bloc (id)');
        $this->addSql('CREATE INDEX IDX_67F068BC79F37AE5 ON commentaire (id_user_id)');
        $this->addSql('CREATE INDEX IDX_67F068BC2C9B11E9 ON commentaire (id_blocs_id)');
        $this->addSql('ALTER TABLE reaction ADD id_user_id INT DEFAULT NULL, ADD id_blocs_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE reaction ADD CONSTRAINT FK_A4D707F779F37AE5 FOREIGN KEY (id_user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE reaction ADD CONSTRAINT FK_A4D707F72C9B11E9 FOREIGN KEY (id_blocs_id) REFERENCES bloc (id)');
        $this->addSql('CREATE INDEX IDX_A4D707F779F37AE5 ON reaction (id_user_id)');
        $this->addSql('CREATE INDEX IDX_A4D707F72C9B11E9 ON reaction (id_blocs_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bloc DROP FOREIGN KEY FK_C778955A5E62F347');
        $this->addSql('DROP INDEX IDX_C778955A5E62F347 ON bloc');
        $this->addSql('ALTER TABLE bloc DROP id_type_bloc_id');
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BC79F37AE5');
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BC2C9B11E9');
        $this->addSql('DROP INDEX IDX_67F068BC79F37AE5 ON commentaire');
        $this->addSql('DROP INDEX IDX_67F068BC2C9B11E9 ON commentaire');
        $this->addSql('ALTER TABLE commentaire DROP id_user_id, DROP id_blocs_id');
        $this->addSql('ALTER TABLE reaction DROP FOREIGN KEY FK_A4D707F779F37AE5');
        $this->addSql('ALTER TABLE reaction DROP FOREIGN KEY FK_A4D707F72C9B11E9');
        $this->addSql('DROP INDEX IDX_A4D707F779F37AE5 ON reaction');
        $this->addSql('DROP INDEX IDX_A4D707F72C9B11E9 ON reaction');
        $this->addSql('ALTER TABLE reaction DROP id_user_id, DROP id_blocs_id');
    }
}
