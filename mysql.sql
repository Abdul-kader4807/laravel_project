
CREATE TABLE `core_adjustment_type` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `factor` float DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp()
)

CREATE TABLE `core_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
 `description` varchar(150) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp()
)





-- Pivot table for many-to-many relationship between products and categories
CREATE TABLE core_category_product (
`id` int(11) NOT NULL,
`category_id` int(11) NOT NULL,
`product_id` int(11) NOT NULL,
`created_at` datetime DEFAULT current_timestamp(),
`updated_at` datetime DEFAULT current_timestamp()
);














CREATE TABLE `core_customers` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `photo` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp()
)



CREATE TABLE `core_prescriptions` (
  `id` int(11) NOT NULL,
 `customer_id` int(11) DEFAULT NULL,
 ` user_id` int(11) DEFAULT NULL,
  `doctor_name` varchar(255) DEFAULT NULL,
` status` ENUM('pending', 'approved', 'rejected') DEFAULT 'pending',

 `prescription_file` varchar(255) DEFAULT NULL,
 `prescription_date` date DEFAULT NULL,
 `description` varchar(200) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
)


CREATE TABLE `core_medicines` (
  `id` int(11) NOT NULL,
`name` varchar(255) DEFAULT NULL,
`category_id` int(11) DEFAULT NULL,
 `price` double DEFAULT NULL,
 `description` varchar(200) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
)


CREATE TABLE `core_batches` (
  `id` int(11) NOT NULL,
   `medicine_id` int(11) DEFAULT NULL,
    `quantity` int(11) DEFAULT NULL,
     `expiry_date` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
)


CREATE TABLE `core_notifications` (
  `id` int(11) NOT NULL,
 `user_id` int(11) DEFAULT NULL,
 `message` varchar(255) DEFAULT NULL,
 `is_read` BOOLEAN NOT NULL DEFAULT FALSE,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
)




CREATE TABLE `core_manufacturers` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp()
)


CREATE TABLE `core_sales` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
   `total_amount` decimal(10,2) NOT NULL,
  `customer_name` varchar(255) DEFAULT NULL,
  `customer_contact` varchar(20) DEFAULT NULL,

  `payment_method` ENUM('Cash', 'Card', 'Other') DEFAULT 'Cash',
  `discount_amount` decimal(10,2) DEFAULT 0.00,
  `net_amount` decimal(10,2) NOT NULL,
  `sale_date` datetime NOT NULL,

  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
)


CREATE TABLE `core_sales_items` (
  `id` int(11) NOT NULL,
   `sale_id` int(11) DEFAULT NULL,
    `product_id` int(11) DEFAULT NULL,
    `medicine_id` int(11) DEFAULT NULL,
    `quantity` int(11) DEFAULT NULL,
    `unit_price` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
)



CREATE TABLE `core_invoices` (
  `id` int(11) NOT NULL,
   `sale_id` int(11) DEFAULT NULL,
    `invoice_number` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
)





CREATE TABLE `core_orders` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `user_id ` int(11) DEFAULT NULL,
  `total_order` double DEFAULT NULL,
   `payment_method` ENUM('Cash', 'Card', 'Other') DEFAULT 'Cash',
  `discount` double DEFAULT NULL,
  `shipping_address` varchar(200) DEFAULT NULL,
  `paid_amount` double DEFAULT NULL,
  `status_id` int(11) DEFAULT NULL,
  `order_date` date DEFAULT NULL,
  `delivery_date` date DEFAULT NULL,
  `vat` double DEFAULT NULL,
  `uom_id` int(11) DEFAULT NULL,
  `remark` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp()
)

CREATE TABLE `core_order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `product_id ` int(11) DEFAULT NULL,
  `quantity ` int(11) DEFAULT NULL,
`price` DECIMAL(8, 2) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp()
)



