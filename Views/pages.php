<div class="row">
    <div class="col-xl-12">
        <section class="hk-sec-wrapper">
            <div class="hk-pg-header">
                <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="archive"></i></span></span>Paginas</h4>
               
                <a href="<?php echo BASE_URL.'pages/add';?>" class="btn btn-gradient-primary btn-rounded">Adicionar</a>
            </div>
                <div class="row">
                    <div class="col-sm">
                        <div class="table-wrap">
                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <thead>
                                        <tr>
                                            <th style="font-weight: bold;">Nome da Página</th>                                            
                                            <th style="font-weight: bold;">Ações</th>                   
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($list as $item):?>
                                        <tr>
                                            <td><?php echo utf8_encode($item['title']);?></td>                                            
                                            <td> 
                                            <div class="btn-group mb-25 mr-10">
                                                <a href="<?php echo BASE_URL.'pages/edit/'.$item['id'];?>" class="btn btn-gradient-info">Editar</a>
                                                <a href="<?php echo BASE_URL.'pages/del/'.$item['id'];?>" class="btn btn-gradient-danger">Excluir</a>
                                            
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