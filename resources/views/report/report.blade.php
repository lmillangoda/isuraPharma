@extends('layouts.admin')

@section('content')

    <!-- <div class="header bg-gradient-default pb-5 pt-5 pt-md-5">
            <div class="container-fluid">
            <div class="header-body">

            </div>
            </div>
        </div> -->

    <div class="header bg-gradient-default pb-5 pt-5 pt-md-5">
        <div class="container-fluid">
            <div class="header-body">

            </div>
        </div>
    </div>
    <br>

    <div id="body" class="container">
        <div class="row">
            <form class="" action="index.html" method="post">
                <div class="">
                    <label for="date">Date</label>
                    <input id="date" class="form-control" type="date" name="date" value="{{date('Y-m-d')}}"
                           placeholder="Date">
                </div>
                <div id="body2" class="">
                </div>
            </form>
        </div>
    </div>
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {

            // $('#date').change(function() {
            //   console.log($('#date').val())
            // });

            search();

            function search() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: '{{route('reports.display')}}',
                    type: 'post',
                    data: {
                        date: $('#date').val()
                    },
                    success: function (data) {
                        // console.log(data);
                        // $('#bill-table-body').empty();
                        $('#body2').html(data);
                        // $('#product').val("");
                        // $('#amount').val("");
                    }
                });
            }

            $('#date').change(search);
        });
    </script>
@endsection
