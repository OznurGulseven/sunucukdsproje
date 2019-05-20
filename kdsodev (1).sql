-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1:3306
-- Üretim Zamanı: 20 May 2019, 21:25:55
-- Sunucu sürümü: 5.7.19
-- PHP Sürümü: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `kdsodev`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `il`
--

DROP TABLE IF EXISTS `il`;
CREATE TABLE IF NOT EXISTS `il` (
  `il_id` int(15) NOT NULL,
  `il_ad` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`il_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `il`
--

INSERT INTO `il` (`il_id`, `il_ad`) VALUES
(1, 'izmir');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ilan`
--

DROP TABLE IF EXISTS `ilan`;
CREATE TABLE IF NOT EXISTS `ilan` (
  `ilanID` int(15) NOT NULL AUTO_INCREMENT,
  `ilanFiyat` int(15) NOT NULL,
  `kimdenID` int(15) NOT NULL,
  `ilanTarih` date NOT NULL,
  `kategori_id` int(10) NOT NULL,
  `adres` varchar(500) COLLATE utf8_turkish_ci NOT NULL,
  `il_id` int(11) NOT NULL,
  `konut_tur_id` int(11) NOT NULL,
  PRIMARY KEY (`ilanID`),
  KEY `kimdenID` (`kimdenID`),
  KEY `kategori_id` (`kategori_id`),
  KEY `il_id` (`il_id`),
  KEY `konut_tur_id` (`konut_tur_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `ilan`
--

INSERT INTO `ilan` (`ilanID`, `ilanFiyat`, `kimdenID`, `ilanTarih`, `kategori_id`, `adres`, `il_id`, `konut_tur_id`) VALUES
(1, 500000, 1, '2019-05-02', 1, 'izmir', 1, 1),
(2, 600, 2, '2019-05-03', 2, 'Buca', 1, 2),
(3, 600000, 2, '2019-05-08', 1, 'izmir', 1, 3),
(4, 700000, 2, '2019-05-04', 1, 'izmir', 1, 4),
(5, 800000, 2, '2019-05-17', 1, 'izmir', 1, 3),
(6, 800000, 1, '2019-05-16', 1, 'izmir', 1, 2),
(7, 700000, 12, '2019-05-10', 1, 'izmir', 1, 4),
(8, 900000, 11, '2019-05-13', 1, 'izmir', 1, 3),
(9, 900000, 10, '2019-05-05', 1, 'izmir', 1, 3),
(10, 400000, 4, '2019-05-23', 1, 'izmir', 1, 1),
(11, 200000, 7, '2019-05-08', 2, 'izmir', 1, 4),
(12, 500000, 10, '2019-05-09', 1, 'izmir', 1, 2);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ilandetay`
--

DROP TABLE IF EXISTS `ilandetay`;
CREATE TABLE IF NOT EXISTS `ilandetay` (
  `ilanDetayID` int(15) NOT NULL AUTO_INCREMENT,
  `binaYasi` int(16) NOT NULL,
  `odaSayisi` varchar(16) COLLATE utf8_turkish_ci NOT NULL,
  `binaKat` int(16) NOT NULL,
  `ilanID` int(11) NOT NULL,
  PRIMARY KEY (`ilanDetayID`),
  UNIQUE KEY `ilanID_2` (`ilanID`),
  KEY `ilanID` (`ilanID`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `ilandetay`
--

INSERT INTO `ilandetay` (`ilanDetayID`, `binaYasi`, `odaSayisi`, `binaKat`, `ilanID`) VALUES
(1, 3, '3+1', 2, 1),
(2, 5, '2+1', 3, 2),
(3, 5, '2+1', 1, 10),
(4, 6, '1+1', 5, 5),
(5, 1, '1+0', 1, 9),
(6, 5, '1+1', 5, 7),
(7, 1, '2+1', 5, 6),
(8, 2, '3+1', 2, 8),
(9, 2, '1+1', 4, 12),
(10, 2, '3+1', 2, 11),
(11, 2, '2+1', 2, 3),
(12, 1, '1+1', 5, 4);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kategori`
--

DROP TABLE IF EXISTS `kategori`;
CREATE TABLE IF NOT EXISTS `kategori` (
  `kategoriID` int(15) NOT NULL,
  `kategoriAD` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`kategoriID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `kategori`
--

INSERT INTO `kategori` (`kategoriID`, `kategoriAD`) VALUES
(1, 'satilik'),
(2, 'kiralık');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kimden`
--

DROP TABLE IF EXISTS `kimden`;
CREATE TABLE IF NOT EXISTS `kimden` (
  `kimdenID` int(15) NOT NULL,
  `kimdenAD` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`kimdenID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `kimden`
--

INSERT INTO `kimden` (`kimdenID`, `kimdenAD`) VALUES
(1, 'oznur'),
(2, 'selin'),
(3, 'mert'),
(4, 'seval'),
(5, 'can'),
(6, 'selen'),
(7, 'sena'),
(8, 'mehmet'),
(9, 'ali'),
(10, 'yıldız'),
(11, 'pelin'),
(12, 'ece');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `konut_tur`
--

DROP TABLE IF EXISTS `konut_tur`;
CREATE TABLE IF NOT EXISTS `konut_tur` (
  `konut_tur_id` int(15) NOT NULL,
  `konut_tur_ad` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`konut_tur_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `konut_tur`
--

INSERT INTO `konut_tur` (`konut_tur_id`, `konut_tur_ad`) VALUES
(1, 'Müstakil'),
(2, 'Daire'),
(3, 'Rezidans'),
(4, 'Villa');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ozellik`
--

DROP TABLE IF EXISTS `ozellik`;
CREATE TABLE IF NOT EXISTS `ozellik` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `isitma` varchar(11) COLLATE utf8_turkish_ci NOT NULL,
  `kuvet` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `asansor` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `kapici` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `ilanID` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `ilanID_2` (`ilanID`),
  KEY `ilanID` (`ilanID`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `ozellik`
--

INSERT INTO `ozellik` (`id`, `isitma`, `kuvet`, `asansor`, `kapici`, `ilanID`) VALUES
(1, 'kombi', 'var', 'var', 'yok', 1),
(2, 'klima', 'var', 'yok', 'var', 2),
(3, 'kombi', 'var', 'yok', 'yok', 10),
(4, 'kombi', 'yok', 'var', 'var', 9),
(5, 'kombi', 'var', 'yok', 'var', 12),
(6, 'klima', 'var', 'yok', 'yok', 11),
(7, 'kombi', 'var', 'yok', 'var', 8),
(8, 'klima', 'var', 'yok', 'yok', 7),
(9, 'klima', 'yok', 'yok', 'yok', 6),
(10, 'klima', 'var', 'yok', 'yok', 5),
(11, 'klima', 'var', 'var', 'var', 4),
(12, 'kombi', 'var', 'var', 'yok', 3);

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `ilan`
--
ALTER TABLE `ilan`
  ADD CONSTRAINT `ilan_ibfk_1` FOREIGN KEY (`il_id`) REFERENCES `il` (`il_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ilan_ibfk_2` FOREIGN KEY (`kimdenID`) REFERENCES `kimden` (`kimdenID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ilan_ibfk_3` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`kategoriID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ilan_ibfk_4` FOREIGN KEY (`konut_tur_id`) REFERENCES `konut_tur` (`konut_tur_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `ilandetay`
--
ALTER TABLE `ilandetay`
  ADD CONSTRAINT `ilandetay_ibfk_1` FOREIGN KEY (`ilanID`) REFERENCES `ilan` (`ilanID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `ozellik`
--
ALTER TABLE `ozellik`
  ADD CONSTRAINT `ozellik_ibfk_1` FOREIGN KEY (`ilanID`) REFERENCES `ilan` (`ilanID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
