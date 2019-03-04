@extends('layouts.app')

@section('title', trans('company.create'))

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-5">
            <div class="card">
                <div class="card-header">
                    {{ trans('company.create') }}
                </div>
                {!! Form::open(['route' => 'companies.store']) !!}
                <div class="card-body">
                    {!! FormField::text('name', ['label' => trans('company.name')]) !!}
                    {!! FormField::email('email', ['label' => trans('company.email')]) !!}
                    {!! FormField::text('website', ['label' => trans('company.website')]) !!}
                    {!! FormField::textarea('address', ['label' => trans('company.address')]) !!}
                    {!! FormField::file('logo', ['label' => trans('company.upload_logo')]) !!}
                </div>
                <div class="card-footer">
                    {!! Form::submit(trans('company.create'), ['class' => 'btn btn-success']) !!}
                    {{ link_to_route('companies.index', trans('app.back'), [], ['class' => 'btn btn-light']) }}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>


@endsection
