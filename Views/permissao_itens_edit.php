<div class="row">

    <div class="col-xl-12">
        <section class="hk-sec-wrapper">
        <form action="<?php echo BASE_URL.'permissao/edit_itens_action/'?><?php echo $id_item?>" method="POST">
            <div class="hk-pg-header">
                <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="archive"></i></span></span>Nova Permissão</h4>
                <input type="submit" class="btn btn-gradient-primary btn-rounded" value="Atualizar">
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
                                <label for="group_nome">Nome Permissão</label>
                                <input type="text" class="form-control" value="<?php echo utf8_encode($nome);?>" name="nome" id="group_nome">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 form-group has-error">
                                <label for="group_nome">Slug</label>
                                <input type="text" class="form-control" value="<?php echo utf8_encode($slug);?>" name="slug" id="group_nome">
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </section>
    </div>
</div>