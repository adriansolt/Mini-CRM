@extends('layouts.app')

@section('title', trans('employee.edit'))

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-5">
            <div class="card">
                <div class="card-header">
                    {{ trans('employee.create') }}
                </div>
                {!! Form::open(['route' => 'employees.store']) !!}
                <div class="card-body">
                    {!! FormField::text('name', ['label' => trans('employee.name')]) !!}
                    {!! FormField::text('surname', ['label' => trans('employee.surname')]) !!}
                    {!! FormField::select('company_id', $companiesArray, ['label' => trans('employee.company'),
                    'placeholder' => trans('company.select')]) !!}
                    {!! FormField::email('email', ['label' => trans('employee.email')]) !!}
                    {!! FormField::text('phone', ['label' => trans('employee.phone')]) !!}
                </div>
                <div class="card-footer">
                    {!! Form::submit(trans('employee.create'), ['class' => 'btn btn-success']) !!}
                    {{ link_to_route('employees.index', trans('app.back'), [], ['class' => 'btn btn-default']) }}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection
