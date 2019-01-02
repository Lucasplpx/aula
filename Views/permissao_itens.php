<div class="row">
    <div class="col-xl-12">
        <section class="hk-sec-wrapper">
            <div class="hk-pg-header">
                <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="archive"></i></span></span>Itens de Permissões</h4>
               
                <a href="<?php echo BASE_URL.'permissao/itens_add';?>" class="btn btn-gradient-primary btn-rounded">Adicionar</a>
            </div>
                <div class="row">
                    <div class="col-sm">
                        <div class="table-wrap">
                            <div class="table-responsive">

                            <?php if(!empty(in_array('delete', $error_del))):?>

                            <div class="alert alert-danger alert-wth-icon alert-dismissible fade show" role="alert">
                                <span class="alert-icon-wrap"><i class="zmdi zmdi-bug"></i></span> Registro possui associações
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <?php endif;?>
                                <table class="table mb-0">
                                    <thead>
                                        <tr>
                                            <th style="font-weight: bold;">Nome do item de permissão</th>       
                                            <th style="font-weight: bold;">Slug</th>                  
                                            <th style="font-weight: bold;">Ações</th>                   
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($list as $item):?>
                                        <tr>
                                            <td><?php echo utf8_encode($item['nome']);?></td>
                                            <td><?php echo $item['slug'];?></td>
                                            <td> 
                                            <div class="btn-group mb-25 mr-10">
                                                <a href="<?php echo BASE_URL.'permissao/itens_edit/'.$item['id'];?>" class="btn btn-gradient-info">Editar</a>                                                                                       
                                                <a href="<?php echo BASE_URL.'permissao/itens_del/'.$item['id'];?>" class="btn btn-gradient-danger">Excluir</a>
                                            
                                            </div>
                                            </td>
                                        </tr>
                                        <?php endforeach;?>                 
                                    </tbody>                    
                                </table>
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>