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
    <?php $typeTable = TableRegistry::get('pokemon_types')->find()->where(['type_id' => 10]);
            $fairy = $typeTable->count() ?>
        <table>
            <tr>
                <th>1st, 3rd and 7th generation</th>
                <td><?= $fairy ?></td>
            </tr>
        </table>
    </div>
    <h3><br>TOP 10 fastest pokemon</h3>
    <div class="pokemons view content">
    <?php $statsTable = TableRegistry::get('pokemon_stats')->find()->where(['stat_id' => 6])->order(['value' => 'DESC']);
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
