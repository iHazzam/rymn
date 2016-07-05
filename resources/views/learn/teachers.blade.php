@extends('template')

@section('title', 'homepage')

@section('body')
        <article class="inpage-navbar col-lg-offset-2 col-lg-7">
        <div class="">
            <ul>
                <li><a href="#singing">Singing</a></li>
                <li><a href="#keys">Piano/Keyboards</a></li>
                <li><a href="#strings">Strings</a></li>
                <li><a href="#percussion">Percussion</a></li>
                <li><a href="#wind">Woodwind</a></li>
                <li><a href="#brass">Brass</a></li>
            </ul>
        </div>
    </article>

    <article class="content">
        <section class="pull-left">
            <div class="container">
                <div class="ssd col-sm-8">
                    <h2 class="set-left">Choosing an instrument</h2>
                    <p>
                        There are many factors which go into choosing an instrument for your child to learn. Different instruments are more relevant and realistic at certain stages of a child's development, and lead to different oppotunities down the road including the ensembles you can join and with who and how you can play.
                        Remember, the goal of learning an instrument is to have fun and play together, so the first step is to choose the right (first?!) instrument for your child:
                    </p>
                    <h2 class="set-left">Making a start:</h2>
                    <p>Before we get down to the practicalities, there are some important things to remember:-</p>
                    <ul>
                        <li>Few children will have had exposure to a wide variety of musical types and genres. (Most of them will have heard mainly “pop” music.) It is essential to teach them in such a way that it broadens their horizons and encourages them to explore new and less familiar types of music, especially those that are more intellectually and artistically challenging.</li>
                        <li>Learning to read music is an essential component of music education! It isn’t at all difficult if it is introduced right from the start and developed gradually throughout the learning process. (N.B. – This applies to singing too!)</li>
                        <li>Playing an instrument (or singing) involves time and commitment! It takes time to practise, musical activities take time and they often involve travel, which also takes time! It is also essential to make the commitment – ifyour child is involved in a choir, orchestra or ensemble, then they must attend regularly and not miss rehearsals – if they do, they will be letting down not only themselves but all the other members of the group.</li>
                    </ul>
                </div>
                <div class="col-sm-4">
                    <img src="/images/ssd.jpg">
                </div>

                <div class="ssd col-sm-12">
                    <h2 id="performance">Configured for Performance</h2>
                    <p>Brilliant, well-configured hardware sets the foundation for a fast-loading website. But optimising the way that hardware and your website interact is the key to delivering stand-out load times for your website's visitors. We can work with you to advise on and configure a number of acceleration technologies such as Nginx & Zend Opcode Caching to ensure your website performs at its peak.</p>
                </div>

            </div>
        </section>
    </article>


    <section class="apache">
        <div class="container">
            <div class="col-sm-6 apache-box">
                <h2>Nginx &amp; Apache</h2>
                <p>Nginx is a web server which comes as standard in our <a href="/vps-web-hosting/">VPS</a> and <a  href="/dedicated-web-hosting/">Managed Dedicated Servers</a>. It's highly efficient at handling static content such as HTML, JavaScript and images. It runs in front of the Apache web server, dealing with specific end-user requests to websites. Working together, Apache can deal with its workload faster – alongside Nginx’s already speedy processing for “easy” requests.</p>
            </div>
            <div class="col-sm-6 apache-image">
                <img src="/images/apache.png">
            </div>
        </div>
    </section>

    <section class="zend">
        <div class="container">
            <div class="col-sm-6 zend-image">
                <img src="/images/zend.png">
            </div>
            <div class="col-sm-6 zend-box">
                <h2>Zend Opcode Caching</h2>
                <p>Zend is a web application accelerator, which is installed in front of your web server and can speed up your website significantly. It's designed for content-heavy dynamic sites and effectively caches content, so that the web server only needs to fetch website files periodically when it doesn’t have a relevant cached copy. This means less server resources are required for big content-heavy sites, and because the web server doesn’t have to do any work if a page is cached, your users get a lightning-fast browsing experience too!</p>
            </div>
        </div>
    </section>


    <section id="foundations" class="the-foundations container">

        <h2>The Foundations</h2>

        <div class="col-sm-6 col-md-4 foundation">
            <section class="ht-box"><div><img src="/images/ht-hardware.png"></div></section>
            <h3 class="htb1">Awesome Hardware</h3>
            <p>We exclusively use the latest Dell web servers. They're loaded with high-quality RAM, multi-core processors, RAID SSD storage and then plugged in to a high-quality network. Why? Because it makes your website reliable, fast and enjoyable for your users!</p>
        </div>
        <div class="col-sm-6 col-md-4 foundation">
            <section class="ht-box"><div><img src="/images/ht-data.png"></div></section>
            <h3 class="htb2">Manchester Datacentre</h3>
            <p>Every server needs a home. Our servers live in Manchester under 24-hour manned security, CCTV, fire suppression, environmental monitoring and independent &amp; redundant power supplies, with 24/7 on-site technical engineers.</p>
        </div>
        <div class="col-sm-6 col-md-4 foundation">
            <section class="ht-box"><div><img src="/images/ht-bandwidth.png"></div></section>
            <h3 class="htb3">Tier-1 bandwidth</h3>
            <p>All our servers are fed through a cross connection to a number of Tier-1 bandwidth carriers. The techie bit: we use diverse fibre routing through multiple redundant core switches and routers. It just means that we’ll ensure your website is always accessible.</p>
        </div>
        <div class="col-sm-6 col-md-4 foundation">
            <section class="ht-box"><div><img src="/images/ht-monitor.png"></div></section>
            <h3 class="htb4">24/7 Server Monitoring</h3>
            <p>Keeping servers online is what it’s all about. That’s why we monitor key processes on all our servers in real time, 24 hours a day – so if we see any early signs of trouble, we can do something about it before it becomes a problem.</p>
        </div>
        <div class="col-sm-6 col-md-4 foundation">
            <section class="ht-box"><div><img src="/images/ht-plesk.png"></div></section>
            <h3 class="htb5">Simple Plesk Control Panel</h3>
            <p>All Nublue hosting comes with the Odin Plesk 12 control panel. Plesk puts the emphasis on usability, and greatly simplifies the process of managing your web hosting space and email accounts. It makes things simpler for you, and that’s why we use it.</p>
        </div>
        <div class="col-sm-6 col-md-4 foundation">
            <section class="ht-box"><div><img src="/images/ht-backups.png"></div></section>
            <h3 class="htb6">Backups</h3>
            <p>Using R1Soft Continuous Data Protection (CDP) we backup every server, every night, and keep those backups for 10 days. For free. We do this because we think it’s the responsible thing to do – and to give all our customers the peace of mind that their data is safe.</p>
        </div>

    </section>

@endsection