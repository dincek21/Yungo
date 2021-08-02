<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210714192150 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE direccion (id INT AUTO_INCREMENT NOT NULL, fk_packet_id INT NOT NULL, clientes_id INT NOT NULL, name_address VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_F384BE959F50DAFB (fk_packet_id), INDEX IDX_F384BE95FBC3AF09 (clientes_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE usuario (id INT AUTO_INCREMENT NOT NULL, name_user VARCHAR(255) NOT NULL, lastname_user VARCHAR(255) NOT NULL, age_user INT NOT NULL, picture_user VARCHAR(255) DEFAULT NULL, email_user VARCHAR(255) NOT NULL, pass_user VARCHAR(255) NOT NULL, rol_user VARCHAR(20) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE direccion ADD CONSTRAINT FK_F384BE959F50DAFB FOREIGN KEY (fk_packet_id) REFERENCES paquete (id)');
        $this->addSql('ALTER TABLE direccion ADD CONSTRAINT FK_F384BE95FBC3AF09 FOREIGN KEY (clientes_id) REFERENCES clientes (id)');
        $this->addSql('ALTER TABLE clientes DROP address_client');
        $this->addSql('ALTER TABLE comentarios ADD fk_ticket_id INT NOT NULL');
        $this->addSql('ALTER TABLE comentarios ADD CONSTRAINT FK_F54B3FC011599042 FOREIGN KEY (fk_ticket_id) REFERENCES ticket (id)');
        $this->addSql('CREATE INDEX IDX_F54B3FC011599042 ON comentarios (fk_ticket_id)');
        $this->addSql('ALTER TABLE ticket ADD fk_client_id INT NOT NULL');
        $this->addSql('ALTER TABLE ticket ADD CONSTRAINT FK_97A0ADA378B2BEB1 FOREIGN KEY (fk_client_id) REFERENCES clientes (id)');
        $this->addSql('CREATE INDEX IDX_97A0ADA378B2BEB1 ON ticket (fk_client_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE direccion');
        $this->addSql('DROP TABLE usuario');
        $this->addSql('ALTER TABLE clientes ADD address_client VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE comentarios DROP FOREIGN KEY FK_F54B3FC011599042');
        $this->addSql('DROP INDEX IDX_F54B3FC011599042 ON comentarios');
        $this->addSql('ALTER TABLE comentarios DROP fk_ticket_id');
        $this->addSql('ALTER TABLE ticket DROP FOREIGN KEY FK_97A0ADA378B2BEB1');
        $this->addSql('DROP INDEX IDX_97A0ADA378B2BEB1 ON ticket');
        $this->addSql('ALTER TABLE ticket DROP fk_client_id');
    }
}
