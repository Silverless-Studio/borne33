<?php

// ************* Custom Roles *************

add_action('init', 'update_custom_roles');

function update_custom_roles()
{
    $role_version = 1;

    if (!get_option('custom_roles_version')) {
        add_option('custom_roles_version', $role_version - 1);
    }

    if (get_option('custom_roles_version') < $role_version) {

        remove_role('owner');

        $owner_roles = array_merge(get_role('editor')->capabilities, [
            'edit_users' => true,
            'list_users' => true,
            'create_users' => true,
            'delete_users' => true,
            'promote_users' => true
        ]);

        $admin = get_role('administrator');

        add_role('owner', 'Owner', $owner_roles);

        update_option('custom_roles_version', $role_version);
    }
}

function restrict_role_visibility($allroles)
{
    $current_user = wp_get_current_user();

    if (in_array('owner', $current_user->roles)) {
        unset($allroles['administrator']);
    }

    return $allroles;
}

add_filter('editable_roles', 'restrict_role_visibility', 10, 1);

function filter_users_for_owner($query)
{
    $current_user = wp_get_current_user();

    if (in_array('owner', $current_user->roles)) {
        global $wpdb;

        $admin_ids = $wpdb->get_col("SELECT user_id FROM {$wpdb->usermeta} WHERE meta_key = '{$wpdb->prefix}capabilities' AND meta_value LIKE '%administrator%'");

        if (!empty($admin_ids)) {
            $query->set('exclude', $admin_ids);
        }
    }
}
add_action('pre_get_users', 'filter_users_for_owner');
