<form action="{{ route('adminRegister.store') }}" method="post">
    @csrf
    @method('POST')
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required> <br>
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required> <br>
    <label for="staff_id">Staff ID:</label>
    <input type="text" id="staff_id" name="staff_id" required> <br>
    <label for="role">Role:</label>
    <input type="text" id="role" name="role" value="admin" readonly> <br>
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required> <br>
    <label for="password_confirmation">Confirm Password:</label>
    <input type="password" id="password_confirmation" name="password_confirmation" required> <br>
    <button type="submit">Register</button>
</form>