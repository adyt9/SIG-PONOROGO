/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 100417
 Source Host           : localhost:3306
 Source Schema         : visit_ponorogo

 Target Server Type    : MySQL
 Target Server Version : 100417
 File Encoding         : 65001

 Date: 06/06/2021 13:26:25
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
  `password` varchar(191) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `role` enum('admin','superadmin') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT 'admin',
  `gambar` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_admin`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 22 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tb_admin
-- ----------------------------
INSERT INTO `tb_admin` VALUES (17, 'superadmin', '17c4520f6cfd1ab53d8745e84681eb49', 'wulan19sary@gmail.com', 'superadmin', 'a83.jpg');
INSERT INTO `tb_admin` VALUES (19, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'admin', 'a73.jpg');
INSERT INTO `tb_admin` VALUES (20, 'superadmin', '17c4520f6cfd1ab53d8745e84681eb49', 'superadmin', 'superadmin', 'a84.jpg');
INSERT INTO `tb_admin` VALUES (21, 'bambang2', 'e10adc3949ba59abbe56e057f20f883e', 'bambangsuhat@gmail.com', 'admin', '2802364.jpg');

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
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

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
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tb_galeri
-- ----------------------------
INSERT INTO `tb_galeri` VALUES (2, 'Ini galeri wisata ponorogo', 'Ini galeri wisata ponorogo', 'ALON_ALON_5.jpg', NULL);
INSERT INTO `tb_galeri` VALUES (3, 'Reog ponorogo 2021', 'Reog ponorogo 2021', 'GAJAH_1.JPG', NULL);
INSERT INTO `tb_galeri` VALUES (4, 'Pariwisata Ponorogo 2019 ', '| We Love Ponorogo | Semua tentang Ponorogo', 'ALON_ALON_9.jpg', NULL);

-- ----------------------------
-- Table structure for tb_icon
-- ----------------------------
DROP TABLE IF EXISTS `tb_icon`;
CREATE TABLE `tb_icon`  (
  `id_icon` int(5) NOT NULL AUTO_INCREMENT,
  `icon` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_icon`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 104 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tb_icon
-- ----------------------------
INSERT INTO `tb_icon` VALUES (8, 'fa fa-car');
INSERT INTO `tb_icon` VALUES (15, 'fa fa-car');
INSERT INTO `tb_icon` VALUES (32, 'fa fa-map-marker fa-lg');
INSERT INTO `tb_icon` VALUES (44, 'fa fa-car');
INSERT INTO `tb_icon` VALUES (58, 'fa fa-car');
INSERT INTO `tb_icon` VALUES (101, 'fa fa-home fa-lg');
INSERT INTO `tb_icon` VALUES (102, 'fa fa-institution');
INSERT INTO `tb_icon` VALUES (103, 'fa fa-car');

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
) ENGINE = InnoDB AUTO_INCREMENT = 110 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tb_kategori
-- ----------------------------
INSERT INTO `tb_kategori` VALUES (2, 'Wisata alam', '101', 'ini adalah wisata alam ini adalah wisata alam ini adalah wisata alam', '2021-06-04 00:18:21', NULL, NULL);
INSERT INTO `tb_kategori` VALUES (61, 'Wisata Kuliner', '58', 'ini adalah wisata kuliner aja', '2018-11-02 21:11:11', NULL, 1);
INSERT INTO `tb_kategori` VALUES (62, 'Wisata Kerajinan', '15', 'ini adalah wisata kerajinan', '2018-11-02 20:58:50', NULL, 1);
INSERT INTO `tb_kategori` VALUES (69, 'Wisata Air Panas', '44', 'ini adalah wisata air panas', '2018-11-02 20:58:36', NULL, 1);
INSERT INTO `tb_kategori` VALUES (70, 'Wisata Buatan', '32', 'ini adalah kategori wisata dimana tempat-tempat bersejarah penting untuk dikunjungi ini adalah kategori wisata dimana tempat-tempat bersejarah penting untuk dikunjungi', '2021-06-04 23:39:52', NULL, 1);
INSERT INTO `tb_kategori` VALUES (71, 'Restoran', '8', 'asdasdasda asdasd', '2018-11-02 20:58:04', NULL, 1);
INSERT INTO `tb_kategori` VALUES (108, 'Wisata religi', '102', 'Wisata religi', NULL, NULL, NULL);
INSERT INTO `tb_kategori` VALUES (109, 'Wisata lain', '103', 'Wisata lain', NULL, NULL, NULL);

