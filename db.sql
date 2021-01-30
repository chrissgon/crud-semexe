CREATE TABLE `semexe`.`Persons` ( 
    `PersonID` INT NOT NULL AUTO_INCREMENT ,
    `Name` VARCHAR(150) NOT NULL ,
    `CPF` CHAR(14) NOT NULL ,
    `Email` VARCHAR(255) NOT NULL ,
    `Phone` CHAR(14) NOT NULL ,
    `Zipcode` CHAR(9) NOT NULL ,
    `Address` VARCHAR(255) NOT NULL ,
    `Number` INT(10) NOT NULL ,
    `Complement` VARCHAR(150) NOT NULL ,
    `City` VARCHAR(100) NOT NULL ,
    `State` CHAR(2) NOT NULL ,
    PRIMARY KEY (`PersonID`)
) ENGINE = InnoDB;

INSERT INTO `Persons` (`PersonID`, `Name`, `CPF`, `Email`, `Phone`, `Zipcode`, `Address`, `Number`, `Complement`, `City`, `State`) VALUES (NULL, 'a', 'a', 'a', 'a', 'a', 'a', '1', 'a', 'a', 'a')