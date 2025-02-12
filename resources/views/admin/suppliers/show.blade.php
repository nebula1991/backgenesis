@extends('adminlte::page')

@section('content')
<section class="container-fluid py-4">
    <div class="row mx-md-5">

        <div class="col-md-12">
            <div class="card">

                <div class="card-header">
                    <a class="btn btn-primary float-end btn-sm" href="{{ route('admin.suppliers.index') }}"> Atras </a>
                    <div class="row">
                        <div class="col-md-6">
                            <strong>Nombre:</strong>
                            {{ $supplier->name }}
                        </div>
                        <div class="col-md-6">
                            <strong>Email:</strong>
                            {{ $supplier->email }}
                        </div>
                        <div class="col-md-6">
                            <strong>Dirección:</strong>
                            {{ $supplier->address }}
                        </div>
                        <div class="col-md-6">
                            <strong>Email:</strong>
                            {{ $supplier->phone }}
                        </div>
                    </div>
                </div>
                <div class="card-body">

                    <div class="container">
                        <h1>Pedidos Realizados</h1>

               
                        @if ($events->isEmpty())
                            <div class="alert alert-warning">No se han realizado pedidos a este proveedor </div>

                        @else
                        <div class="table-responsive col-12 mt-3">
                            <table class="table table-striped table-hover text-uppercase">
                                <thead class="thead text-center thead-dark">
                                    <tr>
                                        <th>Num</th>
                                        <th>Titulo</th>
                                        <th>Producto</th>
                                        <th>Descripción</th>
                                        <th>Unidades</th>
                                        <th>Precio</th>
                                        <th>Fecha</th>
                                        <th>Acción</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    @foreach ($events as $event)
                                    <tr class="text-center">
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $event->title }}</td>
                                        <td>{{ $event->product->name }}</td>
                                        <td>{{ $event->product->description }}</td>
                                        <td>{{ $event->units }}</td>
                                        <td>{{ $event->price }}</td>
                                        <td>{{ $event->start }}</td>
                                     
                                 

                                  

                                        <td style="width: 150px;">
                                            <div class="d-flex">
                                                {{-- <form action="{{ route('admin.products.destroy',$product->id) }}"
                                                    method="POST">
                                                    <a class="btn btn-sm btn-primary me-2 "
                                                        href="{{ route('admin.products.show',$product->id) }}"><i
                                                            class="fa fa-fw fa-eye"></i> </a>
                                                    <a class="btn btn-sm btn-warning me-2"
                                                        href="{{ route('admin.products.edit',$product->id) }}"><i
                                                            class="fa fa-fw fa-edit"></i> </a>
                                                    @csrf
                                                    @method('DELETE')
                                                    @role('admin')
                                                        <button type="submit" class="btn btn-danger btn-sm me-2"><i
                                                                class="fa fa-fw fa-trash"></i> 
                                                        </button>
                                                    @endrole
                                                </form> --}}
                                            </div>
                                        </td>

                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @endif
                        </div>


         



                    </div>
                    

            


                </div>
            </div>
        </div>
</section>
@endsection