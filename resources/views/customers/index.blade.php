<center>
    <table border="1" style="border-collapse: collapse;" cellPadding="10px">
        <thead>
            <tr>
                <th>No</th>
                <th>Customer Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Member Status</th>
                <th>Action | <a href="{{ route('customer.create') }}">Add</a></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dataCustomers as $customer)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $customer->customerName }}</td>
                    <td>{{ $customer->email }}</td>
                    <td>{{ $customer->phone }}</td>
                    <td>{{ $customer->address }}</td>
                    <td>{{ $customer->member_status ? "Yes" : "No" }}</td>
                    <td>
                        <form action="{{ route('customer.destroy', $customer->customerId) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <a href="{{ route('customer.edit', $customer->customerId) }}">Edit</a>
                            <button type="submit" onclick="return confirm('Yakin hapus?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</center>y
