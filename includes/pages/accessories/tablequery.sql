
CREATE TABLE IF NOT EXISTS `industry` (
    `industry_id` INT NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(225) NOT NULL,
    `description` VARCHAR(225) NOT NULL,
    PRIMARY KEY (`industry_id`)
)
ENGINE = InnoDB;
INSERT INTO industry(industry_id, name, description) VALUES 
(NULL, 'Agriculture', 'Agriculture'),
(NULL, 'Banking', 'Banking'),
(NULL, 'Financial', 'Financial'),
(NULL, 'Entertainment', 'Entertainment');


CREATE TABLE IF NOT EXISTS `category` (
    `category_id` INT NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(225) NOT NULL,
    `description` VARCHAR(225) NOT NULL,
    `slug` VARCHAR(225) NOT NULL,
    PRIMARY KEY (`category_id`)
)
ENGINE = InnoDB;
INSERT INTO category (category_id, name, description, slug) VALUES
(NULL, 'sales and marketing', 'sales and marketing descipline, teaches how to sell', 'sales-and-marketing'),
(NULL, 'accounting', 'accounting discipline, teaches how to count', 'accounting'),
(NULL, 'business development', 'business development discipline, teaches how to market', 'business-development'),
(NULL, 'Financial Planning', 'Financial Planning discipline, teaches how to plan', 'financial-planning');

CREATE TABLE IF NOT EXISTS `status` (
    `status_id` INT NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(225) NOT NULL,
    PRIMARY KEY (`status_id`)
)
ENGINE = InnoDB;
INSERT INTO status (status_id, name) VALUES
(Null, 'external'),
(Null, 'internal');

CREATE TABLE IF NOT EXISTS `designation` (
    `designation_id` INT NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(225) NOT NULL,
    PRIMARY KEY (`designation_id`)
)
ENGINE = InnoDB;
INSERT INTO designation (designation_id, name) VALUES
(Null, 'Admin'),
(NULL, 'User');


CREATE TABLE IF NOT EXISTS `type` (
    `type_id` INT NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(225) NOT NULL,
    PRIMARY KEY (`type_id`)
)
ENGINE = InnoDB;
INSERT INTO type (type_id, name) VALUES
(Null, 'private'),
(NULL, 'public');

CREATE TABLE IF NOT EXISTS `templatecategory` (
    `templatecategory_id` INT NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(225) NOT NULL,
    PRIMARY KEY (`templatecategory_id`)
)
ENGINE = InnoDB;
INSERT INTO templatecategory (templatecategory_id, name) VALUES
(Null, 'sales and marketing'),
(NULL, 'accounting'),
(NULL, 'business development'),
(NULL, 'financial planning');

CREATE TABLE IF NOT EXISTS `templatetype` (
    `templatetype_id` INT NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(225) NOT NULL,
    `icon` VARCHAR(225) NOT NULL,
    PRIMARY KEY (`templatetype_id`)
)
ENGINE = InnoDB;
INSERT INTO templatetype (templatetype_id, name) VALUES
(Null, 'doc', 'fa-file-word-o'),
(NULL, 'xls', 'fa-file-excel-o'),
(NULL, 'pdf', 'fa-file-pdf-o'),
(NULL, 'ppt', 'fa-file-powerpoint-o'),
(NULL, 'zip', 'fa-file-archive-o'),
(NULL, 'txt', 'fa-file-text-o'),
(NULL, 'img', 'fa-file-image-o'),
(NULL, 'video', 'fa-file-video-o'),
(NULL, 'audio', 'fa-file-audio-o'),
(NULL, 'other', 'fa-file-o');
 
 CREATE TABLE IF NOT EXISTS `users` (
    `user_id` INT NOT NULL AUTO_INCREMENT,
    `first_name` VARCHAR(225) NOT NULL,
    `last_name` VARCHAR(225) NOT NULL,
    `email` VARCHAR(1000) NOT NULL,
    `phone` VARCHAR(500) NOT NULL,
    `occupation` VARCHAR(225) NOT NULL,
    `password` VARCHAR(225) NOT NULL,
    `designation_id` INT NOT NULL,
    `industry_id` INT NOT NULL,
    `date_created` DATETIME NOT NULL,
    PRIMARY KEY (`user_id`),
    INDEX `industry_id_fk_idx` (`industry_id` ASC), 
    INDEX `designation_id_fk_idx` (`designation_id` ASC), 
    FOREIGN KEY (`designation_id`) REFERENCES `designation` (`designation_id`),
    FOREIGN KEY (`industry_id`) REFERENCES `industry` (`industry_id`)
    
)ENGINE = InnoDB;


