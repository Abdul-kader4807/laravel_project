CREATE DATABASE pharmacy_management;
USE pharmacy_management;
-- Table: `phar_adjustment_type`
CREATE TABLE `phar_adjustment_type` (
  `id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `name` VARCHAR(255) DEFAULT NULL,
  `factor` FLOAT DEFAULT NULL,
  `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `updated_at` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Table: `phar_categories`
CREATE TABLE `phar_categories` (
  `id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `name` VARCHAR(255) DEFAULT NULL,
  `description` VARCHAR(150) DEFAULT NULL,
  `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `updated_at` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Table: `phar_category_product`
CREATE TABLE `phar_category_product` (
  `id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `category_id` INT(11) NOT NULL,
  `product_id` INT(11) NOT NULL,
  `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `updated_at` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (`category_id`) REFERENCES `phar_categories`(`id`),
  FOREIGN KEY (`product_id`) REFERENCES `phar_products`(`id`)
);

-- Table: `phar_customers`
CREATE TABLE `phar_customers` (
  `id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `name` VARCHAR(255) DEFAULT NULL,
  `photo` VARCHAR(150) DEFAULT NULL,
  `phone` VARCHAR(20) DEFAULT NULL,
  `email` VARCHAR(255) DEFAULT NULL,
  `address` VARCHAR(255) DEFAULT NULL,
  `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `updated_at` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Table: `phar_prescriptions`
CREATE TABLE `phar_prescriptions` (
  `id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `customer_id` INT(11) DEFAULT NULL,
  `user_id` INT(11) DEFAULT NULL,
  `doctor_name` VARCHAR(255) DEFAULT NULL,
  `status` ENUM('pending', 'approved', 'rejected') DEFAULT 'pending',
  `prescription_file` VARCHAR(255) DEFAULT NULL,
  `prescription_date` DATE DEFAULT NULL,
  `description` VARCHAR(255) DEFAULT NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (`customer_id`) REFERENCES `phar_customers`(`id`),
  FOREIGN KEY (`user_id`) REFERENCES `phar_users`(`id`)
);

-- Table: `phar_medicines`
CREATE TABLE `phar_medicines` (
  `id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `name` VARCHAR(255) DEFAULT NULL,
  `category_id` INT(11) DEFAULT NULL,
  `price` DOUBLE DEFAULT NULL,
  `description` VARCHAR(255) DEFAULT NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (`category_id`) REFERENCES `phar_categories`(`id`)
);

-- Table: `phar_batches`
CREATE TABLE `phar_batches` (
  `id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `medicine_id` INT(11) DEFAULT NULL,
  `quantity` INT(11) DEFAULT NULL,
  `expiry_date` DATE DEFAULT NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (`medicine_id`) REFERENCES `phar_medicines`(`id`)
);

-- Table: `phar_notifications`
CREATE TABLE `phar_notifications` (
  `id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `user_id` INT(11) DEFAULT NULL,
  `message` VARCHAR(255) DEFAULT NULL,
  `is_read` BOOLEAN NOT NULL DEFAULT FALSE,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (`user_id`) REFERENCES `phar_users`(`id`)
);

-- Table: `phar_audit_logs`
CREATE TABLE `phar_audit_logs` (
  `id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `action` VARCHAR(255) DEFAULT NULL,
  `table_name` VARCHAR(255) DEFAULT NULL,
  `user_id` INT(11) DEFAULT NULL,
  `record_id` INT(11) DEFAULT NULL,
  `old_values` TEXT DEFAULT NULL,
  `new_values` TEXT DEFAULT NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (`user_id`) REFERENCES `phar_users`(`id`)
);

-- Table: `phar_settings`
CREATE TABLE `phar_settings` (
  `id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `key` VARCHAR(255) DEFAULT NULL,
  `value` TEXT DEFAULT NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);



CREATE TABLE `phar_manufacturers` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) DEFAULT NULL,
  `phone` VARCHAR(20) DEFAULT NULL,
  `email` VARCHAR(50) DEFAULT NULL,
  `country` VARCHAR(100) DEFAULT NULL,
  `address` VARCHAR(200) DEFAULT NULL,
  `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `updated_at` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
);

CREATE TABLE `phar_sales` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `customer_id` INT(11) DEFAULT NULL,
  `total_amount` DECIMAL(10,2) NOT NULL,
  `customer_name` VARCHAR(255) DEFAULT NULL,
  `customer_contact` VARCHAR(20) DEFAULT NULL,
  `payment_method` ENUM('Cash', 'Card', 'Other') DEFAULT 'Cash',
  `discount_amount` DECIMAL(10,2) DEFAULT 0.00,
  `net_amount` DECIMAL(10,2) NOT NULL,
  `sale_date` DATETIME NOT NULL,
  `user_id` INT(11) DEFAULT NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
);

CREATE TABLE `phar_sales_items` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `sale_id` INT(11) NOT NULL,
  `product_id` INT(11) DEFAULT NULL,
  `medicine_id` INT(11) DEFAULT NULL,
  `quantity` INT(11) NOT NULL,
  `unit_price` DECIMAL(10,2) DEFAULT NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`sale_id`) REFERENCES `phar_sales` (`id`) ON DELETE CASCADE
);

CREATE TABLE `phar_invoices` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `sale_id` INT(11) NOT NULL,
  `invoice_number` INT(11) NOT NULL UNIQUE,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`sale_id`) REFERENCES `phar_sales` (`id`) ON DELETE CASCADE
);

CREATE TABLE `phar_orders` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `customer_id` INT(11) DEFAULT NULL,
  `user_id` INT(11) DEFAULT NULL,
  `total_order` DOUBLE DEFAULT NULL,
  `payment_method` ENUM('Cash', 'Card', 'Other') DEFAULT 'Cash',
  `discount` DOUBLE DEFAULT NULL,
  `shipping_address` VARCHAR(255) DEFAULT NULL,
  `paid_amount` DOUBLE DEFAULT NULL,
  `status_id` INT(11) DEFAULT NULL,
  `order_date` DATE DEFAULT NULL,
  `delivery_date` DATE DEFAULT NULL,
  `vat` DOUBLE DEFAULT NULL,
  `uom_id` INT(11) DEFAULT NULL,
  `remark` VARCHAR(255) DEFAULT NULL,
  `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `updated_at` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
);

CREATE TABLE `phar_order_items` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `order_id` INT(11) NOT NULL,
  `product_id` INT(11) DEFAULT NULL,
  `quantity` INT(11) NOT NULL,
  `price` DECIMAL(8,2) NOT NULL,
  `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `updated_at` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`order_id`) REFERENCES `phar_orders` (`id`) ON DELETE CASCADE
);

CREATE TABLE `phar_order_details` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `order_id` INT(11) NOT NULL,
  `product_id` INT(11) DEFAULT NULL,
  `qty` DOUBLE DEFAULT NULL,
  `price` DOUBLE DEFAULT NULL,
  `vat` DOUBLE DEFAULT NULL,
  `uom_id` INT(11) DEFAULT NULL,
  `discount` DOUBLE DEFAULT NULL,
  `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `updated_at` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`order_id`) REFERENCES `phar_orders` (`id`) ON DELETE CASCADE
);


