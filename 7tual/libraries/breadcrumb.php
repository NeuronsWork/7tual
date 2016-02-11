<?php

/**
 *
 * Class Breadcrumb
 *
 */

class Breadcrumb
{
    public $link_type = ' '; // must have spaces around it
    public $breadcrumb = array();
    public $output = '';

    /**
     * completely remove all previous generation data
     *
     * @return bool
     */
    public function clear()
    {
        // clear the breadcrumb library to start again
        $props = array('breadcrumb', 'output');
        // loop through
        foreach ($props as $val)
        {
            // clear
            $this->$val = null;
        }
        // completed
        return true;
    }

    /**
     * add a "crumb" - new link
     *
     * @param string $title displayed name of the link
     * @param bool $url place to go to
     * @return bool
     */
    public function add_crumb($title, $url = false, $icon, $active)
    {
        // pass into breadcrumb array
        $this->breadcrumb[] =
            array(
                'title' => $title,
                'url' => $url,
                'icon' => $icon,
                'active' => $active
            );
        // completed
        return true;
    }

    /**
     * the delimiter between links
     *
     * @param string $new_link delimiter value
     * @return bool
     */
    public function change_link($new_link)
    {
        // change
        $this->link_type = ' ' . $new_link . ' '; // the spaces are added for visual reasons
        // completed
        return true;
    }

    /**
     * render an output
     *
     * @return string
     */
    public function output()
    {
        // define local counter
        $counter = 0;
        // loop through breadcrumbs
        foreach ($this->breadcrumb as $val)
        {
            // do we need to add a link?
            if ($counter > 0)
            {
                // we do
                $this->output .= $this->link_type;
            }
            // are we using a hyperlink?
            if ($val['url'])
            {
                // add href tag
                $this->output .= '<li class="'.$val['active'].'"><a href="'.$val['url'].'"><i class="'.$val['icon'].'"></i> '.$val['title'].'</a></li>';
            }
            else
            {
                // don't use hyperlinks
                $this->output .= '<li><i class="'.$val['icon'].'"></i> '.$val['title'].'</li>';
            }
            // increment counter
            $counter++;
        }

        // return
        return $this->output;
    }
}