-- ----------------------------
-- Table structure for tb_log
-- ----------------------------
DROP TABLE IF EXISTS `tb_log`;
CREATE TABLE `tb_log`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_admin` int(11) NULL DEFAULT NULL,
  `aktifitas` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `diinsert_pada` timestamp(0) NULL DEFAULT current_timestamp() ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 431 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_log
-- ----------------------------
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
INSERT INTO `tb_log` VALUES (225, 3, 'Menambahkan admin asd', '2021-05-08 15:01:18');
INSERT INTO `tb_log` VALUES (226, 3, 'Memperbarui admin dengan id 7', '2021-05-08 15:01:42');
INSERT INTO `tb_log` VALUES (227, 3, 'Memperbarui admin dengan id 7', '2021-05-08 15:01:50');
INSERT INTO `tb_log` VALUES (228, 3, 'Memperbarui admin dengan id 7', '2021-05-08 15:02:20');
INSERT INTO `tb_log` VALUES (229, 3, 'Memperbarui admin dengan id 7', '2021-05-08 15:02:26');
INSERT INTO `tb_log` VALUES (230, 3, 'Memperbarui admin dengan id 7', '2021-05-08 15:07:20');
INSERT INTO `tb_log` VALUES (231, 3, 'Memperbarui admin dengan id 7', '2021-05-08 15:13:56');
INSERT INTO `tb_log` VALUES (232, 3, 'Memperbarui admin dengan id 7', '2021-05-08 15:21:40');
INSERT INTO `tb_log` VALUES (233, 3, 'Menambahkan admin 2222', '2021-05-08 15:23:04');
INSERT INTO `tb_log` VALUES (234, 3, 'Menambahkan admin admin2', '2021-05-25 22:27:33');
INSERT INTO `tb_log` VALUES (235, 3, 'Menambahkan admin admin2', '2021-05-25 22:28:14');
INSERT INTO `tb_log` VALUES (236, 3, 'Memperbarui admin dengan id 10', '2021-05-25 22:30:04');
INSERT INTO `tb_log` VALUES (237, 3, 'Memperbarui admin dengan id 3', '2021-05-25 22:30:22');
INSERT INTO `tb_log` VALUES (238, 3, 'Memperbarui admin dengan id 1', '2021-05-25 22:31:03');
INSERT INTO `tb_log` VALUES (239, 1, 'Menambahkan 1 buah data wisata ', '2021-05-28 20:42:36');
INSERT INTO `tb_log` VALUES (240, 1, 'Menghapus admin dengan id 106', '2021-05-28 20:49:25');
INSERT INTO `tb_log` VALUES (241, 1, 'Menambahkan 1 buah data wisata ', '2021-05-28 20:50:16');
INSERT INTO `tb_log` VALUES (242, 1, 'Menghapus admin dengan id 107', '2021-05-28 20:50:57');
INSERT INTO `tb_log` VALUES (243, 1, 'Menambahkan 1 buah data wisata ', '2021-05-28 20:52:27');
INSERT INTO `tb_log` VALUES (244, 1, 'Menghapus admin dengan id 108', '2021-05-28 20:52:35');
INSERT INTO `tb_log` VALUES (245, 1, 'Menambahkan 1 buah data wisata ', '2021-05-28 20:53:50');
INSERT INTO `tb_log` VALUES (246, 1, 'Menghapus admin dengan id 109', '2021-05-28 21:08:55');
INSERT INTO `tb_log` VALUES (247, 1, 'Menghapus admin dengan id 105', '2021-05-28 21:09:00');
INSERT INTO `tb_log` VALUES (248, 1, 'Menghapus admin dengan id 30', '2021-05-28 21:39:30');
INSERT INTO `tb_log` VALUES (249, 1, 'Menghapus admin dengan id 28', '2021-05-28 21:39:53');
INSERT INTO `tb_log` VALUES (250, 1, 'Menghapus admin dengan id 27', '2021-05-28 21:58:28');
INSERT INTO `tb_log` VALUES (251, 1, 'Menghapus admin dengan id 29', '2021-05-28 21:58:31');
INSERT INTO `tb_log` VALUES (252, 1, 'Menambahkan 1 buah data fasilitas ', '2021-05-28 21:58:48');
INSERT INTO `tb_log` VALUES (253, 1, 'Menghapus admin dengan id 31', '2021-05-28 21:58:53');
INSERT INTO `tb_log` VALUES (254, 1, 'Menambahkan 1 buah data fasilitas ', '2021-05-28 21:59:35');
INSERT INTO `tb_log` VALUES (255, 1, 'Menghapus admin dengan id 32', '2021-05-28 22:05:38');
INSERT INTO `tb_log` VALUES (256, 1, 'Menambahkan 1 buah data fasilitas ', '2021-05-28 22:14:54');
INSERT INTO `tb_log` VALUES (257, 1, 'Menghapus admin dengan id 22', '2021-05-31 13:08:07');
INSERT INTO `tb_log` VALUES (258, 1, 'Menghapus admin dengan id 91', '2021-05-31 13:08:11');
INSERT INTO `tb_log` VALUES (259, 1, 'Menghapus admin dengan id 92', '2021-05-31 13:08:15');
INSERT INTO `tb_log` VALUES (260, 1, 'Menghapus admin dengan id 93', '2021-05-31 13:08:19');
INSERT INTO `tb_log` VALUES (261, 1, 'Menghapus admin dengan id 94', '2021-05-31 13:08:23');
INSERT INTO `tb_log` VALUES (262, 1, 'Menghapus admin dengan id 95', '2021-05-31 13:08:27');
INSERT INTO `tb_log` VALUES (263, 1, 'Menghapus admin dengan id 96', '2021-05-31 13:08:32');
INSERT INTO `tb_log` VALUES (264, 1, 'Memperbarui galeri dengan id 97', '2021-06-01 20:06:46');
INSERT INTO `tb_log` VALUES (265, 1, 'Memperbarui galeri dengan id 97', '2021-06-01 20:07:18');
INSERT INTO `tb_log` VALUES (266, 1, 'Menghapus admin dengan id 97', '2021-06-01 20:07:22');
INSERT INTO `tb_log` VALUES (267, 1, 'Menghapus admin dengan id 104', '2021-06-01 20:08:22');
INSERT INTO `tb_log` VALUES (268, 1, 'Menghapus admin dengan id 103', '2021-06-01 20:08:26');
INSERT INTO `tb_log` VALUES (269, 1, 'Menghapus admin dengan id 100', '2021-06-01 20:14:12');
INSERT INTO `tb_log` VALUES (270, 1, 'Memperbarui galeri dengan id 98', '2021-06-01 20:17:16');
INSERT INTO `tb_log` VALUES (271, 1, 'Memperbarui galeri dengan id 98', '2021-06-01 20:18:47');
INSERT INTO `tb_log` VALUES (272, 1, 'Menghapus admin dengan id 98', '2021-06-01 20:20:29');
INSERT INTO `tb_log` VALUES (273, 1, 'Menambahkan 1 buah data wisata ', '2021-06-01 20:21:02');
INSERT INTO `tb_log` VALUES (274, 1, 'Menghapus admin dengan id 105', '2021-06-01 20:21:07');
INSERT INTO `tb_log` VALUES (275, 1, 'Menambahkan 1 buah data wisata ', '2021-06-01 20:22:19');
INSERT INTO `tb_log` VALUES (276, 1, 'Menambahkan 1 buah data wisata ', '2021-06-01 20:23:08');
INSERT INTO `tb_log` VALUES (277, 1, 'Menambahkan 1 buah data wisata ', '2021-06-01 20:25:25');
INSERT INTO `tb_log` VALUES (278, 1, 'Menambahkan 1 buah data wisata ', '2021-06-01 20:32:35');
INSERT INTO `tb_log` VALUES (279, 1, 'Menghapus admin dengan id 107', '2021-06-01 20:36:11');
INSERT INTO `tb_log` VALUES (280, 1, 'Menghapus admin dengan id 109', '2021-06-01 20:36:16');
INSERT INTO `tb_log` VALUES (281, 1, 'Menghapus admin dengan id 108', '2021-06-01 20:36:21');
INSERT INTO `tb_log` VALUES (282, 1, 'Memperbarui galeri dengan id 33', '2021-06-01 20:36:35');
INSERT INTO `tb_log` VALUES (283, 1, 'Menghapus admin dengan id 33', '2021-06-01 20:36:44');
INSERT INTO `tb_log` VALUES (284, 1, 'Menambahkan 1 buah data fasilitas ', '2021-06-01 20:36:56');
INSERT INTO `tb_log` VALUES (285, 1, 'Memperbarui galeri dengan id 34', '2021-06-01 20:37:09');
INSERT INTO `tb_log` VALUES (286, 1, 'Memperbarui galeri dengan id 34', '2021-06-01 20:39:06');
INSERT INTO `tb_log` VALUES (287, 1, 'Menghapus admin dengan id 34', '2021-06-01 20:42:39');
INSERT INTO `tb_log` VALUES (288, 1, 'Menambahkan 1 buah data fasilitas ', '2021-06-01 20:43:11');
INSERT INTO `tb_log` VALUES (289, 1, 'Menghapus admin dengan id 35', '2021-06-01 20:43:14');
INSERT INTO `tb_log` VALUES (290, 1, 'Menambahkan 1 buah data fasilitas ', '2021-06-01 20:43:28');
INSERT INTO `tb_log` VALUES (291, 1, 'Menghapus admin dengan id 36', '2021-06-01 20:43:50');
INSERT INTO `tb_log` VALUES (292, 1, 'Menambahkan 1 buah data fasilitas ', '2021-06-01 20:44:04');
INSERT INTO `tb_log` VALUES (293, 1, 'Memperbarui galeri dengan id 37', '2021-06-01 20:44:16');
INSERT INTO `tb_log` VALUES (294, 1, 'Menghapus admin dengan id 34', '2021-06-01 21:03:11');
INSERT INTO `tb_log` VALUES (295, 1, 'Menghapus admin dengan id 106', '2021-06-01 21:03:29');
INSERT INTO `tb_log` VALUES (296, 1, 'Menambahkan 1 buah data wisata ', '2021-06-01 21:03:47');
INSERT INTO `tb_log` VALUES (297, 1, 'Memperbarui galeri dengan id 110', '2021-06-01 21:05:46');
INSERT INTO `tb_log` VALUES (298, 1, 'Memperbarui galeri dengan id 110', '2021-06-01 21:06:23');
INSERT INTO `tb_log` VALUES (299, 1, 'Memperbarui galeri dengan id 110', '2021-06-01 21:06:35');
INSERT INTO `tb_log` VALUES (300, 1, 'Menghapus admin dengan id 110', '2021-06-01 21:06:41');
INSERT INTO `tb_log` VALUES (301, 1, 'Menghapus admin dengan id 37', '2021-06-01 21:06:49');
INSERT INTO `tb_log` VALUES (302, 1, 'Menambahkan 1 buah data fasilitas ', '2021-06-01 21:07:01');
INSERT INTO `tb_log` VALUES (303, 1, 'Memperbarui galeri dengan id 38', '2021-06-01 21:07:12');
INSERT INTO `tb_log` VALUES (304, 1, 'Menghapus admin dengan id 38', '2021-06-01 21:07:17');
INSERT INTO `tb_log` VALUES (305, 1, 'Menghapus admin dengan id 16', '2021-06-01 21:09:15');
INSERT INTO `tb_log` VALUES (306, 1, 'Menambahkan 1 buah gambar ', '2021-06-01 21:09:24');
INSERT INTO `tb_log` VALUES (307, 1, 'Menghapus admin dengan id 17', '2021-06-01 21:09:59');
INSERT INTO `tb_log` VALUES (308, 1, 'Menambahkan 1 buah gambar ', '2021-06-01 21:10:10');
INSERT INTO `tb_log` VALUES (309, 1, 'Menambahkan 1 buah data fasilitas ', '2021-06-01 21:12:24');
INSERT INTO `tb_log` VALUES (310, 1, 'Memperbarui galeri dengan id 39', '2021-06-01 21:12:34');
INSERT INTO `tb_log` VALUES (311, 1, 'Menghapus admin dengan id 39', '2021-06-01 21:12:39');
INSERT INTO `tb_log` VALUES (312, 1, 'Menghapus admin dengan id 18', '2021-06-01 21:13:44');
INSERT INTO `tb_log` VALUES (313, 1, 'Menambahkan 1 buah gambar ', '2021-06-01 21:13:55');
INSERT INTO `tb_log` VALUES (314, 1, 'Memperbarui galeri dengan id 19', '2021-06-01 21:15:22');
INSERT INTO `tb_log` VALUES (315, 1, 'Memperbarui galeri dengan id 19', '2021-06-01 21:15:49');
INSERT INTO `tb_log` VALUES (316, 1, 'Memperbarui galeri dengan id 19', '2021-06-01 21:16:30');
INSERT INTO `tb_log` VALUES (317, 1, 'Memperbarui galeri dengan id 19', '2021-06-01 21:16:45');
INSERT INTO `tb_log` VALUES (318, 1, 'Menghapus admin dengan id 19', '2021-06-01 21:18:15');
INSERT INTO `tb_log` VALUES (319, 1, 'Menambahkan 1 buah gambar ', '2021-06-01 21:18:26');
INSERT INTO `tb_log` VALUES (320, 1, 'Memperbarui galeri dengan id 20', '2021-06-01 21:18:42');
INSERT INTO `tb_log` VALUES (321, 1, 'Menghapus admin dengan id 20', '2021-06-01 21:18:45');
INSERT INTO `tb_log` VALUES (322, 1, 'Menambahkan 1 buah gambar ', '2021-06-01 21:18:57');
INSERT INTO `tb_log` VALUES (323, 1, 'Memperbarui galeri dengan id 21', '2021-06-01 21:19:05');
INSERT INTO `tb_log` VALUES (324, 1, 'Menghapus admin dengan id 21', '2021-06-01 21:19:10');
INSERT INTO `tb_log` VALUES (325, 1, 'Menambahkan 1 buah data wisata ', '2021-06-01 21:25:28');
INSERT INTO `tb_log` VALUES (326, 1, 'Menghapus admin dengan id 111', '2021-06-02 21:06:59');
INSERT INTO `tb_log` VALUES (327, 1, 'Menambahkan 1 buah data wisata ', '2021-06-02 21:07:27');
INSERT INTO `tb_log` VALUES (328, 1, 'Memperbarui galeri dengan id 112', '2021-06-02 21:07:52');
INSERT INTO `tb_log` VALUES (329, 1, 'Menghapus admin dengan id 112', '2021-06-02 21:08:09');
INSERT INTO `tb_log` VALUES (330, 1, 'Menambahkan 1 buah data fasilitas ', '2021-06-02 21:08:28');
INSERT INTO `tb_log` VALUES (331, 1, 'Memperbarui galeri dengan id 1', '2021-06-02 21:08:47');
INSERT INTO `tb_log` VALUES (332, 1, 'Menghapus admin dengan id 1', '2021-06-02 21:08:51');
INSERT INTO `tb_log` VALUES (333, 1, 'Menambahkan 1 buah gambar ', '2021-06-02 21:09:01');
INSERT INTO `tb_log` VALUES (334, 1, 'Menambahkan 1 buah gambar ', '2021-06-02 21:09:12');
INSERT INTO `tb_log` VALUES (335, 1, 'Menghapus admin dengan id 2', '2021-06-02 21:09:15');
INSERT INTO `tb_log` VALUES (336, 1, 'Memperbarui galeri dengan id 1', '2021-06-02 21:09:59');
INSERT INTO `tb_log` VALUES (337, 1, 'Menghapus admin dengan id 1', '2021-06-02 21:10:19');
INSERT INTO `tb_log` VALUES (338, 1, 'Memperbarui Video dengan id 0', '2021-06-02 21:28:14');
INSERT INTO `tb_log` VALUES (339, 1, 'Menambahkan 1 buah data wisata ', '2021-06-03 22:01:40');
INSERT INTO `tb_log` VALUES (340, 1, 'Memperbarui Video dengan id 1', '2021-06-03 22:04:56');
INSERT INTO `tb_log` VALUES (341, 1, 'Memperbarui Video dengan id 0', '2021-06-03 22:05:09');
INSERT INTO `tb_log` VALUES (342, 1, 'Memperbarui Video dengan id 1', '2021-06-03 22:06:01');
INSERT INTO `tb_log` VALUES (343, 1, 'Memperbarui Video dengan id 1', '2021-06-03 22:07:23');
INSERT INTO `tb_log` VALUES (344, 1, 'Memperbarui galeri dengan id 1', '2021-06-03 22:09:07');
INSERT INTO `tb_log` VALUES (345, 1, 'Memperbarui Video dengan id 1', '2021-06-03 22:12:49');
INSERT INTO `tb_log` VALUES (346, 1, 'Menambahkan 1 buah data fasilitas ', '2021-06-03 22:21:23');
INSERT INTO `tb_log` VALUES (347, 1, 'Menambahkan 1 buah gambar ', '2021-06-03 22:22:01');
INSERT INTO `tb_log` VALUES (348, 1, 'Menambahkan 1 buah video ', '2021-06-03 22:22:27');
INSERT INTO `tb_log` VALUES (349, 1, 'Menambahkan 1 buah video ', '2021-06-03 22:24:18');
INSERT INTO `tb_log` VALUES (350, 1, 'Menambahkan 1 buah video ', '2021-06-03 22:24:33');
INSERT INTO `tb_log` VALUES (351, 1, 'Memperbarui Video dengan id 3', '2021-06-03 22:24:42');
INSERT INTO `tb_log` VALUES (352, 1, 'Memperbarui Video dengan id 1', '2021-06-03 22:24:51');
INSERT INTO `tb_log` VALUES (353, 1, 'Memperbarui Video dengan id 2', '2021-06-03 22:24:59');
INSERT INTO `tb_log` VALUES (354, 1, 'Memperbarui Video dengan id 3', '2021-06-03 22:25:04');
INSERT INTO `tb_log` VALUES (355, 1, 'Menambahkan 1 buah data wisata ', '2021-06-03 23:19:22');
INSERT INTO `tb_log` VALUES (356, 1, 'Memperbarui galeri dengan id 1', '2021-06-03 23:37:56');
INSERT INTO `tb_log` VALUES (357, 1, 'Menambahkan satu buah kategori', '2021-06-04 00:07:52');
INSERT INTO `tb_log` VALUES (358, 1, 'Memperbarui satu buah kategori dengan id 106', '2021-06-04 00:09:52');
INSERT INTO `tb_log` VALUES (359, 1, 'Memperbarui satu buah kategori dengan id 106', '2021-06-04 00:11:00');
INSERT INTO `tb_log` VALUES (360, 1, 'Memperbarui satu buah kategori dengan id 106', '2021-06-04 00:11:11');
INSERT INTO `tb_log` VALUES (361, 1, 'Menambahkan satu buah kategori', '2021-06-04 00:11:36');
INSERT INTO `tb_log` VALUES (362, 1, 'Memperbarui satu buah kategori dengan id 1', '2021-06-04 00:11:48');
INSERT INTO `tb_log` VALUES (363, 1, 'Memperbarui satu buah kategori dengan id 73', '2021-06-04 00:18:17');
INSERT INTO `tb_log` VALUES (364, 1, 'Memperbarui satu buah kategori dengan id 2', '2021-06-04 00:18:21');
INSERT INTO `tb_log` VALUES (365, 1, 'Memperbarui satu buah kategori dengan id 73', '2021-06-04 00:18:25');
INSERT INTO `tb_log` VALUES (366, 1, 'Menambahkan 1 buah data wisata ', '2021-06-04 00:37:06');
INSERT INTO `tb_log` VALUES (367, 1, 'Memperbarui galeri dengan id 1', '2021-06-04 00:39:46');
INSERT INTO `tb_log` VALUES (368, 1, 'Memperbarui galeri dengan id 3', '2021-06-04 00:39:51');
INSERT INTO `tb_log` VALUES (369, 1, 'Memperbarui galeri dengan id 1', '2021-06-04 00:39:55');
INSERT INTO `tb_log` VALUES (370, 1, 'Menghapus admin dengan id 1', '2021-06-04 01:33:09');
INSERT INTO `tb_log` VALUES (371, 1, 'Menghapus admin dengan id 2', '2021-06-04 01:33:12');
INSERT INTO `tb_log` VALUES (372, 1, 'Menghapus admin dengan id 3', '2021-06-04 01:33:15');
INSERT INTO `tb_log` VALUES (373, 1, 'Menambahkan 1 buah data wisata ', '2021-06-04 01:34:54');
INSERT INTO `tb_log` VALUES (374, 1, 'Menghapus satu buah kategori dengan id 105', '2021-06-04 02:45:50');
INSERT INTO `tb_log` VALUES (375, 1, 'Menghapus satu buah kategori dengan id 107', '2021-06-04 02:45:55');
INSERT INTO `tb_log` VALUES (376, 1, 'Menghapus satu buah kategori dengan id 106', '2021-06-04 02:45:59');
INSERT INTO `tb_log` VALUES (377, 1, 'Menghapus satu buah kategori dengan id 73', '2021-06-04 02:46:02');
INSERT INTO `tb_log` VALUES (378, 1, 'Menghapus satu buah kategori dengan id 60', '2021-06-04 02:46:07');
INSERT INTO `tb_log` VALUES (379, 1, 'Memperbarui galeri dengan id 4', '2021-06-04 02:46:18');
INSERT INTO `tb_log` VALUES (380, 1, 'Menghapus admin dengan id 4', '2021-06-04 23:38:12');
INSERT INTO `tb_log` VALUES (381, 1, 'Menghapus satu buah kategori dengan id 1', '2021-06-04 23:38:28');
INSERT INTO `tb_log` VALUES (382, 1, 'Menghapus admin dengan id 1', '2021-06-04 23:39:05');
INSERT INTO `tb_log` VALUES (383, 1, 'Memperbarui satu buah kategori dengan id 70', '2021-06-04 23:39:52');
INSERT INTO `tb_log` VALUES (384, 1, 'Menambahkan 1 buah data wisata ', '2021-06-04 23:43:26');
INSERT INTO `tb_log` VALUES (385, 1, 'Menghapus admin dengan id 1', '2021-06-05 06:04:23');
INSERT INTO `tb_log` VALUES (386, 1, 'Menambahkan satu buah kategori', '2021-06-05 06:12:59');
INSERT INTO `tb_log` VALUES (387, 1, 'Menambahkan satu buah kategori', '2021-06-05 06:15:59');
INSERT INTO `tb_log` VALUES (388, 1, 'Menghapus admin dengan id 5', '2021-06-05 06:16:14');
INSERT INTO `tb_log` VALUES (389, 1, 'Menghapus admin dengan id 3', '2021-06-05 06:16:55');
INSERT INTO `tb_log` VALUES (390, 1, 'Menambahkan 1 buah gambar ', '2021-06-05 06:17:56');
INSERT INTO `tb_log` VALUES (391, 1, 'Menambahkan 1 buah gambar ', '2021-06-05 06:18:22');
INSERT INTO `tb_log` VALUES (392, 1, 'Menambahkan 1 buah gambar ', '2021-06-05 06:18:47');
INSERT INTO `tb_log` VALUES (393, 1, 'Menambahkan 1 buah data wisata ', '2021-06-05 06:20:03');
INSERT INTO `tb_log` VALUES (394, 1, 'Menambahkan 1 buah data wisata ', '2021-06-05 06:20:45');
INSERT INTO `tb_log` VALUES (395, 1, 'Menambahkan 1 buah data wisata ', '2021-06-05 06:21:31');
INSERT INTO `tb_log` VALUES (396, 1, 'Menambahkan 1 buah data wisata ', '2021-06-05 06:22:38');
INSERT INTO `tb_log` VALUES (397, 1, 'Menambahkan 1 buah data wisata ', '2021-06-05 06:23:23');
INSERT INTO `tb_log` VALUES (398, 3, 'Memperbarui admin dengan id 1', '2021-06-05 06:33:06');
INSERT INTO `tb_log` VALUES (399, 3, 'Memperbarui admin dengan id 3', '2021-06-05 06:33:18');
INSERT INTO `tb_log` VALUES (400, 12, 'Menambahkan admin pw', '2021-06-05 09:56:37');
INSERT INTO `tb_log` VALUES (401, 13, 'Menambahkan admin ws', '2021-06-05 09:57:23');
INSERT INTO `tb_log` VALUES (402, 13, 'Menghapus admin dengan id 8', '2021-06-05 09:58:02');
INSERT INTO `tb_log` VALUES (403, 13, 'Menghapus admin dengan id 7', '2021-06-05 09:58:06');
INSERT INTO `tb_log` VALUES (404, 13, 'Menghapus admin dengan id 5', '2021-06-05 09:58:10');
INSERT INTO `tb_log` VALUES (405, 13, 'Menghapus admin dengan id 10', '2021-06-05 09:58:18');
INSERT INTO `tb_log` VALUES (406, 13, 'Menghapus admin dengan id 6', '2021-06-05 10:01:15');
INSERT INTO `tb_log` VALUES (407, 13, 'Menghapus admin dengan id 12', '2021-06-05 10:01:21');
INSERT INTO `tb_log` VALUES (408, 13, 'Menghapus admin dengan id 11', '2021-06-05 10:01:24');
INSERT INTO `tb_log` VALUES (409, 13, 'Menghapus admin dengan id 3', '2021-06-05 10:01:27');
INSERT INTO `tb_log` VALUES (410, 13, 'Menghapus admin dengan id 1', '2021-06-05 10:01:31');
INSERT INTO `tb_log` VALUES (411, 13, 'Memperbarui admin dengan id 14', '2021-06-05 10:02:12');
INSERT INTO `tb_log` VALUES (412, 13, 'Memperbarui admin dengan id 13', '2021-06-05 10:03:56');
INSERT INTO `tb_log` VALUES (413, 13, 'Memperbarui admin dengan id 14', '2021-06-05 10:07:02');
INSERT INTO `tb_log` VALUES (414, 13, 'Memperbarui admin dengan id 13', '2021-06-05 10:09:15');
INSERT INTO `tb_log` VALUES (415, 13, 'Memperbarui admin dengan id 13', '2021-06-05 10:10:21');
INSERT INTO `tb_log` VALUES (416, 15, 'Memperbarui admin dengan id 15', '2021-06-05 10:13:51');
INSERT INTO `tb_log` VALUES (417, 16, 'Menambahkan admin superadmin', '2021-06-05 10:19:09');
INSERT INTO `tb_log` VALUES (418, 16, 'Menambahkan admin admin', '2021-06-05 10:19:34');
INSERT INTO `tb_log` VALUES (419, 17, 'Memperbarui admin dengan id 18', '2021-06-05 10:22:08');
INSERT INTO `tb_log` VALUES (420, 16, 'Memperbarui admin dengan id 18', '2021-06-05 11:08:30');
INSERT INTO `tb_log` VALUES (421, 16, 'Menghapus admin dengan id 18', '2021-06-05 11:09:31');
INSERT INTO `tb_log` VALUES (422, 16, 'Menghapus admin dengan id 13', '2021-06-05 11:09:35');
INSERT INTO `tb_log` VALUES (423, 16, 'Menghapus admin dengan id 14', '2021-06-05 11:09:37');
INSERT INTO `tb_log` VALUES (424, 16, 'Menghapus admin dengan id 15', '2021-06-05 11:09:40');
INSERT INTO `tb_log` VALUES (425, 16, 'Menghapus admin dengan id 16', '2021-06-05 11:10:16');
INSERT INTO `tb_log` VALUES (426, 16, 'Menambahkan admin admin', '2021-06-05 11:10:43');
INSERT INTO `tb_log` VALUES (427, 16, 'Menambahkan admin superadmin', '2021-06-05 11:11:06');
INSERT INTO `tb_log` VALUES (428, 17, 'Menambahkan admin bambang', '2021-06-05 14:13:23');
INSERT INTO `tb_log` VALUES (429, 21, 'Memperbarui admin dengan id 21', '2021-06-05 14:58:48');
INSERT INTO `tb_log` VALUES (430, 21, 'Memperbarui admin dengan id 21', '2021-06-05 15:01:35');

-- ----------------------------
-- Table structure for tb_slider
-- ----------------------------
DROP TABLE IF EXISTS `tb_slider`;
CREATE TABLE `tb_slider`  (
  `id_slider` int(255) NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `deskripsi` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nama_file` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_slider`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_slider
-- ----------------------------
INSERT INTO `tb_slider` VALUES (1, 'judul 1', 'deskripsi 1', 'ALON_ALON_5.jpg');
INSERT INTO `tb_slider` VALUES (2, 'judul 2', 'deskripsi 2', 'GAJAH_1.JPG');

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
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tb_video
-- ----------------------------
INSERT INTO `tb_video` VALUES (1, '22', 'SAINGAN KOPI DAOA', NULL, 'https://www.youtube.com/embed/iTX7WH416To', 'Ada tempat baru nih guys di Bogor. Namanya ELJI CAFE LINGKUNG GUNUNG ADVENTURE CAMP BOGOR. Satu kawasan dengan berbagai fasilitas. Disini ada Villa , tempat Camping dan Cafe. Kamu bisa ngopi cantik ditemani dengan view yang cantik. lokasinya searah dengan Kopi Daong dan Kopi Resign Pancawati ya.', NULL);
INSERT INTO `tb_video` VALUES (2, NULL, '2', NULL, 'https://www.youtube.com/embed/DbL7Frf6nJI', 'Ada tempat baru nih guys di Bogor. Namanya ELJI CAFE LINGKUNG GUNUNG ADVENTURE CAMP BOGOR. Satu kawasan dengan berbagai fasilitas. Disini ada Villa , tempat Camping dan Cafe. Kamu bisa ngopi cantik ditemani dengan view yang cantik. lokasinya searah dengan Kopi Daong dan Kopi Resign Pancawati ya.', NULL);

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
  `facebook` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `twitter` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `instagram` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_wisata`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tb_wisata
