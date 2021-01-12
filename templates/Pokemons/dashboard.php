<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pokemon $pokemon
 */

use Cake\ORM\TableRegistry;
?>
<div>
<h1><br>DASHBOARD</h1>
    <h3><br>Average weight</h3>
    <div class="pokemons view content">
    <?php $pokemonTable = TableRegistry::get('Pokemons')->find()->where(['pokedex_number >' => 386, 'pokedex_number <' => 494]);
            $weight = $pokemonTable->extract('weight')->avg();?>
        <table>
            <tr>
                <th>4th generation</th>
                <td><?= $weight ?></td>
            </tr>
        </table>
    </div>
    <h3><br>Number of fairy type pokemons</h3>
    <div class="pokemons view content">
    <?php $typeTable = TableRegistry::get('pokemons')->find();
            $allFairy = $typeTable
            ->join([
                'types' => [
                'table' => 'pokemon_types',
                'type' => 'INNER',
                'conditions' => 'types.pokemon_id = pokemons.pokedex_number'],])
            ->where(['type_id' => 10]);
            $fairy = $allFairy->where(function($exp, $allFairy){
                return $exp->addCase(
                [ 
                    $allFairy->newExpr()->between('Pokemons.pokedex_number',1,151),
                    $allFairy->newExpr()->between('Pokemons.pokedex_number',252,386),
                    $allFairy->newExpr()->between('Pokemons.pokedex_number',722,809)
                ]
                ); })->count(); ?>
        <table>
            <tr>
                <th>1st, 3rd and 7th generation</th>
                <td><?= $fairy ?></td>
            </tr>
        </table>
    </div>
    <h3><br>TOP 10 fastest pokemon</h3>
    <div class="pokemons view content">
    <?
    /*
     * Using the ORM to take all values from "pokemons" and "pokemons_stats" where "stat_id" = 6, 
     * sorted in descending order 
     * 
     * Extraction of the column "pokemon_id" and convertion into Array() 
     * Same for column "name"
     * 
     * Using a loop for () to display the name of the pokemon that has the location of the ID-1 
     * contained in the "speed" array at the "$ i" location
     */
    ?>
    <?php $pokemonTable = TableRegistry::get('pokemons')->find();
                $statsTable = TableRegistry::get('pokemon_stats')->find()->where(['stat_id' => 6])->order(['value' => 'DESC']);
                $speed = $statsTable->extract('pokemon_id')->toArray();
                $name = $pokemonTable->extract('name')->toArray() ?>
        <table>
            <?php for ($i = 0; $i <= 9; $i++) {?>
                    <tr>
                        <th><?= $i+1 ?></th>
                        <td><?= $name[$speed[$i]-1] ?></td>
                    </tr>
            <?php } ?>
        </table>
    </div>
</div>
