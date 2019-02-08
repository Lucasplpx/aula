<div class="row">
    <div class="col-xl-12">
        <section class="hk-sec-wrapper">
        <form action="<?php echo BASE_URL.'products/add_action'?>" method="POST">
            <div class="hk-pg-header">
                <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="archive"></i></span></span>Novo Produto</h4>
                <input type="submit" class="btn btn-gradient-primary btn-rounded" value="Salvar">
            </div>
            <div class="row">
                <div class="col-sm">
                    <?php if(!empty(in_array('title', $errorItems))):?>

                        <div class="alert alert-danger alert-wth-icon alert-dismissible fade show" role="alert">
                            <span class="alert-icon-wrap"><i class="zmdi zmdi-bug"></i></span> Favor preecher o campo Title!
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                    <?php endif;?>

                    <?php if(!empty(in_array('body', $errorItems))):?>

                        <div class="alert alert-danger alert-wth-icon alert-dismissible fade show" role="alert">
                            <span class="alert-icon-wrap"><i class="zmdi zmdi-bug"></i></span> Favor preecher o campo Body!
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                    <?php endif;?>

                        <label for="p_cat">Categoria</label>
                        <select name="id_category" id="p_cat" class="form-control custom-select  mt-12">
                            <option value="" selected>Nenhuma</option>
                            <?php                              
                                $this->loadView('products_add_item', array(
                                    'itens' => $catList,
                                    'level' => 0
                                ));                           
                            ?> 
                        </select>

                        <label for="p_brand">Marca</label>
                        <select name="id_brand" id="p_brand" class="form-control custom-select  mt-12">
                            <option value="" selected>Nenhuma</option>
                            <?php foreach ($list as $item): ?>
                                <option value="<?php echo $item['id']?>" selected><?php echo $item['name']?></option>        
                            <?php endforeach; ?>
                        </select>
                   
                        <div class="row">
                            <div class="col-md-12 form-group has-error">
                                <label for="p_name">Nome do Produto</label>
                                <input type="text" class="form-control" name="name" id="p_name">
                            </div>
                        </div>                                              

                        <div class="row">
                            <div class="col-md-12 form-group has-error">
                                <label for="p_stock">Estoque Disponivel</label>
                                <input type="number" class="form-control" name="stock" id="p_stock">
                            </div>
                        </div>        

                        <div class="row">
                            <div class="col-md-12 form-group has-error">
                                <label for="p_price_from">Preço (de)</label>
                                <input type="text" class="form-control" name="price_from" id="p_price_from">
                            </div>
                        </div>   
                        
                        <div class="row">
                            <div class="col-md-12 form-group has-error">
                                <label for="p_price">Preço (por)</label>
                                <input type="text" class="form-control" name="price" id="p_price">
                            </div>
                        </div>   

                        <hr>

                        <div class="row">
                            <div class="col-md-12 form-group has-error">
                                <label for="p_weight">Peso (em Kg)</label>
                                <input type="text" class="form-control" name="weight" id="p_weight">
                            </div>
                        </div>   

                        <div class="row">
                            <div class="col-md-12 form-group has-error">
                                <label for="p_width">Largura (em Cm)</label>
                                <input type="text" class="form-control" name="width" id="p_width">
                            </div>
                        </div> 

                        <div class="row">
                            <div class="col-md-12 form-group has-error">
                                <label for="p_height">Altura (em Cm)</label>
                                <input type="text" class="form-control" name="height" id="p_height">
                            </div>
                        </div> 

                        <div class="row">
                            <div class="col-md-12 form-group has-error">
                                <label for="p_lenght">Comprimento (em Cm)</label>
                                <input type="text" class="form-control" name="lenght" id="p_lenght">
                            </div>
                        </div> 

                        
                        <div class="row">
                            <div class="col-md-12 form-group has-error">
                                <label for="p_diameter">Diametro (em Cm)</label>
                                <input type="text" class="form-control" name="diameter" id="p_diameter">
                            </div>
                        </div> 


                         <div class="row">
                            <div class="col-md-12 form-group has-error">
                                <label for="p_description">Descrição do Produto</label>
                                <textarea name="body" id="p_description" cols="30" rows="10"></textarea>
                            </div>
                        </div>        
                        <hr>
                            
                        <div class="row">
                            <div class="col-md-12 form-group has-error">
                                <label for="p_featured">Em Destaque</label> <br>
                                <input type="checkbox" name="featured" id="p_featured">
                            </div>
                        </div> 

                        <div class="row">
                            <div class="col-md-12 form-group has-error">
                                <label for="p_sale">Em Promoção</label> <br>
                                <input type="checkbox" name="sale" id="p_sale">
                            </div>
                        </div> 

                        <div class="row">
                            <div class="col-md-12 form-group has-error">
                                <label for="p_bestseller">Mais Vendidos</label> <br>
                                <input type="checkbox" name="bestseller" id="p_bestseller">
                            </div>
                        </div> 

                        <div class="row">
                            <div class="col-md-12 form-group has-error">
                                <label for="p_new_product">Novo Produto</label> <br>
                                <input type="checkbox" name="new_product" id="p_new_product">
                            </div>
                        </div> 
                    
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>

<script src=https://cloud.tinymce.com/5-testing/tinymce.min.js?apiKey=y1fjdjjow0mthmepodudajefplymhoy13gouoc1j1rk07zbs></script>
<script>
    tinymce.init({
        selector:'#p_description',
        height: 500,
        menubar: false,
        plugins: [
            'textcolor image media lists'
        ],
        toolbar: 'undo redo | formatselect | bold italic backcolor | media image | alignleft aligncenter alignright alignjustify | bullist numlist | removeformat',
    });
</script>