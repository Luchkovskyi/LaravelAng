@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">edit</div>

                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{action('HomeController@update')}}"  enctype="multipart/form-data" >
                            {{ csrf_field() }}
                            <div class="inf">
                                <label for="name" class="edit" >name</label>
                                <input id="name" type="text" class="form-control edit" name="name" />
                            </div>

                            <div class="inf">
                                <label for="desc"  class="edit" >description</label>
                                <input id="desc" type="text" class="form-control edit" name="desc" />
                            </div>
                            <input type="hidden" id="ind" name="ind"  />
                            <div class="inf">
                                <label for="category"  class="edit" >category</label>
                                <input id="category" type="text" class="form-control edit" name="category" />
                            </div>

                            <div class="inf" id="file">
                                <label for="file"  class="edit" >image</label>
                                <input type="file" id="file" name="file"  class="form-control edit" />
                            </div>


                            <button type="submit" id="bitedit" class="btn btn-primary">
                                <i class="fa fa-btn fa-user"></i> update
                            </button>


                        </form>

                    </div>

                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{action('HomeController@find')}}">
                        {{ csrf_field() }}
                            <div class="categoryInfor">
                                <label id="textCategory" for="category"  class="edit" >Category:</label>
                                <select id="category" type="text" class="form-control editf" name="category">
                                    <option value="" selected></option>
                                    @foreach( $AllCategory as $er)
                                        @if( $er->id == 1 )
                                            <option value="{{$er->id}}" selected>{{$er->name}}</option>
                                        @else
                                            <option value="{{$er->id}}">{{$er->name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" id="biteditFind" class="btn btn-primary ">
                                <i class="fa fa-btn fa-user"></i>FIND
                            </button>
                    </form>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">table with data</div>
                    <div class="panel-body" >
                        <table class="table table-hover" id="firsttab" border="2px solid grey" >
                            <tr><th> id </th><th> Name </th><th> Description </th><th> Category </th><th> Image </th><th> option </th></tr>
                            @foreach( $Product as $er)
                                <tr>
                                    <td class="{{$er->id}}">{{$er->id}}</td>
                                    <td class="{{$er->id}}">{{$er->name}}</td>
                                    <td class="{{$er->id}}">{{$er->description}}</td>
                                    <td class="{{$er->id}}">{{$er->categories_id}}</td>

                                    <td class="{{$er->id}}"><img src="{{$er->image}}" style="width: 80px; height: 80px;"></td>
                                    <td class="sizeCrud">
                                        <a class="click glyphicon glyphicon-pencil btn btn-primary btn-xs" id="{{$er->id}}" href="#">edit</a>
                                        <a class="click glyphicon glyphicon-trash btn btn-danger btn-xs delete" id="{{$er->id}}" href="#">del</a>
                                        <input type="hidden" class="delete" name="id" value="{{$er->id}}"/>
                                    </td>

                                </tr>
                            @endforeach
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
   {{--// http://otdel-devsite.ru/laravel-5-пишем-интернет-магазин-часть-2--}}
@endsection
