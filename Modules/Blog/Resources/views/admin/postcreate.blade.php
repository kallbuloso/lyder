@extends('layouts.backend.app')

@section('main-container')
    <main id="main-container">
        <!-- Page Content -->
        <!-- Hero -->
        <div class="bg-image bg-image-bottom" style="background-image: url('/assets/img/photos/photo34@2x.jpg');">
            <div class="bg-primary-dark-op">
                <div class="content content-top text-center overflow-hidden">
                    <div class="pt-50 pb-20">
                        <h1 class="font-w700 text-white mb-10 invisible" data-toggle="appear" data-class="animated fadeInUp">Novo Artigo</h1>
                        <h2 class="h4 font-w400 text-white-op invisible" data-toggle="appear" data-class="animated fadeInUp">Vamos criar um novo Artigo!</h2>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Hero -->
        <div class="content">
            <!-- Bootstrap Design -->
            @if (session()->has('flash'))
            <h2 class="content-heading">
                    <div class="alert alert-success">{{ session('flash') }}</div>
                </h2>
            @endif
            @formOpen('class'=>'form-horizontal push-5-t','route'=>['post.store'])
                <div class="row">
                    <div class="col-md-8">
                        <div class="block">
                            <div class="block-content">
                                <div class="form-group">
                                    @text(['col'=>'12','label'=>'Título do post (Atenção!!! Depois de salvo, o título não poderá ser alterado)','name'=>'title','value'=>null,
                                            'attributes'=>['placeholder'=>'Título do post', 
                                            'class'=>'js-maxlength form-control',
                                            'maxlength'=>'50',
                                            'require']])
                                </div>
                                <div class="form-group">
                                    @textArea(['col'=>'12','label'=>'Resumo do post','name'=>'excerpt','value'=>null,
                                            'attributes'=>['placeholder'=>'Resumo do post', 'rows'=>2,'cols'=>54,
                                            'class'=>'form-control js-maxlength',
                                            'maxlength'=>'150',
                                            'require']])
                                </div>
                                <div class="form-group">
                                    @textArea(['col'=>'12','label'=>'Artigo','name'=>'body','value'=>null,
                                            'attributes'=>['id'=>'js-ckeditor','require'=>'require']])
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="block">
                            <div class="block-content">
                                <div class="form-group">
                                    @datetime(['col'=>'12','label'=>'Data de publicação','name'=>'published_at','value'=>null,
                                            'attributes'=>['class'=>'js-datepicker form-control',
                                            'placeholder'=>'dd/mm/yyyy']])
                                </div>
                                <div class="form-group">
                                    @select(['col'=>'4','label'=>'Categoria','name'=>'category_id','arrayOptions'=>$categories,'selected'=>null,
                                            'optionsAttributes'=>['placeholder'=>'< Selecione uma categoria >','require'=>'require']])
                                </div>
                                <div class="form-group">
                                    @select(['col'=>'4','label'=>'Tags','name'=>'tags[]','arrayOptions'=>['Para várias tag\'s segure a tecla Ctrl' => $tags], 
                                            'optionsAttributes'=>['data-placeholder'=>'Selecione uma ou mais Tag\'s','class'=>'js-select2 form-control','multiple']])
                                </div>
                                <div class="form-group">
                                    <label for="images">Imagens</label>
                                    <div class="dropzone">{{ __('Por questão de segurança e integridade ao servidor, imagens só poderão ser adicionadas depois de salvar esta postagem') }}</div>
                                </div>
                                <div class="form-group">
                                    @button(['value'=>'Salvar artigo','attributes'=>['class'=>'btn btn-primary btn-block', 'type'=>'submit']])
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @formClose()
            <!-- END Dynamic Table Full -->
        </div>
        <!-- END Page Content -->
    </main>
@endsection

@push('scripts')
    <!-- Page JS Plugins -->
    @asset('assets/js/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js')
    @asset('assets/js/pages/be_tables_datatables.js')
    @asset('assets/js/plugins/ckeditor/ckeditor.js')
    @asset('assets/js/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')
    @asset('assets/js/plugins/bootstrap-datepicker/locales/bootstrap-datepicker.pt-BR.min.js')
    @asset('assets/js/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js')
    @asset('assets/js/plugins/select2/select2.full.min.js')
    @asset('assets/js/pages/be_forms_plugins.js')
    <!-- Page JS Code -->
    <script>
        jQuery(function () {
            Codebase.helpers(['datepicker', 'notify', 'ckeditor','colorpicker', 'maxlength', 'select2', 'rangeslider', 'tags-inputs']);
        });
    </script>
@endpush


@push('stylesheet')
@asset('assets/js/plugins/datatables/dataTables.bootstrap4.min.css')
@asset('assets/js/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')
@asset('assets/js/plugins/select2/select2.min.css')
@asset('assets/js/plugins/select2/select2-bootstrap.min.css')
@asset('assets/js/plugins/jquery-tags-input/jquery.tagsinput.min.css')
@endpush