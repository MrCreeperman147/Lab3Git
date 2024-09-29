SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

DROP DATABASE IF EXISTS `db_kektapeequipement`;

CREATE DATABASE `db_kektapeequipement`;

USE `db_kektapeequipement`;

-- ----------------------------------------------------------------------------------------------------------
--         -- 
-- PRODUCT --
--         --

--
-- equipement
--

CREATE TABLE IF NOT EXISTS `equipement` (
    -- primary key
    `id` int NOT NULL AUTO_INCREMENT,
    
    -- fields
    `name` varchar(100) NOT NULL,
    `price` decimal(10,2),
    `weight` int NOT NULL DEFAULT 0,
    `description` varchar(500),
    `protection_class` int NOT NULL DEFAULT 0,
    `nb_pocket` int NOT NULL DEFAULT 0,
    
     -- foreign key
    `id_manufacturer` int,
    `id_type` int NOT NULL,
    
    -- constraint 
    CONSTRAINT `pk_equipement` PRIMARY KEY (`id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;


--
-- image
--

CREATE TABLE IF NOT EXISTS `image` (
    -- primary key
    `id` int NOT NULL,
    
    -- fields
    `link` varchar(500) NOT NULL,
    
    -- constraint 
    CONSTRAINT `pk_image` PRIMARY KEY (`id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;


--
-- type
--

CREATE TABLE IF NOT EXISTS `type` (
    -- primary key
    `id` int NOT NULL AUTO_INCREMENT,
    
    -- fields
    `libelle` varchar(50) NOT NULL,
 
    -- constraint 
    CONSTRAINT `pk_type` PRIMARY KEY (`id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- material
--

CREATE TABLE IF NOT EXISTS `material` (
    -- primary key
    `id` int NOT NULL AUTO_INCREMENT,
    
    -- fields
    `name` varchar(50) NOT NULL,
    
    -- constraint 
    CONSTRAINT `pk_material` PRIMARY KEY (`id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- manufacturer
--

CREATE TABLE IF NOT EXISTS `manufacturer` (
    -- primary key
    `id` int NOT NULL AUTO_INCREMENT,
    
    -- fields
    `company_name` varchar(100) NOT NULL,
    
    -- constraint 
    CONSTRAINT `pk_manufacturer` PRIMARY KEY (`id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- provider
--

CREATE TABLE IF NOT EXISTS `provider` (
    -- primary key
    `id` int NOT NULL AUTO_INCREMENT,
    
    -- fields
    `name` varchar(100) NOT NULL,
    `location` varchar(100) NOT NULL,
    
    -- constraint 
    CONSTRAINT `pk_provider` PRIMARY KEY (`id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- body_part
--

CREATE TABLE IF NOT EXISTS `body_part` (
    -- primary key
    `code` varchar(4) NOT NULL,
    
    -- fields
    `name` varchar(100) NOT NULL,
    
    -- constraint 
    CONSTRAINT `pk_body_part` PRIMARY KEY (`code`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- provide
--

CREATE TABLE IF NOT EXISTS `provide` (
    -- primary key - foreign key
    `id_equipement` int NOT NULL,
    `id_provider` int NOT NULL,
    `qty` int,
    `qty_alert` int,
    
    -- constraint 
    CONSTRAINT `pk_provide` PRIMARY KEY (`id_equipement`, `id_provider`),
    
    CONSTRAINT `fk_provide_equipement` FOREIGN KEY (`id_equipement`) REFERENCES `equipement` (`id`),
    CONSTRAINT `fk_provide_provider` FOREIGN KEY (`id_provider`) REFERENCES `provider` (`id`)

)ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- combine
--

CREATE TABLE IF NOT EXISTS `combine` (
    -- primary key - foreign key
    `id_equipement` int NOT NULL,
    `id_material` int NOT NULL,
    
    -- constraint 
    CONSTRAINT `pk_combine` PRIMARY KEY (`id_equipement`, `id_material`),
    
    CONSTRAINT `fk_combine_equipement` FOREIGN KEY (`id_equipement`) REFERENCES `equipement` (`id`),
    CONSTRAINT `fk_combine_material` FOREIGN KEY (`id_material`) REFERENCES `material` (`id`)

)ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- cover
--

CREATE TABLE IF NOT EXISTS `cover` (
    -- primary key - foreign key
    `id_equipement` int NOT NULL,
    `code_body_part` varchar(4) NOT NULL,
    
    -- constraint 
    CONSTRAINT `pk_cover` PRIMARY KEY (`id_equipement`, `code_body_part`),
    
    CONSTRAINT `fk_cover_equipement` FOREIGN KEY (`id_equipement`) REFERENCES `equipement` (`id`),
    CONSTRAINT `fk_cover_body_part` FOREIGN KEY (`code_body_part`) REFERENCES `body_part` (`code`)

)ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- attach
--

CREATE TABLE IF NOT EXISTS `attach` (
    -- primary key - foreign key
    `id_equipement` int NOT NULL,
    `id_image` int NOT NULL,
    
    -- constraint 
    CONSTRAINT `pk_attach` PRIMARY KEY (`id_equipement`, `id_image`),
    
    CONSTRAINT `fk_attach_equipement` FOREIGN KEY (`id_equipement`) REFERENCES `equipement` (`id`),
    CONSTRAINT `fk_attach_image` FOREIGN KEY (`id_image`) REFERENCES `image` (`id`)

)ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------------------------------------------------------------------------------------
--      --
-- USER --
--      --

--
-- user
--

CREATE TABLE IF NOT EXISTS `user` (
    -- primary key
    `id` int NOT NULL AUTO_INCREMENT,
    
    -- fields
    `codename` varchar(20) NOT NULL,
    `mail` varchar(100) NOT NULL,
    `pw` varchar(30) NOT NULL,
    `tel` int,
    `location` varchar(50),
    `faction` varchar(10),

    `token` VARCHAR(100) NOT NULL,
    `token_validity` DATE NOT NULL,

    `admin` BOOLEAN DEFAULT 0,
    
    -- constraint 
    CONSTRAINT `pk_user` PRIMARY KEY (`id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- ----------------------------------------------------------------------------------------------------------
--                --
-- CART AND ORDER --
--                --

--
-- cart_content
--

CREATE TABLE IF NOT EXISTS `cart_content` (
    -- primary key - foreign key
    `id_user` int NOT NULL,
    `id_equipement` int NOT NULL,
    
    -- fields
    `date_added` datetime NOT NULL,
    `date_updated` datetime NOT NULL,
    `qty` int NOT NULL,
    
    -- constraint 
    CONSTRAINT `pk_cart_content` PRIMARY KEY (`id_user`, `id_equipement`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- order_state
--

CREATE TABLE IF NOT EXISTS `order_state` (
    -- primary key
    `id` int NOT NULL,
    
    -- fields
    `libelle` varchar(30) NOT NULL,
    
    -- constraint 
    CONSTRAINT `pk_order_state` PRIMARY KEY (`id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- cart_content_history
--

CREATE TABLE IF NOT EXISTS `cart_content_history` (
    -- primary key - foreign key
    `id_user` int NOT NULL,
    `id_equipement` int NOT NULL,
    `id_order_state` int NOT NULL,
    
    -- fields
    `date_state` datetime NOT NULL,
    
    -- constraint 
    CONSTRAINT `pk_order_state` PRIMARY KEY (`id_user`, `id_equipement`, `id_order_state`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- -------------------------------------------------------------------------------------------------------------------------
--                        --
-- CONSTRAINT FOREIGN KEY --
--                        --

ALTER TABLE equipement
    ADD CONSTRAINT `fk_equipement_manufacturer` FOREIGN KEY (`id_manufacturer`) REFERENCES `manufacturer` (`id`),
    ADD CONSTRAINT `fk_equipement_type` FOREIGN KEY (`id_type`) REFERENCES `type` (`id`);

ALTER TABLE cart_content 
    ADD CONSTRAINT `fk_cart_content_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`),
    ADD CONSTRAINT `fk_cart_content_equipement` FOREIGN KEY (`id_equipement`) REFERENCES `equipement` (`id`);
    
ALTER TABLE cart_content_history   
    ADD CONSTRAINT `fk_cart_content_history_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`),
    ADD CONSTRAINT `fk_cart_content_history_equipement` FOREIGN KEY (`id_equipement`) REFERENCES `equipement` (`id`),
    ADD CONSTRAINT `fk_cart_content_history_order_state` FOREIGN KEY (`id_order_state`) REFERENCES `order_state` (`id`);
    