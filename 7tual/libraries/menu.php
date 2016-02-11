<?php

/**
 *
 * Class Menu
 *
 */

class Menu
{
    public $link_type = ' '; // must have spaces around it
    public $menu = array();
    public $output = '';

    public function clear()
    {
        $props = array('menu', 'output');
        foreach ($props as $val)
        {
            $this->$val = null;
        }
        return true;
    }

    public function add_menu($title, $url = false, $active)
    {
        $this->menu[] =
            array(
                'title' => $title,
                'url' => $url,
                'active' => $active
            );
        return true;
    }

    public function change_link($new_link)
    {
        $this->link_type = ' ' . $new_link . ' '; // the spaces are added for visual reasons
        return true;
    }

    public function output()
    {
        $counter = 0;
        foreach ($this->menu as $val)
        {
            if ($counter > 0)
            {
                $this->output .= $this->link_type;
            }
            if ($val['url'])
            {
                $this->output .= '<li class="menu-principal__item '.$val['active'].'"><a href="'.$val['url'].'">'.$val['title'].'</a></li>';
            }
            else
            {
                $this->output .= '<li class="menu-principal__item">'.$val['title'].'</li>';
            }
            $counter++;
        }
        return $this->output;
    }
}
