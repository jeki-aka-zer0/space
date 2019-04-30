<?php declare(strict_types=1);

namespace Api\Data\Migration;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190429152138 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE TABLE lng_languages (code VARCHAR(2) NOT NULL, name VARCHAR(255) NOT NULL, create_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, update_date TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, status VARCHAR(16) NOT NULL, sort INT NOT NULL, PRIMARY KEY(code))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_2D7683985E237E06 ON lng_languages (name)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_2D7683985124F222 ON lng_languages (sort)');
        $this->addSql('CREATE INDEX search_idx ON lng_languages (code)');
        $this->addSql('CREATE INDEX sort_idx ON lng_languages (sort)');
        $this->addSql('COMMENT ON COLUMN lng_languages.code IS \'(DC2Type:code)\'');
        $this->addSql('COMMENT ON COLUMN lng_languages.create_date IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN lng_languages.update_date IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN lng_languages.status IS \'(DC2Type:status)\'');
        $this->addSql('COMMENT ON COLUMN lng_languages.sort IS \'(DC2Type:sort)\'');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('DROP TABLE lng_languages');
    }
}
