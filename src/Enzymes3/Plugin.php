<?php
require_once dirname( ENZYMES3_PRIMARY ) . '/src/Enzymes3/Capabilities.php';
require_once dirname( ENZYMES3_PRIMARY ) . '/src/Enzymes3/Options.php';

class Enzymes3_Plugin {
    /**
     * Use a higher priority than Enzymes <3.
     */
    const PRIORITY = 9;

    /**
     * @var Enzymes3_Options
     */
    static public $options;

    /**
     * Singleton
     *
     * @var Enzymes3_Engine
     */
    static protected $enzymes;

    /**
     * @return Enzymes3_Engine
     */
    static public
    function engine() {
        if ( is_null( self::$enzymes ) ) {
            self::$enzymes = new Enzymes3_Engine();
        }

        return self::$enzymes;
    }

    public
    function __construct() {
        self::$options = new Enzymes3_Options();

        if ( is_admin() ) {
            register_activation_hook( ENZYMES3_PRIMARY, array( 'Enzymes3_Plugin', 'on_activation' ) );
            register_deactivation_hook( ENZYMES3_PRIMARY, array( 'Enzymes3_Plugin', 'on_deactivation' ) );

            add_filter( 'editable_roles', array( 'Enzymes3_Plugin', 'on_editable_roles' ) );
        } else {
            add_action( 'init', array( 'Enzymes3_Plugin', 'on_init' ) );
        }
    }

    /**
     * Attach filters to tags.
     */
    static public
    function on_init() {
        global $wp_version;
        if ( version_compare( $wp_version, '3.9', '<' ) ) {
            require dirname( ENZYMES3_PRIMARY ) . '/compat/3_8.php';
        }

        require_once dirname( ENZYMES3_PRIMARY ) . '/src/Enzymes3/Engine.php';
        $enzymes = self::engine();  // singleton
//@formatter:off
        $enzymes->absorb_later('wp_title',        self::PRIORITY);
        $enzymes->absorb_later('the_title',       self::PRIORITY);
        $enzymes->absorb_later('the_title_rss',   self::PRIORITY);
        $enzymes->absorb_later('the_excerpt',     self::PRIORITY);
        $enzymes->absorb_later('the_excerpt_rss', self::PRIORITY);
        $enzymes->absorb_later('the_content',     self::PRIORITY);
//@formatter:on
    }

    /**
     * Callback used when the plugin is activated by the user.
     *
     * @return boolean
     */
    static public
    function on_activation() {
        self::add_roles_and_capabilities();

        return true;
    }

    /**
     * Callback used when the plugin is deactivated by the user.
     *
     * @return boolean
     */
    static public
    function on_deactivation() {
        self::remove_roles_and_capabilities();

        return true;
    }

    /**
     * Uninstalls this plugin, cleaning up all data.
     * This is called from uninstall.php without instantiating an object of this class.
     */
    static public
    function on_uninstall() {
        self::$options->remove_all();
    }

    /**
     * Remove Enzymes 3 roles from the user-edit screen because they are not meant to be primary roles.
     *
     * @param array $all_roles
     *
     * @return array
     */
    public static
    function on_editable_roles( $all_roles ) {
        $screen = get_current_screen();
        if ( 'user-edit' == $screen->id ) {
            foreach ( $all_roles as $name => $role ) {
                if ( 0 === strpos( $name, Enzymes3_Capabilities::PREFIX ) ) {
                    unset( $all_roles[ $name ] );
                }
            }
        }

        return $all_roles;
    }

    //------------------------------------------------------------------------------------------------------------------

    static protected
    function add_roles_and_capabilities() {
        global $wp_roles;
        /* @var $wp_roles WP_Roles */

        if ( ! isset( $wp_roles ) ) {
            $wp_roles = new WP_Roles();
        }

        self::remove_roles_and_capabilities();
//@formatter:off
        add_role(Enzymes3_Capabilities::User,           __('Enzymes User'),            Enzymes3_Capabilities::for_User() );
        add_role(Enzymes3_Capabilities::PrivilegedUser, __('Enzymes Privileged User'), Enzymes3_Capabilities::for_PrivilegedUser() );
        add_role(Enzymes3_Capabilities::TrustedUser,    __('Enzymes Trusted User'),    Enzymes3_Capabilities::for_TrustedUser() );
        add_role(Enzymes3_Capabilities::Coder,          __('Enzymes Coder'),           Enzymes3_Capabilities::for_Coder() );
        add_role(Enzymes3_Capabilities::TrustedCoder,   __('Enzymes Trusted Coder'),   Enzymes3_Capabilities::for_TrustedCoder() );
//@formatter:on

        foreach ( Enzymes3_Capabilities::all() as $cap ) {
            $wp_roles->add_cap( 'administrator', $cap );
        }
    }

    /**
     * Remove roles and capabilities by prefix.
     */
    static protected
    function remove_roles_and_capabilities() {
        global $wp_roles;
        /* @var $wp_roles WP_Roles */

        if ( ! isset( $wp_roles ) ) {
            $wp_roles = new WP_Roles();
        }

        foreach ( $wp_roles->roles as $name => $role ) {
            if ( 0 === strpos( $name, Enzymes3_Capabilities::PREFIX ) ) {
                remove_role( $name );
            }
        }

        foreach ( Enzymes3_Capabilities::all() as $cap ) {
            $wp_roles->remove_cap( 'administrator', $cap );
        }
    }

}
