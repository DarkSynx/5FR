<?php

namespace modules\themes;

use face;

class themes
{
    public function __construct(string $titre = '', string $article = '', string $meta = '', array $contenuvide = array())
    {
        $theme_nom = $this->theme_selection();
        include_once THEMES . $theme_nom . '/face.php';
        $face = new face();
        $face->affichage($titre, $article, $meta, $contenuvide);
    }

    private function theme_selection()
    {
        $theme_selection = file_get_contents(CFG . 'configs.json');
        $theme_selection = json_decode($theme_selection, true);
        return $theme_selection['theme_selection'];
    }
}