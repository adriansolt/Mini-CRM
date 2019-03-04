@extends('layouts.app')

@section('title', trans('company.edit'))

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-5">
            <div class="card">
                <div class="card-header">
                    {{ trans('company.edit') }}
                </div>
                {{ Form::model($company, ['route' => ['companies.update', $company],'method' => 'patch']) }}
                <div class="card-body">
                    {!! FormField::text('name', ['required' => true, 'label' => trans('company.name')]) !!}
                    {!! FormField::email('email', ['required' => true, 'label' => trans('company.email')]) !!}
                    {!! FormField::text('website', ['label' => trans('company.website')]) !!}
                    {!! FormField::textarea('address', ['label' => trans('company.address')]) !!}
                </div>
                <div class="card-footer">
                    {{ Form::submit(trans('company.update'), ['class' => 'btn btn-warning']) }}
                    {{ link_to_route('companies.show', trans('app.back'), [$company], ['class' => 'btn btn-light'])
                    }}
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>

@endsection
