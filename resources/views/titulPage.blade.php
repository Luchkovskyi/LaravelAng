
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{action('TitulController@find')}}">
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
                            <button type="submit" id="bitedit" class="btn btn-primary ">
                                <i class="fa fa-btn fa-user"></i>FIND
                            </button>


                    </form>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Results</div>

                    <div class="panel-body" id>
                        <table class="table table-hover" id="firsttab" border="2px solid grey" >
                            <tr><th> id </th><th> Name </th><th> Description </th><th> Category </th><th> Image </th></tr>
                            @foreach( $Product as $er)
                                <tr>
                                    <td class="{{$er->id}}">{{$er->id}}</td>
                                    <td class="{{$er->id}}">{{$er->name}}</td>
                                    <td class="{{$er->id}}">{{$er->description}}</td>
                                    <td class="{{$er->id}}">{{$er->categories_id}}</td>
                                    <td class="{{$er->id}}"><img src="{{$er->image}}" style="width: 80px; height: 80px;"></td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection