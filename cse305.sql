-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 06, 2024 lúc 05:17 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `cse305`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `appointment`
--

CREATE TABLE `appointment` (
  `appointment_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `client_name` varchar(50) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `doctor_name` varchar(50) NOT NULL,
  `appointment_time` datetime NOT NULL,
  `location` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL,
  `reason` varchar(255) NOT NULL,
  `comments` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `health_status`
--

CREATE TABLE `health_status` (
  `medical_record_id` int(11) NOT NULL,
  `date_of_record` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `temperature` varchar(10) DEFAULT NULL,
  `blood_pressure` varchar(10) DEFAULT NULL,
  `heart_rate` varchar(10) DEFAULT NULL,
  `doctor's_diagnosis` varchar(100) DEFAULT NULL,
  `doctor's_advice` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `relatives`
--

CREATE TABLE `relatives` (
  `relative_id` int(11) NOT NULL,
  `relative_name` varchar(50) NOT NULL,
  `contact_number` varchar(20) DEFAULT NULL,
  `relationship` varchar(20) DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `dOB` date DEFAULT NULL,
  `age` varchar(3) DEFAULT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `user_address` varchar(100) DEFAULT NULL,
  `occupation` varchar(100) DEFAULT NULL,
  `insurance_provider` varchar(100) DEFAULT NULL,
  `insurance_number` varchar(50) DEFAULT NULL,
  `identication_type` varchar(100) DEFAULT NULL,
  `identication_number` varchar(50) DEFAULT NULL,
  `user_avatar` varchar(255) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `relative_name` varchar(50) NOT NULL,
  `relative_phone` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_password`, `phone_number`, `dOB`, `age`, `gender`, `user_address`, `occupation`, `insurance_provider`, `insurance_number`, `identication_type`, `identication_number`, `user_avatar`, `role_id`, `relative_name`, `relative_phone`) VALUES
(1, 'ThanhHuyen', 'huyen@gmail.com', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(2, 'ThanhHuyen', 'huyen@gmail.com', '$2y$10$C6FBi6Zd6aPZGAcpNmQZ/eAg6WUCYqX55tN0YHSmiaxwmAy0S/Ofa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(3, 'Nguyễn Văn A', 'nguyen.a@example.com', '$2y$10$auk66nlQeyS2kvYRgrYsrO8hWDDAe4NLUp5dn/XK/mcsMAF60iQX6', '0901234567', '1990-01-01', NULL, 'male', 'Hà Nội', 'Engineer', 'Bảo Việt', 'INS123456', 'CMND', '123456789', NULL, NULL, 'Nguyễn Văn B', '0907654321'),
(4, 'Phan Dinh Hieu Thao', 'hieuthao63d@gmail.com', '$2y$10$4Jpjux6DR4kcXWYuI6W2p.ijs0aRdvav4Ze4Ad/6dzk1Bclutp.HS', '0348727403', '2024-12-28', '12', 'other', '246c/2 khu phố 1B phường An Phú thị xã Thuận An tỉnh Bình Dương', 'student', 'fdfdf', '1231231231231', '12312313', '213123', NULL, NULL, 'ábdjad', '0348727403');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_role`
--

CREATE TABLE `user_role` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `user_role`
--

INSERT INTO `user_role` (`role_id`, `role_name`) VALUES
(1, 'admin'),
(2, 'doctor'),
(3, 'client');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`appointment_id`),
  ADD KEY `client_id` (`client_id`),
  ADD KEY `doctor_id` (`doctor_id`);

--
-- Chỉ mục cho bảng `health_status`
--
ALTER TABLE `health_status`
  ADD PRIMARY KEY (`medical_record_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `relatives`
--
ALTER TABLE `relatives`
  ADD PRIMARY KEY (`relative_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `role_id` (`role_id`);

--
-- Chỉ mục cho bảng `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`role_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `appointment`
--
ALTER TABLE `appointment`
  MODIFY `appointment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `health_status`
--
ALTER TABLE `health_status`
  MODIFY `medical_record_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `relatives`
--
ALTER TABLE `relatives`
  MODIFY `relative_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `appointment_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `appointment_ibfk_2` FOREIGN KEY (`doctor_id`) REFERENCES `users` (`user_id`);

--
-- Các ràng buộc cho bảng `health_status`
--
ALTER TABLE `health_status`
  ADD CONSTRAINT `health_status_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Các ràng buộc cho bảng `relatives`
--
ALTER TABLE `relatives`
  ADD CONSTRAINT `relatives_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `user_role` (`role_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
