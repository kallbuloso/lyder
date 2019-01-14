@extends('layouts.backend.app')

@section('main-container')
    <main id="main-container">
        <!-- Page Content -->
        <!-- Hero -->
        <div class="bg-image bg-image-bottom" style="background-image: url('/assets/img/photos/photo34@2x.jpg');">
            <div class="bg-primary-dark-op">
                <div class="content content-top text-center overflow-hidden">
                    <div class="pt-50 pb-20">
                        <h1 class="font-w700 text-white mb-10 invisible" data-toggle="appear" data-class="animated fadeInUp">Editar Artigo</h1>
                        <h2 class="h4 font-w400 text-white-op invisible" data-toggle="appear" data-class="animated fadeInUp">Vamos editar o artigo "{{ $post->title }}"</h2>
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
            @formOpen('class'=>'form-horizontal push-5-t','route'=>['post.update', $post])
                {{ method_field('PUT') }}
                <div class="row">
                    <div class="col-md-8">
                        <div class="block">
                            <div class="block-content">
                                <div class="form-group">
                                    @text(['col'=>'12','label'=>'Título do post','name'=>'title', 'value'=>$post->title,
                                            'attributes'=>['placeholder'=>'Título do post', 
                                            'class'=>'js-maxlength form-control',
                                            'maxlength'=>'50',
                                            'require', 'disabled']])
                                </div>
                                <div class="form-group">
                                    @textArea(['col'=>'12','label'=>'Resumo do post','name'=>'excerpt','value'=>$post->excerpt,
                                            'attributes'=>['placeholder'=>'Resumo do post', 'rows'=>2,'cols'=>54,
                                            'class'=>'form-control js-maxlength',
                                            'maxlength'=>'150',
                                            'require']])
                                </div>
                                <div class="form-group">
                                    @textArea(['col'=>'12','label'=>'Artigo','name'=>'body','value'=>$post->body,
                                            'attributes'=>['id'=>'js-ckeditor','require'=>'require']])
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="block">
                            <div class="block-content">
                                <div class="form-group">
                                    @datetime(['col'=>'12','label'=>'Data de publicação','name'=>'published_at','value'=>$post->published_at !== null ? date('d/m/Y', strtotime($post->published_at)) : null,
                                            'attributes'=>['class'=>'js-datepicker form-control',
                                            'placeholder'=>'dd/mm/yyyy']])
                                </div>
                                <div class="form-group">
                                    @select(['col'=>'12','label'=>'Categoria','name'=>'category_id','arrayOptions'=>['< Selecione uma categoria >'=>$categories],'selected'=>$post->category_id,
                                            'optionsAttributes'=>['data-placeholder'=>'< Selecione uma categoria >','require'=>'require']])
                                </div>
                                <div class="form-group">
                                    @select(['col'=>'8','label'=>'Tags','name'=>'tags[]','arrayOptions'=>['Para várias tag\'s segure a tecla Ctrl' => $tags],
                                        'selected'=>$post->tags->pluck('id'),
                                            'optionsAttributes'=>['data-placeholder'=>'Selecione uma ou mais Tag\'s','class'=>'js-select2 form-control','multiple']])
                                </div>
                                <div class="form-group">
                                    <label for="images">Imagens</label>
                                    <div class="dropzone"></div>
                                </div>
                                <div class="form-group">
                                    @button(['value'=>'Salvar artigo','attributes'=>['class'=>'btn btn-primary btn-block', 'type'=>'submit']])
                                </div>
                            </div>
                        </div>
                    </div>                    
                </div>
            @formClose()
            @if ($post->photos->count() >= 1)                    
                <div class="row">
                    <div class="col-md-12">
                        <div class="block">
                            <div class="block-header block-header-default">                    
                                <h2 class="block-title">Galeria de imagens</h2>
                            </div>
                            <div class="block-content block-content-full">
                                <div class="row items-push js-gallery">
                                @foreach ($post->photos as $photo)
                                    <div class="col-md-4 col-xl-3 animated fadeIn">
                                        <div class="options-container fx-item-zoom-in fx-overlay-slide-down">
                                            <img class="img-fluid-custom img-responsive" src="{{ url($photo->url) }}" alt="">
                                            <div class="options-overlay bg-black-op-75">
                                                @formOpen('route'=>['photos.destroy', $photo])
                                                {{ method_field('DELETE') }}
                                                <div class="options-overlay-content">
                                                    <h3 class="h4 text-white mb-5"><a class="img-lightbox" href="{{ url($photo->url) }}">{{ __('Ver Imagem') }}</a></h3>
                                                    {{--  <h4 class="h6 text-white-op mb-15"></h4>   --}}
                                                    <p></p>

                                                    <button class="btn btn-sm btn-rounded btn-noborder btn-alt-danger min-width-75" type="submit" href="javascript:void(0)">
                                                        <i class="fa fa-times"></i> Excluir
                                                    </button>
                                                    <a class="btn btn-sm btn-rounded btn-noborder btn-alt-primary min-width-75" href="javascript:void(0)" data-clipboard-text="{{ url($photo->url) }}">
                                                        <i class="fa fa-edit"></i> Copiar link
                                                    </a>
                                                </div>
                                                @formClose()                     
                                            </div>
                                        </div>
                                    </div>

                                @endforeach                          
                            </div>
                
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            <!-- END Dynamic Table Full -->
        </div>
        <!-- END Page Content -->
    </main>
