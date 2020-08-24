-- MySqlBackup.NET 2.0.9.2
-- Dump Time: 2020-08-23 02:28:29
-- --------------------------------------
-- Server version 5.7.26-log MySQL Community Server (GPL)

-- 
-- Create schema wavesoap
-- 

CREATE DATABASE IF NOT EXISTS `wavesoap` /*!40100 DEFAULT CHARACTER SET utf8 */;
Use `wavesoap`;



/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- 
-- Definition of migrations
-- 

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 
-- Dumping data for table migrations
-- 

/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations`(`id`,`migration`,`batch`) VALUES
(1,'2020_08_12_105306_create_products_table',1),
(4,'2020_08_21_072835_create_orders_table',2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- 
-- Definition of orders
-- 

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `oid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `province` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` bigint(20) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `taxes` decimal(10,2) NOT NULL,
  `shipping_fee` decimal(10,2) NOT NULL,
  `shipping_company` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`oid`),
  UNIQUE KEY `orders_sid_unique` (`sid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 
-- Dumping data for table orders
-- 

/*!40000 ALTER TABLE `orders` DISABLE KEYS */;

/*!40000 ALTER TABLE `orders` ENABLE KEYS */;

-- 
-- Definition of products
-- 

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ingredients` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `weight` int(11) NOT NULL,
  `price` decimal(4,2) NOT NULL,
  `mime` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `products_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 
-- Dumping data for table products
-- 

