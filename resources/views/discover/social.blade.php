@extends('template')

@section('title', 'homepage')

@section('body')
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.6&appId=918966724895981";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
    <article class="content">
        <section class="pull-left">
            <div class="container">
                <div class="ssd col-sm-12">
                    <br>
                    <h2 class="set-left"><span class="htb6">RYMN Social Feed:</span></h2>
                    <p>
                        <h3><span class="htb2">Did you know?...</span> That RYMN is very active on Facebook?</h3>
                    <p>Please follow the link, and like and follow our page for latest updates! Alternatively, for those without facebook, our latest posts are displayed below</p>
                    <div class="contains_facebook">
                        <div class="fb-page" data-href="https://www.facebook.com/youth.music.network/" data-tabs="timeline" data-width="700" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/youth.music.network/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/youth.music.network/">Ripon Youth Music Network</a></blockquote></div></p>
                    </div>
                </div>
                <div class="ssd col-sm-8">

                </div>



            </div>
        </section>
    </article>


@endsection