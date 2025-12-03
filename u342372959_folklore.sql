-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 30-10-2025 a las 16:19:26
-- Versión del servidor: 11.8.3-MariaDB-log
-- Versión de PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `u342372959_folklore`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `albums`
--

CREATE TABLE `albums` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(60) NOT NULL,
  `slug` varchar(191) DEFAULT NULL,
  `cover_image` varchar(191) NOT NULL,
  `description` text DEFAULT NULL,
  `status` enum('publish','draft') DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `artistas`
--

CREATE TABLE `artistas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(60) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `thumbnail` varchar(191) NOT NULL,
  `description` varchar(191) NOT NULL,
  `content` text NOT NULL,
  `status` enum('publish','draft') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `artistas`
--

INSERT INTO `artistas` (`id`, `title`, `slug`, `thumbnail`, `description`, `content`, `status`, `created_at`, `updated_at`, `user_id`) VALUES
(1, 'Perlita de Huaral', 'Perlita de Huaral', '/storage/photos/1/artistas/perlita_huaral/perlita.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', '<p><span class=\"textos\">En el ambiente de la m&uacute;sica folkl&oacute;rica a&uacute;n sigue brind&aacute;ndonos su excelente voz durante 28 a&ntilde;os con sus mejores temas la gran int&eacute;rprete PERLITA DE HUARAL, que retorn&ograve; por la puerta grande al movimiento de la m&uacute;sica andina despu&eacute;s de haber estado padeciendo de una enfermedad que la alej&oacute; moment&aacute;neamente del ambiente art&iacute;stico. </span></p>\r\n<p><span class=\"textos\">ELVIRA POMA CASIMIRO, o conocida art&iacute;sticamente como PERLITA DE HUARAL es una de las m&aacute;s importantes cantantes del g&eacute;nero andino, que viene luchando con mucha humildad para demostrar que sigue vigente con sus hermosas canciones que llegan al coraz&oacute;n y al alma de todos los peruanos que la han admirado y siguen admirando por su privilegiada voz que posee. </span></p>\r\n<p><span class=\"textos\">PERLITA DE HUARAL, se inicia como cantante a los cinco a&ntilde;os cuando era una estudiante, era la preferida de todas las veladas escolares, ella tiene como ejemplo a su se&ntilde;or padre que fue un prestigioso violinista de gran popularidad en su tierra, el le ense&ntilde;o las artes del canto, la gui&oacute; para que sea una int&eacute;rprete humilde, pero emprendedora, que sea ella misma que lleve su arte con calidad, pero un fatal accidente ceg&oacute; la vida de su padre y ella al quedar sola, se inspira y compone una canci&oacute;n dedicada a su padre. Termina la secundaria, se viene a la capital con el fin de estudiar una carrera en la Universidad , pero m&aacute;s su pasi&oacute;n era la m&uacute;sica y concursa en el a&ntilde;o 1980 en el programa radial \"SOL EN LOS ANDES\" que se emit&iacute;a por radio El Sol bajo la direcci&oacute;n de Luis Pizarro Cerr&oacute;n, desde aqu&iacute; comienza su carrera ascendente, y le llegan contratos para realizar presentaciones en todo el pa&iacute;s. Graba sus primeros cassettes para el sello Lira de Willy Flores, en total graba diez cassettes, todos fueron &eacute;xitos de venta, posteriormente graba cinco Lps o larga duraciones, tambi&eacute;n fueron golazos, tuvo varios 45 rpm, y despu&eacute;s graba cinco Cds. Actualmente esta presentando su NUEVO Cd, en la cual est&aacute;n sus mejores canciones que hoy son tarareados por sus fans en todo el territorio nacional, PERLITA DE HUARAL es una de las pocas int&eacute;pretes que tienen profesionalismo y calidad interpretando nuestro rico huayno, ella siempre se ha mantenido al margen de los esc&aacute;ndalos, siempre ha crecido como artista y como int&eacute;rprete, desde sus inicios supo ganarse el cari&ntilde;o del p&uacute;blico en general, gracias a su melodiosa voz y el romanticismo que lleva dentro de ella ha sido llamada con justicia \" LA VOZ ROMANTICA DEL FOLKLORE\", ya que en cada una de sus canciones lo hace con mucho sentimiento de amor que llegan al coraz&oacute;n.</span></p>\r\n<p>PERLITA DE HUARAL, en estos momentos sigue trabajando con mucha humildad, de ah&igrave; que siga siendo aclamada por todo el PERU, adem&aacute;s siga siendo LA UNICA VOZ MAS IMPORTANTE DEL HUAYNO EN TODO EL PA&Iacute;S.<br />PERLITA DE HURAL, celebra a lo grande sus 28 a&ntilde;os de VIDA ARTISTICA, el s&agrave;bado 14 de febrero del 2009 en el local OLIMPO DE COMAS. Y tendr&agrave; como invitada a grandes luminarias del folklore peruano, que sin duda le dar&agrave;n realce a estos 28 a&ntilde;os de vida art&igrave;stica. Esta s&ugrave;per fiesta arranca a partir de las 6.00 de la tarde hasta las &ugrave;ltimas consecuencias, teniendo como estrella a la agasajada PERLITA DE HUARAL, que sigue vigente como hace 28 a&ntilde;os cuando sale por primera vez a los escenarios, QUE SIGAN LOS EXITOS PERLITA DE HUARAL.</p>', 'publish', '2022-08-25 20:28:55', '2022-08-26 21:05:44', 1),
(2, 'Ruso del Arpa', 'Ruso del Arpa', '/storage/photos/1/artistas/ruso_del_arpa/rusmell.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. C', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras sem nisl, porttitor sit amet viverra vel, consequat quis massa. Pellentesque quis tempus augue, et luctus lectus. Etiam malesuada posuere urna non elementum. Nam in maximus justo, ut finibus lorem. Nam porta dolor lorem, ac mattis neque consectetur nec. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce iaculis aliquet diam sit amet lacinia. Aenean fringilla libero odio. Etiam eget nisl id justo venenatis interdum. Proin ut magna quis eros egestas laoreet ut in arcu. Curabitur laoreet efficitur lacus eu elementum. Fusce non sem et tellus accumsan bibendum pulvinar id neque. Etiam eu tincidunt tortor. Phasellus a massa dolor.</p>\r\n<p>Nunc sed feugiat nisi. Integer ligula libero, venenatis nec ipsum nec, blandit elementum metus. Donec imperdiet felis diam, vitae feugiat erat convallis eget. In varius lorem eu aliquet bibendum. Sed mollis, eros vel sagittis aliquam, nunc enim mattis neque, ut rutrum metus purus et lorem. Cras et elit eleifend, sollicitudin augue nec, laoreet sem. Nam efficitur nisl magna, in ultricies nibh vulputate in. Integer sed leo sollicitudin, condimentum arcu sed, sodales eros. Cras et lorem lobortis, ornare nisl aliquet, mollis tortor. Pellentesque congue maximus enim vitae placerat. Vestibulum elementum porta libero, vitae eleifend diam consectetur ac. Maecenas porttitor facilisis erat at aliquet. Aliquam erat volutpat. Vestibulum tristique, augue ut tristique ornare, odio dolor vehicula purus, eu fringilla dolor arcu ut purus. Suspendisse id erat malesuada, tincidunt eros sed, dignissim dui.</p>', 'publish', '2022-08-25 20:39:20', '2022-08-26 21:07:10', 1),
(3, 'Karen Riques', 'Karen Riques', '/storage/photos/1/artistas/karen_riques/karen_riques.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras sem nisl, porttitor sit amet viverra vel, consequat quis massa.', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras sem nisl, porttitor sit amet viverra vel, consequat quis massa. Pellentesque quis tempus augue, et luctus lectus. Etiam malesuada posuere urna non elementum. Nam in maximus justo, ut finibus lorem. Nam porta dolor lorem, ac mattis neque consectetur nec. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce iaculis aliquet diam sit amet lacinia. Aenean fringilla libero odio. Etiam eget nisl id justo venenatis interdum. Proin ut magna quis eros egestas laoreet ut in arcu. Curabitur laoreet efficitur lacus eu elementum. Fusce non sem et tellus accumsan bibendum pulvinar id neque. Etiam eu tincidunt tortor. Phasellus a massa dolor.</p>\r\n<p>Nunc sed feugiat nisi. Integer ligula libero, venenatis nec ipsum nec, blandit elementum metus. Donec imperdiet felis diam, vitae feugiat erat convallis eget. In varius lorem eu aliquet bibendum. Sed mollis, eros vel sagittis aliquam, nunc enim mattis neque, ut rutrum metus purus et lorem. Cras et elit eleifend, sollicitudin augue nec, laoreet sem. Nam efficitur nisl magna, in ultricies nibh vulputate in. Integer sed leo sollicitudin, condimentum arcu sed, sodales eros. Cras et lorem lobortis, ornare nisl aliquet, mollis tortor. Pellentesque congue maximus enim vitae placerat. Vestibulum elementum porta libero, vitae eleifend diam consectetur ac. Maecenas porttitor facilisis erat at aliquet. Aliquam erat volutpat. Vestibulum tristique, augue ut tristique ornare, odio dolor vehicula purus, eu fringilla dolor arcu ut purus. Suspendisse id erat malesuada, tincidunt eros sed, dignissim dui.</p>\r\n<p>Integer venenatis elit at lorem cursus, vitae efficitur nunc tincidunt. Curabitur ac erat tellus. Nunc congue sem sed fringilla tincidunt. Praesent ultrices quam vel urna mattis faucibus. Etiam tempor tellus in sapien hendrerit interdum. Maecenas eget egestas quam. Ut in sapien id risus dignissim auctor sit amet nec quam.</p>\r\n<p>Fusce est orci, volutpat hendrerit posuere at, dignissim eu turpis. Suspendisse a eros magna. Duis dignissim ligula ac ultricies placerat. Etiam a eleifend metus. Maecenas eget dui non velit laoreet vulputate sit amet eu justo. Nullam non sem in elit facilisis aliquet ut sed augue. Duis nec mi ut leo suscipit lacinia. Fusce feugiat vehicula nulla sit amet tincidunt. Nulla scelerisque dapibus risus, quis pretium massa placerat eget. Aliquam pharetra massa quis tellus volutpat mollis. Vestibulum elementum turpis sit amet dui iaculis commodo. Fusce id pretium orci. Mauris nec molestie mi.</p>', 'publish', '2022-08-25 20:48:28', '2022-09-01 01:07:33', 1),
(4, 'Maricruz Tamayo', 'maricruz-tamayo', '/storage/photos/1/artistas/maricruz_tamayo/maricruz.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam tristique auctor lorem. Nulla rhoncus sagittis sodales. Nam eu sagittis erat. Nullam at dui et elit lacinia faucibus. Nunc porttitor facilisis quam quis molestie. Ut mattis a massa a porttitor. Phasellus efficitur eleifend posuere.</p>', 'publish', '2022-08-26 21:05:11', '2022-08-26 21:17:38', 1),
(5, 'Ernesto Vallejo', 'Ernesto Vallejo', '/storage/photos/1/artistas/ernesto_vallejo/ernesto-vallejo.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam tristique auctor lorem.', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam tristique auctor lorem. Nulla rhoncus sagittis sodales. Nam eu sagittis erat. Nullam at dui et elit lacinia faucibus. Nunc porttitor facilisis quam quis molestie. Ut mattis a massa a porttitor. Phasellus efficitur eleifend posuere.</p>', 'publish', '2022-08-26 21:40:40', '2022-08-26 21:40:40', 1),
(6, 'Pelayo Vallejo', 'pelayo-vallejo', '/storage/photos/1/artistas/pelayo_vallejo/pelayo.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam tristique auctor lorem. Nulla rhoncus sagittis sodales.', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam tristique auctor lorem. Nulla rhoncus sagittis sodales. Nam eu sagittis erat. Nullam at dui et elit lacinia faucibus. Nunc porttitor facilisis quam quis molestie. Ut mattis a massa a porttitor. Phasellus efficitur eleifend posuere.</p>', 'publish', '2022-08-26 21:52:18', '2022-08-26 21:56:49', 1),
(7, 'Flor del canipaco', 'Flor del canipaco', '/storage/photos/1/artistas/flor_canicapo/flor-de-canipaco.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam tristique auctor lorem.', '<p>Nulla rhoncus sagittis sodales. Nam eu sagittis erat. Nullam at dui et elit lacinia faucibus. Nunc porttitor facilisis quam quis molestie. Ut mattis a massa a porttitor. Phasellus efficitur eleifend posuere.</p>', 'publish', '2022-08-26 22:21:06', '2022-08-26 22:21:06', 1),
(8, 'Flor pucarina', 'Flor pucarina', '/storage/photos/1/artistas/flor_pucarina/flor-pucarina.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam tristique auctor lorem. Nulla rhoncus sagittis sodales. Nam eu sagittis erat. Nullam at dui et elit lacinia faucibus.', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam tristique auctor lorem. Nulla rhoncus sagittis sodales. Nam eu sagittis erat. Nullam at dui et elit lacinia faucibus. Nunc porttitor facilisis quam quis molestie. Ut mattis a massa a porttitor. Phasellus efficitur eleifend posuere.</p>', 'publish', '2022-08-26 22:24:58', '2022-08-26 22:24:58', 1),
(9, 'Jose Villa Tito', 'jose-villa-tito', '/storage/photos/1/artistas/jose_villa_tito/jose-villa-tito.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin dapibus, mauris in dictum ullamcorper, tortor purus lacinia justo, sit amet tempor purus libero ut urna. Cras nec eros sagittis, suscipit nulla sit amet, volutpat augue. Nunc vulputate pellentesque augue, at vulputate lacus egestas vitae. Nulla auctor nisi et ante viverra viverra. Sed interdum cursus dolor, id ullamcorper quam gravida non. Quisque at sem id diam aliquam scelerisque eget quis lectus. Donec a feugiat urna, sed faucibus turpis. Nunc vestibulum nisi velit, vitae vestibulum neque ultricies vel. Sed dignissim malesuada arcu ac pretium. Quisque sit amet vehicula sem, vel hendrerit nisl. Praesent dictum, massa vel ornare varius, ipsum sem laoreet urna, non vehicula turpis ante eu purus. Sed sodales hendrerit malesuada. Mauris imperdiet et enim in rhoncus. Integer libero nulla, iaculis sit amet diam id, venenatis sollicitudin est. In fermentum, ipsum quis vehicula pellentesque, nisi mi sodales nisi, et ultricies ligula risus sed turpis. Nam eget eleifend magna.</p>', 'publish', '2022-08-31 13:06:11', '2022-08-31 13:06:11', 1),
(10, 'Las Hermanas Mendoza', 'Las Hermanas Mendoza', '/storage/photos/1/artistas/hermanas_mendoza/las-hermana-mendoza.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin dapibus,', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin dapibus, mauris in dictum ullamcorper, tortor purus lacinia justo, sit amet tempor purus libero ut urna. Cras nec eros sagittis, suscipit nulla sit amet, volutpat augue. Nunc vulputate pellentesque augue, at vulputate lacus egestas vitae. Nulla auctor nisi et ante viverra viverra. Sed interdum cursus dolor, id ullamcorper quam gravida non. Quisque at sem id diam aliquam scelerisque eget quis lectus. Donec a feugiat urna, sed faucibus turpis. Nunc vestibulum nisi velit, vitae vestibulum neque ultricies vel. Sed dignissim malesuada arcu ac pretium. Quisque sit amet vehicula sem, vel hendrerit nisl. Praesent dictum, massa vel ornare varius, ipsum sem laoreet urna, non vehicula turpis ante eu purus. Sed sodales hendrerit malesuada. Mauris imperdiet et enim in rhoncus. Integer libero nulla, iaculis sit amet diam id, venenatis sollicitudin est. In fermentum, ipsum quis vehicula pellentesque, nisi mi sodales nisi, et ultricies ligula risus sed turpis. Nam eget eleifend magna.</p>', 'publish', '2022-08-31 13:51:18', '2022-08-31 13:51:18', 1),
(11, 'Edgardo mendoza Juan de Dios', 'edgardo-mendoza-juan-de-dios', '/storage/photos/1/artistas/edgardo_mendoza_juan_dios/juan-de-Dios.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. P', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin dapibus, mauris in dictum ullamcorper, tortor purus lacinia justo, sit amet tempor purus libero ut urna. Cras nec eros sagittis, suscipit nulla sit amet, volutpat augue. Nunc vulputate pellentesque augue, at vulputate lacus egestas vitae. Nulla auctor nisi et ante viverra viverra. Sed interdum cursus dolor, id ullamcorper quam gravida non. Quisque at sem id diam aliquam scelerisque eget quis lectus. Donec a feugiat urna, sed faucibus turpis. Nunc vestibulum nisi velit, vitae vestibulum neque ultricies vel. Sed dignissim malesuada arcu ac pretium. Quisque sit amet vehicula sem, vel hendrerit nisl. Praesent dictum, massa vel ornare varius, ipsum sem laoreet urna, non vehicula turpis ante eu purus. Sed sodales hendrerit malesuada. Mauris imperdiet et enim in rhoncus. Integer libero nulla, iaculis sit amet diam id, venenatis sollicitudin est. In fermentum, ipsum quis vehicula pellentesque, nisi mi sodales nisi, et ultricies ligula risus sed turpis. Nam eget eleifend magna.</p>', 'publish', '2022-08-31 14:26:05', '2022-08-31 14:26:05', 1),
(12, 'Jhon Rufino', 'jhon-rufino', '/storage/photos/1/artistas/jhon_rufino/john-rufino.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus viverra sodales tellus, in volutpat diam tincidunt non. Suspendisse luctus dui a semper rutrum. Ut finibus eros nec ex mollis, ut ullamcorper neque sollicitudin. Nullam mi elit, malesuada in ante et, iaculis facilisis purus. Etiam tincidunt quam eu mattis ornare. Maecenas posuere varius est ac accumsan. Suspendisse tristique a justo fringilla mollis. Donec laoreet sollicitudin ex, a vulputate ante mattis in. Sed nec molestie massa. In non libero enim. Mauris non erat varius, scelerisque erat quis, semper libero.</p>\r\n<p>Morbi pharetra orci vitae convallis gravida. Suspendisse tincidunt, risus quis luctus consequat, eros arcu vehicula lorem, a tempus nunc arcu eu enim. Quisque eleifend purus justo, at fringilla mi blandit eu. Suspendisse eu pretium purus. Donec metus massa, pretium eleifend rhoncus vel, imperdiet ac mauris. Curabitur metus mi, dignissim ac malesuada venenatis, efficitur ut urna. Mauris non est nisi. Suspendisse convallis nunc a sodales aliquam. Cras vehicula rhoncus ultricies. Sed at velit sed ipsum varius tempor. Aliquam congue ac turpis quis dictum. Praesent a felis non nisl porta ultricies. Integer porttitor eu mi non vestibulum.</p>', 'publish', '2022-08-31 19:31:48', '2022-08-31 19:31:48', 1),
(13, 'Jazmin Lopez Cotrina', 'jazmin-lopez-cotrina', '/storage/photos/1/artistas/jazmin_lopez_cotrina/jasmin.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus viverra sodales tellus, in volutpat diam tincidunt non. Suspendisse luctus dui a semper rutrum. Ut finibus eros nec ex mollis, ut ullamcorper neque sollicitudin. Nullam mi elit, malesuada in ante et, iaculis facilisis purus. Etiam tincidunt quam eu mattis ornare. Maecenas posuere varius est ac accumsan. Suspendisse tristique a justo fringilla mollis. Donec laoreet sollicitudin ex, a vulputate ante mattis in. Sed nec molestie massa. In non libero enim. Mauris non erat varius, scelerisque erat quis, semper libero.</p>\r\n<p>Morbi pharetra orci vitae convallis gravida. Suspendisse tincidunt, risus quis luctus consequat, eros arcu vehicula lorem, a tempus nunc arcu eu enim. Quisque eleifend purus justo, at fringilla mi blandit eu. Suspendisse eu pretium purus. Donec metus massa, pretium eleifend rhoncus vel, imperdiet ac mauris. Curabitur metus mi, dignissim ac malesuada venenatis, efficitur ut urna. Mauris non est nisi. Suspendisse convallis nunc a sodales aliquam. Cras vehicula rhoncus ultricies. Sed at velit sed ipsum varius tempor. Aliquam congue ac turpis quis dictum. Praesent a felis non nisl porta ultricies. Integer porttitor eu mi non vestibulum.</p>', 'publish', '2022-08-31 19:40:27', '2022-08-31 19:40:27', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `artista_category`
--

CREATE TABLE `artista_category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `artista_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `artista_category`
--

INSERT INTO `artista_category` (`id`, `category_id`, `artista_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2022-08-25 20:28:55', '2022-08-25 20:28:55'),
(2, 4, 2, '2022-08-25 20:39:20', '2022-08-25 20:39:20'),
(3, 1, 3, '2022-08-25 20:48:28', '2022-08-25 20:48:28'),
(4, 1, 4, '2022-08-26 21:05:11', '2022-08-26 21:05:11'),
(5, 1, 5, '2022-08-26 21:40:40', '2022-08-26 21:40:40'),
(6, 5, 6, '2022-08-26 21:52:18', '2022-08-26 21:52:18'),
(7, 1, 7, '2022-08-26 22:21:06', '2022-08-26 22:21:06'),
(8, 1, 8, '2022-08-26 22:24:58', '2022-08-26 22:24:58'),
(9, 1, 9, '2022-08-31 13:06:11', '2022-08-31 13:06:11'),
(10, 1, 10, '2022-08-31 13:51:18', '2022-08-31 13:51:18'),
(11, 1, 11, '2022-08-31 14:26:06', '2022-08-31 14:26:06'),
(12, 1, 12, '2022-08-31 19:31:48', '2022-08-31 19:31:48'),
(13, 1, 13, '2022-08-31 19:40:27', '2022-08-31 19:40:27');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `artista_tag`
--

