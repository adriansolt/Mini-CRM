<ul>
    <li>{{ trans('company.name') }}: {{ $name }}</li>
    <li>{{ trans('company.email') }}: {{ $email }}</li>
    <li>{{ trans('company.website') }}: {{ $website }}</li>
    @if (isset($address))
        <li>{{ trans('company.address') }}: {{ $address }}</li>
    @endif
</ul>

