INSERT INTO mariadb.users (fullname,email,password_hash,active) VALUES
	 ('John Doe','john@doe.com','$2y$10$s9gcKzSZIS2TJHlsoMofquoqDL20Pj9MIOXCsOVN8zSH4xdzWaKka','1'),
	 ('Marie Doe','marie@doe.com','$2y$10$s9gcKzSZIS2TJHlsoMofquoqDL20Pj9MIOXCsOVN8zSH4xdzWaKka','1'),
	 ('Jose Doe','jose@doe.com','$2y$10$s9gcKzSZIS2TJHlsoMofquoqDL20Pj9MIOXCsOVN8zSH4xdzWaKka','1'),
	 ('Ful Doe','ful@doe.com','$2y$10$s9gcKzSZIS2TJHlsoMofquoqDL20Pj9MIOXCsOVN8zSH4xdzWaKka','1'),
	 ('Test Doe','test@doe.com','$2y$10$s9gcKzSZIS2TJHlsoMofquoqDL20Pj9MIOXCsOVN8zSH4xdzWaKka','1'),
	 ('Doe Little','doe@doe.com','$2y$10$s9gcKzSZIS2TJHlsoMofquoqDL20Pj9MIOXCsOVN8zSH4xdzWaKka','1'),
	 ('Jaime Doe','jaime@doe.com','$2y$10$s9gcKzSZIS2TJHlsoMofquoqDL20Pj9MIOXCsOVN8zSH4xdzWaKka','1');


INSERT INTO mariadb.addresses (zipcode,state,city,street,`number`,user_id) VALUES
	 ('55440-000','PE','Jauqueira','Rua do brum','12',1),
	 ('55440-000','PE','Jauqueira','Rua do brumm','12',2),
	 ('55440-000','PE','Jauqueira','Rua do brumm','12',3),
	 ('55440-000','PE','Jauqueira','Rua do brumm','12',4),
	 ('55440-000','PE','Jauqueira','Rua do brumm','12',5),
	 ('55440-000','PE','Jauqueira','Rua do brumm','12',6),
	 ('55440-000','PE','Jauqueira','Rua do brumm','12',7);
