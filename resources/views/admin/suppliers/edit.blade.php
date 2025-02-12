@extends('adminlte::page')

@section('title', '')

@section('content_header')
<div class="row">
    <div class="col-12 text-center">
        <h1 class="text-uppercase">Actualizar Proveedor</h1>
    </div>
</div>
@stop

@section('content')
    <section class=" container-fluid py-4">
        <div class="row mx-md-5">
        
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header">
                            <a class="btn btn-primary float-end btn-sm" href="{{ route('admin.suppliers.index') }}"> Atras </a>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.suppliers.update', $supplier->id) }}" class="row g-3">
                            {{ method_field('PATCH') }}
                            @csrf

                            <div class="col-md-6">
                                <label for="name">Proveedor</label>
                                <input class="form-control @error('name') is-invalid @enderror" placeholder="Nombre" name="name" type="text" value="{{ old('name',@$supplier->name) }}" id="name">
                                @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        
                        
                            <div class="col-md-6">
                                <label for="email">Email</label>
                                <input class="form-control @error('email') is-invalid @enderror" placeholder="Email" name="email" type="email" value="{{ old('email',@$supplier->email) }}" id="email">
                                @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="address">Dirección</label>
                                <input class="form-control @error('address') is-invalid @enderror" placeholder="Dirección" name="address" type="text" value="{{ old('address',@$supplier->address) }}" id="address">
                                @error('address')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="phone">Telefono</label>
                                <input class="form-control @error('email') is-invalid @enderror" placeholder="Teléfono" name="phone" type="text" value="{{ old('phone',@$supplier->phone) }}" id="phone">
                                @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        

                            <div class="col-md-6 mt-2 d-flex float-end">
                                <button type="submit" class="btn btn-success">Guardar</button>
                            </div>
                     
                        </form>


                    </div>

              
                </div>
            </div>
        </div>
    </section>
@endsection
