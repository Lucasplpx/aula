<div class="row">
    <div class="col-xl-12">
        <section class="hk-sec-wrapper">
        <form action="<?php echo BASE_URL.'brands/add_edit_action/'?><?php echo $lista['id'];?> " method="POST">
            <div class="hk-pg-header">
                <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="archive"></i></span></span>+ Marcas</h4>
                <input type="submit" class="btn btn-gradient-primary btn-rounded" value="Editar">
            </div>
            <div class="row">
                <div class="col-sm">
                    <?php if(!empty(in_array('name', $errorNome))):?>

                        <div class="alert alert-danger alert-wth-icon alert-dismissible fade show" role="alert">
                            <span class="alert-icon-wrap"><i class="zmdi zmdi-bug"></i></span> Favor preecher o campo marca!
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                    <?php endif;?>
                    
                        <div class="row">
                            <div class="col-md-12 form-group has-error">
                                <label for="group_nome">Nome da Marca</label>
                                <input type="text" class="form-control" value="<?php echo $lista['name'];?>" name="nome" id="group_nome">
                            </div>
                        </div>
                       
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>