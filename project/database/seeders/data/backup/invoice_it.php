<?php
/**
 * Export to PHP Array plugin for PHPMyAdmin
 * @version 5.2.1
 */

/**
 * Database `invoice_it`
 */

/* `invoice_it`.`businesses` */
$businesses = array(
  array('id' => '1','created_at' => '2024-01-12 15:45:30','updated_at' => '2024-01-12 15:45:30','name' => 'Digamite Private Limited','email' => 'digamite@hotmail.com','phone' => '7979851485','address' => 'C/O KIRAN DEVI, PANCH-PALASI, VILL-PARASI, P. Chakrdaha','city' => 'Araria','pin' => '854318','state_id' => '10','logo' => NULL,'gstin' => '10AAKCD4337Q1ZF','gst_certificate' => NULL,'registration_number' => 'U62090BR2023PTC066123','registration_certificate' => NULL,'iec_code' => NULL,'ad_code' => NULL,'arn_code' => NULL,'bank_name' => 'Canara Bank', 'bank_ifsc' => 'CNRB0004567', 'bank_swift' => NULL,'bank_account_number' => '120026808473','bank_account_holder_name' => 'DIGAMITE PRIVATE LIMITED','payment_terms' => NULL)
);

/* `invoice_it`.`customers` */
$customers = array(
  array('id' => '1','created_at' => '2024-01-12 14:49:41','updated_at' => '2024-01-12 14:49:41','gender_id' => '1','business_id' => '1','name' => 'Biotronik Medical Devices India Private Limited', 'gstin' => '07AADCB1386Q1Z8', 'email' => 'praveen.singla@biotronik.com','phone' => '9871592929','address' => 'Unit No.805-807, DLF Tower2B Commercial Complex, Jasola','city' => 'Delhi','pin' => '110025','state_id' => '7')
);

/* `invoice_it`.`failed_jobs` */
$failed_jobs = array(
);

/* `invoice_it`.`invoices` */
$invoices = array(
  array('id' => '1','created_at' => '2024-01-13 10:57:55','updated_at' => '2024-01-13 10:57:55','business_id' => '1','business_gstin' => '10AAKCD4337Q1ZF','business_name' => 'Digamite Private Limited','business_email' => 'digamite@hotmail.com','business_phone' => '7979851485','business_address' => 'C/O KIRAN DEVI, PANCH-PALASI, VILL-PARASI, P. Chakrdaha','business_city' => 'Araria','business_pin' => '854318','business_state_id' => '10','customer_id' => '1','customer_gstin' => NULL,'customer_name' => 'Biotronik Medical Devices India Private Limited','customer_email' => 'praveen.singla@biotronik.com','customer_phone' => '9871592929','customer_address' => 'Unit No.805-807, DLF Tower2B Commercial Complex, Jasola','customer_city' => 'Delhi','customer_pin' => '110025','customer_state_id' => '7')
);

/* `invoice_it`.`invoice_payments` */
$invoice_payments = array(
);

/* `invoice_it`.`invoice_products` */
$invoice_products = array(
  array('id' => '1','created_at' => '2024-01-13 10:57:55','updated_at' => '2024-01-13 10:57:55','invoice_id' => '1','name' => 'Maintenance of E-Spandan Website', 'hsn_code'=> 998314,'description' => 'For the moth of','sale_price' => '20000','quantity' => '1','gst_percentage' => '18')
);