CREATE TABLE `artista_tag` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `artista_id` bigint(20) UNSIGNED NOT NULL,
  `tag_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `artista_tag`
--

INSERT INTO `artista_tag` (`id`, `artista_id`, `tag_id`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '2022-08-25 20:28:55', '2022-08-25 20:28:55'),
(2, 2, 2, '2022-08-25 20:39:20', '2022-08-25 20:39:20'),
(3, 3, 2, '2022-08-25 20:48:28', '2022-08-25 20:48:28'),
(4, 3, 4, '2022-08-25 20:48:28', '2022-08-25 20:48:28'),
(5, 4, 2, '2022-08-26 21:05:11', '2022-08-26 21:05:11'),
(6, 5, 2, '2022-08-26 21:40:40', '2022-08-26 21:40:40'),
(7, 5, 4, '2022-08-26 21:40:40', '2022-08-26 21:40:40'),
(8, 6, 2, '2022-08-26 21:52:18', '2022-08-26 21:52:18'),
(9, 7, 3, '2022-08-26 22:21:06', '2022-08-26 22:21:06'),
(10, 8, 2, '2022-08-26 22:24:58', '2022-08-26 22:24:58'),
(11, 9, 2, '2022-08-31 13:06:11', '2022-08-31 13:06:11'),
(12, 10, 1, '2022-08-31 13:51:18', '2022-08-31 13:51:18'),
(13, 11, 2, '2022-08-31 14:26:06', '2022-08-31 14:26:06'),
(14, 12, 1, '2022-08-31 19:31:48', '2022-08-31 19:31:48'),
(15, 13, 1, '2022-08-31 19:40:27', '2022-08-31 19:40:27');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(60) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `thumbnail` varchar(191) NOT NULL,
  `description` varchar(191) NOT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`id`, `title`, `slug`, `thumbnail`, `description`, `parent_id`, `created_at`, `updated_at`) VALUES
(1, 'Huayno', 'huayno', '/noimage.jpg', 'HTML adalah singkatan dari Hypertext Markup Language', NULL, '2022-08-16 22:49:07', '2022-08-31 19:54:21'),
(4, 'Arpa', 'arpa', '/noimage.jpg', 'CSS atau Cascading Style Sheets adalah salah satu topik yang harus diketahui dalam pengembangan website.', NULL, '2022-08-16 22:49:07', '2022-08-31 19:54:36'),
(5, 'Orquesta', 'orquesta', '/noimage.jpg', 'JavaScript adalah salah satu bahasa pemrograman yang sering digunakan oleh website programmer atau website developer.', NULL, '2022-08-16 22:49:07', '2022-08-31 20:09:59'),
(6, 'Banda', 'banda', '/noimage.jpg', 'Hypertext Preprocessor adalah bahasa skrip yang dapat ditanamkan atau', NULL, '2022-08-16 22:49:07', '2022-08-31 20:26:45'),
(7, 'Requinto', 'requinto', '/storage/photos/1/generos/chachapoyas-01.jpg', 'ererere erer', NULL, '2022-08-31 20:27:08', '2022-08-31 20:27:08'),
(8, 'Huaylash', 'huaylash', '/storage/photos/1/generos/chachapoyas-01.jpg', 'dre er ererer', NULL, '2022-08-31 20:27:32', '2022-08-31 20:27:32');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contactos`
--

