@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('ADD NEW Project') }}</div>

                <div class="card-body">
                        @if(count($errors))
                        <div class="form-group">
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{$error}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif
                    @foreach ($project as $projects)
                    <form action='/project/project_description/{{ $projects->id}}' method="POST" enctype="multipart/form-data">
                    @csrf
                    <input id="user_id" type="hidden" name="user_id" value = '{{ Auth::user()->id }}'>
                        <div class="form-group row">
                            <label for="project_name" class="col-md-4 col-form-label text-md-right">{{ __('project_name') }}</label>

                            <div class="col-md-6">
                                <input id="project_name" type="project_name" name="project_name" value = '{{$projects->project_name}}'>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                            <div class="col-md-6">
                                <textarea id="description" type="description" name="description">{{$projects->description}}</textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Image') }}</label>
                            {{ $projects->projectimage[0]->image}}
                                <div class="col-md-6">
                                    <input id="image" type="file" name="image[]" multiple class="form-control">
                                </div>                                                             
                        </div> 

                        <div class="form-group row">
                            <label for="owner" class="col-md-4 col-form-label text-md-right">{{ __('Owner') }}</label>

                            <div class="col-md-6">
                                <input id="owner" type="owner" name="owner" value = '{{$projects->owner}}'>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="budget" class="col-md-4 col-form-label text-md-right">{{ __('Budget') }}</label>

                            <div class="col-md-6">
                                <input id="budget" type="budget" name="budget" value = '{{$projects->budget}}'>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="startdate" class="col-md-4 col-form-label text-md-right">{{ __('Start Date') }}</label>

                            <div class="col-md-6">
                                <input id="startdate" type="startdate" name="startdate" value = '{{$projects->startdate}}'>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="enddate" class="col-md-4 col-form-label text-md-right">{{ __('End Date') }}</label>

                            <div class="col-md-6">
                                <input id="enddate" type="enddate" name="enddate" value = '{{$projects->enddate}}'>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Submit') }}
                                </button>
                            </div>
                        </div>

                        

                    </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

