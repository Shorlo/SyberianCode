CREATE TABLE `login_register_syberiancode`.`users` (  `id` INT NOT NULL AUTO_INCREMENT , 
                                                                `username` VARCHAR(255) NOT NULL , 
                                                                `email` VARCHAR(255) NOT NULL , 
                                                                `password` VARCHAR(255) NOT NULL , 
                                                                `token` VARCHAR(255) NOT NULL , 
                                                                `status` INT NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;