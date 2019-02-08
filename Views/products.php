<div class="row">
    <div class="col-xl-12">
        <section class="hk-sec-wrapper">
            <div class="hk-pg-header">
                <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="archive"></i></span></span>Produtos</h4>
               
                <a href="<?php echo BASE_URL.'products/add';?>" class="btn btn-gradient-primary btn-rounded">Adicionar</a>
            </div>
                <div class="row">
                    <div class="col-sm">
                        <div class="table-wrap">

                        <?php if(!empty(in_array('nome', $errorNome))):?>

                        <div class="alert alert-danger alert-wth-icon alert-dismissible fade show" role="alert">
                            <span class="alert-icon-wrap"><i class="zmdi zmdi-bug"></i></span> Favor editar uma info válida!
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <?php endif;?>

                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <thead>
                                        <tr>
                                            <th style="font-weight: bold;">Categoria</th>
                                            <th style="font-weight: bold;">Nome do produto</th>
                                            <th style="font-weight: bold;">Estoque</th>
                                            <th style="font-weight: bold;">Preço</th>
                                            <th style="font-weight: bold;">Ações</th>                   
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($list as $item):?>
                                        <tr>
                                            <td><?php echo utf8_encode($item['name_category']);?></td>
                                            <td><?php echo $item['name'];?><br/><small><?php echo $item['name_brand']?></small></td>
                                            <td><?php echo $item['stock'];?></td>
                                            <td>
                                                <small>
                                                    <strike>
                                                    R$ <?php echo number_format($item['price_from'], 2, ',', '.')?>
                                                    </strike>
                                                    <br>
                                                    R$ <?php echo number_format($item['price'], 2, ',', '.')?>
                                                </small>
                                            </td>
                                            <td> 
                                            <div class="btn-group mb-25 mr-10">
                                                <a href="<?php echo BASE_URL.'products/edit/'.$item['id'];?>" class="btn btn-gradient-info">Editar</a>
                                                <a href="<?php echo BASE_URL.'products/del/'.$item['id'];?>" class="btn btn-gradient-danger">Excluir</a>                                            
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