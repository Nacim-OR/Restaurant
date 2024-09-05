<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240905093511 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE menu_commande (menu_id INT NOT NULL, commande_id INT NOT NULL, INDEX IDX_42BBE3EBCCD7E912 (menu_id), INDEX IDX_42BBE3EB82EA2E54 (commande_id), PRIMARY KEY(menu_id, commande_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE produit_commande (produit_id INT NOT NULL, commande_id INT NOT NULL, INDEX IDX_47F5946EF347EFB (produit_id), INDEX IDX_47F5946E82EA2E54 (commande_id), PRIMARY KEY(produit_id, commande_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE produit_menu (produit_id INT NOT NULL, menu_id INT NOT NULL, INDEX IDX_549D477CF347EFB (produit_id), INDEX IDX_549D477CCCD7E912 (menu_id), PRIMARY KEY(produit_id, menu_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE menu_commande ADD CONSTRAINT FK_42BBE3EBCCD7E912 FOREIGN KEY (menu_id) REFERENCES menu (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE menu_commande ADD CONSTRAINT FK_42BBE3EB82EA2E54 FOREIGN KEY (commande_id) REFERENCES commande (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE produit_commande ADD CONSTRAINT FK_47F5946EF347EFB FOREIGN KEY (produit_id) REFERENCES produit (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE produit_commande ADD CONSTRAINT FK_47F5946E82EA2E54 FOREIGN KEY (commande_id) REFERENCES commande (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE produit_menu ADD CONSTRAINT FK_549D477CF347EFB FOREIGN KEY (produit_id) REFERENCES produit (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE produit_menu ADD CONSTRAINT FK_549D477CCCD7E912 FOREIGN KEY (menu_id) REFERENCES menu (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE commande ADD user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67DA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_6EEAA67DA76ED395 ON commande (user_id)');
        $this->addSql('ALTER TABLE produit ADD categorie_id INT NOT NULL');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC27BCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id)');
        $this->addSql('CREATE INDEX IDX_29A5EC27BCF5E72D ON produit (categorie_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE menu_commande DROP FOREIGN KEY FK_42BBE3EBCCD7E912');
        $this->addSql('ALTER TABLE menu_commande DROP FOREIGN KEY FK_42BBE3EB82EA2E54');
        $this->addSql('ALTER TABLE produit_commande DROP FOREIGN KEY FK_47F5946EF347EFB');
        $this->addSql('ALTER TABLE produit_commande DROP FOREIGN KEY FK_47F5946E82EA2E54');
        $this->addSql('ALTER TABLE produit_menu DROP FOREIGN KEY FK_549D477CF347EFB');
        $this->addSql('ALTER TABLE produit_menu DROP FOREIGN KEY FK_549D477CCCD7E912');
        $this->addSql('DROP TABLE menu_commande');
        $this->addSql('DROP TABLE produit_commande');
        $this->addSql('DROP TABLE produit_menu');
        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67DA76ED395');
        $this->addSql('DROP INDEX IDX_6EEAA67DA76ED395 ON commande');
        $this->addSql('ALTER TABLE commande DROP user_id');
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC27BCF5E72D');
        $this->addSql('DROP INDEX IDX_29A5EC27BCF5E72D ON produit');
        $this->addSql('ALTER TABLE produit DROP categorie_id');
    }
}
