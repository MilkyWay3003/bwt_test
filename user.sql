SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

create table user(
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  firstname VARCHAR(30) NOT NULL,
  lastname VARCHAR(30) NOT NULL,
  email VARCHAR(50),
  passw VARCHAR(255),
  gender VARCHAR(20),
  datebirthday DATE
);

INSERT INTO user(firstname,lastname,email,passw,gender,datebirthday) VALUES
  ("ivan", "ivanov", "ivanov@gmail.com", SHA2("12345", 256), "male", "1997-12-31"),
  ("petya", "petrov", "petrov@gmail.com", SHA2("98765", 256), "male", "1997-08-31"),
  ("sidr", "sidorov", "sidorovv@gmail.com", SHA2("45612", 256), "male", "1998-05-17");