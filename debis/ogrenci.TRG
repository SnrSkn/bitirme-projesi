TYPE=TRIGGERS
triggers='CREATE DEFINER=`root`@`localhost` TRIGGER insert_password\nBEFORE INSERT ON ogrenci\nFOR EACH ROW\nBEGIN\n    SET NEW.sifre = SHA2(NEW.sifre, 256);\nEND' 'CREATE DEFINER=`root`@`localhost` TRIGGER trg_UpdateEmail\nBEFORE INSERT ON ogrenci\nFOR EACH ROW\nBEGIN\n    SET NEW.email = CONCAT(NEW.email, \'@ogr.deu.edu.tr\');\nEND' 'CREATE DEFINER=`root`@`localhost` TRIGGER update_password\nBEFORE UPDATE ON ogrenci\nFOR EACH ROW\nBEGIN\n    IF NEW.sifre <> OLD.sifre THEN\n        SET NEW.sifre = SHA2(NEW.sifre, 256);\n    END IF;\nEND'
sql_modes=1098907648 1098907648 1098907648
definers='root@localhost' 'root@localhost' 'root@localhost'
client_cs_names='utf8mb4' 'utf8mb4' 'utf8mb4'
connection_cl_names='utf8mb4_unicode_ci' 'utf8mb4_unicode_ci' 'utf8mb4_unicode_ci'
db_cl_names='utf8mb4_general_ci' 'utf8mb4_general_ci' 'utf8mb4_general_ci'
created=1715452481230464 1715949003799329 1715452453421046