CREATE TABLE IF NOT EXISTS `queries` (
    `query_id` INT NOT NULL AUTO_INCREMENT,
    `incoming_message` VARCHAR(225) NOT NULL,
    `response` VARCHAR(225) NOT NULL,
    `link` VARCHAR(225) NOT NULL,
    `status_id` INT NOT NULL,
    `category_id` INT NOT NULL,
    `industry_id` INT NOT NULL,
    `type_id` INT NOT NULL,
    `date_created` DATETIME NOT NULL,
    PRIMARY KEY (`query_id`),
    INDEX `status_id_fk_idx` (`status_id` ASC),  
    INDEX `industry_id_fk_idx` (`industry_id` ASC), 
    INDEX `category_id_fk_idx` (`category_id` ASC),
    INDEX `type_id_fk_idx` (`type_id` ASC), 
    FOREIGN KEY (`status_id`) REFERENCES `status` (`status_id`),
    FOREIGN KEY (`industry_id`) REFERENCES `industry` (`industry_id`),
    FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`),
    FOREIGN KEY (`type_id`) REFERENCES `type` (`type_id`)

)ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `templates` (
    `template_id` INT NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(225) NOT NULL,
    `incoming_message` VARCHAR(225) NOT NULL,
    `response` VARCHAR(225) NOT NULL,
    `dlink` VARCHAR(225) NOT NULL,
    `status_id` INT NOT NULL,
    `category_id` INT NOT NULL,
    `templatecategory_id` INT NOT NULL,
    `templatetype_id` INT NOT NULL,
    `industry_id` INT NOT NULL,
    `type_id` INT NOT NULL,    
    `date_created` DATETIME NOT NULL,
    PRIMARY KEY (`template_id`),
    INDEX `status_id_fk_idx` (`status_id` ASC),  
    INDEX `industry_id_fk_idx` (`industry_id` ASC), 
    INDEX `category_id_fk_idx` (`category_id` ASC),
    INDEX `templatecategory_id_fk_idx` (`templatecategory_id` ASC),
    INDEX `templatetype_id_fk_idx` (`templatetype_id` ASC),
    INDEX `type_id_fk_idx` (`type_id` ASC), 
    FOREIGN KEY (`status_id`) REFERENCES `status` (`status_id`),
    FOREIGN KEY (`industry_id`) REFERENCES `industry` (`industry_id`),
    FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`),
    FOREIGN KEY (`templatecategory_id`) REFERENCES `templatecategory` (`templatecategory_id`),
    FOREIGN KEY (`templatetype_id`) REFERENCES `templatetype` (`templatetype_id`),
    FOREIGN KEY (`type_id`) REFERENCES `type` (`type_id`)
)
ENGINE = InnoDB;
INSERT INTO templates (template_id, name, incoming_message, response, dlink, status_id, category_id, templatecategory_id, templatetype_id, industry_id, type_id, date_created) VALUES
(NULL, 'How to create a new account | I need an account | I want to open an  account', 'Create a new google account on a Google page', 'http://google.com', 1, 2, 2, 1, '2018-01-01 00:00:00'),
(NULL, 'Where can I get SME Loan for my Farm| I need a loan for my business', 'CBN gives SME Loan to local businessmen especially farmers farmers ', 'http://cbn.com', 2, 1, 2, 1, '2018-01-01 00:00:00'),
(NULL, 'Is It Possible to make money more with little money | I have less, I want more money', 'Yes you can make more money by investing the little you have', 'http://google.com', 1, 2, 1, 1, '2018-01-01 00:00:00');



CREATE TABLE IF NOT EXISTS `products` (
    `product_id` INT NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(225) NOT NULL,
    `description` VARCHAR(225) NOT NULL,    
    `price` VARCHAR(225) NOT NULL,
    `user_id` VARCHAR(225) NOT NULL,
    `incoming_message` VARCHAR(1000) NOT NULL,
    `response` VARCHAR(500) NOT NULL,
    `link` VARCHAR(225) NOT NULL,
    `image` INT NOT NULL,    
    `status_id` INT NOT NULL,
    `category_id` INT NOT NULL,
    `industry_id` INT NOT NULL,
    `type_id` INT NOT NULL,
    `date_created` DATETIME NOT NULL,
    PRIMARY KEY (`product_id`),
    INDEX `user_id_fk_idx` (`user_id` ASC),  
    INDEX `status_id_fk_idx` (`status_id` ASC),  
    INDEX `industry_id_fk_idx` (`industry_id` ASC), 
    INDEX `category_id_fk_idx` (`category_id` ASC),
    INDEX `type_id_fk_idx` (`type_id` ASC), 
    FOREIGN KEY (`status_id`) REFERENCES `status` (`status_id`),
    FOREIGN KEY (`industry_id`) REFERENCES `industry` (`industry_id`),
    FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`),
    FOREIGN KEY (`type_id`) REFERENCES `type` (`type_id`)
)
ENGINE = InnoDB;


CREATE TABLE IF NOT EXISTS `resources` (
    `resources_id` INT NOT NULL AUTO_INCREMENT,
    `title` VARCHAR(225) NOT NULL,
    `summary` VARCHAR(225) NOT NULL,   
    `incoming_message` VARCHAR(1000) NOT NULL,
    `response` VARCHAR(500) NOT NULL,
    `link` VARCHAR(225) NOT NULL,
    `status_id` INT NOT NULL,
    `category_id` INT NOT NULL,
    `industry_id` INT NOT NULL,
    `type_id` INT NOT NULL,
    `date_created` DATETIME NOT NULL,
    PRIMARY KEY (`resource_id`),
    INDEX `status_id_fk_idx` (`status_id` ASC),  
    INDEX `user_id_fk_idx` (`userid_id` ASC),  
    INDEX `industry_id_fk_idx` (`industry_id` ASC), 
    INDEX `category_id_fk_idx` (`category_id` ASC),
    INDEX `type_id_fk_idx` (`type_id` ASC), 
    FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
     FOREIGN KEY (`status_id`) REFERENCES `status` (`status_id`),
    FOREIGN KEY (`industry_id`) REFERENCES `industry` (`industry_id`),
    FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`),
    FOREIGN KEY (`type_id`) REFERENCES `type` (`type_id`)
)
ENGINE = InnoDB;

 
 CREATE TABLE IF NOT EXISTS `customers` (
    `customer_id` INT NOT NULL AUTO_INCREMENT,
    `first_name` VARCHAR(225) NOT NULL,
    `last_name` VARCHAR(225) NOT NULL,
    `phone` VARCHAR(500) NOT NULL,
    `user_id` INT NOT NULL,
    `date_created` DATETIME NOT NULL,
    PRIMARY KEY (`customer_id`),
    INDEX `user_id_fk_idx` (`user_id` ASC), 
    FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`)
    
)ENGINE = InnoDB;