CREATE TABLE `phar_products` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) DEFAULT NULL,
  `category_id` INT(11) DEFAULT NULL,
  `brand_id` INT(11) DEFAULT NULL,
  `generic_name` VARCHAR(255) DEFAULT NULL,
  `dosage` VARCHAR(255) DEFAULT NULL,
  `strength` VARCHAR(255) DEFAULT NULL,
  `unit` VARCHAR(50) DEFAULT NULL,
  `price` DECIMAL(8,2) NOT NULL,
  `quantity` INT NOT NULL,
  `offer_price` DOUBLE DEFAULT NULL,
  `stock_quantity` INT(11) DEFAULT NULL,
  `reorder_level` INT(11) DEFAULT NULL,
  `expiry_date` DATE DEFAULT NULL,
  `photo` VARCHAR(150) DEFAULT NULL,
  `description` VARCHAR(255) DEFAULT NULL,
  `discount` DECIMAL(10,2) DEFAULT NULL,
  `uom_id` INT(11) DEFAULT NULL,
  `barcode` BIGINT DEFAULT NULL,
  `sku` VARCHAR(50) DEFAULT NULL,
  `manufacturer_id` INT(11) DEFAULT NULL,
  `star` VARCHAR(50) DEFAULT NULL,
  `weight` INT(11) DEFAULT NULL,
  `size` VARCHAR(50) DEFAULT NULL,
  `is_featured` BOOLEAN DEFAULT NULL,
  `is_brand` BOOLEAN DEFAULT NULL,
  `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `updated_at` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
);

CREATE TABLE `phar_purchases` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `supplier_id` INT(11) DEFAULT NULL,
  `product_id` INT(11) DEFAULT NULL,
  `status_id` INT(11) DEFAULT NULL,
  `total_order` DOUBLE DEFAULT NULL,
  `paid_amount` DOUBLE DEFAULT NULL,
  `total_amount` DECIMAL(10,2) NOT NULL,
  `discount` DOUBLE DEFAULT NULL,
  `status` VARCHAR(100) DEFAULT NULL,
  `vat` DOUBLE DEFAULT NULL,
  `photo` VARCHAR(150) DEFAULT NULL,
  `purchase_date` DATE DEFAULT NULL,
  `shipping_address` VARCHAR(150) DEFAULT NULL,
  `description` VARCHAR(255) DEFAULT NULL,
  `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `updated_at` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
);

