<div class="row">
    <div class="col-xl-12">
        <section class="hk-sec-wrapper">
            <div class="hk-pg-header">
                <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="archive"></i></span></span>Categorias</h4>
               
                <a href="<?php echo BASE_URL.'categories/add';?>" class="btn btn-gradient-primary btn-rounded">Adicionar</a>
            </div>
                <div class="row">
                    <div class="col-sm">
                        <div class="table-wrap">
                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <thead>
                                        <tr>
                                            <th style="font-weight: bold;">Nome da Categoria</th>
                                          
                                            <th style="font-weight: bold;">Ações</th>                   
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $this->loadView('categories_item', array(
                                            'itens' => $list,
                                            'level' => 0
                                        ));?>
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