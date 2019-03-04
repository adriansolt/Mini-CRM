@extends('layouts.app')

@section('title', trans('employee.list'))

@section('content')
<div class="card m-5">
        <div class="card-header">
            {{ trans('employee.employees') }}
        </div>
        <div class="card-body">
            {{ link_to_route('employees.create', trans('employee.create'), [], ['class' => 'btn btn-success mb-3']) }}
            <div class="card">
                <div class="card-header">
                        {{ trans('employee.list') }}
                </div>
                <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>{{ trans('employee.name') }}</th>
                            <th>{{ trans('employee.surname') }}</th>
                            <th>{{ trans('company.company') }}</th>
                            <th>{{ trans('employee.email') }}</th>
                            <th>{{ trans('employee.phone') }}</th>
                            <th class="text-center">{{ trans('app.action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($employees as $employee)
                        <tr class="card-header">
                            <td>{{ $employee->name }}</td>
                            <td>{{ $employee->surname }}</td>
                            <td>{{ $employee->company->name }}</td>
                            <td>{{ $employee->email }}</td>
                            <td>{{ $employee->phone }}</td>
                            <td class="text-center">
                                {!! link_to_route(
                                    'employees.edit',
                                    trans('app.edit'),
                                    [$employee],
                                    ['class' => 'btn btn-light btn-sm']
                                ) !!}
                                {!! FormField::delete(
                                    ['route' => ['employees.destroy', $employee]],
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
