<?php
/** 
 * As configurações básicas do WordPress.
 *
 * Esse arquivo contém as seguintes configurações: configurações de MySQL, Prefixo de Tabelas,
 * Chaves secretas, Idioma do WordPress, e ABSPATH. Você pode encontrar mais informações
 * visitando {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. Você pode obter as configurações de MySQL de seu servidor de hospedagem.
 *
 * Esse arquivo é usado pelo script ed criação wp-config.php durante a
 * instalação. Você não precisa usar o site, você pode apenas salvar esse arquivo
 * como "wp-config.php" e preencher os valores.
 *
 * @package WordPress
 */

// ** Configurações do MySQL - Você pode pegar essas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define('DB_NAME', 'bttechnology8');

/** Usuário do banco de dados MySQL */
define('DB_USER', 'bttechnology8');

/** Senha do banco de dados MySQL */
define('DB_PASSWORD', 'newtech100');

/** nome do host do MySQL */
define('DB_HOST', '186.202.152.50');

/** Conjunto de caracteres do banco de dados a ser usado na criação das tabelas. */
define('DB_CHARSET', 'utf8');

/** O tipo de collate do banco de dados. Não altere isso se tiver dúvidas. */
define('DB_COLLATE', '');

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * Você pode alterá-las a qualquer momento para desvalidar quaisquer cookies existentes. Isto irá forçar todos os usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '>Cd.[M+F^ImL/S|i kBLZ$vq:O fOu@YfFhW{0Wt-fp*7D+Lby7rh7#dX`w/NoQ1');
define('SECURE_AUTH_KEY',  '<<1DQKi3?ILK7|%mwb{0yQ3wCVs+ZcqFnEH7rL+>AWu,Wmw)_hQhl:)`BAN*|CH6');
define('LOGGED_IN_KEY',    'y[m#d/a-*2i+eth-~8>*UK-!%L,3FJmgXL.4o!_A:Q=PNtf)HEkGG.%p3t-W6~6%');
define('NONCE_KEY',        'tM`Qge?G77j@p}7]73k{2rb^|)-ohhhtO$m6@r&&?m)@e;cBd_f8{Z}FDo%2-AaJ');
define('AUTH_SALT',        '0- v(AK}c/8NNTqt}:Fp5B=+z7CT&>%iX|T9Cx>p.#I~+p8iPMo|:gE+>oaHHm+`');
define('SECURE_AUTH_SALT', '4hnlje^|Sr~|Lbaj[9NBw@ZJ;ZJbo|P%nw#s}FU/h<j-km>XA^wF_#GSNRim?hPm');
define('LOGGED_IN_SALT',   'FZqiA+|1d+Yl:s(W,)#/|3)bwXZp %n?D<`:[W|owgfCX:qyHNh+;JrZ6,F3[Tx&');
define('NONCE_SALT',       'J8Rq5CU2Q{a*x25Bi-3k?^~1X.+x@BldvYxXM>l0=d9w#N(u&x@uCxEs;XR!wk?f');

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der para cada um um único
 * prefixo. Somente números, letras e sublinhados!
 */
$table_prefix  = 'wp_';

/**
 * O idioma localizado do WordPress é o inglês por padrão.
 *
 * Altere esta definição para localizar o WordPress. Um arquivo MO correspondente ao
 * idioma escolhido deve ser instalado em wp-content/languages. Por exemplo, instale
 * pt_BR.mo em wp-content/languages e altere WPLANG para 'pt_BR' para habilitar o suporte
 * ao português do Brasil.
 */
define('WPLANG', 'pt_BR');

/**
 * Para desenvolvedores: Modo debugging WordPress.
 *
 * altere isto para true para ativar a exibição de avisos durante o desenvolvimento.
 * é altamente recomendável que os desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 */
define('WP_DEBUG', false);

/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');
	
/** Configura as variáveis do WordPress e arquivos inclusos. */
require_once(ABSPATH . 'wp-settings.php');
