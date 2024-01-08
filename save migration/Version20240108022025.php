<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240108022025 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE bloc_article (bloc_id INT NOT NULL, article_id INT NOT NULL, INDEX IDX_B320E2E95582E9C0 (bloc_id), INDEX IDX_B320E2E97294869C (article_id), PRIMARY KEY(bloc_id, article_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE bloc_page (bloc_id INT NOT NULL, page_id INT NOT NULL, INDEX IDX_6F4B78A65582E9C0 (bloc_id), INDEX IDX_6F4B78A6C4663E4 (page_id), PRIMARY KEY(bloc_id, page_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE page_article (page_id INT NOT NULL, article_id INT NOT NULL, INDEX IDX_F85AE5F3C4663E4 (page_id), INDEX IDX_F85AE5F37294869C (article_id), PRIMARY KEY(page_id, article_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_site (user_id INT NOT NULL, site_id INT NOT NULL, INDEX IDX_13C2452DA76ED395 (user_id), INDEX IDX_13C2452DF6BD1646 (site_id), PRIMARY KEY(user_id, site_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE bloc_article ADD CONSTRAINT FK_B320E2E95582E9C0 FOREIGN KEY (bloc_id) REFERENCES bloc (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE bloc_article ADD CONSTRAINT FK_B320E2E97294869C FOREIGN KEY (article_id) REFERENCES article (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE bloc_page ADD CONSTRAINT FK_6F4B78A65582E9C0 FOREIGN KEY (bloc_id) REFERENCES bloc (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE bloc_page ADD CONSTRAINT FK_6F4B78A6C4663E4 FOREIGN KEY (page_id) REFERENCES page (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE page_article ADD CONSTRAINT FK_F85AE5F3C4663E4 FOREIGN KEY (page_id) REFERENCES page (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE page_article ADD CONSTRAINT FK_F85AE5F37294869C FOREIGN KEY (article_id) REFERENCES article (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_site ADD CONSTRAINT FK_13C2452DA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_site ADD CONSTRAINT FK_13C2452DF6BD1646 FOREIGN KEY (site_id) REFERENCES site (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bloc_article DROP FOREIGN KEY FK_B320E2E95582E9C0');
        $this->addSql('ALTER TABLE bloc_article DROP FOREIGN KEY FK_B320E2E97294869C');
        $this->addSql('ALTER TABLE bloc_page DROP FOREIGN KEY FK_6F4B78A65582E9C0');
        $this->addSql('ALTER TABLE bloc_page DROP FOREIGN KEY FK_6F4B78A6C4663E4');
        $this->addSql('ALTER TABLE page_article DROP FOREIGN KEY FK_F85AE5F3C4663E4');
        $this->addSql('ALTER TABLE page_article DROP FOREIGN KEY FK_F85AE5F37294869C');
        $this->addSql('ALTER TABLE user_site DROP FOREIGN KEY FK_13C2452DA76ED395');
        $this->addSql('ALTER TABLE user_site DROP FOREIGN KEY FK_13C2452DF6BD1646');
        $this->addSql('DROP TABLE bloc_article');
        $this->addSql('DROP TABLE bloc_page');
        $this->addSql('DROP TABLE page_article');
        $this->addSql('DROP TABLE user_site');
    }
}
