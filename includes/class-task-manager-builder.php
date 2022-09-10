<?php

/**
 * Task_Manager_Builder class will create the page to load the table
 */
class Task_Manager_Builder{
        /**
     * Menu item will allow us to load the page to display the table
     */
    public static function add_menu_Task_Table_List_page()
    {
        //Generate Task Admin Page
        add_menu_page(
            'Task',
            'T-P Manager',
            'manage_options',
            'o_task_manager',
            'Task_Manager_Builder::settings_page',
            'dashicons-welcome-write-blog',
            30,
            ''
        );
    }

    /**
     * Short code de la page public
     * 
     * @return void
     */
    public static function orion_task_shortcode()
    {
        $var = wp_nonce_field('orion_task_manager', 'task_manager');
        // return Task_Manager_Builder::page_task();
    }

    /**
     * Short code de la page public
     * 
     * @return void
     */
    public static function orion_task_evaluation_shortcode()
    {
        $var = wp_nonce_field('orion_task_manager', 'task_manager');
        // return evaluator_page();
    }

    public static function settings_page()
    {
        $using = get_option('_first_user_plugin');
        if ($using != 'on') {
            ?>
            <h3 class="pt-2">
                <?php _e('Configuration T&P Manager', 'task'); ?>
            </h3>
            <?php $active_tableau = isset($_GET['set']) ? $_GET['set'] : 'o_project_manager'; ?>
            <div class="wrap woocommerce wc_addons_wrap">
                <nav class="nav-tab-wrapper woo-nav-tab-wrapper">
                    <a href="<?php echo esc_url(admin_url('admin.php?page=o_task_manager')); ?>" class="nav-tab <?php echo $active_tableau == 'o_project_manager' ? 'nav-tab-active' : ''; ?>"><?php _e('PROJECT', 'task'); ?></a>
                    <a href="<?php echo esc_url(admin_url('admin.php?page=o_task_manager&set=o-task')); ?>" class="nav-tab <?php echo $active_tableau == 'o-task' ? 'nav-tab-active' : ''; ?>"><?php _e('TASK', 'task'); ?></a>
                    <a href="<?php echo esc_url(admin_url('admin.php?page=o_task_manager&set=o-worklog')); ?>" class="nav-tab <?php echo $active_tableau == 'o-worklog' ? 'nav-tab-active' : ''; ?>"><?php _e('WORKLOG', 'task'); ?></a>
                    <a href="<?php echo esc_url(admin_url('admin.php?page=o_task_manager&set=o-evaluation')); ?>" class="nav-tab <?php echo $active_tableau == 'o-evaluation' ? 'nav-tab-active' : ''; ?>"><?php _e('EVALUATION', 'task'); ?></a>
                    <a href="<?php echo esc_url(admin_url('admin.php?page=o_task_manager&set=o-rapport')); ?>" class="nav-tab <?php echo $active_tableau == 'o-rapport' ? 'nav-tab-active' : ''; ?>"><?php _e('REPORT', 'task'); ?></a>
                    <a href="<?php echo esc_url(admin_url('admin.php?page=o_task_manager&set=o-performance')); ?>" class="nav-tab <?php echo $active_tableau == 'o-performance' ? 'nav-tab-active' : ''; ?>"><?php _e('PERFORMANCE', 'task'); ?></a>
                    <a href="<?php echo esc_url(admin_url('admin.php?page=o_task_manager&set=o-active')); ?>" class="nav-tab <?php echo $active_tableau == 'o-active' ? 'nav-tab-active' : ''; ?>"><?php _e('INTEGRATION', 'task'); ?></a>
                </nav>
                <div class="o_task_manager addons-featured">
                    <?php
                    if ($active_tableau == 'o_project_manager') {
                        // Task_Manager_Builder::taches_tab();
                    }
                    if ($active_tableau == 'o-task') {
                        // Task_Manager_Builder::taches_tab();
                    }
                    if ($active_tableau == 'o-worklog') {
                    ?>
                        <div id="worklog_card">
                            <?php //Task_Manager_Builder::worklog_tab(); ?>
                        </div>
                <?php
                    }
                    if ($active_tableau == 'o-evaluation') {
                        // Task_Manager_Builder::evaluation_tab();
                    }
                    if ($active_tableau == 'o-active') {
                        // Task_Manager_Builder::active_tab();
                    }
                    if ($active_tableau == 'o-rapport') {
                        // Task_Manager_Builder::rapport_tab();
                    }
                    if ($active_tableau == 'o-performance') {
                        // Task_Manager_Builder::performance_tab();
                    }
                } else {
                    include_once('configuration-first-active.php');
                }
            }

            /**
             * Redirect users who arent logged in...
             */
            public static function login_redirect()
            {
                //Current Page
                global $pagenow;

                if (!is_user_logged_in() && (is_page('orion-task') || is_page('task-evaluation')))
                    auth_redirect();
            }
}