CREATE TABLE `contactos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombres` varchar(191) DEFAULT NULL,
  `telefono` varchar(191) DEFAULT NULL,
  `email` varchar(191) DEFAULT NULL,
  `direccion` varchar(191) DEFAULT NULL,
  `ciudad` varchar(191) DEFAULT NULL,
  `pais` varchar(191) DEFAULT NULL,
  `consulta` text DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE `eventos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(60) NOT NULL,
  `slug` varchar(191) DEFAULT NULL,
  `cover_image` varchar(191) NOT NULL,
  `description` text DEFAULT NULL,
  `content` text DEFAULT NULL,
  `status` enum('publish','draft') DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`id`, `name`, `slug`, `cover_image`, `description`, `content`, `status`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Evento 01', 'evento-01', '/storage/photos/1/eventos/cusco-peru-01.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis augue erat, in pellentesque', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis augue erat, in pellentesque magna porta sed. In sodales imperdiet risus eu pulvinar. Praesent accumsan nibh non ornare faucibus. Pellentesque quis enim elit. Pellentesque semper ex a vehicula vulputate. Integer vitae mauris aliquam, porttitor tellus sed, fermentum nunc. Integer tempus ligula lorem, quis gravida ex egestas in. Fusce vitae tincidunt erat. Praesent augue justo, auctor ut nibh id, tristique volutpat ex.</p>', 'publish', 1, '2022-08-24 22:31:20', '2022-08-24 22:31:20'),
(2, 'Evento 02', 'evento-02', '/storage/photos/1/eventos/cusco-peru-02.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis augue erat, in pellentesque', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis augue erat, in pellentesque magna porta sed. In sodales imperdiet risus eu pulvinar. Praesent accumsan nibh non ornare faucibus. Pellentesque quis enim elit. Pellentesque semper ex a vehicula vulputate. Integer vitae mauris aliquam, porttitor tellus sed, fermentum nunc. Integer tempus ligula lorem, quis gravida ex egestas in. Fusce vitae tincidunt erat. Praesent augue justo, auctor ut nibh id, tristique volutpat ex.</p>', 'publish', 1, '2022-08-24 22:31:47', '2022-08-24 22:31:47'),
(3, 'Evento 03', 'evento-03', '/storage/photos/1/eventos/cusco-peru-03.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis augue erat, in pellentesque', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis augue erat, in pellentesque magna porta sed. In sodales imperdiet risus eu pulvinar. Praesent accumsan nibh non ornare faucibus. Pellentesque quis enim elit. Pellentesque semper ex a vehicula vulputate. Integer vitae mauris aliquam, porttitor tellus sed, fermentum nunc. Integer tempus ligula lorem, quis gravida ex egestas in. Fusce vitae tincidunt erat. Praesent augue justo, auctor ut nibh id, tristique volutpat ex.</p>', 'publish', 1, '2022-08-24 22:32:15', '2022-08-24 22:32:15'),
(4, 'Evento 04', 'evento-04', '/storage/photos/1/eventos/cusco-peru-04.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis augue erat, in pellentesque', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis augue erat, in pellentesque magna porta sed. In sodales imperdiet risus eu pulvinar. Praesent accumsan nibh non ornare faucibus. Pellentesque quis enim elit. Pellentesque semper ex a vehicula vulputate. Integer vitae mauris aliquam, porttitor tellus sed, fermentum nunc. Integer tempus ligula lorem, quis gravida ex egestas in. Fusce vitae tincidunt erat. Praesent augue justo, auctor ut nibh id, tristique volutpat ex.</p>', 'publish', 1, '2022-08-24 22:34:14', '2022-08-24 22:34:14'),
(5, 'Evento 05', 'evento-05', '/storage/photos/1/eventos/cusco-peru-05.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis augue erat, in pellentesque', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis augue erat, in pellentesque magna porta sed. In sodales imperdiet risus eu pulvinar. Praesent accumsan nibh non ornare faucibus. Pellentesque quis enim elit. Pellentesque semper ex a vehicula vulputate. Integer vitae mauris aliquam, porttitor tellus sed, fermentum nunc. Integer tempus ligula lorem, quis gravida ex egestas in. Fusce vitae tincidunt erat. Praesent augue justo, auctor ut nibh id, tristique volutpat ex.</p>', 'publish', 1, '2022-08-24 22:34:46', '2022-08-24 22:34:46');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(158, '2014_10_12_100000_create_password_resets_table', 1),
(159, '2014_11_26_182228_create_categories_table', 1),
(160, '2015_01_10_000000_create_users_table', 1),
(161, '2019_08_19_000000_create_failed_jobs_table', 1),
(162, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(163, '2022_01_26_161759_create_tags_table', 1),
(164, '2022_06_07_165603_create_artistas_table', 1),
(165, '2022_06_07_172030_create_artista_tag_table', 1),
(166, '2022_06_07_172041_create_category_artista_table', 1),
(167, '2022_06_14_164358_create_permission_tables', 1),
(168, '2022_08_02_091314_create_albums_table', 1),
(169, '2022_08_02_092107_create_photos_table', 1),
(170, '2022_08_05_160918_create_noticias_table', 1),
(171, '2022_08_08_101641_create_eventos_table', 1),
(172, '2022_08_11_112552_create_sliders_table', 1),
(173, '2022_08_12_153106_create_contactos_table', 1),
(174, '2022_08_13_101336_create_videos_table', 1),
(175, '2022_08_16_154206_create_profiles_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--

CREATE TABLE `noticias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(60) NOT NULL,
  `slug` varchar(191) DEFAULT NULL,
  `cover_image` varchar(191) NOT NULL,
  `description` text DEFAULT NULL,
  `content` text DEFAULT NULL,
  `status` enum('publish','draft') DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `noticias`
