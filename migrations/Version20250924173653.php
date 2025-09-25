<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250924173653 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE item_variant (id SERIAL NOT NULL, item_id INT NOT NULL, name VARCHAR(100) NOT NULL, sku VARCHAR(12) DEFAULT NULL, weight INT DEFAULT NULL, price NUMERIC(7, 2) DEFAULT NULL, specifications JSONB DEFAULT NULL, is_default BOOLEAN NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_FA1E99F9126F525E ON item_variant (item_id)');
        $this->addSql('CREATE UNIQUE INDEX uniq_item_default_variant ON item_variant (item_id) WHERE is_default = true');
        $this->addSql('COMMENT ON COLUMN item_variant.created_at IS \'(DC2Type:date_point)\'');
        $this->addSql('COMMENT ON COLUMN item_variant.updated_at IS \'(DC2Type:date_point)\'');
        $this->addSql('ALTER TABLE item_variant ADD CONSTRAINT FK_FA1E99F9126F525E FOREIGN KEY (item_id) REFERENCES item (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX idx_item_specifications_gin ON item (specifications)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE item_variant DROP CONSTRAINT FK_FA1E99F9126F525E');
        $this->addSql('DROP TABLE item_variant');
        $this->addSql('DROP INDEX idx_item_specifications_gin');
    }
}