@endsection

@push('scripts')
    @asset('assets/js/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js')
    @asset('assets/js/plugins/ckeditor/ckeditor.js')
    @asset('assets/js/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')
    @asset('assets/js/plugins/bootstrap-datepicker/locales/bootstrap-datepicker.pt-BR.min.js')
    @asset('assets/js/plugins/select2/select2.full.min.js')
    @asset('assets/js/plugins/dropzonejs/min/dropzone.min.js')
    @asset('assets/js/plugins/magnific-popup/magnific-popup.min.js')
    @asset('assets/js/plugins/clipboard.js/dist/clipboard.min.js')

    <script>
        new ClipboardJS('.btn');
        jQuery(function () {
            Codebase.helpers(['datepicker', 'notify', 'magnific-popup', 'ckeditor','colorpicker', 'maxlength', 'select2', 'rangeslider', 'tags-inputs']);
        });
        var myDropzone = new Dropzone('.dropzone', {
            headers: {    
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },    
            //url: '{{ route('photos.store', $post->id) }}', 
            url: '{{ route('photos.store', $post->url) }}', 
            //createImageThumbnails: false,   
            acceptedFiles: 'image/*',    
            paramName: 'photo',    
            maxFilesize: 2,    
            // maxFiles: 2,    
            dictDefaultMessage: 'Arraste as imagens ou clique aqui para upload',
            dictFileTooBig: 'O arquivo é maior que o tamanho permitido. Tamanho máximo  : 2MB.',
            dictFallbackMessage : 'Seu navegador não admite enviar arquivos com \"arrastar e soltar\".',
            // dictFallbackText : 'Utilice el formulario de respaldo a continuación para cargar sus archivos como en los días anteriores.',
            dictInvalidFileType : 'Este arquivo não é permitido...',
            dictResponseError : 'Servidor respondeu com o código 400.',
            dictCancelUpload : 'Cancelar upload',
            dictCancelUploadConfirmation : '¿Estás seguro de que quieres cancelar esta carga?',
            dictCancelUploadConfirmation : 'Tem certeza que quer cancelar o upload?',
            dictRemoveFile : 'Remover arquivo',
            dictMaxFilesExceeded : 'Não pode subir mais arquivos.'
        });
        Dropzone.autoDiscover = false;
        myDropzone.on('error', function(file, res){
            var msg = res.photo[0];    
            $('.dz-error-message:last > span').text(msg);    
        });
        
    </script>
@endpush


@push('stylesheet')
    @asset('assets/js/plugins/datatables/dataTables.bootstrap4.min.css')
    @asset('assets/js/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')
    @asset('assets/js/plugins/select2/select2.min.css')
    @asset('assets/js/plugins/select2/select2-bootstrap.min.css')
    @asset('assets/js/plugins/jquery-tags-input/jquery.tagsinput.min.css')
    @asset('assets/js/plugins/magnific-popup/magnific-popup.min.css')
    {{--  @asset('https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.css')  --}}
    @asset('assets/js/plugins/dropzonejs/min/dropzone.min.css')
@endpush