--

INSERT INTO `noticias` (`id`, `name`, `slug`, `cover_image`, `description`, `content`, `status`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Gregor then around nower deep out the window', 'gregor-then-around-nower-deep-out-the-window', '/storage/photos/1/noticias/Aruba-Antillas-02.jpg', 'mi descripcion va aqui', '<div id=\"bannerR\">\r\n<div id=\"div-gpt-ad-1474537762122-3\" data-google-query-id=\"CLTh3oqt2_kCFVY5uQYdCgoKkg\">\r\n<div id=\"google_ads_iframe_/15188745,22440292294/Lipsum-Unit4_0__container__\"></div>\r\n</div>\r\n</div>\r\n<div class=\"boxed\">\r\n<div id=\"lipsum\">\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc elementum quis metus eget hendrerit. Sed nec venenatis libero. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Duis felis odio, condimentum id lectus vel, luctus rutrum nisl. Duis fermentum ut tellus nec commodo. Cras a nisl dignissim, posuere diam at, iaculis nulla. Donec dignissim, elit in ultrices fermentum, sapien risus tempor turpis, ac varius tortor justo vel arcu. Phasellus non porttitor nisl. Aenean consequat magna at bibendum gravida.</p>\r\n</div>\r\n</div>', 'publish', 1, '2022-08-22 21:06:35', '2022-08-22 22:26:18'),
(2, 'Gregor then around nower deep out the windows', 'gregor-then-around-nower-deep-out-the-windows', '/storage/photos/1/noticias/Aruba-Antillas-03.jpg', 'aqui va mi descripcion', '<div id=\"bannerR\">\r\n<div id=\"div-gpt-ad-1474537762122-3\" data-google-query-id=\"CLTh3oqt2_kCFVY5uQYdCgoKkg\">\r\n<div id=\"google_ads_iframe_/15188745,22440292294/Lipsum-Unit4_0__container__\"></div>\r\n</div>\r\n</div>\r\n<div class=\"boxed\">\r\n<div id=\"lipsum\">\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc elementum quis metus eget hendrerit. Sed nec venenatis libero. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Duis felis odio, condimentum id lectus vel, luctus rutrum nisl. Duis fermentum ut tellus nec commodo. Cras a nisl dignissim, posuere diam at, iaculis nulla. Donec dignissim, elit in ultrices fermentum, sapien risus tempor turpis, ac varius tortor justo vel arcu. Phasellus non porttitor nisl. Aenean consequat magna at bibendum gravida.</p>\r\n</div>\r\n</div>', 'publish', 1, '2022-08-22 21:07:00', '2022-08-22 22:26:34'),
(3, 'Gregor then arond nower deep out the window', 'gregor-then-arond-nower-deep-out-the-window', '/storage/photos/1/noticias/Aruba-Antillas-04.jpg', 'aqui va mi descripcion', '<div id=\"bannerR\">\r\n<div id=\"div-gpt-ad-1474537762122-3\" data-google-query-id=\"CLTh3oqt2_kCFVY5uQYdCgoKkg\">\r\n<div id=\"google_ads_iframe_/15188745,22440292294/Lipsum-Unit4_0__container__\"></div>\r\n</div>\r\n</div>\r\n<div class=\"boxed\">\r\n<div id=\"lipsum\">\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc elementum quis metus eget hendrerit. Sed nec venenatis libero. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Duis felis odio, condimentum id lectus vel, luctus rutrum nisl. Duis fermentum ut tellus nec commodo. Cras a nisl dignissim, posuere diam at, iaculis nulla. Donec dignissim, elit in ultrices fermentum, sapien risus tempor turpis, ac varius tortor justo vel arcu. Phasellus non porttitor nisl. Aenean consequat magna at bibendum gravida.</p>\r\n</div>\r\n</div>', 'publish', 1, '2022-08-22 21:07:24', '2022-08-22 22:26:57'),
(4, 'Gregor then around nower deep out the windo', 'gregor-then-around-nower-deep-out-the-windo', '/storage/photos/1/noticias/Aruba-Antillas-05.jpg', 'aqui va mi descripcion', '<div id=\"bannerR\">\r\n<div id=\"div-gpt-ad-1474537762122-3\" data-google-query-id=\"CLTh3oqt2_kCFVY5uQYdCgoKkg\">\r\n<div id=\"google_ads_iframe_/15188745,22440292294/Lipsum-Unit4_0__container__\"></div>\r\n</div>\r\n</div>\r\n<div class=\"boxed\">\r\n<div id=\"lipsum\">\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc elementum quis metus eget hendrerit. Sed nec venenatis libero. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Duis felis odio, condimentum id lectus vel, luctus rutrum nisl. Duis fermentum ut tellus nec commodo. Cras a nisl dignissim, posuere diam at, iaculis nulla. Donec dignissim, elit in ultrices fermentum, sapien risus tempor turpis, ac varius tortor justo vel arcu. Phasellus non porttitor nisl. Aenean consequat magna at bibendum gravida.</p>\r\n</div>\r\n</div>', 'publish', 1, '2022-08-22 21:07:51', '2022-08-22 22:27:25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) NOT NULL,
  `token` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `guard_name` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'post_show', 'web', '2022-08-16 22:08:07', '2022-08-16 22:08:07'),
(2, 'post_create', 'web', '2022-08-16 22:08:07', '2022-08-16 22:08:07'),
(3, 'post_update', 'web', '2022-08-16 22:08:07', '2022-08-16 22:08:07'),
(4, 'post_detail', 'web', '2022-08-16 22:08:07', '2022-08-16 22:08:07'),
(5, 'post_delete', 'web', '2022-08-16 22:08:07', '2022-08-16 22:08:07'),
(6, 'category_show', 'web', '2022-08-16 22:08:07', '2022-08-16 22:08:07'),
(7, 'category_create', 'web', '2022-08-16 22:08:07', '2022-08-16 22:08:07'),
(8, 'category_update', 'web', '2022-08-16 22:08:07', '2022-08-16 22:08:07'),
(9, 'category_detail', 'web', '2022-08-16 22:08:07', '2022-08-16 22:08:07'),
(10, 'category_delete', 'web', '2022-08-16 22:08:07', '2022-08-16 22:08:07'),
(11, 'tag_show', 'web', '2022-08-16 22:08:07', '2022-08-16 22:08:07'),
(12, 'tag_create', 'web', '2022-08-16 22:08:07', '2022-08-16 22:08:07'),
(13, 'tag_update', 'web', '2022-08-16 22:08:07', '2022-08-16 22:08:07'),
(14, 'tag_delete', 'web', '2022-08-16 22:08:07', '2022-08-16 22:08:07'),
(15, 'role_show', 'web', '2022-08-16 22:08:07', '2022-08-16 22:08:07'),
(16, 'role_create', 'web', '2022-08-16 22:08:07', '2022-08-16 22:08:07'),
(17, 'role_update', 'web', '2022-08-16 22:08:07', '2022-08-16 22:08:07'),
(18, 'role_detail', 'web', '2022-08-16 22:08:07', '2022-08-16 22:08:07'),
(19, 'role_delete', 'web', '2022-08-16 22:08:07', '2022-08-16 22:08:07'),
(20, 'user_show', 'web', '2022-08-16 22:08:07', '2022-08-16 22:08:07'),
(21, 'user_create', 'web', '2022-08-16 22:08:07', '2022-08-16 22:08:07'),
(22, 'user_update', 'web', '2022-08-16 22:08:07', '2022-08-16 22:08:07'),
(23, 'user_detail', 'web', '2022-08-16 22:08:07', '2022-08-16 22:08:07'),
(24, 'user_delete', 'web', '2022-08-16 22:08:07', '2022-08-16 22:08:07');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `photos`
--

CREATE TABLE `photos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(60) NOT NULL,
  `photo` varchar(191) NOT NULL,
  `description` varchar(191) DEFAULT NULL,
  `size` varchar(191) DEFAULT NULL,
  `status` enum('publish','draft') DEFAULT NULL,
  `album_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profiles`
--

CREATE TABLE `profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(191) DEFAULT NULL,
  `whastapp` varchar(191) DEFAULT NULL,
  `facebook` varchar(191) DEFAULT NULL,
  `horario` varchar(191) DEFAULT NULL,
  `mapa` varchar(191) DEFAULT NULL,
  `twitter` varchar(191) DEFAULT NULL,
  `tiktok` varchar(191) DEFAULT NULL,
  `youtube` varchar(191) DEFAULT NULL,
  `instagram` varchar(191) DEFAULT NULL,
  `web` varchar(191) DEFAULT NULL,
  `message` varchar(191) DEFAULT NULL,
  `image` varchar(191) DEFAULT NULL,
  `mobile` varchar(191) DEFAULT NULL,
  `line1` varchar(191) DEFAULT NULL,
  `line2` varchar(191) DEFAULT NULL,
  `city` varchar(191) DEFAULT NULL,
  `province` varchar(191) DEFAULT NULL,
  `zipcode` varchar(191) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `guard_name` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'SuperAdmin', 'web', '2022-08-16 22:08:07', '2022-08-16 22:08:07'),
