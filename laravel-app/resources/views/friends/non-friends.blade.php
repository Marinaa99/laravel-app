<x-app-layout>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Non-Friends List</h2>
                <table>
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Surname</th>
                        <th>Status</th>
                        <th>Action</th>


                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->surname }}</td>
                            <td>{{ $user->status}}</td>
                            <td>

                                    <form action="{{ route('add-friend', $user->id) }}" method="POST">
                                        @csrf
                                        <button type="submit">Add friend</button>
                                    </form>

                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>

        </div>



    </div>

</x-app-layout>
