/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 50724
 Source Host           : localhost:3306
 Source Schema         : visit_bima

 Target Server Type    : MySQL
 Target Server Version : 50724
 File Encoding         : 65001

 Date: 18/04/2021 19:05:23
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for tb_admin
-- ----------------------------
DROP TABLE IF EXISTS `tb_admin`;
CREATE TABLE `tb_admin`  (
  `id_admin` int(6) NOT NULL AUTO_INCREMENT COMMENT 'ID ADMIN',
  `username` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `password` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `role` enum('admin','superadmin') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT 'admin',
  `gambar` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_admin`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tb_admin
-- ----------------------------
INSERT INTO `tb_admin` VALUES (1, 'admin', 'admin', 'admin@gmail.com', 'admin', '250858513113.jpg');
INSERT INTO `tb_admin` VALUES (3, 'superadmin', 'superadmin', 'superadmin@gmail.com', 'superadmin', '250858513145.jpg');
INSERT INTO `tb_admin` VALUES (5, 'efhal ardan2', '10101010101010101', 'efalardan2020@gmail.com', 'admin', '250858513112.jpg');
INSERT INTO `tb_admin` VALUES (6, '123', '123', 'infolayanandokumen@gmail.com', 'admin', '250858513114.jpg');

-- ----------------------------
-- Table structure for tb_agenda
-- ----------------------------
DROP TABLE IF EXISTS `tb_agenda`;
CREATE TABLE `tb_agenda`  (
  `id_agenda` int(6) NOT NULL AUTO_INCREMENT,
  `judul_agenda` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `deskripsi` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `waktu_mulai` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `waktu_selesai` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tanggal_mulai` date NULL DEFAULT NULL,
  `tanggal_berakhir` date NULL DEFAULT NULL,
  `alamat` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `latitude` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `longitude` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `gambar` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_admin` int(5) NULL DEFAULT NULL,
  `kontak` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_agenda`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 37 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tb_agenda
-- ----------------------------
INSERT INTO `tb_agenda` VALUES (27, 'Malam tahun baru', 'perayaan malam tahun baru akan dilaksanakan di ....', '00:00', '00:00', '2018-01-01', '2018-01-01', 'Jl Desa Melayu', '-8.44848382874001', '118.71520683434989', 'aff7e955ae8d9379db00837838a14018.jpg', NULL, NULL);
INSERT INTO `tb_agenda` VALUES (28, 'Pameran Seni Budaya Kota Bima', 'Ini adalah sebuah persembahan spesial dari pemerintah kota bima', '01:30', '13:31', '2018-01-02', '2018-01-02', 'Balai Kota Bima', '-8.447444242428517', '118.71521426009275', 'f855bdb685d0359584e4f22bca036d09.jpg', NULL, NULL);
INSERT INTO `tb_agenda` VALUES (29, 'Festifal Panen Bawang', 'Dalam rangka mensyukuri rahmat tuhan atas apa yang telah diberikan kepada masyarakat bima, maka dari itu pemerintah kota memlalui dinas parawisata mengadakan Festifal Panen Bawang', '01:00', '03:00', '2018-01-31', '2018-02-13', 'Desa Wisata Soromandi', '-8.448293463031405', '118.7111123669813', '7ab6d912ebfdb7d11addf1909793c4da.jpg', 3, '');
INSERT INTO `tb_agenda` VALUES (30, 'Hari Lahir Kota Bima', 'Memperingati hari lahir kota bima', '01:10', '10:00', '2018-02-06', '2018-02-07', 'Balai Kota Bima', '-8.452027781052038', '118.7208740902085', '315b675aa13f33b6de079e558eb6249e.jpg', 3, '');
INSERT INTO `tb_agenda` VALUES (32, 'Agenda Terbaru', 'Ini adalah agenda terbaru', '11:00', '09:00', '2018-10-12', '2018-10-27', 'Jl kasana Kamari', '-8.45174773873022', '118.72474921268469', '0dc87e3b7de2912f6cd7922feb8ec88c.jpg', 3, '');
INSERT INTO `tb_agenda` VALUES (33, 'dfg', 'dfgdf', '00:00', '00:00', '2018-10-22', '2018-11-06', 'fghfgh', '-8.452082428513464', '118.71999704442288', 'b91f89554bfdf27ae15c2e19ef84f066.jpg', NULL, NULL);
INSERT INTO `tb_agenda` VALUES (34, 'Agenda Paling terbaru fix', 'sdjflsd', '00:00', '00:00', '2018-11-01', '2018-11-21', 'sdfsdf', '-8.448341151816194', '118.72111234917634', '0e2ae93647c0634be59f5378eef23103.jpg', 3, '');
INSERT INTO `tb_agenda` VALUES (35, 'Bakar Jagung', 'Ini adalah belajar bakar jagung', '01:00', '09:00', '2018-11-01', '2018-12-03', 'Jl itu kasan tu', '-8.458166101071726', '118.71918343489557', '571bac2d3d9e95baf0e4a9025fde6c91.jpg', 3, '082313283803');
INSERT INTO `tb_agenda` VALUES (36, 'sd', 'sdfsdf sdfsd ', '00:00', '02:00', '2021-02-28', '2021-03-03', 'sdfsd', '-8.454685302087', '118.72235917036693', '761707ea37f4066aa7daa460074f06bd.jpg', 3, '65467567');

-- ----------------------------
-- Table structure for tb_dinas
-- ----------------------------
DROP TABLE IF EXISTS `tb_dinas`;
CREATE TABLE `tb_dinas`  (
  `nama_instansi` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `no_telp` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `deskripsi` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `email` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `fb` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `wa` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `ig` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `yt` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `alamat` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`alamat`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tb_dinas
-- ----------------------------
INSERT INTO `tb_dinas` VALUES ('Dinas Parawisata Bima', '(+62) 089634', 'Portal parawisata Kota Bima 123 tert', 'dinparbima@gmail.com', 'Dinas Parawisata Bima', '082313283803', 'DINPARBIMA', 'DINPAR BIMA', '');

-- ----------------------------
-- Table structure for tb_fasilitas
-- ----------------------------
DROP TABLE IF EXISTS `tb_fasilitas`;
CREATE TABLE `tb_fasilitas`  (
  `id_fasilitas` int(6) NOT NULL AUTO_INCREMENT,
  `nama_fasilitas` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `gambar_fasilitas` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `alamat` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `latitude` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `longitude` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `deskripsi` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `id_admin` int(5) NULL DEFAULT NULL,
  `kontak` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_icon` int(5) NULL DEFAULT NULL,
  PRIMARY KEY (`id_fasilitas`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 31 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tb_fasilitas
-- ----------------------------
INSERT INTO `tb_fasilitas` VALUES (27, 'Ini contoh fasilitas', '250858513121.jpg', 'Ini alamat fasilitas', '-8.451798762007456', '118.73021267834764', 'Ini deskripsi fasilitas', NULL, '082', NULL);
INSERT INTO `tb_fasilitas` VALUES (28, 'Fasilitas 23233', '5dxiqjt5p2.jpg', 'Alamat Fasilitas 244', '-8.451289370352086', '118.71935509626098', 'Deskripsi Fasilitas 2', NULL, '234234', NULL);
INSERT INTO `tb_fasilitas` VALUES (29, '1', '250858513124.jpg', '2', '-8.457305581799119', '118.72082317010933', '3', NULL, '4', NULL);
INSERT INTO `tb_fasilitas` VALUES (30, '342', '5dxiqjt5p4.jpg', '2342', '-8.45150936903211', '118.7210740848493', '2234', NULL, '234', NULL);

-- ----------------------------
-- Table structure for tb_galeri
-- ----------------------------
DROP TABLE IF EXISTS `tb_galeri`;
CREATE TABLE `tb_galeri`  (
  `id_galeri` int(6) NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `deskripsi` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nama_file` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_admin` int(5) NULL DEFAULT NULL,
  PRIMARY KEY (`id_galeri`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 17 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tb_galeri
-- ----------------------------
INSERT INTO `tb_galeri` VALUES (16, 'Pemandangan gunungs', ' Indonesia yang terletak di jalur cincin api membuat Indonesia salah satu negara yang memiliki gunung terbanyak di dunia. Setidaknya ada ratusan gunung indah yang tersebar di Wilayah Indonesia.  Dari sekian banyak gunung yang ada Indonesia, beberapa diant', '250858513116.jpg', NULL);

-- ----------------------------
-- Table structure for tb_icon
-- ----------------------------
DROP TABLE IF EXISTS `tb_icon`;
CREATE TABLE `tb_icon`  (
  `id_icon` int(5) NOT NULL AUTO_INCREMENT,
  `icon` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_icon`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 101 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tb_icon
-- ----------------------------
INSERT INTO `tb_icon` VALUES (1, 'icon_set_1_icon-1');
INSERT INTO `tb_icon` VALUES (2, 'icon_set_1_icon-2');
INSERT INTO `tb_icon` VALUES (3, 'icon_set_1_icon-3');
INSERT INTO `tb_icon` VALUES (4, 'icon_set_1_icon-4');
INSERT INTO `tb_icon` VALUES (5, 'icon_set_1_icon-5');
INSERT INTO `tb_icon` VALUES (6, 'icon_set_1_icon-6');
INSERT INTO `tb_icon` VALUES (7, 'icon_set_1_icon-7');
INSERT INTO `tb_icon` VALUES (8, 'icon_set_1_icon-8');
INSERT INTO `tb_icon` VALUES (9, 'icon_set_1_icon-9');
INSERT INTO `tb_icon` VALUES (10, 'icon_set_1_icon-10');
INSERT INTO `tb_icon` VALUES (11, 'icon_set_1_icon-11');
INSERT INTO `tb_icon` VALUES (12, 'icon_set_1_icon-12');
INSERT INTO `tb_icon` VALUES (13, 'icon_set_1_icon-13');
INSERT INTO `tb_icon` VALUES (14, 'icon_set_1_icon-14');
INSERT INTO `tb_icon` VALUES (15, 'icon_set_1_icon-15');
INSERT INTO `tb_icon` VALUES (16, 'icon_set_1_icon-16');
INSERT INTO `tb_icon` VALUES (17, 'icon_set_1_icon-17');
INSERT INTO `tb_icon` VALUES (18, 'icon_set_1_icon-18');
INSERT INTO `tb_icon` VALUES (19, 'icon_set_1_icon-19');
INSERT INTO `tb_icon` VALUES (20, 'icon_set_1_icon-20');
INSERT INTO `tb_icon` VALUES (21, 'icon_set_1_icon-21');
INSERT INTO `tb_icon` VALUES (22, 'icon_set_1_icon-22');
INSERT INTO `tb_icon` VALUES (23, 'icon_set_1_icon-23');
INSERT INTO `tb_icon` VALUES (24, 'icon_set_1_icon-24');
INSERT INTO `tb_icon` VALUES (25, 'icon_set_1_icon-25');
INSERT INTO `tb_icon` VALUES (26, 'icon_set_1_icon-26');
INSERT INTO `tb_icon` VALUES (27, 'icon_set_1_icon-27');
INSERT INTO `tb_icon` VALUES (28, 'icon_set_1_icon-28');
INSERT INTO `tb_icon` VALUES (29, 'icon_set_1_icon-29');
INSERT INTO `tb_icon` VALUES (30, 'icon_set_1_icon-30');
INSERT INTO `tb_icon` VALUES (31, 'icon_set_1_icon-31');
INSERT INTO `tb_icon` VALUES (32, 'icon_set_1_icon-32');
INSERT INTO `tb_icon` VALUES (33, 'icon_set_1_icon-33');
INSERT INTO `tb_icon` VALUES (34, 'icon_set_1_icon-34');
INSERT INTO `tb_icon` VALUES (35, 'icon_set_1_icon-35');
INSERT INTO `tb_icon` VALUES (36, 'icon_set_1_icon-36');
INSERT INTO `tb_icon` VALUES (37, 'icon_set_1_icon-37');
INSERT INTO `tb_icon` VALUES (38, 'icon_set_1_icon-38');
INSERT INTO `tb_icon` VALUES (39, 'icon_set_1_icon-39');
INSERT INTO `tb_icon` VALUES (40, 'icon_set_1_icon-40');
INSERT INTO `tb_icon` VALUES (41, 'icon_set_1_icon-41');
INSERT INTO `tb_icon` VALUES (42, 'icon_set_1_icon-42');
INSERT INTO `tb_icon` VALUES (43, 'icon_set_1_icon-43');
INSERT INTO `tb_icon` VALUES (44, 'icon_set_1_icon-44');
INSERT INTO `tb_icon` VALUES (45, 'icon_set_1_icon-45');
INSERT INTO `tb_icon` VALUES (46, 'icon_set_1_icon-46');
INSERT INTO `tb_icon` VALUES (47, 'icon_set_1_icon-47');
INSERT INTO `tb_icon` VALUES (48, 'icon_set_1_icon-48');
INSERT INTO `tb_icon` VALUES (49, 'icon_set_1_icon-49');
INSERT INTO `tb_icon` VALUES (50, 'icon_set_1_icon-50');
INSERT INTO `tb_icon` VALUES (51, 'icon_set_1_icon-51');
INSERT INTO `tb_icon` VALUES (52, 'icon_set_1_icon-52');
INSERT INTO `tb_icon` VALUES (53, 'icon_set_1_icon-53');
INSERT INTO `tb_icon` VALUES (54, 'icon_set_1_icon-54');
INSERT INTO `tb_icon` VALUES (55, 'icon_set_1_icon-55');
INSERT INTO `tb_icon` VALUES (56, 'icon_set_1_icon-56');
INSERT INTO `tb_icon` VALUES (57, 'icon_set_1_icon-57');
INSERT INTO `tb_icon` VALUES (58, 'icon_set_1_icon-58');
INSERT INTO `tb_icon` VALUES (59, 'icon_set_1_icon-59');
INSERT INTO `tb_icon` VALUES (60, 'icon_set_1_icon-60');
INSERT INTO `tb_icon` VALUES (61, 'icon_set_1_icon-61');
INSERT INTO `tb_icon` VALUES (62, 'icon_set_1_icon-62');
INSERT INTO `tb_icon` VALUES (63, 'icon_set_1_icon-63');
INSERT INTO `tb_icon` VALUES (64, 'icon_set_1_icon-64');
INSERT INTO `tb_icon` VALUES (65, 'icon_set_1_icon-65');
INSERT INTO `tb_icon` VALUES (66, 'icon_set_1_icon-66');
INSERT INTO `tb_icon` VALUES (67, 'icon_set_1_icon-67');
INSERT INTO `tb_icon` VALUES (68, 'icon_set_1_icon-68');
INSERT INTO `tb_icon` VALUES (69, 'icon_set_1_icon-69');
INSERT INTO `tb_icon` VALUES (70, 'icon_set_1_icon-70');
INSERT INTO `tb_icon` VALUES (71, 'icon_set_1_icon-71');
INSERT INTO `tb_icon` VALUES (72, 'icon_set_1_icon-72');
INSERT INTO `tb_icon` VALUES (73, 'icon_set_1_icon-73');
INSERT INTO `tb_icon` VALUES (74, 'icon_set_1_icon-74');
INSERT INTO `tb_icon` VALUES (75, 'icon_set_1_icon-75');
INSERT INTO `tb_icon` VALUES (76, 'icon_set_1_icon-76');
INSERT INTO `tb_icon` VALUES (77, 'icon_set_1_icon-77');
INSERT INTO `tb_icon` VALUES (78, 'icon_set_1_icon-78');
INSERT INTO `tb_icon` VALUES (79, 'icon_set_1_icon-79');
INSERT INTO `tb_icon` VALUES (80, 'icon_set_1_icon-80');
INSERT INTO `tb_icon` VALUES (81, 'icon_set_1_icon-81');
INSERT INTO `tb_icon` VALUES (82, 'icon_set_1_icon-82');
INSERT INTO `tb_icon` VALUES (83, 'icon_set_1_icon-83');
INSERT INTO `tb_icon` VALUES (84, 'icon_set_1_icon-84');
INSERT INTO `tb_icon` VALUES (85, 'icon_set_1_icon-85');
INSERT INTO `tb_icon` VALUES (86, 'icon_set_1_icon-86');
INSERT INTO `tb_icon` VALUES (87, 'icon_set_1_icon-87');
INSERT INTO `tb_icon` VALUES (88, 'icon_set_1_icon-88');
INSERT INTO `tb_icon` VALUES (89, 'icon_set_1_icon-89');
INSERT INTO `tb_icon` VALUES (90, 'icon_set_1_icon-90');
INSERT INTO `tb_icon` VALUES (91, 'icon_set_1_icon-91');
INSERT INTO `tb_icon` VALUES (92, 'icon_set_1_icon-92');
INSERT INTO `tb_icon` VALUES (93, 'icon_set_1_icon-93');
INSERT INTO `tb_icon` VALUES (94, 'icon_set_1_icon-94');
INSERT INTO `tb_icon` VALUES (95, 'icon_set_1_icon-95');
INSERT INTO `tb_icon` VALUES (96, 'icon_set_1_icon-96');
INSERT INTO `tb_icon` VALUES (97, 'icon_set_1_icon-97');
INSERT INTO `tb_icon` VALUES (98, 'icon_set_1_icon-98');
INSERT INTO `tb_icon` VALUES (99, 'icon_set_1_icon-99');
INSERT INTO `tb_icon` VALUES (100, 'icon_set_1_icon-100');

-- ----------------------------
-- Table structure for tb_kategori
-- ----------------------------
DROP TABLE IF EXISTS `tb_kategori`;
CREATE TABLE `tb_kategori`  (
  `id_kategori` int(6) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `icon` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `deskripsi` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `diupdate` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `dimasukan` timestamp(0) NULL DEFAULT NULL,
  `id_admin` int(5) NULL DEFAULT NULL,
  PRIMARY KEY (`id_kategori`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 106 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tb_kategori
-- ----------------------------
INSERT INTO `tb_kategori` VALUES (1, 'Desa Wisata', '32', 'Desa wisata adalah komunitas atau masyarakat yang terdiri dari para penduduk suatu wilayah terbatas yang bisa saling berinteraksi secara langsung dibawah sebuah pengelolaan dan memiliki kepedulian serta kesadaran untuk berperan bersama dengan menyesuaikan keterampilan individual berbeda. ', '2021-04-16 06:09:04', NULL, 1);
INSERT INTO `tb_kategori` VALUES (2, 'Wisata alam', '32', 'ini adalah wisata alam ini adalah wisata alam ini adalah wisata alam', '2021-04-16 06:15:58', NULL, NULL);
INSERT INTO `tb_kategori` VALUES (60, 'Wisata alam', '32', 'ini adalah wisata alam', '2018-11-02 21:11:21', NULL, 1);
INSERT INTO `tb_kategori` VALUES (61, 'Wisata Kuliner', '58', 'ini adalah wisata kuliner aja', '2018-11-02 21:11:11', NULL, 1);
INSERT INTO `tb_kategori` VALUES (62, 'Wisata Kerajinan', '15', 'ini adalah wisata kerajinan', '2018-11-02 20:58:50', NULL, 1);
INSERT INTO `tb_kategori` VALUES (69, 'Wisata Air Panas', '44', 'ini adalah wisata air panas', '2018-11-02 20:58:36', NULL, 1);
INSERT INTO `tb_kategori` VALUES (70, 'Toko', '32', 'ini adalah kategori wisata dimana tempat-tempat bersejarah penting untuk dikunjungi ini adalah kategori wisata dimana tempat-tempat bersejarah penting untuk dikunjungi', '2021-04-14 02:39:25', NULL, 1);
INSERT INTO `tb_kategori` VALUES (71, 'Restoran', '8', 'asdasdasda asdasd', '2018-11-02 20:58:04', NULL, 1);
INSERT INTO `tb_kategori` VALUES (73, 'Kafe', '32', ' adalah cafe adalah cafe adalah cafe', '2021-04-14 02:39:04', NULL, 1);
INSERT INTO `tb_kategori` VALUES (105, '2223', '32', '343234ddddd', '2021-04-14 02:56:49', NULL, NULL);

-- ----------------------------
-- Table structure for tb_log
-- ----------------------------
DROP TABLE IF EXISTS `tb_log`;
CREATE TABLE `tb_log`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_admin` int(11) NULL DEFAULT NULL,
  `aktifitas` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `diinsert_pada` timestamp(0) NULL DEFAULT CURRENT_TIMESTAMP(0) ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 225 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_log
-- ----------------------------
INSERT INTO `tb_log` VALUES (2, 1, 'Menambahkan satu buah kategori', '2021-04-14 02:54:35');
INSERT INTO `tb_log` VALUES (3, 1, 'Memperbarui satu buah kategori dengan id 104', '2021-04-14 02:55:53');
INSERT INTO `tb_log` VALUES (4, 1, 'Memperbarui satu buah kategori dengan id 104', '2021-04-14 02:56:05');
INSERT INTO `tb_log` VALUES (5, 1, 'Menghapus satu buah kategori dengan id ', '2021-04-14 02:56:09');
INSERT INTO `tb_log` VALUES (8, 1, 'Menambahkan admin ty', '2021-04-14 03:21:31');
INSERT INTO `tb_log` VALUES (9, 1, 'Menambahkan admin sdfsdf', '2021-04-14 03:22:35');
INSERT INTO `tb_log` VALUES (10, 1, 'Menambahkan admin sdfsdfsdf', '2021-04-14 03:22:52');
INSERT INTO `tb_log` VALUES (11, 1, 'Menghapus satu buah kategori dengan id 6', '2021-04-14 03:23:24');
INSERT INTO `tb_log` VALUES (12, 1, 'Menghapus admin dengan id 4', '2021-04-14 03:23:59');
INSERT INTO `tb_log` VALUES (13, 1, 'Menambahkan admin yyyyyy', '2021-04-14 03:32:36');
INSERT INTO `tb_log` VALUES (14, 1, 'Menambahkan admin rrtrrrrrr', '2021-04-14 03:32:52');
INSERT INTO `tb_log` VALUES (15, 1, 'Menambahkan admin werwerwe', '2021-04-14 03:37:01');
INSERT INTO `tb_log` VALUES (16, 1, 'Menambahkan admin sdfsdfsdf', '2021-04-14 03:37:45');
INSERT INTO `tb_log` VALUES (17, 1, 'Menambahkan admin infolayanandokumen@gmail.com', '2021-04-14 03:38:41');
INSERT INTO `tb_log` VALUES (18, 1, 'Menambahkan admin dfgdfg', '2021-04-14 03:39:15');
INSERT INTO `tb_log` VALUES (19, 1, 'Menambahkan admin sdfsdfsdfsdf', '2021-04-14 03:40:24');
INSERT INTO `tb_log` VALUES (20, 1, 'Menambahkan admin ewerwerwe', '2021-04-14 03:40:44');
INSERT INTO `tb_log` VALUES (21, 1, 'Menambahkan admin 2342343', '2021-04-14 03:44:42');
INSERT INTO `tb_log` VALUES (22, 1, 'Menghapus admin dengan id 15', '2021-04-14 03:45:21');
INSERT INTO `tb_log` VALUES (23, 1, 'Menghapus admin dengan id 14', '2021-04-14 03:45:24');
INSERT INTO `tb_log` VALUES (24, 1, 'Menambahkan admin 123123123', '2021-04-14 15:04:47');
INSERT INTO `tb_log` VALUES (25, 1, 'Menambahkan admin 12123', '2021-04-14 15:04:59');
INSERT INTO `tb_log` VALUES (26, 1, 'Menghapus admin dengan id 4', '2021-04-14 15:07:15');
INSERT INTO `tb_log` VALUES (27, 1, 'Memperbarui satu buah kategori dengan id 5', '2021-04-14 17:03:15');
INSERT INTO `tb_log` VALUES (28, 1, 'Memperbarui satu buah kategori dengan id 5', '2021-04-14 17:03:27');
INSERT INTO `tb_log` VALUES (29, 1, 'Memperbarui satu buah kategori dengan id 5', '2021-04-14 17:03:32');
INSERT INTO `tb_log` VALUES (30, 1, 'Memperbarui satu buah kategori dengan id 5', '2021-04-14 17:04:43');
INSERT INTO `tb_log` VALUES (31, 1, 'Memperbarui satu buah kategori dengan id 5', '2021-04-14 17:04:46');
INSERT INTO `tb_log` VALUES (32, 1, 'Memperbarui satu buah kategori dengan id 5', '2021-04-14 17:05:01');
INSERT INTO `tb_log` VALUES (33, 1, 'Memperbarui admin dengan id 5', '2021-04-14 17:05:46');
INSERT INTO `tb_log` VALUES (34, 1, 'Memperbarui admin dengan id 1', '2021-04-14 21:23:41');
INSERT INTO `tb_log` VALUES (35, 1, 'Memperbarui admin dengan id 1', '2021-04-14 21:25:11');
INSERT INTO `tb_log` VALUES (36, 1, 'Memperbarui admin dengan id 3', '2021-04-14 21:25:21');
INSERT INTO `tb_log` VALUES (37, 3, 'Menambahkan admin 123', '2021-04-14 21:25:44');
INSERT INTO `tb_log` VALUES (38, 3, 'Menambahkan 1 buah gambar ', '2021-04-15 01:14:08');
INSERT INTO `tb_log` VALUES (39, 3, 'Menambahkan 1 buah gambar ', '2021-04-15 01:14:29');
INSERT INTO `tb_log` VALUES (40, 3, 'Menambahkan 1 buah gambar ', '2021-04-15 01:14:46');
INSERT INTO `tb_log` VALUES (41, 3, 'Menambahkan 1 buah gambar ', '2021-04-15 01:16:02');
INSERT INTO `tb_log` VALUES (42, 3, 'Menghapus admin dengan id 12', '2021-04-15 01:18:58');
INSERT INTO `tb_log` VALUES (43, 3, 'Menghapus admin dengan id 13', '2021-04-15 01:19:03');
INSERT INTO `tb_log` VALUES (44, 3, 'Menghapus admin dengan id 14', '2021-04-15 01:19:06');
INSERT INTO `tb_log` VALUES (45, 3, 'Menambahkan 1 buah gambar ', '2021-04-15 01:19:50');
INSERT INTO `tb_log` VALUES (46, 3, 'Menambahkan 1 buah gambar ', '2021-04-15 01:20:17');
INSERT INTO `tb_log` VALUES (47, 3, 'Menghapus admin dengan id 15', '2021-04-15 01:20:32');
INSERT INTO `tb_log` VALUES (48, 3, 'Menambahkan 1 buah gambar ', '2021-04-15 01:20:46');
INSERT INTO `tb_log` VALUES (49, 3, 'Menghapus admin dengan id 17', '2021-04-15 01:20:50');
INSERT INTO `tb_log` VALUES (50, 3, 'Menambahkan 1 buah gambar ', '2021-04-15 01:21:26');
INSERT INTO `tb_log` VALUES (51, 3, 'Menghapus admin dengan id 11', '2021-04-15 01:21:29');
INSERT INTO `tb_log` VALUES (52, 3, 'Memperbarui galeri dengan id 16', '2021-04-15 01:29:48');
INSERT INTO `tb_log` VALUES (53, 3, 'Memperbarui admin dengan id ', '2021-04-15 01:29:48');
INSERT INTO `tb_log` VALUES (54, 3, 'Memperbarui galeri dengan id 16', '2021-04-15 01:30:05');
INSERT INTO `tb_log` VALUES (55, 3, 'Memperbarui admin dengan id ', '2021-04-15 01:30:05');
INSERT INTO `tb_log` VALUES (56, 3, 'Memperbarui galeri dengan id 16', '2021-04-15 01:30:20');
INSERT INTO `tb_log` VALUES (57, 3, 'Memperbarui admin dengan id ', '2021-04-15 01:30:20');
INSERT INTO `tb_log` VALUES (58, 3, 'Memperbarui galeri dengan id 16', '2021-04-15 01:30:45');
INSERT INTO `tb_log` VALUES (59, 3, 'Memperbarui admin dengan id ', '2021-04-15 01:30:45');
INSERT INTO `tb_log` VALUES (60, 3, 'Memperbarui galeri dengan id 18', '2021-04-15 01:30:51');
INSERT INTO `tb_log` VALUES (61, 3, 'Memperbarui admin dengan id ', '2021-04-15 01:30:51');
INSERT INTO `tb_log` VALUES (62, 3, 'Memperbarui galeri dengan id 18', '2021-04-15 01:30:58');
INSERT INTO `tb_log` VALUES (63, 3, 'Memperbarui admin dengan id ', '2021-04-15 01:30:58');
INSERT INTO `tb_log` VALUES (64, 3, 'Memperbarui galeri dengan id 18', '2021-04-15 01:31:29');
INSERT INTO `tb_log` VALUES (65, 3, 'Memperbarui galeri dengan id 16', '2021-04-15 01:32:10');
INSERT INTO `tb_log` VALUES (66, 3, 'Memperbarui galeri dengan id 18', '2021-04-15 01:33:57');
INSERT INTO `tb_log` VALUES (67, 3, 'Memperbarui galeri dengan id 18', '2021-04-15 01:34:01');
INSERT INTO `tb_log` VALUES (68, 3, 'Memperbarui galeri dengan id 18', '2021-04-15 01:34:54');
INSERT INTO `tb_log` VALUES (69, 3, 'Menghapus admin dengan id 18', '2021-04-15 01:34:58');
INSERT INTO `tb_log` VALUES (70, 3, 'Menambahkan 1 buah gambar ', '2021-04-15 01:35:07');
INSERT INTO `tb_log` VALUES (71, 3, 'Menghapus admin dengan id 19', '2021-04-15 01:35:09');
INSERT INTO `tb_log` VALUES (72, 3, 'Menambahkan 1 buah gambar ', '2021-04-15 01:35:17');
INSERT INTO `tb_log` VALUES (73, 3, 'Memperbarui galeri dengan id 20', '2021-04-15 01:35:22');
INSERT INTO `tb_log` VALUES (74, 3, 'Memperbarui galeri dengan id 20', '2021-04-15 01:37:11');
INSERT INTO `tb_log` VALUES (75, 3, 'Memperbarui galeri dengan id 20', '2021-04-15 01:37:15');
INSERT INTO `tb_log` VALUES (76, 3, 'Memperbarui galeri dengan id 20', '2021-04-15 01:47:49');
INSERT INTO `tb_log` VALUES (77, 3, 'Memperbarui galeri dengan id 20', '2021-04-15 01:49:03');
INSERT INTO `tb_log` VALUES (78, 3, 'Memperbarui galeri dengan id 20', '2021-04-15 01:49:16');
INSERT INTO `tb_log` VALUES (79, 3, 'Memperbarui galeri dengan id 20', '2021-04-15 01:49:58');
INSERT INTO `tb_log` VALUES (80, 3, 'Memperbarui galeri dengan id 20', '2021-04-15 01:50:07');
INSERT INTO `tb_log` VALUES (81, 3, 'Menghapus admin dengan id 20', '2021-04-15 01:50:14');
INSERT INTO `tb_log` VALUES (82, NULL, 'Memperbarui galeri dengan id 16', '2021-04-15 03:55:36');
INSERT INTO `tb_log` VALUES (83, NULL, 'Menambahkan 1 buah video ', '2021-04-15 03:59:54');
INSERT INTO `tb_log` VALUES (84, NULL, 'Menambahkan 1 buah video ', '2021-04-15 04:00:08');
INSERT INTO `tb_log` VALUES (85, NULL, 'Menambahkan 1 buah video ', '2021-04-15 04:00:24');
INSERT INTO `tb_log` VALUES (86, NULL, 'Menambahkan 1 buah video ', '2021-04-15 04:01:50');
INSERT INTO `tb_log` VALUES (87, NULL, 'Menambahkan 1 buah video ', '2021-04-15 04:02:09');
INSERT INTO `tb_log` VALUES (88, NULL, 'Menambahkan 1 buah video ', '2021-04-15 04:03:19');
INSERT INTO `tb_log` VALUES (89, NULL, 'Menghapus admin dengan id 1', '2021-04-15 04:04:28');
INSERT INTO `tb_log` VALUES (90, NULL, 'Menghapus admin dengan id 4', '2021-04-15 04:04:33');
INSERT INTO `tb_log` VALUES (91, NULL, 'Menghapus admin dengan id 3', '2021-04-15 04:04:36');
INSERT INTO `tb_log` VALUES (92, NULL, 'Menambahkan 1 buah video ', '2021-04-15 04:04:49');
INSERT INTO `tb_log` VALUES (93, NULL, 'Menambahkan 1 buah video ', '2021-04-15 04:06:32');
INSERT INTO `tb_log` VALUES (94, NULL, 'Menambahkan 1 buah video ', '2021-04-15 04:07:14');
INSERT INTO `tb_log` VALUES (95, NULL, 'Menghapus admin dengan id 5', '2021-04-15 04:07:21');
INSERT INTO `tb_log` VALUES (96, NULL, 'Menghapus admin dengan id 6', '2021-04-15 04:07:25');
INSERT INTO `tb_log` VALUES (97, NULL, 'Menghapus admin dengan id 7', '2021-04-15 04:07:29');
INSERT INTO `tb_log` VALUES (98, NULL, 'Menambahkan 1 buah video ', '2021-04-15 04:07:53');
INSERT INTO `tb_log` VALUES (99, NULL, 'Menghapus admin dengan id 2', '2021-04-15 04:08:28');
INSERT INTO `tb_log` VALUES (100, NULL, 'Menambahkan 1 buah video ', '2021-04-15 04:09:07');
INSERT INTO `tb_log` VALUES (101, NULL, 'Menambahkan 1 buah video ', '2021-04-15 04:09:25');
INSERT INTO `tb_log` VALUES (102, NULL, 'Menghapus admin dengan id 9', '2021-04-15 04:09:31');
INSERT INTO `tb_log` VALUES (103, NULL, 'Menghapus admin dengan id 10', '2021-04-15 04:09:36');
INSERT INTO `tb_log` VALUES (104, NULL, 'Menambahkan 1 buah video ', '2021-04-15 04:10:02');
INSERT INTO `tb_log` VALUES (105, NULL, 'Menghapus admin dengan id 11', '2021-04-15 04:10:06');
INSERT INTO `tb_log` VALUES (106, NULL, 'Menambahkan 1 buah video ', '2021-04-15 04:10:42');
INSERT INTO `tb_log` VALUES (107, NULL, 'Menghapus admin dengan id 8', '2021-04-15 04:11:16');
INSERT INTO `tb_log` VALUES (108, NULL, 'Memperbarui galeri dengan id ', '2021-04-15 04:22:05');
INSERT INTO `tb_log` VALUES (109, NULL, 'Memperbarui Video dengan id ', '2021-04-15 04:24:23');
INSERT INTO `tb_log` VALUES (110, NULL, 'Memperbarui Video dengan id ', '2021-04-15 04:24:31');
INSERT INTO `tb_log` VALUES (111, NULL, 'Memperbarui Video dengan id ', '2021-04-15 04:25:03');
INSERT INTO `tb_log` VALUES (112, NULL, 'Memperbarui Video dengan id ', '2021-04-15 04:26:33');
INSERT INTO `tb_log` VALUES (113, NULL, 'Memperbarui Video dengan id 12', '2021-04-15 04:26:42');
INSERT INTO `tb_log` VALUES (114, NULL, 'Memperbarui Video dengan id 0', '2021-04-15 04:26:55');
INSERT INTO `tb_log` VALUES (115, NULL, 'Memperbarui Video dengan id 0', '2021-04-15 04:27:19');
INSERT INTO `tb_log` VALUES (116, NULL, 'Menambahkan 1 buah video ', '2021-04-15 04:27:35');
INSERT INTO `tb_log` VALUES (117, NULL, 'Memperbarui Video dengan id 13', '2021-04-15 04:27:53');
INSERT INTO `tb_log` VALUES (118, 3, 'Menambahkan 1 buah gambar ', '2021-04-15 19:42:03');
INSERT INTO `tb_log` VALUES (119, 3, 'Menambahkan 1 buah data fasilitas ', '2021-04-15 19:44:23');
INSERT INTO `tb_log` VALUES (120, 3, 'Menambahkan 1 buah data fasilitas ', '2021-04-15 19:44:34');
INSERT INTO `tb_log` VALUES (121, 3, 'Menghapus admin dengan id 21', '2021-04-15 19:44:42');
INSERT INTO `tb_log` VALUES (122, 3, 'Menambahkan 1 buah data fasilitas ', '2021-04-15 19:46:02');
INSERT INTO `tb_log` VALUES (123, 3, 'Menambahkan 1 buah data fasilitas ', '2021-04-15 19:46:20');
INSERT INTO `tb_log` VALUES (124, 3, 'Menambahkan 1 buah data fasilitas ', '2021-04-15 19:51:02');
INSERT INTO `tb_log` VALUES (125, 3, 'Menambahkan 1 buah data fasilitas ', '2021-04-15 19:51:58');
INSERT INTO `tb_log` VALUES (126, 3, 'Menghapus admin dengan id 20', '2021-04-15 19:52:03');
INSERT INTO `tb_log` VALUES (127, 3, 'Menambahkan 1 buah data fasilitas ', '2021-04-15 19:53:42');
INSERT INTO `tb_log` VALUES (128, 3, 'Menghapus admin dengan id 25', '2021-04-15 19:54:49');
INSERT INTO `tb_log` VALUES (129, 3, 'Menghapus admin dengan id 25', '2021-04-15 19:55:09');
INSERT INTO `tb_log` VALUES (130, 3, 'Menghapus admin dengan id 24', '2021-04-15 19:55:12');
INSERT INTO `tb_log` VALUES (131, 3, 'Menghapus admin dengan id 23', '2021-04-15 19:55:21');
INSERT INTO `tb_log` VALUES (132, 3, 'Menghapus admin dengan id 22', '2021-04-15 19:55:24');
INSERT INTO `tb_log` VALUES (133, 3, 'Menghapus admin dengan id 21', '2021-04-15 19:55:26');
INSERT INTO `tb_log` VALUES (134, 3, 'Menghapus admin dengan id 20', '2021-04-15 19:55:28');
INSERT INTO `tb_log` VALUES (135, 3, 'Menambahkan 1 buah data fasilitas ', '2021-04-15 19:56:08');
INSERT INTO `tb_log` VALUES (136, 3, 'Menghapus admin dengan id 26', '2021-04-15 19:56:15');
INSERT INTO `tb_log` VALUES (137, 3, 'Menambahkan 1 buah data fasilitas ', '2021-04-15 19:56:40');
INSERT INTO `tb_log` VALUES (138, 3, 'Menambahkan 1 buah data fasilitas ', '2021-04-15 20:00:17');
INSERT INTO `tb_log` VALUES (139, 3, 'Menambahkan 1 buah data fasilitas ', '2021-04-15 20:00:28');
INSERT INTO `tb_log` VALUES (140, 3, 'Menghapus admin dengan id 29', '2021-04-15 20:00:30');
INSERT INTO `tb_log` VALUES (141, 3, 'Memperbarui galeri dengan id ', '2021-04-15 20:08:48');
INSERT INTO `tb_log` VALUES (142, 3, 'Memperbarui galeri dengan id ', '2021-04-15 20:09:35');
INSERT INTO `tb_log` VALUES (143, 3, 'Memperbarui galeri dengan id 28', '2021-04-15 20:09:41');
INSERT INTO `tb_log` VALUES (144, 3, 'Memperbarui galeri dengan id 28', '2021-04-15 20:10:17');
INSERT INTO `tb_log` VALUES (145, 3, 'Memperbarui galeri dengan id 28', '2021-04-15 20:10:59');
INSERT INTO `tb_log` VALUES (146, 3, 'Memperbarui galeri dengan id 28', '2021-04-15 20:11:08');
INSERT INTO `tb_log` VALUES (147, 3, 'Memperbarui galeri dengan id 28', '2021-04-15 20:13:32');
INSERT INTO `tb_log` VALUES (148, 3, 'Menghapus admin dengan id 13', '2021-04-15 20:13:52');
INSERT INTO `tb_log` VALUES (149, 3, 'Memperbarui galeri dengan id 27', '2021-04-15 20:14:47');
INSERT INTO `tb_log` VALUES (150, 3, 'Menambahkan 1 buah data fasilitas ', '2021-04-16 02:24:23');
INSERT INTO `tb_log` VALUES (151, 3, 'Menambahkan 1 buah data wisata ', '2021-04-16 02:29:33');
INSERT INTO `tb_log` VALUES (152, 3, 'Menambahkan 1 buah data fasilitas ', '2021-04-16 02:29:46');
INSERT INTO `tb_log` VALUES (153, 3, 'Menambahkan 1 buah data fasilitas ', '2021-04-16 02:30:05');
INSERT INTO `tb_log` VALUES (154, 3, 'Menambahkan 1 buah data wisata ', '2021-04-16 02:30:58');
INSERT INTO `tb_log` VALUES (155, 3, 'Menambahkan 1 buah data wisata ', '2021-04-16 02:33:01');
INSERT INTO `tb_log` VALUES (156, 3, 'Menambahkan 1 buah data wisata ', '2021-04-16 02:33:38');
INSERT INTO `tb_log` VALUES (157, 3, 'Menghapus admin dengan id 103', '2021-04-16 02:34:21');
INSERT INTO `tb_log` VALUES (158, 3, 'Menghapus admin dengan id 102', '2021-04-16 02:34:27');
INSERT INTO `tb_log` VALUES (159, 3, 'Menghapus admin dengan id 102', '2021-04-16 02:34:46');
INSERT INTO `tb_log` VALUES (160, 3, 'Menambahkan 1 buah data wisata ', '2021-04-16 02:35:01');
INSERT INTO `tb_log` VALUES (161, 3, 'Menghapus admin dengan id 106', '2021-04-16 02:35:06');
INSERT INTO `tb_log` VALUES (162, 3, 'Memperbarui galeri dengan id ', '2021-04-16 02:42:36');
INSERT INTO `tb_log` VALUES (163, 3, 'Memperbarui galeri dengan id 99', '2021-04-16 02:43:46');
INSERT INTO `tb_log` VALUES (164, 3, 'Memperbarui galeri dengan id 99', '2021-04-16 02:43:53');
INSERT INTO `tb_log` VALUES (165, 3, 'Memperbarui galeri dengan id 91', '2021-04-16 03:50:13');
INSERT INTO `tb_log` VALUES (166, 3, 'Memperbarui galeri dengan id 91', '2021-04-16 03:52:34');
INSERT INTO `tb_log` VALUES (167, 3, 'Memperbarui galeri dengan id 91', '2021-04-16 03:53:05');
INSERT INTO `tb_log` VALUES (168, 3, 'Memperbarui galeri dengan id 92', '2021-04-16 03:53:14');
INSERT INTO `tb_log` VALUES (169, 3, 'Memperbarui galeri dengan id 93', '2021-04-16 03:53:27');
INSERT INTO `tb_log` VALUES (170, 3, 'Memperbarui galeri dengan id 94', '2021-04-16 03:53:36');
INSERT INTO `tb_log` VALUES (171, 3, 'Memperbarui galeri dengan id 98', '2021-04-16 03:53:48');
INSERT INTO `tb_log` VALUES (172, 3, 'Menghapus admin dengan id 105', '2021-04-16 03:53:54');
INSERT INTO `tb_log` VALUES (173, 3, 'Menghapus admin dengan id 101', '2021-04-16 03:54:00');
INSERT INTO `tb_log` VALUES (174, 3, 'Memperbarui galeri dengan id 95', '2021-04-16 04:03:44');
INSERT INTO `tb_log` VALUES (175, 3, 'Memperbarui galeri dengan id 96', '2021-04-16 04:03:54');
INSERT INTO `tb_log` VALUES (176, 3, 'Memperbarui galeri dengan id 95', '2021-04-16 04:04:02');
INSERT INTO `tb_log` VALUES (177, 3, 'Memperbarui galeri dengan id 97', '2021-04-16 04:04:09');
INSERT INTO `tb_log` VALUES (178, 3, 'Memperbarui galeri dengan id 100', '2021-04-16 04:04:17');
INSERT INTO `tb_log` VALUES (179, 3, 'Memperbarui galeri dengan id 0', '2021-04-16 04:06:41');
INSERT INTO `tb_log` VALUES (180, 3, 'Memperbarui galeri dengan id 0', '2021-04-16 04:06:48');
INSERT INTO `tb_log` VALUES (181, 3, 'Memperbarui galeri dengan id 22', '2021-04-16 04:07:11');
INSERT INTO `tb_log` VALUES (182, 3, 'Memperbarui galeri dengan id 93', '2021-04-16 04:08:19');
INSERT INTO `tb_log` VALUES (183, 3, 'Memperbarui galeri dengan id 93', '2021-04-16 04:08:29');
INSERT INTO `tb_log` VALUES (184, 3, 'Memperbarui galeri dengan id 22', '2021-04-16 04:08:47');
INSERT INTO `tb_log` VALUES (185, 3, 'Memperbarui galeri dengan id 22', '2021-04-16 04:09:54');
INSERT INTO `tb_log` VALUES (186, 3, 'Memperbarui galeri dengan id 22', '2021-04-16 04:11:47');
INSERT INTO `tb_log` VALUES (187, 3, 'Memperbarui galeri dengan id 22', '2021-04-16 04:11:51');
INSERT INTO `tb_log` VALUES (188, 3, 'Memperbarui galeri dengan id 93', '2021-04-16 04:23:56');
INSERT INTO `tb_log` VALUES (189, 3, 'Memperbarui galeri dengan id 92', '2021-04-16 04:24:22');
INSERT INTO `tb_log` VALUES (190, 3, 'Memperbarui galeri dengan id 93', '2021-04-16 04:39:19');
INSERT INTO `tb_log` VALUES (191, 3, 'Memperbarui admin dengan id 3', '2021-04-16 04:45:28');
INSERT INTO `tb_log` VALUES (192, 3, 'Memperbarui galeri dengan id 22', '2021-04-16 04:46:37');
INSERT INTO `tb_log` VALUES (193, 3, 'Memperbarui admin dengan id 6', '2021-04-16 04:46:44');
INSERT INTO `tb_log` VALUES (194, 3, 'Memperbarui admin dengan id 6', '2021-04-16 04:47:22');
INSERT INTO `tb_log` VALUES (195, 3, 'Memperbarui admin dengan id 1', '2021-04-16 04:51:47');
INSERT INTO `tb_log` VALUES (196, 3, 'Memperbarui admin dengan id 5', '2021-04-16 04:52:00');
INSERT INTO `tb_log` VALUES (197, 3, 'Memperbarui admin dengan id 1', '2021-04-16 04:52:04');
INSERT INTO `tb_log` VALUES (198, 3, 'Memperbarui admin dengan id 1', '2021-04-16 04:52:36');
INSERT INTO `tb_log` VALUES (199, 3, 'Memperbarui admin dengan id 1', '2021-04-16 04:53:28');
INSERT INTO `tb_log` VALUES (200, 3, 'Memperbarui admin dengan id 1', '2021-04-16 04:53:43');
INSERT INTO `tb_log` VALUES (201, 3, 'Memperbarui admin dengan id 1', '2021-04-16 04:53:48');
INSERT INTO `tb_log` VALUES (202, 3, 'Memperbarui admin dengan id 1', '2021-04-16 04:53:52');
INSERT INTO `tb_log` VALUES (203, 3, 'Memperbarui admin dengan id 3', '2021-04-16 04:53:57');
INSERT INTO `tb_log` VALUES (204, 3, 'Memperbarui admin dengan id 3', '2021-04-16 04:54:00');
INSERT INTO `tb_log` VALUES (205, 3, 'Memperbarui admin dengan id 5', '2021-04-16 04:54:05');
INSERT INTO `tb_log` VALUES (206, 3, 'Memperbarui admin dengan id 6', '2021-04-16 04:55:06');
INSERT INTO `tb_log` VALUES (207, 3, 'Memperbarui admin dengan id 5', '2021-04-16 04:55:12');
INSERT INTO `tb_log` VALUES (208, 3, 'Memperbarui admin dengan id 3', '2021-04-16 04:55:15');
INSERT INTO `tb_log` VALUES (209, 3, 'Memperbarui admin dengan id 5', '2021-04-16 04:55:19');
INSERT INTO `tb_log` VALUES (210, 3, 'Memperbarui admin dengan id 1', '2021-04-16 04:59:10');
INSERT INTO `tb_log` VALUES (211, 3, 'Memperbarui admin dengan id 1', '2021-04-16 05:00:11');
INSERT INTO `tb_log` VALUES (212, 3, 'Memperbarui admin dengan id 1', '2021-04-16 05:00:15');
INSERT INTO `tb_log` VALUES (213, 3, 'Memperbarui admin dengan id 3', '2021-04-16 05:00:36');
INSERT INTO `tb_log` VALUES (214, 3, 'Memperbarui admin dengan id 1', '2021-04-16 05:00:40');
INSERT INTO `tb_log` VALUES (215, 3, 'Memperbarui admin dengan id 3', '2021-04-16 05:00:44');
INSERT INTO `tb_log` VALUES (216, 1, 'Memperbarui galeri dengan id 27', '2021-04-16 06:00:04');
INSERT INTO `tb_log` VALUES (217, 1, 'Memperbarui Video dengan id 22', '2021-04-16 06:06:58');
INSERT INTO `tb_log` VALUES (218, 1, 'Memperbarui satu buah kategori dengan id 1', '2021-04-16 06:09:04');
INSERT INTO `tb_log` VALUES (219, 1, 'Memperbarui satu buah kategori dengan id 1', '2021-04-16 06:09:10');
INSERT INTO `tb_log` VALUES (220, 3, 'Memperbarui admin dengan id 1', '2021-04-16 06:15:02');
INSERT INTO `tb_log` VALUES (221, 1, 'Memperbarui galeri dengan id 92', '2021-04-16 06:23:32');
INSERT INTO `tb_log` VALUES (222, 1, 'Memperbarui satu buah kategori dengan id 1', '2021-04-17 18:21:11');
INSERT INTO `tb_log` VALUES (223, 1, 'Memperbarui galeri dengan id 92', '2021-04-17 18:24:00');
INSERT INTO `tb_log` VALUES (224, 1, 'Menambahkan 1 buah data wisata ', '2021-04-18 15:45:43');

-- ----------------------------
-- Table structure for tb_video
-- ----------------------------
DROP TABLE IF EXISTS `tb_video`;
CREATE TABLE `tb_video`  (
  `id_video` int(6) NOT NULL AUTO_INCREMENT,
  `nama_video` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `judul` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `cover` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `url` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `deskripsi` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `id_admin` int(5) NULL DEFAULT NULL,
  PRIMARY KEY (`id_video`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tb_video
-- ----------------------------
INSERT INTO `tb_video` VALUES (0, '22', 'SAINGAN KOPI DAO', NULL, 'https://www.youtube.com/embed/0mSAjOsJoC8', 'Ada tempat baru nih guys di Bogor. Namanya ELJI CAFE LINGKUNG GUNUNG ADVENTURE CAMP BOGOR. Satu kawasan dengan berbagai fasilitas. Disini ada Villa , tempat Camping dan Cafe. Kamu bisa ngopi cantik ditemani dengan view yang cantik. lokasinya searah dengan Kopi Daong dan Kopi Resign Pancawati ya.', NULL);

-- ----------------------------
-- Table structure for tb_wisata
-- ----------------------------
DROP TABLE IF EXISTS `tb_wisata`;
CREATE TABLE `tb_wisata`  (
  `id_wisata` int(6) NOT NULL AUTO_INCREMENT,
  `nama_wisata` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `alamat_wisata` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `deskripsi` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `latitude` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `longitude` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_admin` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_gambar` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_kategori` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_fasilitas` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `buka` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tutup` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kontak` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_wisata`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 106 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tb_wisata
-- ----------------------------
INSERT INTO `tb_wisata` VALUES (22, 'Desa Melayusssssss', 'Jl Desa Melayu', 'Desa wisata ini menawarkan wisata edukasi seputar pengenalan kain tenun', '-8.452308153007834', '118.72188710157246', NULL, '250858513144.jpg', '61', 'sadss', '08:10', '10:24', '23234');
INSERT INTO `tb_wisata` VALUES (91, 'Pulau Ular', 'Pulau Ular', 'Pulau ular adalah pulau dimana terdapat banyak hewan ular yang mendiami di pulau tersebut. ular-ular di pulau tersebut tidak berbisa melainkan jinak dan photogenics', '-8.457439605632743', '118.72967515653204', NULL, '250858513131.jpg', NULL, 'wewer', '11:05', '22:30', 'd');
INSERT INTO `tb_wisata` VALUES (92, 'Tenun Kain', 'Desa Wisata Soromandi', 'Belajar membuat kain tenun bima dengan bantula peralatan seadanya', '-8.45559592173015', '118.72924412207811', NULL, '250858513132.jpg', '2', '', '', '', '');
INSERT INTO `tb_wisata` VALUES (93, 'Pantai Sorowajan', 'Jl ahmad sudirman km 32', 'Ini adalah pantai terbaik sepanjang masa', '-8.454858545301377', '118.72858227255108', NULL, '250858513141.jpg', '1', '', '01:30', '10:30', '');
INSERT INTO `tb_wisata` VALUES (94, 'Gidi Permai', 'Jati Mangun', 'Gidi permai adalah perbukitan di bima yang menawarkan keindahan alam yang mempesona', '-8.446588747714898', '118.73828421133317', NULL, '250858513133.jpg', NULL, '', NULL, NULL, NULL);
INSERT INTO `tb_wisata` VALUES (95, 'Desa Melayus', 'Jl Desa Melayu', 'Desa wisata ini menawarkan wisata edukasi seputar pengenalan kain tenun', '-8.460628110632129', '118.71819638195058', NULL, '250858513136.jpg', NULL, '', '08:10', '10:24', '');
INSERT INTO `tb_wisata` VALUES (96, 'Desa Wisata Kaki Langit', 'Jl Lintas Wera', 'Dalam beberapa tahun terakhir, industri pariwisata DIY melejit kembali setelah munculnya berbagai spot-spot wisata baru yang mewarnai destinasi wisata di kawasan Yogyakarta. Berawal dari trend social media yang kemudian memunculkan ide-ide baru untuk menarik wisatawan, masyarakat di DIY pun berlomba-lomba menggali potensi wisata di wilayahnya masing-masing.', '-8.439470046063278', '118.75277833633697', NULL, '250858513135.jpg', NULL, '', '01:00', '18:30', '');
INSERT INTO `tb_wisata` VALUES (97, 'sdfsdf', 'sdfsd', 'sdfsdf', '-8.455024893609888', '118.72223042431312', NULL, '250858513137.jpg', NULL, '', '07:30', '05:40', '');
INSERT INTO `tb_wisata` VALUES (98, 'Desa Melayu', 'Jl Desa Melayu', 'Desa wisata ini menawarkan wisata edukasi seputar pengenalan kain tenun', '-8.465354349655655', '118.73206394602391', NULL, '250858513134.jpg', NULL, '', '08:10', '10:24', '');
INSERT INTO `tb_wisata` VALUES (100, 'Desa Melayu', 'Jl Desa Melayu', 'Desa wisata ini menawarkan wisata edukasi seputar pengenalan kain tenun', '-8.453157136503464', '118.7348475355297', NULL, '250858513138.jpg', NULL, '', '08:10', '10:24', '');
INSERT INTO `tb_wisata` VALUES (103, '123', '3', '2', '-8.454518570743431', '118.72155307353734', NULL, '5dxiqjt5p5.jpg', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `tb_wisata` VALUES (104, '4', '4', '4', '-8.453581627546626', '118.72128628675301', NULL, '250858513125.jpg', NULL, '4', NULL, NULL, NULL);
INSERT INTO `tb_wisata` VALUES (105, 'y', 'sdfkj', '88', '-7.8352632193132905', '110.40688449737331', NULL, '250858513146.jpg', '1', 'sdjf,sdfs,sdfsd', NULL, NULL, NULL);

SET FOREIGN_KEY_CHECKS = 1;
