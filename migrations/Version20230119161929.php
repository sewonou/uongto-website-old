<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230119161929 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE menu DROP FOREIGN KEY FK_7D053A937ABA83AE');
        $this->addSql('ALTER TABLE page DROP FOREIGN KEY FK_140AB6205FAC390');
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, type_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, slug VARCHAR(255) DEFAULT NULL, INDEX IDX_64C19C1C54C8C93 (type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE category ADD CONSTRAINT FK_64C19C1C54C8C93 FOREIGN KEY (type_id) REFERENCES type (id)');
        $this->addSql('ALTER TABLE media_media_category DROP FOREIGN KEY FK_A818C333EA9FDD75');
        $this->addSql('ALTER TABLE media_media_category DROP FOREIGN KEY FK_A818C333E52EEF71');
        $this->addSql('ALTER TABLE post_category_post_category_type DROP FOREIGN KEY FK_30A1608E41B01347');
        $this->addSql('ALTER TABLE post_category_post_category_type DROP FOREIGN KEY FK_30A1608EFE0617CD');
        $this->addSql('ALTER TABLE post_post_category DROP FOREIGN KEY FK_A6D02E73FE0617CD');
        $this->addSql('ALTER TABLE post_post_category DROP FOREIGN KEY FK_A6D02E734B89032C');
        $this->addSql('ALTER TABLE tag DROP FOREIGN KEY FK_389B783F675F31B');
        $this->addSql('DROP TABLE media_category');
        $this->addSql('DROP TABLE media_media_category');
        $this->addSql('DROP TABLE menu_category');
        $this->addSql('DROP TABLE page_category');
        $this->addSql('DROP TABLE post_category');
        $this->addSql('DROP TABLE post_category_post_category_type');
        $this->addSql('DROP TABLE post_category_type');
        $this->addSql('DROP TABLE post_post_category');
        $this->addSql('DROP TABLE tag');
        $this->addSql('ALTER TABLE media ADD type_id INT NOT NULL, ADD title VARCHAR(255) NOT NULL, ADD slug VARCHAR(255) DEFAULT NULL, ADD name VARCHAR(255) DEFAULT NULL, ADD url VARCHAR(255) DEFAULT NULL, ADD updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE media ADD CONSTRAINT FK_6A2CA10CC54C8C93 FOREIGN KEY (type_id) REFERENCES type (id)');
        $this->addSql('CREATE INDEX IDX_6A2CA10CC54C8C93 ON media (type_id)');
        $this->addSql('ALTER TABLE menu DROP FOREIGN KEY FK_7D053A93CCD7E912');
        $this->addSql('DROP INDEX IDX_7D053A937ABA83AE ON menu');
        $this->addSql('DROP INDEX IDX_7D053A93CCD7E912 ON menu');
        $this->addSql('ALTER TABLE menu ADD type_id INT DEFAULT NULL, DROP menu_category_id, DROP menu_id, DROP name_en, CHANGE name_fr title VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE menu ADD CONSTRAINT FK_7D053A93C54C8C93 FOREIGN KEY (type_id) REFERENCES type (id)');
        $this->addSql('CREATE INDEX IDX_7D053A93C54C8C93 ON menu (type_id)');
        $this->addSql('DROP INDEX IDX_140AB6205FAC390 ON page');
        $this->addSql('ALTER TABLE page ADD meta VARCHAR(255) DEFAULT NULL, CHANGE page_category_id type_id INT DEFAULT NULL, CHANGE name_fr title VARCHAR(255) NOT NULL, CHANGE name_en display_name VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE page ADD CONSTRAINT FK_140AB620C54C8C93 FOREIGN KEY (type_id) REFERENCES type (id)');
        $this->addSql('CREATE INDEX IDX_140AB620C54C8C93 ON page (type_id)');
        $this->addSql('ALTER TABLE post ADD type_id INT DEFAULT NULL, ADD title VARCHAR(255) NOT NULL, ADD display_name VARCHAR(255) DEFAULT NULL, ADD display_description VARCHAR(255) DEFAULT NULL, ADD content LONGTEXT DEFAULT NULL, ADD updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', DROP name_fr, DROP name_en, DROP content_fr, DROP content_en');
        $this->addSql('ALTER TABLE post ADD CONSTRAINT FK_5A8A6C8DC54C8C93 FOREIGN KEY (type_id) REFERENCES type (id)');
        $this->addSql('CREATE INDEX IDX_5A8A6C8DC54C8C93 ON post (type_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE media DROP FOREIGN KEY FK_6A2CA10CC54C8C93');
        $this->addSql('ALTER TABLE menu DROP FOREIGN KEY FK_7D053A93C54C8C93');
        $this->addSql('ALTER TABLE page DROP FOREIGN KEY FK_140AB620C54C8C93');
        $this->addSql('ALTER TABLE post DROP FOREIGN KEY FK_5A8A6C8DC54C8C93');
        $this->addSql('CREATE TABLE media_category (id INT AUTO_INCREMENT NOT NULL, name_fr VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, slug VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, name_en VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE media_media_category (media_id INT NOT NULL, media_category_id INT NOT NULL, INDEX IDX_A818C333EA9FDD75 (media_id), INDEX IDX_A818C333E52EEF71 (media_category_id), PRIMARY KEY(media_id, media_category_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE menu_category (id INT AUTO_INCREMENT NOT NULL, name_fr VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, name_en VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, slug VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE page_category (id INT AUTO_INCREMENT NOT NULL, name_fr VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, slug VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, name_en VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE post_category (id INT AUTO_INCREMENT NOT NULL, name_fr VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, name_en VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, slug VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE post_category_post_category_type (post_category_id INT NOT NULL, post_category_type_id INT NOT NULL, INDEX IDX_30A1608EFE0617CD (post_category_id), INDEX IDX_30A1608E41B01347 (post_category_type_id), PRIMARY KEY(post_category_id, post_category_type_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE post_category_type (id INT AUTO_INCREMENT NOT NULL, name_fr VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, name_en VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, slug VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE post_post_category (post_id INT NOT NULL, post_category_id INT NOT NULL, INDEX IDX_A6D02E73FE0617CD (post_category_id), INDEX IDX_A6D02E734B89032C (post_id), PRIMARY KEY(post_id, post_category_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE tag (id INT AUTO_INCREMENT NOT NULL, author_id INT DEFAULT NULL, title_fr VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, title_en VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, slug VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, INDEX IDX_389B783F675F31B (author_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE media_media_category ADD CONSTRAINT FK_A818C333EA9FDD75 FOREIGN KEY (media_id) REFERENCES media (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE media_media_category ADD CONSTRAINT FK_A818C333E52EEF71 FOREIGN KEY (media_category_id) REFERENCES media_category (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE post_category_post_category_type ADD CONSTRAINT FK_30A1608E41B01347 FOREIGN KEY (post_category_type_id) REFERENCES post_category_type (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE post_category_post_category_type ADD CONSTRAINT FK_30A1608EFE0617CD FOREIGN KEY (post_category_id) REFERENCES post_category (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE post_post_category ADD CONSTRAINT FK_A6D02E73FE0617CD FOREIGN KEY (post_category_id) REFERENCES post_category (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE post_post_category ADD CONSTRAINT FK_A6D02E734B89032C FOREIGN KEY (post_id) REFERENCES post (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE tag ADD CONSTRAINT FK_389B783F675F31B FOREIGN KEY (author_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE category DROP FOREIGN KEY FK_64C19C1C54C8C93');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE type');
        $this->addSql('DROP INDEX IDX_6A2CA10CC54C8C93 ON media');
        $this->addSql('ALTER TABLE media DROP type_id, DROP title, DROP slug, DROP name, DROP url, DROP updated_at');
        $this->addSql('DROP INDEX IDX_7D053A93C54C8C93 ON menu');
        $this->addSql('ALTER TABLE menu ADD menu_id INT DEFAULT NULL, ADD name_en VARCHAR(255) DEFAULT NULL, CHANGE type_id menu_category_id INT DEFAULT NULL, CHANGE title name_fr VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE menu ADD CONSTRAINT FK_7D053A93CCD7E912 FOREIGN KEY (menu_id) REFERENCES menu (id)');
        $this->addSql('ALTER TABLE menu ADD CONSTRAINT FK_7D053A937ABA83AE FOREIGN KEY (menu_category_id) REFERENCES menu_category (id)');
        $this->addSql('CREATE INDEX IDX_7D053A937ABA83AE ON menu (menu_category_id)');
        $this->addSql('CREATE INDEX IDX_7D053A93CCD7E912 ON menu (menu_id)');
        $this->addSql('DROP INDEX IDX_140AB620C54C8C93 ON page');
        $this->addSql('ALTER TABLE page ADD name_en VARCHAR(255) DEFAULT NULL, DROP display_name, DROP meta, CHANGE type_id page_category_id INT DEFAULT NULL, CHANGE title name_fr VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE page ADD CONSTRAINT FK_140AB6205FAC390 FOREIGN KEY (page_category_id) REFERENCES page_category (id)');
        $this->addSql('CREATE INDEX IDX_140AB6205FAC390 ON page (page_category_id)');
        $this->addSql('DROP INDEX IDX_5A8A6C8DC54C8C93 ON post');
        $this->addSql('ALTER TABLE post ADD name_en VARCHAR(255) NOT NULL, ADD content_en LONGTEXT DEFAULT NULL, DROP type_id, DROP display_name, DROP display_description, DROP updated_at, CHANGE title name_fr VARCHAR(255) NOT NULL, CHANGE content content_fr LONGTEXT DEFAULT NULL');
    }
}
