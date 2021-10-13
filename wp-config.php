<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе установки.
 * Необязательно использовать веб-интерфейс, можно скопировать файл в "wp-config.php"
 * и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://ru.wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define( 'DB_NAME', 'blog_wordpress' );

/** Имя пользователя MySQL */
define( 'DB_USER', 'root' );

/** Пароль к базе данных MySQL */
define( 'DB_PASSWORD', 'root' );

/** Имя сервера MySQL */
define( 'DB_HOST', 'localhost' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу. Можно сгенерировать их с помощью
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}.
 *
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными.
 * Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'B#i9ZV#d9D6F&M=9+$]~}0fSdsiDA(_n +88Nn~S}v;;8*AEMVWuF6+ O4gcng o' );
define( 'SECURE_AUTH_KEY',  'ZDd3IaZFcUJm[?z7(Pb?0Cj#*02ct{ew(B^WaSsj6sWLIhW!ts+fU 0sG=[ K`c}' );
define( 'LOGGED_IN_KEY',    'mO>a[I4I:2k9U|5Z&Oal<0Rlz+3 >CkrAWyM!<W2>kwEWAx=g, ]W`%3/cUXxBtv' );
define( 'NONCE_KEY',        '>P#*W.6$1^g2pXs6Y R$9F{G$X=p.0|K.)zLzk!RQZxm2,bB#-,L?Mcq99-It;J]' );
define( 'AUTH_SALT',        'h:ZnGADA|q!}6:m|.o/WDCK|s$!QunB8rhroek`0h%b-u@-@+}zCQtpGk 7a];+|' );
define( 'SECURE_AUTH_SALT', 'F[zuyRJWuhm{]k1hRqr3wZ-TBjxNVDWl2!!,M1,#)BRTmHyB*<tK~X#hrWvlA:rc' );
define( 'LOGGED_IN_SALT',   'J42GraIxX}qJx7bCT2SWONdn!?*(}/y|9M]3guU{tZSurGkERghp>>7y*<kG~6f-' );
define( 'NONCE_SALT',       'HMy.jYzue>BwkVevCKe/F3s[!C$:)[Og|ByGOF!7o%Lr AR |d!}Kp;i2%JhD`q|' );

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в документации.
 *
 * @link https://ru.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Произвольные значения добавляйте между этой строкой и надписью "дальше не редактируем". */



/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once ABSPATH . 'wp-settings.php';
