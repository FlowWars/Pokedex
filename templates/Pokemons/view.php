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
            <h3 class="name"><?= h($pokemon->name) ?></h3>       
            <div class="slider">
                <input type="radio" name="toggle" id="btn-1" checked>
                <input type="radio" name="toggle" id="btn-2">
                <input type="radio" name="toggle" id="btn-3">
                <input type="radio" name="toggle" id="btn-4">

                <div class="slider-controls">
                    <label for="btn-1"></label>
                    <label for="btn-2"></label>
                    <label for="btn-3"></label>
                    <label for="btn-4"></label>
                </div>

                <ul class="slides">
                    <li class="slide">
                    <p class="slide-image">
                        <?= $this->Html->image($pokemon->main_sprite) ?>
                    </p>
                    </li>
                    <li class="slide">
                        <p class="slide-image">
                        <?= $this->Html->image($pokemon->back_sprite); ?>
                        </p>
                    </li>
                    <li class="slide">
                        <p class="slide-image">
                        <?= $this->Html->image($pokemon->front_shiny_sprite); ?>
                        </p>
                    </li>
                    <li class="slide">
                        <p class="slide-image">
                        <?= $this->Html->image($pokemon->back_shiny_sprite); ?>
                        </p>
                    </li>
                </ul>
            </div>
                <?
                /*
                 * Pokemons' types taken from in the object "$pokemon"
                 */
                ?>
                    <p class="type1"><?= $pokemon->first_type ?></p>
                    <?php if (isset($pokemon->second_type) && !empty($pokemon->second_type)) :?>
                        <p class="type2"><?= $pokemon->second_type ?></p>
                    <?php endif; ?>    
                <?
                /*
                 * Array $name which contain the differents names of the pokemons' stats.
                 * Foreach which associate the stats' names with the right value
                 */
                ?>
                <table>
                <?php $name = array("HP", "Defense", "Attack", "Special attack", "Special defense", "Speed");
                        foreach ($pokemon->pokemon_stats as $key => $pokemonStats) : ?>
                        <tr>
                            <th ><?php print($name[$key]) ?></th>
                            <td ><?= $this->Number->format($pokemonStats->value) ?></td>
                        </tr>
                <?php endforeach; ?>
            </table>    
        </div>
    </div>
</div>
