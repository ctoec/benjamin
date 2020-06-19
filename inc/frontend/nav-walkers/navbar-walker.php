<?php


/**
 * Custom nav walker for the primary (top) navbar
 */
class BenjaminNavbarWalker extends Walker_Nav_Menu {


    public function start_lvl( &$output, $depth = 0, $args = array() ) {

        $id = 'side-nav-'.$this->curItem->menu_order;
		$output .= '<ul class="usa-nav__submenu" id="'.$id.'" hidden>';
	}

    public function end_lvl( &$output, $depth = 0, $args = array() ) {        
        $output .= '</ul>';
    }

	public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {


        $this->curItem = $item;
        $object = $item->object;
        $type = $item->type;
        $title = $item->title;
        $description = $item->description;
        $permalink = $item->url;

        $is_current = false;
        if($item->classes){
            foreach($item->classes as $key=>$class){
                if(strpos($class, 'current-menu-item') !== false )
                $is_current = true;
            }
        }

		$classes = ($is_current && $depth == 0) ? ' usa-current': '';
        $child_active = $item->current_item_ancestor || in_array('current-page-ancestor', $item->classes) ? 'child-active' : '';

        $li_classes = ($depth == 0) ? 'usa-nav__primary-item' : 'usa-nav__submenu-item';
        $output .= '<li class="' . esc_attr($li_classes) . '">';

        $link_class = ($depth == 0) ? 'usa-nav__link' : '';
        $link_class .= $classes;

        if($depth == 0 && $args->walker->has_children){
            
            $output  .= '<button class="usa-accordion__button usa-nav__link ' . esc_attr( $child_active ) . '"
            aria-expanded="false" aria-controls="side-nav-' . esc_attr($item->menu_order) . '" tabindex="0">';
                $output .= '<span>'.$title.'</span>';
            $output .= '</button>';

        }elseif( $permalink && $permalink != '#' ) {
            
            $output .= '<a href="' . esc_url($permalink) . '" class="' . esc_attr($link_class) . '" tabindex="0">';
                $output .= '<span>' . $title . '</span>';
            $output .= '</a>';

        }else{
            
            $output .= '<span class="' . esc_attr($link_class) . '">';
                $output .= '<span>' . $title . '</span>';
            $output .= '</span>';

        }

	}


}
