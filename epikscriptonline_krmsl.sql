-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost:3306
-- Üretim Zamanı: 29 Eki 2024, 23:50:24
-- Sunucu sürümü: 10.3.37-MariaDB
-- PHP Sürümü: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `epikscriptonline_krmsl`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `abone`
--

CREATE TABLE `abone` (
  `id` int(11) NOT NULL,
  `email` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `tarih` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `adi` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ayarlar`
--

CREATE TABLE `ayarlar` (
  `id` int(11) NOT NULL,
  `site_title` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `site_description` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `site_keyword` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `site_meta` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `site_author` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `logo` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `footer_logo` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `favicon` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `footer_copyright` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `renk` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `renk2` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `header` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `footer` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `p_renk1` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `p_renk2` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Tablo döküm verisi `ayarlar`
--

INSERT INTO `ayarlar` (`id`, `site_title`, `site_description`, `site_keyword`, `site_meta`, `site_author`, `logo`, `footer_logo`, `favicon`, `footer_copyright`, `renk`, `renk2`, `header`, `footer`, `p_renk1`, `p_renk2`) VALUES
(1, 'VDT33', 'VDT33', 'VDT33', NULL, 'VDT33', '172360909-vdt33.jpg', '812589240-vdt33.jpg', '851428020-vdt33.jpg', '© 2024  VDT33. Her hakkı saklıdır.', '#000000', '#000000', '', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `banka`
--

CREATE TABLE `banka` (
  `id` int(11) NOT NULL,
  `adi` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `sira` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `aciklama` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `linki` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `durum` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `resim` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `dil` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Tablo döküm verisi `banka`
--

INSERT INTO `banka` (`id`, `adi`, `sira`, `aciklama`, `linki`, `durum`, `resim`, `dil`) VALUES
(21, 'enpara', '1', '<ul>\r\n	<li><strong>Ad Soyad :</strong>&nbsp;UMUT TAMİRCİ</li>\r\n	<li><strong>Para Birimi :</strong>&nbsp;TL</li>\r\n	<li><strong>Hesap No :</strong>&nbsp;0000000000000</li>\r\n	<li><strong>IBAN :&nbsp;</strong>TR00000000000000000000</li>\r\n</ul>\r\n', '#', '0', '968-.png', 21),
(22, 'Papara', '2', '<ul>\r\n	<li><strong>Ad Soyad :</strong>&nbsp;UMUT TAMİRCİ</li>\r\n	<li><strong>Para Birimi :</strong>&nbsp;TL</li>\r\n	<li><strong>Hesap No :</strong>&nbsp;44444444444</li>\r\n	<li><strong>IBAN : TR</strong>44444444444444444444444</li>\r\n</ul>\r\n', '#', '0', '140-.png', 23);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `beadcrumb`
--

CREATE TABLE `beadcrumb` (
  `id` int(11) NOT NULL,
  `adi` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `resim` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `durum` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Tablo döküm verisi `beadcrumb`
--

INSERT INTO `beadcrumb` (`id`, `adi`, `resim`, `durum`) VALUES
(1, 'NEDEN BİZ', '811-neden-biz.webp', NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `blog_yorum`
--

CREATE TABLE `blog_yorum` (
  `id` int(11) NOT NULL,
  `yorum` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `uye` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `tarih` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `urun_id` int(11) DEFAULT NULL,
  `durum` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `email` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Tablo döküm verisi `blog_yorum`
--

INSERT INTO `blog_yorum` (`id`, `yorum`, `uye`, `tarih`, `urun_id`, `durum`, `email`) VALUES
(8, 'harika bir yazı', 'umut tamirci', '27.11.2022', 71, '0', 'umut@gmail.com'),
(9, 'harika bir yazı', '', '27.11.2022', 72, '0', 'umuttamirci37@gmail.com'),
(7, 'harika bir  yazı olmuş, teşekkürler', 'umut tamirci', '27.11.2022', 70, '0', 'umuttamirci@gmail.com'),
(10, 'harika bir yazı olmuş', 'umut tamirci', '19.12.2022', 77, '1', 'umut@gmail.com');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `bolge_kategori`
--

CREATE TABLE `bolge_kategori` (
  `id` int(11) NOT NULL,
  `adi` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `sira` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `resim` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `kategori` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `onaciklama` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `durum` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `aciklama` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `seo` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `tur` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `eklenme_tarihi` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `guncelleme_tarihi` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Tablo döküm verisi `bolge_kategori`
--

INSERT INTO `bolge_kategori` (`id`, `adi`, `sira`, `resim`, `kategori`, `onaciklama`, `durum`, `aciklama`, `seo`, `tur`, `eklenme_tarihi`, `guncelleme_tarihi`) VALUES
(1, 'Anadolu Yakası', '1', '679-.jpg', '0', '', 'on', '', 'anadolu-yakasi', 'bolge_kategori', '24.09.2021', '24.09.2021');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `bolge_yorum`
--

CREATE TABLE `bolge_yorum` (
  `id` int(11) NOT NULL,
  `adi` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `mesaj` text DEFAULT NULL,
  `bid` int(11) DEFAULT NULL,
  `durum` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `bolge_yorum`
--

INSERT INTO `bolge_yorum` (`id`, `adi`, `email`, `mesaj`, `bid`, `durum`) VALUES
(3, 'wqewqeqewq', 'demo@demo.com', 'wqewqewqeqwewqeq', 17, 0),
(4, 'test', 'demo@demo.com', 'Apple today named eight app and game developers receiving an Apple Design Award, each one selected for being thoughtful and creative. Apple Design Award winners bring distinctive new ideas to life and demonstrate deep mastery of Apple technology. The apps spring up from developers large and small, in every part of the world and provide users with new ways of working, creating, and playing.\r\n\r\n', 17, 0),
(5, 'test', 'demo@demo.com', 'Apple today named eight app and game developers receiving an Apple Design Award, each one selected for being thoughtful and creative. Apple Design Award winners bring distinctive new ideas to life and demonstrate deep mastery of Apple technology. The apps spring up from developers large and small, in every part of the world and provide users with new ways of working, creating, and playing.\r\n\r\n', 17, 1),
(6, 'test', 'demo@demo.com', 'Apple today named eight app and game developers receiving an Apple Design Award, each one selected for being thoughtful and creative. Apple Design Award winners bring distinctive new ideas to life and demonstrate deep mastery of Apple technology. The apps spring up from developers large and small, in every part of the world and provide users with new ways of working, creating, and playing.\r\n\r\n', 17, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `destek`
--

CREATE TABLE `destek` (
  `yid` int(11) DEFAULT NULL,
  `uye` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `konu` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `mesaj` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `tarih` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `cevap` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `id` int(11) NOT NULL,
  `ctarih` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Tablo döküm verisi `destek`
--

INSERT INTO `destek` (`yid`, `uye`, `konu`, `mesaj`, `tarih`, `cevap`, `id`, `ctarih`) VALUES
(NULL, '64', 'script aldım indirme linki bozuk', 'merhabalar pastane scriptini aldım ve indirme linki bozuk yardımcı olurmusunuz', '21.09.2022', ' link düzeltildi', 5, '21.09.2022');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `dil`
--

CREATE TABLE `dil` (
  `id` int(11) NOT NULL,
  `adi` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `sira` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `aciklama` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `linki` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `durum` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `resim` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `inceleyin` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `iletisim` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `tumunuokuyun` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `tumunugor` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `hizmetler` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `ekibimiz` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `projeler` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `tumu` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `sikcasorulansorular` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `istatikler` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `gonder` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `blog` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `yorumlar` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `banner` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `bizimle` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `medya` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `urunbilgileri` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `satinal` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `sepeteekle` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `sepetim` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `urunresmi` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `urunadi` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `urunadet` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `urunfiyat` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `islem` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `siparisbilgileri` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `siparisitamamla` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `bankahesaplari` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `referanslar` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `kataloglar` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `kurumsal` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `galeri` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `video` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `iletisimbilgileri` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `sosyalmedya` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `urunler` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `anasayfa` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `hizliiletisim` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `adsoyad` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `email` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `telefon` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `konu` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `mesaj` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `alan` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `anadil` int(11) DEFAULT NULL,
  `digerbloglar` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `etiketler` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `blogyorumlari` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `yorumatabilirsiniz` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `subeler` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `teklifal` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `kariyer` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `calismak` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `departman` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `muhasebe` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `satis` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `pazarlama` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `operasyon` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `onyazi` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `kariyer_aciklama` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `aboneol` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `ekipmanlar` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `fiyatteklif` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `hizliteklif` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `ozgecmis` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `abone_a` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `footer_h` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `neden` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `adres` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `digerhizmetler` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `v_baslik` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `v_link` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `a_madde` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `b_madde` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `c_madde` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `d_madde` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `resim1` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `resim2` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Tablo döküm verisi `dil`
--

INSERT INTO `dil` (`id`, `adi`, `sira`, `aciklama`, `linki`, `durum`, `resim`, `inceleyin`, `iletisim`, `tumunuokuyun`, `tumunugor`, `hizmetler`, `ekibimiz`, `projeler`, `tumu`, `sikcasorulansorular`, `istatikler`, `gonder`, `blog`, `yorumlar`, `banner`, `bizimle`, `medya`, `urunbilgileri`, `satinal`, `sepeteekle`, `sepetim`, `urunresmi`, `urunadi`, `urunadet`, `urunfiyat`, `islem`, `siparisbilgileri`, `siparisitamamla`, `bankahesaplari`, `referanslar`, `kataloglar`, `kurumsal`, `galeri`, `video`, `iletisimbilgileri`, `sosyalmedya`, `urunler`, `anasayfa`, `hizliiletisim`, `adsoyad`, `email`, `telefon`, `konu`, `mesaj`, `alan`, `anadil`, `digerbloglar`, `etiketler`, `blogyorumlari`, `yorumatabilirsiniz`, `subeler`, `teklifal`, `kariyer`, `calismak`, `departman`, `muhasebe`, `satis`, `pazarlama`, `operasyon`, `onyazi`, `kariyer_aciklama`, `aboneol`, `ekipmanlar`, `fiyatteklif`, `hizliteklif`, `ozgecmis`, `abone_a`, `footer_h`, `neden`, `adres`, `digerhizmetler`, `v_baslik`, `v_link`, `a_madde`, `b_madde`, `c_madde`, `d_madde`, `resim1`, `resim2`) VALUES
(21, 'TR', '1', NULL, NULL, '0', '25-.png', 'İnceleyin', 'İletişim', 'Tümünü Okuyun', 'Tümünü Gör', 'Hizmetler', 'Ekibimiz', 'Projeler', 'Tümü', 'Sıkça Sorulan Sorular', NULL, 'Gönder', 'Blog', 'Müşteri Yorumları', 'Yardıma mı ihtiyacın var?', 'Bizimle İletişime Geçebilirsiniz', 'Medya', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Banka Hesapları', 'Referanslar', 'Kataloglar', 'Kurumsal', 'Galeri', 'Video', 'İletişim Bilgileri', 'Sosyal Medya', 'Ürünler', 'Anasayfa', 'Hızlı İletişim', 'Ad soyad', 'Email', 'Telefon', 'Konu', 'Mesaj', 'Lütfen bütün alanları doldurun.', 0, 'Diğer Bloglar', 'Etiketler', 'Blog Yorumları', 'Yorum Atabilirsiniz', NULL, 'Teklif Al', NULL, 'Bizimle Çalışmak İster Misiniz?', NULL, NULL, NULL, NULL, NULL, NULL, '<p style=\"text-align:justify\">Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', 'Abone Ol', NULL, 'Fiyat Teklifi İste', 'Hızlı Teklif', NULL, 'Bildirimlerden Haberdar Olmak İçin Abone Olabilirsiniz', 'Buraya Kısa Bir Açıklama Metni Gelecek', 'Neden Bizi Seçmelisiniz?', 'Adres', 'Diğer Hizmetler', 'Tanıtım Videomuzu İzleyin', 'https://www.youtube.com/embed/XxrnEYGTDDY', 'It was popularised with release sheet containing passages.', 'It was popularised with release sheet containing passages.', 'It was popularised with release sheet containing passages.', 'It was popularised with release sheet containing passages.', '798-.jpg', '552-.jpg');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ekibimiz`
--

CREATE TABLE `ekibimiz` (
  `id` int(11) NOT NULL,
  `adi` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `sira` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `resim` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `kategori` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `onaciklama` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `durum` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `aciklama` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `seo` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `tur` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `eklenme_tarihi` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `guncelleme_tarihi` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `dil` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Tablo döküm verisi `ekibimiz`
--

INSERT INTO `ekibimiz` (`id`, `adi`, `sira`, `resim`, `kategori`, `onaciklama`, `durum`, `aciklama`, `seo`, `tur`, `eklenme_tarihi`, `guncelleme_tarihi`, `dil`) VALUES
(22, 'Fatih ', '1', '43-oliver.webp', NULL, 'CEO', '0', '<p>Fatih CEO, teknoloji ve dijitalleşme alanında &ouml;ne &ccedil;ıkan bir iş lideri veya girişimci olarak, işletmelerin dijital d&ouml;n&uuml;ş&uuml;m s&uuml;re&ccedil;lerini destekleyen yenilik&ccedil;i &ccedil;&ouml;z&uuml;mler geliştiren bir kişi olabilir. &Ccedil;oğu zaman yazılım geliştirme, veri analitiği veya e-ticaret gibi alanlarda uzmanlaşmış olan Fatih CEO, işletmelerin rekabet&ccedil;i kalmalarına yardımcı olmak i&ccedil;in stratejik danışmanlık hizmetleri sunar.</p>\r\n\r\n<p>Kendi girişimleri veya &ccedil;alıştığı şirketler aracılığıyla, iş s&uuml;re&ccedil;lerini optimize etmek, m&uuml;şteri deneyimini iyileştirmek ve s&uuml;rd&uuml;r&uuml;lebilir b&uuml;y&uuml;me sağlamak i&ccedil;in dijital teknolojilerin entegrasyonunu teşvik eder. Ayrıca, sekt&ouml;r trendlerini takip ederek, iş d&uuml;nyasına y&ouml;n veren yenilik&ccedil;i projeler geliştirmeye odaklanır.</p>\r\n', 'fatih', 'ekibimiz', '22.12.2022', '30.09.2024', NULL),
(29, 'Miray', '1', '538-amelia.webp', NULL, 'Proje Yönetimi', '0', '', 'miray', 'ekibimiz', '22.12.2022', '30.09.2024', NULL),
(30, 'Arzu', '1', '17-george.webp', NULL, 'Veri Analizi ve Yönetimi', '0', '', 'arzu', 'ekibimiz', '22.12.2022', '30.09.2024', NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `galeri`
--

CREATE TABLE `galeri` (
  `id` int(11) NOT NULL,
  `adi` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `sira` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `aciklama` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `linki` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `durum` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `resim` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `dil` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Tablo döküm verisi `galeri`
--

INSERT INTO `galeri` (`id`, `adi`, `sira`, `aciklama`, `linki`, `durum`, `resim`, `dil`) VALUES
(19, 'Galeri 2', '02', NULL, NULL, '0', '123-galeri-2.webp', NULL),
(25, 'Galeri 2', '02', NULL, NULL, '0', '437-galeri-2.webp', NULL),
(26, 'Galeri 2', '02', NULL, NULL, '0', '584-galeri-2.webp', NULL),
(27, 'Galeri 2', '02', NULL, NULL, '0', '423-galeri-2.webp', NULL),
(28, 'Galeri 2', '02', NULL, NULL, '0', '781-galeri-2.webp', NULL),
(29, 'Galeri 2', '02', NULL, NULL, '0', '425-galeri-2.webp', NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `haberler`
--

CREATE TABLE `haberler` (
  `id` int(11) NOT NULL,
  `adi` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `sira` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `resim` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `kategori` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `onaciklama` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `durum` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `aciklama` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `seo` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `tur` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `eklenme_tarihi` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `guncelleme_tarihi` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `hit` int(11) DEFAULT NULL,
  `dil` int(11) DEFAULT NULL,
  `etiket` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `title` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Tablo döküm verisi `haberler`
--

INSERT INTO `haberler` (`id`, `adi`, `sira`, `resim`, `kategori`, `onaciklama`, `durum`, `aciklama`, `seo`, `tur`, `eklenme_tarihi`, `guncelleme_tarihi`, `hit`, `dil`, `etiket`, `title`, `description`) VALUES
(77, 'TOGG\'un Yazılım Sorunlar', '1', '641-spor-salonuna-gidenler-icin-beslenme-ipuclari-ve-tavsiyeler.webp', NULL, 'TOGG\'un Yazılım Sorunları: Türkiye\'nin yerli otomobili TOGG, kullanıcıların sıkça dile getirdiği yazılımsal sorunlar nedeniyle eleştiriliyor. Yüz tanıma, mobil veri bağlantı sorunları gibi birçok teknik aksaklık gündeme geldi. Bu sorunların çözümüne yönelik atılacak somut adımlar hakkında bilgi talep ediliyo', '0', '<p><strong>TOGG&#39;un Yazılım Sorunları</strong>: T&uuml;rkiye&#39;nin yerli otomobili TOGG, kullanıcıların sık&ccedil;a dile getirdiği yazılımsal sorunlar nedeniyle eleştiriliyor. Y&uuml;z tanıma, mobil veri bağlantı sorunları gibi bir&ccedil;ok teknik aksaklık g&uuml;ndeme geldi. Bu sorunların &ccedil;&ouml;z&uuml;m&uuml;ne y&ouml;nelik atılacak somut adımlar hakkında bilgi talep ediliyo</p>\r\n', 'togg-un-yazilim-sorunlar', 'haberler', '14.12.2022', '30.09.2024', NULL, NULL, NULL, NULL, NULL),
(78, 'Gerçek Potansiyelinizi Ortaya Çıkarın', '2', '22-gercek-potansiyelinizi-ortaya-cikarin.webp', NULL, 'Bölgeyi ziyaret ediyorsanız veya antrenmana bir arkadaşınızı da getirmek istiyorsanız, günlük geçiş kartları ve misafir geçiş kartları sunuyoruz...', '0', '<p><strong>Spor salonu ekip &uuml;yelerimiz sadece fitness konusunda tutkulu değil, aynı zamanda spor salonumuzda topluluk duygusunu geliştirme konusunda da tutkulu. &Uuml;yelerin memnuniyetle karşılandıklarını, desteklendiklerini ve bağlantı kurduklarını hissettikleri sıcak ve kapsayıcı bir ortam yaratırlar. &Uuml;yelerimizi bir araya getiren, dostluğu, dost&ccedil;a rekabeti ve karşılıklı desteği teşvik eden grup etkinlikleri, yarışmalar ve etkinlikler d&uuml;zenlerler.</strong></p>\r\n\r\n<p><strong>Her bireyin farklı hedeflere, yeteneklere ve tercihlere sahip benzersiz olduğunu biliyoruz. Spor salonu ekip &uuml;yelerimiz, fitness yolculuğunuza kişiselleştirilmiş bir yaklaşım sağlama konusunda uzmandır. Hedeflerinizle uyumlu ve yaşam tarzınıza uygun olduklarından emin olmak i&ccedil;in antrenmanlarınızı ve programlarınızı dinlemeye, değerlendirmeye ve &ouml;zelleştirmeye zaman ayırırlar. Bu kişiselleştirilmiş ilgi, daha etkili ve &ouml;d&uuml;llendirici bir kondisyona olanak tanır</strong></p>\r\n', 'gercek-potansiyelinizi-ortaya-cikarin', 'haberler', '14.12.2022', '06.07.2024', NULL, NULL, NULL, NULL, NULL),
(79, 'OKX OS Lansmanı', '3', '757-ogrenciler-icin-indirimli-secenekler-sunun.webp', NULL, ' Kripto para borsası OKX, geliştiriciler için yeni bir işletim sistemi olan OKX OS\'i tanıttı. Bu sistem, geliştiricilerin merkezi olmayan uygulamalar (dApps) oluşturmasına olanak tanıyarak, kullanıcı deneyimini iyileştirmeyi ve işlem sürelerini kısaltmayı amaçlıyor​', '0', '<p><strong>OKX OS Lansmanı</strong>: Kripto para borsası OKX, geliştiriciler i&ccedil;in yeni bir işletim sistemi olan OKX OS&#39;i tanıttı. Bu sistem, geliştiricilerin merkezi olmayan uygulamalar (dApps) oluşturmasına olanak tanıyarak, kullanıcı deneyimini iyileştirmeyi ve işlem s&uuml;relerini kısaltmayı ama&ccedil;lıyor​</p>\r\n', 'okx-os-lansmani', 'haberler', '14.12.2022', '30.09.2024', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `hakkimizda`
--

CREATE TABLE `hakkimizda` (
  `id` int(11) NOT NULL,
  `adi` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `resim` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `durum` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `video` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `aciklama` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `footer` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Tablo döküm verisi `hakkimizda`
--

INSERT INTO `hakkimizda` (`id`, `adi`, `resim`, `durum`, `video`, `aciklama`, `footer`) VALUES
(1, 'NEDEN BİZ', '115-.jpg', NULL, 'https://www.youtube.com/watch?v=oUzhuC7qd-4', 'VDT33 yazılım dünyasında inovasyon ve mükemmeliyeti bir araya getiren, müşteri odaklı bir teknoloji firmasıdır. Kuruluşumuzdan bu yana, işletmelere özel yazılım çözümleri sunarak dijital dönüşümlerine katkıda bulunuyoruz. Amacımız, müşterilerimizin iş süreçlerini daha verimli hale getirerek onlara rekabet avantajı kazandırmak ve teknolojinin sunduğu fırsatları en iyi şekilde kullanmalarını sağlamaktır.\r\n\r\nSektördeki geniş bilgi birikimimiz ve tecrübemizle, her ölçekten işletme için yenilikçi, güvenilir ve sürdürülebilir yazılım çözümleri geliştiriyoruz. Ekibimiz, yazılım geliştirme, sistem entegrasyonu ve teknik destek hizmetlerinde uzman, dinamik bir kadrodan oluşmaktadır.\r\n\r\nMisyonumuz\r\n\r\nMüşterilerimizin ihtiyaçlarını anlayarak onlara en uygun, özelleştirilebilir yazılım çözümleri sunmak ve teknolojiyi kullanarak işletmelerin geleceğe güvenle adım atmalarını sağlamak.\r\n\r\nVizyonumuz\r\n\r\nDijital dönüşümün her adımında müşterilerimize rehberlik ederek, global yazılım pazarında öncü ve güvenilir bir çözüm sağlayıcı olmak.\r\n\r\nDeğerlerimiz\r\n\r\nİnovasyon: Sürekli olarak yeni teknolojileri takip ediyor ve yazılımlarımızı geliştirmek için kullanıyoruz.\r\nGüvenilirlik: Müşterilerimize her zaman güvenilir ve kaliteli hizmet sunma taahhüdü veriyoruz.\r\nMüşteri Odaklılık: İhtiyaçlara özel çözümler üreterek müşteri memnuniyetini ön planda tutuyoruz.\r\nSürekli Gelişim: Ekip olarak kendimizi ve süreçlerimizi sürekli geliştirerek sektördeki en iyi hizmeti sunmaya çalışıyoruz.\r\nBu tarz bir kurumsal yazı, firmanın profesyonelliğini ve müşterilere verdiği değeri vurgulayarak güven oluşturabilir.\r\n\r\n', 'VDT33 yazılım dünyasında inovasyon ve mükemmeliyeti bir araya getiren, müşteri odaklı bir teknoloji firmasıdır. Kuruluşumuzdan bu yana, işletmelere özel yazılım çözümleri sunarak dijital dönüşümlerine katkıda bulunuyoruz. Amacımız, müşterilerimizin iş süreçlerini daha verimli hale getirerek onlara rekabet avantajı kazandırmak ve teknolojinin sunduğu fırsatları en iyi şekilde kullanmalarını sağlamaktır.');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `hizmetbolgeleri`
--

CREATE TABLE `hizmetbolgeleri` (
  `id` int(11) NOT NULL,
  `adi` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `sira` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `resim` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `kategori` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `onaciklama` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `durum` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `aciklama` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `seo` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `tur` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `eklenme_tarihi` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `guncelleme_tarihi` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Tablo döküm verisi `hizmetbolgeleri`
--

INSERT INTO `hizmetbolgeleri` (`id`, `adi`, `sira`, `resim`, `kategori`, `onaciklama`, `durum`, `aciklama`, `seo`, `tur`, `eklenme_tarihi`, `guncelleme_tarihi`) VALUES
(17, 'Umut tamirci', '2', '694-.jpg', '1', 'There are many variations of passages of Lorem Ipsum available, but majority have suffered alteration.\r\n\r\n', 'on', '<p>Apple today named eight app and game developers receiving an Apple Design Award, each one selected for being thoughtful and creative. Apple Design Award winners bring distinctive new ideas to life and demonstrate deep mastery of Apple technology. The apps spring up from developers large and small, in every part of the world and provide users with new ways of working, creating, and playing.</p>\r\n', 'umut-tamirci', 'hizmetbolgeleri', '27.08.2021', '24.09.2021'),
(18, 'Photoshop', '3', '248-.jpg', '1', 'There are many variations of passages of Lorem Ipsum available, but majority have suffered alteration.\r\n\r\n', 'on', '<p>Apple today named eight app and game developers receiving an Apple Design Award, each one selected for being thoughtful and creative. Apple Design Award winners bring distinctive new ideas to life and demonstrate deep mastery of Apple technology. The apps spring up from developers large and small, in every part of the world and provide users with new ways of working, creating, and playing.</p>\r\n', 'photoshop', 'hizmetbolgeleri', '27.08.2021', '24.09.2021');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `hizmetler`
--

CREATE TABLE `hizmetler` (
  `id` int(11) NOT NULL,
  `adi` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `sira` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `resim` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `kategori` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `onaciklama` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `durum` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `aciklama` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `seo` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `tur` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `eklenme_tarihi` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `guncelleme_tarihi` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `hit` int(11) DEFAULT NULL,
  `dil` int(11) DEFAULT NULL,
  `title` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `etiket` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `icon` text CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Tablo döküm verisi `hizmetler`
--

INSERT INTO `hizmetler` (`id`, `adi`, `sira`, `resim`, `kategori`, `onaciklama`, `durum`, `aciklama`, `seo`, `tur`, `eklenme_tarihi`, `guncelleme_tarihi`, `hit`, `dil`, `title`, `description`, `etiket`, `icon`) VALUES
(30, 'Mobil', '01', '283-mobil-uygulamalar.webp', NULL, 'Mobil yazılım, akıllı telefonlar ve tabletler gibi mobil cihazlar için geliştirilen uygulama ve programları kapsar. İşletmelere, müşterileriyle daha doğrudan etkileşim kurma, verimliliği artırma ve hizmetlerini genişletme fırsatı sunar. İOS ve Android gibi popüler platformlar için özel ya da çapraz platform uygulamalar geliştirilebilir. Mobil yazılım çözümleri, e-ticaret, finans, sağlık ve eğitim gibi birçok sektörde büyük bir rol oynamaktadır.', '0', '<p>Mobil yazılım, akıllı telefonlar ve tabletler gibi mobil cihazlar i&ccedil;in geliştirilen uygulama ve programları kapsar. İşletmelere, m&uuml;şterileriyle daha doğrudan etkileşim kurma, verimliliği artırma ve hizmetlerini genişletme fırsatı sunar. İOS ve Android gibi pop&uuml;ler platformlar i&ccedil;in &ouml;zel ya da &ccedil;apraz platform uygulamalar geliştirilebilir. Mobil yazılım &ccedil;&ouml;z&uuml;mleri, e-ticaret, finans, sağlık ve eğitim gibi bir&ccedil;ok sekt&ouml;rde b&uuml;y&uuml;k bir rol oynamaktadır.</p>\r\n', 'mobil', 'hizmetler', '19.09.2022', '30.09.2024', NULL, 21, NULL, NULL, NULL, '182-.png'),
(41, 'Dijital ', '02', '989-dijital-pazarlama.webp', NULL, 'Dijital kavramı, teknolojinin hayatın her alanına entegrasyonu anlamına gelir ve dijital cihazlar, yazılımlar ve internet tabanlı çözümlerle etkileşimli bir dünyayı ifade eder. Dijitalleşme, iş süreçlerinden eğlenceye, iletişimden eğitim ve sağlık hizmetlerine kadar geniş bir yelpazede dijital teknolojilerin kullanılmasını sağlar. Özellikle iş dünyasında dijital dönüşüm, verimliliği artırmak, maliyetleri düşürmek ve müşteri deneyimini iyileştirmek için kritik bir rol oynamaktadır.Dijital teknolojiler, veri analitiği, yapay zeka, bulut bilişim ve mobil çözümlerle daha hızlı ve etkin çözümler sunar.', '0', '<p>Dijital kavramı, teknolojinin hayatın her alanına entegrasyonu anlamına gelir ve dijital cihazlar, yazılımlar ve internet tabanlı &ccedil;&ouml;z&uuml;mlerle etkileşimli bir d&uuml;nyayı ifade eder. Dijitalleşme, iş s&uuml;re&ccedil;lerinden eğlenceye, iletişimden eğitim ve sağlık hizmetlerine kadar geniş bir yelpazede dijital teknolojilerin kullanılmasını sağlar. &Ouml;zellikle iş d&uuml;nyasında dijital d&ouml;n&uuml;ş&uuml;m, verimliliği artırmak, maliyetleri d&uuml;ş&uuml;rmek ve m&uuml;şteri deneyimini iyileştirmek i&ccedil;in kritik bir rol oynamaktadır.Dijital teknolojiler, veri analitiği, yapay zeka, bulut bilişim ve mobil &ccedil;&ouml;z&uuml;mlerle daha hızlı ve etkin &ccedil;&ouml;z&uuml;mler sunar.</p>\r\n', 'dijital', 'hizmetler', '19.09.2022', '30.09.2024', NULL, 21, NULL, NULL, NULL, '945-.png'),
(43, 'Grafik     Tasarımı', '03', '855-grafik-tasarimi.webp', NULL, 'Grafik tasarım, görsel içerik oluşturma ve iletişim amacıyla metin, görseller ve semboller kullanarak estetik açıdan etkileyici tasarımlar yaratma sanatıdır. Reklamcılık, web tasarımı, sosyal medya, marka kimliği, baskı materyalleri ve dijital medya gibi birçok alanda kullanılır. Grafik tasarımcılar, yazılı ve görsel unsurları bir araya getirerek mesajları etkili ve yaratıcı bir şekilde iletmeyi hedefler.Renk, tipografi, şekil ve düzen gibi temel tasarım prensipleri, kullanıcı deneyimini iyileştirmek ve markaların kimliğini güçlendirmek için stratejik olarak kullanılır.', '0', '<p>Grafik tasarım, g&ouml;rsel i&ccedil;erik oluşturma ve iletişim amacıyla metin, g&ouml;rseller ve semboller kullanarak estetik a&ccedil;ıdan etkileyici tasarımlar yaratma sanatıdır. Reklamcılık, web tasarımı, sosyal medya, marka kimliği, baskı materyalleri ve dijital medya gibi bir&ccedil;ok alanda kullanılır. Grafik tasarımcılar, yazılı ve g&ouml;rsel unsurları bir araya getirerek mesajları etkili ve yaratıcı bir şekilde iletmeyi hedefler.Renk, tipografi, şekil ve d&uuml;zen gibi temel tasarım prensipleri, kullanıcı deneyimini iyileştirmek ve markaların kimliğini g&uuml;&ccedil;lendirmek i&ccedil;in stratejik olarak kullanılır.</p>\r\n', 'grafik-tasarimi', 'hizmetler', '19.09.2022', '30.09.2024', NULL, 21, NULL, NULL, NULL, '659-.png');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `iletisimbilgileri`
--

CREATE TABLE `iletisimbilgileri` (
  `id` int(11) NOT NULL,
  `telefon1` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `telefon2` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `email1` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `email2` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `adres1` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `adres2` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `google_maps` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `whatsapp` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `wp_text` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `wp_renk` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Tablo döküm verisi `iletisimbilgileri`
--

INSERT INTO `iletisimbilgileri` (`id`, `telefon1`, `telefon2`, `email1`, `email2`, `adres1`, `adres2`, `google_maps`, `whatsapp`, `wp_text`, `wp_renk`) VALUES
(1, '999-999', '999-999', 'demo@mail.com', 'demo@mail.com', 'İstanbul / Avrupa', 'İstanbul / Avrupa', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d192697.8885053183!2d28.84737262807287!3d41.00546324300305!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14caa7040068086b%3A0xe1ccfe98bc01b0d0!2zxLBzdGFuYnVs!5e0!3m2!1str!2str!4v1719128585767!5m2!1str!2str\" class=\"google-map__one\" allowfullscreen></iframe>', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `iletisimler`
--

CREATE TABLE `iletisimler` (
  `id` int(11) NOT NULL,
  `adsoyad` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `konu` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `telefon` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `email` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `mesaj` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `tarih` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Tablo döküm verisi `iletisimler`
--

INSERT INTO `iletisimler` (`id`, `adsoyad`, `konu`, `telefon`, `email`, `mesaj`, `tarih`) VALUES
(145, 'demo', NULL, NULL, NULL, 'demo', '08.08.2024'),
(144, 'asd', 'asdas', 'asd', 'demo@demo.com', 'asd', '08.08.2024'),
(137, 'deneme', 'deneme', '2323', 'demo@demo.com', 'asdsa', '02.08.2024'),
(138, '232', 'DENEM', 'deneme', 'demo@demo.com', '23', '05.08.2024'),
(140, 'asd', NULL, NULL, NULL, 'demo\r\n', '08.08.2024'),
(141, 'asd', NULL, NULL, NULL, 'demo\r\n', '08.08.2024'),
(142, 'asdas', NULL, NULL, NULL, 'dasd', '08.08.2024'),
(143, 'asdas', 'asdas', '2323', 'demo@demo.com', 'asd', '08.08.2024'),
(146, 'adsadsdsa', NULL, NULL, NULL, 'asdasfasf', '09.08.2024'),
(147, 'adsadsdsa', NULL, NULL, NULL, 'asdasfasf', '09.08.2024');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `istatik`
--

CREATE TABLE `istatik` (
  `id` int(11) NOT NULL,
  `adi` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `sira` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `aciklama` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `linki` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `durum` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `resim` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `dil` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Tablo döküm verisi `istatik`
--

INSERT INTO `istatik` (`id`, `adi`, `sira`, `aciklama`, `linki`, `durum`, `resim`, `dil`) VALUES
(8, 'Mutlu Müşteri', '1', '100', NULL, '0', '530-.png', NULL),
(9, 'Projeler', '2', '200', NULL, '0', '989-.png', NULL),
(10, 'Ödül', '3', '300', NULL, '0', '673-.png', NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `izinler`
--

CREATE TABLE `izinler` (
  `id` int(11) NOT NULL,
  `urun_durum` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `kategori_durum` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `istatik_durum` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `ref_durum` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `hizmet_durum` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `haber_durum` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `sayfa_durum` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `slider_durum` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `sss_durum` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `galeri_durum` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `video_durum` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `ekip_durum` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `yorum_durum` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `iletisim_durum` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `en` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `bresim_durum` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `siparis_durum` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `musteri_durum` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `destek_durum` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `onecikan_durum` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `banner_durum` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `paytr_durum` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `banka_durum` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `proje_durum` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `proje_kategori_durum` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `katalog_durum` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `sube_durum` int(11) DEFAULT NULL,
  `paket_durum` int(11) DEFAULT NULL,
  `modal_durum` int(11) DEFAULT NULL,
  `abone_durum` int(11) DEFAULT NULL,
  `paymax_durum` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `shopier_durum` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `netgsm_durum` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `iyzico_durum` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Tablo döküm verisi `izinler`
--

INSERT INTO `izinler` (`id`, `urun_durum`, `kategori_durum`, `istatik_durum`, `ref_durum`, `hizmet_durum`, `haber_durum`, `sayfa_durum`, `slider_durum`, `sss_durum`, `galeri_durum`, `video_durum`, `ekip_durum`, `yorum_durum`, `iletisim_durum`, `en`, `bresim_durum`, `siparis_durum`, `musteri_durum`, `destek_durum`, `onecikan_durum`, `banner_durum`, `paytr_durum`, `banka_durum`, `proje_durum`, `proje_kategori_durum`, `katalog_durum`, `sube_durum`, `paket_durum`, `modal_durum`, `abone_durum`, `paymax_durum`, `shopier_durum`, `netgsm_durum`, `iyzico_durum`) VALUES
(1, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, 0, 0, 0, '0', '0', '0', '0');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `katalog`
--

CREATE TABLE `katalog` (
  `id` int(11) NOT NULL,
  `adi` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `sira` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `aciklama` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `linki` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `durum` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `resim` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `pdf` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `dil` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Tablo döküm verisi `katalog`
--

INSERT INTO `katalog` (`id`, `adi`, `sira`, `aciklama`, `linki`, `durum`, `resim`, `pdf`, `dil`) VALUES
(21, 'Katalog 1', '1', '', '#', '0', '419-.jpg', '90-.pdf', NULL),
(22, 'Katalog 2', '2', '', '#', '0', '5-.jpg', '450-.pdf', NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `mail`
--

CREATE TABLE `mail` (
  `id` int(11) NOT NULL,
  `site_mail` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `site_mail_sifre` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `site_mail_host` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `site_mail_port` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `gonderen_mail` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Tablo döküm verisi `mail`
--

INSERT INTO `mail` (`id`, `site_mail`, `site_mail_sifre`, `site_mail_host`, `site_mail_port`, `gonderen_mail`) VALUES
(1, '#', '#', '#', '#', '#');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `mail_dogrula`
--

CREATE TABLE `mail_dogrula` (
  `id` int(11) NOT NULL,
  `email` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `kod` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `durum` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Tablo döküm verisi `mail_dogrula`
--

INSERT INTO `mail_dogrula` (`id`, `email`, `kod`, `durum`) VALUES
(1, 'hilelicocuk5@gmail.com', '3614681', '0'),
(2, 'hilelicocuk5@gmail.com', '3268034', '1'),
(3, 'hilelicocuk5@gmail.com', '2660658', '1'),
(4, 'gfddfgf@hgfhfghfghfgh.com', '1943492', '1'),
(5, 'asdasas@gasd.com', '278121', '1'),
(6, 'hilelicocuk5@gmail.com', '3282518', '0'),
(7, 'info.ugurcm@gmail.com', '2564768', '0'),
(8, 'umutcanva@gmail.com', '3077226', '1'),
(9, 'gbozbuga', '1309054', '1'),
(10, 'gbozbuga@gmail.com', '854931', '0'),
(11, 'ozarpamehmetakif42@gmail.com', '695421', '1'),
(12, 'klarendon1@gmail.com', '1241274', '0'),
(13, 'mutaokut4774@gmail.com', '3618813', '1'),
(14, 'mutaokut@gmail.com', '1880339', '1'),
(15, 'sungurbeyy97@gmail.com', '2013649', '0'),
(16, 'fakenomemo@gmail.com', '2237392', '1'),
(17, 'Ahmetdemir50125012@gmail.com', '1310092', '0'),
(18, 'test.1234@gmail.com', '751794', '1'),
(19, 'asda@dsad.com', '3313542', '1'),
(20, 'n0th1ng@rape.lol', '2982932', '1'),
(21, 'p3rd1t10n@protonmail.com', '3880559', '1'),
(22, 'fdasfasdas@gmail.com', '1591638', '1'),
(23, 'addndata@gmail.com', '2713732', '0'),
(24, 'adobestockhesab52@gmail.com', '2709960', '0'),
(25, 'hakanuralss@gmail.com', '870857', '1'),
(26, 'enesakcaren@gmail.com', '3659674', '1'),
(27, 'omerryuksel63@gmail.com', '1714378', '0'),
(28, 'mehmetmasa123@gmail.com', '3499543', '0'),
(29, 'roxgrup@gmail.com', '3503463', '0'),
(30, 'cresitc@gmail.com', '1321429', '1'),
(31, 'apocalipsee@hotmail.com', '3807425', '0'),
(32, 'aaa@gmail.com', '1273300', '1'),
(33, 'xxx@gmail.com', '339070', '1'),
(34, 'enes.kucuktas@edittasarim.com', '2539931', '1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `adi` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `sira` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `url` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `durum` int(11) DEFAULT NULL,
  `acilir` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `kategori` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `sekme` int(11) DEFAULT NULL,
  `footer` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Tablo döküm verisi `menu`
--

INSERT INTO `menu` (`id`, `adi`, `sira`, `url`, `durum`, `acilir`, `kategori`, `sekme`, `footer`) VALUES
(1, 'Anasayfa', '01', './', 0, '1', '0', 0, 0),
(2, 'Kurumsal', '02', '#', 0, '0', '0', 0, 0),
(42, 'Galeri', '07', 'galeri', 1, '1', '0', 0, 0),
(43, 'Projeler', '05', 'projeler', 0, '1', '0', 0, 0),
(15, 'Hakkımızda', '01', 'hakkimizda', 0, '1', '2', 0, 0),
(16, 'Haberler', '04', 'blog', 0, '0', '0', 0, 0),
(23, 'Tüm Haberler', '01', 'blog', 0, '1', '16', 0, 0),
(24, 'S.S.S', '06', 'sss', 0, '1', '2', 0, 0),
(26, 'Hakkımızda', '01', 'hakkimizda', 0, '1', '0', 0, 1),
(27, 'İletişim', '02', 'iletisim', 0, '0', '0', 0, 1),
(29, 'Hizmetler', '04', 'hizmetler', 0, '0', '0', 0, 0),
(31, 'Tüm Hizmetler', '02', 'hizmetler', 0, '0', '29', 0, 0),
(41, 'Ekibimiz', '06', 'ekibimiz', 0, '1', '0', 0, 0),
(35, 'Video', '05', 'video', 0, '0', '21', 0, 0),
(36, 'Ürünlerimiz', '09', 'urunler', 1, '0', '0', 0, 0),
(39, 'Tüm Ürünler', '01', 'urunler', 0, '0', '36', 0, 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `modal`
--

CREATE TABLE `modal` (
  `id` int(11) NOT NULL,
  `adi` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `resim` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `durum` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Tablo döküm verisi `modal`
--

INSERT INTO `modal` (`id`, `adi`, `resim`, `durum`) VALUES
(1, '       ', '794-modal.webp', '0');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `netgsm`
--

CREATE TABLE `netgsm` (
  `id` int(11) NOT NULL,
  `no` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `sifre` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `gonderici` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `mesaj` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `durum` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Tablo döküm verisi `netgsm`
--

INSERT INTO `netgsm` (`id`, `no`, `sifre`, `gonderici`, `mesaj`, `durum`) VALUES
(1, '', '', '', 'Tema başarıyla satın alındı, hesabım bölümünden indirebilirsiniz.', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `odeme_secenek`
--

CREATE TABLE `odeme_secenek` (
  `id` int(11) NOT NULL,
  `tur` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Tablo döküm verisi `odeme_secenek`
--

INSERT INTO `odeme_secenek` (`id`, `tur`) VALUES
(1, 'paymax');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `onecikan`
--

CREATE TABLE `onecikan` (
  `id` int(11) NOT NULL,
  `urunler` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Tablo döküm verisi `onecikan`
--

INSERT INTO `onecikan` (`id`, `urunler`) VALUES
(1, '117,116,115,111');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ozellik`
--

CREATE TABLE `ozellik` (
  `id` int(11) NOT NULL,
  `adi` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `sira` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `aciklama` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `linki` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `durum` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `resim` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `dil` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Tablo döküm verisi `ozellik`
--

INSERT INTO `ozellik` (`id`, `adi`, `sira`, `aciklama`, `linki`, `durum`, `resim`, `dil`) VALUES
(8, 'Projeler ', 'flaticon-employee', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s stan.', NULL, '0', '26-.jpg', NULL),
(14, 'Yıllık Başarı Oranı', '	fas fa-archive', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s stan.', NULL, '0', '739-.png', NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `paketler`
--

CREATE TABLE `paketler` (
  `id` int(11) NOT NULL,
  `adi` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `sira` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `resim` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `kategori` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `onaciklama` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `durum` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `aciklama` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `seo` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `tur` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `eklenme_tarihi` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `guncelleme_tarihi` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `fiyat` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `linki` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `videolinki` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `hit` int(11) DEFAULT NULL,
  `panel` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `indir` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `stok` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `dil` int(11) DEFAULT NULL,
  `kur` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Tablo döküm verisi `paketler`
--

INSERT INTO `paketler` (`id`, `adi`, `sira`, `resim`, `kategori`, `onaciklama`, `durum`, `aciklama`, `seo`, `tur`, `eklenme_tarihi`, `guncelleme_tarihi`, `fiyat`, `linki`, `videolinki`, `hit`, `panel`, `indir`, `stok`, `dil`, `kur`) VALUES
(111, 'Neden bizi seçmelisiniz?', '$899.99', '641-neden-bizi-secmelisiniz.webp', NULL, 'Hayvan severlerden oluşan özel ekibimiz, sağlığı garanti altına almak için en üst kalitede bakım ve kişiye özel ilgi sağlamaya kendini adamıştır.', '0', '<p>✅12 eğitim</p>\r\n\r\n<p>✅&Uuml;cretsiz duş ve kilitli dolaplar</p>\r\n\r\n<p>✅Kişisel yoga matı</p>\r\n\r\n<p>✅&Uuml;cretsiz park</p>\r\n', 'neden-bizi-secmelisiniz', 'paketler', '27.08.2022', '14.07.2024', '$599.99', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `panel`
--

CREATE TABLE `panel` (
  `id` int(11) NOT NULL,
  `p_renk1` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `p_renk2` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Tablo döküm verisi `panel`
--

INSERT INTO `panel` (`id`, `p_renk1`, `p_renk2`) VALUES
(1, '#b30000', '#02000a');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `paymax`
--

CREATE TABLE `paymax` (
  `id` int(11) NOT NULL,
  `api_user` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `api_key` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `api_magaza` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `api_hash` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Tablo döküm verisi `paymax`
--

INSERT INTO `paymax` (`id`, `api_user`, `api_key`, `api_magaza`, `api_hash`) VALUES
(1, '', '', '', '');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `paytr`
--

CREATE TABLE `paytr` (
  `id` int(11) NOT NULL,
  `merchand_id` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `merchand_key` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `merchand_salt` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Tablo döküm verisi `paytr`
--

INSERT INTO `paytr` (`id`, `merchand_id`, `merchand_key`, `merchand_salt`) VALUES
(1, '', '', '');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `projeler`
--

CREATE TABLE `projeler` (
  `id` int(11) NOT NULL,
  `adi` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `sira` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `resim` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `kategori` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `onaciklama` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `durum` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `aciklama` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `seo` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `tur` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `eklenme_tarihi` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `guncelleme_tarihi` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `fiyat` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `linki` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `videolinki` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `hit` int(11) DEFAULT NULL,
  `panel` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `indir` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `stok` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `dil` int(11) DEFAULT NULL,
  `title` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `etiket` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Tablo döküm verisi `projeler`
--

INSERT INTO `projeler` (`id`, `adi`, `sira`, `resim`, `kategori`, `onaciklama`, `durum`, `aciklama`, `seo`, `tur`, `eklenme_tarihi`, `guncelleme_tarihi`, `fiyat`, `linki`, `videolinki`, `hit`, `panel`, `indir`, `stok`, `dil`, `title`, `etiket`, `description`) VALUES
(131, ' Görev ve proje', '1', '312-crossfit-boks-yarismasi.webp', NULL, ' Görev ve proje yönetimi yazılımı', '0', '<p>G&ouml;rev ve proje y&ouml;netimi yazılımı, ekiplerin iş akışlarını daha verimli bir şekilde organize etmesine ve projeleri planlamasına yardımcı olan bir dijital ara&ccedil;tır. Bu yazılımlar, g&ouml;revlerin atanması, s&uuml;relerin belirlenmesi, ilerlemenin izlenmesi ve ekip i&ccedil;i iletişimin kolaylaştırılması gibi işlevler sunar. İşbirliğini artırarak projelerin zamanında ve b&uuml;t&ccedil;eye uygun şekilde tamamlanmasına katkı sağlar. &Ouml;rnek &ouml;zellikler arasında takvim entegrasyonu, Gantt şemaları, dosya paylaşımı ve anlık bildirimler bulunur. &Ouml;zellikle uzaktan &ccedil;alışma ve &ccedil;ok sayıda ekip &uuml;yesi i&ccedil;eren projelerde iş y&ouml;netimini kolaylaştırır.</p>\r\n', 'gorev-ve-proje', 'projeler', '18.06.2024', '30.09.2024', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(132, ' Sağlık sektörü', '1', '756-crossfit-boks-yarismasi.webp', NULL, ' Sağlık sektörü için hasta takip ve randevu yönetim yazılımı', '0', '<p>Sağlık sekt&ouml;r&uuml; i&ccedil;in hasta takip ve randevu y&ouml;netim yazılımı, kliniklerin, hastanelerin ve sağlık profesyonellerinin hasta verilerini daha etkin bir şekilde y&ouml;netmelerine olanak tanıyan bir dijital &ccedil;&ouml;z&uuml;md&uuml;r. Bu yazılım, hasta kayıtlarının dijital olarak saklanmasını, tıbbi ge&ccedil;mişin izlenmesini, randevuların planlanmasını ve doktor-hasta arasındaki iletişimin kolaylaştırılmasını sağlar.</p>\r\n\r\n<p>Temel &ouml;zellikler arasında hastanın tıbbi ge&ccedil;mişi, tedavi planları, laboratuvar sonu&ccedil;ları ve re&ccedil;eteler gibi bilgilerin g&uuml;venli bir şekilde kaydedilmesi yer alır. Aynı zamanda online randevu rezervasyonu, hatırlatma bildirimleri ve sağlık personeli arasındaki iş birliğini artırıcı &ouml;zellikler sunar. Bu yazılım, sağlık hizmetlerini daha verimli hale getirerek hasta memnuniyetini artırırken, insan hatalarını da en aza indirir.</p>\r\n', 'saglik-sektoru', 'projeler', '18.06.2024', '30.09.2024', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(133, ' Restoranlar ', '1', '500-crossfit-boks-yarismasi.webp', NULL, ' Restoranlar için online sipariş ve rezervasyon yazılımı', '0', '<p>Restoranlar i&ccedil;in online sipariş ve rezervasyon yazılımı, restoranların m&uuml;şterilerine dijital platformlar &uuml;zerinden kolay ve hızlı bir şekilde sipariş verme ve rezervasyon yapma imkanı sunan bir &ccedil;&ouml;z&uuml;md&uuml;r. Bu yazılım, restoranların hem fiziksel hem de online s&uuml;re&ccedil;lerini y&ouml;netmelerine yardımcı olur. M&uuml;şteriler, mobil uygulama veya web sitesi &uuml;zerinden men&uuml;y&uuml; inceleyebilir, sipariş verebilir ve &ouml;deme yapabilirler. Aynı zamanda, restoranın m&uuml;saitlik durumuna g&ouml;re masa rezervasyonu yapabilirler.</p>\r\n\r\n<p>Yazılım, sipariş ve rezervasyon s&uuml;re&ccedil;lerini otomatikleştirerek işletmenin verimliliğini artırır, m&uuml;şteri memnuniyetini geliştirir ve manuel hataları en aza indirir. Ayrıca, m&uuml;şteri tercihlerini takip etme, sadakat programları oluşturma ve geri bildirim toplama gibi &ouml;zelliklerle işletmelerin m&uuml;şteri ilişkilerini g&uuml;&ccedil;lendirmesine olanak tanır.</p>\r\n', 'restoranlar', 'projeler', '18.06.2024', '30.09.2024', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(135, 'Akıllı ev sistemleri', '1', '881-crossfit-boks-yarismasi.webp', NULL, 'Akıllı ev sistemleri yönetimi için mobil uygulama', '0', '<p>Akıllı ev sistemleri y&ouml;netimi i&ccedil;in mobil uygulama, kullanıcıların evlerindeki bağlı cihazları uzaktan kontrol etmelerini ve izlemelerini sağlayan bir yazılım &ccedil;&ouml;z&uuml;m&uuml;d&uuml;r. Bu uygulama, akıllı ev cihazlarıyla (aydınlatma, g&uuml;venlik kameraları, termostatlar, kapı kilitleri, ses sistemleri vb.) entegre &ccedil;alışarak kullanıcılara evlerinin t&uuml;m y&ouml;netimini mobil cihazlarından yapma imkanı sunar.</p>\r\n\r\n<p>Uygulama aracılığıyla kullanıcılar ışıkları a&ccedil;ıp kapatabilir, ısıtma ve soğutma sistemlerini ayarlayabilir, kapılarını kilitleyebilir veya g&uuml;venlik kameralarını izleyebilir. Ayrıca, &ouml;nceden belirlenmiş zamanlamalar veya sens&ouml;rlerden alınan verilere g&ouml;re otomatik senaryolar oluşturabilirler (&ouml;rneğin, eve girerken ışıkların otomatik a&ccedil;ılması).</p>\r\n\r\n<p>Bu yazılım, enerji verimliliğini artırır, g&uuml;venliği sağlar ve kullanıcıların yaşam konforunu artırır. Ayrıca, uzaktan erişim ve anlık bildirimler sayesinde evde olup biten her şeyden haberdar olunmasını sağlar.</p>\r\n', 'akilli-ev-sistemleri', 'projeler', '18.06.2024', '30.09.2024', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `proje_kategori`
--

CREATE TABLE `proje_kategori` (
  `id` int(11) NOT NULL,
  `adi` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `sira` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `resim` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `kategori` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `onaciklama` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `durum` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `aciklama` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `seo` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `tur` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `eklenme_tarihi` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `guncelleme_tarihi` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `hit` int(11) DEFAULT NULL,
  `dil` int(11) DEFAULT NULL,
  `aciklama2` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `resim2` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `title` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `etiket` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Tablo döküm verisi `proje_kategori`
--

INSERT INTO `proje_kategori` (`id`, `adi`, `sira`, `resim`, `kategori`, `onaciklama`, `durum`, `aciklama`, `seo`, `tur`, `eklenme_tarihi`, `guncelleme_tarihi`, `hit`, `dil`, `aciklama2`, `resim2`, `title`, `etiket`, `description`) VALUES
(32, 'Proje Kategori 1', '1', '478-proje-kategori-1.jpg', '0', NULL, '0', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', 'proje-kategori-1', 'proje_kategori', '22.12.2022', '22.12.2022', NULL, 21, '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', 'resim-yok', NULL, NULL, NULL),
(33, 'Proje Kategori 2', '2', '954-proje-kategori-2.jpg', '0', NULL, '0', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', 'proje-kategori-2', 'proje_kategori', '22.12.2022', '22.12.2022', NULL, 21, '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', 'resim-yok', NULL, NULL, NULL),
(34, 'Proje Kategori 3 ', '3', '129-proje-kategori-3.jpg', '0', NULL, '0', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', 'proje-kategori-3', 'proje_kategori', '22.12.2022', '22.12.2022', NULL, 21, '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', 'resim-yok', NULL, NULL, NULL),
(35, 'Proje Kategori 4', '4', '690-proje-kategori-4.jpg', '0', NULL, '0', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', 'proje-kategori-4', 'proje_kategori', '22.12.2022', '22.12.2022', NULL, 21, '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', 'resim-yok', NULL, NULL, NULL),
(36, 'Proje Kategori 5', '5', '8039108-proje-kategori-5.jpg', '0', NULL, '0', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', 'proje-kategori-5', 'proje_kategori', '22.12.2022', NULL, NULL, 21, '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', 'resim-yok', NULL, NULL, NULL),
(37, 'Proje Kategori 6', '6', '13319-proje-kategori-6.jpg', '0', NULL, '0', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', 'proje-kategori-6', 'proje_kategori', '22.12.2022', NULL, NULL, 21, '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', 'resim-yok', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `rapor`
--

CREATE TABLE `rapor` (
  `id` int(11) NOT NULL,
  `mesaj` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `urun` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `tarih` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Tablo döküm verisi `rapor`
--

INSERT INTO `rapor` (`id`, `mesaj`, `urun`, `tarih`) VALUES
(1, 'sitenin demosu çalışmıyor.', 'Teknoloji Scripti V2', '13.07.2022'),
(2, 'Demo Sürümü Çalışmıyor.\r\n', 'Kamera Sistemleri Scripti V1', '27.07.2022'),
(3, '', 'Eticaret Scripti 12 (Mağaza Açma)', '28.07.2022'),
(4, '', 'Kişisel Script V8', '07.08.2022'),
(5, 'yönetim panelleri çalışmıyor.', 'Nakliye Scripti V5', '12.08.2022');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `referanslar`
--

CREATE TABLE `referanslar` (
  `id` int(11) NOT NULL,
  `adi` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `sira` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `aciklama` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `linki` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `durum` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `resim` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `dil` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `rezervasyon`
--

CREATE TABLE `rezervasyon` (
  `id` int(11) NOT NULL,
  `adsoyad` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `konu` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `telefon` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `email` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `adet` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `mesaj` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `tarih` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `saat` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `date` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sayfalar`
--

CREATE TABLE `sayfalar` (
  `id` int(11) NOT NULL,
  `adi` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `sira` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `resim` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `kategori` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `onaciklama` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `durum` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `aciklama` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `seo` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `tur` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `eklenme_tarihi` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `guncelleme_tarihi` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `hit` int(11) DEFAULT NULL,
  `dil` int(11) DEFAULT NULL,
  `title` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `etiket` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Tablo döküm verisi `sayfalar`
--

INSERT INTO `sayfalar` (`id`, `adi`, `sira`, `resim`, `kategori`, `onaciklama`, `durum`, `aciklama`, `seo`, `tur`, `eklenme_tarihi`, `guncelleme_tarihi`, `hit`, `dil`, `title`, `description`, `etiket`) VALUES
(9, 'Hakkımızda', '1', '857-hakkimizda.webp', NULL, 'yazılım dünyasında inovasyon ve mükemmeliyeti bir araya getiren, müşteri odaklı bir teknoloji firmasıdır. Kuruluşumuzdan bu yana, işletmelere özel yazılım çözümleri sunarak dijital dönüşümlerine katkıda bulunuyoruz. Amacımız, müşterilerimizin iş süreçlerini daha verimli hale getirerek onlara rekabet avantajı kazandırmak ve teknolojinin sunduğu fırsatları en iyi şekilde kullanmalarını sağlamaktır.', '0', '<p>yazılım d&uuml;nyasında inovasyon ve m&uuml;kemmeliyeti bir araya getiren, m&uuml;şteri odaklı bir teknoloji firmasıdır. Kuruluşumuzdan bu yana, işletmelere &ouml;zel yazılım &ccedil;&ouml;z&uuml;mleri sunarak dijital d&ouml;n&uuml;ş&uuml;mlerine katkıda bulunuyoruz. Amacımız, m&uuml;şterilerimizin iş s&uuml;re&ccedil;lerini daha verimli hale getirerek onlara rekabet avantajı kazandırmak ve teknolojinin sunduğu fırsatları en iyi şekilde kullanmalarını sağlamaktır.</p>\r\n\r\n<p>Sekt&ouml;rdeki geniş bilgi birikimimiz ve tecr&uuml;bemizle, her &ouml;l&ccedil;ekten işletme i&ccedil;in yenilik&ccedil;i, g&uuml;venilir ve s&uuml;rd&uuml;r&uuml;lebilir yazılım &ccedil;&ouml;z&uuml;mleri geliştiriyoruz. Ekibimiz, yazılım geliştirme, sistem entegrasyonu ve teknik destek hizmetlerinde uzman, dinamik bir kadrodan oluşmaktadır.</p>\r\n\r\n<p><strong>Misyonumuz</strong></p>\r\n\r\n<p>M&uuml;şterilerimizin ihtiya&ccedil;larını anlayarak onlara en uygun, &ouml;zelleştirilebilir yazılım &ccedil;&ouml;z&uuml;mleri sunmak ve teknolojiyi kullanarak işletmelerin geleceğe g&uuml;venle adım atmalarını sağlamak.</p>\r\n\r\n<p><strong>Vizyonumuz</strong></p>\r\n\r\n<p>Dijital d&ouml;n&uuml;ş&uuml;m&uuml;n her adımında m&uuml;şterilerimize rehberlik ederek, global yazılım pazarında &ouml;nc&uuml; ve g&uuml;venilir bir &ccedil;&ouml;z&uuml;m sağlayıcı olmak.</p>\r\n\r\n<p><strong>Değerlerimiz</strong></p>\r\n\r\n<ul>\r\n	<li><strong>İnovasyon:</strong> S&uuml;rekli olarak yeni teknolojileri takip ediyor ve yazılımlarımızı geliştirmek i&ccedil;in kullanıyoruz.</li>\r\n	<li><strong>G&uuml;venilirlik:</strong> M&uuml;şterilerimize her zaman g&uuml;venilir ve kaliteli hizmet sunma taahh&uuml;d&uuml; veriyoruz.</li>\r\n	<li><strong>M&uuml;şteri Odaklılık:</strong> İhtiya&ccedil;lara &ouml;zel &ccedil;&ouml;z&uuml;mler &uuml;reterek m&uuml;şteri memnuniyetini &ouml;n planda tutuyoruz.</li>\r\n	<li><strong>S&uuml;rekli Gelişim:</strong> Ekip olarak kendimizi ve s&uuml;re&ccedil;lerimizi s&uuml;rekli geliştirerek sekt&ouml;rdeki en iyi hizmeti sunmaya &ccedil;alışıyoruz.</li>\r\n</ul>\r\n\r\n<hr />\r\n<p>Bu tarz bir kurumsal yazı, firmanın profesyonelliğini ve m&uuml;şterilere verdiği değeri vurgulayarak g&uuml;ven oluşturabilir.</p>\r\n', 'hakkimizda', 'sayfalar', '15.07.2021', '30.09.2024', 3517, 21, NULL, NULL, NULL),
(18, 'KVKK', '02', '824-kvkk.webp', NULL, '  Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '0', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', 'kvkk', 'sayfalar', '19.09.2022', '23.06.2024', NULL, 21, NULL, NULL, NULL),
(20, 'Biz Kimiz?', '3', '534-biz-kimiz.webp', NULL, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n', '0', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', 'biz-kimiz', 'sayfalar', '22.12.2022', '23.06.2024', NULL, 21, NULL, NULL, NULL),
(24, 'Gizlilik Politikası', '01', 'resim-yok', NULL, 'Gizlilik Politikası', '0', '<p>Gizlilik Politikası</p>\r\n', 'gizlilik-politikasi', 'sayfalar', '19.07.2024', NULL, NULL, NULL, NULL, NULL, NULL),
(25, 'Kullanım Şartları', '01', 'resim-yok', NULL, 'Kullanım Şartları', '0', '<p>Kullanım Şartları</p>\r\n', 'kullanim-sartlari', 'sayfalar', '19.07.2024', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sepet`
--

CREATE TABLE `sepet` (
  `id` int(11) NOT NULL,
  `urun_id` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `ip` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `tarih` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `uye` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `fiyat` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `adet` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Tablo döküm verisi `sepet`
--

INSERT INTO `sepet` (`id`, `urun_id`, `ip`, `tarih`, `uye`, `fiyat`, `adet`) VALUES
(263, '111', '31.223.58.11', NULL, NULL, '249', 1),
(262, '116', '176.88.120.243', NULL, NULL, '450', 1),
(261, '117', '176.235.166.218', NULL, NULL, '450', 1),
(260, '117', '176.235.166.218', NULL, NULL, '450', 1),
(259, '111', '176.88.120.243', NULL, NULL, '249', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `shopier`
--

CREATE TABLE `shopier` (
  `id` int(11) NOT NULL,
  `kullanici` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `sifre` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Tablo döküm verisi `shopier`
--

INSERT INTO `shopier` (`id`, `kullanici`, `sifre`) VALUES
(1, '', '');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `siparisler`
--

CREATE TABLE `siparisler` (
  `id` int(11) NOT NULL,
  `tarih` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `urun` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `eposta` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `telefon` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `adsoyad` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `durum` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `fiyat` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `uye` int(11) DEFAULT NULL,
  `paytr` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `sepetid` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `adres` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Tablo döküm verisi `siparisler`
--

INSERT INTO `siparisler` (`id`, `tarih`, `urun`, `eposta`, `telefon`, `adsoyad`, `durum`, `fiyat`, `uye`, `paytr`, `sepetid`, `adres`) VALUES
(146, '19.09.2022', '111', 'umuttamirci37@gmail.com', '052312312', 'umut tamirci', '1', '249', 64, '931285184', '251', NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `adi` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `sira` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `aciklama` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `linki` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `durum` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `resim` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `dil` int(11) DEFAULT NULL,
  `icon` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Tablo döküm verisi `slider`
--

INSERT INTO `slider` (`id`, `adi`, `sira`, `aciklama`, `linki`, `durum`, `resim`, `dil`, `icon`) VALUES
(19, 'VDT33', '02', 'Dijital Geleceğinizi Şekillendirin\r\nYenilikçi yazılım çözümleriyle işletmenizi bir adım öne taşıyın. Güvenilir, hızlı ve esnek yazılım sistemleriyle iş süreçlerinizi optimize edin.\r\n\r\nÖzel Yazılım Çözümleri\r\nİhtiyaçlarınıza özel tasarlanmış yazılım çözümlerimizle verimliliği artırın ve rekabette öne çıkın.\r\n\r\nDijital Dönüşüm Başlasın!\r\nEndüstri lideri teknolojilerle dijital dönüşümünüzü hızlandırın ve geleceğe hazır olun.\r\n\r\n', 'iletisim', '0', '624-evcil-hayvan.webp', NULL, 'resim-yok'),
(24, 'VDT33', '01', 'Dijital Geleceğinizi Şekillendirin\r\nYenilikçi yazılım çözümleriyle işletmenizi bir adım öne taşıyın. Güvenilir, hızlı ve esnek yazılım sistemleriyle iş süreçlerinizi optimize edin.\r\n\r\nÖzel Yazılım Çözümleri\r\nİhtiyaçlarınıza özel tasarlanmış yazılım çözümlerimizle verimliliği artırın ve rekabette öne çıkın.\r\n\r\nDijital Dönüşüm Başlasın!\r\nEndüstri lideri teknolojilerle dijital dönüşümünüzü hızlandırın ve geleceğe hazır olun.\r\n\r\n', '23', '0', '338-evcil-hayvan.webp', NULL, 'resim-yok');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `son_islem`
--

CREATE TABLE `son_islem` (
  `id` int(11) NOT NULL,
  `sayfa` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `ip` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `saat` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sosyalmedya`
--

CREATE TABLE `sosyalmedya` (
  `id` int(11) NOT NULL,
  `instagram` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `facebook` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `youtube` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `linkedin` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `pinterest` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `telegram` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `twitter` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Tablo döküm verisi `sosyalmedya`
--

INSERT INTO `sosyalmedya` (`id`, `instagram`, `facebook`, `youtube`, `linkedin`, `pinterest`, `telegram`, `twitter`) VALUES
(1, 'https://instagram.com/', 'https://facebook.com/', 'https://youtube.com/', 'https://linkedin.com/', 'https://pinteres.com/', 'https://t.me/', 'https://twitter.com/');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sss`
--

CREATE TABLE `sss` (
  `id` int(11) NOT NULL,
  `adi` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `sira` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `aciklama` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `durum` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `dil` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `subeler`
--

CREATE TABLE `subeler` (
  `id` int(11) NOT NULL,
  `telefon1` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `telefon2` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `email1` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `email2` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `adres` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `maps` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `adi` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `dil` int(11) DEFAULT NULL,
  `durum` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Tablo döküm verisi `subeler`
--

INSERT INTO `subeler` (`id`, `telefon1`, `telefon2`, `email1`, `email2`, `adres`, `maps`, `adi`, `dil`, `durum`) VALUES
(1, '90 212 663 0 444', '', 'istanbul@compasslog.com', '', 'Yeşilköy Mh. Atatürk Cd. EGS Business Park B2 Blok Kat:2 No:139-140 Bakırköy İstanbul', 'https://goo.gl/maps/imu3Bn99ERzfpo7Y6', 'İstanbul', 21, 0),
(2, '90 232 404 7 555', '', 'izmir@compasslog.com', '', 'Akdeniz Mh. Şehit Fethi Bey Cd. 99 Basamak İş Merkezi No:43/109 Konak İzmir', 'https://goo.gl/maps/eYn9bFSphS3S6P416', 'İzmir', 21, 0),
(3, '90 212 663 0 444', '', 'sakarya@compasslog.com', '', 'Arabacıalanı Mh. Mehmet Akif Ersoy Cd. Work Inn İş Merkezi No:33/210 Serdivan Sakarya', 'https://goo.gl/maps/xj8KyHrUWZNDTdPf6', 'Sakarya', 21, 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `urunler`
--

CREATE TABLE `urunler` (
  `id` int(11) NOT NULL,
  `adi` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `sira` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `resim` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `kategori` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `onaciklama` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `durum` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `aciklama` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `seo` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `tur` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `eklenme_tarihi` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `guncelleme_tarihi` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `fiyat` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `linki` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `videolinki` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `hit` int(11) DEFAULT NULL,
  `panel` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `indir` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `stok` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `dil` int(11) DEFAULT NULL,
  `kur` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `title` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `etiket` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Tablo döküm verisi `urunler`
--

INSERT INTO `urunler` (`id`, `adi`, `sira`, `resim`, `kategori`, `onaciklama`, `durum`, `aciklama`, `seo`, `tur`, `eklenme_tarihi`, `guncelleme_tarihi`, `fiyat`, `linki`, `videolinki`, `hit`, `panel`, `indir`, `stok`, `dil`, `kur`, `title`, `description`, `etiket`) VALUES
(121, 'Spor çantası', '2', '260-spor-cantasi.webp', '14', 'Özelleştirilmiş büyüme stratejilerini birleştirin, potansiyel insan sermayesi, yüksek verimli birim çözüm yöntemlerini değiştirmek için şeffaf katalizörler olmadan diğerlerinin optimal e-pazarlarından yararlanır.  Ömür boyu yapısal, bir yıllık yüzey bitirme garantisi “Tment” sekmesi altındaki “Orta Büyük Harfler”den eşlenmiştir OEM ekipmanıyla tamamen uyumlu', '0', '<p>Tıklama ve har&ccedil; entelekt&uuml;el sermayesi ile ortaya &ccedil;ıkan materyalleri g&uuml;venilir bir şekilde m&uuml;zakere edin. Platformlar arası şemalardan &ouml;nce istemci merkezli kaynakları etkileyici bir şekilde beyaz tahtaya aktarın. Multimedya tabanlı portallar olmadan geleceğe y&ouml;nelik dış kaynak kullanımını belirgin bir şekilde geliştirin. İşbirliğine dayalı &ccedil;&ouml;z&uuml;mler i&ccedil;in yeni nesil mimarileri aşamalı olarak koordine edin. M&uuml;şteriye y&ouml;nelik &ouml;l&ccedil;&uuml;mlerden &ouml;nce geriye d&ouml;n&uuml;k uyumlu kalite vekt&ouml;rlerini profesyonel bir şekilde geri y&uuml;kleyin. M&uuml;şteri odaklı insan sermayesi ileriye d&ouml;n&uuml;k inovasyon i&ccedil;in b&uuml;t&uuml;nsel d&uuml;ş&uuml;nce paylaşımını baskı altına almadan &ouml;nce, teknik olarak sağlam dahili veya &quot;organik&quot; kaynakları b&uuml;t&uuml;nsel olarak geri y&uuml;kleyin.</p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', 'spor-cantasi', 'urunler', '08.06.2024', '15.07.2024', '$250.00', NULL, NULL, NULL, '$260.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(128, 'Okul çantası', '1', '102-okul-cantasi.webp', '14', 'Özelleştirilmiş büyüme stratejilerini birleştirin, potansiyel insan sermayesi, yüksek verimli birim çözüm yöntemlerini değiştirmek için şeffaf katalizörler olmadan diğerlerinin optimal e-pazarlarından yararlanır.\r\n\r\nÖmür boyu yapısal, bir yıllık yüzey bitirme garantisi\r\n“Tment” sekmesi altındaki “Orta Büyük Harfler”den eşlenmiştir\r\nOEM ekipmanıyla tamamen uyumlu', '0', '<p>Tıklama ve har&ccedil; entelekt&uuml;el sermayesi ile ortaya &ccedil;ıkan materyalleri g&uuml;venilir bir şekilde m&uuml;zakere edin. Platformlar arası şemalardan &ouml;nce istemci merkezli kaynakları etkileyici bir şekilde beyaz tahtaya aktarın. Multimedya tabanlı portallar olmadan geleceğe y&ouml;nelik dış kaynak kullanımını belirgin bir şekilde geliştirin. İşbirliğine dayalı &ccedil;&ouml;z&uuml;mler i&ccedil;in yeni nesil mimarileri aşamalı olarak koordine edin. M&uuml;şteriye y&ouml;nelik &ouml;l&ccedil;&uuml;mlerden &ouml;nce geriye d&ouml;n&uuml;k uyumlu kalite vekt&ouml;rlerini profesyonel bir şekilde geri y&uuml;kleyin. M&uuml;şteri odaklı insan sermayesi ileriye d&ouml;n&uuml;k inovasyon i&ccedil;in b&uuml;t&uuml;nsel d&uuml;ş&uuml;nce paylaşımını baskı altına almadan &ouml;nce, teknik olarak sağlam dahili veya &quot;organik&quot; kaynakları b&uuml;t&uuml;nsel olarak geri y&uuml;kleyin.</p>\r\n', 'okul-cantasi', 'urunler', '27.08.2022', '15.07.2024', '$30.00', NULL, NULL, NULL, '$260.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(129, 'Spor Salonu Tişörtü', '2', '108-spor-salonu-tisortu.webp', '14', 'Özelleştirilmiş büyüme stratejilerini birleştirin, potansiyel insan sermayesi, yüksek verimli birim çözüm yöntemlerini değiştirmek için şeffaf katalizörler olmadan diğerlerinin optimal e-pazarlarından yararlanır.\r\n\r\nÖmür boyu yapısal, bir yıllık yüzey bitirme garantisi\r\n“Tment” sekmesi altındaki “Orta Büyük Harfler”den eşlenmiştir\r\nOEM ekipmanıyla tamamen uyumlu', '0', '<p>Tıklama ve har&ccedil; entelekt&uuml;el sermayesi ile ortaya &ccedil;ıkan materyalleri g&uuml;venilir bir şekilde m&uuml;zakere edin. Platformlar arası şemalardan &ouml;nce istemci merkezli kaynakları etkileyici bir şekilde beyaz tahtaya aktarın. Multimedya tabanlı portallar olmadan geleceğe y&ouml;nelik dış kaynak kullanımını belirgin bir şekilde geliştirin. İşbirliğine dayalı &ccedil;&ouml;z&uuml;mler i&ccedil;in yeni nesil mimarileri aşamalı olarak koordine edin. M&uuml;şteriye y&ouml;nelik &ouml;l&ccedil;&uuml;mlerden &ouml;nce geriye d&ouml;n&uuml;k uyumlu kalite vekt&ouml;rlerini profesyonel bir şekilde geri y&uuml;kleyin. M&uuml;şteri odaklı insan sermayesi ileriye d&ouml;n&uuml;k inovasyon i&ccedil;in b&uuml;t&uuml;nsel d&uuml;ş&uuml;nce paylaşımını baskı altına almadan &ouml;nce, teknik olarak sağlam dahili veya &quot;organik&quot; kaynakları b&uuml;t&uuml;nsel olarak geri y&uuml;kleyin.</p>\r\n', 'spor-salonu-tisortu', 'urunler', '08.06.2024', '15.07.2024', '$30.00', NULL, NULL, NULL, '$260.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(131, 'Ab Rulo', '2', '108-ab-rulo.webp', '14', 'Özelleştirilmiş büyüme stratejilerini birleştirin, potansiyel insan sermayesi, yüksek verimli birim çözüm yöntemlerini değiştirmek için şeffaf katalizörler olmadan diğerlerinin optimal e-pazarlarından yararlanır.  Ömür boyu yapısal, bir yıllık yüzey bitirme garantisi “Tment” sekmesi altındaki “Orta Büyük Harfler”den eşlenmiştir OEM ekipmanıyla tamamen uyumlu', '0', '<p>Tıklama ve har&ccedil; entelekt&uuml;el sermayesi ile ortaya &ccedil;ıkan materyalleri g&uuml;venilir bir şekilde m&uuml;zakere edin. Platformlar arası şemalardan &ouml;nce istemci merkezli kaynakları etkileyici bir şekilde beyaz tahtaya aktarın. Multimedya tabanlı portallar olmadan geleceğe y&ouml;nelik dış kaynak kullanımını belirgin bir şekilde geliştirin. İşbirliğine dayalı &ccedil;&ouml;z&uuml;mler i&ccedil;in yeni nesil mimarileri aşamalı olarak koordine edin. M&uuml;şteriye y&ouml;nelik &ouml;l&ccedil;&uuml;mlerden &ouml;nce geriye d&ouml;n&uuml;k uyumlu kalite vekt&ouml;rlerini profesyonel bir şekilde geri y&uuml;kleyin. M&uuml;şteri odaklı insan sermayesi ileriye d&ouml;n&uuml;k inovasyon i&ccedil;in b&uuml;t&uuml;nsel d&uuml;ş&uuml;nce paylaşımını baskı altına almadan &ouml;nce, teknik olarak sağlam dahili veya &quot;organik&quot; kaynakları b&uuml;t&uuml;nsel olarak geri y&uuml;kleyin.</p>\r\n', 'ab-rulo', 'urunler', '08.06.2024', '15.07.2024', '$250.00', NULL, NULL, NULL, '$260.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(132, 'Dambıllar', '1', '855-dambillar.webp', '14', 'Özelleştirilmiş büyüme stratejilerini birleştirin, potansiyel insan sermayesi, yüksek verimli birim çözüm yöntemlerini değiştirmek için şeffaf katalizörler olmadan diğerlerinin optimal e-pazarlarından yararlanır.\r\n\r\nÖmür boyu yapısal, bir yıllık yüzey bitirme garantisi\r\n“Tment” sekmesi altındaki “Orta Büyük Harfler”den eşlenmiştir\r\nOEM ekipmanıyla tamamen uyumlu', '0', '<p>Tıklama ve har&ccedil; entelekt&uuml;el sermayesi ile ortaya &ccedil;ıkan materyalleri g&uuml;venilir bir şekilde m&uuml;zakere edin. Platformlar arası şemalardan &ouml;nce istemci merkezli kaynakları etkileyici bir şekilde beyaz tahtaya aktarın. Multimedya tabanlı portallar olmadan geleceğe y&ouml;nelik dış kaynak kullanımını belirgin bir şekilde geliştirin. İşbirliğine dayalı &ccedil;&ouml;z&uuml;mler i&ccedil;in yeni nesil mimarileri aşamalı olarak koordine edin. M&uuml;şteriye y&ouml;nelik &ouml;l&ccedil;&uuml;mlerden &ouml;nce geriye d&ouml;n&uuml;k uyumlu kalite vekt&ouml;rlerini profesyonel bir şekilde geri y&uuml;kleyin. M&uuml;şteri odaklı insan sermayesi ileriye d&ouml;n&uuml;k inovasyon i&ccedil;in b&uuml;t&uuml;nsel d&uuml;ş&uuml;nce paylaşımını baskı altına almadan &ouml;nce, teknik olarak sağlam dahili veya &quot;organik&quot; kaynakları b&uuml;t&uuml;nsel olarak geri y&uuml;kleyin.</p>\r\n', 'dambillar', 'urunler', '27.08.2022', '17.07.2024', '$30.00', NULL, NULL, NULL, '$260.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `urun_img`
--

CREATE TABLE `urun_img` (
  `id` int(11) NOT NULL,
  `urun_id` int(11) DEFAULT NULL,
  `img` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `tur` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Tablo döküm verisi `urun_img`
--

INSERT INTO `urun_img` (`id`, `urun_id`, `img`, `tur`) VALUES
(60, 7, '1626350494-60f0239e1527a.jpg', 'urun_kategori'),
(248, 28, '1662042808-6310c2b8e4cec.jpg', 'sayfalar'),
(309, 70, '1670987372-63993e6c6738d.jpg', 'haberler'),
(310, 70, '1670987395-63993e837b3fd.jpg', 'haberler'),
(311, 70, '1670987458-63993ec20ac3f.jpg', 'haberler'),
(312, 70, '1670989553-639946f1319f3.jpg', 'haberler'),
(317, 76, '1671039420-639a09bc3aa40.jpg', 'haberler'),
(318, 76, '1671039420-639a09bc3c9ba.jpg', 'haberler'),
(319, 76, '1671039420-639a09bc3fe78.jpg', 'haberler'),
(320, 76, '1671039420-639a09bc4979d.jpg', 'haberler'),
(356, 29, '1693300049-64edb551d12b7.png', 'hizmetler'),
(386, 132, '1721230371-6697e42399829.jpg', 'urunler'),
(387, 132, '1721230484-6697e49422614.jpg', 'urunler'),
(388, 132, '1721236853-6697fd755d2c8.jpg', 'urunler'),
(389, 135, '1727721389-66faefadf167b.jpg', 'projeler');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `urun_kategori`
--

CREATE TABLE `urun_kategori` (
  `id` int(11) NOT NULL,
  `adi` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `sira` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `resim` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `kategori` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `onaciklama` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `durum` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `aciklama` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `seo` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `tur` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `eklenme_tarihi` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `guncelleme_tarihi` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `hit` int(11) DEFAULT NULL,
  `dil` int(11) DEFAULT NULL,
  `title` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `etiket` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Tablo döküm verisi `urun_kategori`
--

INSERT INTO `urun_kategori` (`id`, `adi`, `sira`, `resim`, `kategori`, `onaciklama`, `durum`, `aciklama`, `seo`, `tur`, `eklenme_tarihi`, `guncelleme_tarihi`, `hit`, `dil`, `title`, `etiket`, `description`) VALUES
(14, 'kategori 1', '01', '472-.webp', '0', NULL, '0', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', 'kategori-1', 'urun_kategori', '16.04.2022', '05.04.2024', 822, NULL, NULL, NULL, NULL),
(16, 'Kategori 2', '2', '603-kurumsal-scriptler.webp', '0', NULL, '0', '   Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\n', 'kategori-2', 'urun_kategori', '19.09.2022', '22.12.2022', NULL, 21, NULL, NULL, NULL),
(17, 'Kategori 3', '3', '627-kisisel-scriptler.webp', '0', NULL, '0', '    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\n', 'kategori-3', 'urun_kategori', '19.09.2022', '22.12.2022', NULL, 21, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `urun_yorum`
--

CREATE TABLE `urun_yorum` (
  `id` int(11) NOT NULL,
  `yorum` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `uye` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `tarih` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `urun_id` int(11) DEFAULT NULL,
  `durum` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Tablo döküm verisi `urun_yorum`
--

INSERT INTO `urun_yorum` (`id`, `yorum`, `uye`, `tarih`, `urun_id`, `durum`) VALUES
(5, 'harika bir script', '64', NULL, 111, '1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `uyeler`
--

CREATE TABLE `uyeler` (
  `id` int(11) NOT NULL,
  `adsoyad` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `email` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `telefon` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `sifre` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `normalsifre` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `tarih` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `durum` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `video`
--

CREATE TABLE `video` (
  `id` int(11) NOT NULL,
  `adi` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `sira` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `aciklama` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `linki` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `durum` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `resim` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `dil` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Tablo döküm verisi `video`
--

INSERT INTO `video` (`id`, `adi`, `sira`, `aciklama`, `linki`, `durum`, `resim`, `dil`) VALUES
(8, 'Video 1', '1', NULL, 'https://www.youtube.com/watch?v=kYmjM2p_NUQ', '0', '8-video-1.webp', NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yonetici`
--

CREATE TABLE `yonetici` (
  `id` int(11) NOT NULL,
  `ad_soyad` varchar(555) CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `eposta` varchar(555) CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `sifre` varchar(555) CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `ilk_giris` varchar(555) CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `son_giris` varchar(555) CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `logo` varchar(555) CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `kapak_foto` varchar(555) CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `admin` int(11) DEFAULT NULL,
  `normalsifre` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `ip` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Tablo döküm verisi `yonetici`
--

INSERT INTO `yonetici` (`id`, `ad_soyad`, `eposta`, `sifre`, `ilk_giris`, `son_giris`, `logo`, `kapak_foto`, `admin`, `normalsifre`, `ip`) VALUES
(9, 'demo', 'demo@demo.com', 'demo', '15.09.2020', '30.09.2024', '100.png', '991-.jpg', 1, NULL, '188.57.54.159');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yorumlar`
--

CREATE TABLE `yorumlar` (
  `id` int(11) NOT NULL,
  `adi` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `sira` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `resim` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `kategori` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `onaciklama` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `durum` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `aciklama` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `seo` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `tur` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `eklenme_tarihi` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `guncelleme_tarihi` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `dil` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Tablo döküm verisi `yorumlar`
--

INSERT INTO `yorumlar` (`id`, `adi`, `sira`, `resim`, `kategori`, `onaciklama`, `durum`, `aciklama`, `seo`, `tur`, `eklenme_tarihi`, `guncelleme_tarihi`, `dil`) VALUES
(3, 'Şahin', '3', '712-sahin.webp', NULL, '', '0', '<p>Kullanımı &ccedil;ok kolay ve verimli. İş akışlarımızı b&uuml;y&uuml;k &ouml;l&ccedil;&uuml;de hızlandırdı!</p>\r\n', 'sahin', 'yorumlar', '22.09.2022', '30.09.2024', NULL),
(4, 'Buse', '3', '187-mia.webp', NULL, '', '0', '<p>Kullanımı &ccedil;ok kolay ve verimli. İş akışlarımızı b&uuml;y&uuml;k &ouml;l&ccedil;&uuml;de hızlandırdı!</p>\r\n', 'buse', 'yorumlar', '22.09.2022', '30.09.2024', NULL);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `abone`
--
ALTER TABLE `abone`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `ayarlar`
--
ALTER TABLE `ayarlar`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `banka`
--
ALTER TABLE `banka`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `beadcrumb`
--
ALTER TABLE `beadcrumb`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `blog_yorum`
--
ALTER TABLE `blog_yorum`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `bolge_kategori`
--
ALTER TABLE `bolge_kategori`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `bolge_yorum`
--
ALTER TABLE `bolge_yorum`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `destek`
--
ALTER TABLE `destek`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `dil`
--
ALTER TABLE `dil`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `ekibimiz`
--
ALTER TABLE `ekibimiz`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `haberler`
--
ALTER TABLE `haberler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `hakkimizda`
--
ALTER TABLE `hakkimizda`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `hizmetbolgeleri`
--
ALTER TABLE `hizmetbolgeleri`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `hizmetler`
--
ALTER TABLE `hizmetler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `iletisimbilgileri`
--
ALTER TABLE `iletisimbilgileri`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `iletisimler`
--
ALTER TABLE `iletisimler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `istatik`
--
ALTER TABLE `istatik`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `izinler`
--
ALTER TABLE `izinler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `katalog`
--
ALTER TABLE `katalog`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `mail`
--
ALTER TABLE `mail`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `mail_dogrula`
--
ALTER TABLE `mail_dogrula`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `modal`
--
ALTER TABLE `modal`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `netgsm`
--
ALTER TABLE `netgsm`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `odeme_secenek`
--
ALTER TABLE `odeme_secenek`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `onecikan`
--
ALTER TABLE `onecikan`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `ozellik`
--
ALTER TABLE `ozellik`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `paketler`
--
ALTER TABLE `paketler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `panel`
--
ALTER TABLE `panel`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `paymax`
--
ALTER TABLE `paymax`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `paytr`
--
ALTER TABLE `paytr`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `projeler`
--
ALTER TABLE `projeler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `proje_kategori`
--
ALTER TABLE `proje_kategori`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `rapor`
--
ALTER TABLE `rapor`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `referanslar`
--
ALTER TABLE `referanslar`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `rezervasyon`
--
ALTER TABLE `rezervasyon`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `sayfalar`
--
ALTER TABLE `sayfalar`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `sepet`
--
ALTER TABLE `sepet`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `shopier`
--
ALTER TABLE `shopier`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `siparisler`
--
ALTER TABLE `siparisler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `son_islem`
--
ALTER TABLE `son_islem`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `sosyalmedya`
--
ALTER TABLE `sosyalmedya`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `sss`
--
ALTER TABLE `sss`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `subeler`
--
ALTER TABLE `subeler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `urunler`
--
ALTER TABLE `urunler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `urun_img`
--
ALTER TABLE `urun_img`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `urun_kategori`
--
ALTER TABLE `urun_kategori`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `urun_yorum`
--
ALTER TABLE `urun_yorum`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `uyeler`
--
ALTER TABLE `uyeler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `yonetici`
--
ALTER TABLE `yonetici`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `yorumlar`
--
ALTER TABLE `yorumlar`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `abone`
--
ALTER TABLE `abone`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `ayarlar`
--
ALTER TABLE `ayarlar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `banka`
--
ALTER TABLE `banka`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Tablo için AUTO_INCREMENT değeri `beadcrumb`
--
ALTER TABLE `beadcrumb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `blog_yorum`
--
ALTER TABLE `blog_yorum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Tablo için AUTO_INCREMENT değeri `bolge_kategori`
--
ALTER TABLE `bolge_kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `bolge_yorum`
--
ALTER TABLE `bolge_yorum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Tablo için AUTO_INCREMENT değeri `destek`
--
ALTER TABLE `destek`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `dil`
--
ALTER TABLE `dil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Tablo için AUTO_INCREMENT değeri `ekibimiz`
--
ALTER TABLE `ekibimiz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Tablo için AUTO_INCREMENT değeri `galeri`
--
ALTER TABLE `galeri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Tablo için AUTO_INCREMENT değeri `haberler`
--
ALTER TABLE `haberler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- Tablo için AUTO_INCREMENT değeri `hakkimizda`
--
ALTER TABLE `hakkimizda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `hizmetbolgeleri`
--
ALTER TABLE `hizmetbolgeleri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Tablo için AUTO_INCREMENT değeri `hizmetler`
--
ALTER TABLE `hizmetler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- Tablo için AUTO_INCREMENT değeri `iletisimbilgileri`
--
ALTER TABLE `iletisimbilgileri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `iletisimler`
--
ALTER TABLE `iletisimler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;

--
-- Tablo için AUTO_INCREMENT değeri `istatik`
--
ALTER TABLE `istatik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Tablo için AUTO_INCREMENT değeri `izinler`
--
ALTER TABLE `izinler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `katalog`
--
ALTER TABLE `katalog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Tablo için AUTO_INCREMENT değeri `mail`
--
ALTER TABLE `mail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `mail_dogrula`
--
ALTER TABLE `mail_dogrula`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Tablo için AUTO_INCREMENT değeri `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- Tablo için AUTO_INCREMENT değeri `modal`
--
ALTER TABLE `modal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `netgsm`
--
ALTER TABLE `netgsm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `odeme_secenek`
--
ALTER TABLE `odeme_secenek`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `onecikan`
--
ALTER TABLE `onecikan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `ozellik`
--
ALTER TABLE `ozellik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Tablo için AUTO_INCREMENT değeri `paketler`
--
ALTER TABLE `paketler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- Tablo için AUTO_INCREMENT değeri `panel`
--
ALTER TABLE `panel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `paymax`
--
ALTER TABLE `paymax`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `paytr`
--
ALTER TABLE `paytr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `projeler`
--
ALTER TABLE `projeler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- Tablo için AUTO_INCREMENT değeri `proje_kategori`
--
ALTER TABLE `proje_kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Tablo için AUTO_INCREMENT değeri `rapor`
--
ALTER TABLE `rapor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `referanslar`
--
ALTER TABLE `referanslar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Tablo için AUTO_INCREMENT değeri `rezervasyon`
--
ALTER TABLE `rezervasyon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- Tablo için AUTO_INCREMENT değeri `sayfalar`
--
ALTER TABLE `sayfalar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Tablo için AUTO_INCREMENT değeri `sepet`
--
ALTER TABLE `sepet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=264;

--
-- Tablo için AUTO_INCREMENT değeri `shopier`
--
ALTER TABLE `shopier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `siparisler`
--
ALTER TABLE `siparisler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;

--
-- Tablo için AUTO_INCREMENT değeri `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Tablo için AUTO_INCREMENT değeri `son_islem`
--
ALTER TABLE `son_islem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `sosyalmedya`
--
ALTER TABLE `sosyalmedya`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `sss`
--
ALTER TABLE `sss`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Tablo için AUTO_INCREMENT değeri `subeler`
--
ALTER TABLE `subeler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `urunler`
--
ALTER TABLE `urunler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- Tablo için AUTO_INCREMENT değeri `urun_img`
--
ALTER TABLE `urun_img`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=390;

--
-- Tablo için AUTO_INCREMENT değeri `urun_kategori`
--
ALTER TABLE `urun_kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Tablo için AUTO_INCREMENT değeri `urun_yorum`
--
ALTER TABLE `urun_yorum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `uyeler`
--
ALTER TABLE `uyeler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- Tablo için AUTO_INCREMENT değeri `video`
--
ALTER TABLE `video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Tablo için AUTO_INCREMENT değeri `yonetici`
--
ALTER TABLE `yonetici`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Tablo için AUTO_INCREMENT değeri `yorumlar`
--
ALTER TABLE `yorumlar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
