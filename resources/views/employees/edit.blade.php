@extends('layouts.app')

@section('title', trans('employee.edit'))

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-5">
            <div class="card">
                <div class="card-header">
                    {{ trans('employee.edit') }}
                </div>
                {!! Form::model($employee, ['route' => ['employees.update', $employee],'method' => 'patch']) !!}
                <div class="card-body">
                    {!! FormField::text('name', ['required' => true, 'label' => trans('employee.name')]) !!}
                    {!! FormField::text('surname', ['required' => true, 'label' => trans('employee.surname')]) !!}
                    {!! FormField::select('company_id', $companiesArray , ['required' => true, 'label' =>
                    trans('employee.company'), 'placeholder' => trans('company.select')]) !!}
                    {!! FormField::email('email', ['label' => trans('employee.email')]) !!}
                    {!! FormField::text('phone', ['label' => trans('employee.phone')]) !!}
                </div>
                <div class="card-footer">
                    {!! Form::submit(trans('employee.update'), ['class' => 'btn btn-warning']) !!}
                    {{ link_to_route('employees.index', trans('app.back'), [], ['class' => 'btn btn-light']) }}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection
