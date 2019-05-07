<?php declare(strict_types=1);

namespace Api\Data\Migration;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190507121808 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE TABLE nav_menu (id UUID NOT NULL, language_code CHAR(2) NOT NULL, name VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, status CHAR(16) NOT NULL, sort INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_B6FB79F85124F222 ON nav_menu (sort)');
        $this->addSql('CREATE INDEX IDX_B6FB79F8451CDAD4 ON nav_menu (language_code)');
        $this->addSql('CREATE INDEX sort_idx ON nav_menu (sort)');
        $this->addSql('CREATE UNIQUE INDEX menu_unique ON nav_menu (language_code, slug)');
        $this->addSql('COMMENT ON COLUMN nav_menu.id IS \'(DC2Type:id)\'');
        $this->addSql('COMMENT ON COLUMN nav_menu.language_code IS \'(DC2Type:code)\'');
        $this->addSql('COMMENT ON COLUMN nav_menu.status IS \'(DC2Type:status)\'');
        $this->addSql('COMMENT ON COLUMN nav_menu.sort IS \'(DC2Type:sort)\'');
        $this->addSql('ALTER TABLE nav_menu ADD CONSTRAINT FK_B6FB79F8451CDAD4 FOREIGN KEY (language_code) REFERENCES lng_languages (code) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('DROP TABLE nav_menu');
    }
}
