@extends('template')

@section('title', 'homepage')

@section('body')
    <article class="content">
        <section class="pull-left">
            <div class="container">
                <div class="ssd col-sm-12">
                    <br>
                    <h2 class="set-left"><span class="htb6">Benifits of group playing:</span></h2>
                    <p>
                        Why would you want to play in a group?
                    </p>
                </div>
                <div class="ssd col-sm-8">
                    <h2 class="set-left"><span class="htb3">Types of groups:</span></h2>
                    <p>There are many different types of ensembles available to play in, depending on what instrument you play</p>
                    <ul>
                        <li><span class="htb2">Orchestras:</span>(What is an orchestra)</li>
                        <li><span class="htb3">Chamber groups:</span>(What is a chamber group?)</li>
                        <li><span class="htb4">Brass bands:</span>(What is a brass band?)</li>
                        <li><span class="htb5">Choirs:</span>(What is a choir?)</li> </ul>
                </div>
                <div class="col-sm-4">
                    <section class="ht-box2"><div><span class="helper"></span><img class="img_small" src="/imgs/orchestra.jpg"></div></section>
                </div>

                <div class="ssd col-sm-12">
                    <h2 id="performance"><span class="htb2">Music Tours</span></h2>
                    <p>Many schools and orchestral groups go on occasional music tours, both domestically and abroad. These are for some kids the peak of their school musical career and are often highly anticipated</p>
                    <p>Details...<p/>

                </div>

            </div>
        </section>
    </article>


@endsection