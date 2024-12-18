<?php
class Custom_Menu_Walker extends Walker_Nav_Menu {
    public function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
        $output .= '<li class="menu-item ' . ($item->current ? 'active' : '') . '">';
        $output .= '<a href="' . $item->url . '">';
        $output .= '<i class="' . get_field('menu_icon', $item) . '"></i>';
        $output .= '<span>' . $item->title . '</span>';
        $output .= '</a>';
    }
}
