<!-- Stored in resources/views/child.blade.php -->

@extends('layouts.admin')

@section('title', 'Marque')


@section('css')

  @include('admin.partials.index_css')
	
@endsection


@section('content')
    

<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">

            @include('admin.partials.message_errors')
            <div class="row">
                <div class="col-lg-7">
                    <div class="card">
                        <div class="card-header">Categorie</div>
                        <div class="card-body">
                            <div class="card-title">
                                <h3 class="text-center title-2">Creer une categorie</h3>
                            </div>
                            <hr>
                            <form method="post" novalidate="novalidate" action="{{ route('add.brand') }}" enctype="multipart/form-data">
                                {{csrf_field()}}
                                
                                <div class="form-group">
                                    <label for="cc-number" class="control-label mb-1">Choisir la categorie</label>
                                   <select name="category_id" id="select" class="form-control">
                                    @if(!$categories->isEmpty())
                                    <option value=""> Choisir categorie </option>
                                    @foreach ($categories as $category)
                                      <option value="{{ $category->id }}"> {{ $category->category_name }} </option>
                                    @endforeach
                                        @else
                                            <option value=""> Pas de catégorie disponible </option>
                                        @endif
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <label for="cc-number" class="control-label mb-1">Choisir le type</label>
                                   <select name="type_id" id="select" class="form-control">
                                    @if(!$types->isEmpty())
                                    <option value=""> Choisir type </option>
                                    @foreach ($types as $type)
                                      <option value="{{ $type->id }}"> {{ $type->type_name }} </option>
                                    @endforeach
                                        @else
                                            <option value=""> Pas de type disponible </option>
                                        @endif
                                    </select>
                                </div>
                                
                                
                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Nom de la marque</label>
                                    <input id="cc-pament" name="brand_name" type="text" class="form-control" aria-required="true" aria-invalid="false">
                                </div>
                
                                
                                <div class="form-group has-success">
                                    <label for="cc-name" class="control-label mb-1">Description de la marque</label>
                                    <textarea name="brand_description" id="textarea-input" rows="9" placeholder="Content..." class="form-control"></textarea>
                                </div>
                                
                                <div class="form-group">
                                    <label for="cc-number" class="control-label mb-1">Ajouter une photo</label>
                                 </div>

                                <div class="form-group">
                                   <img id="preview_img" src="http://127.0.0.1:8000/admin/images/icon/avatar-01.jpg" width="200" height="150"/>
              
                                        <input type="file" name="brand_logo" class="form-control" id="category_photo" onchange="loadPreview(this);">
                                </div>
                                
                                <div>
                                    <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                        <i class="fa fa-plus fa-lg"></i>&nbsp;
                                        <span id="payment-button-amount">Ajouter</span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                  <div class="top-campaign">
                        <h3 class="title-3 m-b-30">Liste des marques </h3>
                        <div class="table-responsive">
                            
                        @if(!$brands->isEmpty())
                        <table class="table table-top-campaign">
                            <tbody>

                                @foreach ($brands as $brand)
                                <tr>
                                    <td>{{ $loop->iteration }}. {{ $brand->brand_name }}</td>
                                    <td>
                                    <div class="table-data-feature">
                                
                                        <button class="item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit">
                                            <i class="zmdi zmdi-edit"></i>
                                        </button>
                                        <a href="{{ route('brand.delete', ['id' => $brand->id]) }}" class="item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete">
                                            <i class="zmdi zmdi-delete"></i>
                                        </a>
                        
                                    </div>
                                    </td>
                                </tr>
                                @endforeach 
                            </tbody>
                        </table>

                        @else
                        Pas de type de marque disponible

                        @endif
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="copyright">
                        <p>Copyright © 2018 Colorlib. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection


@section('script')

  @include('admin.partials.index_script')
	
@endsection