-- ----------------------------
INSERT INTO `tb_wisata` VALUES (6, 'Telaga ngebel', 'Ponorogo', 'ini wisata', '-7.802327727641966', '111.62512569099653', '1', 'NGEBEL_10.JPG', '2', 'Penginapan, Rumah makan, tempat ibadah, MCK, dan Parkir', '07:19', '01:03', '088801673035', NULL, NULL, NULL);
INSERT INTO `tb_wisata` VALUES (7, 'Taman Kota', 'Ponorogo', 'ini wisata', '-7.871124042239856', '111.46246800912695', '1', 'ALON_ALON_4.jpg', '70', 'WIFI', '01:01', '08:08', '1234567890', NULL, NULL, NULL);
INSERT INTO `tb_wisata` VALUES (8, 'Gunung Gajah', 'Ponorogo', '11dddd', '-7.871638269287729', '111.47261246611674', '1', 'GUNUNG_BERUK_1.jpg', '70', 'Penginapan, Rumah makan, tempat ibadah, MCK, dan Parkir', '01:01', '01:01', '088801673035', NULL, NULL, NULL);
INSERT INTO `tb_wisata` VALUES (9, 'Taman Kota', 'Ponorogo', 'adalah', '-7.864698365541884', '111.47626619706756', '1', 'ALON_ALON_71.jpg', '109', 'WIFI', '01:01', '07:07', '1234567890', NULL, NULL, NULL);
INSERT INTO `tb_wisata` VALUES (10, 'Taman wengker', 'Ponorogo', 'aaaa', '-7.873515095440624', '111.52122190830687', '1', 'AIR_TERJUN_PLETUK_2.jpg', '108', 'WIFI', '07:07', '07:07', '088801673035', NULL, NULL, NULL);

SET FOREIGN_KEY_CHECKS = 1;
