@extends('layouts.layout')

@section('content')
    
    <div class="container" style="margin-top: 10%;">
        <div class="row mb-5">
            <div class="col text-center">
                <h1><strong>Your Contacts</strong></h1>
            </div>
        </div>
        <div class="row">
            <table id="contact_table" class="display">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Contacts</th>
                        <th>Phone Number</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($contacts as $contact)
                        <tr>
                            <td></td>
                            <td>{{ $contact->name }}</td>
                            <td>
                                @foreach ($contact->phoneNumber as $phone )
                                    <a href="tel:{{$phone->phone_number}}">{{$phone->phone_number}} </a>
                                    <br>
                                @endforeach
                            </td>
                            <td>
                                <a type="button" href="/contact/{{$contact->id}}" class="btn btn-success"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                <a type="button" href="/edit/{{$contact->id}}" class="btn btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                <a type="button" id="delete_{{$contact->id}}" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div id="delete_modal" class="modal fade" role="dialog" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Delete Contact</h4>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this contact?</p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-light" type="button" data-bs-dismiss="modal">Close</button>
                    <a id="confirm_delete" type="button" href="" class="btn btn-danger" type="button">Delete</a>
                </div>
            </div>
        </div>
    </div>

    <!-- DataTable -->
    <script>
        $(document).ready(function(){
            var contact_table = $('#contact_table').DataTable( {
                "columnDefs": [ {
                    "searchable": false,
                    "orderable": true,
                    "targets": 0
                } ],
                "order": [[ 1, 'asc' ]]
            } );

            contact_table.on( 'order.dt search.dt', function () {
                let i = 1;
        
                contact_table.cells(null, 0, {search:'applied', order:'applied'}).every( function (cell) {
                    this.data(i++);
                } );
            } ).draw();
        });
    </script>

    <script>
        $(document).ready(function() {
            $("a[id^='delete']").click(function() {
                var id = $(this).attr("id");

                id = id.replace("delete_", "");

                $("#delete_modal").modal("show");

                $("#confirm_delete").attr("href", '/delete/' + id);
            });
        });
    </script>

@endsection