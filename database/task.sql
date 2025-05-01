DROP TABLE IF EXISTS task;

CREATE TABLE task (
		id INT PRIMARY KEY AUTO_INCREMENT,
		description VARCHAR(255) NOT NULL,
		due_day DATE,
		completed BOOLEAN DEFAULT FALSE,
		created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
		updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP 		     
		id_user INT,
		foreign key (id_user) references users (id) ON DELETE CASCADE 
)

INSERT INTO task (description, due_day, completed, id_user) VALUES
("Lavar ropa", "2025-04-23", FALSE, 1); 
