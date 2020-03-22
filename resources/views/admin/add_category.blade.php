<!-- Stored in resources/views/child.blade.php -->

@extends('layouts.admin')

@section('title', 'Categorie')


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
                            <form method="post" novalidate="novalidate"  action="{{ route('add.category') }}" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Nom de la categorie</label>
                                    <input id="cc-pament" name="category_name" type="text" class="form-control" aria-required="true" aria-invalid="false">
                                </div>
                
                                
                                <div class="form-group has-success">
                                    <label for="cc-name" class="control-label mb-1">Description de la categorie</label>
                                    <textarea name="category_description" id="textarea-input" rows="9" placeholder="Content..." class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="cc-number" class="control-label mb-1">Genre de la categorie</label>
                                   <select name="category_gender" id="select" class="form-control">
                                    <option value="vide">Choisir genre</option>
                                    <option value="femme">Femme</option>
                                    <option value="homme">Homme</option>
                                    <option value="enfant">Enfant</option>
                                    <option value="garcon">Garcon</option>
                                    <option value="fille">Fille</option>
                                    <option value="bebe">Bébé</option>
                                    <option value="autre">Autre</option>
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <label for="cc-number" class="control-label mb-1">Ajouter une photo</label>
                                 </div>

                                <div class="form-group">
                                   <img id="preview_img" src="http://127.0.0.1:8000/admin/images/icon/avatar-01.jpg" width="200" height="150"/>
              
                                        <input type="file" name="category_photo" class="form-control" id="category_photo" onchange="loadPreview(this);">
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
                        <h3 class="title-3 m-b-30">Liste des categories</h3>
                        <div class="table-responsive">

                            @if(!$categories->isEmpty())

                            <table class="table table-top-campaign">
                                <tbody>
                                    @foreach ($categories as $category)
                                    <tr>
                                        <td>{{ $loop->iteration }}. {{ $category->category_name }}</td>
                                        <td>
                                        <div class="table-data-feature">
                                    
                                            <button class="item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit">
                                                <i class="zmdi zmdi-edit"></i>
                                            </button>
                                            <a href="{{ route('category.delete', ['id' => $category->id]) }}" class="item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete">
                                                <i class="zmdi zmdi-delete"></i>
                                            </a>
                            
                                        </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            @else
                            Pas de catégorie disponible
                     
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