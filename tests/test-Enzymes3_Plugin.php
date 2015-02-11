<?php

class Enzymes3_PluginTest
    extends WP_UnitTestCase {
    // NOTE: The tests/bootstrap.php file loads the plugin into WordPress.

    function test_plugin_hooks_into_wordpress() {
        Enzymes3_Plugin::on_init();
        $tags  = array(
            'wp_title',
            'the_title',
            'the_title_rss',
            'the_excerpt',
            'the_excerpt_rss',
            'the_content'
        );
        $enzymes = Enzymes3_Plugin::engine();
        foreach ( $tags as $tag ) {
            $this->assertEquals( Enzymes3_Plugin::PRIORITY, has_filter( $tag, array($enzymes, 'absorb') ),
                "Enzymes3 didn't attach to '$tag'." );
        }
    }

}
