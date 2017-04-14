<?php

class Nzymes_PluginTest
    extends WP_UnitTestCase {
    // NOTE: The tests/bootstrap.php file loads the plugin into WordPress.

    function test_plugin_hooks_into_wordpress() {
        Nzymes_Plugin::on_init();
        $tags  = array(
            'wp_title',
            'the_title',
            'the_title_rss',
            'the_excerpt',
            'the_excerpt_rss',
            'the_content'
        );
        $engine = Nzymes_Plugin::engine();
        foreach ( $tags as $tag ) {
            $this->assertEquals( Nzymes_Plugin::PRIORITY, has_filter( $tag, array($engine, 'absorb') ),
                "Nzymes didn't attach to '$tag'." );
        }
    }

}
