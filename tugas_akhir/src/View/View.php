<?php
namespace View;

class View
{
    public function render($viewFile, $data = [])
    {
        extract($data);
        include $viewFile;
    }
}
?>