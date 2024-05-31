@extends('admin.homeadmin')
@section('content')

    <div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <form method="POST" action="{{ route('admin.sendNewsletter') }}">
                    @csrf
                    <h3>Keep your users informed..</h3>
                    <div>
                        <textarea name="message" style="margin-left:80px; border-radius: 20px;" rows="10" cols="110"></textarea>
                    </div>
                    <div>
                        <button type="submit" style="float: right;" class="btn btn-outline-primary btn-fw">Send Email</button>
                    </div>

                    <!-- Hidden input to store selected user IDs -->
                    <input type="hidden" name="selectedUsers" id="selectedUsers" value="{{ implode(',', $users->pluck('id')->toArray()) }}">
                </form>
                <!-- Your existing table code -->
                <table class="table" id="userTable">
                    <thead>
                    <tr>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Membre since</th>
                        <th>Interest Rate</th>
                        <th>Remove</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($users as $user)
                        <tr id="userRow{{ $user->id }}">
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->member_since }}</td>
                            <td>{{ $user->interest_rate }}</td>
                            <td>
                                <button class="btn btn-danger btn-sm" onclick="removeUser({{ $user->id }})">Remove</button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <!-- End of existing table code -->
            </div>
        </div>
    </div>
    <script>
        function removeUser(userId) {
            // Remove the row from the table
            $('#userRow' + userId).remove();

            // Update the list of selected user IDs
            updateSelectedUsers();
        }

        function updateSelectedUsers() {
            // Get the remaining user IDs
            var selectedUsers = $('#userTable tbody tr').map(function() {
                return this.id.replace('userRow', '');
            }).get();

            // Update the hidden input value
            $('#selectedUsers').val(selectedUsers.join(','));
        }
    </script>
@endsection
