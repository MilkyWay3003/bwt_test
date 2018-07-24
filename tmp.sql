SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

create table user(
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  firstname VARCHAR(30) NOT NULL,
  lastname VARCHAR(30) NOT NULL,
  email VARCHAR(50) NOT NULL,
  passw VARCHAR(255) NOT NULL,
  gender VARCHAR(20),
  datebirthday DATE
);

INSERT INTO user(firstname,lastname,email,passw,gender,datebirthday) VALUES
  ("ivan", "ivanov", "ivanov@gmail.com", SHA2("123456", 256), "male", "1997-12-31"),
  ("petya", "petrov", "petrov@gmail.com", SHA2("987654", 256), "male", "1997-08-31"),
  ("sidr", "sidorov", "sidorovv@gmail.com", SHA2("456123", 256), "male", "1998-05-17");


create table feedback(
  messages VARCHAR(255),
  datecreate DATE,
  user_id INT(6) UNSIGNED
);

ALTER TABLE `feedback` ADD FOREIGN KEY (`user_id`) REFERENCES `user`(`id`) ON DELETE CASCADE ON UPDATE RESTRICT;

INSERT INTO feedback(messages, datecreate, user_id) VALUES
  ("cool", "2017-07-20", 1),
  ("good", "2017-07-21", 2),
  ("norm", "2017-07-19", 3);


SELECT datecreate, firstname, lastname, messages
FROM user INNER JOIN feedback ON user.id=feedback.user_id