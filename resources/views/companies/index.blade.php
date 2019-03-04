@extends('layouts.app')

@section('title', trans('company.list'))

@section('content')

<div class="card m-5">
    <div class="card-header">
        {{ trans('company.companies') }}
    </div>
    <div class="card-body">
        {{ link_to_route('companies.create', trans('company.create'), [], ['class' => 'btn btn-success mb-3']) }}
        <div class="card">
            <div class="card-header">
                    {{ trans('company.list') }}
            </div>
            <div class="card-body">
                    <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>{{ trans('company.name') }}</th>
                                    <th>{{ trans('company.email') }}</th>
                                    <th>{{ trans('company.website') }}</th>
                                    <th>{{ trans('company.address') }}</th>
                                    <th class="text-center">{{ trans('app.action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($companies as $company)
                                <tr class="card-header">
                                    <td>{{ $company->name }}</td>
                                    <td>{{ $company->email }}</td>
                                    <td>{{ $company->website }}</td>
                                    <td>{{ $company->address }}</td>
                                    <td class="text-center">
                                        {!! link_to_route(
                                            'companies.show',
                                            trans('app.details'),
                                            [$company],
                                            ['class' => 'btn btn-light btn-sm']
                                        ) !!}
                                        {!! FormField::delete(
                                            ['route' => ['companies.destroy', $company]],
                                            trans('app.delete'),
                                            ['class'=>'btn btn-danger btn-sm']
                                        ) !!}

                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
            </div>
        </div>
    </div>
</div>
@endsection
