<?php


class Helpme extends Application
{
    /**
     * Index Help Wanted page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/
     * 	- or -
     * 		http://example.com/Helpme
     *
     */

    public function index()
    {
        $this->data['pagetitle'] = 'Help Wanted!';
        $stuff = file_get_contents('../data/jobs.md');
        $this->data['content'] = $this->parsedown->parse($stuff);
        $this->render();
    }

}