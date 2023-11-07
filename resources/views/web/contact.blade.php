@extends('web.layout.master')

@section('content')
    <section class="section wb">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-wrapper">
                        <div class="row">
                            @if(session('success'))
                                <div class="col-lg-12">
                                    <div class="alert alert-success">
                                        {{session('success')}}
                                    </div>
                                </div>
                            @endif
                           
                            <div class="col-lg-5">
                                <form class="form-wrapper" action="{{route('web.contact.store')}}" method="post">
                                    @csrf
                                    <input type="text" name="name" class="form-control" placeholder="Your name">
                                    <input type="text" name="address" class="form-control" placeholder="Email address">
                                    <input type="text" name="phone" class="form-control" placeholder="Phone">
                                    <input type="text" name="subject" class="form-control" placeholder="Subject">
                                    <textarea class="form-control" name="message" placeholder="Your message"></textarea>
                                    <button type="submit" class="btn btn-primary">Send <i class="fa fa-envelope-open-o"></i></button>
                                </form>
                            </div>
                        </div>
                    </div><!-- end page-wrapper -->
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section>
@endsection