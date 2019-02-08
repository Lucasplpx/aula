<div class="row">
    <div class="col-xl-12">
        <section class="hk-sec-wrapper">
        <form action="<?php echo BASE_URL.'pages/add_action'?>" method="POST">
            <div class="hk-pg-header">
                <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="archive"></i></span></span>Nova Página</h4>
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
                    
                        <div class="row">
                            <div class="col-md-12 form-group has-error">
                                <label for="page_title">Título da página</label>
                                <input type="text" class="form-control" name="title" id="page_title">
                            </div>
                        </div>                                              

                         <div class="row">
                            <div class="col-md-12 form-group has-error">
                                <label for="page_body">Corpo da página</label>
                                <textarea name="body" id="page_body" cols="30" rows="10"></textarea>
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
        selector:'#page_body',
        height: 500,
        menubar: false,
        plugins: [
            'textcolor image media lists'
        ],
        toolbar: 'undo redo | formatselect | bold italic backcolor | media image | alignleft aligncenter alignright alignjustify | bullist numlist | removeformat',
        automatic_uploads: true,
        file_picker_types: 'image',
        images_upload_url:'<?php echo BASE_URL; ?>pages/upload'
    });
</script>