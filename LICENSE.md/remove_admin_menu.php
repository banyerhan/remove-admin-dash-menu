function remove_menus () {
    if(is_user_logged_in() && current_user_can('author'))
    {
        global $menu;
        $restricted = array(__('Downloads'),__('Grid Elements'),__('Contact'), __('Links'), __('Pages'), __('Appearance'), __('Tools'), __('Settings'), __('Comments'), __('Plugins'));
        end ($menu);
        while (prev($menu)){
            $value = explode(' ',$menu[key($menu)][0]);
            if(in_array($value[0] != NULL?$value[0]:"" , $restricted)){unset($menu[key($menu)]);}
        }
    }
}
add_action('admin_menu', 'remove_menus');