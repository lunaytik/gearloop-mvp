<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250929162019 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX uniq_item_default_variant');
        $this->addSql('CREATE UNIQUE INDEX uniq_item_default_variant ON item_variant (item_id) WHERE is_default = true');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_58949818989D9B62 ON kit (slug)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP INDEX UNIQ_58949818989D9B62');
        $this->addSql('DROP INDEX uniq_item_default_variant');
        $this->addSql('CREATE UNIQUE INDEX uniq_item_default_variant ON item_variant (item_id) WHERE (is_default = true)');
    }
}
