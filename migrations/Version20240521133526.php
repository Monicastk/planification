<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240521133526 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE registration (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) DEFAULT NULL, lastname VARCHAR(255) DEFAULT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE events ADD file_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE events ADD CONSTRAINT FK_5387574A93CB796C FOREIGN KEY (file_id) REFERENCES file (id)');
        $this->addSql('CREATE INDEX IDX_5387574A93CB796C ON events (file_id)');
        $this->addSql('DROP INDEX id_events ON file');
        $this->addSql('ALTER TABLE file ADD file_id INT DEFAULT NULL, DROP id_events');
        $this->addSql('ALTER TABLE file ADD CONSTRAINT FK_8C9F361093CB796C FOREIGN KEY (file_id) REFERENCES events (id)');
        $this->addSql('CREATE INDEX IDX_8C9F361093CB796C ON file (file_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE registration');
        $this->addSql('ALTER TABLE events DROP FOREIGN KEY FK_5387574A93CB796C');
        $this->addSql('DROP INDEX IDX_5387574A93CB796C ON events');
        $this->addSql('ALTER TABLE events DROP file_id');
        $this->addSql('ALTER TABLE file DROP FOREIGN KEY FK_8C9F361093CB796C');
        $this->addSql('DROP INDEX IDX_8C9F361093CB796C ON file');
        $this->addSql('ALTER TABLE file ADD id_events INT NOT NULL, DROP file_id');
        $this->addSql('CREATE INDEX id_events ON file (id_events)');
    }
}
