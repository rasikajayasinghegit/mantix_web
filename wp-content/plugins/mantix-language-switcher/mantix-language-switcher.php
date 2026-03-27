<?php
/**
 * Plugin Name: Mantix Language Switcher
 * Description: Adds manual multilingual switching for the Mantix landing theme without machine translation services.
 * Version: 1.0.0
 * Author: Mantix
 *
 * @package MantixLanguageSwitcher
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'MANTIX_LANG_QUERY_VAR', 'mtx_lang' );
define( 'MANTIX_LANG_COOKIE', 'mantix_lang' );

/**
 * Returns site locale without triggering locale filters.
 *
 * @return string
 */
function mantix_lang_get_site_locale_raw() {
	$site_locale = get_option( 'WPLANG' );

	if ( ! is_string( $site_locale ) || '' === trim( $site_locale ) ) {
		return 'en_US';
	}

	return $site_locale;
}
/**
 * Returns supported languages in requested order.
 *
 * @return array<string,array<string,string>>
 */
function mantix_lang_get_languages() {
	return array(
		'us' => array(
			'code'   => 'US',
			'label'  => 'English (US)',
			'locale' => 'en_US',
		),
		'se' => array(
			'code'   => 'SE',
			'label'  => 'Svenska',
			'locale' => 'sv_SE',
		),
		'no' => array(
			'code'   => 'NO',
			'label'  => 'Norsk',
			'locale' => 'nb_NO',
		),
		'dk' => array(
			'code'   => 'DK',
			'label'  => 'Dansk',
			'locale' => 'da_DK',
		),
		'fi' => array(
			'code'   => 'FI',
			'label'  => 'Suomi',
			'locale' => 'fi_FI',
		),
		'de' => array(
			'code'   => 'DE',
			'label'  => 'Deutsch',
			'locale' => 'de_DE',
		),
		'es' => array(
			'code'   => 'ES',
			'label'  => 'Español',
			'locale' => 'es_ES',
		),
		'fr' => array(
			'code'   => 'FR',
			'label'  => 'Français',
			'locale' => 'fr_FR',
		),
		'sa' => array(
			'code'   => 'SA',
			'label'  => 'العربية',
			'locale' => 'ar',
		),
		'br' => array(
			'code'   => 'BR',
			'label'  => 'Português (Brasil)',
			'locale' => 'pt_BR',
		),
		'cn' => array(
			'code'   => 'CN',
			'label'  => 'Simplified Chinese',
			'locale' => 'zh_CN',
		),
		'tw' => array(
			'code'   => 'TW',
			'label'  => 'Traditional Chinese',
			'locale' => 'zh_TW',
		),
		'it' => array(
			'code'   => 'IT',
			'label'  => 'Italian',
			'locale' => 'it_IT',
		),
	);
}

/**
 * Returns active language slug.
 *
 * @return string
 */
function mantix_lang_get_current_slug() {
	static $current_slug = null;

	if ( null !== $current_slug ) {
		return $current_slug;
	}

	$languages = mantix_lang_get_languages();

	if ( isset( $_GET[ MANTIX_LANG_QUERY_VAR ] ) ) {
		$query_slug = sanitize_key( wp_unslash( $_GET[ MANTIX_LANG_QUERY_VAR ] ) );
		if ( isset( $languages[ $query_slug ] ) ) {
			$current_slug = $query_slug;
			return $current_slug;
		}
	}

	if ( isset( $_COOKIE[ MANTIX_LANG_COOKIE ] ) ) {
		$cookie_slug = sanitize_key( wp_unslash( $_COOKIE[ MANTIX_LANG_COOKIE ] ) );
		if ( isset( $languages[ $cookie_slug ] ) ) {
			$current_slug = $cookie_slug;
			return $current_slug;
		}
	}

	$site_locale = mantix_lang_get_site_locale_raw();
	foreach ( $languages as $slug => $language ) {
		if ( $site_locale === $language['locale'] ) {
			$current_slug = $slug;
			return $current_slug;
		}
	}

	$current_slug = 'us';
	return $current_slug;
}

