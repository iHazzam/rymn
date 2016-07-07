@extends('template')

@section('title', 'homepage')

@section('body')

    <div class="col-lg-12 top-row cyan_color">
        <h2 class="fix-middle">Free resources for teachers</h2>
        <p>RYMN is helping teachers across the area share resources and assist each other to maximise the resources available to each other. Files below are categorised into target age group, feel free to download any files you desire. <br></p>
    </div>
    <div class="col-lg-offset-1 col-lg-10 top-row grey_color">
        <h4 class="pull-left" id="underline">Age 0-10</h4>
        <div class="col-lg-offset-2 col lg-8">
            <?php
              foreach($files['0-10'] as $f)
                  {
                    echo('<div class="file-icon">');
                      $filepath = $f;
                      $explode = explode('/',$f);
                      $filename = $explode[2];
                    $f_extension =  pathinfo($filename, PATHINFO_EXTENSION);
                    switch($f_extension)
                    {
                        case 'txt':
                            echo('<a href="'.asset('storage/'.$filepath).'"><img class="file-img" border="0" alt="txt" src="/imgs/files/txt.svg" width="85" height="85"></a>');
                            break;
                        case ('ppt' |'pptx'):
                            echo('<a href="'.asset('storage/'.$filepath).'"><img class="file-img" border="0" alt="ppt" src="/imgs/files/ppt.svg" width="85" height="85"></a>');
                            break;
                        case ('doc' | 'docx'):
                            echo('<a href="'.asset('storage/'.$filepath).'"><img class="file-img" border="0" alt="doc" src="/imgs/files/doc.svg" width="85" height="85"></a>');
                            break;
                        case ('xls' | 'xlsx'):
                            echo('<a href="'.asset('storage/'.$filepath).'"><img class="file-img" border="0" alt="xls" src="/imgs/files/xls.svg" width="85" height="85"></a>');
                            break;
                        case ('jpg' | 'png' | 'gif'):
                            echo('<a href="'.asset('storage/'.$filepath).'"><img class="file-img" border="0" alt="img" src="/imgs/files/png.svg" width="85" height="85"></a>');
                            break;
                        default:
                            echo('<a href="'.asset('storage/'.$filepath).'"><img class="file-img" border="0" alt="img" src="/imgs/files/file.svg" width="85" height="85"></a>');
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
        <h4 class="pull-left" id="underline">Age 10-16</h4>
        <div class="col-lg-offset-2 col lg-8">
        <?php
        foreach($files['10-16'] as $f)
        {
            echo('<div class="file-icon">');
            $filepath = $f;
            $explode = explode('/',$f);
            $filename = $explode[2];
            $f_extension =  pathinfo($filename, PATHINFO_EXTENSION);
            switch($f_extension)
            {
                case 'txt':
                    echo('<a href="'.asset('storage/'.$filepath).'"><img class="file-img" border="0" alt="txt" src="/imgs/files/txt.svg" width="85" height="85"></a>');
                    break;
                case ('ppt' |'pptx'):
                    echo('<a href="'.asset('storage/'.$filepath).'"><img class="file-img" border="0" alt="ppt" src="/imgs/files/ppt.svg" width="85" height="85"></a>');
                    break;
                case ('doc' | 'docx'):
                    echo('<a href="'.asset('storage/'.$filepath).'"><img class="file-img" border="0" alt="doc" src="/imgs/files/doc.svg" width="85" height="85"></a>');
                    break;
                case ('xls' | 'xlsx'):
                    echo('<a href="'.asset('storage/'.$filepath).'"><img class="file-img" border="0" alt="xls" src="/imgs/files/xls.svg" width="85" height="85"></a>');
                    break;
                case ('jpg' | 'png' | 'gif'):
                    echo('<a href="'.asset('storage/'.$filepath).'"><img class="file-img" border="0" alt="img" src="/imgs/files/png.svg" width="85" height="85"></a>');
                    break;
                default:
                    echo('<a href="'.asset('storage/'.$filepath).'"><img class="file-img" border="0" alt="img" src="/imgs/files/file.svg" width="85" height="85"></a>');
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
        <h4 class="pull-left" id="underline">Age 16+</h4>
        <div class="col-lg-offset-2 col lg-8">
        <?php
        foreach($files['16+'] as $f)
        {
            echo('<div class="file-icon">');
            $filepath = $f;
            $explode = explode('/',$f);
            $filename = $explode[2];
            $f_extension =  pathinfo($filename, PATHINFO_EXTENSION);
            switch($f_extension)
            {
                case 'txt':
                    echo('<a href="'.asset('storage/'.$filepath).'"><img class="file-img" border="0" alt="txt" src="/imgs/files/txt.svg" width="85" height="85"></a>');
                    break;
                case ('ppt' |'pptx'):
                    echo('<a href="'.asset('storage/'.$filepath).'"><img class="file-img" border="0" alt="ppt" src="/imgs/files/ppt.svg" width="85" height="85"></a>');
                    break;
                case ('doc' | 'docx'):
                    echo('<a href="'.asset('storage/'.$filepath).'"><img class="file-img" border="0" alt="doc" src="/imgs/files/doc.svg" width="85" height="85"></a>');
                    break;
                case ('xls' | 'xlsx'):
                    echo('<a href="'.asset('storage/'.$filepath).'"><img class="file-img" border="0" alt="xls" src="/imgs/files/xls.svg" width="85" height="85"></a>');
                    break;
                case ('jpg' | 'png' | 'gif'):
                    echo('<a href="'.asset('storage/'.$filepath).'"><img class="file-img" border="0" alt="img" src="/imgs/files/png.svg" width="85" height="85"></a>');
                    break;
                default:
                    echo('<a href="'.asset('storage/'.$filepath).'"><img class="file-img" border="0" alt="img" src="/imgs/files/file.svg" width="85" height="85"></a>');
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