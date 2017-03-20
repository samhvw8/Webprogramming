<?php

/**
 * Created by PhpStorm.
 * User: samhv
 * Date: 3/17/17
 * Time: 9:09 AM
 */
class Page
{
    private $page;
    private $title;
    private $year;
    private $copyright;

    function __construct($title, $year, $copyright)
    {
        $this->title = $title;
        $this->year = $year;
        $this->copyright = $copyright;
    }

    private function addHeader()
    {
        $this->page = " <!DOCTYPE html> <html> <head>   <title> " . $this->title . " </title> </head>";

    }

    public function addContent($content)
    {
        $this->addHeader();
        $this->page .= "<body> <p>" . $content . "</p> </body>";
        $this->addFooter();
    }

    private function addFooter()
    {
        $this->page .= "<footer> Copyright &copy;" . $this->year . " "  . $this->copyright . " </footer> </html>";
    }

    public function get()
    {
        return $this->page;
    }
}