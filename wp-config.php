<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе
 * установки. Необязательно использовать веб-интерфейс, можно
 * скопировать файл в "wp-config.php" и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define( 'DB_NAME', 'wp_velox' );

/** Имя пользователя MySQL */
define( 'DB_USER', 'root' );

/** Пароль к базе данных MySQL */
define( 'DB_PASSWORD', '' );

/** Имя сервера MySQL */
define( 'DB_HOST', 'localhost' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'F/TMR@EBEn|>w,_fZtOX?}:J8RaS&(KFYLFPlH7z1=egs`8wrWcK3P<d4>F#bZ}/' );
define( 'SECURE_AUTH_KEY',  '_^+0Zp7.humT,-*9[%}>36t<?p:&^k6IGcxjvW?=%Ep%Esd0yqRV4I+RMS$]0VuE' );
define( 'LOGGED_IN_KEY',    'lkmeRVg=Z00^ogr-g HUWu;6SB;izoYu8rG1wEgk82qF_9Qdfg*=:ei*l$x<;#>s' );
define( 'NONCE_KEY',        '?GEH,~iim]A@/#-a7gf=]uH$oMSS(S/gA3Q)R.FVjM=rlHe0D:,!d2i`XNMY6:%d' );
define( 'AUTH_SALT',        '9ka#Q7E]%8I6mz|$[95,E04_BI /xdS/1;HE* Q*^1QJZ[Q|y!#q*Q[50zztzDY@' );
define( 'SECURE_AUTH_SALT', '~>io=&Y*HFvWh:!XXvqezvX]-Mg!B(Gr!n1[X+exHRZq:og}[Nv&v{s?!+=/a G{' );
define( 'LOGGED_IN_SALT',   'b~<3SFH-7V<CgnpiD(.uS<R)Va@E8s[9UO?&NMpmsLKhB=/hA.3dC}w%[5$s 4e,' );
define( 'NONCE_SALT',       'w1ito;1>wf/U>7ZTWkFXtng%}ZEBY^M^?Q!:q4}XjhBnp2Z%laOF}r7viO9@kN#E' );

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
 * Информацию о других отладочных константах можно найти в Кодексе.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once( ABSPATH . 'wp-settings.php' );
