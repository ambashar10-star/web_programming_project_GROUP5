USE wp_bbcap25_1;

-- Reservations Table
CREATE TABLE reservations (
    customer_name VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    table_number INT NOT NULL PRIMARY KEY,
    reservation_date DATE NOT NULL,
    reservation_time TIME NOT NULL,
    number_of_guests INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Order Items Table
CREATE TABLE Order_list(
    order_id INT AUTO_INCREMENT PRIMARY KEY,
    table_number INT NOT NULL,
    dish VARCHAR(150) NOT NULL,
    quantity INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (table_number) REFERENCES reservations(table_number)
    ON DELETE CASCADE
);
