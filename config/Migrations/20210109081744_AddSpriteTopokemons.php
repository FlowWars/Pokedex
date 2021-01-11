<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class AddSpriteTopokemons extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {   
        
        $table = $this->table('pokemons');
        /*
            on ajoute la colonne 'default_back_sprite_url' de type string
            on défini la valeur par defaut à null
            on limit la taille du string a 255 charactère 
            et on met l'autorisation de valeur null a vrai 
        */
        $table -> addColumn('default_back_sprite_url','string',[
            'default' => null,
            'limit' => 255,
            'null' => true
        ]);

         /*
            on ajoute la colonne 'default_front_shiny_sprite_url' de type string
            on défini la valeur par defaut à null
            on limit la taille du string a 255 charactère 
            et on met l'autorisation de valeur null a vrai 
        */
        $table -> addColumn('default_front_shiny_sprite_url','string',[
            'default' => null,
            'limit' => 255,
            'null' => true
        ]);

         /*
            on ajoute la colonne 'default_back_shiny_sprite_url' de type string
            on défini la valeur par defaut à null
            on limit la taille du string a 255 charactère 
            et on met l'autorisation de valeur null a vrai 
        */
        $table -> addColumn('default_back_shiny_sprite_url','string',[
            'default' => null,
            'limit' => 255,
            'null' => true
        ]);
        $table->update();
    }
}
