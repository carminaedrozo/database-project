
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
        REFERENCES `request` (`Request_ID`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- order
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `order`;

CREATE TABLE `order`
(
    `Order_ID` INTEGER NOT NULL,
    `Commission` INTEGER NOT NULL,
    `Amount` INTEGER NOT NULL,
    `Date` DATE NOT NULL,
    `Delivery_Date` DATE NOT NULL,
    `ProductList_ID` INTEGER NOT NULL,
    PRIMARY KEY (`Order_ID`)
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
    `Product_ID` INTEGER NOT NULL AUTO_INCREMENT,
    `Title` TEXT NOT NULL,
    `Author` TEXT NOT NULL,
    `Edition` INTEGER NOT NULL,
    `ISBN` TEXT NOT NULL,
    `Price` DOUBLE NOT NULL,
    PRIMARY KEY (`Product_ID`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- productlist
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `productlist`;

CREATE TABLE `productlist`
(
    `ProductList_ID` INTEGER NOT NULL AUTO_INCREMENT,
    `Product_ID` INTEGER NOT NULL,
    `Count` INTEGER NOT NULL,
    PRIMARY KEY (`ProductList_ID`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- provider
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `provider`;

CREATE TABLE `provider`
(
    `Provider_ID` INTEGER NOT NULL AUTO_INCREMENT,
    `Provider_Name` TEXT NOT NULL,
    `Provider_Phone` INTEGER NOT NULL,
    `Provider_Address` TEXT NOT NULL,
    `OrderList_ID` INTEGER NOT NULL,
    PRIMARY KEY (`Provider_ID`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- request
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `request`;

CREATE TABLE `request`
(
    `Request_ID` INTEGER NOT NULL AUTO_INCREMENT,
    `ProductList_ID` INTEGER NOT NULL,
    PRIMARY KEY (`Request_ID`)
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
    `User_Login` TEXT NOT NULL,
    `ProductList_ID` INTEGER NOT NULL
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- user
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user`
(
    `User_Login` TEXT NOT NULL,
    `User_Password` TEXT NOT NULL,
    `User_Email` TEXT NOT NULL,
    `User_FullName` TEXT NOT NULL,
    `User_Status` bit(1) NOT NULL,
    `User_LastAccess` DATETIME NOT NULL,
    `User_LastUpdate` DATETIME NOT NULL,
    PRIMARY KEY (`User_Login`)
) ENGINE=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