/**
 * Returns selected locale from language switcher.
 *
 * @return string
 */
function mantix_lang_get_current_locale() {
	$languages = mantix_lang_get_languages();
	$slug      = mantix_lang_get_current_slug();

	return isset( $languages[ $slug ]['locale'] ) ? $languages[ $slug ]['locale'] : mantix_lang_get_site_locale_raw();
}

/**
 * Persists selection from query string.
 */
function mantix_lang_handle_selection() {
	if ( is_admin() || wp_doing_ajax() || wp_doing_cron() ) {
		return;
	}

	if ( ! isset( $_GET[ MANTIX_LANG_QUERY_VAR ] ) ) {
		return;
	}

	$languages = mantix_lang_get_languages();
	$slug      = sanitize_key( wp_unslash( $_GET[ MANTIX_LANG_QUERY_VAR ] ) );

	if ( ! isset( $languages[ $slug ] ) ) {
		return;
	}

	$cookie_path   = defined( 'COOKIEPATH' ) && COOKIEPATH ? COOKIEPATH : '/';
	$cookie_domain = defined( 'COOKIE_DOMAIN' ) ? COOKIE_DOMAIN : '';

	setcookie( MANTIX_LANG_COOKIE, $slug, time() + ( 365 * DAY_IN_SECONDS ), $cookie_path, $cookie_domain, is_ssl(), true );
	$_COOKIE[ MANTIX_LANG_COOKIE ] = $slug;

	if ( 'GET' === strtoupper( $_SERVER['REQUEST_METHOD'] ) ) {
		$redirect = remove_query_arg( MANTIX_LANG_QUERY_VAR );
		if ( is_string( $redirect ) && '' !== $redirect ) {
			wp_safe_redirect( $redirect );
			exit;
		}
	}
}
add_action( 'init', 'mantix_lang_handle_selection', 1 );

/**
 * Applies selected locale on frontend.
 *
 * @param string $locale Locale.
 * @return string
 */
function mantix_lang_apply_locale( $locale ) {
	if ( is_admin() ) {
		return $locale;
	}

	return mantix_lang_get_current_locale();
}
add_filter( 'determine_locale', 'mantix_lang_apply_locale', 20 );
add_filter( 'locale', 'mantix_lang_apply_locale', 20 );

/**
 * Returns URL for given language slug.
 *
 * @param string $slug Language slug.
 * @return string
 */
function mantix_lang_get_switch_url( $slug ) {
	$base_url = remove_query_arg( MANTIX_LANG_QUERY_VAR );
	return add_query_arg( MANTIX_LANG_QUERY_VAR, $slug, $base_url );
}

/**
 * Render language switcher.
 *
 * @param array<string,string> $args Render args.
 */
function mantix_language_switcher( $args = array() ) {
	$languages = mantix_lang_get_languages();
	$slug      = mantix_lang_get_current_slug();
	$current   = isset( $languages[ $slug ] ) ? $languages[ $slug ] : $languages['us'];
	$class     = isset( $args['class'] ) ? sanitize_html_class( $args['class'] ) : '';
	?>
	<div class="mantix-language-switcher <?php echo esc_attr( $class ); ?>">
		<details class="mantix-lang-dropdown">
			<summary aria-label="<?php esc_attr_e( 'Choose language', 'mantix' ); ?>">
				<span class="mantix-lang-code"><?php echo esc_html( $current['code'] ); ?></span>
				<span class="mantix-lang-name"><?php echo esc_html( $current['label'] ); ?></span>
			</summary>
			<ul class="mantix-lang-options" role="list">
				<?php foreach ( $languages as $item_slug => $language ) : ?>
					<?php $is_current = ( $item_slug === $slug ); ?>
					<li>
						<a href="<?php echo esc_url( mantix_lang_get_switch_url( $item_slug ) ); ?>"<?php echo $is_current ? ' aria-current="true"' : ''; ?>>
							<span class="mantix-lang-code"><?php echo esc_html( $language['code'] ); ?></span>
							<span class="mantix-lang-name"><?php echo esc_html( $language['label'] ); ?></span>
						</a>
					</li>
				<?php endforeach; ?>
			</ul>
		</details>
	</div>
	<?php
}

