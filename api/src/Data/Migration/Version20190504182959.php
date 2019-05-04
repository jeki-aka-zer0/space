<?php declare(strict_types=1);

namespace Api\Data\Migration;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190504182959 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('ALTER TABLE txt_texts ADD language_code CHAR(2) NOT NULL');
        $this->addSql('COMMENT ON COLUMN txt_texts.language_code IS \'(DC2Type:code)\'');
        $this->addSql('ALTER TABLE txt_texts ADD CONSTRAINT FK_91BA6EA451CDAD4 FOREIGN KEY (language_code) REFERENCES lng_languages (code) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_91BA6EA451CDAD4 ON txt_texts (language_code)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('ALTER TABLE txt_texts DROP CONSTRAINT FK_91BA6EA451CDAD4');
        $this->addSql('DROP INDEX IDX_91BA6EA451CDAD4');
        $this->addSql('ALTER TABLE txt_texts DROP language_code');
    }
}
