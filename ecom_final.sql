-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema ecom_final
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema ecom_final
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `ecom_final` DEFAULT CHARACTER SET utf8 ;
USE `ecom_final` ;

-- -----------------------------------------------------
-- Table `ecom_final`.`cards`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ecom_final`.`cards` (
  `number` VARCHAR(16) NOT NULL,
  `cvv` INT(11) NULL DEFAULT NULL,
  `type` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`number`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `ecom_final`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ecom_final`.`users` (
  `id` VARCHAR(32) NOT NULL,
  `password` VARCHAR(144) NULL DEFAULT NULL,
  `email` VARCHAR(45) NULL DEFAULT NULL,
  `email_verified_at` VARCHAR(45) NULL DEFAULT NULL,
  `remember_token` VARCHAR(45) NULL DEFAULT NULL,
  `updated_at` DATETIME NULL DEFAULT NULL,
  `created_at` DATETIME NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `ecom_final`.`customers`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ecom_final`.`customers` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `user_id` VARCHAR(32) NOT NULL,
  `firstName` VARCHAR(45) NULL DEFAULT NULL,
  `lastName` VARCHAR(45) NULL DEFAULT NULL,
  `phone` VARCHAR(45) NULL DEFAULT NULL,
  `address` VARCHAR(144) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_customers_users1_idx` (`user_id` ASC),
  CONSTRAINT `fk_customers_users1`
    FOREIGN KEY (`user_id`)
    REFERENCES `ecom_final`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 6
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `ecom_final`.`sellers`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ecom_final`.`sellers` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `user_id` VARCHAR(32) NOT NULL,
  `firstName` VARCHAR(45) NULL DEFAULT NULL,
  `lastName` VARCHAR(45) NULL DEFAULT NULL,
  `phone` VARCHAR(45) NULL DEFAULT NULL,
  `address` VARCHAR(144) NULL DEFAULT NULL,
  `income` FLOAT NULL DEFAULT NULL,
  `profit` FLOAT NULL DEFAULT NULL,
  `expense` FLOAT NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_sellers_users1_idx` (`user_id` ASC),
  CONSTRAINT `fk_sellers_users1`
    FOREIGN KEY (`user_id`)
    REFERENCES `ecom_final`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 19
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `ecom_final`.`stores`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ecom_final`.`stores` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `seller_id` INT(11) NOT NULL,
  `name` VARCHAR(45) NULL DEFAULT NULL,
  `visibility` TINYINT(4) NULL DEFAULT NULL,
  `created_at` DATETIME NULL DEFAULT NULL,
  `updated_at` DATETIME NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_stores_sellers1_idx` (`seller_id` ASC),
  CONSTRAINT `fk_stores_sellers1`
    FOREIGN KEY (`seller_id`)
    REFERENCES `ecom_final`.`sellers` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 14
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `ecom_final`.`products`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ecom_final`.`products` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `store_id` INT(11) NOT NULL,
  `name` VARCHAR(45) NULL DEFAULT NULL,
  `quantity` INT(11) NULL DEFAULT NULL,
  `price` FLOAT NULL DEFAULT NULL,
  `description` VARCHAR(255) NULL DEFAULT NULL,
  `image` VARCHAR(99) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_products_stores1_idx` (`store_id` ASC),
  CONSTRAINT `fk_products_stores1`
    FOREIGN KEY (`store_id`)
    REFERENCES `ecom_final`.`stores` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 5
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `ecom_final`.`carts`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ecom_final`.`carts` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `customer_id` INT(11) NOT NULL,
  `product_id` INT(11) NOT NULL,
  `store_id` INT(11) NOT NULL,
  `quantity` VARCHAR(45) NULL DEFAULT NULL,
  `price` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_cart_customer1_idx` (`customer_id` ASC),
  INDEX `fk_cart_product1_idx` (`product_id` ASC),
  INDEX `fk_cart_store1_idx` (`store_id` ASC),
  CONSTRAINT `fk_cart_customer1`
    FOREIGN KEY (`customer_id`)
    REFERENCES `ecom_final`.`customers` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_cart_product1`
    FOREIGN KEY (`product_id`)
    REFERENCES `ecom_final`.`products` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_cart_store1`
    FOREIGN KEY (`store_id`)
    REFERENCES `ecom_final`.`stores` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `ecom_final`.`invoices`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ecom_final`.`invoices` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `created_at` DATETIME NULL DEFAULT NULL,
  `updated_at` DATETIME NULL DEFAULT NULL,
  `status` VARCHAR(45) NULL DEFAULT NULL,
  `total_amount` FLOAT NULL DEFAULT NULL,
  `subtotal` FLOAT NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `ecom_final`.`orders`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ecom_final`.`orders` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `customer_id` INT(11) NOT NULL,
  `seller_id` INT(11) NOT NULL,
  `created_at` DATETIME NULL DEFAULT NULL,
  `updated_at` VARCHAR(45) NULL DEFAULT NULL,
  `totalAmount` FLOAT NULL DEFAULT NULL,
  `status` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_orders_customer1_idx` (`customer_id` ASC),
  INDEX `fk_orders_seller1_idx` (`seller_id` ASC),
  CONSTRAINT `fk_orders_customer1`
    FOREIGN KEY (`customer_id`)
    REFERENCES `ecom_final`.`customers` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_orders_seller1`
    FOREIGN KEY (`seller_id`)
    REFERENCES `ecom_final`.`sellers` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `ecom_final`.`order_details`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ecom_final`.`order_details` (
  `order_id` INT(11) NOT NULL,
  `product_id` INT(11) NOT NULL,
  `quantity` INT(11) NULL DEFAULT NULL,
  `price` FLOAT NULL DEFAULT NULL,
  PRIMARY KEY (`order_id`, `product_id`),
  INDEX `fk_orders_has_product_product1_idx` (`product_id` ASC),
  INDEX `fk_orders_has_product_orders1_idx` (`order_id` ASC),
  CONSTRAINT `fk_orders_has_product_orders1`
    FOREIGN KEY (`order_id`)
    REFERENCES `ecom_final`.`orders` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_orders_has_product_product1`
    FOREIGN KEY (`product_id`)
    REFERENCES `ecom_final`.`products` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `ecom_final`.`payments`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ecom_final`.`payments` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `orders_id` INT(11) NOT NULL,
  `invoice_id` INT(11) NOT NULL,
  `card_number` VARCHAR(16) NOT NULL,
  `date` DATETIME NULL DEFAULT NULL,
  `charge_amount` FLOAT NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_payment_card1_idx` (`card_number` ASC),
  INDEX `fk_payment_invoice1_idx` (`invoice_id` ASC),
  INDEX `fk_payment_orders1_idx` (`orders_id` ASC),
  CONSTRAINT `fk_payment_card1`
    FOREIGN KEY (`card_number`)
    REFERENCES `ecom_final`.`cards` (`number`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_payment_invoice1`
    FOREIGN KEY (`invoice_id`)
    REFERENCES `ecom_final`.`invoices` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_payment_orders1`
    FOREIGN KEY (`orders_id`)
    REFERENCES `ecom_final`.`orders` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `ecom_final`.`product_details`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ecom_final`.`product_details` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `products_id` INT(11) NOT NULL,
  `color` VARCHAR(45) NULL DEFAULT NULL,
  `size` VARCHAR(45) NULL DEFAULT NULL,
  `weight` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_product_details_products1_idx` (`products_id` ASC),
  CONSTRAINT `fk_product_details_products1`
    FOREIGN KEY (`products_id`)
    REFERENCES `ecom_final`.`products` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `ecom_final`.`reviews`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ecom_final`.`reviews` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `product_id` INT(11) NOT NULL,
  `customer_id` INT(11) NOT NULL,
  `description` VARCHAR(45) NULL DEFAULT NULL,
  `rate` INT(11) NULL DEFAULT NULL,
  `date` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_review_product1_idx` (`product_id` ASC),
  INDEX `fk_review_customer1_idx` (`customer_id` ASC),
  CONSTRAINT `fk_review_customer1`
    FOREIGN KEY (`customer_id`)
    REFERENCES `ecom_final`.`customers` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_review_product1`
    FOREIGN KEY (`product_id`)
    REFERENCES `ecom_final`.`products` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `ecom_final`.`shippings`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ecom_final`.`shippings` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `method` VARCHAR(45) NULL DEFAULT NULL,
  `vendor` VARCHAR(45) NULL DEFAULT NULL,
  `expectedDuration` DATETIME NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `ecom_final`.`shipping_details`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ecom_final`.`shipping_details` (
  `shipping_id` INT(11) NOT NULL,
  `orders_id` INT(11) NOT NULL,
  `created_at` DATETIME NULL DEFAULT NULL,
  `updated_at` DATETIME NULL DEFAULT NULL,
  `status` VARCHAR(45) NULL DEFAULT NULL,
  `ship_address` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`shipping_id`, `orders_id`),
  INDEX `fk_shipping_has_orders_orders1_idx` (`orders_id` ASC),
  INDEX `fk_shipping_has_orders_shipping1_idx` (`shipping_id` ASC),
  CONSTRAINT `fk_shipping_has_orders_orders1`
    FOREIGN KEY (`orders_id`)
    REFERENCES `ecom_final`.`orders` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_shipping_has_orders_shipping1`
    FOREIGN KEY (`shipping_id`)
    REFERENCES `ecom_final`.`shippings` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `ecom_final`.`wishlists`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ecom_final`.`wishlists` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `customer_id` INT(11) NOT NULL,
  `store_id` INT(11) NOT NULL,
  `product_id` INT(11) NOT NULL,
  `date_added` DATETIME NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_wishlist_product1_idx` (`product_id` ASC),
  INDEX `fk_wishlist_customer1_idx` (`customer_id` ASC),
  INDEX `fk_wishlist_store1_idx` (`store_id` ASC),
  CONSTRAINT `fk_wishlist_customer1`
    FOREIGN KEY (`customer_id`)
    REFERENCES `ecom_final`.`customers` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_wishlist_product1`
    FOREIGN KEY (`product_id`)
    REFERENCES `ecom_final`.`products` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_wishlist_store1`
    FOREIGN KEY (`store_id`)
    REFERENCES `ecom_final`.`stores` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `ecom_final`.`customer_cardss`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ecom_final`.`customer_cardss` (
  `cards_number` VARCHAR(16) NOT NULL,
  `customers_id` INT(11) NOT NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`cards_number`, `customers_id`),
  INDEX `fk_cards_has_customers_customers1_idx` (`customers_id` ASC),
  INDEX `fk_cards_has_customers_cards1_idx` (`cards_number` ASC),
  CONSTRAINT `fk_cards_has_customers_cards1`
    FOREIGN KEY (`cards_number`)
    REFERENCES `ecom_final`.`cards` (`number`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_cards_has_customers_customers1`
    FOREIGN KEY (`customers_id`)
    REFERENCES `ecom_final`.`customers` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