/**
 * Shortcode for language switcher.
 *
 * @return string
 */
function mantix_lang_switcher_shortcode() {
	ob_start();
	mantix_language_switcher();
	return (string) ob_get_clean();
}
add_shortcode( 'mantix_language_switcher', 'mantix_lang_switcher_shortcode' );

/**
 * Enqueue language switcher styles.
 */
function mantix_lang_enqueue_styles() {
	$style_file = plugin_dir_path( __FILE__ ) . 'assets/language-switcher.css';
	$version    = file_exists( $style_file ) ? (string) filemtime( $style_file ) : '1.0.0';

	wp_enqueue_style(
		'mantix-language-switcher',
		plugin_dir_url( __FILE__ ) . 'assets/language-switcher.css',
		array(),
		$version
	);
}
add_action( 'wp_enqueue_scripts', 'mantix_lang_enqueue_styles' );

/**
 * Returns UI string map per locale.
 *
 * @param string $locale Locale.
 * @return array<string,string>
 */
function mantix_lang_get_string_map( $locale ) {
	$maps = array(
		'sv_SE' => array(
			'Home'             => 'Hem',
			'Features'         => 'Funktioner',
			'Solutions'        => 'Lösningar',
			'Pricing'          => 'Priser',
			'Testimonials'     => 'Omdömen',
			'FAQ'              => 'Vanliga frågor',
			'Contact'          => 'Kontakt',
			'Quick Links'      => 'Snabblänkar',
			'Legal'            => 'Juridik',
			'Privacy Policy'   => 'Integritetspolicy',
			'Terms of Service' => 'Användarvillkor',
			'Cookie Policy'    => 'Cookiepolicy',
			'Social'           => 'Sociala medier',
			'Name'             => 'Namn',
			'Company'          => 'Företag',
			'Email'            => 'E-post',
			'Phone'            => 'Telefon',
			'Request Type'     => 'Förfrågningstyp',
			'Message'          => 'Meddelande',
			'Submit Request'   => 'Skicka förfrågan',
			'Most Popular'     => 'Mest populär',
			'Get Started'      => 'Kom igång',
			'Use Cases'        => 'Användningsfall',
			'Customer Stories' => 'Kundberättelser',
			'Platform Features' => 'Plattformsfunktioner',
		),
		'nb_NO' => array(
			'Home'             => 'Hjem',
			'Features'         => 'Funksjoner',
			'Solutions'        => 'Løsninger',
			'Pricing'          => 'Priser',
			'Testimonials'     => 'Uttalelser',
			'FAQ'              => 'Vanlige spørsmål',
			'Contact'          => 'Kontakt',
			'Quick Links'      => 'Hurtiglenker',
			'Legal'            => 'Juridisk',
			'Privacy Policy'   => 'Personvern',
			'Terms of Service' => 'Bruksvilkår',
			'Cookie Policy'    => 'Cookiepolicy',
			'Social'           => 'Sosiale medier',
			'Name'             => 'Navn',
			'Company'          => 'Selskap',
			'Email'            => 'E-post',
			'Phone'            => 'Telefon',
			'Request Type'     => 'Forespørselstype',
			'Message'          => 'Melding',
			'Submit Request'   => 'Send forespørsel',
			'Most Popular'     => 'Mest populær',
			'Get Started'      => 'Kom i gang',
			'Use Cases'        => 'Bruksområder',
			'Customer Stories' => 'Kundehistorier',
			'Platform Features' => 'Plattformfunksjoner',
		),
		'da_DK' => array(
			'Home'             => 'Hjem',
			'Features'         => 'Funktioner',
			'Solutions'        => 'Løsninger',
			'Pricing'          => 'Priser',
			'Testimonials'     => 'Anmeldelser',
			'FAQ'              => 'Ofte stillede spørgsmål',
			'Contact'          => 'Kontakt',
			'Quick Links'      => 'Hurtige links',
			'Legal'            => 'Juridisk',
			'Privacy Policy'   => 'Privatlivspolitik',
			'Terms of Service' => 'Servicevilkår',
			'Cookie Policy'    => 'Cookiepolitik',
			'Social'           => 'Sociale medier',
			'Name'             => 'Navn',
			'Company'          => 'Virksomhed',
			'Email'            => 'E-mail',
			'Phone'            => 'Telefon',
			'Request Type'     => 'Forespørgselstype',
			'Message'          => 'Besked',
			'Submit Request'   => 'Send forespørgsel',
			'Most Popular'     => 'Mest populær',
			'Get Started'      => 'Kom i gang',
			'Use Cases'        => 'Anvendelsesområder',
			'Customer Stories' => 'Kundehistorier',
			'Platform Features' => 'Platformsfunktioner',
		),
		'fi_FI' => array(
			'Home'             => 'Koti',
			'Features'         => 'Ominaisuudet',
			'Solutions'        => 'Ratkaisut',
			'Pricing'          => 'Hinnoittelu',
			'Testimonials'     => 'Asiakaspalautteet',
			'FAQ'              => 'Usein kysytyt kysymykset',
			'Contact'          => 'Yhteystiedot',
			'Quick Links'      => 'Pikalinkit',
			'Legal'            => 'Lakiasiat',
			'Privacy Policy'   => 'Tietosuojakäytäntö',
			'Terms of Service' => 'Käyttöehdot',
			'Cookie Policy'    => 'Evästekäytäntö',
			'Social'           => 'Sosiaalinen media',
			'Name'             => 'Nimi',
			'Company'          => 'Yritys',
			'Email'            => 'Sähköposti',
			'Phone'            => 'Puhelin',
			'Request Type'     => 'Pyynnön tyyppi',
			'Message'          => 'Viesti',
			'Submit Request'   => 'Lähetä pyyntö',
			'Most Popular'     => 'Suosituin',
			'Get Started'      => 'Aloita',
			'Use Cases'        => 'Käyttötapaukset',
			'Customer Stories' => 'Asiakastarinat',
			'Platform Features' => 'Alustan ominaisuudet',
		),
		'de_DE' => array(
			'Home'             => 'Startseite',
			'Features'         => 'Funktionen',
			'Solutions'        => 'Lösungen',
			'Pricing'          => 'Preise',
			'Testimonials'     => 'Kundenstimmen',
			'FAQ'              => 'FAQ',
			'Contact'          => 'Kontakt',
			'Quick Links'      => 'Schnelllinks',
			'Legal'            => 'Rechtliches',
			'Privacy Policy'   => 'Datenschutzerklärung',
			'Terms of Service' => 'Nutzungsbedingungen',
			'Cookie Policy'    => 'Cookie-Richtlinie',
			'Social'           => 'Social Media',
			'Name'             => 'Name',
			'Company'          => 'Unternehmen',
			'Email'            => 'E-Mail',
			'Phone'            => 'Telefon',
			'Request Type'     => 'Anfragetyp',
			'Message'          => 'Nachricht',
			'Submit Request'   => 'Anfrage senden',
			'Most Popular'     => 'Am beliebtesten',
			'Get Started'      => 'Loslegen',
			'Use Cases'        => 'Anwendungsfälle',
			'Customer Stories' => 'Kundengeschichten',
			'Platform Features' => 'Plattformfunktionen',
		),
		'es_ES' => array(
			'Home'             => 'Inicio',
			'Features'         => 'Funciones',
			'Solutions'        => 'Soluciones',
			'Pricing'          => 'Precios',
			'Testimonials'     => 'Testimonios',
			'FAQ'              => 'Preguntas frecuentes',
			'Contact'          => 'Contacto',
			'Quick Links'      => 'Enlaces rápidos',
			'Legal'            => 'Legal',
			'Privacy Policy'   => 'Política de privacidad',
			'Terms of Service' => 'Términos del servicio',
			'Cookie Policy'    => 'Política de cookies',
			'Social'           => 'Redes sociales',
			'Name'             => 'Nombre',
			'Company'          => 'Empresa',
			'Email'            => 'Correo electrónico',
			'Phone'            => 'Teléfono',
			'Request Type'     => 'Tipo de solicitud',
			'Message'          => 'Mensaje',
			'Submit Request'   => 'Enviar solicitud',
			'Most Popular'     => 'Más popular',
			'Get Started'      => 'Comenzar',
			'Use Cases'        => 'Casos de uso',
			'Customer Stories' => 'Historias de clientes',
			'Platform Features' => 'Funciones de la plataforma',
		),
		'fr_FR' => array(
			'Home'             => 'Accueil',
			'Features'         => 'Fonctionnalités',
			'Solutions'        => 'Solutions',
			'Pricing'          => 'Tarifs',
			'Testimonials'     => 'Témoignages',
			'FAQ'              => 'FAQ',
			'Contact'          => 'Contact',
			'Quick Links'      => 'Liens rapides',
			'Legal'            => 'Mentions légales',
			'Privacy Policy'   => 'Politique de confidentialité',
			'Terms of Service' => 'Conditions d’utilisation',
			'Cookie Policy'    => 'Politique des cookies',
			'Social'           => 'Réseaux sociaux',
			'Name'             => 'Nom',
			'Company'          => 'Entreprise',
			'Email'            => 'E-mail',
			'Phone'            => 'Téléphone',
			'Request Type'     => 'Type de demande',
			'Message'          => 'Message',
			'Submit Request'   => 'Envoyer la demande',
			'Most Popular'     => 'Le plus populaire',
			'Get Started'      => 'Commencer',
			'Use Cases'        => 'Cas d’usage',
			'Customer Stories' => 'Témoignages clients',
			'Platform Features' => 'Fonctionnalités de la plateforme',
		),
		'ar'    => array(
			'Home'             => 'الرئيسية',
			'Features'         => 'الميزات',
			'Solutions'        => 'الحلول',
			'Pricing'          => 'الأسعار',
			'Testimonials'     => 'آراء العملاء',
			'FAQ'              => 'الأسئلة الشائعة',
			'Contact'          => 'اتصل بنا',
			'Quick Links'      => 'روابط سريعة',
			'Legal'            => 'قانوني',
			'Privacy Policy'   => 'سياسة الخصوصية',
			'Terms of Service' => 'شروط الخدمة',
			'Cookie Policy'    => 'سياسة ملفات تعريف الارتباط',
			'Social'           => 'وسائل التواصل',
			'Name'             => 'الاسم',
			'Company'          => 'الشركة',
			'Email'            => 'البريد الإلكتروني',
			'Phone'            => 'الهاتف',
			'Request Type'     => 'نوع الطلب',
			'Message'          => 'الرسالة',
			'Submit Request'   => 'إرسال الطلب',
			'Most Popular'     => 'الأكثر شيوعًا',
			'Get Started'      => 'ابدأ الآن',
			'Use Cases'        => 'حالات الاستخدام',
			'Customer Stories' => 'قصص العملاء',
			'Platform Features' => 'ميزات المنصة',
		),
		'pt_BR' => array(
			'Home'             => 'Início',
			'Features'         => 'Recursos',
			'Solutions'        => 'Soluções',
			'Pricing'          => 'Preços',
			'Testimonials'     => 'Depoimentos',
			'FAQ'              => 'FAQ',
			'Contact'          => 'Contato',
			'Quick Links'      => 'Links rápidos',
			'Legal'            => 'Legal',
			'Privacy Policy'   => 'Política de privacidade',
			'Terms of Service' => 'Termos de serviço',
			'Cookie Policy'    => 'Política de cookies',
			'Social'           => 'Redes sociais',
			'Name'             => 'Nome',
			'Company'          => 'Empresa',
			'Email'            => 'E-mail',
			'Phone'            => 'Telefone',
			'Request Type'     => 'Tipo de solicitação',
			'Message'          => 'Mensagem',
			'Submit Request'   => 'Enviar solicitação',
			'Most Popular'     => 'Mais popular',
			'Get Started'      => 'Começar',
			'Use Cases'        => 'Casos de uso',
			'Customer Stories' => 'Histórias de clientes',
			'Platform Features' => 'Recursos da plataforma',
		),
		'zh_CN' => array(
			'Home'             => '首页',
			'Features'         => '功能',
			'Solutions'        => '解决方案',
			'Pricing'          => '定价',
			'Testimonials'     => '客户评价',
			'FAQ'              => '常见问题',
			'Contact'          => '联系我们',
			'Quick Links'      => '快速链接',
			'Legal'            => '法律信息',
			'Privacy Policy'   => '隐私政策',
			'Terms of Service' => '服务条款',
			'Cookie Policy'    => 'Cookie 政策',
			'Social'           => '社交媒体',
			'Name'             => '姓名',
			'Company'          => '公司',
			'Email'            => '电子邮箱',
			'Phone'            => '电话',
			'Request Type'     => '请求类型',
			'Message'          => '留言',
			'Submit Request'   => '提交请求',
			'Most Popular'     => '最受欢迎',
			'Get Started'      => '开始使用',
			'Use Cases'        => '使用场景',
			'Customer Stories' => '客户案例',
			'Platform Features' => '平台功能',
		),
		'zh_TW' => array(
			'Home'             => '首頁',
			'Features'         => '功能',
			'Solutions'        => '解決方案',
			'Pricing'          => '定價',
			'Testimonials'     => '客戶評價',
			'FAQ'              => '常見問題',
			'Contact'          => '聯絡我們',
			'Quick Links'      => '快速連結',
			'Legal'            => '法律資訊',
			'Privacy Policy'   => '隱私權政策',
			'Terms of Service' => '服務條款',
			'Cookie Policy'    => 'Cookie 政策',
			'Social'           => '社群媒體',
			'Name'             => '姓名',
			'Company'          => '公司',
			'Email'            => '電子郵件',
			'Phone'            => '電話',
			'Request Type'     => '需求類型',
			'Message'          => '訊息',
			'Submit Request'   => '送出需求',
			'Most Popular'     => '最受歡迎',
			'Get Started'      => '開始使用',
			'Use Cases'        => '使用案例',
			'Customer Stories' => '客戶故事',
			'Platform Features' => '平台功能',
		),
		'it_IT' => array(
			'Home'             => 'Home',
			'Features'         => 'Funzionalità',
			'Solutions'        => 'Soluzioni',
			'Pricing'          => 'Prezzi',
			'Testimonials'     => 'Testimonianze',
			'FAQ'              => 'FAQ',
			'Contact'          => 'Contatti',
			'Quick Links'      => 'Link rapidi',
			'Legal'            => 'Legale',
			'Privacy Policy'   => 'Informativa sulla privacy',
			'Terms of Service' => 'Termini di servizio',
			'Cookie Policy'    => 'Politica sui cookie',
			'Social'           => 'Social',
			'Name'             => 'Nome',
			'Company'          => 'Azienda',
			'Email'            => 'Email',
			'Phone'            => 'Telefono',
			'Request Type'     => 'Tipo di richiesta',
			'Message'          => 'Messaggio',
			'Submit Request'   => 'Invia richiesta',
			'Most Popular'     => 'Più popolare',
			'Get Started'      => 'Inizia',
			'Use Cases'        => 'Casi d’uso',
			'Customer Stories' => 'Storie dei clienti',
			'Platform Features' => 'Funzionalità della piattaforma',
		),
	);

	return isset( $maps[ $locale ] ) ? $maps[ $locale ] : array();
}

