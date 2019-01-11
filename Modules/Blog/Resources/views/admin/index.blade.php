@extends('layouts.backend.app')

@section('main-container')
    <main id="main-container">
        <!-- Page Content -->
        <!-- Hero -->
        <div class="bg-image bg-image-bottom" style="background-image: url('/assets/img/photos/photo34@2x.jpg');">
            <div class="bg-primary-dark-op">
                <div class="content content-top text-center overflow-hidden">
                    <div class="pt-50 pb-20">
                        <h1 class="font-w700 text-white mb-10 invisible" data-toggle="appear" data-class="animated fadeInUp">Blog Posts</h1>
                        <h2 class="h4 font-w400 text-white-op invisible" data-toggle="appear" data-class="animated fadeInUp">Bem vindo à sua área administrativa!</h2>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Hero -->
        <div class="content">
            <!-- Dynamic Table Full -->
            <div class="block">
                <div class="block-header block-header-default">
                    <h3 class="block-title"></h3> {{-- Necessário para alinhar o botão à direita --}}
                    <div class="block-options">
                        <a href="{{ route('post.create') }}">
                            <button class="btn btn-primary">
                                <span class="sidebar-mini-hide">
                                    <i class="si si-wallet mr-5"></i>
                                    {{ __('Adicionar Novo Post') }}
                                </span>
                            </button>
                        </a>
                    </div>
                    {{--  <h3 class="block-title">Posts</h3>  --}}
                </div>
                <div class="block-content block-content-full">
                    <!-- DataTables init on table by adding .js-dataTable-full class, functionality initialized in js/pages/be_tables_datatables.js -->
                    <table class="table table-responsive table-striped table-vcenter js-dataTable-custom">
                        <thead>
                            <tr>
                                <th class="text-center"></th>
                                <th>{{ __('Título') }}</th>
                                <th>{{ __('Pré-texto') }}</th>
                                <th >{{ __('Status') }}</th>
                                <th class="text-center"  style="width: 100px;">Profile</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)                                
                            <tr>
                                <td class="text-center">{{ $post->id }}</td>
                                <td class="font-w600">{{ $post->title }}</td>
                                <td class="d-none d-sm-table-cell">@truncate($post->excerpt,'100')</td>
                                <td class="d-none d-sm-table-cell">
                                    {!! $post->published_at !== null ? '<span class="badge badge-success">Publicado</span>' : '<span class="badge badge-danger">Não publicado</span>' !!}
                                </td>
                                <td class="text-center">                                    
                                    <div class="btn-group">
                                            <a class="btn btn-sm btn-secondary" data-toggle="tooltip" title="Ver" href="{{ route('post.show',$post) }}" target="_blank">
                                                <i class="fa fa-eye"></i>
                                            </a>   
                                            <a class="btn btn-sm btn-secondary" data-toggle="tooltip" title="Editar" href="{{ route('post.edit',$post) }}">
                                                <i class="fa fa-pencil"></i>
                                            </a>   
                                            <a class="btn btn-sm btn-secondary" data-toggle="tooltip" title="Excluir" href="">
                                                <i class="fa fa-times"></i>
                                            </a> 
                                    </div>
                                </td>
                            </tr>
                            @endforeach                     
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- END Dynamic Table Full -->

            
        
        </div>
        <!-- END Page Content -->
    </main>
@endsection

@push('scripts')
<!-- Page JS Plugins -->
@asset('assets/js/plugins/datatables/jquery.dataTables.min.js')
@asset('assets/js/plugins/datatables/dataTables.bootstrap4.min.js')
<!-- Page JS Code -->
@asset('assets/js/pages/be_tables_datatables.js')

@endpush

@push('stylesheet')
@asset('assets/js/plugins/datatables/dataTables.bootstrap4.min.css')

@endpush