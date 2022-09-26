<?php

class face
{
    private string $_page;
    private array $_ainjecter;

    public function __construct()
    {
        $this->_page = file_get_contents(THEMES . 'perle/face.html');
    }

    private function contenu(string $titre = '', string $article = '', string $meta = '')
    {
        // le @ definit que c'est un import de fichier
        $this->_ainjecter = [
            '{{CSS}}' => 'themes/perl/face.css',
            '{{JQLINK}}' => 'themes/perl/jquery.js',
            '{{MENU}}' => '@parties/menu.html',
            '{{UTILISATEUR}}' => '@parties/utilisateur.html',
            '{{VOTE}}' => '@parties/vote.html',
            '{{TABLE}}' => '@parties/table.html',
            '{{DEBAT}}' => '@parties/debat.html',
            '{{JS}}' => 'themes/perl/script.js',
            '{{TITRE}}' => $titre,
            '{{ARTICLE}}' => $article,
            '{{META}}' => $meta
        ];
    }

    public function affichage(string $titre = '', string $article = '', string $meta = '', array $contenuvide = array())
    {
        $this->contenu($titre, $article, $meta);
        echo $this->injections($contenuvide);
    }

    private function injections(array $contenuvide): string
    {

        $injections = $this->_ainjecter;
        if (count($injections) > 0) {
            $face = $this->_page;
            foreach ($injections as $clee => $valeur) {

                if (strlen($valeur) > 0 && $valeur[0] == '@')
                    $valeur = file_get_contents(THEMES . 'perle/' . substr($valeur, 1));

                if (!in_array($clee, $contenuvide))
                    $face = str_replace($clee, $valeur, $face);

            }
            $this->_page = $face;
        }
        return $this->_page;
    }
}