CREATE TABLE `phar_purchases_items` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `purchases_id` INT(11) NOT NULL,
  `product_id` INT(11) NOT NULL,
  `quantity` INT(11) NOT NULL,
  `unit_price` DOUBLE DEFAULT NULL,
  `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `updated_at` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`purchases_id`) REFERENCES `phar_purchases` (`id`) ON DELETE CASCADE
);

CREATE TABLE `phar_purchases_details` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `purchases_id` INT(11) NOT NULL,
  `product_id` INT(11) NOT NULL,
  `qty` DOUBLE DEFAULT NULL,
  `price` DOUBLE DEFAULT NULL,
  `discount` DOUBLE DEFAULT NULL,
  `total_price` DECIMAL(10,2) NOT NULL,
  `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `updated_at` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`purchases_id`) REFERENCES `phar_purchases` (`id`) ON DELETE CASCADE
);

CREATE TABLE `phar_status` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(50) DEFAULT NULL,
  `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `updated_at` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
);



-- Stock Table
CREATE TABLE `phar_stock` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `product_id` INT NOT NULL,
  `transaction_type_id` INT NOT NULL,
  `warehouse_id` INT NOT NULL,
  `quantity` INT NOT NULL,
  `uom_id` INT NOT NULL,
  `remark` VARCHAR(200),
  `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `updated_at` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (`product_id`) REFERENCES `phar_supplier_products`(`id`),
  FOREIGN KEY (`transaction_type_id`) REFERENCES `phar_transaction_type`(`id`),
  FOREIGN KEY (`warehouse_id`) REFERENCES `phar_warehouse`(`id`),
  FOREIGN KEY (`uom_id`) REFERENCES `phar_uoms`(`id`)
);

