-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 03, 2016 at 10:58 
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_sch`
--

-- --------------------------------------------------------

--
-- Table structure for table `desa`
--

CREATE TABLE IF NOT EXISTS `desa` (
  `desa_id` varchar(11) NOT NULL,
  `id_kecamatan` varchar(7) DEFAULT NULL,
  `nama` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`desa_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `desa`
--

INSERT INTO `desa` (`desa_id`, `id_kecamatan`, `nama`) VALUES
('3206010001', '3206010', 'Ciheras'),
('3206010002', '3206010', 'Cipanas'),
('3206010003', '3206010', 'Ciandum'),
('3206010004', '3206010', 'Cipatujah'),
('3206010005', '3206010', 'Sindangkerta'),
('3206010006', '3206010', 'Cikawungading'),
('3206010007', '3206010', 'Kertasari'),
('3206010008', '3206010', 'Padawaras'),
('3206010009', '3206010', 'Darawati'),
('3206010010', '3206010', 'Bantarkalong'),
('3206010011', '3206010', 'Tobongjaya'),
('3206010012', '3206010', 'Nangelasari'),
('3206010013', '3206010', 'Nagrog'),
('3206010014', '3206010', 'Pameutingan'),
('3206010015', '3206010', 'Sukahurip'),
('3206020001', '3206020', 'Cidadap'),
('3206020002', '3206020', 'Kujang'),
('3206020003', '3206020', 'Sarimukti'),
('3206020004', '3206020', 'Ciawi'),
('3206020005', '3206020', 'Cikapinis'),
('3206020006', '3206020', 'Cikupa'),
('3206020007', '3206020', 'Karangnunggal'),
('3206020008', '3206020', 'Karangmekar'),
('3206020009', '3206020', 'Cibatuireng'),
('3206020010', '3206020', 'Cibatu'),
('3206020011', '3206020', 'Sukawangun'),
('3206020012', '3206020', 'Cintawangi'),
('3206020013', '3206020', 'Cikukulu'),
('3206020014', '3206020', 'Sarimanggu'),
('3206030001', '3206030', 'Mandalajaya'),
('3206030002', '3206030', 'Cikalong'),
('3206030003', '3206030', 'Cikancra'),
('3206030004', '3206030', 'Tonjongsari'),
('3206030005', '3206030', 'Singkir'),
('3206030006', '3206030', 'Panyiaran'),
('3206030007', '3206030', 'Cibeber'),
('3206030008', '3206030', 'Cidadali'),
('3206030009', '3206030', 'Kubangsari'),
('3206030010', '3206030', 'Cikadu'),
('3206030011', '3206030', 'Sindangjaya'),
('3206030012', '3206030', 'Kalapagenep'),
('3206030013', '3206030', 'Cimanuk'),
('3206040001', '3206040', 'Margaluyu'),
('3206040002', '3206040', 'Cibuniasih'),
('3206040003', '3206040', 'Pangliaran'),
('3206040004', '3206040', 'Pancawangi'),
('3206040005', '3206040', 'Jayamukti'),
('3206040006', '3206040', 'Tonjong'),
('3206040007', '3206040', 'Cibongas'),
('3206040008', '3206040', 'Cikawung'),
('3206040009', '3206040', 'Tawang'),
('3206040010', '3206040', 'Mekarsari'),
('3206040011', '3206040', 'Neglasari'),
('3206050001', '3206050', 'Gunungsari'),
('3206050002', '3206050', 'Cilumba'),
('3206050003', '3206050', 'Linggalaksana'),
('3206050004', '3206050', 'Pakemitan'),
('3206050005', '3206050', 'Cogreg'),
('3206050006', '3206050', 'Lengkongbarang'),
('3206050007', '3206050', 'Tanjungbarang'),
('3206050008', '3206050', 'Cayur'),
('3206050009', '3206050', 'Sindangasih'),
('3206060001', '3206060', 'Eureunpalay'),
('3206060002', '3206060', 'Setiawaras'),
('3206060003', '3206060', 'Cisempur'),
('3206060004', '3206060', 'Parung'),
('3206060005', '3206060', 'Cibalong'),
('3206060014', '3206060', 'Singajaya'),
('3206061001', '3206061', 'Karyabakti'),
('3206061002', '3206061', 'Cigunung'),
('3206061003', '3206061', 'Cibungur'),
('3206061004', '3206061', 'Parungponteng'),
('3206061005', '3206061', 'Girikencana'),
('3206061006', '3206061', 'Barumekar'),
('3206061007', '3206061', 'Cibanteng'),
('3206061008', '3206061', 'Burujuljaya'),
('3206070002', '3206070', 'Sirnagalih'),
('3206070003', '3206070', 'Simpang'),
('3206070004', '3206070', 'Hegarwangi'),
('3206070008', '3206070', 'Wangunsari'),
('3206070009', '3206070', 'Pamijahan'),
('3206070010', '3206070', 'Parakanhonje'),
('3206070016', '3206070', 'Sukamaju'),
('3206070017', '3206070', 'Wakap'),
('3206071001', '3206071', 'Girijaya'),
('3206071002', '3206071', 'Bojongasih'),
('3206071003', '3206071', 'Sindangsari'),
('3206071004', '3206071', 'Cikadongdong'),
('3206071005', '3206071', 'Mertajaya'),
('3206071006', '3206071', 'Toblongan'),
('3206072001', '3206072', 'Bojongsari'),
('3206072002', '3206072', 'Cintabodas'),
('3206072003', '3206072', 'Cikuya'),
('3206072004', '3206072', 'Cipicung'),
('3206072005', '3206072', 'Mekarlaksana'),
('3206080001', '3206080', 'Campakasari'),
('3206080002', '3206080', 'Bojongkapol'),
('3206080003', '3206080', 'Wandasari'),
('3206080004', '3206080', 'Pedangkamulyan'),
('3206080005', '3206080', 'Kertanegla'),
('3206080006', '3206080', 'Bojonggambir'),
('3206080007', '3206080', 'Mangkonjaya'),
('3206080008', '3206080', 'Ciroyom'),
('3206080009', '3206080', 'Purwaraharja'),
('3206080010', '3206080', 'Girimukti'),
('3206090001', '3206090', 'Cukangjayaguna'),
('3206090002', '3206090', 'Sukabakti'),
('3206090003', '3206090', 'Parumasan'),
('3206090004', '3206090', 'Sepatnunggal'),
('3206090005', '3206090', 'Raksajaya'),
('3206090006', '3206090', 'Sodonghilir'),
('3206090007', '3206090', 'Cukangkawung'),
('3206090008', '3206090', 'Cikalong'),
('3206090009', '3206090', 'Cipaingeun'),
('3206090010', '3206090', 'Pakalongan'),
('3206090011', '3206090', 'Leuwidulang'),
('3206090012', '3206090', 'Muncang'),
('3206100001', '3206100', 'Banyuasih'),
('3206100002', '3206100', 'Taraju'),
('3206100003', '3206100', 'Raksasari'),
('3206100004', '3206100', 'Singasari'),
('3206100005', '3206100', 'Cikubang'),
('3206100006', '3206100', 'Deudeul'),
('3206100007', '3206100', 'Kertaraharja'),
('3206100008', '3206100', 'Purwarahayu'),
('3206100009', '3206100', 'Pageralam'),
('3206110009', '3206110', 'Sukarasa'),
('3206110010', '3206110', 'Jahiang'),
('3206110011', '3206110', 'Sundawenang'),
('3206110012', '3206110', 'Kawungsari'),
('3206110013', '3206110', 'Tenjowaringin'),
('3206110014', '3206110', 'Kutawaringin'),
('3206110015', '3206110', 'Tanjungsari'),
('3206110016', '3206110', 'Neglasari'),
('3206110017', '3206110', 'Karangmukti'),
('3206110018', '3206110', 'Salawu'),
('3206110019', '3206110', 'Margalaksana'),
('3206110020', '3206110', 'Serang'),
('3206111001', '3206111', 'Mandalasari'),
('3206111002', '3206111', 'Sukasari'),
('3206111003', '3206111', 'Puspasari'),
('3206111004', '3206111', 'Puspahiang'),
('3206111005', '3206111', 'Pusparahayu'),
('3206111006', '3206111', 'Luyubakti'),
('3206111007', '3206111', 'Cimanggu'),
('3206111008', '3206111', 'Puspajaya'),
('3206120001', '3206120', 'Cikeusal'),
('3206120002', '3206120', 'Sukanagara'),
('3206120003', '3206120', 'Sukasenang'),
('3206120004', '3206120', 'Tanjungjaya'),
('3206120005', '3206120', 'Cintajaya'),
('3206120006', '3206120', 'Cibalanarik'),
('3206120007', '3206120', 'Cilolohan'),
('3206130001', '3206130', 'Mekarjaya'),
('3206130002', '3206130', 'Sirnajaya'),
('3206130003', '3206130', 'Janggala'),
('3206130004', '3206130', 'Sukapura'),
('3206130005', '3206130', 'Tarunajaya'),
('3206130006', '3206130', 'Leuwibudah'),
('3206130007', '3206130', 'Linggaraja'),
('3206130008', '3206130', 'Margalaksana'),
('3206140003', '3206140', 'Mandalahayu'),
('3206140004', '3206140', 'Karyamandala'),
('3206140005', '3206140', 'Mulyasari'),
('3206140006', '3206140', 'Tanjungsari'),
('3206140007', '3206140', 'Mandalaguna'),
('3206140008', '3206140', 'Kawitan'),
('3206140009', '3206140', 'Mandalawangi'),
('3206140010', '3206140', 'Banjarwaringin'),
('3206140018', '3206140', 'Karyawangi'),
('3206141001', '3206141', 'Mandalamekar'),
('3206141002', '3206141', 'Kersagalih'),
('3206141003', '3206141', 'Ciwarak'),
('3206141004', '3206141', 'Jatiwaras'),
('3206141005', '3206141', 'Papayan'),
('3206141006', '3206141', 'Neglasari'),
('3206141007', '3206141', 'Kaputihan'),
('3206141008', '3206141', 'Setiawangi'),
('3206141009', '3206141', 'Sukakerta'),
('3206141010', '3206141', 'Kertarahayu'),
('3206141011', '3206141', 'Mandala Hurip'),
('3206150001', '3206150', 'Cisarua'),
('3206150006', '3206150', 'Pasirmukti'),
('3206150007', '3206150', 'Cikondang'),
('3206150008', '3206150', 'Cijulang'),
('3206150009', '3206150', 'Nagaratengah'),
('3206150010', '3206150', 'Ciampanan'),
('3206150011', '3206150', 'Cineam'),
('3206150012', '3206150', 'Madiasari'),
('3206150013', '3206150', 'Rajadatu'),
('3206150014', '3206150', 'Ancol'),
('3206151001', '3206151', 'Citalahab'),
('3206151002', '3206151', 'Sirnajaya'),
('3206151003', '3206151', 'Karangjaya'),
('3206151004', '3206151', 'Karanglayung'),
('3206160007', '3206160', 'Batusumur'),
('3206160008', '3206160', 'Cihaur'),
('3206160009', '3206160', 'Pasirpanjang'),
('3206160010', '3206160', 'Kalimanggis'),
('3206160011', '3206160', 'Cibeber'),
('3206160012', '3206160', 'Gunajaya'),
('3206160013', '3206160', 'Margahayu'),
('3206160014', '3206160', 'Kamulyan'),
('3206160015', '3206160', 'Manonjaya'),
('3206160016', '3206160', 'Margaluyu'),
('3206160017', '3206160', 'Cilangkap'),
('3206160018', '3206160', 'Pasirbatang'),
('3206161001', '3206161', 'Cinunjang'),
('3206161002', '3206161', 'Malatisuka'),
('3206161003', '3206161', 'Giriwangi'),
('3206161004', '3206161', 'Jatijaya'),
('3206161005', '3206161', 'Gunungtanjung'),
('3206161006', '3206161', 'Tanjungsari'),
('3206161007', '3206161', 'Bojongsari'),
('3206190007', '3206190', 'Sukaasih'),
('3206190008', '3206190', 'Cikunten'),
('3206190009', '3206190', 'Sukaherang'),
('3206190010', '3206190', 'Singasari'),
('3206190011', '3206190', 'Singaparna'),
('3206190012', '3206190', 'Sukamulya'),
('3206190013', '3206190', 'Cipakat'),
('3206190020', '3206190', 'Cintaraja'),
('3206190021', '3206190', 'Cikunir'),
('3206190022', '3206190', 'Cikadongdong'),
('3206191001', '3206191', 'Sukarapih'),
('3206191002', '3206191', 'Wargakerta'),
('3206191003', '3206191', 'Suka Menak'),
('3206191004', '3206191', 'Padasuka'),
('3206191005', '3206191', 'Sukakarsa'),
('3206191006', '3206191', 'Sukarame'),
('3206192001', '3206192', 'Pasirsalam'),
('3206192002', '3206192', 'Sukaluyu'),
('3206192003', '3206192', 'Sukasukur'),
('3206192004', '3206192', 'Salebu'),
('3206192005', '3206192', 'Mangunreja'),
('3206192006', '3206192', 'Margajaya'),
('3206200001', '3206200', 'Sirnagalih'),
('3206200002', '3206200', 'Kersamaju'),
('3206200003', '3206200', 'Tanjungkarang'),
('3206200004', '3206200', 'Nangtang'),
('3206200005', '3206200', 'Pusparaja'),
('3206200006', '3206200', 'Jayapura'),
('3206200007', '3206200', 'Lengkongjaya'),
('3206200008', '3206200', 'Tenjonagara'),
('3206200009', '3206200', 'Nanggerang'),
('3206200010', '3206200', 'Sukamanah'),
('3206200011', '3206200', 'Sirnaputra'),
('3206200012', '3206200', 'Sirnaraja'),
('3206200013', '3206200', 'Cigalontang'),
('3206200014', '3206200', 'Puspamukti'),
('3206200015', '3206200', 'Cidugaleun'),
('3206200016', '3206200', 'Parentas'),
('3206210003', '3206210', 'Arjasari'),
('3206210007', '3206210', 'Ciawang'),
('3206210008', '3206210', 'Jayamukti'),
('3206210015', '3206210', 'Linggawangi'),
('3206210016', '3206210', 'Linggamulya'),
('3206210017', '3206210', 'Cigadog'),
('3206210018', '3206210', 'Mandalagiri'),
('3206211001', '3206211', 'Sirnasari'),
('3206211002', '3206211', 'Linggasirna'),
('3206211003', '3206211', 'Selawangi'),
('3206211004', '3206211', 'Sariwangi'),
('3206211005', '3206211', 'Jayaputra'),
('3206211006', '3206211', 'Jayaratu'),
('3206211007', '3206211', 'Sukamulih'),
('3206211008', '3206211', 'Sukaharja'),
('3206212001', '3206212', 'Cilampunghilir'),
('3206212002', '3206212', 'Rancapaku'),
('3206212003', '3206212', 'Cisaruni'),
('3206212004', '3206212', 'Padakembang'),
('3206212005', '3206212', 'Mekarjaya');

