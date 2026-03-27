CREATE DATABASE IF NOT EXISTS blood_bank_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE blood_bank_db;

CREATE TABLE IF NOT EXISTS admins (
  id INT AUTO_INCREMENT PRIMARY KEY,
  email VARCHAR(100) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL,
  fullname VARCHAR(100) NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS donors (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  age TINYINT NOT NULL,
  gender ENUM('Male','Female','Other') NOT NULL,
  blood_group VARCHAR(5) NOT NULL,
  phone VARCHAR(20) NOT NULL,
  email VARCHAR(100) NOT NULL,
  city VARCHAR(100) NOT NULL,
  last_donation DATE DEFAULT NULL,
  status ENUM('Pending','Approved','Rejected') NOT NULL DEFAULT 'Pending',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS requests (
  id INT AUTO_INCREMENT PRIMARY KEY,
  patient_name VARCHAR(100) NOT NULL,
  blood_group VARCHAR(5) NOT NULL,
  units TINYINT NOT NULL,
  hospital VARCHAR(150) NOT NULL,
  city VARCHAR(100) NOT NULL,
  contact VARCHAR(50) NOT NULL,
  status ENUM('Pending','Fulfilled','Rejected') NOT NULL DEFAULT 'Pending',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

INSERT IGNORE INTO admins (email, password, fullname) VALUES
('admin@example.com', '$2y$10$qqCaW28U3IYqpxW7q69s7eT0l4Zd6vYfQxv6ZbqGE33dRNFxk7e8W', 'Administrator'),
('admin2@example.com', '$2y$10$qqCaW28U3IYqpxW7q69s7eT0l4Zd6vYfQxv6ZbqGE33dRNFxk7e8W', 'Administrator 2'),
('admin3@example.com', '$2y$10$qqCaW28U3IYqpxW7q69s7eT0l4Zd6vYfQxv6ZbqGE33dRNFxk7e8W', 'Administrator 3'),
('admin4@example.com', '$2y$10$qqCaW28U3IYqpxW7q69s7eT0l4Zd6vYfQxv6ZbqGE33dRNFxk7e8W', 'Administrator 4'),
('admin5@example.com', '$2y$10$qqCaW28U3IYqpxW7q69s7eT0l4Zd6vYfQxv6ZbqGE33dRNFxk7e8W', 'Administrator 5'),
('admin6@example.com', '$2y$10$qqCaW28U3IYqpxW7q69s7eT0l4Zd6vYfQxv6ZbqGE33dRNFxk7e8W', 'Administrator 6'),
('admin7@example.com', '$2y$10$qqCaW28U3IYqpxW7q69s7eT0l4Zd6vYfQxv6ZbqGE33dRNFxk7e8W', 'Administrator 7'),
('admin8@example.com', '$2y$10$qqCaW28U3IYqpxW7q69s7eT0l4Zd6vYfQxv6ZbqGE33dRNFxk7e8W', 'Administrator 8'),
('admin9@example.com', '$2y$10$qqCaW28U3IYqpxW7q69s7eT0l4Zd6vYfQxv6ZbqGE33dRNFxk7e8W', 'Administrator 9'),
('admin10@example.com', '$2y$10$qqCaW28U3IYqpxW7q69s7eT0l4Zd6vYfQxv6ZbqGE33dRNFxk7e8W', 'Administrator 10'),
('admin11@example.com', '$2y$10$qqCaW28U3IYqpxW7q69s7eT0l4Zd6vYfQxv6ZbqGE33dRNFxk7e8W', 'Administrator 11'),
('admin12@example.com', '$2y$10$qqCaW28U3IYqpxW7q69s7eT0l4Zd6vYfQxv6ZbqGE33dRNFxk7e8W', 'Administrator 12'),
('admin13@example.com', '$2y$10$qqCaW28U3IYqpxW7q69s7eT0l4Zd6vYfQxv6ZbqGE33dRNFxk7e8W', 'Administrator 13'),
('admin14@example.com', '$2y$10$qqCaW28U3IYqpxW7q69s7eT0l4Zd6vYfQxv6ZbqGE33dRNFxk7e8W', 'Administrator 14'),
('admin15@example.com', '$2y$10$qqCaW28U3IYqpxW7q69s7eT0l4Zd6vYfQxv6ZbqGE33dRNFxk7e8W', 'Administrator 15');

INSERT IGNORE INTO donors (name, age, gender, blood_group, phone, email, city, last_donation, status) VALUES
('Ravi Sharma', 28, 'Male', 'A+', '9876543210', 'ravi@example.com', 'Mumbai', '2024-11-01', 'Approved'),
('Meena Gupta', 33, 'Female', 'B+', '9123456780', 'meena@example.com', 'Pune', '2024-12-10', 'Approved'),
('Amit Singh', 25, 'Male', 'O+', '9988776655', 'amit@example.com', 'Delhi', '2024-10-15', 'Approved'),
('Priya Patel', 30, 'Female', 'A-', '8877665544', 'priya@example.com', 'Ahmedabad', '2024-09-20', 'Pending'),
('Vikram Rao', 35, 'Male', 'B-', '7766554433', 'vikram@example.com', 'Bangalore', '2024-08-05', 'Approved'),
('Sneha Kumar', 27, 'Female', 'AB+', '6655443322', 'sneha@example.com', 'Chennai', '2024-07-12', 'Rejected'),
('Rajesh Verma', 40, 'Male', 'O-', '5544332211', 'rajesh@example.com', 'Jaipur', NULL, 'Pending'),
('Kavita Jain', 29, 'Female', 'AB-', '4433221100', 'kavita@example.com', 'Kolkata', '2024-06-18', 'Approved'),
('Arjun Mehta', 32, 'Male', 'A+', '3322110099', 'arjun@example.com', 'Hyderabad', '2024-05-25', 'Approved'),
('Nisha Reddy', 26, 'Female', 'B+', '2211009988', 'nisha@example.com', 'Hyderabad', '2024-04-30', 'Pending'),
('Suresh Iyer', 38, 'Male', 'O+', '1100998877', 'suresh@example.com', 'Chennai', '2024-03-14', 'Approved'),
('Anjali Sharma', 31, 'Female', 'A-', '0099887766', 'anjali@example.com', 'Delhi', '2024-02-20', 'Rejected'),
('Rohit Gupta', 28, 'Male', 'B-', '9988776655', 'rohit@example.com', 'Mumbai', NULL, 'Pending'),
('Pooja Singh', 34, 'Female', 'AB+', '8877665544', 'pooja@example.com', 'Pune', '2024-01-10', 'Approved'),
('Manoj Kumar', 36, 'Male', 'O-', '7766554433', 'manoj@example.com', 'Bangalore', '2023-12-05', 'Approved');

INSERT IGNORE INTO requests (patient_name, blood_group, units, hospital, city, contact, status) VALUES
('Amit Kumar', 'A+', 2, 'City Hospital', 'Mumbai', '9007001000', 'Pending'),
('Sunita Joshi', 'B+', 1, 'Care Medical', 'Pune', '9007002000', 'Pending'),
('Rahul Singh', 'O+', 3, 'Apollo Hospital', 'Delhi', '8006004000', 'Fulfilled'),
('Priya Sharma', 'A-', 1, 'Max Healthcare', 'Gurgaon', '7005003000', 'Pending'),
('Vikram Rao', 'B-', 2, 'Fortis Hospital', 'Bangalore', '6004002000', 'Rejected'),
('Anjali Gupta', 'AB+', 1, 'AIIMS', 'Delhi', '5003001000', 'Fulfilled'),
('Suresh Patel', 'O-', 4, 'Lilavati Hospital', 'Mumbai', '4002000000', 'Pending'),
('Kavita Jain', 'AB-', 2, 'Medanta', 'Gurgaon', '3001000000', 'Fulfilled'),
('Arjun Mehta', 'A+', 1, 'Kokilaben Hospital', 'Mumbai', '2000000000', 'Pending'),
('Nisha Reddy', 'B+', 3, 'Global Hospital', 'Hyderabad', '1000000000', 'Rejected'),
('Manoj Kumar', 'O+', 2, 'Manipal Hospital', 'Bangalore', '9998887777', 'Fulfilled'),
('Pooja Singh', 'A-', 1, 'Ruby Hall Clinic', 'Pune', '8887776666', 'Pending'),
('Rohit Verma', 'B-', 2, 'Jaslok Hospital', 'Mumbai', '7776665555', 'Fulfilled'),
('Sneha Iyer', 'AB+', 1, 'Sri Ramachandra Medical Centre', 'Chennai', '6665554444', 'Pending'),
('Deepak Sharma', 'O-', 2, 'Tata Memorial Hospital', 'Mumbai', '5554443333', 'Pending');
