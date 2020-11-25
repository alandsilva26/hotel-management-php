CREATE TABLE IF NOT EXISTS rooms (
    room_id INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
    room_number INTEGER NOT NULL,
    room_name VARCHAR(30) NOT NULL,
    room_type VARCHAR(30) NOT NULL,
    room_featured INTEGER NOT NULL,
    room_price DOUBLE(10, 3) NOT NULL,
    room_booked INTEGER DEFAULT '0',
    check_in_date DATE,
    check_out_date DATE,
    room_image VARCHAR(50) NOT NULL,
    room_floor INTEGER NOT NULL,
    room_view VARCHAR(20) NOT NULL,
    room_beds INTEGER NOT NULL,
    bed_type VARCHAR(30) NOT NULL,
    room_capacity INTEGER NOT NULL,
    room_amenities VARCHAR(200) NOT NULL
);

CREATE TABLE `hotel`.`users` ( `user_id` INT NOT NULL AUTO_INCREMENT , `user_email` VARCHAR(20) NOT NULL , `user_fname` VARCHAR(20) NOT NULL , `user_lname` VARCHAR(20) NOT NULL , `user_verified` INT(1) NOT NULL DEFAULT '0' , `user_dob` DATE NOT NULL , `user_admin` VARCHAR NOT NULL DEFAULT '0' , `user_password` VARCHAR(500) NOT NULL , `user_created` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , `user_image` INT NOT NULL , PRIMARY KEY (`user_id`)) ENGINE = InnoDB;

ALTER TABLE `users` ADD `verification_hash` VARCHAR(500) NOT NULL AFTER `user_verified`;

ALTER TABLE `users` ADD `user_phone` VARCHAR(15) NOT NULL AFTER `user_dob`;

CREATE TABLE IF NOT EXISTS reservations (
    reservation_id	INTEGER NOT NUll AUTO_INCREMENT PRIMARY KEY,
    user_id	INTEGER(11),
    room_id	INTEGER,
    booking_date DATE,
    no_adults INTEGER,
    no_children	INTEGER,
    FOREIGN KEY(user_id) REFERENCES users(user_id) ON DELETE CASCADE,
    FOREIGN KEY(room_id) REFERENCES rooms(room_id) ON DELETE CASCADE
)

ALTER TABLE `reservations` ADD `reservation_created` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP AFTER `no_children`;