(2, 'Admin', 'web', '2022-08-16 22:08:07', '2022-08-16 22:08:07'),
(3, 'Editor', 'web', '2022-08-16 22:08:07', '2022-08-16 22:08:07');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(1, 2),
(2, 2),
(3, 2),
(4, 2),
(5, 2),
(6, 2),
(7, 2),
(8, 2),
(9, 2),
(10, 2),
(11, 2),
(12, 2),
(13, 2),
(14, 2),
(1, 3),
(2, 3),
(3, 3),
(4, 3),
(5, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(60) NOT NULL,
  `slug` varchar(191) DEFAULT NULL,
  `link` varchar(191) NOT NULL,
  `cover_image` varchar(191) NOT NULL,
  `status` enum('publish','draft') DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sliders`
--

INSERT INTO `sliders` (`id`, `name`, `slug`, `link`, `cover_image`, `status`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Titulo 01 va aqui', 'titulo-01-va-aqui', 'titulo 01', '/storage/photos/1/sliders/slide-1.jpg', 'publish', 1, '2022-08-19 19:47:37', '2022-08-22 20:00:08'),
(2, 'Titulo 02 va aqui', 'titulo-02-va-aqui', 'ddsdsd', '/storage/photos/1/sliders/slide-2.jpg', 'publish', 1, '2022-08-19 20:07:41', '2022-08-19 20:07:41'),
(3, 'Titulo 03 va aqui', 'titulo-03-va-aqui', 'SDFSDS', '/storage/photos/1/sliders/slide-3.jpg', 'publish', 1, '2022-08-19 20:08:08', '2022-08-19 20:08:08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(25) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tags`
--

INSERT INTO `tags` (`id`, `title`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Tutorial', 'tutorial', '2022-08-16 22:49:07', '2022-08-16 22:49:07'),
(2, 'HTML', 'html', '2022-08-16 22:49:07', '2022-08-16 22:49:07'),
(3, 'CSS', 'css', '2022-08-16 22:49:07', '2022-08-16 22:49:07'),
(4, 'Javascript', 'javascript', '2022-08-16 22:49:07', '2022-08-16 22:49:07'),
(5, 'Pemrograman', 'pemrograman', '2022-08-16 22:49:07', '2022-08-16 22:49:07');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'karlosystem@gmail.com', '2022-08-16 22:49:06', '$2y$10$fmTMQwRWg2R0eWlghzB3L.SxeS10HDFzSUNZDiQfxsWR2cWPJDofe', 'neeybLnhKDlqK6rkIGr1OInapnrvNVIXGeTuKPP71Z4BK2pAi2v1sFWRGqPp', '2022-08-16 22:49:07', '2022-08-16 22:49:07');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `videos`
--

CREATE TABLE `videos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(60) NOT NULL,
  `slug` varchar(191) DEFAULT NULL,
  `link` varchar(191) NOT NULL,
  `cover_image` varchar(191) NOT NULL,
  `status` enum('publish','draft') DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `videos`
--

INSERT INTO `videos` (`id`, `name`, `slug`, `link`, `cover_image`, `status`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Video 01', 'video-01', 'https://www.youtube.com/embed/ChWAsohdu0s', '/storage/photos/1/videos/perlita01.jpg', 'publish', 1, '2022-08-22 23:24:23', '2022-08-24 00:05:00'),
(2, 'Video 02', 'video-02', 'https://www.youtube.com/embed/pSCnQEieMVE', '/storage/photos/1/videos/buenos-aires-02.jpg', 'publish', 1, '2022-08-22 23:24:41', '2022-08-23 23:37:52'),
(3, 'video 03', 'video-03', 'https://www.youtube.com/embed/dFWp8tqKNdE', '/storage/photos/1/videos/buenos-aires-03.jpg', 'publish', 1, '2022-08-22 23:33:31', '2022-08-23 23:38:26'),
(4, 'Video 04', 'video-04', 'https://www.youtube.com/watch?v=i7PJayUVh_g&list=RDMMRw-fmYLnIhA&index=19', '/storage/photos/1/videos/buenos-aires-05.jpg', 'publish', 1, '2022-08-22 23:33:53', '2022-08-23 21:35:41');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `albums`
--
ALTER TABLE `albums`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `albums_slug_unique` (`slug`),
  ADD KEY `albums_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `artistas`
--
ALTER TABLE `artistas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `artistas_slug_unique` (`slug`),
  ADD KEY `artistas_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `artista_category`
--
ALTER TABLE `artista_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `artista_category_category_id_foreign` (`category_id`),
  ADD KEY `artista_category_artista_id_foreign` (`artista_id`);

--
-- Indices de la tabla `artista_tag`
--
ALTER TABLE `artista_tag`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`),
  ADD KEY `categories_parent_id_foreign` (`parent_id`);

