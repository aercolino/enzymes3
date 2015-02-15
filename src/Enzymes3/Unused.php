<?php

/**
 * This is a collection of snippets that I developed and couldn't decide to delete.
 */
class Enzymes3_Unused {

    protected
    function get_header_data( $package_dir, $type ) {
        $properties = array(
            'plugin' => array(
                'Author',
                'Author URI',
                'Description',
                'Domain Path',
                'Network',
                'Plugin Name',
                'Plugin URI',
                'Site Wide Only',
                'Text Domain',
                'Version',
            ),
            'theme'  => array(
                'Author',
                'Author URI',
                'Description',
                'Domain Path',
                'Status',
                'Tags',
                'Template',
                'Text Domain',
                'Theme Name',
                'Theme URI',
                'Version',
            ),
        );
        $data       = array_combine( $properties[ $type ], $properties[ $type ] );
        $result     = get_file_data( $package_dir, $data, $type );

        return $result;
    }

}
