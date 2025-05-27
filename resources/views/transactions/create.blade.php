@extends('template.admin')

@section('content')
<div class="row">
    <div class="col-12
     grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Create Transaction</h4>
                <form id="transaction-form" action="{{ route('transaction.store') }}" method="POST">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="exampleFormControlSelect2">Customer (Opsional)</label>
                    <select name="customerId" class="form-control" id="exampleFormControlSelect2">
                        <option value="">Pilih Customer</option>
                            @foreach ($customers as $value)
                            <option value="{{ $value->customerId }}" data-member="{{ $value->member_status }}">
                                {{$value->customerName}} | {{($value->member_status == 1) ? 'Member' : 'Non-member'}}
                            </option>
                            @endforeach
                        </select></br>
                        @if ($errors->has('customerId'))
                        <span class="label label-danger">{{ $errors->first('customerId') }}</span>
                        @endif
                    </select>
                </div>

                <div class="form-group">
                    <label for="payment_method">Metode Pembayaran</label>
                    <select name="payment_method" id="payment_method" class="form-control" required>
                        <option value="">Pilih Metode Pembayaran</option>
                        <option value="cash">Tunai</option>
                        <option value="credit_card">Kartu Kredit</option>
                        <option value="transfer">Transfer Bank</option>
                    </select>
                    @if ($errors->has('payment_method'))
                        <span class="label label-danger">{{ $errors->first('payment_method') }}</span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="motorId">Motorcycle</label>
                    <select name="motorId" id="motorId" class="form-control" required>
                        <option value="">Select Motorcycle</option>
                        @foreach ($motors as $motor)
                        <option value="{{ $motor->motorId }}" data-price="{{ $motor->price }}"
                            data-image="{{ ($motor->photo) ? asset('storage/' . $motor->photo) : "
                            https://via.placeholder.com/100" }}">
                            {{ $motor->motorName }} - Rp. {{ number_format($motor->price, 2) }}
                        </option>
                        @endforeach
                    </select>
                    @if ($errors->has('motorId'))
                        <span class="label label-danger">{{ $errors->first('motorId') }}</span>
                    @endif
                    <button type="button" id="add-motor" class="btn btn-primary mt-2">Tambah Item</button>
                </div>

                <!-- Tabel Produk yang Ditambahkan -->
                <table class="table table-striped table-hover mt-3" id="motor-table">
                    <thead>
                        <tr>
                            <th>Photo</th>
                            <th>Name Motorcycle</th>
                            <th>Price</th>
                            <th>Stock</th>
                            <th>Total</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Data produk yang ditambahkan akan muncul di sini -->
                    </tbody>
                </table>

                <div class="form-group">
                    <label for="total_amount">Total Amount</label>
                    <input type="number" name="total_amount" id="total_amount" class="form-control" readonly>
                </div>


                <div class="form-group">
                    <label for="discount">Discount (Rp)</label>
                    <input type="number" name="discount" id="discount" class="form-control" value="0" readonly>
                </div>

                <div class="form-group" id="total_due_field">
                    <label for="total_due">Total to be Paid</label>
                    <input type="number" name="total_due" id="total_due" class="form-control" readonly>
                </div>

                <div class="form-group">
                    <label for="payment">Pay</label>
                    <input type="number" name="payment" id="payment" class="form-control" required>
                    <p class="text-danger">{{ $errors->first('payment') }}</p>
                </div>

                <div class="form-group">
                    <label for="change">Change</label>
                    <input type="number" name="change" id="change" class="form-control" readonly>
                </div>
                <button type="submit" class="btn btn-success">Save Transaction</button>
                <a href="{{ route('transaction.index') }}" class="btn btn-secondary">Back</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function () {
            let motorList = [];
            let discountPercent = 10; // Diskon 10% untuk member
            let isMember = false;

            // Cek apakah customer yang dipilih adalah member
            $('#customerId').on('change', function () {
                const selectedCustomer = $(this).find('option:selected');
                isMember = selectedCustomer.data('member') == 1; // Cek apakah customer adalah member

                calculateTotal(); // Recalculate total after selecting customer
            });

            // Tambah item produk ke tabel
            $('#add-motor').on('click', function () {
                const motorId = $('#motorId').val();
                const motorName = $('#motorId option:selected').text();
                const motorPrice = parseFloat($('#motorId option:selected').data('price'));
                const motorImage = $('#motorId option:selected').data('image');
                const motorQty = 1; // Mengatur jumlah produk default 1

                if (motorId) {
                    // Cek apakah produk sudah ada di dalam list
                    const existingMotor = motorList.find(p => p.id == motorId);
                    if (existingMotor) {
                        // Jika produk sudah ada, tambahkan kuantitas dan perbarui total
                        existingMotor.qty++;
                    } else {
                        // Jika produk baru, tambahkan ke list
                        motorList.push({
                        id: motorId,
                        name: motorName,
                        price: motorPrice,
                        qty: motorQty,
                        image: motorImage });
                    }

                    // Perbarui tabel produk
                    updateMotorTable();
                    calculateTotal();
                }
            });

            // Fungsi untuk memperbarui tabel produk
            function updateMotorTable() {
                const tbody = $('#motor-table tbody');
                tbody.empty(); // Hapus isi tabel sebelum diperbarui

                motorList.forEach((motor, index) => {
                    const total = motor.price * motor.qty;
                    const photoUrl = motor.image ? motor.image : 'https://via.placeholder.com/100';
                    tbody.append(`
                    <tr>
                        <td><img src="${photoUrl}" alt="${motor.name}" style="width: 50px; height: auto;"></td>
                        <td>${motor.name}</td>
                        <td>Rp. ${motor.price.toFixed(2)}</td>
                        <td>
                            <button class="btn btn-sm btn-secondary decrease" data-id="${motor.id}">-</button>
                            ${motor.qty}
                            <button class="btn btn-sm btn-secondary increase" data-id="${motor.id}">+</button>
                        </td>
                        <td>Rp. ${total.toFixed(2)}</td>
                        <td>
                            <button class="btn btn-danger btn-sm remove" data-id="${motor.id}">Hapus</button>
                        </td>
                    </tr>
                    <input type="hidden" name="motors[${index}][motorId]" value="${motor.id}">
                    <input type="hidden" name="motors[${index}][qty]" value="${motor.qty}">
                    `);
                });
            }

            // Hitung total amount
            function calculateTotal() {
                const total = motorList.reduce((sum, motor) => sum + (motor.price * motor.qty), 0);
                $('#total_amount').val(total);

                // Hitung diskon jika customer adalah member
                let discount = isMember ? (total * discountPercent / 100) : 0;
                $('#discount').val(discount);

                const totalDue = total - discount;
                $('#total_due').val(totalDue);

                if (discount > 0) {
                    $('#total_due_field').show(); // Menampilkan field jika ada diskon
                } else {
                    $('#total_due_field').hide(); // Menyembunyikan field jika tidak ada diskon
                }

                calculateChange(); // Recalculate change after updating total
            }

            // Hitung kembalian
            $('#payment').on('input', calculateChange);

            function calculateChange() {
                const total = parseFloat($('#total_amount').val());
                const totalDue = parseFloat($('#total_due').val());
                const payment = parseFloat($('#payment').val());
                const discount = parseFloat($('#discount').val()) || 0;
                const totalAfterDiscount = total - discount;
                const change = payment - totalAfterDiscount;
                console.log(totalAfterDiscount);
                console.log(payment);

                $('#change').val(change < 0 ? 0 : change);
            }
            // Event untuk mengurangi dan menambah kuantitas produk // Event untuk menampilkan alert setelah selesai menginput pembayaran
            $('#payment').on('blur', function() {
                const total=parseFloat($('#total_amount').val());
                const discount=parseFloat($('#discount').val()) || 0;
                const totalDue=total - discount;
                const payment=parseFloat($('#payment').val()); // Tampilkan alert jika pembayaran kurang dari total yang harus dibayar

                if (payment < totalDue) {
                    alert("Pembayaran tidak boleh kurang dari total yang harus dibayar!");
                }
            });

            $(document).on('click', '.increase' , function () {
                const motorId=$(this).data('id');
                const motor=motorList.find(p=> p.id == motorId);

                if (motor) {
                    motor.qty++;
                    updateMotorTable();
                    calculateTotal();
                }
            });

            $(document).on('click', '.decrease', function () {
                const motorId = $(this).data('id');
                const motor = motorList.find(p => p.id == motorId);
                if (motor && motor.qty > 1) {
                    motor.qty--;
                    updateMotorTable();
                    calculateTotal();
                }
            });

            function resetPaymentAndChange() {
                $('#payment').val(''); // Kosongkan input pembayaran
                $('#change').val(''); // Kosongkan input kembalian
            }

            // Event untuk menghapus produk dari tabel
            $(document).on('click', '.remove', function () {
                const motorId = $(this).data('id');
                motorList = motorList.filter(p => p.id != motorId);
                updateMotorTable();
                calculateTotal();
                resetPaymentAndChange();
            });
        });
    </script>


