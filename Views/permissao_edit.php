<div class="row">
    <div class="col-xl-12">
        <section class="hk-sec-wrapper">
        <form action="<?php echo BASE_URL;?>permissao/edit_action/<?php echo $permissao_id;?>" method="POST">
            <div class="hk-pg-header">
                <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="archive"></i></span></span>Editar Grupo</h4>
                <input type="submit" class="btn btn-gradient-primary btn-rounded" value="Alterar">
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
                                <label for="group_nome">Nome do Grupo</label>
                                <input type="text" class="form-control" value="<?php echo $permissao_grupo_nome;?>" name="nome" id="group_nome">
                            </div>
                        </div>

                        <?php foreach($permissao_itens as $item):?>
                            <div class="custom-control custom-checkbox">
                                <input
                                <?php echo(in_array($item['slug'], $permissao_grupo_slugs))?'checked="checked"':'';?> 
                                class="custom-control-input" id="item-<?php echo $item['id']?>" type="checkbox" value="<?php echo $item['id']?>" name="itens[]">
                                <label class="custom-control-label" for="item-<?php echo $item['id']?>"> <?php echo utf8_encode($item['nome']);?> </label>
                            </div>
                        <?php endforeach;?>

                    </form>
                </div>
            </div>
        </section>
    </div>
</div>