CREATE TABLE `core_order_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `qty` double DEFAULT NULL,
  `price` double DEFAULT NULL,
  `vat` double DEFAULT NULL,
  `uom_id` int(11) DEFAULT NULL,
  `discount` double DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp()
)


CREATE TABLE `core_products` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `generic_name` varchar(50) DEFAULT NULL,
  `dosage` varchar(50) DEFAULT NULL,
  `strength` varchar(50) DEFAULT NULL,
  `unit` varchar(50) DEFAULT NULL,
  `price` DECIMAL(8, 2) NOT NULL,
  `quantity`  INT NOT NULL,
  `offer_price` double DEFAULT NULL,
  `stock_quantity` int(11) DEFAULT NULL,
  `reorder_level` int(11) DEFAULT NULL,
   `expiry_date` date DEFAULT NULL,
  `photo` varchar(100) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,


  `discount` decimal(10,2) DEFAULT NULL,
  `uom_id` int(11) DEFAULT NULL,
  `barcode` int(11) DEFAULT NULL,
  `sku` int(11) DEFAULT NULL,
  `manufacturer_id` int(11) DEFAULT NULL,
  `star` varchar(50) DEFAULT NULL,

  `weight` int(11) DEFAULT NULL,
  `size` varchar(11) DEFAULT NULL,
  `is_featured` varchar(50) DEFAULT NULL,
  `is_brand` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp()
)


CREATE TABLE `core_purchases` (
  `id` int(11) NOT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `status_id` int(11) DEFAULT NULL,
  `total_order` double DEFAULT NULL,
  `paid_amount` double DEFAULT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `discount` double DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `vat` double DEFAULT NULL,
  `photo` varchar(100) DEFAULT NULL,
  `Purchase_date` date DEFAULT NULL,
  `shipping_address` varchar(150) DEFAULT NULL,
  `description` varchar(150) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp()
)

CREATE TABLE `core_purchases_items` (
  `id` int(11) NOT NULL,
  `purchases_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `unit_price` double DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp()
)


CREATE TABLE `core_purchases_details` (
  `id` int(11) NOT NULL,
  `purchases_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `qty` double DEFAULT NULL,
  `price` double DEFAULT NULL,
  `discount` double DEFAULT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp()
)







CREATE TABLE `core_status` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp()
)



CREATE TABLE `core_stock` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `transaction_type_id` int(11) DEFAULT NULL,
  `warehouse_id` int(11) DEFAULT NULL,
   `quantity` int(11) DEFAULT NULL,
  `uom_id` int(11) DEFAULT NULL,
  `remark` varchar(200) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp()
)



CREATE TABLE `core_stock_adjustment` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `adjustment_type_id` int(11) DEFAULT NULL,
  `warehouse_id` int(11) DEFAULT NULL,
  `remark` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp()
)

CREATE TABLE `core_stock_adjustment_details` (
  `id` int(11) NOT NULL,
  `stock_adjustment_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `qty` int(50) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp()
)



CREATE TABLE `core_suppliers` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `contact_person` varchar(50) DEFAULT NULL,
  `photo` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp()
)


CREATE TABLE `supplier_returns` (
  `id` int(11) NOT NULL,
  `supplier_id` int(50) DEFAULT NULL,
  `purchase_id` int(50) DEFAULT NULL,
  `product_id` int(50) DEFAULT NULL,
  `total_order` decimal(10,2) NOT NULL,
  `total_return` decimal(10,2) DEFAULT NULL
)




CREATE TABLE `core_transaction_type` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `factor` float DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp()
)

CREATE TABLE `core_uoms` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp()
)



CREATE TABLE `core_users` (
  `id` int(10) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `role_id` int(10) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `full_name` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `photo` varchar(50) DEFAULT NULL,
  `verify_code` varchar(50) DEFAULT NULL,
  `inactive` tinyint(1) UNSIGNED DEFAULT 0,
  `mobile` varchar(50) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `ip` varchar(45) DEFAULT NULL,
  `email_verified_at` datetime DEFAULT NULL,
  `remember_token` varchar(145) DEFAULT NULL
)


CREATE TABLE `core_roles` (
  `id` int(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
)


CREATE TABLE `core_user_roles` (
  `id` int(10) NOT NULL,
 `role_id` int(10) DEFAULT NULL,
 `user_id` int(10) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
)




CREATE TABLE `core_warehouse` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `location` varchar(200) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp()
)



CREATE TABLE `core_brands` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `description` varchar(150) DEFAULT NULL,
  `location` varchar(200) DEFAULT NULL,
  `updated_at` datetime DEFAULT current_timestamp()
)