/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products`(`id`,`name`,`description`,`ingredients`,`weight`,`price`,`mime`,`image`,`created_at`,`updated_at`) VALUES
('bs1597405536','Phoenixed Bar Soap','This soap bar is created from the left over bits of soap that we have left once we''ve trimmed our bars. Like a Phoenix, this bar soap is created from the \"ashes\" of it''s past.','Canola Oil, Aqua, Cocos Nucifera (Coconut) Oil, Sodium Hydroxide, Canola Shortening (High Oleic Canola Oil, Low Linolenic Canola Oil, Corn Oil, Dimethylpolysiloxane), Hydrogenated Palm Kernel Oil, Butyrospermum Parkii (Shea Butter) Fruit, Theobroma Cacao (Cocoa) Seed Butter, Ricinus Communis (Castor) Seed Oil, Sodium Lactate, Olea Europaea (Olive) Oil, Fragrance Oil',120,8.00,'image/jpeg','Phoenix_Bar_Soap_900x.jpg','2020-08-14 08:03:08','2020-08-14 08:03:08'),
('bs1597406654','Pumpkin Bar Soap','Made with tropical oils and butters, botanicals and emulsifying clays, our cold processed soap takes 6-8 weeks to make. Enjoy this spicy-sweetness all year round! We won’t wait just for autumn to enjoy this soap bar!','Canola Oil, Water, Cocos Nucifera (Coconut) Oil, Sodium Hydroxide, Canola Shortening (High Oleic Canola Oil, Low Linolenic Canola Oil, Corn Oil, Dimethylpolysiloxane), Hydrogenated Palm Kernel Oil, Cucurbita Pepo (Pumpkin) Puree, Butyrospermum Parkii (Shea Butter) Fruit, Theobroma Cacao (Cocoa) Seed Butter Ricinus Communis (Castor) Seed Oil, Sodium Lactate, Olea Europaea (Olive) Oil, Fragrance Oil',120,8.00,'image/jpeg','Pumpkin_Spice_Bar_Soap_900x.jpg','2020-08-14 08:03:08','2020-08-14 08:03:08'),
('bs1597406668','Patchouli Bar Soap','Made with tropical oils and butters, botanicals and emulsifying clays, our cold processed soap takes 6-8 weeks to make. Ground and soothe the soul while soaping up with this mellow mix','Canola Oil, Water, Cocos Nucifera (Coconut) Oil, Sodium Hydroxide, Canola Shortening (High Oleic Canola Oil, Low Linolenic Canola Oil, Corn Oil, Dimethylpolysiloxane), Hydrogenated Palm Kernel Oil, Butyrospermum Parkii (Shea Butter) Fruit, Theobroma Cacao (Cocoa) Seed Butter Ricinus Communis (Castor) Seed Oil, Sodium Lactate, Olea Europaea (Olive) Oil, Pogostemon Cablin (Patchouli) Oil, Calendula Officinalis Flower',120,8.00,'image/jpeg','Patchouli_Bar_Soap_900x.jpg','2020-08-14 08:03:08','2020-08-14 08:03:08'),
('bs1597406676','Muskoka Bar Soap','Made with tropical oils and butters, botanicals and emulsifying clays, our cold processed soap takes 6-8 weeks to make. Smell fresh, smoky and earthy all in one as you soap up and clean up!','Canola Oil, Water, Cocos Nucifera (Coconut) Oil, Sodium Hydroxide, Canola Shortening (High Oleic Canola Oil, Low Linolenic Canola Oil, Corn Oil, Dimethylpolysiloxane), Hydrogenated Palm Kernel Oil, Butyrospermum Parkii (Shea Butter) Fruit, Theobroma Cacao (Cocoa) Seed Butter, Ricinus Communis (Castor) Seed Oil, Sodium Lactate, Olea Europaea (Olive) Oil, Fragrance Oil, Titanium Dioxide, Mica, Chromium Oxide Green',120,8.00,'image/jpeg','Muskoka_Bar_Soap_900x.jpg','2020-08-14 08:03:08','2020-08-14 08:03:08'),
('bs1597406686','Enlivened  Bar Soap','Made with tropical oils and butters, botanicals and emulsifying clays, our cold processed soap takes 6-8 weeks to make. Make your shower experience even better with a citrus scent wafting through your bathroom!','Canola Oil, Water, Cocos Nucifera (Coconut) Oil, Sodium Hydroxide, Canola Shortening (High Oleic Canola Oil, Low Linolenic Canola Oil, Corn Oil, Dimethylpolysiloxane), Hydrogenated Palm Kernel Oil, Butyrospermum Parkii (Shea Butter) Fruit, Theobroma Cacao (Cocoa) Seed Butter, Ricinus Communis (Castor) Seed Oil, Sodium Lactate, Olea Europaea (Olive) Oil, Citrus Grandis (Grapefruit) Peel Oil, Citrus Sinensis (Orange) Peel Oil, Cymbopogon Schoenanthus (Lemongrass) Oil',120,10.00,'image/jpeg','Enliven_Bar_Soap_900x.jpg','2020-08-14 08:03:08','2020-08-14 08:03:08'),
('bs1597406698','Rosemary Green Bar Soap','Made with tropical oils and butters, botanicals and emulsifying clays, our cold processed soap takes 6-8 weeks to make. Clear your mind, get ready for the day with this uplifting bar soap, sure to wake up your mind in the early mornings.','Canola Oil, Water, Cocos Nucifera (Coconut) Oil, Sodium Hydroxide, Canola Shortening (High Oleic Canola Oil, Low Linolenic Canola Oil, Corn Oil, Dimethylpolysiloxane), Hydrogenated Palm Kernel Oil, Butyrospermum Parkii (Shea Butter) Fruit, Theobroma Cacao (Cocoa) Seed Butter Ricinus Communis (Castor) Seed Oil, Sodium Lactate, Olea Europaea (Olive) Oil, Rosmarinus Officinalis (Rosemary) Oil, Mentha Piperita (Peppermint) Oil, Montmorillonite (French Green Clay)',120,8.00,'image/jpeg','Rosemary_Mint_Bar_Soap_900x.jpg','2020-08-14 08:03:08','2020-08-14 08:03:08'),
('bs1597406709','Pink Sugar Bar Soap','Made with tropical oils and butters, botanicals and emulsifying clays, our cold processed soap takes 6-8 weeks to make. Enjoy this sweet, vanilla goodness while soaping up and getting squeaky clean!','Canola Oil, Aqua, Cocos Nucifera (Coconut) Oil, Sodium Hydroxide, Canola Shortening (High Oleic Canola Oil, Low Linolenic Canola Oil, Corn Oil, Dimethylpolysiloxane), Hydrogenated Palm Kernel Oil, Butyrospermum Parkii (Shea Butter) Fruit, Theobroma Cacao (Cocoa) Seed Butter, Ricinus Communis (Castor) Seed Oil, Sodium Lactate, Olea Europaea (Olive) Oil, Fragrance Oil',120,8.00,'image/jpeg','Pink_Sugar_Bar_Soap_900x.jpg','2020-08-14 08:03:08','2020-08-14 08:03:08'),
('bs1597406721','Fragrance Free Bar Soap','Made with tropical oils and butters, botanicals and emulsifying clays, our cold processed soap takes 6-8 weeks  to make. Made fragrance free.','Canola Seed Oil, Hydrogenated Soybean Oil, Butyrospermum Parkii (Shea Butter) Fruit, Cannabis Sativa (Hemp) Seed Oil, Vitis Vinifera (Grape) Seed Oil, Cera Alba (Beeswax), Limnanthes Alba (Meadowfoam) Seed Oil, Simmondsia Chinensis (Jojoba) Seed Oil, Ricinus Communis (Castor) Seed Oil, Tocopherol (Vitamin E)',120,8.00,'image/jpeg','Fragrance_Free_Bar_Soap_900x.jpg','2020-08-14 08:03:08','2020-08-14 08:03:08'),
('bs1597406731','Coconut Milk Bar Soap','Made with tropical oils and butters, botanicals and emulsifying clays, our cold processed soap takes 6-8 weeks to make. Our normal soap recipe cut in half and finished off with coconut milk. Talk about hydrating and a nourishing! Enriched with powerful antioxidants including Vitamin C and E, and essential micro nutrients like selenium, iron, copper and zinc which nourish, repair and heal the skin.','Canola Oil, Water, Cocos Nucifera (Coconut) Oil, Sodium Hydroxide, Canola Shortening (High Oleic Canola Oil, Low Linolenic Canola Oil, Corn Oil, Dimethylpolysiloxane), Hydrogenated Palm Kernel Oil, Butyrospermum Parkii (Shea Butter) Fruit, Cocos Nucifera (Coconut) Milk, Theobroma Cacao (Cocoa) Seed Butter, Ricinus Communis (Castor) Seed Oil, Sodium Lactate, Olea Europaea (Olive) Oil',120,10.00,'image/jpeg','Coconut_Milk_Bar_Soap_900x.jpg','2020-08-14 08:03:08','2020-08-14 08:03:08'),
('bs1597406739','Pure Lavender Bar Soap','Made with tropical oils and butters, botanicals and emulsifying clays, our cold processed soap takes 6-8 weeks to make.  Lavender is known to be relaxing and calming.','Canola Oil, Water, Cocos Nucifera (Coconut) Oil, Sodium Hydroxide, Canola Shortening (High Oleic Canola Oil, Low Linolenic Canola Oil, Corn Oil, Dimethylpolysiloxane), Hydrogenated Palm Kernel Oil, Butyrospermum Parkii (Shea Butter) Fruit, Theobroma Cacao (Cocoa) Seed Butter Ricinus Communis (Castor) Seed Oil, Sodium Lactate, Olea Europaea (Olive) Oil, Lavandula Angustifolia (Lavender) Oil, CI 77007 (Ultramarine Violet Oxide)',120,8.00,'image/jpeg','Pure_Lavender_Bar_Soap_900x.jpg','2020-08-14 08:03:08','2020-08-14 08:03:08'),
('bs1597406748','Sea Buckthorn Bar Soap','Made with tropical oils and butters, botanicals and emulsifying clays, our cold processed soap takes 6-8 weeks to make.  Benefiting from the powerful anti-oxidant and omega-fatty acid profile of sea buckthorn, it will be the perfect thing to hydrate and nourish the skin and to aid those suffering from eczema, acne or psoriasis, our sea buckthorn soap lightly scented with lavender essential oil too!','Canola Oil, Water, Cocos Nucifera (Coconut) Oil, Sodium Hydroxide, Canola Shortening (High Oleic Canola Oil, Low Linolenic Canola Oil, Corn Oil, Dimethylpolysiloxane), Hydrogenated Palm Kernel Oil, Butyrospermum Parkii (Shea Butter) Fruit, Theobroma Cacao (Cocoa) Seed Butter Ricinus Communis (Castor) Seed Oil, Sodium Lactate, Olea Europaea (Olive) Oil, Lavandula Angustifolia (Lavender) Oil, Hippophae Rhamnoides (Sea Buckthorn) Fruit Oil',120,12.00,'image/jpeg','Sea_Buckthorn_Bar_Soap_900x.jpg','2020-08-14 08:03:08','2020-08-14 08:03:08'),
('bs1597406755','Northern Lights Bar Soap','Made with tropical oils and butters, botanicals and emulsifying clays, our cold processed soap takes 6-8 weeks to make. Lift your spirits and ground your soul with the lemongrass, patchouli and bergamot!','Canola Oil, Water, Cocos Nucifera (Coconut) Oil, Sodium Hydroxide, Canola Shortening (High Oleic Canola Oil, Low Linolenic Canola Oil, Corn Oil, Dimethylpolysiloxane), Hydrogenated Palm Kernel Oil, Butyrospermum Parkii (Shea Butter) Fruit, Theobroma Cacao (Cocoa) Seed Butter, Ricinus Communis (Castor) Seed Oil, Sodium Lactate, Olea Europaea (Olive) Oil, Pogostemon Cablin (Patchouli) Oil, Cymbopogon Schoenanthus (Lemongrass) Oil, Montmorillonite (Yellow Clay), Titanium Dioxide',120,8.50,'image/jpeg','Northern_Lights_Bar_Soap_900x.jpg','2020-08-14 08:03:08','2020-08-14 08:03:08'),
('bs1597406762','Algonquin Bar Soap','Made with tropical oils and butters, botanicals and emulsifying clays, our cold processed soap takes 6-8 weeks to make. Wash up and smell like the perfect kind of morning, waking up while camping - smoky, piney and fresh!','Canola Oil, Water, Cocos Nucifera (Coconut) Oil, Sodium Hydroxide, Canola Shortening (High Oleic Canola Oil, Low Linolenic Canola Oil, Corn Oil, Dimethylpolysiloxane), Hydrogenated Palm Kernel Oil, Butyrospermum Parkii (Shea Butter) Fruit, Theobroma Cacao (Cocoa) Seed Butter, Ricinus Communis (Castor) Seed Oil, Sodium Lactate, Olea Europaea (Olive) Oil, Montmorillonite (Yellow) Clay, Citrus Aurantium Dulcis (Orange) Peel Oil, Pinus Sylvestris (Pine) Leaf Oil, Cedrus Deodora (Cedarwood) Oil, Illite (Red) Clay, Pogostemon Cablin (Patchouli) Oil, Titanium Dioxide, Eugenia Caryophyllus (Clove) Flower Oil',120,15.50,'image/jpeg','Algonquin_Morning_Bar_Soap_900x.jpg','2020-08-14 08:03:08','2020-08-14 08:03:08'),
('bs1597406768','Cranberry Bar Soap','Made with tropical oils and butters, botanicals and emulsifying clays, our cold processed soap takes 6-8 weeks to make.  Indulge in the sweet/tart scent and enjoy the extra benefit of the cranberry seeds as an exfoliation!','Canola Oil, Water, Cocos Nucifera (Coconut) Oil, Sodium Hydroxide, Canola Shortening (High Oleic Canola Oil, Low Linolenic Canola Oil, Corn Oil, Dimethylpolysiloxane), Hydrogenated Palm Kernel Oil, Butyrospermum Parkii (Shea Butter) Fruit, Theobroma Cacao (Cocoa) Seed Butter, Ricinus Communis (Castor) Seed Oil, Fragrance Oil, Sodium Lactate, Olea Europaea (Olive) Oil, Vaccinium Macrocarpon (Cranberry) Seeds',120,12.00,'image/jpeg','Muskoka_Cranberry_Bar_Soap_900x.jpg','2020-08-14 08:03:08','2020-08-14 08:03:08'),
('bs1597406778','Cedar Saffron Bar Soap','Made with tropical oils and butters, botanicals and emulsifying clays, our cold processed soap takes 6-8 weeks to make. Take the woodsy-spicy scent of Cedar and Saffron in the shower with you, steam up your bathroom and enjoy this scent as it hits the steam.','Canola Oil, Aqua, Cocos Nucifera (Coconut) Oil, Sodium Hydroxide, Canola Shortening (High Oleic Canola Oil, Low Linolenic Canola Oil, Corn Oil, Dimethylpolysiloxane), Hydrogenated Palm Kernel Oil, Butyrospermum Parkii (Shea Butter) Fruit, Theobroma Cacao (Cocoa) Seed Butter, Ricinus Communis (Castor) Seed Oil, Sodium Lactate, Olea Europaea (Olive) Oil, Fragrance Oil',120,9.00,'image/jpeg','Cedar_and_Saffron_Body_Soap_900x.jpg','2020-08-14 08:03:08','2020-08-14 08:03:08'),
('bs1597406785','Oatmeal Milk Honey Bar Soap','Made with tropical oils and butters, botanicals and emulsifying clays, our cold processed soap takes 6-8 weeks to make. Let this amazing bar help treat sensitive skin, or just enjoy it for it’s amazing scent! You’ll also be able to enjoy a light exfoliation with the oatmeal bits that are in this bar.','Canola Oil, Water, Cocos Nucifera (Coconut) Oil, Sodium Hydroxide, Canola Shortening (High Oleic Canola Oil, Low Linolenic Canola Oil, Corn Oil, Dimethylpolysiloxane), Hydrogenated Palm Kernel Oil, Butyrospermum Parkii (Shea Butter) Fruit, Theobroma Cacao (Cocoa) Seed Butter, Avena Sativa (Oat) Kernel Meal, Ricinus Communis (Castor) Seed Oil, Sodium Lactate, Olea Europaea (Olive) Oil, Fragrance Oil',120,10.50,'image/jpeg','Oatmeal_Milk_and_Honey_Bar_Soap_900x.jpg','2020-08-14 08:03:08','2020-08-14 08:03:08'),
('bs1597406791','Tea Tree Bar Soap','Made with tropical oils and butters, botanicals and emulsifying clays, our cold processed soap takes 6-8 weeks to make. Scented with Tea Tree and Eucalyptus Essential Oils, this bar soap is clarifying and will help deter bugs and keep your skin feeling fresh.','Canola Oil, Water, Cocos Nucifera (Coconut) Oil, Sodium Hydroxide, Canola Shortening (High Oleic Canola Oil, Low Linolenic Canola Oil, Corn Oil, Dimethylpolysiloxane), Hydrogenated Palm Kernel Oil, Butyrospermum Parkii (Shea Butter) Fruit, Theobroma Cacao (Cocoa) Seed Butter Ricinus Communis (Castor) Seed Oil, Sodium Lactate, Olea Europaea (Olive) Oil, Eucalyptus Globulus Leaf Oil, Melaleuca Alternifolia (Tea Tree) Leaf Oil, Ground Eucalyptus Globulus Leaf, CI 77891 (Titanium Dioxide)',120,14.00,'image/jpeg','Tea_Tree_and_Eucalyptus_Bar_Soap_with_leaves_900x.jpg','2020-08-14 08:03:08','2020-08-14 08:03:08'),
('bs1597406800','White Tea Ginger Bar Soap','Made with tropical oils and butters, botanicals and emulsifying clays, our cold processed soap takes 6-8 weeks to make. Lather up this awesome floral tea, ginger mix!','Canola Oil, Aqua, Cocos Nucifera (Coconut) Oil, Sodium Hydroxide, Canola Shortening (High Oleic Canola Oil, Low Linolenic Canola Oil, Corn Oil, Dimethylpolysiloxane), Hydrogenated Palm Kernel Oil, Butyrospermum Parkii (Shea Butter) Fruit, Theobroma Cacao (Cocoa) Seed Butter, Ricinus Communis (Castor) Seed Oil, Sodium Lactate, Fragrance Oil, Olea Europaea (Olive) Oil',120,10.50,'image/jpeg','White_Tea_and_Ginger_Bar_Soap_900x.jpg','2020-08-14 08:03:08','2020-08-14 08:03:08'),
('bs1597406807','Complexion Bar Soap','A cold processed bar of soap made with three different types of clay designed for a deep but gentle cleansing. The Clear Complexion Bar is designed for oily and problematic skin. Containing an assortment of natural clays to cleanse, absorb oil, oxygenate and replenish the skin. ','Canola Oil, Water, Cocos Nucifera (Coconut) Oil, Sodium Hydroxide, Canola Shortening (High Oleic Canola Oil, Low Linolenic Canola Oil, Corn Oil, Dimethylpolysiloxane), Hydrogenated Palm Kernel Oil, Butyrospermum Parkii (Shea Butter) Fruit, Theobroma Cacao (Cocoa) Seed Butter, Ricinus Communis (Castor) Seed Oil, Multani Mitti Clay, Sodium Lactate, Olea Europaea (Olive) Oil, Rhassoul Clay, Australian Black Clay, Citrus Grandis (Grapefruit) Peel Oil, Citrus Sinensis (Orange) Peel Oil, Lavandula Angustifolia (Lavender) Oil, Cedrus Deodora (Cedarwood) Bark Oil, Cymbopogon Schoenantus (Lemongrass) Oil',120,15.50,'image/jpeg','clear_complexion_bar_900x.jpg','2020-08-14 08:03:08','2020-08-14 08:03:08'),
('bs1597406813','Enliven Light Bar Soap','With added Castor oil to moisturize your hair and scalp, and hops extract to help reduce dry flaky skin and remove dandruff, this amazing shampoo bar will give you all the luscious lather you want but rinse clean away leaving your hair free of residue. Safe for the waterways and gentle enough to use everyday! Refresh the hair with a citrus twist.','Canola Oil, Water, Cocos Nucifera (Coconut) Oil, Sodium Hydroxide, Canola Shortening (High Oleic Canola Oil, Low Linolenic Canola Oil, Corn Oil, Dimethylpolysiloxane), Hydrogenated Palm Kernel Oil, Butyrospermum Parkii (Shea Butter) Fruit, Theobroma Cacao (Cocoa) Seed Butter, Ricinus Communis (Castor) Seed Oil, Lupulus (Hops) Extract, Sodium Lactate, Olea Europaea (Olive) Oil, Citrus Grandis (Grapefruit) Peel Oil, Citrus Sinensis (Orange) Peel Oil, Cymbopogon Schoenanthus (Lemongrass) Oil',120,12.00,'image/jpeg','Enliven_Shampoo_Bar_900x.jpg','2020-08-14 08:03:08','2020-08-14 08:03:08'),
('bs1597406825','Northern Rain Bar Soap','With added Castor oil to moisturize your hair and scalp, and hops extract to help reduce dry flaky skin and remove dandruff, this amazing shampoo bar will give you all the luscious lather you want but rinse clean away leaving your hair free of residue. Safe for the waterways and gentle enough to use everyday!','Canola Oil, Water, Cocos Nucifera (Coconut) Oil, Sodium Hydroxide, Canola Shortening (High Oleic Canola Oil, Low Linolenic Canola Oil, Corn Oil, Dimethylpolysiloxane), Hydrogenated Palm Kernel Oil, Butyrospermum Parkii (Shea Butter) Fruit, Theobroma Cacao (Cocoa) Seed Butter, Ricinus Communis (Castor) Seed Oil, Lupulus (Hops) Extract, Sodium Lactate, Olea Europaea (Olive) Oil',120,10.50,'image/jpeg','Northern_Rain_Shampoo_Bar_900x.jpg','2020-08-14 08:03:08','2020-08-14 08:03:08'),
('bs1597406835','Rosemary Mint Bar Soap','With added Castor oil to moisturize your hair and scalp, and hops extract to help reduce dry flaky skin and remove dandruff, this amazing shampoo bar will give you all the luscious lather you want but rinse clean away leaving your hair free of residue. Safe for the waterways and gentle enough to use everyday! Invigorate and tingle the scalp with the refreshing rosemary mint!','Canola Oil, Water, Cocos Nucifera (Coconut) Oil, Sodium Hydroxide, Canola Shortening (High Oleic Canola Oil, Low Linolenic Canola Oil, Corn Oil, Dimethylpolysiloxane), Hydrogenated Palm Kernel Oil, Butyrospermum Parkii (Shea Butter) Fruit, Theobroma Cacao (Cocoa) Seed Butter, Ricinus Communis (Castor) Seed Oil, Lupulus (Hops) Extract, Sodium Lactate, Olea Europaea (Olive) Oil, Rosmarinus Officinalis (Rosemary) Leaf Extract, Mentha Piperita (Peppermint) Oil',120,10.00,'image/jpeg','Rosemary_Mint_Shampoo_Bar_900x.jpg','2020-08-14 08:03:08','2020-08-14 08:03:08'),
('bs1597406842','Deep Cleansing Bar Soap','Our deepest clean yet! This facial cleanser with activated charcoal just needs warm water to activate and you''re good to go. Perfect for problematic and oily skin, it''s anti-fungal, antibacterial, anti-viral, and anti-microbial. It can be used head to toe for an intense deep clean to slough away the dead skin cells without dehydrating the skin! Follow up with your favourite Soapstones facial care products! ','Vegetable Oil, Cocos Nucifera (Coconut) Oil, Hydrogenated Palm Kernel Oil, Butyrospermum Parkii (Shea Butter) Fruit, Theobroma Cacao (Cocoa) Seed Butter, Ricinus Communis (Castor) Seed Oil, Olea Europaea (Olive) Oil, Sodium Hydroxide, Sodium Lactate, Essential Oils',120,10.00,'image/jpeg','deep_cleansing_bar_with_activated_charcoal_900x.jpg','2020-08-14 08:03:08','2020-08-14 08:03:08');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;


/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;


-- Dump completed on 2020-08-23 02:28:29
-- Total time: 0:0:0:0:234 (d:h:m:s:ms)