/**
 * Translates Mantix theme strings.
 *
 * @param string $translated Translated string.
 * @param string $text       Source text.
 * @param string $domain     Text domain.
 * @return string
 */
function mantix_lang_translate_gettext( $translated, $text, $domain ) {
	if ( 'mantix' !== $domain || is_admin() ) {
		return $translated;
	}

	$map = mantix_lang_get_string_map( mantix_lang_get_current_locale() );

	return isset( $map[ $text ] ) ? $map[ $text ] : $translated;
}
add_filter( 'gettext', 'mantix_lang_translate_gettext', 20, 3 );

/**
 * Returns translated default theme-mod values per locale.
 *
 * @param string $locale Locale.
 * @return array<string,string>
 */
function mantix_lang_get_theme_mod_map( $locale ) {
	$maps = array(
		'sv_SE' => array(
			'mantix_header_primary_cta_label'   => 'Boka demo',
			'mantix_header_secondary_cta_label' => 'Kom igång',
			'mantix_hero_primary_label'         => 'Boka en demo',
			'mantix_hero_secondary_label'       => 'Utforska funktioner',
			'mantix_final_cta_primary_label'    => 'Boka demo',
			'mantix_final_cta_secondary_label'  => 'Kontakta sälj',
			'mantix_contact_heading'            => 'Begär en demo',
			'mantix_footer_copyright'           => 'Alla rättigheter förbehållna.',
		),
		'nb_NO' => array(
			'mantix_header_primary_cta_label'   => 'Book demo',
			'mantix_header_secondary_cta_label' => 'Kom i gang',
			'mantix_hero_primary_label'         => 'Book en demo',
			'mantix_hero_secondary_label'       => 'Utforsk funksjoner',
			'mantix_final_cta_primary_label'    => 'Book demo',
			'mantix_final_cta_secondary_label'  => 'Kontakt salg',
			'mantix_contact_heading'            => 'Be om en demo',
			'mantix_footer_copyright'           => 'Alle rettigheter reservert.',
		),
		'da_DK' => array(
			'mantix_header_primary_cta_label'   => 'Book demo',
			'mantix_header_secondary_cta_label' => 'Kom i gang',
			'mantix_hero_primary_label'         => 'Book en demo',
			'mantix_hero_secondary_label'       => 'Udforsk funktioner',
			'mantix_final_cta_primary_label'    => 'Book demo',
			'mantix_final_cta_secondary_label'  => 'Kontakt salg',
			'mantix_contact_heading'            => 'Anmod om en demo',
			'mantix_footer_copyright'           => 'Alle rettigheder forbeholdes.',
		),
		'fi_FI' => array(
			'mantix_header_primary_cta_label'   => 'Varaa demo',
			'mantix_header_secondary_cta_label' => 'Aloita',
			'mantix_hero_primary_label'         => 'Varaa demo',
			'mantix_hero_secondary_label'       => 'Tutustu ominaisuuksiin',
			'mantix_final_cta_primary_label'    => 'Varaa demo',
			'mantix_final_cta_secondary_label'  => 'Ota yhteyttä myyntiin',
			'mantix_contact_heading'            => 'Pyydä demo',
			'mantix_footer_copyright'           => 'Kaikki oikeudet pidätetään.',
		),
		'de_DE' => array(
			'mantix_header_primary_cta_label'   => 'Demo buchen',
			'mantix_header_secondary_cta_label' => 'Loslegen',
			'mantix_hero_primary_label'         => 'Eine Demo buchen',
			'mantix_hero_secondary_label'       => 'Funktionen entdecken',
			'mantix_final_cta_primary_label'    => 'Demo buchen',
			'mantix_final_cta_secondary_label'  => 'Vertrieb kontaktieren',
			'mantix_contact_heading'            => 'Demo anfragen',
			'mantix_footer_copyright'           => 'Alle Rechte vorbehalten.',
		),
		'es_ES' => array(
			'mantix_header_primary_cta_label'   => 'Reservar demo',
			'mantix_header_secondary_cta_label' => 'Comenzar',
			'mantix_hero_primary_label'         => 'Reservar una demo',
			'mantix_hero_secondary_label'       => 'Explorar funciones',
			'mantix_final_cta_primary_label'    => 'Reservar demo',
			'mantix_final_cta_secondary_label'  => 'Contactar ventas',
			'mantix_contact_heading'            => 'Solicitar una demo',
			'mantix_footer_copyright'           => 'Todos los derechos reservados.',
		),
		'fr_FR' => array(
			'mantix_header_primary_cta_label'   => 'Réserver une démo',
			'mantix_header_secondary_cta_label' => 'Commencer',
			'mantix_hero_primary_label'         => 'Réserver une démo',
			'mantix_hero_secondary_label'       => 'Découvrir les fonctionnalités',
			'mantix_final_cta_primary_label'    => 'Réserver une démo',
			'mantix_final_cta_secondary_label'  => 'Contacter les ventes',
			'mantix_contact_heading'            => 'Demander une démo',
			'mantix_footer_copyright'           => 'Tous droits réservés.',
		),
		'ar'    => array(
			'mantix_header_primary_cta_label'   => 'احجز عرضًا تجريبيًا',
			'mantix_header_secondary_cta_label' => 'ابدأ الآن',
			'mantix_hero_primary_label'         => 'احجز عرضًا تجريبيًا',
			'mantix_hero_secondary_label'       => 'استكشف الميزات',
			'mantix_final_cta_primary_label'    => 'احجز عرضًا تجريبيًا',
			'mantix_final_cta_secondary_label'  => 'تواصل مع المبيعات',
			'mantix_contact_heading'            => 'اطلب عرضًا تجريبيًا',
			'mantix_footer_copyright'           => 'جميع الحقوق محفوظة.',
		),
		'pt_BR' => array(
			'mantix_header_primary_cta_label'   => 'Agendar demo',
			'mantix_header_secondary_cta_label' => 'Começar',
			'mantix_hero_primary_label'         => 'Agendar uma demo',
			'mantix_hero_secondary_label'       => 'Explorar recursos',
			'mantix_final_cta_primary_label'    => 'Agendar demo',
			'mantix_final_cta_secondary_label'  => 'Falar com vendas',
			'mantix_contact_heading'            => 'Solicitar uma demo',
			'mantix_footer_copyright'           => 'Todos os direitos reservados.',
		),
		'zh_CN' => array(
			'mantix_header_primary_cta_label'   => '预约演示',
			'mantix_header_secondary_cta_label' => '开始使用',
			'mantix_hero_primary_label'         => '预约演示',
			'mantix_hero_secondary_label'       => '探索功能',
			'mantix_final_cta_primary_label'    => '预约演示',
			'mantix_final_cta_secondary_label'  => '联系销售',
			'mantix_contact_heading'            => '申请演示',
			'mantix_footer_copyright'           => '保留所有权利。',
		),
		'zh_TW' => array(
			'mantix_header_primary_cta_label'   => '預約示範',
			'mantix_header_secondary_cta_label' => '開始使用',
			'mantix_hero_primary_label'         => '預約示範',
			'mantix_hero_secondary_label'       => '探索功能',
			'mantix_final_cta_primary_label'    => '預約示範',
			'mantix_final_cta_secondary_label'  => '聯絡銷售',
			'mantix_contact_heading'            => '申請示範',
			'mantix_footer_copyright'           => '版權所有。',
		),
		'it_IT' => array(
			'mantix_header_primary_cta_label'   => 'Prenota demo',
			'mantix_header_secondary_cta_label' => 'Inizia',
			'mantix_hero_primary_label'         => 'Prenota una demo',
			'mantix_hero_secondary_label'       => 'Esplora funzionalità',
			'mantix_final_cta_primary_label'    => 'Prenota demo',
			'mantix_final_cta_secondary_label'  => 'Contatta vendite',
			'mantix_contact_heading'            => 'Richiedi una demo',
			'mantix_footer_copyright'           => 'Tutti i diritti riservati.',
		),
	);

	return isset( $maps[ $locale ] ) ? $maps[ $locale ] : array();
}

/**
 * Translates default theme mods.
 *
 * @param mixed  $value   Current value.
 * @param string $key     Theme mod key.
 * @param mixed  $default Default value.
 * @return mixed
 */
function mantix_lang_translate_theme_mod( $value, $key, $default ) {
	if ( is_admin() ) {
		return $value;
	}

	if ( ! is_string( $value ) || ! is_string( $default ) ) {
		return $value;
	}

	if ( $value !== $default ) {
		return $value;
	}

	$map = mantix_lang_get_theme_mod_map( mantix_lang_get_current_locale() );

	return isset( $map[ $key ] ) ? $map[ $key ] : $value;
}
add_filter( 'mantix_translate_theme_mod', 'mantix_lang_translate_theme_mod', 10, 3 );




