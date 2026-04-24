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

-- 1. Create the roles table
CREATE TABLE roles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL UNIQUE
);

-- 2. Insert your initial roles
INSERT INTO roles (name) VALUES ('admin'), ('customer');

-- 3. Update the customers table
ALTER TABLE customers 
ADD COLUMN password VARCHAR(255) AFTER Lname,
ADD COLUMN role_id INT DEFAULT 2 AFTER password; -- Default to 'customer'

-- 4. Set up the link (Foreign Key)
ALTER TABLE customers 
ADD CONSTRAINT fk_customer_role 
FOREIGN KEY (role_id) REFERENCES roles(id);


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;


