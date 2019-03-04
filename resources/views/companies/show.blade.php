@extends('layouts.app')

@section('title', trans('company.detail'))

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    {{ trans('company.detail') }}
                </div>
                <div class="card-body pb-2">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <td>{{ trans('company.name') }}</td>
                                    <td>{{ $company->name }}</td>
                                </tr>
                                <tr>
                                    <td>{{ trans('company.email') }}</td>
                                    <td>{{ $company->email }}</td>
                                </tr>
                                <tr>
                                    <td>{{ trans('company.website') }}</td>
                                    <td>{{ $company->website }}</td>
                                </tr>
                                <tr>
                                    <td>{{ trans('company.address') }}</td>
                                    <td>{{ $company->address }}</td>
                                </tr>
                            </tbody>
                        </table>
                </div>
                <div class="card-footer">
                    {{ link_to_route('companies.edit', trans('company.edit'), [$company], ['class' => 'btn
                    btn-warning'])
                    }}
                    {{ link_to_route('companies.index', trans('company.back_to_index'), [], ['class' => 'btn
                    btn-light'])
                    }}
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-header">
                    {{ trans('company.employees') }}
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>{{ trans('app.name') }}</th>
                                <th>{{ trans('employee.email') }}</th>
                                <th>{{ trans('employee.phone') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($employees as $employee)
                            <tr class="card-header">
                                <td>{{ $employee->name }} {{ $employee->surname }}</td>
                                <td>{{ $employee->email }}</td>
                                <td>{{ $employee->phone }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
