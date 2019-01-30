<?php foreach($itens as $item):?>
<tr>
    <td><?php 
    for($q=0;$q<$level;$q++) echo '-- ';
    echo utf8_encode($item['name']);?>
    </td>
    
    <td> 
    <div class="btn-group mb-25 mr-10">
        <a href="<?php echo BASE_URL.'categories/edit/'.$item['id'];?>" class="btn btn-gradient-info">Editar</a>
        <a href="<?php echo BASE_URL.'categories/del/'.$item['id'];?>" class="btn btn-gradient-danger">Excluir</a>
    
    </div>
    </td>
</tr>
<?php
if(count($item['subs']) > 0){
    $this->loadView('categories_item', array(
        'itens' => $item['subs'],
        'level' => $level + 1
    ));
}
?>

<?php endforeach;?>        
