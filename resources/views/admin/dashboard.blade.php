@extends('admin_template')

@section('title', 'homepage')
@section('admin-title', '- AdminPanel')
@section('body')

    <article class="content">
        <section class="pull-left">
            <div class="container">
                <div class="ssd col-sm-12">
                    <br>
                    <h2 class="set-left"><span class="htb6">Admin Panel</span></h2>
                    <p>
                        Important links:
                    </p>
                    <ul>
                        <li><span class="htb2">Google Analytics:</span><a href="https://www.google.co.uk/analytics/#?modal_active=none">Username:riponymn@gmail.com</a></li>
                        <li><span class="htb5">Web Developer: </span><a href="mailto:Harry@harrymessenger.co.uk">Harry@Harrymessenger.co.uk</a></li>
                        <li><span class="htb3">Graphic designer: </span><a href="https://www.facebook.com/liquidvibedesigns/?pnref=lhc">LiquidVibeDesigns</a></li>
                    </ul>
                </div>
                <div class="ssd col-xs-12">
                    <h4 class="htb4">Get Email Mailing List</h4>
                    <div class="row col-xs-offset-1">
                        <button class="btn btn-danger" onclick="getRegList()">Everyone</button>
                        <button class="btn btn-warning" onclick="getTeachersList()">Teachers</button>
                        <button class="btn btn-success" onclick="getGroupsList()">Groups</button>
                    </div>
                    <br>
                    <script>new Clipboard('.btn');</script>
                    <div class="row">
                        <div class="input-group col-xs-5">

                            <input style="height:50px;" id="foo" class="form-control" type="text" value="No Mailing List selected">
                         <span class="input-group-addon">
                            <button class="btn" data-clipboard-target="#foo">
                                <i class="fa fa-clipboard" aria-hidden="true"> Copy!</i>
                            </button>
                         </span>
                        </div>
                    </div>



                    <!-- Trigger -->





                </div>


            </div>
        </section>
    </article>



@endsection

@section('js')
    <script src="{{url('js/admin.js')}}"></script>


@endsection