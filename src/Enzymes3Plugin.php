<?php
require_once dirname(ENZYMES3_PRIMARY) . '/src/Enzymes3Engine.php';

class Enzymes3Plugin
{
    /**
     * Use a higher priority than Enzymes <3.
     */
    const PRIORITY = 9;

    /**
     * @var Enzymes3Options
     */
    static public $options;

    /**
     * Singleton
     *
     * @var Enzymes3Engine
     */
    static protected $enzymes;

    /**
     * @return Enzymes3Engine
     */
    static public
    function engine()
    {
        if ( is_null(self::$enzymes) ) {
            self::$enzymes = new Enzymes3Engine();
        }
        return self::$enzymes;
    }

    public
    function __construct()
    {
        self::$options = new Enzymes3Options();

        if (is_admin()) {
            register_activation_hook( ENZYMES3_PRIMARY, array( 'Enzymes3Plugin', 'on_activation' ) );
            register_deactivation_hook( ENZYMES3_PRIMARY, array( 'Enzymes3Plugin', 'on_deactivation' ) );
        } else {
            add_action( 'init', array( 'Enzymes3Plugin', 'on_init' ), 10, 2 );
        }
    }

    static public
    function on_init()
    {
        $enzymes = self::engine();  // singleton
//@formatter:off
        add_filter('wp_title',        array($enzymes, 'metabolize'), self::PRIORITY, 1);
        add_filter('the_title',       array($enzymes, 'metabolize'), self::PRIORITY, 2);
        add_filter('the_title_rss',   array($enzymes, 'metabolize'), self::PRIORITY, 2);
        add_filter('the_excerpt',     array($enzymes, 'metabolize'), self::PRIORITY, 2);
        add_filter('the_excerpt_rss', array($enzymes, 'metabolize'), self::PRIORITY, 2);
        add_filter('the_content',     array($enzymes, 'metabolize'), self::PRIORITY, 2);
//@formatter:on
    }

    /**
     * Callback used when the plugin is activated by the user.
     *
     * @return boolean
     */
    static public
    function on_activation()
    {
        self::$options->keysSet(array('activated_on' => date('Y-m-d H:i:s')));
        self::add_roles_and_capabilities();

        return true;
    }

    /**
     * Callback used when the plugin is deactivated by the user.
     *
     * @return boolean
     */
    static public
    function on_deactivation()
    {
        self::$options->keysSet(array('activated_on' => null));
        self::remove_roles_and_capabilities();

        return true;
    }

    /**
     * Uninstalls this plugin, cleaning up all data.
     * This is called from uninstall.php without instantiating an object of this class.
     *
     */
    static public
    function on_uninstall()
    {
        self::$options->remove_all();
    }

    //------------------------------------------------------------------------------------------------------------------

    static protected
    function add_roles_and_capabilities()
    {
        self::remove_roles_and_capabilities();
//@formatter:off
        add_role(Enzymes3Capabilities::User,           __('Enzymes User'),            Enzymes3Capabilities::for_User() );
        add_role(Enzymes3Capabilities::PrivilegedUser, __('Enzymes Privileged User'), Enzymes3Capabilities::for_PrivilegedUser() );
        add_role(Enzymes3Capabilities::TrustedUser,    __('Enzymes Trusted User'),    Enzymes3Capabilities::for_TrustedUser() );
        add_role(Enzymes3Capabilities::Coder,          __('Enzymes Coder'),           Enzymes3Capabilities::for_Coder() );
        add_role(Enzymes3Capabilities::TrustedCoder,   __('Enzymes Trusted Coder'),   Enzymes3Capabilities::for_TrustedCoder() );
//@formatter:on

        global $wp_roles;
        /* @var $wp_roles WP_Roles */

        foreach (Enzymes3Capabilities::all() as $cap) {
            $wp_roles->add_cap('administrator', $cap);
        }
    }

    /**
     * Remove roles and capabilities by prefix.
     */
    static protected
    function remove_roles_and_capabilities()
    {
        global $wp_roles;
        /* @var $wp_roles WP_Roles */

        foreach ($wp_roles->roles as $name => $role) {
            if ( 0 === strpos($name, Enzymes3Capabilities::PREFIX) ) {
                remove_role($name);
            }
        }

        foreach (Enzymes3Capabilities::all() as $cap) {
            if ( 0 === strpos($cap, Enzymes3Capabilities::PREFIX) ) {
                $wp_roles->remove_cap('administrator', $cap);
            }
        }
    }

    static public
    function activated_on()
    {
        $options = self::$options->keysGet(array('activated_on'));
        return $options['activated_on'];
    }

}
