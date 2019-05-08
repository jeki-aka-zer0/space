<?php declare(strict_types=1);

namespace Api\Data\Migration;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190508143939 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE TABLE project_projects (id UUID NOT NULL, language_code CHAR(2) NOT NULL, name VARCHAR(255) NOT NULL, content TEXT NOT NULL, status CHAR(16) NOT NULL, sort INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_61DD387F5124F222 ON project_projects (sort)');
        $this->addSql('CREATE INDEX IDX_61DD387F451CDAD4 ON project_projects (language_code)');
        $this->addSql('CREATE INDEX project_projects_sort_idx ON project_projects (sort)');
        $this->addSql('COMMENT ON COLUMN project_projects.id IS \'(DC2Type:id)\'');
        $this->addSql('COMMENT ON COLUMN project_projects.language_code IS \'(DC2Type:code)\'');
        $this->addSql('COMMENT ON COLUMN project_projects.status IS \'(DC2Type:status)\'');
        $this->addSql('COMMENT ON COLUMN project_projects.sort IS \'(DC2Type:sort)\'');
        $this->addSql('ALTER TABLE project_projects ADD CONSTRAINT FK_61DD387F451CDAD4 FOREIGN KEY (language_code) REFERENCES lng_languages (code) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('DROP TABLE project_projects');
    }
}
