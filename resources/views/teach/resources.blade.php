@extends('template')

@section('title', 'homepage')

@section('body')

    <div class="col-lg-12 top-row cyan_color">
        <h2 class="fix-middle">Free resources for teachers</h2>
        <p>RYMN is helping teachers across the area share resources and assist each other to maximise the resources available to each other. Files below are categorised into target age group, feel free to download any files you desire. <br></p>
    </div>
    <div class="col-lg-offset-1 col-lg-10 top-row grey_color">
        <h4 class="pull-left" id="underline">Voice</h4>
        <div class="col-lg-offset-2 col lg-8">
            <?php
              foreach($files['voice'] as $f)
                  {
                    echo('<div class="file-icon">');
                      $filepath = $f;
                      $explode = explode('/',$f);
                      $filename = $explode[2];
                    $f_extension =  pathinfo($filename, PATHINFO_EXTENSION);
                    switch($f_extension)
                    {
                        case 'txt':
                            echo('<a href="'. route('download',['fp' => $filepath]) . '"><img class="file-img" border="0" alt="txt" src="/imgs/files/txt.svg" width="85" height="85"></a>');
                            break;
                        case ('ppt' |'pptx'):
                            echo('<a href="'. route('download',['fp' => $filepath]) . '"><img class="file-img" border="0" alt="ppt" src="/imgs/files/ppt.svg" width="85" height="85"></a>');
                            break;
                        case ('doc' | 'docx'):
                            echo('<a href="'. route('download',['fp' => $filepath]) . '"><img class="file-img" border="0" alt="doc" src="/imgs/files/doc.svg" width="85" height="85"></a>');
                            break;
                        case ('xls' | 'xlsx'):
                            echo('<a href="'. route('download',['fp' => $filepath]) . '"><img class="file-img" border="0" alt="xls" src="/imgs/files/xls.svg" width="85" height="85"></a>');
                            break;
                        case ('jpg' | 'png' | 'gif'):
                            echo('<a href="'. route('download',['fp' => $filepath]) . '"><img class="file-img" border="0" alt="img" src="/imgs/files/png.svg" width="85" height="85"></a>');
                            break;
                        default:
                            echo('<a href="'. route('download',['fp' => $filepath]) . '"><img class="file-img" border="0" alt="img" src="/imgs/files/file.svg" width="85" height="85"></a>');
                            break;
                    }
                      echo('<br>');
                      echo('<span class="file-name">'.$filename.'</span>');
                      echo('</div>');
                  }
        ?>
        <br>
        </div>
    </div>
    <div class="col-lg-offset-1 col-lg-10 top-row cyan_color">
        <h4 class="pull-left" id="underline">Keyboard</h4>
        <div class="col-lg-offset-2 col lg-8">
            <?php
            foreach($files['keyboard'] as $f)
            {
                echo('<div class="file-icon">');
                $filepath = $f;
                $explode = explode('/',$f);
                $filename = $explode[2];
                $f_extension =  pathinfo($filename, PATHINFO_EXTENSION);
                switch($f_extension)
                {
                    case 'txt':
                        echo('<a href="'. route('download',['fp' => $filepath]) . '"><img class="file-img" border="0" alt="txt" src="/imgs/files/txt.svg" width="85" height="85"></a>');
                        break;
                    case ('ppt' |'pptx'):
                        echo('<a href="'. route('download',['fp' => $filepath]) . '"><img class="file-img" border="0" alt="ppt" src="/imgs/files/ppt.svg" width="85" height="85"></a>');
                        break;
                    case ('doc' | 'docx'):
                        echo('<a href="'. route('download',['fp' => $filepath]) . '"><img class="file-img" border="0" alt="doc" src="/imgs/files/doc.svg" width="85" height="85"></a>');
                        break;
                    case ('xls' | 'xlsx'):
                        echo('<a href="'. route('download',['fp' => $filepath]) . '"><img class="file-img" border="0" alt="xls" src="/imgs/files/xls.svg" width="85" height="85"></a>');
                        break;
                    case ('jpg' | 'png' | 'gif'):
                        echo('<a href="'. route('download',['fp' => $filepath]) . '"><img class="file-img" border="0" alt="img" src="/imgs/files/png.svg" width="85" height="85"></a>');
                        break;
                    default:
                        echo('<a href="'. route('download',['fp' => $filepath]) . '"><img class="file-img" border="0" alt="img" src="/imgs/files/file.svg" width="85" height="85"></a>');
                        break;
                }
                echo('<br>');
                echo('<span class="file-name">'.$filename.'</span>');
                echo('</div>');
            }
            ?>
            <br>
        </div>
    </div>
    <div class="col-lg-offset-1 col-lg-10 top-row grey_color">
        <h4 class="pull-left" id="underline">Strings</h4>
        <div class="col-lg-offset-2 col lg-8">
            <?php
            foreach($files['strings'] as $f)
            {
                echo('<div class="file-icon">');
                $filepath = $f;
                $explode = explode('/',$f);
                $filename = $explode[2];
                $f_extension =  pathinfo($filename, PATHINFO_EXTENSION);
                switch($f_extension)
                {
                    case 'txt':
                        echo('<a href="'. route('download',['fp' => $filepath]) . '"><img class="file-img" border="0" alt="txt" src="/imgs/files/txt.svg" width="85" height="85"></a>');
                        break;
                    case ('ppt' |'pptx'):
                        echo('<a href="'. route('download',['fp' => $filepath]) . '"><img class="file-img" border="0" alt="ppt" src="/imgs/files/ppt.svg" width="85" height="85"></a>');
                        break;
                    case ('doc' | 'docx'):
                        echo('<a href="'. route('download',['fp' => $filepath]) . '"><img class="file-img" border="0" alt="doc" src="/imgs/files/doc.svg" width="85" height="85"></a>');
                        break;
                    case ('xls' | 'xlsx'):
                        echo('<a href="'. route('download',['fp' => $filepath]) . '"><img class="file-img" border="0" alt="xls" src="/imgs/files/xls.svg" width="85" height="85"></a>');
                        break;
                    case ('jpg' | 'png' | 'gif'):
                        echo('<a href="'. route('download',['fp' => $filepath]) . '"><img class="file-img" border="0" alt="img" src="/imgs/files/png.svg" width="85" height="85"></a>');
                        break;
                    default:
                        echo('<a href="'. route('download',['fp' => $filepath]) . '"><img class="file-img" border="0" alt="img" src="/imgs/files/file.svg" width="85" height="85"></a>');
                        break;
                }
                echo('<br>');
                echo('<span class="file-name">'.$filename.'</span>');
                echo('</div>');
            }
            ?>
            <br>
        </div>
    </div>
    <div class="col-lg-offset-1 col-lg-10 top-row cyan_color">
        <h4 class="pull-left" id="underline">Woodwind</h4>
        <div class="col-lg-offset-2 col lg-8">
            <?php
            foreach($files['woodwind'] as $f)
            {
                echo('<div class="file-icon">');
                $filepath = $f;
                $explode = explode('/',$f);
                $filename = $explode[2];
                $f_extension =  pathinfo($filename, PATHINFO_EXTENSION);
                switch($f_extension)
                {
                    case 'txt':
                        echo('<a href="'. route('download',['fp' => $filepath]) . '"><img class="file-img" border="0" alt="txt" src="/imgs/files/txt.svg" width="85" height="85"></a>');
                        break;
                    case ('ppt' |'pptx'):
                        echo('<a href="'. route('download',['fp' => $filepath]) . '"><img class="file-img" border="0" alt="ppt" src="/imgs/files/ppt.svg" width="85" height="85"></a>');
                        break;
                    case ('doc' | 'docx'):
                        echo('<a href="'. route('download',['fp' => $filepath]) . '"><img class="file-img" border="0" alt="doc" src="/imgs/files/doc.svg" width="85" height="85"></a>');
                        break;
                    case ('xls' | 'xlsx'):
                        echo('<a href="'. route('download',['fp' => $filepath]) . '"><img class="file-img" border="0" alt="xls" src="/imgs/files/xls.svg" width="85" height="85"></a>');
                        break;
                    case ('jpg' | 'png' | 'gif'):
                        echo('<a href="'. route('download',['fp' => $filepath]) . '"><img class="file-img" border="0" alt="img" src="/imgs/files/png.svg" width="85" height="85"></a>');
                        break;
                    default:
                        echo('<a href="'. route('download',['fp' => $filepath]) . '"><img class="file-img" border="0" alt="img" src="/imgs/files/file.svg" width="85" height="85"></a>');
                        break;
                }
                echo('<br>');
                echo('<span class="file-name">'.$filename.'</span>');
                echo('</div>');
            }
            ?>
            <br>
        </div>
    </div>
    <div class="col-lg-offset-1 col-lg-10 top-row grey_color">
        <h4 class="pull-left" id="underline">Brass</h4>
        <div class="col-lg-offset-2 col lg-8">
            <?php
            foreach($files['brass'] as $f)
            {
                echo('<div class="file-icon">');
                $filepath = $f;
                $explode = explode('/',$f);
                $filename = $explode[2];
                $f_extension =  pathinfo($filename, PATHINFO_EXTENSION);
                switch($f_extension)
                {
                    case 'txt':
                        echo('<a href="'. route('download',['fp' => $filepath]) . '"><img class="file-img" border="0" alt="txt" src="/imgs/files/txt.svg" width="85" height="85"></a>');
                        break;
                    case ('ppt' |'pptx'):
                        echo('<a href="'. route('download',['fp' => $filepath]) . '"><img class="file-img" border="0" alt="ppt" src="/imgs/files/ppt.svg" width="85" height="85"></a>');
                        break;
                    case ('doc' | 'docx'):
                        echo('<a href="'. route('download',['fp' => $filepath]) . '"><img class="file-img" border="0" alt="doc" src="/imgs/files/doc.svg" width="85" height="85"></a>');
                        break;
                    case ('xls' | 'xlsx'):
                        echo('<a href="'. route('download',['fp' => $filepath]) . '"><img class="file-img" border="0" alt="xls" src="/imgs/files/xls.svg" width="85" height="85"></a>');
                        break;
                    case ('jpg' | 'png' | 'gif'):
                        echo('<a href="'. route('download',['fp' => $filepath]) . '"><img class="file-img" border="0" alt="img" src="/imgs/files/png.svg" width="85" height="85"></a>');
                        break;
                    default:
                        echo('<a href="'. route('download',['fp' => $filepath]) . '"><img class="file-img" border="0" alt="img" src="/imgs/files/file.svg" width="85" height="85"></a>');
                        break;
                }
                echo('<br>');
                echo('<span class="file-name">'.$filename.'</span>');
                echo('</div>');
            }
            ?>
            <br>
        </div>
    </div>
    <div class="col-lg-offset-1 col-lg-10 top-row cyan_color">
        <h4 class="pull-left" id="underline">Percussion</h4>
        <div class="col-lg-offset-2 col lg-8">
            <?php
            foreach($files['percussion'] as $f)
            {
                echo('<div class="file-icon">');
                $filepath = $f;
                $explode = explode('/',$f);
                $filename = $explode[2];
                $f_extension =  pathinfo($filename, PATHINFO_EXTENSION);
                switch($f_extension)
                {
                    case 'txt':
                        echo('<a href="'. route('download',['fp' => $filepath]) . '"><img class="file-img" border="0" alt="txt" src="/imgs/files/txt.svg" width="85" height="85"></a>');
                        break;
                    case ('ppt' |'pptx'):
                        echo('<a href="'. route('download',['fp' => $filepath]) . '"><img class="file-img" border="0" alt="ppt" src="/imgs/files/ppt.svg" width="85" height="85"></a>');
                        break;
                    case ('doc' | 'docx'):
                        echo('<a href="'. route('download',['fp' => $filepath]) . '"><img class="file-img" border="0" alt="doc" src="/imgs/files/doc.svg" width="85" height="85"></a>');
                        break;
                    case ('xls' | 'xlsx'):
                        echo('<a href="'. route('download',['fp' => $filepath]) . '"><img class="file-img" border="0" alt="xls" src="/imgs/files/xls.svg" width="85" height="85"></a>');
                        break;
                    case ('jpg' | 'png' | 'gif'):
                        echo('<a href="'. route('download',['fp' => $filepath]) . '"><img class="file-img" border="0" alt="img" src="/imgs/files/png.svg" width="85" height="85"></a>');
                        break;
                    default:
                        echo('<a href="'. route('download',['fp' => $filepath]) . '"><img class="file-img" border="0" alt="img" src="/imgs/files/file.svg" width="85" height="85"></a>');
                        break;
                }
                echo('<br>');
                echo('<span class="file-name">'.$filename.'</span>');
                echo('</div>');
            }
            ?>
            <br>
        </div>
    </div>
    <div class="col-lg-offset-1 col-lg-10 top-row grey_color">
        <h4 class="pull-left" id="underline">Guitar</h4>
        <div class="col-lg-offset-2 col lg-8">
            <?php
            foreach($files['guitar'] as $f)
            {
                echo('<div class="file-icon">');
                $filepath = $f;
                $explode = explode('/',$f);
                $filename = $explode[2];
                $f_extension =  pathinfo($filename, PATHINFO_EXTENSION);
                switch($f_extension)
                {
                    case 'txt':
                        echo('<a href="'. route('download',['fp' => $filepath]) . '"><img class="file-img" border="0" alt="txt" src="/imgs/files/txt.svg" width="85" height="85"></a>');
                        break;
                    case ('ppt' |'pptx'):
                        echo('<a href="'. route('download',['fp' => $filepath]) . '"><img class="file-img" border="0" alt="ppt" src="/imgs/files/ppt.svg" width="85" height="85"></a>');
                        break;
                    case ('doc' | 'docx'):
                        echo('<a href="'. route('download',['fp' => $filepath]) . '"><img class="file-img" border="0" alt="doc" src="/imgs/files/doc.svg" width="85" height="85"></a>');
                        break;
                    case ('xls' | 'xlsx'):
                        echo('<a href="'. route('download',['fp' => $filepath]) . '"><img class="file-img" border="0" alt="xls" src="/imgs/files/xls.svg" width="85" height="85"></a>');
                        break;
                    case ('jpg' | 'png' | 'gif'):
                        echo('<a href="'. route('download',['fp' => $filepath]) . '"><img class="file-img" border="0" alt="img" src="/imgs/files/png.svg" width="85" height="85"></a>');
                        break;
                    default:
                        echo('<a href="'. route('download',['fp' => $filepath]) . '"><img class="file-img" border="0" alt="img" src="/imgs/files/file.svg" width="85" height="85"></a>');
                        break;
                }
                echo('<br>');
                echo('<span class="file-name">'.$filename.'</span>');
                echo('</div>');
            }
            ?>
            <br>
        </div>
    </div>
    <div class="col-lg-offset-1 col-lg-10 top-row cyan_color">
        <h4 class="pull-left" id="underline">Harp</h4>
        <div class="col-lg-offset-2 col lg-8">
            <?php
            foreach($files['harp'] as $f)
            {
                echo('<div class="file-icon">');
                $filepath = $f;
                $explode = explode('/',$f);
                $filename = $explode[2];
                $f_extension =  pathinfo($filename, PATHINFO_EXTENSION);
                switch($f_extension)
                {
                    case 'txt':
                        echo('<a href="'. route('download',['fp' => $filepath]) . '"><img class="file-img" border="0" alt="txt" src="/imgs/files/txt.svg" width="85" height="85"></a>');
                        break;
                    case ('ppt' |'pptx'):
                        echo('<a href="'. route('download',['fp' => $filepath]) . '"><img class="file-img" border="0" alt="ppt" src="/imgs/files/ppt.svg" width="85" height="85"></a>');
                        break;
                    case ('doc' | 'docx'):
                        echo('<a href="'. route('download',['fp' => $filepath]) . '"><img class="file-img" border="0" alt="doc" src="/imgs/files/doc.svg" width="85" height="85"></a>');
                        break;
                    case ('xls' | 'xlsx'):
                        echo('<a href="'. route('download',['fp' => $filepath]) . '"><img class="file-img" border="0" alt="xls" src="/imgs/files/xls.svg" width="85" height="85"></a>');
                        break;
                    case ('jpg' | 'png' | 'gif'):
                        echo('<a href="'. route('download',['fp' => $filepath]) . '"><img class="file-img" border="0" alt="img" src="/imgs/files/png.svg" width="85" height="85"></a>');
                        break;
                    default:
                        echo('<a href="'. route('download',['fp' => $filepath]) . '"><img class="file-img" border="0" alt="img" src="/imgs/files/file.svg" width="85" height="85"></a>');
                        break;
                }
                echo('<br>');
                echo('<span class="file-name">'.$filename.'</span>');
                echo('</div>');
            }
            ?>
            <br>
        </div>
    </div>
    <div class="col-lg-offset-1 col-lg-10 top-row grey_color">
        <h4 class="pull-left" id="underline">Other</h4>
        <div class="col-lg-offset-2 col lg-8">
            <?php
            foreach($files['other'] as $f)
            {
                echo('<div class="file-icon">');
                $filepath = $f;
                $explode = explode('/',$f);
                $filename = $explode[2];
                $f_extension =  pathinfo($filename, PATHINFO_EXTENSION);
                switch($f_extension)
                {
                    case 'txt':
                        echo('<a href="'. route('download',['fp' => $filepath]) . '"><img class="file-img" border="0" alt="txt" src="/imgs/files/txt.svg" width="85" height="85"></a>');
                        break;
                    case ('ppt' |'pptx'):
                        echo('<a href="'. route('download',['fp' => $filepath]) . '"><img class="file-img" border="0" alt="ppt" src="/imgs/files/ppt.svg" width="85" height="85"></a>');
                        break;
                    case ('doc' | 'docx'):
                        echo('<a href="'. route('download',['fp' => $filepath]) . '"><img class="file-img" border="0" alt="doc" src="/imgs/files/doc.svg" width="85" height="85"></a>');
                        break;
                    case ('xls' | 'xlsx'):
                        echo('<a href="'. route('download',['fp' => $filepath]) . '"><img class="file-img" border="0" alt="xls" src="/imgs/files/xls.svg" width="85" height="85"></a>');
                        break;
                    case ('jpg' | 'png' | 'gif'):
                        echo('<a href="'. route('download',['fp' => $filepath]) . '"><img class="file-img" border="0" alt="img" src="/imgs/files/png.svg" width="85" height="85"></a>');
                        break;
                    default:
                        echo('<a href="'. route('download',['fp' => $filepath]) . '"><img class="file-img" border="0" alt="img" src="/imgs/files/file.svg" width="85" height="85"></a>');
                        break;
                }
                echo('<br>');
                echo('<span class="file-name">'.$filename.'</span>');
                echo('</div>');
            }
            ?>
            <br>
        </div>
    </div>
@endsection