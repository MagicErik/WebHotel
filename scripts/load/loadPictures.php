<?php
function beliefmedia_grid_gallery($dir = '../res/pictures/gallery/', $columns = '5', $url = false, $width = '350,960,1200,1460')
{
    $width = explode(',', $width);
    $transient = md5(serialize(func_get_args()));
    $return="";
    $style = '
    <style>
   
    .row {
      display: -ms-flexbox; /* IE 10 */
      display: flex;
      -ms-flex-wrap: wrap; /* IE 10 */
      flex-wrap: wrap;
      padding: 0 4px;
      
    }

    @media (min-width: ' . $width[0] . 'px) {
      
      .column {
        float: left;
        width: 100%;
        padding: 10px;
      }
    }

    @media (min-width: ' . $width[1] . 'px) {
      
      .column {
        -ms-flex: 50%; /* IE 10 */
        flex: 50%;
        padding: 0 4px;
        -ms-flex: 50%; /* IE 10 */
        flex: 50%;
        padding: 0 4px;
      }
    }
    @media (min-width: ' . $width[2] . 'px) {
      
      .column {
        float: left;
        width: 30%;
        padding: 10px;
        -ms-flex: 30%; /* IE 10 */
        flex: 30%;
        padding: 0 4px;
      }
    }
    @media (min-width: ' . $width[3] . 'px) {
      
      .column {
        float: left;
        width: 25%;
        -ms-flex: 25%; /* IE 10 */
        flex: 25%;
        padding: 0 4px;
      }
    }
    .column img {
      margin-top: 12px;
      vertical-align: center;
      min-height: 300px;
      
      max-height: 300px;
    }
    
    /* Clear floats after the columns */
    .row:after {
      content: "";
      display: table;
      clear: both;
    }
    </style>

 

';
    $image_array = glob(rtrim($dir, '/') . '/*.{jpg,jpeg,png,gif}', GLOB_BRACE);
    foreach ($image_array as $image) {
        $image = ($url !== false) ? rtrim($url, '/') . '/' . basename($image) : $image;
        $return .= '<div class="column"><img decoding="async" class="column img" style="width:100%" src="' . $image . '"></div>';
    }
    $return = '<div class="row">' . $style . $return . '</div>';
    return $return;

}


?>