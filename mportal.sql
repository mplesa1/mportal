-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2018 at 03:17 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mportal`
--

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `id_a` int(11) UNSIGNED NOT NULL,
  `fk_id_u` int(11) UNSIGNED DEFAULT NULL,
  `fk_id_cat` int(11) UNSIGNED NOT NULL,
  `title` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `content` varchar(6000) COLLATE utf8_unicode_ci NOT NULL,
  `foto_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `foto_alt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date_publication` datetime NOT NULL,
  `date_last_change` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `position` int(11) UNSIGNED NOT NULL DEFAULT '1',
  `number_likes` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `active` int(2) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`id_a`, `fk_id_u`, `fk_id_cat`, `title`, `description`, `content`, `foto_url`, `foto_alt`, `date_publication`, `date_last_change`, `position`, `number_likes`, `active`) VALUES
(1, 1, 5, 'Nitko od nas ne dolazi da se uhljebi, tek smo se zagrijali i bit ćemo sve žešći!', 'Nitko od nas ne dolazi da se uhljebi, tek smo se zagrijali i bit ćemo sve žešći!', 'Gotovo je postalo predvidljivo da ćemo ga toga dana negdje pročitati, čuti ili gledati. U medijima. Dok je bio igrač, 10-ak godina kao omladinac, a onda 20 kao profesionalac, Stipe Pletikosa nije bio često u eteru. I prije nego se upustio u igre prijestolja, slavni je Splićanin ušetao u naše domove i nogometnu zbilju kroz analitiku na javnoj televiziji. Nije da smo baš iznenađeni njegovom elokventnošću, osvježavajućim stylingom talijanskog utjecaja. Pogotovo nije iznenadio odmjerenošću, kako u kritičkom. tako i pohvalnom izrazu. Pletikosa nije nikad odavao dojam prznice, upale ega i onog koji nameće stav. Respektirat će svakog, ali i time što će lakoćom uvjerenja iznijeti svoj stav...Imate li štogod novog kazati s obzirom na mnoštvo teza koje ste iznijeli u brojnim intervjuima oko HNS-ove stvari?\n- Pa novo je što je HNS-ovo vodstvo odlučilo ubrzano razriješiti pitanje predsjednika za iduće četverogodišnje razdoblje. Ne znam kako drugima, ali meni je to jasan znak da smo kao tim ljudi koji žele raditi na promjenama upravljanja hrvatskim nogometom već napravili značajnu stvar. Da su u Kući nogometa procijenili da im nismo ozbiljna konkurencija, držali bi se najava kako će izborna Skupština biti na proljeće. I ovaj trijumfalizam koji sam primijetio kod nekih aktera u Savezu čini mi se kao da je odraz brige koju imaju za svoje pozicije…', 'img/article/img_1516148125.jpeg', 'zg', '2017-11-27 13:40:00', '2018-01-17 00:15:26', 1, 25, 1),
(2, 1, 5, 'STIŽU POJAČANJA U DINAMO', 'Tko može reći da ovo što on radi nije dobro? Pa lani su igrali Machado, Sammir..., Fernandes, a kakvi su bili rezultati?', 'Kakve su novosti u gornjem domu Maksimira? Kineska delegacija bila je nekoliko dana u Zagrebu, posjetila klub, a kad dođu kineski poslovnjaci na nogometni stadion, uvijek se razviju razna pitanja. Chengdu Sports Industry Company povezao se s Dinamom već prije mjesec i nešto dana kad je modra delegacija posjetila Kinu, razgovaralo se o omladinskoj školi, organizaciji kluba...  Sad su oni došli k nama, bili naši gosti i nema nekih novosti. Pokazali smo im našu školu, uvjete u kojima radimo, bili su na utakmici s Rudešom. Ne, nismo razgovarali ni o kakvoj vrsti sponzorstva ili nekog ulaganja, ostali smo na istim temama kao i ranije - izvijestio nas je glavni direktor Tomislav Svetina.\n\nToliko o tome, idemo na sportske aktualnosti.\n\nKako je vodstvo kluba općenito zadovoljno ovim mjesecima rada Marija Cvitanovića, rezultati su, nakon ispadanja iz Europe, odlični, prednost na ljestvici velika, no je li ispunio i onaj drugi cilj, razvoj igrača i napredak u igri?\n\n- Tko može nakon što trener i momčad nisu izgubili utakmicu u HNL-u, kad je prednost pred drugoplasiranim 12 bodova, reći da to nije dobro? O dojmu uvijek možemo pričati, može li i mora li bolje, ali opet, kad usporedimo ovu jesen s prošlom sezonom. Kad vidimo da su lani igrali Machado, Guilherme, Sammir, Fernandes..., a kakve su bile igre, pogotovo, kakvi su bili rezultati? Dakle, sve sam rekao.', 'img/article/img_1515970543.jpg', 'dinamo', '2017-12-03 08:54:42', '2018-01-14 22:56:01', 1, 5, 1),
(8, 1, 9, 'OD PODNOŽJA DO VRHA SLJEMENA ZA 16 I POL MINUTA Pogledajte kako će izgledati nova žičara vrijedna čak 142 milijuna kuna!', 'Pripreme za gradnju nove žičare već su počele, a u Gradu planiraju i cijeli taj koridor kojim žičara prolazi urediti za rekreaciju građana', 'Start će biti na 276 metara nadmorske visine dok će gornja postaja biti na 1030 metara. Zagrepčani i turisti prevozit će se u 84 gondole, a u svaku gondolu moći će se smjestiti 10 ljudi.\n\nOd Donje do Gornje postaje na relaciji od oko 4 i pol kilometra, vozit će ukupno 16 i pol minuta. Ukupno će na trasi biti četri postaje, a prvi putnici prema najavama moći će uživati 1. kolovoza 2018. godine.\n\nUkratko, ovako u brojkama izgleda novi projekt Žičare Sljeme Zagreb čiji je idejni projekt jučer trebao biti predstavljen javnosti i za koji će se izdvojiti ukupno 142 milijuna kuna. Po onom što se moglo vidjeti, Zagreb će uistinu dobiti jednu od najmodernijih žičara u Europi. Pripreme za gradnju nove žičare već su počele, a kako je najavljivano kompletna gradnja odvijat će se u četiri faze.\n\nPrva i druga su već počele.', 'img/article/img_1515971063.jpg', 'sleme', '2017-12-24 12:48:44', '2018-01-16 18:59:54', 2, 8, 1),
(11, 1, 14, 'Schaub: Cro Cop mi je priuštio najveće batine u životu, nakon toga sam shvatio da nisam pravi borac poput njega', 'U ožujku 2011. Brandan Schaub upisao je najveću pobjedu karijere pobjedivši Mirka Cro Cop Filipovića na UFC 128 priredbi. Za Cro Copa se radilo samo o još jednoj borbi, no za Schauba je to bio trenutak kada je prvi put počeo sumnjati u svoju strast i prednost MMA-u.', 'Nekoliko godina kasnije Schaub je odlučio završiti karijeru te je danas uspješan podcaster i komičar, no nikada neće zaboraviti susret s legendarnim hrvatskim borcem u kojem je shvatio da rizici i posljedice slobdone borbe nisu za svakoga.\n\n“Borba s Cro Copom se činila kao nužni korak. On je bio legenda i prilika da upišem veliku pobjedu”, prisjetio se Schaub borbe u intervjuu za dokumentarni serijal Retrospective. “No bio sam naivan i bahat te sam mislio kako ću ući u kavez i jednostavno ga pregaziti. Dragi bože, kako sam se prevario.”\n\n\n\nShaub je u konačnici slavo tehničkim nokautom u trećoj rundi, ali put do pobjede je imao svoju cijenu…\n\n“Slomio mi je nos na šesnaest mjesta i morao sam na operaciju. Imao sam šesnaest šavova na oku, četrnaest šavova na usni. Povraćao sam i bio u velikim bolovima.”\n\n“Nikad neću zaboraviti taj trenutak. On je stajao sav krvav, i nemojte zaboraviti da je u toj borbi bio nokautiran. Ali ja sam bio puno više razbijen, lice mi je bilo natečeno. Sjedili smo smo u backstageu. Ja sam povraćao od bolova, a njega su šivali…\n\nSve me boljelo i pogledao sam Cro Copa i rekao,’K vragu, što mi to radimo čovječe?’, a on me pogledao i odgovorio,’Ovo je život.’\n\nI tada sam se prvi put pitao,’Je li zaista tako? Je li, čovječe?’ I za njega jest. Njemu je to sve. No, za mene nije. Tada sam shvatio da nisam poput njega. Ja ne želim za ovo riskirati svoj život. Ovo nije moja strast. Njemu jest. On se još uvijek bori. On je apsolutna legenda. Meni uopće nije mjesto u oktogonu s njim. “\n', 'img/article/img_1515970830.jpg', 'crocop', '2017-12-24 23:07:36', '2018-01-14 23:00:34', 3, 1, 1),
(12, 1, 14, 'Dosad su se naši boksači borili za strance, a sad će se boriti za Hrvatsku', 'BOKSAČKOJ ELITI U sljedećoj godini, ukupno osmoj sezoni Svjetske boksačke serije, imat ćemo svoju momčad u elitnom boksačkom natjecanju Međunarodne amaterske boksačke federacije', 'U sljedećoj godini, ukupno osmoj sezoni Svjetske boksačke serije (WSB), Hrvatska će imati svoju momčad u elitnom boksačkom natjecanju Međunarodne amaterske boksačke federacije (AIBA). Hrvati vitezovi, ili na engleskom jeziku Croatian Knights, debi će imati već početkom veljače u Italiji.\n\n- Mnogi nisu vjerovali kad su čuli za našu želju i aktivnosti po tom planu jer se radi o apsolutnom planetarnom vrhu. Međutim, uvijek ću naglasiti, nisam uspio ja ili Savez, uspjeli su naši boksači. Da njih nema, da nema njihovih uspjeha cijeli niz godina, pa onda i devet europskih i jedne svjetske medalje samo ove godine, ovakvo što ne bi bilo moguće - rekao je Bono Bošnjak, predsjednik HBS-a.\n\nSvitanje dobre priče\n\nNajveći mogući kompliment hrvatskom boksu iz Italije je odaslao Franco Falcinelli, predsjednik Europske boksačke federacije poručivši na mrežnim stranicama WSB-a:\n\n“Hrvatski vitezovi u ovo natjecanje donose sa sobom tradiciju ove velike nacije.”\n\nMalo je reći da uhu gode ovakve riječi najvišeg čovjeka europskog boksa i jednog od čelnika svjetskog.\n\n- Ovo je samo svitanje jedne dobre boksačke priče. Vjerujem da će ovo biti predstavljeno kao velik iskorak hrvatskog boksa - spomenuo je brigadni general Mladen Mikolčević, predsjednik Hrvatskih vitezova te dodao:\n\n- Dosad su se naši boksači borili u ovom natjecanju za strane momčadi od Italije preko Francuske, Velike Britanije do Kazahstana. Od sada će u ring za Hrvatsku.\n\nU dosadašnjim sezonama WSB-a pamtimo nastupe Alena Babića za Francuze, Luke Plantića i Josipa Bepa Filipija za Talijane, Hrvoja Sepa i Filipa Hrgovića za Francuze i Kazahstance, kao i Marka Čalića i Bojana Miškovića za Britance.\n\nIzbornik Leonard Pijetraj najbolje zna što znači WSB. Iza njega je petogodišnje iskustvo rada za Paris United (2 godine) te Astana Arlanse (3 godine), ali i podizanje trofeja.\n\nImamo svoje blago\n\n- Jako, jako dobro znam o kakvom se natjecanju radi. Čak sam najskeptičniji jer znam koliko je WSB zahtjevan. Naši će borci vidjeti da je velika razlika između boksanja tri ili kao u WSB-u pet rundi po tri minute. Sve vas molim da budete strpljivi - apelira izbornik, koji je glede sastava Hrvatskih vitezova spomenuo zasad tek sljedeće.\n\n- Sastav se još uvijek ne zna. Potražit ćemo strana pojačanja (Bjelorusija, Rumunjska, Bugarska) samo u nižim kategorijama, koje nam nisu toliko kvalitetno pokrivene. Ostalo ćemo imati hrvatske boksače. Možda niste znali, ali prijašnjih sezona Azerbajdžan je imao svoju momčad u WSB-u, ali sve odreda strane borce. Oni nemaju svojih boksača. Prije dvije godine Astani su u goste stigli Nijemci. Svi njihovi boksači govorili su ruski! Sve sam time rekao. Mi imamo svoje mladiće i to je naše najveće blago - naglasio je izbornik.\n\nSportski direktor HBS-a general Ante Prkačin efektno je zaključio.\n\n- Boks je najviteškiji borilački sport i zato mislim da mi Hrvati tu imamo komparativne prednosti.', 'img/article/img_1515970882.jpg', 'boks_čalić', '2017-12-24 23:20:08', '2018-01-16 16:36:29', 1, 3, 1),
(14, 35, 9, 'Leustekova staza-Sljeme', 'Leustekova staza-Sljeme', 'Planinarska staza 14, poznata još pod imenom Leustekova staza prema Albinu Leusteku. Albin Leustek bio je zagrebački šumar koji je puno doprinio uređenju Medvednice (slika desno). Po njemu je nazvan i izvor Šumarev grob, mjesto gdje je Leustek osobno želio biti sahranjen. Ipak, želja mu u tom pogledu nije bila ispunjena i sahranjen je, prema želji obitelji, na groblju u Šestinama odmah pored crkve Sv. Mirka.\n\nStaza 14 jedna je od najpopuarnijih i najlakših staza za penjanje na Medvednici. Dijagram visine staze prikazuje vrlo ujednačen nagib uspona tijekom cijele trase puta. Na karti je tanjom crvenom linijom prikazana i staza 15 kao lijevi odvojak staze 14, a također postoji i manja stazica među njima gdje je moguć prijelaz s jedne na drugu stazu.\n\n\n\nPristup tramvajem\n\nTramvajem broj 15 s Mihaljevca se dolazi do predzadnje stanice Gračani (može i do zadnje stanice na Gračansko Dolje kod Tunela). Zatim se kreće prema sjeveru u Medvednicu. U blizini su temelji nekadašnje vile Rebar. Negdje skoro na pola puta (3,2 km) nalazi se planinarsko sklonište \"Adolfovac\". Nakon odmorišta šumski put ide dalje prema Činovničkoj livadi, dva puta presijeca asfaltiranu sljemensku cestu, pred sam kraj staze prolazi pored sljemenskog zdenca i dolazi do Stare lugarnice, Doma \"Željezničar\" i na koncu do Činovničke livade.\n\n\nStaza 14 jedna je od najpopuarnijih i najlakših staza za penjanje na Medvednici. Dijagram visine staze prikazuje vrlo ujednačen nagib uspona tijekom cijele trase puta. \n\nNa vrhu se nalazi televizijski toranj, gornja stanica žičare Crvenog spusta i restoran „Vidikovac“.\n\nS terase restorana je lijep pogled prema sjeverozapadu i zapadu. Lijepo se vidi dobar dio Hrvatskog Zagorja, a kada je dobra vidljivost, može se vidjeti i Triglav.', 'img/article/img_1515970904.JPG', 'Leustekova staza-Sljeme', '2018-01-09 16:14:44', '2018-01-14 23:01:45', 3, 1, 1),
(15, 35, 13, 'Bitka za Rim: siječanj-lipanj 1944.', 'Bitka za Rim: siječanj-lipanj 1944.', 'Nakon osvajanja Sicilije i južne Italije te sloma talijanskog fašizma glavni cilj savezničkih snaga na južnom bojištu postao je Rim. Već krajem 1943. godine Saveznici su se nalazili 120-130 km udaljeni od Vječnoga grada, ali tu su započinjali njihovi problemi. Naime, na putu im se krajem prosinca 1943. ispriječila njemačka obrambena linija «Gustav», prevučena preko čitave širine Apeninskog poluotoka baš na njegovom najužem dijelu. Zemljište je bilo fantastično za obranu: brdovito, pošumljeno te išarano riječnim tokovima, planinskim potocima i vododerinama. Radovi na utvrđenjima počeli su još ljeti tako da su do zime, kada je Wehrmacht u povlačenju stigao do linije, ova već bila spremna. Bitka za Rim je svojim najvećim dijelom postala bitkom za liniju «Gustav», koja je pak postala općepoznata zahvaljujući operacijama protiv Monte Cassina i mostobranu kod Anzia. Tu su se njemačka grupa armija C, pod zapovjedništvom feldmaršala Alberta Kesselringa i saveznička 15. grupa armija pod zapovjedništvom generala Harolda Alexandera našle ukliještene u polugodišnjem klinču.', 'img/article/img_1515970918.jpeg', 'Bitka za Rim: siječanj-lipanj 1944.', '2018-01-10 15:08:31', '2018-01-14 23:01:59', 1, 0, 1),
(18, 35, 7, 'test', 'test', 'test', 'img/article/img_1515970938.jpg', 'test', '2018-01-14 18:51:06', '2018-01-16 16:36:14', 1, 0, 0),
(23, 35, 8, 'Operacija Maslenica', 'Operacija Maslenica', 'Operacija Maslenica', 'img/article/img_1515970949.jpg', 'Operacija Maslenica', '2018-01-14 19:07:20', '2018-01-14 23:02:32', 3, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `category_article`
--

CREATE TABLE `category_article` (
  `id_cat` int(11) UNSIGNED NOT NULL,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `active` int(11) NOT NULL DEFAULT '1',
  `parent` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category_article`
--

INSERT INTO `category_article` (`id_cat`, `name`, `active`, `parent`) VALUES
(1, 'Sport', 1, NULL),
(2, 'Tehnologije', 1, NULL),
(3, 'Povijest', 1, NULL),
(4, 'Avantura', 1, NULL),
(5, 'Nogomet', 1, 1),
(6, 'Kosarka', 0, 1),
(7, 'PHP', 1, 2),
(8, 'Domovinski rat', 1, 3),
(9, 'Planinarenje', 1, 4),
(12, 'Rukomet', 1, 1),
(13, 'Drugi sv. rat', 1, 3),
(14, 'Boks', 1, 1),
(15, 'Rijeke', 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id_c` int(11) UNSIGNED NOT NULL,
  `fk_id_u` int(11) UNSIGNED DEFAULT NULL,
  `fk_id_a` int(11) UNSIGNED NOT NULL,
  `username` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `comment` varchar(2000) COLLATE utf8_unicode_ci NOT NULL,
  `date_publication` datetime NOT NULL,
  `active` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id_c`, `fk_id_u`, `fk_id_a`, `username`, `email`, `comment`, `date_publication`, `active`) VALUES
(10, NULL, 1, 'dsa', 'aads@g.vom', 'komentar super', '2017-12-01 00:00:00', 1),
(17, NULL, 2, 'vdsv', 'dv@b.c', 'supeer', '2017-12-05 17:46:58', 1),
(18, NULL, 2, 'marko', 'marko@f.c', 'Ovo je odlično, samo naprijed!', '2017-12-06 01:08:58', 1),
(19, NULL, 2, 'pero', 'pero@d.c', 'Članak je super, također bi nadodao da, nismo razgovarali ni o kakvoj vrsti sponzorstva ili nekog ulaganja, ostali smo na istim temama kao i ranije - izvijestio nas je glavni direktor Tomislav Svetina. Toliko o tome, idemo na sportske aktualnosti. Kako je vodstvo kluba općenito zadovoljno ovim mjesecima rada Marija Cvitanovića, rezultati su, nakon ispadanja iz Europe, odlični, prednost na ljestvici velika, no je li ispunio i onaj drugi cilj, razvoj igrača i napredak u igri?', '2017-12-06 01:12:26', 1),
(20, 28, 1, 'm', 'm@m.m', 'Pa novo je što je HNS-ovo vodstvo odlučilo ubrzano razriješiti pitanje predsjednika za iduće četverogodišnje razdoblje. Ne znam kako drugima, ali meni je to jasan znak da smo kao tim ljudi koji žele raditi na promjenama upravljanja hrvatskim nogometom već napravili značajnu stvar. Da su u Kući nogometa procijenili da im nismo ozbiljna konkurencija, držali bi se najava kako će izborna Skupština biti na proljeće. I ovaj trijumfalizam koji sam primijetio kod nekih aktera u Savezu čini mi se kao da je odraz brige koju imaju za svoje pozicije…', '2017-12-06 01:15:09', 1),
(21, NULL, 1, 'nadimak', 'i@d.v', 'kaj ima\n\n\nsuper\n\n\n\n\ndobro', '2017-12-06 09:09:58', 1),
(22, NULL, 1, 'nadimak', 'g@g.v', 'jel radi?', '2017-12-06 09:15:14', 1),
(24, NULL, 1, 'test', 't@t.com', 'Komentar...', '2017-12-09 11:46:46', 1),
(26, NULL, 1, 'davor', 'sdads@cdsa.com', 'dcsfsadasdas', '2017-12-10 20:13:35', 1),
(27, NULL, 1, 'alen', 'alen@t.t', 'test', '2017-12-12 18:29:47', 1),
(28, NULL, 1, 'matej', 'm@m.vom', 'komenzat', '2017-12-13 19:37:11', 1),
(29, 35, 1, 'Marko', 'm@m.m', 'odličan članak', '2018-01-09 15:34:04', 1),
(30, NULL, 8, 'nadimak', 'uf@gl.com', 'ajmooo', '2018-01-09 22:59:20', 1),
(31, 32, 12, 'Benjo', 'benjo@benjo.hr', 'super članak', '2018-01-16 17:36:44', 1),
(32, 32, 8, 'Benjo', 'benjo@benjo.hr', 'test', '2018-01-16 20:00:37', 1);

-- --------------------------------------------------------

--
-- Table structure for table `log_views`
--

CREATE TABLE `log_views` (
  `id_log` int(10) UNSIGNED NOT NULL,
  `fk_id_a` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `log_views`
--

INSERT INTO `log_views` (`id_log`, `fk_id_a`) VALUES
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(20, 1),
(21, 1),
(23, 1),
(25, 1),
(27, 1),
(29, 1),
(30, 1),
(34, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(41, 1),
(42, 1),
(43, 1),
(44, 1),
(45, 1),
(46, 1),
(47, 1),
(48, 1),
(49, 1),
(53, 1),
(54, 1),
(55, 1),
(56, 1),
(57, 1),
(58, 1),
(59, 1),
(60, 1),
(61, 1),
(109, 1),
(124, 1),
(125, 1),
(126, 1),
(127, 1),
(128, 1),
(158, 1),
(160, 1),
(180, 1),
(181, 1),
(1, 2),
(2, 2),
(15, 2),
(16, 2),
(17, 2),
(18, 2),
(19, 2),
(22, 2),
(26, 2),
(31, 2),
(32, 2),
(64, 2),
(110, 2),
(130, 2),
(152, 2),
(159, 2),
(166, 2),
(12, 8),
(13, 8),
(14, 8),
(24, 8),
(28, 8),
(33, 8),
(35, 8),
(50, 8),
(51, 8),
(52, 8),
(62, 8),
(63, 8),
(75, 8),
(76, 8),
(77, 8),
(78, 8),
(79, 8),
(80, 8),
(83, 8),
(84, 8),
(85, 8),
(86, 8),
(98, 8),
(99, 8),
(111, 8),
(112, 8),
(113, 8),
(114, 8),
(115, 8),
(116, 8),
(117, 8),
(118, 8),
(119, 8),
(120, 8),
(121, 8),
(122, 8),
(131, 8),
(132, 8),
(133, 8),
(134, 8),
(141, 8),
(142, 8),
(143, 8),
(144, 8),
(145, 8),
(146, 8),
(147, 8),
(148, 8),
(149, 8),
(151, 8),
(155, 8),
(156, 8),
(168, 8),
(169, 8),
(174, 8),
(175, 8),
(177, 8),
(178, 8),
(179, 8),
(65, 11),
(66, 11),
(81, 11),
(87, 11),
(88, 11),
(89, 11),
(90, 11),
(91, 11),
(92, 11),
(93, 11),
(94, 11),
(95, 11),
(67, 12),
(68, 12),
(69, 12),
(70, 12),
(71, 12),
(72, 12),
(164, 12),
(165, 12),
(171, 12),
(172, 12),
(173, 12),
(73, 14),
(74, 14),
(82, 14),
(96, 14),
(97, 14),
(100, 14),
(101, 14),
(102, 14),
(103, 14),
(104, 14),
(105, 14),
(106, 14),
(107, 14),
(108, 14),
(123, 14),
(135, 14),
(129, 15),
(154, 15),
(170, 15),
(137, 18),
(140, 18),
(153, 18),
(157, 18),
(138, 23),
(139, 23),
(150, 23),
(161, 23),
(162, 23),
(163, 23),
(167, 23),
(176, 23);

-- --------------------------------------------------------

--
-- Table structure for table `role_editor`
--

CREATE TABLE `role_editor` (
  `id_re` int(11) UNSIGNED NOT NULL,
  `fk_id_cat` int(11) UNSIGNED NOT NULL,
  `fk_id_u` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `role_editor`
--

INSERT INTO `role_editor` (`id_re`, `fk_id_cat`, `fk_id_u`) VALUES
(1, 1, 32),
(2, 2, 32),
(3, 4, 29);

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `id_r` int(11) UNSIGNED NOT NULL,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`id_r`, `name`) VALUES
(1, 'user'),
(2, 'editor'),
(3, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_u` int(11) UNSIGNED NOT NULL,
  `fk_id_r` int(11) UNSIGNED NOT NULL,
  `username` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fname` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lname` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `post_number` int(12) UNSIGNED DEFAULT NULL,
  `country` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_registration` datetime NOT NULL,
  `date_last_change` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `active` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_u`, `fk_id_r`, `username`, `email`, `password`, `fname`, `lname`, `address`, `city`, `post_number`, `country`, `date_registration`, `date_last_change`, `active`) VALUES
(1, 3, 'admin', 'admin@admin.com', '$2y$12$nO5nA9ncrOUN1ofrW53BG.KUvB1swtCx5.iQm6DB9pFurYDhsL8m.', NULL, NULL, NULL, NULL, NULL, NULL, '2017-12-08 10:41:15', '2017-12-08 09:41:15', 1),
(28, 1, 'm', 'm@m.mm', '$2y$12$nO5nA9ncrOUN1ofrW53BG.KUvB1swtCx5.iQm6DB9pFurYDhsL8m.', NULL, NULL, NULL, NULL, NULL, NULL, '2017-12-08 10:41:15', '2018-01-14 19:15:28', 1),
(29, 2, 'Gabrijel', 'gabrijel@mail.com', '$2y$12$QQcB187yGlAMpV3IR7N7SOyyTQd6GVnEZcGsC0Vr1lQsfOyYGy9DW', NULL, NULL, NULL, NULL, NULL, NULL, '2017-12-08 10:41:15', '2017-12-14 19:11:30', 1),
(30, 1, 'dsada', 'dsad@sds.com', '$2y$12$F0LMVgUtOJ/PWCXWYLHZn.xcKMRihh8ht4TbBBAldNtQnjEDiHm8G', NULL, NULL, NULL, NULL, NULL, NULL, '2017-12-08 10:41:15', '2017-12-14 15:37:41', 0),
(31, 3, 'adminčina', 'ad@a.a', '$2y$12$G/4QLs6T.FogI9WjRbliYu6KaRXejsGhoqhIHpJlP8wE.QncgxxV2', NULL, NULL, NULL, NULL, NULL, NULL, '2017-12-08 10:41:15', '2018-01-16 19:04:20', 1),
(32, 2, 'Benjo', 'benjo@benjo.hr', '$2y$12$JrnD3Ffey/r3rxoHHUo3ze1nEbYZthXKSotzAgaf08LYs7VC7w18S', NULL, NULL, NULL, NULL, NULL, NULL, '2017-12-08 10:41:15', '2018-01-16 19:04:25', 1),
(33, 1, 't@t.t', 'teo@t.t', '$2y$12$77VIDnlOSf0wRL1gBDMQX.CY9PpNuMJ2dkhFjWap7lsZpTtxzgPfm', NULL, NULL, NULL, NULL, NULL, NULL, '2017-12-08 10:41:15', '2017-12-14 15:38:23', 1),
(34, 2, 'mrki', 'marko@marko.comm', '$2y$12$bD2qQY7S00yLcPJr2PMn7eS8t7uORry4ej2E//3sngIvTZEqG6O0W', NULL, NULL, NULL, NULL, NULL, NULL, '2017-12-15 03:16:52', '2018-01-16 19:05:19', 1),
(35, 3, 'Marko', 'm@m.m', '$2y$12$JrnD3Ffey/r3rxoHHUo3ze1nEbYZthXKSotzAgaf08LYs7VC7w18S', NULL, NULL, NULL, NULL, NULL, NULL, '2017-12-25 12:57:01', '2017-12-25 11:57:41', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id_a`),
  ADD KEY `article_fk_1` (`fk_id_u`),
  ADD KEY `article_fk_2` (`fk_id_cat`);

--
-- Indexes for table `category_article`
--
ALTER TABLE `category_article`
  ADD PRIMARY KEY (`id_cat`),
  ADD KEY `category_fk_2` (`parent`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id_c`),
  ADD KEY `comment_fk_1` (`fk_id_u`),
  ADD KEY `comment_fk_2` (`fk_id_a`);

--
-- Indexes for table `log_views`
--
ALTER TABLE `log_views`
  ADD PRIMARY KEY (`id_log`),
  ADD KEY `log_fk_1` (`fk_id_a`);

--
-- Indexes for table `role_editor`
--
ALTER TABLE `role_editor`
  ADD PRIMARY KEY (`id_re`),
  ADD KEY `editor_fk_1` (`fk_id_cat`),
  ADD KEY `editor_fk_2` (`fk_id_u`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id_r`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_u`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `user_fk_1` (`fk_id_r`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `id_a` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `category_article`
--
ALTER TABLE `category_article`
  MODIFY `id_cat` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id_c` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `log_views`
--
ALTER TABLE `log_views`
  MODIFY `id_log` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=182;

--
-- AUTO_INCREMENT for table `role_editor`
--
ALTER TABLE `role_editor`
  MODIFY `id_re` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id_r` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_u` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `article_fk_1` FOREIGN KEY (`fk_id_u`) REFERENCES `user` (`id_u`),
  ADD CONSTRAINT `article_fk_2` FOREIGN KEY (`fk_id_cat`) REFERENCES `category_article` (`id_cat`);

--
-- Constraints for table `category_article`
--
ALTER TABLE `category_article`
  ADD CONSTRAINT `category_fk_2` FOREIGN KEY (`parent`) REFERENCES `category_article` (`id_cat`);

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_fk_1` FOREIGN KEY (`fk_id_u`) REFERENCES `user` (`id_u`),
  ADD CONSTRAINT `comment_fk_2` FOREIGN KEY (`fk_id_a`) REFERENCES `article` (`id_a`);

--
-- Constraints for table `log_views`
--
ALTER TABLE `log_views`
  ADD CONSTRAINT `log_fk_1` FOREIGN KEY (`fk_id_a`) REFERENCES `article` (`id_a`);

--
-- Constraints for table `role_editor`
--
ALTER TABLE `role_editor`
  ADD CONSTRAINT `editor_fk_1` FOREIGN KEY (`fk_id_cat`) REFERENCES `category_article` (`id_cat`),
  ADD CONSTRAINT `editor_fk_2` FOREIGN KEY (`fk_id_u`) REFERENCES `user` (`id_u`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_fk_1` FOREIGN KEY (`fk_id_r`) REFERENCES `role_user` (`id_r`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