-- --------------------------------------------------------

--
-- Table structure for table `kabupaten`
--

CREATE TABLE IF NOT EXISTS `kabupaten` (
  `id` varchar(4) NOT NULL,
  `id_prov` varchar(2) NOT NULL,
  `nama` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kabupaten`
--

INSERT INTO `kabupaten` (`id`, `id_prov`, `nama`) VALUES
('1101', '11', 'Kab. Simeulue'),
('1102', '11', 'Kab. Aceh Singkil'),
('1103', '11', 'Kab. Aceh Selatan'),
('1104', '11', 'Kab. Aceh Tenggara'),
('1105', '11', 'Kab. Aceh Timur'),
('1106', '11', 'Kab. Aceh Tengah'),
('1107', '11', 'Kab. Aceh Barat'),
('1108', '11', 'Kab. Aceh Besar'),
('1109', '11', 'Kab. Pidie'),
('1110', '11', 'Kab. Bireuen'),
('1111', '11', 'Kab. Aceh Utara'),
('1112', '11', 'Kab. Aceh Barat Daya'),
('1113', '11', 'Kab. Gayo Lues'),
('1114', '11', 'Kab. Aceh Tamiang'),
('1115', '11', 'Kab. Nagan Raya'),
('1116', '11', 'Kab. Aceh Jaya'),
('1117', '11', 'Kab. Bener Meriah'),
('1118', '11', 'Kab. Pidie Jaya'),
('1171', '11', 'Kota Banda Aceh'),
('1172', '11', 'Kota Sabang'),
('1173', '11', 'Kota Langsa'),
('1174', '11', 'Kota Lhokseumawe'),
('1175', '11', 'Kota Subulussalam'),
('1201', '12', 'Kab. Nias'),
('1202', '12', 'Kab. Mandailing Natal'),
('1203', '12', 'Kab. Tapanuli Selatan'),
('1204', '12', 'Kab. Tapanuli Tengah'),
('1205', '12', 'Kab. Tapanuli Utara'),
('1206', '12', 'Kab. Toba Samosir'),
('1207', '12', 'Kab. Labuhan Batu'),
('1208', '12', 'Kab. Asahan'),
('1209', '12', 'Kab. Simalungun'),
('1210', '12', 'Kab. Dairi'),
('1211', '12', 'Kab. Karo'),
('1212', '12', 'Kab. Deli Serdang'),
('1213', '12', 'Kab. Langkat'),
('1214', '12', 'Kab. Nias Selatan'),
('1215', '12', 'Kab. Humbang Hasundutan'),
('1216', '12', 'Kab. Pakpak Bharat'),
('1217', '12', 'Kab. Samosir'),
('1218', '12', 'Kab. Serdang Bedagai'),
('1219', '12', 'Kab. Batu Bara'),
('1220', '12', 'Kab. Padang Lawas Utara'),
('1221', '12', 'Kab. Padang Lawas'),
('1222', '12', 'Kab. Labuhan Batu Selatan'),
('1223', '12', 'Kab. Labuhan Batu Utara'),
('1224', '12', 'Kab. Nias Utara'),
('1225', '12', 'Kab. Nias Barat'),
('1271', '12', 'Kota Sibolga'),
('1272', '12', 'Kota Tanjung Balai'),
('1273', '12', 'Kota Pematang Siantar'),
('1274', '12', 'Kota Tebing Tinggi'),
('1275', '12', 'Kota Medan'),
('1276', '12', 'Kota Binjai'),
('1277', '12', 'Kota Padangsidimpuan'),
('1278', '12', 'Kota Gunungsitoli'),
('1301', '13', 'Kab. Kepulauan Mentawai'),
('1302', '13', 'Kab. Pesisir Selatan'),
('1303', '13', 'Kab. Solok'),
('1304', '13', 'Kab. Sijunjung'),
('1305', '13', 'Kab. Tanah Datar'),
('1306', '13', 'Kab. Padang Pariaman'),
('1307', '13', 'Kab. Agam'),
('1308', '13', 'Kab. Lima Puluh Kota'),
('1309', '13', 'Kab. Pasaman'),
('1310', '13', 'Kab. Solok Selatan'),
('1311', '13', 'Kab. Dharmasraya'),
('1312', '13', 'Kab. Pasaman Barat'),
('1371', '13', 'Kota Padang'),
('1372', '13', 'Kota Solok'),
('1373', '13', 'Kota Sawah Lunto'),
('1374', '13', 'Kota Padang Panjang'),
('1375', '13', 'Kota Bukittinggi'),
('1376', '13', 'Kota Payakumbuh'),
('1377', '13', 'Kota Pariaman'),
('1401', '14', 'Kab. Kuantan Singingi'),
('1402', '14', 'Kab. Indragiri Hulu'),
('1403', '14', 'Kab. Indragiri Hilir'),
('1404', '14', 'Kab. Pelalawan'),
('1405', '14', 'Kab. S I A K'),
('1406', '14', 'Kab. Kampar'),
('1407', '14', 'Kab. Rokan Hulu'),
('1408', '14', 'Kab. Bengkalis'),
('1409', '14', 'Kab. Rokan Hilir'),
('1410', '14', 'Kab. Kepulauan Meranti'),
('1471', '14', 'Kota Pekanbaru'),
('1473', '14', 'Kota D U M A I'),
('1501', '15', 'Kab. Kerinci'),
('1502', '15', 'Kab. Merangin'),
('1503', '15', 'Kab. Sarolangun'),
('1504', '15', 'Kab. Batang Hari'),
('1505', '15', 'Kab. Muaro Jambi'),
('1506', '15', 'Kab. Tanjung Jabung Timur'),
('1507', '15', 'Kab. Tanjung Jabung Barat'),
('1508', '15', 'Kab. Tebo'),
('1509', '15', 'Kab. Bungo'),
('1571', '15', 'Kota Jambi'),
('1572', '15', 'Kota Sungai Penuh'),
('1601', '16', 'Kab. Ogan Komering Ulu'),
('1602', '16', 'Kab. Ogan Komering Ilir'),
('1603', '16', 'Kab. Muara Enim'),
('1604', '16', 'Kab. Lahat'),
('1605', '16', 'Kab. Musi Rawas'),
('1606', '16', 'Kab. Musi Banyuasin'),
('1607', '16', 'Kab. Banyu Asin'),
('1608', '16', 'Kab. Ogan Komering Ulu Selatan'),
('1609', '16', 'Kab. Ogan Komering Ulu Timur'),
('1610', '16', 'Kab. Ogan Ilir'),
('1611', '16', 'Kab. Empat Lawang'),
('1671', '16', 'Kota Palembang'),
('1672', '16', 'Kota Prabumulih'),
('1673', '16', 'Kota Pagar Alam'),
('1674', '16', 'Kota Lubuklinggau'),
('1701', '17', 'Kab. Bengkulu Selatan'),
('1702', '17', 'Kab. Rejang Lebong'),
('1703', '17', 'Kab. Bengkulu Utara'),
('1704', '17', 'Kab. Kaur'),
('1705', '17', 'Kab. Seluma'),
('1706', '17', 'Kab. Mukomuko'),
('1707', '17', 'Kab. Lebong'),
('1708', '17', 'Kab. Kepahiang'),
('1709', '17', 'Kab. Bengkulu Tengah'),
('1771', '17', 'Kota Bengkulu'),
('1801', '18', 'Kab. Lampung Barat'),
('1802', '18', 'Kab. Tanggamus'),
('1803', '18', 'Kab. Lampung Selatan'),
('1804', '18', 'Kab. Lampung Timur'),
('1805', '18', 'Kab. Lampung Tengah'),
('1806', '18', 'Kab. Lampung Utara'),
('1807', '18', 'Kab. Way Kanan'),
('1808', '18', 'Kab. Tulangbawang'),
('1809', '18', 'Kab. Pesawaran'),
('1810', '18', 'Kab. Pringsewu'),
('1811', '18', 'Kab. Mesuji'),
('1812', '18', 'Kab. Tulang Bawang Barat'),
('1813', '18', 'Kab. Pesisir Barat'),
('1871', '18', 'Kota Bandar Lampung'),
('1872', '18', 'Kota Metro'),
('1901', '19', 'Kab. Bangka'),
('1902', '19', 'Kab. Belitung'),
('1903', '19', 'Kab. Bangka Barat'),
('1904', '19', 'Kab. Bangka Tengah'),
('1905', '19', 'Kab. Bangka Selatan'),
('1906', '19', 'Kab. Belitung Timur'),
('1971', '19', 'Kota Pangkal Pinang'),
('2101', '21', 'Kab. Karimun'),
('2102', '21', 'Kab. Bintan'),
('2103', '21', 'Kab. Natuna'),
('2104', '21', 'Kab. Lingga'),
('2105', '21', 'Kab. Kepulauan Anambas'),
('2171', '21', 'Kota B A T A M'),
('2172', '21', 'Kota Tanjung Pinang'),
('3101', '31', 'Kab. Kepulauan Seribu'),
('3171', '31', 'Kota Jakarta Selatan'),
('3172', '31', 'Kota Jakarta Timur'),
('3173', '31', 'Kota Jakarta Pusat'),
('3174', '31', 'Kota Jakarta Barat'),
('3175', '31', 'Kota Jakarta Utara'),
('3201', '32', 'Kab. Bogor'),
('3202', '32', 'Kab. Sukabumi'),
('3203', '32', 'Kab. Cianjur'),
('3204', '32', 'Kab. Bandung'),
('3205', '32', 'Kab. Garut'),
('3206', '32', 'Kab. Tasikmalaya'),
('3207', '32', 'Kab. Ciamis'),
('3208', '32', 'Kab. Kuningan'),
('3209', '32', 'Kab. Cirebon'),
('3210', '32', 'Kab. Majalengka'),
('3211', '32', 'Kab. Sumedang'),
('3212', '32', 'Kab. Indramayu'),
('3213', '32', 'Kab. Subang'),
('3214', '32', 'Kab. Purwakarta'),
('3215', '32', 'Kab. Karawang'),
('3216', '32', 'Kab. Bekasi'),
('3217', '32', 'Kab. Bandung Barat'),
('3218', '32', 'Kab. Pangandaran'),
('3271', '32', 'Kota Bogor'),
('3272', '32', 'Kota Sukabumi'),
('3273', '32', 'Kota Bandung'),
('3274', '32', 'Kota Cirebon'),
('3275', '32', 'Kota Bekasi'),
('3276', '32', 'Kota Depok'),
('3277', '32', 'Kota Cimahi'),
('3278', '32', 'Kota Tasikmalaya'),
('3279', '32', 'Kota Banjar'),
('3301', '33', 'Kab. Cilacap'),
('3302', '33', 'Kab. Banyumas'),
('3303', '33', 'Kab. Purbalingga'),
('3304', '33', 'Kab. Banjarnegara'),
('3305', '33', 'Kab. Kebumen'),
('3306', '33', 'Kab. Purworejo'),
('3307', '33', 'Kab. Wonosobo'),
('3308', '33', 'Kab. Magelang'),
('3309', '33', 'Kab. Boyolali'),
('3310', '33', 'Kab. Klaten'),
('3311', '33', 'Kab. Sukoharjo'),
('3312', '33', 'Kab. Wonogiri'),
('3313', '33', 'Kab. Karanganyar'),
('3314', '33', 'Kab. Sragen'),
('3315', '33', 'Kab. Grobogan'),
('3316', '33', 'Kab. Blora'),
('3317', '33', 'Kab. Rembang'),
('3318', '33', 'Kab. Pati'),
('3319', '33', 'Kab. Kudus'),
('3320', '33', 'Kab. Jepara'),
('3321', '33', 'Kab. Demak'),
('3322', '33', 'Kab. Semarang'),
('3323', '33', 'Kab. Temanggung'),
('3324', '33', 'Kab. Kendal'),
('3325', '33', 'Kab. Batang'),
('3326', '33', 'Kab. Pekalongan'),
('3327', '33', 'Kab. Pemalang'),
('3328', '33', 'Kab. Tegal'),
('3329', '33', 'Kab. Brebes'),
('3371', '33', 'Kota Magelang'),
('3372', '33', 'Kota Surakarta'),
('3373', '33', 'Kota Salatiga'),
('3374', '33', 'Kota Semarang'),
('3375', '33', 'Kota Pekalongan'),
('3376', '33', 'Kota Tegal'),
('3401', '34', 'Kab. Kulon Progo'),
('3402', '34', 'Kab. Bantul'),
('3403', '34', 'Kab. Gunung Kidul'),
('3404', '34', 'Kab. Sleman'),
('3471', '34', 'Kota Yogyakarta'),
('3501', '35', 'Kab. Pacitan'),
('3502', '35', 'Kab. Ponorogo'),
('3503', '35', 'Kab. Trenggalek'),
('3504', '35', 'Kab. Tulungagung'),
('3505', '35', 'Kab. Blitar'),
('3506', '35', 'Kab. Kediri'),
('3507', '35', 'Kab. Malang'),
('3508', '35', 'Kab. Lumajang'),
('3509', '35', 'Kab. Jember'),
('3510', '35', 'Kab. Banyuwangi'),
('3511', '35', 'Kab. Bondowoso'),
('3512', '35', 'Kab. Situbondo'),
('3513', '35', 'Kab. Probolinggo'),
('3514', '35', 'Kab. Pasuruan'),
('3515', '35', 'Kab. Sidoarjo'),
('3516', '35', 'Kab. Mojokerto'),
('3517', '35', 'Kab. Jombang'),
('3518', '35', 'Kab. Nganjuk'),
('3519', '35', 'Kab. Madiun'),
('3520', '35', 'Kab. Magetan'),
('3521', '35', 'Kab. Ngawi'),
('3522', '35', 'Kab. Bojonegoro'),
('3523', '35', 'Kab. Tuban'),
('3524', '35', 'Kab. Lamongan'),
('3525', '35', 'Kab. Gresik'),
('3526', '35', 'Kab. Bangkalan'),
('3527', '35', 'Kab. Sampang'),
('3528', '35', 'Kab. Pamekasan'),
('3529', '35', 'Kab. Sumenep'),
('3571', '35', 'Kota Kediri'),
('3572', '35', 'Kota Blitar'),
('3573', '35', 'Kota Malang'),
('3574', '35', 'Kota Probolinggo'),
('3575', '35', 'Kota Pasuruan'),
('3576', '35', 'Kota Mojokerto'),
('3577', '35', 'Kota Madiun'),
('3578', '35', 'Kota Surabaya'),
('3579', '35', 'Kota Batu'),
('3601', '36', 'Kab. Pandeglang'),
('3602', '36', 'Kab. Lebak'),
('3603', '36', 'Kab. Tangerang'),
('3604', '36', 'Kab. Serang'),
('3671', '36', 'Kota Tangerang'),
('3672', '36', 'Kota Cilegon'),
('3673', '36', 'Kota Serang'),
('3674', '36', 'Kota Tangerang Selatan'),
('5101', '51', 'Kab. Jembrana'),
('5102', '51', 'Kab. Tabanan'),
('5103', '51', 'Kab. Badung'),
('5104', '51', 'Kab. Gianyar'),
('5105', '51', 'Kab. Klungkung'),
('5106', '51', 'Kab. Bangli'),
('5107', '51', 'Kab. Karang Asem'),
('5108', '51', 'Kab. Buleleng'),
('5171', '51', 'Kota Denpasar'),
('5201', '52', 'Kab. Lombok Barat'),
('5202', '52', 'Kab. Lombok Tengah'),
('5203', '52', 'Kab. Lombok Timur'),
('5204', '52', 'Kab. Sumbawa'),
('5205', '52', 'Kab. Dompu'),
('5206', '52', 'Kab. Bima'),
('5207', '52', 'Kab. Sumbawa Barat'),
('5208', '52', 'Kab. Lombok Utara'),
('5271', '52', 'Kota Mataram'),
('5272', '52', 'Kota Bima'),
('5301', '53', 'Kab. Sumba Barat'),
('5302', '53', 'Kab. Sumba Timur'),
('5303', '53', 'Kab. Kupang'),
('5304', '53', 'Kab. Timor Tengah Selatan'),
('5305', '53', 'Kab. Timor Tengah Utara'),
('5306', '53', 'Kab. Belu'),
('5307', '53', 'Kab. Alor'),
('5308', '53', 'Kab. Lembata'),
('5309', '53', 'Kab. Flores Timur'),
('5310', '53', 'Kab. Sikka'),
('5311', '53', 'Kab. Ende'),
('5312', '53', 'Kab. Ngada'),
('5313', '53', 'Kab. Manggarai'),
('5314', '53', 'Kab. Rote Ndao'),
('5315', '53', 'Kab. Manggarai Barat'),
('5316', '53', 'Kab. Sumba Tengah'),
('5317', '53', 'Kab. Sumba Barat Daya'),
('5318', '53', 'Kab. Nagekeo'),
('5319', '53', 'Kab. Manggarai Timur'),
('5320', '53', 'Kab. Sabu Raijua'),
('5371', '53', 'Kota Kupang'),
('6101', '61', 'Kab. Sambas'),
('6102', '61', 'Kab. Bengkayang'),
('6103', '61', 'Kab. Landak'),
('6104', '61', 'Kab. Pontianak'),
('6105', '61', 'Kab. Sanggau'),
('6106', '61', 'Kab. Ketapang'),
('6107', '61', 'Kab. Sintang'),
('6108', '61', 'Kab. Kapuas Hulu'),
('6109', '61', 'Kab. Sekadau'),
('6110', '61', 'Kab. Melawi'),
('6111', '61', 'Kab. Kayong Utara'),
('6112', '61', 'Kab. Kubu Raya'),
('6171', '61', 'Kota Pontianak'),
('6172', '61', 'Kota Singkawang'),
('6201', '62', 'Kab. Kotawaringin Barat'),
('6202', '62', 'Kab. Kotawaringin Timur'),
('6203', '62', 'Kab. Kapuas'),
('6204', '62', 'Kab. Barito Selatan'),
('6205', '62', 'Kab. Barito Utara'),
('6206', '62', 'Kab. Sukamara'),
('6207', '62', 'Kab. Lamandau'),
('6208', '62', 'Kab. Seruyan'),
('6209', '62', 'Kab. Katingan'),
('6210', '62', 'Kab. Pulang Pisau'),
('6211', '62', 'Kab. Gunung Mas'),
('6212', '62', 'Kab. Barito Timur'),
('6213', '62', 'Kab. Murung Raya'),
('6271', '62', 'Kota Palangka Raya'),
('6301', '63', 'Kab. Tanah Laut'),
('6302', '63', 'Kab. Kota Baru'),
('6303', '63', 'Kab. Banjar'),
('6304', '63', 'Kab. Barito Kuala'),
('6305', '63', 'Kab. Tapin'),
('6306', '63', 'Kab. Hulu Sungai Selatan'),
('6307', '63', 'Kab. Hulu Sungai Tengah'),
('6308', '63', 'Kab. Hulu Sungai Utara'),
('6309', '63', 'Kab. Tabalong'),
('6310', '63', 'Kab. Tanah Bumbu'),
('6311', '63', 'Kab. Balangan'),
('6371', '63', 'Kota Banjarmasin'),
('6372', '63', 'Kota Banjar Baru'),
('6401', '64', 'Kab. Paser'),
('6402', '64', 'Kab. Kutai Barat'),
('6403', '64', 'Kab. Kutai Kartanegara'),
('6404', '64', 'Kab. Kutai Timur'),
('6405', '64', 'Kab. Berau'),
('6409', '64', 'Kab. Penajam Paser Utara'),
('6471', '64', 'Kota Balikpapan'),
('6472', '64', 'Kota Samarinda'),
('6474', '64', 'Kota Bontang'),
('6501', '65', 'Kab. Malinau'),
('6502', '65', 'Kab. Bulungan'),
('6503', '65', 'Kab. Tana Tidung'),
('6504', '65', 'Kab. Nunukan'),
('6571', '65', 'Kota Tarakan'),
('7101', '71', 'Kab. Bolaang Mongondow'),
('7102', '71', 'Kab. Minahasa'),
('7103', '71', 'Kab. Kepulauan Sangihe'),
('7104', '71', 'Kab. Kepulauan Talaud'),
('7105', '71', 'Kab. Minahasa Selatan'),
('7106', '71', 'Kab. Minahasa Utara'),
('7107', '71', 'Kab. Bolaang Mongondow Utara'),
('7108', '71', 'Kab. Siau Tagulandang Biaro'),
('7109', '71', 'Kab. Minahasa Tenggara'),
('7110', '71', 'Kab. Bolaang Mongondow Selatan'),
('7111', '71', 'Kab. Bolaang Mongondow Timur'),
('7171', '71', 'Kota Manado'),
('7172', '71', 'Kota Bitung'),
('7173', '71', 'Kota Tomohon'),
('7174', '71', 'Kota Kotamobagu'),
('7201', '72', 'Kab. Banggai Kepulauan'),
('7202', '72', 'Kab. Banggai'),
('7203', '72', 'Kab. Morowali'),
('7204', '72', 'Kab. Poso'),
('7205', '72', 'Kab. Donggala'),
('7206', '72', 'Kab. Toli-toli'),
('7207', '72', 'Kab. Buol'),
('7208', '72', 'Kab. Parigi Moutong'),
('7209', '72', 'Kab. Tojo Una-una'),
('7210', '72', 'Kab. Sigi'),
('7271', '72', 'Kota Palu'),
('7301', '73', 'Kab. Kepulauan Selayar'),
('7302', '73', 'Kab. Bulukumba'),
('7303', '73', 'Kab. Bantaeng'),
('7304', '73', 'Kab. Jeneponto'),
('7305', '73', 'Kab. Takalar'),
('7306', '73', 'Kab. Gowa'),
('7307', '73', 'Kab. Sinjai'),
('7308', '73', 'Kab. Maros'),
('7309', '73', 'Kab. Pangkajene Dan Kepulauan'),
('7310', '73', 'Kab. Barru'),
('7311', '73', 'Kab. Bone'),
('7312', '73', 'Kab. Soppeng'),
('7313', '73', 'Kab. Wajo'),
('7314', '73', 'Kab. Sidenreng Rappang'),
('7315', '73', 'Kab. Pinrang'),
('7316', '73', 'Kab. Enrekang'),
('7317', '73', 'Kab. Luwu'),
('7318', '73', 'Kab. Tana Toraja'),
('7322', '73', 'Kab. Luwu Utara'),
('7325', '73', 'Kab. Luwu Timur'),
('7326', '73', 'Kab. Toraja Utara'),
('7371', '73', 'Kota Makassar'),
('7372', '73', 'Kota Parepare'),
('7373', '73', 'Kota Palopo'),
('7401', '74', 'Kab. Buton'),
('7402', '74', 'Kab. Muna'),
('7403', '74', 'Kab. Konawe'),
('7404', '74', 'Kab. Kolaka'),
('7405', '74', 'Kab. Konawe Selatan'),
('7406', '74', 'Kab. Bombana'),
('7407', '74', 'Kab. Wakatobi'),
('7408', '74', 'Kab. Kolaka Utara'),
('7409', '74', 'Kab. Buton Utara'),
('7410', '74', 'Kab. Konawe Utara'),
('7471', '74', 'Kota Kendari'),
('7472', '74', 'Kota Baubau'),
('7501', '75', 'Kab. Boalemo'),
('7502', '75', 'Kab. Gorontalo'),
('7503', '75', 'Kab. Pohuwato'),
('7504', '75', 'Kab. Bone Bolango'),
('7505', '75', 'Kab. Gorontalo Utara'),
('7571', '75', 'Kota Gorontalo'),
('7601', '76', 'Kab. Majene'),
('7602', '76', 'Kab. Polewali Mandar'),
('7603', '76', 'Kab. Mamasa'),
('7604', '76', 'Kab. Mamuju'),
('7605', '76', 'Kab. Mamuju Utara'),
('8101', '81', 'Kab. Maluku Tenggara Barat'),
('8102', '81', 'Kab. Maluku Tenggara'),
('8103', '81', 'Kab. Maluku Tengah'),
('8104', '81', 'Kab. Buru'),
('8105', '81', 'Kab. Kepulauan Aru'),
('8106', '81', 'Kab. Seram Bagian Barat'),
('8107', '81', 'Kab. Seram Bagian Timur'),
('8108', '81', 'Kab. Maluku Barat Daya'),
('8109', '81', 'Kab. Buru Selatan'),
('8171', '81', 'Kota Ambon'),
('8172', '81', 'Kota Tual'),
('8201', '82', 'Kab. Halmahera Barat'),
('8202', '82', 'Kab. Halmahera Tengah'),
('8203', '82', 'Kab. Kepulauan Sula'),
('8204', '82', 'Kab. Halmahera Selatan'),
('8205', '82', 'Kab. Halmahera Utara'),
('8206', '82', 'Kab. Halmahera Timur'),
('8207', '82', 'Kab. Pulau Morotai'),
('8271', '82', 'Kota Ternate'),
('8272', '82', 'Kota Tidore Kepulauan'),
('9101', '91', 'Kab. Fakfak'),
('9102', '91', 'Kab. Kaimana'),
('9103', '91', 'Kab. Teluk Wondama'),
('9104', '91', 'Kab. Teluk Bintuni'),
('9105', '91', 'Kab. Manokwari'),
('9106', '91', 'Kab. Sorong Selatan'),
('9107', '91', 'Kab. Sorong'),
('9108', '91', 'Kab. Raja Ampat'),
('9109', '91', 'Kab. Tambrauw'),
('9110', '91', 'Kab. Maybrat'),
('9171', '91', 'Kota Sorong'),
('9401', '94', 'Kab. Merauke'),
('9402', '94', 'Kab. Jayawijaya'),
('9403', '94', 'Kab. Jayapura'),
('9404', '94', 'Kab. Nabire'),
('9408', '94', 'Kab. Kepulauan Yapen'),
('9409', '94', 'Kab. Biak Numfor'),
('9410', '94', 'Kab. Paniai'),
('9411', '94', 'Kab. Puncak Jaya'),
('9412', '94', 'Kab. Mimika'),
('9413', '94', 'Kab. Boven Digoel'),
('9414', '94', 'Kab. Mappi'),
('9415', '94', 'Kab. Asmat'),
('9416', '94', 'Kab. Yahukimo'),
('9417', '94', 'Kab. Pegunungan Bintang'),
('9418', '94', 'Kab. Tolikara'),
('9419', '94', 'Kab. Sarmi'),
('9420', '94', 'Kab. Keerom'),
('9426', '94', 'Kab. Waropen'),
('9427', '94', 'Kab. Supiori'),
('9428', '94', 'Kab. Mamberamo Raya'),
('9429', '94', 'Kab. Nduga'),
('9430', '94', 'Kab. Lanny Jaya'),
('9431', '94', 'Kab. Mamberamo Tengah'),
('9432', '94', 'Kab. Yalimo'),
('9433', '94', 'Kab. Puncak'),
('9434', '94', 'Kab. Dogiyai'),
('9435', '94', 'Kab. Intan Jaya'),
('9436', '94', 'Kab. Deiyai'),
('9471', '94', 'Kota Jayapura');

-- --------------------------------------------------------

--
-- Table structure for table `kecamatan`
--

CREATE TABLE IF NOT EXISTS `kecamatan` (
  `id` varchar(7) NOT NULL,
  `id_kabupaten` varchar(4) NOT NULL,
  `nama` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kecamatan`
--

INSERT INTO `kecamatan` (`id`, `id_kabupaten`, `nama`) VALUES
('3206010', '3206', ' Cipatujah'),
('3206020', '3206', ' Karangnunggal'),
('3206030', '3206', ' Cikalong'),
('3206040', '3206', ' Pancatengah'),
('3206050', '3206', ' Cikatomas'),
('3206060', '3206', ' Cibalong'),
('3206061', '3206', ' Parungponteng'),
('3206070', '3206', ' Bantarkalong'),
('3206071', '3206', ' Bojongasih'),
('3206072', '3206', ' Culamega'),
('3206080', '3206', ' Bojonggambir'),
('3206090', '3206', ' Sodonghilir'),
('3206100', '3206', ' Taraju'),
('3206110', '3206', ' Salawu'),
('3206111', '3206', ' Puspahiang'),
('3206120', '3206', ' Tanjungjaya'),
('3206130', '3206', ' Sukaraja'),
('3206140', '3206', ' Salopa'),
('3206141', '3206', ' Jatiwaras'),
('3206150', '3206', ' Cineam'),
('3206151', '3206', ' Karangjaya'),
('3206160', '3206', ' Manonjaya'),
('3206161', '3206', ' Gunungtanjung'),
('3206190', '3206', ' Singaparna'),
('3206191', '3206', ' Sukarame'),
('3206192', '3206', ' Mangunreja'),
('3206200', '3206', ' Cigalontang'),
('3206210', '3206', ' Leuwisari'),
('3206211', '3206', ' Sariwangi'),
('3206212', '3206', ' Padakembang'),
('3206221', '3206', ' Sukaratu'),
('3206230', '3206', ' Cisayong'),
('3206231', '3206', ' Sukahening'),
('3206240', '3206', ' Rajapolah'),
('3206250', '3206', ' Jamanis'),
('3206260', '3206', ' Ciawi'),
('3206261', '3206', ' Kadipaten'),
('3206270', '3206', ' Pagerageung'),
('3206271', '3206', ' Sukaresik');

-- --------------------------------------------------------

--
-- Table structure for table `provinsi`
--

CREATE TABLE IF NOT EXISTS `provinsi` (
  `id` varchar(2) NOT NULL,
  `nama` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `provinsi`
--

INSERT INTO `provinsi` (`id`, `nama`) VALUES
('11', 'Aceh'),
('12', 'Sumatera Utara'),
('13', 'Sumatera Barat'),
('14', 'Riau'),
('15', 'Jambi'),
('16', 'Sumatera Selatan'),
('17', 'Bengkulu'),
('18', 'Lampung'),
('19', 'Kepulauan Bangka Belitung'),
('21', 'Kepulauan Riau'),
('31', 'Dki Jakarta'),
('32', 'Jawa Barat'),
('33', 'Jawa Tengah'),
('34', 'Di Yogyakarta'),
('35', 'Jawa Timur'),
('36', 'Banten'),
('51', 'Bali'),
('52', 'Nusa Tenggara Barat'),
('53', 'Nusa Tenggara Timur'),
('61', 'Kalimantan Barat'),
('62', 'Kalimantan Tengah'),
('63', 'Kalimantan Selatan'),
('64', 'Kalimantan Timur'),
('65', 'Kalimantan Utara'),
('71', 'Sulawesi Utara'),
('72', 'Sulawesi Tengah'),
('73', 'Sulawesi Selatan'),
('74', 'Sulawesi Tenggara'),
('75', 'Gorontalo'),
('76', 'Sulawesi Barat'),
('81', 'Maluku'),
('82', 'Maluku Utara'),
('91', 'Papua Barat'),
('94', 'Papua');

-- --------------------------------------------------------

--
-- Table structure for table `tb_agama`
--

CREATE TABLE IF NOT EXISTS `tb_agama` (
  `agama_id` int(11) NOT NULL AUTO_INCREMENT,
  `agama` varchar(20) NOT NULL,
  PRIMARY KEY (`agama_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `tb_agama`
--

INSERT INTO `tb_agama` (`agama_id`, `agama`) VALUES
(28, 'islam'),
(24, 'Konghucu'),
(16, 'budha'),
(0, 'no_set');

-- --------------------------------------------------------

--
-- Table structure for table `tb_guru`
--

CREATE TABLE IF NOT EXISTS `tb_guru` (
  `guru_id` int(11) NOT NULL AUTO_INCREMENT,
  `guru_nip` int(20) NOT NULL,
  `guru_nidn` int(20) NOT NULL,
  `guru_nama` varchar(50) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `guru_status` char(10) NOT NULL,
  `thn_masuk` varchar(12) NOT NULL,
  `pendidikan` varchar(20) NOT NULL,
  `mapel_id` int(11) NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tgl_lahir` varchar(12) NOT NULL,
  `agama_id` int(11) NOT NULL,
  `gender` char(2) NOT NULL,
  `gol_darah` char(2) NOT NULL,
  `provinsi` varchar(20) NOT NULL,
  `kabupaten` varchar(20) NOT NULL,
  `kecamatan` varchar(20) NOT NULL,
  `desa` varchar(20) NOT NULL,
  `rt` char(3) NOT NULL,
  `rw` char(3) NOT NULL,
  `no_hp` char(13) NOT NULL,
  `guru_email` varchar(50) NOT NULL,
  `kajur` int(2) NOT NULL,
  `wali` int(1) NOT NULL,
  `tgl_insert` datetime NOT NULL,
  `tgl_update` datetime NOT NULL,
  PRIMARY KEY (`guru_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `tb_guru`
--

INSERT INTO `tb_guru` (`guru_id`, `guru_nip`, `guru_nidn`, `guru_nama`, `foto`, `guru_status`, `thn_masuk`, `pendidikan`, `mapel_id`, `tempat_lahir`, `tgl_lahir`, `agama_id`, `gender`, `gol_darah`, `provinsi`, `kabupaten`, `kecamatan`, `desa`, `rt`, `rw`, `no_hp`, `guru_email`, `kajur`, `wali`, `tgl_insert`, `tgl_update`) VALUES
(0, 0, 0, 'no_set', '0', '0', '0', '0', 0, '', '', 0, '', '', '', '', '', '', '', '', '', '', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 34578234, 0, 'Dian Hermawan', '', 'NON PNS', '', '', 0, '', '', 0, '', '', '', '', '', '', '', '', '', 'dian.hermawan@gmail.com', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 43857898, 0, 'Irwan Kurniansyah ,M,Kom', '1459591323.jpg', 'PNS', '', '', 0, '', '', 0, '', '', '', '', '', '', '', '', '', 'sinceu.maurejo@gmail.com', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 2344578, 34534, 'Sukamto', '1459648542.jpg', 'PNS', '', '', 0, '', '', 0, 'L', 'A', '', '', '', '', '', '', '', 'sukamto@gmail.com', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(21, 123345, 234435345, 'Dina Karina', '1459081259.jpg', 'PNS', '12/12/1992', 's1', 14, 'Banjar', '18/08/1994', 0, 'P', 'B', 'Jawa Barat', 'Kab. Tasikmalaya', '', '', '', '', '', '', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, 2342343, 234343, 'Rizal Nugroho, S.T', '1449548991.jpg', 'PNS', '12/12/1992', '', 8, '', '', 0, '', '', '', '', '', '', '', '', '', '', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 89898459, 2147483647, 'Vini Angraeni, S.T', '1448751091.jpg', 'PNS', '11/11/2000', 's1', 0, 'Ranca Bakung', '11/11/1999', 0, 'P', 'A+', 'Jawa Barat', 'Kab. Tasikmalaya', ' Karangnunggal', 'Cikapinis', '09', '08', '78769869', 'vini@gmail.com', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 78687789, 2147483647, 'Novi Somantri, S,Pd', '1448754559.jpg', 'PNS', '12/12/1991', 's1', 0, '', '', 28, 'P', 'O', '', '', '', '', '', '', '', '', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jenis_perusahaan`
--

CREATE TABLE IF NOT EXISTS `tb_jenis_perusahaan` (
  `jenis_perusahaan_id` int(11) NOT NULL AUTO_INCREMENT,
  `jenis_perusahaan` varchar(20) NOT NULL,
  PRIMARY KEY (`jenis_perusahaan_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `tb_jenis_perusahaan`
--

INSERT INTO `tb_jenis_perusahaan` (`jenis_perusahaan_id`, `jenis_perusahaan`) VALUES
(18, 'SWASTA'),
(0, 'no_set'),
(19, 'NEGERI');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jurusan`
--

CREATE TABLE IF NOT EXISTS `tb_jurusan` (
  `jurusan_id` int(11) NOT NULL AUTO_INCREMENT,
  `jurusan_singkat` char(10) NOT NULL,
  `jurusan_nama` varchar(50) NOT NULL,
  `akreditasi` char(2) NOT NULL,
  `tgl_insert` datetime NOT NULL,
  `tgl_update` datetime NOT NULL,
  PRIMARY KEY (`jurusan_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=66 ;

--
-- Dumping data for table `tb_jurusan`
--

INSERT INTO `tb_jurusan` (`jurusan_id`, `jurusan_singkat`, `jurusan_nama`, `akreditasi`, `tgl_insert`, `tgl_update`) VALUES
(0, 'no_set', 'no_set', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(62, 'TKR', 'Teknik Kendaraan Ringan', 'B', '2015-12-08 05:17:27', '0000-00-00 00:00:00'),
(63, 'TSM', 'Teknik Sepeda Motor', 'B', '2015-12-08 05:27:57', '0000-00-00 00:00:00'),
(64, 'RPL', 'Rekayasa Perangkat Lunak', 'C', '2015-12-08 05:29:18', '2016-03-30 07:49:55'),
(65, 'TKJ', 'Teknik Komputer Jaringan', 'B', '2015-12-08 05:29:35', '2016-03-29 06:46:33');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kajur`
--

CREATE TABLE IF NOT EXISTS `tb_kajur` (
  `kajur_id` int(11) NOT NULL AUTO_INCREMENT,
  `thn_ajaran_id` int(11) NOT NULL,
  `jurusan_id` int(11) NOT NULL,
  `guru_id` int(11) NOT NULL,
  `tgl_insert` datetime NOT NULL,
  `tgl_update` datetime NOT NULL,
  PRIMARY KEY (`kajur_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `tb_kajur`
--

INSERT INTO `tb_kajur` (`kajur_id`, `thn_ajaran_id`, `jurusan_id`, `guru_id`, `tgl_insert`, `tgl_update`) VALUES
(0, 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 25, 64, 20, '2016-04-02 10:05:40', '2016-04-02 10:06:09');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kelas`
--

CREATE TABLE IF NOT EXISTS `tb_kelas` (
  `kelas_id` int(11) NOT NULL AUTO_INCREMENT,
  `tingkat_id` int(11) NOT NULL,
  `thn_ajaran_id` int(11) NOT NULL,
  `murid_id` int(11) NOT NULL,
  PRIMARY KEY (`kelas_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=96 ;

--
-- Dumping data for table `tb_kelas`
--

INSERT INTO `tb_kelas` (`kelas_id`, `tingkat_id`, `thn_ajaran_id`, `murid_id`) VALUES
(62, 36, 25, 35),
(61, 36, 25, 40),
(60, 36, 25, 42),
(59, 41, 25, 7),
(58, 41, 25, 8),
(57, 41, 25, 9),
(56, 41, 25, 10),
(55, 41, 25, 18),
(54, 41, 25, 34),
(53, 41, 25, 35),
(52, 41, 25, 40),
(51, 41, 25, 42),
(50, 38, 25, 7),
(49, 38, 25, 8),
(48, 38, 25, 9),
(47, 38, 25, 10),
(46, 38, 25, 11),
(45, 35, 25, 19),
(44, 35, 25, 34),
(43, 35, 25, 35),
(42, 35, 25, 40),
(41, 35, 25, 42),
(63, 36, 25, 34),
(64, 36, 25, 19),
(65, 36, 25, 18),
(66, 36, 25, 10),
(67, 36, 25, 9),
(68, 36, 25, 8),
(69, 36, 25, 7),
(70, 43, 25, 10),
(71, 43, 25, 9),
(72, 43, 25, 8),
(73, 43, 25, 7),
(74, 41, 25, 42),
(75, 41, 25, 40),
(76, 41, 25, 35),
(77, 41, 25, 34),
(78, 41, 25, 19),
(79, 41, 25, 18),
(80, 41, 25, 10),
(81, 41, 25, 9),
(82, 41, 25, 8),
(83, 41, 25, 7),
(84, 42, 25, 42),
(85, 42, 25, 40),
(86, 42, 25, 35),
(87, 42, 25, 34),
(88, 42, 25, 19),
(89, 42, 25, 18),
(90, 42, 25, 12),
(91, 42, 25, 11),
(92, 42, 25, 10),
(93, 42, 25, 9),
(94, 42, 25, 8),
(95, 42, 25, 7);

-- --------------------------------------------------------

--
-- Table structure for table `tb_mapel`
--

CREATE TABLE IF NOT EXISTS `tb_mapel` (
  `mapel_id` int(11) NOT NULL AUTO_INCREMENT,
  `singkatan` varchar(20) NOT NULL,
  `mapel_nama` varchar(50) NOT NULL,
  PRIMARY KEY (`mapel_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `tb_mapel`
--

INSERT INTO `tb_mapel` (`mapel_id`, `singkatan`, `mapel_nama`) VALUES
(8, 'PLH', 'Pendidikan Lingkungan Hidup'),
(0, 'no_set', 'no_set'),
(11, 'B.Indo', 'Bahasa Indonesia'),
(12, 'B.Inggris', 'Bahasa Inggris'),
(13, 'MTK', 'Matematiak'),
(14, 'TKJ', 'Teknik Komputer Jaringan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_monitoring`
--

CREATE TABLE IF NOT EXISTS `tb_monitoring` (
  `monitoring_id` int(11) NOT NULL AUTO_INCREMENT,
  `prakerin_id` int(11) NOT NULL,
  `guru_id` int(11) NOT NULL,
  PRIMARY KEY (`monitoring_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tb_monitoring`
--

INSERT INTO `tb_monitoring` (`monitoring_id`, `prakerin_id`, `guru_id`) VALUES
(1, 2, 17),
(2, 1, 19);

-- --------------------------------------------------------

--
-- Table structure for table `tb_murid`
--

CREATE TABLE IF NOT EXISTS `tb_murid` (
  `murid_id` int(11) NOT NULL AUTO_INCREMENT,
  `no_induk` int(11) NOT NULL,
  `nisn` varchar(10) NOT NULL,
  `nama_lengkap` varchar(30) NOT NULL,
  `nama_panggilan` varchar(15) NOT NULL,
  `angkatan` varchar(12) NOT NULL,
  `jurusan_id` int(11) NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `tgl_lahir` varchar(12) NOT NULL,
  `gender` char(2) NOT NULL,
  `gol_darah` char(2) NOT NULL,
  `agama_id` int(11) NOT NULL,
  `kewarganegaraan` varchar(20) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `path` varchar(50) NOT NULL,
  `pihak_dihubungi` varchar(15) NOT NULL,
  `penanggung_jawab` varchar(20) NOT NULL,
  `tgl_daftar` varchar(12) NOT NULL,
  `semester_aktif` int(2) NOT NULL,
  `provinsi` varchar(50) NOT NULL,
  `kabupaten` varchar(50) NOT NULL,
  `kecamatan` varchar(50) NOT NULL,
  `desa` varchar(50) NOT NULL,
  `rt` char(3) NOT NULL,
  `rw` char(3) NOT NULL,
  `tlp_rumah` varchar(15) NOT NULL,
  `no_hp_murid` varchar(12) NOT NULL,
  `kode_pos` char(7) NOT NULL,
  `email` varchar(30) NOT NULL,
  `sd_asal` varchar(20) NOT NULL,
  `alamat_sd` varchar(200) NOT NULL,
  `thn_lulus_sd` char(5) NOT NULL,
  `smp_mts_asal` varchar(20) NOT NULL,
  `alamat_smp_mts` varchar(200) NOT NULL,
  `thn_lulus_smp_mts` char(5) NOT NULL,
  `nama_lengkap_ibu` varchar(30) NOT NULL,
  `pekerjaan_ibu` varchar(20) NOT NULL,
  `pendidikan_ibu` varchar(15) NOT NULL,
  `nama_lengkap_ayah` varchar(30) NOT NULL,
  `pekerjaan_ayah` varchar(20) NOT NULL,
  `pendidikan_ayah` varchar(15) NOT NULL,
  `penghasilan_ibu` varchar(15) NOT NULL,
  `penghasilan_ayah` varchar(15) NOT NULL,
  `alamat_ortu` varchar(200) NOT NULL,
  PRIMARY KEY (`murid_id`),
  KEY `jurusan_id` (`jurusan_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=44 ;

--
-- Dumping data for table `tb_murid`
--

INSERT INTO `tb_murid` (`murid_id`, `no_induk`, `nisn`, `nama_lengkap`, `nama_panggilan`, `angkatan`, `jurusan_id`, `tempat_lahir`, `tgl_lahir`, `gender`, `gol_darah`, `agama_id`, `kewarganegaraan`, `foto`, `path`, `pihak_dihubungi`, `penanggung_jawab`, `tgl_daftar`, `semester_aktif`, `provinsi`, `kabupaten`, `kecamatan`, `desa`, `rt`, `rw`, `tlp_rumah`, `no_hp_murid`, `kode_pos`, `email`, `sd_asal`, `alamat_sd`, `thn_lulus_sd`, `smp_mts_asal`, `alamat_smp_mts`, `thn_lulus_smp_mts`, `nama_lengkap_ibu`, `pekerjaan_ibu`, `pendidikan_ibu`, `nama_lengkap_ayah`, `pekerjaan_ayah`, `pendidikan_ayah`, `penghasilan_ibu`, `penghasilan_ayah`, `alamat_ortu`) VALUES
(9, 10100055, '23438590', 'Dina Karina', 'dina', '2010/2011', 0, 'Tasikmalaya', '12/12/1996', 'P', 'O', 28, '', '1459083593.jpg', '', '', '', '', 0, 'Jawa Barat', 'Kab. Tasikmalaya', ' Cipatujah', 'Padawaras', '07', '08', '', '', '', 'dina@gmail.com', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(5, 10100153, '2343248', 'AA Rizky Pratama 2', 'Rizky2', '2011/2012', 0, 'Tasikmalaya', '11/11/1994', 'L', 'A', 0, 'Islam', '1459082424.jpg', '', '', '', '', 0, '32', '3206', '3206010', '0', '08', '09', '769O7895', '08787876789', '46187', 'Aarizky@gmail.com', 'SD Negeri 1 Darawati', 'Jl. Darawati', '2003', 'SMPN 1 Cipatujah', 'Jl. Sukajaya', '2009', 'nina', 'petani', 's3', 'doni', 'buruh', 's3', '', '', 'Jl. Darawati'),
(6, 10100025, '3453509', 'Rina Rosalina', 'rina', '2010/2011', 0, 'Tasikmalaya', '19/09/1995', 'P', 'B', 0, '', '', '', '', '', '', 0, '32', '3206', '3206010', '0', '2', '5', '', '097878789', '46129', 'rina@gmail.com', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(7, 10100023, '23849234', 'Rio Ardiansyah2', 'rio', '2010/2011', 0, 'Tasikmalaya', '12/12/1994', 'L', 'O', 0, '', '', '', '', '', '', 0, '0', '0', '0', '0', '0', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(8, 10100024, '23434958', 'Rika Kartika', 'rika', '2010/2011', 0, 'Tasikmalaya', '11/11/1996', 'P', 'A+', 0, '', '1459563021.jpg', '', '', '', '', 0, '32', '3206', '3206010', '0', '08', '09', '349589358', '394853945', '46129', 'rika@gmail.com', 'kjfkajfkajf', 'skfjskfjskfjs', 'skfdj', '2003', 'kfjsdkfjskfjk', '2013', 'fjkdfjfdjd', 'buruh', 's2', 'dkffjkjf', 'petani', 's2', '', '', 'asdkjfkafjkafj'),
(10, 10100076, '3495849385', 'Wildan Fadiatul Haq', 'wildan', '2010/2011', 0, 'Tasikmalaya', '19/11/1994', 'L', 'A', 0, '', '', '', '', '', '', 0, '32', '3206', '3206010', '3206010', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(11, 10100078, '2', 'Ridwan Rambe', 'rambe', '2010/2011', 0, '', '', 'L', 'A', 0, '', '1459591620.jpg', '', '', '', '', 0, '32', '3206', '3206010', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(12, 11111111, '222222222', 'ccccc', 'vvvvvvvvvvvv', '2010/2011', 0, 'dsafafaf', '', 'L', 'A', 0, '', '', '', '', '', '', 0, '32', '3206', '3206010', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(18, 10100047, '64565765', 'Abdul Husen', 'sen', '2010/2011', 0, 'Tasikmalaya', '18/08/1994', 'P', 'O', 0, '', '1448630201.jpg', '', '', '', '', 0, '0', '0', '0', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', 'petani', 's3', '', 'petani', 's3', '', '', ''),
(40, 76897897, '879878979', 'wandi', 'wandi', '2015/2016', 57, 'Tasikmalaya', '12/12/1994', 'L', 'O', 0, '', '1459297652.jpg', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(19, 10100035, '', 'Rizkiya', '', '2010/2011', 0, '', '', '', '', 0, '', '', '', '', '', '', 0, 'Jawa Barat', 'Kab. Tasikmalaya', ' Cipatujah', 'Padawaras', '09', '07', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(34, 57897898, '9898989898', 'Uya Lestari', 'uya', '2010/2011', 0, '', '', '', '', 0, '', '1448629553.jpg', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(35, 34343434, '3443543589', 'Ai Iqlimah', 'ai', '2010/2011', 0, 'Tasikmalaya', '18/08/1994', 'P', 'O', 0, '', '1448678003.jpg', '', '', '', '', 0, 'Jawa Barat', 'Kab. Tasikmalaya', ' Cipatujah', 'Padawaras', '02', '03', '878987987', '098789789', '46187', 'blogsen@gmail.com', 'SD N 1 GIRIJAYA', 'jl. rancagiri', '2003', 'smpn 1 cipatujah', 'jl.sukajaya', '2009', 'WATI', 'petani', 's2', 'ODIN', 'petani', 's3', '', '', 'JL.Rancagiri'),
(42, 23424343, '3435454', 'Abdul Husen', 'husen', '2015/2016', 55, 'Banjar', '18/08/1994', 'P', 'A', 28, '', '1449188320.jpg', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pembimbing`
--

CREATE TABLE IF NOT EXISTS `tb_pembimbing` (
  `pembimbing_id` int(11) NOT NULL AUTO_INCREMENT,
  `jurusan_id` int(11) NOT NULL,
  `guru_id` int(11) NOT NULL,
  `active` int(2) NOT NULL,
  PRIMARY KEY (`pembimbing_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tb_pembimbing`
--

INSERT INTO `tb_pembimbing` (`pembimbing_id`, `jurusan_id`, `guru_id`, `active`) VALUES
(1, 65, 17, 0),
(2, 65, 20, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_perusahaan`
--

CREATE TABLE IF NOT EXISTS `tb_perusahaan` (
  `perusahaan_id` int(11) NOT NULL AUTO_INCREMENT,
  `jenis_perusahaan_id` int(11) NOT NULL,
  `nama_perusahaan` varchar(30) NOT NULL,
  `pimpinan_perusahaan` varchar(30) NOT NULL,
  `alamat_perusahaan` varchar(200) NOT NULL,
  `no_tlp` varchar(13) NOT NULL,
  PRIMARY KEY (`perusahaan_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tb_perusahaan`
--

INSERT INTO `tb_perusahaan` (`perusahaan_id`, `jenis_perusahaan_id`, `nama_perusahaan`, `pimpinan_perusahaan`, `alamat_perusahaan`, `no_tlp`) VALUES
(5, 19, 'Jupiter Notebook', 'Iskandar', 'Jalan Ahmad Yani no 23 Bandung', '349859980999'),
(6, 18, 'Limbad Notebook', 'Abah Limbad', 'Jl. Ahmad Yani no 3 Bandung', '08908349');

-- --------------------------------------------------------

--
-- Table structure for table `tb_prakerin`
--

CREATE TABLE IF NOT EXISTS `tb_prakerin` (
  `prakerin_id` int(11) NOT NULL AUTO_INCREMENT,
  `thn_ajaran_id` int(11) NOT NULL,
  `perusahaan_id` int(11) NOT NULL,
  `murid_id` int(11) NOT NULL,
  PRIMARY KEY (`prakerin_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tb_prakerin`
--

INSERT INTO `tb_prakerin` (`prakerin_id`, `thn_ajaran_id`, `perusahaan_id`, `murid_id`) VALUES
(1, 20, 5, 36),
(2, 20, 5, 35);

-- --------------------------------------------------------

--
-- Table structure for table `tb_thn_ajaran`
--

CREATE TABLE IF NOT EXISTS `tb_thn_ajaran` (
  `thn_ajaran_id` int(11) NOT NULL AUTO_INCREMENT,
  `tahun` varchar(12) NOT NULL,
  `semester` int(2) NOT NULL,
  `thn_ajaran` varchar(6) NOT NULL,
  `status` int(2) NOT NULL,
  PRIMARY KEY (`thn_ajaran_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `tb_thn_ajaran`
--

INSERT INTO `tb_thn_ajaran` (`thn_ajaran_id`, `tahun`, `semester`, `thn_ajaran`, `status`) VALUES
(26, '2015/2016', 2, '20152', 0),
(25, '2015/2016', 1, '20151', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_tingkat`
--

CREATE TABLE IF NOT EXISTS `tb_tingkat` (
  `tingkat_id` int(11) NOT NULL AUTO_INCREMENT,
  `jurusan_id` int(11) NOT NULL,
  `nama_tingkat` varchar(20) NOT NULL,
  `tingkat` int(2) NOT NULL,
  `tgl_insert` datetime NOT NULL,
  `tgl_update` datetime NOT NULL,
  PRIMARY KEY (`tingkat_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=44 ;

--
-- Dumping data for table `tb_tingkat`
--

INSERT INTO `tb_tingkat` (`tingkat_id`, `jurusan_id`, `nama_tingkat`, `tingkat`, `tgl_insert`, `tgl_update`) VALUES
(41, 65, '3 TKJ 1', 3, '2016-04-01 00:00:41', '0000-00-00 00:00:00'),
(0, 0, 'no_set', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(35, 65, '1 TKJ 1', 1, '2016-03-31 23:00:35', '0000-00-00 00:00:00'),
(36, 65, '1 TKJ 2', 1, '2016-03-31 23:00:45', '0000-00-00 00:00:00'),
(37, 65, '1 TKJ 3', 1, '2016-03-31 23:00:55', '0000-00-00 00:00:00'),
(38, 65, '2 TKJ 1', 2, '2016-03-31 23:01:07', '0000-00-00 00:00:00'),
(39, 65, '2 TKJ 2', 2, '2016-03-31 23:01:16', '0000-00-00 00:00:00'),
(40, 65, '2 TKJ 3', 2, '2016-03-31 23:01:28', '0000-00-00 00:00:00'),
(42, 65, '3 TKJ 2', 3, '2016-04-01 00:01:00', '0000-00-00 00:00:00'),
(43, 65, '3 TKJ 3', 3, '2016-04-01 00:01:15', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user_admin`
--

CREATE TABLE IF NOT EXISTS `tb_user_admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_nama` varchar(50) NOT NULL,
  `admin_email` varchar(100) NOT NULL,
  `admin_username` varchar(100) NOT NULL,
  `admin_password` varchar(100) NOT NULL,
  `path` varchar(100) NOT NULL,
  `avatar` varchar(100) NOT NULL,
  `status` char(4) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tb_user_admin`
--

INSERT INTO `tb_user_admin` (`admin_id`, `admin_nama`, `admin_email`, `admin_username`, `admin_password`, `path`, `avatar`, `status`) VALUES
(1, 'Abdul Husen', 'abdulhusen128@gmail.com', 'adminsen', '6a5f038e011118ad3861f8690ad05d4c', './avatar', 'avatar.jpg', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tb_wali_kelas`
--

CREATE TABLE IF NOT EXISTS `tb_wali_kelas` (
  `wali_kelas_id` int(11) NOT NULL AUTO_INCREMENT,
  `thn_ajaran_id` int(11) NOT NULL,
  `guru_id` int(11) NOT NULL,
  `tingkat_id` int(11) NOT NULL,
  PRIMARY KEY (`wali_kelas_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tb_wali_kelas`
--

INSERT INTO `tb_wali_kelas` (`wali_kelas_id`, `thn_ajaran_id`, `guru_id`, `tingkat_id`) VALUES
(4, 25, 20, 41),
(1, 25, 17, 36),
(5, 25, 17, 42),
(6, 25, 7, 38),
(7, 25, 8, 35);

-- --------------------------------------------------------

--
-- Table structure for table `theme`
--

CREATE TABLE IF NOT EXISTS `theme` (
  `theme_id` int(11) NOT NULL,
  `theme_name` varchar(30) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `theme`
--


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
