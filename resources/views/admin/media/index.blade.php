@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="content col-sm-12">
        <div class="animated fadeIn">
    
    
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Media Update</strong>
                        </div>
                        <div class="card-body">
                            <!-- Credit Card -->
                            <div id="pay-invoice">
                                <div class="card-body">
                                    <div class="card-title">
                                        <h3 class="text-center">Media Update</h3>
                                    </div>
                                    <hr>
                                    <form action="{{route('medias')}}" method="post" enctype="multipart/form-data">
                                       @csrf
                                        <div class="form-group ">
                                            <label for="cc-payment" class="control-label mb-1">Title</label>
                                            <input id="cc-pament" name="title" type="text" class="form-control" aria-required="true" aria-invalid="false" value="" class="@error('title') is-invalid @enderror" required>
                                            @error('title')
                                                <div class="alert alert-message" style="color:red" >{{ $message }}</div>
                                            @enderror
                                        </div>
                                            <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">Detail</label>
                                                <textarea id="cc-name" name="detail" type="text" class="form-control cc-name valid" data-val="true" data-val-required="Please enter the name on card" autocomplete="cc-name" aria-required="true" aria-invalid="false" aria-describedby="cc-name-error" required class="@error('detail') is-invalid @enderror"></textarea>
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                                @error('detail')
                                                <div class="alert alert-message" style="color:red" >{{ $message }}</div>
                                            @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">Image</label>
                                                <input id="image" name="image" type="file" class="form-control cc-number identified visa @error('image') is-invalid @enderror" value="" data-val="true" data-val-required="Please enter the card number" data-val-cc-number="Please enter a valid card number" autocomplete="cc-number" required>
                                                <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                                @error('image')
                                                <div class="alert alert-message" style="color:red" >{{ $message }}</div>
                                            @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">Date</label>
                                                <input id="cc-number" name="date" type="date" class="@error('date') is-invalid @enderror form-control cc-number identified visa" value="" data-val="true" data-val-required="Please enter the card number" data-val-cc-number="Please enter a valid card number" autocomplete="cc-number" required>
                                                <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                                @error('date')
                                                <div class="alert alert-message" style="color:red" >{{ $message }}</div>
                                            @enderror
                                            </div>
                                            <div>
                                                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                                    <i class=""></i>&nbsp;
                                                    <span id="payment-button-amount">Sending</span>
                                                    <span id="payment-button-sending" style="display:none;">Sending…</span>
                                                </button>
                                            </div>
                                    </form>
                                </div>
                            </div>
    
                        </div>
                    </div> <!-- .card -->
    
                </div>
                <!--/.col-->
            </div>
        {{-- <script>
            $('.alert-message').fadeOut(3000);
            </script> --}}
@endsection