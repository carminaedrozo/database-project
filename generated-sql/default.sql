
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

-- ---------------------------------------------------------------------
-- employee
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `employee`;

CREATE TABLE `employee`
(
    `User_Login` TEXT NOT NULL,
    `Request_ID` INTEGER NOT NULL,
    INDEX `Request_ID` (`Request_ID`),
    CONSTRAINT `employee_ibfk_1`
        FOREIGN KEY (`Request_ID`)
        REFERENCES `requestlist` (`Request_ID`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- employeeorderstatus
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `employeeorderstatus`;

CREATE TABLE `employeeorderstatus`
(
    `ID` INTEGER NOT NULL AUTO_INCREMENT,
    `Product_ID` INTEGER NOT NULL,
    `ReceivedCount` INTEGER NOT NULL,
    `FufilledStatus` bit(11) NOT NULL,
    `Count` INTEGER NOT NULL,
    PRIMARY KEY (`ID`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- info
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `info`;

CREATE TABLE `info`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `first_name` VARCHAR(255) NOT NULL,
    `last_name` VARCHAR(255) NOT NULL,
    `phone_number` VARCHAR(255) NOT NULL,
    `address` VARCHAR(255) NOT NULL,
    `city` VARCHAR(255) NOT NULL,
    `state` VARCHAR(255) NOT NULL,
    `zip` VARCHAR(255) NOT NULL,
    `user_id` INTEGER NOT NULL,
    PRIMARY KEY (`id`),
    INDEX `user_id` (`user_id`),
    CONSTRAINT `info_ibfk_1`
        FOREIGN KEY (`user_id`)
        REFERENCES `user` (`id`)
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- orderlist
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `orderlist`;

CREATE TABLE `orderlist`
(
    `OrderList_ID` INTEGER NOT NULL AUTO_INCREMENT,
    `Order_ID` INTEGER NOT NULL,
    PRIMARY KEY (`OrderList_ID`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- product
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `product`;

CREATE TABLE `product`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `title` VARCHAR(255) NOT NULL,
    `author` VARCHAR(255) NOT NULL,
    `edition` VARCHAR(255) NOT NULL,
    `isbn10` VARCHAR(255) NOT NULL,
    `isbn13` VARCHAR(255) NOT NULL,
    `publisher` VARCHAR(255) NOT NULL,
    `price` DECIMAL(19,4) NOT NULL,
    `image_url` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- provider
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `provider`;

CREATE TABLE `provider`
(
    `Provider_ID` INTEGER NOT NULL AUTO_INCREMENT,
    `Provider_Name` TEXT NOT NULL,
    `Provider_Phone` BIGINT(11) NOT NULL,
    `Provider_Address` TEXT NOT NULL,
    `OrderList_ID` INTEGER NOT NULL,
    PRIMARY KEY (`Provider_ID`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- providerorder
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `providerorder`;

CREATE TABLE `providerorder`
(
    `Order_ID` INTEGER NOT NULL,
    `Commission` DOUBLE NOT NULL,
    `Amount` DOUBLE NOT NULL,
    `Date` DATE NOT NULL,
    `Delivered_Date` DATE NOT NULL,
    `Status_ID` INTEGER NOT NULL,
    PRIMARY KEY (`Order_ID`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- providerorderstatus
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `providerorderstatus`;

CREATE TABLE `providerorderstatus`
(
    `ID` INTEGER NOT NULL,
    `Product_ID` INTEGER NOT NULL,
    `ReceivedCount` INTEGER NOT NULL,
    `FulfilledStatus` INTEGER NOT NULL,
    `Count` INTEGER NOT NULL,
    PRIMARY KEY (`ID`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- requestlist
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `requestlist`;

CREATE TABLE `requestlist`
(
    `Request_ID` INTEGER NOT NULL AUTO_INCREMENT,
    `Order_ID` INTEGER NOT NULL,
    `Status` INTEGER NOT NULL,
    PRIMARY KEY (`Request_ID`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- requestorder
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `requestorder`;

CREATE TABLE `requestorder`
(
    `Order_ID` INTEGER NOT NULL,
    `Commission` DOUBLE NOT NULL,
    `Amount` DOUBLE NOT NULL,
    `Date` DATE NOT NULL,
    `Delivered_Date` DATE NOT NULL,
    `Status_ID` INTEGER NOT NULL,
    PRIMARY KEY (`Order_ID`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- session
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `session`;

CREATE TABLE `session`
(
    `Session_ID` bit(16) NOT NULL,
    `Session_IP` TEXT NOT NULL,
    `Session_State` bit(3) NOT NULL,
    `Session_Time` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `User_Login` TEXT NOT NULL,
    PRIMARY KEY (`Session_ID`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- storage
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `storage`;

CREATE TABLE `storage`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `product_id` INTEGER NOT NULL,
    `count` INTEGER DEFAULT 0,
    PRIMARY KEY (`id`),
    INDEX `storage_ibfk_1` (`product_id`),
    CONSTRAINT `storage_ibfk_1`
        FOREIGN KEY (`product_id`)
        REFERENCES `product` (`id`)
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- user
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `email` VARCHAR(255) NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    `status` bit(1) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
