@foreach($administrators as $administrator)
<li>{{ $administrator->name }} (Admin) - {{ $administrator->email }} {{ $administrator->staff_id }}</li>
@endforeach

@foreach($users as $user)
<li>{{ $user->name }} (staff) - {{ $user->email }}</li>
@endforeach