/* `invoice_it`.`migrations` */
$migrations = array(
  array('id' => '1','migration' => '2013_12_15_074741_create_user_genders_table','batch' => '1'),
  array('id' => '2','migration' => '2013_12_15_075659_create_themes_table','batch' => '1'),
  array('id' => '3','migration' => '2013_12_17_151247_create_states_table','batch' => '1'),
  array('id' => '4','migration' => '2013_12_18_075618_create_businesses_table','batch' => '1'),
  array('id' => '5','migration' => '2014_10_12_000000_create_users_table','batch' => '1'),
  array('id' => '6','migration' => '2014_10_12_100000_create_password_reset_tokens_table','batch' => '1'),
  array('id' => '7','migration' => '2019_08_19_000000_create_failed_jobs_table','batch' => '1'),
  array('id' => '8','migration' => '2019_12_14_000001_create_personal_access_tokens_table','batch' => '1'),
  array('id' => '9','migration' => '2023_12_24_105004_create_customers_table','batch' => '1'),
  array('id' => '10','migration' => '2023_12_28_142150_create_products_table','batch' => '1'),
  array('id' => '11','migration' => '2024_01_09_051951_create_invoices_table','batch' => '1'),
  array('id' => '12','migration' => '2024_01_09_052004_create_invoice_products_table','batch' => '1'),
  array('id' => '13','migration' => '2024_01_09_052107_create_invoice_payments_table','batch' => '1')
);

/* `invoice_it`.`password_reset_tokens` */
$password_reset_tokens = array(
);

/* `invoice_it`.`personal_access_tokens` */
$personal_access_tokens = array(
);

/* `invoice_it`.`products` */
$products = array(
  array('id' => '1','created_at' => '2024-01-12 15:10:11','updated_at' => '2024-01-12 15:10:11','business_id' => '1','sku' => 'espandan','name' => 'Maintenance of E-Spandan Website', 'hsn_code'=> 998314,'description' => 'For the moth of','sale_price' => '20000','quantity' => '1','gst_percentage' => '18')
);

/* `invoice_it`.`states` */
$states = array(
  array('id' => '1','name' => 'Jammu and Kashmir','gst_state_code' => '01','gst_state_short_name' => 'sdsd'),
  array('id' => '2','name' => 'Himachal Pradesh','gst_state_code' => '02','gst_state_short_name' => 'sdsd'),
  array('id' => '3','name' => 'Punjab','gst_state_code' => '03','gst_state_short_name' => 'sdsd'),
  array('id' => '4','name' => 'Chandigarh','gst_state_code' => '04','gst_state_short_name' => 'sdsd'),
  array('id' => '5','name' => 'Uttarakhand','gst_state_code' => '05','gst_state_short_name' => 'sdsd'),
  array('id' => '6','name' => 'Haryana','gst_state_code' => '06','gst_state_short_name' => 'sdsd'),
  array('id' => '7','name' => 'Delhi','gst_state_code' => '07','gst_state_short_name' => 'sdsd'),
  array('id' => '8','name' => 'Rajasthan','gst_state_code' => '08','gst_state_short_name' => 'sdsd'),
  array('id' => '9','name' => 'Uttar Pradesh','gst_state_code' => '09','gst_state_short_name' => 'sdsd'),
  array('id' => '10','name' => 'Bihar','gst_state_code' => '10','gst_state_short_name' => 'BR'),
  array('id' => '11','name' => 'Sikkim','gst_state_code' => '11','gst_state_short_name' => 'sdsd'),
  array('id' => '12','name' => 'Arunachal Pradesh','gst_state_code' => '12','gst_state_short_name' => 'sdsd'),
  array('id' => '13','name' => 'Nagaland','gst_state_code' => '13','gst_state_short_name' => 'sdsd')
);

/* `invoice_it`.`themes` */
$themes = array(
  array('id' => '1','name' => 'theme1')
);

/* `invoice_it`.`users` */
$users = array(
  array('id' => '1','created_at' => '2024-01-13 10:57:26','updated_at' => '2024-01-13 10:57:26','business_id' => '1','name' => 'Susheel Singh','email' => 'susheelkrsingh306@gmail.com','phone' => NULL,'designation' => 'Owner','remember_token' => 'qG8KvdDyXv','profile_pic' => NULL,'email_verified_at' => '2024-01-13 10:57:25','password' => '$2y$12$BXVFNfN5YvzQ2nCSbMcbIuKHlsjZvgDA8kMxBs5J/VpZj0JH1VX0u','gender_id' => '1','theme_id' => '1','color1' => '1','color2' => '1','color3' => '1')
);

/* `invoice_it`.`user_genders` */
$user_genders = array(
  array('id' => '1','name' => 'Male','title' => 'Mr')
);
