<?php foreach($itens as $item):?>
<option <?php echo ($item['id'] == $selected)?'selected="selected"':''; ?> value="<?php echo $item['id']?>">
    <?php 
    for($q=0;$q<$level;$q++) echo '-- ';
    echo utf8_encode($item['name']);
    ?>
</option>

    
   
<?php
if(count($item['subs']) > 0){
    $this->loadView('categories_add_item', array(
        'itens' => $item['subs'],
        'level' => $level + 1,
        'selected' => $selected
    ));
}
?>

<?php endforeach;?>        
