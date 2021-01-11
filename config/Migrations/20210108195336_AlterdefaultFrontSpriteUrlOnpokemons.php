<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class AlterdefaultFrontSpriteUrlOnpokemons extends AbstractMigration
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

        /**
         * Methode de modification de la base de donné 
         * 
         * On modifie la colonne 'default_front_sprite_url':
         * 
         * on passe la l'autorisation d'avoir des valeur null de faux à vrai
         */
        $table->changeColumn('default_front_sprite_url','string',[
            'default'=> null,
            'limit'=> 255,
            'null'=> true,//modification de l'autorisation de valeur null de faux à vrai
        ]);
        $table->update();
    }
}
