<?php declare(strict_types=1);

namespace Api\Data\Migration;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190509142150 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE TABLE job_jobs (id UUID NOT NULL, language_code CHAR(2) NOT NULL, name VARCHAR(255) NOT NULL, experience VARCHAR(255) NOT NULL, content TEXT NOT NULL, status CHAR(16) NOT NULL, sort INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_2F5F1B845124F222 ON job_jobs (sort)');
        $this->addSql('CREATE INDEX IDX_2F5F1B84451CDAD4 ON job_jobs (language_code)');
        $this->addSql('CREATE INDEX job_jobs_sort_idx ON job_jobs (sort)');
        $this->addSql('COMMENT ON COLUMN job_jobs.id IS \'(DC2Type:id)\'');
        $this->addSql('COMMENT ON COLUMN job_jobs.language_code IS \'(DC2Type:code)\'');
        $this->addSql('COMMENT ON COLUMN job_jobs.status IS \'(DC2Type:status)\'');
        $this->addSql('COMMENT ON COLUMN job_jobs.sort IS \'(DC2Type:sort)\'');
        $this->addSql('ALTER TABLE job_jobs ADD CONSTRAINT FK_2F5F1B84451CDAD4 FOREIGN KEY (language_code) REFERENCES lng_languages (code) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('DROP TABLE job_jobs');
    }
}
