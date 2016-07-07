@extends('template')

@section('title', 'homepage')

@section('body')
    <article class="content">
        <section class="pull-left">
            <div class="container">
                <div class="ssd col-sm-12">
                    <br>
                    <h2 class="set-left"><span class="htb6">The RYMN newsletter:</span></h2>
                    <p>
                        The RYMN newsletter is one of the best ways to stay completely up-to-date with all the happenings of music in North Yorkshire, across the Ripon&Harrogate area and beyond.
                        The newsletter gets sent out ...
                    </p>
                </div>
                <div class="ssd col-sm-8">
                    <h2 class="set-left"><span class="htb3">Register:</span></h2>
                    <p>
                        In order to register for the newsletter, please fill in the blue box at the bottom of the page with your email address, and hit "subscribe"!
                    </p>
                </div>
                <div class="col-sm-3">
                    <section class="ht-box2"><div><span class="helper"></span><img class="img_small" src="http://i.imgur.com/hm9ZVF7.png"></div></section>
                </div>
                <div class="ssd col-sm-8">
                    <h2 class="set-left"><span class="htb3">Previous Newsletters:</span></h2>
                    <p>
                        All uploaded previous newsletters are added to the site here, to be downloaded!
                    </p>
                    <ul>
                        <?php
                        $it = new FilesystemIterator('storage/newsletters');
                        foreach ($it as $fileinfo) {
                            if($fileinfo->getExtension() == "pdf")
                            {
                                $var = $fileinfo->getBasename('.'.$fileinfo->getExtension());
                                echo('<li><a href="/storage/newsletters/'.$fileinfo->getFilename().'">'.$var.'</a></li>');
                            }
                        }
                        ?>
                    </ul>
                </div>


            </div>
        </section>
    </article>
    <div style="font-weight: bold; text-align:center; font-size: 32px;">
        <p class="htb4">Enter details below to subscribe</p>
        <i class="fa fa-arrow-down"  aria-hidden="true"></i><i class="fa fa-arrow-down" aria-hidden="true"></i>
    </div>
@endsection