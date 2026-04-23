-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema store_dev
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `store_dev` ;

-- -----------------------------------------------------
-- Schema store_dev
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `store_dev` DEFAULT CHARACTER SET utf8 ;
USE `store_dev` ;

-- -----------------------------------------------------
-- Table `store_dev`.`customers`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `store_dev`.`customers` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `Fname` VARCHAR(45) NOT NULL,
  `Lname` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `born_at` DATE NULL,
  `points` INT(255) NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC) VISIBLE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `store_dev`.`orders`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `store_dev`.`orders` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `customers_id` INT NOT NULL,
  `order_date` DATE NOT NULL,
  `status` VARCHAR(45) NULL,
  `arival_date` DATE NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_orders_customers_idx` (`customers_id` ASC) VISIBLE,
  CONSTRAINT `fk_orders_customers`
    FOREIGN KEY (`customers_id`)
    REFERENCES `store_dev`.`customers` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;


INSERT INTO customers (id, Fname,Lname, email, born_at, points) VALUES
(1, 'Barbara',' MacCaffrey', 'babara@gmail.com', '1986-03-28', 0),
(2, 'Alex',' Dufvey', 'Alex@gmail.com', '1986-03-28', 0),
(3, 'Epstein',' Montvids', 'Epstein@gmail.com', '1986-03-28', 0),
(4, 'Rodolf',' Reindier', 'Rodolf@gmail.com', '1999-03-28', 0);


INSERT INTO orders (id, customers_id, order_date, status, arival_date) VALUES
(1, 1, '2026-04-07', 'processing', '2026-04-12'),
(2, 1, '2025-04-07', 'shipped', '2025-04-12'),
(3, 2, '2026-04-07', 'processing', '2026-04-12'),
(4, 2, '2025-04-07', 'shipped', '2025-04-12'),
(5, 3, '2026-04-07', 'processing', '2026-04-12'),
(6, 3, '2025-04-07', 'shipped', '2025-04-12'),
(7, 3, '2026-04-07', 'processing', '2026-04-12');