-- Stock Adjustment
CREATE TABLE `phar_stock_adjustment` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `user_id` INT NOT NULL,
  `name` VARCHAR(255) NOT NULL,
  `adjustment_type_id` INT NOT NULL,
  `warehouse_id` INT NOT NULL,
  `remark` VARCHAR(100),
  `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `updated_at` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (`user_id`) REFERENCES `phar_users`(`id`),
  FOREIGN KEY (`warehouse_id`) REFERENCES `phar_warehouse`(`id`)
);

-- Stock Adjustment Details
CREATE TABLE `phar_stock_adjustment_details` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `stock_adjustment_id` INT NOT NULL,
  `product_id` INT NOT NULL,
  `qty` INT NOT NULL,
  `price` DECIMAL(10,2) NOT NULL,
  `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `updated_at` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (`stock_adjustment_id`) REFERENCES `phar_stock_adjustment`(`id`),
  FOREIGN KEY (`product_id`) REFERENCES `phar_supplier_products`(`id`)
);

-- Suppliers
CREATE TABLE `phar_suppliers` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `name` VARCHAR(255) NOT NULL,
  `contact_person` VARCHAR(50),
  `photo` VARCHAR(150),
  `phone` VARCHAR(20),
  `email` VARCHAR(50) UNIQUE,
  `address` VARCHAR(255),
  `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `updated_at` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Supplier Returns
CREATE TABLE `phar_supplier_returns` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `supplier_id` INT NOT NULL,
  `purchase_id` INT NOT NULL,
  `product_id` INT NOT NULL,
  `total_order` DECIMAL(10,2) NOT NULL,
  `total_return` DECIMAL(10,2),
  `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `updated_at` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (`supplier_id`) REFERENCES `phar_suppliers`(`id`),
  FOREIGN KEY (`product_id`) REFERENCES `phar_supplier_products`(`id`)
);

-- Supplier Products
CREATE TABLE `phar_supplier_products` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `supplier_id` INT NOT NULL,
  `purchase_id` INT NOT NULL,
  `product_id` INT NOT NULL,
  `supply_price` DECIMAL(8,2) NOT NULL,
  `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `updated_at` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (`supplier_id`) REFERENCES `phar_suppliers`(`id`)
);

-- Transaction Type
CREATE TABLE `phar_transaction_type` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `name` VARCHAR(255) NOT NULL,
  `factor` FLOAT NOT NULL DEFAULT 1,
  `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `updated_at` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Units of Measurement
CREATE TABLE `phar_uoms` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `name` VARCHAR(255) NOT NULL UNIQUE,
  `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `updated_at` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Users
CREATE TABLE `phar_users` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `name` VARCHAR(255) NOT NULL,
  `role_id` INT NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `email` VARCHAR(50) UNIQUE NOT NULL,
  `full_name` VARCHAR(255),
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `photo` VARCHAR(100),
  `verify_code` VARCHAR(50),
  `inactive` TINYINT(1) UNSIGNED DEFAULT 0,
  `mobile` VARCHAR(50),
  `updated_at` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ip` VARCHAR(45),
  `email_verified_at` DATETIME,
  `remember_token` VARCHAR(145),
  FOREIGN KEY (`role_id`) REFERENCES `phar_roles`(`id`)
);

-- Roles
CREATE TABLE `phar_roles` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `name` VARCHAR(50) NOT NULL UNIQUE,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- User Roles (Many-to-Many Relationship)
CREATE TABLE `phar_user_roles` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `role_id` INT NOT NULL,
  `user_id` INT NOT NULL,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (`role_id`) REFERENCES `phar_roles`(`id`),
  FOREIGN KEY (`user_id`) REFERENCES `phar_users`(`id`)
);

-- Warehouse
CREATE TABLE `phar_warehouse` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `name` VARCHAR(255) NOT NULL,
  `phone` VARCHAR(20),
  `location` VARCHAR(200),
  `address` VARCHAR(200),
  `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `updated_at` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Brands
CREATE TABLE `phar_brands` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `name` VARCHAR(50) NOT NULL UNIQUE,
  `description` VARCHAR(150),
  `location` VARCHAR(200),
  `updated_at` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);
