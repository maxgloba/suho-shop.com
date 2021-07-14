<div class="sort">
  <span>Сортировка:</span>
  <a href="<?php echo home_url().'/category?cat='.$_GET['cat'].'&orderby=price&order=ASC'; ?>" class="<?php echo ($_GET['orderby'] == 'price' && $_GET['order'] == 'ASC') ? 'active' : ''; ?>" >От дешевых к дорогим</a>
  <a href="<?php echo home_url().'/category?cat='.$_GET['cat'].'&orderby=price&order=DESC'; ?>" class="<?php echo ($_GET['orderby'] == 'price' && $_GET['order'] == 'DESC') ? 'active' : ''; ?>" >От дорогих к дешевым</a>
  <a href="<?php echo home_url().'/category?cat=23'; ?>" class="<?php echo ($_GET['cat'] == 23) ? 'active' : ''; ?>" >Популярные</a>
  <a href="<?php echo home_url().'/category?cat=22'; ?>" class="<?php echo ($_GET['cat'] == 22) ? 'active' : ''; ?>" >Новинки</a>
  <a href="<?php echo home_url().'/category?cat=21'; ?>" class="<?php echo ($_GET['cat'] == 21) ? 'active' : ''; ?>" >Акционные</a>
</div>