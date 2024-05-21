<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240521124207 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE events ADD id_events INT DEFAULT NULL, ADD price DOUBLE PRECISION DEFAULT NULL');
        
        $this->addSql('CREATE INDEX IDX_5387574A93CB796C ON events (id_events)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE events DROP FOREIGN KEY FK_5387574A93CB796C');
        $this->addSql('DROP INDEX IDX_5387574A93CB796C ON events');
        $this->addSql(' DROP id_events, DROP price');
    }
}
