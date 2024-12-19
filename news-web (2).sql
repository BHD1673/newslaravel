-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 23, 2024 lúc 08:30 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `news-web`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Chưa phân loại', 'alias-a-ut-cupiditate-nemo-laudantium-aut-placeat', 8, '2024-09-21 22:30:38', '2024-09-21 22:30:38'),
(2, 'Thế giới', 'voluptas-repellendus-similique-neque-atque-odio-ex', 8, '2024-09-21 22:30:38', '2024-09-21 22:30:38'),
(3, 'Xã hội', 'commodi-laborum-aliquid-atque-hic-saepe', 4, '2024-09-21 22:30:38', '2024-09-21 22:30:38'),
(4, 'Kinh tế', 'voluptate-enim-voluptas-reprehenderit-aut-nobis', 3, '2024-09-21 22:30:38', '2024-09-21 22:30:38'),
(5, 'Văn hóa', 'adipisci-quidem-architecto-ducimus-temporibus-quo-non-aut', 12, '2024-09-21 22:30:38', '2024-09-21 22:30:38'),
(6, 'Giáo dục', 'laboriosam-vel-in-nam-odit-natus-aliquid', 6, '2024-09-21 22:30:38', '2024-09-21 22:30:38'),
(7, 'Thể thao', 'quisquam-eos-est-quia-ut-autem-adipisci-magni', 3, '2024-09-21 22:30:38', '2024-09-21 22:30:38'),
(8, 'Giải trí', 'velit-error-voluptates-maiores-tempora', 13, '2024-09-21 22:30:38', '2024-09-21 22:30:38'),
(9, 'Pháp luật', 'saepe-quis-aut-saepe-cupiditate-voluptas-pariatur-non', 7, '2024-09-21 22:30:38', '2024-09-21 22:30:38'),
(10, 'Công nghệ', 'odit-nobis-velit-nisi-quae', 2, '2024-09-21 22:30:38', '2024-09-21 22:30:38'),
(11, 'Khoa học', 'nesciunt-explicabo-vel-nobis-cupiditate-pariatur', 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(12, 'Đời sống', 'laboriosam-maiores-culpa-voluptates-qui-et', 2, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(13, 'Xe cộ', 'explicabo-occaecati-omnis-temporibus-esse-sit', 3, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(14, 'Nhà đất', 'cum-deleniti-quae-rerum-odit-ea-quo-voluptatum', 2, '2024-09-21 22:30:39', '2024-09-21 22:30:39');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `the_comment` text NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `comments`
--

INSERT INTO `comments` (`id`, `the_comment`, `post_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Sed odio ullam voluptate temporibus magni. Iure dolores dolore nisi mollitia aspernatur debitis asperiores.', 90, 97, '2024-09-21 22:30:40', '2024-09-21 22:30:40'),
(2, 'At inventore dolore quos perferendis sequi est dolores qui. Velit corporis aspernatur molestiae vel corrupti doloribus. Iusto consequatur ut modi.', 197, 16, '2024-09-21 22:30:40', '2024-09-21 22:30:40'),
(3, 'Reiciendis qui quam sunt facilis esse magni. Id ut fugit voluptatum quia delectus ratione autem. Omnis nesciunt in modi aut.', 139, 57, '2024-09-21 22:30:40', '2024-09-21 22:30:40'),
(4, 'Quia et quia explicabo ullam commodi est. Consequatur eligendi velit ex perspiciatis quisquam.', 74, 56, '2024-09-21 22:30:40', '2024-09-21 22:30:40'),
(5, 'Ut eos excepturi vel. Doloribus aut vero illum accusantium. Blanditiis delectus recusandae officiis dolor.', 133, 19, '2024-09-21 22:30:40', '2024-09-21 22:30:40'),
(6, 'Veritatis sed totam tenetur assumenda. Voluptas velit a est voluptatem aspernatur magnam ipsum aperiam. Assumenda voluptatibus consequatur sunt tempore autem est deserunt rerum. Eligendi quasi voluptatem non quas nobis.', 111, 118, '2024-09-21 22:30:40', '2024-09-21 22:30:40'),
(7, 'Necessitatibus atque et molestias molestiae eos voluptates adipisci. Magni ipsum a eius adipisci. In accusamus sint magnam sed nisi. Rerum modi velit dolorem atque beatae nihil.', 143, 162, '2024-09-21 22:30:40', '2024-09-21 22:30:40'),
(8, 'Voluptas consequatur modi nesciunt explicabo vitae. Eum hic possimus voluptatum mollitia aut. Ducimus enim ut perspiciatis molestias magni voluptas aspernatur. Laboriosam odio maxime quam.', 199, 99, '2024-09-21 22:30:40', '2024-09-21 22:30:40'),
(9, 'Magni accusantium quis cupiditate et qui sed facilis. Similique et sit quod ullam in voluptatem. Eaque debitis voluptatem aut perspiciatis aut. Qui eligendi placeat tempore labore ut quaerat aut.', 97, 135, '2024-09-21 22:30:40', '2024-09-21 22:30:40'),
(10, 'Nemo et dolorem sit. Et doloribus ut corporis ex et dolorum culpa. Aut ipsam aut veniam in dolorum blanditiis harum. Dolor natus et quia fugit id.', 149, 154, '2024-09-21 22:30:40', '2024-09-21 22:30:40'),
(11, 'Aliquam dolorem autem maxime libero. Perferendis voluptatem debitis qui. Asperiores officia unde incidunt similique molestiae ut aut. Magni et dolor molestiae et.', 137, 152, '2024-09-21 22:30:40', '2024-09-21 22:30:40'),
(12, 'Architecto non iste quasi iusto. Quia sit natus eos ipsam. Accusamus facere quidem qui illo quam accusamus sed. Ea et et suscipit optio.', 95, 118, '2024-09-21 22:30:40', '2024-09-21 22:30:40'),
(13, 'Sint autem deleniti totam quibusdam cupiditate labore sed nisi. Molestias maiores eligendi itaque aut. Qui aut occaecati quia harum quis. Rerum aut fuga quia voluptas.', 35, 121, '2024-09-21 22:30:40', '2024-09-21 22:30:40'),
(15, 'Eius dolorem totam molestiae omnis. Ea vel et eos. Et nisi quidem et aut illum delectus. Qui cum sit odio enim iure porro sapiente.', 57, 37, '2024-09-21 22:30:40', '2024-09-21 22:30:40'),
(16, 'Est non aut error ipsa rem dicta quia qui. Deserunt magnam vel quisquam ipsum ipsa sapiente alias suscipit. Debitis consequatur eum enim inventore. Dicta asperiores molestiae illum voluptatibus dolor vitae.', 65, 181, '2024-09-21 22:30:40', '2024-09-21 22:30:40'),
(17, 'Dicta quia esse exercitationem et aut. Occaecati voluptate placeat ipsa repudiandae doloremque distinctio perspiciatis. Consequatur dicta qui impedit quo et et. Nostrum maxime totam ut similique ut. Qui laudantium maiores nihil rerum perspiciatis velit explicabo.', 28, 115, '2024-09-21 22:30:40', '2024-09-21 22:30:40'),
(18, 'Aliquid accusamus necessitatibus et repudiandae voluptas illum qui. Ea maxime et velit laborum dolores et. Aut aut quod earum et provident. Esse odio consequatur harum ab.', 15, 12, '2024-09-21 22:30:40', '2024-09-21 22:30:40'),
(19, 'Est nostrum voluptatum eos dolor accusantium. Ea cupiditate autem explicabo. Et qui dolor illo qui dignissimos odit. Ullam magnam laborum quibusdam et minima.', 177, 76, '2024-09-21 22:30:40', '2024-09-21 22:30:40'),
(20, 'Distinctio quia ut cupiditate hic quo molestiae sapiente. Dolores praesentium voluptatem a excepturi. Facilis nobis maiores cum sit. Recusandae repellat tenetur error perspiciatis at.', 2, 39, '2024-09-21 22:30:40', '2024-09-21 22:30:40'),
(21, 'Dignissimos recusandae quibusdam quia aut. Accusantium nesciunt ipsam quasi eaque temporibus ut vel expedita. Dolor quo molestiae sed numquam voluptas aperiam.', 174, 193, '2024-09-21 22:30:40', '2024-09-21 22:30:40'),
(22, 'Et natus voluptatem nihil debitis ut sunt aut. Molestias distinctio veritatis accusantium aperiam. Deleniti architecto sit quia et perspiciatis.', 127, 24, '2024-09-21 22:30:40', '2024-09-21 22:30:40'),
(23, 'In dicta est odio sapiente error. Deleniti consectetur maiores minus aut. Sed assumenda minima dolor. Aut aut et illo odit.', 65, 78, '2024-09-21 22:30:40', '2024-09-21 22:30:40'),
(24, 'Eum voluptas veniam saepe aut facere quia. Porro quis et voluptate possimus et voluptatem. Laudantium ex dolores nostrum blanditiis aut ab omnis fugit. Quo delectus dolores molestiae dolor saepe at.', 36, 158, '2024-09-21 22:30:40', '2024-09-21 22:30:40'),
(25, 'Veritatis tempora dolorem et ducimus dolor iste adipisci. Accusantium fugit et voluptatibus asperiores et nihil exercitationem. Qui recusandae est tenetur odit. Quis minus omnis eum qui sed quis.', 69, 163, '2024-09-21 22:30:40', '2024-09-21 22:30:40'),
(26, 'Fuga expedita aut ipsum iure similique aut repellendus. Quia expedita voluptates et vero. Voluptatem quasi asperiores fuga quidem.', 153, 72, '2024-09-21 22:30:40', '2024-09-21 22:30:40'),
(27, 'Ratione tempora animi soluta quos. Eos et repudiandae ad ea et. Cupiditate architecto nulla voluptate est veniam quo ratione.', 127, 4, '2024-09-21 22:30:40', '2024-09-21 22:30:40'),
(28, 'Omnis dolorem voluptates autem sunt est molestiae dolores. Et ex accusantium nesciunt aut officia quia. Nisi id amet quia.', 88, 197, '2024-09-21 22:30:40', '2024-09-21 22:30:40'),
(29, 'Commodi non vitae vero est repellat eum. Sit quas qui vero rerum cupiditate sapiente consequuntur. Consequuntur vel aut et magnam et.', 8, 123, '2024-09-21 22:30:40', '2024-09-21 22:30:40'),
(30, 'Porro porro quo sequi sapiente. Ipsum dolores praesentium quis. Corporis quia molestiae animi non praesentium et. Neque itaque eius minus aspernatur aut quisquam sint autem.', 48, 86, '2024-09-21 22:30:40', '2024-09-21 22:30:40'),
(31, 'Nisi voluptatibus corporis accusantium neque occaecati aut sint. Non voluptas vel quod ipsa atque. Aliquam ipsum quidem et eius asperiores ut.', 42, 94, '2024-09-21 22:30:40', '2024-09-21 22:30:40'),
(32, 'Provident deleniti porro magni possimus. Voluptatem quia et nemo ducimus consequatur non qui autem. Omnis quia sint esse accusamus. Error qui fugiat rerum qui dolore odio porro.', 84, 58, '2024-09-21 22:30:40', '2024-09-21 22:30:40'),
(33, 'Sed aut ut officiis neque nisi mollitia sit. Excepturi vel occaecati repudiandae tempora distinctio. Pariatur id consectetur officia nisi id.', 22, 207, '2024-09-21 22:30:40', '2024-09-21 22:30:40'),
(34, 'Corporis veritatis impedit inventore cupiditate. Aut voluptas quibusdam veniam expedita. Minima praesentium et tempora laboriosam.', 90, 65, '2024-09-21 22:30:40', '2024-09-21 22:30:40'),
(35, 'Dolor aut aliquid fugiat ut omnis aut voluptatibus consequuntur. Ipsum pariatur velit distinctio possimus quae. Et dolor facere possimus excepturi. Amet fugiat id sed eveniet.', 158, 121, '2024-09-21 22:30:40', '2024-09-21 22:30:40'),
(36, 'Consequatur placeat voluptates voluptate corporis consequatur repudiandae. Voluptatem ipsa id cum eveniet eaque. Numquam occaecati sunt sint enim nesciunt. Et dolorem sint ad aliquid consequuntur rerum voluptatum dolor.', 36, 68, '2024-09-21 22:30:40', '2024-09-21 22:30:40'),
(37, 'Rerum autem fugiat quia qui iusto earum non. Velit sed repellat ipsa odio. Voluptatem eveniet deserunt est qui ab.', 151, 84, '2024-09-21 22:30:40', '2024-09-21 22:30:40'),
(39, 'In sunt non sed amet molestias numquam. Aut magnam officiis facere repellat. Labore veritatis quidem iure veritatis.', 9, 197, '2024-09-21 22:30:40', '2024-09-21 22:30:40'),
(40, 'Consequatur qui quo perspiciatis rem autem. Repellendus nisi nihil sit illo eum vel velit alias. Neque ea perferendis ad perspiciatis perferendis vero beatae consequatur.', 45, 70, '2024-09-21 22:30:40', '2024-09-21 22:30:40'),
(41, 'Voluptas aut autem maxime assumenda sit et. Id aperiam ducimus maiores aut asperiores quis. Voluptas aut laudantium et eaque quia et impedit.', 14, 175, '2024-09-21 22:30:40', '2024-09-21 22:30:40'),
(42, 'Enim et amet ullam et porro est natus. In quae facere sed molestiae et vel. Repellat dolor modi fugit est. Dolores neque quod rerum harum ducimus ad officia. Est voluptate tenetur reprehenderit nesciunt animi.', 54, 61, '2024-09-21 22:30:40', '2024-09-21 22:30:40'),
(43, 'Totam inventore sit fugiat ad est nam dignissimos. Eos aut sit officia consequatur aliquid. Eius quidem deleniti mollitia accusamus omnis delectus. Sit et accusantium qui inventore quia eum et.', 30, 76, '2024-09-21 22:30:40', '2024-09-21 22:30:40'),
(44, 'Aut cum nostrum quo possimus est. Non earum cupiditate officiis dolorem maiores. Dignissimos voluptatem occaecati id animi culpa quo.', 24, 118, '2024-09-21 22:30:40', '2024-09-21 22:30:40'),
(46, 'Veniam porro et expedita molestiae ut. Qui vel facere consequatur non ea id.', 91, 181, '2024-09-21 22:30:40', '2024-09-21 22:30:40'),
(47, 'Velit debitis non qui nam ut quia officiis dolores. Et rerum placeat numquam quo. Placeat eum a officia sit reiciendis quae itaque.', 93, 106, '2024-09-21 22:30:40', '2024-09-21 22:30:40'),
(48, 'Eum veritatis labore qui voluptatum. Veniam molestias enim voluptatibus repudiandae sed. Quidem cumque rerum officiis. Quia soluta dolores facere vero.', 88, 81, '2024-09-21 22:30:40', '2024-09-21 22:30:40'),
(49, 'Corrupti ipsum illum quae labore esse dignissimos facere. Sed est in perferendis velit. Officia non occaecati necessitatibus exercitationem explicabo. Autem ab eum aut qui.', 16, 169, '2024-09-21 22:30:40', '2024-09-21 22:30:40'),
(50, 'Eos dolor animi non sunt aspernatur voluptatem totam et. Optio et facilis non consequuntur. Esse quod necessitatibus quos sed. Molestiae nesciunt rerum et sit exercitationem quae.', 154, 200, '2024-09-21 22:30:40', '2024-09-21 22:30:40'),
(51, 'Eum minima architecto libero dolore amet. Temporibus quidem amet deserunt omnis. Nostrum eum fuga sapiente magnam. Nostrum ullam non aut.', 162, 113, '2024-09-21 22:30:40', '2024-09-21 22:30:40'),
(52, 'Modi facilis velit et ipsa. Dignissimos incidunt ut rerum quod magnam deleniti debitis quia.', 8, 89, '2024-09-21 22:30:40', '2024-09-21 22:30:40'),
(53, 'Iure aut laborum libero non molestias nobis iste. Aut non molestiae voluptatibus reprehenderit perspiciatis. Incidunt sint nostrum tenetur temporibus magni eum itaque. Est non dolore rerum odio veritatis maiores.', 115, 205, '2024-09-21 22:30:40', '2024-09-21 22:30:40'),
(54, 'Reiciendis soluta veritatis odio ab doloribus sint ullam quidem. Est tenetur totam sint sed. Recusandae ea possimus repellendus.', 115, 109, '2024-09-21 22:30:40', '2024-09-21 22:30:40'),
(55, 'Et impedit sapiente quam. Pariatur rerum odit nobis delectus ratione corrupti vel. Dicta ut tempora non aut et nihil itaque.', 91, 68, '2024-09-21 22:30:40', '2024-09-21 22:30:40'),
(56, 'Ratione sit aliquid occaecati quia debitis. Vel earum enim numquam molestiae quidem qui iste. Eum eaque error sunt eaque soluta aut molestiae.', 161, 41, '2024-09-21 22:30:40', '2024-09-21 22:30:40'),
(57, 'Sit libero architecto libero. Sit explicabo itaque distinctio reiciendis non rerum quo. Libero debitis voluptas ut ipsa.', 86, 35, '2024-09-21 22:30:40', '2024-09-21 22:30:40'),
(58, 'Accusamus modi nihil a laborum accusantium rerum et. Eos quia deserunt consequuntur soluta voluptas voluptas deserunt. Maiores non ipsum nesciunt rerum aut tenetur. Et temporibus dolore quisquam. Rem aut aut magni expedita.', 61, 66, '2024-09-21 22:30:40', '2024-09-21 22:30:40'),
(59, 'Nihil dolorem quaerat quia quia. Voluptas aliquam earum pariatur repellendus quisquam distinctio. Labore magnam officia nobis quia quas inventore.', 161, 163, '2024-09-21 22:30:40', '2024-09-21 22:30:40'),
(60, 'Aut eos numquam tempora eos sunt incidunt iste. Possimus in rem nihil laboriosam eos sunt. Odio reiciendis sed consequatur labore dignissimos et.', 17, 177, '2024-09-21 22:30:40', '2024-09-21 22:30:40'),
(61, 'Dignissimos nisi id at adipisci aut suscipit. Magni nam adipisci voluptatem officiis omnis. Optio error perspiciatis inventore.', 131, 152, '2024-09-21 22:30:40', '2024-09-21 22:30:40'),
(62, 'Provident odit quisquam quas. Quo qui molestias sunt officia. Ut eius aut molestias et amet dolores veritatis.', 176, 198, '2024-09-21 22:30:40', '2024-09-21 22:30:40'),
(63, 'Id totam et sed quia provident adipisci molestiae. Ut sed natus facilis voluptatem distinctio est rerum.', 187, 133, '2024-09-21 22:30:40', '2024-09-21 22:30:40'),
(64, 'Quibusdam in sed necessitatibus rerum. Quidem reprehenderit autem quae libero ut nam nam. Et mollitia dolor numquam earum deleniti voluptates facere. Et impedit dolorum voluptatem harum.', 121, 92, '2024-09-21 22:30:40', '2024-09-21 22:30:40'),
(65, 'Ex vero alias sequi quas reiciendis magnam. Iste aut nobis quibusdam magnam. Voluptas saepe et illo consequatur et ut facilis odio.', 65, 41, '2024-09-21 22:30:40', '2024-09-21 22:30:40'),
(66, 'Natus dicta sed sequi illum cumque. Doloremque ut eaque error dolor voluptas praesentium.', 125, 163, '2024-09-21 22:30:40', '2024-09-21 22:30:40'),
(67, 'Similique aliquid enim repellendus eum ipsam velit sit ex. Autem sit laudantium id enim laudantium nemo. Debitis perspiciatis vel assumenda. Vitae vel necessitatibus magnam rerum excepturi assumenda est.', 175, 40, '2024-09-21 22:30:40', '2024-09-21 22:30:40'),
(68, 'Aut voluptatum alias rerum quo doloremque aut vel. Cum laudantium eius non nihil vel molestias. Similique aut delectus quia est dolores.', 2, 52, '2024-09-21 22:30:40', '2024-09-21 22:30:40'),
(69, 'Vel exercitationem voluptatum nulla omnis ipsam recusandae. Tenetur quod debitis molestiae quam est. Vel rem quia consequatur non nemo et. Ut sed repudiandae odit omnis similique.', 96, 177, '2024-09-21 22:30:40', '2024-09-21 22:30:40'),
(70, 'Veritatis provident ea hic veniam. Eos fugiat voluptatibus aliquid eos atque ipsam et. Voluptatem reprehenderit rerum aliquid voluptas aut eos voluptatem quidem. Omnis est temporibus enim nostrum provident occaecati alias quos.', 45, 32, '2024-09-21 22:30:40', '2024-09-21 22:30:40'),
(71, 'Enim amet ducimus vitae blanditiis. Enim itaque qui quam doloremque tenetur atque at. Beatae aliquid omnis est dolore sed officia omnis.', 188, 118, '2024-09-21 22:30:40', '2024-09-21 22:30:40'),
(72, 'Consequatur nihil molestiae laborum qui. Beatae eum illum facere dolores qui reprehenderit non. Nulla sed dolores similique reiciendis occaecati facilis. Id sunt aspernatur veritatis atque voluptatem voluptates voluptas.', 196, 63, '2024-09-21 22:30:40', '2024-09-21 22:30:40'),
(73, 'Laboriosam assumenda consequatur accusantium laborum voluptatem et ut. Enim odit ut quam odio inventore. Reiciendis sit maiores eos quia impedit quo eius. Non eum quibusdam fuga deleniti.', 194, 95, '2024-09-21 22:30:40', '2024-09-21 22:30:40'),
(74, 'Neque qui necessitatibus qui et in consequatur. Blanditiis corporis nihil excepturi sapiente. Asperiores necessitatibus quis inventore sed sit omnis. Id velit est reprehenderit culpa.', 97, 26, '2024-09-21 22:30:40', '2024-09-21 22:30:40'),
(75, 'In consequuntur at nisi iste qui optio illum. Blanditiis voluptas odit velit quidem consequuntur aliquid. Non doloribus exercitationem iure consequatur ea quo. Voluptates dolore quos fuga. Deleniti deserunt qui et ex voluptatum temporibus quisquam.', 51, 118, '2024-09-21 22:30:40', '2024-09-21 22:30:40'),
(76, 'Provident dolor maiores consectetur qui consequatur ipsum. Ullam ea culpa minima quam iusto magnam. Facilis sunt ea numquam vitae consequatur molestiae. Et vero eveniet qui quibusdam et.', 74, 174, '2024-09-21 22:30:40', '2024-09-21 22:30:40'),
(77, 'Perspiciatis harum omnis modi suscipit ut consequuntur enim. Ut esse et quo sit eos excepturi. Quibusdam voluptatem eos quis adipisci ut cupiditate.', 136, 192, '2024-09-21 22:30:40', '2024-09-21 22:30:40'),
(78, 'Eum pariatur fuga blanditiis veritatis aut. Numquam voluptatum fugit quisquam dolores ipsa deserunt vero. Voluptatem voluptate sed illum autem dicta. Incidunt aut rerum voluptate asperiores adipisci est distinctio fugiat.', 159, 14, '2024-09-21 22:30:40', '2024-09-21 22:30:40'),
(79, 'Molestiae reprehenderit delectus fugiat alias aperiam necessitatibus voluptatem. Quibusdam quo vel asperiores eum voluptatem. Sunt sit nulla ut eos.', 71, 104, '2024-09-21 22:30:40', '2024-09-21 22:30:40'),
(80, 'Modi odio autem dolore sed cum. Ut aut molestiae eligendi perferendis minus et. Cum possimus quibusdam qui vitae quis architecto odit.', 99, 37, '2024-09-21 22:30:40', '2024-09-21 22:30:40'),
(81, 'Ut voluptatum ut officiis itaque qui sit facere porro. Ex quasi illum non officiis veniam animi. Pariatur recusandae rerum nobis ipsa eos nesciunt dignissimos. Enim rerum modi sapiente repudiandae.', 7, 91, '2024-09-21 22:30:40', '2024-09-21 22:30:40'),
(82, 'Quidem voluptatem quam vel reiciendis in vitae soluta. Est itaque distinctio ea. Repudiandae excepturi hic praesentium porro enim voluptatem ullam. Consequuntur harum officia aliquid ex harum.', 100, 5, '2024-09-21 22:30:40', '2024-09-21 22:30:40'),
(83, 'Accusantium doloremque illo ratione ab quia earum. Quis enim eaque nihil assumenda. Velit est et nisi. Omnis suscipit repellat esse veritatis autem ut porro.', 68, 160, '2024-09-21 22:30:40', '2024-09-21 22:30:40'),
(84, 'Facilis velit esse minus qui. Aut fuga labore est ut omnis reiciendis. Quibusdam sequi assumenda dignissimos suscipit omnis sint ipsa. Esse sed pariatur exercitationem vero nihil ad ut.', 145, 121, '2024-09-21 22:30:40', '2024-09-21 22:30:40'),
(85, 'Explicabo ut omnis accusantium sunt nobis fuga repellendus. Veniam perferendis dicta enim aut. Aliquam tempore praesentium tempore placeat molestiae eveniet. Perspiciatis reprehenderit corporis et sit voluptatibus est ab doloremque.', 191, 196, '2024-09-21 22:30:40', '2024-09-21 22:30:40'),
(86, 'Cum perferendis maxime sequi totam ipsum facilis placeat enim. Omnis voluptatem accusamus perferendis consequatur. Vel animi ut quasi ut quia adipisci culpa.', 138, 92, '2024-09-21 22:30:40', '2024-09-21 22:30:40'),
(87, 'Molestiae est aut veniam soluta quasi vel. Suscipit ut similique vero assumenda et omnis. Et facilis quisquam dolores aut deserunt omnis.', 182, 57, '2024-09-21 22:30:40', '2024-09-21 22:30:40'),
(88, 'Ex quidem facilis ipsum tenetur est labore rerum. Et tempore molestiae consectetur doloribus. Ullam quibusdam et ipsum odio est dolorem distinctio sed.', 29, 24, '2024-09-21 22:30:40', '2024-09-21 22:30:40'),
(89, 'Quia unde perspiciatis est provident. Est et nobis distinctio sit. Est minus aut eveniet ut.', 36, 53, '2024-09-21 22:30:40', '2024-09-21 22:30:40'),
(90, 'Dolor vitae repudiandae et facilis numquam quo. Enim debitis eaque enim error laudantium. Ea repellat inventore et accusamus vel. Corporis autem est ab officiis qui perferendis.', 109, 188, '2024-09-21 22:30:40', '2024-09-21 22:30:40'),
(91, 'Aspernatur voluptatem dolor fugit aut voluptate labore vitae. Earum sed inventore dolores illo tempora aperiam. Non architecto dolor vero asperiores nam eos. Quae expedita eos unde explicabo ut corporis sunt.', 164, 147, '2024-09-21 22:30:40', '2024-09-21 22:30:40'),
(92, 'Omnis ut et suscipit mollitia consectetur nihil perspiciatis velit. Amet ipsam fugit reiciendis veritatis. Assumenda nobis et voluptates nostrum maiores impedit quae. Voluptatem ut ipsam omnis omnis.', 126, 102, '2024-09-21 22:30:40', '2024-09-21 22:30:40'),
(93, 'Praesentium neque laborum neque. Quos reprehenderit voluptates fugit maiores quaerat placeat molestias. Qui amet sit qui maiores debitis accusantium temporibus. Dolorum rerum nihil facilis autem consequuntur.', 97, 137, '2024-09-21 22:30:40', '2024-09-21 22:30:40'),
(94, 'Hic voluptates voluptatum non fugiat iure. Tenetur a sit asperiores molestiae repudiandae. Optio dignissimos et est ut nihil. Possimus eum illo sit. Dolores non excepturi quis quae omnis.', 95, 90, '2024-09-21 22:30:40', '2024-09-21 22:30:40'),
(95, 'In in quia nihil. Non molestiae accusamus et molestiae. Aut reiciendis dolorem aut omnis. Rerum corrupti exercitationem est amet corporis aut illo.', 125, 169, '2024-09-21 22:30:40', '2024-09-21 22:30:40'),
(96, 'Pariatur omnis impedit ratione saepe porro qui et repellendus. Cum error similique et nihil. Voluptatem excepturi ut est sunt.', 50, 134, '2024-09-21 22:30:40', '2024-09-21 22:30:40'),
(97, 'Sapiente et delectus molestiae iusto. Doloremque praesentium aut consequatur. Recusandae mollitia veritatis odio eos et. Ut totam facilis ut tenetur aperiam provident sed aliquam.', 136, 148, '2024-09-21 22:30:40', '2024-09-21 22:30:40'),
(98, 'Sed veniam cumque quo quasi. Et quisquam labore qui voluptate qui eaque. Assumenda repellendus dignissimos eum blanditiis tempore ratione sed.', 85, 103, '2024-09-21 22:30:40', '2024-09-21 22:30:40'),
(99, 'Ullam qui ipsa nam et officia ut. Minus ea ut quisquam omnis. Facilis accusantium consectetur fugiat occaecati. Rerum optio sequi placeat eveniet blanditiis dolore.', 179, 175, '2024-09-21 22:30:40', '2024-09-21 22:30:40'),
(100, 'Ex vitae sit sint beatae. Optio culpa sint perspiciatis dicta. Maxime pariatur illo omnis. Nesciunt assumenda officia quod expedita maiores sint et vel.', 139, 10, '2024-09-21 22:30:40', '2024-09-21 22:30:40'),
(101, '121222', 193, 214, '2024-09-21 23:04:13', '2024-09-21 23:04:13'),
(102, '11111111111', 193, 214, '2024-09-21 23:04:22', '2024-09-21 23:04:22'),
(103, '11111111111', 193, 214, '2024-09-21 23:04:24', '2024-09-21 23:04:24'),
(104, '11111111111', 193, 214, '2024-09-21 23:04:26', '2024-09-21 23:04:26'),
(105, '11111111111', 193, 214, '2024-09-21 23:04:27', '2024-09-21 23:04:27'),
(106, '11111111111', 193, 214, '2024-09-21 23:04:29', '2024-09-21 23:04:29'),
(107, '11111111111', 193, 214, '2024-09-21 23:04:31', '2024-09-21 23:04:31'),
(108, '11111111111', 193, 214, '2024-09-21 23:04:33', '2024-09-21 23:04:33'),
(109, '11111111111', 193, 214, '2024-09-21 23:04:35', '2024-09-21 23:04:35'),
(110, '11111111111', 193, 214, '2024-09-21 23:05:15', '2024-09-21 23:05:15'),
(111, '11111111111', 193, 214, '2024-09-21 23:05:17', '2024-09-21 23:05:17'),
(112, '11111111111', 193, 214, '2024-09-21 23:05:18', '2024-09-21 23:05:18'),
(113, '11111111111', 193, 214, '2024-09-21 23:05:35', '2024-09-21 23:05:35'),
(114, '11111111111', 193, 214, '2024-09-21 23:05:49', '2024-09-21 23:05:49'),
(115, '11111111111', 193, 214, '2024-09-21 23:05:51', '2024-09-21 23:05:51'),
(116, '11111111111', 193, 214, '2024-09-21 23:05:53', '2024-09-21 23:05:53'),
(117, 'sadsad', 202, 1, '2024-09-25 00:02:31', '2024-09-25 00:02:31'),
(118, 'dádaaaa', 203, 1, '2024-09-25 00:06:31', '2024-09-25 00:06:31'),
(119, 'dádasd', 203, 214, '2024-10-03 07:04:21', '2024-10-03 07:04:21');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `images`
--

CREATE TABLE `images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `extension` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL,
  `imageable_id` bigint(20) UNSIGNED NOT NULL,
  `imageable_type` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `images`
--

INSERT INTO `images` (`id`, `name`, `extension`, `path`, `imageable_id`, `imageable_type`, `created_at`, `updated_at`) VALUES
(2, 'rerum', 'jpg', 'images/16.jpg', 2, 'App\\Models\\User', '2024-09-21 22:30:38', '2024-09-21 22:30:38'),
(3, 'aut', 'jpg', 'images/11.jpg', 3, 'App\\Models\\User', '2024-09-21 22:30:38', '2024-09-21 22:30:38'),
(4, 'voluptatem', 'jpg', 'images/15.jpg', 4, 'App\\Models\\User', '2024-09-21 22:30:38', '2024-09-21 22:30:38'),
(5, 'sint', 'jpg', 'images/17.jpg', 5, 'App\\Models\\User', '2024-09-21 22:30:38', '2024-09-21 22:30:38'),
(6, 'eum', 'jpg', 'images/16.jpg', 6, 'App\\Models\\User', '2024-09-21 22:30:38', '2024-09-21 22:30:38'),
(7, 'architecto', 'jpg', 'images/12.jpg', 7, 'App\\Models\\User', '2024-09-21 22:30:38', '2024-09-21 22:30:38'),
(8, 'corrupti', 'jpg', 'images/18.jpg', 8, 'App\\Models\\User', '2024-09-21 22:30:38', '2024-09-21 22:30:38'),
(9, 'voluptatem', 'jpg', 'images/2.jpg', 9, 'App\\Models\\User', '2024-09-21 22:30:38', '2024-09-21 22:30:38'),
(10, 'eaque', 'jpg', 'images/17.jpg', 10, 'App\\Models\\User', '2024-09-21 22:30:38', '2024-09-21 22:30:38'),
(12, 'vero', 'jpg', 'images/12.jpg', 2, 'App\\Models\\Post', '2024-09-21 22:30:40', '2024-09-21 22:30:40'),
(13, 'laborum', 'jpg', 'images/5.jpg', 3, 'App\\Models\\Post', '2024-09-21 22:30:40', '2024-09-21 22:30:40'),
(14, 'voluptatibus', 'jpg', 'images/18.jpg', 4, 'App\\Models\\Post', '2024-09-21 22:30:40', '2024-09-21 22:30:40'),
(15, 'laudantium', 'jpg', 'images/9.jpg', 5, 'App\\Models\\Post', '2024-09-21 22:30:40', '2024-09-21 22:30:40'),
(16, 'aspernatur', 'jpg', 'images/3.jpg', 6, 'App\\Models\\Post', '2024-09-21 22:30:40', '2024-09-21 22:30:40'),
(17, 'totam', 'jpg', 'images/2.jpg', 7, 'App\\Models\\Post', '2024-09-21 22:30:40', '2024-09-21 22:30:40'),
(18, 'ex', 'jpg', 'images/5.jpg', 8, 'App\\Models\\Post', '2024-09-21 22:30:40', '2024-09-21 22:30:40'),
(19, 'dolore', 'jpg', 'images/11.jpg', 9, 'App\\Models\\Post', '2024-09-21 22:30:40', '2024-09-21 22:30:40'),
(20, 'et', 'jpg', 'images/10.jpg', 10, 'App\\Models\\Post', '2024-09-21 22:30:40', '2024-09-21 22:30:40'),
(21, 'odio', 'jpg', 'images/13.jpg', 11, 'App\\Models\\Post', '2024-09-21 22:30:40', '2024-09-21 22:30:40'),
(22, 'quia', 'jpg', 'images/12.jpg', 12, 'App\\Models\\Post', '2024-09-21 22:30:40', '2024-09-21 22:30:40'),
(23, 'similique', 'jpg', 'images/5.jpg', 13, 'App\\Models\\Post', '2024-09-21 22:30:40', '2024-09-21 22:30:40'),
(24, 'incidunt', 'jpg', 'images/6.jpg', 14, 'App\\Models\\Post', '2024-09-21 22:30:40', '2024-09-21 22:30:40'),
(25, 'asperiores', 'jpg', 'images/WfOpk7ClZ6HPMeBXIlJCqFfXbtr3Iz8Jbh03PMf4.jpg', 15, 'App\\Models\\Post', '2024-09-21 22:30:40', '2024-09-21 22:30:40'),
(26, 'officiis', 'jpg', 'images/11.jpg', 16, 'App\\Models\\Post', '2024-09-21 22:30:40', '2024-09-21 22:30:40'),
(27, 'neque', 'jpg', 'images/20.jpg', 17, 'App\\Models\\Post', '2024-09-21 22:30:40', '2024-09-21 22:30:40'),
(28, 'dicta', 'jpg', 'images/19.jpg', 18, 'App\\Models\\Post', '2024-09-21 22:30:40', '2024-09-21 22:30:40'),
(29, 'error', 'jpg', 'images/9.jpg', 19, 'App\\Models\\Post', '2024-09-21 22:30:40', '2024-09-21 22:30:40'),
(30, 'error', 'jpg', 'images/9.jpg', 20, 'App\\Models\\Post', '2024-09-21 22:30:40', '2024-09-21 22:30:40'),
(31, 'quae', 'jpg', 'images/8.jpg', 21, 'App\\Models\\Post', '2024-09-21 22:30:41', '2024-09-21 22:30:41'),
(32, 'et', 'jpg', 'images/1.jpg', 22, 'App\\Models\\Post', '2024-09-21 22:30:41', '2024-09-21 22:30:41'),
(33, 'eius', 'jpg', 'images/19.jpg', 23, 'App\\Models\\Post', '2024-09-21 22:30:41', '2024-09-21 22:30:41'),
(34, 'officia', 'jpg', 'images/13.jpg', 24, 'App\\Models\\Post', '2024-09-21 22:30:41', '2024-09-21 22:30:41'),
(35, 'perferendis', 'jpg', 'images/15.jpg', 25, 'App\\Models\\Post', '2024-09-21 22:30:41', '2024-09-21 22:30:41'),
(36, 'vel', 'jpg', 'images/14.jpg', 26, 'App\\Models\\Post', '2024-09-21 22:30:41', '2024-09-21 22:30:41'),
(37, 'perferendis', 'jpg', 'images/2.jpg', 27, 'App\\Models\\Post', '2024-09-21 22:30:41', '2024-09-21 22:30:41'),
(38, 'voluptatem', 'jpg', 'images/10.jpg', 28, 'App\\Models\\Post', '2024-09-21 22:30:41', '2024-09-21 22:30:41'),
(39, 'ut', 'jpg', 'images/19.jpg', 29, 'App\\Models\\Post', '2024-09-21 22:30:41', '2024-09-21 22:30:41'),
(40, 'eos', 'jpg', 'images/15.jpg', 30, 'App\\Models\\Post', '2024-09-21 22:30:41', '2024-09-21 22:30:41'),
(41, 'qui', 'jpg', 'images/10.jpg', 31, 'App\\Models\\Post', '2024-09-21 22:30:41', '2024-09-21 22:30:41'),
(42, 'iste', 'jpg', 'images/2.jpg', 32, 'App\\Models\\Post', '2024-09-21 22:30:41', '2024-09-21 22:30:41'),
(43, 'aspernatur', 'jpg', 'images/13.jpg', 33, 'App\\Models\\Post', '2024-09-21 22:30:41', '2024-09-21 22:30:41'),
(44, 'vitae', 'jpg', 'images/6.jpg', 34, 'App\\Models\\Post', '2024-09-21 22:30:41', '2024-09-21 22:30:41'),
(45, 'repellat', 'jpg', 'images/4.jpg', 35, 'App\\Models\\Post', '2024-09-21 22:30:41', '2024-09-21 22:30:41'),
(46, 'a', 'jpg', 'images/19.jpg', 36, 'App\\Models\\Post', '2024-09-21 22:30:41', '2024-09-21 22:30:41'),
(47, 'recusandae', 'jpg', 'images/6.jpg', 37, 'App\\Models\\Post', '2024-09-21 22:30:41', '2024-09-21 22:30:41'),
(48, 'commodi', 'jpg', 'images/14.jpg', 38, 'App\\Models\\Post', '2024-09-21 22:30:41', '2024-09-21 22:30:41'),
(49, 'fugiat', 'jpg', 'images/13.jpg', 39, 'App\\Models\\Post', '2024-09-21 22:30:41', '2024-09-21 22:30:41'),
(50, 'quaerat', 'jpg', 'images/13.jpg', 40, 'App\\Models\\Post', '2024-09-21 22:30:41', '2024-09-21 22:30:41'),
(51, 'culpa', 'jpg', 'images/20.jpg', 41, 'App\\Models\\Post', '2024-09-21 22:30:41', '2024-09-21 22:30:41'),
(52, 'aliquid', 'jpg', 'images/8.jpg', 42, 'App\\Models\\Post', '2024-09-21 22:30:41', '2024-09-21 22:30:41'),
(53, 'a', 'jpg', 'images/3.jpg', 43, 'App\\Models\\Post', '2024-09-21 22:30:41', '2024-09-21 22:30:41'),
(54, 'maiores', 'jpg', 'images/10.jpg', 44, 'App\\Models\\Post', '2024-09-21 22:30:41', '2024-09-21 22:30:41'),
(55, 'quia', 'jpg', 'images/14.jpg', 45, 'App\\Models\\Post', '2024-09-21 22:30:41', '2024-09-21 22:30:41'),
(56, 'nesciunt', 'jpg', 'images/3.jpg', 46, 'App\\Models\\Post', '2024-09-21 22:30:41', '2024-09-21 22:30:41'),
(57, 'non', 'jpg', 'images/14.jpg', 47, 'App\\Models\\Post', '2024-09-21 22:30:41', '2024-09-21 22:30:41'),
(58, 'perspiciatis', 'jpg', 'images/8.jpg', 48, 'App\\Models\\Post', '2024-09-21 22:30:41', '2024-09-21 22:30:41'),
(59, 'est', 'jpg', 'images/19.jpg', 49, 'App\\Models\\Post', '2024-09-21 22:30:41', '2024-09-21 22:30:41'),
(60, 'iure', 'jpg', 'images/10.jpg', 50, 'App\\Models\\Post', '2024-09-21 22:30:41', '2024-09-21 22:30:41'),
(61, 'reprehenderit', 'jpg', 'images/15.jpg', 51, 'App\\Models\\Post', '2024-09-21 22:30:41', '2024-09-21 22:30:41'),
(62, 'dignissimos', 'jpg', 'images/6.jpg', 52, 'App\\Models\\Post', '2024-09-21 22:30:41', '2024-09-21 22:30:41'),
(63, 'tempore', 'jpg', 'images/18.jpg', 53, 'App\\Models\\Post', '2024-09-21 22:30:41', '2024-09-21 22:30:41'),
(64, 'dolorum', 'jpg', 'images/16.jpg', 54, 'App\\Models\\Post', '2024-09-21 22:30:41', '2024-09-21 22:30:41'),
(65, 'in', 'jpg', 'images/1.jpg', 55, 'App\\Models\\Post', '2024-09-21 22:30:41', '2024-09-21 22:30:41'),
(66, 'blanditiis', 'jpg', 'images/8.jpg', 56, 'App\\Models\\Post', '2024-09-21 22:30:41', '2024-09-21 22:30:41'),
(67, 'consequatur', 'jpg', 'images/7.jpg', 57, 'App\\Models\\Post', '2024-09-21 22:30:41', '2024-09-21 22:30:41'),
(68, 'totam', 'jpg', 'images/16.jpg', 58, 'App\\Models\\Post', '2024-09-21 22:30:41', '2024-09-21 22:30:41'),
(69, 'debitis', 'jpg', 'images/11.jpg', 59, 'App\\Models\\Post', '2024-09-21 22:30:41', '2024-09-21 22:30:41'),
(70, 'eos', 'jpg', 'images/15.jpg', 60, 'App\\Models\\Post', '2024-09-21 22:30:41', '2024-09-21 22:30:41'),
(71, 'saepe', 'jpg', 'images/1.jpg', 61, 'App\\Models\\Post', '2024-09-21 22:30:41', '2024-09-21 22:30:41'),
(72, 'nulla', 'jpg', 'images/11.jpg', 62, 'App\\Models\\Post', '2024-09-21 22:30:41', '2024-09-21 22:30:41'),
(73, 'ipsam', 'jpg', 'images/16.jpg', 63, 'App\\Models\\Post', '2024-09-21 22:30:41', '2024-09-21 22:30:41'),
(74, 'fuga', 'jpg', 'images/9.jpg', 64, 'App\\Models\\Post', '2024-09-21 22:30:41', '2024-09-21 22:30:41'),
(75, 'dolorem', 'jpg', 'images/5.jpg', 65, 'App\\Models\\Post', '2024-09-21 22:30:41', '2024-09-21 22:30:41'),
(76, 'fugit', 'jpg', 'images/13.jpg', 66, 'App\\Models\\Post', '2024-09-21 22:30:41', '2024-09-21 22:30:41'),
(77, 'officia', 'jpg', 'images/20.jpg', 67, 'App\\Models\\Post', '2024-09-21 22:30:41', '2024-09-21 22:30:41'),
(78, 'omnis', 'jpg', 'images/18.jpg', 68, 'App\\Models\\Post', '2024-09-21 22:30:41', '2024-09-21 22:30:41'),
(79, 'similique', 'jpg', 'images/6.jpg', 69, 'App\\Models\\Post', '2024-09-21 22:30:41', '2024-09-21 22:30:41'),
(80, 'necessitatibus', 'jpg', 'images/13.jpg', 70, 'App\\Models\\Post', '2024-09-21 22:30:41', '2024-09-21 22:30:41'),
(81, 'voluptatem', 'jpg', 'images/1.jpg', 71, 'App\\Models\\Post', '2024-09-21 22:30:41', '2024-09-21 22:30:41'),
(82, 'voluptatem', 'jpg', 'images/17.jpg', 72, 'App\\Models\\Post', '2024-09-21 22:30:41', '2024-09-21 22:30:41'),
(83, 'dolores', 'jpg', 'images/14.jpg', 73, 'App\\Models\\Post', '2024-09-21 22:30:41', '2024-09-21 22:30:41'),
(84, 'ratione', 'jpg', 'images/7.jpg', 74, 'App\\Models\\Post', '2024-09-21 22:30:41', '2024-09-21 22:30:41'),
(85, 'quod', 'jpg', 'images/17.jpg', 75, 'App\\Models\\Post', '2024-09-21 22:30:41', '2024-09-21 22:30:41'),
(86, 'eligendi', 'jpg', 'images/10.jpg', 76, 'App\\Models\\Post', '2024-09-21 22:30:41', '2024-09-21 22:30:41'),
(87, 'voluptatem', 'jpg', 'images/6.jpg', 77, 'App\\Models\\Post', '2024-09-21 22:30:41', '2024-09-21 22:30:41'),
(88, 'cupiditate', 'jpg', 'images/13.jpg', 78, 'App\\Models\\Post', '2024-09-21 22:30:41', '2024-09-21 22:30:41'),
(89, 'magni', 'jpg', 'images/19.jpg', 79, 'App\\Models\\Post', '2024-09-21 22:30:41', '2024-09-21 22:30:41'),
(90, 'inventore', 'jpg', 'images/8.jpg', 80, 'App\\Models\\Post', '2024-09-21 22:30:41', '2024-09-21 22:30:41'),
(91, 'qui', 'jpg', 'images/7.jpg', 81, 'App\\Models\\Post', '2024-09-21 22:30:41', '2024-09-21 22:30:41'),
(92, 'consequatur', 'jpg', 'images/10.jpg', 82, 'App\\Models\\Post', '2024-09-21 22:30:41', '2024-09-21 22:30:41'),
(93, 'sit', 'jpg', 'images/5.jpg', 83, 'App\\Models\\Post', '2024-09-21 22:30:41', '2024-09-21 22:30:41'),
(94, 'recusandae', 'jpg', 'images/18.jpg', 84, 'App\\Models\\Post', '2024-09-21 22:30:41', '2024-09-21 22:30:41'),
(95, 'id', 'jpg', 'images/6.jpg', 85, 'App\\Models\\Post', '2024-09-21 22:30:41', '2024-09-21 22:30:41'),
(96, 'animi', 'jpg', 'images/7.jpg', 86, 'App\\Models\\Post', '2024-09-21 22:30:41', '2024-09-21 22:30:41'),
(97, 'cumque', 'jpg', 'images/19.jpg', 87, 'App\\Models\\Post', '2024-09-21 22:30:41', '2024-09-21 22:30:41'),
(98, 'debitis', 'jpg', 'images/4.jpg', 88, 'App\\Models\\Post', '2024-09-21 22:30:41', '2024-09-21 22:30:41'),
(99, 'ut', 'jpg', 'images/7.jpg', 89, 'App\\Models\\Post', '2024-09-21 22:30:41', '2024-09-21 22:30:41'),
(100, 'velit', 'jpg', 'images/16.jpg', 90, 'App\\Models\\Post', '2024-09-21 22:30:41', '2024-09-21 22:30:41'),
(101, 'doloribus', 'jpg', 'images/7.jpg', 91, 'App\\Models\\Post', '2024-09-21 22:30:41', '2024-09-21 22:30:41'),
(102, 'eligendi', 'jpg', 'images/12.jpg', 92, 'App\\Models\\Post', '2024-09-21 22:30:41', '2024-09-21 22:30:41'),
(103, 'tempora', 'jpg', 'images/16.jpg', 93, 'App\\Models\\Post', '2024-09-21 22:30:41', '2024-09-21 22:30:41'),
(104, 'veniam', 'jpg', 'images/10.jpg', 94, 'App\\Models\\Post', '2024-09-21 22:30:41', '2024-09-21 22:30:41'),
(105, 'qui', 'jpg', 'images/8.jpg', 95, 'App\\Models\\Post', '2024-09-21 22:30:41', '2024-09-21 22:30:41'),
(106, 'vero', 'jpg', 'images/9.jpg', 96, 'App\\Models\\Post', '2024-09-21 22:30:41', '2024-09-21 22:30:41'),
(107, 'doloremque', 'jpg', 'images/5.jpg', 97, 'App\\Models\\Post', '2024-09-21 22:30:41', '2024-09-21 22:30:41'),
(108, 'commodi', 'jpg', 'images/17.jpg', 98, 'App\\Models\\Post', '2024-09-21 22:30:41', '2024-09-21 22:30:41'),
(109, 'saepe', 'jpg', 'images/8.jpg', 99, 'App\\Models\\Post', '2024-09-21 22:30:41', '2024-09-21 22:30:41'),
(110, 'incidunt', 'jpg', 'images/2.jpg', 100, 'App\\Models\\Post', '2024-09-21 22:30:41', '2024-09-21 22:30:41'),
(111, 'quia', 'jpg', 'images/4.jpg', 101, 'App\\Models\\Post', '2024-09-21 22:30:41', '2024-09-21 22:30:41'),
(112, 'natus', 'jpg', 'images/3.jpg', 102, 'App\\Models\\Post', '2024-09-21 22:30:41', '2024-09-21 22:30:41'),
(113, 'iusto', 'jpg', 'images/7.jpg', 103, 'App\\Models\\Post', '2024-09-21 22:30:41', '2024-09-21 22:30:41'),
(114, 'ut', 'jpg', 'images/19.jpg', 104, 'App\\Models\\Post', '2024-09-21 22:30:41', '2024-09-21 22:30:41'),
(115, 'optio', 'jpg', 'images/14.jpg', 105, 'App\\Models\\Post', '2024-09-21 22:30:41', '2024-09-21 22:30:41'),
(116, 'voluptatem', 'jpg', 'images/11.jpg', 106, 'App\\Models\\Post', '2024-09-21 22:30:41', '2024-09-21 22:30:41'),
(117, 'qui', 'jpg', 'images/4.jpg', 107, 'App\\Models\\Post', '2024-09-21 22:30:41', '2024-09-21 22:30:41'),
(118, 'omnis', 'jpg', 'images/4.jpg', 108, 'App\\Models\\Post', '2024-09-21 22:30:41', '2024-09-21 22:30:41'),
(119, 'adipisci', 'jpg', 'images/19.jpg', 109, 'App\\Models\\Post', '2024-09-21 22:30:41', '2024-09-21 22:30:41'),
(120, 'eveniet', 'jpg', 'images/5.jpg', 110, 'App\\Models\\Post', '2024-09-21 22:30:41', '2024-09-21 22:30:41'),
(121, 'totam', 'jpg', 'images/9.jpg', 111, 'App\\Models\\Post', '2024-09-21 22:30:41', '2024-09-21 22:30:41'),
(122, 'est', 'jpg', 'images/8.jpg', 112, 'App\\Models\\Post', '2024-09-21 22:30:41', '2024-09-21 22:30:41'),
(123, 'ut', 'jpg', 'images/20.jpg', 113, 'App\\Models\\Post', '2024-09-21 22:30:41', '2024-09-21 22:30:41'),
(124, 'voluptatibus', 'jpg', 'images/8.jpg', 114, 'App\\Models\\Post', '2024-09-21 22:30:41', '2024-09-21 22:30:41'),
(125, 'ut', 'jpg', 'images/18.jpg', 115, 'App\\Models\\Post', '2024-09-21 22:30:41', '2024-09-21 22:30:41'),
(126, 'veritatis', 'jpg', 'images/20.jpg', 116, 'App\\Models\\Post', '2024-09-21 22:30:41', '2024-09-21 22:30:41'),
(127, 'amet', 'jpg', 'images/8.jpg', 117, 'App\\Models\\Post', '2024-09-21 22:30:41', '2024-09-21 22:30:41'),
(128, 'veniam', 'jpg', 'images/18.jpg', 118, 'App\\Models\\Post', '2024-09-21 22:30:41', '2024-09-21 22:30:41'),
(129, 'alias', 'jpg', 'images/20.jpg', 119, 'App\\Models\\Post', '2024-09-21 22:30:41', '2024-09-21 22:30:41'),
(130, 'laborum', 'jpg', 'images/17.jpg', 120, 'App\\Models\\Post', '2024-09-21 22:30:41', '2024-09-21 22:30:41'),
(131, 'et', 'jpg', 'images/13.jpg', 121, 'App\\Models\\Post', '2024-09-21 22:30:41', '2024-09-21 22:30:41'),
(132, 'ullam', 'jpg', 'images/2.jpg', 122, 'App\\Models\\Post', '2024-09-21 22:30:41', '2024-09-21 22:30:41'),
(133, 'accusamus', 'jpg', 'images/16.jpg', 123, 'App\\Models\\Post', '2024-09-21 22:30:41', '2024-09-21 22:30:41'),
(134, 'non', 'jpg', 'images/6.jpg', 124, 'App\\Models\\Post', '2024-09-21 22:30:41', '2024-09-21 22:30:41'),
(135, 'tenetur', 'jpg', 'images/11.jpg', 125, 'App\\Models\\Post', '2024-09-21 22:30:41', '2024-09-21 22:30:41'),
(136, 'ipsam', 'jpg', 'images/12.jpg', 126, 'App\\Models\\Post', '2024-09-21 22:30:41', '2024-09-21 22:30:41'),
(137, 'ipsa', 'jpg', 'images/10.jpg', 127, 'App\\Models\\Post', '2024-09-21 22:30:41', '2024-09-21 22:30:41'),
(138, 'saepe', 'jpg', 'images/4.jpg', 128, 'App\\Models\\Post', '2024-09-21 22:30:41', '2024-09-21 22:30:41'),
(139, 'culpa', 'jpg', 'images/17.jpg', 129, 'App\\Models\\Post', '2024-09-21 22:30:41', '2024-09-21 22:30:41'),
(140, 'eum', 'jpg', 'images/9.jpg', 130, 'App\\Models\\Post', '2024-09-21 22:30:41', '2024-09-21 22:30:41'),
(141, 'non', 'jpg', 'images/6.jpg', 131, 'App\\Models\\Post', '2024-09-21 22:30:41', '2024-09-21 22:30:41'),
(142, 'adipisci', 'jpg', 'images/9.jpg', 132, 'App\\Models\\Post', '2024-09-21 22:30:41', '2024-09-21 22:30:41'),
(143, 'ullam', 'jpg', 'images/8.jpg', 133, 'App\\Models\\Post', '2024-09-21 22:30:41', '2024-09-21 22:30:41'),
(144, 'blanditiis', 'jpg', 'images/6.jpg', 134, 'App\\Models\\Post', '2024-09-21 22:30:41', '2024-09-21 22:30:41'),
(145, 'in', 'jpg', 'images/14.jpg', 135, 'App\\Models\\Post', '2024-09-21 22:30:41', '2024-09-21 22:30:41'),
(146, 'accusamus', 'jpg', 'images/3.jpg', 136, 'App\\Models\\Post', '2024-09-21 22:30:41', '2024-09-21 22:30:41'),
(147, 'qui', 'jpg', 'images/7.jpg', 137, 'App\\Models\\Post', '2024-09-21 22:30:41', '2024-09-21 22:30:41'),
(148, 'quia', 'jpg', 'images/6.jpg', 138, 'App\\Models\\Post', '2024-09-21 22:30:41', '2024-09-21 22:30:41'),
(149, 'suscipit', 'jpg', 'images/6.jpg', 139, 'App\\Models\\Post', '2024-09-21 22:30:41', '2024-09-21 22:30:41'),
(150, 'ipsam', 'jpg', 'images/4.jpg', 140, 'App\\Models\\Post', '2024-09-21 22:30:41', '2024-09-21 22:30:41'),
(151, 'vel', 'jpg', 'images/20.jpg', 141, 'App\\Models\\Post', '2024-09-21 22:30:41', '2024-09-21 22:30:41'),
(152, 'error', 'jpg', 'images/14.jpg', 142, 'App\\Models\\Post', '2024-09-21 22:30:41', '2024-09-21 22:30:41'),
(153, 'suscipit', 'jpg', 'images/6.jpg', 143, 'App\\Models\\Post', '2024-09-21 22:30:41', '2024-09-21 22:30:41'),
(154, 'corrupti', 'jpg', 'images/20.jpg', 144, 'App\\Models\\Post', '2024-09-21 22:30:41', '2024-09-21 22:30:41'),
(155, 'excepturi', 'jpg', 'images/14.jpg', 145, 'App\\Models\\Post', '2024-09-21 22:30:41', '2024-09-21 22:30:41'),
(156, 'est', 'jpg', 'images/16.jpg', 146, 'App\\Models\\Post', '2024-09-21 22:30:41', '2024-09-21 22:30:41'),
(157, 'sit', 'jpg', 'images/19.jpg', 147, 'App\\Models\\Post', '2024-09-21 22:30:41', '2024-09-21 22:30:41'),
(158, 'dignissimos', 'jpg', 'images/17.jpg', 148, 'App\\Models\\Post', '2024-09-21 22:30:41', '2024-09-21 22:30:41'),
(159, 'nihil', 'jpg', 'images/16.jpg', 149, 'App\\Models\\Post', '2024-09-21 22:30:41', '2024-09-21 22:30:41'),
(160, 'natus', 'jpg', 'images/13.jpg', 150, 'App\\Models\\Post', '2024-09-21 22:30:41', '2024-09-21 22:30:41'),
(161, 'est', 'jpg', 'images/16.jpg', 151, 'App\\Models\\Post', '2024-09-21 22:30:41', '2024-09-21 22:30:41'),
(162, 'nobis', 'jpg', 'images/15.jpg', 152, 'App\\Models\\Post', '2024-09-21 22:30:41', '2024-09-21 22:30:41'),
(163, 'nisi', 'jpg', 'images/11.jpg', 153, 'App\\Models\\Post', '2024-09-21 22:30:41', '2024-09-21 22:30:41'),
(164, 'praesentium', 'jpg', 'images/3.jpg', 154, 'App\\Models\\Post', '2024-09-21 22:30:41', '2024-09-21 22:30:41'),
(165, 'inventore', 'jpg', 'images/16.jpg', 155, 'App\\Models\\Post', '2024-09-21 22:30:41', '2024-09-21 22:30:41'),
(166, 'vel', 'jpg', 'images/7.jpg', 156, 'App\\Models\\Post', '2024-09-21 22:30:41', '2024-09-21 22:30:41'),
(167, 'corrupti', 'jpg', 'images/14.jpg', 157, 'App\\Models\\Post', '2024-09-21 22:30:41', '2024-09-21 22:30:41'),
(168, 'minima', 'jpg', 'images/5.jpg', 158, 'App\\Models\\Post', '2024-09-21 22:30:41', '2024-09-21 22:30:41'),
(169, 'vel', 'jpg', 'images/8.jpg', 159, 'App\\Models\\Post', '2024-09-21 22:30:41', '2024-09-21 22:30:41'),
(170, 'non', 'jpg', 'images/17.jpg', 160, 'App\\Models\\Post', '2024-09-21 22:30:41', '2024-09-21 22:30:41'),
(171, 'facilis', 'jpg', 'images/6.jpg', 161, 'App\\Models\\Post', '2024-09-21 22:30:41', '2024-09-21 22:30:41'),
(172, 'porro', 'jpg', 'images/13.jpg', 162, 'App\\Models\\Post', '2024-09-21 22:30:41', '2024-09-21 22:30:41'),
(173, 'non', 'jpg', 'images/14.jpg', 163, 'App\\Models\\Post', '2024-09-21 22:30:41', '2024-09-21 22:30:41'),
(174, 'corrupti', 'jpg', 'images/10.jpg', 164, 'App\\Models\\Post', '2024-09-21 22:30:41', '2024-09-21 22:30:41'),
(175, 'consequatur', 'jpg', 'images/14.jpg', 165, 'App\\Models\\Post', '2024-09-21 22:30:41', '2024-09-21 22:30:41'),
(176, 'autem', 'jpg', 'images/6.jpg', 166, 'App\\Models\\Post', '2024-09-21 22:30:41', '2024-09-21 22:30:41'),
(177, 'iusto', 'jpg', 'images/10.jpg', 167, 'App\\Models\\Post', '2024-09-21 22:30:41', '2024-09-21 22:30:41'),
(178, 'aspernatur', 'jpg', 'images/2.jpg', 168, 'App\\Models\\Post', '2024-09-21 22:30:41', '2024-09-21 22:30:41'),
(179, 'corporis', 'jpg', 'images/20.jpg', 169, 'App\\Models\\Post', '2024-09-21 22:30:41', '2024-09-21 22:30:41'),
(180, 'velit', 'jpg', 'images/15.jpg', 170, 'App\\Models\\Post', '2024-09-21 22:30:41', '2024-09-21 22:30:41'),
(181, 'dolor', 'jpg', 'images/4.jpg', 171, 'App\\Models\\Post', '2024-09-21 22:30:41', '2024-09-21 22:30:41'),
(182, 'ea', 'jpg', 'images/19.jpg', 172, 'App\\Models\\Post', '2024-09-21 22:30:41', '2024-09-21 22:30:41'),
(183, 'voluptatum', 'jpg', 'images/19.jpg', 173, 'App\\Models\\Post', '2024-09-21 22:30:41', '2024-09-21 22:30:41'),
(184, 'consequatur', 'jpg', 'images/6.jpg', 174, 'App\\Models\\Post', '2024-09-21 22:30:41', '2024-09-21 22:30:41'),
(185, 'vel', 'jpg', 'images/17.jpg', 175, 'App\\Models\\Post', '2024-09-21 22:30:41', '2024-09-21 22:30:41'),
(186, 'hic', 'jpg', 'images/8.jpg', 176, 'App\\Models\\Post', '2024-09-21 22:30:41', '2024-09-21 22:30:41'),
(187, 'ut', 'jpg', 'images/4.jpg', 177, 'App\\Models\\Post', '2024-09-21 22:30:41', '2024-09-21 22:30:41'),
(188, 'ut', 'jpg', 'images/10.jpg', 178, 'App\\Models\\Post', '2024-09-21 22:30:42', '2024-09-21 22:30:42'),
(189, 'facere', 'jpg', 'images/11.jpg', 179, 'App\\Models\\Post', '2024-09-21 22:30:42', '2024-09-21 22:30:42'),
(190, 'impedit', 'jpg', 'images/9.jpg', 180, 'App\\Models\\Post', '2024-09-21 22:30:42', '2024-09-21 22:30:42'),
(191, 'quasi', 'jpg', 'images/2.jpg', 181, 'App\\Models\\Post', '2024-09-21 22:30:42', '2024-09-21 22:30:42'),
(192, 'accusantium', 'jpg', 'images/6.jpg', 182, 'App\\Models\\Post', '2024-09-21 22:30:42', '2024-09-21 22:30:42'),
(193, 'dolorem', 'jpg', 'images/13.jpg', 183, 'App\\Models\\Post', '2024-09-21 22:30:42', '2024-09-21 22:30:42'),
(194, 'ullam', 'jpg', 'images/8.jpg', 184, 'App\\Models\\Post', '2024-09-21 22:30:42', '2024-09-21 22:30:42'),
(195, 'qui', 'jpg', 'images/13.jpg', 185, 'App\\Models\\Post', '2024-09-21 22:30:42', '2024-09-21 22:30:42'),
(196, 'accusamus', 'jpg', 'images/8.jpg', 186, 'App\\Models\\Post', '2024-09-21 22:30:42', '2024-09-21 22:30:42'),
(197, 'dolorem', 'jpg', 'images/6.jpg', 187, 'App\\Models\\Post', '2024-09-21 22:30:42', '2024-09-21 22:30:42'),
(198, 'qui', 'jpg', 'images/2.jpg', 188, 'App\\Models\\Post', '2024-09-21 22:30:42', '2024-09-21 22:30:42'),
(199, 'accusantium', 'jpg', 'images/18.jpg', 189, 'App\\Models\\Post', '2024-09-21 22:30:42', '2024-09-21 22:30:42'),
(200, 'harum', 'jpg', 'images/14.jpg', 190, 'App\\Models\\Post', '2024-09-21 22:30:42', '2024-09-21 22:30:42'),
(201, 'earum', 'jpg', 'images/12.jpg', 191, 'App\\Models\\Post', '2024-09-21 22:30:42', '2024-09-21 22:30:42'),
(202, 'un71066315-20240924-lf-5459-4253.jpg', 'jpg', 'images/WfOpk7ClZ6HPMeBXIlJCqFfXbtr3Iz8Jbh03PMf4.jpg', 192, 'App\\Models\\Post', '2024-09-21 22:30:42', '2024-09-24 23:35:22'),
(203, 'nesciunt', 'jpg', 'images/14.jpg', 193, 'App\\Models\\Post', '2024-09-21 22:30:42', '2024-09-21 22:30:42'),
(204, 'quaerat', 'jpg', 'images/7.jpg', 194, 'App\\Models\\Post', '2024-09-21 22:30:42', '2024-09-21 22:30:42'),
(205, 'saepe', 'jpg', 'images/6.jpg', 195, 'App\\Models\\Post', '2024-09-21 22:30:42', '2024-09-21 22:30:42'),
(206, 'neque', 'jpg', 'images/13.jpg', 196, 'App\\Models\\Post', '2024-09-21 22:30:42', '2024-09-21 22:30:42'),
(207, 'vel', 'jpg', 'images/11.jpg', 197, 'App\\Models\\Post', '2024-09-21 22:30:42', '2024-09-21 22:30:42'),
(208, 'ut', 'jpg', 'images/12.jpg', 198, 'App\\Models\\Post', '2024-09-21 22:30:42', '2024-09-21 22:30:42'),
(209, 'ullam', 'jpg', 'images/11.jpg', 199, 'App\\Models\\Post', '2024-09-21 22:30:42', '2024-09-21 22:30:42'),
(210, 'ab', 'jpg', 'images/15.jpg', 200, 'App\\Models\\Post', '2024-09-21 22:30:42', '2024-09-21 22:30:42'),
(267, 'f3.jpg', 'jpg', 'images/HGXb8AOEl0ljoUPGaLVk1r6h7QhXRjtxpTPqhcHC.jpg', 48, 'App\\Models\\User', '2022-06-22 08:22:51', '2022-06-22 08:22:51'),
(268, '125162632_105916701339982_2384025661873347610_n.jpg', 'jpg', 'images/PZNAnL0LBRqETMGPnpb9ejJuJ1OJcGFd9qu6JKiz.jpg', 49, 'App\\Models\\User', '2022-06-22 08:23:23', '2022-06-22 08:23:23'),
(269, '252504160_425277925645345_6988607520823719457_n.jpg', 'jpg', 'images/2SZ69XiIetr0YSaCwWlC6mgjYCZjcMFp3yBPkeoB.jpg', 50, 'App\\Models\\User', '2022-06-22 08:23:57', '2022-06-22 08:23:57'),
(270, '272160728_1188672085240384_8325401321066632048_n.jpg', 'jpg', 'images/XNSsQ3lkGVIUXSXbxaeKIl3RSFn2QtJuKCru5ecP.jpg', 52, 'App\\Models\\User', '2022-06-22 08:24:29', '2022-06-22 08:24:29'),
(271, 'anh-gai-xinh-toc-ngang-vai-2k4-7.jpg', 'jpg', 'images/FyZpCobdHCnHlH6t9TGjo7kbRR1AU9icye867URe.jpg', 51, 'App\\Models\\User', '2022-06-22 08:25:07', '2022-06-22 08:25:07'),
(272, 'Gai-xinh-chau-A-8.jpg', 'jpg', 'images/lvkYrHIP9O0X0KGLXwVG8Tm2RUCNLLGDI3eYXHhr.jpg', 53, 'App\\Models\\User', '2022-06-22 08:26:22', '2022-06-22 08:26:22'),
(273, 'gai-xinh-deo-kinh-8.jpg', 'jpg', 'images/i5nJ0kRjoi8ZlLOeIlW5LfjJHly2eYJ8hwRBVYC3.jpg', 54, 'App\\Models\\User', '2022-06-22 08:27:04', '2022-06-22 08:27:04'),
(274, 't1.jpg', 'jpg', 'images/cxTJUnYtGFjqY9au56C30HFRHqBezYyaP1aL940n.jpg', 55, 'App\\Models\\User', '2022-06-22 08:27:34', '2022-06-22 08:27:34'),
(275, 'gai-xinh-han-quoc-diu-dang.jpg', 'jpg', 'images/0LTTzp1CDZonxQmJZCmDm8anKkCmeMOfhcznYb0P.jpg', 56, 'App\\Models\\User', '2022-06-22 08:28:08', '2022-06-22 08:28:08'),
(276, '275945099_1164501710991474_4696948366857919220_n.jpg', 'jpg', 'images/B0NYn2IZ02L8HslWEtUHnA8sWGUK3VVzUl5P2dr5.jpg', 57, 'App\\Models\\User', '2022-06-22 08:28:39', '2022-06-22 08:28:39'),
(277, 'hinh-anh-co-gai-xu-hue-xinh-dep-voi-chiec-ao-dai-9.jpg', 'jpg', 'images/TnLHtj52iPAUIa5154ghueIxFxnu2mqOmesOPcKw.jpg', 58, 'App\\Models\\User', '2022-06-22 08:29:08', '2022-06-22 08:29:08'),
(278, 'hinh-nen-gai-xinh-ao-dai-anh-gai-dep-hot-girl-de-thuong-hoc-sinh-1429-14.jpg', 'jpg', 'images/popee7IphI31Cn8JyB8ZkCqMqthBpXtHDwAxvPpM.jpg', 59, 'App\\Models\\User', '2022-06-22 08:29:42', '2022-06-22 08:29:42'),
(279, 'gai-xinh-4k-17.jpg', 'jpg', 'images/AyYOGpBZXobuD20ssCeT7yKkQzso4UKxL9cOjgzM.jpg', 60, 'App\\Models\\User', '2022-06-22 08:30:34', '2022-06-22 08:30:34'),
(280, 'f4.jpg', 'jpg', 'images/UUKrwYb2FDdB31fqoqmP1iNY6Xefgaqs0xtIC3ZV.jpg', 1, 'App\\Models\\User', '2022-06-22 08:30:50', '2022-06-22 08:30:50'),
(281, '200-anh-gai-xinh-vu-to-goi-cam-body-nong-bong-mong-cong-dang-nuot-ngon-deep-viet-2020-8-0.jpg', 'jpg', 'images/vi7pLO0qlZyYXNlGooWjlEZ02txkBdOItwfDbjcj.jpg', 3, 'App\\Models\\User', '2022-06-22 08:31:05', '2022-06-22 08:31:05'),
(282, 'f3.jpg', 'jpg', 'images/M0UnufQ0Ce6xOYly24Nwuz5MmYe1UtertWb5YRz3.jpg', 1, 'App\\Models\\User', '2022-06-22 17:41:57', '2022-06-22 17:41:57'),
(283, '1477194714201598459787443313747799195812329o-1616403006191691426150.jpg', 'jpg', 'images/vht5QmjLu4Gv7wrgVoLbq24BZsROop9YJJzrpCnl.jpg', 61, 'App\\Models\\User', '2022-06-22 22:24:19', '2022-06-22 22:24:19'),
(284, '124989490_105916621339990_7586812816040705502_n.jpg', 'jpg', 'images/AOt6pDqfGq5Vj9HHFp6OmpXRbb2rKI8GQwzrI4Vs.jpg', 62, 'App\\Models\\User', '2022-06-22 22:24:56', '2022-06-22 22:24:56'),
(285, '125162632_105916701339982_2384025661873347610_n.jpg', 'jpg', 'images/R9rv8A60Mxi90gbG9YI8sXbnXJLq28PPFrqYpE27.jpg', 63, 'App\\Models\\User', '2022-06-22 22:25:26', '2022-06-22 22:25:26'),
(286, '252504160_425277925645345_6988607520823719457_n.jpg', 'jpg', 'images/TZv95MmjAHTPNUcyq0jcqx1qd2LuZc2fBoq6EgQ7.jpg', 64, 'App\\Models\\User', '2022-06-22 22:26:10', '2022-06-22 22:26:10'),
(287, 'hinh-anh-trai-dep-soai-ca.jpg', 'jpg', 'images/CSLdm4eJm9Gg6YxyAZq8hmCDCJVOIJdUivwkfG0j.jpg', 65, 'App\\Models\\User', '2022-06-22 22:26:44', '2022-06-22 22:26:44'),
(288, 'gai-xinh-facebook-bich-cherry7.jpg', 'jpg', 'images/gfGPBjBMIoBogqCH2y9KBjJul8M0R8ouwhuKpUC6.jpg', 66, 'App\\Models\\User', '2022-06-22 22:27:42', '2022-06-22 22:27:42'),
(289, 'gai-xinh-facebook-hot-girl-ngo-thu6.jpg', 'jpg', 'images/dvD2pXX2s13HUK4Q3Au7x2XQRlJO2MPr9Nx1umjT.jpg', 67, 'App\\Models\\User', '2022-06-22 22:28:19', '2022-06-22 22:28:19'),
(290, 'f1.jpg', 'jpg', 'images/RqHXvgSzRorMrt2K4YNbSY7Uy3ZcIJz7ERI5ucUL.jpg', 68, 'App\\Models\\User', '2022-06-22 22:28:53', '2022-06-22 22:28:53'),
(291, 'Anh-Nen-Gai-Xinh-4K- 14.jpg', 'jpg', 'images/3ayFdWXaU83aXPw9lCM6NREqAJgdCnAAqO3L4bAA.jpg', 69, 'App\\Models\\User', '2022-06-22 22:29:36', '2022-06-22 22:29:36'),
(292, 'gai-xinh-facebook-ngo-le-quyen-kem-xoi4.jpg', 'jpg', 'images/1pGMZzUD1dDtk7icBbbCZqSkrrT4sKDXVMyZr9pI.jpg', 70, 'App\\Models\\User', '2022-06-22 22:30:19', '2022-06-22 22:30:19'),
(293, 'gai-xinh-facebook-vu-hoang-yen2.jpg', 'jpg', 'images/OyVYQsKOc1cVnu6T0F0IP90XYHbScqJZiPcxtkJm.jpg', 71, 'App\\Models\\User', '2022-06-22 22:30:52', '2022-06-22 22:30:52'),
(294, 'hinh-nen-dien-thoai-trai-han-quoc-13.jpg', 'jpg', 'images/K9n4jyDMF6tJaqur5bgzXqcNsMOU4BUizl4iu2k4.jpg', 72, 'App\\Models\\User', '2022-06-22 22:32:06', '2022-06-22 22:32:06'),
(295, 'gai-xinh-fb-dien-vien-bui-ha-anh12.jpg', 'jpg', 'images/e5pNzE7YUI8qKi343tyN4WAMA9mcvJs02dO1iJ0z.jpg', 73, 'App\\Models\\User', '2022-06-22 22:32:55', '2022-06-22 22:32:55'),
(296, 'hinh-anh-co-gai-xu-hue-xinh-dep-voi-chiec-ao-dai-9.jpg', 'jpg', 'images/Ox5GUiixqAxI4JU5NMHWcHhZaBb5JT9WY5o5Wxgx.jpg', 74, 'App\\Models\\User', '2022-06-22 22:33:51', '2022-06-22 22:33:51'),
(297, 'hinh-anh-trai-dep-soai-ca.jpg', 'jpg', 'images/ag3f1yJGl0YIbL3XyrbOYInG7kJ34vp3S8r6X2XF.jpg', 75, 'App\\Models\\User', '2022-06-22 22:34:30', '2022-06-22 22:34:30'),
(298, 'f1.jpg', 'jpg', 'images/axMvLcA5DNKPyo0O47IlvXjHpnhN1bw7fAkZO00A.jpg', 76, 'App\\Models\\User', '2022-06-22 22:35:09', '2022-06-22 22:35:09'),
(299, '1477194714201598459787443313747799195812329o-1616403006191691426150.jpg', 'jpg', 'images/WeoUUPCOJaSP3qFpSSItVGFr3YQQFlbwDnvEKFvs.jpg', 77, 'App\\Models\\User', '2022-06-22 22:36:03', '2022-06-22 22:36:03'),
(300, '1477194714201598459787443313747799195812329o-1616403006191691426150.jpg', 'jpg', 'images/jqKAHu1PoP7O1veaNwId2H6qPH47gUJXNcQarIhK.jpg', 78, 'App\\Models\\User', '2022-06-22 22:36:37', '2022-06-22 22:36:37'),
(301, 't4.jpg', 'jpg', 'images/EyMSyH69jDxWohAKszyulIcbPL0uJta50jAOCibM.jpg', 79, 'App\\Models\\User', '2022-06-22 22:37:29', '2022-06-22 22:37:29'),
(302, 't3.jpg', 'jpg', 'images/vIGbZPC9h9VWxYWKqFD2LLutSjsN6LWmFObGJfUk.jpg', 80, 'App\\Models\\User', '2022-06-22 22:38:00', '2022-06-22 22:38:00'),
(303, 't1.jpg', 'jpg', 'images/GJg3tDIQsjhkk6r9CJCgGtradFWCXJFNrju4CpZL.jpg', 81, 'App\\Models\\User', '2022-06-22 22:38:57', '2022-06-22 22:38:57'),
(304, 'person3.jpg', 'jpg', 'images/I3MZbujGHoY7SwHAkrEHNU2WGqvMRhmmborlvgs1.jpg', 82, 'App\\Models\\User', '2022-06-22 22:39:43', '2022-06-22 22:39:43'),
(305, '278237640_162460989483219_8673724801517242978_n.jpg', 'jpg', 'images/bKFMLfGQFP3cb169mgPGae8oKdDseGLGhHsZHrPk.jpg', 83, 'App\\Models\\User', '2022-06-22 22:40:49', '2022-06-22 22:40:49'),
(306, 'person2.jpg', 'jpg', 'images/mP5BvaDBoAvtXUEkDmzHsc0zaBqokdHWWxBDWGPb.jpg', 84, 'App\\Models\\User', '2022-06-22 22:41:19', '2022-06-22 22:41:19'),
(307, 'hinh-nen-dien-thoai-trai-han-quoc-13.jpg', 'jpg', 'images/Hs7fFBfO0FI60RYomkFs11gvpNie3YWCNg1HQ0Du.jpg', 85, 'App\\Models\\User', '2022-06-22 22:42:04', '2022-06-22 22:42:04'),
(308, 'hinh-nen-dien-thoai-trai-han-quoc-13.jpg', 'jpg', 'images/wARLCL2kKCY7A39HI3GxSfLBsV8lHGkcLavrUvSs.jpg', 86, 'App\\Models\\User', '2022-06-22 22:42:31', '2022-06-22 22:42:31'),
(309, 'hinh-anh-trai-dep-soai-ca.jpg', 'jpg', 'images/De5jMHfLBkoLLGjYeL9NpXOYicxnuwFb2hCQuslF.jpg', 87, 'App\\Models\\User', '2022-06-22 22:43:22', '2022-06-22 22:43:22'),
(310, '188325428_2888931181350428_9150854289787262532_n.jpg', 'jpg', 'images/ebthsBSOM9IkmYlnUkhp9ZBpOLX5gRYor884iMDa.jpg', 88, 'App\\Models\\User', '2022-06-22 22:44:14', '2022-06-22 22:44:14'),
(311, '8_98889.jpg', 'jpg', 'images/sUFjAiuuIofJSV1lmbla73AOHZfq0ESFmNXxhFwq.jpg', 89, 'App\\Models\\User', '2022-06-22 22:45:12', '2022-06-22 22:45:12'),
(312, 'f1.jpg', 'jpg', 'images/8ncvdb3zdagqwp4EcxbDVHQh1qNmODXLz9Wc50dH.jpg', 90, 'App\\Models\\User', '2022-06-22 22:45:44', '2022-06-22 22:45:44'),
(313, 'f3.jpg', 'jpg', 'images/vxdj1i0zrS2vQxAlLiDKkxATWTKusMsv92xHFXGH.jpg', 91, 'App\\Models\\User', '2022-06-22 22:46:46', '2022-06-22 22:46:46'),
(314, 'f4.jpg', 'jpg', 'images/iULGsYvmQbSOYVF9Xn2Q20DCcVhcI4CPr9eRm1KZ.jpg', 92, 'App\\Models\\User', '2022-06-22 22:48:04', '2022-06-22 22:48:04'),
(315, 'avata3.jpg', 'jpg', 'images/dGbWGdsEmaQftBoaf3x79sdJArZb4CwSzNTvh7uv.jpg', 93, 'App\\Models\\User', '2022-06-22 22:49:57', '2022-06-22 22:49:57'),
(316, 'avata4.jpg', 'jpg', 'images/z8rThJ7L8o1sf8aivvInb39wkVaJ2GNj8p3tClaL.jpg', 94, 'App\\Models\\User', '2022-06-22 22:50:55', '2022-06-22 22:50:55'),
(317, 'avata5.jpg', 'jpg', 'images/UQH8UodvPWhi0lZsTLqBZluxLJ8eWrq7gJkdWijp.jpg', 95, 'App\\Models\\User', '2022-06-22 22:51:45', '2022-06-22 22:51:45'),
(318, '9fe63ff3f0534feb407edc66589163e8.jpg', 'jpg', 'images/8JPjLl3fvG0ws1DUQ6w1hwZo44UFvxoQrj6OL5LB.jpg', 96, 'App\\Models\\User', '2022-06-22 22:52:50', '2022-06-22 22:52:50'),
(319, '200-anh-gai-xinh-vu-to-goi-cam-body-nong-bong-mong-cong-dang-nuot-ngon-deep-viet-2020-8-0.jpg', 'jpg', 'images/TcFiC3U5AwU86J63Ln77fFMEZ0AR1updhYPoZMW1.jpg', 97, 'App\\Models\\User', '2022-06-22 22:53:36', '2022-06-22 22:53:36'),
(320, 'avata6.jpg', 'jpg', 'images/01nsPH3nyNfg3zxagCpP3m5z8652mD71YMyITTq4.jpg', 98, 'App\\Models\\User', '2022-06-22 22:54:03', '2022-06-22 22:54:03'),
(321, 'avata7.jpg', 'jpg', 'images/drs7fsYl1ztYOLCW26QUsKkcc9kMvbTdCIh5TRsz.jpg', 99, 'App\\Models\\User', '2022-06-22 22:54:37', '2022-06-22 22:54:37'),
(322, '89162867_856770978152457_6548562616468373504_n.jpg', 'jpg', 'images/f9kqxIV2DjUgx7fPk2Ssr2zkLJxwJayYwKVpwOXF.jpg', 100, 'App\\Models\\User', '2022-06-22 22:55:11', '2022-06-22 22:55:11'),
(323, 'chup-anh-nam-than-va-nhung-dieu-can-biet.jpg', 'jpg', 'images/RiQP1p3qFJmn70sOZi06ggjBQAd81FQL1dzLCogp.jpg', 101, 'App\\Models\\User', '2022-06-22 22:55:46', '2022-06-22 22:55:46'),
(324, '124989490_105916621339990_7586812816040705502_n.jpg', 'jpg', 'images/y127dKTGzY7Oz58mOSNIcY2mBHOdjCWAFJpMJSTk.jpg', 102, 'App\\Models\\User', '2022-06-22 22:57:39', '2022-06-22 22:57:39'),
(325, '125162632_105916701339982_2384025661873347610_n.jpg', 'jpg', 'images/f1bTSYJpJgPmiWpBWY6J2ImTbMEx09AdhhPoqzip.jpg', 103, 'App\\Models\\User', '2022-06-22 22:58:23', '2022-06-22 22:58:23'),
(326, '1477194714201598459787443313747799195812329o-1616403006191691426150.jpg', 'jpg', 'images/Ll2tA7ODIOyPlGpfinTR3nKsOsp71cp8laFeEIUA.jpg', 104, 'App\\Models\\User', '2022-06-22 22:59:00', '2022-06-22 22:59:00'),
(327, 'avata3.jpg', 'jpg', 'images/mr89AvGy61wiV7tYA7dDOP7rTt9sJn8xz7TC9k2C.jpg', 105, 'App\\Models\\User', '2022-06-22 22:59:32', '2022-06-22 22:59:32'),
(328, '252504160_425277925645345_6988607520823719457_n.jpg', 'jpg', 'images/lhe39UpaHXhWjBKCoGESrVwIimHLLPmDo3SnD4ih.jpg', 106, 'App\\Models\\User', '2022-06-22 23:00:10', '2022-06-22 23:00:10'),
(329, '272160728_1188672085240384_8325401321066632048_n.jpg', 'jpg', 'images/P7rcqZiT5rbBWCunfAYMu39UpFSBZnNKouh93OJo.jpg', 107, 'App\\Models\\User', '2022-06-22 23:00:34', '2022-06-22 23:00:34'),
(330, 'avata4.jpg', 'jpg', 'images/8hDajISGzH5nWsnkOtFQeEuBfcRsnXJdWq7LrFi5.jpg', 108, 'App\\Models\\User', '2022-06-22 23:01:09', '2022-06-22 23:01:09'),
(331, 'avata5.jpg', 'jpg', 'images/WTOaysRL779nnPfEILofbDsRD8qI6XqTlPhnkQbg.jpg', 109, 'App\\Models\\User', '2022-06-22 23:01:36', '2022-06-22 23:01:36'),
(332, '275945099_1164501710991474_4696948366857919220_n.jpg', 'jpg', 'images/fpAsMexCT3Qg82dAxd11xhMHtpXYY0RegOUjO3RB.jpg', 110, 'App\\Models\\User', '2022-06-22 23:02:08', '2022-06-22 23:02:08'),
(333, 'avata6.jpg', 'jpg', 'images/FfoBSmqWq05Q3RiYTAo9CgyuIWz10P4NviFZKMLr.jpg', 111, 'App\\Models\\User', '2022-06-22 23:02:32', '2022-06-22 23:02:32'),
(334, 'avata7.jpg', 'jpg', 'images/Jen6kqWZCZ7L3wTIR5yrK8athJi1QW52cryOcHJh.jpg', 112, 'App\\Models\\User', '2022-06-22 23:03:05', '2022-06-22 23:03:05'),
(335, '289221703_2148064855371387_8778913776725984156_n.jpg', 'jpg', 'images/AnrPjuLzUBpcduLJBkKxMLoXWlXBan2XxP3dmPwO.jpg', 113, 'App\\Models\\User', '2022-06-22 23:03:32', '2022-06-22 23:03:32'),
(336, '870505547a8196d69ecd836bbb2c4c6f.jpg', 'jpg', 'images/63Vt1arDYqndsJRBkVTUK6RzFYKAqHOjzujPIOeh.jpg', 114, 'App\\Models\\User', '2022-06-22 23:04:04', '2022-06-22 23:04:04'),
(337, 'chup-anh-nam-than-va-nhung-dieu-can-biet.jpg', 'jpg', 'images/yzbDpPl0RcPhp80r5RiAK1YWmpFG3ARpUSWG1z12.jpg', 115, 'App\\Models\\User', '2022-06-22 23:04:29', '2022-06-22 23:04:29'),
(338, 'f1.jpg', 'jpg', 'images/WNmcoeCdQoF7Zjj8BeC6hcIHohm8PL91cvqews24.jpg', 116, 'App\\Models\\User', '2022-06-22 23:05:04', '2022-06-22 23:05:04'),
(339, 'anh-gai-xinh-de-thuong-cap-3-580x580.jpg', 'jpg', 'images/vG0k2psJqLHfSpWDNq5GBrWkqKgRMqL6gz0H3IFG.jpg', 117, 'App\\Models\\User', '2022-06-22 23:05:39', '2022-06-22 23:05:39'),
(340, 'anhgaixinhtoc2k9180.jpg', 'jpg', 'images/AVlUvcSt8lY2Wq1ytngypGpsLXk2pQqaWYqWTEP0.jpg', 118, 'App\\Models\\User', '2022-06-22 23:06:01', '2022-06-22 23:06:01'),
(341, 'f3.jpg', 'jpg', 'images/JfEdAehfnu9fH1m1sacg8Y1nFehXEP5lYzM3ISWH.jpg', 119, 'App\\Models\\User', '2022-06-22 23:06:37', '2022-06-22 23:06:37'),
(342, 'f4.jpg', 'jpg', 'images/7Ltl1aH9G6yO9xRE5w8o6TwqLYBz3D4RsEBu6Nz0.jpg', 120, 'App\\Models\\User', '2022-06-22 23:07:18', '2022-06-22 23:07:18'),
(343, 'anh-gai-xinh-de-thuong-cap-3-580x580.jpg', 'jpg', 'images/YFOgvad2d0P2E0Gs3hIq5uQyZS9V7usZAtFwSD7n.jpg', 121, 'App\\Models\\User', '2022-06-22 23:12:43', '2022-06-22 23:12:43'),
(344, 'anh-gai-xinh-toc-ngang-vai-2k4-7.jpg', 'jpg', 'images/ogoC2dG7b2WdXZ9IImxWpaEuCfTVgxVA9CGf03zC.jpg', 122, 'App\\Models\\User', '2022-06-22 23:13:45', '2022-06-22 23:13:45'),
(345, 'anh-gai-xinh-toc-ngang-vai-2k9-4-768x1151.jpg', 'jpg', 'images/JbmbON8rWAMJFjapdOn3UiyHnaRlbuDexlc0WLYf.jpg', 123, 'App\\Models\\User', '2022-06-22 23:14:41', '2022-06-22 23:14:41'),
(346, 'hinh-anh-trai-dep-soai-ca.jpg', 'jpg', 'images/7tktR4Rtc2cQPZgSuDZSYGohrrOAvWjOtUQKQfs2.jpg', 124, 'App\\Models\\User', '2022-06-22 23:15:08', '2022-06-22 23:15:08'),
(347, 'hinh-nen-dien-thoai-trai-han-quoc-13.jpg', 'jpg', 'images/eN3rRz23WDsDmkbPFsl489IQcuKaPnSDDb5zG3PH.jpg', 125, 'App\\Models\\User', '2022-06-22 23:15:47', '2022-06-22 23:15:47'),
(348, 'person2.jpg', 'jpg', 'images/qwxKgpdTSfd72Z1bALPrv1L9fVt82TaHJr3bRqbm.jpg', 126, 'App\\Models\\User', '2022-06-22 23:16:15', '2022-06-22 23:16:15'),
(349, 'anh-hot-gril-lanh-lung-1.jpg', 'jpg', 'images/HVKnvoNJdx2qKktFYFHm7K6aExrZ3Q30GUEa4ovL.jpg', 127, 'App\\Models\\User', '2022-06-22 23:16:52', '2022-06-22 23:16:52'),
(350, 'Anh-Nen-Gai-Xinh-4K- 14.jpg', 'jpg', 'images/79s8ooDEm5ZKzaM3ZbWwZeDvxxSpmZTTGdIHWh3o.jpg', 128, 'App\\Models\\User', '2022-06-22 23:17:17', '2022-06-22 23:17:17'),
(351, 'avata1.jpg', 'jpg', 'images/SrYixyWMMuWyfwdGIpm8S85z4c5neeseHmNVUVFx.jpg', 129, 'App\\Models\\User', '2022-06-22 23:17:48', '2022-06-22 23:17:48'),
(352, 'avata3.jpg', 'jpg', 'images/QLqHwZW45iTnchbdP54mtsvzbt92pF6901LvooML.jpg', 130, 'App\\Models\\User', '2022-06-22 23:18:41', '2022-06-22 23:18:41'),
(353, 'avata2.jpg', 'jpg', 'images/OhEBm12tWBhCpfcX8gaTW1e6EWVuYtlx1u858ppc.jpg', 131, 'App\\Models\\User', '2022-06-22 23:19:17', '2022-06-22 23:19:17'),
(354, 'gai-xinh--1.jpg', 'jpg', 'images/G5hrySC81NnjuL9VGUCYHrcEi3HOgoSGdAlFuQzs.jpg', 132, 'App\\Models\\User', '2022-06-22 23:19:52', '2022-06-22 23:19:52'),
(355, 'gai-xinh-4k-13.jpg', 'jpg', 'images/ZZYNI1cf9izY1SwJxoxzjL4GOVD0n7ucaXGgqBhk.jpg', 133, 'App\\Models\\User', '2022-06-22 23:20:28', '2022-06-22 23:20:28'),
(356, 't4.jpg', 'jpg', 'images/QnWyvRZxdOamztH8NLMBDzIjDKAzuQlFEKKuA7CC.jpg', 134, 'App\\Models\\User', '2022-06-22 23:21:05', '2022-06-22 23:21:05'),
(357, 't3.jpg', 'jpg', 'images/yQzsVtjBVNvbrGkpdEMrY4V47v496grLjKF7PfHh.jpg', 135, 'App\\Models\\User', '2022-06-22 23:21:28', '2022-06-22 23:21:28'),
(358, 'hinh-anh-co-gai-xu-hue-xinh-dep-voi-chiec-ao-dai-9.jpg', 'jpg', 'images/zskLbdnWnRMk25fqpqCxdw1MsEyf6e16lNnGhoTU.jpg', 136, 'App\\Models\\User', '2022-06-22 23:22:01', '2022-06-22 23:22:01'),
(359, 'Gai-xinh-chau-A-8.jpg', 'jpg', 'images/cAnjQrQhHWGB65Uz5PIoAjWrXmRtVJkWZMz33Okx.jpg', 137, 'App\\Models\\User', '2022-06-22 23:22:49', '2022-06-22 23:22:49'),
(360, 'hinh-anh-girl-xinh-gai-dep-de-thuong-nhat-viet-nam-191.jpg', 'jpg', 'images/eTwWV1iBodWIkXNVASjoyqI7svGY1H12Adx3gAS6.jpg', 138, 'App\\Models\\User', '2022-06-22 23:23:23', '2022-06-22 23:23:23'),
(361, 'gai-xinh-facebook-bich-cherry7.jpg', 'jpg', 'images/czLG5EDsftVywUrDBBVJjzyUukz1qLbjVgOJyO3t.jpg', 139, 'App\\Models\\User', '2022-06-22 23:23:55', '2022-06-22 23:23:55'),
(362, 'gai-xinh-facebook-hot-girl-ngo-thu6.jpg', 'jpg', 'images/z7F8Z2xVn6AjO5YKNmcRQ0O7mGUHuYd1dXPeUWlm.jpg', 140, 'App\\Models\\User', '2022-06-22 23:24:18', '2022-06-22 23:24:18'),
(363, 'gai-xinh-facebook-hot-girl-yen-tato2.jpg', 'jpg', 'images/WuwMSn40mCNNE6VVkTyF58na73ZPgMZLHHWkXbJi.jpg', 141, 'App\\Models\\User', '2022-06-22 23:25:34', '2022-06-22 23:25:34'),
(364, 'gai-xinh-facebook-ngo-le-quyen-kem-xoi4.jpg', 'jpg', 'images/tbHyOPyEXXSS8JaSuO9FPagofCFtBQNpqYjOHTMO.jpg', 142, 'App\\Models\\User', '2022-06-22 23:27:32', '2022-06-22 23:27:32'),
(365, 'gai-xinh-facebook-vu-hoang-yen2.jpg', 'jpg', 'images/DAHV3LeWkTl2Q5JF7JMOrB6kR2kSUipaB8KgXQYW.jpg', 143, 'App\\Models\\User', '2022-06-22 23:28:08', '2022-06-22 23:28:08'),
(366, 't1.jpg', 'jpg', 'images/MQCEPje03F6lMy6StGWBuEOE28XlF9M0kMCDM8X7.jpg', 144, 'App\\Models\\User', '2022-06-22 23:28:46', '2022-06-22 23:28:46'),
(367, 'gai-xinh-fb-dien-vien-bui-ha-anh12.jpg', 'jpg', 'images/RB73DqdcZgy1Lb94CMhi5IEoVWvNObXddUgQjeQO.jpg', 145, 'App\\Models\\User', '2022-06-22 23:29:20', '2022-06-22 23:29:20'),
(368, 'hinh-anh-girl-xinh-gai-dep-de-thuong-nhat-viet-nam-191.jpg', 'jpg', 'images/LOWrBkSRY3yO3gG7bz0bgfjpgP9933exHxXYck9v.jpg', 146, 'App\\Models\\User', '2022-06-22 23:29:43', '2022-06-22 23:29:43'),
(369, 'hinh-nen-gai-xinh-ao-dai-anh-gai-dep-hot-girl-de-thuong-hoc-sinh-1429-14.jpg', 'jpg', 'images/AOoVvPpIUhCD96PdtPxFyX5sVo0AqyTAcEzw7WRh.jpg', 147, 'App\\Models\\User', '2022-06-22 23:30:49', '2022-06-22 23:30:49'),
(370, 'image_person4.jpg', 'jpg', 'images/0aUr7qKyVRY5C6Locy1GYJJLHWARGfpYtFCAXvDL.jpg', 148, 'App\\Models\\User', '2022-06-22 23:31:16', '2022-06-22 23:31:16'),
(371, 'person3.jpg', 'jpg', 'images/hbsgngy0ezUqUmC2kywTTsZrNsk7bT4cabyo6A7c.jpg', 149, 'App\\Models\\User', '2022-06-22 23:31:56', '2022-06-22 23:31:56'),
(372, 'person2.jpg', 'jpg', 'images/lSruKvXQeV4myyXpGXSJda2s1MvsF1OVdtaZc8wn.jpg', 150, 'App\\Models\\User', '2022-06-22 23:32:33', '2022-06-22 23:32:33'),
(373, 'image_person7.jpg', 'jpg', 'images/GGgctvgXAKHZchKKoh5AZJaxSap1129PSzuF1493.jpg', 151, 'App\\Models\\User', '2022-06-22 23:33:06', '2022-06-22 23:33:06'),
(374, 'hinh-nen-dien-thoai-trai-han-quoc-13.jpg', 'jpg', 'images/3XxAcuJQ9ltSJsOdWrKniCO9v93lJervVivWxn4m.jpg', 152, 'App\\Models\\User', '2022-06-22 23:33:46', '2022-06-22 23:33:46'),
(375, 'hinh-anh-trai-dep-soai-ca.jpg', 'jpg', 'images/0AUBnNfNSZNZ63FuM9x7KqmNeXXXdk0EwF7iFp2W.jpg', 153, 'App\\Models\\User', '2022-06-22 23:34:16', '2022-06-22 23:34:16'),
(376, 'avata3.jpg', 'jpg', 'images/BQ0sGdBe0WQOuR9PrJjFrkObUA7GMQ0DrdgY29Oo.jpg', 154, 'App\\Models\\User', '2022-06-22 23:34:55', '2022-06-22 23:34:55'),
(377, 'avata4.jpg', 'jpg', 'images/9zoNNe1LMDy5kR2godzk2eTIwJhAVI59qPCiTLwj.jpg', 155, 'App\\Models\\User', '2022-06-22 23:35:24', '2022-06-22 23:35:24'),
(378, 'avata5.jpg', 'jpg', 'images/QYdcXK30KRuaGV2Q8GEhrmwh8C8tGRAlldHbWs9R.jpg', 156, 'App\\Models\\User', '2022-06-22 23:35:47', '2022-06-22 23:35:47'),
(379, 'avata6.jpg', 'jpg', 'images/LLirlfCCkEuBawyIJOg0BUAabPvsMlBdAQoblJ6Q.jpg', 157, 'App\\Models\\User', '2022-06-22 23:36:44', '2022-06-22 23:36:44'),
(380, 'avata7.jpg', 'jpg', 'images/MhJgreQ4X8ncPszGemeOEM5GeaG9U4YYmhTyTeL6.jpg', 158, 'App\\Models\\User', '2022-06-22 23:37:08', '2022-06-22 23:37:08'),
(381, 'hinh-anh-trai-dep-soai-ca.jpg', 'jpg', 'images/FCOhrc0fe9XurErIlNFiGB0DYDcOglyBlpqH6TRh.jpg', 159, 'App\\Models\\User', '2022-06-22 23:38:28', '2022-06-22 23:38:28'),
(382, 'person2.jpg', 'jpg', 'images/mwgCGmHQL3H3ZXBLk2X2FtQOLfXnxSfxBjqwBcaT.jpg', 160, 'App\\Models\\User', '2022-06-22 23:40:51', '2022-06-22 23:40:51'),
(383, 'person2.jpg', 'jpg', 'images/jYOyg2CcF5BWBAMgdZfwHqjuaKzzQnZlG0HsMEKO.jpg', 160, 'App\\Models\\User', '2022-06-22 23:40:51', '2022-06-22 23:40:51'),
(384, '262799121_912084779440410_3500906498069295326_n.jpg', 'jpg', 'images/oif9QBgikQP7i27Pkz1MxL2GPtMimbeNHYg6uDEv.jpg', 161, 'App\\Models\\User', '2022-06-23 05:34:14', '2022-06-23 05:34:14'),
(385, 'imager_1_19978_700.jpg', 'jpg', 'images/z7NwYHq3FVYHTwDJlorOOmcBBdxNUZorEyZDGZlR.jpg', 162, 'App\\Models\\User', '2022-06-23 05:35:53', '2022-06-23 05:35:53'),
(386, '1477194714201598459787443313747799195812329o-1616403006191691426150.jpg', 'jpg', 'images/mQitFHCyMCjtLVqS8Q75eVSTQTbjfQP4a5mKFt3v.jpg', 163, 'App\\Models\\User', '2022-06-23 05:36:21', '2022-06-23 05:36:21'),
(387, '10-nam-ca-si-ngoai-quoc-dep-trai-nhat-kpop-08-ngoisao.vn.jpg', 'jpg', 'images/2usVb9BgVXR06ORs4rbekVYrwSXHDX1hVtPnShS0.jpg', 164, 'App\\Models\\User', '2022-06-23 05:37:29', '2022-06-23 05:37:29'),
(388, '1477194714201598459787443313747799195812329o-1616403006191691426150.jpg', 'jpg', 'images/gsq51HRV5Atu1gst1mFkuD91RyJpWr9bAxkr8HY9.jpg', 165, 'App\\Models\\User', '2022-06-23 05:38:02', '2022-06-23 05:38:02'),
(389, 'unnamed.jpg', 'jpg', 'images/PC8FLsBJg87iEhkz28fFvlT3Whp3U32nr8S2paXP.jpg', 166, 'App\\Models\\User', '2022-06-23 05:38:38', '2022-06-23 05:38:38'),
(390, 'anhgaixinhtoc2k9180.jpg', 'jpg', 'images/bxraHew1fv64V4CqN9R10auogSiv6le3vHuEjUDT.jpg', 167, 'App\\Models\\User', '2022-06-23 05:39:05', '2022-06-23 05:39:05'),
(391, 'hinh-nen-dien-thoai-trai-han-quoc-13.jpg', 'jpg', 'images/qA25G9tiNBzrb1y2qBjMTZ3qC7r2WhGt81swcoJi.jpg', 168, 'App\\Models\\User', '2022-06-23 05:40:22', '2022-06-23 05:40:22'),
(392, 'hinh-anh-girl-xinh-gai-dep-de-thuong-nhat-viet-nam-191.jpg', 'jpg', 'images/6emYHz8AFQbYR1MiLzJkUSPLYeMfCyMompm3dWKX.jpg', 169, 'App\\Models\\User', '2022-06-23 05:40:54', '2022-06-23 05:40:54'),
(393, '125162632_105916701339982_2384025661873347610_n.jpg', 'jpg', 'images/NvIP4Kj6m7FynSxKmSUQ1kIjCUl2cELGyYXLsFeW.jpg', 170, 'App\\Models\\User', '2022-06-23 05:41:52', '2022-06-23 05:41:52'),
(394, '10-nam-ca-si-ngoai-quoc-dep-trai-nhat-kpop-08-ngoisao.vn.jpg', 'jpg', 'images/0d0FJ6eXbb1QDfqSLbmAoC5IKUkPidZjJdj5zX9h.jpg', 171, 'App\\Models\\User', '2022-06-23 05:42:37', '2022-06-23 05:42:37'),
(395, '289221703_2148064855371387_8778913776725984156_n.jpg', 'jpg', 'images/vrzVc2Z1HeHRieNYQpn2UzOyYww3M95CVF3FK755.jpg', 171, 'App\\Models\\User', '2022-06-23 05:43:27', '2022-06-23 05:43:27'),
(396, '278237640_162460989483219_8673724801517242978_n.jpg', 'jpg', 'images/biLMUOGPfvQkWhwDBCaxQMEKX0klnRC2ck3gHana.jpg', 171, 'App\\Models\\User', '2022-06-23 05:43:40', '2022-06-23 05:43:40'),
(397, '1477194714201598459787443313747799195812329o-1616403006191691426150.jpg', 'jpg', 'images/Z31I3P0krlzDFt330pyYLQ1zadohgRmE0yAb7AkR.jpg', 172, 'App\\Models\\User', '2022-06-23 05:44:41', '2022-06-23 05:44:41'),
(398, '278237640_162460989483219_8673724801517242978_n.jpg', 'jpg', 'images/yAWWExeMI0JB2MxS98MuB8oIRdXHr8eFpiL8M5lh.jpg', 173, 'App\\Models\\User', '2022-06-23 05:45:30', '2022-06-23 05:45:30'),
(399, '870505547a8196d69ecd836bbb2c4c6f.jpg', 'jpg', 'images/TmhrcRYTOXlKtYNIg467HkElTLBMyVrTWCfnHwX5.jpg', 174, 'App\\Models\\User', '2022-06-23 05:45:56', '2022-06-23 05:45:56'),
(400, 'anh-gai-xinh-de-thuong-cap-3-580x580.jpg', 'jpg', 'images/JB9iwA2GKSVNJbhu8HLGEsJqFXpGmMEYlT3LTklZ.jpg', 175, 'App\\Models\\User', '2022-06-23 05:46:28', '2022-06-23 05:46:28'),
(401, 'avata3.jpg', 'jpg', 'images/1nV0y8u7dWIwIglkzBgsSocv57lWGCgcNXPtsVHi.jpg', 176, 'App\\Models\\User', '2022-06-23 05:47:04', '2022-06-23 05:47:04'),
(402, '278237640_162460989483219_8673724801517242978_n.jpg', 'jpg', 'images/6zGwVmxIzjolSlHYS3xB20V5bHKluAWyM2umwAob.jpg', 177, 'App\\Models\\User', '2022-06-23 05:47:41', '2022-06-23 05:47:41'),
(403, '272160728_1188672085240384_8325401321066632048_n.jpg', 'jpg', 'images/oe5ppQSVGJkNBdXJ0x4cPYcRvcyForKlz3Bxuu7G.jpg', 179, 'App\\Models\\User', '2022-06-23 05:48:08', '2022-06-23 05:48:08'),
(404, 'avata4.jpg', 'jpg', 'images/5rVL6WazvAWRgkkzMZB36luDEEWVYqz2NmOuxvvx.jpg', 178, 'App\\Models\\User', '2022-06-23 05:48:44', '2022-06-23 05:48:44'),
(405, 'anh-gai-xinh-toc-ngang-vai-2k4-7.jpg', 'jpg', 'images/XzjzQ8XPKXHTt058c95c8RHwjAlwKNEzVkPi8pJq.jpg', 180, 'App\\Models\\User', '2022-06-23 05:49:13', '2022-06-23 05:49:13'),
(406, 'anh-gai-xinh-toc-ngang-vai-2k9-4-768x1151.jpg', 'jpg', 'images/AY7XRZuvExmBzGAt4Wxktipe4RxMeS4LKcyQskO5.jpg', 181, 'App\\Models\\User', '2022-06-23 05:50:00', '2022-06-23 05:50:00'),
(407, 'anh-hot-gril-lanh-lung-1.jpg', 'jpg', 'images/1Gha2rAOvhgHhfo3faIvohlRPS1BOKC7A2i6Z6Hv.jpg', 182, 'App\\Models\\User', '2022-06-23 05:50:28', '2022-06-23 05:50:28'),
(408, 'Anh-Nen-Gai-Xinh-4K- 14.jpg', 'jpg', 'images/YUwLCOSScA40pBOjBa3iTMG8Jkz4SGSNZhRmlh2M.jpg', 183, 'App\\Models\\User', '2022-06-23 05:50:58', '2022-06-23 05:50:58'),
(409, 'avata1.jpg', 'jpg', 'images/x6t392neJmuq7U3j9nYIqOrt6A3k9F3aTQ1Wzwju.jpg', 184, 'App\\Models\\User', '2022-06-23 05:51:37', '2022-06-23 05:51:37'),
(410, 'gai-xinh--1.jpg', 'jpg', 'images/ytj9S3qzJY8ycRfAzP5yKjGmSece11cAwWjBa7cU.jpg', 185, 'App\\Models\\User', '2022-06-23 05:52:15', '2022-06-23 05:52:15'),
(411, 'gai-xinh-4k-13.jpg', 'jpg', 'images/Tv55zEda0rnusaDGxI4YYRkaX2reypMsAuhgqqzH.jpg', 186, 'App\\Models\\User', '2022-06-23 05:52:54', '2022-06-23 05:52:54'),
(412, 'gai-xinh-4k-17.jpg', 'jpg', 'images/fxv1cWxynjniUy4gZrdWMSl7kUvfsieHTRG90Nq8.jpg', 187, 'App\\Models\\User', '2022-06-23 05:53:26', '2022-06-23 05:53:26'),
(413, 'Boy-lấy-điện-thoại-che-mặt-cực-cool.jpg', 'jpg', 'images/VCdLJfv5J9FQUDrBXmPBJuxVNPdhivzOYtWIvBpo.jpg', 188, 'App\\Models\\User', '2022-06-23 05:54:02', '2022-06-23 05:54:02'),
(414, 'chup-anh-nam-than-va-nhung-dieu-can-biet.jpg', 'jpg', 'images/TNYRif3PbF8xBk1oOt2dAiXkOBt1NrtNTOEsPPOl.jpg', 189, 'App\\Models\\User', '2022-06-23 05:54:31', '2022-06-23 05:54:31'),
(415, 'Gai-xinh-chau-A-8.jpg', 'jpg', 'images/quLiAGGJxB84I6lsEn5xyAPsES9me4JtJfUjwcyB.jpg', 190, 'App\\Models\\User', '2022-06-23 05:55:21', '2022-06-23 05:55:21'),
(416, 'gai-xinh-facebook-bich-cherry7.jpg', 'jpg', 'images/XvVMkpmy1CKE5XImC70CGObIkeTt2pclGV2PYtbl.jpg', 191, 'App\\Models\\User', '2022-06-23 05:56:14', '2022-06-23 05:56:14'),
(417, 'gai-xinh-fb-dien-vien-bui-ha-anh12.jpg', 'jpg', 'images/BYxxiINKMuhmF9qfPAi6DAeckB4KE8c0hiuxGWVA.jpg', 192, 'App\\Models\\User', '2022-06-23 05:56:47', '2022-06-23 05:56:47'),
(418, 'gai-xinh-han-quoc-diu-dang.jpg', 'jpg', 'images/1qqBMrDvsoqW9yPNXsMXQ6XO3hMrmnOW0pBlUTzd.jpg', 194, 'App\\Models\\User', '2022-06-23 05:57:21', '2022-06-23 05:57:21'),
(419, 'chup-anh-nam-than-va-nhung-dieu-can-biet.jpg', 'jpg', 'images/EuxtfPr1BJ0Lupr12oQUUi7lK1NfHzs09paUGO6R.jpg', 193, 'App\\Models\\User', '2022-06-23 05:58:11', '2022-06-23 05:58:11'),
(420, 'Boy-lấy-điện-thoại-che-mặt-cực-cool.jpg', 'jpg', 'images/1kCHBlT2arBjwhiiiiYj8DcBD6bg19prvG0sbL63.jpg', 195, 'App\\Models\\User', '2022-06-23 05:58:47', '2022-06-23 05:58:47');
INSERT INTO `images` (`id`, `name`, `extension`, `path`, `imageable_id`, `imageable_type`, `created_at`, `updated_at`) VALUES
(421, 'avata7.jpg', 'jpg', 'images/wKvUvorMo79JMGMwz8SU7IgmpEClOfkKmnX5HJuF.jpg', 197, 'App\\Models\\User', '2022-06-23 05:59:21', '2022-06-23 05:59:21'),
(422, 'hinh-anh-co-gai-xu-hue-xinh-dep-voi-chiec-ao-dai-9.jpg', 'jpg', 'images/USdMYlGrdVYaXwafAEYCSU4NyRVwbklh0G6NwxXG.jpg', 196, 'App\\Models\\User', '2022-06-23 05:59:57', '2022-06-23 05:59:57'),
(423, 'avata6.jpg', 'jpg', 'images/6io88Up0Oy5u7Zya9jPupY2NAjyEbCPwmfm6rECy.jpg', 198, 'App\\Models\\User', '2022-06-23 06:00:27', '2022-06-23 06:00:27'),
(424, 'hinh-anh-girl-xinh-gai-dep-de-thuong-nhat-viet-nam-191.jpg', 'jpg', 'images/HJtCGzI4B7FpcQQNTQrvPRtGernDuxgCkT4K8Zve.jpg', 199, 'App\\Models\\User', '2022-06-23 06:00:59', '2022-06-23 06:00:59'),
(425, 'f3.jpg', 'jpg', 'images/jZMrweuy1fv9GsFxNcra6EyZP2ReNgEKxPWVJtAH.jpg', 200, 'App\\Models\\User', '2022-06-23 06:01:40', '2022-06-23 06:01:40'),
(426, 'f1.jpg', 'jpg', 'images/0kHhgS66rUXMSJYxw9PF6SZhHnY0ScxklAbQZS0W.jpg', 201, 'App\\Models\\User', '2022-06-23 06:02:31', '2022-06-23 06:02:31'),
(427, 'unnamed.jpg', 'jpg', 'images/mrB9xZPK9b1W4sVJmnKttZG98UdvEtQrZ5IDIvk6.jpg', 202, 'App\\Models\\User', '2022-06-23 06:03:15', '2022-06-23 06:03:15'),
(428, '10-nam-ca-si-ngoai-quoc-dep-trai-nhat-kpop-08-ngoisao.vn.jpg', 'jpg', 'images/5bHBkxLpgUoQvpaLExS0uLGBZQ9DMnwtXMZzR1uo.jpg', 203, 'App\\Models\\User', '2022-06-23 06:03:42', '2022-06-23 06:03:42'),
(429, '275945099_1164501710991474_4696948366857919220_n.jpg', 'jpg', 'images/4DEPUZJnzkYFaSP8GDaBww0FWCWh4HsRavbYpT9I.jpg', 204, 'App\\Models\\User', '2022-06-23 06:04:21', '2022-06-23 06:04:21'),
(430, '279521089_535029551401337_3689539614712070089_n.jpg', 'jpg', 'images/3LkYp2bNxL20n9jL8cSR4MEjlaB0btn79UgSlaPE.jpg', 205, 'App\\Models\\User', '2022-06-23 06:05:27', '2022-06-23 06:05:27'),
(431, '287490204_1430908500664384_4826944729073687681_n.jpg', 'jpg', 'images/gqcu4pzA13H6LIgGfda8tJxD09U1Jhw3vC49FSWs.jpg', 206, 'App\\Models\\User', '2022-06-23 06:06:08', '2022-06-23 06:06:08'),
(432, '272160728_1188672085240384_8325401321066632048_n.jpg', 'jpg', 'images/R18Y9uUkxl4vuzGql1wS6M3kanUlsShsC2LjkZGy.jpg', 207, 'App\\Models\\User', '2022-06-23 06:06:59', '2022-06-23 06:06:59'),
(433, '1477194714201598459787443313747799195812329o-1616403006191691426150.jpg', 'jpg', 'images/pl1xweGYZ5syV6pLA9h6vWWBKKhGMCc7HUEVbWfJ.jpg', 208, 'App\\Models\\User', '2022-06-23 06:07:32', '2022-06-23 06:07:32'),
(434, 'gai-xinh-facebook-ngo-le-quyen-kem-xoi4.jpg', 'jpg', 'images/Fh44QbjK1R8mIFnkC84RelbyPZEj7X2gm4XGgTg9.jpg', 209, 'App\\Models\\User', '2022-06-23 06:08:41', '2022-06-23 06:08:41'),
(435, 'f3.jpg', 'jpg', 'images/3ImOYfSd89n5e5h9PfpmebQQYR24oPcCAUnJWhyl.jpg', 210, 'App\\Models\\User', '2022-06-23 06:09:10', '2022-06-23 06:09:10'),
(436, 'anh-hot-gril-lanh-lung-1.jpg', 'jpg', 'images/mnbvmhZfBad9CBfGOUVkcg8YwRTHrG2BFAW3YJYQ.jpg', 211, 'App\\Models\\User', '2022-06-23 06:09:57', '2022-06-23 06:09:57'),
(437, '9fe63ff3f0534feb407edc66589163e8.jpg', 'jpg', 'images/Gn4claAy8XFImzmAYaOMVRFhqHyBgI4I2K58uWzZ.jpg', 212, 'App\\Models\\User', '2022-06-23 06:10:34', '2022-06-23 06:10:34'),
(438, '289221703_2148064855371387_8778913776725984156_n.jpg', 'jpg', 'images/5PUDC9SaYwKGOkIDSUNpYPUlho53uZd5AwiWYiT1.jpg', 213, 'App\\Models\\User', '2022-06-23 06:11:05', '2022-06-23 06:11:05'),
(439, '10-nam-ca-si-ngoai-quoc-dep-trai-nhat-kpop-08-ngoisao.vn.jpg', 'jpg', 'images/ja0pnUBErLy8F1pZ3s1ZuWeocmOfZnw6gADJVjiD.jpg', 1, 'App\\Models\\User', '2022-06-23 06:12:14', '2022-06-23 06:12:14'),
(441, '9fe63ff3f0534feb407edc66589163e8.jpg', 'jpg', 'images/jyJZNby5yfGElvhOYSZq8mA4VoehZ4WdXrGiLxDf.jpg', 215, 'App\\Models\\User', '2022-06-24 18:48:33', '2022-06-24 18:48:33'),
(442, '252504160_425277925645345_6988607520823719457_n.jpg', 'jpg', 'images/jCXslNvvIT1vO7K0lBSDNfeKC9nydPU8lXLWzaX5.jpg', 216, 'App\\Models\\User', '2022-06-24 18:49:17', '2022-06-24 18:49:17'),
(443, '89162867_856770978152457_6548562616468373504_n.jpg', 'jpg', 'images/QBrnZRtZ1MMiD9r4bC8d4m2zDO56BZss9vLPDhmT.jpg', 217, 'App\\Models\\User', '2022-06-24 18:49:49', '2022-06-24 18:49:49'),
(444, 'my-muon-giai-phap-ngoai-giao-cho-lebanon-va-israel-chi-huy-hezbollah-thiet-mang-6061.jpg', 'jpg', 'images/Ru5so4OsUPtU5QByUYSVgi7RQ252BXUtxTxJNtLs.jpg', 203, 'App\\Models\\Post', '2022-06-24 19:08:55', '2024-09-25 00:06:04'),
(445, 'w-bo-nhiem-can-bo-bo-tttt-8344.jpg', 'jpg', 'images/XYNmEfqMTv5tVIqZnrLnO7dflE09J3qPnQzE1YWj.jpg', 204, 'App\\Models\\Post', '2022-06-24 19:14:04', '2024-10-03 07:13:14'),
(446, '98d6cd1e6e13ad4df402-8074-1655957232.jpg', 'jpg', 'images/YM6zabXppH5HfNSnk975iSkTFS1RjWg5GldhKIsR.jpg', 205, 'App\\Models\\Post', '2022-06-24 19:18:25', '2022-06-24 19:18:25'),
(447, 'biobatteries-1920-resize-md-3500-1656046545.jpg', 'jpg', 'images/ciwZ4Bm3kg7p5P2B4QvQpg7T9rbDCUwo1GT2ihr0.jpg', 206, 'App\\Models\\Post', '2022-06-24 19:20:08', '2022-06-24 19:20:08'),
(448, 'big-tech-trung-quoc-chi-con-la-cai-bong-cua-chinh-minh.jpg', 'jpg', 'images/1BSHh2577EK5hkOdgrIladONyIxUm1AZHnSyllFd.jpg', 207, 'App\\Models\\Post', '2022-06-24 19:25:45', '2022-06-24 19:25:45'),
(449, 'ID5A1077-jpeg-9883-1655808683.jpg', 'jpg', 'images/fmzC43fHZy7ZGeyAIzXqaEFPV2hRwL7GCTki7Lgp.jpg', 208, 'App\\Models\\Post', '2022-06-24 19:27:51', '2022-06-24 19:27:51'),
(450, 'Du-doan-Top-10-Miss-Universe-V-7360-9254-1655995655.jpg', 'jpg', 'images/GYD3Flc8pX3bc4ZskQBrK9gr0K1BVkk5Se7YiXDD.jpg', 209, 'App\\Models\\Post', '2022-06-24 19:29:56', '2022-06-24 19:29:56'),
(451, 'DD-COMP-MOST-INFLUENTIAL-SPORT-9133-5030-1656122640.jpg', 'jpg', 'images/qHQHA0oYgDnRg1gOGx7Uok4S7fJVd6UJmuRX0AsZ.jpg', 210, 'App\\Models\\Post', '2022-06-24 19:31:31', '2022-06-24 19:31:31'),
(452, 'za1a-8195-1656122173.jpg', 'jpg', 'images/g6nzfMAQ7Gbh7TwPUS9JhsCQdgHJpyXFKAmbQdCy.jpg', 211, 'App\\Models\\Post', '2022-06-24 19:33:10', '2022-06-24 19:33:10'),
(453, 'telemmglpict000300442623-trans-5136-9316-1656038070.jpg', 'jpg', 'images/rfO1sFQCEeL7XyD6Huk3PJHc9BN3lyGPmkMcCypi.jpg', 212, 'App\\Models\\Post', '2022-06-24 19:34:58', '2022-06-24 19:34:58'),
(454, 'w-gio-duc-va-dao-tao-7984.jpeg', 'jpeg', 'images/2iBGO9aSlrRNZEdXZJQ7mJ8zL9NdRfP7SjMon6JF.jpg', 213, 'App\\Models\\Post', '2022-06-24 19:38:04', '2024-10-15 01:33:27'),
(455, 'image_gallery.jfif', 'jfif', 'images/uCcSZ9ACliTxhIMgYldOkzwBO537K49Yt1IG3vFk.jpg', 214, 'App\\Models\\Post', '2022-06-24 19:39:57', '2022-06-24 19:39:57'),
(456, 'my-muon-giai-phap-ngoai-giao-cho-lebanon-va-israel-chi-huy-hezbollah-thiet-mang-6061.jpg', 'jpg', 'images/zQDlOEmOaT2eqPhfCX9CWm2F9Oa7Gkrc9KgCbnFU.jpg', 215, 'App\\Models\\Post', '2022-06-24 19:41:32', '2024-10-15 01:40:05'),
(457, '1-8637-1656081397.jpg', 'jpg', 'images/xGBYTwVflvEphH4KjElwgOABB82gYte8uXqUMNAi.jpg', 216, 'App\\Models\\Post', '2022-06-24 19:45:17', '2022-06-24 19:45:17'),
(458, 'hinh-nen-dien-thoai-trai-han-quoc-13.jpg', 'jpg', 'images/RVP7rcm2Ljc58H9UKIEWUxqCVZr9L87uO9v2SDrD.jpg', 1, 'App\\Models\\User', '2022-06-24 19:50:16', '2022-06-24 19:50:16'),
(459, '10-nam-ca-si-ngoai-quoc-dep-trai-nhat-kpop-08-ngoisao.vn.jpg', 'jpg', 'images/6udMUhCo8QREIqE7zTYXlWZa9bnsIhO7TcUhoY7E.jpg', 1, 'App\\Models\\User', '2022-06-24 19:52:49', '2022-06-24 19:52:49'),
(460, 'un71066315-20240924-lf-5459-4253.jpg', 'jpg', 'images/bUj3TZgIZo2lyMu45R1PWBxJgUk2Dvc5qQYBeJyk.jpg', 201, 'App\\Models\\Post', '2024-09-24 23:20:53', '2024-09-24 23:23:24'),
(461, 'a', 'a', 'a', 0, 'a', NULL, NULL),
(462, 'un71066315-20240924-lf-5459-4253.jpg', 'jpg', 'images/rmAuWHAkTT0B3Q8vRPbzHf2c6dO2rzTMoQC4zm3g.jpg', 202, 'App\\Models\\Post', '2024-09-24 23:40:54', '2024-09-24 23:54:04'),
(463, 'Ảnh chụp màn hình 2024-09-24 143057.png', 'png', 'images/pct1IbvqL74NEb8gyohRBlMkZv9KmqdM6XJOD7Ce.png', 1, 'App\\Models\\User', '2024-09-24 23:57:52', '2024-09-24 23:57:52'),
(464, 'Ảnh chụp màn hình 2024-09-24 143057.png', 'png', 'images/NizD1sOoO0uT0zNzUNtZq0vizFdXDojx0Xguot9J.png', 1, 'App\\Models\\User', '2024-09-24 23:58:20', '2024-09-24 23:58:20'),
(465, 'my-muon-giai-phap-ngoai-giao-cho-lebanon-va-israel-chi-huy-hezbollah-thiet-mang-6061.jpg', 'jpg', 'images/Ru5so4OsUPtU5QByUYSVgi7RQ252BXUtxTxJNtLs.jpg', 203, 'App\\Models\\Post', '2024-09-25 00:05:10', '2024-09-25 00:06:04'),
(466, 'w-bo-nhiem-can-bo-bo-tttt-8344.jpg', 'jpg', 'images/XYNmEfqMTv5tVIqZnrLnO7dflE09J3qPnQzE1YWj.jpg', 204, 'App\\Models\\Post', '2024-10-03 07:09:03', '2024-10-03 07:13:14'),
(467, 'w-gio-duc-va-dao-tao-7984.jpeg', 'jpeg', 'images/RyqyCeUVtC7zPY2m2ywubUoupjnflNlb892isFld.jpg', 205, 'App\\Models\\Post', '2024-10-03 07:18:18', '2024-10-03 07:18:18'),
(468, 'w-gio-duc-va-dao-tao-7984.jpeg', 'jpeg', 'images/EDKLoTbazYdcodTss0aZq3qTWu7PLVe3g4gnIHS5.jpg', 206, 'App\\Models\\Post', '2024-10-15 01:04:24', '2024-10-15 01:04:24'),
(469, '1728979991-my-muon-giai-phap-ngoai-giao-cho-lebanon-va-israel-chi-huy-hezbollah-thiet-mang-6061.jpg', 'jpg', 'images/1728979991-my-muon-giai-phap-ngoai-giao-cho-lebanon-va-israel-chi-huy-hezbollah-thiet-mang-6061.jpg', 207, 'App\\Models\\Post', '2024-10-15 01:13:11', '2024-10-15 01:13:11'),
(470, '1728980489-un71066315-20240924-lf-5459-4253.jpg', 'jpg', 'images/1728980489-un71066315-20240924-lf-5459-4253.jpg', 208, 'App\\Models\\Post', '2024-10-15 01:21:29', '2024-10-15 01:21:29'),
(471, 'w-gio-duc-va-dao-tao-7984.jpeg', 'jpeg', 'images/2iBGO9aSlrRNZEdXZJQ7mJ8zL9NdRfP7SjMon6JF.jpg', 213, 'App\\Models\\Post', '2024-10-15 01:24:21', '2024-10-15 01:33:27'),
(472, '1728981323-un71066315-20240924-lf-5459-4253.jpg', 'jpg', 'images/1728981323-un71066315-20240924-lf-5459-4253.jpg', 214, 'App\\Models\\Post', '2024-10-15 01:35:23', '2024-10-15 01:35:23'),
(473, 'my-muon-giai-phap-ngoai-giao-cho-lebanon-va-israel-chi-huy-hezbollah-thiet-mang-6061.jpg', 'jpg', 'images/zQDlOEmOaT2eqPhfCX9CWm2F9Oa7Gkrc9KgCbnFU.jpg', 215, 'App\\Models\\Post', '2024-10-15 01:39:00', '2024-10-15 01:40:05'),
(474, '1728981995-w-gio-duc-va-dao-tao-7984.jpeg', 'jpeg', 'images/1728981995-w-gio-duc-va-dao-tao-7984.jpeg', 216, 'App\\Models\\Post', '2024-10-15 01:46:35', '2024-10-15 01:46:35'),
(475, '1728982016-w-gio-duc-va-dao-tao-7984.jpeg', 'jpeg', 'images/1728982016-w-gio-duc-va-dao-tao-7984.jpeg', 217, 'App\\Models\\Post', '2024-10-15 01:46:56', '2024-10-15 01:46:56'),
(476, '1728982048-un71066315-20240924-lf-5459-4253.jpg', 'jpg', 'images/1728982048-un71066315-20240924-lf-5459-4253.jpg', 218, 'App\\Models\\Post', '2024-10-15 01:47:28', '2024-10-15 01:47:28'),
(477, '1728982103-my-muon-giai-phap-ngoai-giao-cho-lebanon-va-israel-chi-huy-hezbollah-thiet-mang-6061.jpg', 'jpg', 'images/1728982103-my-muon-giai-phap-ngoai-giao-cho-lebanon-va-israel-chi-huy-hezbollah-thiet-mang-6061.jpg', 219, 'App\\Models\\Post', '2024-10-15 01:48:23', '2024-10-15 01:48:23'),
(478, '1731818679-z4098744917100-3b0a5d68ed8303d1db7dbb3e1180f8eb-882-42855.jpg', 'jpg', 'images/1731818679-z4098744917100-3b0a5d68ed8303d1db7dbb3e1180f8eb-882-42855.jpg', 220, 'App\\Models\\Post', '2024-11-16 21:44:39', '2024-11-16 21:44:39'),
(479, 'nga-noi-ve-sua-doi-hoc-thuyet-hat-nhan-san-sang-binh-thuong-hoa-quan-he-voi-my-80824.jpg', 'jpg', 'images/5osTlEPtHZClPpkxGhlO3k7KCvNdHmHWKLgsdYdn.jpg', 214, 'App\\Models\\User', '2024-11-23 06:57:52', '2024-11-23 06:57:52');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `newsletter`
--

CREATE TABLE `newsletter` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `newsletter`
--

INSERT INTO `newsletter` (`id`, `email`, `created_at`, `updated_at`) VALUES
(1, '01642027120q@gmail.com', '2022-06-24 22:20:50', '2022-06-24 22:20:50'),
(2, '01642027120q@gmail.com', '2022-06-24 22:21:26', '2022-06-24 22:21:26'),
(3, '01642027120q@gmail.com', '2022-06-24 22:42:13', '2022-06-24 22:42:13'),
(4, '01642027120q@gmail.com', '2022-06-24 22:42:20', '2022-06-24 22:42:20'),
(5, '01642027120q@gmail.com', '2022-06-24 22:45:38', '2022-06-24 22:45:38'),
(6, 'cyranhquan239@gmail.com', '2022-06-24 22:47:40', '2022-06-24 22:47:40'),
(7, 'nguyenphuloc2001t@gmail.com', '2022-06-24 23:09:41', '2022-06-24 23:09:41'),
(8, '01642027120q@gmail.com', '2022-06-24 23:13:01', '2022-06-24 23:13:01'),
(9, '01642027120q@gmail.com', '2022-06-24 23:13:38', '2022-06-24 23:13:38'),
(10, '01642027120q@gmail.com', '2022-06-24 23:13:47', '2022-06-24 23:13:47'),
(11, 'quancamilee@gmail.com', '2022-06-24 23:13:52', '2022-06-24 23:13:52'),
(12, 'voanhquan@gmail.com', '2022-06-24 23:14:19', '2022-06-24 23:14:19'),
(13, '01642027120q@gmail.com', '2022-06-24 23:29:13', '2022-06-24 23:29:13'),
(14, '01642027120q@gmail.com', '2022-06-24 23:30:51', '2022-06-24 23:30:51'),
(15, 'voanhquan@gmail.com', '2022-06-24 23:31:45', '2022-06-24 23:31:45'),
(16, '01642027120q@gmail.com', '2022-06-24 23:35:35', '2022-06-24 23:35:35'),
(17, '01642027120q@gmail.com', '2022-06-24 23:38:38', '2022-06-24 23:38:38'),
(18, '01642027120q@gmail.com', '2022-06-24 23:39:28', '2022-06-24 23:39:28'),
(19, '01642027120q@gmail.com', '2022-06-24 23:43:52', '2022-06-24 23:43:52'),
(20, 'hoanhtuan@gmail.com', '2022-06-24 23:45:53', '2022-06-24 23:45:53'),
(21, '01642027120q@gmail.com', '2022-06-24 23:51:48', '2022-06-24 23:51:48'),
(22, '01642027120q@gmail.com', '2022-06-24 23:57:07', '2022-06-24 23:57:07'),
(23, '01642027120q@gmail.com', '2022-06-24 23:59:20', '2022-06-24 23:59:20'),
(24, 'anhquan1@gmail.com', '2022-06-25 00:01:12', '2022-06-25 00:01:12'),
(25, 'quancamilee@gmail.com', '2022-06-25 00:25:24', '2022-06-25 00:25:24'),
(26, 'nguyenphuloc2001t@gmail.com', '2022-06-25 00:34:34', '2022-06-25 00:34:34');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `newsletter_migration`
--

CREATE TABLE `newsletter_migration` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'admin.index', 'Truy cập trang chủ quản trị', '2024-09-21 22:30:38', '2024-09-21 22:30:38'),
(2, 'admin.upload_tinymce_image', 'Tải ảnh lên từ trình chỉnh sửa', '2024-09-21 22:30:38', '2024-09-21 22:30:38'),
(3, 'admin.posts.index', 'Xem danh sách bài viết', '2024-09-21 22:30:38', '2024-09-21 22:30:38'),
(4, 'admin.posts.create', 'Tạo mới bài viết', '2024-09-21 22:30:38', '2024-09-21 22:30:38'),
(5, 'admin.posts.store', 'Lưu bài viết mới', '2024-09-21 22:30:38', '2024-09-21 22:30:38'),
(6, 'admin.posts.show', 'Xem chi tiết bài viết', '2024-09-21 22:30:38', '2024-09-21 22:30:38'),
(7, 'admin.posts.edit', 'Chỉnh sửa bài viết', '2024-09-21 22:30:38', '2024-09-21 22:30:38'),
(8, 'admin.posts.update', 'Cập nhật bài viết', '2024-09-21 22:30:38', '2024-09-21 22:30:38'),
(9, 'admin.posts.destroy', 'Xóa bài viết', '2024-09-21 22:30:38', '2024-09-21 22:30:38'),
(10, 'admin.posts.to_slug', 'Tạo slug tự động cho bài viết', '2024-09-21 22:30:38', '2024-09-21 22:30:38'),
(11, 'admin.categories.index', 'Xem danh mục bài viết', '2024-09-21 22:30:38', '2024-09-21 22:30:38'),
(12, 'admin.categories.create', 'Tạo danh mục bài viết', '2024-09-21 22:30:38', '2024-09-21 22:30:38'),
(13, 'admin.categories.store', 'Lưu danh mục mới', '2024-09-21 22:30:38', '2024-09-21 22:30:38'),
(14, 'admin.categories.show', 'Xem chi tiết danh mục', '2024-09-21 22:30:38', '2024-09-21 22:30:38'),
(15, 'admin.categories.edit', 'Chỉnh sửa danh mục', '2024-09-21 22:30:38', '2024-09-21 22:30:38'),
(16, 'admin.categories.update', 'Cập nhật danh mục', '2024-09-21 22:30:38', '2024-09-21 22:30:38'),
(17, 'admin.categories.destroy', 'Xóa danh mục', '2024-09-21 22:30:38', '2024-09-21 22:30:38'),
(18, 'admin.tags.index', 'Xem danh sách thẻ', '2024-09-21 22:30:38', '2024-09-21 22:30:38'),
(19, 'admin.tags.show', 'Xem chi tiết thẻ', '2024-09-21 22:30:38', '2024-09-21 22:30:38'),
(20, 'admin.tags.destroy', 'Xóa thẻ', '2024-09-21 22:30:38', '2024-09-21 22:30:38'),
(21, 'admin.comments.index', 'Xem danh sách bình luận', '2024-09-21 22:30:38', '2024-09-21 22:30:38'),
(22, 'admin.comments.create', 'Tạo bình luận mới', '2024-09-21 22:30:38', '2024-09-21 22:30:38'),
(23, 'admin.comments.store', 'Lưu bình luận mới', '2024-09-21 22:30:38', '2024-09-21 22:30:38'),
(24, 'admin.comments.edit', 'Chỉnh sửa bình luận', '2024-09-21 22:30:38', '2024-09-21 22:30:38'),
(25, 'admin.comments.update', 'Cập nhật bình luận', '2024-09-21 22:30:38', '2024-09-21 22:30:38'),
(26, 'admin.comments.destroy', 'Xóa bình luận', '2024-09-21 22:30:38', '2024-09-21 22:30:38'),
(27, 'admin.roles.index', 'Xem danh sách vai trò', '2024-09-21 22:30:38', '2024-09-21 22:30:38'),
(28, 'admin.roles.create', 'Tạo vai trò mới', '2024-09-21 22:30:38', '2024-09-21 22:30:38'),
(29, 'admin.roles.store', 'Lưu vai trò mới', '2024-09-21 22:30:38', '2024-09-21 22:30:38'),
(30, 'admin.roles.edit', 'Chỉnh sửa vai trò', '2024-09-21 22:30:38', '2024-09-21 22:30:38'),
(31, 'admin.roles.update', 'Cập nhật vai trò', '2024-09-21 22:30:38', '2024-09-21 22:30:38'),
(32, 'admin.roles.destroy', 'Xóa vai trò', '2024-09-21 22:30:38', '2024-09-21 22:30:38'),
(33, 'admin.users.index', 'Xem danh sách người dùng', '2024-09-21 22:30:38', '2024-09-21 22:30:38'),
(34, 'admin.users.create', 'Tạo người dùng mới', '2024-09-21 22:30:38', '2024-09-21 22:30:38'),
(35, 'admin.users.store', 'Lưu thông tin người dùng mới', '2024-09-21 22:30:38', '2024-09-21 22:30:38'),
(36, 'admin.users.show', 'Xem chi tiết người dùng', '2024-09-21 22:30:38', '2024-09-21 22:30:38'),
(37, 'admin.users.edit', 'Chỉnh sửa thông tin người dùng', '2024-09-21 22:30:38', '2024-09-21 22:30:38'),
(38, 'admin.users.update', 'Cập nhật thông tin người dùng', '2024-09-21 22:30:38', '2024-09-21 22:30:38'),
(39, 'admin.users.destroy', 'Xóa người dùng', '2024-09-21 22:30:38', '2024-09-21 22:30:38'),
(40, 'admin.contacts', 'Xem thông tin liên hệ', '2024-09-21 22:30:38', '2024-09-21 22:30:38'),
(41, 'admin.contacts.destroy', 'Xóa liên hệ', '2024-09-21 22:30:38', '2024-09-21 22:30:38'),
(42, 'admin.setting.edit', 'Chỉnh sửa cài đặt', '2024-09-21 22:30:38', '2024-09-21 22:30:38'),
(43, 'admin.setting.update', 'Cập nhật cài đặt', '2024-09-21 22:30:38', '2024-09-21 22:30:38');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `permission_role`
--

CREATE TABLE `permission_role` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `permission_role`
--

INSERT INTO `permission_role` (`id`, `permission_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '2024-09-21 22:30:38', '2024-09-21 22:30:38'),
(2, 2, 2, '2024-09-21 22:30:38', '2024-09-21 22:30:38'),
(3, 3, 2, '2024-09-21 22:30:38', '2024-09-21 22:30:38'),
(11, 11, 2, '2024-09-21 22:30:38', '2024-09-21 22:30:38'),
(12, 12, 2, '2024-09-21 22:30:38', '2024-09-21 22:30:38'),
(13, 13, 2, '2024-09-21 22:30:38', '2024-09-21 22:30:38'),
(14, 14, 2, '2024-09-21 22:30:38', '2024-09-21 22:30:38'),
(15, 15, 2, '2024-09-21 22:30:38', '2024-09-21 22:30:38'),
(16, 16, 2, '2024-09-21 22:30:38', '2024-09-21 22:30:38'),
(17, 17, 2, '2024-09-21 22:30:38', '2024-09-21 22:30:38'),
(18, 18, 2, '2024-09-21 22:30:38', '2024-09-21 22:30:38'),
(19, 19, 2, '2024-09-21 22:30:38', '2024-09-21 22:30:38'),
(20, 20, 2, '2024-09-21 22:30:38', '2024-09-21 22:30:38'),
(21, 21, 2, '2024-09-21 22:30:38', '2024-09-21 22:30:38'),
(22, 22, 2, '2024-09-21 22:30:38', '2024-09-21 22:30:38'),
(23, 23, 2, '2024-09-21 22:30:38', '2024-09-21 22:30:38'),
(24, 24, 2, '2024-09-21 22:30:38', '2024-09-21 22:30:38'),
(25, 25, 2, '2024-09-21 22:30:38', '2024-09-21 22:30:38'),
(26, 26, 2, '2024-09-21 22:30:38', '2024-09-21 22:30:38'),
(27, 27, 2, '2024-09-21 22:30:38', '2024-09-21 22:30:38'),
(28, 28, 2, '2024-09-21 22:30:38', '2024-09-21 22:30:38'),
(29, 29, 2, '2024-09-21 22:30:38', '2024-09-21 22:30:38'),
(30, 30, 2, '2024-09-21 22:30:38', '2024-09-21 22:30:38'),
(31, 31, 2, '2024-09-21 22:30:38', '2024-09-21 22:30:38'),
(32, 32, 2, '2024-09-21 22:30:38', '2024-09-21 22:30:38'),
(33, 33, 2, '2024-09-21 22:30:38', '2024-09-21 22:30:38'),
(34, 34, 2, '2024-09-21 22:30:38', '2024-09-21 22:30:38'),
(35, 35, 2, '2024-09-21 22:30:38', '2024-09-21 22:30:38'),
(36, 36, 2, '2024-09-21 22:30:38', '2024-09-21 22:30:38'),
(37, 37, 2, '2024-09-21 22:30:38', '2024-09-21 22:30:38'),
(38, 38, 2, '2024-09-21 22:30:38', '2024-09-21 22:30:38'),
(39, 39, 2, '2024-09-21 22:30:38', '2024-09-21 22:30:38'),
(40, 40, 2, '2024-09-21 22:30:38', '2024-09-21 22:30:38'),
(41, 41, 2, '2024-09-21 22:30:38', '2024-09-21 22:30:38'),
(42, 42, 2, '2024-09-21 22:30:38', '2024-09-21 22:30:38'),
(43, 43, 2, '2024-09-21 22:30:38', '2024-09-21 22:30:38'),
(44, 2, 5, '2024-10-25 03:37:51', '2024-10-25 03:37:51'),
(49, 1, 6, '2024-10-25 03:51:35', '2024-10-25 03:51:35'),
(50, 3, 6, '2024-10-25 03:51:35', '2024-10-25 03:51:35'),
(51, 4, 6, '2024-10-25 03:51:35', '2024-10-25 03:51:35'),
(52, 5, 6, '2024-10-25 03:51:35', '2024-10-25 03:51:35'),
(53, 6, 6, '2024-10-25 03:51:35', '2024-10-25 03:51:35'),
(54, 7, 6, '2024-10-25 03:51:35', '2024-10-25 03:51:35'),
(55, 8, 6, '2024-10-25 03:51:35', '2024-10-25 03:51:35'),
(56, 9, 6, '2024-10-25 03:51:35', '2024-10-25 03:51:35'),
(57, 10, 6, '2024-10-25 03:51:35', '2024-10-25 03:51:35'),
(58, 1, 7, '2024-10-25 03:53:38', '2024-10-25 03:53:38'),
(59, 3, 7, '2024-10-25 03:53:38', '2024-10-25 03:53:38'),
(60, 6, 7, '2024-10-25 03:53:38', '2024-10-25 03:53:38'),
(61, 7, 7, '2024-10-25 03:53:38', '2024-10-25 03:53:38'),
(62, 8, 7, '2024-10-25 03:53:38', '2024-10-25 03:53:38'),
(65, 48, 7, '2024-10-26 05:00:46', '2024-10-26 05:00:46'),
(66, 49, 7, '2024-10-26 05:00:46', '2024-10-26 05:00:46'),
(69, 4, 2, '2024-11-16 21:37:37', '2024-11-16 21:37:37'),
(70, 5, 2, '2024-11-16 21:37:37', '2024-11-16 21:37:37'),
(71, 6, 2, '2024-11-16 21:37:37', '2024-11-16 21:37:37'),
(72, 7, 2, '2024-11-16 21:37:37', '2024-11-16 21:37:37'),
(73, 8, 2, '2024-11-16 21:37:37', '2024-11-16 21:37:37'),
(74, 9, 2, '2024-11-16 21:37:37', '2024-11-16 21:37:37'),
(75, 10, 2, '2024-11-16 21:37:37', '2024-11-16 21:37:37');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `excerpt` varchar(255)  NULL,
  `body` LONGTEXT  NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `views` int(11) NOT NULL DEFAULT 0,
  `approved` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `posts`
--

INSERT INTO `posts` (`id`, `title`, `slug`, `excerpt`, `body`, `user_id`, `category_id`, `views`, `approved`, `created_at`, `updated_at`) VALUES
(2, 'Velit optio fuga quas omnis rerum alias quis.', 'delectus-aliquam-iure-neque-debitis-deserunt-consequatur-officia', 'Qui aut magni nam velit.', 'Architecto molestias minus vel illum ab optio accusantium. Et maiores et culpa quaerat. Et sint animi voluptatem voluptatibus deleniti excepturi. Iusto recusandae sequi culpa deserunt perspiciatis.', 15, 3, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(3, 'Eius in dolor ut voluptatem et maxime.', 'atque-commodi-magnam-sequi', 'Ipsa vitae laudantium expedita est ex mollitia et aliquid.', 'Doloremque qui similique similique vel. Dolorem et soluta laborum. Et et nihil totam esse et debitis error. Architecto labore est non suscipit perspiciatis pariatur a.', 16, 5, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(4, 'Dignissimos et sint dolores.', 'eum-soluta-reprehenderit-et-quos-molestiae', 'Velit amet ipsum maiores animi est et.', 'Sint qui cumque praesentium omnis quia debitis. Est odio culpa perspiciatis ab veritatis et aliquid. Optio quod dolores ducimus rerum necessitatibus quibusdam ipsa qui. Ut exercitationem illo et ea debitis blanditiis.', 17, 8, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(5, 'Asperiores sunt repudiandae est qui enim.', 'quibusdam-eum-eos-et-cupiditate-quaerat-dicta-nihil-qui', 'Esse dolorem ipsum vel eligendi.', '<p>Mollitia rerum ut dolores blanditiis. Vero est fugiat quaerat odio consequatur magnam aperiam. Rerum voluptas consequatur laboriosam ipsa quia error eaque. Incidunt quos autem dolor possimus.</p>', 18, 3, 0, 1, '2024-09-21 22:30:39', '2024-11-22 08:36:30'),
(6, 'Earum qui ullam distinctio molestias qui ratione.', 'voluptatem-sed-ut-eius-ducimus-numquam-et-quidem', 'Blanditiis aliquam perferendis non illum sed delectus fugit.', 'Dolores recusandae consequatur praesentium est aspernatur. Veniam sed veritatis quos aut reprehenderit esse. Expedita nemo provident molestiae ex hic.', 19, 5, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(7, 'Quae repudiandae excepturi ipsum.', 'expedita-hic-voluptatem-et-dolorem', 'Adipisci non doloribus minima non aliquid enim.', 'Reprehenderit quos accusantium et. Sit beatae ipsam veritatis beatae rerum accusantium omnis dolorum. Qui aliquam consequatur ullam temporibus. Corrupti quam quaerat deleniti corporis ut velit.', 20, 7, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(8, 'Provident non in atque dolor omnis.', 'recusandae-reiciendis-molestiae-vitae-vel-accusantium', 'Est facere nobis omnis.', 'Corporis ratione tempora in repellendus harum est. Et aut dolores voluptatibus iure. Facilis explicabo aut aut delectus laudantium enim.', 21, 12, 2, 1, '2024-09-21 22:30:39', '2024-11-15 23:50:44'),
(9, 'Facere eveniet fugit error.', 'voluptate-recusandae-ea-atque-numquam', 'Impedit ipsum inventore id quas necessitatibus.', 'Est consequatur debitis atque. Nihil porro possimus autem animi. Aut nostrum quisquam perspiciatis est maxime. Et excepturi iste et neque expedita. Vero dolorem nostrum cumque.', 22, 3, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(10, 'In beatae ad officiis.', 'ut-eligendi-sed-atque-reprehenderit-voluptatibus-molestiae', 'Quidem fugiat excepturi et in.', 'Cupiditate ut est delectus consequuntur. In vel commodi numquam aut molestias. Et rerum est corrupti.', 23, 1, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(11, 'Occaecati labore nesciunt voluptatum quia illum.', 'incidunt-cum-est-deserunt-voluptas-ut-aut-quos', 'Molestias nihil commodi dicta quo maxime incidunt explicabo.', 'Rerum quibusdam quis id impedit. Quas molestiae vel magnam iste fugiat. Cumque animi ut natus ut accusantium cum.', 24, 10, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(12, 'Doloribus exercitationem mollitia culpa corrupti illo quod.', 'qui-mollitia-expedita-aut-aspernatur-necessitatibus-veniam-ullam', 'Eius dolor numquam quis doloribus pariatur illo.', 'Sapiente quia et rerum laboriosam impedit. Fugit iusto a ab rerum nihil. Blanditiis eveniet cumque molestiae.', 25, 8, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(13, 'Ut sit quo incidunt voluptatum accusantium ut omnis.', 'recusandae-nihil-eum-id-velit-sit-ullam-quae', 'Blanditiis ut perferendis et omnis.', 'Saepe suscipit ad voluptates enim cum quam et. Dolores quibusdam quo quis nobis architecto. Suscipit magni modi soluta necessitatibus sed et.', 26, 7, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(14, 'Voluptas repellendus quia ipsam ipsa eveniet molestiae.', 'non-nihil-quisquam-voluptatem-ab-et', 'Aut sapiente voluptas et vitae.', 'Laborum non et quis accusamus fuga aut pariatur. Aut ex sed debitis laudantium a. Incidunt ea accusantium tenetur est voluptatem nihil. Aspernatur voluptas sunt perferendis iste similique. Dolores incidunt occaecati consequatur cumque occaecati repellat.', 27, 12, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(15, 'Molestias ipsum consequuntur dignissimos nulla doloribus illo qui mollitia.', 'numquam-ea-ut-sunt-qui', 'Est est voluptate dolorum numquam deserunt qui.', 'Omnis velit voluptatibus minima eveniet minus est. Sunt qui quo quam velit. Beatae nihil sint aut consectetur.', 28, 3, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(16, 'Quis quos excepturi neque minima.', 'deleniti-maiores-nisi-quod-sapiente-dolorem-quibusdam-ut', 'Dolores pariatur repellat mollitia illum id ad.', 'Recusandae ea sed voluptas voluptatem dignissimos. Omnis magnam impedit minima. Laudantium beatae omnis aut tenetur quaerat tempore omnis. Ipsa corrupti voluptates quos ipsum. Aperiam distinctio numquam quia eligendi minus accusamus adipisci.', 29, 4, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(17, 'Dolores totam veritatis maxime consequatur maiores molestias commodi.', 'aspernatur-vel-alias-natus-sunt-dolorem-id-consequatur', 'Vitae eos cumque magnam rerum ipsum.', 'Facere ut voluptatem consequuntur ipsum rerum sint. Est tenetur nulla eligendi dolorem atque. Blanditiis qui ad laboriosam ex vel consectetur eveniet.', 30, 7, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(18, 'Aut adipisci debitis fuga error.', 'odio-dolores-esse-iure-facilis-autem', 'Eaque exercitationem excepturi doloremque et suscipit tenetur ipsa.', 'Maxime architecto est quidem quis consectetur harum. Vel eum voluptas cumque. Voluptates neque corrupti quidem iusto repellat dolore.', 31, 14, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(19, 'Molestias aperiam ut facere earum voluptatum.', 'saepe-deleniti-odit-nulla-sit', 'Voluptatum recusandae distinctio delectus cumque voluptatibus.', 'Error officiis nobis sapiente quod consequuntur. Et est libero eaque est suscipit sint atque. Non reprehenderit architecto ut rerum.', 32, 12, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(20, 'Veritatis incidunt dignissimos accusantium.', 'perspiciatis-ut-et-nesciunt-id-ut-repellendus-voluptatem-quia', 'Eos ratione totam quaerat porro quia.', 'Illo unde quia quam unde placeat. Quos amet non aut at impedit non dolorum mollitia. Amet repellat magnam sequi esse. Consectetur facere voluptatem velit qui eveniet sunt.', 33, 11, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(21, 'Placeat exercitationem est voluptatem et.', 'culpa-est-eum-voluptatem-consequatur-ipsum-molestias-dolorum', 'Quis voluptatem qui doloribus explicabo.', 'Ducimus eveniet sint ex et optio incidunt quas. Voluptate impedit repellat laboriosam repudiandae. Eligendi est et et.', 34, 5, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(22, 'Nobis illum aut quae cumque soluta sit.', 'possimus-rem-nihil-quod-tempora', 'Velit nobis maiores alias eius rerum voluptates placeat.', 'Iusto aut vel tempore sit. Hic esse sunt saepe.', 35, 8, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(23, 'Omnis inventore aut autem voluptas ea totam unde aut.', 'accusantium-explicabo-aspernatur-aut-labore-sequi-distinctio', 'Nam dolore quae maiores.', 'Porro facere sequi voluptates illo. Ut in neque veritatis at numquam praesentium at. Eos est est in molestiae a sit aut. Eum omnis maiores voluptatum dolores.', 36, 10, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(24, 'Officiis et ut dolorem enim temporibus labore.', 'sit-error-nisi-ab-vitae-debitis', 'Animi facere illum et excepturi voluptatibus quibusdam.', 'Quia exercitationem nisi sapiente sit. Qui est ut aspernatur nihil qui quia explicabo ut. Autem ratione est vitae omnis.', 37, 11, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(25, 'Dolores qui aut libero corrupti.', 'voluptatem-eos-voluptate-expedita-et-earum-ducimus-voluptas-ab', 'Eligendi necessitatibus alias ut.', 'Maiores soluta facilis autem fugit magni et. Quia aliquam aperiam praesentium. Et et atque nostrum ex aut aut.', 38, 3, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(26, 'Animi labore non possimus sunt.', 'neque-rem-dolorem-nihil', 'Aut cum enim qui.', 'Ipsam eligendi optio dolor rerum occaecati. Et aut aut asperiores sed. Adipisci quia natus voluptas facilis. Tenetur ducimus doloribus enim voluptates explicabo dolorem. Corrupti voluptatem fugiat eligendi natus impedit omnis sint.', 39, 2, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(27, 'Cupiditate deserunt voluptate ducimus quidem quibusdam aliquam.', 'sit-enim-deleniti-et', 'Id et aut sunt quaerat.', 'Dolores magni dolore natus officiis sit aperiam aliquam vero. Ut minus iste ut illum velit. Voluptas non non nisi tempore delectus.', 40, 4, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(28, 'Dolore dolorem accusantium omnis autem laborum et amet.', 'a-necessitatibus-officia-sapiente-vitae-et-voluptatum', 'Inventore quas nesciunt incidunt quisquam facilis.', 'Autem sunt non praesentium dolorum nesciunt. Laboriosam omnis reprehenderit impedit voluptate. Placeat odit officia laborum natus aperiam odit. Voluptatum iure perspiciatis nihil voluptas et natus.', 41, 6, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(29, 'Dolorum vitae omnis dolores.', 'dolorem-hic-cupiditate-porro-non', 'Voluptas ea dolor quis nulla culpa fuga aliquid.', 'Ullam nobis esse provident voluptatem ut magni. Consequatur eveniet eum sint. Quis voluptates architecto est est enim quia. Dolores qui quas eligendi et rerum sed est provident.', 42, 9, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(30, 'Repudiandae modi at similique qui et voluptatibus.', 'ut-ut-quasi-ea-soluta-nisi-quia-rerum-ad', 'Sunt non molestias veritatis nostrum.', 'At molestiae nostrum ducimus quia atque velit nihil. Consectetur suscipit itaque sed voluptatem. Minus veritatis nihil est aspernatur a.', 43, 2, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(31, 'Sunt soluta provident quae voluptas molestias ipsa vel officia.', 'rerum-qui-et-voluptas-ut-iure', 'Et officiis illo ut dolorem.', 'Illum neque quia aut temporibus aut accusamus ratione. Ut sint minus et cupiditate. Commodi sit sapiente iusto.', 44, 5, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(32, 'Quia quo aliquid rerum dolorem saepe et debitis.', 'explicabo-omnis-alias-voluptas-necessitatibus-similique-quae', 'Nulla architecto ut cum sit quia voluptas sed.', 'Amet cum inventore aliquid nobis omnis. Optio sint expedita qui est quos eos modi veritatis. Voluptas sed ipsum eos qui molestiae.', 45, 2, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(33, 'In ut et itaque sed sapiente quidem rem et.', 'repellendus-possimus-aut-reprehenderit-reiciendis-facilis', 'Tempora repellendus rerum qui labore enim voluptatum perferendis.', 'Libero nihil omnis dignissimos ea aperiam sunt. Vel itaque eveniet nihil beatae. Laborum sint magni ea. Magni officiis sed cumque quisquam illum. Dolor alias facilis qui ut et neque sequi.', 46, 7, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(34, 'Rerum in ipsa quo laborum quasi aliquid.', 'sit-voluptate-non-nemo-animi-quia-molestias-veritatis', 'Maxime ut aut porro molestiae.', 'Est consectetur adipisci eum qui. Ab aut ut optio et. Ab optio voluptatem tenetur rerum.', 47, 12, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(35, 'Rerum voluptatibus et cum similique.', 'voluptatem-velit-quos-labore-nostrum-iusto-libero-atque', 'Placeat sunt delectus a modi.', 'Est autem fuga sunt corporis non quibusdam ea. Sit delectus voluptates temporibus sunt ea illum. Quos explicabo vel dolorem magnam veritatis quo dolor.', 48, 3, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(36, 'Voluptas saepe ut sunt et iste.', 'recusandae-eos-cum-corrupti-sunt-cum-sed-enim', 'Est harum sed non voluptas ab quae.', 'Qui consequatur alias voluptatum a alias. Quia culpa sunt perspiciatis facere hic omnis dicta.', 49, 8, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(37, 'Quia id voluptatibus expedita qui dolores.', 'delectus-laudantium-ut-culpa-qui-sint-omnis', 'Est rerum tempore consequatur blanditiis beatae repellat dolore.', 'Consequuntur et numquam quaerat possimus enim adipisci. Occaecati ut qui adipisci ipsum et maxime. Autem fugit suscipit rerum quidem facere praesentium. Ullam expedita dolores et eos repellendus facilis id magni.', 50, 5, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(38, 'Exercitationem magnam et magni omnis est.', 'autem-omnis-nemo-voluptates-sunt', 'Impedit incidunt adipisci odit.', 'Dolores aliquam voluptas sit sunt qui. Qui enim nihil voluptates repellendus et commodi et.', 51, 2, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(39, 'Et rerum ab illo quo.', 'deserunt-architecto-voluptates-ut-numquam', 'Natus et suscipit itaque dolorem doloremque ipsam.', 'Eos rem corrupti aspernatur at et. Nihil cum voluptatem iste doloremque error earum recusandae mollitia. Consequuntur doloremque fugit quibusdam quas est consequatur molestiae. Blanditiis quis quia atque.', 52, 8, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(40, 'Impedit blanditiis libero est nihil quibusdam exercitationem magnam.', 'adipisci-reprehenderit-quas-recusandae-assumenda', 'Qui nemo sit officia tenetur facere dolor.', 'Debitis illum ut voluptate fugiat aperiam. Laborum quaerat voluptate magnam voluptas voluptatem. Ad non molestiae assumenda et libero. Adipisci sunt nam explicabo incidunt.', 53, 14, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(41, 'Voluptatem rem rerum molestiae natus maxime doloribus.', 'debitis-voluptate-totam-veritatis-nisi-dolor-et', 'Ratione magnam enim ipsum quibusdam.', 'Dolores nesciunt quo et voluptatibus dicta sit distinctio. Praesentium velit et omnis autem quisquam ratione quae. Fugit eos esse autem officia laudantium reprehenderit dolore quae.', 54, 6, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(42, 'Error aut itaque exercitationem veniam soluta quisquam.', 'aut-minima-dolore-fugiat-occaecati-repudiandae-quo', 'Eum voluptatem aut facere repellat aut blanditiis.', 'Cupiditate ut est voluptas beatae facere molestias dolor. Et corrupti autem amet error facere ut. Et qui aut temporibus et nostrum maxime. Autem adipisci amet voluptatum et.', 55, 9, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(43, 'Dolor sed repudiandae voluptatem consequatur perferendis.', 'et-quae-cupiditate-eum-saepe', 'Delectus eos nihil a accusamus occaecati quia.', 'Magni quia commodi consectetur optio voluptatem. Ex excepturi rem minus quam. Quis quia odio nihil laboriosam et.', 56, 2, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(44, 'Sit sit quidem neque animi dolorem in qui.', 'ipsum-molestiae-et-sunt-error-dolorem-cumque-dolores-qui', 'Sed et perferendis tenetur amet eius unde.', 'Sint id illum sunt nulla reiciendis possimus. Numquam natus quis recusandae et iste. Animi voluptatum sit eum nobis omnis nam accusamus. Quos ex numquam sed saepe id et velit.', 57, 6, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(45, 'Enim sint sed tempora.', 'rerum-harum-fugit-mollitia-adipisci-consequatur-aliquam', 'Optio iusto qui quaerat eaque nihil possimus modi.', 'Voluptas tempore ad quasi recusandae error. Delectus et dolores amet. Nisi asperiores culpa omnis sit cum mollitia vitae.', 58, 3, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(46, 'Ab optio quia nemo qui.', 'id-officiis-recusandae-dolor-perferendis-id-officiis-harum', 'Officiis sunt maiores inventore saepe at.', 'Provident facilis voluptates facilis veniam qui nemo assumenda. Enim accusamus nostrum iure. Debitis temporibus aut illum quam consequatur cupiditate dignissimos.', 59, 7, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(47, 'Officiis et et cum beatae ad.', 'amet-et-rerum-temporibus', 'Alias ut repellendus sunt rerum eveniet accusamus nostrum.', 'Et dolorem ut aut expedita. Tempora adipisci minus tempore ipsum. Architecto a optio quam eligendi.', 60, 9, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(48, 'Sed quidem eos corporis sequi.', 'est-nesciunt-fuga-possimus-qui', 'Voluptatem totam veniam atque quae.', 'Laborum vel et eum. Ut ut occaecati doloremque culpa veniam iure. Minus non eum illum quisquam. Adipisci aliquam quae maiores cum qui veritatis molestiae.', 61, 8, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(49, 'Est enim est in libero deleniti beatae dolore.', 'est-est-quaerat-sed-provident', 'Aut ut voluptatem ut placeat sed non.', 'Est eum tenetur distinctio sint at corporis. Quae sed ducimus maiores recusandae. Praesentium pariatur aliquid quaerat magnam qui aliquam. Aut deleniti aspernatur omnis in. Quas deleniti est libero hic.', 62, 3, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(50, 'Porro doloribus qui accusamus in temporibus itaque a.', 'quaerat-ducimus-doloremque-qui-atque-doloribus-aut', 'Vel qui non qui ea consectetur odit.', 'Deserunt assumenda earum similique ab tenetur soluta dolorem. Aliquid vel omnis sunt voluptatem maiores molestiae. Qui excepturi voluptatem ut quibusdam sit. Amet et doloremque et voluptate est.', 63, 10, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(51, 'Beatae vel praesentium nulla aut.', 'sed-sint-qui-dicta-eos-eum-praesentium', 'Corporis molestiae incidunt voluptas quo quo soluta ex nemo.', 'Incidunt corporis rerum incidunt sit illum. Sapiente et nihil quas ut. Sed cupiditate nobis dolor et praesentium architecto laudantium qui.', 64, 1, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(52, 'Fugiat provident omnis et qui tenetur quae qui.', 'sunt-voluptas-quia-animi-quia-ab-ut', 'Et consequatur ipsam non omnis expedita incidunt.', 'Eligendi porro repellendus dolore et aut. Quam odio voluptas quisquam quis unde. Maxime alias magnam aut et.', 65, 13, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(53, 'Iusto et qui autem possimus ut.', 'ducimus-exercitationem-aut-itaque-quo-doloribus-dolorem-nam', 'Repellendus dolorum sit sequi inventore dolores.', 'Officiis magnam nam fuga quam distinctio vel. Asperiores et nulla omnis et qui aliquam. Magni quia nam vel ducimus quod aut. Pariatur excepturi voluptatem ut rerum sint atque.', 66, 9, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(54, 'Nemo optio qui dolorem veniam qui quia dignissimos.', 'in-voluptas-nobis-ratione-dolorem-officiis-non-quasi', 'Tempore veritatis dolores quo blanditiis.', 'Ipsa doloremque quia neque voluptate minima. Sapiente beatae dolorem odio accusamus. Quis quia quaerat qui culpa. Et natus est facilis reiciendis ducimus autem nam.', 67, 9, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(55, 'Ducimus id nesciunt commodi excepturi.', 'quaerat-similique-sit-maiores-earum-laborum-corporis-expedita', 'Vero assumenda suscipit illo vel dolore placeat est.', 'Autem sapiente est nobis omnis occaecati placeat ipsam. Illum error eius nemo quia enim. Eum possimus nihil quo qui ratione aut error. Explicabo dolores est et aut nulla consectetur ea.', 68, 14, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(56, 'Minus itaque facere aliquid voluptatem.', 'quia-doloremque-laborum-quidem-ut-sed-ex-debitis', 'Dolor illum cum earum iusto.', 'Qui iure consectetur doloribus qui ut beatae blanditiis dolores. Facere consectetur voluptatum repudiandae laboriosam sapiente qui corrupti.', 69, 1, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(57, 'Quisquam dolore corporis fugiat nam molestiae unde.', 'exercitationem-iure-qui-pariatur-quas-esse', 'Dignissimos nesciunt rerum est quis culpa illum quibusdam.', 'Ut commodi sequi molestiae magni reprehenderit mollitia. Incidunt dolorem exercitationem atque in repellendus. Ut quo voluptatem placeat molestiae doloremque nesciunt accusantium. Dolorem porro voluptatibus eum quas aut voluptatum.', 70, 9, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(58, 'Atque officia quis cumque et.', 'debitis-doloremque-asperiores-officia-quae-qui', 'Occaecati eveniet sed voluptatum nobis voluptates.', 'Non corrupti sed dolore temporibus quibusdam modi rem excepturi. Dolorem labore repellat qui. Rerum voluptas et ut. Fugit itaque quod alias voluptas repellendus.', 71, 11, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(59, 'Quod vitae aut quis dolore occaecati.', 'veritatis-aliquam-omnis-qui-possimus-nihil', 'Ut et nostrum ducimus aspernatur.', 'Voluptatem quo et quaerat temporibus omnis. Placeat sed distinctio fugiat facilis non explicabo fuga. Est debitis accusamus vero dolorem dolor harum.', 72, 5, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(60, 'Est eos totam quidem voluptas excepturi deserunt.', 'illum-non-officia-sit-delectus', 'Quo cum voluptatem provident ad.', 'Dolores vero tempore quasi quibusdam nisi. Enim autem officiis pariatur quae unde eaque est eum. Sit officiis qui qui ut quia beatae voluptatem est. Nemo dignissimos necessitatibus praesentium quasi.', 73, 11, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(61, 'Facilis officia impedit quas ratione.', 'qui-aut-iure-qui-illo-accusamus-consequatur', 'Sit quidem at magni ab debitis.', 'Beatae cumque facilis est velit similique quis quia. Soluta dolor facilis doloribus ipsa ut. Eius accusantium ut voluptatem ut expedita id. Voluptas explicabo iusto consequuntur blanditiis vel culpa nulla.', 74, 13, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(62, 'Et at atque et nisi.', 'temporibus-exercitationem-libero-voluptas-temporibus-sunt', 'Architecto optio tempore est laboriosam et.', 'Dolor unde facilis autem. Omnis officiis doloremque recusandae omnis dolores quia. Alias ex omnis deserunt omnis rerum aut blanditiis. Doloribus recusandae et perspiciatis fugiat aspernatur.', 75, 14, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(63, 'Dolores porro dignissimos iure possimus magni similique non.', 'nisi-itaque-nisi-voluptate', 'Sed adipisci a magnam nobis.', 'Harum ipsa consequuntur ut eius. Ex et quaerat sed ducimus. Fugit nihil ab sit vitae vero qui. Magni similique veniam qui reiciendis hic ducimus rerum.', 76, 12, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(64, 'Velit asperiores omnis eos.', 'qui-est-pariatur-error-numquam-voluptatem-est-eum', 'Et ut cumque consequuntur iste quo.', 'Libero a vel unde porro ut voluptas. In voluptatem quasi consequatur aut et ipsum rem. Reiciendis eaque veritatis consectetur fuga laboriosam quam. Ut unde consequatur esse quasi praesentium perferendis ratione. Tempore aspernatur provident aut voluptate eveniet voluptatem.', 77, 13, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(65, 'Doloribus porro hic et rem sunt.', 'distinctio-quaerat-reiciendis-suscipit-ipsa', 'Numquam excepturi ut nam sed voluptates qui laboriosam unde.', 'Dolore molestiae accusantium veritatis. Enim voluptate reiciendis sunt amet id. Pariatur maxime et nostrum commodi sed repellat et. Dolores ut tenetur facere est.', 78, 6, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(66, 'Sit recusandae officiis quia necessitatibus quia eveniet.', 'quo-incidunt-eaque-sunt-commodi', 'Et aut ut voluptas nostrum tempora.', 'Animi molestiae consectetur sed sint magnam perspiciatis debitis laborum. Id et facere iusto qui ut at. Cupiditate voluptatibus voluptatem commodi corrupti quae.', 79, 14, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(67, 'Est rerum eaque ut.', 'sint-corrupti-aliquam-necessitatibus-ea-cum', 'Perspiciatis et odio odit dolores est voluptatem dicta quibusdam.', 'Laudantium quisquam repellat labore quia nam impedit. Earum a velit quae asperiores. Voluptate expedita enim nesciunt sint et aut. Recusandae nulla dolorem aut aut.', 80, 10, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(68, 'Non temporibus labore ipsum est ex et.', 'ut-ducimus-qui-veniam-odio-ex-pariatur', 'Possimus et amet consequatur explicabo itaque atque adipisci dicta.', 'Voluptatibus aliquid aspernatur labore est. Sit qui blanditiis eum velit. Maxime alias quisquam et exercitationem vitae amet perferendis.', 81, 9, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(69, 'Repellendus porro minima magni.', 'quas-voluptatem-saepe-ut-illo-qui-esse-dolore', 'Esse ea reiciendis nam quibusdam necessitatibus rerum consequatur.', 'Quaerat autem qui qui. Ea mollitia excepturi excepturi enim ipsam. Totam tempora nesciunt voluptas magni consectetur. Quia tenetur nulla commodi natus.', 82, 8, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(70, 'Id rerum voluptatibus architecto tempore dolorem dolores.', 'nihil-voluptates-ut-ut-et-dolorem-saepe', 'Eligendi libero atque quibusdam dolores ut.', 'Et non est quisquam facilis. Rerum recusandae corrupti neque possimus. Et sequi est beatae rerum inventore non voluptatum cumque.', 83, 12, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(71, 'Cum et sed recusandae dolorum quaerat.', 'nisi-velit-est-dolore-tempore-officiis', 'Sunt excepturi excepturi tempora tenetur sed dolor et recusandae.', 'Possimus recusandae aut omnis id a. Praesentium consequuntur esse iusto at vel corrupti voluptatem. Ea reprehenderit voluptatibus labore quae.', 84, 3, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(72, 'Perspiciatis est rerum fuga minus molestiae autem amet.', 'quasi-aut-ipsa-aliquam-omnis-dolore-qui', 'Rerum minus deleniti dignissimos.', 'Qui necessitatibus voluptates ea et. Fugiat facilis similique eaque enim et est enim. Quisquam eaque placeat nostrum vel quo qui. Ullam maiores sunt corporis.', 85, 14, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(73, 'Voluptas ullam distinctio velit.', 'explicabo-animi-error-nisi-voluptates-eos-et-eos', 'Omnis porro ea ipsum iusto odit sunt numquam.', 'Facere deleniti expedita officia ea voluptate. Praesentium non amet aut et ut. Iure facere sed eligendi voluptas vel. Provident dolores accusamus magnam maiores. Soluta magnam quisquam commodi iste.', 86, 14, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(74, 'Id totam doloremque dolore culpa expedita dolor.', 'est-expedita-nemo-aliquam-rerum-temporibus-dolores-amet', 'Autem aspernatur velit ut porro repellendus voluptatem labore iusto.', 'Eaque aliquid ad voluptas. Sunt at magnam unde pariatur. Quae nobis sequi rerum nobis tempore porro. Accusantium non molestiae perspiciatis sequi dolor quia ut.', 87, 12, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(75, 'Consectetur nihil totam dolorum accusamus sunt.', 'labore-labore-maxime-nesciunt-quibusdam-error-deleniti-atque-perferendis', 'Molestias sit consequatur blanditiis sunt similique ut commodi.', 'Quia voluptatem porro sit id ut. Quas occaecati cum iste qui libero omnis et molestiae. Minus tempore molestiae qui. Optio maxime molestiae accusantium aliquam quos qui iure.', 88, 5, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(76, 'Iure nihil iste qui itaque quisquam recusandae non.', 'consequatur-blanditiis-deleniti-sed-repudiandae', 'Saepe illo rerum cumque consequatur.', 'Natus eaque non ipsa unde iste. Hic consequuntur ut qui odit magni possimus. Culpa dolor maiores quod praesentium. Sequi eligendi praesentium laborum omnis velit veritatis qui.', 89, 9, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(77, 'Et et aut aperiam dolor optio quo.', 'sed-aut-aut-ab-omnis-recusandae', 'Quo atque officiis at aut architecto quo.', 'Doloribus sunt officia consequuntur. Blanditiis adipisci qui a voluptas. Libero molestiae impedit similique asperiores.', 90, 6, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(78, 'Explicabo ex voluptatum illo neque accusantium.', 'excepturi-perferendis-voluptas-in-ullam-commodi-voluptatem', 'Atque aut consectetur qui porro velit velit aut.', 'Animi a rem atque quisquam aut. Nostrum est quidem dicta aut quasi possimus. Et nam harum doloribus est distinctio.', 91, 5, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(79, 'Molestiae tempore eveniet facere unde.', 'tempore-non-omnis-ut-numquam-laborum-nobis', 'Nulla autem et et enim quia assumenda et sapiente.', 'Consectetur qui repellendus consequatur officiis excepturi. Dolores aut et harum eaque nostrum non harum aspernatur.', 92, 5, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(80, 'Sequi illum aut qui quia et.', 'aliquid-aut-et-necessitatibus-perferendis-qui-labore-natus', 'Quibusdam voluptatem incidunt voluptatem neque eligendi qui quae.', 'Quos rerum odit ullam facere impedit porro animi. Dignissimos et et voluptatibus et eveniet quisquam. Rem velit perferendis sit autem recusandae. Et quidem in eaque omnis voluptatum. Ad voluptatem quia tempora voluptatem sapiente.', 93, 6, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(81, 'Ipsa deleniti consequatur natus laudantium.', 'qui-praesentium-qui-tenetur-magni', 'Consequuntur voluptas voluptatem cum minima.', 'Ducimus in perferendis adipisci voluptatem neque aut repudiandae dolores. Sed minima velit modi nihil dolor nihil id beatae. Autem et pariatur qui reprehenderit ullam et est.', 94, 3, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(82, 'Ipsum rerum et et et deserunt sit omnis.', 'veniam-nulla-iure-impedit-repudiandae-ratione-tempore', 'Rem ea enim sint quisquam qui.', 'Expedita sed iure aliquam. Blanditiis sapiente necessitatibus earum dolor sunt consectetur. Facilis dolorem repudiandae eveniet nam ut id excepturi. Quia repellat porro incidunt nesciunt sint facilis labore.', 95, 7, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(83, 'Molestiae officia nesciunt iusto quidem consequatur ullam.', 'minus-commodi-ut-et-assumenda-fuga', 'Nam dolor quo dolor aliquam inventore dolorum et.', 'Similique possimus ratione nesciunt reprehenderit quo esse. Et temporibus voluptate aut dignissimos.', 96, 1, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(84, 'Omnis occaecati qui assumenda et voluptatum qui ut.', 'reprehenderit-odit-nam-recusandae-molestias-autem', 'Illum est sit suscipit voluptate.', 'Aut culpa quia ipsam et veniam aut. Quas commodi repudiandae cum eos hic qui numquam. Sint deserunt doloremque molestiae omnis odit quis delectus. Sit voluptas quo minima eaque.', 97, 10, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(85, 'Velit pariatur rem qui voluptatem.', 'sapiente-pariatur-est-modi-adipisci-excepturi-enim-eum-ipsum', 'Ab et debitis eum sapiente modi qui voluptatum assumenda.', 'Totam nemo quia laudantium adipisci illum. Eos nobis quas minima natus. Impedit qui ex et at.', 98, 14, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(86, 'Voluptas tempore et esse facere.', 'sed-delectus-nesciunt-nesciunt', 'Sequi aperiam et laudantium tempora rerum.', 'Temporibus est dolor illo sit error consequatur et. Sit autem neque omnis omnis. Non tempore eius atque enim est.', 99, 13, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(87, 'At voluptatem id cum est quo.', 'aliquid-autem-molestiae-illum-exercitationem', 'Qui qui provident qui est consectetur est.', 'Est aperiam vitae est. Fugit maxime quo natus laboriosam architecto. Unde qui eveniet delectus illo a velit.', 100, 3, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(88, 'Libero officiis non tempora dolorem earum ea.', 'ex-necessitatibus-excepturi-reiciendis-temporibus', 'Sequi quisquam reiciendis debitis est corrupti laudantium impedit.', 'Molestiae alias dolorem qui rem veritatis illo fuga. Doloribus et autem et dicta dolore enim tenetur. Deleniti qui omnis nesciunt aliquid et praesentium aut. Quo temporibus exercitationem blanditiis repellendus.', 101, 3, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(89, 'Qui consequatur aut qui accusamus error.', 'in-nihil-dolor-distinctio-voluptas-fugiat-consectetur-asperiores', 'Possimus et facilis eaque qui.', 'Sed voluptate qui fugit ea et corrupti laboriosam. Quam quia aspernatur ut ipsa. Consequatur ea temporibus ut reprehenderit nesciunt quaerat. Debitis eos nisi et.', 102, 9, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(90, 'Iste nemo voluptate nihil esse quaerat quis et reiciendis.', 'nam-autem-vel-eos-harum', 'Odio quo enim eos tenetur quas vel beatae hic.', 'Temporibus consectetur inventore sit quas voluptatibus. Modi earum fugit et laboriosam quibusdam quis. Asperiores quod qui distinctio illo necessitatibus. In quo nemo rem nulla consequatur enim.', 103, 13, 1, 1, '2024-09-21 22:30:39', '2024-09-24 23:59:01'),
(91, 'Sapiente eos dolorem aut sit.', 'alias-velit-et-veritatis-error-molestiae-praesentium-et', 'Ut cumque rerum provident ex.', 'Non voluptatem vitae perspiciatis debitis ut ratione qui commodi. Et molestiae debitis rerum ad provident. Qui dolorem sed nihil voluptatem quia quia.', 104, 13, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(92, 'Fugit sapiente aut laudantium nemo dolores optio molestiae aliquam.', 'facilis-in-tempora-amet-tempora-voluptas-odit', 'Vel aut enim asperiores qui earum rerum consequatur aut.', 'Dignissimos omnis eaque in maxime nobis. Atque est quaerat aut itaque tenetur beatae et. Velit dolores tempora voluptatem at.', 105, 12, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(93, 'Dignissimos nulla nihil odit voluptatem blanditiis ut beatae.', 'reprehenderit-est-sed-vitae-nobis-suscipit-dolores', 'Ut quidem ullam assumenda dolores natus possimus.', 'Nisi quisquam provident debitis recusandae. Cupiditate suscipit ad sit incidunt.', 106, 8, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(94, 'Nulla beatae exercitationem cumque libero est ipsum.', 'ipsa-et-ipsum-aut', 'Quis id corrupti aut sed itaque.', 'Sunt ipsum possimus qui qui. Impedit eligendi eum deleniti alias. Ipsam quia aperiam reiciendis est.', 107, 6, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(95, 'Inventore blanditiis esse quae.', 'vel-doloribus-voluptatem-ut-dignissimos-dolorem-deserunt', 'Sint eligendi beatae quam fugiat iste eum dicta itaque.', 'Quos sed beatae molestiae voluptatem soluta officia recusandae. Consectetur numquam reprehenderit eius natus. Doloribus iusto et quisquam quas. Sit unde sint maiores suscipit explicabo sapiente qui.', 108, 6, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(96, 'Voluptatibus alias esse est illo nisi quam molestiae.', 'iste-perspiciatis-non-et-repellendus-autem-inventore-consequatur-dolores', 'Magnam minima non dolores.', 'Explicabo ducimus a omnis voluptas voluptate laboriosam. Quia vel quisquam quasi nobis. Hic facere totam saepe aspernatur consequatur. Commodi sed rerum eius aut sed.', 109, 6, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(97, 'Quam quae commodi libero quia quaerat non.', 'neque-recusandae-ipsa-natus-sit-velit-ut', 'Est quisquam dolores neque molestiae odio voluptatibus qui.', 'Autem maiores sed id unde voluptatem perferendis quasi. Nisi perferendis est natus. Neque placeat provident accusamus quas.', 110, 7, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(98, 'Tempora aut vitae animi.', 'illo-natus-modi-saepe-et-ipsa', 'Et eum magnam ab ex saepe ex.', 'Dignissimos soluta deleniti rerum ut tenetur harum eligendi qui. Assumenda inventore neque ducimus excepturi blanditiis explicabo exercitationem. Recusandae quia enim aperiam mollitia exercitationem sunt ut.', 111, 2, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(99, 'Explicabo illo id pariatur ullam inventore.', 'ut-molestiae-tempore-aut-nemo-facere', 'Ducimus non modi debitis sit deleniti cum quaerat.', 'Quia voluptatem ut facere harum libero aut. Fugiat qui est numquam ut et.', 112, 4, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(100, 'Distinctio consequatur quo dignissimos dolore.', 'et-soluta-eum-qui-architecto-officiis-fuga', 'Aut earum voluptatem dolores.', 'Consectetur eveniet culpa fuga. Rem autem maxime voluptatum qui distinctio architecto aspernatur. Et dolores aut non omnis saepe commodi quam facilis.', 113, 11, 7, 1, '2024-09-21 22:30:39', '2024-11-23 06:50:49'),
(101, 'A consectetur eaque placeat reiciendis qui.', 'nemo-ea-velit-reiciendis-fuga', 'Rerum est iure nulla quo ut deserunt ipsum.', 'Repudiandae perferendis doloribus debitis dolores doloremque repellat distinctio adipisci. Sunt quae expedita ipsa aut officia quia. Numquam nihil cupiditate ipsum quod. Minima doloremque quidem iure voluptas expedita id.', 114, 5, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(102, 'Asperiores impedit numquam provident ratione.', 'harum-officia-eos-quia-enim-nemo-debitis', 'Molestiae nesciunt ipsa consequatur quia repellat non ut.', 'Sequi quo illo et alias. Cum voluptatibus quia alias repudiandae et soluta. Fugiat tenetur fugiat quo. Ut ducimus libero enim voluptas assumenda.', 115, 13, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(103, 'Sed et assumenda repellat maxime et.', 'recusandae-et-autem-tempore-asperiores', 'Et repellendus qui molestiae dolor architecto et sint.', 'Cumque pariatur error excepturi quis magnam. Omnis assumenda autem sunt nostrum est inventore. Excepturi a voluptatem quis quia aut. Assumenda officiis accusantium modi laborum accusamus. Qui et illo temporibus voluptatum id doloremque aut.', 116, 6, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(104, 'Non impedit cumque ipsa.', 'nobis-inventore-nesciunt-provident-alias-est', 'Accusamus rerum deleniti et cum iusto.', 'Aliquid enim laboriosam id id rerum. Aut sed qui laboriosam ut. Beatae omnis et id earum minima tempora magni. Consequatur non accusantium harum et accusantium odio vel.', 117, 13, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(105, 'Et sequi omnis minima a minima ipsa.', 'nesciunt-quidem-distinctio-est-accusamus-nihil-autem-suscipit', 'Autem sequi ipsa in saepe aspernatur.', 'Et et distinctio ut placeat natus suscipit nihil. Ex tempora aspernatur occaecati totam dolore quae aperiam. Eum possimus blanditiis sit sit inventore autem qui.', 118, 9, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(106, 'Eum nemo modi sit sit.', 'corrupti-maiores-cum-ab-veritatis-ut-delectus-minus-sed', 'Libero ut ut voluptas sit ipsa repellat.', 'Expedita beatae perferendis beatae. Natus aliquam doloribus quis quia ut nihil et. Dolores omnis dolorem ipsa quidem.', 119, 7, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(107, 'Eligendi magni ducimus in dicta velit amet.', 'voluptas-expedita-quas-et-quia-aut', 'Est quod molestiae voluptas consequatur ducimus.', 'Omnis sint nihil officia fugit animi. Aut et aut officiis quia. Quisquam reprehenderit molestiae atque minima quasi dolorem. Ullam sed facere autem facere culpa quis. Vero vel quia porro.', 120, 1, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(108, 'Est dolores repudiandae voluptatem exercitationem repellat necessitatibus porro.', 'sapiente-incidunt-non-ut-harum', 'Animi voluptates aliquam nostrum qui.', 'Facilis magni fugit voluptates distinctio. Corrupti totam quia autem et amet repellendus excepturi. Doloremque quidem hic laudantium non.', 121, 5, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(109, 'Exercitationem asperiores enim aliquam et veritatis.', 'quia-aliquid-pariatur-iure-harum', 'Perspiciatis repellat excepturi nesciunt aut perspiciatis.', 'Enim et sit soluta voluptas. Assumenda vel vel maxime voluptas. Rerum quis tempora eaque alias neque provident dignissimos.', 122, 10, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(110, 'Aliquam sint eos perspiciatis natus ut aut velit.', 'sunt-ipsam-laborum-deleniti', 'Rerum facilis itaque maiores aliquam.', 'Esse rerum perspiciatis debitis exercitationem ducimus libero. Architecto commodi a porro possimus et omnis atque. Molestiae fugiat nostrum dolor sit alias nisi id laborum. Et et molestiae nisi.', 123, 14, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(111, 'Deserunt rerum id tenetur saepe.', 'vitae-sed-aperiam-eaque-non-veritatis-delectus', 'Est corrupti asperiores sequi est ipsum.', 'Et ut incidunt et optio aut ipsam. Quis nulla fugit alias enim. Esse maiores quae in error mollitia similique.', 124, 7, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(112, 'Unde magni esse dolorum.', 'earum-excepturi-ratione-qui-autem-enim-occaecati-alias', 'Tempora doloribus iusto excepturi.', 'Nulla corrupti fugiat consequatur labore enim harum dolore. Facilis libero temporibus ullam corrupti quaerat deleniti. Totam cum asperiores minus tempore aut autem.', 125, 10, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(113, 'Itaque corrupti placeat ut unde.', 'est-eveniet-excepturi-autem-maxime', 'Soluta quisquam laudantium illum similique sint.', 'Labore exercitationem doloremque est voluptatem eveniet cum aut. Repellendus magnam culpa dicta suscipit.', 126, 3, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(114, 'Neque porro quis fuga provident saepe aut.', 'expedita-aut-aut-neque-voluptas-praesentium-sed-rerum', 'Rerum iusto aliquam ducimus.', 'Quaerat rerum distinctio vitae magnam voluptatibus esse. Facere officiis autem quasi doloribus voluptatem earum. Voluptatum voluptate aut optio.', 127, 11, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(115, 'Provident qui et labore quisquam eveniet iure.', 'placeat-voluptatem-omnis-dignissimos-possimus', 'Dolorem incidunt quia tempore molestiae sunt nisi autem.', 'Magnam corrupti sed aut in. Natus non veniam asperiores eligendi amet. Temporibus recusandae molestiae nisi saepe fugiat blanditiis. Cupiditate magni ducimus provident ducimus amet quod velit itaque.', 128, 10, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(116, 'Fugiat itaque quae eum.', 'rerum-in-dicta-accusamus-officia-non-eum-autem-et', 'Ut ducimus similique aut ducimus aspernatur.', 'Corporis corporis nam voluptatem. Quibusdam fugiat sunt dolorem eaque deleniti molestias et. Numquam porro eius quo dolorum rerum repudiandae qui.', 129, 11, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(117, 'Qui qui quis mollitia.', 'cum-distinctio-et-laudantium-possimus-necessitatibus-similique', 'Enim quaerat ea eum ipsa ea illum rerum qui.', 'Quia qui sequi veritatis id veniam cupiditate explicabo. In eos ipsa eos iste explicabo enim aperiam. Ea non possimus et et sint eaque enim.', 130, 7, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(118, 'Voluptate et et dolorum optio quia.', 'autem-facere-deleniti-odio-odio-ab-laboriosam-id', 'Temporibus qui qui natus praesentium et debitis.', 'Cupiditate a quis vero debitis explicabo cumque totam. Dolor consequatur ut doloribus iusto et quae molestiae. Dicta ex iste voluptas. Libero consequatur iusto iusto modi architecto.', 131, 14, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(119, 'Omnis laborum repellat maiores aut qui explicabo in.', 'impedit-commodi-similique-sit-ut-voluptatem', 'Omnis earum sit voluptatem est quia unde velit exercitationem.', 'Laboriosam quae molestiae itaque delectus praesentium fuga. Quisquam ab accusantium a distinctio ullam eos quo et. Aut in iste est et delectus. Delectus ut omnis dicta sint repudiandae perferendis quo.', 132, 6, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(120, 'Modi suscipit iure et et.', 'ipsa-inventore-quia-animi-autem-quos-id-distinctio', 'Rerum consequuntur est exercitationem distinctio doloremque saepe.', 'Et rerum natus dolor consequatur assumenda perspiciatis. Dolorem ipsam similique veritatis consequatur. Asperiores ut quia qui id eius dolorum praesentium voluptas. Delectus quia quis illo excepturi molestias.', 133, 13, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(121, 'Atque aut assumenda consequuntur eum suscipit.', 'fuga-sunt-delectus-assumenda-dolores', 'Eaque dolorum dolores eaque aut distinctio voluptatum quia.', 'Sint eum voluptas minima qui voluptas quisquam qui. Earum alias quo placeat ducimus corrupti qui. Totam nemo sunt cum eligendi quidem alias. Et rem praesentium in eum dolorem illo cupiditate.', 134, 14, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(122, 'Ut culpa quia odio velit animi assumenda aut.', 'qui-quis-quo-sapiente-et-quia-sint-neque', 'Odit molestiae mollitia perferendis qui fugit rerum et.', 'Dolores sed odio rerum sit assumenda et. Possimus eum dolor consequatur sed. Maiores eius adipisci quasi aut. Placeat ut suscipit odio ut cumque. Facilis aut sunt harum modi.', 135, 10, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(123, 'Maiores id rerum et earum minus eum enim.', 'cum-corporis-molestiae-odio-debitis-occaecati', 'Id omnis maiores fuga doloremque in.', 'Ut totam molestiae ipsum ea. Est optio tempora ipsum et voluptatibus reprehenderit quasi libero. Quos praesentium recusandae ex eaque labore voluptas in. Excepturi veritatis tempora perspiciatis porro itaque et veniam.', 136, 10, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(124, 'Pariatur voluptatem natus nesciunt laudantium voluptas recusandae.', 'est-modi-dolor-labore-neque-incidunt-placeat-aut', 'Officia consequatur alias architecto quos laboriosam eum.', 'Quis qui similique incidunt inventore. Aut atque non voluptatibus consequuntur in optio. Maxime ipsam fugiat sit animi quod. Aliquid impedit omnis qui commodi.', 137, 11, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(125, 'Quis qui voluptate sequi aperiam ullam nesciunt.', 'similique-nemo-ipsa-numquam-tempore-dolorem', 'Et praesentium qui sed architecto voluptatum.', 'Aut at dolorum similique eaque et. Non vero illum totam harum. Id dolores et soluta voluptas aut.', 138, 1, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(126, 'Sint fugit repellat non esse non.', 'deleniti-quo-ea-dolore', 'Impedit ut necessitatibus modi unde.', 'Sit rerum et quo autem enim omnis. Dolores voluptatem laboriosam porro velit sunt nostrum. Delectus reiciendis sit ducimus quia possimus.', 139, 10, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(127, 'Nulla similique ut sapiente atque impedit illo rerum.', 'perferendis-possimus-perferendis-ea-voluptatem-provident-repellendus', 'Ipsa iure dolor fugit molestiae dignissimos iure.', 'Eum et quia nesciunt fugit odit. Voluptatem optio et id. In quidem est iure dicta quia. Quia quod rerum dicta perferendis pariatur eos a.', 140, 14, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(128, 'Dolore non voluptatum vitae aut non consequatur facilis.', 'rerum-corporis-explicabo-id', 'Eum hic qui voluptate dignissimos illo consequuntur autem.', 'Odit unde aliquid quo dolorem. Eaque placeat voluptas harum sed.', 141, 10, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(129, 'Blanditiis nihil assumenda sunt cum.', 'culpa-vitae-reprehenderit-perspiciatis-et', 'Illum officiis blanditiis repellat incidunt.', 'Similique est hic non. Unde architecto quidem quae dolore iure. Possimus mollitia fugiat accusamus amet aut corporis aliquid. Reprehenderit nisi quam sint.', 142, 14, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(130, 'Consequatur quibusdam dolor aliquam harum odit.', 'magnam-veniam-consequatur-ea-velit-dolore-vel', 'Ipsa cumque dolor est optio.', 'Ut magni et nostrum totam. Est facere consequatur aut velit dolorem voluptatem animi. Consectetur repellendus quis nesciunt non. Qui quod perspiciatis corporis fugit dolor dolore quos.', 143, 7, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(131, 'Ullam iusto occaecati debitis et vel excepturi.', 'ipsa-qui-ea-quia-illum-expedita-voluptatum-et-asperiores', 'Illo sed consequatur reprehenderit autem voluptatem nobis.', 'Voluptatem quia molestias quisquam odio dolorem deserunt deleniti. Laboriosam non repellat vitae tempora. Voluptatibus dolor aliquid repellat.', 144, 5, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(132, 'Qui non libero aut numquam ut et sunt.', 'atque-dolor-corporis-sit-qui', 'Dolores sint rerum provident eveniet ipsam tempora.', 'Sunt similique est atque eveniet beatae maxime. Neque doloribus tenetur iste autem minima iure amet. Quam ipsa molestiae deleniti quis. Quo ducimus voluptatibus consequatur reprehenderit. Voluptas nihil sint ullam sapiente nulla.', 145, 1, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(133, 'Odit explicabo deserunt porro voluptatibus non iure.', 'ad-ut-asperiores-itaque-temporibus', 'Vero quasi sint saepe sunt natus.', 'Perspiciatis et illum maxime totam odit nostrum omnis. Sapiente sint natus voluptatem debitis non sit voluptatem. Pariatur consequuntur perferendis debitis a.', 146, 3, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(134, 'Maiores voluptate quam soluta sit esse rerum.', 'consequatur-animi-porro-et-qui-eligendi-omnis-sit', 'Ut nam blanditiis eum et at omnis.', 'Ea nostrum ex autem quae neque doloremque recusandae. Eos velit iusto eveniet similique nulla nihil voluptates. Labore non expedita sint sit labore. Alias a alias minus impedit ex et numquam.', 147, 4, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(135, 'Ad a accusamus odio sed occaecati voluptatem.', 'vitae-voluptatibus-nihil-iure-occaecati-illum-id', 'Voluptas dignissimos sint beatae similique architecto quo.', 'Rerum rem adipisci itaque molestias. Voluptatibus ipsam est dolor fugit eum voluptatem iure. Quo sunt aut provident error.', 148, 4, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(136, 'Itaque consequatur laboriosam perspiciatis saepe ex culpa.', 'quidem-aliquam-autem-sint-nulla-in-ab-aliquam-architecto', 'Hic id accusamus et voluptatum perspiciatis minima ab.', 'Quia odit quia dolorem eius qui fugiat. Vel earum omnis praesentium dolore aut molestiae magni. Aut eos sit est adipisci recusandae corrupti. Ut in voluptatem possimus sint labore. Voluptatem mollitia et esse excepturi.', 149, 1, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39');
INSERT INTO `posts` (`id`, `title`, `slug`, `excerpt`, `body`, `user_id`, `category_id`, `views`, `approved`, `created_at`, `updated_at`) VALUES
(137, 'Consequuntur magnam libero qui quae.', 'vel-nostrum-quis-modi-voluptate-explicabo-voluptatem-consequatur', 'Beatae illo aspernatur id.', 'Perspiciatis quos sint adipisci voluptas nihil. Similique iusto accusamus quia vel. Tempore voluptas quae necessitatibus inventore alias minima.', 150, 2, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(138, 'Nisi soluta possimus minus molestias ex voluptatem dicta.', 'dolores-optio-quos-soluta-necessitatibus', 'Ut ab alias qui nulla nihil accusantium.', 'Sint qui odit numquam aut. Commodi aut fugit voluptas et ipsa assumenda. Dolor delectus facere iure quas consequuntur nihil sequi corporis. Eaque tempora porro est tempore similique exercitationem a. Rerum porro corrupti est quis.', 151, 4, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(139, 'Officiis dolor nostrum ratione cupiditate doloribus eum expedita.', 'quasi-consequatur-aut-non-dolor-omnis-nisi', 'Vero corrupti dolor natus vel assumenda cumque.', 'Eius veritatis ad et sit. Qui odio nam blanditiis ipsa voluptate id sit. Harum eos nam minima et consequatur a.', 152, 1, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(140, 'Sit accusamus explicabo exercitationem nobis magni.', 'dolorem-officia-velit-qui-maxime-veniam-a-ut', 'Ut dolor tenetur aut tenetur sunt dolorem.', 'Est consequatur officiis eveniet. Cupiditate qui quis tempora et omnis sequi. Ab voluptate dignissimos perspiciatis rerum vel quod debitis. Et eos eligendi vel tenetur.', 153, 3, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(141, 'Non sint itaque autem dignissimos tenetur esse repellat.', 'nihil-ut-est-earum-natus', 'Quo illum aperiam eveniet sit quaerat et.', 'Ipsum a aut facilis aspernatur ut laborum ut. Rerum consequatur molestias porro provident. Reprehenderit non quaerat deserunt.', 154, 8, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(142, 'Saepe quisquam ut occaecati illo ratione eaque molestiae ipsa.', 'rerum-eius-reprehenderit-laborum-enim-velit-impedit', 'Debitis ut sed quibusdam aut soluta quae et tenetur.', 'Sit esse voluptatibus sunt nulla consequatur. Laboriosam nam et quo reiciendis sit inventore. Quod velit facilis magnam minima sunt repudiandae. Sit ut laboriosam quam et corporis omnis nostrum inventore.', 155, 2, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(143, 'Ullam assumenda dolores hic molestiae ipsam nulla aut eaque.', 'quisquam-ipsum-neque-dolor', 'Amet voluptate magni laboriosam fugit.', 'Aut pariatur omnis qui eum. Nihil est beatae repellendus quaerat alias eos. Sunt et laboriosam suscipit. Enim reiciendis voluptas adipisci corporis minima eligendi laudantium. Odio quia recusandae rem at fuga qui voluptatum.', 156, 13, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(144, 'Harum odio sit quis qui eius.', 'debitis-dolor-molestiae-incidunt-in-atque', 'Corrupti repellendus qui reiciendis.', 'Reprehenderit in et molestiae. Placeat veniam enim aperiam et magnam. Labore molestiae ea consequatur necessitatibus.', 157, 1, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(145, 'Est labore unde nostrum numquam iusto vero reprehenderit.', 'est-ullam-quidem-vero', 'Quidem rerum velit omnis autem sint totam velit dolorem.', 'Minus debitis aut et officia officia tenetur iure. Et quis delectus et maxime. Commodi iure dolorum qui tempore placeat. Culpa commodi magnam omnis qui beatae.', 158, 7, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(146, 'Quas ipsum maxime eos dolores eum deserunt vitae.', 'incidunt-nisi-nihil-quam-ullam-ea-rerum', 'Deserunt voluptas unde nihil id est totam sunt.', 'Quia itaque modi itaque ut nesciunt voluptates. Vel et voluptatem eaque vel. Quis eius perspiciatis unde velit veniam. Facere consequuntur rerum voluptatem nesciunt. Quis culpa soluta enim ad.', 159, 2, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(147, 'At voluptatem praesentium libero quis esse quia.', 'dolorum-accusantium-consequatur-perferendis-omnis-nostrum-voluptas-rerum', 'Aut eligendi soluta sit voluptas corporis saepe.', 'Qui fugiat dolores temporibus autem. Velit sequi voluptas libero.', 160, 2, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(148, 'Magnam dolores ut ea laboriosam porro dolorum.', 'fugiat-facilis-ratione-pariatur', 'Velit porro rem ullam in voluptate est maiores dignissimos.', 'Vero consequatur blanditiis molestiae animi. Nobis voluptatem ratione incidunt autem omnis esse eligendi illo. Perferendis mollitia non libero quaerat voluptatem commodi.', 161, 12, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(149, 'In suscipit quia ut.', 'aut-labore-laboriosam-voluptate-aut-atque', 'Sed architecto esse earum quos beatae voluptatem quas.', 'Temporibus animi omnis dolorem praesentium perspiciatis. Sed nesciunt distinctio debitis ut sunt. Enim veritatis qui nostrum rem aut et quibusdam voluptatem. Unde illum ullam commodi ea aut magnam architecto.', 162, 13, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(150, 'Blanditiis dolores veniam iste qui veniam praesentium.', 'eius-iure-esse-totam-molestiae-omnis-adipisci-tempore-adipisci', 'Ratione et quisquam eum porro voluptas sunt.', 'Nesciunt molestias non necessitatibus consequuntur. Beatae aperiam autem reiciendis reprehenderit magni. Quia enim ut aut beatae dolores quasi aut.', 163, 4, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(151, 'Non aut facere provident qui molestiae.', 'facilis-porro-expedita-voluptatem-vitae-dolor-quas', 'Modi at adipisci enim nihil aspernatur.', 'Quis hic numquam enim. Accusantium a minus quo saepe soluta assumenda. Assumenda quam commodi quia praesentium cupiditate. Sequi earum dolor accusantium eum nihil voluptatum.', 164, 13, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(152, 'Possimus odio enim molestiae id ipsa voluptatem sed rem.', 'incidunt-ipsa-qui-repellat', 'Totam veritatis et labore qui.', 'Rerum nesciunt corrupti tempore dolorum. Et itaque temporibus et omnis. In similique alias voluptatem dolores voluptas qui sapiente enim. Eveniet eius numquam quasi vitae excepturi.', 165, 7, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(153, 'Voluptates officiis quasi ad possimus minus aperiam iusto.', 'quidem-nostrum-qui-modi-numquam-tenetur-possimus', 'Eveniet velit maxime ea eum quibusdam quis.', 'Commodi qui autem error deserunt necessitatibus veritatis adipisci. Adipisci modi corrupti quae sunt voluptatum. Architecto quaerat ab consequatur voluptatem qui perferendis.', 166, 14, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(154, 'Vitae et qui esse vero quae.', 'perspiciatis-nesciunt-reiciendis-est-itaque-ullam-tempore-ipsa', 'Omnis assumenda autem quaerat et illum quas molestias dolores.', 'Aperiam alias quia aperiam qui sed et. Assumenda aut accusantium corrupti ducimus et mollitia. Voluptatem illo rerum repellat corporis corrupti molestiae.', 167, 14, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(155, 'Aut sapiente voluptas molestiae occaecati rerum qui.', 'officia-iste-placeat-earum-ea-laboriosam-reiciendis', 'Aut quasi nam rerum consequuntur.', 'Ratione libero ut quae ullam harum doloribus nulla. Repellendus consectetur quos mollitia molestias maiores quos. Libero rerum ipsa quas dicta numquam consequuntur.', 168, 8, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(156, 'Qui et hic aperiam quo voluptatem minus similique.', 'aliquam-velit-doloribus-commodi-velit-repudiandae', 'Nihil magnam accusantium eaque sit.', 'Ipsam quo culpa cumque itaque omnis ratione. Et delectus magnam ut soluta tenetur cumque asperiores. Enim quibusdam natus dolores temporibus. Porro veritatis repellendus sed enim labore sed.', 169, 14, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(157, 'Quidem et autem voluptate possimus est.', 'tempora-blanditiis-earum-error-quos-officiis-deserunt', 'Deleniti qui dolor iure tempora.', 'Autem alias nesciunt enim velit doloribus nisi. Facilis a ad ea aperiam amet. Aperiam ullam perferendis et magnam laborum. Voluptatem veritatis enim debitis illo odit laboriosam. Temporibus maiores aut nihil.', 170, 10, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(158, 'Veritatis in eum perspiciatis modi.', 'eos-aut-voluptatem-magni', 'Et est iusto aut aliquam sed explicabo harum.', 'Voluptatibus aut error eius perferendis tenetur molestiae. Officia rerum voluptas hic rerum accusantium ut maxime vel. Laborum sit a amet.', 171, 13, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(159, 'Unde dolor nihil occaecati voluptate velit et architecto sint.', 'nihil-vel-quia-laboriosam-odit', 'Dolores doloremque perferendis sint.', 'Facere quos possimus culpa sit. Optio sed quam et maiores non vero. Facilis nulla voluptas expedita tempora sed amet deleniti.', 172, 8, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(160, 'Debitis et dolores omnis architecto et itaque et.', 'nesciunt-et-eum-officia-fugit', 'Velit et saepe maiores dolorem quidem tempora corporis quia.', 'Qui maiores aut officiis impedit. Unde non ad odio autem sit fuga debitis. Pariatur asperiores qui aut expedita ut pariatur numquam.', 173, 13, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(161, 'Amet libero error similique et recusandae sapiente.', 'asperiores-vel-molestias-reprehenderit-quia-modi-voluptas', 'Aperiam voluptatem dolorum beatae nobis dolor.', 'Facere aliquam et et error occaecati ea voluptate. Veniam soluta tenetur quod et qui itaque placeat. Ut unde sunt ut ut.', 174, 1, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(162, 'Est iure cupiditate eum est ea quaerat.', 'harum-quasi-quo-rem-eum-et', 'Rerum laudantium vero voluptate doloribus sapiente eum minus ab.', 'Eos magni dolor voluptates ad error. Hic excepturi exercitationem rem optio. Optio nihil et ratione placeat non blanditiis facilis ut. Corrupti veniam hic deleniti. Dolorem sed quam sed dignissimos beatae.', 175, 4, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(163, 'Est impedit est aliquam error facilis.', 'repudiandae-alias-eum-vel-non-minima-voluptatum-harum', 'Voluptatem et tempore eveniet eaque praesentium repellendus.', 'Non modi quis explicabo rem quidem suscipit. Magni nihil quia sed voluptates provident consectetur voluptatibus tempore. Magnam eos velit asperiores enim alias consequatur quam. Laudantium non tempora eveniet natus impedit vel aut.', 176, 14, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(164, 'Fugit unde aliquid ducimus eos fugiat quas assumenda.', 'quis-omnis-facere-consequatur-quaerat-beatae', 'Accusamus quia esse voluptas ex enim repudiandae.', 'Aspernatur itaque perferendis quidem consequatur qui omnis vero. Dolorem voluptas ut consequatur omnis omnis voluptatem.', 177, 4, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(165, 'Natus ad vero est dolores illum.', 'debitis-quibusdam-delectus-quidem-quia-velit-qui-cupiditate', 'Et corporis quidem enim necessitatibus omnis.', 'Id fugit explicabo in ex blanditiis. At at ut praesentium autem. Eos deserunt impedit laborum necessitatibus repellendus ipsam. Est placeat sit et velit non et recusandae repellat.', 178, 4, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(166, 'Ea voluptatem exercitationem eligendi ipsa suscipit expedita vel recusandae.', 'aut-repudiandae-tenetur-itaque-quia', 'Quae perferendis facere nemo veritatis itaque debitis suscipit.', 'Sit et odio dignissimos et totam aspernatur quaerat nihil. Beatae quos modi quam hic voluptatem ducimus sed. Amet quas dolore et distinctio ipsum iste ducimus.', 179, 2, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(167, 'Omnis possimus dolore aut dolorem in assumenda.', 'reiciendis-quis-est-assumenda-repellat-sequi-molestiae-non', 'Itaque illum suscipit totam consequatur numquam.', 'Tempora doloremque quasi fugit consequatur explicabo debitis. Pariatur quod pariatur necessitatibus aperiam qui. Aliquid accusantium necessitatibus deserunt aut qui. Odio omnis architecto molestiae quo minima.', 180, 9, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(168, 'Reprehenderit error quidem ipsa maxime quod vel sed.', 'cumque-vitae-commodi-mollitia-dolorem', 'Iure tempora hic quia deleniti architecto omnis asperiores.', 'A assumenda sint iusto eum labore quibusdam rerum. Consequatur consequuntur facilis dolor eius aut recusandae. Iste quasi alias totam illum voluptatibus possimus. Quo perferendis rerum quia.', 181, 8, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(169, 'Rerum praesentium ratione voluptatibus veniam.', 'voluptas-est-perspiciatis-expedita-iste', 'Similique nesciunt molestiae laborum est quod pariatur quis.', 'Ea illum blanditiis excepturi dolorem et laudantium velit molestiae. Nisi magni impedit aut. Eos et fugit consequuntur qui delectus.', 182, 13, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(170, 'Dolor assumenda aut tempore.', 'sunt-labore-nisi-sapiente-sunt-sapiente-ex', 'Ipsum modi vel reiciendis atque.', 'Velit ut impedit exercitationem sint. Saepe harum odio quaerat corrupti aut adipisci veritatis. Voluptas modi exercitationem dolorum sequi sint sit nostrum.', 183, 14, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(171, 'Consequatur dolore nam necessitatibus eaque sint illo.', 'sit-vel-sed-atque-quia-quia-et-minus', 'Ut eos saepe explicabo tempora iusto ab iure.', 'Aliquam occaecati perferendis corporis minima ut ullam tenetur. Fugiat qui repellat placeat aliquam voluptatem vitae. Quia error velit eos molestias.', 184, 6, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(172, 'Repudiandae expedita qui optio ratione rem unde est.', 'molestiae-sed-facere-ipsum-eius', 'Qui esse dolores vel et quae.', 'Minima quo omnis sit totam omnis est. Qui sed quod eos voluptatem distinctio quae. Vitae nisi reprehenderit cumque voluptatem dolor sint. Qui cum beatae ex corrupti facere. Temporibus quibusdam ut ex id et recusandae.', 185, 5, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(173, 'Dignissimos optio perferendis ratione rerum ducimus omnis.', 'ut-consequatur-occaecati-suscipit-nostrum', 'Excepturi sunt adipisci itaque quam.', 'Nostrum omnis neque voluptatibus. Labore alias deleniti quam laborum nisi. Asperiores quia minus aut tenetur. Rem repellendus aut molestiae est.', 186, 9, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(174, 'Et perferendis vitae nihil.', 'laborum-aliquid-et-rerum-ipsum-consequatur', 'Non aperiam ea sit sed.', 'Distinctio sapiente ullam corrupti inventore eum pariatur. Dolore iure sit et nesciunt modi itaque. Voluptas nam dolor ea vel quia vel quibusdam. Fugit qui reprehenderit molestiae assumenda eos molestias.', 187, 2, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(175, 'Consequatur dolorem exercitationem nam suscipit voluptatem praesentium.', 'esse-molestiae-nulla-ipsum-dicta', 'Consequatur vel doloribus a.', 'Adipisci iusto eaque numquam sequi. Consequatur est voluptatem omnis enim velit culpa est. Illum ratione sit qui aperiam veniam est impedit.', 188, 12, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(176, 'Minima sint dolorem rerum in natus dicta.', 'quisquam-est-nihil-doloribus-facere', 'Numquam sit eveniet enim ad.', 'Ab perferendis voluptatem nobis ducimus libero repudiandae laboriosam. Sunt fugiat et distinctio officiis ipsam. Tenetur velit nesciunt nostrum.', 189, 14, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(177, 'Consequatur rem doloremque laborum fugit.', 'tempore-non-reprehenderit-quis-sequi-culpa-temporibus', 'Quidem adipisci facilis atque voluptatum.', 'Provident vero pariatur non dolorem optio. Tempora iste itaque eligendi et consequatur assumenda. Aliquam nobis in temporibus nostrum sequi.', 190, 1, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(178, 'Assumenda vel ullam a.', 'ducimus-excepturi-perspiciatis-accusantium-ea-consequatur-velit-quis', 'Et consequatur voluptate id sunt illum itaque rerum.', 'Illo soluta amet quia vitae consequatur dolores. Vel temporibus in aut quos voluptatem et tempore. Quis qui ut consectetur voluptatum labore.', 191, 2, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(179, 'Labore itaque est a cum velit vitae.', 'et-deserunt-illo-veritatis-maxime-et-et-minus-quia', 'Autem voluptatem earum aspernatur molestiae officiis a molestiae.', 'Quia ut dolores eum alias. Earum ab adipisci iusto veniam nobis maxime sequi velit. Dolorem est sint omnis ipsam nihil et reprehenderit. Maxime odit vel ut mollitia fuga velit.', 192, 4, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(180, 'Soluta adipisci suscipit aut ipsum magnam.', 'explicabo-deserunt-et-omnis-repellat-nulla-et', 'Sit perspiciatis sunt optio iste sequi praesentium.', 'Aut consectetur asperiores rerum doloremque. Porro illum quaerat earum et cumque labore sed est. Accusantium eum quo quo. Velit qui occaecati cumque dolores.', 193, 8, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(181, 'Aliquid ea veniam dolores dicta.', 'veniam-nihil-cum-eaque-illum', 'Provident exercitationem dolorem quam.', 'Corporis nobis nobis rem quae ut. Velit beatae aut aspernatur dolores veniam ut non minima. Quis consequatur explicabo eum et quia maxime ut.', 194, 5, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(182, 'Odit laboriosam in et accusamus.', 'incidunt-ipsa-eius-rerum-voluptas-voluptas-odit', 'Illum minima veniam odio.', 'Fuga aut beatae quas ipsa aut quam. Dolorum sint nobis magni deleniti dolorem deleniti. Quidem consequatur suscipit consequatur rem tempora quo quia.', 195, 1, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(183, 'Cum nostrum et explicabo deleniti rerum quidem consequatur.', 'qui-qui-reprehenderit-fuga', 'Et et molestiae molestias inventore et velit quibusdam.', 'Officiis ea rerum ut quia. Esse dicta rem necessitatibus recusandae. Facilis odit magni maiores sed maxime nam optio earum. Et vitae repellendus nobis corrupti sed sunt eum velit.', 196, 4, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(184, 'Assumenda ipsa error debitis delectus beatae non non.', 'perspiciatis-neque-voluptates-voluptatibus-doloremque-unde-quia-possimus-magnam', 'Rem beatae maiores praesentium possimus quae.', 'Quae est optio temporibus quos. Perspiciatis fugit dolorum non fugiat nihil accusantium. Quidem eos ut non est cupiditate facilis distinctio. Accusamus qui blanditiis ducimus numquam ad culpa.', 197, 2, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(185, 'Nihil fuga animi iste ullam quisquam exercitationem.', 'occaecati-doloribus-voluptatem-aut-enim-minus', 'Exercitationem quaerat modi nam reiciendis tempora.', 'Eveniet excepturi veritatis et ex quis non voluptatem. Sed rerum eius qui et ut est. Ipsum minima velit libero aliquam qui temporibus sit. Ratione qui est aut molestiae. Animi quidem et quae non quidem quidem quia.', 198, 9, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(186, 'Enim magni quia et repudiandae.', 'repellat-excepturi-est-facilis-qui-in-et', 'Impedit expedita ut velit autem.', 'Aliquam et repellat voluptates quia explicabo aspernatur sed. Sequi cum vitae fugit qui perferendis. Et quod voluptates non alias doloremque laudantium. Voluptatum aut quae dolores sapiente officia asperiores et veritatis. At ut itaque sit aut vero sit.', 199, 3, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(187, 'Nostrum aperiam tempora nam et sapiente consectetur adipisci.', 'in-voluptatum-nihil-pariatur-ab-harum', 'Porro nulla assumenda voluptates sint quam error totam.', 'Dolor ut error sit. Sapiente eius ratione reiciendis impedit dolorum. Quibusdam consequatur tempora animi ut quam aliquid.', 200, 14, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(188, 'At et ducimus voluptate at odit tempore temporibus.', 'rerum-deserunt-voluptas-nihil-voluptatem', 'Sed molestias adipisci nihil est.', 'Doloribus provident nisi eveniet perferendis. Ut mollitia iste voluptate dolorem. Aut pariatur molestias sequi ea aut. Enim rerum qui nesciunt quo.', 201, 8, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(189, 'Dolores aut voluptatum omnis sequi amet.', 'esse-aperiam-voluptatem-nam', 'Voluptas doloribus dolorem et.', 'Non vitae animi esse non. Eum quia architecto possimus fugit. Accusamus delectus ab voluptatem ipsam molestias dolorem.', 202, 13, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(190, 'Qui vero doloremque facilis rem quo et veniam.', 'incidunt-impedit-reprehenderit-iste-aut-vel', 'Aspernatur qui ea aspernatur ullam eaque culpa.', 'Architecto autem quia odit ipsum autem veritatis aut. Qui nihil et qui sunt. Aut sed recusandae sit non et quia molestiae. Ratione laudantium quo nostrum.', 203, 6, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(191, 'Ab officiis saepe cum eos tenetur id et.', 'dolore-est-harum-harum-autem-iusto', 'Voluptates sed non impedit debitis.', 'Culpa perspiciatis exercitationem corrupti sit sunt voluptate quod. Sit quis voluptas quaerat est odit ut fugit similique. Voluptas optio laboriosam magnam aliquam.', 204, 2, 0, 1, '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(193, 'Ut facilis eos rerum in enim ut.', 'non-eum-recusandae-et-qui-commodi', 'Omnis excepturi aut nam voluptatem delectus magnam.', 'Molestias velit libero omnis aut iste ad harum. Saepe voluptatem cupiditate aut. Et sint ut est culpa rerum dolorum.', 206, 10, 7, 1, '2024-09-21 22:30:40', '2024-11-16 21:53:18'),
(194, 'Et earum sequi quis ullam voluptatibus accusamus.', 'aperiam-quo-beatae-quaerat-doloremque-laudantium-eius', 'Reprehenderit animi et repudiandae sunt.', 'In quo impedit ipsam. Nam sint aperiam necessitatibus. Praesentium deleniti et reprehenderit earum ut molestias inventore.', 207, 11, 21, 1, '2024-09-21 22:30:40', '2024-11-23 06:28:59'),
(195, 'Cupiditate eum eos sed perspiciatis est.', 'sit-vitae-praesentium-quasi-sed-ut-a-pariatur', 'Molestiae deleniti vel iusto quo dolore.', 'Similique quo esse sit quam sunt. Cumque nobis nam sint ex autem qui libero. Architecto eos tempore quod sequi magnam.', 208, 3, 2, 1, '2024-09-21 22:30:40', '2024-09-21 23:06:20'),
(196, 'Sint magnam corrupti omnis.', 'placeat-consectetur-tempore-eveniet', 'Rerum voluptatibus libero repudiandae quasi.', 'Reiciendis quia rem et id in. Quas quas et et quo dolorem et et. Eligendi omnis ducimus et. Animi ea accusantium aperiam officiis sequi.', 209, 4, 0, 1, '2024-09-21 22:30:40', '2024-09-21 22:30:40'),
(197, 'Et accusamus ex corporis.', 'eligendi-dolor-ut-atque-illo-quam-fugit-autem', 'Rem similique quibusdam et qui corrupti.', 'Veniam harum molestias et minima temporibus beatae. Aut aut molestiae quia ducimus optio voluptas doloribus. Est deserunt quo mollitia molestiae. Ipsam consequatur voluptas voluptas aliquid libero quis.', 210, 1, 0, 1, '2024-09-21 22:30:40', '2024-09-21 22:30:40'),
(198, 'Sit itaque enim recusandae aut molestiae.', 'vero-reprehenderit-dolores-autem-aliquam-rem-veritatis-doloremque', 'Iste voluptas aut molestiae earum nihil laudantium.', 'Dolorem vel enim est eligendi delectus sit molestiae. Nostrum eos vel excepturi qui ad dolorem debitis natus. A aspernatur aliquid ut ab itaque.', 211, 9, 0, 1, '2024-09-21 22:30:40', '2024-09-21 22:30:40'),
(199, 'Quis aut perspiciatis ut explicabo aut.', 'harum-quibusdam-accusamus-et-ipsam-voluptatibus-aut', 'Vel culpa autem et quisquam quidem impedit.', 'Deserunt vero impedit voluptatem magni. Neque ut aperiam ad minima iusto. Molestiae officiis dolor rerum maxime. Sit dolores est incidunt officiis mollitia.', 212, 8, 0, 1, '2024-09-21 22:30:40', '2024-09-21 22:30:40'),
(200, 'Adipisci quo voluptas corporis et reiciendis saepe porro.', 'molestiae-provident-facilis-totam-qui-eos-rerum', 'Dolores tempore consequuntur ex et.', 'Quia et ea in hic facilis. Cupiditate cupiditate et omnis qui sint. Fugiat cumque rerum in sint ea.', 213, 3, 0, 1, '2024-09-21 22:30:40', '2024-09-21 22:30:40'),
(202, 'Tổng Bí thư, Chủ tịch nước kêu gọi các nước cùng kiến tạo tương lai hòa bình', 'tong-bi-thu-chu-tich-nuoc-keu-goi-cac-nuoc-cung-kien-tao-tuong-lai-hoa-binh', 'Tại Liên Hợp Quốc, Tổng Bí thư, Chủ tịch nước Tô Lâm có bài phát biểu với thông điệp mạnh mẽ và toàn diện về \"Củng cố chủ nghĩa đa phương, cùng hành động để kiến tạo tương lai hòa bình, ổn định, thịnh vượng và bền vững cho mọi người dân\".', '<h2 class=\"content-detail-sapo sm-sapo-mb-0\">Tại Li&ecirc;n Hợp Quốc, Tổng B&iacute; thư, Chủ tịch nước T&ocirc; L&acirc;m c&oacute; b&agrave;i ph&aacute;t biểu với th&ocirc;ng điệp mạnh mẽ v&agrave; to&agrave;n diện về \"Củng cố chủ nghĩa đa phương, c&ugrave;ng h&agrave;nh động để kiến tạo tương lai h&ograve;a b&igrave;nh, ổn định, thịnh vượng v&agrave; bền vững cho mọi người d&acirc;n\".</h2>\r\n<div id=\"maincontent\" class=\"maincontent main-content\">\r\n<p>Ng&agrave;y 24/9, tại trụ sở Li&ecirc;n Hợp Quốc ở New York, Mỹ, lễ khai mạc phi&ecirc;n thảo luận chung cấp cao Đại hội đồng Li&ecirc;n Hợp Quốc kh&oacute;a 79 đ&atilde; diễn ra với chủ đề \"Kh&ocirc;ng để ai bị bỏ lại ph&iacute;a sau: H&agrave;nh động đo&agrave;n kết để th&uacute;c đẩy h&ograve;a b&igrave;nh, ph&aacute;t triển bền vững, phẩm gi&aacute; con người v&igrave; c&aacute;c thế hệ h&ocirc;m nay v&agrave; tương lai\".</p>\r\n<figure class=\"image vnn-content-image\"><picture><source srcset=\"https://static-images.vnncdn.net/vps_images_publish/000001/000003/2024/9/25/un71065589-20240924-lj-gaopen-5-4252.jpg?width=0&amp;s=NClyVpfHotnomPqK01qEXw\" media=\"(max-width: 1023px)\" data-srcset=\"https://static-images.vnncdn.net/vps_images_publish/000001/000003/2024/9/25/un71065589-20240924-lj-gaopen-5-4252.jpg?width=0&amp;s=NClyVpfHotnomPqK01qEXw\"><img class=\" lazy-loaded\" src=\"data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==\" srcset=\"https://static-images.vnncdn.net/vps_images_publish/000001/000003/2024/9/25/un71065589-20240924-lj-gaopen-5-4252.jpg?width=0&amp;s=NClyVpfHotnomPqK01qEXw\" alt=\"UN71065589_20240924_LJ_GAOpen 5_.jpg\" data-original=\"https://static-images.vnncdn.net/vps_images_publish/000001/000003/2024/9/25/un71065589-20240924-lj-gaopen-5-4252.jpg?width=0&amp;s=NClyVpfHotnomPqK01qEXw\" data-srcset=\"https://static-images.vnncdn.net/vps_images_publish/000001/000003/2024/9/25/un71065589-20240924-lj-gaopen-5-4252.jpg?width=0&amp;s=NClyVpfHotnomPqK01qEXw\" data-thumb-small-src=\"https://static-images.vnncdn.net/vps_images_publish/000001/000003/2024/9/25/un71065589-20240924-lj-gaopen-5-4252.jpg?width=260&amp;s=rVhOMVUfmGbK-LIh9q8IhQ\" data-thumb-src=\"https://static-images.vnncdn.net/vps_images_publish/000001/000003/2024/9/25/un71065589-20240924-lj-gaopen-5-4252.jpg?width=260&amp;s=rVhOMVUfmGbK-LIh9q8IhQ\" data-lg-id=\"279a376c-1bd4-4de4-8d43-a71d34d99a86\"></picture>\r\n<figcaption>Tổng Thư k&yacute; Li&ecirc;n Hợp Quốc Ant&oacute;nio Guterres ph&aacute;t biểu khai mạc. Ảnh: Li&ecirc;n Hợp Quốc</figcaption>\r\n</figure>\r\n<p>Phi&ecirc;n họp c&oacute; sự tham dự của 155 người đứng đầu Nh&agrave; nước v&agrave; Ch&iacute;nh phủ của c&aacute;c quốc gia th&agrave;nh vi&ecirc;n Li&ecirc;n Hợp Quốc, c&ugrave;ng l&atilde;nh đạo tổ chức quốc tế v&agrave; khu vực. Tổng B&iacute; thư, Chủ tịch nước T&ocirc; L&acirc;m đ&atilde; dự lễ khai mạc v&agrave; ph&aacute;t biểu tại phi&ecirc;n thảo luận chung.</p>\r\n<p>Ph&aacute;t biểu khai mạc, Tổng Thư k&yacute; Li&ecirc;n Hợp Quốc Ant&oacute;nio Guterres cảnh b&aacute;o cạnh tranh địa ch&iacute;nh trị, c&aacute;c cuộc xung đột chưa c&oacute; hồi kết, biến đổi kh&iacute; hậu, vũ kh&iacute; hạt nh&acirc;n v&agrave; c&aacute;c loại vũ kh&iacute; mới nổi như \"kho thuốc s&uacute;ng\" đang chực chờ ph&aacute;t nổ, đẩy thế giới v&agrave;o thảm họa.</p>\r\n<p>&Ocirc;ng Guterres khẳng định cộng đồng quốc tế c&oacute; thể vượt qua những th&aacute;ch thức đ&oacute; nếu giải quyết được triệt để c&aacute;c nguy&ecirc;n nh&acirc;n gốc rễ của chia rẽ to&agrave;n cầu l&agrave; t&igrave;nh trạng bất b&igrave;nh đẳng, vi phạm luật ph&aacute;p quốc tế v&agrave; Hiến chương Li&ecirc;n Hợp Quốc.</p>\r\n<p>Chủ tịch Đại hội đồng Li&ecirc;n Hợp Quốc kh&oacute;a 79 Philemon Yang cũng nhấn mạnh hợp t&aacute;c quốc tế l&agrave; c&ocirc;ng cụ để giải quyết c&aacute;c vấn đề to&agrave;n cầu v&agrave; kiến tạo một tương lai tốt hơn cho tất cả người d&acirc;n tr&ecirc;n thế giới.</p>\r\n<p>Tại phi&ecirc;n thảo luận chung đầu ti&ecirc;n,&nbsp;<a href=\"https://vietnamnet.vn/ho-so/ong-to-lam-C000725.html\" target=\"_blank\" rel=\"noopener\">Tổng B&iacute; thư, Chủ tịch nước T&ocirc; L&acirc;m</a>&nbsp;c&oacute; b&agrave;i ph&aacute;t biểu với th&ocirc;ng điệp mạnh mẽ v&agrave; to&agrave;n diện về \"Củng cố chủ nghĩa đa phương, c&ugrave;ng h&agrave;nh động để kiến tạo tương lai h&ograve;a b&igrave;nh, ổn định, thịnh vượng v&agrave; bền vững cho mọi người d&acirc;n\".</p>\r\n<p>Theo Tổng B&iacute; thư, Chủ tịch nước, thế giới đang trong thời kỳ thay đổi c&oacute; t&iacute;nh thời đại. H&ograve;a&nbsp;b&igrave;nh, hợp t&aacute;c, ph&aacute;t triển tuy l&agrave; xu thế lớn, song đang đứng trước những kh&oacute; khăn, th&aacute;ch thức mới, nghi&ecirc;m trọng hơn.</p>\r\n<figure class=\"image vnn-content-image\"><picture><source srcset=\"https://static-images.vnncdn.net/vps_images_publish/000001/000003/2024/9/25/un71066315-20240924-lf-5459-4253.jpg?width=0&amp;s=TkjdzNYuuMB8y6O7cEkkrg\" media=\"(max-width: 1023px)\" data-srcset=\"https://static-images.vnncdn.net/vps_images_publish/000001/000003/2024/9/25/un71066315-20240924-lf-5459-4253.jpg?width=0&amp;s=TkjdzNYuuMB8y6O7cEkkrg\"><img class=\" lazy-loaded\" src=\"data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==\" srcset=\"https://static-images.vnncdn.net/vps_images_publish/000001/000003/2024/9/25/un71066315-20240924-lf-5459-4253.jpg?width=0&amp;s=TkjdzNYuuMB8y6O7cEkkrg\" alt=\"UN71066315_20240924_LF_5459_.jpg\" data-original=\"https://static-images.vnncdn.net/vps_images_publish/000001/000003/2024/9/25/un71066315-20240924-lf-5459-4253.jpg?width=0&amp;s=TkjdzNYuuMB8y6O7cEkkrg\" data-srcset=\"https://static-images.vnncdn.net/vps_images_publish/000001/000003/2024/9/25/un71066315-20240924-lf-5459-4253.jpg?width=0&amp;s=TkjdzNYuuMB8y6O7cEkkrg\" data-thumb-small-src=\"https://static-images.vnncdn.net/vps_images_publish/000001/000003/2024/9/25/un71066315-20240924-lf-5459-4253.jpg?width=260&amp;s=GbdGktrhsUcMkOgGxapkCA\" data-thumb-src=\"https://static-images.vnncdn.net/vps_images_publish/000001/000003/2024/9/25/un71066315-20240924-lf-5459-4253.jpg?width=260&amp;s=GbdGktrhsUcMkOgGxapkCA\" data-lg-id=\"742ea8ae-3d39-4eea-8e17-c34a0f8b031a\"></picture>\r\n<figcaption>Tổng B&iacute; thư, Chủ tịch nước T&ocirc; L&acirc;m ph&aacute;t biểu tại phi&ecirc;n thảo luận chung. Ảnh: Li&ecirc;n Hợp Quốc</figcaption>\r\n</figure>\r\n<p>C&aacute;c th&aacute;ch thức an ninh phi truyền thống ng&agrave;y c&agrave;ng gay gắt, biến đổi kh&iacute; hậu, hiện tượng kh&iacute; hậu cực đoan, thi&ecirc;n tai, dịch bệnh, cạn kiệt t&agrave;i nguy&ecirc;n, gi&agrave; h&oacute;a d&acirc;n số... đẩy l&ugrave;i nỗ lực ph&aacute;t triển của nh&acirc;n loại. C&aacute;c nước ngh&egrave;o bị bỏ lại ph&iacute;a sau với khoảng c&aacute;ch ph&aacute;t triển ng&agrave;y c&agrave;ng xa.</p>\r\n<p>Tổng B&iacute; thư, Chủ tịch nước dẫn chứng về si&ecirc;u b&atilde;o Yagi m&agrave; Việt Nam v&agrave; một số nước trong khu vực vừa phải hứng chịu với những hậu quả t&agrave;n khốc v&agrave; tang thương, một lần nữa l&agrave; sự cảnh b&aacute;o về mức độ ảnh hưởng nghi&ecirc;m trọng của thi&ecirc;n tai v&agrave; biến đổi kh&iacute; hậu.</p>\r\n<p>Kinh tế thế giới tăng trưởng kh&oacute; khăn, xu hướng &ldquo;ph&acirc;n t&aacute;ch&rdquo;, ph&acirc;n mảnh v&agrave; g&acirc;y sức &eacute;p, trừng phạt kinh tế đe dọa sự ph&aacute;t triển nhanh, bền vững. C&aacute;ch mạng c&ocirc;ng nghiệp lần thứ tư mở ra cơ hội ph&aacute;t triển bứt ph&aacute; song cũng đặt ra những th&aacute;ch thức gắn liền với an ninh, an to&agrave;n của x&atilde; hội v&agrave; người d&acirc;n.</p>\r\n<p>Tổng B&iacute; thư, Chủ tịch nước nhấn mạnh, đ&acirc;y l&agrave; những kh&oacute; khăn, th&aacute;ch thức chưa từng c&oacute; đối với h&ograve;a b&igrave;nh, hợp t&aacute;c, ph&aacute;t triển bền vững v&agrave; phẩm gi&aacute; con người của c&aacute;c thế hệ hiện tại v&agrave; mai sau.</p>\r\n<p>T&igrave;nh h&igrave;nh hiện nay c&agrave;ng đ&ograve;i hỏi sự chung tay, c&ugrave;ng h&agrave;nh động, c&ugrave;ng nỗ lực v&agrave; hợp t&aacute;c chặt chẽ giữa mọi quốc gia, ph&aacute;t huy cao độ vai tr&ograve; của c&aacute;c thể chế quốc tế, trước hết l&agrave;&nbsp;<a href=\"https://vietnamnet.vn/lien-hop-quoc-tag5407852039452001336.html\" target=\"_blank\" rel=\"noopener\">Li&ecirc;n Hợp Quốc</a>, c&aacute;c tổ chức khu vực, trong đ&oacute; c&oacute; ASEAN.</p>\r\n<p>Chia sẻ tầm nh&igrave;n của Việt Nam về tương lai, Tổng B&iacute; thư, Chủ tịch nước nhấn mạnh h&ograve;a b&igrave;nh, ổn định l&agrave; nền tảng để kiến tạo một tương lai thịnh vượng v&agrave; c&aacute;c quốc gia, nhất l&agrave; c&aacute;c nước lớn, cần tu&acirc;n thủ luật ph&aacute;p quốc tế, Hiến chương Li&ecirc;n Hợp Quốc, h&agrave;nh xử c&oacute; tr&aacute;ch nhiệm, tu&acirc;n thủ c&aacute;c cam kết, đ&oacute;ng g&oacute;p v&agrave;o c&ocirc;ng việc chung, củng cố đo&agrave;n kết, sự ch&acirc;n th&agrave;nh, l&ograve;ng tin, đề cao đối thoại, loại bỏ đối đầu.</p>\r\n<figure class=\"image vnn-content-image\"><picture><source srcset=\"https://static-images.vnncdn.net/vps_images_publish/000001/000003/2024/9/25/anh-1-4254.jpg?width=0&amp;s=5AQDcfH4AoIm3aljWUDpaw\" media=\"(max-width: 1023px)\" data-srcset=\"https://static-images.vnncdn.net/vps_images_publish/000001/000003/2024/9/25/anh-1-4254.jpg?width=0&amp;s=5AQDcfH4AoIm3aljWUDpaw\"><img class=\" lazy-loaded\" src=\"data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==\" srcset=\"https://static-images.vnncdn.net/vps_images_publish/000001/000003/2024/9/25/anh-1-4254.jpg?width=0&amp;s=5AQDcfH4AoIm3aljWUDpaw\" alt=\"anh 1.jpg\" data-original=\"https://static-images.vnncdn.net/vps_images_publish/000001/000003/2024/9/25/anh-1-4254.jpg?width=0&amp;s=5AQDcfH4AoIm3aljWUDpaw\" data-srcset=\"https://static-images.vnncdn.net/vps_images_publish/000001/000003/2024/9/25/anh-1-4254.jpg?width=0&amp;s=5AQDcfH4AoIm3aljWUDpaw\" data-thumb-small-src=\"https://static-images.vnncdn.net/vps_images_publish/000001/000003/2024/9/25/anh-1-4254.jpg?width=260&amp;s=0Z87TlkyOHpQJEYWREAKGw\" data-thumb-src=\"https://static-images.vnncdn.net/vps_images_publish/000001/000003/2024/9/25/anh-1-4254.jpg?width=260&amp;s=0Z87TlkyOHpQJEYWREAKGw\" data-lg-id=\"f134813f-8699-4304-994e-f64900c8be4a\"></picture>\r\n<figcaption>Tổng B&iacute; thư, Chủ tịch nước: Chỉ khi đo&agrave;n kết, hợp t&aacute;c, tin cậy, chung sức, đồng l&ograve;ng, ch&uacute;ng ta mới c&oacute; thể x&acirc;y dựng th&agrave;nh c&ocirc;ng thế giới h&ograve;a b&igrave;nh, ph&aacute;t triển bền vững v&agrave; phẩm gi&aacute; con người cho thế hệ hiện tại v&agrave; mai sau, để kh&ocirc;ng ai bị bỏ lại ph&iacute;a sau. Ảnh: TTXVN&nbsp;</figcaption>\r\n</figure>\r\n<p>Tổng B&iacute; thư, Chủ tịch nước cho rằng cần đảm bảo sự ph&aacute;t triển b&igrave;nh đẳng của mỗi quốc gia, mỗi cộng đồng, mỗi con người trong điều kiện kinh tế, x&atilde; hội, văn h&oacute;a kh&aacute;c nhau. Khơi th&ocirc;ng, huy động v&agrave; sử dụng hiệu quả mọi nguồn lực phục vụ ph&aacute;t triển ph&ugrave; hợp với nhu cầu của mỗi quốc gia.</p>\r\n<p>Ưu ti&ecirc;n nguồn lực cho những &ldquo;v&ugrave;ng trũng&rdquo; trong triển khai c&aacute;c mục ti&ecirc;u ph&aacute;t triển bền vững. Ch&uacute; trọng hỗ trợ c&aacute;c quốc gia đang ph&aacute;t triển, chậm ph&aacute;t triển, đặc biệt về nguồn vốn ưu đ&atilde;i, chuyển giao c&ocirc;ng nghệ ti&ecirc;n tiến, đ&agrave;o tạo nguồn nh&acirc;n lực chất lượng cao, tạo thuận lợi về đầu tư, thương mại, giảm g&aacute;nh nặng nợ cho c&aacute;c nước ngh&egrave;o.</p>\r\n<p>Tổng B&iacute; thư, Chủ tịch nước nhấn mạnh việc sớm thiết lập những khu&ocirc;n khổ quản trị to&agrave;n cầu th&ocirc;ng minh với tầm nh&igrave;n d&agrave;i hạn về khoa học - c&ocirc;ng nghệ, nhất l&agrave; c&ocirc;ng nghệ mới nổi như tr&iacute; tuệ nh&acirc;n tạo, đảm bảo th&uacute;c đẩy sự ph&aacute;t triển tiến bộ, thụ hưởng những th&agrave;nh tựu t&iacute;ch cực; đồng thời chủ động ngăn chặn, đẩy l&ugrave;i những hiểm họa&nbsp;đối với h&ograve;a b&igrave;nh, ph&aacute;t triển bền vững v&agrave; nh&acirc;n loại.&nbsp;</p>\r\n<p>Cần c&oacute; tư duy mới kiến tạo tương lai mang t&iacute;nh chuyển đổi mạnh mẽ, to&agrave;n diện, tập trung v&agrave;o chuyển đổi số, chuyển đổi xanh v&agrave; chuyển đổi quản trị to&agrave;n cầu. Trong đ&oacute;, theo Tổng B&iacute; thư, Chủ tịch nước, chuyển đổi xanh, chuyển đổi số l&agrave; những c&ocirc;ng cụ quan trọng gi&uacute;p c&aacute;c quốc gia, nhất l&agrave; c&aacute;c nước đang ph&aacute;t triển tăng cường sức chống chịu trước c&aacute;c c&uacute; sốc, khủng hoảng v&agrave; thảm họa trong tương lai.</p>\r\n<p>Cần tập trung cải tổ c&aacute;c cơ chế đa phương, nhất l&agrave; hệ thống Li&ecirc;n Hợp Quốc v&agrave; c&aacute;c thể chế t&agrave;i ch&iacute;nh - tiền tệ quốc tế đảm bảo tốt hơn t&iacute;nh đại diện, c&ocirc;ng bằng, minh bạch.</p>\r\n<p>Tổng B&iacute; thư, Chủ tịch nước nhấn mạnh việc đặt con người ở vị tr&iacute; trung t&acirc;m chủ thể để hiện thực h&oacute;a&nbsp;c&aacute;c tầm nh&igrave;n. Lấy người d&acirc;n l&agrave; trung t&acirc;m, mục ti&ecirc;u, động lực của mọi ch&iacute;nh s&aacute;ch v&agrave; h&agrave;nh động ở tất cả c&aacute;c cấp độ. Đầu tư v&agrave; ph&aacute;t triển to&agrave;n diện thế hệ trẻ về tri thức, văn h&oacute;a tr&ecirc;n cơ sở c&aacute;c gi&aacute; trị chung v&agrave; tinh thần tr&aacute;ch nhiệm, cống hiến.</p>\r\n<p>Trong thế giới đang mạnh mẽ chuyển m&igrave;nh ng&agrave;y nay, mỗi quốc gia đều đ&oacute;ng một vai tr&ograve; quan trọng trong bản giao hưởng lớn của thời đại.</p>\r\n<p>Việt Nam đang ra sức phấn đấu để c&oacute; thể hiện thực h&oacute;a một tương lai h&ograve;a b&igrave;nh, ổn định, thịnh vượng v&agrave; bền vững, kh&ocirc;ng chỉ cho người d&acirc;n Việt Nam, m&agrave; c&ograve;n cho tất cả mọi quốc gia tr&ecirc;n thế giới.</p>\r\n</div>', 1, 2, 23, 1, '2024-09-24 23:40:54', '2024-10-25 06:38:00'),
(203, 'Mỹ muốn giải pháp ngoại giao cho Lebanon và Israel, chỉ huy Hezbollah thiệt mạng', 'my-muon-giai-phap-ngoai-giao-cho-lebanon-va-israel-chi-huy-hezbollah-thiet-mang', 'Tổng thống Mỹ Joe Biden hôm 24/9 nói rằng, bản thân ông không muốn một cuộc chiến toàn diện nổ ra giữa Israel và Lebanon.', '<p>Trong b&agrave;i ph&aacute;t biểu tại Đại hội đồng Li&ecirc;n Hợp Quốc h&ocirc;m 24/9 (giờ Mỹ), &ocirc;ng Biden n&oacute;i rằng một giải ph&aacute;p ngoại giao giữa ch&iacute;nh quyền&nbsp;<a href=\"https://vietnamnet.vn/israel-tag8487108801207253704.html\">Israel</a>&nbsp;v&agrave; nh&oacute;m vũ trang Hezbollah ở Lebanon l&agrave; con đường duy nhất.</p>\r\n<figure class=\"image vnn-content-image\"><picture><source srcset=\"https://static-images.vnncdn.net/vps_images_publish/000001/000003/2024/9/25/biden-11-6063.jpg?width=0&amp;s=1piOdfn4vrPI1pkKrGcJ4g\" media=\"(max-width: 1023px)\" data-srcset=\"https://static-images.vnncdn.net/vps_images_publish/000001/000003/2024/9/25/biden-11-6063.jpg?width=0&amp;s=1piOdfn4vrPI1pkKrGcJ4g\"><img class=\" lazy-loaded\" src=\"data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==\" srcset=\"https://static-images.vnncdn.net/vps_images_publish/000001/000003/2024/9/25/biden-11-6063.jpg?width=0&amp;s=1piOdfn4vrPI1pkKrGcJ4g\" alt=\"Biden 11.jpg\" data-original=\"https://static-images.vnncdn.net/vps_images_publish/000001/000003/2024/9/25/biden-11-6063.jpg?width=0&amp;s=1piOdfn4vrPI1pkKrGcJ4g\" data-srcset=\"https://static-images.vnncdn.net/vps_images_publish/000001/000003/2024/9/25/biden-11-6063.jpg?width=0&amp;s=1piOdfn4vrPI1pkKrGcJ4g\" data-thumb-small-src=\"https://static-images.vnncdn.net/vps_images_publish/000001/000003/2024/9/25/biden-11-6063.jpg?width=260&amp;s=-6_s5TpKVQnyVLDLzBTLzQ\" data-thumb-src=\"https://static-images.vnncdn.net/vps_images_publish/000001/000003/2024/9/25/biden-11-6063.jpg?width=260&amp;s=-6_s5TpKVQnyVLDLzBTLzQ\" data-lg-id=\"7bb4bd95-0b9a-4f97-9479-2663148683c5\"></picture>\r\n<figcaption>&Ocirc;ng Biden ph&aacute;t biểu tại Đại hội đồng Li&ecirc;n Hợp Quốc. Ảnh: UN.org</figcaption>\r\n</figure>\r\n<p>&ldquo;Một cuộc chiến to&agrave;n diện giữa Israel v&agrave; Lebanon sẽ kh&ocirc;ng mang lại lợi &iacute;ch cho bất kỳ ai. Ngay cả trong t&igrave;nh h&igrave;nh leo thang, th&igrave; một giải ph&aacute;p ngoại giao vẫn c&oacute; thể thực hiện. Ngoại giao vẫn l&agrave; kế hoạch duy nhất cho ph&eacute;p c&ocirc;ng d&acirc;n Israel v&agrave; Lebanon, những người phải đi di tản do xung đột, trở về nh&agrave; của họ ở bi&ecirc;n giới hai nước&rdquo;, tờ Bưu điện Jerusalem dẫn lời &ocirc;ng Biden n&oacute;i.</p>\r\n<p>Theo h&atilde;ng tin Al Jazeera, lời k&ecirc;u gọi đ&agrave;m ph&aacute;n tr&ecirc;n của Tổng thống Mỹ được đưa ra trong bối cảnh Kh&ocirc;ng qu&acirc;n Israel những ng&agrave;y gần đ&acirc;y đ&atilde; thực hiện nhiều vụ kh&ocirc;ng k&iacute;ch nhằm v&agrave;o h&agrave;ng ngh&igrave;n mục ti&ecirc;u &ldquo;được cho l&agrave; của nh&oacute;m vũ trang Hezbollah ở&nbsp;<a href=\"https://vietnamnet.vn/lebanon-tag17206682118425417667.html\">Lebanon</a>&rdquo;. Số liệu thống k&ecirc; được Bộ Y tế Lebanon c&ocirc;ng bố rạng s&aacute;ng 25/9 cho thấy, bom đạn Israel đ&atilde; khiến &iacute;t nhất 569 người thiệt mạng v&agrave; hơn 1.830 người bị thương.</p>\r\n<p><strong>Chỉ huy Hezbollah thiệt mạng</strong></p>\r\n<p>H&atilde;ng th&ocirc;ng tấn Al Jazeera đưa tin, nh&oacute;m vũ trang Hezbollah rạng s&aacute;ng 25/9 x&aacute;c nhận một chỉ huy của họ ở thủ đ&ocirc; Beirut, Lebanon, đ&atilde; thiệt mạng trong một vụ kh&ocirc;ng k&iacute;ch do Israel tiến h&agrave;nh.</p>\r\n<p>&ldquo;Chỉ huy cấp cao Ibrahim Muhammad Qubaisi đ&atilde; thiệt mạng trong một vụ kh&ocirc;ng k&iacute;ch do Israel thực hiện h&ocirc;m 24/9. Ngo&agrave;i &ocirc;ng Qubaisi, vụ kh&ocirc;ng k&iacute;ch cũng khiến 5 người kh&aacute;c thiệt mạng v&agrave; hơn chục người kh&aacute;c bị thương&rdquo;, th&ocirc;ng c&aacute;o của Hezbollah viết.</p>\r\n<p>Lực lượng ph&ograve;ng vệ Israel (IDF) sau đ&oacute; đ&atilde; nhận tr&aacute;ch nhiệm về c&aacute;i chết của chỉ huy Hezbollah Qubaisi, đồng thời khẳng định người n&agrave;y &ldquo;nắm vai tr&ograve; quan trọng trong việc l&ecirc;n kế hoạch v&agrave; thực hiện nhiều cuộc tấn c&ocirc;ng nhằm chống lại d&acirc;n thường v&agrave; binh sĩ Israel&rdquo;.</p>', 1, 2, 4, 1, '2024-09-25 00:05:10', '2024-10-03 07:06:46');
INSERT INTO `posts` (`id`, `title`, `slug`, `excerpt`, `body`, `user_id`, `category_id`, `views`, `approved`, `created_at`, `updated_at`) VALUES
(204, 'Ông Trần Đăng Khoa được bổ nhiệm làm Thư ký Bộ trưởng Bộ TT&TT', 'ong-tran-dang-khoa-duoc-bo-nhiem-lam-thu-ky-bo-truong-bo-tttt', 'Ông Trần Đăng Khoa, Phó Cục trưởng Cục An toàn thông tin được điều động và bổ nhiệm giữ chức danh Thư ký Bộ trưởng Bộ TT&TT kể từ ngày 1/10.', '<h2 class=\"content-detail-sapo sm-sapo-mb-0\">&Ocirc;ng Trần Đăng Khoa, Ph&oacute; Cục trưởng Cục An to&agrave;n th&ocirc;ng tin được điều động v&agrave; bổ nhiệm giữ chức danh Thư k&yacute; Bộ trưởng Bộ TT&amp;TT kể từ ng&agrave;y 1/10.</h2>\r\n<div id=\"maincontent\" class=\"maincontent main-content\">\r\n<p>Chiều ng&agrave;y 3/10, Bộ trưởng Bộ TT&amp;TT Nguyễn Mạnh H&ugrave;ng đ&atilde; chủ tr&igrave; lễ c&ocirc;ng bố v&agrave; trao c&aacute;c quyết định c&ocirc;ng t&aacute;c c&aacute;n bộ tại 4 đơn vị của Bộ gồm: Văn ph&ograve;ng Bộ; Vụ Kế hoạch &ndash; T&agrave;i ch&iacute;nh; Cục Xuất bản, In v&agrave; ph&aacute;t h&agrave;nh; Quỹ Dịch vụ Viễn th&ocirc;ng c&ocirc;ng &iacute;ch Việt Nam.</p>\r\n<p>Buổi lễ c&ograve;n c&oacute; sự tham dự của c&aacute;c Thứ trưởng Bộ TT&amp;TT Phan T&acirc;m, Nguyễn Thanh L&acirc;m v&agrave; B&ugrave;i Ho&agrave;ng Phương.</p>\r\n<figure class=\"image vnn-content-image\"><picture><source srcset=\"https://static-images.vnncdn.net/vps_images_publish/000001/000003/2024/10/3/w-bo-nhiem-can-bo-bo-tttt-8344.jpg?width=0&amp;s=oxLjk4iO5dQd_5D3-kyFog\" media=\"(max-width: 1023px)\" data-srcset=\"https://static-images.vnncdn.net/vps_images_publish/000001/000003/2024/10/3/w-bo-nhiem-can-bo-bo-tttt-8344.jpg?width=0&amp;s=oxLjk4iO5dQd_5D3-kyFog\"><img class=\" lazy-loaded\" src=\"data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==\" srcset=\"https://static-images.vnncdn.net/vps_images_publish/000001/000003/2024/10/3/w-bo-nhiem-can-bo-bo-tttt-8344.jpg?width=0&amp;s=oxLjk4iO5dQd_5D3-kyFog\" alt=\"W-bo nhiem can bo Bo TTTT.jpg\" data-original=\"https://static-images.vnncdn.net/vps_images_publish/000001/000003/2024/10/3/w-bo-nhiem-can-bo-bo-tttt-8344.jpg?width=0&amp;s=oxLjk4iO5dQd_5D3-kyFog\" data-srcset=\"https://static-images.vnncdn.net/vps_images_publish/000001/000003/2024/10/3/w-bo-nhiem-can-bo-bo-tttt-8344.jpg?width=0&amp;s=oxLjk4iO5dQd_5D3-kyFog\" data-thumb-small-src=\"https://static-images.vnncdn.net/vps_images_publish/000001/000003/2024/10/3/w-bo-nhiem-can-bo-bo-tttt-8344.jpg?width=260&amp;s=-KkVq5We2k1HP4ZN3hWJ8w\" data-thumb-src=\"https://static-images.vnncdn.net/vps_images_publish/000001/000003/2024/10/3/w-bo-nhiem-can-bo-bo-tttt-8344.jpg?width=260&amp;s=-KkVq5We2k1HP4ZN3hWJ8w\" data-lg-id=\"5de6084f-60c1-40c6-bd82-bd6efc19ed64\"></picture>\r\n<figcaption>Bộ trưởng Nguyễn Mạnh H&ugrave;ng chủ tr&igrave; lễ c&ocirc;ng bố v&agrave; trao quyết định về c&ocirc;ng t&aacute;c c&aacute;n bộ tại Bộ TT&amp;TT. Ảnh: L&ecirc; Anh Dũng</figcaption>\r\n</figure>\r\n<p>Theo quyết định được k&yacute; ng&agrave;y 23/9, &ocirc;ng Trần Đăng Khoa, Ph&oacute; Cục trưởng Cục An to&agrave;n th&ocirc;ng tin được điều động v&agrave; bổ nhiệm giữ chức danh Thư k&yacute; Bộ trưởng Bộ TT&amp;TT. Quyết định điều động v&agrave; bổ nhiệm &ocirc;ng Trần Đăng Khoa c&oacute; hiệu lực từ ng&agrave;y 1/10.&nbsp;</p>\r\n<figure class=\"image vnn-content-image\"><picture><source srcset=\"https://static-images.vnncdn.net/vps_images_publish/000001/000003/2024/10/3/w-psx-20241003-144340-8345.jpg?width=0&amp;s=-VK6cTDn3m5vA2HG-e1cqA\" media=\"(max-width: 1023px)\" data-srcset=\"https://static-images.vnncdn.net/vps_images_publish/000001/000003/2024/10/3/w-psx-20241003-144340-8345.jpg?width=0&amp;s=-VK6cTDn3m5vA2HG-e1cqA\"><img class=\" lazy-loaded\" src=\"data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==\" srcset=\"https://static-images.vnncdn.net/vps_images_publish/000001/000003/2024/10/3/w-psx-20241003-144340-8345.jpg?width=0&amp;s=-VK6cTDn3m5vA2HG-e1cqA\" alt=\"W-PSX_20241003_144340.jpg\" data-original=\"https://static-images.vnncdn.net/vps_images_publish/000001/000003/2024/10/3/w-psx-20241003-144340-8345.jpg?width=0&amp;s=-VK6cTDn3m5vA2HG-e1cqA\" data-srcset=\"https://static-images.vnncdn.net/vps_images_publish/000001/000003/2024/10/3/w-psx-20241003-144340-8345.jpg?width=0&amp;s=-VK6cTDn3m5vA2HG-e1cqA\" data-thumb-small-src=\"https://static-images.vnncdn.net/vps_images_publish/000001/000003/2024/10/3/w-psx-20241003-144340-8345.jpg?width=260&amp;s=2CMkpsbO7ctIbTvvlHfNjw\" data-thumb-src=\"https://static-images.vnncdn.net/vps_images_publish/000001/000003/2024/10/3/w-psx-20241003-144340-8345.jpg?width=260&amp;s=2CMkpsbO7ctIbTvvlHfNjw\" data-lg-id=\"83ed8df5-0f5a-4ecf-9a08-1ccbff84f029\"></picture>\r\n<figcaption>Bộ trưởng Nguyễn Mạnh H&ugrave;ng trao quyết định cho &ocirc;ng Trần Đăng Khoa. Ảnh: L&ecirc; Anh Dũng</figcaption>\r\n</figure>\r\n<p>&Ocirc;ng Trần Duy Hiếu, Gi&aacute;m đốc Quỹ Dịch vụ viễn th&ocirc;ng c&ocirc;ng &iacute;ch Việt Nam được điều động v&agrave; bổ nhiệm giữ chức Ph&oacute; Vụ trưởng Vụ Kế hoạch - T&agrave;i ch&iacute;nh, Bộ TT&amp;TT. Quyết định điều động v&agrave; bổ nhiệm &ocirc;ng Trần Duy Hiếu c&oacute; hiệu lực từ ng&agrave;y 3/10.</p>\r\n<p>C&ugrave;ng ng&agrave;y 3/10, Bộ trưởng Bộ TT&amp;TT đ&atilde; k&yacute; quyết định điều động v&agrave; bổ nhiệm &ocirc;ng Nguyễn Hữu Hạnh, Ph&oacute; Vụ trưởng Vụ Kế hoạch &ndash; T&agrave;i ch&iacute;nh, giữ chức vụ Gi&aacute;m đốc Quỹ Dịch vụ Viễn th&ocirc;ng c&ocirc;ng &iacute;ch Việt Nam, Bộ TT&amp;TT.</p>\r\n<p>Tại sự kiện, Bộ trưởng Nguyễn Mạnh H&ugrave;ng cũng đ&atilde; trao quyết định k&eacute;o d&agrave;i thời gian giữ chức vụ Ph&oacute; Cục trưởng Cục Xuất bản, In v&agrave; Ph&aacute;t h&agrave;nh cho &ocirc;ng Phạm Tuấn Vũ. &Ocirc;ng Vũ sẽ đảm tr&aacute;ch chức vụ n&agrave;y cho đến thời điểm đủ tuổi nghỉ hưu theo quy định.</p>\r\n<figure class=\"image vnn-content-image\"><picture><source srcset=\"https://static-images.vnncdn.net/vps_images_publish/000001/000003/2024/10/3/w-psx-20241003-144058-8346.jpg?width=0&amp;s=4F6PmzClFGy8gNLI4Wgu2w\" media=\"(max-width: 1023px)\" data-srcset=\"https://static-images.vnncdn.net/vps_images_publish/000001/000003/2024/10/3/w-psx-20241003-144058-8346.jpg?width=0&amp;s=4F6PmzClFGy8gNLI4Wgu2w\"><img class=\" lazy-loaded\" src=\"data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==\" srcset=\"https://static-images.vnncdn.net/vps_images_publish/000001/000003/2024/10/3/w-psx-20241003-144058-8346.jpg?width=0&amp;s=4F6PmzClFGy8gNLI4Wgu2w\" alt=\"W-PSX_20241003_144058.jpg\" data-original=\"https://static-images.vnncdn.net/vps_images_publish/000001/000003/2024/10/3/w-psx-20241003-144058-8346.jpg?width=0&amp;s=4F6PmzClFGy8gNLI4Wgu2w\" data-srcset=\"https://static-images.vnncdn.net/vps_images_publish/000001/000003/2024/10/3/w-psx-20241003-144058-8346.jpg?width=0&amp;s=4F6PmzClFGy8gNLI4Wgu2w\" data-thumb-small-src=\"https://static-images.vnncdn.net/vps_images_publish/000001/000003/2024/10/3/w-psx-20241003-144058-8346.jpg?width=260&amp;s=VqqdNSVesGj2zyhMJDL1TA\" data-thumb-src=\"https://static-images.vnncdn.net/vps_images_publish/000001/000003/2024/10/3/w-psx-20241003-144058-8346.jpg?width=260&amp;s=VqqdNSVesGj2zyhMJDL1TA\" data-lg-id=\"2ae58b9b-f99d-4cf1-b15c-0dc1c2be029e\"></picture>\r\n<figcaption>Bộ trưởng Nguyễn Mạnh H&ugrave;ng trao quyết định cho Ph&oacute; Cục trưởng Cục Xuất bản, In v&agrave; Ph&aacute;t h&agrave;nh Phạm Tuấn Vũ. Ảnh: L&ecirc; Anh Dũng.</figcaption>\r\n</figure>\r\n<p>B&agrave;y tỏ mong muốn 4 c&aacute;n bộ mới nhận nhiệm vụ mỗi người một c&aacute;ch đều l&agrave;m tốt c&ocirc;ng việc, Bộ trưởng Nguyễn Mạnh H&ugrave;ng cũng n&ecirc;u ra kỳ vọng với từng người, cụ thể l&agrave;: Ph&oacute; Cục trưởng Cục Xuất bản, In v&agrave; Ph&aacute;t h&agrave;nh Phạm Tuấn Vũ trong hơn 10 th&aacute;ng tới tiếp tục l&agrave;m gương về c&aacute;ch ứng xử, tinh thần l&agrave;m việc nghi&ecirc;m t&uacute;c, kh&ocirc;ng &lsquo;chợ chiều&rsquo;.</p>\r\n<p>Ph&oacute; Vụ trưởng Vụ Kế hoạch - T&agrave;i ch&iacute;nh Trần Duy Hiếu chung tay c&ugrave;ng tập thể l&atilde;nh đạo Vụ ổn định tổ chức, đưa đơn vị ph&aacute;t triển. Gi&aacute;m đốc Quỹ Dịch vụ Viễn th&ocirc;ng c&ocirc;ng &iacute;ch Việt Nam Nguyễn Hữu Hạnh cần mở ra một trang mới cho Quỹ theo tinh thần l&agrave;m cho mọi việc dễ đi nhưng vẫn đạt hiệu quả.</p>\r\n<p>Trong khi đ&oacute;, &ocirc;ng Trần Đăng Khoa, t&acirc;n Thư k&yacute; Bộ trưởng Bộ TT&amp;TT, được lưu &yacute; cần ch&uacute; trọng phối hợp, sử dụng sự hỗ trợ từ hơn 100 nh&acirc;n sự của Văn ph&ograve;ng Bộ cũng như tập thể nh&acirc;n sự trong Bộ để c&oacute; thể ho&agrave;n th&agrave;nh tốt nhiệm vụ.</p>\r\n<p><em>&ldquo;Ch&uacute;c c&aacute;c đồng ch&iacute; c&oacute; niềm tin, ho&agrave;n th&agrave;nh tốt nhiệm vụ v&agrave; l&uacute;c n&agrave;o cũng thấy b&ecirc;n cạnh m&igrave;nh c&oacute; cả một tổ chức lớn hỗ trợ&rdquo;</em>, Bộ trưởng Nguyễn Mạnh H&ugrave;ng nhắn nhủ.</p>\r\n<figure class=\"image vnn-content-image\"><picture><source srcset=\"https://static-images.vnncdn.net/vps_images_publish/000001/000003/2024/10/3/w-bo-truong-nguyen-manh-hung-8347.jpg?width=0&amp;s=tGtPpw_TL5nnwmpBpOD7aA\" media=\"(max-width: 1023px)\" data-srcset=\"https://static-images.vnncdn.net/vps_images_publish/000001/000003/2024/10/3/w-bo-truong-nguyen-manh-hung-8347.jpg?width=0&amp;s=tGtPpw_TL5nnwmpBpOD7aA\"><img class=\" lazy-loaded\" src=\"data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==\" srcset=\"https://static-images.vnncdn.net/vps_images_publish/000001/000003/2024/10/3/w-bo-truong-nguyen-manh-hung-8347.jpg?width=0&amp;s=tGtPpw_TL5nnwmpBpOD7aA\" alt=\"W-bo truong nguyen manh hung.jpg\" data-original=\"https://static-images.vnncdn.net/vps_images_publish/000001/000003/2024/10/3/w-bo-truong-nguyen-manh-hung-8347.jpg?width=0&amp;s=tGtPpw_TL5nnwmpBpOD7aA\" data-srcset=\"https://static-images.vnncdn.net/vps_images_publish/000001/000003/2024/10/3/w-bo-truong-nguyen-manh-hung-8347.jpg?width=0&amp;s=tGtPpw_TL5nnwmpBpOD7aA\" data-thumb-small-src=\"https://static-images.vnncdn.net/vps_images_publish/000001/000003/2024/10/3/w-bo-truong-nguyen-manh-hung-8347.jpg?width=260&amp;s=mSfEM3rZRqYljN_IN547Fw\" data-thumb-src=\"https://static-images.vnncdn.net/vps_images_publish/000001/000003/2024/10/3/w-bo-truong-nguyen-manh-hung-8347.jpg?width=260&amp;s=mSfEM3rZRqYljN_IN547Fw\" data-lg-id=\"4921ab65-24cf-4d3d-b3f3-e585deb5d621\"></picture>\r\n<figcaption>Bộ trưởng Nguyễn Mạnh H&ugrave;ng mong 4 c&aacute;n bộ nhận nhiệm vụ mới, mỗi người một c&aacute;ch, khi việc đến tay th&igrave; l&agrave;m cho tốt. Ảnh: L&ecirc; Anh Dũng</figcaption>\r\n</figure>\r\n<p>Ghi nhận, đ&aacute;nh gi&aacute; cao tinh thần sẵn s&agrave;ng nhận nhiệm vụ mới của 4 c&aacute;n bộ mới nhận quyết định cũng như c&aacute;c&nbsp;<a href=\"https://vietnamnet.vn/lanh-dao-thoi-chuyen-doi-so-phai-san-sang-thich-ung-khong-ngai-thay-doi-2307045.html\" target=\"_blank\" rel=\"noopener\">c&aacute;n bộ l&atilde;nh đạo trong Bộ TT&amp;TT</a>, người đứng đầu ng&agrave;nh TT&amp;TT c&ograve;n nhắc nhở đội ngũ l&atilde;nh đạo của Bộ lu&ocirc;n nhớ th&aacute;i độ l&agrave;m việc l&agrave; yếu tố số 1 khi l&agrave;m việc trong cơ quan nh&agrave; nước, đồng thời đo&agrave;n kết, chung tay c&ugrave;ng nhau trong thực hiện c&aacute;c c&ocirc;ng việc.</p>\r\n<p>Tại sự kiện, c&aacute;c Thứ trưởng Phan T&acirc;m, Nguyễn Thanh L&acirc;m v&agrave; B&ugrave;i Ho&agrave;ng Phương đ&atilde; c&oacute; một số lưu &yacute;, nhắc nhở về c&ocirc;ng việc cụ thể c&aacute;c c&aacute;n bộ được giao nhiệm vụ mới cần tập trung trong thời gian tới.</p>\r\n<p>Cụ thể, Thứ trưởng Phan T&acirc;m y&ecirc;u cầu &ocirc;ng Nguyễn Hữu Hạnh khi nhận nhiệm vụ mới đầy th&aacute;ch thức tại Quỹ, b&ecirc;n cạnh việc nỗ lực thực hiện chương tr&igrave;nh c&ocirc;ng t&aacute;c đ&atilde; b&aacute;o c&aacute;o l&atilde;nh đạo Bộ, cần phải l&agrave;m sao để &lsquo;truyền lửa&rsquo; cho cả tập thể c&aacute;n bộ, c&ocirc;ng chức, vi&ecirc;n chức, người lao động tại đơn vị về sự tận t&acirc;m, tận tụy, kh&ocirc;ng ngại việc mới v&agrave; việc kh&oacute;. C&oacute; như vậy, Gi&aacute;m đốc Quỹ Dịch vụ Viễn th&ocirc;ng C&ocirc;ng &iacute;ch Việt Nam mới vượt qua kh&oacute; khăn để ph&aacute;t triển.</p>\r\n<figure class=\"image vnn-content-image\"><picture><source srcset=\"https://static-images.vnncdn.net/vps_images_publish/000001/000003/2024/10/3/w-psx-20241003-144215-8348.jpg?width=0&amp;s=Tu2DUdhuuECALAIq73CagA\" media=\"(max-width: 1023px)\" data-srcset=\"https://static-images.vnncdn.net/vps_images_publish/000001/000003/2024/10/3/w-psx-20241003-144215-8348.jpg?width=0&amp;s=Tu2DUdhuuECALAIq73CagA\"><img class=\" lazy-loaded\" src=\"data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==\" srcset=\"https://static-images.vnncdn.net/vps_images_publish/000001/000003/2024/10/3/w-psx-20241003-144215-8348.jpg?width=0&amp;s=Tu2DUdhuuECALAIq73CagA\" alt=\"W-PSX_20241003_144215.jpg\" data-original=\"https://static-images.vnncdn.net/vps_images_publish/000001/000003/2024/10/3/w-psx-20241003-144215-8348.jpg?width=0&amp;s=Tu2DUdhuuECALAIq73CagA\" data-srcset=\"https://static-images.vnncdn.net/vps_images_publish/000001/000003/2024/10/3/w-psx-20241003-144215-8348.jpg?width=0&amp;s=Tu2DUdhuuECALAIq73CagA\" data-thumb-small-src=\"https://static-images.vnncdn.net/vps_images_publish/000001/000003/2024/10/3/w-psx-20241003-144215-8348.jpg?width=260&amp;s=bv70_FvAGri6boO10zLFCA\" data-thumb-src=\"https://static-images.vnncdn.net/vps_images_publish/000001/000003/2024/10/3/w-psx-20241003-144215-8348.jpg?width=260&amp;s=bv70_FvAGri6boO10zLFCA\" data-lg-id=\"e8617621-d798-4067-9431-73daac4c14b1\"></picture>\r\n<figcaption>&Ocirc;ng Trần Duy Hiếu, Ph&oacute; Vụ trưởng Vụ Kế hoạch - T&agrave;i ch&iacute;nh nhận quyết định. Ảnh: L&ecirc; Anh Dũng.</figcaption>\r\n</figure>\r\n<p>Với vai tr&ograve; l&agrave; Thứ trưởng được ph&acirc;n c&ocirc;ng theo d&otilde;i lĩnh vực Xuất bản, In v&agrave; Ph&aacute;t h&agrave;nh, Thứ trưởng Nguyễn Thanh L&acirc;m đề nghị Ph&oacute; Cục trưởng Cục Xuất bản, In v&agrave; Ph&aacute;t h&agrave;nh Phạm Tuấn Vũ trong thời gian 10 th&aacute;ng c&ograve;n c&ocirc;ng t&aacute;c tại đơn vị, sẽ tập trung v&agrave;o 2 việc l&agrave; tạo đột ph&aacute; trong vấn đề xử l&yacute; in lậu v&agrave; th&uacute;c đẩy chuyển đổi số của lĩnh vực.</p>\r\n<p>Thứ trưởng B&ugrave;i Ho&agrave;ng Phương đề nghị Ph&oacute; Vụ trưởng Vụ Kế hoạch - T&agrave;i ch&iacute;nh Trần Duy Hiếu trở lại c&ocirc;ng t&aacute;c tại Vụ sau 5 năm chuyển sang l&agrave;m tại Quỹ Dịch vụ Viễn th&ocirc;ng c&ocirc;ng &iacute;ch Việt Nam, sẽ phối hợp với tập thể l&atilde;nh đạo, c&aacute;c c&aacute;n bộ, c&ocirc;ng chức v&agrave; người lao động trong đơn vị để ho&agrave;n th&agrave;nh tốt c&aacute;c nhiệm vụ.</p>\r\n<figure class=\"image vnn-content-image\"><picture><source srcset=\"https://static-images.vnncdn.net/vps_images_publish/000001/000003/2024/10/3/bo-nhiem-can-bo-1-8349.jpg?width=0&amp;s=FMo6dkEm92QVhp6iMj13vw\" media=\"(max-width: 1023px)\" data-srcset=\"https://static-images.vnncdn.net/vps_images_publish/000001/000003/2024/10/3/bo-nhiem-can-bo-1-8349.jpg?width=0&amp;s=FMo6dkEm92QVhp6iMj13vw\"><img class=\" lazy-loaded\" src=\"data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==\" srcset=\"https://static-images.vnncdn.net/vps_images_publish/000001/000003/2024/10/3/bo-nhiem-can-bo-1-8349.jpg?width=0&amp;s=FMo6dkEm92QVhp6iMj13vw\" alt=\"bo nhiem can bo 1.jpg\" data-original=\"https://static-images.vnncdn.net/vps_images_publish/000001/000003/2024/10/3/bo-nhiem-can-bo-1-8349.jpg?width=0&amp;s=FMo6dkEm92QVhp6iMj13vw\" data-srcset=\"https://static-images.vnncdn.net/vps_images_publish/000001/000003/2024/10/3/bo-nhiem-can-bo-1-8349.jpg?width=0&amp;s=FMo6dkEm92QVhp6iMj13vw\" data-thumb-small-src=\"https://static-images.vnncdn.net/vps_images_publish/000001/000003/2024/10/3/bo-nhiem-can-bo-1-8349.jpg?width=260&amp;s=Z5Twz11-q2-ns2QquyvOHw\" data-thumb-src=\"https://static-images.vnncdn.net/vps_images_publish/000001/000003/2024/10/3/bo-nhiem-can-bo-1-8349.jpg?width=260&amp;s=Z5Twz11-q2-ns2QquyvOHw\" data-lg-id=\"c15091aa-f0a5-415d-b1c5-4b629d894595\"></picture>\r\n<figcaption>Bộ trưởng Nguyễn Mạnh H&ugrave;ng v&agrave; 3 thứ trưởng Phan T&acirc;m, Nguyễn Thanh L&acirc;m, B&ugrave;i Ho&agrave;ng Phương ch&uacute;c mừng 4 c&aacute;n bộ nhận nhiệm vụ mới. Ảnh: L&ecirc; Anh Dũng</figcaption>\r\n</figure>\r\n<p>B&agrave;y tỏ sự tri &acirc;n v&igrave; l&atilde;nh đạo Bộ TT&amp;TT đ&atilde; quan t&acirc;m, tin tưởng, hỗ trợ v&agrave; c&aacute;c l&atilde;nh đạo, người lao động tại đơn vị đ&atilde; phối hợp, gi&uacute;p đỡ, cả 4 c&aacute;n bộ mới nhận nhiệm vụ đều cam kết sẽ nỗ lực hết sức để triển khai c&aacute;c c&ocirc;ng việc trong thời gian tới.</p>\r\n<p>D&ugrave; thời gian c&ocirc;ng t&aacute;c kh&ocirc;ng c&ograve;n d&agrave;i, chỉ 10 th&aacute;ng, song &ocirc;ng Phạm Tuấn Vũ hứa sẽ l&agrave;m việc hết sức để đ&oacute;ng g&oacute;p v&agrave;o sự ph&aacute;t triển của Cục Xuất bản, In v&agrave; Ph&aacute;t h&agrave;nh cũng như của Bộ, ng&agrave;nh TT&amp;TT.</p>\r\n<p>Nhận thức r&otilde; m&ocirc;i trường c&ocirc;ng t&aacute;c v&agrave; y&ecirc;u cầu c&ocirc;ng việc tại Vụ Kế hoạch &ndash; T&agrave;i ch&iacute;nh đ&atilde; kh&aacute;c nhiều giai đoạn trước, &ocirc;ng Trần Duy Hiếu cam kết sẽ đo&agrave;n kết với tập thể Vụ, nỗ lực hết m&igrave;nh để nhanh ch&oacute;ng bắt nhịp, h&ograve;a nhập với ho&agrave;n cảnh c&ocirc;ng t&aacute;c mới để l&agrave;m tốt c&aacute;c nhiệm vụ được giao.</p>\r\n<figure class=\"image vnn-content-image\"><picture><source srcset=\"https://static-images.vnncdn.net/vps_images_publish/000001/000003/2024/10/3/w-psx-20241003-144255-8350.jpg?width=0&amp;s=ctn32KcZTLehqurbC5MrYg\" media=\"(max-width: 1023px)\" data-srcset=\"https://static-images.vnncdn.net/vps_images_publish/000001/000003/2024/10/3/w-psx-20241003-144255-8350.jpg?width=0&amp;s=ctn32KcZTLehqurbC5MrYg\"><img class=\" lazy-loaded\" src=\"data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==\" srcset=\"https://static-images.vnncdn.net/vps_images_publish/000001/000003/2024/10/3/w-psx-20241003-144255-8350.jpg?width=0&amp;s=ctn32KcZTLehqurbC5MrYg\" alt=\"W-PSX_20241003_144255.jpg\" data-original=\"https://static-images.vnncdn.net/vps_images_publish/000001/000003/2024/10/3/w-psx-20241003-144255-8350.jpg?width=0&amp;s=ctn32KcZTLehqurbC5MrYg\" data-srcset=\"https://static-images.vnncdn.net/vps_images_publish/000001/000003/2024/10/3/w-psx-20241003-144255-8350.jpg?width=0&amp;s=ctn32KcZTLehqurbC5MrYg\" data-thumb-small-src=\"https://static-images.vnncdn.net/vps_images_publish/000001/000003/2024/10/3/w-psx-20241003-144255-8350.jpg?width=260&amp;s=Dx056-D8_UKIOyYGWZRFTQ\" data-thumb-src=\"https://static-images.vnncdn.net/vps_images_publish/000001/000003/2024/10/3/w-psx-20241003-144255-8350.jpg?width=260&amp;s=Dx056-D8_UKIOyYGWZRFTQ\" data-lg-id=\"52954b35-c546-4fdb-9e66-63c173fce2f1\"></picture>\r\n<figcaption>&Ocirc;ng Nguyễn Hữu Hạnh nhận quyết định đảm tr&aacute;ch nhiệm vụ mới, Gi&aacute;m đốc Quỹ Dịch vụ Viễn th&ocirc;ng c&ocirc;ng &iacute;ch Việt Nam. Ảnh: L&ecirc; Anh Dũng</figcaption>\r\n</figure>\r\n<p>Hứa sẽ cố gắng hết sức để ho&agrave;n th&agrave;nh nhiệm vụ mới, &ocirc;ng Nguyễn Hữu Hạnh cho biết thời gian tới sẽ tập trung v&agrave;o 4 việc ch&iacute;nh gồm: X&acirc;y dựng, ho&agrave;n thiện c&aacute;c cơ chế ch&iacute;nh s&aacute;ch phục vụ hoạt động dịch vụ viễn th&ocirc;ng c&ocirc;ng &iacute;ch; tiếp tục triển khai hiệu quả Chương tr&igrave;nh cung cấp dịch vụ viễn th&ocirc;ng c&ocirc;ng &iacute;ch; đưa mọi hoạt động của Quỹ l&ecirc;n m&ocirc;i trường số; l&agrave;m tốt c&ocirc;ng t&aacute;c quản trị nội bộ l&agrave;m cơ sở cho Quỹ ph&aacute;t triển ổn định, bền vững.</p>\r\n<p>L&agrave; người thứ ba được giao trọng tr&aacute;ch Thư k&yacute; của Bộ trưởng Nguyễn Mạnh H&ugrave;ng, &ocirc;ng Trần Đăng Khoa chia sẻ đ&acirc;y l&agrave; vinh dự nhưng cũng l&agrave; th&aacute;ch thức rất lớn, đồng thời khẳng định thời gian tới sẽ thực hiện nhiệm vụ với tinh thần phụng sự, d&agrave;nh to&agrave;n bộ t&acirc;m sức, thời gian, tr&iacute; lực v&agrave; phối hợp tốt với l&atilde;nh đạo c&aacute;c cơ quan, đơn vị để ho&agrave;n th&agrave;nh tốt c&aacute;c c&ocirc;ng việc chung.</p>\r\n</div>', 214, 2, 1, 1, '2024-10-03 07:09:03', '2024-10-03 07:13:14'),
(205, 'Sở Giáo dục Hà Nội thông tin vụ cô giáo có hành vi thân mật với nam sinh', 'so-giao-duc-ha-noi-thong-tin-vu-co-giao-co-hanh-vi-than-mat-voi-nam-sinh', 'Phó Giám đốc Sở GD-ĐT Hà Nội Nguyễn Quang Tuấn cho biết, Sở đã nắm thông tin và xác minh rõ vụ việc xảy ra tại Trường THPT Thạch Bàn (quận Long Biên) sáng 27/9, trong tiết dạy môn Văn của một nữ giáo viên.', '<h2 class=\"content-detail-sapo sm-sapo-mb-0\">Ph&oacute; Gi&aacute;m đốc Sở GD-ĐT H&agrave; Nội Nguyễn Quang Tuấn cho biết, Sở đ&atilde; nắm th&ocirc;ng tin v&agrave; x&aacute;c minh r&otilde; vụ việc xảy ra tại Trường THPT Thạch B&agrave;n (quận Long Bi&ecirc;n) s&aacute;ng 27/9, trong tiết dạy m&ocirc;n Văn của một nữ gi&aacute;o vi&ecirc;n.</h2>\r\n<div id=\"maincontent\" class=\"maincontent main-content\">\r\n<p>Chiều 3/10, tại buổi họp b&aacute;o thường kỳ của UBND TP H&agrave; Nội, Ph&oacute; Gi&aacute;m đốc Sở GD-ĐT H&agrave; Nội Nguyễn Quang Tuấn nhận được đề nghị th&ocirc;ng tin về việc c&ocirc; gi&aacute;o ở một trường học tại quận Long Bi&ecirc;n c&oacute; h&agrave;nh vi th&acirc;n mật với nam sinh trong lớp.</p>\r\n<p>L&agrave;m r&otilde; vấn đề tr&ecirc;n, &ocirc;ng Nguyễn Quang Tuấn cho biết, sau khi xuất hiện th&ocirc;ng tin về clip, cơ quan n&agrave;y đ&atilde; y&ecirc;u cầu c&aacute;c đơn vị v&agrave;o cuộc x&aacute;c minh v&agrave; x&aacute;c định vụ việc xảy ra tại Trường THPT Thạch B&agrave;n (quận Long Bi&ecirc;n) v&agrave;o s&aacute;ng 27/9, trong tiết dạy m&ocirc;n Văn của một nữ gi&aacute;o vi&ecirc;n.</p>\r\n<figure class=\"image vnn-content-image\"><picture><source srcset=\"https://static-images.vnncdn.net/vps_images_publish/000001/000003/2024/10/3/w-gio-duc-va-dao-tao-7984.jpeg?width=0&amp;s=r8kBvNwkSmaM0-8QaHcgWw\" media=\"(max-width: 1023px)\" data-srcset=\"https://static-images.vnncdn.net/vps_images_publish/000001/000003/2024/10/3/w-gio-duc-va-dao-tao-7984.jpeg?width=0&amp;s=r8kBvNwkSmaM0-8QaHcgWw\"><img class=\" lazy-loaded\" src=\"data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==\" srcset=\"https://static-images.vnncdn.net/vps_images_publish/000001/000003/2024/10/3/w-gio-duc-va-dao-tao-7984.jpeg?width=0&amp;s=r8kBvNwkSmaM0-8QaHcgWw\" alt=\"W-gio duc va dao tao.jpeg\" data-original=\"https://static-images.vnncdn.net/vps_images_publish/000001/000003/2024/10/3/w-gio-duc-va-dao-tao-7984.jpeg?width=0&amp;s=r8kBvNwkSmaM0-8QaHcgWw\" data-srcset=\"https://static-images.vnncdn.net/vps_images_publish/000001/000003/2024/10/3/w-gio-duc-va-dao-tao-7984.jpeg?width=0&amp;s=r8kBvNwkSmaM0-8QaHcgWw\" data-thumb-small-src=\"https://static-images.vnncdn.net/vps_images_publish/000001/000003/2024/10/3/w-gio-duc-va-dao-tao-7984.jpeg?width=260&amp;s=J8KwFg24vQIUXSs_IIum6g\" data-thumb-src=\"https://static-images.vnncdn.net/vps_images_publish/000001/000003/2024/10/3/w-gio-duc-va-dao-tao-7984.jpeg?width=260&amp;s=J8KwFg24vQIUXSs_IIum6g\" data-lg-id=\"4610f610-9dce-452a-bd21-878f789c66e7\"></picture>\r\n<figcaption>Ph&oacute; Gi&aacute;m đốc Sở GD-ĐT H&agrave; Nội Nguyễn Quang Tuấn. Ảnh: Quang Phong</figcaption>\r\n</figure>\r\n<p>\"Clip được ghi lại trong giờ ra chơi giữa 2 tiết dạy Văn. L&uacute;c n&agrave;y c&ocirc; gi&aacute;o ở lại lớp để chuẩn bị cho tiết học sau, c&oacute; n&oacute;i chuyện, tr&ecirc;u đ&ugrave;a với học sinh. Cử chỉ thể hiện như trong clip tr&ecirc;n mạng\", l&atilde;nh đạo Sở GD-ĐT H&agrave; Nội n&oacute;i.</p>\r\n<p>Th&ocirc;ng tin x&aacute;c minh cho thấy, nữ gi&aacute;o vi&ecirc;n sinh năm 2001, mới ra trường v&agrave; đang k&yacute; hợp đồng giảng dạy với trường. \"Kết quả x&aacute;c minh cho thấy, c&ocirc; gi&aacute;o n&agrave;y ho&agrave; đồng, gần gũi với học sinh. Do c&ocirc; gi&aacute;o c&ograve;n trẻ, n&ecirc;n kinh nghiệm quản l&yacute; học sinh, quản l&yacute; lớp học, xử l&yacute; c&aacute;c vấn đề ph&aacute;t sinh trong lớp học c&ograve;n thiếu nghi&ecirc;m khắc, dẫn đến hiểu nhầm, ảnh hưởng đến c&aacute; nh&acirc;n, nh&agrave; trường v&agrave; ng&agrave;nh\", &ocirc;ng Nguyễn Quang Tuấn th&ocirc;ng tin.</p>\r\n<p>Theo l&atilde;nh đạo Sở GD-ĐT H&agrave; Nội, c&aacute;c đơn vị chuy&ecirc;n m&ocirc;n đ&atilde; l&agrave;m việc, trao đổi để phụ huynh, học sinh nh&igrave;n nhận sự việc l&agrave; \"thiếu chuẩn mực\", ảnh hưởng đến h&igrave;nh ảnh của học sinh, ảnh hưởng đến trường học. Nh&agrave; trường đ&atilde; tạm thời đ&igrave;nh chỉ việc dạy học của nữ gi&aacute;o vi&ecirc;n để tiến h&agrave;nh kiểm điểm, ổn định t&acirc;m l&yacute;.</p>\r\n<p>Với học sinh, nh&agrave; trường cũng l&agrave;m việc với gia đ&igrave;nh để gi&uacute;p học sinh nh&igrave;n nhận được vấn đề. Học sinh cho biết, ban đầu chỉ nghĩ l&agrave; h&agrave;nh vi tr&ecirc;u đ&ugrave;a c&ocirc; gi&aacute;o, kh&ocirc;ng nghĩ c&oacute; những ảnh hưởng kh&ocirc;ng hay.</p>\r\n<p>&ldquo;Nh&agrave; trường sẽ tiến h&agrave;nh xem x&eacute;t hạnh kiểm học sinh theo đ&uacute;ng quy định. Sở GD-ĐT H&agrave; Nội cũng đ&atilde; c&oacute; những văn bản y&ecirc;u cầu đảm bảo giữ g&igrave;n m&ocirc;i trường sư phạm, giữ g&igrave;n văn ho&aacute; học đường&rdquo;, &ocirc;ng Nguyễn Quang Tuấn n&oacute;i th&ecirc;m.</p>\r\n</div>', 214, 3, 6, 1, '2024-10-03 07:18:18', '2024-11-16 21:52:59'),
(206, 'đâsd', 'dasd', 'dsadsadsad', '<p>ddddddddddddddddddddddddddd<img src=\"dsads\" alt=\"\"></p>', 214, 2, 1, 1, '2024-10-15 01:04:24', '2024-10-15 01:04:35'),
(207, 'ưewqe', 'uewqe', 'ewqewqe', '<p>ssssssssssssssssss</p>', 214, 2, 1, 1, '2024-10-15 01:13:11', '2024-10-15 01:13:22'),
(208, 'dsdsad', 'dsdsad', 'sdsadsad', '<p>dsad</p>', 214, 2, 1, 1, '2024-10-15 01:21:29', '2024-10-15 01:21:36'),
(213, 'ưdd', 'udsad', 'dsad', '<p>s&aacute;asasasa</p>', 214, 2, 4, 1, '2024-10-15 01:24:21', '2024-10-15 01:33:27'),
(214, 'dsdsa', 'dsdsa', 'dsadsad', '<p>dsdasd</p>', 214, 3, 0, 1, '2024-10-15 01:35:23', '2024-10-15 01:35:23'),
(220, 'Tài xế \'xe điên\' và án tù cả chục năm sau cuộc nhậu', 'tai-xe-xe-dien-va-an-tu-ca-chuc-nam-sau-cuoc-nhau', 'Sau bữa nhậu, cuộc vui, khi trong người sẵn hơi men, một số người vẫn ngồi sau tay lái để rồi khiến những chiếc \"xe điên\" gây tai nạn liên hoàn...', '<p>ddddddddddddddddddddddddddddd</p>', 214, 2, 7, 1, '2024-11-16 21:44:39', '2024-11-23 07:02:12');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `post_tag`
--

CREATE TABLE `post_tag` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `tag_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `post_tag`
--

INSERT INTO `post_tag` (`id`, `post_id`, `tag_id`, `created_at`, `updated_at`) VALUES
(2, 2, 11, NULL, NULL),
(3, 3, 16, NULL, NULL),
(4, 4, 9, NULL, NULL),
(5, 5, 1, NULL, NULL),
(6, 6, 14, NULL, NULL),
(7, 7, 7, NULL, NULL),
(8, 8, 18, NULL, NULL),
(9, 9, 9, NULL, NULL),
(10, 10, 19, NULL, NULL),
(11, 11, 11, NULL, NULL),
(12, 12, 18, NULL, NULL),
(13, 13, 3, NULL, NULL),
(14, 14, 18, NULL, NULL),
(15, 15, 7, NULL, NULL),
(16, 16, 15, NULL, NULL),
(17, 17, 15, NULL, NULL),
(18, 18, 2, NULL, NULL),
(19, 19, 16, NULL, NULL),
(20, 20, 12, NULL, NULL),
(21, 21, 1, NULL, NULL),
(22, 22, 15, NULL, NULL),
(23, 23, 15, NULL, NULL),
(24, 24, 14, NULL, NULL),
(25, 25, 9, NULL, NULL),
(26, 26, 2, NULL, NULL),
(27, 27, 8, NULL, NULL),
(28, 28, 2, NULL, NULL),
(29, 29, 5, NULL, NULL),
(30, 30, 1, NULL, NULL),
(31, 31, 7, NULL, NULL),
(32, 32, 5, NULL, NULL),
(33, 33, 13, NULL, NULL),
(34, 34, 5, NULL, NULL),
(35, 35, 10, NULL, NULL),
(36, 36, 12, NULL, NULL),
(37, 37, 17, NULL, NULL),
(38, 38, 10, NULL, NULL),
(39, 39, 7, NULL, NULL),
(40, 40, 10, NULL, NULL),
(41, 41, 7, NULL, NULL),
(42, 42, 4, NULL, NULL),
(43, 43, 12, NULL, NULL),
(44, 44, 1, NULL, NULL),
(45, 45, 2, NULL, NULL),
(46, 46, 6, NULL, NULL),
(47, 47, 19, NULL, NULL),
(48, 48, 3, NULL, NULL),
(49, 49, 16, NULL, NULL),
(50, 50, 20, NULL, NULL),
(51, 51, 19, NULL, NULL),
(52, 52, 19, NULL, NULL),
(53, 53, 16, NULL, NULL),
(54, 54, 9, NULL, NULL),
(55, 55, 5, NULL, NULL),
(56, 56, 19, NULL, NULL),
(57, 57, 17, NULL, NULL),
(58, 58, 10, NULL, NULL),
(59, 59, 13, NULL, NULL),
(60, 60, 1, NULL, NULL),
(61, 61, 15, NULL, NULL),
(62, 62, 20, NULL, NULL),
(63, 63, 17, NULL, NULL),
(64, 64, 2, NULL, NULL),
(65, 65, 8, NULL, NULL),
(66, 66, 10, NULL, NULL),
(67, 67, 6, NULL, NULL),
(68, 68, 16, NULL, NULL),
(69, 69, 9, NULL, NULL),
(70, 70, 5, NULL, NULL),
(71, 71, 5, NULL, NULL),
(72, 72, 7, NULL, NULL),
(73, 73, 6, NULL, NULL),
(74, 74, 11, NULL, NULL),
(75, 75, 7, NULL, NULL),
(76, 76, 11, NULL, NULL),
(77, 77, 20, NULL, NULL),
(78, 78, 4, NULL, NULL),
(79, 79, 1, NULL, NULL),
(80, 80, 12, NULL, NULL),
(81, 81, 12, NULL, NULL),
(82, 82, 13, NULL, NULL),
(83, 83, 10, NULL, NULL),
(84, 84, 13, NULL, NULL),
(85, 85, 3, NULL, NULL),
(86, 86, 19, NULL, NULL),
(87, 87, 17, NULL, NULL),
(88, 88, 14, NULL, NULL),
(89, 89, 1, NULL, NULL),
(90, 90, 10, NULL, NULL),
(91, 91, 11, NULL, NULL),
(92, 92, 16, NULL, NULL),
(93, 93, 7, NULL, NULL),
(94, 94, 10, NULL, NULL),
(95, 95, 14, NULL, NULL),
(96, 96, 3, NULL, NULL),
(97, 97, 16, NULL, NULL),
(98, 98, 6, NULL, NULL),
(99, 99, 1, NULL, NULL),
(100, 100, 14, NULL, NULL),
(101, 101, 19, NULL, NULL),
(102, 102, 6, NULL, NULL),
(103, 103, 11, NULL, NULL),
(104, 104, 20, NULL, NULL),
(105, 105, 2, NULL, NULL),
(106, 106, 13, NULL, NULL),
(107, 107, 19, NULL, NULL),
(108, 108, 8, NULL, NULL),
(109, 109, 17, NULL, NULL),
(110, 110, 17, NULL, NULL),
(111, 111, 7, NULL, NULL),
(112, 112, 3, NULL, NULL),
(113, 113, 17, NULL, NULL),
(114, 114, 6, NULL, NULL),
(115, 115, 5, NULL, NULL),
(116, 116, 1, NULL, NULL),
(117, 117, 10, NULL, NULL),
(118, 118, 20, NULL, NULL),
(119, 119, 8, NULL, NULL),
(120, 120, 11, NULL, NULL),
(121, 121, 9, NULL, NULL),
(122, 122, 12, NULL, NULL),
(123, 123, 7, NULL, NULL),
(124, 124, 16, NULL, NULL),
(125, 125, 3, NULL, NULL),
(126, 126, 15, NULL, NULL),
(127, 127, 13, NULL, NULL),
(128, 128, 13, NULL, NULL),
(129, 129, 5, NULL, NULL),
(130, 130, 6, NULL, NULL),
(131, 131, 13, NULL, NULL),
(132, 132, 14, NULL, NULL),
(133, 133, 18, NULL, NULL),
(134, 134, 15, NULL, NULL),
(135, 135, 1, NULL, NULL),
(136, 136, 14, NULL, NULL),
(137, 137, 20, NULL, NULL),
(138, 138, 18, NULL, NULL),
(139, 139, 7, NULL, NULL),
(140, 140, 3, NULL, NULL),
(141, 141, 4, NULL, NULL),
(142, 142, 1, NULL, NULL),
(143, 143, 3, NULL, NULL),
(144, 144, 5, NULL, NULL),
(145, 145, 20, NULL, NULL),
(146, 146, 9, NULL, NULL),
(147, 147, 11, NULL, NULL),
(148, 148, 9, NULL, NULL),
(149, 149, 12, NULL, NULL),
(150, 150, 20, NULL, NULL),
(151, 151, 10, NULL, NULL),
(152, 152, 6, NULL, NULL),
(153, 153, 9, NULL, NULL),
(154, 154, 11, NULL, NULL),
(155, 155, 16, NULL, NULL),
(156, 156, 4, NULL, NULL),
(157, 157, 13, NULL, NULL),
(158, 158, 13, NULL, NULL),
(159, 159, 2, NULL, NULL),
(160, 160, 19, NULL, NULL),
(161, 161, 8, NULL, NULL),
(162, 162, 9, NULL, NULL),
(163, 163, 1, NULL, NULL),
(164, 164, 14, NULL, NULL),
(165, 165, 7, NULL, NULL),
(166, 166, 6, NULL, NULL),
(167, 167, 11, NULL, NULL),
(168, 168, 4, NULL, NULL),
(169, 169, 12, NULL, NULL),
(170, 170, 9, NULL, NULL),
(171, 171, 2, NULL, NULL),
(172, 172, 4, NULL, NULL),
(173, 173, 3, NULL, NULL),
(174, 174, 1, NULL, NULL),
(175, 175, 6, NULL, NULL),
(176, 176, 16, NULL, NULL),
(177, 177, 5, NULL, NULL),
(178, 178, 14, NULL, NULL),
(179, 179, 10, NULL, NULL),
(180, 180, 14, NULL, NULL),
(181, 181, 8, NULL, NULL),
(182, 182, 8, NULL, NULL),
(183, 183, 6, NULL, NULL),
(184, 184, 6, NULL, NULL),
(185, 185, 15, NULL, NULL),
(186, 186, 14, NULL, NULL),
(187, 187, 4, NULL, NULL),
(188, 188, 7, NULL, NULL),
(189, 189, 16, NULL, NULL),
(190, 190, 5, NULL, NULL),
(191, 191, 15, NULL, NULL),
(193, 193, 16, NULL, NULL),
(194, 194, 20, NULL, NULL),
(195, 195, 13, NULL, NULL),
(196, 196, 17, NULL, NULL),
(197, 197, 19, NULL, NULL),
(198, 198, 8, NULL, NULL),
(199, 199, 5, NULL, NULL),
(200, 200, 6, NULL, NULL),
(202, 202, 22, NULL, NULL),
(203, 203, 23, NULL, NULL),
(204, 204, 24, NULL, NULL),
(205, 205, 25, NULL, NULL),
(206, 206, 26, NULL, NULL),
(207, 207, 27, NULL, NULL),
(208, 208, 28, NULL, NULL),
(209, 213, 29, NULL, NULL),
(210, 214, 30, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'user', '2024-09-21 22:30:38', '2024-09-21 22:30:38'),
(2, 'admin', '2024-09-21 22:30:38', '2024-09-21 22:30:38'),
(6, 'poster', '2024-10-25 03:50:27', '2024-10-25 03:50:27'),
(7, 'censor', '2024-10-25 03:53:38', '2024-10-25 03:53:38'),
(8, 'reporter', '2024-10-26 26:30:38', '2024-10-26 26:30:38'),
(9, 'employee', '2024-10-26 26:30:38', '2024-10-26 26:30:38');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('PMLt0ukfnHoI5JxPcS1cNMIROYAYQDhzKuZMkCVM', 214, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiYzVZWkVvNW9lN0lpejF4dWkwMjBNeXFLR0VRTDdtMzN5eE5MellMcyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9yb2xlcy9jcmVhdGUiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjM6InVybCI7YTowOnt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MjE0O30=', 1732346973);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `about_first_text` text NOT NULL,
  `about_second_text` text NOT NULL,
  `about_first_image` varchar(255) NOT NULL,
  `about_second_image` varchar(255) NOT NULL,
  `about_our_mission` text NOT NULL,
  `about_our_vision` text NOT NULL,
  `about_services` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `settings`
--

INSERT INTO `settings` (`id`, `about_first_text`, `about_second_text`, `about_first_image`, `about_second_image`, `about_our_mission`, `about_our_vision`, `about_services`, `created_at`, `updated_at`) VALUES
(1, 'Aut sit non ullam inventore. Aut totam quod qui.', 'Saepe ullam aperiam ut unde. Similique qui quaerat aut voluptas. Illum vitae aspernatur quisquam nostrum ad hic et. Inventore quidem aut et quaerat quae culpa. Illo sapiente molestias officiis.', 'setting/about-img-1.jpg', 'setting/about-img-2.jpg', 'Voluptates reiciendis quia esse. Ad mollitia fuga sit rerum quia.', 'Unde officiis accusantium laudantium omnis. Qui autem accusamus qui ratione. Voluptatum sapiente libero eum minima explicabo corrupti possimus.', 'Inventore voluptatem doloribus nostrum at et laudantium et. Quia occaecati cupiditate cum. Iusto ut ut laboriosam est.', '2024-09-21 22:30:42', '2024-09-21 22:30:42');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `plan_name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `starts_at` datetime NOT NULL,
  `ends_at` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `subscriptions`
--

INSERT INTO `subscriptions` (`id`, `user_id`, `plan_name`, `price`, `starts_at`, `ends_at`, `created_at`, `updated_at`) VALUES
(2, 213, 'Premium', 199000.00, '2024-11-22 15:21:04', '2024-12-22 15:21:04', '2024-11-22 08:21:04', '2024-11-22 08:21:04'),
(3, 213, 'Premium', 199000.00, '2024-11-22 15:24:04', '2024-12-22 15:24:04', '2024-11-22 08:24:04', '2024-11-22 08:24:04'),
(4, 213, 'Premium', 199000.00, '2024-11-22 15:27:09', '2024-12-22 15:27:09', '2024-11-22 08:27:09', '2024-11-22 08:27:09'),
(5, 214, 'Premium', 199000.00, '2024-11-23 13:04:18', '2024-12-23 13:04:18', '2024-11-23 06:04:18', '2024-11-23 06:04:18');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tags`
--

INSERT INTO `tags` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'tenetur', '2024-09-21 22:30:40', '2024-09-21 22:30:40'),
(2, 'temporibus', '2024-09-21 22:30:40', '2024-09-21 22:30:40'),
(3, 'ut', '2024-09-21 22:30:40', '2024-09-21 22:30:40'),
(4, 'provident', '2024-09-21 22:30:40', '2024-09-21 22:30:40'),
(5, 'exercitationem', '2024-09-21 22:30:40', '2024-09-21 22:30:40'),
(6, 'dolor', '2024-09-21 22:30:40', '2024-09-21 22:30:40'),
(7, 'omnis', '2024-09-21 22:30:40', '2024-09-21 22:30:40'),
(8, 'dolorum', '2024-09-21 22:30:40', '2024-09-21 22:30:40'),
(9, 'officia', '2024-09-21 22:30:40', '2024-09-21 22:30:40'),
(11, 'doloremque', '2024-09-21 22:30:40', '2024-09-21 22:30:40'),
(12, 'adipisci', '2024-09-21 22:30:40', '2024-09-21 22:30:40'),
(13, 'aperiam', '2024-09-21 22:30:40', '2024-09-21 22:30:40'),
(14, 'molestiae', '2024-09-21 22:30:40', '2024-09-21 22:30:40'),
(15, 'tempore', '2024-09-21 22:30:40', '2024-09-21 22:30:40'),
(16, 'dolor', '2024-09-21 22:30:40', '2024-09-21 22:30:40'),
(17, 'odit', '2024-09-21 22:30:40', '2024-09-21 22:30:40'),
(18, 'et', '2024-09-21 22:30:40', '2024-09-21 22:30:40'),
(20, 'cum', '2024-09-21 22:30:40', '2024-09-21 22:30:40'),
(22, 'a', '2024-09-24 23:40:54', '2024-09-24 23:40:54'),
(23, 'biden', '2024-09-25 00:05:10', '2024-09-25 00:05:10'),
(24, 'Trần Đăng Khoa', '2024-10-03 07:09:03', '2024-10-03 07:09:03'),
(25, 'Sở Giáo dục Hà Nội', '2024-10-03 07:18:18', '2024-10-03 07:18:18'),
(26, 'dsda', '2024-10-15 01:04:24', '2024-10-15 01:04:24'),
(27, 'ewqe', '2024-10-15 01:13:11', '2024-10-15 01:13:11'),
(28, 'đá', '2024-10-15 01:21:29', '2024-10-15 01:21:29'),
(29, 'ss', '2024-10-15 01:24:21', '2024-10-15 01:24:21'),
(30, 'dsads', '2024-10-15 01:35:23', '2024-10-15 01:35:23'),
(31, 'dsdsa', '2024-10-15 01:39:00', '2024-10-15 01:39:00'),
(32, '', '2024-10-26 03:42:35', '2024-10-26 03:42:35');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `is_premium` tinyint(1) NOT NULL DEFAULT 0,
  `premium_expires_at` timestamp NULL DEFAULT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `status`, `is_premium`, `premium_expires_at`, `role_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'dddd', 'feil.clarissa@example.com', '2024-09-21 22:30:38', '$2a$12$XYzO5K8XkA.kEU5NZOiJ..gZV0qeBdDzBSnh2Ka11Bu3nq/9f.eKy', 1, 0, NULL, 2, 'Z7Hr3BpayW', '2024-09-21 22:30:38', '2024-09-25 00:03:40'),
(2, 'Mrs. Melody Ullrich I', 'milford.monahan@example.org', '2024-09-21 22:30:38', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'DZvWBKgTwa', '2024-09-21 22:30:38', '2024-09-21 22:30:38'),
(3, 'Lilian Walsh', 'amara.emard@example.org', '2024-09-21 22:30:38', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'xjabjqemvN', '2024-09-21 22:30:38', '2024-09-21 22:30:38'),
(4, 'Maxine Koch', 'jorge.goodwin@example.com', '2024-09-21 22:30:38', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'Q2L7eMkZYl', '2024-09-21 22:30:38', '2024-09-21 22:30:38'),
(5, 'Madisyn Heller', 'garrison45@example.net', '2024-09-21 22:30:38', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'iXrvqJ0H1F', '2024-09-21 22:30:38', '2024-09-21 22:30:38'),
(6, 'Prof. Melvin Durgan', 'aurelia.bradtke@example.com', '2024-09-21 22:30:38', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'gX8P092vPv', '2024-09-21 22:30:38', '2024-09-21 22:30:38'),
(7, 'Graham Greenholt', 'dwillms@example.com', '2024-09-21 22:30:38', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'kK5OcgGKG9', '2024-09-21 22:30:38', '2024-09-21 22:30:38'),
(8, 'Nina Bashirian IV', 'wmosciski@example.org', '2024-09-21 22:30:38', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'nOoAltO9ae', '2024-09-21 22:30:38', '2024-09-21 22:30:38'),
(9, 'Leonel Ondricka', 'wschaden@example.net', '2024-09-21 22:30:38', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, '9kMMm7VY3O', '2024-09-21 22:30:38', '2024-09-21 22:30:38'),
(10, 'Raymundo Keebler', 'tyrel.vandervort@example.com', '2024-09-21 22:30:38', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'AbTcKYRf1Y', '2024-09-21 22:30:38', '2024-09-21 22:30:38'),
(11, 'Hồ Anh Tuấn', 'anhtuana2k422001@gmail.com', '2024-09-21 22:30:38', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 2, '4tGBMkSSIK', '2024-09-21 22:30:38', '2024-09-21 22:30:38'),
(12, 'Nguyễn Hải Dương', 'nguyenhaiduong@gmail.com', '2024-09-21 22:30:38', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 2, 'FDrLw1rwu4', '2024-09-21 22:30:38', '2024-09-21 22:30:38'),
(13, 'Võ Anh Quân', 'voanhquan@gmail.com', '2024-09-21 22:30:38', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 2, 'Oj8IkbFU2g', '2024-09-21 22:30:38', '2024-09-21 22:30:38'),
(14, 'Kasandra Ritchie', 'jaren.orn@example.org', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'cBUW4eNPTs', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(15, 'Gillian Durgan', 'dibbert.kayli@example.org', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, '6N3NKmx93c', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(16, 'Mrs. Alexandra Steuber', 'jledner@example.org', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'E3n0nSxNQV', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(17, 'Shanny Fisher', 'shyanne07@example.com', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'KpJy2XpczH', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(18, 'Augustus Witting', 'hschimmel@example.com', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'ebQvEYPsfv', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(19, 'Keegan Kulas', 'khomenick@example.net', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'YlFoaQWsBr', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(20, 'Morton Eichmann', 'vhand@example.com', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'pW1ZhIxDYB', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(21, 'Natalia Will', 'virgil56@example.com', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'WxJ1xJCZ3s', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(22, 'Dr. Rafael Jerde Sr.', 'vschulist@example.com', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'vlMOqObO70', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(23, 'Dexter Lesch', 'jakubowski.nannie@example.net', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'ERABjh2nng', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(24, 'Eulalia Anderson', 'libbie37@example.com', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'gli1Wo8xl9', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(25, 'Mrs. Alayna Nolan', 'dudley67@example.net', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'ZocpgHvS94', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(26, 'Devon Fritsch', 'olson.werner@example.com', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, '1vD07k1cTX', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(27, 'Cara Crist', 'lemke.dulce@example.net', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'yKEjOKxfau', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(28, 'Dr. Asha Hirthe', 'olson.paris@example.org', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'MYhrvKoqSG', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(29, 'Dr. Lesley Kohler', 'lionel62@example.net', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'Taqf9G4uzF', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(30, 'Stone Fritsch', 'imann@example.org', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'qhEjZkERxd', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(31, 'Kraig Haley', 'kuphal.emmanuel@example.net', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'W8U15ccTLY', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(32, 'Jed Blick', 'lacy42@example.org', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'hkH8RXlIei', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(33, 'Maximillia Cole', 'sjohns@example.net', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'jBxz4M3swC', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(34, 'Johnathon Shanahan', 'aletha.hackett@example.com', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, '042sVziG9L', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(35, 'Jacques Gleichner', 'raina.daniel@example.net', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'ulSkhESFst', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(36, 'Myra Fadel', 'reynolds.chester@example.org', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'L9QIVymGzY', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(37, 'Estell Howell', 'kacey61@example.net', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'nIhwfrvIf7', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(38, 'Mariana McKenzie', 'shawna.ward@example.org', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, '3BXaeu3iCd', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(39, 'Nathanael Johnston', 'diana27@example.net', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'j78yb19QJG', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(40, 'Marco O\'Conner DVM', 'marietta.spencer@example.org', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'uOzCzB8Wvn', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(41, 'Lee Cruickshank', 'hoeger.daphney@example.net', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'F13tU0uhsh', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(42, 'Darrel Deckow', 'russ.bogisich@example.net', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'F7kRJNqEbD', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(43, 'Prof. Andrew Bauch', 'heathcote.tremayne@example.net', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'r3G1fi48SU', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(44, 'Waylon Mitchell DDS', 'alek06@example.com', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'UPVlgZWr4F', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(45, 'Karina Lindgren', 'kayli.abernathy@example.com', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, '2mTkBOaBdB', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(46, 'Agustin Hills Sr.', 'deborah.stroman@example.com', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'GWtrRElSpq', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(47, 'Prof. Greg Bergstrom Jr.', 'blaze.howell@example.com', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, '31N1ADcp5F', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(48, 'Dominique West', 'uschimmel@example.net', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'OzQ12TV6RL', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(49, 'Imani Halvorson', 'odell.von@example.net', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'ds1A500urf', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(50, 'Lexi Fisher Jr.', 'enid58@example.com', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'e6w8knDwQT', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(51, 'Phoebe Schuster Sr.', 'ryan.georgianna@example.com', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'ML7UspzuWv', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(52, 'Clement Wiza', 'wturner@example.org', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'AjrhyBKIDR', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(53, 'Miss Raegan Mills', 'katherine.hackett@example.com', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'MJ7U0kDyCz', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(54, 'Jarret Corkery', 'rohan.rafaela@example.com', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'KcUMA7UNG5', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(55, 'Kacey Pfeffer', 'fmertz@example.net', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'uyzPSD9eHk', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(56, 'Emiliano Moen', 'ollie.lubowitz@example.org', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'QM8JWWGXQh', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(57, 'Mr. Alfonso Lynch', 'meredith73@example.org', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'nZ69bWenSJ', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(58, 'Dr. Mylene Heller', 'theresa.waters@example.org', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'qi7gycOFHD', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(59, 'Modesta Gerlach PhD', 'aryanna23@example.org', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'prUh4TtJh5', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(60, 'Larry Jacobson Jr.', 'kathleen72@example.com', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'LIIHgkSgJs', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(61, 'Alfonzo Reilly', 'ed.larkin@example.org', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'wNPReuyrjJ', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(62, 'Mrs. Carley Satterfield V', 'madelynn.nicolas@example.org', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'CUP45fPdBh', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(63, 'Tomasa Bartell', 'ethel14@example.net', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, '3n6hQ7HcxW', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(64, 'Myles Kohler', 'rosenbaum.jayne@example.org', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'RvjLKNof3B', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(65, 'Natasha Marvin', 'hamill.damian@example.net', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'cavWc7P9XM', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(66, 'Eugenia Feil', 'rcartwright@example.org', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'mZ6t3sVHFn', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(67, 'Eloy Gislason', 'opollich@example.com', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'L0ae6SfPKT', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(68, 'Thomas Raynor', 'terrence.schiller@example.com', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'HQ90iCr7Yi', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(69, 'Tiffany Williamson V', 'rebekah12@example.net', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'C0Syit9mYr', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(70, 'Brandt Schamberger Jr.', 'clarkin@example.com', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'odzFI5CaGt', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(71, 'Dr. Jerry Ritchie', 'grimes.maybell@example.com', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'dSYXYjHMxI', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(72, 'Marcelino Bins', 'rosalinda87@example.org', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'QeCJAQTRyP', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(73, 'Prof. Meghan Prohaska Jr.', 'kamryn.block@example.org', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'aJbLGUVU2r', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(74, 'Melisa Waelchi', 'amarquardt@example.com', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'DW4stpbq5i', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(75, 'Simone Rice', 'gerhold.alta@example.com', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'hwK7ZbJB8d', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(76, 'Kailyn Sauer', 'zaria19@example.com', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'sBmKSFW6Qm', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(77, 'Arnoldo Buckridge', 'clementine.kunze@example.com', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'bX2Mnqbi9F', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(78, 'Nickolas Gerlach', 'bailee.daugherty@example.org', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'AqrHIkQSWI', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(79, 'Zander Nitzsche', 'abshire.conner@example.net', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'SK0ZX3IJJa', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(80, 'Prudence Gerlach', 'dibbert.william@example.org', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'IFM6xchbFI', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(81, 'Roselyn Von', 'leanne.stroman@example.net', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, '7jPzqLGJPj', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(82, 'Vern Botsford', 'fheidenreich@example.org', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'VQcxGlneuX', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(83, 'Mr. Reynold Cartwright', 'shana76@example.net', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, '7THbgwG94i', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(84, 'Adah Lindgren', 'lorenza.gibson@example.net', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'GMSVE3ibSs', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(85, 'Georgette Greenholt', 'hammes.alfredo@example.org', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'PxKB6MrTo4', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(86, 'Kelley Kshlerin', 'zachary37@example.org', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'fX4A7sXHHc', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(87, 'Dr. Darron Yost III', 'dcummerata@example.com', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'K2d3qytOhp', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(88, 'Domenico Jacobi', 'marques.gottlieb@example.com', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'sEdCnqh3f7', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(89, 'Katelynn Ullrich', 'rfahey@example.org', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, '0eL4Icvpsf', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(90, 'Sierra Brakus DVM', 'coty.beahan@example.org', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'EZrDS2IUWY', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(91, 'Jeromy Greenfelder', 'roxane75@example.net', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'YnY4eYxe7F', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(92, 'Zackery Anderson', 'reichel.cale@example.net', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'm3x1NUtZ0x', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(93, 'Grace Grant', 'ellen37@example.org', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'ydrIpDEhhQ', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(94, 'Prof. Zoe Beer', 'qmonahan@example.net', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, '4cfmzjfWyr', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(95, 'Asa Fisher', 'lhaley@example.net', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'azD4Wr4Slk', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(96, 'Cristobal Murray', 'fadel.june@example.com', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, '3ewLwpvaOB', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(97, 'Sarina Lockman', 'aidan.skiles@example.org', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'EyY0eEe2ik', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(98, 'Prof. Abbigail Ortiz', 'kdach@example.org', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'a2Zdel1Ema', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(99, 'Winona Powlowski', 'cortez33@example.net', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, '6tQN0kGU5B', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(100, 'Genevieve O\'Connell', 'armand63@example.com', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'HaFrbe27xB', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(101, 'Miss Miracle Rempel III', 'considine.alexa@example.net', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'UucbYokiWQ', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(102, 'Wyatt Schowalter DDS', 'weldon27@example.com', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'LRyfcBU4Un', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(103, 'Dr. Junior Hintz', 'xlemke@example.net', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, '8DTzMAp5Rr', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(104, 'Mrs. Ashleigh Padberg', 'aliya25@example.com', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, '5Bn90NzJup', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(105, 'Nadia Reichert', 'deondre.stoltenberg@example.org', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'mSPVIZUpIz', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(106, 'June Kuhlman Jr.', 'alphonso.walker@example.org', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'pJHjFHkPgk', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(107, 'Prof. Kamryn Kunde', 'marcella.feest@example.com', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'zy4dywWdBD', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(108, 'Timmy Boehm', 'bvonrueden@example.org', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'o1iMZCD5o0', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(109, 'Katelynn Schoen', 'armstrong.laverne@example.com', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'lHeA8y4oGN', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(110, 'Arnulfo Murray III', 'ryleigh00@example.com', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'iapMhhCVwK', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(111, 'Dayna Schamberger', 'christian.graham@example.org', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, '3XBtG1Do82', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(112, 'Agnes Kilback', 'cassandre.schuppe@example.com', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'fJSQk6FjGh', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(113, 'Miss Susan Kiehn', 'oda.feeney@example.net', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'loziL9Q1nV', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(114, 'Dr. Santina Shields DVM', 'cierra85@example.org', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'TxIOGWaabp', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(115, 'Halie Predovic', 'reed17@example.net', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'yTYSDF4GEk', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(116, 'Prof. Leland Upton', 'glueilwitz@example.net', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, '9crPFhagvH', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(117, 'Mr. Murl Sawayn', 'uwilkinson@example.net', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'ZFGy2CwUYJ', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(118, 'Theodore Tillman', 'mayert.henderson@example.net', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'WoQxTCpyNa', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(119, 'Rita Spinka', 'rocio.stoltenberg@example.net', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'pXYfH1YarA', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(120, 'Arnold Ullrich', 'domingo.rath@example.com', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'T09LpLJPAh', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(121, 'Miss Phyllis Trantow', 'sbartoletti@example.net', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'hwVlUjht8i', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(122, 'Wilhelm Baumbach IV', 'rodriguez.travis@example.net', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'NS1bLgESju', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(123, 'Newell Flatley', 'haag.micheal@example.com', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'pfDZfavSYe', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(124, 'Madelynn Emard', 'rollin.breitenberg@example.com', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'OBC4CGlNKX', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(125, 'Duncan Walsh II', 'gusikowski.wyatt@example.com', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'MITdl4oRQs', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(126, 'Rachel Funk', 'nbreitenberg@example.net', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, '1uze4vtI4D', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(127, 'Oceane Boehm DVM', 'sauer.icie@example.org', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'c1zttU2frV', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(128, 'Ryley Mitchell', 'mhamill@example.com', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'xWM0Gyjrqx', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(129, 'Mr. Watson Jaskolski', 'fwolff@example.com', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, '49Vc07lUac', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(130, 'Isaiah Anderson', 'hertha.connelly@example.com', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'sd2jaQtBI8', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(131, 'Dorothy Beier', 'lynch.gerald@example.com', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'YjCB72irE2', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(132, 'Luisa Kassulke', 'xzavier.murazik@example.org', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'pLAbS7YHW7', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(133, 'Dr. Hilario Howell PhD', 'brennan.osinski@example.net', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'cYbQuucwQv', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(134, 'Chesley Heller', 'harrison66@example.net', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 't3cOogN2wP', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(135, 'Dominic Wiza', 'kemmerich@example.com', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'MVZKIr8ccE', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(136, 'Major Farrell', 'kjenkins@example.com', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'Tc4qXkPQLe', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(137, 'Abigayle Howe', 'isidro.schinner@example.net', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'qhuMKT64PC', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(138, 'Clemmie Watsica Jr.', 'kris.marcia@example.net', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, '6C2Pi8NdAj', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(139, 'Ernestina Hills', 'hilma26@example.com', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'Y5ZUTzkg9B', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(140, 'Orval Bergstrom PhD', 'corkery.ambrose@example.com', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'XgJaBKNjoZ', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(141, 'Claire Willms II', 'jamar99@example.net', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'BU2l8s0RwV', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(142, 'Mr. Ryder Kuvalis III', 'angelica88@example.net', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'WBp008inkX', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(143, 'Eldora Zemlak', 'fkuhic@example.net', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'xNHEQJFNNa', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(144, 'Eulalia Swift', 'justine.haley@example.com', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'PR93Kemdhl', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(145, 'Ilene Rau', 'deonte.von@example.org', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'NtqWuPQpzv', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(146, 'Prof. Edwardo Gleichner', 'hettinger.caterina@example.org', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, '4m3bkdJhHb', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(147, 'Prof. Gianni Weimann', 'chris85@example.com', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'IhgrW0HwfL', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(148, 'Ms. Estel Renner', 'gottlieb.annamae@example.com', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'WJOqZxF8N8', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(149, 'Donavon Yundt III', 'estefania.shields@example.org', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'AK0QKuVUNS', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(150, 'Prof. Shemar Hirthe', 'xgoldner@example.org', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'vHo0wZ4BrX', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(151, 'Dr. Jesse Hills', 'lockman.everardo@example.net', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'lMxWkjqmED', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(152, 'Clementine Mertz', 'aufderhar.bridgette@example.net', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, '5LuMblpTGA', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(153, 'Genesis Kessler', 'sim13@example.org', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'gmVeGeKAU2', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(154, 'Lavada Gerlach', 'torphy.kailee@example.net', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'kKhdsIsMbP', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(155, 'Beryl Orn', 'stella.bergnaum@example.org', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'NVd9sP8yuq', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(156, 'Hayley Kiehn', 'predovic.dallas@example.org', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'kD3Xyszd9h', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(157, 'Prof. Lenny Hudson', 'fritsch.nicolas@example.org', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'je9BOziZVZ', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(158, 'Carmel Dibbert', 'aborer@example.net', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'GQ2iSjSoCd', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(159, 'Cortney Deckow', 'kiel.bashirian@example.com', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'i1dqknkB3o', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(160, 'Dr. Carlos Thompson Jr.', 'owilderman@example.org', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'UY3gvW2XTP', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(161, 'Assunta Weimann', 'ucrooks@example.com', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'podH67WSJV', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(162, 'Brendan Schulist', 'schoen.bulah@example.org', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'V2UxFZBz7E', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(163, 'Prof. Penelope Gerhold', 'london.durgan@example.net', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'rqLwCrvU3y', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(164, 'Edward Ullrich', 'vidal09@example.org', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'WvpEGw0dYy', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(165, 'Mr. Mauricio Frami', 'bennett.miller@example.net', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, '5dI4OHXrMm', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(166, 'Blanche Kiehn', 'ucrist@example.net', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, '1AwzLYoQxn', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(167, 'Doris O\'Hara', 'clemmie78@example.com', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'ATrSCLBNDX', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(168, 'Adriel Kuhic', 'arnoldo62@example.com', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'HeEqOn2zb2', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(169, 'Wilfrid Pacocha', 'adeline73@example.com', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'qnIxGyisH3', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(170, 'Gracie Howe', 'fromaguera@example.org', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'CMMj9qimuh', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(171, 'Frederique Trantow V', 'tamia79@example.org', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'k8H4kvGhUR', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(172, 'Christiana Waelchi', 'ernie40@example.org', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, '0orzZz2tHd', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(173, 'Minnie Rowe', 'melisa.heaney@example.com', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, '2y6d34HbXR', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(174, 'Ulices Wunsch', 'hansen.turner@example.net', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'XnPjJmhJZP', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(175, 'Joannie Zulauf PhD', 'beer.joseph@example.net', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'wSqs3GPbev', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(176, 'Leanna Turcotte', 'griffin.west@example.org', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, '2K9u04KuLX', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(177, 'Miss Danyka Witting', 'feeney.rosanna@example.com', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'TVlB1W2F1c', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(178, 'Kellie Heathcote', 'judah05@example.org', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'SfJjxShKV7', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(179, 'Prof. Jessy Cormier II', 'zola13@example.net', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'ikJI5mNgNB', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(180, 'Jake Hegmann', 'xmetz@example.com', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'B9Imv1OJ7K', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(181, 'Herminio Jacobs', 'janiya77@example.org', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'auC7twSfmZ', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(182, 'Jewel Bednar III', 'jaqueline76@example.org', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'W4m54CqRJU', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(183, 'Ms. Destany Collins V', 'syble72@example.net', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'wKEJNNDRGW', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(184, 'Roxanne Batz', 'emetz@example.net', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'AObctpu1C6', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(185, 'Brian Flatley MD', 'kenya.stamm@example.net', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'XCzo4NOox1', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(186, 'Prof. Jaida Skiles IV', 'jacey85@example.net', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'vUCuBEBz6n', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(187, 'Annamae Mante', 'xfranecki@example.com', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'm7csTc5yUL', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(188, 'Mrs. Lora Krajcik', 'damon.huels@example.org', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'awYPJYbNdo', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(189, 'Prof. Cristal Larson', 'zheller@example.org', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'bIKHE2XcFS', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(190, 'Dawn Kirlin', 'sophie.conn@example.org', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'GTaLoWmLTn', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(191, 'Elna Kshlerin', 'onitzsche@example.net', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'kfU9QTq3it', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(192, 'Samir Gislason', 'tsenger@example.com', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'sm3GXaHJoP', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(193, 'Brandon Morissette', 'klocko.reta@example.org', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'S1xKIpd09k', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(194, 'Murphy King', 'xgislason@example.com', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'fKI6lzFygM', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(195, 'Oral Ruecker', 'waters.gabrielle@example.org', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'fshPfuIYOe', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(196, 'Miss Marcia Romaguera', 'destinee.windler@example.org', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'CHQ6Iwe6xs', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(197, 'Harley Stanton', 'fbednar@example.org', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'yxYKGksWTV', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(198, 'Myriam Altenwerth', 'bgreenholt@example.com', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'EOi37nxxgJ', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(199, 'Mrs. Anna Kuhic', 'ethelyn04@example.net', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'CdcO1bPrki', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(200, 'Jody Parisian IV', 'zulauf.reed@example.net', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'arSdiObptJ', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(201, 'Felipe Cole', 'qsanford@example.org', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, '9kwVppg8Ty', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(202, 'Natalia Pollich', 'douglas.abbott@example.net', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'ooHTDtTKsH', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(203, 'Corine Hessel', 'pagac.sally@example.com', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, '7zyNn7Fa0V', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(204, 'Tony Little', 'lheidenreich@example.com', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'A7YemTejsi', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(205, 'Florencio Bednar', 'crist.elenor@example.net', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'eStBevWXpa', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(206, 'Prof. Shayna Flatley', 'corkery.elfrieda@example.net', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, '6ceMXDQLYz', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(207, 'Mrs. Kali Cole', 'ohara.javier@example.com', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'T72I1Gopfl', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(208, 'Mr. Darron Rogahn Jr.', 'fgutmann@example.com', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'M17Q2lH7Dj', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(209, 'Norris Kemmer MD', 'cody.bartoletti@example.com', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'BDbgAJUXs7', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(210, 'Colin Johns', 'werdman@example.com', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'FuHTBeNdWV', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(211, 'Royce Maggio', 'glen94@example.com', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'XX3IMKDbdl', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(212, 'Prof. Maya Moen DDS', 'lillie41@example.org', '2024-09-21 22:30:39', '$2y$10$sc8vjkSQi1f.emITGxriiuvC6oaijjxNouLP/4g.QYvagRwh4NW2y', 1, 0, NULL, 1, 'y05qDy2kxH', '2024-09-21 22:30:39', '2024-09-21 22:30:39'),
(213, 'Devon Schuster', 'friesen.audreanne@example.com', '2024-09-21 22:30:39', '$2y$12$4hmNbL.uFkaIodVEUtWc6eNvOx/4RUwu5l3IcypBFjGvUZAb1CF.O', 1, 0, NULL, 1, 'UnKy6GMZZXL1XbEYBnMpQoVccREPAK4JAjGt2dmltO56Z4sAAwzEgrxvtj0L', '2024-09-21 22:30:39', '2024-11-22 15:34:23'),
(214, 'nguyen Dam', 'damthanh.etd@gmail.com', '2024-11-08 08:13:11', '$2y$12$4hmNbL.uFkaIodVEUtWc6eNvOx/4RUwu5l3IcypBFjGvUZAb1CF.O', 1, 0, NULL, 2, 'nUmiBhKTSgRc9VpYlVRcSNUofN6mX8laCiduDAm92J0JcaHhKInRlqn4za2m', '2024-09-21 23:03:54', '2024-11-23 07:04:36');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Chỉ mục cho bảng `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customers_email_unique` (`email`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_slug_unique` (`slug`);

--
-- Chỉ mục cho bảng `post_tag`
--
ALTER TABLE `post_tag`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_tag_post_id_foreign` (`post_id`);

--
-- Chỉ mục cho bảng `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Chỉ mục cho bảng `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Chỉ mục cho bảng `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT cho bảng `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `images`
--
ALTER TABLE `images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=480;

--
-- AUTO_INCREMENT cho bảng `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT cho bảng `permission_role`
--
ALTER TABLE `permission_role`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=221;

--
-- AUTO_INCREMENT cho bảng `post_tag`
--
ALTER TABLE `post_tag`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=213;

--
-- AUTO_INCREMENT cho bảng `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=215;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `post_tag`
--
ALTER TABLE `post_tag`
  ADD CONSTRAINT `post_tag_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD CONSTRAINT `subscriptions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
