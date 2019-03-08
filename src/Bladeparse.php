<?php

namespace Ahsan\BladeParse;

use ParsedownExtra;
use Illuminate\Support\HtmlString;

class Bladeparse
{
    /**
     * Parse the given Markdown text into HTML.
     *
     * @param  string  $text
     * @return \Illuminate\Support\HtmlString
     */
    public function parse($text)
    {
        $parsedown = new ParsedownExtra;

        return new HtmlString($parsedown->text($text));
    }
}
