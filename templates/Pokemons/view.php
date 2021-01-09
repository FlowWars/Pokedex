<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pokemon $pokemon
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(__('Delete Pokemon'), ['action' => 'delete', $pokemon->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pokemon->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Pokemons'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="pokemons view content">
            <h3><?= h($pokemon->name) ?></h3>
            <table>
                <tr>
                    <td><?= $this->Html->image($pokemon->main_sprite) ?></td>
                </tr> 
                <?
                /*
                 * Array $name which contain the differents names of the pokemons' stats.
                 * Foreach which associate the stats' names with the right value
                 */
                ?>
                <?php $name = array("HP", "Defense", "Attack", "Special attach", "Special defense", "Speed");
                        foreach ($pokemon->pokemon_stats as $key => $pokemonStats) : ?>
                        <tr>
                            <th><?php print($name[$key]) ?></th>
                            <td><?= $this->Number->format($pokemonStats->value) ?></td>
                        </tr>
                <?php endforeach; ?>
            </table>    
        </div>
    </div>
</div>