--
-- Indices de la tabla `contactos`
--
ALTER TABLE `contactos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contactos_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `eventos_slug_unique` (`slug`),
  ADD KEY `eventos_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indices de la tabla `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indices de la tabla `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `noticias_slug_unique` (`slug`),
  ADD KEY `noticias_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `photos_album_id_foreign` (`album_id`);

--
-- Indices de la tabla `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `profiles_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indices de la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indices de la tabla `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sliders_slug_unique` (`slug`),
  ADD KEY `sliders_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tags_slug_unique` (`slug`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indices de la tabla `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `videos_slug_unique` (`slug`),
  ADD KEY `videos_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `albums`
--
ALTER TABLE `albums`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `artistas`
--
ALTER TABLE `artistas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `artista_category`
--
ALTER TABLE `artista_category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `artista_tag`
--
ALTER TABLE `artista_tag`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `contactos`
--
ALTER TABLE `contactos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=176;

--
-- AUTO_INCREMENT de la tabla `noticias`
--
ALTER TABLE `noticias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `photos`
--
ALTER TABLE `photos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `videos`
--
ALTER TABLE `videos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `albums`
--
ALTER TABLE `albums`
  ADD CONSTRAINT `albums_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `artistas`
--
ALTER TABLE `artistas`
  ADD CONSTRAINT `artistas_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `artista_category`
--
ALTER TABLE `artista_category`
  ADD CONSTRAINT `artista_category_artista_id_foreign` FOREIGN KEY (`artista_id`) REFERENCES `artistas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `artista_category_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `contactos`
--
ALTER TABLE `contactos`
  ADD CONSTRAINT `contactos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD CONSTRAINT `eventos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `noticias`
--
ALTER TABLE `noticias`
  ADD CONSTRAINT `noticias_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `photos`
--
ALTER TABLE `photos`
  ADD CONSTRAINT `photos_album_id_foreign` FOREIGN KEY (`album_id`) REFERENCES `albums` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `profiles`
--
ALTER TABLE `profiles`
  ADD CONSTRAINT `profiles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `sliders`
--
ALTER TABLE `sliders`
  ADD CONSTRAINT `sliders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `videos`
--
ALTER TABLE `videos`
  ADD CONSTRAINT `videos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
