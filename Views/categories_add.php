<div class="row">
    <div class="col-xl-12">
        <section class="hk-sec-wrapper">
        <form action="<?php echo BASE_URL.'categories/add_action'?>" method="POST">
            <div class="hk-pg-header">
                <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="archive"></i></span></span>Categorias</h4>
                <input type="submit" class="btn btn-gradient-primary btn-rounded" value="Salvar">
            </div>
            <div class="row">
                <div class="col-sm">
                    <?php if(!empty(in_array('name', $errorItems))):?>

                        <div class="alert alert-danger alert-wth-icon alert-dismissible fade show" role="alert">
                            <span class="alert-icon-wrap"><i class="zmdi zmdi-bug"></i></span> Favor preecher o campos!
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                    <?php endif;?>
                    
                        <div class="row">
                            <div class="col-md-12 form-group has-error">
                                <label for="group_nome">Nome da Categoria</label>
                                <input type="text" class="form-control" name="name" id="group_nome">
                            </div>
                        </div>
                                                
                        <label for="cat_sub">Categoria Pai</label>
                        <select name="sub" id="cat_sub" class="form-control custom-select  mt-12">
                            <option value="" selected>Nenhuma</option>
                            <?php                              
                                $this->loadView('categories_add_item', array(
                                    'itens' => $list,
                                    'level' => 0
                                ));                           
                            ?>
                        </select>
                     
                        

                    </form>
                </div>
            </div>
        </section>
    </div>
</div>