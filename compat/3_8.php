<?php

if (! function_exists('doing_filter')) {
    /**
     * Retrieve the name of a filter currently being processed.
     *
     * The function current_filter() only returns the most recent filter or action
     * being executed. did_action() returns true once the action is initially
     * processed.
     *
     * This function allows detection for any filter currently being
     * executed (despite not being the most recent filter to fire, in the case of
     * hooks called from hook callbacks) to be verified.
     *
     * @since 3.9.0
     *
     * @see   current_filter()
     * @see   did_action()
     * @global array      $wp_current_filter Current filter.
     *
     * @param null|string $filter            Optional. Filter to check. Defaults to null, which
     *                                       checks if any filter is currently being run.
     *
     * @return bool Whether the filter is currently in the stack.
     */
    function doing_filter( $filter = null ) {
        global $wp_current_filter;

        if ( null === $filter ) {
            return ! empty( $wp_current_filter );
        }

        return in_array( $filter, $wp_current_filter );
    }
}
