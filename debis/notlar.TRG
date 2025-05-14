TYPE=TRIGGERS
triggers='CREATE DEFINER=`root`@`localhost` TRIGGER `update_IlanTarihi` BEFORE UPDATE ON `notlar` FOR EACH ROW BEGIN\n    IF NEW.SizinNotunuz IS NOT NULL AND OLD.SizinNotunuz IS NULL THEN\n        SET NEW.IlanTarihi = DATE_FORMAT(CURDATE(), \'%d.%m.%Y\');\n    END IF;\nEND'
sql_modes=1098907648
definers='root@localhost'
client_cs_names='utf8mb4'
connection_cl_names='utf8mb4_unicode_ci'
db_cl_names='utf8mb4_general_ci'
created=1716237735518652
