<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190131134214 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE categorie (id INT AUTO_INCREMENT NOT NULL, topics_id INT NOT NULL, name VARCHAR(30) NOT NULL, topic VARCHAR(255) NOT NULL, INDEX IDX_497DD634BF06A414 (topics_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE message (id INT AUTO_INCREMENT NOT NULL, id_topic_id INT NOT NULL, id_message_id INT NOT NULL, msg VARCHAR(255) NOT NULL, date_msg DATETIME NOT NULL, INDEX IDX_B6BD307F4F8ECCA8 (id_topic_id), INDEX IDX_B6BD307FF6F093FE (id_message_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE topic (id INT AUTO_INCREMENT NOT NULL, id_categorie_id INT NOT NULL, id_user_id INT NOT NULL, name_topic VARCHAR(30) NOT NULL, INDEX IDX_9D40DE1B9F34925F (id_categorie_id), INDEX IDX_9D40DE1B79F37AE5 (id_user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, name_user VARCHAR(30) NOT NULL, email VARCHAR(50) NOT NULL, password VARCHAR(60) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE categorie ADD CONSTRAINT FK_497DD634BF06A414 FOREIGN KEY (topics_id) REFERENCES topic (id)');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307F4F8ECCA8 FOREIGN KEY (id_topic_id) REFERENCES topic (id)');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307FF6F093FE FOREIGN KEY (id_message_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE topic ADD CONSTRAINT FK_9D40DE1B9F34925F FOREIGN KEY (id_categorie_id) REFERENCES categorie (id)');
        $this->addSql('ALTER TABLE topic ADD CONSTRAINT FK_9D40DE1B79F37AE5 FOREIGN KEY (id_user_id) REFERENCES user (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE topic DROP FOREIGN KEY FK_9D40DE1B9F34925F');
        $this->addSql('ALTER TABLE categorie DROP FOREIGN KEY FK_497DD634BF06A414');
        $this->addSql('ALTER TABLE message DROP FOREIGN KEY FK_B6BD307F4F8ECCA8');
        $this->addSql('ALTER TABLE message DROP FOREIGN KEY FK_B6BD307FF6F093FE');
        $this->addSql('ALTER TABLE topic DROP FOREIGN KEY FK_9D40DE1B79F37AE5');
        $this->addSql('DROP TABLE categorie');
        $this->addSql('DROP TABLE message');
        $this->addSql('DROP TABLE topic');
        $this->addSql('DROP TABLE user');
    }
}
