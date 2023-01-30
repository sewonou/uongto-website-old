<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230118130909 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE media_media_category (media_id INT NOT NULL, media_category_id INT NOT NULL, INDEX IDX_A818C333EA9FDD75 (media_id), INDEX IDX_A818C333E52EEF71 (media_category_id), PRIMARY KEY(media_id, media_category_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE post (id INT AUTO_INCREMENT NOT NULL, media_id INT DEFAULT NULL, author_id INT DEFAULT NULL, name_fr VARCHAR(255) NOT NULL, name_en VARCHAR(255) NOT NULL, slug VARCHAR(255) DEFAULT NULL, content_fr LONGTEXT DEFAULT NULL, content_en LONGTEXT DEFAULT NULL, INDEX IDX_5A8A6C8DEA9FDD75 (media_id), INDEX IDX_5A8A6C8DF675F31B (author_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE post_category (id INT AUTO_INCREMENT NOT NULL, name_fr VARCHAR(255) NOT NULL, name_en VARCHAR(255) DEFAULT NULL, slug VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE post_category_post_category_type (post_category_id INT NOT NULL, post_category_type_id INT NOT NULL, INDEX IDX_30A1608EFE0617CD (post_category_id), INDEX IDX_30A1608E41B01347 (post_category_type_id), PRIMARY KEY(post_category_id, post_category_type_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE post_category_type (id INT AUTO_INCREMENT NOT NULL, name_fr VARCHAR(255) NOT NULL, name_en VARCHAR(255) DEFAULT NULL, slug VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tag (id INT AUTO_INCREMENT NOT NULL, author_id INT DEFAULT NULL, title_fr VARCHAR(255) NOT NULL, title_en VARCHAR(255) DEFAULT NULL, slug VARCHAR(255) DEFAULT NULL, INDEX IDX_389B783F675F31B (author_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE media_media_category ADD CONSTRAINT FK_A818C333EA9FDD75 FOREIGN KEY (media_id) REFERENCES media (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE media_media_category ADD CONSTRAINT FK_A818C333E52EEF71 FOREIGN KEY (media_category_id) REFERENCES media_category (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE post ADD CONSTRAINT FK_5A8A6C8DEA9FDD75 FOREIGN KEY (media_id) REFERENCES media (id)');
        $this->addSql('ALTER TABLE post ADD CONSTRAINT FK_5A8A6C8DF675F31B FOREIGN KEY (author_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE post_category_post_category_type ADD CONSTRAINT FK_30A1608EFE0617CD FOREIGN KEY (post_category_id) REFERENCES post_category (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE post_category_post_category_type ADD CONSTRAINT FK_30A1608E41B01347 FOREIGN KEY (post_category_type_id) REFERENCES post_category_type (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE tag ADD CONSTRAINT FK_389B783F675F31B FOREIGN KEY (author_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E66A76ED395');
        $this->addSql('ALTER TABLE article_article_category DROP FOREIGN KEY FK_44F096D97294869C');
        $this->addSql('ALTER TABLE article_article_category DROP FOREIGN KEY FK_44F096D988C5F785');
        $this->addSql('ALTER TABLE article_category_articlecategory_type DROP FOREIGN KEY FK_8E2FE23388C5F785');
        $this->addSql('ALTER TABLE article_category_articlecategory_type DROP FOREIGN KEY FK_8E2FE2339C8A1B9F');
        $this->addSql('ALTER TABLE article_media DROP FOREIGN KEY FK_1D9BD31DEA9FDD75');
        $this->addSql('ALTER TABLE article_media DROP FOREIGN KEY FK_1D9BD31D7294869C');
        $this->addSql('DROP TABLE article');
        $this->addSql('DROP TABLE article_article_category');
        $this->addSql('DROP TABLE article_category');
        $this->addSql('DROP TABLE article_category_articlecategory_type');
        $this->addSql('DROP TABLE article_category_type');
        $this->addSql('DROP TABLE article_media');
        $this->addSql('ALTER TABLE media DROP FOREIGN KEY FK_6A2CA10CA76ED395');
        $this->addSql('DROP INDEX IDX_6A2CA10CA76ED395 ON media');
        $this->addSql('ALTER TABLE media DROP user_id, DROP title, DROP slug, DROP url_local, DROP url_extern');
        $this->addSql('ALTER TABLE media_category ADD name_en VARCHAR(255) DEFAULT NULL, CHANGE title name_fr VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE menu DROP FOREIGN KEY FK_7D053A93C4663E4');
        $this->addSql('DROP INDEX IDX_7D053A93C4663E4 ON menu');
        $this->addSql('ALTER TABLE menu CHANGE page_id menu_id INT DEFAULT NULL, CHANGE title name_fr VARCHAR(255) NOT NULL, CHANGE link name_en VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE menu ADD CONSTRAINT FK_7D053A93CCD7E912 FOREIGN KEY (menu_id) REFERENCES menu (id)');
        $this->addSql('CREATE INDEX IDX_7D053A93CCD7E912 ON menu (menu_id)');
        $this->addSql('ALTER TABLE menu_category ADD name_en VARCHAR(255) DEFAULT NULL, ADD slug VARCHAR(255) DEFAULT NULL, ADD update_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', CHANGE title name_fr VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE page DROP FOREIGN KEY FK_140AB620A76ED395');
        $this->addSql('DROP INDEX IDX_140AB620A76ED395 ON page');
        $this->addSql('ALTER TABLE page ADD name_en VARCHAR(255) DEFAULT NULL, DROP content, CHANGE user_id author_id INT DEFAULT NULL, CHANGE title name_fr VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE page ADD CONSTRAINT FK_140AB620F675F31B FOREIGN KEY (author_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_140AB620F675F31B ON page (author_id)');
        $this->addSql('ALTER TABLE page_category ADD name_en VARCHAR(255) DEFAULT NULL, CHANGE title name_fr VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE user DROP first_name, DROP last_name');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE article (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, title VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, content LONGTEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, description VARCHAR(45) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, created_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', uptade_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_23A0E66A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE article_article_category (article_id INT NOT NULL, article_category_id INT NOT NULL, INDEX IDX_44F096D97294869C (article_id), INDEX IDX_44F096D988C5F785 (article_category_id), PRIMARY KEY(article_id, article_category_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE article_category (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, slug VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE article_category_articlecategory_type (article_category_id INT NOT NULL, articlecategory_type_id INT NOT NULL, INDEX IDX_8E2FE23388C5F785 (article_category_id), INDEX IDX_8E2FE2339C8A1B9F (articlecategory_type_id), PRIMARY KEY(article_category_id, articlecategory_type_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE article_category_type (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, slug VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE article_media (article_id INT NOT NULL, media_id INT NOT NULL, INDEX IDX_1D9BD31D7294869C (article_id), INDEX IDX_1D9BD31DEA9FDD75 (media_id), PRIMARY KEY(article_id, media_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E66A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE article_article_category ADD CONSTRAINT FK_44F096D97294869C FOREIGN KEY (article_id) REFERENCES article (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE article_article_category ADD CONSTRAINT FK_44F096D988C5F785 FOREIGN KEY (article_category_id) REFERENCES article_category (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE article_category_articlecategory_type ADD CONSTRAINT FK_8E2FE23388C5F785 FOREIGN KEY (article_category_id) REFERENCES article_category (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE article_category_articlecategory_type ADD CONSTRAINT FK_8E2FE2339C8A1B9F FOREIGN KEY (articlecategory_type_id) REFERENCES article_category_type (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE article_media ADD CONSTRAINT FK_1D9BD31DEA9FDD75 FOREIGN KEY (media_id) REFERENCES media (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE article_media ADD CONSTRAINT FK_1D9BD31D7294869C FOREIGN KEY (article_id) REFERENCES article (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE media_media_category DROP FOREIGN KEY FK_A818C333EA9FDD75');
        $this->addSql('ALTER TABLE media_media_category DROP FOREIGN KEY FK_A818C333E52EEF71');
        $this->addSql('ALTER TABLE post DROP FOREIGN KEY FK_5A8A6C8DEA9FDD75');
        $this->addSql('ALTER TABLE post DROP FOREIGN KEY FK_5A8A6C8DF675F31B');
        $this->addSql('ALTER TABLE post_category_post_category_type DROP FOREIGN KEY FK_30A1608EFE0617CD');
        $this->addSql('ALTER TABLE post_category_post_category_type DROP FOREIGN KEY FK_30A1608E41B01347');
        $this->addSql('ALTER TABLE tag DROP FOREIGN KEY FK_389B783F675F31B');
        $this->addSql('DROP TABLE media_media_category');
        $this->addSql('DROP TABLE post');
        $this->addSql('DROP TABLE post_category');
        $this->addSql('DROP TABLE post_category_post_category_type');
        $this->addSql('DROP TABLE post_category_type');
        $this->addSql('DROP TABLE tag');
        $this->addSql('ALTER TABLE media ADD user_id INT DEFAULT NULL, ADD title VARCHAR(255) NOT NULL, ADD slug VARCHAR(255) DEFAULT NULL, ADD url_local VARCHAR(255) DEFAULT NULL, ADD url_extern VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE media ADD CONSTRAINT FK_6A2CA10CA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_6A2CA10CA76ED395 ON media (user_id)');
        $this->addSql('ALTER TABLE media_category DROP name_en, CHANGE name_fr title VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE menu DROP FOREIGN KEY FK_7D053A93CCD7E912');
        $this->addSql('DROP INDEX IDX_7D053A93CCD7E912 ON menu');
        $this->addSql('ALTER TABLE menu CHANGE menu_id page_id INT DEFAULT NULL, CHANGE name_fr title VARCHAR(255) NOT NULL, CHANGE name_en link VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE menu ADD CONSTRAINT FK_7D053A93C4663E4 FOREIGN KEY (page_id) REFERENCES page (id)');
        $this->addSql('CREATE INDEX IDX_7D053A93C4663E4 ON menu (page_id)');
        $this->addSql('ALTER TABLE menu_category DROP name_en, DROP slug, DROP update_at, CHANGE name_fr title VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE page DROP FOREIGN KEY FK_140AB620F675F31B');
        $this->addSql('DROP INDEX IDX_140AB620F675F31B ON page');
        $this->addSql('ALTER TABLE page ADD content LONGTEXT DEFAULT NULL, DROP name_en, CHANGE author_id user_id INT DEFAULT NULL, CHANGE name_fr title VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE page ADD CONSTRAINT FK_140AB620A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_140AB620A76ED395 ON page (user_id)');
        $this->addSql('ALTER TABLE page_category DROP name_en, CHANGE name_fr title VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE user ADD first_name VARCHAR(255) DEFAULT NULL, ADD last_name VARCHAR(255) DEFAULT NULL');
    }
}
