@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Productos</h1>
@stop

@section('content')
    <div class="container-fluid py-4">
        <div class="row mx-md-5">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/home">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="{{route('admin.category.index')}}">Categorias</a></li>
                        <li class="breadcrumb-item active" aria-current="products"><a href="{{route('admin.products.index')}}">Productos</a></li>
                    </ol>
                </nav>
            </div>

            <div class="col-12">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                
                                <a href="{{ route('admin.products.create') }}" class="btn btn-primary float-end btn-sm"><i class="fa fa-solid fa-plus"></i> Crear Producto</a>
                                <a href="{{route('admin.products.pdf')}}" class="btn btn-sm btn-success" target="_blank" > PDF</a>
                                <a href="{{route('admin.products.excel')}}" class="btn btn-sm btn-success" target="_blank" > XLS</a>
                            </div>
                            <div class="card-body">
                                <!-- Search and Filter Form -->
                                <form action="{{ route('admin.products.index') }}" method="GET" class="row g-3">
                                    <div class="col-md-4">
                                        <input type="text" name="search" class="form-control form-control-sm" placeholder="Search" value="{{ request('search') }}">
                                    </div>
                                    <div class="col-md-3">
                                        <a href="{{ route('admin.products.index') }}"><button type="submit" class="btn btn-secondary btn-sm">Search</button></a>
                                    </div>
                                </form>
                                
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover">
                                        <thead class="thead">
                                            <tr>
                                                <th>Num</th>
                                                <th>Nombre</th>
                                                <th>Descripción</th>
                                                <th>Imagen</th>
                                                <th>Categoria </th>
                                                <th>Acción</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($products as $product)
                                                <tr>
                                                    <td>{{ ++$i }}</td>
                                                    
											<td>{{ $product->name }}</td>
											<td>{{ $product->description }}</td>
											<td>{{ $product->image }}</td>
											<td>{{ $product->category_id }}</td>

                                                  <td>
                                                        <form action="{{ route('products.destroy',$product->id) }}" method="POST">
                                                            <a class="btn btn-sm btn-primary " href="{{ route('products.show',$product->id) }}"><i class="fa fa-fw fa-eye"></i> Show </a>
                                                            <a class="btn btn-sm btn-success" href="{{ route('products.edit',$product->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                                        </form>
                                                    </td> 
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {!! $products->appends(request()->query())->links() !!}
            </div>
        </div>
    </div>
@endsection
