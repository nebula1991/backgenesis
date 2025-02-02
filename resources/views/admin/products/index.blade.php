@extends('adminlte::page')

@section('title', '')

@section('content_header')
<div class="row">
    <div class="col-12 text-center">
        <h1 class="text-uppercase">Productos</h1>
    </div>
</div>
    
        @if(session('success'))
        <div class="alert alert-success mt-2">
            {{session('success')}}
        </div>
        @endif
        @if(session('destroy'))
        <div class="alert alert-danger mt-2">
            {{session('destroy')}}
        </div>
        @endif
@stop

@section('content')
<div class="container-fluid py-4">
    <div class="row mx-md-12">
      

        <div class="col-12">
            <div class="row">
                
                    <div class="card">
                        <div class="card-header">

                            <a href="{{ route('admin.products.create') }}"
                                class="btn btn-outline-info text-uppercase float-end btn-sm"><i
                                    class="fa fa-solid fa-plus"></i> Crear Producto</a>
                            <a href="{{route('admin.products.pdf')}}" class="btn btn-outline-danger btn-sm"
                                target="_blank">
                                PDF</a>
                            <a href="{{route('admin.products.excel')}}" class="btn btn-outline-success btn-sm"
                                target="_blank">
                                XLS</a>
                        </div>
                        <div class="card-body">
                            <!-- Search and Filter Form -->
                            <form action="{{ route('admin.products.index') }}" method="GET" class="row g-3">
                                <div class="col-md-4">
                                    <input type="text" name="search" class="form-control form-control-sm"
                                        placeholder="Search" value="{{ request('search') }}">
                                </div>
                                <div class="col-md-3">
                                    <a href="{{ route('admin.products.index') }}"><button type="submit"
                                            class="btn btn-secondary btn-sm">Buscar</button></a>
                                </div>
                            </form>

                            <div class="table-responsive col-12 mt-3">
                                <table class="table table-striped table-hover">
                                    <thead class="thead">
                                        <tr>
                                            <th>Num</th>
                                            <th>Nombre</th>
                                            <th>Descripción</th>
                                            <th>Precio</th>
                                            <th>Imagen</th>
                                            <th>Categoria </th>
                                            <th>Subcategoria </th>
                                            <th>Acción</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($products as $product)
                                        <tr>
                                            <td>{{ ++$i }}</td>

                                            <td>{{ $product->name }}</td>
                                            <td>{{ $product->description }}</td>
                                            <td style="width: 80px;">{{number_format($product->price,2) }} €</td>
                                            <td>
                                                @if($product->image)
                                                <img src="{{ asset($product->image) }}" alt="Imagen del Producto"
                                                    width="50">
                                                @else
                                                No hay imagen
                                                @endif
                                            </td>
                                            <td >{{$product->category->name}}</td>

                                            <!-- Mostrar la subcategoría asociada -->
                                            <td>
                                                @if($product->subcategory)
                                                {{ $product->subcategory->name }}
                                                <!-- Nombre de la subcategoría -->
                                                @else
                                                No tiene subcategoría
                                                @endif
                                            </td>

                                            <td style="width: 150px;">
                                                <div class="d-flex">
                                                    <form action="{{ route('products.destroy',$product->id) }}"
                                                        method="POST">
                                                        <a class="btn btn-sm btn-primary me-2 "
                                                            href="{{ route('products.show',$product->id) }}"><i
                                                                class="fa fa-fw fa-eye"></i> </a>
                                                        <a class="btn btn-sm btn-success me-2"
                                                            href="{{ route('products.edit',$product->id) }}"><i
                                                                class="fa fa-fw fa-edit"></i> </a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm me-2"><i
                                                                class="fa fa-fw fa-trash"></i> </button>
                                                    </form>
                                                </div>
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
@endsection