<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250924202316 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE kit (id SERIAL NOT NULL, owner_id INT NOT NULL, name VARCHAR(150) NOT NULL, slug VARCHAR(255) NOT NULL, description TEXT DEFAULT NULL, is_public BOOLEAN NOT NULL, stats JSONB DEFAULT NULL, activity_type VARCHAR(255) NOT NULL, season VARCHAR(255) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_589498187E3C61F9 ON kit (owner_id)');
        $this->addSql('COMMENT ON COLUMN kit.created_at IS \'(DC2Type:date_point)\'');
        $this->addSql('COMMENT ON COLUMN kit.updated_at IS \'(DC2Type:date_point)\'');
        $this->addSql('CREATE TABLE kit_item (id SERIAL NOT NULL, kit_id INT NOT NULL, variant_id INT NOT NULL, quantity INT NOT NULL, personal_notes TEXT DEFAULT NULL, added_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_E222877D3A8E60EF ON kit_item (kit_id)');
        $this->addSql('CREATE INDEX IDX_E222877D3B69A9AF ON kit_item (variant_id)');
        $this->addSql('CREATE UNIQUE INDEX uniq_kit_variant ON kit_item (kit_id, variant_id)');
        $this->addSql('COMMENT ON COLUMN kit_item.added_at IS \'(DC2Type:date_point)\'');
        $this->addSql('ALTER TABLE kit ADD CONSTRAINT FK_589498187E3C61F9 FOREIGN KEY (owner_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE kit_item ADD CONSTRAINT FK_E222877D3A8E60EF FOREIGN KEY (kit_id) REFERENCES kit (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE kit_item ADD CONSTRAINT FK_E222877D3B69A9AF FOREIGN KEY (variant_id) REFERENCES item_variant (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('DROP INDEX uniq_item_default_variant');
        $this->addSql('CREATE UNIQUE INDEX uniq_item_default_variant ON item_variant (item_id) WHERE is_default = true');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE kit DROP CONSTRAINT FK_589498187E3C61F9');
        $this->addSql('ALTER TABLE kit_item DROP CONSTRAINT FK_E222877D3A8E60EF');
        $this->addSql('ALTER TABLE kit_item DROP CONSTRAINT FK_E222877D3B69A9AF');
        $this->addSql('DROP TABLE kit');
        $this->addSql('DROP TABLE kit_item');
        $this->addSql('DROP INDEX uniq_item_default_variant');
        $this->addSql('CREATE UNIQUE INDEX uniq_item_default_variant ON item_variant (item_id) WHERE (is_default = true)');
    }
}
